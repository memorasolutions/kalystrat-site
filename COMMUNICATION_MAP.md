# Communication inter-modules — Laravel CORE (39 modules nwidart)

> MEMORA solutions — Derniere mise a jour : 2026-04-06

## Compteurs

| Element | Total |
|---------|-------|
| Modules nwidart | **39** |
| Interfaces (contracts) | **11** |
| Events | **17** |
| Listeners | **16** |
| Broadcast channels | **4** |
| Violations non gardees | **0** |

## Patterns utilises

| Pattern | Usage | Couplage |
|---------|-------|----------|
| Contracts (interfaces) | Appels synchrones via injection | Faible |
| Events/Listeners | Communication async inter-modules | Aucun |
| Observers | Sync auto KB (AI observe Blog/Pages/Faq) | Garde (class_exists) |
| class_exists() | Degradation gracieuse | — |
| Hub pattern | Orchestrateur (Backoffice admin, Api REST) | — |
| Config-driven nav | NavigationService + config/navigation.php | — |

## Matrice de communication

| Source | Cible | Mecanisme | Detail |
|--------|-------|-----------|--------|
| Blog | AI | Event | ArticleSaved → GenerateArticleSeoListener |
| Blog | AI | Event | CommentCreated → ModerateCommentListener |
| AI | Blog/Pages/Faq | Observer | KnowledgeSourceObserver (class_exists guard) |
| AI | Core | Contract | AiServiceInterface |
| Core | Auth | Event | UserCreated → SendWelcomeNotification |
| Laravel | Auth | Event | PasswordReset → InvalidateSessionsOnPasswordReset |
| Ecommerce | Ecommerce | Event | 7 events cycle commande → 7 listeners |
| Ecommerce | Notifications | Contract | SmsDriverInterface (confirmations SMS) |
| Backoffice | Tous | Hub | Orchestrateur admin (NavigationService config-driven) |
| Api | 6+ modules | Hub | Orchestrateur API REST |
| Notifications | Frontend | Broadcast | RealTimeNotification |
| AI | Frontend | Broadcast | AgentMessageReceived, HumanTakeoverRequested |
| Backoffice | Frontend | Broadcast | DashboardUpdated |
| Tous | Core | Contract | ServiceInterface, SettingsReaderInterface, UserInterface |
| Tous | ErrorMonitoring | Contract | ErrorReporterInterface |

## Services Backoffice

### NavigationService (config-driven)
- Config : `config/navigation.php` (8 sections, ~50 items)
- Cache : Redis tag 'navigation', TTL 1h
- Methodes : getNavigation(user), getBottomBar(user), search(query, user)
- Invalidation : NavigationService::invalidateCache()

### BreadcrumbService (auto-generation)
- Config : `config/breadcrumbs.php` (70+ labels)
- Fallback : genere depuis le nom de route (admin.x.y → X > Y)
- Integration : layout admin via @hasSection('breadcrumbs')

### CommandPalette (Cmd+K)
- Composant Livewire, fuzzy search, debounce 300ms
- 10 resultats max, filtre permissions, Bootstrap 5

## Regles d'integrite

### Regle 1 — Zero import direct entre modules business
```
OK  : Blog → (event) → AI
OK  : Ecommerce → (contract SmsDriverInterface) → Notifications
NON : Blog → use Modules\Ecommerce\Models\Order
```
Verification : tests architecture (48/48 GREEN)

### Regle 2 — Core = seul hub de contracts partages
Interfaces consommees par plusieurs modules → dans Core.
Interfaces internes → dans le module proprietaire.

### Regle 3 — Events pour le cross-module, contracts pour les services
| Besoin | Mecanisme |
|--------|-----------|
| Fait passe, reagir si on veut | Event |
| Service necessaire, implementation inconnue | Contract |

### Regle 4 — Pas de dependance cyclique
```
Modules business → Core (contracts)
Modules business → Events (decouples)
Core → Aucun module business
```

## Modules shared (importables par tous)
Core, Settings, Notifications, Auth, RolesPermissions, Backoffice, Media, Storage, Health, Logging, Translation, Webhooks, Backup, ErrorMonitoring

## Modules business (isolation verifiee)
Ecommerce, Booking, Newsletter, AI, SaaS, Tenancy, Blog, Pages, Faq, Testimonials, Team, Privacy, SEO, Menu, FormBuilder, Widget, ShortUrl, ABTest, Import, Export, Search, Editor, Roadmap, CustomFields
