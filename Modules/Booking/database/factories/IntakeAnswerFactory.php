<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Booking\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Booking\Models\IntakeAnswer;

class IntakeAnswerFactory extends Factory
{
    protected $model = IntakeAnswer::class;

    public function definition(): array
    {
        return [
            'appointment_id' => fake()->randomNumber(),
            'question_id' => fake()->randomNumber(),
            'answer' => fake()->sentence(),
        ];
    }
}
