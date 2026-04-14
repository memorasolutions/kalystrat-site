<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\ErrorMonitoring\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Modules\ErrorMonitoring\Models\ErrorLog;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class ErrorMonitoringService
{
    public function shouldCapture(\Throwable $e, Request $request): bool
    {
        if (! config('errormonitoring.enabled', true)) {
            return false;
        }

        $statusCode = $this->resolveStatusCode($e);

        if (! array_key_exists($statusCode, config('errormonitoring.severity_codes', []))) {
            return false;
        }

        if ($statusCode === 404) {
            if ($request->isMethod('HEAD')) {
                return false;
            }

            if ($this->isExcludedPath($request->path())) {
                return false;
            }

            if ($this->isAssetRequest($request->path())) {
                return false;
            }

            if ($this->isBotRequest($request)) {
                return false;
            }
        }

        // Throttle par fingerprint
        $fingerprint = $this->generateFingerprint($e, $request);
        $cacheKey = "error_monitoring:{$fingerprint}";

        if (Cache::has($cacheKey)) {
            // Incrémente le compteur existant sans re-notifier
            ErrorLog::where('fingerprint', $fingerprint)->increment('occurrence_count');
            ErrorLog::where('fingerprint', $fingerprint)->update(['last_occurred_at' => now()]);

            return false;
        }

        return true;
    }

    public function capture(\Throwable $e, Request $request): ErrorLog
    {
        $fingerprint = $this->generateFingerprint($e, $request);
        $statusCode = $this->resolveStatusCode($e);

        $errorLog = ErrorLog::updateOrCreate(
            ['fingerprint' => $fingerprint],
            [
                'exception_class' => get_class($e),
                'message' => Str::limit($e->getMessage(), 5000),
                'status_code' => $statusCode,
                'url' => Str::limit($request->fullUrl(), 2048),
                'method' => $request->method(),
                'ip_hash' => $request->ip() ? hash('sha256', $request->ip()) : null,
                'user_agent' => Str::limit($request->userAgent() ?? '', 500),
                'user_id' => auth()->id(),
                'severity' => config("errormonitoring.severity_codes.{$statusCode}", 'warning'),
                'last_occurred_at' => now(),
                'context' => $this->scrubContext($request),
                'stack_trace' => $statusCode >= 500 ? $e->getTraceAsString() : null,
            ]
        );

        $errorLog->increment('occurrence_count');

        // Throttle
        Cache::put(
            "error_monitoring:{$fingerprint}",
            true,
            now()->addMinutes((int) config('errormonitoring.throttle_minutes', 60))
        );

        // Notifications
        $this->notify($errorLog);
        $this->notifyWebhooks($errorLog);

        return $errorLog;
    }

    public function generateFingerprint(\Throwable $e, Request $request): string
    {
        return hash('sha256', implode('|', [
            get_class($e),
            $e->getMessage(),
            $request->path(),
            $request->method(),
        ]));
    }

    public function resolveStatusCode(\Throwable $e): int
    {
        if ($e instanceof HttpExceptionInterface) {
            return $e->getStatusCode();
        }

        return 500;
    }

    public function scrubContext(Request $request): array
    {
        return $request->except([
            'password', 'password_confirmation', '_token',
            'credit_card', 'cvv', 'ssn', 'secret',
        ]);
    }

    protected function notify(ErrorLog $errorLog): void
    {
        $emails = array_filter(config('errormonitoring.notify_emails', []));

        if (empty($emails)) {
            return;
        }

        if ($errorLog->severity !== 'critical' && config('errormonitoring.digest_enabled')) {
            return; // Non-critical errors go to digest
        }

        $subject = sprintf('[%s] Erreur %d — %s',
            config('app.name'),
            $errorLog->status_code,
            Str::limit($errorLog->message, 80)
        );

        $body = implode("\n", array_filter([
            sprintf('Erreur %d sur %s', $errorLog->status_code, config('app.name')),
            str_repeat('-', 50),
            "URL : {$errorLog->url}",
            "Methode : {$errorLog->method}",
            "Severite : {$errorLog->severity}",
            "Occurrences : {$errorLog->occurrence_count}",
            'Utilisateur : '.($errorLog->user?->name ?? 'Visiteur'),
            "Date : {$errorLog->last_occurred_at->toDateTimeString()}",
            str_repeat('-', 50),
            $errorLog->status_code >= 500 ? "Exception : {$errorLog->exception_class}" : null,
            $errorLog->status_code >= 500 ? "Message : {$errorLog->message}" : null,
            $errorLog->stack_trace ? str_repeat('-', 50)."\n".$errorLog->stack_trace : null,
        ]));

        try {
            Mail::raw($body, function ($message) use ($subject, $emails): void {
                $message->to($emails)->subject($subject);
            });
        } catch (\Throwable) {
            // Silencieux pour éviter boucles infinies
        }
    }

    protected function notifyWebhooks(ErrorLog $errorLog): void
    {
        $channels = config('errormonitoring.notify_channels', []);
        $appName = config('app.name');

        $text = sprintf("[%s] Erreur %d (%s) — %s\nURL : %s\nOccurrences : %d",
            $appName, $errorLog->status_code, $errorLog->severity,
            Str::limit($errorLog->message, 200), $errorLog->url, $errorLog->occurrence_count
        );

        if (in_array('slack', $channels, true)) {
            $url = config('errormonitoring.slack_webhook_url');
            if ($url) {
                try {
                    Http::timeout(5)->post($url, ['text' => $text]);
                } catch (\Throwable) {
                }
            }
        }

        if (in_array('discord', $channels, true)) {
            $url = config('errormonitoring.discord_webhook_url');
            if ($url) {
                try {
                    Http::timeout(5)->post($url, ['content' => $text]);
                } catch (\Throwable) {
                }
            }
        }
    }

    protected function isExcludedPath(string $path): bool
    {
        return in_array($path, config('errormonitoring.exclude_paths', []), true);
    }

    protected function isAssetRequest(string $path): bool
    {
        $extensions = config('errormonitoring.exclude_extensions', []);

        foreach ($extensions as $ext) {
            if (Str::endsWith($path, ".{$ext}")) {
                return true;
            }
        }

        return Str::startsWith($path, ['assets/', 'build/', 'storage/', 'vendor/']);
    }

    protected function isBotRequest(Request $request): bool
    {
        $ua = strtolower((string) $request->userAgent());

        $bots = ['bot', 'crawl', 'spider', 'slurp', 'curl', 'wget', 'python', 'go-http', 'scanner', 'nikto', 'sqlmap'];

        foreach ($bots as $bot) {
            if (str_contains($ua, $bot)) {
                return true;
            }
        }

        return false;
    }
}
