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

class NativeErrorReporter implements ErrorReporterInterface
{
    public function __construct(
        private readonly ErrorMonitoringService $service,
    ) {}

    public function shouldCapture(\Throwable $e, Request $request): bool
    {
        return $this->service->shouldCapture($e, $request);
    }

    public function capture(\Throwable $e, Request $request): void
    {
        $this->service->capture($e, $request);
    }

    public function resolveStatusCode(\Throwable $e): int
    {
        return $this->service->resolveStatusCode($e);
    }
}
