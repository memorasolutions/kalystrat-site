<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Notifications\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeEncrypted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Modules\Notifications\Notifications\WebPushNotification;

class SendWebPushNotification implements ShouldBeEncrypted, ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public string $title,
        public string $body,
        public string $url = '/',
        public ?string $role = null
    ) {}

    public function handle(): void
    {
        $query = User::whereHas('pushSubscriptions')->with('pushSubscriptions');

        if ($this->role) {
            $query->role($this->role);
        }

        Notification::send(
            $query->get(),
            new WebPushNotification($this->title, $this->body, $this->url)
        );
    }

    public function failed(\Throwable $exception): void
    {
        Log::error(static::class.': '.$exception->getMessage());
    }
}
