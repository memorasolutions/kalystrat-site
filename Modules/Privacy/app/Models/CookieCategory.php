<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Privacy\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\HasActiveScope;
use Modules\Privacy\Database\Factories\CookieCategoryFactory;

class CookieCategory extends Model
{
    use HasActiveScope, HasFactory;

    protected $fillable = [
        'name',
        'label',
        'description',
        'required',
        'order',
        'is_active',
    ];

    protected $casts = [
        'required' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function scopeRequired($query)
    {
        return $query->where('required', true);
    }

    public function scopeOptional($query)
    {
        return $query->where('required', false);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    public function isRequired(): bool
    {
        return $this->required;
    }

    protected static function newFactory(): CookieCategoryFactory
    {
        return CookieCategoryFactory::new();
    }
}
