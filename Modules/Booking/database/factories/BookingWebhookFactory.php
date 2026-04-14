<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Booking\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Booking\Models\BookingWebhook;

class BookingWebhookFactory extends Factory
{
    protected $model = BookingWebhook::class;

    public function definition(): array
    {
        return [
            'url' => fake()->url(),
            'secret' => fake()->sha256(),
            'events' => [fake()->word()],
            'is_active' => true,
            'last_triggered_at' => fake()->optional()->dateTime(),
            'last_status' => 'success',
        ];
    }
}
