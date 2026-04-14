<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Contracts;

use App\Models\User;
use Modules\Ecommerce\Models\Address;
use Modules\Ecommerce\Models\Cart;
use Modules\Ecommerce\Models\Coupon;
use Modules\Ecommerce\Models\Order;
use Stripe\Checkout\Session as StripeSession;

interface CheckoutServiceInterface
{
    public function createOrder(User $user, Cart $cart, Address $shippingAddress, ?Address $billingAddress, ?Coupon $coupon, string $shippingMethod): Order;

    public function createStripeCheckoutSession(Order $order, string $successUrl, string $cancelUrl): StripeSession;

    public function handleStripeWebhook(string $payload, string $signature): void;
}
