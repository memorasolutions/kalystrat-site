<?php

declare(strict_types=1);

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

namespace Modules\Ecommerce\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Ecommerce\Models\Order;

/** @mixin Order */
class OrderResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'order_number' => $this->order_number,
            'status' => $this->status,
            'subtotal' => (float) $this->subtotal,
            'shipping_cost' => (float) $this->shipping_cost,
            'tax_amount' => (float) $this->tax_amount,
            'discount_amount' => (float) $this->discount_amount,
            'total' => (float) $this->total,
            'shipping_method' => $this->shipping_method,
            'tracking_number' => $this->tracking_number,
            'notes' => $this->notes,
            'paid_at' => $this->paid_at?->toIso8601String(),
            'shipped_at' => $this->shipped_at?->toIso8601String(),
            'delivered_at' => $this->delivered_at?->toIso8601String(),
            'created_at' => $this->created_at->toIso8601String(),
            'items' => $this->when($this->relationLoaded('items'), fn () => $this->items->map(fn ($item) => [
                'id' => $item->id,
                'product_name' => $item->product_name,
                'variant_label' => $item->variant_label,
                'price' => (float) $item->price,
                'quantity' => $item->quantity,
                'total' => (float) $item->total,
            ])),
            'user' => $this->when($this->relationLoaded('user'), fn () => [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'email' => $this->user->email,
            ]),
        ];
    }
}
