<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Core\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ContentSecurityPolicy
{
    protected static ?string $nonce = null;

    public function handle(Request $request, Closure $next): Response
    {
        $nonce = base64_encode(random_bytes(16));
        $request->attributes->set('csp-nonce', $nonce);
        self::$nonce = $nonce;

        $response = $next($request);

        // Only apply CSP to HTML responses (not JSON/API)
        $contentType = $response->headers->get('Content-Type', '');
        if (! Str::contains($contentType, 'text/html') && $contentType !== '') {
            return $response;
        }

        $policy = implode('; ', [
            "default-src 'self'",
            "script-src 'self' 'nonce-{$nonce}'",
            "style-src 'self' 'unsafe-inline'",
            "img-src 'self' data: https:",
            "font-src 'self' https://fonts.gstatic.com https://cdn.jsdelivr.net",
            "connect-src 'self' wss: ws:",
            "frame-src 'self' https://lookerstudio.google.com",
            "frame-ancestors 'self'",
            "base-uri 'self'",
            "form-action 'self'",
        ]);

        // Report-Only in dev, enforced in production
        $headerName = app()->environment('production')
            ? 'Content-Security-Policy'
            : 'Content-Security-Policy-Report-Only';

        $response->headers->set($headerName, $policy);

        return $response;
    }

    public static function getNonce(): ?string
    {
        return self::$nonce;
    }
}
