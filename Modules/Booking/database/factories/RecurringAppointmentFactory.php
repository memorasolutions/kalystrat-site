<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Booking\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Booking\Models\RecurringAppointment;

class RecurringAppointmentFactory extends Factory
{
    protected $model = RecurringAppointment::class;

    public function definition(): array
    {
        return [
            'customer_id' => fake()->randomNumber(),
            'service_id' => fake()->randomNumber(),
            'frequency' => fake()->randomElement(['weekly', 'biweekly', 'monthly']),
            'day_of_week' => fake()->numberBetween(0, 6),
            'preferred_time' => fake()->time('H:i'),
            'starts_at' => fake()->date(),
            'ends_at' => null,
            'is_active' => true,
            'last_generated_at' => null,
            'notes' => fake()->optional()->sentence(),
        ];
    }
}
