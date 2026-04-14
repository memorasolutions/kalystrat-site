<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use Barryvdh\DomPDF\ServiceProvider;
use Illuminate\Support\Collection;
use Modules\Export\Services\ExportService;
use OpenSpout\Writer\CSV\Writer;
use Tests\TestCase;

uses(TestCase::class);

afterEach(function () {
    app()->forgetInstance(ExportService::class);
    gc_collect_cycles();
});

test('export service is registered as singleton', function () {
    $service1 = app(ExportService::class);
    $service2 = app(ExportService::class);

    expect($service1)->toBeInstanceOf(ExportService::class);
    expect($service1)->toBe($service2);
});

test('export service can export to csv', function () {
    $service = app(ExportService::class);
    $data = new Collection([
        ['name' => 'Alice', 'email' => 'alice@test.com'],
        ['name' => 'Bob', 'email' => 'bob@test.com'],
    ]);

    $path = $service->toCsv($data, 'test_export.csv', ['name', 'email']);

    expect($path)->toEndWith('test_export.csv');
    expect(file_exists($path))->toBeTrue();

    $content = file_get_contents($path);
    expect($content)->toContain('Alice');
    expect($content)->toContain('bob@test.com');

    // Cleanup
    @unlink($path);
});

test('export service can export to excel', function () {
    $service = app(ExportService::class);
    $data = new Collection([
        ['name' => 'Charlie', 'email' => 'charlie@test.com'],
    ]);

    $path = $service->toExcel($data, 'test_export.xlsx', ['name', 'email']);

    expect($path)->toEndWith('test_export.xlsx');
    expect(file_exists($path))->toBeTrue();
    expect(filesize($path))->toBeGreaterThan(0);

    // Cleanup
    @unlink($path);
});

test('export service can export to pdf', function () {
    $service = app(ExportService::class);

    $path = $service->toPdf('export::pdf-test', ['title' => 'Test PDF'], 'test_export.pdf');

    expect($path)->toEndWith('test_export.pdf');
    expect(file_exists($path))->toBeTrue();
    expect(filesize($path))->toBeGreaterThan(0);

    // Cleanup
    @unlink($path);
});

test('openspout package is available', function () {
    expect(class_exists(Writer::class))->toBeTrue();
    expect(class_exists(OpenSpout\Writer\XLSX\Writer::class))->toBeTrue();
});

test('dompdf package is available', function () {
    expect(class_exists(ServiceProvider::class))->toBeTrue();
});

test('export service can export empty data to csv', function () {
    $service = app(ExportService::class);
    $data = new Collection([]);

    $path = $service->toCsv($data, 'empty_export.csv', ['name', 'email']);

    expect($path)->toEndWith('empty_export.csv');
    expect(file_exists($path))->toBeTrue();

    $content = file_get_contents($path);
    expect($content)->toContain('name');
    expect($content)->toContain('email');

    @unlink($path);
});

test('export service creates directory if missing', function () {
    $service = app(ExportService::class);
    $data = new Collection([['test' => 'value']]);

    $path = $service->toCsv($data, 'subdir_test.csv', ['test']);

    expect(file_exists($path))->toBeTrue();

    @unlink($path);
});

test('export service csv contains headers and data rows', function () {
    $service = app(ExportService::class);
    $data = new Collection([
        ['id' => 1, 'name' => 'Product A', 'price' => '9.99'],
        ['id' => 2, 'name' => 'Product B', 'price' => '19.99'],
    ]);

    $path = $service->toCsv($data, 'products.csv', ['id', 'name', 'price']);

    $content = file_get_contents($path);
    expect($content)->toContain('Product A')
        ->and($content)->toContain('Product B')
        ->and($content)->toContain('19.99');

    @unlink($path);
});

test('export service excel file has correct size', function () {
    $service = app(ExportService::class);
    $data = new Collection([
        ['a' => 'Hello', 'b' => 'World'],
        ['a' => 'Foo', 'b' => 'Bar'],
    ]);

    $path = $service->toExcel($data, 'size_test.xlsx', ['a', 'b']);

    expect(filesize($path))->toBeGreaterThan(100);

    @unlink($path);
});
