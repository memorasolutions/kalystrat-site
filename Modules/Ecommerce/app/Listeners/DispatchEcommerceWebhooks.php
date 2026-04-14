<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Listeners;

use Modules\Ecommerce\Events\LowStockDetected;
use Modules\Ecommerce\Events\OrderCreated;
use Modules\Ecommerce\Events\OrderPaid;
use Modules\Ecommerce\Events\OrderShipped;
use Modules\Webhooks\Enums\WebhookEvent;
use Modules\Webhooks\Services\WebhookService;

class DispatchEcommerceWebhooks
{
    public function handle(object $event): void
    {
        if (! class_exists(WebhookService::class)) {
            return;
        }

        if (! class_exists(WebhookEvent::class)) {
            return;
        }

        $service = app(WebhookService::class);

        match ($event::class) {
            OrderCreated::class => $service->dispatch(
                WebhookEvent::OrderCreated,
                [
                    'order_id' => $event->order->id,
                    'order_number' => $event->order->order_number,
                    'total' => $event->order->total,
                    'status' => $event->order->status,
                ]
            ),
            OrderPaid::class => $service->dispatch(
                WebhookEvent::OrderPaid,
                [
                    'order_id' => $event->order->id,
                    'order_number' => $event->order->order_number,
                    'total' => $event->order->total,
                    'status' => $event->order->status,
                ]
            ),
            OrderShipped::class => $service->dispatch(
                WebhookEvent::OrderShipped,
                [
                    'order_id' => $event->order->id,
                    'order_number' => $event->order->order_number,
                    'total' => $event->order->total,
                    'status' => $event->order->status,
                    'tracking_number' => $event->order->tracking_number,
                ]
            ),
            LowStockDetected::class => $service->dispatch(
                WebhookEvent::LowStockDetected,
                [
                    'variant_id' => $event->variant->id,
                    'sku' => $event->variant->sku,
                    'stock' => $event->variant->stock,
                ]
            ),
            default => null,
        };
    }
}
