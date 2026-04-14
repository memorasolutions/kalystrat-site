<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Ecommerce\Models\ProductAttributeValue;

class ProductAttributeValueFactory extends Factory
{
    protected $model = ProductAttributeValue::class;

    public function definition(): array
    {
        return [
            'attribute_id' => fake()->randomNumber(),
            'value' => fake()->word(),
            'label' => fake()->word(),
            'color_code' => fake()->optional()->hexColor(),
            'position' => fake()->numberBetween(0, 10),
        ];
    }
}
