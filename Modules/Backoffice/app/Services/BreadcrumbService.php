<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Backoffice\Services;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class BreadcrumbService
{
    /**
     * Auto-generate breadcrumbs from current route name.
     * Example: admin.blog.articles.create → [['label'=>'Blog','route'=>'admin.blog.articles.index'], ['label'=>'Articles','route'=>'admin.blog.articles.index'], ['label'=>'Créer']]
     *
     * @return array<int, array{label: string, route: string|null}>
     */
    public function generate(): array
    {
        $routeName = Route::currentRouteName();
        if (! $routeName || ! str_starts_with($routeName, 'admin.')) {
            return [];
        }

        $segments = explode('.', $routeName);
        array_shift($segments); // Remove 'admin'

        // Remove 'index' at end
        if (end($segments) === 'index') {
            array_pop($segments);
        }

        if (empty($segments)) {
            return [];
        }

        $breadcrumbs = [];
        $labels = config('breadcrumbs.labels', []);

        foreach ($segments as $index => $segment) {
            $label = $labels[$segment] ?? Str::ucfirst(str_replace('-', ' ', $segment));

            if ($label === '') {
                continue;
            }

            $isLast = $index === count($segments) - 1;

            if ($isLast) {
                $breadcrumbs[] = ['label' => $label, 'route' => null];
            } else {
                $parentSegments = array_slice($segments, 0, $index + 1);
                $potentialRoute = 'admin.'.implode('.', $parentSegments).'.index';

                $breadcrumbs[] = [
                    'label' => $label,
                    'route' => Route::has($potentialRoute) ? $potentialRoute : null,
                ];
            }
        }

        return $breadcrumbs;
    }
}
