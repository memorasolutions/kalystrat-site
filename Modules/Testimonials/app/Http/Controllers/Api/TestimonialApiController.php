<?php

declare(strict_types=1);

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

namespace Modules\Testimonials\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Modules\Api\Http\Controllers\BaseApiController;
use Modules\Testimonials\Models\Testimonial;

class TestimonialApiController extends BaseApiController
{
    public function index(): JsonResponse
    {
        $testimonials = Testimonial::approved()
            ->ordered()
            ->paginate(20);

        return $this->respondSuccess($testimonials);
    }
}
