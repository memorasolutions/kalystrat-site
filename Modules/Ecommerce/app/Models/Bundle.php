<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Core\Traits\HasActiveScope;

class Bundle extends Model
{
    use HasActiveScope, HasFactory, SoftDeletes;

    protected $table = 'ecommerce_bundles';

    protected $fillable = [
        'name', 'slug', 'description', 'pricing_type',
        'fixed_price', 'discount_percentage', 'is_active', 'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'fixed_price' => 'float',
        'discount_percentage' => 'integer',
        'sort_order' => 'integer',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(BundleItem::class);
    }

    public function calculatePrice(): float
    {
        $itemsTotal = $this->getItemsTotal();

        return round(match ($this->pricing_type) {
            'fixed' => (float) ($this->fixed_price ?? $itemsTotal),
            'percentage' => $itemsTotal * (1 - ($this->discount_percentage ?? 0) / 100),
            'sum' => $itemsTotal,
            default => $itemsTotal,
        }, 2);
    }

    public function getSavingsAmount(): float
    {
        return round(max(0, $this->getItemsTotal() - $this->calculatePrice()), 2);
    }

    public function getItemsTotal(): float
    {
        /** @var Collection<int, BundleItem> $items */
        $items = $this->items->loadMissing('variant');

        return (float) $items->sum(fn (BundleItem $item) => ($item->variant->price ?? 0) * $item->quantity);
    }

    public function canFulfill(): bool
    {
        return $this->items->loadMissing('variant')->every(
            fn (BundleItem $item) => $item->variant && $item->variant->stock >= $item->quantity
        );
    }
}
