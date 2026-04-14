<?php

declare(strict_types=1);

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

namespace Modules\Ecommerce\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Ecommerce\Models\CartItem;

/** @mixin CartItem */
class CartItemResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'quantity' => $this->quantity,
            'variant' => $this->when($this->relationLoaded('variant'), fn () => [
                'id' => $this->variant->id,
                'sku' => $this->variant->sku,
                'price' => (float) $this->variant->price,
                'product_name' => $this->variant->product?->name,
            ]),
        ];
    }
}
