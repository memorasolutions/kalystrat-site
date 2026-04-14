<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Listeners;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Ecommerce\Events\OrderDelivered;
use Modules\Ecommerce\Notifications\OrderDeliveredNotification;

class SendOrderDeliveredNotification implements ShouldQueue
{
    public function handle(OrderDelivered $event): void
    {
        /** @var User|null $user */
        $user = $event->order->user;
        $user?->notify(new OrderDeliveredNotification($event->order));
    }
}
