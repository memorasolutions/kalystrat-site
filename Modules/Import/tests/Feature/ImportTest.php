<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Import\Providers\ImportServiceProvider;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $role = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
    Permission::firstOrCreate(['name' => 'manage_import', 'guard_name' => 'web']);
    $role->givePermissionTo('manage_import');

    $this->admin = User::factory()->create();
    $this->admin->assignRole('admin');
});

test('index is accessible by admin', function () {
    $this->actingAs($this->admin)
        ->get(route('admin.import.index'))
        ->assertOk();
});

test('guest is redirected to login', function () {
    $this->get(route('admin.import.index'))
        ->assertRedirect(route('login'));
});

test('template download returns CSV', function () {
    $this->actingAs($this->admin)
        ->get(route('admin.import.template', 'article'))
        ->assertOk()
        ->assertDownload();
});

test('Import module service provider is loaded', function () {
    expect(class_exists(ImportServiceProvider::class))
        ->toBeTrue();
});
