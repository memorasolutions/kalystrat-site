<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\CustomFields\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\CustomFields\Models\CustomFieldValue;

class CustomFieldValueFactory extends Factory
{
    protected $model = CustomFieldValue::class;

    public function definition(): array
    {
        return [
            'custom_field_definition_id' => fake()->randomNumber(),
            'fieldable_type' => 'App\\Models\\User',
            'fieldable_id' => fake()->randomNumber(),
            'value' => fake()->word(),
        ];
    }
}
