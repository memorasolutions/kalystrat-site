<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Newsletter\Models\Campaign;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $this->admin = User::factory()->create();
    $this->admin->assignRole('super_admin');
});

test('admin peut voir la liste des campagnes', function () {
    Campaign::factory()->count(3)->create();

    $this->actingAs($this->admin)
        ->get(route('admin.newsletter.campaigns.index'))
        ->assertOk();
});

test('admin peut voir le formulaire de création', function () {
    $this->actingAs($this->admin)
        ->get(route('admin.newsletter.campaigns.create'))
        ->assertOk();
});

test('admin peut créer une campagne', function () {
    $this->actingAs($this->admin)
        ->post(route('admin.newsletter.campaigns.store'), [
            'subject' => 'Ma campagne test',
            'content' => '<p>Contenu de la campagne</p>',
        ])
        ->assertRedirect(route('admin.newsletter.campaigns.index'))
        ->assertSessionHas('success');

    $this->assertDatabaseHas('newsletter_campaigns', ['subject' => 'Ma campagne test']);
});

test('admin peut voir les détails d\'une campagne', function () {
    $campaign = Campaign::factory()->create(['subject' => 'Campagne visible']);

    $this->actingAs($this->admin)
        ->get(route('admin.newsletter.campaigns.show', $campaign))
        ->assertOk()
        ->assertSee('Campagne visible');
});

test('admin peut voir le formulaire d\'édition d\'un brouillon', function () {
    $campaign = Campaign::factory()->create(['subject' => 'Brouillon éditable']);

    $this->actingAs($this->admin)
        ->get(route('admin.newsletter.campaigns.edit', $campaign))
        ->assertOk()
        ->assertSee('Brouillon éditable');
});

test('admin peut mettre à jour une campagne brouillon', function () {
    $campaign = Campaign::factory()->create();

    $this->actingAs($this->admin)
        ->put(route('admin.newsletter.campaigns.update', $campaign), [
            'subject' => 'Sujet modifié',
            'content' => '<p>Contenu modifié</p>',
        ])
        ->assertRedirect(route('admin.newsletter.campaigns.index'))
        ->assertSessionHas('success');

    $this->assertDatabaseHas('newsletter_campaigns', ['id' => $campaign->id, 'subject' => 'Sujet modifié']);
});

test('admin ne peut pas éditer une campagne envoyée', function () {
    $campaign = Campaign::factory()->sent()->create();

    $this->actingAs($this->admin)
        ->get(route('admin.newsletter.campaigns.edit', $campaign))
        ->assertRedirect()
        ->assertSessionHas('error');
});

test('admin peut supprimer une campagne brouillon', function () {
    $campaign = Campaign::factory()->create();

    $this->actingAs($this->admin)
        ->delete(route('admin.newsletter.campaigns.destroy', $campaign))
        ->assertRedirect(route('admin.newsletter.campaigns.index'))
        ->assertSessionHas('success');

    $this->assertDatabaseMissing('newsletter_campaigns', ['id' => $campaign->id]);
});

test('admin ne peut pas supprimer une campagne envoyée', function () {
    $campaign = Campaign::factory()->sent()->create();

    $this->actingAs($this->admin)
        ->delete(route('admin.newsletter.campaigns.destroy', $campaign))
        ->assertRedirect()
        ->assertSessionHas('error');

    $this->assertDatabaseHas('newsletter_campaigns', ['id' => $campaign->id]);
});

test('validation échoue sans sujet', function () {
    $this->actingAs($this->admin)
        ->post(route('admin.newsletter.campaigns.store'), [
            'content' => '<p>Contenu sans sujet</p>',
        ])
        ->assertSessionHasErrors('subject');
});
