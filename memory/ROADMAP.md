---
name: Roadmap CORE template
description: Roadmap complète P1-P4 du projet laravel_vierge — tests, audits admin, Echo/Reverb, API
type: project
---

# Roadmap CORE template — laravel_vierge

Dernière mise à jour : 2026-04-04

## P1 — Tests modules (enrichir couverture) — COMPLÉTÉ

| Tâche | Avant | Après | Statut |
|-------|-------|-------|--------|
| ShortUrl PHPUnit → Pest | 12 PHPUnit | 12 Pest | ✅ |
| Blog ArticleRevisionService | 0 | 7 tests | ✅ |
| Blog DiffService | 0 | 8 tests | ✅ |
| Blog OEmbedController | 0 | 5 tests | ✅ |
| Webhooks enrichir | 5 | 12 tests | ✅ |
| Backup enrichir | 6 | 11 tests | ✅ |

## P1bis — Tests modules P2 (enrichir couverture) — COMPLÉTÉ

| Tâche | Avant | Après | Statut |
|-------|-------|-------|--------|
| Pages enrichir | 12 | 17 tests | ✅ |
| CustomFields enrichir | 7 | 11 tests | ✅ |
| Widget enrichir | 7 | 12 tests | ✅ |
| FormBuilder enrichir | 7 | 11 tests | ✅ |

## P2 — Audits admin complets (20+ modules)

Pour chaque module : admin CRUD fonctionnel, permissions RBAC, i18n, WCAG, tests.

| Module | Tests | Admin | Priorité | Notes |
|--------|-------|-------|----------|-------|
| Ecommerce | 190 | ✅ | Basse | Couverture complète |
| Newsletter | 80 | ✅ | Basse | CRUD campagnes complet (session 2026-04-04) |
| SaaS | 50 | ✅ | Basse | Admin plans dans Backoffice/PlanController |
| Auth | 31 | ❌ | Basse | User-facing only, normal |
| AI | 133 | ✅ | Basse | Couverture complète |
| Booking | 201 | ✅ | Basse | Couverture complète |
| Privacy | 42 | ✅ | Basse | Admin rights requests complet (session 2026-04-04) |
| SEO | 30 | ✅ | Basse | CRUD redirects + MetaTags complet dans Backoffice |
| Pages | 17 | ✅ | Basse | Enrichi session courante |
| Menu | 14 | ✅ | Basse | Routes dans Backoffice, 14/14 tests OK |
| Tenancy | 61 | ✅ | Basse | Couverture complète |
| Notifications | 30 | ✅ | Basse | CRUD email templates complet dans Backoffice |
| Settings | 15 | ❌ | Basse | Centralisé dans Backoffice |
| CustomFields | 11 | ✅ | Basse | Enrichi session courante |
| Widget | 12 | ✅ | Basse | Enrichi session courante |
| FormBuilder | 11 | ✅ | Basse | Enrichi session courante |

**P2 COMPLÉTÉ** (session 2026-04-04) :
- Tous les modules admin sont fonctionnels
- 2 fixes pré-existants corrigés (GoogleFontServiceTest, Phase142Test)
- Newsletter CRUD campagnes ajouté (+10 tests)
- Privacy admin rights requests ajouté (+10 tests)
- Permissions privacy ajoutées au seeder

## P3 — Echo/Reverb frontend temps réel — COMPLÉTÉ (2026-04-04)

- ✅ Laravel Reverb ^1.7 déjà installé et configuré
- ✅ 3 events ShouldBroadcast (RealTimeNotification, AgentMessage, HumanTakeover) + DashboardUpdated
- ✅ 6 channels (User, dashboard, dashboard.{teamId}, team.{teamId}, ai.agents, ai.conversation)
- ✅ echo.js conditionnel (VITE_REVERB_ENABLED)
- ✅ 8 tests broadcasting

## P4 — API & docs — COMPLÉTÉ (2026-04-04, sauf i18n)

- ✅ Scramble OpenAPI : déjà fonctionnel (82+ endpoints documentés)
- ✅ Settings API REST : GET /settings (publics), GET /settings/{key}, PUT /settings/{key} (auth)
- ✅ Search API REST : GET /search?q= (unifiée articles/pages/faqs)
- ✅ Storage admin API : GET /storage/disks, GET /storage/disks/{disk}/files (auth)
- ✅ i18n complété : 116 clés ajoutées → 4928 traductions EN, 0 manquante

## P5 — Qualité production (2026-04-04) — COMPLÉTÉ

- ✅ Security: middleware validation signature SMS webhook (Twilio/Vonage)
- ✅ Audit SQL raw: 29 requêtes = agrégations uniquement, 0 injection
- ✅ PHPStan niveau 6 → 7 (12 fixes + baseline 21)
- ✅ Horizon: 3 supervisors (high/default/low)
- ✅ Scheduler: withoutOverlapping + onOneServer sur 13 tâches
- ✅ Env validation: boot vérifie APP_KEY, DB, MAIL, DEBUG, SECURE_COOKIE
- ✅ Dependabot enrichi (labels, prefix, timezone, ignore Laravel major)
- ✅ Tests ImportService (+8 tests)
- ✅ Tests arch isolation cross-modules (23 tests, 954 assertions)
- ✅ API erreurs RFC 7807 Problem Details (rétro-compatible)
- ✅ Indexes DB: 8 tables expires_at corrigées
- ✅ N+1 prevention déjà en place

## P6 — Architecture + ErrorMonitoring (2026-04-04) — COMPLÉTÉ

- ✅ Module ErrorMonitoring : capture erreurs 404/403/429/500, fingerprinting, dashboard admin, cleanup schedulé
- ✅ Communication event-driven AI↔Blog : CommentCreated + ArticleSaved events, Listeners AI
- ✅ Audit architecture : AUDIT_REPORT.md (0 duplicat, 0 circulaire non protégé)
- ✅ COMMUNICATION_MAP.md : matrice 39 modules, patterns, guards
- ✅ Attribution MEMORA 100% (1578 fichiers)
- ✅ 3 factories manquantes créées (CategoryFactory, CouponFactory, MetaTagFactory)
- ✅ CI split tests anti-OOM (3 groupes : app + modules x2)
- ✅ PHPStan baseline réduit 21 → 17

## P7 — Améliorations (session 2026-04-04 bis) — PARTIELLEMENT COMPLÉTÉ

### Haute priorité — COMPLÉTÉ
1. ✅ PHPStan baseline 17 → 0 erreurs (commit 5fdd43c)
2. ✅ 17 modules enrichis : +79 tests (commits acc50ba, 3155669, 9a4a6ea)
3. ✅ 50 packages mis à jour + 2 CVE corrigées + passkeys ^1.6 (commit 3eb7f47)

### Moyenne priorité — COMPLÉTÉ
4. ✅ Pulse recorders déjà configurés (10 recorders actifs)
5. ✅ EVENTS.md + CONTRACTS.md créés (commit 3aaa7f7)
6. ✅ ErrorMonitoring Slack/Discord webhooks (commit 66c0a00) — graphiques Charts.js restent

### Nice-to-have — MIGRÉ vers P10-P11

## P8 — Sécurité (CRITIQUE) — COMPLÉTÉ (2026-04-04)

- ✅ S1 : 170 {!! !!} audités, 6 fichiers corrigés (Purifier::clean), reste confirmé safe
- ✅ S2 : 3 routes AI déjà throttled, EmailWebhookController corrigé (guard empty payload)
- ✅ S3 : KnowledgeBaseService get() → cursor() pour optimiser mémoire
- ✅ S4 : 32 controllers audités — GET-only, stubs ou input safe nativement
- Commit : edd78ba

## P9 — Stabilité + Performance �� COMPLÉTÉ (2026-04-04)

- ✅ T1 : OOM fixé — memory_limit 1G→512M, afterEach GC amélioré, peak workers ~443MB
- ✅ T2 : 3 controllers stubs supprimés + 6 routes vidées = -36 routes orphelines (849 routes)
- ✅ T3 : UPGRADE_MATRIX.md créé (14 packages major documentés)
- ✅ Bonus : 4 tests pré-existants corrigés + ArticleSeoObserver enregistré
- Commits : 157f9d6, c695dcb

## P10 — Qualité code + DX — EN COURS

- ✅ Q1 : +69 tests (Backoffice 44, AI 13, Api 11) — commit d1e5e20

| # | Tâche | Sévérité | Détails |
|---|-------|----------|---------|
- ✅ Q2 : ApexCharts ErrorMonitoring (area 30j, donut sévérité, bar top URLs) — commit 3666dea
- ⏭️ Q3 : Deptrac skip — deptrac-shim incompatible PHP 8.4, 23 tests arch existants suffisent
- ⏭️ Q4 : PHPStan 8 skip — 136 erreurs (User|null), ROI insuffisant, reste level 7 (0 erreurs)

## P11 — Documentation — COMPLÉTÉ (2026-04-04)

- ✅ D1 : FEATURE_FLAGS.md — 30 flags documentés (Core/Business/Avancé/Infrastructure)
- ⏭️ D2 : E2E Playwright skip — nécessite serveur local, tests fonctionnels suffisent
- ✅ D3 : ARCHITECTURE_C4.md — 3 diagrammes Mermaid (Context, Container, Component)
- ✅ D4 : ErrorReporterInterface — contrat configurable native/null/sentry, driver env var
- Commits : 3666dea, c2e387d

## Audit post-P11 — COMPLÉTÉ (2026-04-05)

- ✅ P0 : Pint 567 fichiers, Privacy throttle, PHPUnit update — commit 817479e
- ✅ P1 : N+1 fixes (CartService, SendWebPushNotification), 3 stubs supprimés — commit 641a849
- ✅ P2 : BookingCustomer casts, 5 DB indexes, 2 interfaces (Checkout, Embedding) — commits 5e17683, 871d268
- ✅ .env.example : 23 vars critiques + SESSION_SECURE_COOKIE + defaults production — commit 13a082a
- ✅ GitHub : repo privé memorasolutions/laravel-core-template, 230 commits — commit 5920056
- ✅ LICENSE : propriétaire MEMORA solutions — commit ea6af40
- ✅ Dependabot off, CI off, notifications off sur 6 repos
- ✅ Branche orpheline feature/plugin-architecture supprimée

## P12 — Futur (bloqué par prérequis externes)

| # | Tâche | Bloqueur | Quand | Statut |
|---|-------|----------|-------|--------|
| N1 | Laravel 13 + Pest 4 + PHPUnit 12 | mews/purifier v3.4.3 ne supporte pas L13 (PR #208 ouverte) | Quand PR mergée | Bloqué |
| N2 | E2E Playwright admin | Serveur local nécessaire | Session avec serveur | Bloqué |
| N3 | Tests Livewire (34 composants) | — | — | **COMPLÉTÉ** (2026-04-05) |
| N4 | Deptrac alternative | deptrac-shim incompatible PHP 8.4 | phparkitect v0.8.0 compatible | Actionable |
| N5 | API versioning v2 | Pas de besoin actuel | Quand breaking changes | Pas de besoin |
| N6 | OpenTelemetry tracing | Infrastructure pas prête | Quand infra prête | Bloqué |

### N3 — Tests Livewire — COMPLÉTÉ (2026-04-05)

- **150 tests** couvrant **34/34 composants Livewire** sur 6 modules
- Backoffice : 98 tests (20 composants — tables, managers, search, notifications)
- Auth : 21 tests (Login, Register, ForgotPassword, ResetPassword, TwoFactorChallenge, OnboardingWizard)
- AI : 12 tests (AiSeoAssistant, AiArticleGenerator, AiContentAssistant)
- Blog : 7 tests (BlogList, BlogSearch)
- Booking : 5 tests (BookingWizard)
- Pages : 5 tests (StaticPagesTable)
- Pattern : render, search, filters, sort, bulk actions, CRUD, validation
- MCP : qwen3-max (openrouter-free) × 3 comptes en parallèle (65-80% qualité → corrections SELF)
- Commits : 1304e35 (newline fix), 64da292 (Backoffice 98t), 31a9c11 (Auth+AI+Blog+Booking+Pages 52t)

## Résumé Laravel 13 (audit 2026-04-05)

- Laravel 13 v13.3.0 stable (17 mars 2026), 0 breaking changes, ~10 min upgrade
- **Bloquant unique** : mews/purifier v3.4.3 (seul package sans support ^13.0)
- PR #208 "Laravel 13.x Compatibility" ouverte sur mewebstudio/Purifier (2026-02-20), non mergée
- dev-master = toujours ^12.0
- nwidart/laravel-modules v13.0.0 disponible, phparkitect v0.8.0 compatible PHP 8.4
- 8 packages nécessitent upgrade majeur (voir UPGRADE_MATRIX.md)
- Recommandation : attendre PR #208 merge

## P13 — Améliorations (session 2026-04-05)

### P13-1 — Performance & caching — COMPLÉTÉ

- ✅ .env.example: CACHE_STORE=redis, QUEUE_CONNECTION=redis, RESPONSE_CACHE activé
- ✅ config/responsecache.php: driver Redis par défaut, cache tag 'response-cache'
- ✅ config/cache-ttl.php: TTL centralisés pour 10 types de cache
- ✅ app:cache-warmup: commande warmup settings, menus, branding, redirects
- ✅ UrlRedirectController: Cache::flush() remplacé par invalidation ciblée
- ✅ SecurityHeaders: API GET publics cachables (60s client, 300s CDN)
- ✅ 10 fichiers migrés vers config('cache-ttl.*')
- Commits : c5c11eb, 48cc548

### P13-2 — API maturity — COMPLÉTÉ

- ✅ HasApiFiltering: trait réutilisable (applyFilters, applySorting, getPerPage)
- ✅ BaseApiController: intègre HasApiFiltering pour tous les controllers
- ✅ BlogApiController: filtrage, tri, per_page configurable
- ✅ 3 endpoints Ecommerce wrappés avec Resource::collection()
- ✅ .env.example: SCRAMBLE_PATH=docs/api activé
- Commit : 6801f1b

### P13-3 — Docker prod — ANNULÉ (cPanel en production, pas Docker)

### P13-4 — CI/CD enrichi — COMPLÉTÉ

- ✅ Rector dry-run dans code-quality job
- ✅ PHPStan baseline drift detection (CI échoue si baseline non vide)
- ✅ Module tests : suppression || true, CI échoue si module échoue
- Commit : ccbbe4a

### P13-5 — Sécurité avancée — DÉJÀ EN PLACE

- Audit révèle : CSP middleware, spatie/activitylog, 7 rate limiters, SecurityHeaders, IP blocking
- Aucune action nécessaire

### P13-6 — DX — COMPLÉTÉ

- ✅ make setup: install complet + cache warmup en une commande
- ✅ make warmup: raccourci app:cache-warmup
- ✅ make quality: Pint + PHPStan en une commande
- Commit : 6658c28

## P14 — Ecommerce notifications + paiement + taxes (session 2026-04-05)

### P14-1 — Notifications client e-commerce — COMPLÉTÉ
- ✅ OrderRefunded event + SendOrderRefundNotification listener (queued)
- ✅ OrderDelivered event + OrderDeliveredNotification + listener (queued)
- ✅ RefundService dispatch OrderRefunded automatiquement
- ✅ OrderController admin dispatch OrderDelivered
- ✅ 6 email templates seeder (confirmation, shipped, delivered, refunded, low_stock, abandoned_cart)
- Commit : 4cefc48

### P14-2 — Stripe embedded checkout — COMPLÉTÉ
- ✅ createEmbeddedCheckoutSession() : ui_mode embedded, client_secret
- ✅ Apple Pay, Google Pay, BNPL (Klarna, Afterpay) natifs
- ✅ POST /checkout/embedded + GET /checkout/session-status
- ✅ Discounts via Stripe Coupon API
- Commit : 785d6d4

### P14-3 — Taxes internationales — COMPLÉTÉ
- ✅ UsTaxCalculator (50 etats + DC, taux 2026)
- ✅ EuVatCalculator (27 pays EU, TVA/VAT)
- ✅ Config ECOMMERCE_TAX_JURISDICTION env var (ca/us/eu)
- Commit : 04f3091

## P15 — Ecommerce avance (session 2026-04-05)

### P15-1 — Bundles produits — COMPLÉTÉ
- ✅ Bundle model : 3 pricing modes (fixed/percentage/sum), calculatePrice(), canFulfill()
- ✅ BundleItem model : pivot bundle↔variant avec quantite
- ✅ BundleService : addBundleToCart() via CartService
- ✅ API : GET /bundles, GET /bundles/{id}, POST /bundles/{id}/add-to-cart
- ✅ Migration : ecommerce_bundles + ecommerce_bundle_items
- Commit : 70f691c

### P15-2 — Analytics avancees — COMPLÉTÉ
- ✅ getCustomerLifetimeValues() : top clients par total depense
- ✅ getConversionRate() : ratio paniers→commandes
- ✅ getRevenueByMonth() : tendance revenus 12 mois
- Commit : 1ed4c1b

## P16 — Corrections critiques + architecture (session 2026-04-05)

### P16-C — Corrections securite — COMPLÉTÉ
- ✅ env() defaults (ErrorMonitoring, Booking)
- ✅ LIKE wildcard sanitization (Media search)
- ✅ Directory traversal protection (ImportController)
- ✅ ProcessAbandonedCarts withoutOverlapping()
- ✅ Upload validation mimes (Media)
- ✅ CommentModerationObserver enregistre (Phase164Test 15/15)
- Commits : 4303a03, d9aecaf

### P16-R — Refactorisation architecture — COMPLÉTÉ
- ✅ HasActiveScope trait → 34 modeles dedupliques (-142 lignes)
- ✅ 48/48 tests architecture GREEN (14 controllers, securite crypto, conventions)
- Commits : bb76c82, 97aba6f

## P17 — Securite avancee (session 2026-04-06) — COMPLÉTÉ

### P17-1 — Encrypted casts — COMPLÉTÉ
- ✅ User: two_factor_secret → encrypted, two_factor_recovery_codes → encrypted:array
- ✅ Setting: auto-encrypt/decrypt pour groupe 'secrets' (set + getTypedValue)
- ✅ 7 tests (Phase190Test) — chiffrement DB vérifié, lecture PHP OK
- Commit : 23e860c

### P17-2 — Invalidation sessions password reset — COMPLÉTÉ
- ✅ InvalidateSessionsOnPasswordReset listener (révoque tokens Sanctum + sessions DB)
- ✅ Enregistré dans Auth EventServiceProvider
- ✅ 3 tests (Phase191Test) — tokens supprimés, activity log
- Commit : 23e860c

## P18 — OOM fix (session 2026-04-06) — COMPLÉTÉ

- ✅ phpunit.xml memory_limit 512M → 1G
- ✅ Makefile: make test-full avec 1G + parallel
- Commit : 0b243b0

## P19 — Client deployment readiness (session 2026-04-06) — COMPLÉTÉ

- ✅ P19-1: DEPLOYMENT.md — 10 sections, checklist pré-production
- ✅ P19-2: .env.production.example — template complet production-ready
- ✅ P19-3: Horizon retry low priority 1 → 3
- Commits : 23e860c, 0b243b0

## P20 — Module READMEs (session 2026-04-06) — COMPLÉTÉ

- ✅ P20-1: MakeModuleCommand génère README.md au scaffold
- ✅ P20-2: app:generate-module-readmes — 39/39 modules documentés (auto-détection)
- Commit : 81fbce3

## P21 — DX et polish (session 2026-04-06) — COMPLÉTÉ

- ✅ P21-3: bootstrap/cache/preload.php — OPcache preload (config, models, middleware, routes)
- ⏭️ P21-1: skip — commentaires MEMORA = attribution légale CORE
- ⏭️ P21-2: skip — aucun CDN Tailwind détecté (déjà résolu)
- Commit : fcaef64

## NAV — Refonte architecture navigation (session 2026-04-06) — COMPLÉTÉ

### NAV-1 : NavigationService config-driven — COMPLÉTÉ
- ✅ NavigationService : getNavigation(), getBottomBar(), search(), invalidateCache()
- ✅ config/navigation.php : 8 sections, ~50 items, permissions + modules
- ✅ Cache Redis tag 'navigation', TTL 1h
- ✅ Singleton dans BackofficeServiceProvider
- Commit : f9448c1

### NAV-2 : Sidebar dynamique — COMPLÉTÉ
- ✅ sidebar.blade.php 567→82 lignes, 100% dynamique
- ✅ 2 niveaux max, active state wildcard, ARIA complet
- ✅ Backup sidebar.blade.php.bak conservé
- Commit : f9448c1

### NAV-3 : Command palette Livewire (Cmd+K) — COMPLÉTÉ
- ✅ Composant CommandPalette : fuzzy search, debounce 300ms, 10 résultats max
- ✅ Bootstrap 5 modal overlay, backdrop-blur, dark mode
- ✅ Cmd+K / Ctrl+K global, Escape fermer
- ✅ Intégré dans layout admin.blade.php
- Commit : 6a800a5

### NAV-4 : Bottom bar mobile — CONSERVÉ
- ✅ Déjà fonctionnel (5 items, WCAG, safe-area, dark mode)
- ⏭️ Refactoring config-driven reporté (risque régression sans serveur)

### NAV-5 : Tests navigation — COMPLÉTÉ
- ✅ 12 tests Phase192Test (config, permissions, search, cache)
- Commit : 3623e1f

### NAV-6 : Documentation — COMPLÉTÉ
- ✅ NAVIGATION_AUDIT.md : diagnostic avant/après, 14 métriques
- ✅ NAVIGATION_MAP.md : arborescence 8 sections, patterns, breakpoints
- Commit : e1bca29

## TODO — Améliorations finales (session 2026-04-06) — COMPLÉTÉ

### TODO-1 : Breadcrumbs systématiques — COMPLÉTÉ
- ✅ BreadcrumbService : auto-génération depuis route name (70+ labels)
- ✅ config/breadcrumbs.php : dictionnaire segments → labels
- ✅ Layout admin : fallback auto via @hasSection
- Commit : 625b03c

### TODO-2 : Rail collapsed sidebar — REPORTÉ
- ⏭️ NobleUI a déjà toggle natif. Rail 60px icônes nécessite CSS custom + vérification visuelle
- À faire quand serveur local disponible

### TODO-3 : Fix N+1 patterns — COMPLÉTÉ
- ✅ AI ConversationController : foreach N+1 → single GROUP BY query
- ✅ ActivityLogsTable : 3 queries cachées 1h (users, log_names, events)
- Commit : 22285c2

## FORM — Refonte formulaires (session 2026-04-06) — COMPLÉTÉ

- ✅ Audit exhaustif 55+ formulaires — 89% déjà optimaux
- ✅ Blog tags create/edit : name+color multi-colonnes
- ✅ Tenancy tenants create/edit : name+slug, domain+owner col-md-6
- ✅ Roadmap boards create/edit : name+color multi-colonnes
- Commit : 6426234

## COMM — Communication inter-modules (session 2026-04-06) — COMPLÉTÉ

### COMM-1 : Guard violations cross-module — COMPLÉTÉ
- ✅ 2 violations corrigées (AI ModerationController, Tenancy TenantController)
- ✅ 3 faux positifs identifiés (déjà gardés par class_exists)
- ✅ 0 violation restante entre modules business
- Commit : 9f58c4e

### COMM-2 : Contracts + events — DÉJÀ COMPLET
- ✅ 11 interfaces dans le code (5 Core, 2 AI, 2 Ecommerce, 1 ErrorMonitoring, 1 Notifications)
- ✅ 17 events + 16 listeners
- Pas de nouveau à créer

### COMM-3 : Documentation mise à jour — COMPLÉTÉ
- ✅ CONTRACTS.md : 8→11 interfaces documentées
- ✅ EVENTS.md : 14→17 events, 16 listeners complets
- ✅ COMMUNICATION_MAP.md : matrice complète, NavigationService, BreadcrumbService, CommandPalette
- Commit : c64c91d

## PRIV — Conformite vie privee (session 2026-04-06) — COMPLETE

- Voir session_2026-04-06_mega.md

## P22 — Composant Blade public temoignages (session 2026-04-06 bis) — COMPLETE

- ✅ Composant anonyme `<x-testimonials::testimonials-carousel />` (grid/carousel Bootstrap 5)
- ✅ Props: limit, layout ('grid'|'carousel'), columns — guard class_exists
- ✅ Carte partielle _card.blade.php (avatar initiales, rating etoiles, safeContent, WCAG)
- ✅ Vue publique /testimonials avec layout legal Tailwind
- ✅ Enregistrement anonymousComponentPath dans TestimonialsServiceProvider
- ✅ 7 tests Pest (route 200, approved/unapproved, vide, grid, carousel, empty)
- Commit : b72c4a6

## P23 — User consent dashboard (session 2026-04-06 bis) — COMPLETE

- ✅ Migration: user_id, action, type ajoutes a user_consents (fix bug silencieux)
- ✅ UserConsent: relation user(), scopeForUser(), fillable mis a jour
- ✅ UserConsentController: index (historique), update (preferences), export JSON (RGPD art.20)
- ✅ Routes auth: GET /account/privacy, PUT /account/privacy/consent, GET /account/privacy/export
- ✅ Vue NobleUI: preferences actuelles + toggles switches + historique table + export
- ✅ 6 tests Pest (auth guard, redirect guest, CRUD, export isolation, Content-Disposition)
- Commit : 99db56f

## P24 — Cookie scan command (session 2026-04-06 bis) — COMPLETE

- ✅ CookieScanCommand: scanne Cookie::make/queue/forget + cookie() helper dans app/ + Modules/
- ✅ Detecte cookies statiques (session, XSRF-TOKEN, cookie_consent) + dynamiques
- ✅ Output table console ou --json pour export audit RGPD/Loi 25
- ✅ 4 tests Pest
- Commit : 2976fce

## Ce qui reste (basse priorite, non bloquant)

| Item | Priorite | Bloqueur |
|------|----------|----------|
| N2 E2E Playwright | Basse | Serveur local (.env APP_URL) |
| Bottom bar config-driven | Basse | Serveur local |
| Rail collapsed sidebar | Basse | Serveur local |
| Composant FAQ public | Basse | — |
| Composant Newsletter subscribe | Basse | — |
| Health check endpoint /health | Basse | — |
| Sitemap dynamique enrichi | Basse | — |

**Note** : Laravel 13 = non, on reste sur Laravel 12 (decision utilisateur 2026-04-06).
