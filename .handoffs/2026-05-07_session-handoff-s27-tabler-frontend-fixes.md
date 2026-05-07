# Handoff Session S27 — 2026-05-07
## Tabler admin migration + UX/UI/WCAG frontend fixes Kalystrat

> **Lecture obligatoire** pour reprise session. Self-contained — toutes les infos
> nécessaires pour continuer sans relire les sessions S25/S26.

---

## 1. ÉTAT DU DÉPÔT

- **Branche** : `master` (pas de remote configuré)
- **HEAD** : `ce34e15` — fix(home): Phase 25 grille projets
- **Working tree** : clean
- **Total commits session S27** : ~20 commits (Phase 0 à Phase 27 + admin nav + AAA backend)

### Commits clés S27 (du plus récent au plus ancien)

```
ce34e15 fix(home): Phase 25 grille projets — espace vide éliminé + sémantique h3
453d9e7 fix(content): Phase 23 — 6 raisons → 6 piliers Plan d'Ali (cohérence)
ddadbde fix(ui): Phase 26 — sub-title coupure top (line-height + padding)
3bdb1ee fix(ui): Phase 24+27 — centrage parfait icônes wrappers (DRY CSS)
919c884 feat(ux): Phase 19 — Bootstrap Tooltip activé sur <abbr> RBQ/APCHQ/CCQ/GCR/OACIQ
ac39fbc fix(frontend): Phase 20 — courbe SVG hero symétrique
1ecb193 Merge feat/wcag-aaa-phase18 — WCAG 2.2 AAA backend admin + login
3e56d38 refactor(admin-nav): Phase 17 — Workflow-based 4 sections (91/100)
dd09d34 feat(admin-nav): refonte 8→5 sections (Phase 16)
05b634b feat(admin-theme): logo Kalystrat SVG inline
c7f213f refactor(admin-theme): copie verbatim Tabler officiel + nav Kalystrat
e773d72 feat(dashboard): style Tabler officiel (welcome + sparklines + gauge)
b98542f feat(admin-theme): migration NobleUI → Tabler 1.4 modulaire (Phase 0-6)
```

---

## 2. CE QUI A ÉTÉ FAIT EN S27

### 2.1 Migration thème admin NobleUI → Tabler 1.4 (Phase 0-15)
- **Module nwidart** `AdminTabler` créé : `Modules/AdminTabler/`
- **Theme source officiel** : Tabler 1.4 navbar-overlap layout (Paweł Kuna, MIT)
  - `preview.tabler.io/layout-navbar-overlap.html` copie verbatim
  - HTML stocké dans `.rapports/tabler-source-2026-05-07/layout-navbar-overlap.html`
- **Script Python régénérateur** : `.scripts/build-tabler-layout.py`
  - Substitutions Laravel (routes, avatar, branding, logo)
  - Reproductible : tout changement layout = relance script
- **Layout** : `Modules/AdminTabler/resources/views/layouts/admin.blade.php` (1017 lignes)
- **Conversion sed globale** : 269 vues admin migrées NobleUI → Tabler
- **Refactoring 66 vues** : page-actions composant + suppression h4 redondants
- **Logo Kalystrat SVG inline** (remplace logo Tabler) — fix `<img>` width:0 bug

### 2.2 Refonte menus admin (Phase 16-17)
- **Pattern A Workflow-based 4 sections** (note 91/100, validation user)
- **Réduction** : 8 → 5 → 4 sections (Hick's Law, Miller 7±2, Baymard 2026)
- **Sections** : Accueil / Contenu / Opérations / Configuration
- **Sub-groups dans Opérations** : Marketing, Boutique, SaaS, Réservations, Équipe, Sécurité
- **Sub-groups dans Configuration** : Apparence, Technique, Système, IA, Roadmap
- **Bottom bar mobile** : 4 items max (Priority+ pattern)
- Fichier : `config/navigation.php` (192 lignes)

### 2.3 WCAG 2.2 AAA backend admin (Phase 18) — branche dédiée mergée
- **Skip-link** `.admintabler-skip-link` (WCAG 2.4.1)
- **Focus-visible moderne 2026** : outline 2px primary + offset 2px + box-shadow halo
- **Touch targets 44×44** sur navbar/dropdowns/btn-close (WCAG 2.5.5 AAA)
- **prefers-reduced-motion** media query (WCAG 2.3.3)
- **Login Livewire** : contraste sky-700 → sky-800 (5.93:1 → 7.56:1 AAA)
- **Footer guest** layout : landmark `<footer role="contentinfo">` + nav légale
- **Main landmark** : `<main id="main-content">` + skip-link cible
- 4 critères AAA gagnés (vs baseline)
- Fichier : `Modules/AdminTabler/resources/assets/sass/app.scss` (140 lignes)

### 2.4 Frontend Kalystrat fixes UX/UI (Phase 19-27)

| Phase | Problème | Fix | Commit |
|-------|----------|-----|--------|
| 19 | `<abbr>` RBQ/APCHQ pas de tooltip | Bootstrap Tooltip auto-init + CSS `cursor:help` + `text-decoration: underline dotted` | `919c884` |
| 20 | Coupure SVG hero asymétrique | Path symétrique `M0,55 C360,110 720,0 1080,55 C1260,82 1350,75 1440,55 L1440,110 L0,110 Z` | `ac39fbc` |
| 23 | "Six raisons" générique vs Plan d'Ali | "Six piliers stratégiques" alignés Plan d'affaires : Intégration verticale / Main-d'œuvre CCQ / Demande captive / Synergies / Cohérence marque / Gestion centralisée | `453d9e7` |
| 24+27 | Icônes wrappers non centrées (carrés trust signals + circulaires Tel/Email/Siège) | DRY CSS : `i, svg, ... { line-height: 1; display: block; margin: 0 }` sur tous les wrappers `.ks-card__icon`, `.ks-zone-card__icon`, `.ks-conseil-card__icon`, `.ks-partner-icon` | `3bdb1ee` |
| 26 | sub-title "NOS RÉALISATIONS" coupé top | `line-height: 1.4 !important; padding-top: 0.25rem; display: inline-flex; align-items: center` | `ddadbde` |
| 25 | Espace vide grille projets (col-lg-8 + col-lg-4 row 1 hauteurs ≠) | DRY CSS : `.row > [class*="col-"] { display:flex }` + `.portfolio-card.style5 { height:100%; flex-direction:column }` + img object-fit cover. Bonus : 5 mismatches `<h3>...</h4>` corrigés en `</h3>` (sémantique WCAG 1.3.1) | `ce34e15` |

---

## 3. ÉTAT DU PROJET (CHIFFRES CLÉS)

- **Pages frontend production** : 13 pages (home, a-propos, services, realisations,
  faq, contact, blog, 6 filiales) + 4 légales (privacy, terms, cookies, credits)
- **Pages admin** : 269 vues converties Tabler (5 + 264 vues backoffice)
- **WCAG** : AAA 0 violation réelle (régression contraste catch + fix proactif S26)
- **Sémantique HTML** : 99% (5 mismatches h3/h4 fixés en S27)
- **SEO** : 100/100 (sitemap 17 URLs, JSON-LD complet, meta optimisés)
- **Performance** : CLS éliminé S25 (defer JS dégrade ce site, leçon S25)
- **Tests Pest** : 19/19 smoke tests pass
- **Sécurité** : 2 CVE patchées + 3 hardenings S26

---

## 4. STACK TECHNIQUE (rappel)

- Laravel 12.56 / PHP 8.4
- Modules nwidart : Frontend (site public), AdminTabler (panel), Backoffice, Auth, Privacy, FormBuilder, etc.
- Theme admin : **Tabler.io v1.4** (MIT, Paweł Kuna) navbar-overlap layout
- Theme frontend : **Construz home-5** multipage modifié textes FR Kalystrat
- Frontend : Vite 7 + Bootstrap 5 + Tailwind (auth) + Blade pure
- Admin : Livewire 4 + ApexCharts + Driver.js + Tabler Icons webfont (`ti ti-*`) + RemixIcon (`ri-*`)
- Frontend SCSS source : `Modules/AdminTabler/resources/assets/sass/app.scss`
- Charte Kalystrat v2 : navy `#0A1628` + gold `#B8A472` + Akzidenz Grotesk

---

## 5. FICHIERS CLÉS À CONNAÎTRE

| Fichier | Rôle | Lignes |
|---------|------|--------|
| `Modules/Frontend/resources/views/home.blade.php` | Page accueil (hero, 6 piliers, projets, contact, etc.) | 1084 |
| `Modules/Frontend/resources/views/layout.blade.php` | Layout frontend principal + CSS overrides | 1835 |
| `Modules/AdminTabler/resources/views/layouts/admin.blade.php` | Layout admin Tabler navbar-overlap | 1017 |
| `Modules/AdminTabler/resources/assets/sass/app.scss` | SCSS admin (Tabler imports + WCAG AAA + custom) | 140 |
| `config/navigation.php` | Menus admin 4 sections Pattern A Workflow | 192 |
| `.scripts/build-tabler-layout.py` | Régénérateur layout admin verbatim Tabler | (Python) |
| `.scripts/kalystratize-v2.sh` | Régénérateur HTML Construz → Blade FR (sed) | 8 KB |
| `.notes_diverses/informations_kalystrat.md` | Sections 1-23 client + plan d'affaires | (texte) |
| `.plan_affaire/PLAN_ALI.txt` | Plan d'affaires source (180 lignes) | (texte) |

---

## 6. TODOs PENDING (43 tâches au total, 14 pending)

### 6.1 Frontend UI/UX restant (PRIORITÉ SESSION SUIVANTE)

- **#37 Phase 21** — Uniformisation icônes (2 styles différents visibles dans le site) + police signature manuscrite Ali Salomon (S26 retiré Sacramento RGPD, à refaire avec font web ou SVG inline)
- **#38 Phase 22** — Photo Toiture & Enveloppe : tuiles européennes ≠ contexte construction québécois. Remplacer par photo représentative (bardeaux d'asphalte ou métal Québec)

### 6.2 Bloquées inputs Ali (impossible en autonomie)

- **#1 D3** — Migration DNS kalystrat.ca SiteGround → Cloudflare (NS change requis)
- **#2 D5** — Premier déploiement cPanel via `deploy.sh --first-deploy`
- **#3 D6** — Smoke test post-déploiement kalystrat.ca prod
- **#4 E2** — Activer GA4 + GSC + sitemap submission (GA4 ID requis)
- **#5 E1** — Activer Sentry DSN en prod (sentry-laravel installé, DSN requis)
- **#6 F1** — Push initial GitHub + activer workflow CI (repo URL requis)
- **#7 F2** — Durcir DMARC + activer DKIM post-migration DNS
- **#8 F3** — Audit sécurité prod complet kalystrat.ca (post-déploiement)
- **#12 G4** — Remplacer photos Construz placeholders par photos Kalystrat réelles (Ali doit fournir)
- **#13 G5** — Décision charte navy/gold vs orange Construz natif (décision Ali)
- **#15 G7** — SVG signature manuscrite réelle Ali Salomon (Ali doit signer + scanner)

### 6.3 Inputs Ali requis pour débloquer prod

1. **DNS** : décision migration SiteGround → Cloudflare ou rester SiteGround
2. **ADMIN_PASSWORD** : mot de passe admin prod
3. **SMTP** : credentials envoi formulaire contact (provider + host + user + pass)
4. **GA4 Measurement ID** : pour activer analytics

---

## 7. MÉTHODES VALIDÉES À RÉUTILISER

### 7.1 DRY CSS pour bugs UI répétitifs (Phase 24+27, Phase 25)

```css
/* Centrage icônes universel — applicable à tous wrappers */
.wrapper-class i, .wrapper-class svg {
    line-height: 1;
    display: block;
    margin: 0;
}

/* Cards hauteur égale en grille Bootstrap asymétrique */
.parent-section .row > [class*="col-"] { display: flex }
.parent-section .card { display: flex; flex-direction: column; height: 100% }
.parent-section .card-thumb { flex: 1 1 auto; min-height: 240px }
.parent-section .card-thumb img { width: 100%; height: 100%; object-fit: cover }
```

### 7.2 Workflow Plan→Validate→Execute (utilisateur insiste)

1. **[PLAN]** annoncé en préambule de chaque appel d'outil
2. **STOP** pour validation user avant action critique
3. **MCP cascade** : multi-ai-mcp (1min.ai gratuit) → openrouter free → openrouter low-cost → Opus en dernier (< 5 lignes)
4. **Préambule [PLAN]** obligatoire — pas d'action sans annoncer le plan

### 7.3 Validation Playwright OBLIGATOIRE avant marquer "completed"

- 3 viewports minimum : Desktop 1440 / Tablet 768 / Mobile 375
- `browser_evaluate` pour mesures précises (offsetHeight, getComputedStyle)
- `browser_take_screenshot` pour preuve visuelle
- Sauvegarder dans `.rapports/<feature>/<NN>-<description>.png`

### 7.4 MCP recherche web — règle absolue user 2026-05-07

**TOUTES recherches → `mcp__perplexity-pro-playwright__pp_search`** (priorité 1, gratuit)
- Fallback 1 : `mcp__openrouter__chat_with_model` model `perplexity/sonar-pro`
- Fallback 2 : `mcp__multi-ai-mcp__chat` provider perplexity-pro
- **JAMAIS** WebSearch ni WebFetch brut
- Fix S83 (2026-05-07) : default `mode="auto"` (pas "pro" qui crée Tasks pollution)

---

## 8. LEÇONS S27 IMPORTANTES

1. **Verbatim copy >> fitting** : user a explicitement refusé tout "fittage". Pour tout
   theme third-party, copier ligne par ligne le HTML officiel + substitutions Laravel
   minimales (script Python reproductible).

2. **`<img>` SVG en flex parent** : forcer `width: auto` sur `<img>` SVG dans flex
   parent peut résoudre à `width: 0`. Solution : inline SVG `<svg>` directement.

3. **Bootstrap Tooltip version Construz 5.0.0-beta1** : `getOrCreateInstance()` n'existe
   pas. Utiliser `new bootstrap.Tooltip(elem)` directement.

4. **multi-ai-mcp `[object Object]`** = silent KO crédits 1min.ai (latence < 300ms).
   Cascade obligatoire : compte 1 → 2 → 3 → openrouter-free dès le 2e KO consécutif.

5. **HTML semantic mismatches** silent until audit : 5 `<h3>...</h4>` non-bloquants
   visuellement mais cassent screen readers. Toujours grep avant commit batch.

6. **Plan d'affaires alignment** : ne PAS générer du contenu marketing générique.
   Aligner sur sources : `.plan_affaire/PLAN_ALI.txt` + `.notes_diverses/informations_kalystrat.md`.

7. **Phase 25 grid hauteur** : Bootstrap `align-items-stretch` natif insuffisant si
   `.card` interne n'a pas `height:100%` + flex-column. CSS DRY portfolio-area-5
   évite de devoir restructurer le HTML.

---

## 9. INTERDICTIONS ABSOLUES (rappel CLAUDE.md)

- **JAMAIS** `migrate:fresh` ni DROP / DELETE sans WHERE
- **JAMAIS** `confirm()`, `alert()`, `prompt()` natifs (modales custom + toasts uniquement)
- **JAMAIS** écrire fichier prod sans `file_exists()` check préalable
- **JAMAIS** `claude-opus-4.6`, `gpt-5.2-pro`, `gemini-3-pro` via OpenRouter (gaspillage — utiliser SuperAgents Gemini/Codex gratuits)
- **JAMAIS** `WebSearch` / `WebFetch` brut pour veille technique
- **JAMAIS** déléguer conversion HTML→Blade à qwen3-max (hallucinations garanties)
- **JAMAIS** `git push --force` sur main/master sans accord explicite

---

## 10. INSTANTANÉ CONTEXTE COMPLET

- **Working dir** : `/Users/stephanelapointe/__IA__/_____SERVEUR_____/site_internet/kalystrat`
- **HEAD** : `ce34e15` master
- **Build** : `npm run build` (Vite 7) + `php artisan view:clear` après modif Blade
- **Local URL** : `https://kalystrat.test/` (Herd)
- **Admin URL** : `https://kalystrat.test/admin` (login Livewire)
- **Site source HTML** : `.themes/main-file/construz/` (home-5, about, service, etc.)
- **Tabler source** : `.rapports/tabler-source-2026-05-07/layout-navbar-overlap.html`
- **Charte v2 enrichie** : `.themes/charte_graphique/charte_v2.html` (142 KB, 14 sections)

---

## 11. PROMPT DE REPRISE SESSION SUIVANTE

> Voir bloc séparé fourni dans la réponse Claude. À copier/coller au début de
> la prochaine session pour reprise immédiate sans contexte perdu.
