<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Media\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Media\Models\MediaUpload;

class MediaUploadFactory extends Factory
{
    protected $model = MediaUpload::class;

    public function definition(): array
    {
        return [
            'name' => fake()->word().'.'.fake()->fileExtension(),
        ];
    }
}
