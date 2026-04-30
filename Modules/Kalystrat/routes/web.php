<?php

use Illuminate\Support\Facades\Route;
use Modules\Kalystrat\Http\Controllers\KalystratController;

Route::get('/a-propos', [KalystratController::class, 'aPropos'])->name('kalystrat.apropos');
Route::get('/faq', [KalystratController::class, 'faq'])->name('kalystrat.faq');
Route::get('/carrieres', [KalystratController::class, 'carrieres'])->name('kalystrat.carrieres');
Route::get('/filiales/{slug}', [KalystratController::class, 'filiale'])
    ->where('slug', 'fondations|structure|toiture|finition|immobilier|placement')
    ->name('kalystrat.filiale');
