<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Logging\Services\LogService;
use Spatie\Activitylog\Models\Activity;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('log service is registered as singleton', function () {
    $service1 = app(LogService::class);
    $service2 = app(LogService::class);

    expect($service1)->toBeInstanceOf(LogService::class);
    expect($service1)->toBe($service2);
});

test('log service can log an activity', function () {
    $service = app(LogService::class);

    $activity = $service->log('Test activity logged');

    expect($activity)->toBeInstanceOf(Activity::class);
    expect($activity->description)->toBe('Test activity logged');
    expect($activity->log_name)->toBe('default');
});

test('log service can log with custom log name', function () {
    $service = app(LogService::class);

    $activity = $service->log('Auth event', 'auth');

    expect($activity->log_name)->toBe('auth');
});

test('log service can log with properties', function () {
    $service = app(LogService::class);

    $activity = $service->log('Setting changed', 'settings', null, [
        'key' => 'site_name',
        'old' => 'Old Name',
        'new' => 'New Name',
    ]);

    expect($activity->properties->toArray())->toHaveKeys(['key', 'old', 'new']);
    expect($activity->properties['key'])->toBe('site_name');
});

test('log service can log with causer', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $service = app(LogService::class);
    $activity = $service->log('User action');

    expect($activity->causer_id)->toBe($user->id);
    expect($activity->causer_type)->toBe(User::class);
});

test('log service can log with subject', function () {
    $user = User::factory()->create();

    $service = app(LogService::class);
    $activity = $service->log('User updated', 'default', $user);

    expect($activity->subject_id)->toBe($user->id);
    expect($activity->subject_type)->toBe(User::class);
});

test('log service get latest returns activities', function () {
    $service = app(LogService::class);

    $service->log('First');
    $service->log('Second');
    $service->log('Third');

    $latest = $service->getLatest(2);

    expect($latest)->toHaveCount(2);
    expect(Activity::count())->toBe(3);
});

test('log service get by log name filters correctly', function () {
    $service = app(LogService::class);

    $service->log('Auth login', 'auth');
    $service->log('Setting changed', 'settings');
    $service->log('Auth logout', 'auth');

    $authLogs = $service->getByLogName('auth');

    expect($authLogs)->toHaveCount(2);
    expect($authLogs->every(fn ($a) => $a->log_name === 'auth'))->toBeTrue();
});

test('log service get by causer filters correctly', function () {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();

    $this->actingAs($user1);
    $service = app(LogService::class);
    $service->log('Action by user 1');

    $this->actingAs($user2);
    $service->log('Action by user 2');

    $user1Logs = $service->getByCauser($user1);

    expect($user1Logs)->toHaveCount(1);
    expect($user1Logs->first()->description)->toBe('Action by user 1');
});

test('log service clean removes old activities', function () {
    $service = app(LogService::class);

    $service->log('Old activity');
    Activity::query()->update(['created_at' => now()->subDays(100)]);

    $service->log('Recent activity');

    $deleted = $service->clean(90);

    expect($deleted)->toBe(1);
    expect(Activity::count())->toBe(1);
    expect(Activity::first()->description)->toBe('Recent activity');
});

test('log service get by subject filters correctly', function () {
    Activity::query()->delete();
    activity()->disableLogging();
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();
    activity()->enableLogging();
    $service = app(LogService::class);

    $service->log('User 1 updated', 'default', $user1);
    $service->log('User 2 updated', 'default', $user2);
    $service->log('User 1 deleted', 'default', $user1);

    $logs = $service->getBySubject($user1);

    expect($logs)->toHaveCount(2);
    expect($logs->every(fn ($a) => $a->subject_id === $user1->id))->toBeTrue();
});

test('log service works without authentication (no causer)', function () {
    auth()->logout();
    $service = app(LogService::class);

    $activity = $service->log('Anonymous action');

    expect($activity)->toBeInstanceOf(Activity::class)
        ->and($activity->causer_id)->toBeNull()
        ->and($activity->causer_type)->toBeNull();
});

test('log service clean handles boundary dates correctly', function () {
    Activity::query()->delete();
    $service = app(LogService::class);

    $service->log('Exactly 91 days old');
    Activity::where('description', 'Exactly 91 days old')
        ->update(['created_at' => now()->subDays(91)]);

    $service->log('89 days old');
    Activity::where('description', '89 days old')
        ->update(['created_at' => now()->subDays(89)]);

    $deleted = $service->clean(90);

    expect($deleted)->toBe(1);
    expect(Activity::count())->toBe(1);
    expect(Activity::first()->description)->toBe('89 days old');
});

test('log service get latest with limit 1 returns single activity', function () {
    $service = app(LogService::class);
    $service->log('Only one needed');

    $latest = $service->getLatest(1);

    expect($latest)->toHaveCount(1);
});
