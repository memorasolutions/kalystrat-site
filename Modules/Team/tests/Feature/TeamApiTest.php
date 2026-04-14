<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Modules\Team\Models\Team;
use Modules\Team\Models\TeamInvitation;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('GET /teams returns 401 for unauthenticated user', function () {
    $response = $this->getJson('/api/v1/teams');

    $response->assertStatus(401);
});

test('GET /teams returns paginated teams for authenticated user', function () {
    $user = User::factory()->create();

    $teams = Team::factory()->count(3)->create();
    foreach ($teams as $team) {
        $team->members()->attach($user->id, ['role' => 'member']);
    }

    Sanctum::actingAs($user, ['*']);

    $response = $this->getJson('/api/v1/teams');

    $response->assertStatus(200)
        ->assertJsonFragment(['success' => true])
        ->assertJsonCount(3, 'data.data');
});

test('GET /teams/{id} returns team if user is a member', function () {
    $user = User::factory()->create();
    $team = Team::factory()->create();
    $team->members()->attach($user->id, ['role' => 'member']);

    Sanctum::actingAs($user, ['*']);

    $response = $this->getJson("/api/v1/teams/{$team->id}");

    $response->assertStatus(200)
        ->assertJsonFragment(['id' => $team->id]);
});

test('GET /teams/{id} returns 403 if user is not a member', function () {
    $user = User::factory()->create();
    $team = Team::factory()->create();

    Sanctum::actingAs($user, ['*']);

    $response = $this->getJson("/api/v1/teams/{$team->id}");

    $response->assertStatus(403);
});

test('POST /teams creates a team successfully', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user, ['*']);

    $response = $this->postJson('/api/v1/teams', [
        'name' => 'New Team',
        'description' => 'A great team',
    ]);

    $response->assertStatus(201)
        ->assertJsonFragment(['name' => 'New Team']);

    $this->assertDatabaseHas('teams', [
        'name' => 'New Team',
        'owner_id' => $user->id,
    ]);
});

test('POST /teams returns 422 without name', function () {
    $user = User::factory()->create();

    Sanctum::actingAs($user, ['*']);

    $response = $this->postJson('/api/v1/teams', [
        'description' => 'No name provided',
    ]);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['name']);
});

test('POST /teams/{id}/invite sends invitation successfully', function () {
    $user = User::factory()->create();
    $team = Team::factory()->create(['owner_id' => $user->id]);

    Sanctum::actingAs($user, ['*']);

    $response = $this->postJson("/api/v1/teams/{$team->id}/invite", [
        'email' => 'invitee@example.com',
        'role' => 'member',
    ]);

    $response->assertStatus(201);

    $this->assertDatabaseHas('team_invitations', [
        'team_id' => $team->id,
        'email' => 'invitee@example.com',
        'role' => 'member',
    ]);
});

test('POST /teams/{id}/invite returns 403 for non-owner', function () {
    $owner = User::factory()->create();
    $nonOwner = User::factory()->create();
    $team = Team::factory()->create(['owner_id' => $owner->id]);
    $team->members()->attach($nonOwner->id, ['role' => 'member']);

    Sanctum::actingAs($nonOwner, ['*']);

    $response = $this->postJson("/api/v1/teams/{$team->id}/invite", [
        'email' => 'someone@example.com',
        'role' => 'member',
    ]);

    $response->assertStatus(403);
});

test('POST /teams/{id}/invite returns 422 for duplicate pending invitation', function () {
    $user = User::factory()->create();
    $team = Team::factory()->create(['owner_id' => $user->id]);

    TeamInvitation::factory()->create([
        'team_id' => $team->id,
        'email' => 'pending@example.com',
        'accepted_at' => null,
    ]);

    Sanctum::actingAs($user, ['*']);

    $response = $this->postJson("/api/v1/teams/{$team->id}/invite", [
        'email' => 'pending@example.com',
        'role' => 'member',
    ]);

    $response->assertStatus(422);
});
