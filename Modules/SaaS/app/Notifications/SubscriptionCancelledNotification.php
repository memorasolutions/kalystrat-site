<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\SaaS\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Modules\Core\Notifications\TemplatedNotification;

class SubscriptionCancelledNotification extends TemplatedNotification
{
    public function __construct(private readonly ?string $endsAt) {}

    /** @return list<string> */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    protected function getTemplateSlug(): string
    {
        return 'saas_subscription_cancelled';
    }

    protected function getTemplateData(object $notifiable): array
    {
        return [
            'user' => ['name' => $notifiable->name, 'email' => $notifiable->email],
            'app' => ['name' => config('app.name'), 'url' => config('app.url')],
            'subscription' => ['ends_at' => $this->endsAt ?? ''],
        ];
    }

    protected function getFallbackMail(object $notifiable): MailMessage
    {
        $mail = (new MailMessage)
            ->subject(__('Abonnement annulé'))
            ->line(__('Votre abonnement a été annulé.'));

        if ($this->endsAt) {
            $mail->line(__("Il restera actif jusqu'au :date.", ['date' => $this->endsAt]));
        }

        return $mail->action(__('Réactiver mon abonnement'), url('/user/subscription'));
    }
}
