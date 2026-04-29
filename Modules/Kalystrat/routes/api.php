<?php

use Illuminate\Support\Facades\Route;
use Modules\Kalystrat\Http\Controllers\KalystratController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('kalystrats', KalystratController::class)->names('kalystrat');
});
