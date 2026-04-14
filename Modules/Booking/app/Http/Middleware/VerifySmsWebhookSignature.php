<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Booking\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Twilio\Security\RequestValidator;

class VerifySmsWebhookSignature
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! config('booking.sms.verify_signature', true)) {
            return $next($request);
        }

        $provider = config('booking.sms.provider');

        return match ($provider) {
            'twilio' => $this->verifyTwilio($request, $next),
            'vonage' => $this->verifyVonage($request, $next),
            default => $next($request),
        };
    }

    private function verifyTwilio(Request $request, Closure $next): Response
    {
        $authToken = config('booking.sms.twilio_auth_token');
        $signature = $request->header('X-Twilio-Signature');

        if (! $authToken || ! $signature) {
            Log::warning('SMS webhook: Twilio auth token ou signature manquante.');
            abort(403, 'Invalid webhook signature.');
        }

        if (class_exists(RequestValidator::class)) {
            $validator = new RequestValidator($authToken);

            if (! $validator->validate($signature, $request->fullUrl(), $request->all())) {
                Log::warning('SMS webhook: signature Twilio invalide.');
                abort(403, 'Invalid webhook signature.');
            }
        }

        return $next($request);
    }

    private function verifyVonage(Request $request, Closure $next): Response
    {
        $secret = config('booking.sms.vonage_signature_secret');
        $authHeader = $request->header('Authorization');

        if (! $secret || ! $authHeader) {
            Log::warning('SMS webhook: Vonage secret ou Authorization manquante.');
            abort(403, 'Invalid webhook signature.');
        }

        $expected = 'Bearer '.hash_hmac('sha256', $request->getContent(), $secret);

        if (! hash_equals($expected, $authHeader)) {
            Log::warning('SMS webhook: signature Vonage invalide.');
            abort(403, 'Invalid webhook signature.');
        }

        return $next($request);
    }
}
