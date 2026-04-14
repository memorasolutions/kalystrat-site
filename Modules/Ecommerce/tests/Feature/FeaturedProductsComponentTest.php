<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Modules\Ecommerce\Models\Product;
use Tests\TestCase;

uses(TestCase::class, LazilyRefreshDatabase::class);

it('renders featured active products', function () {
    Product::factory()->create([
        'name' => 'Super Product',
        'is_active' => true,
        'is_featured' => true,
        'price' => 29.99,
    ]);

    $this->blade('<x-ecommerce::featured-products />')
        ->assertSee('Super Product')
        ->assertSee('featured-products');
});

it('hides inactive or non-featured products', function () {
    Product::factory()->create([
        'name' => 'Inactive',
        'is_active' => false,
        'is_featured' => true,
    ]);

    Product::factory()->create([
        'name' => 'Not Featured',
        'is_active' => true,
        'is_featured' => false,
    ]);

    $this->blade('<x-ecommerce::featured-products />')
        ->assertDontSee('Inactive')
        ->assertDontSee('Not Featured');
});

it('renders empty when no products', function () {
    $this->blade('<x-ecommerce::featured-products />')
        ->assertDontSee('featured-products');
});

it('shows compare price when higher than price', function () {
    Product::factory()->create([
        'name' => 'Deal',
        'is_active' => true,
        'is_featured' => true,
        'price' => 19.99,
        'compare_price' => 39.99,
    ]);

    $view = $this->blade('<x-ecommerce::featured-products />');

    $view->assertSee('19.99')
        ->assertSee('39.99');
});
