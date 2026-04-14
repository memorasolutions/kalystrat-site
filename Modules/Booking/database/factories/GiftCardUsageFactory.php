<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Booking\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Booking\Models\GiftCardUsage;

class GiftCardUsageFactory extends Factory
{
    protected $model = GiftCardUsage::class;

    public function definition(): array
    {
        return [
            'gift_card_id' => fake()->randomNumber(),
            'appointment_id' => fake()->randomNumber(),
            'amount_used' => fake()->randomFloat(2, 5, 100),
            'used_at' => fake()->dateTime(),
            'note' => fake()->optional()->sentence(),
        ];
    }
}
