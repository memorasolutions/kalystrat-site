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
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (function_exists('header_remove')) {
            header_remove('X-Powered-By');
            header_remove('Server');
        }

        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        // T34-S30 : X-XSS-Protection déprécié 2020+ (Chrome 78+, Firefox 66+ ne le respectent plus).
        // OWASP recommande 0 ou suppression — la protection moderne se fait via CSP.
        // Ref : https://owasp.org/www-project-secure-headers/#x-xss-protection
        $response->headers->set('X-XSS-Protection', '0');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');
        $response->headers->remove('X-Powered-By');
        $response->headers->remove('Server');

        if (app()->environment('production')) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');
        }

        if ($request->is('api/*')) {
            if ($request->user()) {
                $response->headers->set('Cache-Control', 'private, no-store, must-revalidate');
            } else {
                $response->headers->set('Cache-Control', 'public, max-age=60, s-maxage=300');
            }
        }

        return $response;
    }
}
