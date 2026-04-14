<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Newsletter\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Event;
use Modules\Core\Providers\BaseModuleServiceProvider;
use Modules\Newsletter\Console\DigestCommand;
use Modules\Newsletter\Console\ProcessWorkflowsCommand;
use Modules\Newsletter\Listeners\WorkflowTriggerListener;

class NewsletterServiceProvider extends BaseModuleServiceProvider
{
    protected string $name = 'Newsletter';

    protected string $nameLower = 'newsletter';

    public function boot(): void
    {
        $this->bootModule();

        $this->commands([
            DigestCommand::class,
            ProcessWorkflowsCommand::class,
        ]);

        Event::listen(Registered::class, [WorkflowTriggerListener::class, 'handleRegistered']);

        Blade::anonymousComponentPath(
            module_path('Newsletter', 'resources/views/components'),
            'newsletter'
        );
    }

    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->singleton(NewsletterMetricProvider::class);
        $this->app->tag([NewsletterMetricProvider::class], 'metric_providers');
    }
}
