<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Notifications\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushChannel;
use NotificationChannels\WebPush\WebPushMessage;

class WebPushNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public string $title,
        public string $body,
        public string $url = '/',
        public ?string $icon = null
    ) {}

    public function via($notifiable): array
    {
        return [WebPushChannel::class];
    }

    public function toWebPush($notifiable): WebPushMessage
    {
        return (new WebPushMessage)
            ->title($this->title)
            ->body($this->body)
            ->icon($this->icon ?? '/icons/icon-192x192.png')
            ->action(__('Ouvrir'), 'open')
            ->data(['url' => $this->url]);
    }

    /** @return array<string, mixed> */
    public function toArray(object $notifiable): array
    {
        return ['title' => $this->title, 'body' => $this->body, 'url' => $this->url];
    }
}
