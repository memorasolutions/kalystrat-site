<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Menu\Models\Menu;
use Modules\Menu\Models\MenuItem;
use Modules\Menu\Services\MenuService;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $this->admin = User::factory()->create();
    $this->admin->assignRole('super_admin');
});

it('affiche la liste des menus', function () {
    $this->actingAs($this->admin)
        ->get(route('admin.menus.index'))
        ->assertOk();
});

it('affiche le formulaire de création', function () {
    $this->actingAs($this->admin)
        ->get(route('admin.menus.create'))
        ->assertOk();
});

it('crée un menu', function () {
    $this->actingAs($this->admin)
        ->post(route('admin.menus.store'), [
            'name' => 'Menu principal',
            'location' => 'header',
        ])
        ->assertRedirect()
        ->assertSessionHasNoErrors();

    $this->assertDatabaseHas('menus', ['name' => 'Menu principal', 'location' => 'header']);
});

it('valide le nom requis', function () {
    $this->actingAs($this->admin)
        ->post(route('admin.menus.store'), ['location' => 'header'])
        ->assertSessionHasErrors('name');
});

it('valide le nom unique', function () {
    Menu::create(['name' => 'Existant', 'location' => 'header']);

    $this->actingAs($this->admin)
        ->post(route('admin.menus.store'), ['name' => 'Existant', 'location' => 'footer'])
        ->assertSessionHasErrors('name');
});

it('affiche le formulaire d\'édition', function () {
    $menu = Menu::create(['name' => 'Test', 'location' => 'header']);

    $this->actingAs($this->admin)
        ->get(route('admin.menus.edit', $menu))
        ->assertOk();
});

it('met à jour un menu', function () {
    $menu = Menu::create(['name' => 'Ancien', 'location' => 'header']);

    $this->actingAs($this->admin)
        ->put(route('admin.menus.update', $menu), ['name' => 'Nouveau', 'location' => 'footer'])
        ->assertRedirect()
        ->assertSessionHasNoErrors();

    $this->assertDatabaseHas('menus', ['id' => $menu->id, 'name' => 'Nouveau', 'location' => 'footer']);
});

it('supprime un menu', function () {
    $menu = Menu::create(['name' => 'A supprimer', 'location' => 'header']);

    $this->actingAs($this->admin)
        ->delete(route('admin.menus.destroy', $menu))
        ->assertRedirect();

    $this->assertDatabaseMissing('menus', ['id' => $menu->id]);
});

it('sauvegarde les items du menu via JSON', function () {
    $menu = Menu::create(['name' => 'Test', 'location' => 'header']);

    $this->actingAs($this->admin)
        ->postJson(route('admin.menus.save-items', $menu), [
            'items' => [
                ['title' => 'Accueil', 'url' => '/', 'type' => 'custom', 'target' => '_self', 'order' => 0, 'enabled' => true],
                ['title' => 'Contact', 'url' => '/contact', 'type' => 'custom', 'target' => '_self', 'order' => 1, 'enabled' => true],
            ],
        ])
        ->assertJson(['success' => true]);

    expect($menu->allItems()->count())->toBe(2);
});

it('supprime les items retirés lors de la sauvegarde', function () {
    $menu = Menu::create(['name' => 'Test', 'location' => 'header']);
    $item1 = MenuItem::create(['menu_id' => $menu->id, 'title' => 'Garder', 'type' => 'custom', 'url' => '/', 'order' => 0]);
    MenuItem::create(['menu_id' => $menu->id, 'title' => 'Supprimer', 'type' => 'custom', 'url' => '/old', 'order' => 1]);

    $this->actingAs($this->admin)
        ->postJson(route('admin.menus.save-items', $menu), [
            'items' => [
                ['id' => $item1->id, 'title' => 'Garder', 'url' => '/', 'type' => 'custom', 'target' => '_self', 'order' => 0, 'enabled' => true],
            ],
        ])
        ->assertJson(['success' => true]);

    expect($menu->allItems()->count())->toBe(1);
});

it('résout l\'URL d\'un item custom', function () {
    $menu = Menu::create(['name' => 'Test', 'location' => 'header']);
    $item = MenuItem::create(['menu_id' => $menu->id, 'title' => 'A propos', 'type' => 'custom', 'url' => '/about', 'order' => 0]);

    expect($item->resolveUrl())->toBe('/about');
});

it('retourne un menu par emplacement via le service', function () {
    Menu::create(['name' => 'Header', 'location' => 'header', 'is_active' => true]);

    $service = app(MenuService::class);
    $menu = $service->getByLocation('header');

    expect($menu)->not->toBeNull();
    expect($menu->name)->toBe('Header');
});

it('retourne null pour un emplacement inexistant', function () {
    $service = app(MenuService::class);
    expect($service->getByLocation('inexistant'))->toBeNull();
});

it('cascade la suppression des items avec le menu', function () {
    $menu = Menu::create(['name' => 'Test', 'location' => 'header']);
    MenuItem::create(['menu_id' => $menu->id, 'title' => 'Item 1', 'type' => 'custom', 'url' => '/', 'order' => 0]);
    MenuItem::create(['menu_id' => $menu->id, 'title' => 'Item 2', 'type' => 'custom', 'url' => '/a', 'order' => 1]);

    $menu->delete();

    expect(MenuItem::where('menu_id', $menu->id)->count())->toBe(0);
});

test('MenuItem parent/children relationship is bidirectional', function () {
    $menu = Menu::create(['name' => 'Tree Menu', 'location' => 'header']);
    $parent = MenuItem::create(['menu_id' => $menu->id, 'title' => 'Parent', 'type' => 'custom', 'url' => '/', 'order' => 0]);
    $child = MenuItem::create(['menu_id' => $menu->id, 'parent_id' => $parent->id, 'title' => 'Child', 'type' => 'custom', 'url' => '/child', 'order' => 0]);

    expect($child->parent->id)->toBe($parent->id);
    expect($parent->children)->toHaveCount(1);
    expect($parent->children->first()->id)->toBe($child->id);
});

test('MenuService clearCache removes menu from cache', function () {
    Menu::create(['name' => 'Cached Menu', 'location' => 'footer', 'is_active' => true]);

    $service = app(MenuService::class);
    $service->getByLocation('footer'); // populate cache

    $service->clearCache('footer');

    // After clearing, a fresh query should still return the menu
    $fresh = $service->getByLocation('footer');
    expect($fresh)->not->toBeNull();
    expect($fresh->name)->toBe('Cached Menu');
});

test('MenuService buildTree returns items ordered with children nested', function () {
    $menu = Menu::create(['name' => 'Nav', 'location' => 'header', 'is_active' => true]);
    $parent = MenuItem::create(['menu_id' => $menu->id, 'title' => 'Home', 'type' => 'custom', 'url' => '/', 'order' => 0, 'enabled' => true]);
    MenuItem::create(['menu_id' => $menu->id, 'parent_id' => $parent->id, 'title' => 'Sub', 'type' => 'custom', 'url' => '/sub', 'order' => 0, 'enabled' => true]);

    $service = app(MenuService::class);
    $tree = $service->buildTree($menu);

    expect($tree)->toHaveCount(1); // Only top-level items
    expect($tree->first()->children)->toHaveCount(1);
});

test('MenuService getAvailableLocations returns configured locations', function () {
    $service = app(MenuService::class);
    $locations = $service->getAvailableLocations();

    expect($locations)->toBeArray()->not->toBeEmpty();
    expect(array_keys($locations))->toContain('header', 'footer');
});
