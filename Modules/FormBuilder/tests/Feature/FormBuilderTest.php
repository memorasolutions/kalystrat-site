<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\FormBuilder\Models\Form;
use Modules\FormBuilder\Models\FormSubmission;
use Modules\FormBuilder\Providers\FormBuilderServiceProvider;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $role = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
    Permission::firstOrCreate(['name' => 'manage_forms', 'guard_name' => 'web']);
    $role->givePermissionTo('manage_forms');

    $this->admin = User::factory()->create();
    $this->admin->assignRole('admin');
});

test('index is accessible by admin', function () {
    $this->actingAs($this->admin)
        ->get(route('admin.formbuilder.forms.index'))
        ->assertOk();
});

test('store creates a form', function () {
    $this->actingAs($this->admin)
        ->post(route('admin.formbuilder.forms.store'), [
            'title' => 'Contact Form',
            'slug' => 'contact-form',
            'description' => 'A simple contact form',
            'is_published' => true,
        ])
        ->assertRedirect();

    $this->assertDatabaseHas('forms', ['title' => 'Contact Form']);
});

test('store fails without title', function () {
    $this->actingAs($this->admin)
        ->post(route('admin.formbuilder.forms.store'), [
            'slug' => 'no-title',
        ])
        ->assertSessionHasErrors(['title']);
});

test('update modifies a form', function () {
    $form = Form::factory()->create(['title' => 'Old Title']);

    $this->actingAs($this->admin)
        ->put(route('admin.formbuilder.forms.update', $form), [
            'title' => 'Updated Title',
            'slug' => $form->slug,
            'is_published' => $form->is_published,
        ])
        ->assertRedirect();

    $this->assertDatabaseHas('forms', ['id' => $form->id, 'title' => 'Updated Title']);
});

test('destroy deletes a form', function () {
    $form = Form::factory()->create();

    $this->actingAs($this->admin)
        ->delete(route('admin.formbuilder.forms.destroy', $form))
        ->assertRedirect();

    $this->assertDatabaseMissing('forms', ['id' => $form->id]);
});

test('submissions index is accessible', function () {
    $form = Form::factory()->create();
    FormSubmission::factory()->count(2)->create(['form_id' => $form->id]);

    $this->actingAs($this->admin)
        ->get(route('admin.formbuilder.forms.submissions.index', $form))
        ->assertOk();
});

test('FormBuilder module service provider is loaded', function () {
    expect(class_exists(FormBuilderServiceProvider::class))
        ->toBeTrue();
});

test('guest redirects to login on forms index', function () {
    $this->get(route('admin.formbuilder.forms.index'))
        ->assertRedirect(route('login'));
});

test('form has many submissions relationship', function () {
    $form = Form::factory()->create();
    FormSubmission::factory()->count(3)->create(['form_id' => $form->id]);

    expect($form->submissions)->toHaveCount(3);
});

test('edit view loads with existing form', function () {
    $form = Form::factory()->create();

    $this->actingAs($this->admin)
        ->get(route('admin.formbuilder.forms.edit', $form))
        ->assertOk();
});

test('create view is accessible', function () {
    $this->actingAs($this->admin)
        ->get(route('admin.formbuilder.forms.create'))
        ->assertOk();
});

test('Form factory creates model with auto-generated slug', function () {
    $form = Form::factory()->create(['title' => 'My Contact Form']);

    expect($form->slug)->not->toBeEmpty();
    expect($form->id)->not->toBeNull();
});

test('FormSubmission markAsRead sets read_at timestamp', function () {
    $submission = FormSubmission::factory()->create(['read_at' => null]);

    expect($submission->isNew())->toBeTrue();

    $submission->markAsRead();
    $submission->refresh();

    expect($submission->read_at)->not->toBeNull();
    expect($submission->isNew())->toBeFalse();
});

test('FormSubmission unread scope returns only unread entries', function () {
    $form = Form::factory()->create();
    FormSubmission::factory()->create(['form_id' => $form->id, 'read_at' => null]);
    FormSubmission::factory()->create(['form_id' => $form->id, 'read_at' => now()]);

    expect(FormSubmission::unread()->count())->toBe(1);
    expect(FormSubmission::read()->count())->toBe(1);
});

test('Form published scope returns only published forms', function () {
    Form::factory()->create(['is_published' => true]);
    Form::factory()->create(['is_published' => false]);
    Form::factory()->create(['is_published' => true]);

    expect(Form::published()->count())->toBe(2);
});

test('update validates slug uniqueness against other forms', function () {
    $form1 = Form::factory()->create(['slug' => 'form-one']);
    $form2 = Form::factory()->create(['slug' => 'form-two']);

    $this->actingAs($this->admin)
        ->put(route('admin.formbuilder.forms.update', $form2), [
            'title' => 'Form Two Updated',
            'slug' => 'form-one', // already used by form1
        ])
        ->assertSessionHasErrors(['slug']);
});
