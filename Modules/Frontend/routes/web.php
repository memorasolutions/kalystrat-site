<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Frontend\Http\Controllers\HomeController;
use Modules\Frontend\Http\Controllers\PageController;
use Modules\Frontend\Http\Controllers\FilialeController;

/*
|--------------------------------------------------------------------------
| Frontend Routes — Architecture SEO/AEO/GEO 2026 anti-cannibalisation
|--------------------------------------------------------------------------
| T193 — Refonte radicale : 15 pages publiques uniques (vs 47 antérieures).
|
| PILLARS (uniques, contenu non-répété) :
|   /                         → Accueil
|   /a-propos                 → Vision + Équipe + Conseil + Partenaires + Carrières (TOC)
|   /filiales                 → Vue d'ensemble (pillar)
|   /filiales/{slug}          → 6 filiales (cluster SEO long-tail légitime, Inc. distincts)
|   /projets                  → Réalisations
|   /zones-desservies         → Pillar territorial Capitale-Nationale
|   /zones-desservies/quebec/{quartier} → 3 quartiers Québec ville (Vieux-Québec, Sillery)
|   /zones-desservies/levis   → Rive sud immédiate
|   /blog                     → Articles
|   /blog/{slug}              → 3 articles
|   /faq                      → FAQ + glossaire fusionnés (ancre #glossaire)
|   /contact                  → Conversion
|
| EXCEPTION RÉPÉTITION : pages régions territoriales (template SEO local
| légitime), couvrant uniquement Capitale-Nationale (siège Québec ville).
| Montréal/Laval/Saguenay supprimés (>200 km du siège = fake SEO local).
*/

// Home — Holding overview
Route::get('/', [HomeController::class, 'index'])->name('home');

// À propos — Pillar unique entreprise (vision + équipe + conseil + partenaires + carrières)
Route::get('/a-propos', [PageController::class, 'apropos'])->name('apropos');

// Filiales — Pillar + 6 clusters (Inc. juridiquement distincts, requêtes SEO long-tail uniques)
Route::get('/filiales', [FilialeController::class, 'index'])->name('filiales.index');
Route::get('/filiales/{slug}', [FilialeController::class, 'show'])
    ->where('slug', 'fondations|structure|toiture-enveloppe|finition-interieure|immobilier|placement-construction')
    ->name('filiale');

// Zones desservies — Capitale-Nationale uniquement (siège Québec ville)
Route::get('/zones-desservies', [PageController::class, 'zonesIndex'])->name('zones.index');
Route::get('/zones-desservies/{ville}', [PageController::class, 'zonesShow'])
    ->where('ville', 'quebec|levis|sainte-foy|beauport|sillery')
    ->name('zones.ville');

// T138c — Quartiers premium Québec ville (cluster topical authority légitime)
Route::view('/zones-desservies/quebec/vieux-quebec', 'frontend::pages.quartiers.vieux-quebec')->name('quartier.vieux-quebec');

// Projets / Réalisations
Route::get('/projets', [PageController::class, 'projets'])->name('projets');

// Contact + soumission
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'contactSubmit'])->name('contact.submit');

// FAQ — Pillar Q/R + glossaire fusionné (#glossaire ancre)
Route::get('/faq', [PageController::class, 'faq'])->name('faq');

// Blog — Articles experts
Route::get('/blog', [PageController::class, 'blogIndex'])->name('blog.index');
Route::get('/blog/{slug}', [PageController::class, 'blogShow'])
    ->where('slug', 'pourquoi-construire-multi-logements-quebec-2026|code-construction-quebec-2026-changements|comment-choisir-entrepreneur-construction-qc-2026')
    ->name('blog.show');

// llms.txt (LLM crawler discovery)
Route::view('/llms.txt', 'frontend::llms')->name('llms');

/*
|--------------------------------------------------------------------------
| REDIRECTIONS 301 SEO-safe (préservation équité SEO existante)
|--------------------------------------------------------------------------
| T193 — Routes anciennes 47 pages → architecture 15 pages cible.
| Google passe 100% de l'équité avec redirect 301 propre.
*/

// "Ce qu'on fait" → /filiales (pillar unique). Noms préservés pour route()
Route::redirect('/services', '/filiales', 301)->name('services');
Route::redirect('/expertise', '/filiales', 301)->name('expertise');
Route::redirect('/secteurs', '/filiales', 301)->name('secteurs.index');
Route::redirect('/secteurs/residentiel', '/filiales', 301);
Route::redirect('/secteurs/commercial', '/filiales', 301);
Route::redirect('/secteurs/institutionnel', '/filiales', 301);
Route::redirect('/secteurs/industriel', '/filiales', 301);
Route::redirect('/secteurs/municipal', '/filiales', 301);

// "Qui on est" → /a-propos (pillar unique avec ancres). Noms préservés.
Route::redirect('/equipe', '/a-propos#equipe', 301)->name('equipe');
Route::get('/equipe/{slug}', function (string $slug) {
    return redirect('/a-propos#' . $slug, 301);
})->where('slug', '[a-z0-9-]+')->name('equipe.membre');
Route::redirect('/partenaires', '/a-propos#partenaires', 301)->name('partenaires');
Route::redirect('/carrieres', '/a-propos#carrieres', 301)->name('carrieres');

// Knowledge → /faq (fusion glossaire)
Route::redirect('/glossaire', '/faq#glossaire', 301)->name('glossaire');

// Zones trop loin du siège Québec (Kalystrat = Capitale-Nationale uniquement)
Route::redirect('/zones-desservies/montreal', '/zones-desservies', 301);
Route::redirect('/zones-desservies/montreal/plateau-mont-royal', '/zones-desservies', 301)->name('quartier.plateau-mont-royal');
Route::redirect('/zones-desservies/montreal/westmount', '/zones-desservies', 301)->name('quartier.westmount');
Route::redirect('/zones-desservies/laval', '/zones-desservies', 301);
Route::redirect('/zones-desservies/saguenay', '/zones-desservies', 301);
Route::redirect('/zones-desservies/trois-rivieres', '/zones-desservies', 301);

// Pages orphelines supprimées (jamais liées dans nav)
Route::redirect('/testimonials', '/#temoignages', 301)->name('testimonials');
Route::redirect('/roadmap', '/', 301)->name('roadmap');
Route::redirect('/credits', '/', 301)->name('credits');
