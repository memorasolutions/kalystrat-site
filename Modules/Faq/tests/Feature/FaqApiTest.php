<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Faq\Models\Faq;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('GET /faqs returns 200 with paginated data', function () {
    Faq::factory()->count(25)->create();

    $response = $this->getJson('/api/v1/faqs');

    $response->assertStatus(200)
        ->assertJsonStructure([
            'success',
            'message',
            'data' => ['current_page', 'data'],
        ])
        ->assertJsonFragment(['success' => true])
        ->assertJsonCount(20, 'data.data');
});

test('GET /faqs returns only published FAQs', function () {
    Faq::factory()->create(['question' => 'Published FAQ']);
    Faq::factory()->draft()->create(['question' => 'Draft FAQ']);

    $response = $this->getJson('/api/v1/faqs');

    $response->assertStatus(200)
        ->assertJsonCount(1, 'data.data')
        ->assertJsonFragment(['question' => 'Published FAQ'])
        ->assertJsonMissing(['question' => 'Draft FAQ']);
});

test('GET /faqs?category=General filters by category', function () {
    Faq::factory()->create(['category' => 'General', 'question' => 'General FAQ']);
    Faq::factory()->create(['category' => 'Technique', 'question' => 'Technical FAQ']);

    $response = $this->getJson('/api/v1/faqs?category=General');

    $response->assertStatus(200)
        ->assertJsonCount(1, 'data.data')
        ->assertJsonFragment(['category' => 'General'])
        ->assertJsonMissing(['category' => 'Technique']);
});

test('GET /faqs/{id} returns a published FAQ', function () {
    $faq = Faq::factory()->create();

    $response = $this->getJson("/api/v1/faqs/{$faq->id}");

    $response->assertStatus(200)
        ->assertJsonStructure([
            'success',
            'message',
            'data' => ['id', 'question', 'answer'],
        ])
        ->assertJsonFragment(['id' => $faq->id]);
});

test('GET /faqs/{id} returns 404 for unpublished FAQ', function () {
    $faq = Faq::factory()->draft()->create();

    $response = $this->getJson("/api/v1/faqs/{$faq->id}");

    $response->assertStatus(404);
});

test('GET /faqs/{id} returns 404 for non-existent FAQ', function () {
    $response = $this->getJson('/api/v1/faqs/999999');

    $response->assertStatus(404);
});
