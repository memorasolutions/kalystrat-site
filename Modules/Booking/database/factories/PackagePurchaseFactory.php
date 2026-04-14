<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Booking\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Booking\Models\PackagePurchase;

class PackagePurchaseFactory extends Factory
{
    protected $model = PackagePurchase::class;

    public function definition(): array
    {
        return [
            'customer_id' => fake()->randomNumber(),
            'package_id' => fake()->randomNumber(),
            'sessions_remaining' => fake()->numberBetween(1, 20),
            'sessions_used' => fake()->numberBetween(0, 10),
            'purchased_at' => fake()->dateTime(),
            'expires_at' => now()->addMonths(3),
            'payment_status' => 'paid',
            'stripe_session_id' => fake()->optional()->uuid(),
            'amount_paid' => fake()->randomFloat(2, 50, 500),
        ];
    }
}
