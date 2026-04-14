<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Core\Models\Announcement;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $this->admin = User::factory()->create();
    $this->admin->assignRole('super_admin');

    $this->user = User::factory()->create();
});

// --- UserController ---

describe('UserController', function () {
    it('admin can view users index', function () {
        $this->actingAs($this->admin)->get('/admin/users')->assertOk();
    });

    it('admin can view user detail', function () {
        $target = User::factory()->create();
        $this->actingAs($this->admin)->get("/admin/users/{$target->id}")->assertOk();
    });

    it('admin can view create form', function () {
        $this->actingAs($this->admin)->get('/admin/users/create')->assertOk();
    });

    it('non-admin gets 403 on users', function () {
        $this->actingAs($this->user)->get('/admin/users')->assertForbidden();
    });

    it('guest redirects from users', function () {
        $this->get('/admin/users')->assertRedirect();
    });
});

// --- AnnouncementController ---

describe('AnnouncementController', function () {
    it('admin can view announcements', function () {
        $this->actingAs($this->admin)->get('/admin/announcements')->assertOk();
    });

    it('admin can create announcement', function () {
        $this->actingAs($this->admin)->post('/admin/announcements', [
            'title' => 'Test announcement',
            'body' => 'Test message body',
            'type' => 'announcement',
        ])->assertRedirect();

        $this->assertDatabaseHas('announcements', ['title' => 'Test announcement']);
    });

    it('admin can delete announcement', function () {
        $announcement = Announcement::factory()->create();
        $this->actingAs($this->admin)
            ->delete("/admin/announcements/{$announcement->id}")
            ->assertRedirect();
    });

    it('guest redirects from announcements', function () {
        $this->get('/admin/announcements')->assertRedirect();
    });
});

// --- WebhookController ---

describe('WebhookController', function () {
    it('admin can view webhooks', function () {
        $this->actingAs($this->admin)->get('/admin/webhooks')->assertOk();
    });

    it('guest redirects from webhooks', function () {
        $this->get('/admin/webhooks')->assertRedirect();
    });
});

// --- AnalyticsController ---

describe('AnalyticsController', function () {
    it('admin can view analytics overview', function () {
        $this->actingAs($this->admin)->get('/admin/analytics/overview')->assertOk();
    });

    it('admin can view analytics content', function () {
        $this->actingAs($this->admin)->get('/admin/analytics/content')->assertOk();
    });

    it('admin can view analytics activity', function () {
        $this->actingAs($this->admin)->get('/admin/analytics/activity')->assertOk();
    });

    it('guest redirects from analytics', function () {
        $this->get('/admin/analytics/overview')->assertRedirect();
    });
});

// --- SchedulerController ---

describe('SchedulerController', function () {
    it('admin can view scheduler', function () {
        $this->actingAs($this->admin)->get('/admin/scheduler')->assertOk();
    });

    it('guest redirects from scheduler', function () {
        $this->get('/admin/scheduler')->assertRedirect();
    });
});

// --- TrashController ---

describe('TrashController', function () {
    it('admin can view trash', function () {
        $this->actingAs($this->admin)->get('/admin/trash')->assertOk();
    });

    it('guest redirects from trash', function () {
        $this->get('/admin/trash')->assertRedirect();
    });
});
