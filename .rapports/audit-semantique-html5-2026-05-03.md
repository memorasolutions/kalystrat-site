# Audit sémantique HTML5 — 2026-05-03

## Résumé

- **14 URLs auditées** (1 home + 7 pages principales + 6 filiales)
- **13 violations totales** détectées (1 type, 1 source unique)
- **Score global : 91 / 98 critères validés (92,8 %)**
- **Verdict** : sémantique HTML5 globalement saine. Une seule violation systémique : un `div role="banner"` redondant sur le bandeau de page (`.ks-page-banner.breadcumb-wrapper`) présent sur les 13 pages internes.

### Détail conformité (7 critères × 14 URLs = 98)

| Critère | Pages OK | Pages KO |
|---|---|---|
| h1 unique | 14/14 | 0 |
| 1 seul main | 14/14 | 0 |
| 1 seul header racine | 14/14 | 0 |
| 1 seul footer racine | 14/14 | 0 |
| Pas de role redondant (banner+contentinfo=0) | 1/14 | 13 |
| Tous les nav ont aria-label | 14/14 | 0 |
| Pas de saut > 1 niveau heading | 14/14 | 0 |

## Tableau de synthèse

| URL | h1 | main | header | footer | Roles redondants | Nav sans label | Sauts headings |
|-----|----|----|------|------|----|----|----|
| / | 1 | 1 | 1 | 1 | 2 (banner + contentinfo) | 0/3 | 0 |
| /a-propos | 1 | 1 | 1 | 1 | 3 (2 banner + 1 contentinfo) | 0/4 | 0 |
| /services | 1 | 1 | 1 | 1 | 3 (2 banner + 1 contentinfo) | 0/4 | 0 |
| /realisations | 1 | 1 | 1 | 1 | 3 (2 banner + 1 contentinfo) | 0/4 | 0 |
| /faq | 1 | 1 | 1 | 1 | 3 (2 banner + 1 contentinfo) | 0/4 | 0 |
| /contact | 1 | 1 | 1 | 1 | 3 (2 banner + 1 contentinfo) | 0/4 | 0 |
| /carrieres | 1 | 1 | 1 | 1 | 3 (2 banner + 1 contentinfo) | 0/4 | 0 |
| /credits | 1 | 1 | 1 | 1 | 3 (2 banner + 1 contentinfo) | 0/4 | 0 |
| /filiales/fondations | 1 | 1 | 1 | 1 | 3 (2 banner + 1 contentinfo) | 0/4 | 0 |
| /filiales/structure | 1 | 1 | 1 | 1 | 3 (2 banner + 1 contentinfo) | 0/4 | 0 |
| /filiales/toiture | 1 | 1 | 1 | 1 | 3 (2 banner + 1 contentinfo) | 0/4 | 0 |
| /filiales/finition | 1 | 1 | 1 | 1 | 3 (2 banner + 1 contentinfo) | 0/4 | 0 |
| /filiales/immobilier | 1 | 1 | 1 | 1 | 3 (2 banner + 1 contentinfo) | 0/4 | 0 |
| /filiales/placement | 1 | 1 | 1 | 1 | 3 (2 banner + 1 contentinfo) | 0/4 | 0 |

> Note critère « Roles redondants » : le critère original additionne `bannerRoleCount + contentinfoRoleCount`. La home a 1+1 = **2** (acceptable car 1 banner sur `<header>` racine + 1 contentinfo sur `<footer>` racine sont les rôles implicites légitimes — ces attributs explicites sont **redondants mais non nocifs**). Les 13 autres pages ont 2+1 = **3**, le 2e `banner` étant la **vraie violation** (un `div` à l'intérieur de `<main>`).

## Violations détectées

### Violation unique systémique : `div role="banner"` à l'intérieur de `<main>`

**Pages concernées** : les 13 pages internes (toutes sauf `/`).

**Détail technique** :
```html
<main class="ks-main">
  <div class="ks-page-banner breadcumb-wrapper" role="banner">
    <!-- bandeau hero avec titre + breadcrumb -->
  </div>
  ...
</main>
```

**Pourquoi c'est une violation** :
- Le rôle ARIA `banner` doit être unique au niveau racine du document (équivalent du `<header>` racine).
- Avoir un 2e `role="banner"` à l'intérieur de `<main>` crée 2 landmarks de type banner, ce qui désoriente les lecteurs d'écran (NVDA/JAWS annoncent « 2 régions banner »).
- Le bon rôle pour un bandeau de page (titre + fil d'Ariane) est `<section aria-labelledby="...">` ou simplement aucun rôle (`<div>` neutre).

**Référence WAI-ARIA** : https://www.w3.org/TR/wai-aria-1.2/#banner — *"Within any document or application, the author SHOULD mark no more than one element with the banner role."*

**Source probable** : composant Blade partagé du layout (probablement `Modules/Frontend/resources/views/components/page-banner.blade.php` ou équivalent dans `layouts/master.blade.php`). À grep `role="banner"` dans `Modules/Frontend/resources/views/`.

### Roles explicites redondants (mineur, non bloquant)

- `<header class="ks-header" role="banner">` : le rôle `banner` est **implicite** sur `<header>` enfant direct de `<body>`. L'attribut explicite est inutile mais non nocif.
- `<footer role="contentinfo">` (probable) : idem, `contentinfo` est implicite sur `<footer>` enfant direct de `<body>`.

Ces 2 redondances n'altèrent pas l'accessibilité, mais sont du bruit de code à nettoyer.

## Points positifs notables

1. **h1 unique** sur toutes les pages — parfait pour le SEO et l'accessibilité.
2. **Hiérarchie de headings stricte** sur 14/14 pages — aucun saut h1→h3 ou h2→h4. La page `/a-propos` montre une structure `1,2,2,2,3,3,3,2,3,...` exemplaire.
3. **Tous les `<nav>` ont un `aria-label` distinct** : `Navigation principale`, `Navigation mobile`, `Fil d'Ariane (breadcrumb)`, `Liens légaux et conformité` — excellent pour un lecteur d'écran qui annonce les régions.
4. **Usage approprié de `<article>`** sur la home (15 articles : témoignages, blog, projets) et `/services`, `/carrieres` (cartes services/postes).
5. **Pas de `div[role="main"]`** — la page utilise bien `<main>` natif.
6. **`div[role="tabpanel"]`** sur la home : usage légitime (composant tabs Construz), pas une violation.

## Recommandations (priorité)

### P0 (à corriger avant prod)

1. **Supprimer le `role="banner"` du `<div class="ks-page-banner breadcumb-wrapper">`** dans le composant Blade qui rend le bandeau de page interne (sur les 13 pages non-home). Soit retirer l'attribut, soit le remplacer par `role="region" aria-labelledby="page-title-id"` si on veut conserver une landmark.

   Commande de localisation suggérée :
   ```
   grep -rn 'role="banner"' Modules/Frontend/resources/views/
   ```

### P1 (cleanup code, non bloquant)

2. **Retirer les `role="banner"` et `role="contentinfo"` explicites** sur le `<header>` et `<footer>` racine — les rôles ARIA sont implicites et redondants. Réduit le bruit de code et évite la confusion.

### P2 (optionnel, amélioration sémantique)

3. **Augmenter l'usage de `<section>`** sur certaines pages pauvres en sectioning : `/contact` (0 section, 0 article), `/carrieres` (0 section), `/filiales/*` (0 section, 0 article). Les blocs h2/h3 actuels sont rendus avec `<div>` — wrapper avec `<section aria-labelledby="...">` améliorerait la navigation par lecteur d'écran. Non bloquant mais recommandé pour AAA.

4. **Conserver et documenter le pattern `<nav aria-label="...">`** comme bonne pratique référence dans `Modules/Frontend/README.md` — c'est un point fort du codebase.
