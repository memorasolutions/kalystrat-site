<?php

use Illuminate\Support\Facades\Route;
use Modules\Frontend\Http\Controllers\FrontendController;

// Frontend public routes — no auth required
Route::get('/', [FrontendController::class, 'home'])->name('frontend.home');
Route::get('/a-propos', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('/services', [FrontendController::class, 'services'])->name('frontend.services');
Route::get('/portfolio', [FrontendController::class, 'portfolio'])->name('frontend.portfolio');
Route::get('/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::post('/contact', [FrontendController::class, 'contactSubmit'])->name('frontend.contact.submit')->middleware('throttle:5,1');

// V2 — preview Construz officiel home-5 (routes additives, désactivables en commentant)
Route::get('/v2', [FrontendController::class, 'homeV2'])->name('frontend.home.v2');
Route::get('/v2/a-propos', [FrontendController::class, 'aboutV2'])->name('frontend.about.v2');
Route::get('/v2/services', [FrontendController::class, 'servicesV2'])->name('frontend.services.v2');
Route::get('/v2/portfolio', [FrontendController::class, 'portfolioV2'])->name('frontend.portfolio.v2');
Route::get('/v2/contact', [FrontendController::class, 'contactV2'])->name('frontend.contact.v2');
Route::get('/v2/filiales/{slug}', [FrontendController::class, 'filialeV2'])->where('slug', '[a-z-]+')->name('frontend.filiale.v2');

// D1 MVP additif - pages filiales holding (désactivable en commentant la ligne suivante)
Route::get('/filiales/{slug}', [FrontendController::class, 'filiale'])
    ->where('slug', '[a-z-]+')
    ->name('frontend.filiale');
