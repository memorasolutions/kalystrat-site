<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Database\Factories;

use App\Models\ContactMessage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactMessageFactory extends Factory
{
    protected $model = ContactMessage::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'subject' => fake()->sentence(4),
            'message' => fake()->paragraph(),
            'status' => 'new',
            'ip_address' => fake()->ipv4(),
            'read_at' => null,
            'tenant_id' => null,
        ];
    }
}
