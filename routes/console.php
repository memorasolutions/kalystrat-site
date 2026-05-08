<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

use Illuminate\Support\Facades\Schedule;
use Modules\Backoffice\Models\ScheduledTask;

// Backups (critical — no overlap, single server)
// DÉSACTIVÉ 2026-05-08 (T3) : config/backup.php L237 contient placeholder 'your@example.com' qui cause bounces.
// À RÉACTIVER lors du déploiement prod (D5) après : (1) ajout BACKUP_NOTIFICATION_MAIL dans .env prod, (2) auth SMTP MAIL_USERNAME/MAIL_PASSWORD configurés, (3) refactor config/backup.php L237 → env('BACKUP_NOTIFICATION_MAIL').
// Schedule::command('backup:run')->dailyAt('03:00')->withoutOverlapping()->onOneServer();
// Schedule::command('backup:clean')->dailyAt('04:00')->withoutOverlapping()->onOneServer();

// Horizon
Schedule::command('horizon:snapshot')->everyFiveMinutes();

// Activity log cleanup (30 days)
Schedule::command('activitylog:clean')->weekly()->withoutOverlapping()->onOneServer();

// Health checks
Schedule::command('health:check')->everyMinute()->withoutOverlapping();

// Telescope cleanup (48h)
Schedule::command('telescope:prune --hours=48')->everyTwoHours()->withoutOverlapping()->onOneServer();

// Queue maintenance
Schedule::command('queue:prune-batches --hours=48')->cron('30 2 * * *')->withoutOverlapping()->onOneServer();

// Data retention cleanup (reads settings for retention days)
Schedule::command('app:cleanup')->dailyAt('02:00')->withoutOverlapping()->onOneServer();

// Trial expiry notifications (3 days before + day of)
Schedule::command('saas:trial-expiry-notify')->dailyAt('09:00')->withoutOverlapping()->onOneServer();

// IP blocking (suspicious login attempts)
Schedule::command('app:block-suspicious-ips')->everyFiveMinutes()->withoutOverlapping()->onOneServer();

// Notification digests
Schedule::command('notifications:send-digest --frequency=daily')->dailyAt('08:00')->withoutOverlapping()->onOneServer();
Schedule::command('notifications:send-digest --frequency=weekly')->weeklyOn(1, '08:00')->withoutOverlapping()->onOneServer();

// Newsletter digest (weekly, Monday 09:00)
Schedule::command('newsletter:digest')->weeklyOn(1, '09:00')->withoutOverlapping()->onOneServer();

// AI knowledge base - scrape URLs needing refresh
Schedule::command('ai:scrape-urls --all')->dailyAt('05:00')->withoutOverlapping()->onOneServer();

// Custom scheduled tasks from database
try {
    foreach (ScheduledTask::active()->get() as $task) {
        Schedule::command($task->command)->cron($task->cron_expression)
            ->withoutOverlapping()
            ->after(fn () => $task->markAsRun());
    }
} catch (Throwable) {
    // Table may not exist yet during migrations
}

// Error monitoring cleanup (retention + info 7j)
Schedule::command('error-monitoring:cleanup')->dailyAt('04:30')->withoutOverlapping()->onOneServer();

// Media cleanup (orphaned media files)
Schedule::command('media-library:clean')->monthly()->at('05:00')->withoutOverlapping()->onOneServer();
