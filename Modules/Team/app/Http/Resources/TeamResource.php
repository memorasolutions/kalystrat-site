<?php

declare(strict_types=1);

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

namespace Modules\Team\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Team\Models\Team;

/** @mixin Team */
class TeamResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'logo' => $this->logo,
            'created_at' => $this->created_at->toIso8601String(),
            'owner' => $this->when($this->relationLoaded('owner'), fn () => [
                'id' => $this->owner->id,
                'name' => $this->owner->name,
            ]),
            'members_count' => $this->whenCounted('members'),
        ];
    }
}
