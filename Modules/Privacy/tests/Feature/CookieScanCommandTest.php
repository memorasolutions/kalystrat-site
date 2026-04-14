<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use Tests\TestCase;

uses(TestCase::class);

it('runs privacy:cookie-scan without errors', function () {
    $this->artisan('privacy:cookie-scan')
        ->assertSuccessful();
});

it('detects session and XSRF-TOKEN cookies', function () {
    $this->artisan('privacy:cookie-scan')
        ->expectsOutputToContain('XSRF-TOKEN')
        ->assertSuccessful();
});

it('detects cookie_consent from Privacy module', function () {
    $this->artisan('privacy:cookie-scan')
        ->expectsOutputToContain('cookie_consent')
        ->assertSuccessful();
});

it('succeeds with --json flag', function () {
    $this->artisan('privacy:cookie-scan', ['--json' => true])
        ->assertSuccessful();
});
