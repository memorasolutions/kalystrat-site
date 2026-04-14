<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\CustomFields\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\CustomFields\Models\CustomFieldDefinition;

class CustomFieldDefinitionFactory extends Factory
{
    protected $model = CustomFieldDefinition::class;

    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'label' => fake()->sentence(2),
            'type' => fake()->randomElement(['text', 'number', 'select', 'date']),
            'options' => null,
            'is_required' => false,
            'sort_order' => fake()->numberBetween(1, 10),
            'model_type' => 'App\\Models\\User',
        ];
    }
}
