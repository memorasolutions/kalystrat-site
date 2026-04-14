<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Booking\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Booking\Models\DateOverride;

class DateOverrideFactory extends Factory
{
    protected $model = DateOverride::class;

    public function definition(): array
    {
        return [
            'date' => fake()->date(),
            'override_type' => 'closed',
            'all_day' => true,
            'start_time' => null,
            'end_time' => null,
            'reason' => fake()->sentence(),
            'created_by_id' => fake()->randomNumber(),
            'user_id' => null,
            'repeat_yearly' => false,
            'label' => fake()->word(),
        ];
    }
}
