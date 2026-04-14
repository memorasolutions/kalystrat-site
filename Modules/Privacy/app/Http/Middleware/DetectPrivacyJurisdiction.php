<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Privacy\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class DetectPrivacyJurisdiction
{
    /**
     * EU/EEA + UK + CH country codes (GDPR jurisdiction).
     */
    private const GDPR_COUNTRIES = [
        'AT', 'BE', 'BG', 'HR', 'CY', 'CZ', 'DK', 'EE', 'FI', 'FR', 'DE', 'GR',
        'HU', 'IE', 'IT', 'LV', 'LT', 'LU', 'MT', 'NL', 'PL', 'PT', 'RO', 'SK',
        'SI', 'ES', 'SE', 'GB', 'IS', 'LI', 'NO', 'CH',
    ];

    /**
     * Detect user privacy jurisdiction.
     * Priority: 1) CF-IPCountry  2) X-Forwarded-Country  3) Accept-Language  4) session cache
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('privacy_jurisdiction')) {
            View::share('privacy_jurisdiction', session('privacy_jurisdiction'));
            View::share('privacy_country', session('privacy_country'));

            return $next($request);
        }

        $country = $this->detectCountry($request);
        $jurisdiction = $this->mapJurisdiction($country, $request->header('Accept-Language', ''));

        session(['privacy_jurisdiction' => $jurisdiction, 'privacy_country' => $country]);
        View::share('privacy_jurisdiction', $jurisdiction);
        View::share('privacy_country', $country);

        return $next($request);
    }

    private function detectCountry(Request $request): ?string
    {
        // Priority 1: CloudFlare GeoIP header
        if ($cf = $request->header('CF-IPCountry')) {
            return strtoupper($cf);
        }

        // Priority 2: Reverse proxy header
        if ($fwd = $request->header('X-Forwarded-Country')) {
            return strtoupper($fwd);
        }

        // Priority 3: Infer from Accept-Language
        return $this->countryFromLanguage($request->header('Accept-Language', ''));
    }

    private function countryFromLanguage(string $header): ?string
    {
        $preferred = strtolower(explode(';', explode(',', $header)[0])[0]);

        return match (true) {
            str_contains($preferred, 'fr-ca'), str_contains($preferred, 'en-ca') => 'CA',
            str_contains($preferred, 'en-us') => 'US',
            str_contains($preferred, 'fr-fr') => 'FR',
            str_contains($preferred, 'de') => 'DE',
            str_contains($preferred, 'it') => 'IT',
            str_contains($preferred, 'es') => 'ES',
            str_contains($preferred, 'nl') => 'NL',
            str_contains($preferred, 'pt') => 'PT',
            str_contains($preferred, 'pl') => 'PL',
            str_contains($preferred, 'sv') => 'SE',
            str_contains($preferred, 'da') => 'DK',
            str_contains($preferred, 'fi') => 'FI',
            str_contains($preferred, 'el') => 'GR',
            str_contains($preferred, 'cs') => 'CZ',
            str_contains($preferred, 'ro') => 'RO',
            str_contains($preferred, 'hu') => 'HU',
            str_contains($preferred, 'bg') => 'BG',
            str_contains($preferred, 'hr') => 'HR',
            str_contains($preferred, 'sk') => 'SK',
            str_contains($preferred, 'sl') => 'SI',
            default => null,
        };
    }

    private function mapJurisdiction(?string $country, string $acceptLanguage): string
    {
        if ($country === null) {
            return 'pipeda';
        }

        if (in_array($country, self::GDPR_COUNTRIES, true)) {
            return 'gdpr';
        }

        if ($country === 'CA') {
            return str_contains(strtolower($acceptLanguage), 'fr-ca') ? 'canada_quebec' : 'pipeda';
        }

        if ($country === 'US') {
            return 'ccpa';
        }

        return 'pipeda';
    }
}
