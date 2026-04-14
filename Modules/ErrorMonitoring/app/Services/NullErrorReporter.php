<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\ErrorMonitoring\Services;

use Illuminate\Http\Request;
use Modules\ErrorMonitoring\Contracts\ErrorReporterInterface;

class NullErrorReporter implements ErrorReporterInterface
{
    public function shouldCapture(\Throwable $e, Request $request): bool
    {
        return false;
    }

    public function capture(\Throwable $e, Request $request): void
    {
        // No-op
    }

    public function resolveStatusCode(\Throwable $e): int
    {
        return 500;
    }
}
