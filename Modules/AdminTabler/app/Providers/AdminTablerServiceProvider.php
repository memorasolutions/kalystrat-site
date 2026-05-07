<?php

declare(strict_types=1);

namespace Modules\AdminTabler\Providers;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Nwidart\Modules\Support\ModuleServiceProvider;

class AdminTablerServiceProvider extends ModuleServiceProvider
{
    protected string $name = 'AdminTabler';
    protected string $nameLower = 'admintabler';

    protected array $providers = [
        EventServiceProvider::class,
        RouteServiceProvider::class,
    ];

    public function boot(): void
    {
        parent::boot();

        $this->registerAnonymousComponents();
        $this->registerViewComposers();
        $this->registerBladeDirectives();
        $this->registerPublishables();
    }

    /**
     * Enregistrer le namespace des composants Blade anonymes.
     * Permet l'usage <x-admintabler::sidebar />, <x-admintabler::navbar />, etc.
     */
    private function registerAnonymousComponents(): void
    {
        Blade::anonymousComponentPath(
            module_path($this->name) . '/resources/views/components',
            'admintabler'
        );
    }

    /**
     * Partager les variables admin theme à toutes les vues admintabler::*.
     */
    private function registerViewComposers(): void
    {
        View::composer('admintabler::*', function ($view) {
            $config = config('admintabler');

            $view->with([
                'adminThemeConfig' => $config,
                'adminBranding' => $this->resolveBranding($config['branding'] ?? []),
                'adminFeatures' => $config['features'] ?? [],
                'adminLayout' => $config['layout'] ?? 'navbar-overlap',
            ]);
        });
    }

    /**
     * Branding dynamique : DB settings.branding > config > defaults.
     * Compatible cross-projets (les projets peuvent override via DB).
     */
    private function resolveBranding(array $defaults): array
    {
        $dbBranding = [];

        if (function_exists('app') && app()->bound('settings')) {
            try {
                $dbBranding = app('settings')->getGroup('branding') ?? [];
            } catch (\Throwable $e) {
                $dbBranding = [];
            }
        }

        return array_merge($defaults, array_filter($dbBranding));
    }

    /**
     * Directives Blade utilitaires.
     */
    private function registerBladeDirectives(): void
    {
        Blade::directive('adminThemeAssets', function () {
            return "<?php echo \\Illuminate\\Support\\Facades\\Vite::useBuildDirectory('build')->withEntryPoints([
                'Modules/AdminTabler/resources/assets/sass/app.scss',
                'Modules/AdminTabler/resources/assets/js/app.js',
            ]); ?>";
        });

        Blade::if('adminFeature', function (string $feature) {
            return (bool) (config("admintabler.features.{$feature}") ?? false);
        });
    }

    /**
     * Publishables pour réutilisation cross-projets via vendor:publish.
     */
    private function registerPublishables(): void
    {
        $modulePath = module_path($this->name);

        $this->publishes([
            $modulePath . '/config/config.php' => config_path('admintabler.php'),
        ], 'admintabler-config');

        $this->publishes([
            $modulePath . '/resources/views' => resource_path('views/vendor/admintabler'),
        ], 'admintabler-views');

        $this->publishes([
            $modulePath . '/resources/assets' => resource_path('admintabler'),
        ], 'admintabler-assets');
    }
}
