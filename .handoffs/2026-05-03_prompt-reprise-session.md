# Prompt de reprise — Session Kalystrat (à copier-coller dans nouvelle session Claude Code CLI)

Copie tout le bloc ci-dessous (entre les lignes `---`) dans le terminal Claude Code après avoir fait `cd /Users/stephanelapointe/__IA__/_____SERVEUR_____/site_internet/kalystrat`.

---

Tu reprends une session de travail sur le projet Kalystrat (Laravel 12, nwidart Modules, site web compagnie québécoise de construction). La session précédente a été clôturée le 2026-05-03 avec un handoff structuré complet.

**ÉTAPE 1 — Charger le contexte (OBLIGATOIRE avant toute action)** :

1. Lis intégralement le handoff de session précédente : `/Users/stephanelapointe/__IA__/_____SERVEUR_____/site_internet/kalystrat/.handoffs/2026-05-03_session-handoff.md`
2. Lis le rapport photos : `/Users/stephanelapointe/__IA__/_____SERVEUR_____/site_internet/kalystrat/.rapports/rapport-2026-05-03-photos.md`
3. Vérifie l'état git : `cd /Users/stephanelapointe/__IA__/_____SERVEUR_____/site_internet/kalystrat && git status` (modifications session précédente non committées)
4. Vérifie que le serveur tourne : `curl -sI https://kalystrat.test | head -1` (doit retourner 200/301)
5. Vérifie ces 5 fichiers clés modifiés :
   - `Modules/Frontend/resources/views/layout.blade.php`
   - `Modules/Frontend/resources/views/home.blade.php`
   - `Modules/Frontend/resources/views/partials/page-banner.blade.php`
   - `Modules/Frontend/resources/views/layouts/legal-shell.blade.php` (créé)
   - `.env` (PRIVACY_LAYOUT, COMPANY_*, ADMIN_*)

**ÉTAPE 2 — Synthèse du contexte** :

Après lecture, fais-moi un résumé en 10 lignes max de :
- Ce qui a été accompli session précédente (résumé exécutif)
- Score WCAG AAA atteint (homepage + pages internes)
- Patterns architecturaux créés
- Faux positifs axe-core documentés (à NE PAS retoucher)
- Actions critiques avant déploiement prod

**ÉTAPE 3 — Planification exhaustive** :

Crée un plan exhaustif et détaillé de la suite du travail Kalystrat avec une todo list complète via TaskCreate. Le plan doit couvrir au minimum :

### A. Validation et stabilisation (priorité haute)
1. Audit WCAG AAA des autres pages internes : /a-propos, /realisations, /contact, /faq, /carrieres, /filiales/fondations, /filiales/structure, /filiales/toiture, /filiales/finition, /filiales/immobilier, /filiales/placement (11 pages, audit individuel via mcp__wcag-mcp__wcag_audit_aaa, screenshot Playwright preuve)
2. Test responsive mobile (< 768px) des nouveaux composants : disclosure Filiales (ouverture mobile via burger), trust signals colonne contact, breadcrumb, target size 44x44 sur mobile
3. Validation des 4 pages légales Privacy avec Layout Slot : /politique-confidentialite, /conditions-utilisation, /politique-cookies, /demande-droits (vérifier extension du shell frontend OK)
4. Vérifier qu'aucune régression visuelle n'est apparue sur les sections déjà corrigées (contact, hero slider, cards projets)

### B. Audit qualité globale (priorité moyenne)
5. Audit Lighthouse complet de la homepage et 3 pages internes (Performance, SEO, Best Practices, PWA)
6. Audit sémantique HTML5 : landmarks (`<main>`, `<nav>`, `<aside>`, `<footer>`) cohérents, headings hiérarchiques h1→h6 sans saut, role="region" avec aria-label
7. Vérifier les abréviations encore non balisées avec `<abbr title>` (RBQ, GCR, CCQ, OACIQ, CNESST, APCHQ, TPS, TVQ, etc.)
8. Audit performance : LCP, CLS, INP via Web Vitals
9. Audit sécurité prod via mcp__security__sec_full_audit (headers, SSL, CVE) — pour la version qui sera déployée

### C. Refactor et code quality (priorité basse)
10. Standardiser le pattern Disclosure dans un component Blade réutilisable `<x-frontend::disclosure>` (factoriser le code de Filiales)
11. Extraire les CSS du `<style>` inline du layout.blade.php vers un fichier CSS dédié `kalystrat-overrides.css`
12. Vérifier que le partial page-banner.blade.php est utilisé partout de manière cohérente
13. Documentation interne : ajouter un README dans Modules/Frontend expliquant les patterns Memora utilisés

### D. Préparation déploiement production (CRITIQUE)
14. ⚠️ **Changer le mot de passe superadmin** stephane@memora.ca (Admin123! → passphrase 16+ chars). Vider ADMIN_PASSWORD dans .env de prod après seed.
15. `.env` prod : `APP_DEBUG=false`, `TELESCOPE_ENABLED=false`, `FORCE_HTTPS=true`, `RESPONSE_CACHE_ENABLED=true`
16. Configurer Cloudflare : DNS, SSL, Page Rules cache, CSP headers
17. Setup CI/CD GitHub Actions avec audit AAA automatique sur PR (axe-cli)
18. Tester le déploiement sur server.memora.pro via mcp__cpanel + laravel-deployer
19. Smoke test post-déploiement : login admin, formulaire contact, navigation principale, pages légales

### E. Suivi et observabilité (long terme)
20. Configurer Sentry (SENTRY_LARAVEL_DSN dans .env prod)
21. Configurer GA4 + GSC pour suivi trafic et indexation
22. Configurer Pulse pour monitoring Laravel
23. Mettre en place backups automatiques (spatie/laravel-backup déjà installé)

**Format demandé pour la planification** :
- Crée chaque tâche via TaskCreate avec un titre clair (verbe d'action) et une description détaillée
- Groupe les tâches par section (A, B, C, D, E)
- Marque les dépendances (TaskUpdate addBlockedBy) entre les tâches
- Estime la priorité implicite par l'ordre

**ÉTAPE 4 — Présentation du plan au user** :

Une fois le plan créé via TaskCreate, présente-moi :
- Le nombre total de tâches créées
- La répartition par priorité (A/B/C/D/E)
- La tâche recommandée pour démarrer en premier (avec justification courte)
- Les bloqueurs éventuels qui nécessitent décision/info de ma part

**ÉTAPE 5 — Attente de validation** :

NE COMMENCE AUCUN TRAVAIL D'IMPLÉMENTATION avant que je valide explicitement le plan. Tu peux faire des recherches/lectures pour préparer, mais aucune modification de fichier.

---

## Règles strictes à respecter (rappel CLAUDE.md global) :

1. **Délégation par défaut** : utilise multi-ai-mcp / openrouter pour tout raisonnement long, perplexity-pro-playwright pour recherche web. Toi (Opus) = chef d'orchestre, pas musicien.
2. **Visual validation OBLIGATOIRE** : Playwright screenshot avant de déclarer une tâche complétée — TOUTES tâches sans exception (règle stricte user 2026-05-03).
3. **Tu décides, tu ne demandes pas** : tranche les choix techniques en autonomie. Question uniquement si ambiguïté métier réelle.
4. **Anti-régression** : avant chaque action non triviale, te demander "qu'est-ce qui pourrait casser ?". Lire avant d'écrire.
5. **Préambule [PLAN]** avant chaque appel d'outil (sauf réponse triviale ≤3 lignes).
6. **Pas de migrate:fresh, pas de DROP, pas de suppression sans demander.**
7. **Pas d'alert/confirm/prompt navigateur natif** — toujours modale ou toast du thème.
8. **Memora CORE** : modules nwidart activables, zéro hardcode, .env pour infra, settings DB pour contenu.
