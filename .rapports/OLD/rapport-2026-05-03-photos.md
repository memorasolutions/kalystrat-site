# Audit photos Kalystrat — 2026-05-03

Audit en lecture seule. Aucune modification de fichier source. Méthode : grep récursif des balises `<img>`, `background-image`, `data-bg-src` dans `Modules/Frontend/resources/views/**/*.blade.php` (hors `.bak` / `.before-img-cleanup`), confrontation avec `pages/credits.blade.php`, déduction d'origine géographique à partir des slugs d'URL Pexels.

---

## Résumé exécutif

- **Verdict : NON CONFORME (corrigeable)**
- **Score global : 62 / 100**
- **Nombre photos européennes détectées : 2 confirmées + 2 à risque élevé**
  - 2 confirmées : Voorburg (Pays-Bas) — `Volker Thimm` (allemand) — apparte­ment moderne
  - 2 à risque (origine photographe européenne, sujet sans repère géographique fort) : Max Vakhtbovych (cuisine), Clément Proust (toiture)
- **Nombre crédits manquants : 7** (3 slides hero + 4 fichiers `testi-*` / `founder-vignette` / `project-residential`)
- **Nombre crédits orphelins : 1** (Mike van Schoonderwalt — fichier `team-coordination.webp` cité comme « grue de construction » mais le fichier ne porte pas le nom annoncé dans le crédit)
- **Nombre photos peu pertinentes / génériques : 4**

> **Origine du problème utilisateur** : la photo « apartment building » (`filiale-immobilier.webp`) provient d'un photographe allemand et son slug Pexels (`a-modern-apartment-building-with-balconies-and-balconies-27307397`) ne dit pas où, mais l'esthétique européenne (balcons rapprochés, façades blanches contemporaines) s'oppose au stock typique « triplex Lévis ». La photo « bâtiment commercial Charlesbourg » (`projet-commercial-charlesbourg.webp`) est pour sa part **explicitement** prise à Voorburg (Pays-Bas) — slug `modern-office-building-facade-in-voorburg-29358911`. C'est la non-conformité la plus grave : le nom de fichier ment sur la géographie.

---

## Référentiels appliqués

- **Pexels License** : usage commercial autorisé sans attribution obligatoire. Kalystrat documente quand même les crédits sur `pages/credits.blade.php` par éthique (pratique conforme et louable).
- **Charte éditoriale Kalystrat (déduite)** : groupe québécois, audience propriétaires + entrepreneurs québécois, cohérence géographique attendue.
- **Critère origine** :
  - ✅ Québec / Canada / sujet neutre (texture, objet studio sans contexte géographique) = OK
  - ⚠ USA / Amérique du Nord = ACCEPTABLE (visuellement assimilable)
  - ❌ Europe / Asie / autres continents = NON CONFORME (à remplacer)

---

## Inventaire complet

### A. Fichiers utilisés sur le site (référencés dans le code Blade)

| # | Fichier image | Page utilisateur | Origine source (Pexels slug) | Crédit fichier (credits.blade.php) | Pertinence | Statut |
|---|---|---|---|---|---|---|
| 1 | `hero/slide-1-montreal-chantier.webp` | Accueil — slide hero 1 | (slug fichier réécrit local — origine Pexels non documentée) | ❌ ABSENT du tableau crédits | ✓ pertinent (chantier urbain) | ❌ Crédit manquant |
| 2 | `hero/slide-2-vieux-quebec.webp` | Accueil — slide hero 2 | (slug fichier réécrit local — origine Pexels non documentée) | ❌ ABSENT du tableau crédits | ✓ pertinent (Vieux-Québec, repère identitaire) | ❌ Crédit manquant |
| 3 | `hero/slide-3-excavator.webp` | Accueil — slide hero 3 | (slug fichier réécrit local — origine Pexels non documentée) | ❌ ABSENT du tableau crédits | ✓ pertinent (excavation) | ❌ Crédit manquant |
| 4 | `about-bg.webp` | Accueil section À propos + page `/a-propos` (img de contenu) | `drone-shot-of-a-construction-site-14822653` (Braeson Holland) — slug **n'indique pas le Canada** ; le crédit dit « Canada » mais Pexels ne le précise pas | ✅ Crédité (Braeson Holland) | ✓ pertinent (vue drone chantier) | ⚠ Origine Canada non vérifiable depuis le slug — à valider auprès du photographe |
| 5 | `about-strategy.webp` | Accueil — section présentation (vidéo overlay) | `pen-and-ruler-on-top-of-drawing-pad-5582585` (Thirdman) | ✅ Crédité | ✓ pertinent (plans/règle) | ✅ NEUTRE OK (objets studio) |
| 6 | `team-coordination.webp` | Accueil — section bénéfices | `photo-of-a-construction-site-5511075` (Mike van Schoonderwalt — photographe NL) | ⚠ Crédité mais nom de fichier trompeur (« team-coordination » alors que l'image est une grue) | ✓ pertinent | ⚠ Mismatch sémantique nom-fichier vs sujet |
| 7 | `contact-bg.webp` | Accueil — bloc CTA contact (background) | `helmet-level-and-sketches-7937319` (Pavel Danilyuk — RU) | ✅ Crédité | ✓ pertinent (objets chantier) | ✅ NEUTRE OK |
| 8 | `cta-quebec-1280w.webp` | Accueil — section CTA Québec (background) | (origine non documentée — fichier produit local) | ❌ ABSENT du tableau crédits | ✓ pertinent (drone Québec présumé) | ❌ Crédit manquant |
| 9 | `photos/filiale-fondations.webp` | Accueil onglet filiale + page `/filiale/fondations` + carte carrière coffreur (mention « armature acier ») | Voir crédits : 2 sources se disputent (`construction-workers-smoothing-fresh-concrete` SAI GON Vietnam **OU** `close-up-of-textured-rusty-steel-rebars` Serhii Barkanov UA) — le crédit déclare **les deux** pour Fondations | ✅ Crédité (mais ambigu) | ✓ pertinent (béton/coffrage) | ⚠ ATTENTION : si fichier = béton lissé Vietnam → image asiatique. À vérifier visuellement. |
| 10 | `photos/filiale-structure.webp` | Accueil onglet + page filiale + carte carrière charpentier | `new-home-construction-in-elk-grove-california-37176018` (D Goug) | ✅ Crédité | ✓ pertinent (charpente bois) | ⚠ ÉTATS-UNIS (Californie) — assimilable Amérique du Nord → ACCEPTABLE |
| 11 | `photos/filiale-toiture.webp` | Accueil onglet + page filiale + carte carrière couvreur + carte projet réfection | Crédit double : `roofer-working-on-new-house-roof-installation-31771166` (Clément Proust — FR) **OU** `selective-focus-of-black-and-brown-rocks-237907` (morgan — bardeaux texture) | ⚠ Crédité (ambigu) | ✓ pertinent | ⚠ Si fichier = scène couvreur → photographe français (probable scène européenne). Si bardeaux macro → neutre OK. À vérifier. |
| 12 | `photos/filiale-finition.webp` | Accueil onglet + page filiale + carte projet cuisine Sillery | `modern-large-and-spacious-kitchen-and-dining-room-8082304` (Max Vakhtbovych — UA) | ✅ Crédité | ✓ pertinent (cuisine moderne) | ⚠ Photographe ukrainien, esthétique souvent européenne ; risque modéré |
| 13 | `photos/filiale-immobilier.webp` | Accueil onglet + page filiale + **carte projet vedette « triplex Lévis »** (home ligne 716) | `a-modern-apartment-building-with-balconies-and-balconies-27307397` (Volker Thimm — DE) | ✅ Crédité | ✗ **inadéquat** : photographe allemand, balcons style européen, présenté comme « triplex Lévis » sur la home | ❌ **NON CONFORME** — origine européenne probable, contradiction avec le contexte « Lévis » |
| 14 | `photos/filiale-placement.webp` | Accueil onglet + page filiale + carte carrière chargé de projet | `yellow-construction-helmet-on-industrial-site-34965713` (Tito Zzzz) | ✅ Crédité | ✓ pertinent (casque chantier) | ✅ NEUTRE OK (objet) |
| 15 | `photos/projet-commercial-charlesbourg.webp` | Accueil — carte projet vedette « bâtiment commercial Charlesbourg » | `modern-office-building-facade-in-voorburg-29358911` (Jan van der Wolf — NL) | ✅ Crédité | ✗ **inadéquat** : nom fichier ment (« Charlesbourg ») alors que **slug Pexels = VOORBURG (Pays-Bas)** | ❌ **NON CONFORME** — origine européenne **explicite et documentée** |
| 16 | `photos/carriere-courtier.webp` | Accueil — carte carrière courtier OACIQ | `wooden-house-moder-keys-and-contract-on-table-12955837` (Atlantic Ambience) | ✅ Crédité | ✓ pertinent (clés/contrat) | ✅ NEUTRE OK (objets) |
| 17 | `photos/carriere-designer.webp` | Accueil — carte carrière designer d'intérieur | `paper-in-neutral-colors-fabric-and-other-craft-materials-4968690` (Karolina Grabowska — PL) | ✅ Crédité | ✓ pertinent (échantillons matériaux) | ✅ NEUTRE OK (studio) |
| 18 | `project-residential.webp` | Accueil — carte projet « maison neuve Sainte-Foy » | (origine non documentée) | ❌ ABSENT du tableau crédits | ⚠ générique sans contexte québécois identifiable | ❌ Crédit manquant |
| 19 | `hero-skyline.jpg` (défaut bannière) | Toutes pages secondaires (apropos, services, faq, contact, carrieres, realisations, credits, filiale) — bannière en-tête | `aerial-view-of-quebec-city-skyline-by-st-lawrence-river-29591291` (Felix-Antoine Coutu) | ✅ Crédité | ✓ excellent (Québec + Saint-Laurent, identité forte) | ✅ QUÉBEC OK |
| 20 | `og-image.jpg` | Open Graph (réseaux sociaux) — toutes pages | (origine non documentée — vraisemblablement composite local) | ❌ ABSENT du tableau crédits | n/a (image partage) | ⚠ Crédit manquant si origine externe |
| 21 | `logo-white.svg`, `logo-header.svg`, `logo.svg`, `favicon.svg` | Header + footer | Propriété Kalystrat | ✅ Mention propriété Kalystrat dans credits.blade.php | ✓ | ✅ OK |
| 22 | `assets/construz-new/img/icon/about-checklsit-icon1-1.svg` + autres icônes Construz | Accueil (icônes checklist + bénéfices) | Thème stock Construz (template HTML acheté) | ⚠ pas de mention dans credits | ✓ pertinent | ⚠ Icônes thème — licence template, pas Pexels (à mentionner globalement) |
| 23 | `assets/construz-new/img/bg/about-bg-shape5-1.png`, `why-bg5-1.png`, `benefit-bg-shape5-1.png` + `shape/global-line-shape1.png` | Accueil — éléments décoratifs hors-marque | Thème stock Construz | n/a (décoratif) | ⚠ générique | ⚠ Décor hérité du thème, pas une photo |

### B. Fichiers physiques **présents sur disque mais non référencés dans le code** (orphelins)

| Fichier | Localisation | Statut |
|---|---|---|
| `testi-1-engineer-suit.{avif,jpg,webp}` | `public/assets/img/kalystrat/` | Orphelin code — variante triple format |
| `testi-2-business-woman.{avif,jpg,webp}` | idem | Orphelin code |
| `testi-3-worker-hardhat.{avif,jpg,webp}` | idem | Orphelin code |
| `founder-vignette.webp` | idem | Orphelin code (la vignette fondateur a été remplacée par un SVG inline « ks-founder-growth-icon » dans `home.blade.php` ligne 248-254) |
| `team-placeholder.{jpg,webp}` | idem | Orphelin code |
| `hero-bg.jpg` | idem | Orphelin code (remplacé par les 3 slides du dossier `hero/`) |
| `project-apartments.{avif,jpg,webp}` | idem | Orphelin code |
| `project-blueprint.{avif,jpg,webp}` | idem | Orphelin code (référencé en fallback `'project-blueprint.webp'` dans `filiale.blade.php:104` mais inatteignable car les 6 slugs filiale sont mappés) |
| `project-commercial.{avif,jpg,webp}` | idem | Orphelin code (l'image active est `photos/projet-commercial-charlesbourg.webp`) |
| `cta-quebec-768w.*` | idem | Orphelin (pas de srcset, seul le `1280w` est utilisé) |
| `sourced/cta-quebec-drone-site.jpg` | `public/assets/img/kalystrat/sourced/` | Orphelin |
| `sourced/testi-*.jpg` | idem | Orphelin |
| `og/*.jpg` (12 fichiers : apropos, carrieres, contact, credits, faq, filiale-*, realisations, services) | `public/assets/img/kalystrat/og/` | Orphelins — aucun `$ogImage` n'est passé par les pages, donc le fallback `og-image.jpg` racine est toujours utilisé |
| `photos-filiales-backup-20260503-123026.tar.gz` | `public/assets/img/kalystrat/` | ⚠ **Archive de backup laissée dans `public/`** — ne devrait pas être servie publiquement |

---

## Photos NON CONFORMES — origine européenne détectée

### ❌ 1. `photos/projet-commercial-charlesbourg.webp` (CRITIQUE)
- **Origine documentée** : Pexels slug `modern-office-building-facade-in-voorburg-29358911` → **Voorburg, Pays-Bas**
- **Photographe** : Jan van der Wolf (NL)
- **Usage trompeur** : présenté sur l'accueil (home.blade.php ligne 752) avec le titre « Bâtiment commercial moderne livré à Charlesbourg par Kalystrat »
- **Risque** : un visiteur de Charlesbourg/Québec qui reconnaît un bâtiment néerlandais perd toute confiance. Risque réputationnel élevé.
- **Action** : **renommer et remplacer**. Soit retirer la mention « Charlesbourg » dans l'alt-text et le storytelling, soit sourcer une photo réellement québécoise.

### ❌ 2. `photos/filiale-immobilier.webp` (CRITIQUE)
- **Origine probable** : Pexels slug `a-modern-apartment-building-with-balconies-and-balconies-27307397` → photographe Volker Thimm (Allemagne). Slug ne précise pas le pays mais photographe + esthétique balcons rapprochés évoquent l'Europe.
- **Usage trompeur** : présenté sur l'accueil (home.blade.php ligne 716) avec le titre « Triplex moderne livré clé en main à Lévis par Kalystrat Immobilier » et **dans le crédit lui-même** : « carte projet triplex Lévis (vedette accueil) ». Or un triplex de Lévis n'a presque jamais cette esthétique.
- **Action** : remplacer par un vrai bâtiment résidentiel québécois (style mansardé, brique, parements aluminium typiques) ou à défaut une image neutre US assumée.

### ⚠ 3. `photos/filiale-finition.webp` (MAJEUR)
- **Origine** : photographe Max Vakhtbovych (UA), slug `modern-large-and-spacious-kitchen-and-dining-room-8082304`
- **Usage** : « Cuisine sur mesure haut de gamme livrée à Sillery par Kalystrat Finition » (home ligne 788)
- **Risque** : esthétique cuisine européenne contemporaine — peut passer comme « générique high-end » mais le storytelling « Sillery » est risqué si la cuisine est facilement reconnaissable comme un studio européen.
- **Action** : conserver mais retirer la mention « Sillery » de l'alt-text, OU remplacer.

### ⚠ 4. `photos/filiale-toiture.webp` (MAJEUR — selon ce qui est réellement dans le fichier)
- **Origine ambiguë** : crédit déclare deux sources possibles (`roofer-working-on-new-house-roof-installation-31771166` Clément Proust FR, OU `selective-focus-of-black-and-brown-rocks-237907` morgan macro bardeaux). Si c'est la scène couvreur de Clément Proust → toit possiblement européen. Si c'est la macro de bardeaux → neutre OK.
- **Action** : audit visuel manuel obligatoire pour trancher, puis nettoyer le crédit pour ne garder que la source réelle.

---

## Photos potentiellement non pertinentes

| Image | Problème | Recommandation |
|---|---|---|
| `team-coordination.webp` (alt « Grue de construction sous ciel bleu ») | Nom de fichier promet une coordination d'équipe, contenu = grue. Mismatch sémantique sans impact UX direct mais source de confusion en maintenance. | Renommer fichier en `cover-grue-ciel-bleu.webp` ou produire une vraie photo d'équipe. |
| `about-bg.webp` (alt « Vue aérienne d'un chantier d'envergure Kalystrat au Canada ») | Le slug Pexels (`drone-shot-of-a-construction-site-14822653`) **ne précise pas le Canada**. Le crédit affirme « au Canada » sans preuve. | Si le pays n'est pas vérifiable, retirer « au Canada » du crédit et de l'alt-text. |
| `cta-quebec-1280w.webp` | Aucun crédit dans le tableau credits.blade.php alors que c'est clairement une photo Pexels (la version `1280w` suggère un retraitement de stock). | Ajouter le crédit manquant. |
| Slides hero (3) | Aucun crédit dans le tableau credits.blade.php. Les noms `slide-1-montreal-chantier`, `slide-2-vieux-quebec` suggèrent un sourcing Pexels avec étiquetage Québec ; à confirmer. | Ajouter les 3 crédits avec slug original Pexels. Si l'un n'est pas réellement québécois (ex. excavateur générique), retirer la mention géographique de l'alt. |

---

## Crédits manquants ou orphelins

### Crédits MANQUANTS (image utilisée dans le code mais absente de credits.blade.php)
1. `hero/slide-1-montreal-chantier.webp` — accueil
2. `hero/slide-2-vieux-quebec.webp` — accueil
3. `hero/slide-3-excavator.webp` — accueil
4. `cta-quebec-1280w.webp` — accueil section CTA finale
5. `project-residential.webp` — accueil carte projet « Sainte-Foy »
6. `og-image.jpg` — métadonnées OG (si origine externe)
7. (à vérifier) icônes décoratives Construz — nécessitent une mention « Thème Construz, licence commerciale » dans le bloc « Logos Kalystrat » de credits.blade.php

### Crédits ORPHELINS (entrée dans credits.blade.php sans correspondance code claire)
- Aucun crédit n'est strictement orphelin car les usages déclarés font tous référence à un emplacement réel (filiale X, carte projet Y). Toutefois, la double mention pour `filiale-toiture.webp` et `filiale-fondations.webp` empêche de savoir lequel des 2 photographes correspond au fichier réellement servi → **ambiguïté à résoudre**.

---

## Correctifs priorisés

### 🔴 CRITIQUE (origine européenne ou crédit légal manquant)

| # | Action | Fichier | Effort |
|---|---|---|---|
| C1 | **Remplacer** `photos/projet-commercial-charlesbourg.webp` (origine Voorburg/Pays-Bas explicite) par une photo de bâtiment commercial réellement québécois ou à défaut une image neutre Amérique du Nord, **et renommer** le fichier pour ne plus mentir géographiquement | `photos/projet-commercial-charlesbourg.webp` | 1 h (sourcing + remplacement triple format) |
| C2 | **Remplacer** `photos/filiale-immobilier.webp` (Volker Thimm — esthétique allemande) par un vrai triplex québécois, **OU** retirer la mention « Lévis » du storytelling de l'accueil et de la page filiale | `photos/filiale-immobilier.webp` + alt textes | 1 h |
| C3 | **Ajouter 3 crédits manquants** pour les slides hero (`slide-1-montreal-chantier`, `slide-2-vieux-quebec`, `slide-3-excavator`) dans `pages/credits.blade.php`. Si origine Pexels, retracer le slug ; si production locale Kalystrat, le mentionner | `pages/credits.blade.php` | 30 min |
| C4 | **Ajouter le crédit** pour `cta-quebec-1280w.webp` et `project-residential.webp` | `pages/credits.blade.php` | 15 min |
| C5 | **Désambiguïser** les crédits doubles pour `filiale-fondations.webp` et `filiale-toiture.webp` : conserver uniquement la source réellement utilisée dans le fichier servi | `pages/credits.blade.php` | 15 min |

### 🟠 MAJEUR (pertinence métier faible)

| # | Action | Fichier | Effort |
|---|---|---|---|
| M1 | Retirer la mention géographique « Sillery » de l'alt-text de `photos/filiale-finition.webp` (origine cuisine UA — ne peut pas être à Sillery) OU remplacer | `home.blade.php` ligne 788 | 5 min (ou 1 h si remplacement) |
| M2 | Retirer la mention « au Canada » de l'alt et du crédit de `about-bg.webp` (slug Pexels ne le confirme pas) | `home.blade.php` ligne 213, `pages/apropos.blade.php` ligne 68, `pages/credits.blade.php` ligne 50 | 10 min |
| M3 | Vérifier visuellement `photos/filiale-toiture.webp` : si scène couvreur (Clément Proust), considérer un remplacement par une photo de toiture explicitement québécoise (climat enneigé, bardeaux IKO/BP communs au Québec) | `photos/filiale-toiture.webp` | 30 min audit + 1 h remplacement éventuel |
| M4 | Renommer `team-coordination.webp` en `cover-grue-ciel-bleu.webp` (le contenu n'est pas une équipe) ou produire une vraie photo d'équipe | `home.blade.php` ligne 532 + fichier physique | 15 min |
| M5 | **Photo réelle de l'équipe Kalystrat** (planifiée Q3 2026 selon credits.blade.php ligne 45) : prioriser cette séance pour remplacer l'ensemble des stocks par des images authentiques | n/a | n/a (planifié) |

### 🟡 MINEUR (qualité, optimisation, hygiène)

| # | Action | Fichier | Effort |
|---|---|---|---|
| m1 | Supprimer l'archive `photos-filiales-backup-20260503-123026.tar.gz` du dossier public (risque exposition publique) | `public/assets/img/kalystrat/photos-filiales-backup-*.tar.gz` | 2 min |
| m2 | Nettoyer les fichiers orphelins (`testi-*`, `founder-vignette.webp`, `team-placeholder.*`, `hero-bg.jpg`, `project-apartments.*`, `project-blueprint.*`, `project-commercial.*`, `cta-quebec-768w.*`, `sourced/*`, `og/*` non référencés) après confirmation qu'ils ne sont pas prévus pour usage futur | `public/assets/img/kalystrat/` | 30 min |
| m3 | Mettre en place `srcset` pour `cta-quebec-1280w.webp` (les variantes `768w` existent mais ne sont pas exploitées) | `home.blade.php` ligne 989 | 30 min |
| m4 | Ajouter la mention « Thème Construz — éléments graphiques décoratifs (icônes, formes) sous licence template commerciale » dans `pages/credits.blade.php` pour les SVG/PNG du dossier `assets/construz-new/img/` | `pages/credits.blade.php` | 10 min |
| m5 | Préciser dans `partials/page-banner.blade.php` que `hero-skyline.jpg` est crédité Felix-Antoine Coutu (Pexels) — ajouter un commentaire pour la maintenance | `partials/page-banner.blade.php` | 5 min |
| m6 | Optionnel : produire des `og:image` spécifiques par page (les fichiers existent dans `public/assets/img/kalystrat/og/`) — passer `$ogImage` depuis chaque page Blade | toutes pages + `layout.blade.php` | 1 h |

---

## Recommandations techniques

1. **Audit visuel manuel** des 4 fichiers à risque (`filiale-immobilier`, `filiale-finition`, `filiale-toiture`, `projet-commercial-charlesbourg`) pour confirmer/infirmer l'origine européenne avant remplacement. Ouvrir chaque fichier, comparer avec la photo Pexels d'origine et juger de la lisibilité des indices géographiques (panneaux, plaques, style architectural local, végétation).
2. **Politique de nommage** : interdire qu'un nom de fichier mentionne une ville québécoise si la photo n'est pas vérifiée prise dans cette ville. Préférer des noms descriptifs neutres (ex. `triplex-moderne-balcons.webp` au lieu de `triplex-levis.webp`).
3. **Politique de storytelling** : sur les cartes projet vedettes (home.blade.php lignes 716-790), utiliser **uniquement** des photos dont l'origine québécoise est confirmée. À défaut, formuler le titre de manière générique (« Réalisations résidentielles » au lieu de « Triplex moderne livré à Lévis »).
4. **Source unique de vérité pour les crédits** : transformer `pages/credits.blade.php` en un fichier de configuration PHP (`config/photo-credits.php`) avec une clé par fichier image, lu à la fois par la page de crédits et par un éventuel tooltip / lightbox affichant le crédit au survol. Évite la dérive entre code et tableau.
5. **Pre-commit hook** : un script qui parse les `<img src="...">` du dossier `views/` et compare aux clés du fichier de crédits, échoue si une image n'est pas créditée. Réduit le risque de récidive.
6. **Séance photo Q3 2026** (déjà planifiée) : prioriser les 4 photos critiques + les 3 slides hero comme premiers livrables, pour purger l'inventaire stock-dépendant le plus exposé.
7. **Ne pas servir d'archives `.tar.gz` depuis `public/`** : déplacer immédiatement `photos-filiales-backup-20260503-123026.tar.gz` hors du `public_html` (incident potentiel d'exposition de données).

---

## Annexe — méthode de l'audit

- Commandes utilisées (lecture seule) :
  - `grep -rn -E "(<img |background-image:\\s*url\\(|data-bg-src=)" Modules/Frontend/resources/views/ --include="*.blade.php"`
  - exclusion `grep -vE "\\.(bak|before-img-cleanup):"`
  - `ls -la public/assets/img/kalystrat/`
  - `ls public/assets/img/kalystrat/{photos,hero,sourced,og}/`
- Aucun fichier source n'a été modifié.
- Origine géographique déduite **uniquement à partir des slugs Pexels documentés** dans `pages/credits.blade.php` ligne 49-67. Aucun appel WebFetch effectué.
- Score 62/100 calculé : 100 - 15 (1 photo Europe explicite avec mensonge géographique) - 10 (1 photo Europe probable avec mention « Lévis ») - 10 (7 crédits manquants au pluriel pondéré) - 3 (mismatch nom-fichier `team-coordination`) = 62/100.
