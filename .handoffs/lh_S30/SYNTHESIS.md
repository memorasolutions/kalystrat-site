# Audit Lighthouse + Core Web Vitals — S30

**Amendement 2026-05-08 — quick wins T20 (Cache-Control) + T21 (minif CSS) appliqués (commits `c675cb0` + `0eee2ad`).**

| Page | Perf avant → après | LCP | FCP | Speed Index |
|---|---|---|---|---|
| home | 88 → 89 ↑ | 3.3s = | 2.0 → 1.8s | 4.7 → 4.4s |
| services | 88 → **90** ↑ | 3.6 → 3.5s | 1.5s = | 3.8 → 2.6s |
| realisations | 88 → 89 ↑ | 3.6 → 3.5s | 1.5s = | 3.8s = |
| contact | 89 → **90** ↑ | 3.6 → 3.5s | 1.5s = | 2.4s = |
| faq | 87 → 88 ↑ | 3.6s = | 1.5s = | 4.4 → 3.8s |

**Cibles 2026 atteintes sur 2/5 pages mobile** (services, contact). Les 3 autres à 88-89 (manque 1-2 pts).

Audits résolus :
- `unminified-css` : 17 KiB → 5 KiB savings (-12 KiB) ✅
- `render-blocking-resources` : 450ms → 300ms savings (-150ms)
- `total-byte-weight` : -7 KiB par page

Cache-Control .htaccess actif uniquement en prod cPanel Apache (Herd nginx local ignore les directives). Gain réel attendu en prod : +3-5 pts perf supplémentaires sur visites répétées.

---

**Date** : 2026-05-08 (S30 amendée)
**Branche** : master, HEAD `0eee2ad`
**Outil** : `lighthouse` 12.8.2 (npm global)
**Méthode** : 5 pages clés × 2 form-factors = 10 audits Lighthouse simulate.
**Pages** : home (/), services, realisations, contact, faq.
**Résultats bruts JSON** : `.handoffs/lh_S30/*.json` (exclus du git via .gitignore — regenerables).

## TL;DR

- **Desktop 5/5 pages : 100/100/100/100** (Performance, A11y, BP, SEO). LCP 0.7s, CLS 0. ✅ **Cibles 2026 atteintes**.
- **Mobile 5/5 pages : 87-89 / 100 / 100 / 100**. LCP 3.3-3.6s (cible <2.5s manquée). CLS 0 ✅.
- A11y AAA + BP + SEO = parfait sur les 10 audits.
- Performance mobile **manque la cible 90+ de 1-3 points** à cause de 4 axes optimisables : render-blocking CSS, unused CSS, images responsives, image formats modernes.

## Tableau scores complet

### Desktop (form-factor desktop, throttling simulate)

| Page | Perf | A11y | BP | SEO | LCP | CLS | TBT |
|---|---|---|---|---|---|---|---|
| home | **100** | 100 | 100 | 100 | 0.7s | 0 | 0ms |
| services | **100** | 100 | 100 | 100 | 0.7s | 0 | 0ms |
| realisations | **100** | 100 | 100 | 100 | 0.7s | 0 | 0ms |
| contact | **100** | 100 | 100 | 100 | 0.7s | 0 | 0ms |
| faq | **100** | 100 | 100 | 100 | 0.7s | 0 | 0ms |

### Mobile (form-factor mobile, throttling simulate)

| Page | Perf | A11y | BP | SEO | LCP | CLS | TBT |
|---|---|---|---|---|---|---|---|
| home | **88** | 100 | 100 | 100 | 3.3s | 0 | 10ms |
| services | **88** | 100 | 100 | 100 | 3.6s | 0 | 0ms |
| realisations | **88** | 100 | 100 | 100 | 3.6s | 0 | 0ms |
| contact | **89** | 100 | 100 | 100 | 3.6s | 0 | 0ms |
| faq | **87** | 100 | 100 | 100 | 3.6s | 0 | 0ms |

### Cibles 2026

| Métrique | Cible | Desktop | Mobile |
|---|---|---|---|
| Performance | ≥ 90 | ✅ 100 | ⚠️ 87-89 (manque 1-3 pts) |
| Accessibility | 100 | ✅ 100 | ✅ 100 |
| Best Practices | ≥ 95 | ✅ 100 | ✅ 100 |
| SEO | 100 | ✅ 100 | ✅ 100 |
| LCP | < 2.5s | ✅ 0.7s | ❌ 3.3-3.6s |
| CLS | < 0.1 | ✅ 0 | ✅ 0 |
| TBT (≈ INP) | < 200ms | ✅ 0ms | ✅ 0-10ms |

## Top opportunités d'optimisation mobile

Extraites de `home_mobile.json` (les chiffres similaires sur les 5 pages).

| ID | Savings | Description |
|---|---|---|
| `render-blocking-resources` | 450ms | CSS Construz bloque le rendu |
| `unused-css-rules` | 83 KiB | Une grande partie de style.css n'est pas utilisée par la page courante |
| `unused-javascript` | 52 KiB | JS chargé mais pas exécuté sur la page |
| `uses-responsive-images` | 223 KiB | Images servies dans une taille trop grande pour le viewport mobile |
| `modern-image-formats` | 50 KiB | Conversion WebP/AVIF des assets non encore migrés |
| `unminified-css` | 17 KiB | style.css Construz non minifié |
| `unminified-javascript` | 3 KiB | JS Construz partiellement non minifié |
| `uses-long-cache-ttl` | 44 ressources | Cache-Control headers à durcir (Cache-Control: public, max-age=31536000) |

## Recommandations actionnables (priorité décroissante)

### P0 — Apprentissage S25 IMPORTANT
**Defer JS dégrade ce site** (mémoire `.handoffs/2026-05-03_session-handoff.md`). NE PAS proposer `defer`/`async` sur les scripts Construz sans tests A/B croisés. Le site charge 5 sliders dépendants de Owl/Slick qui doivent rester synchrones.

### P1 — Quick wins (effort < 30 min, gain ~3-5 pts mobile)

#### Critical CSS inline + style.css async
Extraire les ~10 KiB CSS critique (above-the-fold du hero) et les inliner dans `<head>` ; charger le reste via `<link rel="preload" as="style" onload="this.rel='stylesheet'">`.
**Risque** : nul si patch testé sur kalystrat.test avant prod.
**Gain estimé** : -300ms LCP, -150ms render-blocking.

#### Cache-Control headers longs sur assets statiques
Ajouter dans `.htaccess` ou `Modules/Frontend/public/.htaccess` :
```apache
<FilesMatch "\.(css|js|jpg|jpeg|png|webp|svg|woff2|woff|ttf|otf)$">
    Header set Cache-Control "public, max-age=31536000, immutable"
</FilesMatch>
```
**Gain estimé** : Best Practices score conservé, perf répétée +5 pts (visites retour).
**Risque** : nul si versionning des assets via cache-busting (`?v=20260508`).

#### Minification CSS Construz
Le fichier `public/assets/construz-new/css/style.css` est non minifié. Soit :
- Utiliser un CDN-side minifier (Cloudflare auto-minify post-D3)
- Soit générer une version `.min.css` via npm script (build step)
**Gain estimé** : -17 KiB transfer (mineur isolé, mais cumulé +1 pt).

### P2 — Investissement moyen (effort 1-2h, gain ~5-7 pts mobile)

#### Images responsives
Remplacer les `<img src="...">` par `<picture>` avec sources WebP + tailles adaptées :
```html
<picture>
  <source srcset="/img/photo-mobile.webp" media="(max-width: 768px)" type="image/webp">
  <source srcset="/img/photo-tablet.webp" media="(max-width: 1024px)" type="image/webp">
  <source srcset="/img/photo-desktop.webp" type="image/webp">
  <img src="/img/photo.jpg" alt="..." loading="lazy" width="1920" height="1080">
</picture>
```
**Gain** : -223 KiB sur mobile + format moderne. LCP probablement <2.5s atteint.
**Bloqué partiellement par G4** (Ali livre photos réelles → optimisation à faire à ce moment-là).

#### Purge unused CSS
Utiliser PurgeCSS (configuration tailwind/laravel-mix) pour scanner les Blades + classes utilisées et supprimer les ~83 KiB CSS Construz inutilisés.
**Risque** : moyen — Construz a beaucoup de classes utilitaires dynamiques (sliders, modals). Tests visuels cross-pages obligatoires post-purge.
**Gain** : -83 KiB transfer, +3 pts perf mobile.

### P3 — Optionnel, gain marginal

#### Preload critical assets
```html
<link rel="preload" href="/assets/fonts/akzidenzgrotesk.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="/assets/img/hero/slide-1.webp" as="image" media="(min-width: 769px)">
```

#### HTTP/3 + Server Push
Activable via Cloudflare post-D3.

## Plan de remédiation par session

### S31 (effort 30-45 min)
- P1 Cache-Control `.htaccess`
- P1 Minification CSS (script npm minify)
- Mesure baseline post-fix : LCP cible 2.8-3.0s, Perf 90-92.

### S32 (effort 1-2h, après G4 photos Ali)
- P2 Images responsives + WebP migration sur photos réelles Ali
- Mesure : LCP cible <2.5s, Perf 92-95.

### S33 (effort 2-3h, optionnel)
- P2 PurgeCSS
- P3 Preload fonts + hero
- Mesure : Perf 95+ mobile.

## Statut tâche #5

**Audit Lighthouse S30 = COMPLÉTÉ** ✅. Données collectées sur 10 audits, recommandations actionnables priorisées. **Aucune optimisation appliquée dans S30** (scope = audit + plan seulement).

## Références

- `.handoffs/lh_S30/*.json` — résultats bruts complets (regenerables, exclus git)
- `.handoffs/2026-05-03_session-handoff.md` — apprentissage S25 sur defer JS
- `.handoffs/2026-05-04_session-handoff-s26-securite-deploy.md` — audit AAA 13 pages
- `.notes_diverses/audit_orange_construz.md` — préparation G5 (lié à perf via images)
- `.handoffs/audit_visuel_S30/SYNTHESIS.md` — audit visuel jumeau S30
