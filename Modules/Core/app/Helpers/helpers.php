<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use Illuminate\Support\Carbon;
use Modules\Core\Http\Middleware\ContentSecurityPolicy;

if (! function_exists('format_date')) {
    function format_date(?Carbon $date, string $format = 'd/m/Y'): string
    {
        return $date ? $date->format($format) : '-';
    }
}

if (! function_exists('format_datetime')) {
    function format_datetime(?Carbon $date, string $format = 'd/m/Y H:i'): string
    {
        return $date ? $date->format($format) : '-';
    }
}

if (! function_exists('format_money')) {
    function format_money(float $amount, string $currency = 'CAD', string $locale = 'fr_CA'): string
    {
        $formatter = new NumberFormatter($locale, NumberFormatter::CURRENCY);

        return (string) $formatter->formatCurrency($amount, $currency);
    }
}

if (! function_exists('is_active_route')) {
    function is_active_route(string $route, string $class = 'active'): string
    {
        return request()->routeIs($route) ? $class : '';
    }
}

if (! function_exists('csp_nonce')) {
    /**
     * Get the current CSP nonce for inline scripts.
     */
    function csp_nonce(): string
    {
        return ContentSecurityPolicy::getNonce() ?? '';
    }
}
