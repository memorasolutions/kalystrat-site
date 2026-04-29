<?php

use Illuminate\Support\Facades\Route;
use Modules\Kalystrat\Http\Controllers\KalystratController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('kalystrats', KalystratController::class)->names('kalystrat');
});
