<?php

declare(strict_types=1);

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

namespace Modules\Ecommerce\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Ecommerce\Models\Cart;

/** @mixin Cart */
class CartResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'items_count' => $this->whenCounted('items'),
            'items' => CartItemResource::collection($this->whenLoaded('items')),
            'coupon' => $this->when($this->relationLoaded('coupon') && $this->coupon, fn () => [
                'id' => $this->coupon->id,
                'code' => $this->coupon->code,
                'discount' => (float) $this->coupon->discount,
            ]),
        ];
    }
}
