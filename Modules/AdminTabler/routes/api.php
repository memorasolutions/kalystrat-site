<?php

use Illuminate\Support\Facades\Route;
use Modules\AdminTabler\Http\Controllers\AdminTablerController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('admintablers', AdminTablerController::class)->names('admintabler');
});
