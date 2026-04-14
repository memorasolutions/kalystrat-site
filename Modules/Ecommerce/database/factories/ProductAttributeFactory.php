<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Ecommerce\Models\ProductAttribute;

class ProductAttributeFactory extends Factory
{
    protected $model = ProductAttribute::class;

    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement(['Couleur', 'Taille', 'Matière', 'Style', 'Poids']),
            'slug' => fake()->unique()->slug(1),
            'type' => fake()->randomElement(['select', 'color', 'text']),
            'position' => fake()->numberBetween(0, 10),
        ];
    }
}
