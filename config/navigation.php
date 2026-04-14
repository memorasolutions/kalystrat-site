<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 *
 * Navigation configuration for the admin backoffice.
 * Each section contains items filtered by permissions, modules, and route existence.
 * Maximum 2 levels of nesting (section → items → children).
 */

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Sidebar Sections
    |--------------------------------------------------------------------------
    */
    'sections' => [
        [
            'label' => 'Accueil',
            'icon' => 'home',
            'items' => [
                ['label' => 'Tableau de bord', 'icon' => 'home', 'route' => 'admin.dashboard', 'permission' => 'view_dashboard'],
                ['label' => 'Statistiques', 'icon' => 'bar-chart-2', 'route' => 'admin.stats', 'permission' => 'view_dashboard'],
            ],
        ],
        [
            'label' => 'Contenu',
            'icon' => 'file-text',
            'items' => [
                ['label' => 'Articles', 'icon' => 'pen-line', 'route' => 'admin.blog.articles.index', 'permission' => 'view_articles'],
                ['label' => 'Pages', 'icon' => 'file', 'route' => 'admin.pages.index', 'permission' => 'view_pages'],
                ['label' => 'Catégories', 'icon' => 'folder', 'route' => 'admin.blog.categories.index', 'permission' => 'view_categories'],
                ['label' => 'Médias', 'icon' => 'image', 'route' => 'admin.media.index', 'permission' => 'view_media'],
                ['label' => 'FAQ', 'icon' => 'help-circle', 'route' => 'admin.faqs.index', 'permission' => 'view_faqs', 'module' => 'Faq'],
                ['label' => 'Menus', 'icon' => 'list', 'route' => 'admin.menus.index', 'permission' => 'view_menus', 'module' => 'Menu'],
                ['label' => 'Témoignages', 'icon' => 'quote', 'route' => 'admin.testimonials.index', 'permission' => 'view_testimonials', 'module' => 'Testimonials'],
                ['label' => 'Widgets', 'icon' => 'layout-grid', 'route' => 'admin.widgets.index', 'permission' => 'view_widgets', 'module' => 'Widget'],
                ['label' => 'Champs perso', 'icon' => 'text-cursor-input', 'route' => 'admin.custom-fields.index', 'permission' => 'view_shortcodes', 'module' => 'CustomFields'],
                ['label' => 'Formulaires', 'icon' => 'clipboard-list', 'route' => 'admin.formbuilder.forms.index', 'permission' => 'view_forms', 'module' => 'FormBuilder'],
            ],
        ],
        [
            'label' => 'Marketing',
            'icon' => 'megaphone',
            'items' => [
                ['label' => 'Newsletter', 'icon' => 'mail', 'route' => 'admin.newsletter.index', 'permission' => 'view_newsletter', 'module' => 'Newsletter'],
                ['label' => 'Campagnes', 'icon' => 'send', 'route' => 'admin.newsletter.campaigns.index', 'permission' => 'view_newsletter', 'module' => 'Newsletter'],
                ['label' => 'Workflows', 'icon' => 'workflow', 'route' => 'admin.newsletter.workflows.index', 'permission' => 'view_workflows', 'module' => 'Newsletter'],
            ],
        ],
        [
            'label' => 'Commerce',
            'icon' => 'shopping-cart',
            'items' => [
                [
                    'label' => 'Boutique', 'icon' => 'store', 'module' => 'Ecommerce',
                    'children' => [
                        ['label' => 'Dashboard', 'route' => 'admin.ecommerce.dashboard', 'permission' => 'view_ecommerce', 'icon' => 'layout-dashboard'],
                        ['label' => 'Produits', 'route' => 'admin.ecommerce.products.index', 'permission' => 'view_products', 'icon' => 'package'],
                        ['label' => 'Commandes', 'route' => 'admin.ecommerce.orders.index', 'permission' => 'view_ecommerce_orders', 'icon' => 'shopping-bag'],
                        ['label' => 'Coupons', 'route' => 'admin.ecommerce.coupons.index', 'permission' => 'view_coupons', 'icon' => 'ticket'],
                    ],
                ],
                [
                    'label' => 'SaaS', 'icon' => 'cloud', 'module' => 'SaaS',
                    'children' => [
                        ['label' => 'Plans', 'route' => 'admin.saas.plans.index', 'permission' => 'view_plans', 'icon' => 'credit-card'],
                        ['label' => 'Abonnés', 'route' => 'admin.saas.tenants.index', 'permission' => 'view_tenants', 'icon' => 'building-2'],
                    ],
                ],
                [
                    'label' => 'Réservations', 'icon' => 'calendar', 'module' => 'Booking',
                    'children' => [
                        ['label' => 'Rendez-vous', 'route' => 'admin.booking.appointments.index', 'permission' => 'manage_booking', 'icon' => 'calendar-check'],
                        ['label' => 'Services', 'route' => 'admin.booking.services.index', 'permission' => 'manage_booking', 'icon' => 'briefcase'],
                    ],
                ],
            ],
        ],
        [
            'label' => 'Équipe',
            'icon' => 'users',
            'items' => [
                ['label' => 'Membres', 'icon' => 'user', 'route' => 'admin.users.index', 'permission' => 'view_users'],
                ['label' => 'Rôles', 'icon' => 'shield', 'route' => 'admin.roles.index', 'permission' => 'view_roles'],
                ['label' => 'Équipes', 'icon' => 'users', 'route' => 'admin.teams.index', 'permission' => 'view_teams', 'module' => 'Team'],
                ['label' => 'Messages', 'icon' => 'message-square', 'route' => 'admin.contacts.index', 'permission' => 'view_contacts'],
            ],
        ],
        [
            'label' => 'Configuration',
            'icon' => 'settings',
            'items' => [
                ['label' => 'Branding', 'icon' => 'palette', 'route' => 'admin.branding.edit', 'permission' => 'view_branding'],
                ['label' => 'SEO', 'icon' => 'search', 'route' => 'admin.seo.index', 'permission' => 'view_seo'],
                ['label' => 'Paramètres', 'icon' => 'sliders', 'route' => 'admin.settings.index', 'permission' => 'view_settings'],
                ['label' => 'Feature flags', 'icon' => 'flag', 'route' => 'admin.feature-flags.index', 'permission' => 'view_feature_flags'],
                ['label' => 'Templates email', 'icon' => 'mail', 'route' => 'admin.email-templates.index', 'permission' => 'view_email_templates'],
                ['label' => 'Traductions', 'icon' => 'globe', 'route' => 'admin.translations.index', 'permission' => 'view_translations'],
                ['label' => 'Thèmes', 'icon' => 'paintbrush', 'route' => 'admin.themes.index', 'permission' => 'view_themes'],
                ['label' => 'Cookies', 'icon' => 'cookie', 'route' => 'admin.cookie-categories.index', 'permission' => 'view_cookies'],
                ['label' => 'Redirections', 'icon' => 'arrow-right-left', 'route' => 'admin.seo.redirects.index', 'permission' => 'view_seo'],
            ],
        ],
        [
            'label' => 'Système',
            'icon' => 'server',
            'items' => [
                ['label' => 'Santé', 'icon' => 'heart-pulse', 'route' => 'admin.health.index', 'permission' => 'view_health'],
                ['label' => 'Sauvegardes', 'icon' => 'hard-drive', 'route' => 'admin.backups.index', 'permission' => 'view_backups'],
                ['label' => 'Journaux', 'icon' => 'scroll-text', 'route' => 'admin.logs.index', 'permission' => 'view_logs'],
                ['label' => 'Sécurité', 'icon' => 'lock', 'route' => 'admin.security.index', 'permission' => 'view_security'],
                ['label' => 'Webhooks', 'icon' => 'webhook', 'route' => 'admin.webhooks.index', 'permission' => 'manage_webhooks', 'module' => 'Webhooks'],
                ['label' => 'Erreurs', 'icon' => 'alert-triangle', 'route' => 'admin.error-monitoring.index', 'permission' => 'manage_system', 'module' => 'ErrorMonitoring'],
                ['label' => 'Activité', 'icon' => 'activity', 'route' => 'admin.activity-logs.index', 'permission' => 'view_activity_logs'],
                ['label' => 'Jobs échoués', 'icon' => 'alert-circle', 'route' => 'admin.failed-jobs.index', 'permission' => 'manage_system'],
                ['label' => 'Notifications', 'icon' => 'bell', 'route' => 'admin.notifications.index', 'permission' => 'view_notifications'],
                ['label' => 'Infos système', 'icon' => 'info', 'route' => 'admin.system-info.index', 'permission' => 'manage_system'],
            ],
        ],
        [
            'label' => 'Outils',
            'icon' => 'wrench',
            'items' => [
                [
                    'label' => 'IA', 'icon' => 'bot', 'module' => 'AI',
                    'children' => [
                        ['label' => 'Conversations', 'route' => 'admin.ai.conversations.index', 'permission' => 'view_ai', 'icon' => 'message-circle'],
                        ['label' => 'Base connaissances', 'route' => 'admin.ai.knowledge.index', 'permission' => 'manage_ai', 'icon' => 'brain'],
                        ['label' => 'Analytics IA', 'route' => 'admin.ai.analytics.index', 'permission' => 'view_ai', 'icon' => 'activity'],
                    ],
                ],
                [
                    'label' => 'Roadmap', 'icon' => 'kanban', 'module' => 'Roadmap',
                    'children' => [
                        ['label' => 'Tableaux', 'route' => 'admin.roadmap.boards.index', 'permission' => 'view_roadmap', 'icon' => 'columns-3'],
                    ],
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Bottom Bar (Mobile) — Priority+ pattern
    |--------------------------------------------------------------------------
    | First 4 items shown, rest in "More" overflow.
    */
    'bottom_bar' => [
        ['label' => 'Accueil', 'icon' => 'home', 'route' => 'admin.dashboard', 'permission' => 'view_dashboard'],
        ['label' => 'Contenu', 'icon' => 'file-text', 'route' => 'admin.blog.articles.index', 'permission' => 'view_articles'],
        ['label' => 'Équipe', 'icon' => 'users', 'route' => 'admin.users.index', 'permission' => 'view_users'],
        ['label' => 'Config', 'icon' => 'settings', 'route' => 'admin.settings.index', 'permission' => 'view_settings'],
    ],

];
