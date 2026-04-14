<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\CustomFields\Models\CustomFieldDefinition;
use Modules\CustomFields\Models\CustomFieldValue;
use Modules\CustomFields\Providers\CustomFieldsServiceProvider;
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

test('index is accessible by admin', function () {
    $this->actingAs($this->admin)
        ->get('/admin/custom-fields')
        ->assertOk();
});

test('store creates a custom field', function () {
    $this->actingAs($this->admin)
        ->post('/admin/custom-fields', [
            'name' => 'Test Field',
            'key' => 'test_field',
            'type' => 'text',
            'model_type' => 'article',
            'is_required' => false,
            'is_active' => true,
            'sort_order' => 1,
        ])
        ->assertRedirect();

    $this->assertDatabaseHas('custom_field_definitions', ['key' => 'test_field']);
});

test('store fails without name', function () {
    $this->actingAs($this->admin)
        ->post('/admin/custom-fields', [
            'key' => 'no_name',
            'type' => 'text',
            'model_type' => 'article',
        ])
        ->assertSessionHasErrors(['name']);
});

test('update modifies a custom field', function () {
    $field = CustomFieldDefinition::create([
        'name' => 'Original',
        'key' => 'original',
        'type' => 'text',
        'model_type' => 'article',
        'is_required' => false,
        'is_active' => true,
        'sort_order' => 1,
    ]);

    $this->actingAs($this->admin)
        ->put("/admin/custom-fields/{$field->id}", [
            'name' => 'Updated',
            'key' => 'updated',
            'type' => 'textarea',
            'model_type' => 'article',
            'is_required' => true,
            'is_active' => true,
            'sort_order' => 2,
        ])
        ->assertRedirect();

    $this->assertDatabaseHas('custom_field_definitions', ['id' => $field->id, 'name' => 'Updated']);
});

test('destroy deletes a custom field', function () {
    $field = CustomFieldDefinition::create([
        'name' => 'ToDelete',
        'key' => 'to_delete',
        'type' => 'text',
        'model_type' => 'article',
        'is_required' => false,
        'is_active' => true,
        'sort_order' => 1,
    ]);

    $this->actingAs($this->admin)
        ->delete("/admin/custom-fields/{$field->id}")
        ->assertRedirect();

    $this->assertDatabaseMissing('custom_field_definitions', ['id' => $field->id]);
});

test('active scope filters inactive fields', function () {
    CustomFieldDefinition::create(['name' => 'Active', 'key' => 'active', 'type' => 'text', 'model_type' => 'article', 'is_active' => true, 'sort_order' => 1]);
    CustomFieldDefinition::create(['name' => 'Inactive', 'key' => 'inactive', 'type' => 'text', 'model_type' => 'article', 'is_active' => false, 'sort_order' => 2]);

    expect(CustomFieldDefinition::active()->count())->toBe(1);
});

test('CustomFields module service provider is loaded', function () {
    expect(class_exists(CustomFieldsServiceProvider::class))
        ->toBeTrue();
});

test('store validates type must be valid', function () {
    $this->actingAs($this->admin)
        ->post('/admin/custom-fields', [
            'name' => 'Invalid Field',
            'key' => 'invalid_field',
            'type' => 'nonexistent_type',
            'model_type' => 'article',
        ])
        ->assertSessionHasErrors(['type']);
});

test('forModel scope filters by model_type', function () {
    CustomFieldDefinition::create(['name' => 'User Field', 'key' => 'user_f', 'type' => 'text', 'model_type' => 'user', 'is_active' => true, 'sort_order' => 1]);
    CustomFieldDefinition::create(['name' => 'Article Field', 'key' => 'art_f', 'type' => 'text', 'model_type' => 'article', 'is_active' => true, 'sort_order' => 1]);

    expect(CustomFieldDefinition::forModel('user')->count())->toBe(1);
    expect(CustomFieldDefinition::forModel('article')->count())->toBe(1);
});

test('guest redirects to login on custom fields index', function () {
    $this->get('/admin/custom-fields')
        ->assertRedirect(route('login'));
});

test('store with select type saves options', function () {
    $this->actingAs($this->admin)
        ->post('/admin/custom-fields', [
            'name' => 'Select Field',
            'key' => 'select_field',
            'type' => 'select',
            'model_type' => 'article',
            'options' => 'option1,option2',
            'is_required' => false,
            'is_active' => true,
            'sort_order' => 1,
        ])
        ->assertRedirect();

    $field = CustomFieldDefinition::where('key', 'select_field')->first();
    expect($field)->not->toBeNull();
    expect($field->options)->toContain('option1', 'option2');
});

test('CustomFieldDefinition auto-generates key from name', function () {
    $definition = CustomFieldDefinition::create([
        'name' => 'My Special Field',
        'type' => 'text',
        'model_type' => 'article',
        'is_active' => true,
        'sort_order' => 1,
    ]);

    expect($definition->key)->toBe('my_special_field');
});

test('CustomFieldDefinition getValidationRule returns required for required fields', function () {
    $definition = CustomFieldDefinition::create([
        'name' => 'Required Field',
        'key' => 'required_field',
        'type' => 'text',
        'model_type' => 'article',
        'is_required' => true,
        'is_active' => true,
        'sort_order' => 1,
    ]);

    $rule = $definition->getValidationRule();

    expect($rule)->toContain('required');
    expect($rule)->toContain('string');
});

test('CustomFieldValue getCastedValue returns boolean for checkbox type', function () {
    $definition = CustomFieldDefinition::create([
        'name' => 'Checkbox Field',
        'key' => 'checkbox_field',
        'type' => 'checkbox',
        'model_type' => 'article',
        'is_active' => true,
        'sort_order' => 1,
    ]);

    $fieldValue = CustomFieldValue::create([
        'custom_field_definition_id' => $definition->id,
        'fieldable_type' => 'App\\Models\\User',
        'fieldable_id' => 999,
        'value' => '1',
    ]);

    $fieldValue->setRelation('definition', $definition);

    expect($fieldValue->getCastedValue())->toBeTrue();
});

test('CustomFieldDefinition values relationship returns associated values', function () {
    $definition = CustomFieldDefinition::create([
        'name' => 'Text Field',
        'key' => 'text_field_rel',
        'type' => 'text',
        'model_type' => 'article',
        'is_active' => true,
        'sort_order' => 1,
    ]);

    CustomFieldValue::create([
        'custom_field_definition_id' => $definition->id,
        'fieldable_type' => 'App\\Models\\User',
        'fieldable_id' => 1,
        'value' => 'hello',
    ]);

    expect($definition->customFieldValues()->count())->toBe(1);
});
