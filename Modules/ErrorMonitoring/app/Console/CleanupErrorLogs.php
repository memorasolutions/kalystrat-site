<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\ErrorMonitoring\Console;

use Illuminate\Console\Command;
use Modules\ErrorMonitoring\Models\ErrorLog;

class CleanupErrorLogs extends Command
{
    protected $signature = 'error-monitoring:cleanup';

    protected $description = 'Supprime les erreurs résolues et anciennes selon la rétention configurée.';

    public function handle(): int
    {
        $retentionDays = (int) config('errormonitoring.retention_days', 30);

        $deletedResolved = ErrorLog::whereNotNull('resolved_at')
            ->where('resolved_at', '<', now()->subDays($retentionDays))
            ->delete();

        $deletedInfo = ErrorLog::where('severity', 'info')
            ->where('created_at', '<', now()->subDays(7))
            ->delete();

        $this->info("Supprimé : {$deletedResolved} erreurs résolues (>{$retentionDays}j), {$deletedInfo} info (>7j).");

        return Command::SUCCESS;
    }
}
