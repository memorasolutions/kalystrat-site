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

class PaymentSucceededNotification extends TemplatedNotification
{
    public function __construct(
        private readonly string $invoiceId,
        private readonly int $amountCents = 0,
    ) {}

    /** @return list<string> */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    protected function getTemplateSlug(): string
    {
        return 'saas_payment_succeeded';
    }

    protected function getTemplateData(object $notifiable): array
    {
        return [
            'user' => ['name' => $notifiable->name, 'email' => $notifiable->email],
            'app' => ['name' => config('app.name'), 'url' => config('app.url')],
            'invoice' => ['id' => $this->invoiceId],
            'amount' => $this->amountCents > 0 ? number_format($this->amountCents / 100, 2).' $' : '',
        ];
    }

    protected function getFallbackMail(object $notifiable): MailMessage
    {
        $amount = $this->amountCents > 0 ? number_format($this->amountCents / 100, 2).' $' : '';

        $mail = (new MailMessage)
            ->subject(__('Paiement confirmé'))
            ->line(__('Votre paiement a été traité avec succès.'));

        if ($amount) {
            $mail->line(__('Montant : :amount (facture #:invoice).', ['amount' => $amount, 'invoice' => $this->invoiceId]));
        } else {
            $mail->line(__('Facture : #:invoice.', ['invoice' => $this->invoiceId]));
        }

        return $mail
            ->line(__('Merci pour votre confiance.'))
            ->action(__('Voir mon abonnement'), url('/user/subscription'));
    }
}
