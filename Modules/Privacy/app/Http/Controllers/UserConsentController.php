<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Privacy\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;
use Modules\Privacy\Models\UserConsent;
use Modules\Settings\Models\Setting;

class UserConsentController
{
    public function index(): View
    {
        $consents = UserConsent::forUser((int) auth()->id())
            ->latest()
            ->limit(20)
            ->get();

        $currentConsent = null;
        $cookieValue = request()->cookie('cookie_consent');
        if ($cookieValue) {
            $currentConsent = json_decode((string) $cookieValue, true);
        }

        return view('privacy::account.consent-dashboard', [
            'consents' => $consents,
            'currentConsent' => $currentConsent,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $policyVersion = class_exists(Setting::class)
            ? (string) Setting::get('cookie_policy_version', '1')
            : '1';

        $choices = [
            'essential' => true,
            'analytics' => $request->boolean('analytics'),
            'marketing' => $request->boolean('marketing'),
            'v' => $policyVersion,
        ];

        $cookie = Cookie::make(
            'cookie_consent',
            (string) json_encode($choices),
            365 * 24 * 60,
            '/',
            null,
            true,
            false,
            false,
            'Lax',
        );

        try {
            UserConsent::create([
                'user_id' => auth()->id(),
                'consent_token' => UserConsent::generateToken(),
                'ip_hash' => hash('sha256', (string) $request->ip()),
                'user_agent' => mb_substr((string) $request->userAgent(), 0, 512),
                'choices' => $choices,
                'action' => 'customize',
                'type' => 'cookie',
                'jurisdiction' => config('privacy.default_jurisdiction', 'pipeda'),
                'policy_version' => $policyVersion,
                'region_detected' => $request->header('CF-IPCountry'),
                'gpc_enabled' => $request->header('Sec-GPC') === '1',
                'expires_at' => now()->addYear(),
            ]);
        } catch (\Throwable) {
            // Consent logging should never break the site
        }

        return redirect()->back()
            ->with('success', __('Vos preferences de consentement ont ete mises a jour.'))
            ->withCookie($cookie);
    }

    public function export(): JsonResponse
    {
        $consents = UserConsent::forUser((int) auth()->id())
            ->latest()
            ->get()
            ->makeHidden(['id']);

        return response()->json([
            'user' => auth()->user()->email,
            'exported_at' => now()->toIso8601String(),
            'consents' => $consents,
        ], 200, [
            'Content-Disposition' => 'attachment; filename="my-consents.json"',
        ]);
    }
}
