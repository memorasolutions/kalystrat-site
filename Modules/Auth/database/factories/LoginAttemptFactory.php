<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Auth\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Auth\Models\LoginAttempt;

class LoginAttemptFactory extends Factory
{
    protected $model = LoginAttempt::class;

    public function definition(): array
    {
        return [
            'user_id' => fake()->optional()->randomNumber(),
            'email' => fake()->email(),
            'ip_address' => fake()->ipv4(),
            'user_agent' => fake()->userAgent(),
            'status' => fake()->randomElement(['success', 'failed']),
            'logged_in_at' => fake()->dateTime(),
        ];
    }
}
