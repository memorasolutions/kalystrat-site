<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

// T193 — Architecture simplifiée 15 pages publiques (vs 47 antérieures).
// Pages éliminées via 301 : /services, /expertise, /secteurs, /equipe, /partenaires,
// /carrieres, /glossaire, /zones-desservies/montreal,laval,saguenay,trois-rivieres.
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
    ['/contact'],
    ['/faq'],
    ['/blog'],
    ['/projets'],
    ['/zones-desservies'],
    ['/zones-desservies/quebec'],
    ['/zones-desservies/levis'],
    ['/zones-desservies/sainte-foy'],
    ['/zones-desservies/beauport'],
    ['/zones-desservies/sillery'],
    ['/blog/pourquoi-construire-multi-logements-quebec-2026'],
    ['/blog/code-construction-quebec-2026-changements'],
    ['/blog/comment-choisir-entrepreneur-construction-qc-2026'],
]);

// T193 — Routes éliminées doivent répondre 301 (préservation SEO).
dataset('routes_redirect_301', [
    ['/services', '/filiales'],
    ['/expertise', '/filiales'],
    ['/secteurs', '/filiales'],
    ['/secteurs/residentiel', '/filiales'],
    ['/secteurs/commercial', '/filiales'],
    ['/equipe', '/a-propos#equipe'],
    ['/equipe/ali-salomon', '/a-propos#ali-salomon'],
    ['/partenaires', '/a-propos#partenaires'],
    ['/carrieres', '/a-propos#carrieres'],
    ['/glossaire', '/faq#glossaire'],
    ['/zones-desservies/montreal', '/zones-desservies'],
    ['/zones-desservies/laval', '/zones-desservies'],
    ['/zones-desservies/saguenay', '/zones-desservies'],
    ['/credits', '/'],
    // /testimonials et /roadmap routes interceptées par Modules\Testimonials et Modules\Roadmap
    // Suppression effective = désactivation modules dans modules_statuses.json (T-suivante)
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

it('sitemap.xml liste au moins 18 URLs (architecture simplifiée T193)', function () {
    $response = $this->get('/sitemap.xml');
    expect($response->status())->toBe(200);
    $count = substr_count($response->getContent(), '<loc>');
    expect($count)->toBeGreaterThanOrEqual(18);
});

it('chaque ancienne URL répond 301 vers la cible attendue', function (string $from, string $to) {
    $response = $this->get($from);
    expect($response->status())->toBe(301, "Route {$from} doit répondre 301, a répondu {$response->status()}");
    expect($response->headers->get('Location'))->toContain($to);
})->with('routes_redirect_301');

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
