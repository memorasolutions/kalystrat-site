<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Ecommerce\Models\Product;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $price = fake()->randomFloat(2, 10, 500);

        return [
            'name' => fake()->words(3, true),
            'slug' => fake()->unique()->slug(3),
            'description' => fake()->paragraphs(2, true),
            'short_description' => fake()->sentence(),
            'price' => $price,
            'compare_price' => fake()->optional(0.3)->randomFloat(2, $price, $price * 1.5),
            'sku' => fake()->unique()->bothify('SKU-????-####'),
            'is_active' => true,
            'is_featured' => fake()->boolean(20),
            'weight' => fake()->optional()->randomFloat(2, 0.1, 50),
            'meta_title' => fake()->optional()->sentence(4),
            'meta_description' => fake()->optional()->sentence(10),
        ];
    }
}
