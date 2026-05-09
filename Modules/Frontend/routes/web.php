<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Frontend\Http\Controllers\HomeController;
use Modules\Frontend\Http\Controllers\PageController;
use Modules\Frontend\Http\Controllers\FilialeController;

/*
|--------------------------------------------------------------------------
| Frontend Routes — Architecture SEO/AEO/GEO 2026 hub-and-spoke
|--------------------------------------------------------------------------
| Holding (/) → Filiales (/filiales/{slug}) → Services (/services/*)
| → Zones (/zones-desservies/{ville}) → Secteurs (/secteurs/{slug})
| → Projets, Expertise, Équipe, FAQ, Glossaire, Contact, Carrières
*/

// Home — Holding overview
Route::get('/', [HomeController::class, 'index'])->name('home');

// À propos — Holding détaillé (gouvernance, fondateur, intégration verticale)
Route::get('/a-propos', [PageController::class, 'apropos'])->name('apropos');

// Filiales — Index + 6 pillar pages
Route::get('/filiales', [FilialeController::class, 'index'])->name('filiales.index');
Route::get('/filiales/{slug}', [FilialeController::class, 'show'])
    ->where('slug', 'fondations|structure|toiture-enveloppe|finition-interieure|immobilier|placement-construction')
    ->name('filiale');

// Services — Index global du groupe
Route::get('/services', [PageController::class, 'services'])->name('services');

// Zones desservies — Hub territorial Québec
Route::get('/zones-desservies', [PageController::class, 'zonesIndex'])->name('zones.index');
Route::get('/zones-desservies/{ville}', [PageController::class, 'zonesShow'])
    ->where('ville', 'quebec|levis|sainte-foy|beauport|sillery|trois-rivieres|saguenay|montreal|laval')
    ->name('zones.ville');

// Secteurs — B2B verticaux (résidentiel, commercial, institutionnel, industriel, municipal)
Route::get('/secteurs', [PageController::class, 'secteursIndex'])->name('secteurs.index');
Route::get('/secteurs/{slug}', [PageController::class, 'secteursShow'])
    ->where('slug', 'residentiel|commercial|institutionnel|industriel|municipal')
    ->name('secteurs.show');

// Projets / Réalisations — Études de cas
Route::get('/projets', [PageController::class, 'projets'])->name('projets');

// Expertise — Méthodes, normes, sécurité, qualité, BIM, préfabrication, conformité
Route::get('/expertise', [PageController::class, 'expertise'])->name('expertise');

// Équipe + Conseil consultatif (E-E-A-T)
Route::get('/equipe', [PageController::class, 'equipe'])->name('equipe');
Route::get('/equipe/{slug}', [PageController::class, 'equipeShow'])
    ->where('slug', 'ali-salomon|jacques-jobidon|perry-wong')
    ->name('equipe.membre');

// Carrières — Recrutement Placement Construction
Route::get('/carrieres', [PageController::class, 'carrieres'])->name('carrieres');

// Partenaires — Architectes, designers, promoteurs, courtiers
Route::get('/partenaires', [PageController::class, 'partenaires'])->name('partenaires');

// Contact + soumission
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'contactSubmit'])->name('contact.submit');

// FAQ — Pillar Q/R (FAQPage schema)
Route::get('/faq', [PageController::class, 'faq'])->name('faq');

// Glossaire — Termes construction QC (E-E-A-T)
Route::get('/glossaire', [PageController::class, 'glossaire'])->name('glossaire');

// Blog — Articles experts (V2 — placeholder V1)
Route::get('/blog', [PageController::class, 'blogIndex'])->name('blog.index');

// Pages légales — Privacy, Conditions, Crédits photos, llms.txt
Route::view('/credits', 'frontend::pages.credits')->name('credits');
Route::view('/llms.txt', 'frontend::llms')->name('llms');
