<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\SaaS\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\SaaS\Models\UsageRecord;

class UsageRecordFactory extends Factory
{
    protected $model = UsageRecord::class;

    public function definition(): array
    {
        return [
            'user_id' => fake()->randomNumber(),
            'metric' => fake()->randomElement(['api_calls', 'storage_mb', 'team_members']),
            'quantity' => fake()->numberBetween(1, 1000),
            'metadata' => null,
            'recorded_at' => fake()->dateTime(),
        ];
    }
}
