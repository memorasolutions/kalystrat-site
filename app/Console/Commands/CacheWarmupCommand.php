<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Modules\Menu\Models\Menu;
use Modules\Menu\Services\MenuService;
use Modules\SEO\Models\UrlRedirect;
use Modules\Settings\Models\Setting;

class CacheWarmupCommand extends Command
{
    protected $signature = 'app:cache-warmup';

    protected $description = 'Pre-load frequently accessed data into cache after deployment';

    public function handle(): int
    {
        $this->info('Cache warmup starting...');

        $this->warmSettings();
        $this->warmMenus();
        $this->warmBranding();
        $this->warmUrlRedirects();

        $this->info('Cache warmup completed.');

        return Command::SUCCESS;
    }

    private function warmSettings(): void
    {
        if (! class_exists(Setting::class)) {
            return;
        }

        $settings = Setting::all();
        $ttl = config('cache-ttl.settings', 3600);

        foreach ($settings as $setting) {
            Cache::put("setting.{$setting->key}", $setting->value, $ttl);
        }

        $this->info("  Settings: {$settings->count()} cached");
    }

    private function warmMenus(): void
    {
        if (! class_exists(MenuService::class)) {
            return;
        }

        $service = app(MenuService::class);
        $locations = array_keys($service->getAvailableLocations());

        $dbLocations = Menu::distinct()->pluck('location')->filter()->toArray();
        $allLocations = array_unique(array_merge($locations, $dbLocations));

        foreach ($allLocations as $location) {
            $service->getByLocation($location);
        }

        $this->info('  Menus: '.count($allLocations).' locations cached');
    }

    private function warmBranding(): void
    {
        if (! class_exists(Setting::class)) {
            return;
        }

        $brandingKeys = ['site_name', 'site_logo', 'site_favicon', 'primary_color', 'secondary_color'];
        $branding = Setting::whereIn('key', $brandingKeys)->pluck('value', 'key')->toArray();

        Cache::put('branding_settings', $branding, config('cache-ttl.branding', 3600));

        $this->info('  Branding: cached');
    }

    private function warmUrlRedirects(): void
    {
        if (! class_exists(UrlRedirect::class)) {
            return;
        }

        $redirects = UrlRedirect::where('is_active', true)->get();
        $ttl = config('cache-ttl.url_redirects', 3600);

        foreach ($redirects as $redirect) {
            Cache::put("url_redirect:{$redirect->from_url}", $redirect, $ttl);
        }

        $this->info("  URL redirects: {$redirects->count()} cached");
    }
}
