# AdminTabler — Thème admin Tabler 1.4 modulaire

Module nwidart Laravel 12 fournissant le thème admin **Tabler.io v1.4** layout *"With overlap navbar"*.
Réutilisable cross-projets via copie module ou `composer require` (futur).

## Caractéristiques

- ✅ Tabler 1.4 (MIT, 38k⭐) + Bootstrap 5.3.7 + Tabler Icons (5800 SVG MIT)
- ✅ Layout `navbar-overlap` (sidebar verticale dark + navbar top + footer)
- ✅ Command palette Ctrl+K (recherche unifiée routes admin)
- ✅ Dark mode automatique (data-bs-theme + prefers-color-scheme)
- ✅ Branding dynamique via CSS vars (couleurs, polices, radius)
- ✅ Composants Blade anonymes : `<x-admintabler::sidebar />`, `<x-admintabler::navbar />`, etc.
- ✅ Consomme NavigationService existant (zéro réécriture menu)
- ✅ Coexistence Lucide Icons + Tabler Icons
- ✅ WCAG 2.2 AA conformity (focus-visible, target sizes 44px, prefers-reduced-motion)
- ✅ Vite + ESM natif

## Installation cross-projets

### Option A — Copie du module

```bash
cp -r /path/source/Modules/AdminTabler /path/target/Modules/
cd /path/target
echo '"AdminTabler": true' >> modules_statuses.json
npm install @tabler/core @tabler/icons-webfont simplebar
```

### Option B — Via vendor:publish (futur)

```bash
composer require memora/admin-tabler
php artisan vendor:publish --tag=admintabler-config
php artisan vendor:publish --tag=admintabler-views   # optionnel : override vues
```

### Étapes communes après installation

1. Ajouter dans `vite.config.js` :
   ```js
   'Modules/AdminTabler/resources/assets/sass/app.scss',
   'Modules/AdminTabler/resources/assets/js/app.js',
   ```

2. Migrer les vues admin existantes :
   ```bash
   grep -rl "@extends('backoffice::themes.backend.layouts.admin'" Modules --include="*.blade.php" \
     | xargs sed -i '' "s|@extends('backoffice::themes\.backend\.layouts\.admin'|@extends('admintabler::layouts.admin'|g"
   ```

3. Build + clear caches :
   ```bash
   npm run build && php artisan view:clear && php artisan optimize:clear
   ```

## Configuration `.env`

```bash
ADMIN_THEME=tabler
ADMIN_LAYOUT=navbar-overlap
ADMIN_PRIMARY_COLOR=#066fd1
ADMIN_FONT_FAMILY="Inter, system-ui, sans-serif"
ADMIN_BORDER_RADIUS=4px

# Features
ADMIN_COMMAND_PALETTE=true
ADMIN_DARK_MODE=true
ADMIN_BREADCRUMBS=true
ADMIN_PAGE_HEADER=true
```

## Architecture

```
Modules/AdminTabler/
├── app/Providers/
│   └── AdminTablerServiceProvider.php   # registre namespaces, composers, publishables
├── config/config.php                     # registry (publish: admintabler-config)
├── resources/
│   ├── assets/
│   │   ├── sass/app.scss                # Tabler + Tabler Icons + Simplebar + custom
│   │   └── js/app.js                    # Tabler core + Simplebar + Command Palette
│   └── views/
│       ├── layouts/admin.blade.php      # layout principal navbar-overlap
│       └── components/                  # composants Blade anonymes
│           ├── sidebar.blade.php
│           ├── navbar.blade.php
│           ├── page-header.blade.php
│           ├── footer.blade.php
│           └── command-palette.blade.php
├── module.json                           # alias: admintabler
└── README.md (ce fichier)
```

## Rollback rapide

Le thème précédent (NobleUI) est conservé dans `Modules/Backoffice/resources/views/themes/_backend.bak/`.

```bash
# Rollback complet (master a32deb6 + tag v-pre-tabler-2026-05-06)
git checkout v-pre-tabler-2026-05-06

# OU simplement basculer le layout via env (si AdminTabler garde NobleUI en parallèle)
ADMIN_THEME=nobleui  # à implémenter via switch dans Service Provider
```

## Compatibilité testée

| Stack | Version | Status |
|---|---|---|
| Laravel | 12.56 | ✅ |
| PHP | 8.4 | ✅ |
| Bootstrap | 5.3.7 | ✅ |
| Tabler | 1.4.0 | ✅ |
| Livewire | 4.x | ✅ (composants isolés) |
| Vite | 7.3 | ✅ |
| nwidart/laravel-modules | dernière | ✅ |

## Auteur

MEMORA solutions — info@memora.ca — https://memora.solutions
