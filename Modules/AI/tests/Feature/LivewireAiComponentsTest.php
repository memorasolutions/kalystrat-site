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
use Modules\AI\Livewire\AiArticleGenerator;
use Modules\AI\Livewire\AiContentAssistant;
use Modules\AI\Livewire\AiSeoAssistant;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $this->seed(RolesAndPermissionsSeeder::class);
    $this->admin = User::factory()->create();
    $this->admin->assignRole('super_admin');
});

// ── AiSeoAssistant ──────────────────────────────────────────────────────

it('renders ai seo assistant', function () {
    Livewire::actingAs($this->admin)
        ->test(AiSeoAssistant::class)
        ->assertStatus(200);
});

it('ai seo assistant validates required fields', function () {
    Livewire::actingAs($this->admin)
        ->test(AiSeoAssistant::class)
        ->set('title', '')
        ->set('content', '')
        ->call('generate')
        ->assertHasErrors(['title', 'content']);
});

it('ai seo assistant can clear results', function () {
    Livewire::actingAs($this->admin)
        ->test(AiSeoAssistant::class)
        ->set('seoResult', ['title' => 'Test', 'description' => 'Test desc'])
        ->call('clear')
        ->assertSet('seoResult', []);
});

// ── AiArticleGenerator ──────────────────────────────────────────────────

it('renders ai article generator', function () {
    Livewire::actingAs($this->admin)
        ->test(AiArticleGenerator::class)
        ->assertStatus(200);
});

it('ai article generator can open and close modal', function () {
    Livewire::actingAs($this->admin)
        ->test(AiArticleGenerator::class)
        ->call('openModal')
        ->assertSet('showModal', true)
        ->call('closeModal')
        ->assertSet('showModal', false)
        ->assertSet('topic', '')
        ->assertSet('generatedContent', []);
});

it('ai article generator validates topic', function () {
    Livewire::actingAs($this->admin)
        ->test(AiArticleGenerator::class)
        ->set('topic', '')
        ->call('generate')
        ->assertHasErrors(['topic']);
});

it('ai article generator validates topic min length', function () {
    Livewire::actingAs($this->admin)
        ->test(AiArticleGenerator::class)
        ->set('topic', 'ab')
        ->call('generate')
        ->assertHasErrors(['topic']);
});

it('ai article generator dispatches apply event', function () {
    Livewire::actingAs($this->admin)
        ->test(AiArticleGenerator::class)
        ->set('generatedContent', ['title' => 'Generated Title', 'content' => 'Body text'])
        ->call('applyField', 'title')
        ->assertDispatched('ai-article-fill');
});

it('ai article generator dispatches apply all event', function () {
    Livewire::actingAs($this->admin)
        ->test(AiArticleGenerator::class)
        ->set('generatedContent', ['title' => 'Title', 'content' => 'Body'])
        ->call('applyAll')
        ->assertDispatched('ai-article-fill-all');
});

// ── AiContentAssistant ──────────────────────────────────────────────────

it('renders ai content assistant', function () {
    Livewire::actingAs($this->admin)
        ->test(AiContentAssistant::class)
        ->assertStatus(200);
});

it('ai content assistant validates content', function () {
    Livewire::actingAs($this->admin)
        ->test(AiContentAssistant::class)
        ->set('content', '')
        ->call('process')
        ->assertHasErrors(['content']);
});

it('ai content assistant can apply result', function () {
    Livewire::actingAs($this->admin)
        ->test(AiContentAssistant::class)
        ->set('content', 'original')
        ->set('result', 'improved text')
        ->call('applyResult')
        ->assertSet('content', 'improved text')
        ->assertSet('result', '');
});

it('ai content assistant can clear result', function () {
    Livewire::actingAs($this->admin)
        ->test(AiContentAssistant::class)
        ->set('result', 'some result')
        ->call('clear')
        ->assertSet('result', '');
});

it('ai content assistant can change action', function () {
    Livewire::actingAs($this->admin)
        ->test(AiContentAssistant::class)
        ->set('action', 'summarize')
        ->assertSet('action', 'summarize')
        ->set('action', 'translate')
        ->assertSet('action', 'translate');
});
