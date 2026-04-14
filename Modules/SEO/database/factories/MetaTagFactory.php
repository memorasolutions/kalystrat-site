<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\SEO\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\SEO\Models\MetaTag;

class MetaTagFactory extends Factory
{
    protected $model = MetaTag::class;

    public function definition(): array
    {
        return [
            'url_pattern' => '/'.fake()->unique()->slug(),
            'title' => fake()->sentence(4),
            'description' => fake()->sentence(10),
            'keywords' => implode(', ', fake()->words(5)),
            'og_title' => null,
            'og_description' => null,
            'og_image' => null,
            'twitter_card' => null,
            'robots' => null,
            'canonical_url' => null,
            'is_active' => true,
        ];
    }
}
