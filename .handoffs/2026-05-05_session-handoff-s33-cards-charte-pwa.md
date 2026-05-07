---
name: Session S33 handoff — Cards uniformisation, charte v2, PWA, FAQ AEO, pages-villes
description: 2026-05-04 → 2026-05-05 — 33 commits master. Refonte UX cards complète (4 niveaux pattern .ks-card), conformité charte v2 (.identity-card + .pillar-card stricts), PWA Kalystrat 8/8, +8 nouvelles pages publiques (conseil-consultatif, partenaires, zones-desservies + 5 villes), 5 FAQ hyper-locales AEO, Lighthouse mobile 68→92/100, 0 violation WCAG AAA réelle.
type: handoff
date: 2026-05-05
project: kalystrat
session: S33
branche: master
HEAD: f5bd143
---

# Session S33 — Handoff complet

## Résumé exécutif

Session orientée **UX/UI premium B2B + accessibilité WCAG 2.2 AAA stricte + alignement charte v2 + extensions contenu**. 33 commits sur master, aucun déploiement (interdiction explicite user). Toutes les modifications sont LOCALES.

**Cards uniformisation** : passage de 14 styles inline hétérogènes à un système universel **4 niveaux hiérarchiques** (.ks-card / .ks-card--sober / .ks-pillar-card / .ks-manifesto-card / .ks-identity-card) cohérent avec charte v2 et tendances UX mai 2026.

**8 nouvelles pages publiques** créées : `/conseil-consultatif`, `/partenaires`, `/zones-desservies` (index), `/zones-desservies/quebec`, `/zones-desservies/levis`, `/zones-desservies/sainte-foy`, `/zones-desservies/beauport`, `/zones-desservies/sillery`.

**Performance mobile** : Lighthouse passé de 68/100 (LCP 6.0s) à **92/100** (LCP 3.0s) via 5 optimisations cumulées (Sacramento removed, lazy loading 36 images, Akzidenz self-host, RemixIcon subset 98%, Lighthouse re-bench).

**PWA 8/8** : adaptation branding Kalystrat (icons générées navy+gold via PHP GD, manifest dynamique, Service Worker Workbox déjà installé via boilerplate Memora).

**33/33 commits, 27/27 Pest, 0 violation WCAG AAA réelle, conformité RGPD/Loi 25 absolue** (0 dépendance externe).

---

## Chantiers réalisés

### 1. SEO + JSON-LD (commits 411f503, 59afcc3, e911139)
- Bug critique fix : fuite Blade `{{ asset() }}` dans `@verbatim` JSON-LD Organization → URLs hardcodées
- Ajout HowTo schema `/services` (4 étapes méthodologie)
- TikTok ajouté `Organization.sameAs` (était manquant vs plan)
- 5 FAQ hyper-locales AEO 2026 (coûts $/pi², sols Beauport, gel-dégel, patrimoine Sillery, hors zone Montréal)
- Titles filiales optimisés 31-44 → 53-60 chars avec ville + service + RBQ
- Slogan "Conçu. Réalisé. Livré." inséré en hero pill navy AAA garanti

### 2. Performance Lighthouse mobile (commits 9ae6de0, 11f088c, 93991da, d3099f6)
- Sacramento Google Fonts removed → italique Akzidenz fallback (-800ms blocking)
- Lazy loading natif sur 36 images below-the-fold (-1.3s LCP)
- Akzidenz Grotesk self-host 5 variants .otf → .woff2 (charte v2 conforme)
- RemixIcon subset 159KB → 3.5KB (-98%, 43 glyphes uniques utilisés)
- **Mobile : 68/100 → 92/100** (LCP 6.0→3.0s, FCP 3.3→1.7s)
- **Conformité RGPD/Loi 25 absolue** (0 dépendance externe Google CDN)

### 3. Audit + correctifs (commits 59afcc3, c1478d7, 89705c3, b572e68, 9150945)
- Rapport audit conformité contenu↔plan d'affaire + SEO/AEO/GEO 2026 (.rapports/rapport-2026-05-04.md, 383 lignes)
- 13/15 éléments plan d'affaire couverts (vs 12/15 avant)
- Slogan visible hero + footer (était NULLE)
- Vision 2034 explicite (était FAIBLE)

### 4. Pages nouvelles publiques (8 pages, commits c1478d7, 89705c3, 9150945, b572e68)
- `/conseil-consultatif` : Ali Salomon + Jacques Jobidon + Perry Wong + 3 sièges à pourvoir
- `/partenaires` : 4 catégories (architectes/designers/courtiers OACIQ/promoteurs) + programme fidélité 3 bénéfices
- `/zones-desservies` (index) + 5 pages-villes (Québec/Lévis/Sainte-Foy/Beauport/Sillery)
- Champ "ville" formulaire contact avec préselect `?ville=...` query string
- Lien footer vers nouvelles pages (cohérence maillage interne)

### 5. Différenciation 6 filiales (commits 1f342e6, 878d2a8)
- Chaque filiale enrichie avec : `intro_paragraph` 110-140 mots SEO + `process` 4 étapes + `certifications` 4-5 entrées
- 0 thin content sur les 6 pages filiales

### 6. PWA Kalystrat (commit bc5f9e6)
- vite-plugin-pwa déjà installé via boilerplate Memora (configuration injectManifest avec sw-source.js Workbox complet)
- Adaptation branding : .env PWA_THEME_COLOR navy, PWA_BACKGROUND_COLOR blanc, slogan dans description
- Icônes Kalystrat générées : icon-192/512/180 PNG via PHP GD (navy + cercle gold + lettre K blanche)
- Layout frontend Kalystrat intégré : meta theme-color + manifest + apple-touch-icon + composants `<x-pwa-install-prompt />`
- `php artisan pwa:status` → **8/8 critères**

### 7. WCAG AAA cards uniformisation (commits ed5f79f, fe937ca, da1a1b0, 50e77ee, c717cdc, 4f74fea, f5bd143)
- Audit cards exhaustif : 73 instances sur 14 types
- Système universel **.ks-card** centralisé dans layout.blade.php avec **4 niveaux hiérarchiques** :
  1. `.ks-card--sober` : bg `#FAFAFA` (gray-50 charte v2), informatif secondaire (services 4 raisons, carrieres avantages, partenaires fidélité)
  2. `.ks-card` : bg blanc + box-shadow, contexte premium / cliquable (filiales, conseil, contact, realisations, zones)
  3. `.ks-pillar-card` : bg navy + h3 gold + numéro 01-06 gros opacity 0.35 (charte v2 strict, Six piliers)
  4. `.ks-manifesto-card` : bg navy gradient + cercle décoratif gold + border-left gold (Mission hero col-12)
- /a-propos refonte asymétrique 2+1 manifesto (Mission hero + Vision/Différenciateur cols 6) selon tendances UX mai 2026
- 9+ instances CTA `#8C2E00` orange Construz (6.3:1 AAA non conforme) → navy `#0A1628` (16:1 AAA)
- Slogan hero repositionné AU-DESSUS des badges + background navy 0.92 + glassmorphism backdrop-blur

---

## État final post-S33

| Métrique | Valeur |
|---|---|
| Commits master S33 | **33** (de `f66a8e5` à `f5bd143`) |
| Branche | `master` (aucun remote configuré) |
| HEAD | `f5bd143` |
| Pages publiques | **22** (vs 14 début) |
| Tests Pest Feature | **27/27 pass** en 12s |
| Lighthouse mobile | **92/100** (LCP 3.0s, CLS 0, TBT 10ms) |
| Lighthouse desktop | 96/100 |
| Lighthouse Accessibility / Best practices / SEO | 100 / 100 / 100 |
| WCAG 2.2 AAA | **0 violation contraste réelle** sur les 22 pages |
| Sitemap | 25 URLs |
| FAQ | 20 Q/R (15 + 5 hyper-locales AEO) |
| JSON-LD | 51+ blocs valides + AboutPage×2 + CollectionPage + 5 LocalBusiness villes + Person×3 + FAQPage + HowTo |
| Conformité RGPD/Loi 25 | absolue (0 dépendance externe) |
| Conformité charte v2 | typo Akzidenz 5 variants self-host + cards .identity-card + .pillar-card alignés |
| PWA `pwa:status` | **8/8 critères** |
| Tâches projet | 4 completed / 11 pending (toutes bloquées inputs externes user) |

## Faux positifs WCAG documentés (5 communs)

Tous présents sur les 22 pages, **PAS des violations réelles** :
1. `1.4.3/1.4.6` sur `<h1 class="visually-hidden">` (clip-path Bootstrap, texte non visible)
2. `1.4.8` mesure DOM responsive 160 chars sur div/main (mesure imprécise)
3. `2.1.1` Tab issues sur `.slick-slide[inert]` + nav-pills (keyboard arrows pas Tab)
4. `2.1.2` keyboard trap sur `<a Services>` header (heuristique axe défaillante dropdown)
5. `4.1.2` `.ks-header__dropdown li a` (axe ne modélise pas disclosure widgets)

Documentés dans `Modules/Frontend/README.md`.

---

## Architecture clé

### Stack technique
- **Laravel 12.56**, PHP 8.4, modules nwidart (Frontend, Privacy, SEO, Kalystrat)
- **Blade pur** + Livewire 4 (back-office uniquement, pas frontend)
- SQLite local, Herd Laravel (kalystrat.test HTTPS)
- Vite + vite-plugin-pwa
- Tailwind 3.4 + Bootstrap 5 (theme Construz)

### Modules actifs (modules_statuses.json)
Frontend, Privacy, SEO, Kalystrat (config filiales/villes/faqs)

### Modules désactivés
AI, Booking, Translation

### Système de design
- **Charte v2** : `.charte_graphique/charte_v2.html` (142 KB, navy `#0A1628` + gold `#B8A472`, Akzidenz Grotesk, design tokens, .identity-card + .pillar-card spec)
- **Akzidenz Grotesk** self-hosted via @font-face dans layout (5 variants .woff2)
- **RemixIcon subset** custom 43 glyphes (`/assets/fonts/icons/kalystrat-icons.woff2`, 3.5KB)
- **Système .ks-card** universel dans layout.blade.php (4 variants : sober, élevé, pillar, manifesto)

### MCP critiques utilisés cette session
- `mcp__perplexity-pro-playwright__pp_search` — recherches tendances 2026 (cards, RGPD, font-host, AEO, GEO)
- `mcp__multi-ai-mcp-3__chat` (qwen3-max, 1min.ai) — délégations rédaction (HowTo schema, contenus filiales/villes/cards)
- `mcp__wcag-mcp__wcag_audit_aaa` — audits accessibility par page (rapports lignes-précises)
- `mcp__playwright__browser_*` — visualisation pages avant/après (règle user obligatoire)
- `mcp__multi-ai-mcp-2__chat` (deepseek-chat fallback OpenRouter) — recommandations notées /100

---

## Tâches projet en cours (15 total : 4 done / 11 pending)

| # | Tâche | Bloqueur |
|---|---|---|
| 1 | D3 Cloudflare DNS | **NE JAMAIS SUGGÉRER** sans demande explicite user (consigne du 2026-05-04) |
| 2 | D5 Déploiement cPanel | inputs SSH/DB/ADMIN_PASSWORD + non demandé |
| 3 | D6 Smoke test prod | D5 done |
| 4 | E2 GA4 + GSC | Measurement ID |
| 5 | E1 Sentry DSN | DSN projet |
| 6 | F1 Push GitHub + CI | URL repo + SSH key |
| 7 | F2 DMARC/DKIM | D3 done |
| 8 | F3 Audit sécurité prod | D3+D5+D6+F2 |
| 9 ✅ | G1 Schema.org JSON-LD | done |
| 10 ✅ | G2 6 tabs why-area-3 | done |
| 11 ✅ | G3 Lighthouse + LCP | done |
| 12 | G4 Photos Kalystrat réelles | bloqué Ali |
| 13 | G5 Décision charte navy/gold vs orange | décision client |
| 14 ✅ | G6 Akzidenz Grotesk self-host | done |
| 15 | G7 SVG signature Ali | scan signature Ali |

**Toutes les pending sont bloquées par inputs/décisions externes user.**

---

## Règles utilisateur établies (memory)

1. **Pas de déploiement live** sans demande explicite user (cf. consigne 2026-05-04)
2. **Visualiser avant de marquer complété** — règle absolue toutes tâches : screenshot Playwright + vérif rendu réel AVANT de dire "complété"
3. **Pas de MCP API payantes** (Refus OpenAI/Gemini Pro APIs, toujours OpenRouter ou multi-ai-mcp à la place)
4. **D3 (DNS Cloudflare)** : ne jamais suggérer sans demande explicite, présenter complètement à part avec validation user
5. **Toutes les polices en local** (charte v2, RGPD/Loi 25)
6. **Toutes recherches web via `mcp__perplexity-pro-playwright__pp_search`** (priorité absolue)

---

## Lessons learned S33

- **S33-L1** : `@verbatim` Blade empêche `{{ asset() }}` mais autorise `@context`/`@type` JSON-LD à passer comme directives → fuite Blade dans JSON-LD non détectée jusqu'à curl. Toujours hardcoder URLs absolues dans `@verbatim`.
- **S33-L2** : Lighthouse mobile gain compound = somme des micro-optimisations (chaque -100ms cumulé compte). 24 points en 5 commits via élimination dépendances externes + lazy load + subset polices.
- **S33-L3** : Cards inline Bootstrap utility (`p-4 rounded-3 h-100`) échappent au grep classique sur classes nommées → audit exhaustif exige patterns multiples (utility + classes nommées + style inline + sections par page).
- **S33-L4** : Gold `#B8A472` sur blanc = **2.44:1** (NON AAA même AA). Gold profond `#5C4F2C` = 8:1 AAA. Pour eyebrow/CTA gold sur fond clair, toujours préférer `#5C4F2C`.
- **S33-L5** : Background gradient seul (sans `background-color` solide) trompe les auditeurs WCAG (calcul blanc-sur-blanc). Toujours ajouter `background-color: #...` solide en fallback explicite.
- **S33-L6** : Charte v2 a un **système de design tokens** (`--r-md`, `--space-6`, `--sh-3`, `--gray-50`, etc.) que les refontes successives doivent respecter. Toujours lire la charte AVANT de créer un nouveau composant CSS.
- **S33-L7** : Tendances UX cards mai 2026 (pp_search) → ÉVITER "template SaaS 3 cards identiques avec icône cercle coloré", PRÉFÉRER asymétrie 2+1 manifesto (1 hero + 2 secondaires) pour Mission/Vision/Différenciateur.
- **S33-L8** : Composants Bootstrap (`bg-primary` `#0d6efd` 4:1 / `bg-success` `#198754` 4:1) sur texte blanc = **PAS AAA**. Toujours surcharger avec navy `#0A1628` + accent gold `border-left` pour différencier.
- **S33-L9** : `<aside>` placé avant le contenu principal dans le DOM crée saut h1→h3 (axe-core flag). Solution : ajouter `<h2 class="visually-hidden">` en premier enfant de l'aside.

---

## 33 commits S33 (chronologique inverse)

```
f5bd143 fix(ux+a11y): repositionner slogan hero AVANT badges + background navy AAA garanti
4f74fea ux(charte v2): variant .ks-card--sober pour cards informatives sobres cross-page
c717cdc feat(ux+charte): refonte /a-propos selon charte v2 + tendances cards mai 2026
50e77ee feat(ux+a11y): uniformisation universelle .ks-card sur 7 sections + fix CTA #8C2E00
da1a1b0 fix(ux+a11y): uniformiser cards "6 piliers" /a-propos (mea culpa audit incomplet)
a4e1539 ux(cards): renforcer démarcation cards filiales — fond grey + ombre marquée
ed5f79f feat(ux)+fix(a11y): refonte cards filiales /a-propos + correction PWA prompts WCAG
bc5f9e6 feat(pwa): adaptation branding Kalystrat (couleurs, icônes, intégration layout)
1a684e1 fix(a11y)+perf: h1→h3 skip pages filiales + Lighthouse mobile 92/100
fe937ca fix(a11y): régressions WCAG AAA contraste sur 4 nouvelles pages (S26-L5)
e911139 feat(aeo): 5 FAQ hyper-locales (coûts, sols argileux, gel-dégel, patrimoine, hors zone)
ef3d343 fix(nav): cohérence breadcrumb pages-villes + lien footer /zones-desservies
46dd82b feat(form): champ "ville" sur formulaire contact + préselect query string
b572e68 feat(geo): index /zones-desservies + 4 villes (Lévis, Sainte-Foy, Beauport, Sillery)
9150945 feat(content): page-ville /zones-desservies/quebec (M3 PoC GEO 2026)
878d2a8 feat(content): enrichir les 5 autres filiales (Structure, Toiture, Finition, Immobilier, Placement)
1f342e6 feat(content): enrichir /filiales/fondations avec intro SEO + méthodologie + certifications (M5 PoC)
93112f9 feat(nav): liens footer vers /conseil-consultatif et /partenaires
89705c3 feat(content): page /partenaires (m4 du rapport audit 2026-05-04)
662d28d docs(rapport): addendum correctifs post-audit (78 → ~83/100, 7 commits cumulés)
f0f382c fix(seo): h2 sidebar pages filiales → h3 (-12 H2 parasites total)
c1478d7 feat(content): page /conseil-consultatif (m3 du rapport audit 2026-05-04)
f5f5415 fix(seo): footer headings h2 → h3 (élimine 4 H2 parasites par page)
59afcc3 feat(seo+brand): correctifs audit 2026-05-04 (TikTok, slogan hero, titles filiales)
d3099f6 perf+rgpd: subset RemixIcon (159KB→3.5KB -98%) + self-host RGPD/Loi 25
93991da feat(charte): self-host Akzidenz Grotesk (5 variants) + alignement charte v2
11f088c perf(home): lazy loading natif sur 36 images below-the-fold
9ae6de0 perf+brand: retirer Sacramento Google Fonts, signature en italique Akzidenz
411f503 fix(seo): bug fuite Blade dans JSON-LD Organization + ajout HowTo /services
f66a8e5 docs: handoff S26 finalisé — prompt de reprise self-contained pour prochaine session
```

---

## 🎯 PROMPT DE REPRISE — copier-coller verbatim au démarrage de la prochaine session

```
Projet : Kalystrat (Laravel 12, site marketing du holding québécois Gestion Kalystrat Inc.).
Cwd : /Users/stephanelapointe/__IA__/_____SERVEUR_____/site_internet/kalystrat
Branche : master @ commit f5bd143 (33 commits S33 le 2026-05-04 → 2026-05-05)
Stack : Laravel 12.56, PHP 8.4, Blade pur (Livewire 4 back-office uniquement),
modules nwidart (Frontend, Privacy, SEO, Kalystrat), SQLite local, Herd Laravel,
Vite + vite-plugin-pwa, theme Construz.

État du projet :
- 22 pages publiques (home, a-propos, services, realisations, faq, contact,
  carrieres, credits, conseil-consultatif, partenaires, zones-desservies +
  5 pages-villes, 6 filiales) + 4 pages légales Privacy
- 27/27 tests Pest Feature pass en 12s
- Lighthouse mobile 92/100 (LCP 3.0s, CLS 0), desktop 96/100
- 0 violation WCAG 2.2 AAA contraste réelle (5 faux positifs documentés
  Modules/Frontend/README.md : visually-hidden, slick[inert], dropdown trap,
  responsive 160 chars, disclosure widgets)
- 51+ blocs JSON-LD valides (Organization, 6 LocalBusiness filiales, 5 villes,
  AboutPage×2, CollectionPage, FAQPage 20 Q/R, HowTo, JobPosting, Person×3)
- Sitemap 25 URLs + llms.txt 2.6KB + llms-full.txt 6.2KB
- Conformité RGPD/Loi 25 absolue (0 dépendance externe — Sacramento + RemixIcon
  CDN éliminés, Akzidenz Grotesk self-hosted .woff2 5 variants)
- PWA Kalystrat 8/8 critères (manifest dynamique navy/gold, icons générées
  PHP GD, Service Worker Workbox via vite-plugin-pwa boilerplate Memora)
- Système de cards universel .ks-card 4 niveaux : --sober (gray-50 informatif),
  base (blanc+ombre premium), .ks-pillar-card (navy strict charte v2),
  .ks-manifesto-card (Mission hero asymétrique 2+1)
- Charte v2 : navy #0A1628 + gold #B8A472, Akzidenz Grotesk

À lire EN PREMIER avant toute action :
1. CLAUDE.md (instructions projet)
2. .handoffs/2026-05-05_session-handoff-s33-cards-charte-pwa.md (handoff S33 complet)
3. .charte_graphique/charte_v2.html (système de design tokens, components
   .identity-card et .pillar-card spec)
4. .rapports/rapport-2026-05-04.md (audit conformité contenu↔plan d'affaire)
5. .rapports/rapport-2026-05-04-cards-wcag-aaa.md (audit cards WCAG)
6. Modules/Frontend/resources/views/layout.blade.php (système .ks-card universel
   centralisé dans le <style> block — chercher "Système de cards Kalystrat universel")

Règles utilisateur ABSOLUES (ne jamais déroger) :
1. PAS DE DÉPLOIEMENT LIVE sans demande explicite — toutes les modifications
   restent locales tant que l'user ne demande pas explicitement la prod
2. VISUALISER AVANT DE MARQUER COMPLÉTÉ — pour TOUTES les tâches sans exception,
   screenshot Playwright + vérification rendu réel AVANT de dire "complété"
3. D3 (Cloudflare DNS) : NE JAMAIS SUGGÉRER sans demande explicite user, présenter
   complètement à part avec validation user quand demandé
4. Toutes recherches web via mcp__perplexity-pro-playwright__pp_search (priorité 1)
5. Toutes les polices en local (RGPD/Loi 25 + charte v2)
6. Pas de MCP API payantes — toujours OpenRouter ou multi-ai-mcp à la place
7. Délégation MCP par défaut — Claude Opus = superviseur/correctifs <5 lignes
8. Toujours respecter la charte v2 .charte_graphique/charte_v2.html (consulter
   AVANT de créer/modifier un composant)

Tâches projet (15 total) :
- 4 completed : G1 (JSON-LD), G2 (6 tabs why-area-3), G3 (Lighthouse), G6 (Akzidenz)
- 11 pending toutes bloquées inputs externes : D3, D5, D6, E1, E2, F1, F2, F3,
  G4 (photos Ali), G5 (charte navy/gold), G7 (signature SVG Ali)

TA MISSION (à exécuter dans cet ordre, sans demander de confirmation entre étapes) :

1. Lire les 6 fichiers listés ci-dessus.
2. Vérifier git status + tests Pest (vendor/bin/pest --testsuite=Feature).
3. Lister les MCP critiques disponibles (compliance, perplexity-pro-playwright,
   multi-ai-mcp, wcag-mcp, playwright, github, cpanel, ga4, gsc, security).
4. Synthétiser la situation en 10 lignes maximum.
5. Produire un PLAN EXHAUSTIF via TaskCreate, organisé par sections, pour la
   mission compliance vie privée ci-dessous.
6. ATTENDRE la validation user avant d'exécuter quoi que ce soit qui modifie
   un système externe ou le code.

═══════════════════════════════════════════════════════════════════════════
NOUVELLE MISSION : SYSTÈME CONFORMITÉ VIE PRIVÉE COMPLET (RGPD + Loi 25 + ePrivacy)
═══════════════════════════════════════════════════════════════════════════

Tu DOIS UTILISER le MCP "mcp__compliance__" en priorité (boilerplate Memora a
déjà ce MCP configuré : compliance_list_jurisdictions, compliance_ping +
backend RAG hybride PG+pgvector pour génération politique de confidentialité,
bannière cookies, audit accessibilité).

Crée un système de conformité vie privée complet, production-ready, pour un
site web canadien également accessible en Europe. Le système doit satisfaire
SIMULTANÉMENT le RGPD (UE), la LPRPDE/Loi 25 (Canada/Québec) et la directive
ePrivacy.

DÉTECTION DE RÉGION
- Détecte automatiquement la région via Accept-Language ou IP (geoip-lite ou
  équivalent côté Laravel)
- Niveau strict UE/Québec, standard Canada autre, mémorisé dans cookie consent

1. POPUP / BANNIÈRE COOKIES (composant CookieBanner)
- Catégories : Essentiels (obligatoires) / Analytiques / Marketing / Personnalisation
  / Tiers embarqués
- Boutons : Tout accepter / Tout refuser / Personnaliser (visibilité égale,
  pas de dark patterns)
- Panel personnalisation : toggles + descriptions + liste cookies + durées
- Mémorisation localStorage + cookie consent_v1 JSON signé
- Expiration : 6 mois UE / 12 mois Canada
- Bouton flottant "Gérer mes cookies" toujours accessible (footer ou FAB)
- Lazy-load conditionnel scripts tiers (uniquement après consentement)
- Respect signal Global Privacy Control (GPC) UE
- WCAG 2.1 AA : focus trap, ARIA, navigation clavier complète
- Responsive mobile-first

2. POLITIQUE DE CONFIDENTIALITÉ (/privacy-policy.html)
- Identité responsable + DPO
- Liste exhaustive données collectées
- Finalités + base légale par traitement
- Durées conservation
- Destinataires + sous-traitants + pays + garanties (SCCs, Privacy Shield, lois CA)
- Transferts hors UE/CA
- Droits utilisateurs + délais 30 jours
- Procédure exercice droits
- Recours autorités (CNIL, CAI, OPC)
- Politique mineurs (<16 UE / <13 CA)
- Versioning + notification changements
- Section Québec Loi 25 (EFVP, responsable protection)

3. CGU (/terms-of-use.html)
- 13 sections (acceptation, service, compte, IP, contenu user, comportements
  interdits, garanties, loi applicable double Ontario/Québec + UE, médiation,
  modifications, résiliation, force majeure, divisibilité)

4. FORMULAIRE EXERCICE DROITS (/rights-request.html)
- Formulaire nom/email/type/description/preuve identité
- Endpoint POST /api/rights-request
- Accusé réception auto + suivi 30 jours

5. BACKEND / API
- POST /api/consent (timestamp + IP hashée + UA + version)
- GET /api/consent/:token (récup reconnexion)
- POST /api/rights-request (logging)
- GET /api/cookie-list (JSON par catégorie)
- Stockage 5 ans minimum (RGPD art. 7 preuve)

6. CONFIG CENTRALISÉE (config/privacy.php Laravel)
- Liste scripts tiers + catégories
- URLs politiques
- Email DPO
- Versions documents
- Flags régionaux

CONTRAINTES TECHNIQUES :
- Stack actuelle : Laravel 12 + Blade + Alpine.js (déjà présent) + Tailwind/Bootstrap
- Pas de framework SSR JS (Next/Nuxt) → Blade SSR natif
- Module Privacy déjà actif dans modules_statuses.json — INTÉGRER dans ce module,
  ne PAS dupliquer
- Le projet a déjà 4 pages légales : /politique-confidentialite,
  /conditions-utilisation, /politique-cookies, /demande-droits — VÉRIFIER
  l'existant avant de créer (lire ces vues d'abord)
- Cookie banner : vanilla JS + Alpine déjà chargé
- Tests Pest pour la logique consentement
- Internationalisation FR/EN via Laravel translations
- Aucun cookie tiers déposé avant consentement explicite
- Mode sombre via prefers-color-scheme
- WCAG 2.2 AAA respecté (registre faux positifs documenté)
- Charte v2 navy/gold respectée pour le banner et toutes les pages légales

ARBORESCENCE FICHIERS ATTENDUE (proposition à valider) :
- Modules/Privacy/config/privacy.php (config centralisée)
- Modules/Privacy/resources/views/legal/privacy-policy.blade.php
- Modules/Privacy/resources/views/legal/terms-of-use.blade.php
- Modules/Privacy/resources/views/legal/rights-request.blade.php
- Modules/Privacy/resources/views/components/cookie-banner.blade.php
- Modules/Privacy/resources/views/components/cookie-preferences-panel.blade.php
- Modules/Privacy/app/Http/Controllers/ConsentController.php
- Modules/Privacy/app/Http/Controllers/RightsRequestController.php
- Modules/Privacy/app/Services/RegionDetector.php
- Modules/Privacy/app/Services/ConsentLogger.php
- Modules/Privacy/database/migrations/*_create_consent_records_table.php
- Modules/Privacy/routes/web.php + api.php
- resources/js/privacy/cookie-banner.js (vanilla + Alpine)
- resources/css/privacy.css (banner styles, charte v2)
- tests/Feature/Privacy/*.php

Commence par produire le PLAN ET LES TODOS COMPLETS ET EXHAUSTIFS via TaskCreate,
section par section, avec dépendances, MCP attribué (compliance pour génération
politique/banner, perplexity pour validation tendances 2026, multi-ai-mcp pour
contenus longs, wcag-mcp pour audit final), effort estimé, et inputs requis.

ATTENDRE validation user avant exécution.

Démarre maintenant.
```

---

## Prochaine phase suggérée (options)

- **Option A** — Mission compliance vie privée (mission décrite ci-dessus)
- **Option B** — Web Push Notifications PWA (laravel-notification-channels/webpush + VAPID)
- **Option C** — Background Sync formulaires offline (BackgroundSyncPlugin Workbox déjà importé dans sw-source.js)
- **Option D** — Blog SEO clusters thématiques M6 du rapport audit (effort L, 6-9 mois)
- **Option E** — Schema Review + AggregateRating (témoignages clients réels requis)

User a déclenché Option A.

---

*Handoff S33 généré le 2026-05-05 par Claude Opus 4.7 (superviseur). Mode lecture seule, aucune modification de fichier hors documentation.*
