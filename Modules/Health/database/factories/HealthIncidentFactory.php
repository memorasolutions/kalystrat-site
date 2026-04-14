<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Health\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Health\Models\HealthIncident;

class HealthIncidentFactory extends Factory
{
    protected $model = HealthIncident::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'description' => fake()->paragraph(),
            'status' => fake()->randomElement(['investigating', 'identified', 'monitoring', 'resolved']),
            'severity' => fake()->randomElement(['low', 'medium', 'high', 'critical']),
            'resolved_at' => null,
        ];
    }
}
