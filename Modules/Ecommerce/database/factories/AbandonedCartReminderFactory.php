<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Ecommerce\Models\AbandonedCartReminder;

class AbandonedCartReminderFactory extends Factory
{
    protected $model = AbandonedCartReminder::class;

    public function definition(): array
    {
        return [
            'cart_id' => fake()->randomNumber(),
            'user_id' => fake()->randomNumber(),
            'reminder_number' => fake()->numberBetween(1, 5),
            'sent_at' => fake()->dateTime(),
            'clicked_at' => fake()->optional()->dateTime(),
            'recovered_at' => fake()->optional()->dateTime(),
        ];
    }
}
