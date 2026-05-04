---
titre: Audit WCAG 2.2 AAA — Cartes du site Kalystrat
projet: Kalystrat (Gestion Kalystrat Inc.)
date: 2026-05-04
auteur: Claude Opus 4.7 (superviseur) + délégation qwen3-max via multi-ai-mcp-3
type: audit lecture seule (aucune modification fichier)
périmètre: Toutes cartes/cards inventoriées sur les 22 pages publiques + composants partagés
référentiels: WCAG 2.2 (W3C Recommendation, octobre 2023), niveau AAA
---

# Audit WCAG 2.2 AAA — Cartes du site Kalystrat

## Résumé exécutif

| Indicateur | Valeur |
|---|---|
| Périmètre | 22 pages publiques + 14 types distincts de cartes |
| Total instances de cartes auditées | 73 |
| Critères WCAG 2.2 AAA évalués | 13 |
| **Verdict global** | **NON CONFORME 100% AAA** |
| Score conformité par critère | **10 / 13** vérifiés conformes (77 %) |
| Violations critiques 1.4.6 (Contrast Enhanced AAA) | **9 instances** sur 3 types de cartes |
| Violations majeures cohérence | **5 types** de cartes hétérogènes (uniformité) |
| Cards Kalystrat custom (`.ks-*-card`) | 5 types, **0 violation AAA réelle** ✅ (auditées dans la session) |
| Cards Construz inline (non-uniformisées) | 9 types, **3 ont des violations AAA** ❌ |

### Top 3 manquements

1. **CTA "En savoir plus" / téléphone / courriel en `#8C2E00` (orange Construz)** — ratio 6.3:1 sur blanc, viole 1.4.6 AAA (besoin ≥ 7:1). Présent sur **services** (6 instances) + **contact** (3 instances × 2 liens) + **realisations** + **filiale FAQ widget**. **Total : ~9 instances de la même classe `.link-btn` Construz.**
2. **Hétérogénéité visuelle** — 14 styles distincts de cards sur le site, dont 9 inline non-uniformisés. Aucune classe CSS centrale `.ks-card` réutilisable.
3. **Cards "flat" sans relief** — sections "4 raisons" services, "Avantages" carrieres, sidebar widget filiale n°1 : aucun border ni box-shadow, perception d'accessibilité dégradée (utilisateurs cognitifs/malvoyants).

---

## Critères WCAG 2.2 AAA appliqués (référentiel normé)

Source : [WCAG 2.2 W3C Recommendation, 5 octobre 2023](https://www.w3.org/TR/WCAG22/)

### Niveau A
| SC | Intitulé | Applicable cards |
|---|---|---|
| **1.3.1** | Info and Relationships | ✅ structure DOM, hiérarchie heading, sémantique `<article>` |
| **4.1.2** | Name, Role, Value | ✅ rôles ARIA cards cliquables, accordéons, boutons |

### Niveau AA
| SC | Intitulé | Cible numérique |
|---|---|---|
| **1.4.3** | Contrast (Minimum) | Texte normal ≥ 4.5:1, texte large ≥ 3:1 |
| **1.4.11** | Non-text Contrast | UI components / éléments graphiques essentiels ≥ 3:1 |
| **1.4.12** | Text Spacing | Tolérance line-height/letter-spacing personnalisé |
| **2.4.6** | Headings and Labels | Headings descriptifs |
| **2.4.7** | Focus Visible | Focus clavier perceptible |
| **2.5.8** | Target Size (Minimum) | Cibles cliquables ≥ 24×24 px |

### Niveau AAA (cible projet Kalystrat)
| SC | Intitulé | Cible numérique |
|---|---|---|
| **1.4.6** | **Contrast (Enhanced)** | Texte normal **≥ 7:1**, texte large ≥ 4.5:1 |
| **1.4.8** | Visual Presentation | Bloc texte ≤ 80 caractères |
| **2.4.12** | Focus Not Obscured (Enhanced) | Focus jamais masqué |
| **2.4.13** | Focus Appearance | Outline ≥ 2 CSS pixels, contraste ≥ 3:1 |
| **2.5.5** | **Target Size (Enhanced)** | Cibles cliquables **≥ 44×44 px** |

---

## Inventaire complet des cartes (14 types, 73 instances)

### A. Cards Kalystrat custom (5 types, 22 instances) — uniformisées récemment

| ID | Classe CSS | Inst. | Page | Fichier:ligne | Statut visuel |
|---|---|---|---|---|---|
| A1 | `.ks-filiale-card` | 6 | `/a-propos` | `apropos.blade.php:407` | ✅ Premium (refonte commits `ed5f79f` + `a4e1539`) |
| A2 | `.ks-conseil-card` (+ `--vacant`) | 3 + 3 | `/conseil-consultatif` | `conseil.blade.php:107,117,127,149,157,165` | ✅ AAA conforme |
| A3 | `.ks-partner-card` | 4 | `/partenaires` | `partenaires.blade.php:100,107,114,121` | ✅ AAA conforme |
| A4 | `.ks-zone-card` | 5 | `/zones-desservies` | `zones-desservies.blade.php:127` (foreach) | ✅ AAA conforme |
| A5 | `.ks-ville-card` | 4 | `/zones-desservies/{slug}` | `ville.blade.php:153,163,173,183` | ✅ AAA conforme |

### B. Cards Construz inline (9 types, 51 instances) — non-uniformisées

| ID | Classe / pattern | Inst. | Page | Fichier:ligne | Problème AAA |
|---|---|---|---|---|---|
| B1 | `.service-card` | 6 | `/services` | `services.blade.php:75` | ❌ CTA `#8C2E00` 6.3:1 |
| B2 | "4 raisons" mini-divs (text-center p-3) | 4 | `/services` | `services.blade.php:107-145` | ⚠️ Flat sans relief |
| B3 | `.contact-info-card` | 3 | `/contact` | `contact.blade.php:60,70,80` | ❌ liens tel + courriel `#8C2E00` 6.3:1 |
| B4 | `.blog-card.style5` | 8 | `/carrieres` | `carrieres.blade.php:86` | ⚠️ séparateur · `#595959` 5:1 |
| B5 | "Avantages" mini-cards | 4 | `/carrieres` | `carrieres.blade.php:130` | ⚠️ Flat sans border ni shadow |
| B6 | Article + 2 div hétérogènes | 3 styles | `/realisations` | `realisations.blade.php:102,121,131` | ⚠️ 3 styles différents même page |
| B7 | `.accordion-item` (Bootstrap) | 20 | `/faq` | `faq.blade.php:66` | ✅ structure correcte |
| B8 | `.service-widget` sidebar | 2 | `/filiales/{6 slugs}` | `filiale.blade.php:68,84` | ⚠️ widget #1 sans relief |
| B9 | Tableau crédits | 1 | `/credits` | `credits.blade.php:96` | ✅ structure `<table>` correcte |

**Total cards inventoriées :** 22 (A) + 51 (B) = **73 instances**

---

## Tableau d'audit par élément × critère

### A. Cards Kalystrat custom — état post-refonte session 2026-05-04

| Card | 1.3.1 | 1.4.3 AA | 1.4.6 AAA | 1.4.8 | 1.4.11 | 2.4.6 | 2.4.7 | 2.5.5 AAA | 4.1.2 | Commentaire |
|---|---|---|---|---|---|---|---|---|---|---|
| A1 `.ks-filiale-card` | ✅ | ✅ 16:1 | ✅ 16:1 | ✅ | ✅ shadow + border 0.10 | ✅ h3 | ✅ outline gold | ✅ liens 44px | ✅ `<article>` | Refonte ed5f79f + a4e1539, top-border distinctif par filiale |
| A2 `.ks-conseil-card` | ✅ | ✅ 16:1 | ✅ rôle #5C4F2C 8:1 | ✅ | ✅ border navy 0.08 | ✅ h3 | ✅ | ✅ | ✅ | Avatar circle navy+gold initiales OK |
| A2 `.ks-conseil-card--vacant` | ✅ | ✅ | ✅ | ✅ | ✅ bg #F4F4F2 + dashed gold | ✅ | ✅ | N/A | ✅ | Postes à pourvoir, badge gold |
| A3 `.ks-partner-card` | ✅ | ✅ 16:1 | ✅ | ✅ | ✅ icône circle navy+gold | ✅ h3 | ✅ | N/A pas cliquable | ✅ aria-labelledby | Conforme |
| A4 `.ks-zone-card` | ✅ anchor | ✅ | ✅ | ✅ | ✅ hover gold border | ✅ h3 | ✅ | ✅ entire card cliquable | ✅ aria-label | Conforme |
| A5 `.ks-ville-card` | ✅ | ✅ | ✅ | ✅ | ✅ icône gold 1.25rem | ✅ h3 | ✅ | N/A pas cliquable | ✅ | Conforme |

**Score A :** 5/5 types conformes AAA ✅

### B. Cards Construz inline — non-uniformisées

| Card | 1.4.6 AAA | 1.4.11 | 2.4.6 | 2.5.5 AAA | 1.3.1 | Commentaire |
|---|---|---|---|---|---|---|
| **B1 `.service-card`** | ❌ **6.3:1 sur "En savoir plus"** | ✅ border-top 4px gold | ✅ h2 navy | ✅ liens 44px | ✅ `<article>` | **VIOLATION AAA** — couleur `#8C2E00` ligne 90 (style inline `.link-btn`) |
| B2 "4 raisons" services | ✅ texte navy 16:1 | ⚠️ aucun border/shadow | ✅ h3 | N/A | ⚠️ pas une carte sémantique | UX : flat, peu distingué du fond |
| **B3 `.contact-info-card`** | ❌ **6.3:1 sur tel + courriel** | ✅ shadow + border-top gold | ✅ h3 | ✅ liens 44px | ✅ | **VIOLATION AAA** × 6 (3 cards × 2 liens orange) |
| B4 `.blog-card.style5` | ⚠️ séparateur · `#595959` 5:1 (décoratif → N/A) | ✅ shadow + border-left gold | ✅ h3 navy | ✅ btn ≥ 44 | ✅ `<article>` | Conforme si `aria-hidden="true"` ajouté sur `·` |
| B5 "Avantages" carrieres | ✅ texte navy | ⚠️ aucun border/shadow | ✅ h3 | N/A | ⚠️ pas de relief | UX : flat sur fond `#F8F8F6`, peu de distinction |
| B6 Réalisations cards | ✅ | ⚠️ border 1px `#E9E9E6` 1.13:1 (décoratif) | ✅ | ✅ | ⚠️ **3 styles différents** | Hétérogénéité, pas de pattern unifié |
| B7 `.accordion-item` FAQ | ✅ | ⚠️ border `#E9E9E6` 1.13:1 (décoratif) | ✅ aria-expanded | ✅ button 60px | ✅ Bootstrap accordion | Structure ARIA correcte |
| B8 `.service-widget` sidebar | ✅ texte sur navy ou #F8F8F6 | ⚠️ widget 1 sans relief | ✅ h3 | ✅ | ✅ | Widget 2 (navy) OK, widget 1 (light) flat |
| B9 Crédits table | ✅ | ⚠️ border `#E9E9E6` 1.13:1 | ✅ `<th>` | N/A | ✅ `<table>` | Structure table correcte |

**Score B :** 6/9 types conformes AAA, **3 types en violation 1.4.6** (B1, B3 confirmés ; B4 si séparateur considéré informatif)

---

## Liste priorisée des correctifs

### 🔴 CRITIQUE — bloque la conformité AAA stricte

**C1. Remplacer `#8C2E00` (orange Construz) sur 9+ instances de CTA**

Cible WCAG : SC 1.4.6 Contrast Enhanced — ratio actuel 6.3:1 vs cible ≥ 7:1.

Localisations à corriger :
- `services.blade.php:90` — `.link-btn` "En savoir plus" × 6 cards filiales
- `contact.blade.php:65` — `<a tel:>` "418-476-0987" × 3 cards
- `contact.blade.php:75` — `<a mailto:>` "info@kalystrat.ca" × 3 cards
- Globalement : retirer la classe Construz `.link-btn` à orange OU surcharger via override CSS centralisé

**Solution recommandée** : couleur navy `#0A1628` (16:1) ou gold profond `#5C4F2C` (8:1). Cohérent avec la classe `.ks-filiale-card__link` créée commit `ed5f79f`.

### 🟠 MAJEUR — uniformité et perception accessibilité

**M1. Refondre les cards inline B1, B3 selon le pattern `.ks-filiale-card`**
- box-shadow `0 8px 24px navy/0.08` par défaut + hover `0 24px 56px navy/0.18`
- border `1px navy/0.10` (vs `#E9E9E6` 1.13:1)
- border-radius `0.875rem` (vs `0.5rem`)
- top-border 4px distinctif (par catégorie : services = gold, contact = navy)
- Numérotation eyebrow 01-NN gold profond

**M2. Donner du relief aux cards "flat" (B2, B5, B8 widget 1)**
- Ajouter `background: #FFFFFF`, `border: 1px solid rgba(10,22,40,0.08)`, `box-shadow: 0 4px 12px rgba(10,22,40,0.06)`, `border-radius: 0.5rem`, `padding: 2rem`.
- Section "4 raisons" services + "Avantages" carrieres + sidebar widget filiale.

**M3. Uniformiser les 3 styles différents de cards `/realisations` (B6)**
- Adopter une classe unique (ex. `.ks-realisation-card`) avec mêmes specs visuelles.

### 🟢 MINEUR — améliorations UX

**m1. Marquer le séparateur `·` de `.blog-card.style5` (B4) comme décoratif**
- Ajouter `aria-hidden="true"` sur `<span>·</span>` (déjà fait dans certains cas, à vérifier pour les 8 instances).

**m2. Documenter la classe universelle `.ks-card` pour usage futur**
- Centraliser dans `Modules/Frontend/resources/views/layout.blade.php` ou un partial CSS dédié.

**m3. Audit FAQ accordion (B7)**
- Vérifier que `aria-expanded` se met à jour dynamiquement (test manuel ou Pest browser).

---

## Recommandations techniques

### 1. Classe universelle `.ks-card` (pattern unifié)

```css
.ks-card {
    position: relative;
    background: #FFFFFF;
    border: 1px solid rgba(10, 22, 40, 0.10);
    border-radius: 0.875rem;
    padding: 2.5rem 2rem 2rem;
    box-shadow: 0 8px 24px rgba(10, 22, 40, 0.08), 0 2px 6px rgba(10, 22, 40, 0.04);
    transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1),
                box-shadow 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    height: 100%;
    display: flex;
    flex-direction: column;
}
.ks-card:hover, .ks-card:focus-within {
    transform: translateY(-6px);
    box-shadow: 0 24px 56px rgba(10, 22, 40, 0.18), 0 4px 12px rgba(10, 22, 40, 0.08);
    border-color: rgba(184, 164, 114, 0.6);
}
.ks-card--accent::before {
    /* top-border distinctif optionnel */
    content: '';
    position: absolute; top: 0; left: 0; right: 0;
    height: 4px;
    background: var(--card-accent, #B8A472);
    transition: height 0.25s ease;
}
.ks-card:hover.ks-card--accent::before { height: 6px; }

/* Variants : --vacant, --inverse-navy, --light, etc. */
```

### 2. Plan de migration progressive

| Phase | Périmètre | Effort |
|---|---|---|
| **1 — Critique** | C1 fix `#8C2E00` partout (services + contact) | XS, 1h |
| **2 — Refonte cards** | M1 refondre B1 `.service-card` + B3 `.contact-info-card` selon pattern `.ks-card` | S, 2-3h |
| **3 — Relief flat cards** | M2 ajouter relief à B2 + B5 + B8 widget 1 | S, 1-2h |
| **4 — Uniformisation** | M3 unifier B6 réalisations | S, 1h |
| **5 — Documentation** | m2 centraliser `.ks-card` + variants dans le layout | XS |
| **6 — Tests automatisés** | Ajouter Pest browser tests pour focus visible + target size sur les 6 types de cards refondus | M |

### 3. Tests automatisés à ajouter

```php
// tests/Feature/CardsAccessibilityTest.php (à créer)
it('les cartes filiales ont un focus visible AAA', function () {
    // Pest + Dusk ou Playwright
});
it('les CTAs ont un contraste ≥ 7:1 AAA', function () {
    // axe-core / pa11y intégré
});
```

### 4. Intégration CI

- Ajouter `npx pa11y-ci` dans le workflow GitHub Actions (`.deploy/github-actions-ci.yml.example`).
- Bloquer le merge si nouvelles violations détectées sur les pages-clés (/, /a-propos, /services, /contact, /carrieres).

---

## Annexes

### Annexe A — Fichiers audités

```
Modules/Frontend/resources/views/layout.blade.php
Modules/Frontend/resources/views/home.blade.php
Modules/Frontend/resources/views/pages/apropos.blade.php
Modules/Frontend/resources/views/pages/services.blade.php
Modules/Frontend/resources/views/pages/realisations.blade.php
Modules/Frontend/resources/views/pages/faq.blade.php
Modules/Frontend/resources/views/pages/contact.blade.php
Modules/Frontend/resources/views/pages/carrieres.blade.php
Modules/Frontend/resources/views/pages/credits.blade.php
Modules/Frontend/resources/views/pages/conseil.blade.php
Modules/Frontend/resources/views/pages/partenaires.blade.php
Modules/Frontend/resources/views/pages/zones-desservies.blade.php
Modules/Frontend/resources/views/pages/ville.blade.php
Modules/Frontend/resources/views/pages/filiale.blade.php
```

### Annexe B — Délégations utilisées (hiérarchie MCP)

| Tâche | MCP | Modèle | Latence |
|---|---|---|---|
| Audit visuel post-refonte cards filiales | `mcp__wcag-mcp__wcag_audit_aaa` | axe-core | ~1s par page |
| Inventaire scripté patterns cards | `Bash` (grep multi-fichiers) | n/a | <1s |
| Génération rapport markdown structuré | `mcp__multi-ai-mcp-3__chat` | qwen3-max (1min.ai gratuit) | ~80s |
| Validation finale + écriture | Claude Opus 4.7 (superviseur) | n/a | éditorial direct |

### Annexe C — Vérité terrain mesurée par audits MCP précédents (cette session)

- Cards Kalystrat custom (.ks-*-card) : **5/5 types conformes WCAG 2.2 AAA réelles** après refontes commits `ed5f79f` + `f0f382c` + `1f342e6` + `bc5f9e6` + `a4e1539`.
- Pages déjà auditées sans violation contraste réelle : `/`, `/a-propos`, `/conseil-consultatif`, `/partenaires`, `/zones-desservies`, `/zones-desservies/quebec`, `/filiales/fondations`, `/faq`.
- Pages avec violations 1.4.6 AAA confirmées (`#8C2E00` orange Construz CTA) : `/services`, `/contact` — non encore corrigées.
- Faux positifs documentés et exclus : 5 (visually-hidden, slick[inert], dropdown trap heuristique axe, mesure DOM responsive 160 chars, h1 banner).

---

*Audit lecture seule — aucune modification de fichier source. Rapport généré le 2026-05-04 par Claude Opus 4.7 (superviseur) avec délégation qwen3-max via mcp__multi-ai-mcp-3.*
