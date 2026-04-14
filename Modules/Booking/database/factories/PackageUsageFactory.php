<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Booking\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Booking\Models\PackageUsage;

class PackageUsageFactory extends Factory
{
    protected $model = PackageUsage::class;

    public function definition(): array
    {
        return [
            'purchase_id' => fake()->randomNumber(),
            'appointment_id' => fake()->randomNumber(),
            'used_at' => fake()->dateTime(),
        ];
    }
}
