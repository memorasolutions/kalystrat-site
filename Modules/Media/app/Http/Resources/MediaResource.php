<?php

declare(strict_types=1);

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

namespace Modules\Media\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/** @mixin Media */
class MediaResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'file_name' => $this->file_name,
            'mime_type' => $this->mime_type,
            'size' => $this->size,
            'url' => $this->getUrl(),
            'thumbnail' => $this->getThumbnailUrl(),
            'title' => $this->getCustomProperty('title', ''),
            'alt_text' => $this->getCustomProperty('alt_text', ''),
            'caption' => $this->getCustomProperty('caption', ''),
            'description' => $this->getCustomProperty('description', ''),
            'folder' => $this->getCustomProperty('folder', ''),
            'created_at' => $this->created_at?->toIso8601String(),
        ];
    }

    private function getThumbnailUrl(): string
    {
        try {
            return $this->resource->getUrl('thumbnail');
        } catch (\Throwable) {
            return $this->resource->getUrl();
        }
    }
}
