<?php

declare(strict_types=1);

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

namespace Modules\Testimonials\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Testimonials\Models\Testimonial;

/** @mixin Testimonial */
class TestimonialResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'author_name' => $this->author_name,
            'author_title' => $this->author_title,
            'author_avatar' => $this->author_avatar,
            'content' => $this->safeContent(),
            'rating' => (int) $this->rating,
            'created_at' => $this->created_at->toIso8601String(),
        ];
    }
}
