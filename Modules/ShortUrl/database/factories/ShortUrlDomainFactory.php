<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\ShortUrl\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\ShortUrl\Models\ShortUrlDomain;

class ShortUrlDomainFactory extends Factory
{
    protected $model = ShortUrlDomain::class;

    public function definition(): array
    {
        return [
            'domain' => fake()->domainName(),
            'is_default' => false,
            'is_active' => true,
        ];
    }
}
