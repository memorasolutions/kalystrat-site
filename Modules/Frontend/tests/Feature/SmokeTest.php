<?php

declare(strict_types=1);

use function Pest\Laravel\get;

test('routes V2 publiques retournent HTTP 200', function () {
    $routes = ['frontend.home', 'frontend.about', 'frontend.services', 'frontend.portfolio', 'frontend.contact', 'frontend.faq'];
    foreach ($routes as $name) {
        get(route($name))->assertStatus(200);
    }
});

test('6 filiales pages retournent HTTP 200', function () {
    foreach (['fondations', 'structure', 'toiture', 'finition', 'immobilier', 'placement'] as $slug) {
        get(route('frontend.filiale', $slug))->assertStatus(200);
    }
});

test('home page contient Schema.org JSON-LD', function () {
    get('/')->assertSee('application/ld+json', false)->assertSee('Kalystrat', false);
});

test('home page contient skip-link WCAG 2.4.1', function () {
    get('/')->assertSee('skip-link', false)->assertSee('Aller au contenu principal', false);
});

test('home page contient 6 tabs why-area-3', function () {
    get('/')->assertSeeText('Kalystrat Fondations')->assertSeeText('Kalystrat Placement Construction');
});
