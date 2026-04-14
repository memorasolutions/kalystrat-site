<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Import\Services\ImportService;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $this->service = app(ImportService::class);
    $this->tempFile = tempnam(sys_get_temp_dir(), 'import_test').'.csv';
});

afterEach(function () {
    if (file_exists($this->tempFile)) {
        unlink($this->tempFile);
    }
});

test('getAvailableModelTypes retourne au moins user', function () {
    expect($this->service->getAvailableModelTypes())->toHaveKey('user');
});

test('FIELD_MAPS contient article, page et user', function () {
    expect(ImportService::FIELD_MAPS)->toHaveKeys(['article', 'page', 'user']);
});

test('preview retourne headers, rows et total_previewed', function () {
    $fh = fopen($this->tempFile, 'w');
    fputcsv($fh, ['name', 'email', 'password']);
    fputcsv($fh, ['Jean Dupont', 'jean@test.com', 'secret123']);
    fputcsv($fh, ['Marie Tremblay', 'marie@test.com', 'secret456']);
    fclose($fh);

    $result = $this->service->preview($this->tempFile, 'csv', 10);

    expect($result['headers'])->toBe(['name', 'email', 'password'])
        ->and($result['total_previewed'])->toBe(2)
        ->and($result['rows'])->toHaveCount(2);
});

test('preview lance InvalidArgumentException pour format inconnu', function () {
    $this->service->preview($this->tempFile, 'xml');
})->throws(InvalidArgumentException::class);

test('import fichier inexistant retourne result vide', function () {
    $result = $this->service->import('/tmp/inexistant.csv', 'csv', 'user', []);

    expect($result->total)->toBe(0)
        ->and($result->imported)->toBe(0)
        ->and($result->skipped)->toBe(0);
});

test('import CSV crée des utilisateurs', function () {
    $fh = fopen($this->tempFile, 'w');
    fputcsv($fh, ['name', 'email', 'password']);
    fputcsv($fh, ['Test Import', 'import@test.com', 'motdepasse']);
    fclose($fh);

    $result = $this->service->import($this->tempFile, 'csv', 'user', [0 => 'name', 1 => 'email', 2 => 'password']);

    expect($result->imported)->toBe(1)
        ->and($result->total)->toBe(1)
        ->and($result->skipped)->toBe(0);

    $this->assertDatabaseHas('users', ['email' => 'import@test.com', 'name' => 'Test Import']);
});

test('import avec validator qui refuse tout retourne skipped == total', function () {
    $fh = fopen($this->tempFile, 'w');
    fputcsv($fh, ['name', 'email', 'password']);
    fputcsv($fh, ['A', 'a@test.com', 'pass1']);
    fputcsv($fh, ['B', 'b@test.com', 'pass2']);
    fclose($fh);

    $result = $this->service->import(
        $this->tempFile, 'csv', 'user',
        [0 => 'name', 1 => 'email', 2 => 'password'],
        fn () => false
    );

    expect($result->skipped)->toBe(2)
        ->and($result->imported)->toBe(0)
        ->and($result->total)->toBe(2);
});

test('import type modèle inconnu lance InvalidArgumentException', function () {
    $fh = fopen($this->tempFile, 'w');
    fputcsv($fh, ['col1']);
    fputcsv($fh, ['val1']);
    fclose($fh);

    $this->service->import($this->tempFile, 'csv', 'unknown', [0 => 'col1']);
})->throws(InvalidArgumentException::class);
