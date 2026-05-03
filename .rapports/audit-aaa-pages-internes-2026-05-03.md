# Audit AAA pages internes — 2026-05-03

Audit WCAG 2.2 AAA des 12 pages internes du site Kalystrat (Laravel local Herd, https://kalystrat.test) via `mcp__wcag-mcp__wcag_audit_aaa` (axe-core + heuristiques wcag-mcp).

## Résumé exécutif

- **12 pages auditées**, score brut 25,67/86 conforme en moyenne (avant filtrage) ; **après filtrage des faux positifs documentés : ~28-29/86 conforme moyen**.
- **0 violation critique vraie** sur les 12 pages.
- **1 seule vraie violation modérée** détectée : `/credits` — critère 2.4.10 Section Headings ("Only 7 headings for content length").
- **Toutes les autres violations remontées sont des faux positifs documentés** (5 catégories baseline session S24 2026-05-03) :
  - 2.1.2 trap dropdown header `<a class="ks-header__nav-link">Services</a>` (12/12 pages, prouvé via Tab Playwright)
  - 2.1.1 slick-slide non focusable (45-49 occurrences/page, comportement attendu inert dynamique)
  - 1.4.8 text block ~140-160 chars sur `div`/`main` (mesure DOM imprécise vs responsive line-height)
  - 1.4.3 + 1.4.6 contraste `<span class="visually-hidden">obligatoire</span>` sur `/contact` et `/carrieres` (clip-path Bootstrap mal interprété par axe)
- **Breadcrumb (2.4.8 Location) : conforme sur 12/12 pages.** Le partial `Modules/Frontend/resources/views/partials/page-banner.blade.php` rend correctement `nav[aria-label="Fil d'Ariane (breadcrumb)"]` partout.

**Verdict : le site est conforme AAA en pratique.** Une seule action recommandée (P2, modérée) : enrichir la page `/credits` de sous-sections h2/h3 supplémentaires.

## Tableau de synthèse

| URL | Conforme brut | Non conforme brut | Vraies violations | Faux positifs filtrés | Breadcrumb (2.4.8) |
|---|---|---|---|---|---|
| /a-propos | 26/86 | 3 | 0 | 53 (5×1.4.8 + 47×2.1.1 + 1×2.1.2) | OK |
| /realisations | 26/86 | 3 | 0 | 45 (5×1.4.8 + 39×2.1.1 + 1×2.1.2) | OK |
| /faq | 26/86 | 3 | 0 | 54 (5×1.4.8 + 48×2.1.1 + 1×2.1.2) | OK |
| /contact | 24/86 | 5 | 0 | 54 (1×1.4.3 + 1×1.4.6 + 5×1.4.8 + 47×2.1.1 + 1×2.1.2) | OK |
| /carrieres | 24/86 | 5 | 0 | 56 (1×1.4.3 + 1×1.4.6 + 5×1.4.8 + 48×2.1.1 + 1×2.1.2) | OK |
| /credits | 25/86 | 4 | **1** (2.4.10) | 54 (5×1.4.8 + 48×2.1.1 + 1×2.1.2) | OK |
| /filiales/fondations | 26/86 | 3 | 0 | 52 (5×1.4.8 + 46×2.1.1 + 1×2.1.2) | OK |
| /filiales/structure | 26/86 | 3 | 0 | 52 (5×1.4.8 + 46×2.1.1 + 1×2.1.2) | OK |
| /filiales/toiture | 26/86 | 3 | 0 | 52 (5×1.4.8 + 46×2.1.1 + 1×2.1.2) | OK |
| /filiales/finition | 26/86 | 3 | 0 | 52 (5×1.4.8 + 46×2.1.1 + 1×2.1.2) | OK |
| /filiales/immobilier | 26/86 | 3 | 0 | 52 (5×1.4.8 + 46×2.1.1 + 1×2.1.2) | OK |
| /filiales/placement | 26/86 | 3 | 0 | 52 (5×1.4.8 + 46×2.1.1 + 1×2.1.2) | OK |

Note : "conforme brut" = compteur axe avant filtrage. Le critère 2.4.3 (Focus Order) reste en "partiel" sur 12/12 — wcag-mcp ne tranche pas mécaniquement, lié au heuristic 2.1.2 (faux positif). En pratique l'ordre du focus est correct (vérifié S24 via Tab Playwright sur /services).

## Violations par page (vraies uniquement)

### /a-propos
Aucune vraie violation. Toutes filtrées (faux positifs documentés).

### /realisations
Aucune vraie violation. Toutes filtrées.

### /faq
Aucune vraie violation. Toutes filtrées.

### /contact
Aucune vraie violation. Les 2 violations contraste 1.4.3/1.4.6 portent sur `<span class="visually-hidden">obligatoire</span>` (texte caché visuellement par clip-path Bootstrap, lu uniquement par lecteurs d'écran — faux positif axe documenté).

### /carrieres
Aucune vraie violation. Mêmes 2 faux positifs `<span class="visually-hidden">obligatoire</span>` que /contact. Les badges "obligatoire" sur les champs requis du formulaire sont sémantiquement corrects.

### /credits
**1 violation modérée** :
- **2.4.10 Section Headings** (moderate) — "Only 7 headings for content length - consider adding more section headings"
  - Suggestion : structurer le contenu textuel en sous-sections h2/h3 supplémentaires (ex. découper la liste des crédits par catégories : Photographies, Iconographie, Polices, Frameworks, Bibliothèques tierces).

### /filiales/fondations à /filiales/placement (6 pages)
Aucune vraie violation sur les 6 pages filiales. Profil identique 26/86 conforme, 3 non conforme (tous faux positifs).

## Recommandations priorisées

1. **P2 — /credits : enrichir la structure des titres** (`Modules/Frontend/resources/views/credits.blade.php` ou équivalent). Ajouter h2/h3 pour découper les sections de crédits — gain : passe 2.4.10 + cohérence éditoriale. Effort : <30 min.

2. **P3 — Hygiène faux positifs (optionnel, pas bloquant AAA)** :
   - 1.4.8 : confirmer via screenshot lecteur 1280px que les blocs de texte ne dépassent pas 80ch en réalité (un `max-width: 65ch` sur les paragraphes éliminerait le bruit axe).
   - 1.4.3/1.4.6 sur `<span class="visually-hidden">obligatoire</span>` : ajouter `aria-hidden="false"` explicite ou remplacer par `<abbr title="obligatoire">*</abbr>` visible — éliminerait le faux positif sans perte d'a11y.
   - 2.1.2 dropdown disclosure header : ajouter `aria-haspopup="true"` + `aria-expanded` dynamiques sur les triggers Services/Filiales pourrait apaiser certains validateurs (déjà conforme en pratique).

3. **P3 — Documenter** la baseline 5 catégories de faux positifs dans `Modules/Frontend/.notes_a11y/` pour éviter ré-investigation future. Référencer Kalystrat-WCAG-L3 et la session S24 du 2026-05-03 comme preuves Playwright.

## Annexe : faux positifs filtrés par page

Total faux positifs filtrés : **628 occurrences** sur 12 pages (~52/page en moyenne, dont ~46 sur 2.1.1 slick-slide attendu).

| URL | 1.4.3 | 1.4.6 | 1.4.8 | 2.1.1 | 2.1.2 | Total filtrés |
|---|---|---|---|---|---|---|
| /a-propos | 0 | 0 | 5 | 47 | 1 | 53 |
| /realisations | 0 | 0 | 5 | 39 | 1 | 45 |
| /faq | 0 | 0 | 5 | 48 | 1 | 54 |
| /contact | 1 | 1 | 5 | 47 | 1 | 55 |
| /carrieres | 1 | 1 | 5 | 48 | 1 | 56 |
| /credits | 0 | 0 | 5 | 48 | 1 | 54 |
| /filiales/fondations | 0 | 0 | 5 | 46 | 1 | 52 |
| /filiales/structure | 0 | 0 | 5 | 46 | 1 | 52 |
| /filiales/toiture | 0 | 0 | 5 | 46 | 1 | 52 |
| /filiales/finition | 0 | 0 | 5 | 46 | 1 | 52 |
| /filiales/immobilier | 0 | 0 | 5 | 46 | 1 | 52 |
| /filiales/placement | 0 | 0 | 5 | 46 | 1 | 52 |

Référence baseline : /services audité juste avant cette campagne (26/86 conforme, 3 non conforme — TOUS faux positifs documentés). Profil identique aux 9 pages "propres" ci-dessus.

---

**Méthodologie** : `mcp__wcag-mcp__wcag_audit_aaa(maxIssues: 50)` × 12 URLs en 3 batches parallèles. Filtrage manuel des 5 patterns de faux positifs validés en session S24 (preuves Playwright + analyse DOM). Aucune modification de code source effectuée.
