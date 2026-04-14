<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

return [
    'name' => 'Ecommerce',

    'currency' => 'CAD',
    'currency_symbol' => '$',
    'tax_rate' => 14.975,
    'tax_jurisdiction' => env('ECOMMERCE_TAX_JURISDICTION', 'ca'), // ca, us, eu

    'shipping' => [
        'default_method' => 'flat_rate',
        'flat_rate' => 9.99,
        'free_threshold' => 75.00,
        'per_kg_rate' => 2.50,
    ],

    'stock' => [
        'low_threshold' => 5,
        'track_inventory' => true,
    ],

    'checkout' => [
        'guest_checkout' => false,
        'stripe_enabled' => true,
        'embedded_mode' => true,
        'payment_methods' => ['card', 'apple_pay', 'google_pay', 'klarna', 'afterpay_clearpay'],
    ],

    'abandoned_cart' => [
        'enabled' => true,
        'schedule' => [1 => 1, 24 => 2, 72 => 3], // hours => reminder_number
        'recover_url' => '/cart',
    ],

    'invoices' => [
        'prefix' => 'INV-',
        'company_name' => '',
        'company_address' => '',
    ],
];
