# Architecture C4 — Laravel CORE template

> Auteur : MEMORA solutions
> Derniere mise a jour : 2026-04-04

## 1. Diagramme de contexte

```mermaid
C4Context
    title Contexte — Plateforme Laravel 12

    Person(admin, "Administrateur", "Gere le contenu et les utilisateurs")

    System(platform, "Laravel CORE", "Plateforme admin 39 modules nwidart")

    System_Ext(stripe, "Stripe", "Paiements et abonnements")
    System_Ext(openrouter, "OpenRouter", "API IA (chat, SEO, moderation)")
    System_Ext(smtp, "SMTP", "Envoi de courriels")
    System_Ext(reverb, "Laravel Reverb", "WebSocket temps reel")
    System_Ext(twilio, "Twilio/Vonage", "SMS et telephonie")

    Rel(admin, platform, "Utilise via navigateur")
    Rel(platform, stripe, "Paiements")
    Rel(platform, openrouter, "Appels IA")
    Rel(platform, smtp, "Courriels")
    Rel(platform, reverb, "Notifications temps reel")
    Rel(platform, twilio, "SMS")
```

## 2. Diagramme de conteneurs

```mermaid
C4Container
    title Conteneurs — Plateforme Laravel 12

    System_Boundary(sb, "Laravel CORE") {
        Container(web, "Application web", "PHP 8.4, Laravel 12", "Admin panel + API REST/GraphQL")
        Container(horizon, "Queue worker", "Laravel Horizon", "Jobs asynchrones, emails, webhooks")
        ContainerDb(mysql, "Base de donnees", "MySQL 8", "Donnees applicatives")
        Container(redis, "Cache + Queue", "Redis", "Cache, sessions, files d'attente")
        Container(reverb, "WebSocket", "Laravel Reverb", "Notifications temps reel")
    }

    Rel(web, mysql, "Lit/ecrit")
    Rel(web, redis, "Cache + queue")
    Rel(web, horizon, "Dispatch jobs")
    Rel(web, reverb, "Broadcast events")
    Rel(horizon, mysql, "Lit/ecrit")
    Rel(horizon, redis, "Consume queue")
```

## 3. Diagramme de composants (modules)

```mermaid
graph TD
    subgraph Hub["Hub (orchestrateurs)"]
        Backoffice["Backoffice<br/>Admin panel"]
        Api["Api<br/>REST v1 + GraphQL v2"]
    end

    subgraph Core["Core (fondations)"]
        CoreM["Core"]
        Settings["Settings"]
        Auth["Auth"]
        Roles["RolesPermissions"]
        Media["Media"]
        Notif["Notifications"]
    end

    subgraph Content["Content (gestion contenu)"]
        Blog["Blog"]
        Pages["Pages"]
        Faq["Faq"]
        Newsletter["Newsletter"]
        Menu["Menu"]
        Testimonials["Testimonials"]
    end

    subgraph Business["Business (logique metier)"]
        Ecommerce["Ecommerce"]
        Booking["Booking"]
        SaaS["SaaS"]
        Tenancy["Tenancy"]
        AI["AI"]
        Team["Team"]
    end

    subgraph DX["DX (operations)"]
        ErrorMon["ErrorMonitoring"]
        Health["Health"]
        Logging["Logging"]
        Backup["Backup"]
        Export["Export"]
    end

    Backoffice --> Core
    Backoffice --> Content
    Backoffice --> Business
    Backoffice --> DX
    Api --> Core
    Api --> Content
    Api --> Business

    Blog -.->|Event| AI
    AI -.->|Observer| Blog
    AI -.->|Observer| Pages
    AI -.->|Observer| Faq

    style Hub fill:#4f46e5,color:#fff
    style Core fill:#059669,color:#fff
    style Content fill:#2563eb,color:#fff
    style Business fill:#d97706,color:#fff
    style DX fill:#7c3aed,color:#fff
```

## Regles de communication

- **Hub** (Backoffice, Api) peut importer tous les modules
- **Core** est importable par tous
- **Business** modules sont isoles (pas d'import croise)
- Communication inter-business uniquement via **Events/Listeners** avec `class_exists()` guard
- Voir `COMMUNICATION_MAP.md` pour la matrice detaillee
