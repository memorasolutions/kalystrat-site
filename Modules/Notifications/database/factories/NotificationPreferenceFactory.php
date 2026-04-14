<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Notifications\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Notifications\Models\NotificationPreference;

class NotificationPreferenceFactory extends Factory
{
    protected $model = NotificationPreference::class;

    public function definition(): array
    {
        return [
            'user_id' => fake()->randomNumber(),
            'notification_type' => fake()->randomElement(['email', 'push', 'sms']),
            'channel' => 'mail',
            'enabled' => true,
        ];
    }
}
