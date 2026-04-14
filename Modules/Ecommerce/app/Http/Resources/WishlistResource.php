<?php

declare(strict_types=1);

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

namespace Modules\Ecommerce\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Ecommerce\Models\Wishlist;

/** @mixin Wishlist */
class WishlistResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'created_at' => $this->created_at->toIso8601String(),
            'product' => $this->when($this->relationLoaded('product'), fn () => [
                'id' => $this->product->id,
                'name' => $this->product->name,
                'slug' => $this->product->slug,
                'price' => (float) $this->product->price,
                'is_active' => (bool) $this->product->is_active,
            ]),
        ];
    }
}
