<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Laravel\Sanctum\Sanctum;
use Modules\Media\Models\MediaUpload;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('GET /media returns 401 for unauthenticated user', function () {
    $response = $this->getJson('/api/v1/media');

    $response->assertStatus(401);
});

test('GET /media returns paginated media list', function () {
    Sanctum::actingAs(User::factory()->create(), ['*']);

    $container = MediaUpload::firstOrCreate(['name' => 'general']);
    $container->addMedia(UploadedFile::fake()->image('image1.jpg'))->toMediaCollection('images');
    $container->addMedia(UploadedFile::fake()->image('image2.jpg'))->toMediaCollection('images');
    $container->addMedia(UploadedFile::fake()->image('image3.jpg'))->toMediaCollection('images');

    $response = $this->getJson('/api/v1/media');

    $response->assertStatus(200)
        ->assertJsonFragment(['success' => true])
        ->assertJsonCount(3, 'data.data');
});

test('GET /media?search= filters by filename', function () {
    Sanctum::actingAs(User::factory()->create(), ['*']);

    $container = MediaUpload::firstOrCreate(['name' => 'general']);
    $container->addMedia(UploadedFile::fake()->image('test_image.jpg'))->toMediaCollection('images');
    $container->addMedia(UploadedFile::fake()->image('other_image.jpg'))->toMediaCollection('images');

    $response = $this->getJson('/api/v1/media?search=test');

    $response->assertStatus(200)
        ->assertJsonCount(1, 'data.data');
});

test('GET /media/{id} returns media with resource structure', function () {
    Sanctum::actingAs(User::factory()->create(), ['*']);

    $container = MediaUpload::firstOrCreate(['name' => 'general']);
    $media = $container->addMedia(UploadedFile::fake()->image('specific.jpg'))->toMediaCollection('images');

    $response = $this->getJson("/api/v1/media/{$media->id}");

    $response->assertStatus(200)
        ->assertJsonStructure([
            'success',
            'message',
            'data' => ['id', 'file_name', 'mime_type', 'url', 'thumbnail'],
        ])
        ->assertJsonFragment(['id' => $media->id, 'file_name' => 'specific.jpg']);
});

test('GET /media/999999 returns 404', function () {
    Sanctum::actingAs(User::factory()->create(), ['*']);

    $response = $this->getJson('/api/v1/media/999999');

    $response->assertStatus(404);
});

test('POST /media uploads image and returns 201', function () {
    Sanctum::actingAs(User::factory()->create(), ['*']);

    $response = $this->postJson('/api/v1/media', [
        'file' => UploadedFile::fake()->image('upload.jpg', 800, 600),
        'title' => 'Test upload',
        'alt_text' => 'A test image',
    ]);

    $response->assertStatus(201)
        ->assertJsonStructure([
            'success',
            'message',
            'data' => ['id', 'file_name', 'url'],
        ]);

    $this->assertDatabaseHas('media', [
        'file_name' => 'upload.jpg',
    ]);
});

test('DELETE /media/{id} returns 204 and removes media', function () {
    Sanctum::actingAs(User::factory()->create(), ['*']);

    $container = MediaUpload::firstOrCreate(['name' => 'general']);
    $media = $container->addMedia(UploadedFile::fake()->image('to_delete.jpg'))->toMediaCollection('images');
    $mediaId = $media->id;

    $response = $this->deleteJson("/api/v1/media/{$mediaId}");

    $response->assertStatus(204);

    $this->assertDatabaseMissing('media', ['id' => $mediaId]);
});
