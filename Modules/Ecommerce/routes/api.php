<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Ecommerce\Http\Controllers\Api\BundleApiController;
use Modules\Ecommerce\Http\Controllers\Api\CartApiController;
use Modules\Ecommerce\Http\Controllers\Api\CheckoutApiController;
use Modules\Ecommerce\Http\Controllers\Api\DigitalDownloadController;
use Modules\Ecommerce\Http\Controllers\Api\OrderApiController;
use Modules\Ecommerce\Http\Controllers\Api\ProductApiController;
use Modules\Ecommerce\Http\Controllers\Api\ReviewApiController;
use Modules\Ecommerce\Http\Controllers\Api\WishlistApiController;
use Modules\Ecommerce\Services\CheckoutService;
use Stripe\Exception\SignatureVerificationException;

// Public
Route::prefix('ecommerce')->middleware('throttle:60,1')->group(function () {
    Route::get('/products', [ProductApiController::class, 'index']);
    Route::get('/products/{slug}', [ProductApiController::class, 'show']);
    Route::get('/products/{product}/related', [ProductApiController::class, 'related']);

    // Reviews (public: read)
    Route::get('/products/{product}/reviews', [ReviewApiController::class, 'index']);

    // Bundles (public: read)
    Route::get('/bundles', [BundleApiController::class, 'index']);
    Route::get('/bundles/{bundle}', [BundleApiController::class, 'show']);
});

// Authenticated
Route::prefix('ecommerce')->middleware('auth:sanctum')->group(function () {
    // Cart
    Route::get('/cart', [CartApiController::class, 'index']);
    Route::post('/cart/items', [CartApiController::class, 'addItem']);
    Route::put('/cart/items/{item}', [CartApiController::class, 'updateItem']);
    Route::delete('/cart/items/{item}', [CartApiController::class, 'removeItem']);
    Route::delete('/cart', [CartApiController::class, 'clear']);

    // Bundles (add to cart)
    Route::post('/bundles/{bundle}/add-to-cart', [BundleApiController::class, 'addToCart']);

    // Checkout (redirect mode)
    Route::post('/checkout', [CheckoutApiController::class, 'checkout']);

    // Checkout (embedded mode — Apple Pay, Google Pay, BNPL)
    Route::post('/checkout/embedded', [CheckoutApiController::class, 'embeddedCheckout']);
    Route::get('/checkout/session-status', [CheckoutApiController::class, 'sessionStatus']);

    // Orders
    Route::get('/orders', [OrderApiController::class, 'index']);
    Route::get('/orders/{order}', [OrderApiController::class, 'show']);

    // Wishlist
    Route::get('/wishlist', [WishlistApiController::class, 'index']);
    Route::post('/wishlist', [WishlistApiController::class, 'store']);
    Route::delete('/wishlist/{wishlist}', [WishlistApiController::class, 'destroy']);

    // Reviews (auth: write)
    Route::post('/products/{product}/reviews', [ReviewApiController::class, 'store']);

    // Digital downloads
    Route::get('/orders/{order}/downloads', [DigitalDownloadController::class, 'links']);
});

// Digital download (signed URL, no auth needed)
Route::get('/ecommerce/download/{asset}/{order}', [DigitalDownloadController::class, 'download'])
    ->name('ecommerce.download');

// Stripe webhook (no auth, verified by signature)
Route::post('/ecommerce/webhook/stripe', function () {
    $payload = request()->getContent();
    $signature = (string) request()->header('Stripe-Signature');
    try {
        app(CheckoutService::class)->handleStripeWebhook($payload, $signature);

        return response()->json(['status' => 'ok']);
    } catch (UnexpectedValueException $e) {
        return response()->json(['error' => 'Invalid payload'], 400);
    } catch (SignatureVerificationException $e) {
        return response()->json(['error' => 'Invalid signature'], 403);
    }
})->middleware('throttle:60,1');
