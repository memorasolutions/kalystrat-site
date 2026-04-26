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
- **Theme Construz home-5 multipage OFFICIEL à 100%** (post-P16 RESET RADICAL 2026-04-26)
- Source HTML : `.themes/main-file/construz/` (home-5.html, about.html, service.html, service-details.html, project.html, contact.html)
- Assets Construz : `public/assets/construz-new/` (18 MB officiel)
- 6 vues Blade actives : `home-construz.blade.php` (1681L) + about/services/portfolio/contact/filiale-construz (6375L total copiées 1:1 du HTML source via sed déterministe)
- Script i18n : `.scripts/kalystratize-v2.sh` (8 KB) — 70+ substitutions sed paths/liens/textes EN→FR
- SQLite local, Herd Laravel (kalystrat.test HTTPS)
- 19+ commits sur master (pas de remote)

## Charte graphique
- Navy : #0A1628 | Gold : #B8A472
- Police : Akzidenz Grotesk (.otf dans public/assets/fonts/)
- Logo sources : .themes/charte_graphique/editables/ (AI, EPS, SVG)
- Logo rendu actuel : public/assets/img/kalystrat/logo-header.svg
- **Charte v2 enrichie 2026-04-25** : .themes/charte_graphique/charte_v2.html (142 KB, 14 sections, 12 tendances notées /100)

## Plan d'affaires
- Source : .plan_affaire/PLAN_ALI.txt (180 lignes)
- Synthèse intégrée : .notes_diverses/informations_kalystrat.md (sections 12-23 holding/marque/cibles/conseil/marketing)

## Pages actuelles (6 production-ready) — Construz pur + textes FR Kalystrat
- `/` — `home-construz.blade.php` (Construz home-5 fidèle 100% : hero slider, about-area-5, why-area-3 5 tabs, benefit-area-5, testimonial-area-5, award-area-1, contact-area-2, portfolio-area-5, counter-area-1, client-area-1, blog-area-4, cta-area-5)
- `/a-propos` — `about-construz.blade.php` (Construz about.html fidèle)
- `/services` — `services-construz.blade.php` (Construz service.html fidèle)
- `/portfolio` — `portfolio-construz.blade.php` (Construz project.html fidèle)
- `/contact` — `contact-construz.blade.php` (Construz contact.html fidèle)
- `/filiales/{6 slugs}` — `filiale-construz.blade.php` (Construz service-details.html, dynamique)

**Markup Construz orange natif intact** (pas de charte navy/gold appliquée). Photos Construz officielles intactes (placeholders 1920x961 etc.). Logo CONSTRUZ officiel intact (à remplacer par Kalystrat plus tard).

## Modules désactivés
AI, Booking, Translation (modules_statuses.json)

## État WCAG (post-fix iter 2 du 2026-04-25)
- 18-19/86 critères conformes (vs 17 avant), 3-4 non-conformes (vs 5)
- 5 critiques contraste menu = faux positifs wcag-mcp documentés (Kalystrat-WCAG-L3)
- 11 Tab issues (P2 mobile menu) + Instagram trap (faux positif probable axe) différés
- Rapport complet : .themes/wcag/audit_2026-04-25/SYNTHESIS.md

## Informations client
Voir : .notes_diverses/informations_kalystrat.md (sections 1-11 infra/courriels + 12-23 holding/plan d'affaires)

## TODO prioritaire (post-P18, 2026-04-26)
**Site Kalystrat = vraie démo Construz home-5 multipage à 100% avec textes FR Kalystrat appliqués via sed déterministe (19 commits).**

### Reste à faire P19+
1. **Logo SVG Kalystrat** — remplacer `public/assets/construz-new/img/logo.svg` par logo Kalystrat client (assets disponibles `public/assets/img/kalystrat/logo-*.svg`)
2. **6 tabs filiales** — adapter why-area-3 dans home-construz : 5 tabs Construz (General construction/Property maintenance/Project management/Renovation/Preconstruction) → 6 tabs Kalystrat (Fondations/Structure/Toiture/Finition/Immobilier/Placement) — DOM modification (sed insuffisant car ajout 6e tab)
3. **Service titles section service-area-4** — "General construction"→"Kalystrat Fondations" etc. (sed possible)
4. **Photos Kalystrat** — sed paths Construz placeholders → photos réelles dans `public/assets/img/kalystrat/`
5. **Charte navy/gold optionnelle** — sed sur `public/assets/construz-new/css/style.css` orange #F36F21 → gold #B8A472 (décision client)
6. **Schema.org JSON-LD** — ré-appliquer (perdu avec reset P16) : Organization + LocalBusiness + GeneralContractor + 6 SubOrg + 6 Service + HowTo + FAQPage + WebSite + BreadcrumbList
7. **WCAG fixes** — ré-appliquer (perdus avec reset) : skip-link, focus-visible, autocomplete, aria-label
8. **Page FAQ** — `/faq` toujours active (faqV2 + 15 Q/R config/faqs.php), à intégrer dans menu Construz
9. **Sitemap auto** — actif via `php artisan frontend:sitemap` daily 03h00 (Artisan command Modules/Frontend/Console/Commands/GenerateSitemapCommand.php)
10. **Photos chantiers réelles + témoignages clients vidéo** (bloqué Ali)
11. **Déploiement production cPanel kalystrat.ca** (bloqué décision client)
12. **Config SMTP formulaire contact** (bloqué décision client)

### Reste différé bloqué client
- Photos réelles équipe/projets (bloqué Ali)
- Logo Kalystrat définitif si différent (bloqué Ali)
- Décision charte navy/gold vs orange Construz (bloqué client)

### Méthode validée à réutiliser
**Script `.scripts/kalystratize-v2.sh`** = sed déterministe sur HTML Construz source. Pour toute future modification :
- `bash .scripts/kalystratize-v2.sh INPUT.html OUTPUT.blade.php`
- Étendre script avec nouvelles substitutions au besoin
- **JAMAIS utiliser MCP qwen3-max pour conversion HTML→Blade** (hallucinations classes Construz garanties — leçons Theme-L1 + Reset-L1 + Sed-L1+L2)
