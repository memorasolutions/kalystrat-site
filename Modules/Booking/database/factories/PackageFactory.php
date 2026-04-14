<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Booking\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Booking\Models\Package;

class PackageFactory extends Factory
{
    protected $model = Package::class;

    public function definition(): array
    {
        return [
            'name' => fake()->words(2, true).' package',
            'description' => fake()->sentence(),
            'session_count' => fake()->numberBetween(3, 20),
            'price' => fake()->randomFloat(2, 50, 500),
            'regular_price' => fake()->randomFloat(2, 100, 600),
            'validity_days' => fake()->randomElement([30, 60, 90, 365]),
            'applicable_service_ids' => null,
            'is_active' => true,
            'sort_order' => fake()->numberBetween(1, 10),
        ];
    }
}
