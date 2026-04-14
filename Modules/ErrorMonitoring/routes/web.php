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
use Modules\ErrorMonitoring\Http\Controllers\Admin\ErrorLogAdminController;

Route::prefix('admin/error-monitoring')
    ->name('admin.error-monitoring.')
    ->middleware(['web', 'auth', 'two.factor', EnsureIsAdmin::class, SetBackofficeTheme::class])
    ->group(function () {
        Route::get('/', [ErrorLogAdminController::class, 'index'])->name('index')->middleware('permission:view_system');
        Route::post('/{errorLog}/resolve', [ErrorLogAdminController::class, 'resolve'])->name('resolve')->middleware('permission:manage_system');
        Route::delete('/{errorLog}', [ErrorLogAdminController::class, 'destroy'])->name('destroy')->middleware('permission:manage_system');
    });
