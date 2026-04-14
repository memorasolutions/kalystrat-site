<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Api\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Settings\Models\Setting;

/** @mixin Setting */
final class SettingResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'group' => $this->group,
            'key' => $this->key,
            'value' => $this->typed_value,
            'type' => $this->type,
            'description' => $this->description,
            'is_public' => (bool) $this->is_public,
            'updated_at' => $this->updated_at?->toIso8601String(),
        ];
    }
}
