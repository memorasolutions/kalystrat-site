<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Booking\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Booking\Models\CouponUsage;

class CouponUsageFactory extends Factory
{
    protected $model = CouponUsage::class;

    public function definition(): array
    {
        return [
            'coupon_id' => fake()->randomNumber(),
            'customer_id' => fake()->randomNumber(),
            'appointment_id' => fake()->randomNumber(),
            'discount_amount' => fake()->randomFloat(2, 5, 50),
        ];
    }
}
