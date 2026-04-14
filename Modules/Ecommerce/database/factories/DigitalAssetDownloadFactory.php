<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Ecommerce\Models\DigitalAssetDownload;

class DigitalAssetDownloadFactory extends Factory
{
    protected $model = DigitalAssetDownload::class;

    public function definition(): array
    {
        return [
            'digital_asset_id' => fake()->randomNumber(),
            'order_id' => fake()->randomNumber(),
            'user_id' => fake()->randomNumber(),
            'downloaded_at' => fake()->dateTime(),
            'ip_address' => fake()->ipv4(),
        ];
    }
}
