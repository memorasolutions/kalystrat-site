<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Privacy\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Privacy\Models\CookieCategory;

class CookieCategoryFactory extends Factory
{
    protected $model = CookieCategory::class;

    public function definition(): array
    {
        return [
            'name' => fake()->unique()->word(),
            'label' => fake()->sentence(2),
            'description' => fake()->sentence(),
            'required' => false,
            'order' => fake()->numberBetween(1, 5),
            'is_active' => true,
        ];
    }
}
