<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Webhooks\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Webhooks\Models\WebhookCall;

class WebhookCallFactory extends Factory
{
    protected $model = WebhookCall::class;

    public function definition(): array
    {
        return [
            'webhook_endpoint_id' => fake()->randomNumber(),
            'event' => fake()->randomElement(['order.created', 'user.created']),
            'payload' => ['test' => true],
            'response_code' => 200,
            'response_body' => '{"ok":true}',
        ];
    }
}
