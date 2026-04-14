<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Booking\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Booking\Models\BookingSetting;

class BookingSettingFactory extends Factory
{
    protected $model = BookingSetting::class;

    public function definition(): array
    {
        return [
            'key' => fake()->word(),
            'value' => fake()->word(),
        ];
    }
}
