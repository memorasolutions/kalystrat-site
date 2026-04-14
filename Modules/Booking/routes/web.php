<?php

declare(strict_types=1);

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;
use Modules\Booking\Http\Controllers\Admin\AnalyticsController;
use Modules\Booking\Http\Controllers\Admin\AppointmentController;
use Modules\Booking\Http\Controllers\Admin\BookingWebhookController;
use Modules\Booking\Http\Controllers\Admin\CalendarController;
use Modules\Booking\Http\Controllers\Admin\CouponController;
use Modules\Booking\Http\Controllers\Admin\CustomerController;
use Modules\Booking\Http\Controllers\Admin\DashboardController;
use Modules\Booking\Http\Controllers\Admin\DateOverrideController;
use Modules\Booking\Http\Controllers\Admin\GiftCardController;
use Modules\Booking\Http\Controllers\Admin\IntakeQuestionController;
use Modules\Booking\Http\Controllers\Admin\PackageController;
use Modules\Booking\Http\Controllers\Admin\ServiceController;
use Modules\Booking\Http\Controllers\Admin\SettingsController;
use Modules\Booking\Http\Controllers\BookingWizardController;
use Modules\Booking\Http\Controllers\CustomerPortalController;
use Modules\Booking\Http\Controllers\SmsInboundController;
use Modules\Booking\Http\Controllers\StripeWebhookController;
use Modules\Booking\Http\Controllers\WidgetController;
use Modules\Booking\Http\Middleware\VerifySmsWebhookSignature;

// Admin routes
Route::middleware(['web', 'auth', 'permission:manage_booking'])
    ->prefix('admin/booking')
    ->name('admin.booking.')
    ->group(function () {
        Route::resource('services', ServiceController::class);
        Route::resource('appointments', AppointmentController::class);
        Route::put('appointments/{appointment}/assign', [AppointmentController::class, 'assign'])->name('appointments.assign');
        Route::get('settings', [SettingsController::class, 'edit'])->name('settings.edit');
        Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
        Route::resource('date-overrides', DateOverrideController::class)->except(['show']);
        Route::resource('coupons', CouponController::class)->except(['show']);
        Route::resource('packages', PackageController::class)->except(['show']);
        Route::resource('gift-cards', GiftCardController::class)->except(['show']);
        Route::get('analytics', [AnalyticsController::class, 'index'])->name('analytics');
        Route::get('analytics/export', [AnalyticsController::class, 'exportCsv'])->name('analytics.export');
        Route::get('services/{service}/intake-questions', [IntakeQuestionController::class, 'index'])->name('intake-questions.index');
        Route::get('services/{service}/intake-questions/create', [IntakeQuestionController::class, 'create'])->name('intake-questions.create');
        Route::post('services/{service}/intake-questions', [IntakeQuestionController::class, 'store'])->name('intake-questions.store');
        Route::get('intake-questions/{intakeQuestion}/edit', [IntakeQuestionController::class, 'edit'])->name('intake-questions.edit');
        Route::put('intake-questions/{intakeQuestion}', [IntakeQuestionController::class, 'update'])->name('intake-questions.update');
        Route::delete('intake-questions/{intakeQuestion}', [IntakeQuestionController::class, 'destroy'])->name('intake-questions.destroy');
        Route::resource('webhooks', BookingWebhookController::class)->except(['show']);
        Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
        Route::get('customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');
        Route::put('appointments/{appointment}/approve', [AppointmentController::class, 'approve'])->name('appointments.approve');
        Route::put('appointments/{appointment}/reject', [AppointmentController::class, 'reject'])->name('appointments.reject');
        Route::get('calendar', [CalendarController::class, 'index'])->name('calendar.index');
        Route::get('calendar/events', [CalendarController::class, 'events'])->name('calendar.events');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });

// Webhook Stripe (pas de middleware auth/CSRF - Stripe envoie sans session)
Route::post('webhook/stripe/booking', [StripeWebhookController::class, 'handle'])
    ->name('booking.stripe.webhook')
    ->withoutMiddleware([VerifyCsrfToken::class]);

// Webhook SMS (signature vérifiée par middleware dédié, CSRF exempté)
Route::post('webhook/sms/booking', [SmsInboundController::class, 'handle'])
    ->name('booking.sms.inbound')
    ->withoutMiddleware([VerifyCsrfToken::class])
    ->middleware(VerifySmsWebhookSignature::class);

// Widget embeddable (iframe, CORS ouvert)
Route::get('widget', [WidgetController::class, 'show'])
    ->name('booking.widget');

// Public routes
Route::middleware(['web'])
    ->prefix('rendez-vous')
    ->name('booking.')
    ->group(function () {
        Route::get('/', [BookingWizardController::class, 'index'])->name('wizard');
        Route::get('/manage/{cancel_token}', [BookingWizardController::class, 'manage'])->name('manage');
        Route::post('/cancel/{cancel_token}', [BookingWizardController::class, 'cancel'])->name('cancel');
        Route::get('/reschedule/{cancel_token}', [BookingWizardController::class, 'reschedule'])->name('reschedule');
        Route::post('/reschedule/{cancel_token}', [BookingWizardController::class, 'processReschedule'])->name('processReschedule');
    });

// Portail client (accès par token, pas d'auth)
Route::middleware(['web'])
    ->prefix('mon-portail')
    ->name('booking.portal.')
    ->group(function () {
        Route::get('/{token}', [CustomerPortalController::class, 'index'])->name('index');
        Route::post('/{token}/cancel/{appointment}', [CustomerPortalController::class, 'cancel'])->name('cancel');
        Route::get('/{token}/ical', [CustomerPortalController::class, 'ical'])->name('ical');
    });
