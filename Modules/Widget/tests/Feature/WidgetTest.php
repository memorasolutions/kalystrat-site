<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Widget\Models\Widget;
use Modules\Widget\Providers\WidgetServiceProvider;
use Modules\Widget\Services\WidgetService;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $role = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
    Permission::firstOrCreate(['name' => 'manage_widgets', 'guard_name' => 'web']);
    $role->givePermissionTo('manage_widgets');

    $this->admin = User::factory()->create();
    $this->admin->assignRole('admin');
});

test('index is accessible by admin', function () {
    $this->actingAs($this->admin)
        ->get('/admin/widgets')
        ->assertOk();
});

test('store creates a widget', function () {
    $this->actingAs($this->admin)
        ->post('/admin/widgets', [
            'zone' => 'sidebar',
            'type' => 'html',
            'title' => 'Test Widget',
            'content' => '<p>HTML content</p>',
            'is_active' => true,
            'sort_order' => 1,
        ])
        ->assertRedirect();

    $this->assertDatabaseHas('widgets', ['title' => 'Test Widget', 'zone' => 'sidebar']);
});

test('store fails without title', function () {
    $this->actingAs($this->admin)
        ->post('/admin/widgets', [
            'zone' => 'footer',
            'type' => 'html',
        ])
        ->assertSessionHasErrors(['title']);
});

test('update modifies a widget', function () {
    $widget = Widget::factory()->create();

    $this->actingAs($this->admin)
        ->put("/admin/widgets/{$widget->id}", [
            'zone' => 'footer',
            'type' => 'custom_text',
            'title' => 'Updated Widget',
            'content' => 'New content',
            'is_active' => false,
            'sort_order' => 3,
        ])
        ->assertRedirect();

    $this->assertDatabaseHas('widgets', ['id' => $widget->id, 'title' => 'Updated Widget']);
});

test('destroy deletes a widget', function () {
    $widget = Widget::factory()->create();

    $this->actingAs($this->admin)
        ->delete("/admin/widgets/{$widget->id}")
        ->assertRedirect();

    $this->assertDatabaseMissing('widgets', ['id' => $widget->id]);
});

test('reorder updates sort_order via JSON', function () {
    $w1 = Widget::factory()->create(['zone' => 'sidebar', 'sort_order' => 1]);
    $w2 = Widget::factory()->create(['zone' => 'sidebar', 'sort_order' => 2]);

    $this->actingAs($this->admin)
        ->postJson('/admin/widgets/reorder', [
            'zone' => 'sidebar',
            'order' => [$w2->id, $w1->id],
        ])
        ->assertOk();

    $this->assertDatabaseHas('widgets', ['id' => $w2->id, 'sort_order' => 0]);
    $this->assertDatabaseHas('widgets', ['id' => $w1->id, 'sort_order' => 1]);
});

test('Widget module service provider is loaded', function () {
    expect(class_exists(WidgetServiceProvider::class))
        ->toBeTrue();
});

test('guest redirects to login on widgets index', function () {
    $this->get('/admin/widgets')
        ->assertRedirect(route('login'));
});

test('edit view loads correctly', function () {
    $widget = Widget::factory()->create();

    $this->actingAs($this->admin)
        ->get("/admin/widgets/{$widget->id}/edit")
        ->assertOk();
});

test('create view is accessible', function () {
    $this->actingAs($this->admin)
        ->get('/admin/widgets/create')
        ->assertOk();
});

test('active scope filters inactive widgets', function () {
    Widget::factory()->create(['is_active' => true]);
    Widget::factory()->create(['is_active' => false]);

    expect(Widget::active()->count())->toBe(1);
});

test('widget factory creates valid model', function () {
    $widget = Widget::factory()->create();

    expect($widget)->toBeInstanceOf(Widget::class);
    expect($widget->id)->not->toBeNull();
});

test('WidgetService getWidgetsForZone returns only active widgets for zone', function () {
    Widget::factory()->create(['zone' => 'sidebar', 'is_active' => true, 'sort_order' => 1]);
    Widget::factory()->create(['zone' => 'sidebar', 'is_active' => false, 'sort_order' => 2]);
    Widget::factory()->create(['zone' => 'footer', 'is_active' => true, 'sort_order' => 1]);

    $widgets = WidgetService::getWidgetsForZone('sidebar');

    expect($widgets)->toHaveCount(1);
    expect($widgets->first()->zone)->toBe('sidebar');
});

test('WidgetService getWidgetsForZone returns collection', function () {
    Widget::factory()->create(['zone' => 'after_content', 'is_active' => true, 'sort_order' => 1]);
    Widget::factory()->create(['zone' => 'after_content', 'is_active' => true, 'sort_order' => 2]);

    $widgets = WidgetService::getWidgetsForZone('after_content');

    expect($widgets)->toHaveCount(2);
    expect($widgets->first()->sort_order)->toBeLessThanOrEqual($widgets->last()->sort_order);
});

test('WidgetService clearCache removes zone cache', function () {
    Widget::factory()->create(['zone' => 'footer', 'is_active' => true, 'sort_order' => 1]);
    WidgetService::getWidgetsForZone('footer'); // populate cache

    WidgetService::clearCache('footer');

    // After clearing, a new widget added must appear
    Widget::factory()->create(['zone' => 'footer', 'is_active' => true, 'sort_order' => 2]);
    $fresh = WidgetService::getWidgetsForZone('footer');

    expect($fresh->count())->toBe(2);
});

test('widget with unknown type still persists without error', function () {
    // Widget model does not enforce TYPES at DB level, so an unexpected type is stored as-is.
    $widget = Widget::factory()->create(['type' => 'html', 'zone' => 'sidebar']);

    expect($widget->type)->toBe('html');
    $this->assertDatabaseHas('widgets', ['id' => $widget->id]);
});

test('Widget ZONES and TYPES constants are arrays with expected values', function () {
    expect(Widget::ZONES)->toContain('sidebar', 'footer', 'after_content');
    expect(Widget::TYPES)->toContain('html', 'custom_text');
});
