<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Modules\Ecommerce\Contracts\CheckoutServiceInterface;
use Modules\Ecommerce\Events\OrderCreated;
use Modules\Ecommerce\Events\OrderPaid;
use Modules\Ecommerce\Models\Address;
use Modules\Ecommerce\Models\Cart;
use Modules\Ecommerce\Models\CartItem;
use Modules\Ecommerce\Models\Coupon;
use Modules\Ecommerce\Models\Order;
use Modules\Ecommerce\Models\OrderItem;
use Stripe\Checkout\Session;
use Stripe\Checkout\Session as StripeSession;
use Stripe\StripeClient;
use Stripe\Webhook;

class CheckoutService implements CheckoutServiceInterface
{
    public function __construct(
        private CartService $cartService,
        private ShippingService $shippingService,
        private TaxService $taxService,
        private PromotionService $promotionService,
        private InventoryService $inventoryService,
    ) {}

    public function createOrder(
        User $user,
        Cart $cart,
        Address $shippingAddress,
        ?Address $billingAddress,
        ?Coupon $coupon,
        string $shippingMethod,
    ): Order {
        return DB::transaction(function () use ($user, $cart, $shippingAddress, $billingAddress, $coupon, $shippingMethod) {
            $prefix = (string) config('modules.ecommerce.invoices.prefix', 'INV-');
            $orderNumber = $prefix.now()->format('Ymd').'-'.strtoupper(bin2hex(random_bytes(3)));

            $subtotal = $this->cartService->getTotal($cart);
            $shippingCost = $this->shippingService->calculateShipping($cart, $shippingMethod);
            $taxAmount = $this->taxService->calculateTax($subtotal, $shippingAddress->province);
            $couponDiscount = $coupon ? $this->calculateDiscount($coupon, $subtotal) : 0.0;
            $promoDiscount = $this->promotionService->applyToCart($cart);
            $discountAmount = round($couponDiscount + $promoDiscount, 2);

            $freeShipping = $this->promotionService->grantsFreeShipping($cart);
            if (! $freeShipping && $coupon) {
                $freeShipping = $this->couponGrantsFreeShipping($coupon, $subtotal);
            }
            if ($freeShipping) {
                $shippingCost = 0.0;
            }

            $discountAmount = min($discountAmount, $subtotal);
            $total = round(max(0, $subtotal + $shippingCost + $taxAmount - $discountAmount), 2);

            $order = Order::create([
                'user_id' => $user->id,
                'order_number' => $orderNumber,
                'status' => 'pending',
                'subtotal' => $subtotal,
                'shipping_cost' => $shippingCost,
                'tax_amount' => $taxAmount,
                'discount_amount' => $discountAmount,
                'total' => max(0, $total),
                'coupon_id' => $coupon?->id,
                'shipping_address_id' => $shippingAddress->id,
                'billing_address_id' => $billingAddress?->id,
                'shipping_method' => $shippingMethod,
            ]);

            foreach ($cart->items as $item) {
                /** @var CartItem $item */
                $variant = $item->variant;
                $unitPrice = $variant->price;

                OrderItem::create([
                    'order_id' => $order->id,
                    'variant_id' => $variant->id,
                    'product_name' => $variant->product->name ?? '',
                    'variant_label' => $variant->sku,
                    'price' => $unitPrice,
                    'quantity' => $item->quantity,
                    'total' => round($unitPrice * $item->quantity, 2),
                ]);

                if (! $this->inventoryService->canFulfill($variant, $item->quantity)) {
                    throw new \RuntimeException("Stock insuffisant pour {$variant->sku}.");
                }

                $this->inventoryService->deductStock($variant, $item->quantity);
            }

            $this->cartService->clear($cart);

            if ($coupon) {
                $coupon->increment('used_count');
            }

            OrderCreated::dispatch($order);

            return $order;
        });
    }

    public function createStripeCheckoutSession(Order $order, string $successUrl, string $cancelUrl): StripeSession
    {
        $stripe = new StripeClient((string) config('services.stripe.secret'));
        $currency = strtolower((string) config('modules.ecommerce.currency', 'cad'));

        $lineItems = $order->items->map(fn (OrderItem $item) => [
            'price_data' => [
                'currency' => $currency,
                'product_data' => ['name' => $item->product_name],
                'unit_amount' => (int) round($item->price * 100),
            ],
            'quantity' => $item->quantity,
        ])->toArray();

        if ($order->shipping_cost > 0) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => $currency,
                    'product_data' => ['name' => 'Livraison'],
                    'unit_amount' => (int) round($order->shipping_cost * 100),
                ],
                'quantity' => 1,
            ];
        }

        if ($order->tax_amount > 0) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => $currency,
                    'product_data' => ['name' => 'Taxes'],
                    'unit_amount' => (int) round($order->tax_amount * 100),
                ],
                'quantity' => 1,
            ];
        }

        $session = $stripe->checkout->sessions->create([
            'mode' => 'payment',
            'line_items' => $lineItems,
            'success_url' => $successUrl,
            'cancel_url' => $cancelUrl,
            'metadata' => ['order_id' => (string) $order->id],
        ]);

        $order->update(['stripe_session_id' => $session->id]);

        return $session;
    }

    public function handleStripeWebhook(string $payload, string $signature): void
    {
        $webhookSecret = (string) config('services.stripe.webhook_secret');
        $event = Webhook::constructEvent($payload, $signature, $webhookSecret);

        if ($event->type === 'checkout.session.completed') {
            /** @var Session $session */
            $session = $event->data->object;
            $order = Order::where('stripe_session_id', $session->id)->first();

            if ($order) {
                $order->update([
                    'status' => 'paid',
                    'stripe_payment_intent' => $session->payment_intent,
                    'paid_at' => now(),
                ]);

                // Notification handled by SendOrderConfirmation listener
                OrderPaid::dispatch($order);
            }
        }
    }

    public function createEmbeddedCheckoutSession(Order $order, string $returnUrl): StripeSession
    {
        $stripe = new StripeClient((string) config('services.stripe.secret'));
        $currency = strtolower((string) config('modules.ecommerce.currency', 'cad'));

        $lineItems = $order->items->map(fn (OrderItem $item) => [
            'price_data' => [
                'currency' => $currency,
                'product_data' => ['name' => $item->product_name],
                'unit_amount' => (int) round($item->price * 100),
            ],
            'quantity' => $item->quantity,
        ])->toArray();

        if ($order->shipping_cost > 0) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => $currency,
                    'product_data' => ['name' => 'Livraison'],
                    'unit_amount' => (int) round($order->shipping_cost * 100),
                ],
                'quantity' => 1,
            ];
        }

        if ($order->tax_amount > 0) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => $currency,
                    'product_data' => ['name' => 'Taxes'],
                    'unit_amount' => (int) round($order->tax_amount * 100),
                ],
                'quantity' => 1,
            ];
        }

        $params = [
            'mode' => 'payment',
            'ui_mode' => 'embedded',
            'line_items' => $lineItems,
            'return_url' => $returnUrl.'?session_id={CHECKOUT_SESSION_ID}',
            'metadata' => ['order_id' => (string) $order->id],
        ];

        if ($order->discount_amount > 0) {
            $coupon = $stripe->coupons->create([
                'amount_off' => (int) round($order->discount_amount * 100),
                'currency' => $currency,
                'duration' => 'once',
                'name' => 'Réduction commande #'.$order->order_number,
            ]);
            $params['discounts'] = [['coupon' => $coupon->id]];
        }

        $session = $stripe->checkout->sessions->create($params);

        $order->update(['stripe_session_id' => $session->id]);

        return $session;
    }

    public function getCheckoutSessionStatus(string $sessionId): array
    {
        $stripe = new StripeClient((string) config('services.stripe.secret'));
        $session = $stripe->checkout->sessions->retrieve($sessionId);

        return [
            'status' => $session->status,
            'payment_status' => $session->payment_status,
        ];
    }

    private function calculateDiscount(Coupon $coupon, float $subtotal): float
    {
        if (! $coupon->isValid()) {
            return 0.0;
        }

        if ($coupon->min_order_amount && $subtotal < (float) $coupon->min_order_amount) {
            return 0.0;
        }

        return match ($coupon->type) {
            'percent' => round($subtotal * (float) $coupon->value / 100, 2),
            'fixed' => round(min((float) $coupon->value, $subtotal), 2),
            default => 0.0,
        };
    }

    private function couponGrantsFreeShipping(Coupon $coupon, float $subtotal): bool
    {
        if (! $coupon->isValid() || $coupon->type !== 'free_shipping') {
            return false;
        }

        if ($coupon->min_order_amount && $subtotal < (float) $coupon->min_order_amount) {
            return false;
        }

        return true;
    }
}
