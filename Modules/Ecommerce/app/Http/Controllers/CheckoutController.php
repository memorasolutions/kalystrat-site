<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Ecommerce\Services\CartService;
use Modules\Ecommerce\Services\CheckoutService;

class CheckoutController
{
    public function __construct(
        private readonly CartService $cartService,
        private readonly CheckoutService $checkoutService,
    ) {}

    public function show(): View|RedirectResponse
    {
        $cart = $this->cartService->getOrCreateCart(auth()->user());
        $cart->load('items.variant.product');

        if ($cart->items->isEmpty()) {
            return redirect()->back()->with('error', __('Votre panier est vide.'));
        }

        return view('ecommerce::checkout.index', ['cart' => $cart]);
    }

    public function returnPage(Request $request): View|RedirectResponse
    {
        $sessionId = $request->query('session_id');

        if (! $sessionId) {
            return redirect()->route('checkout.show');
        }

        $status = $this->checkoutService->getCheckoutSessionStatus((string) $sessionId);

        return view('ecommerce::checkout.return', ['status' => $status]);
    }
}
