<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Modules\Backoffice\Livewire\ArticlesTable;
use Modules\Backoffice\Livewire\CategoriesTable;
use Modules\Backoffice\Livewire\CommentsTable;
use Modules\Backoffice\Livewire\RolesTable;
use Modules\Backoffice\Livewire\UsersTable;
use Modules\Blog\Models\Article;
use Modules\Blog\Models\Category;
use Modules\Blog\Models\Comment;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $this->seed(RolesAndPermissionsSeeder::class);
    $this->admin = User::factory()->create();
    $this->admin->assignRole('super_admin');
});

// ── UsersTable ──────────────────────────────────────────────────────────

it('renders users table', function () {
    Livewire::actingAs($this->admin)
        ->test(UsersTable::class)
        ->assertStatus(200);
});

it('users table can search by name', function () {
    User::factory()->create(['name' => 'Alice Tremblay']);

    Livewire::actingAs($this->admin)
        ->test(UsersTable::class)
        ->set('search', 'Alice')
        ->assertSet('search', 'Alice');
});

it('users table can filter by status', function () {
    Livewire::actingAs($this->admin)
        ->test(UsersTable::class)
        ->set('filterStatus', 'active')
        ->assertSet('filterStatus', 'active');
});

it('users table can filter by role', function () {
    Livewire::actingAs($this->admin)
        ->test(UsersTable::class)
        ->set('filterRole', 'admin')
        ->assertSet('filterRole', 'admin');
});

it('users table resets filters', function () {
    Livewire::actingAs($this->admin)
        ->test(UsersTable::class)
        ->set('search', 'test')
        ->set('filterStatus', 'active')
        ->set('filterRole', 'admin')
        ->call('resetFilters')
        ->assertSet('search', '')
        ->assertSet('filterStatus', '')
        ->assertSet('filterRole', '');
});

it('users table can sort', function () {
    Livewire::actingAs($this->admin)
        ->test(UsersTable::class)
        ->call('sort', 'email')
        ->assertSet('sortBy', 'email')
        ->assertSet('sortDirection', 'asc')
        ->call('sort', 'email')
        ->assertSet('sortDirection', 'desc');
});

it('users table can toggle active status', function () {
    $user = User::factory()->create(['is_active' => true]);

    Livewire::actingAs($this->admin)
        ->test(UsersTable::class)
        ->call('toggleActive', $user->id);

    expect($user->fresh()->is_active)->toBeFalse();
});

it('users table can inline update name', function () {
    $user = User::factory()->create(['name' => 'Old Name']);

    Livewire::actingAs($this->admin)
        ->test(UsersTable::class)
        ->call('inlineUpdateName', $user->id, 'New Name');

    expect($user->fresh()->name)->toBe('New Name');
});

it('users table ignores empty inline name', function () {
    $user = User::factory()->create(['name' => 'Original']);

    Livewire::actingAs($this->admin)
        ->test(UsersTable::class)
        ->call('inlineUpdateName', $user->id, '   ');

    expect($user->fresh()->name)->toBe('Original');
});

it('users table bulk activate', function () {
    $user1 = User::factory()->create(['is_active' => false]);
    $user2 = User::factory()->create(['is_active' => false]);

    Livewire::actingAs($this->admin)
        ->test(UsersTable::class)
        ->set('selected', [$user1->id, $user2->id])
        ->set('bulkAction', 'activate')
        ->call('executeBulkAction');

    expect($user1->fresh()->is_active)->toBeTrue();
    expect($user2->fresh()->is_active)->toBeTrue();
});

it('users table bulk deactivate', function () {
    $user1 = User::factory()->create(['is_active' => true]);
    $user2 = User::factory()->create(['is_active' => true]);

    Livewire::actingAs($this->admin)
        ->test(UsersTable::class)
        ->set('selected', [$user1->id, $user2->id])
        ->set('bulkAction', 'deactivate')
        ->call('executeBulkAction');

    expect($user1->fresh()->is_active)->toBeFalse();
    expect($user2->fresh()->is_active)->toBeFalse();
});

it('users table bulk delete does not delete self', function () {
    $other = User::factory()->create();

    Livewire::actingAs($this->admin)
        ->test(UsersTable::class)
        ->set('selected', [$this->admin->id, $other->id])
        ->set('bulkAction', 'delete')
        ->call('executeBulkAction');

    expect(User::find($this->admin->id))->not->toBeNull();
    expect(User::find($other->id))->toBeNull();
});

// ── RolesTable ──────────────────────────────────────────────────────────

it('renders roles table', function () {
    Livewire::actingAs($this->admin)
        ->test(RolesTable::class)
        ->assertStatus(200);
});

it('roles table can search', function () {
    Livewire::actingAs($this->admin)
        ->test(RolesTable::class)
        ->set('search', 'admin')
        ->assertSet('search', 'admin');
});

it('roles table can sort', function () {
    Livewire::actingAs($this->admin)
        ->test(RolesTable::class)
        ->call('sort', 'name')
        ->assertSet('sortDirection', 'desc')
        ->call('sort', 'name')
        ->assertSet('sortDirection', 'asc');
});

// ── CategoriesTable ─────────────────────────────────────────────────────

it('renders categories table', function () {
    Livewire::actingAs($this->admin)
        ->test(CategoriesTable::class)
        ->assertStatus(200);
});

it('categories table can search', function () {
    Livewire::actingAs($this->admin)
        ->test(CategoriesTable::class)
        ->set('search', 'Tech')
        ->assertSet('search', 'Tech');
});

it('categories table can filter active', function () {
    Livewire::actingAs($this->admin)
        ->test(CategoriesTable::class)
        ->set('filterActive', '1')
        ->assertSet('filterActive', '1');
});

it('categories table resets filters', function () {
    Livewire::actingAs($this->admin)
        ->test(CategoriesTable::class)
        ->set('search', 'test')
        ->set('filterActive', '1')
        ->call('resetFilters')
        ->assertSet('search', '')
        ->assertSet('filterActive', '');
});

it('categories table can toggle active', function () {
    $category = Category::factory()->create(['is_active' => true]);

    Livewire::actingAs($this->admin)
        ->test(CategoriesTable::class)
        ->call('toggleActive', $category->id);

    expect($category->fresh()->is_active)->toBeFalse();
});

it('categories table bulk activate', function () {
    $cat1 = Category::factory()->create(['is_active' => false]);
    $cat2 = Category::factory()->create(['is_active' => false]);

    Livewire::actingAs($this->admin)
        ->test(CategoriesTable::class)
        ->set('selected', [$cat1->id, $cat2->id])
        ->set('bulkAction', 'activate')
        ->call('executeBulkAction');

    expect($cat1->fresh()->is_active)->toBeTrue();
    expect($cat2->fresh()->is_active)->toBeTrue();
});

it('categories table bulk delete', function () {
    $cat = Category::factory()->create();

    Livewire::actingAs($this->admin)
        ->test(CategoriesTable::class)
        ->set('selected', [$cat->id])
        ->set('bulkAction', 'delete')
        ->call('executeBulkAction');

    expect(Category::find($cat->id))->toBeNull();
});

// ── CommentsTable ───────────────────────────────────────────────────────

it('renders comments table', function () {
    Livewire::actingAs($this->admin)
        ->test(CommentsTable::class)
        ->assertStatus(200);
});

it('comments table can search', function () {
    Livewire::actingAs($this->admin)
        ->test(CommentsTable::class)
        ->set('search', 'test comment')
        ->assertSet('search', 'test comment');
});

it('comments table can filter by status', function () {
    Livewire::actingAs($this->admin)
        ->test(CommentsTable::class)
        ->set('filterStatus', 'pending')
        ->assertSet('filterStatus', 'pending');
});

it('comments table resets filters', function () {
    Livewire::actingAs($this->admin)
        ->test(CommentsTable::class)
        ->set('search', 'test')
        ->set('filterStatus', 'pending')
        ->call('resetFilters')
        ->assertSet('search', '')
        ->assertSet('filterStatus', '');
});

it('comments table can delete a comment', function () {
    $article = Article::factory()->create();
    $comment = Comment::factory()->create(['article_id' => $article->id]);

    Livewire::actingAs($this->admin)
        ->test(CommentsTable::class)
        ->call('delete', $comment->id);

    expect(Comment::withTrashed()->find($comment->id))->toBeNull();
});

it('comments table bulk delete', function () {
    $article = Article::factory()->create();
    $comment1 = Comment::factory()->create(['article_id' => $article->id]);
    $comment2 = Comment::factory()->create(['article_id' => $article->id]);

    Livewire::actingAs($this->admin)
        ->test(CommentsTable::class)
        ->set('selected', [$comment1->id, $comment2->id])
        ->set('bulkAction', 'delete')
        ->call('executeBulkAction');

    expect(Comment::withTrashed()->whereIn('id', [$comment1->id, $comment2->id])->count())->toBe(0);
});

// ── ArticlesTable ───────────────────────────────────────────────────────

it('renders articles table', function () {
    Livewire::actingAs($this->admin)
        ->test(ArticlesTable::class)
        ->assertStatus(200);
});

it('articles table can search', function () {
    Livewire::actingAs($this->admin)
        ->test(ArticlesTable::class)
        ->set('search', 'Laravel')
        ->assertSet('search', 'Laravel');
});

it('articles table can filter by status', function () {
    Livewire::actingAs($this->admin)
        ->test(ArticlesTable::class)
        ->set('filterStatus', 'draft')
        ->assertSet('filterStatus', 'draft');
});

it('articles table can filter by category', function () {
    $category = Category::factory()->create();

    Livewire::actingAs($this->admin)
        ->test(ArticlesTable::class)
        ->set('filterCategory', (string) $category->id)
        ->assertSet('filterCategory', (string) $category->id);
});

it('articles table resets filters', function () {
    Livewire::actingAs($this->admin)
        ->test(ArticlesTable::class)
        ->set('search', 'test')
        ->set('filterStatus', 'draft')
        ->set('filterCategory', '1')
        ->call('resetFilters')
        ->assertSet('search', '')
        ->assertSet('filterStatus', '')
        ->assertSet('filterCategory', '');
});

it('articles table can sort', function () {
    Livewire::actingAs($this->admin)
        ->test(ArticlesTable::class)
        ->call('sort', 'title')
        ->assertSet('sortBy', 'title')
        ->assertSet('sortDirection', 'asc');
});

it('articles table can change status from draft to published', function () {
    $article = Article::factory()->draft()->create();

    Livewire::actingAs($this->admin)
        ->test(ArticlesTable::class)
        ->call('changeStatus', $article->id, 'published');

    $article->refresh();
    expect((string) $article->status)->toContain('published');
});

it('articles table ignores unknown status', function () {
    $article = Article::factory()->draft()->create();

    Livewire::actingAs($this->admin)
        ->test(ArticlesTable::class)
        ->call('changeStatus', $article->id, 'nonexistent');

    $article->refresh();
    expect((string) $article->status)->toContain('draft');
});

it('articles table bulk delete', function () {
    $article1 = Article::factory()->create();
    $article2 = Article::factory()->create();

    Livewire::actingAs($this->admin)
        ->test(ArticlesTable::class)
        ->set('selected', [$article1->id, $article2->id])
        ->set('bulkAction', 'delete')
        ->call('executeBulkAction');

    expect(Article::whereIn('id', [$article1->id, $article2->id])->count())->toBe(0);
});
