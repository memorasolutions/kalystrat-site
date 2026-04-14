<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Notifications\Providers;

use Modules\Core\Providers\BaseModuleServiceProvider;
use Modules\Notifications\Console\GenerateVapidKeysCommand;
use Modules\Notifications\Console\SendNotificationDigest;
use Modules\Notifications\Contracts\SmsDriverInterface;
use Modules\Notifications\Drivers\NullSmsDriver;
use Modules\Notifications\Drivers\VoipMsService;
use Modules\Notifications\Services\EmailTemplateService;
use Modules\Notifications\Services\NotificationService;
use Modules\Settings\Facades\Settings;

class NotificationsServiceProvider extends BaseModuleServiceProvider
{
    protected string $name = 'Notifications';

    protected string $nameLower = 'notifications';

    /**
     * Boot the application events.
     */
    public function boot(): void
    {
        $this->registerCommands();
        $this->registerCommandSchedules();
        $this->bootModule();
    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->app->register(EventServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);

        $this->app->singleton(NotificationService::class);
        $this->app->singleton(EmailTemplateService::class);

        $this->app->bind(
            SmsDriverInterface::class,
            function () {
                $smsEnabled = Settings::get('sms_enabled', false);
                if ($smsEnabled) {
                    return new VoipMsService(
                        (string) Settings::get('voipms_api_username', ''),
                        (string) Settings::get('voipms_api_password', ''),
                        (string) Settings::get('voipms_did_number', ''),
                    );
                }

                return new NullSmsDriver;
            },
        );
    }

    /**
     * Register commands in the format of Command::class
     */
    protected function registerCommands(): void
    {
        $this->commands([
            GenerateVapidKeysCommand::class,
            SendNotificationDigest::class,
        ]);
    }

    /**
     * Register command Schedules.
     */
    protected function registerCommandSchedules(): void
    {
        // Scheduling in routes/console.php (Laravel standard)
    }
}
