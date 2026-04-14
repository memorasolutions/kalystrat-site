<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $this->admin = User::factory()->create();
    $this->admin->assignRole('super_admin');

    $this->user = User::factory()->create();
});

// --- DashboardController ---

describe('DashboardController', function () {
    it('loads dashboard for admin', function () {
        $this->actingAs($this->admin)->get('/admin')->assertOk();
    });

    it('redirects guests from dashboard', function () {
        $this->get('/admin')->assertRedirect();
    });
});

// --- StatsController ---

describe('StatsController', function () {
    it('loads stats for admin', function () {
        $this->actingAs($this->admin)->get('/admin/stats')->assertOk();
    });

    it('redirects guests from stats', function () {
        $this->get('/admin/stats')->assertRedirect();
    });
});

// --- SecurityDashboardController ---

describe('SecurityDashboardController', function () {
    it('loads security dashboard for admin', function () {
        $this->actingAs($this->admin)->get('/admin/security')->assertOk();
    });

    it('returns 403 for non-admin', function () {
        $this->actingAs($this->user)->get('/admin/security')->assertForbidden();
    });

    it('redirects guests from security', function () {
        $this->get('/admin/security')->assertRedirect();
    });
});

// --- LogController ---

describe('LogController', function () {
    it('loads logs for admin', function () {
        $this->actingAs($this->admin)->get('/admin/logs')->assertOk();
    });

    it('can clear logs as admin', function () {
        $this->actingAs($this->admin)->post('/admin/logs/clear')->assertRedirect();
    });

    it('redirects guests from logs', function () {
        $this->get('/admin/logs')->assertRedirect();
    });
});

// --- SystemInfoController ---

describe('SystemInfoController', function () {
    it('loads system info for admin', function () {
        $this->actingAs($this->admin)
            ->get('/admin/system-info')
            ->assertOk()
            ->assertSee(PHP_VERSION);
    });

    it('redirects guests from system info', function () {
        $this->get('/admin/system-info')->assertRedirect();
    });
});

// --- CacheController ---

describe('CacheController', function () {
    it('loads cache page for admin', function () {
        $this->actingAs($this->admin)->get('/admin/cache')->assertOk();
    });

    it('can clear all caches', function () {
        $this->actingAs($this->admin)
            ->post('/admin/cache/clear-all')
            ->assertRedirect()
            ->assertSessionHas('success');
    });

    it('can clear individual caches', function () {
        $this->actingAs($this->admin)->post('/admin/cache/clear-cache')->assertRedirect();
        $this->actingAs($this->admin)->post('/admin/cache/clear-config')->assertRedirect();
        $this->actingAs($this->admin)->post('/admin/cache/clear-views')->assertRedirect();
        $this->actingAs($this->admin)->post('/admin/cache/clear-routes')->assertRedirect();
    });

    it('redirects guests from cache', function () {
        $this->get('/admin/cache')->assertRedirect();
    });
});

// --- FeatureFlagController ---

describe('FeatureFlagController', function () {
    it('loads feature flags for admin', function () {
        $this->actingAs($this->admin)->get('/admin/feature-flags')->assertOk();
    });

    it('redirects guests from feature flags', function () {
        $this->get('/admin/feature-flags')->assertRedirect();
    });
});

// --- MaintenanceController ---

describe('MaintenanceController', function () {
    it('can toggle maintenance mode as admin', function () {
        $this->actingAs($this->admin)
            ->post('/admin/maintenance/toggle')
            ->assertRedirect();

        // Ensure maintenance is off after test
        if (app()->isDownForMaintenance()) {
            $this->artisan('up');
        }
    });

    it('non-admin cannot toggle maintenance', function () {
        $this->actingAs($this->user)
            ->post('/admin/maintenance/toggle')
            ->assertForbidden();
    });

    it('redirects guests from maintenance', function () {
        $this->post('/admin/maintenance/toggle')->assertRedirect();
    });
});

// --- ActivityLogController ---

describe('ActivityLogController', function () {
    it('loads activity logs for admin', function () {
        $this->actingAs($this->admin)->get('/admin/activity-logs')->assertOk();
    });

    it('redirects guests from activity logs', function () {
        $this->get('/admin/activity-logs')->assertRedirect();
    });
});

// --- FailedJobController ---

describe('FailedJobController', function () {
    it('loads failed jobs for admin', function () {
        $this->actingAs($this->admin)->get('/admin/failed-jobs')->assertOk();
    });

    it('redirects guests from failed jobs', function () {
        $this->get('/admin/failed-jobs')->assertRedirect();
    });
});
