<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

dataset('routes_publiques', [
    ['/'],
    ['/a-propos'],
    ['/filiales'],
    ['/filiales/fondations'],
    ['/filiales/structure'],
    ['/filiales/toiture-enveloppe'],
    ['/filiales/finition-interieure'],
    ['/filiales/immobilier'],
    ['/filiales/placement-construction'],
    ['/services'],
    ['/contact'],
    ['/faq'],
    ['/glossaire'],
    ['/blog'],
    ['/carrieres'],
    ['/partenaires'],
    ['/expertise'],
    ['/equipe'],
    ['/equipe/ali-salomon'],
    ['/equipe/jacques-jobidon'],
    ['/equipe/perry-wong'],
    ['/projets'],
    ['/zones-desservies'],
    ['/zones-desservies/quebec'],
    ['/zones-desservies/levis'],
    ['/zones-desservies/sainte-foy'],
    ['/zones-desservies/beauport'],
    ['/zones-desservies/sillery'],
    ['/zones-desservies/trois-rivieres'],
    ['/zones-desservies/saguenay'],
    ['/zones-desservies/montreal'],
    ['/zones-desservies/laval'],
    ['/secteurs'],
    ['/secteurs/residentiel'],
    ['/secteurs/commercial'],
    ['/secteurs/institutionnel'],
    ['/secteurs/industriel'],
    ['/secteurs/municipal'],
    ['/blog/pourquoi-construire-multi-logements-quebec-2026'],
    ['/blog/code-construction-quebec-2026-changements'],
    ['/blog/comment-choisir-entrepreneur-construction-qc-2026'],
]);

it('chaque route publique répond HTTP 200', function (string $url) {
    $response = $this->get($url);
    expect($response->status())->toBe(200, "Route {$url} doit répondre 200, a répondu {$response->status()}");
})->with('routes_publiques');

it('chaque page publique contient au moins le schema Organization', function (string $url) {
    $response = $this->get($url);
    $html = $response->getContent();
    expect($html)->toContain('application/ld+json');
    expect($html)->toContain('"@type":"Organization"');
})->with('routes_publiques');

it('sitemap.xml liste au moins 35 URLs', function () {
    $response = $this->get('/sitemap.xml');
    expect($response->status())->toBe(200);
    $count = substr_count($response->getContent(), '<loc>');
    expect($count)->toBeGreaterThanOrEqual(35);
});

it('llms.txt répond avec contenu construction Kalystrat', function () {
    $response = $this->get('/llms.txt');
    expect($response->status())->toBe(200);
    expect($response->getContent())->toContain('Kalystrat');
    expect($response->getContent())->toContain('filiales');
});

it('robots.txt répond 200', function () {
    $response = $this->get('/robots.txt');
    expect($response->status())->toBe(200);
});

it('404 pour slug filiale inexistant', function () {
    $response = $this->get('/filiales/inexistante');
    expect($response->status())->toBe(404);
});

it('404 pour ville inexistante', function () {
    $response = $this->get('/zones-desservies/inexistante');
    expect($response->status())->toBe(404);
});
