<?php

declare(strict_types=1);

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

namespace Modules\Media\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Api\Http\Controllers\BaseApiController;
use Modules\Media\Http\Resources\MediaResource;
use Modules\Media\Models\MediaUpload;
use Modules\Media\Services\MediaService;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaApiController extends BaseApiController
{
    public function __construct(
        protected MediaService $mediaService,
    ) {}

    public function index(Request $request): JsonResponse
    {
        $query = Media::query()
            ->where('collection_name', 'images')
            ->orderByDesc('created_at');

        if ($request->filled('search')) {
            $search = str_replace(['%', '_'], ['\%', '\_'], (string) $request->input('search'));
            $query->where('file_name', 'LIKE', '%'.$search.'%');
        }

        if ($request->filled('folder')) {
            $query->where('custom_properties->folder', $request->input('folder'));
        }

        return $this->respondSuccess($query->paginate(24));
    }

    public function show(int $id): JsonResponse
    {
        $media = Media::find($id);

        if (! $media) {
            return $this->respondNotFound();
        }

        return $this->respondSuccess(new MediaResource($media));
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png,gif,webp,svg|max:10240',
            'title' => 'nullable|string|max:255',
            'alt_text' => 'nullable|string|max:255',
        ]);

        $container = MediaUpload::firstOrCreate(['name' => 'general']);

        $media = $container
            ->addMedia($request->file('file'))
            ->toMediaCollection('images');

        foreach (['title', 'alt_text'] as $field) {
            if ($request->filled($field)) {
                $media->setCustomProperty($field, $request->input($field));
            }
        }
        if ($request->hasAny(['title', 'alt_text'])) {
            $media->save();
        }

        return $this->respondCreated(new MediaResource($media));
    }

    public function destroy(int $id): JsonResponse
    {
        $this->mediaService->deleteMedia($id);

        return $this->respondNoContent();
    }
}
