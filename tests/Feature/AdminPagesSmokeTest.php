<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('le namespace admintabler:: est correctement enregistré', function () {
    expect(view()->exists('admintabler::layouts.admin'))->toBeTrue();
});

it('la config admintabler est chargée avec les valeurs par défaut', function () {
    $config = config('admintabler');

    expect($config)->not->toBeNull()
        ->and($config['active_theme'] ?? null)->toBe('tabler')
        ->and($config['layout'] ?? null)->toBe('navbar-overlap')
        ->and($config['features']['command_palette'] ?? null)->toBeTrue()
        ->and($config['features']['dark_mode'] ?? null)->toBeTrue();
});

it('toutes les vues admin migrées utilisent le layout admintabler', function () {
    $patterns = ["@extends('backoffice::themes.backend.layouts.admin'", "@extends('backoffice::layouts.admin'"];
    $modulesPath = base_path('Modules');
    $foundLegacy = [];

    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($modulesPath));
    foreach ($iterator as $file) {
        if ($file->isFile() && str_ends_with($file->getFilename(), '.blade.php')) {
            if (str_contains($file->getPathname(), '_backend.bak')) continue;

            $content = file_get_contents($file->getPathname());
            foreach ($patterns as $pattern) {
                if (str_contains($content, $pattern)) {
                    $foundLegacy[] = str_replace(base_path() . '/', '', $file->getPathname());
                }
            }
        }
    }

    expect($foundLegacy)->toBeEmpty('Vues legacy NobleUI restantes : ' . implode(', ', $foundLegacy));
});

it('le ServiceProvider AdminTablerServiceProvider est chargé', function () {
    expect(config('admintabler.name'))->toBe('AdminTabler');
});
