<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Health\Checks\Checks\DatabaseCheck;
use Spatie\Health\Facades\Health;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('health check endpoint returns ok', function () {
    $this->get('/health')->assertOk();
});

test('health checks are registered', function () {
    $checks = Health::registeredChecks();

    expect($checks)->not->toBeEmpty();
});

test('health checks include at least 7 base checks', function () {
    expect(count(Health::registeredChecks()))->toBeGreaterThanOrEqual(7);
});

test('health checks include DatabaseCheck', function () {
    $names = collect(Health::registeredChecks())->map(fn ($c) => $c::class);

    expect($names)->toContain(DatabaseCheck::class);
});

test('status page returns 200', function () {
    $this->get('/status')->assertOk();
});
