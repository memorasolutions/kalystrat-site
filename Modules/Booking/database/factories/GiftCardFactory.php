<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Booking\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Booking\Models\GiftCard;

class GiftCardFactory extends Factory
{
    protected $model = GiftCard::class;

    public function definition(): array
    {
        return [
            'code' => strtoupper(fake()->unique()->lexify('GC-????????')),
            'purchaser_name' => fake()->name(),
            'purchaser_email' => fake()->email(),
            'recipient_name' => fake()->name(),
            'recipient_email' => fake()->email(),
            'recipient_message' => fake()->optional()->sentence(),
            'initial_amount' => fake()->randomFloat(2, 25, 200),
            'remaining_amount' => fake()->randomFloat(2, 0, 200),
            'currency' => 'CAD',
            'status' => 'active',
            'purchased_at' => fake()->dateTime(),
            'expires_at' => now()->addYear(),
        ];
    }
}
