<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Modules\AI\Models\ProactiveTrigger;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $this->admin = User::factory()->create();
    $this->admin->assignRole('super_admin');

    $this->user = User::factory()->create();
});

// --- AnalyticsController ---

describe('AI AnalyticsController', function () {
    it('admin can view AI analytics', function () {
        $this->actingAs($this->admin)->get('/admin/ai/analytics')->assertOk();
    });

    it('guest redirects from AI analytics', function () {
        $this->get('/admin/ai/analytics')->assertRedirect();
    });

    it('non-admin gets 403 on AI analytics', function () {
        $this->actingAs($this->user)->get('/admin/ai/analytics')->assertForbidden();
    });
});

// --- AiAssistController ---

describe('AiAssistController', function () {
    it('admin can rewrite text', function () {
        Http::fake(['*' => Http::response(['choices' => [['message' => ['content' => 'Rewritten']]]])]);

        $this->actingAs($this->admin)
            ->postJson('/admin/ai/ai-assist/rewrite', ['content' => 'Original text', 'style' => 'professional'])
            ->assertOk();
    });

    it('admin can analyze sentiment', function () {
        Http::fake(['*' => Http::response(['choices' => [['message' => ['content' => 'positive']]]])]);

        $this->actingAs($this->admin)
            ->postJson('/admin/ai/ai-assist/sentiment', ['text' => 'Great product!'])
            ->assertOk();
    });

    it('guest gets 401 on AI assist', function () {
        $this->postJson('/admin/ai/ai-assist/rewrite', ['text' => 'test'])
            ->assertUnauthorized();
    });
});

// --- ProactiveTriggerController ---

describe('ProactiveTriggerController', function () {
    it('admin can view proactive triggers', function () {
        $this->actingAs($this->admin)->get('/admin/ai/proactive-triggers')->assertOk();
    });

    it('admin can delete a proactive trigger', function () {
        $trigger = ProactiveTrigger::factory()->create();
        $this->actingAs($this->admin)
            ->delete("/admin/ai/proactive-triggers/{$trigger->id}")
            ->assertRedirect();
    });

    it('guest redirects from proactive triggers', function () {
        $this->get('/admin/ai/proactive-triggers')->assertRedirect();
    });
});

// --- CsatController ---

describe('CsatController', function () {
    it('admin can view CSAT surveys', function () {
        $this->actingAs($this->admin)->get('/admin/ai/csat')->assertOk();
    });

    it('guest redirects from CSAT', function () {
        $this->get('/admin/ai/csat')->assertRedirect();
    });
});

// --- ConversationController ---

describe('ConversationController', function () {
    it('admin can view conversations', function () {
        $this->actingAs($this->admin)->get('/admin/ai/conversations')->assertOk();
    });

    it('guest redirects from conversations', function () {
        $this->get('/admin/ai/conversations')->assertRedirect();
    });
});
