# Feature flags — Laravel Pennant

> Auteur : MEMORA solutions
> Derniere mise a jour : 2026-04-04

## Vue d'ensemble

30 feature flags definis dans `app/Providers/AppServiceProvider.php` (lignes 52-87).
Driver : `database` (table `features`). Admin UI : `/admin/feature-flags`.

## Registre des flags

| Flag | Defaut | Categorie | Description |
|------|--------|-----------|-------------|
| `module-blog` | true | Core | CMS et gestion d'articles |
| `module-newsletter` | true | Core | Abonnements et campagnes email |
| `module-faq` | true | Core | Questions frequemment posees |
| `module-testimonials` | true | Core | Temoignages clients |
| `module-widget` | true | Core | Composants UI dynamiques |
| `module-formbuilder` | true | Core | Formulaires drag-and-drop |
| `module-customfields` | true | Core | Champs personnalises metadata |
| `module-translation` | true | Core | Gestion traductions multi-langues |
| `module-search` | true | Core | Recherche globale indexee |
| `module-export` | true | Core | Export CSV/PDF |
| `module-webhooks` | true | Core | Notifications HTTP sortantes |
| `module-media` | true | Core | Bibliotheque medias centralisee |
| `module-backup` | true | Core | Sauvegardes automatisees |
| `module-saas` | false | Business | Logique abonnements Stripe Cashier |
| `module-tenancy` | false | Business | Isolation base/domaine multi-tenant |
| `module-ai` | false | Business | Integrations LLM et automatisation |
| `module-team` | false | Business | Espaces collaboratifs et equipes |
| `module-abtest` | false | Business | Tests A/B sur composants UI |
| `module-import` | false | Business | Import massif de donnees |
| `module-sms` | false | Business | Notifications SMS Twilio/Vonage |
| `social-login` | false | Avance | OAuth2 Google, GitHub |
| `realtime-notifications` | false | Avance | WebSocket Laravel Reverb |
| `locale-es` | false | Avance | Localisation espagnol |
| `usage-billing` | false | Avance | Facturation a l'usage (API metering) |
| `referral-program` | false | Avance | Programme de parrainage |
| `email-preview` | false | Avance | Previsualisation email HTML |
| `status-page` | false | Infrastructure | Page de statut publique |
| `storage-admin` | false | Infrastructure | Explorateur fichiers S3/cloud |
| `dark-mode-frontend` | false | Infrastructure | Theme sombre CSS |
| `user-documentation` | false | Infrastructure | Guides integres et tooltips |

## Utilisation

```php
use Laravel\Pennant\Feature;

// Verifier un flag
if (Feature::active('module-ai')) {
    // Logique AI
}

// Dans Blade
@feature('module-blog')
    {{-- Contenu blog --}}
@endfeature
```

## Gestion

- **Base de donnees** : table `features` (scope global)
- **Admin UI** : `/admin/feature-flags` — toggle + conditions (pourcentage, roles, environnement, horaire)
- **CLI** : `php artisan pennant:feature-values`

## Architecture

Les flags controlent l'activation des modules. Un module desactive via flag reste installe mais ses fonctionnalites sont masquees dans l'interface admin (sidebar, dashboard).

Les flags sont evalues au boot dans `AppServiceProvider::boot()` et caches en base de donnees pour la session.
