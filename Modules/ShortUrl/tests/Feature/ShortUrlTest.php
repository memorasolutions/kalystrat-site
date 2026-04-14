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
use Modules\ShortUrl\Models\ShortUrl;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $this->seed(RolesAndPermissionsSeeder::class);
    $this->admin = User::factory()->create();
    $this->admin->assignRole('super_admin');
});

test('short url index requires authentication', function () {
    $response = $this->get(route('admin.short-urls.index'));
    $response->assertRedirect();
});

test('short url index accessible by admin', function () {
    $response = $this->actingAs($this->admin)->get(route('admin.short-urls.index'));
    $response->assertOk();
});

test('short url can be created', function () {
    $response = $this->actingAs($this->admin)->post(route('admin.short-urls.store'), [
        'original_url' => 'https://example.com',
        'is_active' => 1,
    ]);
    $response->assertRedirect();
    $response->assertSessionHas('success');
    $this->assertDatabaseHas('short_urls', ['original_url' => 'https://example.com']);
});

test('short url validates original url', function () {
    $response = $this->actingAs($this->admin)->post(route('admin.short-urls.store'), [
        'original_url' => 'not-a-url',
    ]);
    $response->assertSessionHasErrors('original_url');
});

test('short url validates slug format', function () {
    $response = $this->actingAs($this->admin)->post(route('admin.short-urls.store'), [
        'original_url' => 'https://example.com',
        'slug' => 'invalid slug!',
    ]);
    $response->assertSessionHasErrors('slug');
});

test('short url slug auto generated if empty', function () {
    $this->actingAs($this->admin)->post(route('admin.short-urls.store'), [
        'original_url' => 'https://example.com/auto-slug',
    ]);
    $shortUrl = ShortUrl::where('original_url', 'https://example.com/auto-slug')->first();
    expect($shortUrl)->not->toBeNull();
    expect($shortUrl->slug)->not->toBeEmpty();
    expect(strlen($shortUrl->slug))->toBe(6);
});

test('short url can be updated', function () {
    $shortUrl = ShortUrl::create([
        'user_id' => $this->admin->id,
        'original_url' => 'https://old-url.com',
        'slug' => 'oldslug',
        'is_active' => true,
    ]);
    $response = $this->actingAs($this->admin)->put(route('admin.short-urls.update', $shortUrl), [
        'original_url' => 'https://new-url.com',
    ]);
    $response->assertRedirect();
    $this->assertDatabaseHas('short_urls', [
        'id' => $shortUrl->id,
        'original_url' => 'https://new-url.com',
    ]);
});

test('short url can be deleted', function () {
    $shortUrl = ShortUrl::create([
        'user_id' => $this->admin->id,
        'original_url' => 'https://example.com',
        'slug' => 'todelete',
        'is_active' => true,
    ]);
    $response = $this->actingAs($this->admin)->delete(route('admin.short-urls.destroy', $shortUrl));
    $response->assertRedirect();
    $this->assertSoftDeleted('short_urls', ['id' => $shortUrl->id]);
});

test('short url toggle active', function () {
    $shortUrl = ShortUrl::create([
        'user_id' => $this->admin->id,
        'original_url' => 'https://example.com',
        'slug' => 'toggle1',
        'is_active' => true,
    ]);
    $this->actingAs($this->admin)->post(route('admin.short-urls.toggle', $shortUrl));
    $shortUrl->refresh();
    expect($shortUrl->is_active)->toBeFalse();
});

test('short url redirect works', function () {
    ShortUrl::create([
        'user_id' => $this->admin->id,
        'original_url' => 'https://example.com',
        'slug' => 'testgo',
        'is_active' => true,
    ]);
    $response = $this->get('/s/testgo');
    $response->assertRedirect('https://example.com');
});

test('short url redirect expired returns 410', function () {
    ShortUrl::create([
        'user_id' => $this->admin->id,
        'original_url' => 'https://example.com',
        'slug' => 'expired1',
        'is_active' => true,
        'expires_at' => now()->subDay(),
    ]);
    $response = $this->get('/s/expired1');
    $response->assertStatus(410);
});

test('short url click is tracked', function () {
    $shortUrl = ShortUrl::create([
        'user_id' => $this->admin->id,
        'original_url' => 'https://example.com',
        'slug' => 'track1',
        'is_active' => true,
        'clicks_count' => 0,
    ]);
    $this->get('/s/track1');
    $shortUrl->refresh();
    expect($shortUrl->clicks_count)->toBe(1);
    $this->assertDatabaseHas('short_url_clicks', ['short_url_id' => $shortUrl->id]);
});

test('inactive short url redirect returns 410 gone', function () {
    ShortUrl::create([
        'user_id' => $this->admin->id,
        'original_url' => 'https://example.com',
        'slug' => 'inactive1',
        'is_active' => false,
    ]);
    $response = $this->get('/s/inactive1');
    $response->assertStatus(410);
});

test('isExpired returns true for past expires_at', function () {
    $shortUrl = ShortUrl::create([
        'user_id' => $this->admin->id,
        'original_url' => 'https://example.com',
        'slug' => 'exptest1',
        'is_active' => true,
        'expires_at' => now()->subHour(),
    ]);
    expect($shortUrl->isExpired())->toBeTrue();
});

test('isExpired returns false when expires_at is in the future', function () {
    $shortUrl = ShortUrl::create([
        'user_id' => $this->admin->id,
        'original_url' => 'https://example.com',
        'slug' => 'exptest2',
        'is_active' => true,
        'expires_at' => now()->addDay(),
    ]);
    expect($shortUrl->isExpired())->toBeFalse();
});

test('hasReachedMaxClicks returns true when clicks_count equals max_clicks', function () {
    $shortUrl = ShortUrl::create([
        'user_id' => $this->admin->id,
        'original_url' => 'https://example.com',
        'slug' => 'maxclk1',
        'is_active' => true,
        'max_clicks' => 5,
        'clicks_count' => 5,
    ]);
    expect($shortUrl->hasReachedMaxClicks())->toBeTrue();
});

test('isAccessible returns false for expired and inactive urls', function () {
    $expired = ShortUrl::create([
        'user_id' => $this->admin->id,
        'original_url' => 'https://example.com',
        'slug' => 'acc1',
        'is_active' => true,
        'expires_at' => now()->subMinute(),
    ]);

    $inactive = ShortUrl::create([
        'user_id' => $this->admin->id,
        'original_url' => 'https://example.com',
        'slug' => 'acc2',
        'is_active' => false,
    ]);

    $active = ShortUrl::create([
        'user_id' => $this->admin->id,
        'original_url' => 'https://example.com',
        'slug' => 'acc3',
        'is_active' => true,
    ]);

    expect($expired->isAccessible())->toBeFalse()
        ->and($inactive->isAccessible())->toBeFalse()
        ->and($active->isAccessible())->toBeTrue();
});
