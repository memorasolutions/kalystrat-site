<?php

declare(strict_types=1);

/**
 * P22-S13 [I] Smoke tests validant les routes Kalystrat actives
 * et les invariants frontend essentiels (SEO, accessibilité, données structurées).
 *
 * Désactivable : déplacer ce fichier hors du dossier tests/.
 */

use function Pest\Laravel\get;

test('pages publiques principales retournent HTTP 200', function (): void {
    $routes = [
        'index',
        'kalystrat.apropos',
        'service',
        'project',
        'contact',
        'kalystrat.faq',
        'kalystrat.carrieres',
    ];

    foreach ($routes as $routeName) {
        get(route($routeName))->assertStatus(200);
    }
});

test('6 filiales pages retournent HTTP 200', function (): void {
    $slugs = ['fondations', 'structure', 'toiture', 'finition', 'immobilier', 'placement'];

    foreach ($slugs as $slug) {
        get(route('kalystrat.filiale', $slug))->assertStatus(200);
    }
});

test('home page contient Schema.org JSON-LD Organization', function (): void {
    get('/')
        ->assertSee('application/ld+json', false)
        ->assertSee('Gestion Kalystrat Inc.', false);
});

test('home page contient skip-link WCAG 2.4.1', function (): void {
    get('/')
        ->assertSee('skip-link')
        ->assertSee('Aller au contenu principal');
});

test('pages contiennent meta SEO complets (P22-S20e)', function (): void {
    get('/')
        ->assertSee('og:title', false)
        ->assertSee('twitter:card', false)
        ->assertSee('canonical', false)
        ->assertSee('geo.region', false);
});

test('page carrieres contient JobPosting JSON-LD (P22-S20d)', function (): void {
    get('/carrieres')
        ->assertSee('JobPosting', false)
        ->assertSee('Kalystrat Placement Construction', false);
});
