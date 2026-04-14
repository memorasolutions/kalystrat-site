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
use Modules\Ecommerce\Events\CartAbandoned;
use Modules\Ecommerce\Notifications\AbandonedCartNotification;

class SendAbandonedCartReminder implements ShouldQueue
{
    public function handle(CartAbandoned $event): void
    {
        /** @var User|null $user */
        $user = $event->cart->user;
        $user?->notify(new AbandonedCartNotification($event->cart, $event->reminderNumber));
    }
}
