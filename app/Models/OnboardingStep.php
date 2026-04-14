<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\HasActiveScope;

class OnboardingStep extends Model
{
    use HasActiveScope;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'icon',
        'order',
        'is_active',
        'fields',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'fields' => 'array',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
