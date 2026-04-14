<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Privacy\Console;

use Illuminate\Console\Command;
use Symfony\Component\Finder\Finder;

class CookieScanCommand extends Command
{
    protected $signature = 'privacy:cookie-scan {--json : Output as JSON}';

    protected $description = 'Scan project source code for cookie usage and list all cookies';

    public function handle(): int
    {
        $cookies = array_merge(
            $this->getKnownCookies(),
            $this->scanSourceCode(),
        );

        // Deduplicate by name
        $unique = [];
        foreach ($cookies as $cookie) {
            $unique[$cookie['name']] = $cookie;
        }
        $cookies = array_values($unique);

        if ($this->option('json')) {
            $this->line((string) json_encode($cookies, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

            return self::SUCCESS;
        }

        $this->info(count($cookies).' cookies detected:');
        $this->newLine();

        $this->table(
            ['Name', 'Duration', 'HttpOnly', 'Secure', 'SameSite', 'Source'],
            array_map(fn (array $c) => [
                $c['name'],
                $c['duration'],
                $c['httpOnly'] ? 'yes' : 'no',
                $c['secure'] ? 'yes' : 'no',
                $c['sameSite'],
                $c['source'],
            ], $cookies),
        );

        return self::SUCCESS;
    }

    private function getKnownCookies(): array
    {
        $sessionLifetime = (int) config('session.lifetime', 120);
        $sessionSecure = (bool) config('session.secure', false);
        $sessionSameSite = (string) config('session.same_site', 'lax');
        $sessionCookie = (string) config('session.cookie', 'laravel_session');

        return [
            [
                'name' => $sessionCookie,
                'duration' => $sessionLifetime.' min',
                'httpOnly' => true,
                'secure' => $sessionSecure,
                'sameSite' => $sessionSameSite,
                'source' => 'Laravel (config/session.php)',
            ],
            [
                'name' => 'XSRF-TOKEN',
                'duration' => $sessionLifetime.' min',
                'httpOnly' => false,
                'secure' => $sessionSecure,
                'sameSite' => $sessionSameSite,
                'source' => 'Laravel (VerifyCsrfToken)',
            ],
            [
                'name' => 'cookie_consent',
                'duration' => '365 days',
                'httpOnly' => false,
                'secure' => true,
                'sameSite' => 'Lax',
                'source' => 'Modules/Privacy',
            ],
        ];
    }

    private function scanSourceCode(): array
    {
        $cookies = [];
        $dirs = array_filter([
            app_path(),
            base_path('Modules'),
            config_path(),
        ], 'is_dir');

        $finder = Finder::create()
            ->in($dirs)
            ->name('*.php')
            ->notName('CookieScanCommand.php')
            ->contains('/Cookie::(make|queue|forget)|cookie\s*\(/');

        foreach ($finder as $file) {
            $content = $file->getContents();
            $relativePath = str_replace(base_path().'/', '', $file->getRealPath());

            // Match Cookie::make('name', ...) and Cookie::queue('name', ...)
            if (preg_match_all("/Cookie::(?:make|queue|forget)\s*\(\s*['\"]([^'\"]+)['\"]/", $content, $matches)) {
                foreach ($matches[1] as $name) {
                    $cookies[] = [
                        'name' => $name,
                        'duration' => 'see source',
                        'httpOnly' => true,
                        'secure' => true,
                        'sameSite' => 'Lax',
                        'source' => $relativePath,
                    ];
                }
            }

            // Match cookie('name', ...) helper
            if (preg_match_all("/(?<!\w)cookie\s*\(\s*['\"]([^'\"]+)['\"]/", $content, $matches)) {
                foreach ($matches[1] as $name) {
                    $cookies[] = [
                        'name' => $name,
                        'duration' => 'see source',
                        'httpOnly' => true,
                        'secure' => true,
                        'sameSite' => 'Lax',
                        'source' => $relativePath,
                    ];
                }
            }
        }

        return $cookies;
    }
}
