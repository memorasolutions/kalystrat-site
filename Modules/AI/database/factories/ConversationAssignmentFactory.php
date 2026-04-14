<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\AI\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\AI\Models\ConversationAssignment;

class ConversationAssignmentFactory extends Factory
{
    protected $model = ConversationAssignment::class;

    public function definition(): array
    {
        return [
            'conversation_id' => fake()->randomNumber(),
            'agent_id' => fake()->randomNumber(),
            'assigned_by' => fake()->randomNumber(),
            'status' => 'active',
            'claimed_at' => fake()->optional()->dateTime(),
            'completed_at' => null,
        ];
    }
}
