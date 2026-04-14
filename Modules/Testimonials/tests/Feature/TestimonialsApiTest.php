<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Testimonials\Models\Testimonial;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('GET /testimonials returns 200 with paginated data', function () {
    Testimonial::factory()->count(25)->create();

    $response = $this->getJson('/api/v1/testimonials');

    $response->assertStatus(200)
        ->assertJsonStructure([
            'success',
            'message',
            'data' => ['current_page', 'data'],
        ])
        ->assertJsonFragment(['success' => true])
        ->assertJsonCount(20, 'data.data');
});

test('GET /testimonials returns only approved testimonials', function () {
    Testimonial::factory()->count(5)->create();
    Testimonial::factory()->count(3)->unapproved()->create();

    $response = $this->getJson('/api/v1/testimonials');

    $response->assertStatus(200)
        ->assertJsonCount(5, 'data.data');
});

test('GET /testimonials returns empty data when no approved testimonials exist', function () {
    Testimonial::factory()->count(3)->unapproved()->create();

    $response = $this->getJson('/api/v1/testimonials');

    $response->assertStatus(200)
        ->assertJsonCount(0, 'data.data');
});

test('GET /testimonials returns testimonials ordered by order column ascending', function () {
    Testimonial::factory()->create(['order' => 3]);
    Testimonial::factory()->create(['order' => 1]);
    Testimonial::factory()->create(['order' => 2]);

    $response = $this->getJson('/api/v1/testimonials');

    $response->assertStatus(200);

    $data = $response->json('data.data');
    expect($data[0]['order'])->toBe(1)
        ->and($data[1]['order'])->toBe(2)
        ->and($data[2]['order'])->toBe(3);
});
