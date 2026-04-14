<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

return [
    'name' => 'ErrorMonitoring',

    'enabled' => env('ERROR_MONITORING_ENABLED', true),

    // Driver : 'native' (DB+email+webhooks) ou 'null' (desactive)
    // Futur : 'sentry' pour integration Sentry
    'driver' => env('ERROR_MONITORING_DRIVER', 'native'),

    'notify_emails' => array_filter(explode(',', env('ERROR_MONITORING_EMAILS', ''))),

    'severity_codes' => [
        500 => 'critical',
        429 => 'warning',
        403 => 'warning',
        404 => 'info',
    ],

    'throttle_minutes' => 60,

    'retention_days' => 30,

    'exclude_paths' => [
        'wp-admin', 'wp-login', 'wp-content', 'xmlrpc.php',
        'phpmyadmin', '.env', 'cpanel', 'backup', 'old',
    ],

    'exclude_extensions' => [
        'woff2', 'woff', 'ttf', 'eot', 'otf',
        'css', 'js', 'map',
        'png', 'jpg', 'jpeg', 'gif', 'svg', 'ico', 'webp', 'avif',
        'mp4', 'webm', 'pdf',
    ],

    'notify_channels' => array_filter(explode(',', env('ERROR_MONITORING_CHANNELS', 'mail'))),

    'slack_webhook_url' => env('ERROR_MONITORING_SLACK_WEBHOOK', ''),

    'discord_webhook_url' => env('ERROR_MONITORING_DISCORD_WEBHOOK', ''),

    'digest_enabled' => env('ERROR_MONITORING_DIGEST', false),
    'digest_frequency' => 'daily',
];
