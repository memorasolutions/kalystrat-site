<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\ShortUrl\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\ShortUrl\Models\ShortUrlClick;

class ShortUrlClickFactory extends Factory
{
    protected $model = ShortUrlClick::class;

    public function definition(): array
    {
        return [
            'short_url_id' => fake()->randomNumber(),
            'ip_address' => fake()->ipv4(),
            'referrer' => fake()->optional()->url(),
            'user_agent' => fake()->userAgent(),
            'device_type' => fake()->randomElement(['desktop', 'mobile', 'tablet']),
            'browser' => fake()->randomElement(['Chrome', 'Firefox', 'Safari']),
            'os' => fake()->randomElement(['Windows', 'macOS', 'Linux', 'iOS', 'Android']),
            'country_code' => fake()->countryCode(),
        ];
    }
}
