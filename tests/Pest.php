<?php

declare(strict_types=1);

use Tests\TestCase;

uses(TestCase::class)
    ->in('Feature', 'Unit')
    ->in('../Modules/Frontend/tests/Feature');

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});
