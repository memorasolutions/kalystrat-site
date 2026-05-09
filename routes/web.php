<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Core\Http\Controllers\PwaController;

// Sitemap dynamique : route déclarée dans Modules/SEO/routes/web.php (évite duplication)

// Passkeys (spatie/laravel-passkeys)
Route::passkeys();

// PWA : manifest dynamique + page hors ligne (module Core)
Route::get('/manifest.webmanifest', [PwaController::class, 'manifest'])->name('pwa.manifest');
Route::get('/offline', [PwaController::class, 'offline'])->name('pwa.offline');

// Language switcher (module Translation — conditionnel)
if (class_exists(\Modules\Translation\Http\Controllers\LocaleController::class)) {
    Route::post('/locale/{locale}', \Modules\Translation\Http\Controllers\LocaleController::class)->name('locale.switch');
}

// CSRF token endpoint for CDN-cached pages
Route::get('/csrf-token', fn () => response()->json(['csrf' => csrf_token()]))->middleware('throttle:60,1')->name('csrf.token');

// Legal pages moved to Modules/Privacy

// T48-S30 : Routes Frontend (/, /a-propos, /filiales/*, /services, /zones-desservies/*, etc.)
// gérées par Modules/Frontend/routes/web.php via FrontendServiceProvider.
// Architecture SEO/AEO/GEO 2026 hub-and-spoke (cf .notes_diverses/architecture_seo.md).
