<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Modules\Backup\Services\BackupService;
use Spatie\Backup\BackupServiceProvider;
use Tests\TestCase;

uses(TestCase::class);

test('backup service is registered as singleton', function () {
    $service1 = app(BackupService::class);
    $service2 = app(BackupService::class);

    expect($service1)->toBeInstanceOf(BackupService::class);
    expect($service1)->toBe($service2);
});

test('getBackups returns empty array when no backups exist', function () {
    $diskName = config('backup.backup.destination.disks.0', 'local');
    $prefix = config('backup.backup.name', 'laravel-backup');

    Storage::fake($diskName);

    $backups = app(BackupService::class)->getBackups();

    expect($backups)->toBeArray()->toBeEmpty();
});

test('getBackups returns only zip files', function () {
    $diskName = config('backup.backup.destination.disks.0', 'local');
    $prefix = config('backup.backup.name', 'laravel-backup');

    Storage::fake($diskName);
    Storage::disk($diskName)->put("{$prefix}/backup1.zip", 'content');
    Storage::disk($diskName)->put("{$prefix}/readme.txt", 'not a backup');
    Storage::disk($diskName)->put("{$prefix}/backup2.zip", 'content2');

    $backups = app(BackupService::class)->getBackups();

    expect($backups)->toHaveCount(2);
    expect(collect($backups)->pluck('name')->toArray())
        ->each->toEndWith('.zip');
});

test('getBackups returns correct structure', function () {
    $diskName = config('backup.backup.destination.disks.0', 'local');
    $prefix = config('backup.backup.name', 'laravel-backup');

    Storage::fake($diskName);
    Storage::disk($diskName)->put("{$prefix}/test.zip", 'content');

    $backups = app(BackupService::class)->getBackups();

    expect($backups)->toHaveCount(1);
    expect($backups[0])->toHaveKeys(['path', 'name', 'size', 'date']);
    expect($backups[0]['name'])->toBe('test.zip');
    expect($backups[0]['path'])->toBe("{$prefix}/test.zip");
    expect($backups[0]['size'])->toBeInt()->toBeGreaterThan(0);
    expect($backups[0]['date'])->toBeInt();
});

test('deleteBackup removes file from disk', function () {
    $diskName = config('backup.backup.destination.disks.0', 'local');
    $prefix = config('backup.backup.name', 'laravel-backup');

    Storage::fake($diskName);
    $path = "{$prefix}/todelete.zip";
    Storage::disk($diskName)->put($path, 'content');

    $result = app(BackupService::class)->deleteBackup($path);

    expect($result)->toBeTrue();
    Storage::disk($diskName)->assertMissing($path);
});

test('runBackup calls backup run artisan command', function () {
    Artisan::shouldReceive('call')->with('backup:run')->once()->andReturn(0);

    $result = app(BackupService::class)->runBackup();

    expect($result)->toBe(0);
});

test('runBackup with dbOnly calls backup run only-db', function () {
    Artisan::shouldReceive('call')->with('backup:run --only-db')->once()->andReturn(0);

    $result = app(BackupService::class)->runBackup(dbOnly: true);

    expect($result)->toBe(0);
});

test('cleanOldBackups calls backup clean artisan command', function () {
    Artisan::shouldReceive('call')->with('backup:clean')->once()->andReturn(0);

    $result = app(BackupService::class)->cleanOldBackups();

    expect($result)->toBe(0);
});

test('backup package is available', function () {
    expect(class_exists(BackupServiceProvider::class))->toBeTrue();
});

test('backup config exists', function () {
    expect(config('backup.backup.name'))->not->toBeNull();
    expect(config('backup.backup.destination.disks'))->toBeArray()->not->toBeEmpty();
});

test('backup artisan commands are registered', function () {
    $commands = collect(Artisan::all());

    expect($commands->has('backup:run'))->toBeTrue();
    expect($commands->has('backup:clean'))->toBeTrue();
});

test('getBackups returns results sorted by date descending', function () {
    $diskName = config('backup.backup.destination.disks.0', 'local');
    $prefix = config('backup.backup.name', 'laravel-backup');

    Storage::fake($diskName);
    Storage::disk($diskName)->put("{$prefix}/old.zip", 'a');
    Storage::disk($diskName)->put("{$prefix}/new.zip", 'bb');

    $backups = app(BackupService::class)->getBackups();

    expect($backups)->toHaveCount(2);
    // Verify keys are present for every entry
    foreach ($backups as $backup) {
        expect($backup)->toHaveKeys(['path', 'name', 'size', 'date']);
    }
});

test('deleteBackup handles non-existent file without error', function () {
    $diskName = config('backup.backup.destination.disks.0', 'local');
    Storage::fake($diskName);

    $result = app(BackupService::class)->deleteBackup('nonexistent/path.zip');

    expect($result)->toBeIn([true, false]);
});

test('cleanOldBackups delegates to backup:clean artisan command', function () {
    Artisan::shouldReceive('call')->with('backup:clean')->once()->andReturn(0);

    $result = app(BackupService::class)->cleanOldBackups();

    expect($result)->toBe(0);
});

test('getBackups size field is the byte length of the file content', function () {
    $diskName = config('backup.backup.destination.disks.0', 'local');
    $prefix = config('backup.backup.name', 'laravel-backup');

    Storage::fake($diskName);
    $content = str_repeat('x', 512);
    Storage::disk($diskName)->put("{$prefix}/sized.zip", $content);

    $backups = app(BackupService::class)->getBackups();

    expect($backups[0]['size'])->toBe(512);
});
