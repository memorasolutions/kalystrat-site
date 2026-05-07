<?php

use Illuminate\Support\Facades\Route;
use Modules\AdminTabler\Http\Controllers\AdminTablerController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('admintablers', AdminTablerController::class)->names('admintabler');
});
