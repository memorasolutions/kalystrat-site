<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Core\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait HasApiFiltering
{
    /**
     * @param  array<string>  $allowedFilters
     */
    protected function applyFilters(Builder $query, Request $request, array $allowedFilters): Builder
    {
        $filters = $request->input('filter', []);

        if (! is_array($filters)) {
            return $query;
        }

        foreach ($filters as $field => $value) {
            if (in_array($field, $allowedFilters, true)) {
                $query->where($field, $value);
            }
        }

        return $query;
    }

    /**
     * @param  array<string>  $allowedSorts
     */
    protected function applySorting(Builder $query, Request $request, array $allowedSorts, string $defaultSort = '-created_at'): Builder
    {
        $sortParam = $request->input('sort', $defaultSort);

        if (empty($sortParam) || ! is_string($sortParam)) {
            return $query;
        }

        $direction = 'asc';
        $field = $sortParam;

        if (str_starts_with($sortParam, '-')) {
            $direction = 'desc';
            $field = ltrim($sortParam, '-');
        }

        if (in_array($field, $allowedSorts, true)) {
            $query->orderBy($field, $direction);
        }

        return $query;
    }

    protected function getPerPage(Request $request, int $default = 15, int $max = 100): int
    {
        $perPage = (int) $request->input('per_page', $default);

        return max(1, min($perPage, $max));
    }
}
