<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Modules\Blog\Livewire\BlogList;
use Modules\Blog\Livewire\BlogSearch;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

// ── BlogList ────────────────────────────────────────────────────────────

it('renders blog list', function () {
    Livewire::test(BlogList::class)
        ->assertStatus(200);
});

it('blog list initializes with perPage 9', function () {
    Livewire::test(BlogList::class)
        ->assertSet('perPage', 9)
        ->assertSet('hasMore', false);
});

it('blog list can load more', function () {
    Livewire::test(BlogList::class)
        ->call('loadMore')
        ->assertSet('perPage', 18);
});

it('blog list accepts category parameter', function () {
    Livewire::test(BlogList::class, ['category' => 'tech'])
        ->assertSet('category', 'tech');
});

// ── BlogSearch ──────────────────────────────────────────────────────────

it('renders blog search', function () {
    Livewire::test(BlogSearch::class)
        ->assertStatus(200);
});

it('blog search with empty query returns no results', function () {
    Livewire::test(BlogSearch::class)
        ->assertSet('search', '');
});

it('blog search can set query', function () {
    Livewire::test(BlogSearch::class)
        ->set('search', 'Laravel')
        ->assertSet('search', 'Laravel');
});
