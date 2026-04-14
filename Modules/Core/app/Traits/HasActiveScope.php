<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Core\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasActiveScope
{
    public function scopeActive(Builder $query): void
    {
        $query->where('is_active', true);
    }
}
