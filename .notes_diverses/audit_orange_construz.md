# Audit classes orange Construz — préparation décision G5

**Date** : 2026-05-08 (S30)
**Branche** : master, HEAD `ce3b04c`
**Objectif** : chiffrer l'effort de migration orange Construz → navy/gold Kalystrat pour permettre à Ali de trancher G5.

## TL;DR pour Ali

- Le thème Construz utilise **1 seule variable CSS** `--theme-color: #EA5501` (rouge-orange) référencée **306 fois** dans `style.css`.
- Les vues Blade ne contiennent **aucune** couleur orange en hex direct ; elles utilisent les classes Construz natives.
- 3 options de migration, avec coûts/risques très différents (voir section "Options").
- **Recommandation** : Option B (overrides ciblés AAA) — meilleur compromis effort/risque/qualité.

## Données brutes

### Définition source unique

```css
/* public/assets/construz-new/css/style.css:76-82 */
:root {
  --theme-color: #EA5501;       /* orange Construz natif — 306 usages */
  --title-color: #15161C;
  --body-color: #737373;
  --smoke-color: #FAFAFA;
  --smoke-color2: #EBEBEB;
}
```

### Comptage des usages

| Pattern | Fichier | Occurrences |
|---|---|---|
| `var(--theme-color)` | `public/assets/construz-new/css/style.css` | **306** |
| `var(--theme-color2)` | `public/assets/construz-new/css/style.css` | 0 (variable inexistante) |
| `#EA5501` hex direct | `public/assets/construz-new/css/style.css` | 1 (la définition) |
| `#EA5501` / `#F36F21` / `#FF6600` | Blades `Modules/Frontend/resources/views/**` | **0** |
| Mention "orange" en commentaire | `layout.blade.php` overrides AAA existants | 7 |

### Overrides AAA déjà en place

`Modules/Frontend/resources/views/layout.blade.php` contient déjà 7 overrides assombrissant `#EA5501` → `#8C2E00` (orange foncé AAA 7:1 sur blanc) :

| Ligne | Cible | Couleur override |
|---|---|---|
| 482-486 | `.btn.style2` (boutons CTA hero/sections) | `#8C2E00` |
| 763 | `.sub-title.text-theme` (sous-titres orange) | `#8C2E00` |
| 796 | `.btn` sans `.style2` | `#8C2E00` |
| 1005 | `.blog-date a` (date carrière) | `#8C2E00` |
| 1011 | `.style-border4` (bouton "Postuler") | `#8C2E00` |
| 1031-1048 | `.about-wrap5 .icon-btn` + `.cta-grid-wrap .icon-btn` (S29) | navy + gold |

Les sections déjà migrées navy/gold (S29) :
- About-area home (icons + signature Caveat)
- Skip-link, focus-visible global
- Header sticky, mobile-nav, dropdowns, CTA header

## Composantes orange visibles non encore migrées

D'après le screenshot mobile S29 et le fingerprint des classes :

1. **Bouton "DEMANDER UNE SOUMISSION GRATUITE"** sur hero (mobile + desktop) — classe `.btn` + `.style-border` (#EA5501 natif)
2. **Tabs filiales section why-area-3** (5 onglets actifs, chevron orange)
3. **Boutons portfolio "view project"** (`.style-border4`)
4. **Badges/labels orange** (testimonial-area-5, blog-area-4)
5. **Hover states links** (footer + menu mobile sur certains states)
6. **Counter-area underline + chiffres** (orange sur navy)
7. **Award-area icons + chevrons**

Note : le contraste AAA est partiellement assuré par les overrides `#8C2E00` mais reste orange (pas la charte Kalystrat).

## Options de migration

### Option A — Migration globale en 1 ligne

```css
/* public/assets/construz-new/css/style.css:78 */
- --theme-color: #EA5501;
+ --theme-color: #B8A472;  /* gold Kalystrat */
```

**Pour** : 1 changement, 306 usages mis à jour automatiquement.

**Contre** :
- Le gold `#B8A472` sur fond blanc = ratio contraste **3.06:1** (échoue AAA texte 7:1, échoue AA 4.5:1 large texte). 30+ usages texte deviennent non-conformes.
- Tous les boutons `.btn` actuellement override `#8C2E00` en layout.blade.php devraient être re-revus.
- Les overrides AAA `#8C2E00` actuels sur layout.blade.php deviennent inutiles → suppression nécessaire pour cohérence.
- Risque visuel élevé : 306 usages à inspecter visuellement cross-pages × 3 viewports.

**Effort estimé** : 1h modif + 4-6h validation WCAG cross-pages (13 pages × 3 viewports × audit AAA) + corrections itératives.

### Option B — Overrides ciblés AAA dans layout.blade.php (RECOMMANDÉE)

Garder `--theme-color: #EA5501` dans style.css. Ajouter overrides ciblés navy/gold dans layout.blade.php pour les composantes structurelles :

```css
/* Pattern existant déjà éprouvé S29 (about-wrap5 .icon-btn) */
.btn, .btn.style2 { background: var(--ks-navy) !important; color: var(--ks-gold) !important; }
.btn:hover, .btn.style2:hover { background: var(--ks-gold) !important; color: var(--ks-navy) !important; }
.style-border4 { border-color: var(--ks-gold) !important; color: var(--ks-navy) !important; }
.sub-title.text-theme { color: var(--ks-navy) !important; }
.about-wrap5 .nav-tabs .nav-link.active { background: var(--ks-navy) !important; color: var(--ks-gold) !important; }
/* etc. pour tabs, badges, counters, awards, hovers */
```

**Pour** :
- Modifications additives (override) → portable, restitue Construz si l'override est retiré.
- Validation WCAG ciblée (un override = un test de contraste).
- Cohérence avec l'approche S29 déjà éprouvée (overrides modulaires).
- Permet conservation visuelle progressive (1 commit par section visuelle).

**Contre** :
- ~10-15 sélecteurs CSS à override.
- Maintenance plus dispersée.

**Effort estimé** : 2-3h CSS + 1-2h validation WCAG + screenshots multi-viewports.

### Option C — Statu quo (orange Construz natif)

Garder #EA5501 partout. Conserver overrides AAA `#8C2E00` existants pour conformité contraste.

**Pour** : 0 effort.

**Contre** :
- Site reste visuellement Construz ≠ charte Kalystrat navy/gold #0A1628/#B8A472.
- Incohérence avec sections déjà migrées S29 (about-area, header, etc.).
- Décision G5 reportée → dette technique.

**Effort estimé** : 0h.

## Recommandation tranchée

**Option B**. Justifications :

1. **Risque maîtrisé** : pattern d'overrides ciblés validé S29 (about-wrap5 .icon-btn = AAA 7.42:1 sur navy).
2. **Conservation Construz** : si on retire les overrides, le thème Construz reste fonctionnel (contre Option A qui le casse partiellement).
3. **Validation WCAG localisée** : chaque override = un check de contraste isolé (vs Option A qui demande audit global de 306 usages).
4. **Cohérence avec S29** : continue le travail déjà entamé sur about-area et icons home.
5. **Effort raisonnable** : 3-5h total (vs 5-7h Option A avec rework probable).

## Décision attendue d'Ali (G5)

Ali doit trancher entre :
- **B** (recommandé) : "Migre la marque Kalystrat partout, mais garde la stabilité du thème"
- **A** : "Migration radicale, on accepte les corrections WCAG dérivées"
- **C** : "Garde Construz tel quel, on attendra les photos réelles G4 pour reconsidérer"

Si réponse B : ouverture d'une session dédiée S31+ avec implémentation par sections visuelles (1 commit / section pour rollback rapide).

## Références fichiers

- `public/assets/construz-new/css/style.css:78` — définition `--theme-color`
- `Modules/Frontend/resources/views/layout.blade.php:154-155` — tokens Kalystrat `--ks-navy` `--ks-gold`
- `Modules/Frontend/resources/views/layout.blade.php:482-1048` — overrides AAA + S29 navy/gold existants
- `.handoffs/2026-05-04_session-handoff-s26-securite-deploy.md` — contraste AAA validé sur 13 pages
- `session_2026-05-08_s29_handoff.md` — S29 about-area pattern réutilisé
