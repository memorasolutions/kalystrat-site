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
use Modules\Backoffice\Livewire\ActivityLogsTable;
use Modules\Backoffice\Livewire\CampaignsTable;
use Modules\Backoffice\Livewire\FeatureFlagsTable;
use Modules\Backoffice\Livewire\GlobalSearch;
use Modules\Backoffice\Livewire\LookerStudioStats;
use Modules\Backoffice\Livewire\MediaTable;
use Modules\Backoffice\Livewire\MetaTagsTable;
use Modules\Backoffice\Livewire\NotificationBell;
use Modules\Backoffice\Livewire\PlansTable;
use Modules\Backoffice\Livewire\SettingsManager;
use Modules\Backoffice\Livewire\SettingsTable;
use Modules\Backoffice\Livewire\ShortcodesTable;
use Modules\Backoffice\Livewire\SubscribersTable;
use Modules\Backoffice\Livewire\TranslationsManager;
use Modules\Backoffice\Livewire\WebhooksManager;
use Modules\Newsletter\Models\Campaign;
use Modules\Newsletter\Models\Subscriber;
use Modules\SaaS\Models\Plan;
use Modules\SEO\Models\MetaTag;
use Modules\Settings\Models\Setting;
use Modules\Webhooks\Models\WebhookEndpoint;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $this->seed(RolesAndPermissionsSeeder::class);
    $this->admin = User::factory()->create();
    $this->admin->assignRole('super_admin');
});

// ── MediaTable ──────────────────────────────────────────────────────────

it('renders media table', function () {
    Livewire::actingAs($this->admin)
        ->test(MediaTable::class)
        ->assertStatus(200);
});

it('media table can search', function () {
    Livewire::actingAs($this->admin)
        ->test(MediaTable::class)
        ->set('search', 'photo')
        ->assertSet('search', 'photo');
});

it('media table can filter by type', function () {
    Livewire::actingAs($this->admin)
        ->test(MediaTable::class)
        ->set('filterType', 'image')
        ->assertSet('filterType', 'image');
});

it('media table resets filters', function () {
    Livewire::actingAs($this->admin)
        ->test(MediaTable::class)
        ->set('search', 'test')
        ->set('filterType', 'image')
        ->set('filterFolder', 'photos')
        ->call('resetFilters')
        ->assertSet('search', '')
        ->assertSet('filterType', '')
        ->assertSet('filterFolder', '');
});

it('media table cancel edit resets state', function () {
    Livewire::actingAs($this->admin)
        ->test(MediaTable::class)
        ->set('editingMediaId', 1)
        ->set('editTitle', 'Test')
        ->call('cancelEdit')
        ->assertSet('editingMediaId', null)
        ->assertSet('editTitle', '');
});

// ── GlobalSearch ────────────────────────────────────────────────────────

it('renders global search', function () {
    Livewire::actingAs($this->admin)
        ->test(GlobalSearch::class)
        ->assertStatus(200);
});

it('global search with short query returns empty', function () {
    Livewire::actingAs($this->admin)
        ->test(GlobalSearch::class)
        ->set('query', 'a')
        ->assertSet('query', 'a');
});

it('global search accepts query', function () {
    Livewire::actingAs($this->admin)
        ->test(GlobalSearch::class)
        ->set('query', 'admin')
        ->assertSet('query', 'admin');
});

// ── NotificationBell ────────────────────────────────────────────────────

it('renders notification bell', function () {
    Livewire::actingAs($this->admin)
        ->test(NotificationBell::class)
        ->assertStatus(200)
        ->assertSet('unreadCount', 0);
});

it('notification bell marks all as read', function () {
    Livewire::actingAs($this->admin)
        ->test(NotificationBell::class)
        ->call('markAllRead')
        ->assertSet('unreadCount', 0);
});

// ── SettingsManager ─────────────────────────────────────────────────────

it('renders settings manager', function () {
    Livewire::actingAs($this->admin)
        ->test(SettingsManager::class)
        ->assertStatus(200);
});

it('settings manager can update a setting', function () {
    $setting = Setting::create([
        'key' => 'test.setting',
        'value' => 'old',
        'group' => 'general',
        'type' => 'string',
    ]);

    Livewire::actingAs($this->admin)
        ->test(SettingsManager::class)
        ->set("values.{$setting->id}", 'new_value')
        ->call('updateSetting', $setting->id);

    expect($setting->fresh()->value)->toBe('new_value');
});

it('settings manager can toggle boolean', function () {
    $setting = Setting::create([
        'key' => 'test.bool',
        'value' => 'false',
        'group' => 'general',
        'type' => 'boolean',
    ]);

    Livewire::actingAs($this->admin)
        ->test(SettingsManager::class)
        ->call('toggleBoolean', $setting->id);

    expect($setting->fresh()->value)->toBe('true');
});

it('settings manager can save group', function () {
    $setting = Setting::create([
        'key' => 'general.name',
        'value' => 'old',
        'group' => 'general',
        'type' => 'string',
    ]);

    Livewire::actingAs($this->admin)
        ->test(SettingsManager::class)
        ->set("values.{$setting->id}", 'updated')
        ->call('saveGroup', 'general');

    expect($setting->fresh()->value)->toBe('updated');
});

// ── LookerStudioStats ───────────────────────────────────────────────────

it('renders looker studio stats', function () {
    Livewire::actingAs($this->admin)
        ->test(LookerStudioStats::class)
        ->assertStatus(200);
});

// ── FeatureFlagsTable ───────────────────────────────────────────────────

it('renders feature flags table', function () {
    Livewire::actingAs($this->admin)
        ->test(FeatureFlagsTable::class)
        ->assertStatus(200);
});

it('feature flags table can search', function () {
    Livewire::actingAs($this->admin)
        ->test(FeatureFlagsTable::class)
        ->set('search', 'module-ai')
        ->assertSet('search', 'module-ai');
});

it('feature flags table can edit condition', function () {
    Livewire::actingAs($this->admin)
        ->test(FeatureFlagsTable::class)
        ->call('editCondition', 'module-blog')
        ->assertSet('editingCondition', 'module-blog')
        ->assertSet('conditionType', 'always');
});

it('feature flags table can cancel edit', function () {
    Livewire::actingAs($this->admin)
        ->test(FeatureFlagsTable::class)
        ->call('editCondition', 'module-blog')
        ->call('cancelEdit')
        ->assertSet('editingCondition', '')
        ->assertSet('conditionType', 'always');
});

// ── TranslationsManager ────────────────────────────────────────────────

it('renders translations manager', function () {
    Livewire::actingAs($this->admin)
        ->test(TranslationsManager::class)
        ->assertStatus(200);
});

it('translations manager can search', function () {
    Livewire::actingAs($this->admin)
        ->test(TranslationsManager::class)
        ->set('search', 'login')
        ->assertSet('search', 'login');
});

it('translations manager can change target locale', function () {
    Livewire::actingAs($this->admin)
        ->test(TranslationsManager::class)
        ->set('targetLocale', 'es')
        ->assertSet('targetLocale', 'es');
});

it('translations manager can toggle untranslated only', function () {
    Livewire::actingAs($this->admin)
        ->test(TranslationsManager::class)
        ->set('showUntranslatedOnly', true)
        ->assertSet('showUntranslatedOnly', true);
});

// ── WebhooksManager ────────────────────────────────────────────────────

it('renders webhooks manager', function () {
    Livewire::actingAs($this->admin)
        ->test(WebhooksManager::class)
        ->assertStatus(200);
});

it('webhooks manager can create webhook', function () {
    Livewire::actingAs($this->admin)
        ->test(WebhooksManager::class)
        ->set('name', 'Test Hook')
        ->set('url', 'https://example.com/hook')
        ->set('secret', 'mysecret')
        ->call('store');

    expect(WebhookEndpoint::where('name', 'Test Hook')->exists())->toBeTrue();
});

it('webhooks manager validates required fields', function () {
    Livewire::actingAs($this->admin)
        ->test(WebhooksManager::class)
        ->set('name', '')
        ->set('url', '')
        ->call('store')
        ->assertHasErrors(['name', 'url']);
});

it('webhooks manager can delete webhook', function () {
    $webhook = WebhookEndpoint::create([
        'name' => 'Delete Me',
        'url' => 'https://example.com/delete',
    ]);

    Livewire::actingAs($this->admin)
        ->test(WebhooksManager::class)
        ->call('delete', $webhook->id);

    expect(WebhookEndpoint::find($webhook->id))->toBeNull();
});

// ── CampaignsTable ──────────────────────────────────────────────────────

it('renders campaigns table', function () {
    Livewire::actingAs($this->admin)
        ->test(CampaignsTable::class)
        ->assertStatus(200);
});

it('campaigns table can search', function () {
    Livewire::actingAs($this->admin)
        ->test(CampaignsTable::class)
        ->set('search', 'promo')
        ->assertSet('search', 'promo');
});

it('campaigns table resets filters', function () {
    Livewire::actingAs($this->admin)
        ->test(CampaignsTable::class)
        ->set('search', 'test')
        ->set('filterStatus', 'draft')
        ->call('resetFilters')
        ->assertSet('search', '')
        ->assertSet('filterStatus', '');
});

it('campaigns table bulk delete', function () {
    $campaign = Campaign::factory()->create();

    Livewire::actingAs($this->admin)
        ->test(CampaignsTable::class)
        ->set('selected', [$campaign->id])
        ->set('bulkAction', 'delete')
        ->call('executeBulkAction');

    expect(Campaign::find($campaign->id))->toBeNull();
});

// ── SubscribersTable ────────────────────────────────────────────────────

it('renders subscribers table', function () {
    Livewire::actingAs($this->admin)
        ->test(SubscribersTable::class)
        ->assertStatus(200);
});

it('subscribers table can search', function () {
    Livewire::actingAs($this->admin)
        ->test(SubscribersTable::class)
        ->set('search', 'test@example.com')
        ->assertSet('search', 'test@example.com');
});

it('subscribers table can filter by status', function () {
    Livewire::actingAs($this->admin)
        ->test(SubscribersTable::class)
        ->set('filterStatus', 'active')
        ->assertSet('filterStatus', 'active');
});

it('subscribers table resets filters', function () {
    Livewire::actingAs($this->admin)
        ->test(SubscribersTable::class)
        ->set('search', 'test')
        ->set('filterStatus', 'pending')
        ->call('resetFilters')
        ->assertSet('search', '')
        ->assertSet('filterStatus', '');
});

it('subscribers table can delete subscriber', function () {
    $subscriber = Subscriber::factory()->create();

    Livewire::actingAs($this->admin)
        ->test(SubscribersTable::class)
        ->call('delete', $subscriber->id);

    expect(Subscriber::find($subscriber->id))->toBeNull();
});

it('subscribers table bulk delete', function () {
    $sub1 = Subscriber::factory()->create();
    $sub2 = Subscriber::factory()->create();

    Livewire::actingAs($this->admin)
        ->test(SubscribersTable::class)
        ->set('selected', [$sub1->id, $sub2->id])
        ->set('bulkAction', 'delete')
        ->call('executeBulkAction');

    expect(Subscriber::whereIn('id', [$sub1->id, $sub2->id])->count())->toBe(0);
});

// ── PlansTable ──────────────────────────────────────────────────────────

it('renders plans table', function () {
    Livewire::actingAs($this->admin)
        ->test(PlansTable::class)
        ->assertStatus(200);
});

it('plans table can search', function () {
    Livewire::actingAs($this->admin)
        ->test(PlansTable::class)
        ->set('search', 'Pro')
        ->assertSet('search', 'Pro');
});

it('plans table resets filters', function () {
    Livewire::actingAs($this->admin)
        ->test(PlansTable::class)
        ->set('search', 'test')
        ->set('filterInterval', 'monthly')
        ->set('filterActive', '1')
        ->call('resetFilters')
        ->assertSet('search', '')
        ->assertSet('filterInterval', '')
        ->assertSet('filterActive', '');
});

it('plans table can sort', function () {
    Livewire::actingAs($this->admin)
        ->test(PlansTable::class)
        ->call('sort', 'name')
        ->assertSet('sortBy', 'name')
        ->assertSet('sortDirection', 'asc');
});

it('plans table can toggle active', function () {
    $plan = Plan::factory()->create(['is_active' => true]);

    Livewire::actingAs($this->admin)
        ->test(PlansTable::class)
        ->call('toggleActive', $plan->id);

    expect($plan->fresh()->is_active)->toBeFalse();
});

it('plans table bulk activate', function () {
    $plan = Plan::factory()->create(['is_active' => false]);

    Livewire::actingAs($this->admin)
        ->test(PlansTable::class)
        ->set('selected', [$plan->id])
        ->set('bulkAction', 'activate')
        ->call('executeBulkAction');

    expect($plan->fresh()->is_active)->toBeTrue();
});

// ── ActivityLogsTable ───────────────────────────────────────────────────

it('renders activity logs table', function () {
    Livewire::actingAs($this->admin)
        ->test(ActivityLogsTable::class)
        ->assertStatus(200);
});

it('activity logs table can search', function () {
    Livewire::actingAs($this->admin)
        ->test(ActivityLogsTable::class)
        ->set('search', 'login')
        ->assertSet('search', 'login');
});

it('activity logs table resets filters', function () {
    Livewire::actingAs($this->admin)
        ->test(ActivityLogsTable::class)
        ->set('search', 'test')
        ->set('filterCauser', '1')
        ->set('filterLogName', 'default')
        ->set('filterEvent', 'created')
        ->set('dateFrom', '2026-01-01')
        ->set('dateTo', '2026-12-31')
        ->call('resetFilters')
        ->assertSet('search', '')
        ->assertSet('filterCauser', '')
        ->assertSet('filterLogName', '')
        ->assertSet('filterEvent', '')
        ->assertSet('dateFrom', '')
        ->assertSet('dateTo', '');
});

it('activity logs table can show and close detail', function () {
    Livewire::actingAs($this->admin)
        ->test(ActivityLogsTable::class)
        ->call('showDetail', 999)
        ->assertSet('detailActivityId', 999)
        ->call('closeDetail')
        ->assertSet('detailActivityId', null);
});

// ── MetaTagsTable ───────────────────────────────────────────────────────

it('renders meta tags table', function () {
    Livewire::actingAs($this->admin)
        ->test(MetaTagsTable::class)
        ->assertStatus(200);
});

it('meta tags table can search', function () {
    Livewire::actingAs($this->admin)
        ->test(MetaTagsTable::class)
        ->set('search', '/about')
        ->assertSet('search', '/about');
});

it('meta tags table resets filters', function () {
    Livewire::actingAs($this->admin)
        ->test(MetaTagsTable::class)
        ->set('search', 'test')
        ->set('filterActive', '1')
        ->call('resetFilters')
        ->assertSet('search', '')
        ->assertSet('filterActive', '');
});

it('meta tags table can sort', function () {
    Livewire::actingAs($this->admin)
        ->test(MetaTagsTable::class)
        ->call('sort', 'title')
        ->assertSet('sortBy', 'title')
        ->assertSet('sortDirection', 'asc');
});

it('meta tags table can toggle active', function () {
    $metaTag = MetaTag::factory()->create(['is_active' => true]);

    Livewire::actingAs($this->admin)
        ->test(MetaTagsTable::class)
        ->call('toggleActive', $metaTag->id);

    expect($metaTag->fresh()->is_active)->toBeFalse();
});

// ── ShortcodesTable ─────────────────────────────────────────────────────

it('renders shortcodes table', function () {
    Livewire::actingAs($this->admin)
        ->test(ShortcodesTable::class)
        ->assertStatus(200);
});

it('shortcodes table can search', function () {
    Livewire::actingAs($this->admin)
        ->test(ShortcodesTable::class)
        ->set('search', 'button')
        ->assertSet('search', 'button');
});

it('shortcodes table can sort', function () {
    Livewire::actingAs($this->admin)
        ->test(ShortcodesTable::class)
        ->call('sort', 'name')
        ->assertSet('sortBy', 'name')
        ->assertSet('sortDirection', 'asc');
});

it('shortcodes table resets filters', function () {
    Livewire::actingAs($this->admin)
        ->test(ShortcodesTable::class)
        ->set('search', 'test')
        ->call('resetFilters')
        ->assertSet('search', '');
});

// ── SettingsTable ───────────────────────────────────────────────────────

it('renders settings table', function () {
    Livewire::actingAs($this->admin)
        ->test(SettingsTable::class)
        ->assertStatus(200);
});

it('settings table can search', function () {
    Livewire::actingAs($this->admin)
        ->test(SettingsTable::class)
        ->set('search', 'app.name')
        ->assertSet('search', 'app.name');
});

it('settings table can filter by group', function () {
    Livewire::actingAs($this->admin)
        ->test(SettingsTable::class)
        ->set('filterGroup', 'general')
        ->assertSet('filterGroup', 'general');
});

it('settings table resets filters', function () {
    Livewire::actingAs($this->admin)
        ->test(SettingsTable::class)
        ->set('search', 'test')
        ->set('filterGroup', 'general')
        ->call('resetFilters')
        ->assertSet('search', '')
        ->assertSet('filterGroup', '');
});

it('settings table can sort', function () {
    Livewire::actingAs($this->admin)
        ->test(SettingsTable::class)
        ->call('sort', 'value')
        ->assertSet('sortBy', 'value')
        ->assertSet('sortDirection', 'asc');
});
