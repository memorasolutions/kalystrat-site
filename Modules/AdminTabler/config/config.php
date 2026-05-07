<?php

declare(strict_types=1);

/**
 * Configuration AdminTabler — thème admin Tabler.io v1.4
 * "With overlap navbar" layout pour Laravel 12 modulaire.
 *
 * Réutilisable cross-projets via vendor:publish.
 */
return [
    'name' => 'AdminTabler',

    /*
    |--------------------------------------------------------------------------
    | Thème admin actif
    |--------------------------------------------------------------------------
    | Switch via .env : ADMIN_THEME=tabler|nobleui (rollback rapide)
    | Le routing back-office choisit le layout selon ce flag.
    */
    'active_theme' => env('ADMIN_THEME', 'tabler'),

    /*
    |--------------------------------------------------------------------------
    | Layout Tabler
    |--------------------------------------------------------------------------
    | Variantes officielles Tabler 1.4 : "default", "navbar-overlap",
    | "vertical", "horizontal", "boxed". On utilise "navbar-overlap"
    | (sidebar overlap au survol mobile, navbar fixed top).
    */
    'layout' => env('ADMIN_LAYOUT', 'navbar-overlap'),

    /*
    |--------------------------------------------------------------------------
    | Branding par défaut (override par DB settings.branding ensuite)
    |--------------------------------------------------------------------------
    */
    'branding' => [
        'primary' => env('ADMIN_PRIMARY_COLOR', '#066fd1'),
        'secondary' => env('ADMIN_SECONDARY_COLOR', '#5eba00'),
        'font_family' => env('ADMIN_FONT_FAMILY', 'Inter, system-ui, sans-serif'),
        'border_radius' => env('ADMIN_BORDER_RADIUS', '4px'),
        'density' => env('ADMIN_DENSITY', 'comfortable'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Features activables
    |--------------------------------------------------------------------------
    */
    'features' => [
        'command_palette' => env('ADMIN_COMMAND_PALETTE', true),
        'dark_mode' => env('ADMIN_DARK_MODE', true),
        'breadcrumbs' => env('ADMIN_BREADCRUMBS', true),
        'page_header' => env('ADMIN_PAGE_HEADER', true),
        'mobile_overlay' => env('ADMIN_MOBILE_OVERLAY', true),
        'tour' => env('ADMIN_TOUR', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | Icônes — coexistence Lucide + Tabler Icons
    |--------------------------------------------------------------------------
    | Lucide reste actif pour les vues existantes (NavigationService).
    | Tabler Icons ajoutées pour composants neufs (command palette, etc.).
    */
    'icons' => [
        'lucide_enabled' => true,
        'tabler_enabled' => true,
        'default_pack' => 'lucide',
    ],
];
