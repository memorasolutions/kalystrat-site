<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Privacy\Providers;

use Modules\Core\Providers\BaseModuleServiceProvider;
use Modules\Privacy\Console\CleanupConsentsCommand;
use Modules\Privacy\Console\CookieScanCommand;

class PrivacyServiceProvider extends BaseModuleServiceProvider
{
    protected string $name = 'Privacy';

    protected string $nameLower = 'privacy';

    public function boot(): void
    {
        $this->bootModule();

        if ($this->app->runningInConsole()) {
            $this->commands([
                CleanupConsentsCommand::class,
                CookieScanCommand::class,
            ]);
        }
    }

    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
