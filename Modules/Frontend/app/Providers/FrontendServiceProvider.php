<?php

declare(strict_types=1);

namespace Modules\Frontend\Providers;

use Illuminate\Support\Facades\Blade;
use Nwidart\Modules\Support\ModuleServiceProvider;

class FrontendServiceProvider extends ModuleServiceProvider
{
    protected string $name = 'Frontend';
    protected string $nameLower = 'frontend';

    protected array $providers = [
        RouteServiceProvider::class,
    ];

    public function boot(): void
    {
        parent::boot();

        Blade::anonymousComponentPath(
            module_path($this->name, 'resources/views/components'),
            $this->nameLower
        );
    }
}
