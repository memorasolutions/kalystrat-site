<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Auth\Listeners;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\DB;

class InvalidateSessionsOnPasswordReset
{
    public function handle(PasswordReset $event): void
    {
        /** @var User $user */
        $user = $event->user;

        $user->tokens()->delete();

        if (config('session.driver') === 'database') {
            DB::table('sessions')->where('user_id', $user->id)->delete();
        }

        activity()
            ->performedOn($user)
            ->causedBy($user)
            ->log('password_reset_sessions_invalidated');
    }
}
