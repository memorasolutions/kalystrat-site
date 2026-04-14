<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\AI\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\AI\Models\ChatAttachment;

class ChatAttachmentFactory extends Factory
{
    protected $model = ChatAttachment::class;

    public function definition(): array
    {
        return [
            'message_id' => fake()->randomNumber(),
            'filename' => fake()->uuid().'.pdf',
            'original_filename' => fake()->word().'.pdf',
            'mime_type' => 'application/pdf',
            'size' => fake()->numberBetween(1000, 500000),
            'disk' => 'local',
            'path' => 'attachments/'.fake()->uuid(),
            'user_id' => fake()->randomNumber(),
        ];
    }
}
