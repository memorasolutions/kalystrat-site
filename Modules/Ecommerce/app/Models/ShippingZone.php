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
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Core\Traits\HasActiveScope;
use Modules\Ecommerce\Database\Factories\ShippingZoneFactory;

class ShippingZone extends Model
{
    use HasActiveScope, HasFactory;

    protected $table = 'ecommerce_shipping_zones';

    protected $fillable = ['name', 'regions', 'is_active', 'sort_order'];

    protected $casts = [
        'regions' => 'array',
        'is_active' => 'boolean',
    ];

    public function methods(): HasMany
    {
        return $this->hasMany(ShippingMethod::class);
    }

    public function scopeForProvince(Builder $query, string $province): Builder
    {
        return $query->whereJsonContains('regions', strtoupper($province));
    }

    protected static function newFactory(): ShippingZoneFactory
    {
        return ShippingZoneFactory::new();
    }
}
