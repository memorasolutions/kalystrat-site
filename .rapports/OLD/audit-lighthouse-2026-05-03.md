# Audit Lighthouse mobile — 2026-05-03

## Résumé

- 6 URLs auditées en mode mobile, Lighthouse 12.8.2 (CLI), Chrome headless, certificat Herd accepté
- **Scores moyens** : Performance **73,5** / Accessibility **100** / Best Practices **100** / SEO **98,7**
- **Web Vitals médians** : LCP **4 849 ms** (cible ≤ 2 500 ms — DÉPASSÉE), CLS **0,000** (cible ≤ 0,1 — OK), TBT **0 ms** (cible ≤ 200 ms — EXCELLENT)
- **Verdict** : a11y, BP, SEO en zone excellente. Performance sous la cible 75 sur la home (67) à cause du LCP très élevé (6,3 s) lié au hero slider Slick. Toutes les autres pages oscillent 73-76. Site **non prêt pour la prod côté Performance** sans optimisation LCP/render-blocking, mais excellent partout ailleurs.

## Tableau des scores

| URL | Perf | A11y | BP | SEO | LCP (ms) | CLS | TBT (ms) |
|---|---:|---:|---:|---:|---:|---:|---:|
| `/` | **67** | 100 | 100 | **92** | **6 311** | 0,000 | 8 |
| `/a-propos` | 73 | 100 | 100 | 100 | 4 674 | **0,138** | 0 |
| `/services` | 74 | 100 | 100 | 100 | 4 850 | 0,000 | 0 |
| `/contact` | 75 | 100 | 100 | 100 | 4 852 | 0,000 | 0 |
| `/faq` | 76 | 100 | 100 | 100 | 4 833 | 0,000 | 0 |
| `/filiales/fondations` | 76 | 100 | 100 | 100 | 4 846 | 0,000 | 0 |

> Note : LCP entre 4,7 s et 6,3 s en mobile sur **toutes les pages** — c'est le problème central. Sous-cible critique mobile (≤ 2 500 ms) sur 6/6.

## Top 5 issues récurrentes (Performance)

1. **Render-blocking resources** : 5 fichiers CSS/fonts bloquent le rendu, économie estimée ≈ **2 350 ms**. Coupables : `style.css` (901 ms), `bootstrap.min.css` (451 ms), `remixicon.css` CDN (960 ms), `fontawesome.min.css` (150 ms), Google Fonts Sacramento (801 ms). Présent sur 6/6 pages.
2. **Cache TTL inefficace** : 51 ressources statiques sans `Cache-Control` long, économie estimée ≈ **1 720 KiB** sur visites répétées. Présent sur 6/6 pages (Herd local par défaut, à corriger en prod via `.htaccess`).
3. **Images non responsive** : 311 KiB économisables (≈ 750 ms) — images servies plus grandes que rendues.
4. **CSS inutilisé** : 102 KiB économisables (≈ 600 ms) — Bootstrap + Construz chargent ~30 % de règles non utilisées par la page courante.
5. **Formats d'image modernes** : 67 KiB économisables — quelques images encore en JPG/PNG sans variantes AVIF/WebP (le composant `<x-picture>` existe déjà mais pas appliqué partout).

LCP element identifié sur `/` : `div.hero-slider5 > div.slick-list > div.slick-track > div.hero-slide` (slide #1 du slider Slick — image hero pleine largeur).

## Recommandations priorisées

### P0 (impact > 10 points, prod-blocker)

1. **Fix render-blocking critical path** (gain estimé +10 à +15 pts Perf, LCP -1,5 à -2 s)
   - Inliner le CSS critical (above-the-fold) et différer le reste avec `media="print" onload="this.media='all'"` ou `<link rel="preload" as="style">` + swap.
   - Charger Sacramento (Google Fonts) en `&display=swap` ou self-host (économie 800 ms).
   - Charger `remixicon.css` (CDN jsdelivr) en async ou self-host (économie 960 ms).
2. **Optimiser le LCP du hero slider** (gain +8 à +12 pts Perf sur `/`)
   - Ajouter `<link rel="preload" as="image" fetchpriority="high">` sur l'image du **premier slide uniquement** (déjà fait pour le logo, à étendre).
   - Servir l'image du premier slide en AVIF + dimensions adaptées au mobile (≤ 414px largeur).
   - S'assurer que Slick n'instancie pas le slider avant que le LCP soit peint (lazy-init après DOMContentLoaded).
3. **Canonical home corrompu** (gain +8 pts SEO sur `/`)
   - `<link rel="canonical" href="https://kalystrat.test">` doit être `https://kalystrat.test/` (slash final). Lighthouse considère `kalystrat.test` sans slash invalide pour la home. À corriger en prod aussi.

### P1 (impact 5-10 points)

4. **Cache headers production** (gain +3 à +6 pts Perf en visite répétée)
   - En prod cPanel, ajouter dans `.htaccess` : `ExpiresActive On` + `ExpiresByType image/* "access plus 1 year"` + `Header set Cache-Control "public, max-age=31536000, immutable"` pour `/assets/*`.
   - Ajouter `?v=` versioning (ou `mix-manifest.json`) pour invalider sur déploiement.
5. **CSS purge** (gain +3 à +5 pts Perf)
   - PurgeCSS sur `style.css` + `bootstrap.min.css` au build (Tailwind/PostCSS), économie 100 KiB.
6. **CLS 0,138 sur `/a-propos`** (passe de 0,138 à 0)
   - Élément déclencheur : `div.about-area-2 > .col-lg-6` (image+texte qui se replace après load). Réserver l'espace via `aspect-ratio` ou `width`/`height` explicites sur l'image.
7. **Images responsive `srcset`** (gain +3 pts Perf)
   - Étendre l'usage de `<x-picture>` aux 6 cartes filiales et aux images about/services qui ne l'utilisent pas encore.

### P2 (cosmétique)

8. **Minifier CSS résiduel** (17 KiB — `style.css` n'est pas minifié, gain ≈ 120 ms).
9. **Minifier JS résiduel** (3 KiB — script inline ou non-minifié quelque part).
10. **DOM size home** : 927 éléments (seuil Lighthouse 800). Acceptable mais à surveiller si on ajoute des sections.
11. **Preconnect Google Fonts** : ajouter `<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>` (gain ≈ 60 ms, déjà partiel sur `/`).

---

## Annexe — Détail par page

| Page | Issue principale |
|---|---|
| `/` | LCP 6,3 s (hero slider Slick) + canonical sans slash + render-blocking CSS |
| `/a-propos` | LCP 4,7 s + **CLS 0,138** (image about-area-2) |
| `/services` | LCP 4,85 s (render-blocking commun) |
| `/contact` | LCP 4,85 s (idem) |
| `/faq` | LCP 4,83 s (idem) |
| `/filiales/fondations` | LCP 4,85 s (idem) |

A11y, BP, SEO (hors home) tous à 100/100 — site **excellent** sur ces axes, l'effort post-P22 sur AAA et meta tags paie.

Rapports JSON bruts (supprimés après analyse) : `/tmp/lighthouse-kalystrat/*.json`.
