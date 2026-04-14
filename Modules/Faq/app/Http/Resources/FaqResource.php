<?php

declare(strict_types=1);

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

namespace Modules\Faq\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Faq\Models\Faq;

/** @mixin Faq */
class FaqResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'question' => $this->question,
            'answer' => $this->safeAnswer(),
            'category' => $this->category,
            'order' => $this->order,
            'published_at' => $this->published_at?->toIso8601String(),
        ];
    }
}
