<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\SaaS\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\SaaS\Models\Referral;

class ReferralFactory extends Factory
{
    protected $model = Referral::class;

    public function definition(): array
    {
        return [
            'referrer_id' => fake()->randomNumber(),
            'referred_id' => fake()->randomNumber(),
            'code' => strtoupper(fake()->unique()->lexify('????????')),
            'status' => fake()->randomElement(['pending', 'converted', 'rewarded', 'expired']),
            'reward_type' => fake()->randomElement(['credit', 'discount', 'free_month']),
            'reward_value' => fake()->randomFloat(2, 5, 50),
            'rewarded_at' => fake()->optional()->dateTimeBetween('-30 days', 'now'),
            'converted_at' => fake()->optional()->dateTimeBetween('-60 days', 'now'),
        ];
    }
}
