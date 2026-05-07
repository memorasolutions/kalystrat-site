# Handoff Session S28 — 2026-05-07
## Uniformisation icônes + signature Caveat + photo toiture + centrage boutons

> Lecture obligatoire pour reprise. Self-contained.

---

## 1. ÉTAT DU DÉPÔT

- **Branche** : `master` (pas de remote)
- **HEAD** : `91eac3b` — feat(frontend): S28 unified Phase 21A/B/C + 22 + 28
- **Working tree** : clean
- **Commits S28** : 1 commit unifié (toutes les phases entrelacées sur les mêmes fichiers — granularité fine impossible sans `git add -p` ardu, message structuré couvre le détail par phase)

```
91eac3b feat(frontend): S28 — uniformisation icônes + signature Caveat + photo toiture + centrage boutons
af680e8 docs: handoff S27 — migration Tabler admin + 7 fixes UX/UI frontend Kalystrat
ce34e15 fix(home): Phase 25 grille projets — espace vide éliminé + sémantique h3 corrigée
```

---

## 2. CE QUI A ÉTÉ FAIT EN S28

### 2.1 Phase 21A — Remix Icon line uniforme (style B2B sobre 2026)
- 17× `ri-*-fill` → `ri-*-line` sur `home.blade.php` + `layout.blade.php`
- Paires : `shield-check`, `shield-star`, `home-heart`, `team`, `phone`, `time`
- `ri-play-fill` **PRÉSERVÉ** (CTA vidéo = état actif, conforme reco UX 2026 outline+filled-on-active)
- Recherche `pp_search` validée : "outline default for B2B, filled only for active states/CTA"

### 2.2 Phase 21B — SVG navy/gold Kalystrat
- Génération 7 SVG via sed `#FF6600` / `#EA5501` → `#B8A472` (gold) dans `public/assets/img/kalystrat/icons/`
- Fichiers : `about-checklsit-icon1-1.svg` + `benefit-icon1-{1..6}.svg` (46 KB total)
- Update 14 références Blade : `assets/construz-new/img/icon/...` → `assets/img/kalystrat/icons/...`
- SVG Construz originaux (orange) **préservés** dans `public/assets/construz-new/` (réversible)

### 2.3 Phase 21C — Signature Caveat woff2 latin auto-hostée
- Téléchargement `Caveat-Regular.woff2` (74 KB) via curl UA Chrome → `public/assets/fonts/`
- `@font-face` local + `font-display:swap` (RGPD/Loi 25 conforme, **0 requête externe**)
- `.ks-founder-signature` : Akzidenz italic 1.625rem → **Caveat 2.25rem manuscrit**
- Section about below-the-fold → **0 impact LCP**, fallback Akzidenz immédiat = **0 CLS**
- Validation : `document.fonts.check("16px Caveat") = true`

### 2.4 Phase 22 — Photo Toiture : tuiles européennes → bardeaux Québec
- Source Pexels libre : Ryan Stephens, "Roofer using nail gun for shingle installation" (action métier)
- Backup `filiale-toiture.webp.bak-2026-05-08` (gitignored via `*.bak-*`)
- Conversion `cwebp -q 78 -resize 800 0` → **81 KB / 800×534** optimisé LCP
- Affichée 4 emplacements : tab filiale, portfolio card, blog card, carrière card

### 2.5 Phase 28 — Centrage icônes dans boutons CTA (BUG USER S28)
**Symptôme** : flèche `↗` (`ri-arrow-right-up-line`) apparaissait en exposant haut-droite des boutons « DÉCOUVRIR LE GROUPE », « VOIR NOS SERVICES », etc. Le glyphe Remix Icon a sa masse dessinée en haut-droite de l'em-square → centrage géométrique strict (mesuré centerDiff: 0) mais **centrage optique cassé**.

**Solution sémantique + visuelle** :
- 31× `ri-arrow-right-up-line` (↗ diagonal) → `ri-arrow-right-line` (→ horizontal, naturellement centré)
- Justification : `↗` implique sémantiquement "lien externe" (convention web modern), or **TOUS** les CTA de Kalystrat pointent vers routes internes (`/a-propos`, `/services`, `/filiales/*`, `/carrieres`, `/contact`). Donc → est plus correct sémantiquement ET visuellement.
- Fichiers touchés : 12 (home + layout + 9 pages + 1 partial)
- CSS Phase 28 ajouté `layout.blade.php` :
  ```css
  .btn i { display: inline-flex; align-items: center; justify-content: center;
           line-height: 1; vertical-align: middle; }
  ```
- Compensation `translateY(0.15em)` préventive (dead code) pour cas futurs `ri-arrow-up-*` sur liens externes éventuels

---

## 3. ÉTAT DU PROJET (CHIFFRES CLÉS)

- **Pages frontend** : 13 + 4 légales (inchangé)
- **Pest smoke tests** : **31/31 PASS** (vs 19 baseline S26 — +12 tests S27 admin Tabler)
- **WCAG AAA audit** : 24 conformes / 6 non-conformes = **0 régression S28** (les 6 sont des faux positifs documentés depuis S26 : `<h1 visually-hidden>` clip:rect, Tab dropdown lazy, breadcrumb homepage non requis)
- **SEO** : 100/100 (sitemap 17 URLs, JSON-LD complet, meta optimisés) — inchangé
- **Performance** : CLS éliminé S25 (defer JS dégrade, leçon S25) — préservé
- **Sécurité** : 2 CVE patchées + 3 hardenings S26 — inchangé

---

## 4. STACK TECHNIQUE (rappel S27)

- Laravel 12.56 / PHP 8.4
- Modules nwidart : Frontend (site public), AdminTabler (panel), Backoffice, Auth, Privacy, FormBuilder
- Theme admin : Tabler.io v1.4 navbar-overlap + WCAG AAA backend
- Theme frontend : Construz home-5 modifié textes FR Kalystrat + charte navy/gold + Caveat signature
- Frontend SCSS : `Modules/AdminTabler/resources/assets/sass/app.scss`
- Charte : navy `#0A1628` + gold `#B8A472` + Akzidenz Grotesk + **Caveat (signature)**

---

## 5. FICHIERS CLÉS À CONNAÎTRE

| Fichier | Rôle | Lignes |
|---------|------|--------|
| `Modules/Frontend/resources/views/home.blade.php` | Page accueil (hero, 6 piliers, projets, contact) | 1084 |
| `Modules/Frontend/resources/views/layout.blade.php` | Layout frontend + CSS Phase 27/28 (centrage icônes wrappers + boutons) | 1856 |
| `public/assets/fonts/Caveat-Regular.woff2` | Police signature Ali Salomon (latin 74 KB) | (binary) |
| `public/assets/img/kalystrat/icons/` | 7 SVG navy/gold (46 KB total) | (assets) |
| `public/assets/img/kalystrat/photos/filiale-toiture.webp` | Photo bardeaux Québec (81 KB) | (assets) |

---

## 6. TODOs RESTANTS (post-S28)

### 6.1 Bloquées inputs Ali (NO-GO sans demande explicite)
- **D3** Migration DNS kalystrat.ca SiteGround → Cloudflare
- **D5** Premier déploiement cPanel via `deploy.sh --first-deploy`
- **D6** Smoke test post-déploiement kalystrat.ca prod
- **E1** Activer Sentry DSN en prod
- **E2** Activer GA4 + GSC + sitemap submission (GA4 ID requis)
- **F1** Push initial GitHub (repo URL requis)
- **F2** Durcir DMARC + activer DKIM post-DNS
- **F3** Audit sécurité prod complet kalystrat.ca
- **G4** Photos Construz → photos Kalystrat réelles (Ali fournit)
- **G5** Décision charte navy/gold vs orange Construz natif
- **G7** SVG signature manuscrite réelle Ali (scanné) — Caveat web actuelle est placeholder

### 6.2 Améliorations potentielles (non urgentes)
- Phase 21B : couvrir aussi les sub-pages (about, services, filiale dynamic) si elles utilisent `<img construz-new/img/icon/>` — actuellement seul home.blade.php utilisait ces 14 SVG
- Phase 28 : étendre le fix `.btn i` à `.nav-link i` (tabs filiales `ri-arrow-right-down-line`) si user signale même problème optique

### 6.3 Inputs Ali requis pour débloquer prod
1. **DNS** décision Cloudflare ou rester SiteGround
2. **ADMIN_PASSWORD** prod
3. **SMTP** credentials (provider + host + user + pass)
4. **GA4** Measurement ID

---

## 7. MÉTHODES VALIDÉES S28

### 7.1 Conversion sémantique > correction visuelle
Quand un glyphe webfont a un défaut intrinsèque (ex. masse asymétrique → centrage optique impossible avec pur CSS), **changer le glyphe** est plus efficace que multiplier les `transform: translateY()`. Bonus : alignement avec conventions sémantiques (↗ = externe, → = interne).

### 7.2 SVG navy/gold via sed déterministe
Pour adapter une famille d'icônes Construz à la charte Kalystrat : **garder originaux + générer copies** dans `public/assets/img/kalystrat/icons/` via `sed '#OldColor#NewColor#g'`. Rétro-compatible, réversible.

### 7.3 Police web auto-hostée RGPD
- Curl `fonts.googleapis.com/css2?family=X` avec UA Chrome moderne → CSS contenant URLs woff2
- Extraction sous-ensemble latin uniquement (couvre é/è/à/ç) → `~70-80 KB` au lieu de 200+
- `@font-face` inline blade + `font-display:swap` → 0 CLS, 0 requête externe
- **NE JAMAIS** charger Google Fonts directement (RGPD/Loi 25)

### 7.4 Stock photos métier > photos architecturales
Pour B2B construction, une photo d'**activité** (couvreur installant des bardeaux) communique mieux le savoir-faire qu'une photo passive d'architecture. Source : `mcp__stock-photos__search_photos` Pexels/Unsplash/Pixabay (libre de droits, gratuit).

### 7.5 Workflow Plan→Validate→Execute (rappel S28 user)
- Préambule `[PLAN]` obligatoire avant chaque outil
- **1 chose à la fois**, pas de batch parallèle massif (consomme trop de tokens Opus)
- **Local uniquement** : pas de push remote, pas de deploy, sans GO explicite

---

## 8. LEÇONS S28

1. **Centrage optique ≠ centrage géométrique** : `getBoundingClientRect` peut afficher centerDiff: 0 alors que le glyphe rendu est visiblement décalé. **Toujours screenshot zoomé pour valider visuellement** un fix de centrage. Mesures DOM mathématiques sont insuffisantes.

2. **Glyphes Remix Icon arrow asymétriques** : `ri-arrow-right-up-line` / `ri-arrow-up-*` ont leur masse en haut-droite de l'em-square. `transform: translateY()` jusqu'à 0.4em ne corrige pas vraiment. Solution = changer le glyphe ou passer en SVG inline.

3. **Sed déterministe Bash** > délégation MCP pour transformations text-only (sed natif zsh, conversion pure pattern). Évite latence et hallucinations.

4. **Caveat 2.25rem >> italique 1.625rem** pour rendu signature : la Akzidenz italic n'évoque pas une signature manuscrite, juste du texte stylisé. Caveat 2.25rem délivre l'identité personnelle attendue (B2B fondateur).

5. **Cwebp resize > qualité brute** : `cwebp -q 78 -resize 800 0` produit 81 KB pour 800×534 vs 144 KB pour 940×627 à -q 82. Pour LCP, dimension < qualité.

6. **`cd` sub-shell ne persiste pas, mais le Bash tool peut hériter** : éviter `cd path && command` pour les commandes longues — préférer chemins absolus depuis cwd projet.

7. **Faux positifs WCAG persistants** : `<h1 visually-hidden>` clip:rect détecté comme contraste 1:1 (blanc/blanc) bien que correctement caché — c'est un faux positif inhérent à l'audit auto. Documenter et passer.

---

## 9. INTERDICTIONS ABSOLUES (rappel CLAUDE.md)

- **JAMAIS** `migrate:fresh` ni DROP / DELETE sans WHERE
- **JAMAIS** `confirm()`, `alert()`, `prompt()` natifs
- **JAMAIS** écrire fichier prod sans `file_exists()` check préalable
- **JAMAIS** `claude-opus-4.6`, `gpt-5.2-pro`, `gemini-3-pro` via OpenRouter
- **JAMAIS** `WebSearch` / `WebFetch` brut pour veille technique
- **JAMAIS** Google Fonts URLs directs (RGPD violation) — toujours auto-hoster woff2
- **JAMAIS** `git push` sans GO user explicite (S28 règle local-only)

---

## 10. INSTANTANÉ CONTEXTE COMPLET

- **Working dir** : `/Users/stephanelapointe/__IA__/_____SERVEUR_____/site_internet/kalystrat`
- **HEAD** : `91eac3b` master
- **Build** : `php artisan view:clear` après modif Blade (Vite optionnel pour SCSS admin)
- **Local URL** : `https://kalystrat.test/` (Herd)
- **Admin URL** : `https://kalystrat.test/admin`
- **Charte v2 enrichie** : `.themes/charte_graphique/charte_v2.html` (142 KB)
- **Tests** : `php artisan test --filter=Smoke` → 31/31 PASS
- **Prod** : NON déployée (bloquée 4 inputs Ali — voir §6.3)

---

## 11. PROMPT DE REPRISE SESSION SUIVANTE

```
Tu reprends Kalystrat à /Users/stephanelapointe/__IA__/_____SERVEUR_____/site_internet/kalystrat.

LECTURE OBLIGATOIRE (ordre) :
1. ~/.claude/CLAUDE.md (règles globales MCP, recherche, sécurité, économies)
2. ./.handoffs/2026-05-07_session-handoff-s28-icons-signature-toiture.md
3. ~/.claude/projects/-Users-stephanelapointe.../memory/MEMORY.md

VÉRIFIER (parallèle) :
- git log --oneline -5  (HEAD attendu = 91eac3b)
- TaskList  (vérifier si tâches résiduelles)
- php artisan test --filter=Smoke  (baseline 31/31)

RÈGLES SESSION (rappel) :
- 1 chose à la fois (pas de batch parallèle massif, économie tokens Opus)
- Local only (jamais de push remote, jamais deploy sans GO explicite)
- Préambule [PLAN] avant chaque outil
- MCP cascade : multi-ai-mcp → openrouter-free → openrouter low-cost → Opus dernier
- Recherche web : pp_search EXCLUSIVEMENT (perplexity-pro-playwright)
- Validation Playwright OBLIGATOIRE avant marquer "completed" (screenshot zoomé)

PROCHAINES PRIORITÉS (autonomes) :
- Aucune urgence frontend pending — tout est stable et committed.
- Si user signale nouveau bug visuel : screenshot zoomé d'abord, MCP qwen3-max si génération code, fix chirurgical.

BLOQUÉES INPUTS ALI (NO-GO sans demande explicite) :
- D3-D6, E1-E2, F1-F3, G4, G5, G7 (voir handoff §6.1)

MÉTHODE :
1. Plan → Validate → Execute
2. TaskCreate dès qu'objectif clair, TaskUpdate in_progress/completed
3. Préambule [PLAN] systématique
4. STOP attendre validation user avant action critique
```
