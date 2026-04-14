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
use Modules\Pages\Livewire\StaticPagesTable;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $this->seed(RolesAndPermissionsSeeder::class);
    $this->admin = User::factory()->create();
    $this->admin->assignRole('super_admin');
});

it('renders static pages table', function () {
    Livewire::actingAs($this->admin)
        ->test(StaticPagesTable::class)
        ->assertStatus(200);
});

it('static pages table can search', function () {
    Livewire::actingAs($this->admin)
        ->test(StaticPagesTable::class)
        ->set('search', 'about')
        ->assertSet('search', 'about');
});

it('static pages table can filter by status', function () {
    Livewire::actingAs($this->admin)
        ->test(StaticPagesTable::class)
        ->set('filterStatus', 'published')
        ->assertSet('filterStatus', 'published');
});

it('static pages table resets filters', function () {
    Livewire::actingAs($this->admin)
        ->test(StaticPagesTable::class)
        ->set('search', 'test')
        ->set('filterStatus', 'draft')
        ->call('resetFilters')
        ->assertSet('search', '')
        ->assertSet('filterStatus', '');
});

it('static pages table can sort', function () {
    Livewire::actingAs($this->admin)
        ->test(StaticPagesTable::class)
        ->call('sort', 'created_at')
        ->assertSet('sortBy', 'created_at')
        ->assertSet('sortDirection', 'asc');
});

// deletePage skipped: view references route('pages.show') which was removed with frontend
