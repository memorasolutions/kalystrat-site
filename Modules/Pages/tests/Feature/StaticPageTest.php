<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Pages\Models\StaticPage;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

// ---------------------------------------------------------------------------
// Model tests
// ---------------------------------------------------------------------------

it('creates a static page', function () {
    $page = StaticPage::factory()->create([
        'title' => 'About Us',
        'status' => 'draft',
    ]);

    expect($page->exists)->toBeTrue()
        ->and($page->title)->toBe('About Us')
        ->and($page->status)->toBe('draft');

    $this->assertDatabaseHas('static_pages', ['id' => $page->id]);
});

it('auto-generates slug from title', function () {
    // Create without providing a slug so the boot() callback fires.
    $page = StaticPage::create([
        'title' => 'My Awesome Page',
        'status' => 'draft',
    ]);

    expect($page->slug)->not->toBeEmpty();
    // The slug must be a slugified version of the title.
    expect($page->slug)->toContain('my-awesome-page');
});

it('scope published returns only published pages', function () {
    StaticPage::factory()->published()->count(3)->create();
    StaticPage::factory()->draft()->count(2)->create();

    $results = StaticPage::published()->get();

    expect($results)->toHaveCount(3);
    $results->each(fn ($page) => expect($page->status)->toBe('published'));
});

it('soft deletes a page', function () {
    $page = StaticPage::factory()->create();
    $pageId = $page->id;

    $page->delete();

    expect(StaticPage::find($pageId))->toBeNull();
    expect(StaticPage::withTrashed()->find($pageId))->not->toBeNull()
        ->and(StaticPage::withTrashed()->find($pageId)->deleted_at)->not->toBeNull();
});

it('renders safe content via safe_content attribute', function () {
    $page = StaticPage::factory()->create([
        'content' => '<p>Hello world</p><script>alert("xss")</script>',
    ]);

    $safe = $page->safe_content;

    // The purifier must strip the script tag.
    expect($safe)->not->toContain('<script>')
        ->and($safe)->not->toContain('alert("xss")');
});

// ---------------------------------------------------------------------------
// Admin - authentication & authorization
// ---------------------------------------------------------------------------

it('admin index redirects guest to login', function () {
    $this->get(route('admin.pages.index'))
        ->assertRedirect(route('login'));
});

it('admin index requires view_pages permission', function () {
    $user = User::factory()->create();
    $user->assignRole('user'); // role without view_pages

    $this->actingAs($user)
        ->get(route('admin.pages.index'))
        ->assertForbidden();
});

it('admin index is accessible with view_pages permission', function () {
    $user = User::factory()->create();
    $user->assignRole('super_admin');

    $this->actingAs($user)
        ->get(route('admin.pages.index'))
        ->assertOk();
});

// ---------------------------------------------------------------------------
// Admin - store
// ---------------------------------------------------------------------------

it('admin stores a new page', function () {
    $user = User::factory()->create();
    $user->assignRole('super_admin');

    $this->actingAs($user)
        ->post(route('admin.pages.store'), [
            'title' => 'New Service Page',
            'content' => '<p>Service description</p>',
            'status' => 'draft',
            'template' => 'default',
        ])
        ->assertRedirect(route('admin.pages.index'));

    $this->assertDatabaseHas('static_pages', ['status' => 'draft']);
});

it('admin validates title is required on store', function () {
    $user = User::factory()->create();
    $user->assignRole('super_admin');

    $this->actingAs($user)
        ->post(route('admin.pages.store'), [
            'content' => 'Some content',
        ])
        ->assertSessionHasErrors(['title']);
});

it('admin validates status must be draft or published', function () {
    $user = User::factory()->create();
    $user->assignRole('super_admin');

    $this->actingAs($user)
        ->post(route('admin.pages.store'), [
            'title' => 'Test Page',
            'status' => 'invalid-status',
        ])
        ->assertSessionHasErrors(['status']);
});

it('admin soft-deletes a page via destroy route', function () {
    $user = User::factory()->create();
    $user->assignRole('super_admin');

    $page = StaticPage::factory()->create();

    $this->actingAs($user)
        ->delete(route('admin.pages.destroy', $page))
        ->assertRedirect(route('admin.pages.index'));

    $this->assertSoftDeleted('static_pages', ['id' => $page->id]);
});

// ---------------------------------------------------------------------------
// Admin - edit & update
// ---------------------------------------------------------------------------

it('admin edit view loads with existing page', function () {
    $user = User::factory()->create();
    $user->assignRole('super_admin');

    $page = StaticPage::factory()->create();

    $this->actingAs($user)
        ->get(route('admin.pages.edit', $page))
        ->assertOk();
});

it('admin update modifies a page', function () {
    $user = User::factory()->create();
    $user->assignRole('super_admin');

    $page = StaticPage::factory()->create();

    $this->actingAs($user)
        ->put(route('admin.pages.update', $page), [
            'title' => 'Updated Page Title',
            'content' => '<p>Updated content</p>',
            'status' => 'published',
            'template' => 'default',
        ])
        ->assertRedirect();

    $page->refresh();
    expect($page->title)->toBe('Updated Page Title');
});

it('admin update validates title is required', function () {
    $user = User::factory()->create();
    $user->assignRole('super_admin');

    $page = StaticPage::factory()->create();

    $this->actingAs($user)
        ->put(route('admin.pages.update', $page), [
            'content' => 'Some content',
        ])
        ->assertSessionHasErrors(['title']);
});

it('admin create view is accessible', function () {
    $user = User::factory()->create();
    $user->assignRole('super_admin');

    $this->actingAs($user)
        ->get(route('admin.pages.create'))
        ->assertOk();
});

// ---------------------------------------------------------------------------
// Relationships
// ---------------------------------------------------------------------------

it('parent-child relationship works', function () {
    $parent = StaticPage::factory()->create();
    $child = StaticPage::factory()->create(['parent_id' => $parent->id]);

    expect($child->parent->id)->toBe($parent->id);
    expect($parent->children)->toHaveCount(1);
    expect($parent->children->first()->id)->toBe($child->id);
});

it('factory create produces a valid persisted StaticPage', function () {
    $page = StaticPage::factory()->create();

    expect($page)->toBeInstanceOf(StaticPage::class);
    expect($page->id)->not->toBeNull();
    expect($page->title)->not->toBeEmpty();
    expect($page->slug)->not->toBeEmpty();
    $this->assertDatabaseHas('static_pages', ['id' => $page->id]);
});

it('published scope excludes draft pages', function () {
    StaticPage::factory()->published()->create();
    StaticPage::factory()->draft()->create();

    $published = StaticPage::published()->get();

    expect($published)->toHaveCount(1);
    expect($published->first()->status)->toBe('published');
});

it('slug is stored as translatable JSON', function () {
    $page = StaticPage::factory()->create();

    expect($page->slug)->toBeString();
    expect($page->getTranslation('slug', 'en'))->toBeString();
});

it('roots scope returns only top-level pages', function () {
    $root = StaticPage::factory()->create(['parent_id' => null]);
    StaticPage::factory()->create(['parent_id' => $root->id]);

    $roots = StaticPage::roots()->get();

    expect($roots)->toHaveCount(1);
    expect($roots->first()->parent_id)->toBeNull();
});

it('depth returns correct nesting level', function () {
    $root = StaticPage::factory()->create();
    $child = StaticPage::factory()->create(['parent_id' => $root->id]);
    $grandchild = StaticPage::factory()->create(['parent_id' => $child->id]);

    expect($root->depth())->toBe(0);
    expect($child->depth())->toBe(1);
    expect($grandchild->depth())->toBe(2);
});
