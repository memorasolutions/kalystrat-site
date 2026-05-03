<?php

namespace Modules\Frontend\Providers;

use Nwidart\Modules\Support\ModuleServiceProvider;

class FrontendServiceProvider extends ModuleServiceProvider
{
    protected string $name = 'Frontend';
    protected string $nameLower = 'frontend';

    protected array $providers = [
        RouteServiceProvider::class,
    ];
}
