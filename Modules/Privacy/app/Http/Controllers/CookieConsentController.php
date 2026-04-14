<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Privacy\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Modules\Privacy\Models\UserConsent;
use Modules\Settings\Models\Setting;
use Symfony\Component\HttpFoundation\Response;

class CookieConsentController
{
    public function accept(Request $request): Response
    {
        $consent = $this->buildConsent(allOptional: true);
        $cookie = $this->makeCookie($consent);
        $this->logConsent('accept', $consent);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'consent' => $consent])->withCookie($cookie);
        }

        return back()->withCookie($cookie);
    }

    public function decline(Request $request): Response
    {
        $consent = $this->buildConsent(allOptional: false);
        $cookie = $this->makeCookie($consent);
        $this->logConsent('decline', $consent);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'consent' => $consent])->withCookie($cookie);
        }

        return back()->withCookie($cookie);
    }

    public function customize(Request $request): Response
    {
        $consent = [
            'essential' => true,
            'analytics' => $request->boolean('analytics'),
            'marketing' => $request->boolean('marketing'),
            'v' => $this->getPolicyVersion(),
        ];
        $cookie = $this->makeCookie($consent);
        $this->logConsent('customize', $consent);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'consent' => $consent])->withCookie($cookie);
        }

        return back()->withCookie($cookie);
    }

    public function preferences()
    {
        return view('privacy::legal.cookie-policy', [
            'config' => config('privacy'),
        ]);
    }

    public function reset()
    {
        return back()->withCookie(cookie()->forget('cookie_consent'));
    }

    private function buildConsent(bool $allOptional): array
    {
        return [
            'essential' => true,
            'analytics' => $allOptional,
            'marketing' => $allOptional,
            'v' => $this->getPolicyVersion(),
        ];
    }

    private function getPolicyVersion(): int
    {
        if (class_exists(Setting::class)) {
            return (int) Setting::get('cookie_policy_version', 1);
        }

        return 1;
    }

    private function logConsent(string $action, array $categories): void
    {
        if (class_exists(UserConsent::class)) {
            try {
                UserConsent::create([
                    'user_id' => auth()->id(),
                    'type' => 'cookie',
                    'action' => $action,
                    'data' => $categories,
                    'ip_address' => request()->ip(),
                ]);
            } catch (\Throwable) {
                // Silently fail — consent logging should never break the site
            }
        }
    }

    private function makeCookie(array $consent): \Symfony\Component\HttpFoundation\Cookie
    {
        return Cookie::make(
            'cookie_consent',
            (string) json_encode($consent),
            365 * 24 * 60,
            '/',
            null,
            true,
            false,
            false,
            'Lax',
        );
    }
}
