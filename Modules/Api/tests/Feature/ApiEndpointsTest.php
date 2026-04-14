<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Blog\Models\Article;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->token = $this->user->createToken('test')->plainTextToken;
});

// --- Public endpoints (no auth) ---

describe('Public API endpoints', function () {
    it('can search articles publicly', function () {
        $this->getJson('/api/v1/search?q=test')->assertOk();
    });

    it('can list articles publicly', function () {
        $this->getJson('/api/v1/articles')->assertOk();
    });

    it('can list blog categories publicly', function () {
        $this->getJson('/api/v1/blog/categories')->assertOk();
    });

    it('can search blog publicly', function () {
        $this->getJson('/api/v1/blog/search?q=test')->assertOk();
    });
});

// --- Newsletter ---

describe('Newsletter API', function () {
    it('can subscribe to newsletter', function () {
        $this->postJson('/api/v1/newsletter/subscribe', [
            'email' => 'test@example.com',
        ])->assertCreated()->assertJson(['success' => true]);
    });

    it('newsletter subscribe validates email', function () {
        $this->postJson('/api/v1/newsletter/subscribe', [
            'email' => 'invalid',
        ])->assertStatus(422);
    });
});

// --- Authenticated endpoints ---

describe('Notification API', function () {
    it('requires auth to list notifications', function () {
        $this->getJson('/api/v1/notifications')->assertUnauthorized();
    });

    it('can list notifications with token', function () {
        $this->withToken($this->token)
            ->getJson('/api/v1/notifications')
            ->assertOk();
    });

    it('can mark all notifications as read', function () {
        $this->withToken($this->token)
            ->postJson('/api/v1/notifications/read-all')
            ->assertOk();
    });
});

// --- Comment API ---

describe('Comment API', function () {
    it('requires auth to post comment', function () {
        $article = Article::factory()->create(['status' => 'published']);
        $this->postJson("/api/v1/articles/{$article->id}/comments", [
            'content' => 'Test comment',
        ])->assertUnauthorized();
    });

    it('can post comment with auth', function () {
        $article = Article::factory()->create(['status' => 'published']);
        $this->withToken($this->token)
            ->postJson("/api/v1/articles/{$article->id}/comments", [
                'content' => 'Test comment',
            ])->assertStatus(201);
    });
});
