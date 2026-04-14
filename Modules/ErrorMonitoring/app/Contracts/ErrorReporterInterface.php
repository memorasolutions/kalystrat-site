<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\ErrorMonitoring\Contracts;

use Illuminate\Http\Request;

interface ErrorReporterInterface
{
    public function shouldCapture(\Throwable $e, Request $request): bool;

    public function capture(\Throwable $e, Request $request): void;

    public function resolveStatusCode(\Throwable $e): int;
}
