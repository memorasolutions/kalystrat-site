<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);
use App\Models\User;
use Modules\Blog\Models\Article;
use Modules\Blog\Models\Category;
use Modules\Pages\Models\StaticPage;
use Modules\SaaS\Models\Plan;
use Modules\Settings\Models\Setting;

return [
    'name' => 'Search',
    'models' => array_values(array_filter([
        User::class,
        class_exists(Article::class) ? Article::class : null,
        class_exists(Plan::class) ? Plan::class : null,
        class_exists(Category::class) ? Category::class : null,
        class_exists(StaticPage::class) ? StaticPage::class : null,
        Setting::class,
    ])),

    'types' => [
        'users' => ['label' => 'Utilisateurs', 'icon' => 'solar:users-group-two-rounded-outline'],
        'articles' => ['label' => 'Articles', 'icon' => 'solar:document-text-outline'],
        'plans' => ['label' => 'Plans', 'icon' => 'solar:star-outline'],
        'categories' => ['label' => 'Catégories', 'icon' => 'solar:tag-outline'],
        'pages' => ['label' => 'Pages', 'icon' => 'solar:widget-2-outline'],
        'settings' => ['label' => 'Paramètres', 'icon' => 'solar:settings-outline'],
    ],

    'per_page' => 15,
    'navbar_limit' => 3,
    'front_per_page' => 10,
];
