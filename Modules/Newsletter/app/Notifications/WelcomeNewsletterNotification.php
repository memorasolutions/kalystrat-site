<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Newsletter\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Modules\Core\Notifications\TemplatedNotification;
use Modules\Newsletter\Models\Subscriber;

class WelcomeNewsletterNotification extends TemplatedNotification
{
    public function __construct(private readonly Subscriber $subscriber) {}

    /** @return array<int, string> */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    protected function getTemplateSlug(): string
    {
        return 'newsletter_welcome';
    }

    protected function getTemplateData(object $notifiable): array
    {
        return [
            'user' => ['name' => $this->subscriber->name ?? '', 'email' => $notifiable->email ?? ''],
            'app' => ['name' => config('app.name'), 'url' => config('app.url')],
            'subscriber' => [
                'token' => $this->subscriber->token,
                'name' => $this->subscriber->name ?? '',
            ],
        ];
    }

    protected function getFallbackMail(object $notifiable): MailMessage
    {
        $confirmUrl = route('newsletter.confirm', $this->subscriber->token);
        $unsubUrl = route('newsletter.unsubscribe', $this->subscriber->token);

        return (new MailMessage)
            ->subject(__('Confirmez votre abonnement à la newsletter'))
            ->greeting(__('Bonjour :name !', ['name' => $this->subscriber->name ?? '']))
            ->line(__('Merci pour votre abonnement à notre newsletter.'))
            ->action(__('Confirmer mon abonnement'), $confirmUrl)
            ->line(__('Si vous ne souhaitez plus recevoir nos emails, [cliquez ici](:url).', ['url' => $unsubUrl]))
            ->salutation(__('À bientôt !'));
    }
}
