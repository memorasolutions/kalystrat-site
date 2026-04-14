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
use Modules\Blog\Models\Category;
use Modules\Blog\States\DraftArticleState;
use Modules\Blog\States\PublishedArticleState;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $role = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
    foreach (['view_articles', 'create_articles', 'update_articles', 'delete_articles'] as $perm) {
        Permission::firstOrCreate(['name' => $perm, 'guard_name' => 'web']);
    }
    $role->givePermissionTo(['view_articles', 'create_articles', 'update_articles', 'delete_articles']);

    $this->admin = User::factory()->create();
    $this->admin->assignRole('admin');
});

test('GET /admin/blog/articles is accessible by admin', function () {
    $this->actingAs($this->admin)
        ->get(route('admin.blog.articles.index'))
        ->assertOk();
});

test('GET /admin/blog/articles redirects guest to login', function () {
    $this->get(route('admin.blog.articles.index'))
        ->assertRedirect(route('login'));
});

test('GET /admin/blog/articles/create is accessible by admin', function () {
    $this->actingAs($this->admin)
        ->get(route('admin.blog.articles.create'))
        ->assertOk();
});

test('POST /admin/blog/articles creates a valid article', function () {
    $category = Category::factory()->create();

    $this->actingAs($this->admin)
        ->post(route('admin.blog.articles.store'), [
            'title' => 'Mon super article',
            'content' => 'Contenu de test.',
            'excerpt' => 'Résumé court.',
            'status' => 'draft',
            'category_id' => $category->id,
            'is_featured' => true,
        ])
        ->assertRedirect(route('admin.blog.articles.index'));

    $article = Article::latest()->first();
    expect($article->title)->toBe('Mon super article')
        ->and($article->user_id)->toBe($this->admin->id);
});

test('POST /admin/blog/articles fails without title', function () {
    $this->actingAs($this->admin)
        ->post(route('admin.blog.articles.store'), [
            'content' => 'Contenu sans titre.',
            'status' => 'draft',
        ])
        ->assertSessionHasErrors(['title']);
});

test('GET /admin/blog/articles/{id}/edit is accessible by admin', function () {
    $article = Article::factory()->create(['user_id' => $this->admin->id]);

    $this->actingAs($this->admin)
        ->get(route('admin.blog.articles.edit', $article))
        ->assertOk();
});

test('PUT /admin/blog/articles/{id} updates an article', function () {
    $article = Article::factory()->create(['user_id' => $this->admin->id]);

    $this->actingAs($this->admin)
        ->put(route('admin.blog.articles.update', $article), [
            'title' => 'Titre mis à jour',
            'content' => 'Nouveau contenu.',
            'status' => 'draft',
        ])
        ->assertRedirect(route('admin.blog.articles.index'));

    expect($article->fresh()->title)->toBe('Titre mis à jour');
});

test('DELETE /admin/blog/articles/{id} soft-deletes an article', function () {
    $article = Article::factory()->create(['user_id' => $this->admin->id]);

    $this->actingAs($this->admin)
        ->delete(route('admin.blog.articles.destroy', $article))
        ->assertRedirect(route('admin.blog.articles.index'));

    $this->assertSoftDeleted('articles', ['id' => $article->id]);
});

test('POST publish changes status to published', function () {
    $article = Article::factory()->draft()->create(['user_id' => $this->admin->id]);

    $this->actingAs($this->admin)
        ->post(route('admin.blog.articles.publish', $article));

    expect($article->fresh()->status)->toBeInstanceOf(PublishedArticleState::class);
});

test('POST unpublish changes status to draft', function () {
    $article = Article::factory()->published()->create(['user_id' => $this->admin->id]);

    $this->actingAs($this->admin)
        ->post(route('admin.blog.articles.unpublish', $article));

    expect($article->fresh()->status)->toBeInstanceOf(DraftArticleState::class);
});
