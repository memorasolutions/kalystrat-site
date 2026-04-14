<?php

declare(strict_types=1);

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

use Illuminate\Support\Facades\Route;
use Modules\Booking\Http\Controllers\Api\PublicBookingController;

// Public widget API (pas d'auth - utilisé par le widget embed)
Route::post('booking', [PublicBookingController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('api.booking.public.store');
