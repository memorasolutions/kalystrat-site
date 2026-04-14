# Matrice upgrade packages major

> Derniere mise a jour : 2026-04-04
> Statut : documentation pre-upgrade, aucune action requise maintenant

## Packages outdated (major)

| Package | Actuel | Disponible | Effort | Priorite | Notes |
|---------|--------|------------|--------|----------|-------|
| laravel/framework | 12.56.0 | 13.3.0 | Faible (~10 min) | P12 | Cache prefixes, session cookie names, Container::call nullable |
| nwidart/laravel-modules | 12.0.5 | 13.0.0 | Faible-Moyen | P12 | Aligne sur Laravel 13, verifier compatibilite modules |
| pestphp/pest | 3.8.6 | 4.4.5 | Faible | P12 | Requis par Laravel 13, browser testing natif |
| pestphp/pest-plugin-laravel | 3.2.0 | 4.1.0 | Faible | P12 | Suit Pest 4 |
| phpunit/phpunit | 11.5.50 | 13.1.0 | Moyen | P12 | Laravel 13 requiert ^12.0 |
| laravel/scout | 10.25.0 | 11.1.0 | Faible | P12 | Alignement framework |
| laravel/tinker | 2.11.1 | 3.0.0 | Faible | P12 | Changements mineurs |
| pragmarx/google2fa-laravel | 2.3.1 | 3.0.1 | Faible | P12 | Verifier API 2FA |
| spatie/laravel-activitylog | 4.12.3 | 5.0.0 | Inconnu | P12 | Verifier changelog officiel |
| spatie/laravel-backup | 9.4.1 | 10.2.1 | Inconnu | P12 | Verifier changelog officiel |
| spatie/laravel-permission | 6.25.0 | 7.2.4 | Inconnu | P12 | Verifier changelog officiel, critique RBAC |
| spatie/laravel-query-builder | 6.4.4 | 7.1.0 | Inconnu | P12 | Verifier changelog officiel |
| spatie/laravel-responsecache | 7.7.2 | 8.3.0 | Faible | P12 | Cache invalidation API |
| spatie/laravel-sitemap | 7.4.0 | 8.1.0 | Faible | P12 | Changements mineurs |

## Strategie de migration recommandee

1. Attendre Laravel 13 stable + tous les packages Spatie compatibles
2. Migrer en une seule session : Laravel 13 + Pest 4 + PHPUnit 12 + nwidart 13
3. Puis monter les packages Spatie un par un avec tests entre chaque
4. Verifier 0 regression apres chaque upgrade

## Pre-requis

- PHP 8.3+ (actuellement 8.4.19 — OK)
- Tous les tests passent avant migration
- Branche dediee `upgrade/laravel-13`

## CVE connues

Aucune CVE active sur les versions actuelles (verifie 2026-04-04).
