<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Roadmap\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Roadmap\Models\Changelog;

class ChangelogFactory extends Factory
{
    protected $model = Changelog::class;

    public function definition(): array
    {
        return [
            'idea_id' => fake()->randomNumber(),
            'user_id' => fake()->randomNumber(),
            'field' => fake()->word(),
            'old_value' => fake()->optional()->word(),
            'new_value' => fake()->word(),
            'note' => fake()->optional()->sentence(),
        ];
    }
}
