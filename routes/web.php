<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Core\Http\Controllers\PwaController;
use Modules\SEO\Http\Controllers\SitemapController;
use Modules\Translation\Http\Controllers\LocaleController;

// Sitemap dynamique
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Pas de frontend - redirection vers login
Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

// Passkeys (spatie/laravel-passkeys)
Route::passkeys();

// PWA : manifest dynamique + page hors ligne (module Core)
Route::get('/manifest.webmanifest', [PwaController::class, 'manifest'])->name('pwa.manifest');
Route::get('/offline', [PwaController::class, 'offline'])->name('pwa.offline');

// Language switcher (module Translation)
Route::post('/locale/{locale}', LocaleController::class)->name('locale.switch');

// CSRF token endpoint for CDN-cached pages
Route::get('/csrf-token', fn () => response()->json(['csrf' => csrf_token()]))->middleware('throttle:60,1')->name('csrf.token');

// Legal pages moved to Modules/Privacy
