<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Api\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Api\Http\Resources\SettingResource;
use Modules\Settings\Models\Setting;

/**
 * @group Settings
 *
 * Public settings and admin settings management.
 */
class SettingsApiController extends BaseApiController
{
    /**
     * List all public settings.
     */
    public function index(): JsonResponse
    {
        $settings = Setting::where('is_public', true)->get();

        return $this->respondSuccess(SettingResource::collection($settings));
    }

    /**
     * Get a single public setting by key.
     */
    public function show(string $key): JsonResponse
    {
        $setting = Setting::where('key', $key)->where('is_public', true)->first();

        if (! $setting) {
            return $this->respondNotFound(__('Paramètre introuvable.'));
        }

        return $this->respondSuccess(new SettingResource($setting));
    }

    /**
     * Update a setting (requires manage_settings permission).
     */
    public function update(Request $request, string $key): JsonResponse
    {
        $validated = $request->validate([
            'value' => 'required',
        ]);

        $setting = Setting::set($key, $validated['value']);

        return $this->respondSuccess(new SettingResource($setting));
    }
}
