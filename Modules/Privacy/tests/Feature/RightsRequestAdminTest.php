<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Privacy\Models\RightsRequest;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $this->admin = User::factory()->create();
    $this->admin->assignRole('super_admin');
});

test('admin peut voir la liste des demandes de droits', function () {
    RightsRequest::factory()->count(3)->create();

    $this->actingAs($this->admin)
        ->get(route('admin.privacy.rights-requests.index'))
        ->assertOk();
});

test('admin peut filtrer par statut pending', function () {
    RightsRequest::factory()->create(['status' => 'pending']);
    RightsRequest::factory()->create(['status' => 'completed']);

    $this->actingAs($this->admin)
        ->get(route('admin.privacy.rights-requests.index', ['status' => 'pending']))
        ->assertOk();
});

test('admin peut voir le détail d\'une demande', function () {
    $rr = RightsRequest::factory()->create();

    $this->actingAs($this->admin)
        ->get(route('admin.privacy.rights-requests.show', $rr))
        ->assertOk()
        ->assertSee($rr->reference);
});

test('admin peut mettre à jour le statut en processing', function () {
    $rr = RightsRequest::factory()->create(['status' => 'pending']);

    $this->actingAs($this->admin)
        ->put(route('admin.privacy.rights-requests.update-status', $rr), ['status' => 'processing'])
        ->assertRedirect()
        ->assertSessionHas('success');

    $this->assertDatabaseHas('rights_requests', ['id' => $rr->id, 'status' => 'processing']);
});

test('admin peut compléter une demande avec responded_at', function () {
    $rr = RightsRequest::factory()->create(['status' => 'processing']);

    $this->actingAs($this->admin)
        ->put(route('admin.privacy.rights-requests.update-status', $rr), ['status' => 'completed'])
        ->assertRedirect()
        ->assertSessionHas('success');

    $rr->refresh();
    expect($rr->status)->toBe('completed')
        ->and($rr->responded_at)->not->toBeNull();
});

test('admin peut ajouter des notes', function () {
    $rr = RightsRequest::factory()->create();

    $this->actingAs($this->admin)
        ->put(route('admin.privacy.rights-requests.update-status', $rr), [
            'status' => 'processing',
            'admin_notes' => 'Notes de suivi importantes.',
        ])
        ->assertRedirect()
        ->assertSessionHas('success');

    $this->assertDatabaseHas('rights_requests', ['id' => $rr->id, 'admin_notes' => 'Notes de suivi importantes.']);
});

test('validation échoue avec statut invalide', function () {
    $rr = RightsRequest::factory()->create();

    $this->actingAs($this->admin)
        ->put(route('admin.privacy.rights-requests.update-status', $rr), ['status' => 'invalid'])
        ->assertSessionHasErrors('status');
});

test('guest est redirigé vers login', function () {
    $this->get(route('admin.privacy.rights-requests.index'))
        ->assertRedirect(route('login'));
});

test('compteur overdue affiché quand demandes en retard', function () {
    RightsRequest::factory()->create(['deadline_at' => now()->subDay(), 'status' => 'pending']);

    $this->actingAs($this->admin)
        ->get(route('admin.privacy.rights-requests.index'))
        ->assertOk()
        ->assertSee(__('en retard'));
});

test('index est paginé avec beaucoup de demandes', function () {
    RightsRequest::factory()->count(25)->create();

    $this->actingAs($this->admin)
        ->get(route('admin.privacy.rights-requests.index'))
        ->assertOk();
});
