<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Privacy\Console;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Modules\Privacy\Models\UserConsent;

class CleanupConsentsCommand extends Command
{
    protected $signature = 'privacy:cleanup-consents {--dry-run : Show count without deleting}';

    protected $description = 'Delete expired user consents older than 5 years (RGPD art. 7 proof retention)';

    public function handle(): int
    {
        $fiveYearsAgo = Carbon::now()->subYears(5);

        $query = UserConsent::where('expires_at', '<', now())
            ->where('created_at', '<', $fiveYearsAgo);

        $count = $query->count();

        if ($this->option('dry-run')) {
            $this->components->info("Dry run : {$count} consents expiré(s) de +5 ans seraient supprimés.");

            return self::SUCCESS;
        }

        if ($count === 0) {
            $this->components->info('Aucun consent expiré de plus de 5 ans.');

            return self::SUCCESS;
        }

        $deleted = 0;
        $query->chunkById(200, function ($consents) use (&$deleted) {
            foreach ($consents as $consent) {
                $consent->delete();
                $deleted++;
            }
        });

        $this->components->info("{$deleted} consent(s) expiré(s) supprimé(s).");
        Log::info("Privacy: cleanup-consents supprimé {$deleted} consents expirés de +5 ans.");

        return self::SUCCESS;
    }
}
