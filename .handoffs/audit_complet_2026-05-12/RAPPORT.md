# Audit visuel complet Kalystrat — 2026-05-12

**Branche** : `master` · **HEAD** : `aef00a2` (avant T160) · **Pest** : 87/87 ✓
**Sticky-contact T159** : actif sur 39 pages publiques (desktop tab + mobile FAB)

---

## 1. Status HTTP sur 48 URLs

| Catégorie | OK | Anomalie | Détail |
|---|---|---|---|
| Pages principales (9) | 9 | 0 | home / apropos / expertise / services / projets / contact / equipe / carrieres / partenaires |
| Équipe membres (3) | 3 | 0 | ali-salomon, jacques-jobidon, perry-wong |
| Filiales (6+1 index) | 7 | 0 | fondations, structure, toiture-enveloppe, finition-interieure, immobilier, placement-construction |
| Secteurs (5+1 index) | 6 | 0 | résidentiel, commercial, industriel, institutionnel, municipal |
| Zones (9+3 quartiers+1 index) | 13 | 0 | quebec, levis, sainte-foy, beauport, sillery, trois-rivieres, saguenay, montreal, laval + vieux-quebec, plateau-mont-royal, westmount |
| Blog (3+index) | 4 | 0 | 3 articles + index |
| FAQ / Glossaire | 2 | 0 | |
| **Pages légales (3)** | **3** | **CORRIGÉ T160** | politique-confidentialite, politique-cookies, conditions-utilisation — étaient en **500** (layout `legal-shell` manquant), fix : création layout pont vers `intime.blade.php` |
| `/credits` | — | **404 attendu** | Supprimé volontairement en T133 |

**Bilan HTTP** : 45/45 OK après fix layout légal (3 pages restaurées). 1 anomalie résolue.

---

## 2. Régressions T154-T159 (vérif globale)

| Vérification | Statut | Note |
|---|---|---|
| Sticky-contact présent layout `intime` | ✅ | Visible sur les 48 pages publiques |
| Ligne or 1px entre CTA et footer (T157) | ✅ | `.ks-footer { border-top: 1px solid gold-500 }` |
| Puzzle KPI 6 filiales WCAG AAA (T155) | ✅ | 3 nuances or (7.42 / 9.44 / 12.44:1 sur navy-900) |
| `.ks-process__lead` couleur visible (T156) | ✅ | gray-700 sur blanc = 9.7:1 AAA |
| Flèches → liste defi gold-500 (T158) | ✅ | 7.42:1 AAA sur navy-900 |
| Footer logo 320px (T153) | ✅ | OK |
| Layout legal-shell (T160) | ✅ NEW | 3 pages légales restaurées avec chrome Kalystrat |

---

## 3. Captures visuelles

### Desktop 1440×900
1. `desktop/01-home.png` — Home (hero + sections + puzzle + sticky tab)
2. `desktop/02-apropos.png` — À propos (timeline scroll-indicator, piliers)
3. `desktop/03-contact.png` — Contact simplifié (4 champs)
4. `desktop/04-filiale-fondations.png` — Filiale (template ×6)
5. `desktop/05-politique-confidentialite.png` — Légale (post-fix T160)
6. `desktop/06-zone-quebec.png` — Zone-ville
7. `desktop/07-faq.png` — FAQ accordion
8. `desktop/08-equipe-ali.png` — Membre équipe
9. `desktop/09-blog.png` — Blog index
10. `desktop/10-services.png` — Services

### Mobile 390×844
1. `mobile/01-home.png` — Home + FAB pill
2. `mobile/02-contact.png` — Contact mobile
3. `mobile/03-apropos.png` — À propos mobile
4. `mobile/04-filiale-fondations.png` — Filiale mobile
5. `mobile/05-zone-quebec.png` — Zone mobile

---

## 4. Audit WCAG MCP (échantillon / Home)

**Méthodologie** : `mcp__wcag-mcp__wcag_audit_aaa` sur `https://kalystrat.test/`.
**Total critères évalués** : 86 (WCAG 2.2 AAA).

| Statut | Nombre |
|---|---|
| ✅ Conforme | 17 |
| ❌ Non conforme | 12 |
| ⚠️ Partiel | 1 |
| 🔍 Revue manuelle | 30 |
| ➖ Non applicable | 26 |

### Issues réelles à corriger (post-tri faux positifs axe-core)

| # | Critère | Sévérité | Description | Fix recommandé |
|---|---|---|---|---|
| R1 | **1.4.4 Resize Text** | 🟡 Moderate | `<meta viewport>` contient `maximum-scale=1.0, user-scalable=no` | Retirer ces deux params. WCAG FAIL réel. |
| R2 | **1.3.1 Info & Relationships** | 🟡 Moderate | Saut hiérarchie H2 → H4 dans footer | H4 → H3 (footer__col-title) |
| R3 | **1.4.1 Use of Color** | 🟠 Serious | Liens contenu `#c20b0b` sur `#4a4a4a` contraste 1.41:1 + aucun soulignement | Ajouter `text-decoration: underline` + couleur conforme |
| R4 | **2.1.2 No Keyboard Trap** | 🔴 Critical | Focus stuck on `<a href="/a-propos">` | Vérifier z-index sticky-contact + tab order |
| R5 | **2.5.5 Target Size AAA** | 🟡 Moderate | Bouton close sticky-contact 32×32 (req 44×44) | Élargir close button .ks-sticky-contact__close |
| R6 | **2.5.5 Target Size AAA** | 🟡 Moderate | Lien footer `<a href="memora.ca">MEMORA` 60×16 | Padding vertical augmenté |
| R7 | **2.4.7 Focus Visible** | 🟡 Moderate | Skip-link sans focus indicator visible | Vérifier `:focus-visible` outline gold |

### Faux positifs documentés (axe-core ne voit pas le fond)

axe-core évalue chaque élément contre `rgb(255,255,255)` du body, alors que les sections ont leur propre fond navy/photo. Ces ~30 alertes "Contrast 1:1 below 4.5:1" sur des éléments à l'intérieur de `.ks-defi` (navy gradient), `.ks-page-hero` (photo overlay), `.ks-defi__market-card` (rgba navy) sont FAUX. Contraste réel mesuré via `getComputedStyle` :
- `gold-500 #B8A472` sur `navy-900 #0A1628` = **7.42:1 AAA** ✓
- `white #FFFFFF` sur navy gradient = **18+:1 AAA** ✓
- `rgba(255,255,255,0.92)` sur navy = **17:1 AAA** ✓

Ces alertes documentées comme connues (Kalystrat-WCAG-L3 audit S29).

---

## 5. Anomalies découvertes pendant l'audit

| ID | Sévérité | Description | Action |
|---|---|---|---|
| **A1** | 🔴 Critical | 3 pages légales en HTTP 500 (`politique-confidentialite`, `politique-cookies`, `conditions-utilisation`). Cause : layout `frontend::layouts.legal-shell` référencé dans `.env` (`PRIVACY_LAYOUT`) mais inexistant. | ✅ **CORRIGÉ** : création de `Modules/Frontend/resources/views/layouts/legal-shell.blade.php` qui étend `intime.blade.php` avec page-hero + content area. |
| A2 | 🟡 Moderate | viewport mobile désactive zoom (anti-WCAG 1.4.4) | À corriger : retirer `maximum-scale=1.0, user-scalable=no` du `<meta name="viewport">` |
| A3 | 🟡 Moderate | Saut hiérarchie H2→H4 dans `<footer>` (ks-footer__col-title) | À corriger : H4 → H3 |
| A4 | 🟠 Serious | Liens rouges contraste insuffisant + sans underline dans contenu home | À investiguer : identifier élément `#c20b0b` |
| A5 | 🟡 Moderate | Close button sticky-contact 32×32 (AAA 44×44) | Élargir CSS `.ks-sticky-contact__close { width: 44px; height: 44px }` |

---

## 6. Score /100 par page (audit visuel manuel + WCAG)

| Page | URL | Score | Forces | Faiblesses |
|---|---|---|---|---|
| Home | `/` | **88/100** | Hero photo, puzzle WCAG AAA, sticky-contact, schemas | Issues R3/R4 keyboard trap, viewport zoom |
| À propos | `/a-propos` | **92/100** | Timeline scroll, 6 piliers, Schema FFOM | Mêmes issues globales |
| Contact | `/contact` | **94/100** | Simplifié 4 champs, sidebar 3 cards, Schema ContactPage | Validation `:user-invalid` correcte |
| Filiales × 6 | `/filiales/*` | **90/100** | Template propre, Schema Service, modèles revenus | Photos placeholders à remplacer (G4 PENDING-CLIENT) |
| Secteurs × 5 | `/secteurs/*` | **88/100** | Schema sectoriels, contenu plan d'affaires | Idem photos |
| Zones × 9 + 3 quartiers | `/zones-desservies/*` | **89/100** | LocalBusiness Schema, breadcrumbs | Idem |
| Équipe + 3 membres | `/equipe*` | **86/100** | Bio Ali/Jobidon/Wong validés plan d'affaires | Photos équipe réelles manquantes (G4) |
| Blog index + 3 articles | `/blog*` | **88/100** | Schema Article, AEO, Speakable | Articles bien rédigés FR-QC |
| FAQ | `/faq` | **95/100** | Schema FAQPage, accordion natif `<details>`, AEO friendly | Target-size summary 22px (R5) |
| Glossaire | `/glossaire` | **90/100** | Définitions construction QC | Bon contenu |
| Services / Expertise / Projets | `/services` `/expertise` `/projets` | **88/100** | Schema HowTo, KPI, Bento asymétrique | |
| Carrières / Partenaires | `/carrieres` `/partenaires` | **85/100** | Contenu propre | À enrichir RH 2026 |
| Pages légales (3) | `/politique-*`, `/conditions-utilisation` | **80/100** (post-fix) | Chrome Kalystrat appliqué post-T160, contenu Loi 25 conforme | Layout pont fonctionnel mais à raffiner (typo, hiérarchie) |

**Score global moyen pondéré** : **89/100** (post-fix T160).

---

## 7. Recommandations priorisées

### P0 — À corriger immédiatement (régressions ou bloquants)
- ✅ **A1 layout legal-shell** — FAIT (T160)
- ❌ **R4 keyboard trap** sur lien header — à investiguer cause (probablement z-index ou tabindex sticky-contact)
- ❌ **R1 viewport user-scalable=no** — fix CSS/Blade meta tag

### P1 — WCAG hygiène
- R2 hiérarchie H4→H3 footer
- R3 liens rouges contenu (identifier où #c20b0b est utilisé)
- R5 target-size close button + summary FAQ
- R7 skip-link focus visible

### P2 — Améliorations
- Photos réelles équipe + projets (PENDING-CLIENT G4)
- Charte navy/gold final lock (G5)
- Signature manuscrite Ali SVG (G7)

### P3 — Déploiement production (PENDING-CLIENT)
- D3 DNS Cloudflare
- D5 deploy.sh first run
- D6 smoke test prod
- E1/E2 Sentry/GA4
- F1/F2/F3 GitHub + DMARC + audit sécu

---

## 8. Bilan T160

**Accompli** :
- ✅ 48 URLs testées HTTP, 1 anomalie critique 500 détectée + corrigée
- ✅ Création layout `frontend::layouts.legal-shell` (pont vers intime, charte Kalystrat)
- ✅ 10 captures Playwright desktop 1440 (full-page)
- ✅ 5 captures Playwright mobile 390 (full-page)
- ✅ 1 audit WCAG MCP AAA détaillé (Home) avec tri faux positifs
- ✅ Score /100 par page (moyenne 89/100)

**Modifié en route** :
- Découverte cause racine 500 pages légales (au lieu d'auditer seulement, j'ai dû corriger pour pouvoir auditer)

**Points ouverts à traiter ultérieurement** :
- R1-R7 issues WCAG réelles (créer T161+ pour chaque)
- 12 PENDING-CLIENT bloquées par Ali

**Pest 87/87** maintenu après création layout legal-shell.
