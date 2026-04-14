<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Api\Http\Controllers\ArticleApiController;
use Modules\Api\Http\Controllers\AuthController;
use Modules\Api\Http\Controllers\BlogApiController;
use Modules\Api\Http\Controllers\CommentApiController;
use Modules\Api\Http\Controllers\NewsletterApiController;
use Modules\Api\Http\Controllers\NotificationApiController;
use Modules\Api\Http\Controllers\PlanApiController;
use Modules\Api\Http\Controllers\ProfileApiController;
use Modules\Api\Http\Controllers\PushSubscriptionController;
use Modules\Api\Http\Controllers\SearchApiController;
use Modules\Api\Http\Controllers\SettingsApiController;
use Modules\Api\Http\Controllers\StorageApiController;
use Modules\Api\Http\Controllers\UserController;
use Modules\Faq\Http\Controllers\Api\FaqApiController;
use Modules\Media\Http\Controllers\Api\MediaApiController;
use Modules\SaaS\Http\Controllers\UsageApiController;
use Modules\Settings\Models\Setting;
use Modules\Storage\Services\StorageService;
use Modules\Team\Http\Controllers\Api\TeamApiController;
use Modules\Testimonials\Http\Controllers\Api\TestimonialApiController;

// Status
Route::get('/status', fn () => response()->json(array_filter([
    'app' => config('app.name'),
    'version' => 'v1',
    'environment' => app()->isProduction() ? null : app()->environment(),
    'timestamp' => now()->toIso8601String(),
])));

// Auth routes (public, rate-limited)
Route::middleware('throttle:login')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

// Blog public (sans authentification)
Route::get('/articles', [BlogApiController::class, 'index']);
Route::get('/articles/{slug}', [BlogApiController::class, 'show']);
Route::get('/blog/categories', [BlogApiController::class, 'categories']);
Route::get('/blog/search', [BlogApiController::class, 'search']);

// Plans publics
Route::get('/plans', [PlanApiController::class, 'index']);
Route::get('/plans/{plan:slug}', [PlanApiController::class, 'show']);

// FAQ publiques
if (class_exists(FaqApiController::class)) {
    Route::get('/faqs', [FaqApiController::class, 'index']);
    Route::get('/faqs/{faq}', [FaqApiController::class, 'show']);
}

// Témoignages publics
if (class_exists(TestimonialApiController::class)) {
    Route::get('/testimonials', [TestimonialApiController::class, 'index']);
}

// Recherche unifiée
Route::get('/search', [SearchApiController::class, 'search']);

// Settings publics
if (class_exists(Setting::class)) {
    Route::get('/settings', [SettingsApiController::class, 'index']);
    Route::get('/settings/{key}', [SettingsApiController::class, 'show']);
}

// Newsletter (rate limited + honeypot)
Route::middleware(['throttle:newsletter', 'honeypot'])->group(function () {
    Route::post('/newsletter/subscribe', [NewsletterApiController::class, 'subscribe']);
});

// Authenticated routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Profile
    Route::get('/profile', [ProfileApiController::class, 'show']);
    Route::put('/profile', [ProfileApiController::class, 'update']);
    Route::put('/profile/password', [ProfileApiController::class, 'changePassword']);

    // Notifications
    Route::get('/notifications', [NotificationApiController::class, 'index']);
    Route::post('/notifications/read-all', [NotificationApiController::class, 'markAllRead']);
    Route::post('/notifications/{id}/read', [NotificationApiController::class, 'markRead']);
    Route::delete('/notifications/{id}', [NotificationApiController::class, 'destroy']);

    // Comments
    Route::post('/articles/{article:id}/comments', [CommentApiController::class, 'store']);

    // Articles CRUD (authentifié - binding par id car slug est translatable)
    Route::post('/articles', [ArticleApiController::class, 'store']);
    Route::put('/articles/{article:id}', [ArticleApiController::class, 'update']);
    Route::delete('/articles/{article:id}', [ArticleApiController::class, 'destroy']);

    // Push subscriptions
    Route::post('/push-subscriptions', [PushSubscriptionController::class, 'store']);
    Route::delete('/push-subscriptions', [PushSubscriptionController::class, 'destroy']);

    Route::apiResource('users', UserController::class);

    // Storage admin
    if (class_exists(StorageService::class)) {
        Route::middleware('permission:view_storage')->group(function () {
            Route::get('/storage/disks', [StorageApiController::class, 'disks']);
            Route::get('/storage/disks/{disk}/files', [StorageApiController::class, 'files']);
        });
    }

    // Settings admin (manage)
    if (class_exists(Setting::class)) {
        Route::put('/settings/{key}', [SettingsApiController::class, 'update'])->middleware('permission:manage_settings');
    }

    // Media
    if (class_exists(MediaApiController::class)) {
        Route::get('/media', [MediaApiController::class, 'index']);
        Route::get('/media/{id}', [MediaApiController::class, 'show']);
        Route::post('/media', [MediaApiController::class, 'store']);
        Route::delete('/media/{id}', [MediaApiController::class, 'destroy']);
    }

    // Teams
    if (class_exists(TeamApiController::class)) {
        Route::get('/teams', [TeamApiController::class, 'index']);
        Route::post('/teams', [TeamApiController::class, 'store']);
        Route::get('/teams/{team}', [TeamApiController::class, 'show']);
        Route::post('/teams/{team}/invite', [TeamApiController::class, 'invite']);
    }

    // Usage metering (SaaS)
    if (class_exists(UsageApiController::class)) {
        Route::get('/usage/current', [UsageApiController::class, 'current']);
        Route::get('/usage/summary', [UsageApiController::class, 'summary']);
        Route::get('/usage/daily', [UsageApiController::class, 'daily']);
        Route::post('/usage/record', [UsageApiController::class, 'record']);
    }
});
