# Audit architecture modulaire — laravel_vierge CORE

Date : 2026-04-05 | Score architecture : 7.5/10

## Synthese

39 modules nwidart actifs, architecture globalement saine. 3 problemes structurels identifies.

## 1. Code duplique (MUST-FIX)

### 1.1 scopeActive() — 42 modeles avec code identique

4 lignes copiees dans 42 modeles. Solution : trait `HasActiveScope` dans Core.

**Modeles affectes (echantillon)** : Product, Plan, Widget, Coupon, ShortUrl, EmailTemplate,
MetaTag, UrlRedirect, Subscriber, CookieCategory, Shortcode, Menu, Form, Bundle...

### 1.2 Livewire tables boilerplate — 14 composants, ~500 lignes dupliquees

Chaque table reimplemente : `updatingSearch()`, `resetFilters()`, `getBulkPageIds()`.
Les traits `HasBulkActions` et `HasTableSorting` existent deja. Manque : `HasTableFiltering`.

### 1.3 scopePublished() — 6 modeles

Le trait `HasScheduledPublishing` (Core) a deja `scopePublishedNow()` mais 6 modeles
reimplementent leur propre `scopePublished()` au lieu de l'utiliser.

## 2. Dependances inter-modules

### Architecture nwidart = modules qui s'importent mutuellement (par design)

Ce n'est PAS un probleme que Blog importe Auth ou que Api importe Blog.
Les vrais problemes sont :

### 2.1 Imports sans guard class_exists() — ~20 cas

La plupart des imports sont gardes correctement. Quelques oublis dans :
- `Core/PreviewController` : hardcode Blog + Pages sans class_exists()
- `Core/TemplatedNotification` : import Notifications (a un fallback, OK)

### 2.2 Modules "hub" (par design, acceptable)
- **Backoffice** depend de 22 modules — normal, c'est l'admin central
- **Core** utilise par 38/39 modules — normal, c'est le socle
- **Api** importe depuis 10+ modules — normal, c'est l'agregateur API

### 2.3 Modules safe a desactiver (15/39)
ABTest, Backup, Editor, Export, Health, Logging, Menu, Roadmap, ShortUrl,
Storage, Testimonials, Translation, Widget, ErrorMonitoring, CustomFields

## 3. Core — ce qui manque

| Absent | Usage potentiel | Priorite |
|--------|----------------|----------|
| **HasActiveScope** trait | 42 modeles | MUST-FIX |
| **HasTableFiltering** trait | 14 Livewire tables | SHOULD-FIX |
| PreviewController sans guards | Crash si Blog desactive | SHOULD-FIX |

### Ce qui est deja bien fait dans Core
- HasTableSorting (9 composants)
- HasBulkActions (16 composants)
- HasApiResponse + HasApiFiltering
- HasRevisions, HasScheduledPublishing, HasMeta, HasUuid
- BaseModuleServiceProvider (35+ modules)
- TemplatedNotification (15+ notifications)
- CrudService generique
- ModuleChecker

## 4. Ce qui ne necessite PAS d'action

- Services : bien separes, pas de duplication
- Middleware : 20 fichiers uniques, aucun doublon
- Config : module-specifique, pas de duplication
- Factories : 119/119 coherentes, pas de deprecated
- Notifications : pattern TemplatedNotification centralise
- API : BaseApiController + HasApiResponse bien utilises

## Plan de migration (3 actions)

### Action 1 : HasActiveScope trait (42 modeles)
- Creer `Modules/Core/app/Traits/HasActiveScope.php`
- Appliquer sur les 42 modeles, supprimer le scopeActive() inline
- ~168 lignes de duplication eliminees

### Action 2 : HasTableFiltering trait (14 tables)
- Creer `Modules/Core/app/Traits/HasTableFiltering.php`
- Extraire search, filter reset, getBulkPageIds patterns
- Appliquer sur les 14 composants Livewire
- ~200 lignes de duplication eliminees

### Action 3 : PreviewController guards
- Ajouter class_exists() sur Blog/Pages imports
- 2 lignes de code
