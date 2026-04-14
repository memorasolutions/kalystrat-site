<?php

declare(strict_types=1);

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

namespace Modules\Faq\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Api\Http\Controllers\BaseApiController;
use Modules\Faq\Http\Resources\FaqResource;
use Modules\Faq\Models\Faq;

class FaqApiController extends BaseApiController
{
    public function index(Request $request): JsonResponse
    {
        $query = Faq::published()->ordered();

        if ($request->filled('category')) {
            $query->byCategory($request->input('category'));
        }

        return $this->respondSuccess($query->paginate(20));
    }

    public function show(Faq $faq): JsonResponse
    {
        if (! $faq->is_published) {
            return $this->respondNotFound();
        }

        return $this->respondSuccess(new FaqResource($faq));
    }
}
