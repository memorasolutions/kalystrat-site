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

// D1 MVP additif - pages filiales holding (désactivable en commentant la ligne suivante)
Route::get('/filiales/{slug}', [FrontendController::class, 'filiale'])
    ->where('slug', '[a-z-]+')
    ->name('frontend.filiale');
