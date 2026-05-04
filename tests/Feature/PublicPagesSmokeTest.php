<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('renvoie HTTP 200 sur toutes les pages publiques', function (string $url) {
    $response = $this->get($url);

    expect($response->status())->toBe(200, "URL {$url} a renvoyé {$response->status()}");
})->with([
    '/',
    '/a-propos',
    '/conseil-consultatif',
    '/partenaires',
    '/services',
    '/realisations',
    '/faq',
    '/contact',
    '/carrieres',
    '/credits',
    '/filiales/fondations',
    '/filiales/structure',
    '/filiales/toiture',
    '/filiales/finition',
    '/filiales/immobilier',
    '/filiales/placement',
    '/politique-confidentialite',
    '/conditions-utilisation',
    '/politique-cookies',
    '/demande-droits',
]);

it('sert sitemap.xml et robots.txt', function () {
    expect($this->get('/sitemap.xml')->status())->toBe(200);
    expect($this->get('/robots.txt')->status())->toBe(200);
});
