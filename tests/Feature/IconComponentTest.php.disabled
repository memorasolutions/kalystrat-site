<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;
use Tests\TestCase;

uses(TestCase::class);

/**
 * T38-S30 — Pest test composant <x-frontend::icon>
 *
 * Couverture : 32 classes définies + name inconnu + size custom + attributs SVG.
 * Référence : Modules/Frontend/resources/views/components/icon.blade.php
 */

const ICON_NAMES = [
    'shield-check', 'home-heart', 'team', 'shield-star', 'time', 'phone', 'menu',
    'arrow-right', 'line-chart', 'checkbox-circle', 'mail', 'map-pin',
    'building', 'building-2', 'building-3', 'building-4',
    'customer-service', 'paint-brush', 'compass', 'dashboard', 'refresh',
    'links', 'award', 'git-merge', 'star', 'play', 'home',
    'community', 'money-dollar-circle', 'shield-cross', 'graduation-cap', 'roadster',
];

it('rend un SVG valide pour chaque classe définie', function (string $name) {
    $html = Blade::render('<x-frontend::icon name="' . $name . '"/>');

    expect($html)
        ->toContain('<svg')
        ->toContain('viewBox="0 0 24 24"')
        ->toContain('fill="currentColor"')
        ->toContain('aria-hidden="true"')
        ->toContain('focusable="false"')
        ->toContain('<path d="')
        ->toContain('</svg>');
})->with(ICON_NAMES);

it('produit un output vide pour un name inconnu', function () {
    $html = Blade::render('<x-frontend::icon name="inexistant-xyz"/>');

    expect(trim($html))->toBe('');
});

it('respecte le size custom passé en attribut', function () {
    $html = Blade::render('<x-frontend::icon name="phone" :size="32"/>');

    expect($html)
        ->toContain('width="32"')
        ->toContain('height="32"');
});

it('utilise size 24 par défaut', function () {
    $html = Blade::render('<x-frontend::icon name="phone"/>');

    expect($html)
        ->toContain('width="24"')
        ->toContain('height="24"');
});

it('définit toutes les classes critiques utilisées dans les Blade actifs', function () {
    // Liste des classes utilisées dans le markup (extraite du grep T37).
    // Si une classe est utilisée mais absente du switch, le composant rendra vide → régression.
    $usedInBlade = [
        'shield-check', 'home-heart', 'team', 'shield-star', 'time', 'phone', 'menu',
        'line-chart', 'checkbox-circle', 'mail', 'map-pin',
        'building', 'building-2', 'building-3', 'building-4',
        'customer-service', 'paint-brush', 'compass', 'dashboard', 'refresh',
        'links', 'award', 'git-merge', 'star', 'play', 'home',
        'community', 'money-dollar-circle', 'shield-cross', 'graduation-cap', 'roadster',
    ];

    foreach ($usedInBlade as $name) {
        $html = trim(Blade::render('<x-frontend::icon name="' . $name . '"/>'));
        expect($html)->not->toBe('', "Le composant <x-frontend::icon name=\"{$name}\"/> rend du vide alors que la classe est utilisée dans les Blade actifs.");
    }
});
