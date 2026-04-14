<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\ShortUrl\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\ShortUrl\Models\ShortUrl;

class ShortUrlFactory extends Factory
{
    protected $model = ShortUrl::class;

    public function definition(): array
    {
        return [
            'user_id' => fake()->randomNumber(),
            'domain_id' => null,
            'slug' => fake()->unique()->lexify('??????'),
            'original_url' => fake()->url(),
            'title' => fake()->optional()->sentence(4),
            'password' => null,
            'expires_at' => fake()->optional()->dateTimeBetween('now', '+1 year'),
            'max_clicks' => fake()->optional()->numberBetween(100, 10000),
            'is_active' => true,
            'redirect_type' => fake()->randomElement([301, 302]),
            'clicks_count' => fake()->numberBetween(0, 500),
            'tags' => fake()->optional()->words(3),
            'utm_source' => fake()->optional()->word(),
            'utm_medium' => fake()->optional()->randomElement(['email', 'social', 'cpc']),
            'utm_campaign' => fake()->optional()->slug(2),
            'utm_term' => fake()->optional()->word(),
            'utm_content' => fake()->optional()->word(),
        ];
    }
}
