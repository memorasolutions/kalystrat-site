<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\AI\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\AI\Models\MessageRead;

class MessageReadFactory extends Factory
{
    protected $model = MessageRead::class;

    public function definition(): array
    {
        return [
            'message_id' => fake()->randomNumber(),
            'user_id' => fake()->randomNumber(),
            'read_at' => fake()->dateTime(),
        ];
    }
}
