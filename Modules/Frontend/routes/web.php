<?php

use Illuminate\Support\Facades\Route;
use Modules\Frontend\Http\Controllers\FrontendController;

// Frontend public routes — no auth required
Route::get('/', [FrontendController::class, 'home'])->name('frontend.home');
Route::get('/a-propos', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('/services', [FrontendController::class, 'services'])->name('frontend.services');
Route::get('/portfolio', [FrontendController::class, 'portfolio'])->name('frontend.portfolio');
Route::get('/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
