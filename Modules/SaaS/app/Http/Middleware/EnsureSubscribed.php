<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\SaaS\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureSubscribed
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->route('login');
        }

        if ($user->subscribed('default')) {
            return $next($request);
        }

        $subscription = $user->subscription('default');

        if ($subscription?->onGracePeriod()) {
            session()->flash('warning', __('Votre abonnement est en période de grâce.'));

            return $next($request);
        }

        return redirect()->route('user.subscription')->with('error', __('Un abonnement actif est requis.'));
    }
}
