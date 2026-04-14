<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Api\Http\Controllers\BaseApiController;
use Modules\Ecommerce\Http\Resources\ReviewResource;
use Modules\Ecommerce\Models\OrderItem;
use Modules\Ecommerce\Models\Product;
use Modules\Ecommerce\Models\Review;

class ReviewApiController extends BaseApiController
{
    public function index(Product $product): JsonResponse
    {
        $reviews = $product->reviews()
            ->approved()
            ->with('user:id,name')
            ->latest()
            ->paginate(10);

        return $this->respondSuccess(ReviewResource::collection($reviews));
    }

    public function store(Request $request, Product $product): JsonResponse
    {
        /** @var User $user */
        $user = $request->user();

        $validated = $request->validate([
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'title' => ['nullable', 'string', 'max:100'],
            'body' => ['required', 'string', 'max:2000'],
        ]);

        if (Review::where('user_id', $user->id)->where('product_id', $product->id)->exists()) {
            return $this->respondError(__('Vous avez déjà laissé un avis pour ce produit.'), 422);
        }

        $isVerified = OrderItem::query()
            ->whereHas('order', fn ($q) => $q->where('user_id', $user->id)->where('status', 'paid'))
            ->whereHas('variant', fn ($q) => $q->where('product_id', $product->id))
            ->exists();

        $review = Review::create([
            'product_id' => $product->id,
            'user_id' => $user->id,
            'rating' => $validated['rating'],
            'title' => $validated['title'] ?? null,
            'body' => $validated['body'],
            'is_verified_purchase' => $isVerified,
        ]);

        return $this->respondCreated(new ReviewResource($review), __('Avis soumis avec succès. Il sera visible après approbation.'));
    }
}
