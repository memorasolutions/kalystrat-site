# Projet Kalystrat — Site internet

## Contexte rapide
Site web pour **Gestion Kalystrat Inc.** — holding québécoise de construction à intégration verticale (6 filiales) basée à Québec.
**Positionnement** : "Conçu. Réalisé. Livré." — excellence en construction grâce à filiales spécialisées en synergie sous marque unifiée.
**Fondateur** : Ali Salomon (Président, Directeur Général).
**6 filiales** : Kalystrat Fondations / Structure / Toiture-Enveloppe / Finition Intérieure / Immobilier / Placement Construction.
**Convention de marque** : "Kalystrat + Spécialité".

## Stack technique
- Laravel 12 (copie du laravel_vierge MEMORA)
- Module nwidart `Frontend` (Modules/Frontend/) — tout le site public est là
- Thème Construz adapté (assets dans public/assets/construz/)
- CSS custom : public/assets/css/kalystrat.css
- SQLite local, Herd Laravel (kalystrat.test HTTPS)
- ~10 commits sur master (pas de remote)

## Charte graphique
- Navy : #0A1628 | Gold : #B8A472
- Police : Akzidenz Grotesk (.otf dans public/assets/fonts/)
- Logo sources : .themes/charte_graphique/editables/ (AI, EPS, SVG)
- Logo rendu actuel : public/assets/img/kalystrat/logo-header.svg
- **Charte v2 enrichie 2026-04-25** : .themes/charte_graphique/charte_v2.html (142 KB, 14 sections, 12 tendances notées /100)

## Plan d'affaires
- Source : .plan_affaire/PLAN_ALI.txt (180 lignes)
- Synthèse intégrée : .notes_diverses/informations_kalystrat.md (sections 12-23 holding/marque/cibles/conseil/marketing)

## Pages actuelles (5) — pré-refonte holding 6 filiales
- `/` — Accueil (hero, services, portfolio, témoignages, CTA)
- `/a-propos` — Qui nous sommes (vision, équipe, avantages)
- `/services` — Notre approche (6 expertises, méthodologie)
- `/portfolio` — Portfolio (grille filtrable isotope)
- `/contact` — Nous joindre (formulaire POST fonctionnel)

Note : navigation/textes pré-charte-v2, à refondre pour exposer les 6 filiales (gros chantier D1).

## Modules désactivés
AI, Booking, Translation (modules_statuses.json)

## État WCAG (post-fix iter 2 du 2026-04-25)
- 18-19/86 critères conformes (vs 17 avant), 3-4 non-conformes (vs 5)
- 5 critiques contraste menu = faux positifs wcag-mcp documentés (Kalystrat-WCAG-L3)
- 11 Tab issues (P2 mobile menu) + Instagram trap (faux positif probable axe) différés
- Rapport complet : .themes/wcag/audit_2026-04-25/SYNTHESIS.md

## Informations client
Voir : .notes_diverses/informations_kalystrat.md (sections 1-11 infra/courriels + 12-23 holding/plan d'affaires)

## TODO prioritaire
1. **D1 — Refonte navigation site holding 6 filiales** (gros chantier, attente photos + décisions éditoriales)
2. **Mise à jour textes site** avec mission/vision/piliers du plan d'affaires
3. Config SMTP formulaire contact (bloqué décision client)
4. Photos réelles équipe/projets (bloqué Ali)
5. Tab issues mobile menu (pattern `inert` + JS toggle)
6. Déploiement production (bloqué décision infra)
7. ~~Logo SVG définitif~~ ✅ fait
8. ~~Textes définitifs (plan d'affaires)~~ ✅ intégré dans charte v2 + infos client
9. ~~Vite build + favicon~~ ✅ fait
10. ~~Newsletter footer~~ ✅ retirée (commit 7c1c729)
11. ~~Spécificité CSS mobile/footer contraste~~ ✅ fait (commit dc18f7d)
