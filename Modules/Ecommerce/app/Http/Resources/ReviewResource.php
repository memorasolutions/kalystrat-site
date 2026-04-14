<?php

declare(strict_types=1);

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

namespace Modules\Ecommerce\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Ecommerce\Models\Review;

/** @mixin Review */
class ReviewResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'rating' => (int) $this->rating,
            'title' => $this->title,
            'body' => $this->body,
            'is_verified_purchase' => (bool) $this->is_verified_purchase,
            'created_at' => $this->created_at->toIso8601String(),
            'user' => $this->when($this->relationLoaded('user'), fn () => [
                'id' => $this->user->id,
                'name' => $this->user->name,
            ]),
            'product' => $this->when($this->relationLoaded('product'), fn () => [
                'id' => $this->product->id,
                'name' => $this->product->name,
                'slug' => $this->product->slug,
            ]),
        ];
    }
}
