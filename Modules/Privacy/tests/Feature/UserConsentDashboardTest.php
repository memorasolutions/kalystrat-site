<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Modules\Privacy\Models\UserConsent;
use Tests\TestCase;

uses(TestCase::class, LazilyRefreshDatabase::class);

it('returns 200 for authenticated user on consent dashboard', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('user.privacy.index'))
        ->assertOk();
});

it('redirects guests from consent dashboard', function () {
    $this->get('/account/privacy')
        ->assertRedirect();
});

it('updates cookie preferences and redirects back', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->from(route('user.privacy.index'))
        ->put(route('user.privacy.update'), [
            'analytics' => '1',
            'marketing' => '0',
        ])
        ->assertRedirect(route('user.privacy.index'))
        ->assertSessionHas('success');
});

it('creates UserConsent record with action customize on update', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->put(route('user.privacy.update'), [
            'analytics' => '1',
            'marketing' => '1',
        ]);

    $this->assertDatabaseHas('user_consents', [
        'user_id' => $user->id,
        'action' => 'customize',
        'type' => 'cookie',
    ]);
});

it('exports user consents as JSON with Content-Disposition header', function () {
    $user = User::factory()->create();
    UserConsent::factory()->create(['user_id' => $user->id]);

    $response = $this->actingAs($user)
        ->get(route('user.privacy.export'));

    $response->assertOk()
        ->assertHeader('Content-Disposition', 'attachment; filename="my-consents.json"');
});

it('export JSON contains only the authenticated user consents', function () {
    $user = User::factory()->create();
    $other = User::factory()->create();

    UserConsent::factory()->create(['user_id' => $user->id, 'action' => 'accept']);
    UserConsent::factory()->create(['user_id' => $other->id, 'action' => 'decline']);

    $response = $this->actingAs($user)
        ->getJson(route('user.privacy.export'));

    $response->assertOk()
        ->assertJsonCount(1, 'consents')
        ->assertJsonPath('consents.0.action', 'accept');
});
