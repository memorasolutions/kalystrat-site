<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Ecommerce\Models\OrderItem;

class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;

    public function definition(): array
    {
        $price = fake()->randomFloat(2, 10, 500);
        $quantity = fake()->numberBetween(1, 5);

        return [
            'order_id' => fake()->randomNumber(),
            'variant_id' => fake()->randomNumber(),
            'product_name' => fake()->words(3, true),
            'variant_label' => fake()->optional()->word(),
            'price' => $price,
            'quantity' => $quantity,
            'total' => round($price * $quantity, 2),
        ];
    }
}
