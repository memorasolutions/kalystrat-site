<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Ecommerce\Models\ProductVariant;

class ProductVariantFactory extends Factory
{
    protected $model = ProductVariant::class;

    public function definition(): array
    {
        $price = fake()->randomFloat(2, 10, 500);

        return [
            'product_id' => fake()->randomNumber(),
            'sku' => fake()->unique()->bothify('VAR-????-####'),
            'price' => $price,
            'compare_price' => fake()->optional(0.3)->randomFloat(2, $price, $price * 1.5),
            'stock' => fake()->numberBetween(0, 200),
            'low_stock_threshold' => fake()->numberBetween(5, 20),
            'allow_backorder' => true,
            'weight' => fake()->optional()->randomFloat(2, 0.1, 50),
            'is_active' => true,
        ];
    }
}
