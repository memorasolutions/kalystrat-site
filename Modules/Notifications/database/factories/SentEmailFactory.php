<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Notifications\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Notifications\Models\SentEmail;

class SentEmailFactory extends Factory
{
    protected $model = SentEmail::class;

    public function definition(): array
    {
        return [
            'to' => fake()->email(),
            'subject' => fake()->sentence(4),
            'mailable_class' => 'App\\Mail\\WelcomeMail',
            'status' => 'sent',
            'sent_at' => fake()->dateTime(),
        ];
    }
}
