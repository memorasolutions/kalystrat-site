<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Ecommerce\Models\Order;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        $subtotal = fake()->randomFloat(2, 20, 500);
        $shippingCost = fake()->randomFloat(2, 0, 25);
        $taxAmount = round($subtotal * 0.14975, 2);
        $discountAmount = fake()->randomFloat(2, 0, 20);
        $total = round($subtotal + $shippingCost + $taxAmount - $discountAmount, 2);

        return [
            'user_id' => fake()->randomNumber(),
            'order_number' => 'ORD-'.fake()->unique()->numerify('######'),
            'status' => fake()->randomElement(['pending', 'processing', 'shipped', 'delivered', 'cancelled']),
            'subtotal' => $subtotal,
            'shipping_cost' => $shippingCost,
            'tax_amount' => $taxAmount,
            'discount_amount' => $discountAmount,
            'total' => $total,
            'coupon_id' => null,
            'shipping_address_id' => fake()->randomNumber(),
            'billing_address_id' => fake()->randomNumber(),
            'stripe_session_id' => fake()->optional()->uuid(),
            'stripe_payment_intent' => fake()->optional()->uuid(),
            'shipping_method' => fake()->randomElement(['standard', 'express', 'free']),
            'tracking_number' => fake()->optional()->numerify('TRK##########'),
            'notes' => fake()->optional()->sentence(),
            'paid_at' => fake()->optional()->dateTimeBetween('-30 days', 'now'),
            'shipped_at' => fake()->optional()->dateTimeBetween('-20 days', 'now'),
            'delivered_at' => fake()->optional()->dateTimeBetween('-10 days', 'now'),
        ];
    }
}
