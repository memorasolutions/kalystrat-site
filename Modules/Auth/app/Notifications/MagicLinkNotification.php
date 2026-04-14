<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Auth\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Modules\Core\Notifications\TemplatedNotification;

class MagicLinkNotification extends TemplatedNotification
{
    public function __construct(private readonly string $token) {}

    /** @return array<int, string> */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    protected function getTemplateSlug(): string
    {
        return 'magic_link';
    }

    protected function getTemplateData(object $notifiable): array
    {
        return [
            'user' => ['name' => $notifiable->name, 'email' => $notifiable->email],
            'app' => ['name' => config('app.name'), 'url' => config('app.url')],
            'token' => $this->token,
            'expire_minutes' => '15',
        ];
    }

    protected function getFallbackMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject(__('Votre code de connexion'))
            ->greeting(__('Bonjour !'))
            ->line(__('Votre code de connexion est :'))
            ->line('**'.$this->token.'**')
            ->line(__('Ce code expire dans 15 minutes.'))
            ->line(__("Si vous n'avez pas demandé ce code, ignorez cet email."))
            ->salutation(__("L'équipe"));
    }
}
