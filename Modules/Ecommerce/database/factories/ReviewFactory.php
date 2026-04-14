<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Ecommerce\Models\Review;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition(): array
    {
        return [
            'product_id' => fake()->randomNumber(),
            'user_id' => fake()->randomNumber(),
            'rating' => fake()->numberBetween(1, 5),
            'title' => fake()->sentence(4),
            'body' => fake()->paragraph(),
            'is_approved' => true,
            'is_verified_purchase' => true,
        ];
    }
}
