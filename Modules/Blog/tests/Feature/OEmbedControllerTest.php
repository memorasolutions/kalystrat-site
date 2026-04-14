<?php

declare(strict_types=1);

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Blog\Models\Article;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $this->seed(RolesAndPermissionsSeeder::class);
});

test('oembed returns article data for valid published article', function () {
    $user = User::factory()->create();
    $locale = app()->getLocale();
    $article = Article::factory()->published()->create([
        'slug' => [$locale => 'test-article'],
        'title' => [$locale => 'Test Article Title'],
        'user_id' => $user->id,
    ]);

    $response = $this->getJson(route('oembed', ['url' => url('/blog/test-article')]));

    $response->assertOk()
        ->assertJson([
            'version' => '1.0',
            'type' => 'rich',
            'title' => 'Test Article Title',
            'provider_name' => config('app.name'),
            'width' => 800,
            'height' => 400,
        ])
        ->assertJsonStructure(['html', 'author_name', 'thumbnail_url']);
});

test('oembed returns 404 for unpublished article', function () {
    Article::factory()->draft()->create([
        'slug' => [app()->getLocale() => 'draft-article'],
    ]);

    $response = $this->getJson(route('oembed', ['url' => url('/blog/draft-article')]));

    $response->assertNotFound();
});

test('oembed returns 404 for non-existent slug', function () {
    $response = $this->getJson(route('oembed', ['url' => url('/blog/non-existent')]));

    $response->assertNotFound();
});

test('oembed validates url is required', function () {
    $response = $this->getJson(route('oembed'));

    $response->assertUnprocessable()
        ->assertJsonValidationErrors(['url']);
});

test('oembed respects maxwidth and maxheight parameters', function () {
    $article = Article::factory()->published()->create([
        'slug' => [app()->getLocale() => 'sized-article'],
    ]);

    $response = $this->getJson(route('oembed', [
        'url' => url('/blog/sized-article'),
        'maxwidth' => 500,
        'maxheight' => 250,
    ]));

    $response->assertOk()
        ->assertJson([
            'width' => 500,
            'height' => 250,
        ]);
});
