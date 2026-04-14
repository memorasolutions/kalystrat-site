<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Core\Traits\HasActiveScope;
use Modules\Ecommerce\Database\Factories\CategoryFactory;

class Category extends Model
{
    use HasActiveScope, HasFactory, SoftDeletes;

    protected $table = 'ecommerce_categories';

    protected static function newFactory(): CategoryFactory
    {
        return CategoryFactory::new();
    }

    protected $fillable = [
        'name', 'slug', 'description', 'image', 'parent_id', 'position', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'ecommerce_product_category');
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('position');
    }
}
