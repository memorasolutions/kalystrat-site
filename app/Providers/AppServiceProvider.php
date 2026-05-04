<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace App\Providers;

use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Laravel\Pennant\Feature;
use Nwidart\Modules\Facades\Module;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->validateEnvironment();

        if (app()->isProduction()) {
            URL::forceScheme('https');
        }

        Model::automaticallyEagerLoadRelationships();
        Model::preventLazyLoading(! app()->isProduction());

        Paginator::useBootstrapFive();

        // Modules avancés (désactivés par défaut)
        Feature::define('module-saas', false);
        Feature::define('module-tenancy', false);
        Feature::define('module-ai', false);
        Feature::define('module-team', false);
        Feature::define('module-abtest', false);
        Feature::define('module-import', false);
        Feature::define('module-sms', false);

        // Modules business (activés par défaut)
        Feature::define('module-blog', true);
        Feature::define('module-newsletter', true);
        Feature::define('module-faq', true);
        Feature::define('module-testimonials', true);
        Feature::define('module-widget', true);
        Feature::define('module-formbuilder', true);
        Feature::define('module-customfields', true);

        // Fonctionnalités optionnelles (désactivées par défaut)
        Feature::define('social-login', false);
        Feature::define('realtime-notifications', false);
        Feature::define('locale-es', false);
        Feature::define('usage-billing', false);
        Feature::define('referral-program', false);
        Feature::define('email-preview', false);
        Feature::define('status-page', false);
        Feature::define('storage-admin', false);
        Feature::define('dark-mode-frontend', false);
        Feature::define('user-documentation', false);

        // Modules infrastructure (activés par défaut)
        Feature::define('module-translation', true);
        Feature::define('module-search', true);
        Feature::define('module-export', true);
        Feature::define('module-webhooks', true);
        Feature::define('module-media', true);
        Feature::define('module-backup', true);

        $this->configureRateLimiting();
        $this->configureQueueFailureHandling();
        $this->configureObservabilityGates();
    }

    /**
     * Restreint l'accès aux dashboards d'observabilité (Pulse, Telescope) au super_admin.
     * Sans ces Gates, /pulse et /telescope sont accessibles publiquement en prod.
     */
    protected function configureObservabilityGates(): void
    {
        Gate::define('viewPulse', function (User $user) {
            return $user->hasRole('super_admin');
        });

        Gate::define('viewTelescope', function (User $user) {
            return $user->hasRole('super_admin');
        });
    }

    protected function configureQueueFailureHandling(): void
    {
        Queue::failing(function (JobFailed $event) {
            Log::error('Queue job failed', [
                'job' => $event->job->resolveName(),
                'connection' => $event->connectionName,
                'exception' => $event->exception->getMessage(),
            ]);
        });
    }

    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            if (! $request->user()) {
                return Limit::perMinute(30)->by($request->ip());
            }

            $limit = (int) config('saas.rate_limits.default', 120);

            if (Module::isEnabled('SaaS') && $request->user()->subscribed('default')) {
                $subscription = $request->user()->subscription('default');
                $price = $subscription?->stripe_price;

                $planLimits = config('saas.rate_limits.plans', []);
                $limit = $planLimits[$price] ?? (int) config('saas.rate_limits.subscribed', 300);
            }

            // Tenant-scoped: isole les limites par tenant en multi-tenant
            $tenantId = $request->user()->tenant_id ?? '';
            $key = $tenantId ? "{$tenantId}|{$request->user()->id}" : (string) $request->user()->id;

            return Limit::perMinute($limit)->by($key);
        });

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(15)->by($request->ip());
        });

        RateLimiter::for('sensitive', function (Request $request) {
            return Limit::perMinute(10)->by($request->user()?->id ?: $request->ip());
        });

        RateLimiter::for('export', function (Request $request) {
            return Limit::perMinute(10)->by($request->user()?->id ?: $request->ip());
        });

        RateLimiter::for('import', function (Request $request) {
            return Limit::perMinute(5)->by($request->user()?->id ?: $request->ip());
        });

        RateLimiter::for('search', function (Request $request) {
            return Limit::perMinute(30)->by($request->user()?->id ?: $request->ip());
        });

        RateLimiter::for('newsletter', function (Request $request) {
            return Limit::perMinute(5)->by($request->ip());
        });
    }

    private function validateEnvironment(): void
    {
        if (! app()->isProduction()) {
            return;
        }

        $fail = static function (string $message): never {
            Log::critical($message);

            throw new \RuntimeException($message);
        };

        $checks = [
            'app.key' => config('app.key'),
            'app.url' => config('app.url'),
            'database.connections.mysql.host' => config('database.connections.mysql.host'),
            'database.connections.mysql.database' => config('database.connections.mysql.database'),
            'mail.default' => config('mail.default'),
        ];

        foreach ($checks as $key => $value) {
            if (empty($value)) {
                $fail("Configuration requise manquante : {$key}");
            }
        }

        if (config('app.debug')) {
            $fail('APP_DEBUG doit être false en production.');
        }

        if (str_starts_with((string) config('app.url'), 'https://')) {
            if (! config('session.secure')) {
                $fail('SESSION_SECURE_COOKIE doit être true en production HTTPS.');
            }
        }
    }
}
