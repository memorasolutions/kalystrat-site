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
use Modules\Ecommerce\Events\OrderRefunded;
use Modules\Ecommerce\Notifications\OrderRefundedNotification;

class SendOrderRefundNotification implements ShouldQueue
{
    public function handle(OrderRefunded $event): void
    {
        /** @var User|null $user */
        $user = $event->order->user;
        $user?->notify(new OrderRefundedNotification($event->order, $event->amount));
    }
}
