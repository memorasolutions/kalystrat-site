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

// T46-S30 : Site en attente de nouveau frontend (Frontend module supprimé sur demande user).
// Route placeholder minimale, sans pollution visuelle. Désactiver dès installation nouveau thème.
Route::get('/', fn () => response(<<<'HTML'
<!doctype html>
<html lang="fr-CA"><head><meta charset="utf-8"><title>Kalystrat — site en préparation</title>
<meta name="robots" content="noindex,nofollow">
<style>html,body{height:100%;margin:0;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;background:#0A1628;color:#B8A472;display:flex;align-items:center;justify-content:center;text-align:center}</style>
</head><body><div><h1 style="font-weight:300;letter-spacing:2px">KALYSTRAT</h1><p style="opacity:.6;font-size:14px">site en préparation</p></div></body></html>
HTML, 200, ['Content-Type' => 'text/html; charset=utf-8']))->name('home.placeholder');
