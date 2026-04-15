# Projet Kalystrat — Site internet

## Contexte rapide
Site web pour **Kalystrat** — firme d'investissement stratégique et développement immobilier à Québec.
**Positionnement** : "Conçu. Réalisé. Livré." — développement d'actifs, gestion d'entreprises, valeur durable.
**PAS** une simple entreprise de construction.

## Stack technique
- Laravel 12 (copie du laravel_vierge MEMORA)
- Module nwidart `Frontend` (Modules/Frontend/) — tout le site public est là
- Thème Construz adapté (assets dans public/assets/construz/)
- CSS custom : public/assets/css/kalystrat.css
- SQLite local, Herd Laravel
- 7 commits sur master (pas de remote)

## Charte graphique
- Navy : #0A1628 | Gold : #B8A472
- Police : Akzidenz Grotesk (.otf dans public/assets/fonts/)
- Logo sources : .themes/charte_graphique/editables/ (AI, EPS, SVG)
- Logo approximatif actuel : public/assets/img/kalystrat/logo-header.svg

## Pages (5)
- `/` — Accueil (hero, services, portfolio, témoignages, CTA)
- `/a-propos` — Qui nous sommes (vision, équipe, avantages)
- `/services` — Notre approche (6 expertises, méthodologie)
- `/portfolio` — Portfolio (grille filtrable isotope)
- `/contact` — Nous joindre (formulaire POST fonctionnel)

## Modules désactivés
AI, Booking, Translation (modules_statuses.json)

## État WCAG
16/86 critères conformes. Problème ouvert : spécificité CSS thème Construz (mobile menu + footer contraste).

## Informations client
Voir : .notes_diverses/informations_kalystrat.md

## TODO prioritaire
1. Logo SVG définitif (extraire du .ai/.eps)
2. Textes définitifs (quand plan d'affaires reçu)
3. Config SMTP formulaire contact
4. Fix spécificité CSS mobile menu/footer
5. Vite build + favicon
6. Photos réelles équipe/projets
7. Déploiement production
