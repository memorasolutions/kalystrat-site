<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Auth\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Auth\Models\BlockedIp;

class BlockedIpFactory extends Factory
{
    protected $model = BlockedIp::class;

    public function definition(): array
    {
        return [
            'ip_address' => fake()->ipv4(),
            'reason' => fake()->sentence(),
            'blocked_until' => now()->addHours(24),
            'auto_blocked' => true,
        ];
    }
}
