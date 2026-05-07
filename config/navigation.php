<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 *
 * Navigation configuration for the admin backoffice.
 * Refonte mai 2026 (Phase 16) : 8 sections → 5 sections (Hybrid Entity+Workflow simplifié)
 * Pattern Hybrid noté 94/100 simplifié à 5 sections (compromise scope/complexité).
 *
 * Each section contains items filtered by permissions, modules, and route existence.
 * Maximum 2 levels of nesting (section → items → children).
 */

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Sidebar Sections — 5 sections (Phase 16 refonte UX 2026)
    |--------------------------------------------------------------------------
    */
    'sections' => [
        // ═══ 1. ACCUEIL ═══ Vue d'ensemble + analytics
        [
            'label' => 'Accueil',
            'icon' => 'home',
            'items' => [
                ['label' => 'Tableau de bord', 'icon' => 'home', 'route' => 'admin.dashboard', 'permission' => 'view_dashboard'],
                ['label' => 'Statistiques', 'icon' => 'bar-chart-2', 'route' => 'admin.stats', 'permission' => 'view_dashboard'],
            ],
        ],

        // ═══ 2. CONTENU ═══ Tout ce qui est éditorial / structurel public
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

        // ═══ 3. MARKETING & COMMERCE ═══ Newsletter + Ecommerce + SaaS + Booking
        [
            'label' => 'Marketing & Commerce',
            'icon' => 'megaphone',
            'items' => [
                ['label' => 'Newsletter', 'icon' => 'mail', 'route' => 'admin.newsletter.index', 'permission' => 'view_newsletter', 'module' => 'Newsletter'],
                ['label' => 'Campagnes', 'icon' => 'send', 'route' => 'admin.newsletter.campaigns.index', 'permission' => 'view_newsletter', 'module' => 'Newsletter'],
                ['label' => 'Workflows', 'icon' => 'workflow', 'route' => 'admin.newsletter.workflows.index', 'permission' => 'view_workflows', 'module' => 'Newsletter'],
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

        // ═══ 4. ÉQUIPE & SÉCURITÉ ═══ Personnes + accès + audit
        [
            'label' => 'Équipe & Sécurité',
            'icon' => 'users',
            'items' => [
                ['label' => 'Membres', 'icon' => 'user', 'route' => 'admin.users.index', 'permission' => 'view_users'],
                ['label' => 'Rôles', 'icon' => 'shield', 'route' => 'admin.roles.index', 'permission' => 'view_roles'],
                ['label' => 'Équipes', 'icon' => 'users', 'route' => 'admin.teams.index', 'permission' => 'view_teams', 'module' => 'Team'],
                ['label' => 'Messages', 'icon' => 'message-square', 'route' => 'admin.contacts.index', 'permission' => 'view_contacts'],
                ['label' => 'Sécurité', 'icon' => 'lock', 'route' => 'admin.security.index', 'permission' => 'view_security'],
                ['label' => 'Activité', 'icon' => 'activity', 'route' => 'admin.activity-logs.index', 'permission' => 'view_activity_logs'],
                ['label' => 'Jobs échoués', 'icon' => 'alert-circle', 'route' => 'admin.failed-jobs.index', 'permission' => 'manage_system'],
            ],
        ],

        // ═══ 5. CONFIGURATION ═══ Tout le réglage : apparence + tech + ops + outils
        [
            'label' => 'Configuration',
            'icon' => 'settings',
            'items' => [
                // Sub-group : Apparence
                [
                    'label' => 'Apparence', 'icon' => 'palette',
                    'children' => [
                        ['label' => 'Branding', 'route' => 'admin.branding.edit', 'permission' => 'view_branding', 'icon' => 'palette'],
                        ['label' => 'Thèmes', 'route' => 'admin.themes.index', 'permission' => 'view_themes', 'icon' => 'paintbrush'],
                        ['label' => 'Traductions', 'route' => 'admin.translations.index', 'permission' => 'view_translations', 'icon' => 'globe'],
                    ],
                ],
                // Sub-group : Technique
                [
                    'label' => 'Technique', 'icon' => 'sliders',
                    'children' => [
                        ['label' => 'Paramètres', 'route' => 'admin.settings.index', 'permission' => 'view_settings', 'icon' => 'sliders'],
                        ['label' => 'Feature flags', 'route' => 'admin.feature-flags.index', 'permission' => 'view_feature_flags', 'icon' => 'flag'],
                        ['label' => 'Templates email', 'route' => 'admin.email-templates.index', 'permission' => 'view_email_templates', 'icon' => 'mail'],
                        ['label' => 'SEO', 'route' => 'admin.seo.index', 'permission' => 'view_seo', 'icon' => 'search'],
                        ['label' => 'Redirections', 'route' => 'admin.seo.redirects.index', 'permission' => 'view_seo', 'icon' => 'arrow-right-left'],
                        ['label' => 'Cookies', 'route' => 'admin.cookie-categories.index', 'permission' => 'view_cookies', 'icon' => 'cookie'],
                        ['label' => 'Webhooks', 'route' => 'admin.webhooks.index', 'permission' => 'manage_webhooks', 'module' => 'Webhooks', 'icon' => 'webhook'],
                    ],
                ],
                // Sub-group : Système
                [
                    'label' => 'Système', 'icon' => 'server',
                    'children' => [
                        ['label' => 'Santé', 'route' => 'admin.health.index', 'permission' => 'view_health', 'icon' => 'heart-pulse'],
                        ['label' => 'Sauvegardes', 'route' => 'admin.backups.index', 'permission' => 'view_backups', 'icon' => 'hard-drive'],
                        ['label' => 'Journaux', 'route' => 'admin.logs.index', 'permission' => 'view_logs', 'icon' => 'scroll-text'],
                        ['label' => 'Erreurs', 'route' => 'admin.error-monitoring.index', 'permission' => 'manage_system', 'module' => 'ErrorMonitoring', 'icon' => 'alert-triangle'],
                        ['label' => 'Notifications', 'route' => 'admin.notifications.index', 'permission' => 'view_notifications', 'icon' => 'bell'],
                        ['label' => 'Infos système', 'route' => 'admin.system-info.index', 'permission' => 'manage_system', 'icon' => 'info'],
                    ],
                ],
                // Sub-group : Outils
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
    */
    'bottom_bar' => [
        ['label' => 'Accueil', 'icon' => 'home', 'route' => 'admin.dashboard', 'permission' => 'view_dashboard'],
        ['label' => 'Contenu', 'icon' => 'file-text', 'route' => 'admin.blog.articles.index', 'permission' => 'view_articles'],
        ['label' => 'Équipe', 'icon' => 'users', 'route' => 'admin.users.index', 'permission' => 'view_users'],
        ['label' => 'Config', 'icon' => 'settings', 'route' => 'admin.settings.index', 'permission' => 'view_settings'],
    ],

];
