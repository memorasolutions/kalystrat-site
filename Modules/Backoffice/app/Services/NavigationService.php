<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Backoffice\Services;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Modules\AI\Models\Ticket;
use Modules\Backoffice\Models\NavigationItem;
use Modules\Ecommerce\Models\Order;
use Modules\ErrorMonitoring\Models\ErrorLog;
use Nwidart\Modules\Facades\Module;

class NavigationService
{
    private const CACHE_TAG = 'navigation';

    private const CACHE_DURATION = 3600;

    /**
     * @return array<int, array<string, mixed>>
     */
    public function getNavigation(User $user): array
    {
        $cacheKey = 'nav_main_'.$user->id;

        return $this->cacheRemember($cacheKey, function () use ($user) {
            $sections = $this->getRawSections();
            $filtered = [];

            foreach ($sections as $section) {
                $items = $this->filterItems($section['items'] ?? [], $user);

                if (! empty($items)) {
                    $filtered[] = [
                        'label' => $section['label'],
                        'icon' => $section['icon'] ?? null,
                        'items' => $items,
                    ];
                }
            }

            return $filtered;
        });
    }

    /**
     * @return array{items: array<int, array<string, mixed>>, overflow: array<int, array<string, mixed>>}
     */
    public function getBottomBar(User $user): array
    {
        $cacheKey = 'nav_bottom_'.$user->id;

        return $this->cacheRemember($cacheKey, function () use ($user) {
            $config = $this->getRawBottomBar();
            $items = $this->filterItems($config, $user);

            return [
                'items' => array_slice($items, 0, 4),
                'overflow' => array_slice($items, 4),
            ];
        });
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function search(string $query, User $user): array
    {
        $sections = $this->getRawSections();
        $results = [];
        $query = Str::lower($query);

        foreach ($sections as $section) {
            $this->searchItems($section['items'] ?? [], $user, $query, $results);
        }

        return array_slice($results, 0, 10);
    }

    public static function invalidateCache(): void
    {
        try {
            Cache::tags(self::CACHE_TAG)->flush();
        } catch (\BadMethodCallException) {
            Cache::forget('nav_main_*');
            Cache::forget('nav_bottom_*');
        }
    }

    /**
     * @return array<string, int>
     */
    public function getBadges(): array
    {
        return $this->cacheRemember('nav_badges', function () {
            $badges = [];
            $checks = [
                ['admin.ai.conversations.index', Ticket::class, 'status', 'open'],
                ['admin.ecommerce.orders.index', Order::class, 'status', 'pending'],
                ['admin.error-monitoring.index', ErrorLog::class, 'resolved', false],
            ];

            foreach ($checks as [$route, $model, $column, $value]) {
                if (class_exists($model)) {
                    try {
                        $count = $model::where($column, $value)->count();
                        if ($count > 0) {
                            $badges[$route] = $count;
                        }
                    } catch (\Throwable) {
                    }
                }
            }

            try {
                $count = DB::table('failed_jobs')->count();
                if ($count > 0) {
                    $badges['admin.failed-jobs.index'] = $count;
                }
            } catch (\Throwable) {
            }

            return $badges;
        });
    }

    private function cacheRemember(string $key, \Closure $callback): mixed
    {
        try {
            return Cache::tags(self::CACHE_TAG)->remember($key, self::CACHE_DURATION, $callback);
        } catch (\BadMethodCallException) {
            return Cache::remember($key, self::CACHE_DURATION, $callback);
        }
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private function filterItems(array $items, User $user): array
    {
        $filtered = [];

        foreach ($items as $item) {
            if (! $this->isVisible($item, $user)) {
                continue;
            }

            $processed = [
                'label' => $item['label'],
                'icon' => $item['icon'] ?? null,
                'route' => $item['route'] ?? null,
            ];

            if (isset($item['children'])) {
                $children = $this->filterItems($item['children'], $user);
                if (empty($children)) {
                    continue;
                }
                $processed['children'] = $children;
            }

            if ($processed['route'] !== null || isset($processed['children'])) {
                $filtered[] = $processed;
            }
        }

        return $filtered;
    }

    private function isVisible(array $item, User $user): bool
    {
        if (isset($item['module'])) {
            if (! Module::has($item['module']) || ! Module::isEnabled($item['module'])) {
                return false;
            }
        }

        if (isset($item['permission']) && ! Gate::forUser($user)->allows($item['permission'])) {
            return false;
        }

        if (isset($item['route']) && ! Route::has($item['route'])) {
            return false;
        }

        return true;
    }

    private function searchItems(array $items, User $user, string $query, array &$results): void
    {
        foreach ($items as $item) {
            if (! $this->isVisible($item, $user)) {
                continue;
            }

            if (Str::contains(Str::lower($item['label']), $query)) {
                $results[] = [
                    'label' => $item['label'],
                    'icon' => $item['icon'] ?? null,
                    'route' => $item['route'] ?? null,
                ];
            }

            if (isset($item['children'])) {
                $this->searchItems($item['children'], $user, $query, $results);
            }
        }
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private function getRawSections(): array
    {
        if ($this->hasNavigationTable()) {
            $items = NavigationItem::sidebar()->active()->topLevel()->ordered()
                ->with(['children' => fn ($q) => $q->active()->ordered()->with(['children' => fn ($q2) => $q2->active()->ordered()])])
                ->get();

            if ($items->isNotEmpty()) {
                return $items->groupBy('section')->map(function ($sectionItems, $sectionLabel) {
                    return [
                        'label' => $sectionLabel ?: $sectionItems->first()->label,
                        'icon' => $sectionItems->first()->icon,
                        'items' => $sectionItems->map(fn ($item) => $this->dbItemToArray($item))->values()->all(),
                    ];
                })->values()->all();
            }
        }

        return config('navigation.sections', []);
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private function getRawBottomBar(): array
    {
        if ($this->hasNavigationTable()) {
            $items = NavigationItem::bottomBar()->active()->ordered()->get();

            if ($items->isNotEmpty()) {
                return $items->map(fn ($item) => $this->dbItemToArray($item))->values()->all();
            }
        }

        return config('navigation.bottom_bar', []);
    }

    private function dbItemToArray(NavigationItem $item): array
    {
        $result = ['label' => $item->translatedLabel(), 'icon' => $item->icon];

        if ($item->route) {
            $result['route'] = $item->route;
        }
        if ($item->permission) {
            $result['permission'] = $item->permission;
        }
        if ($item->module) {
            $result['module'] = $item->module;
        }

        if ($item->children->isNotEmpty()) {
            $result['children'] = $item->children->map(fn ($child) => $this->dbItemToArray($child))->values()->all();
        }

        return $result;
    }

    private function hasNavigationTable(): bool
    {
        static $exists = null;

        return $exists ??= Schema::hasTable('navigation_items');
    }
}
