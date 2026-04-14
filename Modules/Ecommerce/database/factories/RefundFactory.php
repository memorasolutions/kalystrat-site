<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Ecommerce\Models\Refund;

class RefundFactory extends Factory
{
    protected $model = Refund::class;

    public function definition(): array
    {
        return [
            'order_id' => fake()->randomNumber(),
            'user_id' => fake()->randomNumber(),
            'amount' => fake()->randomFloat(2, 10, 500),
            'reason' => fake()->sentence(),
            'status' => fake()->randomElement(['pending', 'approved', 'rejected', 'processed']),
            'notes' => fake()->optional()->sentence(),
            'processed_at' => fake()->optional()->dateTimeBetween('-30 days', 'now'),
            'processed_by' => fake()->optional()->randomNumber(),
        ];
    }
}
