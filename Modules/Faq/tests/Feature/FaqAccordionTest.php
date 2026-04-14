<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Modules\Faq\Models\Faq;
use Tests\TestCase;

uses(TestCase::class, LazilyRefreshDatabase::class);

it('renders published faqs in accordion', function () {
    Faq::factory()->create(['question' => 'Test FAQ Published', 'is_published' => true]);

    $this->blade('<x-faq::faq-accordion />')
        ->assertSee('Test FAQ Published')
        ->assertSee('faq-section');
});

it('hides unpublished faqs', function () {
    Faq::factory()->create(['question' => 'Hidden FAQ', 'is_published' => false]);

    $this->blade('<x-faq::faq-accordion />')
        ->assertDontSee('Hidden FAQ');
});

it('renders empty when no faqs exist', function () {
    $this->blade('<x-faq::faq-accordion />')
        ->assertDontSee('faq-section');
});

it('respects limit prop', function () {
    Faq::factory()->count(5)->create(['is_published' => true]);

    $html = $this->blade('<x-faq::faq-accordion :limit="2" />')->__toString();

    expect(substr_count($html, 'accordion-item'))->toBe(2);
});

it('filters by category prop', function () {
    Faq::factory()->create(['question' => 'Billing FAQ', 'category' => 'billing', 'is_published' => true]);
    Faq::factory()->create(['question' => 'Support FAQ', 'category' => 'support', 'is_published' => true]);

    $this->blade('<x-faq::faq-accordion category="billing" />')
        ->assertSee('Billing FAQ')
        ->assertDontSee('Support FAQ');
});
