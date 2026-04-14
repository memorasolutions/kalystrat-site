<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Notifications\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification as NotificationFacade;

class NotificationService
{
    public function sendToUser(User $user, Notification $notification): void
    {
        $user->notify($notification);
    }

    public function sendToUsers(iterable $users, Notification $notification): void
    {
        NotificationFacade::send($users, $notification);
    }

    public function markAsRead(User $user, ?string $notificationId = null): void
    {
        if ($notificationId) {
            $user->notifications()->where('id', $notificationId)->update(['read_at' => now()]);
        } else {
            $user->unreadNotifications->markAsRead();
        }
    }

    public function getUnread(User $user, int $limit = 20): Collection
    {
        return $user->unreadNotifications()->limit($limit)->get();
    }

    public function getAll(User $user, int $limit = 50): Collection
    {
        return $user->notifications()->limit($limit)->get();
    }

    public function deleteOld(User $user, int $daysOld = 90): int
    {
        return $user->notifications()
            ->where('created_at', '<', now()->subDays($daysOld))
            ->delete();
    }
}
