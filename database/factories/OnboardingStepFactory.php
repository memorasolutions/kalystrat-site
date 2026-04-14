<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Database\Factories;

use App\Models\OnboardingStep;
use Illuminate\Database\Eloquent\Factories\Factory;

class OnboardingStepFactory extends Factory
{
    protected $model = OnboardingStep::class;

    public function definition(): array
    {
        return [
            'slug' => fake()->unique()->slug(2),
            'title' => fake()->sentence(3),
            'description' => fake()->sentence(),
            'icon' => 'check-circle',
            'order' => fake()->numberBetween(1, 10),
            'is_active' => true,
            'fields' => null,
        ];
    }
}
