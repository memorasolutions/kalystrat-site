<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Auth\Providers;

use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Auth\Listeners\InvalidateSessionsOnPasswordReset;
use Modules\Auth\Listeners\LogFailedLogin;
use Modules\Auth\Listeners\LogLoginAttempt;
use SocialiteProviders\Apple\AppleExtendSocialite;
use SocialiteProviders\LinkedIn\LinkedInExtendSocialite;
use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\Microsoft\MicrosoftExtendSocialite;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array<string, array<int, string>>
     */
    protected $listen = [
        Login::class => [
            LogLoginAttempt::class,
        ],
        Failed::class => [
            LogFailedLogin::class,
        ],
        PasswordReset::class => [
            InvalidateSessionsOnPasswordReset::class,
        ],
        SocialiteWasCalled::class => [
            MicrosoftExtendSocialite::class,
            AppleExtendSocialite::class,
            LinkedInExtendSocialite::class,
        ],
    ];

    /**
     * Indicates if events should be discovered.
     *
     * @var bool
     */
    protected static $shouldDiscoverEvents = true;

    /**
     * Configure the proper event listeners for email verification.
     */
    protected function configureEmailVerification(): void {}
}
