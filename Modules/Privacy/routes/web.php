<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Core\Http\Middleware\EnsureIsAdmin;
use Modules\Core\Http\Middleware\SetBackofficeTheme;
use Modules\Privacy\Http\Controllers\Admin\RightsRequestAdminController;
use Modules\Privacy\Http\Controllers\CookieConsentController;
use Modules\Privacy\Http\Controllers\LegalController;
use Modules\Privacy\Http\Controllers\UserConsentController;

// Legal pages (public, no auth required)
Route::controller(LegalController::class)->group(function () {
    Route::get('/privacy-policy', 'privacyPolicy')->name('legal.privacy');
    Route::get('/terms-of-use', 'termsOfUse')->name('legal.terms');
    Route::get('/cookie-policy', 'cookiePolicy')->name('legal.cookies');
    Route::get('/rights-request', 'rightsRequest')->name('legal.rights');
    Route::post('/rights-request', 'rightsRequestStore')->name('legal.rights.store');
});

// Cookie consent management (GDPR / Loi 25 / CCPA)
Route::prefix('cookie-consent')->controller(CookieConsentController::class)->group(function () {
    Route::post('/accept', 'accept')->name('cookie-consent.accept');
    Route::post('/decline', 'decline')->name('cookie-consent.decline');
    Route::post('/customize', 'customize')->name('cookie-consent.customize');
    Route::post('/reset', 'reset')->name('cookie-consent.reset');
});
Route::get('/cookie-preferences', [CookieConsentController::class, 'preferences'])->name('cookie-consent.preferences');

// User consent dashboard (authenticated users)
Route::prefix('account/privacy')
    ->name('user.privacy.')
    ->middleware(['web', 'auth'])
    ->controller(UserConsentController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::put('/consent', 'update')->name('update');
        Route::get('/export', 'export')->name('export');
    });

// Admin — rights requests management
Route::prefix('admin/privacy')
    ->name('admin.privacy.')
    ->middleware(['web', 'auth', 'two.factor', EnsureIsAdmin::class, SetBackofficeTheme::class])
    ->group(function () {
        Route::get('/rights-requests', [RightsRequestAdminController::class, 'index'])->name('rights-requests.index')->middleware('permission:view_privacy');
        Route::get('/rights-requests/{rightsRequest}', [RightsRequestAdminController::class, 'show'])->name('rights-requests.show')->middleware('permission:view_privacy');
        Route::put('/rights-requests/{rightsRequest}/status', [RightsRequestAdminController::class, 'updateStatus'])->name('rights-requests.update-status')->middleware('permission:manage_privacy');
    });
