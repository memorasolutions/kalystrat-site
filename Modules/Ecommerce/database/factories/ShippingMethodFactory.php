<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Ecommerce\Models\ShippingMethod;

class ShippingMethodFactory extends Factory
{
    protected $model = ShippingMethod::class;

    public function definition(): array
    {
        return [
            'shipping_zone_id' => fake()->randomNumber(),
            'name' => fake()->word().' shipping',
            'type' => fake()->randomElement(['flat', 'free', 'pickup']),
            'cost' => fake()->randomFloat(2, 5, 50),
            'min_order' => fake()->optional()->randomFloat(2, 0, 50),
            'max_order' => fake()->optional()->randomFloat(2, 50, 500),
            'is_active' => true,
            'sort_order' => fake()->numberBetween(1, 10),
        ];
    }
}
