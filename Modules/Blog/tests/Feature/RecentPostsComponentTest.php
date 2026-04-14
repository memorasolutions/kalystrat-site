<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Modules\Blog\Models\Article;
use Tests\TestCase;

uses(TestCase::class, LazilyRefreshDatabase::class);

it('renders published articles', function () {
    Article::factory()->create(['title' => 'Mon Article', 'published_at' => now()->subDay()]);
    $this->blade('<x-blog::recent-posts />')
        ->assertSee('Mon Article')
        ->assertSee('recent-posts');
});

it('hides unpublished articles', function () {
    Article::factory()->create(['title' => 'Draft', 'published_at' => null]);
    $this->blade('<x-blog::recent-posts />')
        ->assertDontSee('Draft');
});

it('renders empty when no articles', function () {
    $this->blade('<x-blog::recent-posts />')
        ->assertDontSee('recent-posts');
});

it('respects limit prop', function () {
    Article::factory()->count(5)->create(['published_at' => now()->subDay()]);
    $html = $this->blade('<x-blog::recent-posts :limit="2" />')->__toString();
    expect(substr_count($html, 'list-group-item'))->toBe(2);
});
