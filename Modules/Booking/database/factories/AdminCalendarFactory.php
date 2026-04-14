<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Booking\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Booking\Models\AdminCalendar;

class AdminCalendarFactory extends Factory
{
    protected $model = AdminCalendar::class;

    public function definition(): array
    {
        return [
            'user_id' => fake()->randomNumber(),
            'google_calendar_id' => fake()->uuid(),
            'calendar_name' => fake()->word(),
            'email' => fake()->email(),
            'is_destination' => false,
            'is_blocking' => false,
            'access_token' => fake()->sha256(),
            'refresh_token' => fake()->sha256(),
            'token_expires_at' => fake()->dateTime(),
        ];
    }
}
