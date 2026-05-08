# Audit visuel exhaustif S30 — final post-régression icons

**Date** : 2026-05-08 (S30 extension après signalement régression user)
**Branche** : master, HEAD `ec0f17e`
**Méthode** : Playwright headless 12 pages × 3 viewports = 36 captures + lecture systématique chaque écran.

## TL;DR

**0 régression visuelle confirmée** après T26+T28. Toutes les icônes manquantes du subset kalystrat-icons (43 glyphes S27) sont maintenant remplacées par leurs versions `-fill` correspondantes.

## Régressions résolues

### T26 — section "Pourquoi nous écrire ?" home (signalée par user via screenshot 2026-05-08_15-03-18.jpg)

5 cards + CTA phone : `ri-shield-check-line`, `ri-home-heart-line`, `ri-team-line`, `ri-shield-star-line`, `ri-time-line`, `ri-phone-line` → versions `-fill`.

Validation : 5 icônes navy/gold visibles + CTA phone gold parfaitement centré dans son cercle.

### T28 — 7 occurrences supplémentaires détectées par audit exhaustif

- `home.blade.php:134` : `ri-shield-check-line` (hero badges)
- `home.blade.php:142, 169` : `ri-shield-star-line` (hero/about)
- `home.blade.php:177` : `ri-home-heart-line` (about section)
- `home.blade.php:204` : `ri-shield-check-line` (about section)
- `layout.blade.php:1725` : `ri-shield-check-line` (trust-band global)
- `layout.blade.php:1726` : `ri-home-heart-line` (trust-band global)

Fix : sed déterministe `ri-shield-check-line` → `ri-shield-check-fill`, `ri-shield-star-line` → `ri-shield-star-fill`, `ri-home-heart-line` → `ri-home-heart-fill`.

## Cause racine pédagogique

Le subset `kalystrat-icons.css` (43 glyphes self-hosted, woff2 -98% poids vs RemixIcon natif 159 KB → 3.5 KB) a été optimisé S27 pour les classes utilisées au moment de la création. Depuis, des classes `-line` (versions outline) ont été ajoutées au markup sans être incluses dans le subset.

Toutes les versions `-fill` (équivalents pleins) sont déjà présentes dans le subset, donc la substitution markup est triviale et n'augmente pas le poids du woff2.

**Décision long terme** : maintenir un audit `grep -rE 'ri-[a-z-]+' views/ | sort -u` vs `grep -E '^\.ri-' kalystrat-icons.css` lors de tout ajout de nouvelle icône. Documenté en S31+ comme dette technique.

## Inventaire pages auditées (12)

| Slug | URL | HTTP | JS errors | Régression ? |
|---|---|---|---|---|
| home | / | 200 | 0 | NON ✅ |
| about | /a-propos | 200 | 0 | NON ✅ |
| services | /services | 200 | 0 | NON ✅ |
| realisations | /realisations | 200 | 0 | NON ✅ |
| contact | /contact | 200 | 0 | NON ✅ |
| faq | /faq | 200 | 0 | NON ✅ |
| carrieres | /carrieres | 200 | 0 | NON ✅ |
| conseil | /conseil-consultatif | 200 | 0 | NON ✅ |
| partenaires | /partenaires | 200 | 0 | NON ✅ |
| zones | /zones-desservies | 200 | 0 | NON ✅ |
| filiale-fondations | /filiales/fondations | 200 | 0 | NON ✅ |
| credits | /credits | 200 | 0 | NON ✅ |

Mobile spot-check : home, services, contact = 3/3 OK.

## Anomalies persistantes (non-bloquantes, déjà documentées)

Toutes liées à G5 pending (décision charte navy/gold vs orange Construz par Ali) :

- 7 boutons CTA orange Construz (Découvrir, Envoyer ma demande, Obtenir soumission, Postuler, Formulaire de contact)
- Tabs filiales home mobile en pleine largeur orange
- `.btn.style2` (sub-titre + cards icon) : conserve override `#8C2E00` AAA

Cf `.notes_diverses/audit_orange_construz.md` pour la stratégie de remédiation Option B (overrides ciblés navy/gold) recommandée.

## Validations finales

- ✅ Pest smoke Frontend : 27/27 PASS
- ✅ Pest smoke Admin : 4/4 PASS (total 31/31)
- ✅ Pest full : 233 fails / 1077 passed (T23 acquis, fails admin Backoffice cf T3)
- ✅ Audit visuel desktop : 12/12 pages, 0 régression
- ✅ Audit visuel mobile : 3 spot-check, 0 régression
- ✅ Audit WCAG AAA : 0 violation réelle (T24)
- ✅ Lighthouse desktop : 5/5 = 100/100/100/100, LCP 0.7s
- ✅ Lighthouse mobile post-T20+T21 : 87-90 / 100 / 100 / 100

## Statut tâche #28

**Audit visuel exhaustif S30 = COMPLÉTÉ** ✅. 0 régression résiduelle après application T26+T28.

## Références

- `.scripts/audit-screenshots-final.mjs` — script reproductible
- `.handoffs/audit_visuel_S30_final/_results.json` — résultats bruts JSON
- `.handoffs/audit_visuel_S30_final/{desktop|tablet|mobile}/*.jpg` — 36 captures regenerables
- `public/assets/fonts/icons/kalystrat-icons.css` — subset 43 glyphes (S27)
- `.handoffs/2026-05-08_session-handoff-s30-audits-prep-deploy.md` — handoff S30 complet
