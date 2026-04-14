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

class OrderDeliveredNotification extends TemplatedNotification
{
    public function __construct(public Order $order) {}

    protected function getTemplateSlug(): string
    {
        return 'ecommerce_order_delivered';
    }

    protected function getTemplateData(object $notifiable): array
    {
        return [
            'user' => ['name' => $notifiable->name, 'email' => $notifiable->email],
            'app' => ['name' => config('app.name'), 'url' => config('app.url')],
            'order' => [
                'number' => $this->order->order_number,
                'url' => config('app.url').'/account/orders/'.$this->order->id,
            ],
        ];
    }

    protected function getFallbackMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject(__('Commande livrée #:number', ['number' => $this->order->order_number]))
            ->greeting(__('Bonjour :name,', ['name' => $notifiable->name]))
            ->line(__('Votre commande #:number a été livrée avec succès.', ['number' => $this->order->order_number]))
            ->line(__('Nous espérons que vous êtes satisfait(e) de votre achat.'))
            ->action(__('Voir ma commande'), config('app.url').'/account/orders/'.$this->order->id)
            ->line(__('Merci pour votre confiance !'));
    }

    /** @return array<string, mixed> */
    public function toArray(object $notifiable): array
    {
        return [
            'order_id' => $this->order->id,
            'order_number' => $this->order->order_number,
        ];
    }
}
