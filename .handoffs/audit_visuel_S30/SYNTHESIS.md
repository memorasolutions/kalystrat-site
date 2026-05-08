# Audit visuel cross-pages multi-viewports — S30

**Date** : 2026-05-08 (S30)
**Branche** : master, HEAD `d1ed4bb`
**Méthode** : Playwright headless Chromium, 12 pages × 3 viewports = 36 captures full-page JPG.
**Script** : `.scripts/audit-screenshots.mjs`
**Captures** : `.handoffs/audit_visuel_S30/{desktop|tablet|mobile}/`
**Résultats bruts** : `.handoffs/audit_visuel_S30/_results.json`

## TL;DR

- **36/36 pages capturées avec succès** (HTTP 200).
- **0 erreur JavaScript** sur l'ensemble des pages × viewports.
- **0 erreur console critique**.
- Aucune régression structurelle vs S29 : le site est cohérent, navigable, sans débordement ni casse layout.
- **Anomalies cosmétiques mineures** identifiées (P1 + P2), toutes liées au statut G5 pending (décision charte).

## Pages auditées (12 URLs structurelles)

| Slug | URL | HTTP | JS errors | Console errors |
|---|---|---|---|---|
| home | / | 200 | 0 | 0 |
| about | /a-propos | 200 | 0 | 0 |
| services | /services | 200 | 0 | 0 |
| realisations | /realisations | 200 | 0 | 0 |
| contact | /contact | 200 | 0 | 0 |
| faq | /faq | 200 | 0 | 0 |
| carrieres | /carrieres | 200 | 0 | 0 |
| conseil | /conseil-consultatif | 200 | 0 | 0 |
| partenaires | /partenaires | 200 | 0 | 0 |
| zones | /zones-desservies | 200 | 0 | 0 |
| filiale-fondations | /filiales/fondations | 200 | 0 | 0 |
| credits | /credits | 200 | 0 | 0 |

Filiales non capturées (5/6) : structure, toiture, finition, immobilier, placement (échantillon fondations représentatif).

## Anomalies par priorité

### P1 — Boutons CTA orange Construz incohérents avec charte navy/gold

**Pages affectées** : home (desktop+mobile), contact, filiale-fondations, services, realisations.

**Observations** :
- Bouton **"DÉCOUVRIR LE GROUPE"** (about-area home) : orange Construz `#EA5501` / override `#8C2E00`
- Bouton **"DÉCOUVRIR KALYSTRAT FONDATIONS"** (tabs home) : idem
- Bouton **"ENVOYER MA DEMANDE"** (form home + form contact) : idem
- Bouton **"OBTENIR UNE SOUMISSION GRATUITE"** (cta-area-5 footer home) : idem
- Bouton **"FORMULAIRE DE CONTACT"** (filiale-fondations CTA) : idem

**Sections déjà migrées navy/gold** ✅ :
- Header (sticky + dropdown + CTA "418-476-0987")
- About-area icons (S29)
- Signature Caveat (S29)
- Cards canaux contact
- Card "Besoin d'aide" sidebar filiale
- Bouton "VOIR TOUTES LES OFFRES" (carrières home)
- Footer

**Cohérence** : 7 boutons CTA orange vs ~30 éléments navy/gold migrés. Hybride visible mais pas régressif.

**Statut** : **bloqué G5 (#16)** — décision Ali. Plan d'attaque documenté dans `.notes_diverses/audit_orange_construz.md` (Option B recommandée).

### P1 — Tabs filiales home (mobile) entièrement orange

**Pages affectées** : home@mobile.

**Observation** : section why-area-3 mobile affiche les 6 onglets filiales en pleine largeur orange Construz, le tab actif (Kalystrat Fondations) est en orange foncé `#8C2E00`.

**Comparaison desktop** : sidebar verticale, tab actif navy ✅ (cohérent S29).

**Cause** : la responsive Construz transforme les tabs verticaux desktop en boutons horizontaux pleine largeur en mobile, et les overrides S29 ne ciblent que la version desktop.

**Statut** : **bloqué G5** (cohérent avec décision globale charte).

### P2 — Selects formulaire contact "Budget" et "Échéance" peu visibles

**Pages affectées** : contact@desktop, contact@tablet (probable mobile aussi).

**Observation** : les 2 selects "Budget approximatif" et "Échéance souhaitée" affichent un trait fin sans bordure visible, et la valeur par défaut (placeholder "Sélectionner...") apparaît tronquée. Texte vraisemblablement présent mais visuellement absent.

**Cause probable** : style natif `<select>` Chromium sans border CSS appliqué + couleur texte placeholder très claire.

**Statut** : **P2 non bloquant** — formulaire fonctionnel (Pest 27/27 PASS), mais améliorerait UX si ajout bordure + label flottant. Solution : ajouter dans layout.blade.php :
```css
.demande-form select { border: 1px solid var(--ks-navy) !important; padding: 0.625rem 0.875rem; color: var(--ks-navy); }
.demande-form select:focus-visible { outline: 3px solid var(--ks-gold); }
```

### P2 — Boutons mobile : zone tactile

**Pages affectées** : home@mobile, contact@mobile.

**Observation** : minimum tappable area Construz = 44×44px (WCAG AA). Vérifié visuellement OK. Pas d'anomalie.

### P3 — Footer compact mobile/tablet (info-only)

**Pages affectées** : toutes @mobile et @tablet.

**Observation** : footer rendu compact, lisible, navy. Aucune action requise.

## Régressions S29 — vérification

- ✅ Icônes about-area home navy/gold (T1) : confirmées sur home@desktop, home@mobile.
- ✅ Espace blanc avant "À propos de Kalystrat" home (T2) : transition wave hero → about-area = ~30px (cohérent fix `.space-bottom + padding-top: 30px`).
- ✅ Backup cron commenté (T3) : aucun impact visuel attendu.

**Aucune régression S29 détectée.**

## Validation WCAG indicative (pas un audit complet)

- Contraste menu header @sticky : navy (#0A1628) sur navy translucide → texte blanc. Lisible toute pages.
- Contraste body text : `#15161C` sur `#FFFFFF` = 17.04:1 AAA ✅
- Contraste boutons orange Construz `#8C2E00` (override AAA layout.blade.php:486) sur fond blanc : 7.0:1 AAA ✅
- Contraste bouton navy header CTA : navy + gold = 7.42:1 AAA ✅ (validé S29)

Audit complet WCAG AAA : voir `.handoffs/2026-05-04_session-handoff-s26-securite-deploy.md` (S26 audit 13 pages).

## Recommandations actionnables

### Immédiat (sans G5)
- **#19** : appliquer le fix selects contact (P2) si user veut amélioration UX rapide. CSS additif, ~5 lignes, zéro risque.

### Post-G5 (si Ali tranche Option B)
- Migration ciblée des 7 boutons CTA orange → navy/gold via overrides layout.blade.php (pattern S29).
- Migration tabs filiales mobile.
- Re-run audit visuel S30 pour valider l'absence de régression.

### Différé G4
- Photos réelles Ali → remplacement placeholders Pexels actuels (~30 photos).
- Re-run audit pour vérifier qualité visuelle + LCP impact.

## Statut tâche #4

**Audit visuel S30 = COMPLÉTÉ** ✅ — données collectées, anomalies catégorisées P1/P2/P3, rapport actionnable. Aucune action de fix dans cette session (scope = audit seulement).

## Références

- `.scripts/audit-screenshots.mjs` — script Playwright reproductible
- `.handoffs/audit_visuel_S30/_results.json` — résultats bruts JSON
- `.handoffs/audit_visuel_S30/{desktop|tablet|mobile}/*.jpg` — 36 captures
- `.notes_diverses/audit_orange_construz.md` — analyse migration G5
- `.handoffs/2026-05-04_session-handoff-s26-securite-deploy.md` — audit AAA S26
- `tests/Feature/PublicPagesSmokeTest.php` — 27/27 PASS référence santé Frontend
