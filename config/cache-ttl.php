<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

return [
    'settings' => 3600,
    'menus' => 86400,
    'branding' => 3600,
    'analytics' => 86400,
    'short_urls' => 3600,
    'widgets' => 3600,
    'email_templates' => 3600,
    'url_redirects' => 3600,
    'api_blog_categories' => 3600,
    'response_cache' => (int) env('RESPONSE_CACHE_LIFETIME', 3600),
];
