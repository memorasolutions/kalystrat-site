<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Ecommerce\Models\Coupon;

class CouponFactory extends Factory
{
    protected $model = Coupon::class;

    public function definition(): array
    {
        return [
            'code' => strtoupper(fake()->bothify('??##??')),
            'type' => fake()->randomElement(['fixed', 'percent']),
            'value' => fake()->numberBetween(5, 50),
            'min_order_amount' => 0,
            'max_uses' => 100,
            'used_count' => 0,
            'starts_at' => now(),
            'expires_at' => now()->addMonth(),
            'is_active' => true,
        ];
    }
}
