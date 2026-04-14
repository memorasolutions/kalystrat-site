<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Modules\Core\Notifications\TemplatedNotification;
use Modules\Ecommerce\Models\Order;

class OrderShippedNotification extends TemplatedNotification
{
    public function __construct(public Order $order) {}

    protected function getTemplateSlug(): string
    {
        return 'ecommerce_order_shipped';
    }

    protected function getTemplateData(object $notifiable): array
    {
        return [
            'user' => ['name' => $notifiable->name, 'email' => $notifiable->email],
            'app' => ['name' => config('app.name'), 'url' => config('app.url')],
            'order' => [
                'number' => $this->order->order_number,
                'tracking' => $this->order->tracking_number ?? '',
                'url' => config('app.url').'/account/orders/'.$this->order->id,
            ],
        ];
    }

    protected function getFallbackMail(object $notifiable): MailMessage
    {
        $mail = (new MailMessage)
            ->subject(__('Votre commande a été expédiée'))
            ->greeting(__('Bonjour :name,', ['name' => $notifiable->name]))
            ->line(__('Bonne nouvelle! Votre commande #:number a été expédiée.', ['number' => $this->order->order_number]));

        if ($this->order->tracking_number) {
            $mail->line(__('Numéro de suivi : :tracking', ['tracking' => $this->order->tracking_number]));
        }

        return $mail
            ->action(__('Suivre ma commande'), config('app.url').'/account/orders/'.$this->order->id)
            ->line(__('Merci de votre confiance.'));
    }

    /** @return array<string, mixed> */
    public function toArray(object $notifiable): array
    {
        return [
            'order_id' => $this->order->id,
            'order_number' => $this->order->order_number,
            'tracking_number' => $this->order->tracking_number,
        ];
    }
}
