<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Ecommerce\Models\DigitalAsset;

class DigitalAssetFactory extends Factory
{
    protected $model = DigitalAsset::class;

    public function definition(): array
    {
        return [
            'product_id' => fake()->randomNumber(),
            'file_path' => 'uploads/digital/'.fake()->uuid().'.pdf',
            'original_filename' => fake()->word().'.'.fake()->fileExtension(),
            'file_size' => fake()->numberBetween(1000, 1000000),
            'mime_type' => fake()->mimeType(),
            'download_limit' => fake()->numberBetween(1, 10),
            'is_active' => true,
        ];
    }
}
