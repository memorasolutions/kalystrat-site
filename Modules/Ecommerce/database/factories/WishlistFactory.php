<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Ecommerce\Models\Wishlist;

class WishlistFactory extends Factory
{
    protected $model = Wishlist::class;

    public function definition(): array
    {
        return [
            'user_id' => fake()->randomNumber(),
            'product_id' => fake()->randomNumber(),
        ];
    }
}
