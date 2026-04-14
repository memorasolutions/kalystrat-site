# Navigation map — Admin backoffice

> MEMORA solutions — Laravel 12 SaaS template
> DB-driven (table `navigation_items`) avec fallback `config/navigation.php`
> Mis a jour : 2026-04-06 (audit Playwright 3 breakpoints)

## Architecture

### Desktop (sidebar, >= 992px)

```
ROOT (8 sections, ~50 items, 2 niveaux max)
├── 01. Accueil
│   ├── Tableau de bord (home)
│   └── Statistiques (bar-chart-2)
├── 02. Contenu (10 items)
│   ├── Articles, Pages, Catégories, Médias
│   ├── FAQ*, Menus*, Témoignages*
│   └── Widgets*, Champs perso*, Formulaires*
├── 03. Marketing (3 items, module Newsletter)
│   ├── Newsletter, Campagnes, Workflows
├── 04. Commerce (3 sous-sections conditionnelles)
│   ├── Boutique* → Dashboard, Produits, Commandes, Coupons
│   ├── SaaS* → Plans, Abonnés
│   └── Réservations* → Rendez-vous, Services
├── 05. Équipe (4 items)
│   ├── Membres, Rôles, Équipes*, Messages
├── 06. Configuration (9 items)
│   ├── Branding, SEO, Paramètres, Feature flags
│   ├── Templates email, Traductions, Thèmes
│   └── Cookies, Redirections
├── 07. Système (10 items)
│   ├── Santé, Sauvegardes, Journaux, Sécurité
│   ├── Webhooks*, Erreurs*, Activité
│   └── Jobs échoués, Notifications, Infos système
└── 08. Outils (2 sous-sections conditionnelles)
    ├── IA* → Conversations, Base connaissances, Analytics
    └── Roadmap* → Tableaux

* = conditionnel (module nwidart)
```

### Mobile (bottom bar, < 992px)

```
[ Accueil ]  [ Contenu ]  [ Équipe ]  [ Config ]  [ Plus ]
   home       file-text     users      settings      menu
```

### Command palette (Cmd+K / Ctrl+K)

Composant Livewire `CommandPalette` accessible depuis toutes les pages admin.
- Fuzzy search sur tous les labels de navigation
- Filtrage par permissions utilisateur
- Debounce 300ms, max 10 résultats
- Escape pour fermer

## Patterns

| Pattern | Implementation |
|---------|---------------|
| Active state | `request()->routeIs()` avec wildcard (.index → .*) |
| Breadcrumbs | Composant `<x-backoffice::breadcrumb :items="[...]" />` |
| Scroll behavior | Bottom bar hide on scroll down, show on scroll up (mobile) |
| Sidebar toggle | Collapsed/expanded, état persistent (NobleUI natif) |
| Permissions | `Gate::forUser($user)->allows($permission)` par item |
| Modules | `Module::has() && Module::isEnabled()` conditionnel |
| Cache | Redis tag 'navigation', TTL 1h, invalidation via `NavigationService::invalidateCache()` |

## Breakpoints

| Breakpoint | Comportement |
|------------|-------------|
| Desktop >= 992px | Sidebar fixe (260px) + topbar + content |
| Tablet 768-991px | Sidebar overlay (hamburger), pas de bottom bar |
| Mobile < 768px | Bottom bar 5 items, sidebar accessible via "Plus" |

## Fichiers cles

| Fichier | Role |
|---------|------|
| `config/navigation.php` | Config sections + items + bottom_bar (fallback) |
| `Modules/Backoffice/app/Models/NavigationItem.php` | Model DB navigation_items |
| `Modules/Backoffice/database/seeders/NavigationSeeder.php` | Migration config → DB |
| `Modules/Backoffice/app/Services/NavigationService.php` | Lit DB si dispo, sinon config. Cache Redis, search |
| `Modules/Backoffice/resources/views/themes/backend/partials/sidebar.blade.php` | Sidebar dynamique (82 lignes) |
| `Modules/Backoffice/resources/views/themes/backend/partials/bottom-bar.blade.php` | Bottom bar mobile (107 lignes) |
| `Modules/Backoffice/app/Livewire/CommandPalette.php` | Command palette Cmd+K |
| `Modules/Backoffice/resources/views/livewire/command-palette.blade.php` | Vue command palette |

## Avant / apres

| Metrique | Avant | Apres |
|----------|-------|-------|
| Sidebar lignes | 567 | 82 |
| Items visibles | ~83 | ~50 (filtrés dynamiquement) |
| Niveaux profondeur | 3 | 2 max |
| Config hardcodee | Oui | Non (DB + fallback config) |
| Command palette | Non | Oui (Cmd+K) |
| Cache navigation | Non | Redis tag 1h |
| Tests navigation | 0 | 12 (Phase192Test) |
