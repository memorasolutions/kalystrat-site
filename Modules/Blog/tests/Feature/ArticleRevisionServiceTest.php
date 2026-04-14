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
use Modules\Blog\Models\ArticleRevision;
use Modules\Blog\Services\ArticleRevisionService;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $this->seed(RolesAndPermissionsSeeder::class);
    $this->user = User::factory()->create();
    $this->user->assignRole('super_admin');
    $this->service = app(ArticleRevisionService::class);
    // Detach observer to avoid double revision creation (observer also calls createRevision)
    Article::unsetEventDispatcher();
    $this->article = Article::factory()->create(['user_id' => $this->user->id]);
});

test('createRevision creates revision when tracked field changes', function () {
    $this->article->update(['title' => 'Updated Title']);
    $revision = $this->service->createRevision($this->article);

    expect($revision)->toBeInstanceOf(ArticleRevision::class);
    expect($revision->article_id)->toBe($this->article->id);
    expect($revision->revision_number)->toBe(1);
});

test('createRevision returns null when no tracked fields changed', function () {
    $revision = $this->service->createRevision($this->article);

    expect($revision)->toBeNull();
});

test('createRevision increments revision_number correctly', function () {
    $this->article->update(['title' => 'First Change']);
    $rev1 = $this->service->createRevision($this->article);

    $this->article->update(['content' => 'New content']);
    $rev2 = $this->service->createRevision($this->article);

    expect($rev1->revision_number)->toBe(1);
    expect($rev2->revision_number)->toBe(2);
});

test('createRevision stores user_id from auth or article owner', function () {
    $this->article->update(['title' => 'Change']);
    $revision = $this->service->createRevision($this->article);

    expect($revision->user_id)->toBe($this->user->id);
});

test('restore updates article with revision data', function () {
    $originalTitle = $this->article->title;

    $this->article->update(['title' => 'Changed Title']);
    $revision = $this->service->createRevision($this->article);

    $this->article->update(['title' => 'Changed Again']);

    $restored = $this->service->restore($this->article, $revision);

    expect($restored->content)->toBe($revision->content);
});

test('getRevisions returns revisions ordered by latest', function () {
    $this->article->update(['title' => 'First']);
    $rev1 = $this->service->createRevision($this->article);

    $this->article->update(['content' => 'Second']);
    $rev2 = $this->service->createRevision($this->article);

    $this->article->update(['excerpt' => 'Third']);
    $rev3 = $this->service->createRevision($this->article);

    $revisions = $this->service->getRevisions($this->article);

    expect($revisions)->toHaveCount(3);
    expect($revisions->first()->id)->toBe($rev3->id);
    expect($revisions->last()->id)->toBe($rev1->id);
});

test('getRevisions respects limit parameter', function () {
    $this->article->update(['title' => 'First']);
    $this->service->createRevision($this->article);

    $this->article->update(['content' => 'Second']);
    $this->service->createRevision($this->article);

    $this->article->update(['excerpt' => 'Third']);
    $this->service->createRevision($this->article);

    $revisions = $this->service->getRevisions($this->article, 2);

    expect($revisions)->toHaveCount(2);
});
