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
use Modules\Blog\Models\Comment;
use Modules\Blog\Models\Tag;
use Modules\Blog\States\ApprovedCommentState;
use Modules\Blog\States\SpamCommentState;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $role = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
    $permissions = [
        'view_articles', 'create_articles', 'update_articles', 'delete_articles',
        'view_comments', 'update_comments', 'delete_comments',
    ];
    foreach ($permissions as $perm) {
        Permission::firstOrCreate(['name' => $perm, 'guard_name' => 'web']);
    }
    $role->givePermissionTo($permissions);

    $this->admin = User::factory()->create();
    $this->admin->assignRole('admin');
});

// --- Categories ---

test('categories index is accessible by admin', function () {
    $this->actingAs($this->admin)
        ->get(route('admin.blog.categories.index'))
        ->assertOk();
});

test('store creates a category', function () {
    $this->actingAs($this->admin)
        ->post(route('admin.blog.categories.store'), [
            'name' => 'Nouvelle catégorie',
            'description' => 'Description test',
            'color' => '#FF0000',
            'is_active' => true,
        ])
        ->assertRedirect(route('admin.blog.categories.index'));

    $category = Category::latest()->first();
    expect($category->name)->toBe('Nouvelle catégorie');
});

test('store category fails without name', function () {
    $this->actingAs($this->admin)
        ->post(route('admin.blog.categories.store'), [
            'description' => 'Sans nom',
        ])
        ->assertSessionHasErrors(['name']);
});

test('update modifies a category', function () {
    $category = Category::factory()->create();

    $this->actingAs($this->admin)
        ->put(route('admin.blog.categories.update', $category), [
            'name' => 'Catégorie modifiée',
            'color' => '#00FF00',
            'is_active' => false,
        ])
        ->assertRedirect(route('admin.blog.categories.index'));

    expect($category->fresh()->name)->toBe('Catégorie modifiée');
});

test('destroy soft-deletes a category', function () {
    $category = Category::factory()->create();

    $this->actingAs($this->admin)
        ->delete(route('admin.blog.categories.destroy', $category))
        ->assertRedirect(route('admin.blog.categories.index'));

    $this->assertSoftDeleted('blog_categories', ['id' => $category->id]);
});

// --- Tags ---

test('tags index is accessible by admin', function () {
    $this->actingAs($this->admin)
        ->get(route('admin.blog.tags.index'))
        ->assertOk();
});

test('store creates a tag', function () {
    $this->actingAs($this->admin)
        ->post(route('admin.blog.tags.store'), [
            'name' => 'Nouveau tag',
            'description' => 'Un tag de test',
            'color' => '#0000FF',
        ])
        ->assertRedirect(route('admin.blog.tags.index'));

    $this->assertDatabaseHas('tags', [
        'name' => 'Nouveau tag',
    ]);
});

test('store tag fails with duplicate name', function () {
    Tag::factory()->create(['name' => 'Existant']);

    $this->actingAs($this->admin)
        ->post(route('admin.blog.tags.store'), [
            'name' => 'Existant',
        ])
        ->assertSessionHasErrors(['name']);
});

test('destroy soft-deletes a tag', function () {
    $tag = Tag::factory()->create();

    $this->actingAs($this->admin)
        ->delete(route('admin.blog.tags.destroy', $tag))
        ->assertRedirect(route('admin.blog.tags.index'));

    $this->assertSoftDeleted('tags', ['id' => $tag->id]);
});

// --- Comments ---

test('comments index is accessible by admin', function () {
    $this->actingAs($this->admin)
        ->get(route('admin.blog.comments.index'))
        ->assertOk();
});

test('approve changes comment status to approved', function () {
    $article = Article::factory()->create();
    $comment = Comment::factory()->create([
        'article_id' => $article->id,
        'status' => 'pending',
    ]);

    $this->actingAs($this->admin)
        ->get(route('admin.blog.comments.approve', $comment));

    expect($comment->fresh()->status)->toBeInstanceOf(ApprovedCommentState::class);
});

test('spam changes comment status to spam', function () {
    $article = Article::factory()->create();
    $comment = Comment::factory()->create([
        'article_id' => $article->id,
        'status' => 'pending',
    ]);

    $this->actingAs($this->admin)
        ->get(route('admin.blog.comments.spam', $comment));

    expect($comment->fresh()->status)->toBeInstanceOf(SpamCommentState::class);
});

test('destroy force-deletes a comment', function () {
    $article = Article::factory()->create();
    $comment = Comment::factory()->create([
        'article_id' => $article->id,
    ]);

    $this->actingAs($this->admin)
        ->delete(route('admin.blog.comments.destroy', $comment));

    $this->assertDatabaseMissing('blog_comments', ['id' => $comment->id]);
});
