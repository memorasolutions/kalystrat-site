<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Booking\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Booking\Models\Coupon;

class CouponFactory extends Factory
{
    protected $model = Coupon::class;

    public function definition(): array
    {
        return [
            'code' => strtoupper(fake()->unique()->lexify('????-????')),
            'description' => fake()->sentence(),
            'type' => 'percentage',
            'value' => fake()->randomFloat(2, 5, 50),
            'min_order_amount' => null,
            'max_uses' => null,
            'used_count' => 0,
            'max_uses_per_customer' => null,
            'starts_at' => now()->subDay(),
            'expires_at' => now()->addMonth(),
            'is_active' => true,
            'new_customers_only' => false,
            'applicable_service_ids' => null,
        ];
    }
}
