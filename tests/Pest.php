<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class)
    ->in('Feature', 'Unit')
    ->in('../Modules/Frontend/tests/Feature');

uses(RefreshDatabase::class)->in('../Modules/Frontend/tests/Feature');

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});
