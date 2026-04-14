<?php

declare(strict_types=1);

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

namespace Modules\Ecommerce\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Ecommerce\Models\Product;

/** @mixin Product */
class ProductResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'short_description' => $this->short_description,
            'price' => (float) $this->price,
            'compare_price' => $this->compare_price ? (float) $this->compare_price : null,
            'sku' => $this->sku,
            'is_active' => (bool) $this->is_active,
            'is_featured' => (bool) $this->is_featured,
            'weight' => $this->weight ? (float) $this->weight : null,
            'categories' => $this->when($this->relationLoaded('categories'), fn () => $this->categories->map(fn ($category) => [
                'id' => $category->id,
                'name' => $category->name,
                'slug' => $category->slug,
            ])),
            'variants' => $this->when($this->relationLoaded('variants'), fn () => $this->variants->map(fn ($variant) => [
                'id' => $variant->id,
                'sku' => $variant->sku,
                'price' => (float) $variant->price,
                'stock' => $variant->stock,
                'is_active' => (bool) $variant->is_active,
            ])),
            'media' => $this->when($this->relationLoaded('media'), fn () => $this->getMedia('gallery')->map(fn ($media) => [
                'id' => $media->id,
                'url' => $media->getUrl(),
                'name' => $media->name,
                'mime_type' => $media->mime_type,
                'size' => $media->size,
            ])),
            'reviews_count' => $this->whenCounted('reviews'),
            'average_rating' => $this->when(isset($this->reviews_avg_rating), fn () => (float) $this->reviews_avg_rating),
        ];
    }
}
