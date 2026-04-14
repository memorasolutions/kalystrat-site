<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Api\Http\Controllers\BaseApiController;
use Modules\Ecommerce\Models\Bundle;
use Modules\Ecommerce\Services\BundleService;
use Modules\Ecommerce\Services\CartService;

class BundleApiController extends BaseApiController
{
    public function index(): JsonResponse
    {
        $bundles = Bundle::active()
            ->with('items.variant.product')
            ->orderBy('sort_order')
            ->get()
            ->map(fn (Bundle $bundle) => [
                'id' => $bundle->id,
                'name' => $bundle->name,
                'slug' => $bundle->slug,
                'description' => $bundle->description,
                'price' => $bundle->calculatePrice(),
                'savings' => $bundle->getSavingsAmount(),
                'items' => $bundle->items,
            ]);

        return $this->respondSuccess($bundles);
    }

    public function show(Bundle $bundle): JsonResponse
    {
        $bundle->load('items.variant.product');

        return $this->respondSuccess([
            'bundle' => $bundle,
            'price' => $bundle->calculatePrice(),
            'savings' => $bundle->getSavingsAmount(),
            'available' => $bundle->canFulfill(),
        ]);
    }

    public function addToCart(Request $request, Bundle $bundle, BundleService $bundleService, CartService $cartService): JsonResponse
    {
        $cart = $cartService->getOrCreateCart($request->user());

        $bundleService->addBundleToCart($cart, $bundle);

        return $this->respondSuccess(message: __('Bundle ajouté au panier.'));
    }
}
