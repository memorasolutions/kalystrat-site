<?php

use Illuminate\Support\Facades\Route;
use Modules\Frontend\Http\Controllers\HomeController;
use Modules\Frontend\Http\Controllers\PageController;
use Modules\Frontend\Http\Controllers\ContactController;
use Modules\Frontend\Http\Controllers\CandidatureController;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/a-propos', [PageController::class, 'aPropos'])->name('apropos');
Route::get('/conseil-consultatif', [PageController::class, 'conseil'])->name('conseil');
Route::get('/partenaires', [PageController::class, 'partenaires'])->name('partenaires');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/realisations', [PageController::class, 'realisations'])->name('realisations');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store')
    ->middleware('throttle:5,1');

Route::get('/carrieres', [CandidatureController::class, 'show'])->name('carrieres');
Route::post('/carrieres', [CandidatureController::class, 'store'])
    ->name('carrieres.store')
    ->middleware('throttle:5,1');

Route::get('/filiales/{slug}', [PageController::class, 'filiale'])
    ->where('slug', 'fondations|structure|toiture|finition|immobilier|placement')
    ->name('filiale');

Route::get('/zones-desservies/{slug}', [PageController::class, 'ville'])
    ->where('slug', 'quebec|levis|sainte-foy|beauport|sillery')
    ->name('ville');

Route::view('/credits', 'frontend::pages.credits', [
    'title' => 'Crédits photographiques | Kalystrat',
    'metaDescription' => "Crédits photographiques et attributions des images libres de droits utilisées sur le site de Kalystrat, groupe québécois de construction.",
    'ogTitle' => 'Crédits photographiques Kalystrat',
    'ogImage' => url('/assets/img/kalystrat/og/credits.jpg'),
])->name('credits');

/* AEO/GEO 2026 – robots.txt, llms.txt, llms-full.txt, sitemap.xml : routes gérées par Modules/SEO/routes/web.php (évite duplication) */
