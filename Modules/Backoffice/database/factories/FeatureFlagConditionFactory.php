<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Backoffice\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Backoffice\Models\FeatureFlagCondition;

class FeatureFlagConditionFactory extends Factory
{
    protected $model = FeatureFlagCondition::class;

    public function definition(): array
    {
        return [
            'feature_name' => fake()->word(),
            'condition_type' => fake()->randomElement(['percentage', 'user_ids', 'date_range']),
            'condition_config' => ['value' => 50],
        ];
    }
}
