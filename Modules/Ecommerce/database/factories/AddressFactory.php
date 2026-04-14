<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Ecommerce\Models\Address;

class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition(): array
    {
        return [
            'user_id' => fake()->randomNumber(),
            'type' => fake()->randomElement(['shipping', 'billing']),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'company' => fake()->optional()->company(),
            'address_line_1' => fake()->streetAddress(),
            'address_line_2' => fake()->optional()->streetName(),
            'city' => fake()->city(),
            'state' => fake()->randomLetter().fake()->randomLetter(),
            'postal_code' => fake()->postcode(),
            'country' => fake()->countryCode(),
            'phone' => fake()->phoneNumber(),
            'is_default' => true,
        ];
    }
}
