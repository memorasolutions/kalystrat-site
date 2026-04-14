<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Booking\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Booking\Models\IntakeQuestion;

class IntakeQuestionFactory extends Factory
{
    protected $model = IntakeQuestion::class;

    public function definition(): array
    {
        return [
            'service_id' => fake()->randomNumber(),
            'label' => fake()->sentence(4),
            'type' => fake()->randomElement(['text', 'select', 'checkbox', 'textarea']),
            'options' => null,
            'is_required' => false,
            'sort_order' => fake()->numberBetween(1, 10),
        ];
    }
}
