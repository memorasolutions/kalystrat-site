<?php

declare(strict_types=1);

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

use App\Http\Middleware\HoneypotProtection;
use App\Http\Middleware\RequestId;
use App\Http\Middleware\SetLocale;
use App\Http\Middleware\VerifyRecaptcha;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;
use Modules\Auth\Http\Middleware\CheckBlockedIp;
use Modules\Auth\Http\Middleware\EnsureOnboardingCompleted;
use Modules\Auth\Http\Middleware\EnsureTwoFactorAuthenticated;
use Modules\Auth\Http\Middleware\ForcePasswordChange;
use Modules\Core\Http\Middleware\ContentSecurityPolicy;
use Modules\Core\Http\Middleware\ForceHttps;
use Modules\Core\Http\Middleware\ForceJsonResponse;
use Modules\Core\Http\Middleware\SanitizeInput;
use Modules\Core\Http\Middleware\SecurityHeaders;
use Modules\Core\Http\Middleware\SetBackofficeTheme;
use Modules\ErrorMonitoring\Services\ErrorMonitoringService;
use Modules\Privacy\Http\Middleware\DetectPrivacyJurisdiction;
use Modules\Privacy\Http\Middleware\ResolveCookiePreferences;
use Modules\SaaS\Http\Middleware\EnsureSubscribed;
use Modules\SEO\Models\UrlRedirect;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Spatie\Permission\Middleware\RoleMiddleware;
use Spatie\Permission\Middleware\RoleOrPermissionMiddleware;
use Spatie\ResponseCache\Middlewares\CacheResponse;
use Spatie\ResponseCache\Middlewares\DoNotCacheResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->append(RequestId::class);
        $middleware->append(CheckBlockedIp::class);
        $middleware->append(SecurityHeaders::class);

        $aliases = [
            'csp' => ContentSecurityPolicy::class,
            'force-https' => ForceHttps::class,
            'sanitize' => SanitizeInput::class,
            'force-json' => ForceJsonResponse::class,
            'two.factor' => EnsureTwoFactorAuthenticated::class,
            'cacheResponse' => CacheResponse::class,
            'doNotCacheResponse' => DoNotCacheResponse::class,
            'honeypot' => HoneypotProtection::class,
            'recaptcha' => VerifyRecaptcha::class,
            'force.password.change' => ForcePasswordChange::class,
            'onboarding' => EnsureOnboardingCompleted::class,
            'subscribed' => EnsureSubscribed::class,
            'role' => RoleMiddleware::class,
            'permission' => PermissionMiddleware::class,
            'role_or_permission' => RoleOrPermissionMiddleware::class,
        ];

        $middleware->alias($aliases);

        $middleware->validateCsrfTokens(except: ['stripe/webhook']);
        $middleware->web(append: [
            SetLocale::class,
            DetectPrivacyJurisdiction::class,
            ResolveCookiePreferences::class,
            SetBackofficeTheme::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->reportable(function (Throwable $e) {
            if (app()->bound('sentry')) {
                app('sentry')->captureException($e);
            }

            // Error monitoring module (email + DB)
            if (app()->isProduction() && class_exists(ErrorMonitoringService::class)) {
                try {
                    $service = app(ErrorMonitoringService::class);
                    if ($service->shouldCapture($e, request())) {
                        $service->capture($e, request());
                    }
                } catch (Throwable) {
                    // Silencieux pour éviter boucles infinies
                }
            }
        });

        $exceptions->render(function (ValidationException $e, Request $request) {
            if ($request->is('api/*') || $request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Erreurs de validation.',
                    'errors' => $e->errors(),
                ], 422);
            }
        });

        $exceptions->render(function (AuthenticationException $e, Request $request) {
            if ($request->is('api/*') || $request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Non authentifié.',
                ], 401);
            }
        });

        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            if ($request->is('api/*') || $request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Ressource introuvable.',
                ], 404);
            }

            // Check URL redirects before returning 404
            $path = '/'.ltrim($request->path(), '/');
            $redirect = Cache::remember(
                "url_redirect:{$path}",
                config('cache-ttl.url_redirects', 3600),
                fn () => UrlRedirect::findRedirect($path),
            );

            if ($redirect) {
                $redirect->recordHit();
                Cache::forget("url_redirect:{$path}");

                return redirect($redirect->to_url, $redirect->status_code);
            }
        });

        $exceptions->render(function (AccessDeniedHttpException $e, Request $request) {
            if ($request->is('api/*') || $request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Accès interdit.',
                ], 403);
            }
        });

        $exceptions->render(function (MethodNotAllowedHttpException $e, Request $request) {
            if ($request->is('livewire*')) {
                return redirect()->back();
            }
        });

        $exceptions->render(function (TooManyRequestsHttpException $e, Request $request) {
            if ($request->is('api/*') || $request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Trop de requêtes. Veuillez réessayer plus tard.',
                ], 429);
            }
        });
    })->create();
