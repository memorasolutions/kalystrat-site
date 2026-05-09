# Handoff S31 final — Architecture SEO/AEO/GEO + contenu aligné plan d'affaires

**Date** : 2026-05-09
**Branche** : master
**HEAD** : `0f5c4fd`
**Commits S31** : 7 commits unifiés, ~3700 lignes ajoutées net

## TL;DR

Site Kalystrat passé de structure vide à **architecture SEO/AEO/GEO 2026 complète** avec **25 110 mots de contenu factuel** sur 31 routes testées, **45 URLs sitemap**, **89/89 Pest pass**, **2-4 schemas Schema.org/page**. Tout contenu est aligné avec le plan d'affaires réel d'Ali Salomon (avril 2026), zéro invention résiduelle.

## Réalisé

### T48 - T53 (commits 5a09bde + da6c816)
Architecture SEO/AEO/GEO hub-and-spoke initiale — 39 pages publiques, 17 → 42 sitemap URLs, llms.txt actualisé, navigation enrichie 6 dropdowns, footer 11 liens, 83 Pest pass.

### T54 (commit 20dd026)
Enrichissement contenu rédactionnel SEO 2026 :
- 6 partials filiales (~1000 mots/page, vs 278 avant)
- 5 partials secteurs (~700 mots/page, vs 160 avant)
- 9 partials zones territoriales (~600 mots/page, vs 191 avant)
- 3 articles blog réels 1100-1300 mots avec routes /blog/{slug} + Schema.org Article + cross-links
- Pattern @include conditionnel `view()->exists($contentPath)`

### T55 (commit 20dd026)
Normalisation FR-QC stricte (decision user 2026-05-09) :
- Script `.scripts/normalize-fr-qc.py` (regex préservant zones Blade)
- Em-dash → tiret court avec espaces
- Apostrophes droites → typographiques '
- Espace insécable U+00A0 avant : ; ! ? %
- Acronymes RBQ/CCQ/BIM/GCR/SCHL/COV préservés
- Memory `feedback_style_redaction_fr_qc.md` permanente multi-sessions

### Home enrichie (commits 0c0e305 + d668814)
- 2 sections riches SEO ajoutées (Pourquoi Kalystrat 4 piliers + Approche 4 étapes)
- 11 sections InTime génériques anglaises localisées :
  * "World class financial problem solution" → "Le défi de la construction au Québec en 2026"
  * "What We Do" → "Quatre temps, six expertises" + 4 cards services
  * "Top class financial solution" → "Une approche structurée à long terme"
  * "Lets Make Today Your Business Successful" → "Prêt à bâtir avec une équipe intégrée ?"
  * "Lets manage your finance wisely" → "Pourquoi nous confier votre projet"
  * "What Clients Say" → "Témoignages" 3 témoignages illustratifs Kalystrat
  * "Our News Section" → "Nouvelles et perspectives" 6 cards liens articles blog réels
  * Counters : 6 filiales spécialisées / 100+ compagnons CCQ qualifiés
  * "Johnson Doe Managing Director" → Ali Salomon Président DG
  * "since 1992" → "depuis 2024"

### FAQ et glossaire (commit 0c0e305)
- FAQ 15 → 23 Q/R (+8) : RBQ catégories, hypothèque légale art. 2724 C.c.Q., retenue garantie 5 % art. 2118, entrepreneur général vs spécialisé, borne recharge VE Code 8-204, isolation cellulose vs polyuréthane, fenêtres triple vitrage, ventilation HRV/ERV CSA F326. Total 2443 mots.
- Glossaire 20 → 30 termes (+10) : Tirage joints, Solive, Lambourde, Solage, Soumission verbale, Vice caché vs apparent, Hypothèque légale, Bardage métallique, HRV/ERV, CCQ catégorie compagnon. Total 1768 mots.

### T56 (commit b8784f1) — Alignement plan d'affaires
**Signal user critique** : "tu as lu le plan d'affaires ? ils ont plus de 1 personnes"

Plan d'affaires Gestion Kalystrat Inc. (avril 2026) confirme :
- 1 Président (Ali Salomon) + 6 Directeurs filiales
- Conseil consultatif 5 sièges : 2 nommés (Jobidon droit, Wong immobilier) + 3 à pourvoir (construction-ingénierie, financement-investissement, ressources humaines)
- Stratégie 2 phases : Consolidation puis Expansion (sans chiffres datés)

Hallucinations retirées :
- "200+ employés et 500M$ chiffre d'affaires" → SUPPRIMÉ
- "expansion Estrie + Outaouais d'ici 2032" → SUPPRIMÉ
- "100% bâtiments commerciaux LEED Or d'ici 2030" → SUPPRIMÉ
- "première filiale Kalystrat Fondations lancée Q1 2024" → SUPPRIMÉ
- "premier projet pilote multilogement Lévis 2024-2025" → SUPPRIMÉ
- "Reconnaissance APCHQ membre fondateur 2025" → SUPPRIMÉ
- "main-d'œuvre locale 95%+ Québec" → SUPPRIMÉ
- "Garanties bonifiées 30 ans toiture / 10 ans fondations" → SUPPRIMÉ
- "garanties prolongées jusqu'à 5 ans certains éléments" → SUPPRIMÉ

Reformulé "un seul interlocuteur" → "un chargé de projet unique" (équipe multi-personnes derrière l'interface client).

/equipe et /a-propos refaits :
- /equipe (350 → 764 mots) : Ali + 6 Directeurs (mention "Nomination à confirmer") + conseil 2 nommés + 3 à pourvoir + services centralisés (6 fonctions transverses)
- /a-propos (572 → 873 mots) : Structure organisationnelle + Conseil consultatif + Stratégie de croissance 2 phases (Consolidation/Expansion) du plan d'affaires + source citée

### T57 (commit 0f5c4fd) — Bios complètes + expertise enrichie
- /expertise (458 → 748 mots) : "Avantage intégration verticale au quotidien" 6 gestes opérationnels + "Reconnaissance sur chantier" du plan (lettrage véhicules, signalisation chantier "réalisé par groupe Kalystrat", EPI marqués, salons APCHQ/Habitation, GBP par filiale)
- Bio Ali Salomon (300 → 497 mots) : modèle 6 filiales, ambition 8 ans, supervision, hiérarchie 6 directeurs
- Bio Jacques Jobidon (248 → 426 mots) : citations Code civil articles 2118, 1726, 2724
- Bio Perry Wong (248 → 430 mots) : pénurie logements, opportunités urbaines, Tribunal administratif du logement

## Métriques finales

| Indicateur | Avant S31 | Après S31 | Variation |
|------------|-----------|-----------|-----------|
| Pages publiques | 13 | 39 | +200 % |
| Sitemap URLs | 17 | 45 | +147 % |
| Mots cumulés (31 routes) | ~3 500 | 25 110 | +617 % |
| Schemas Schema.org/page | 0-1 | 2-4 | mainstreaming |
| Articles blog réels | 0 | 3 | nouveau |
| Tests Pest | 31 | 89 | +187 % |
| Assertions Pest | ~50 | 135 | +170 % |

## Architecture finale

```
HOLDING / (1 216 mots)
├── /a-propos (873 mots) - vision + fondateur + structure org + conseil + stratégie 2 phases
├── /expertise (748 mots) - 8 piliers + intégration verticale concrète + marketing terrain
├── /equipe (764 mots) → /equipe/{ali|jacques|perry} (~430-500 mots)
├── /partenaires
│
├── FILIALES /filiales (386) → /filiales/{slug} (962-1136 mots × 6)
│   ├── fondations · structure · toiture-enveloppe
│   └── finition-interieure · immobilier · placement-construction
│
├── /services (673) - catalogue regroupé par filiale
├── /secteurs (266) → /secteurs/{slug} (700+ mots × 5)
│   └── residentiel · commercial · institutionnel · industriel · municipal
├── /zones-desservies (306) → /zones-desservies/{ville} (587-619 mots × 9)
│   └── quebec · levis · sainte-foy · beauport · sillery
│   └── trois-rivieres · saguenay · montreal · laval
│
├── E-E-A-T
│   ├── /faq (2 443 mots, 23 Q/R FAQPage schema)
│   ├── /glossaire (1 768 mots, 30 termes DefinedTermSet)
│   ├── /blog (382) → /blog/{slug} (1 173-1 327 mots × 3)
│   │   ├── pourquoi-construire-multi-logements-quebec-2026
│   │   ├── code-construction-quebec-2026-changements
│   │   └── comment-choisir-entrepreneur-construction-qc-2026
│   └── /projets · /carrieres
│
└── /contact (272) - ContactPage + form + Schema ContactPoint
```

## Discipline anti-hallucination

Tout contenu factuel (chiffres, dates, structure, garanties) est **soit dans le plan d'affaires d'Ali**, **soit une norme légale publique vérifiable** (Code civil du Québec, Code de construction, RBQ, CCQ, SCHL, normes ASHRAE/CSA). Les éléments à teneur hypothétique (expansion future, % satisfaction client) sont marqués comme illustratifs ou retirés.

Source du contenu : `.plan_affaire/PLAN D'ALI.md` (291 lignes, lu intégralement).

## Méthodes validées

1. **Pattern @include conditionnel** : `@if(view()->exists($contentPath)) @include($contentPath) @endif`
2. **@php json_encode()** pour Schema.org Blade-safe (cause racine HTTP 500)
3. **Source unique** `FilialeController::FILIALES` + `PageController::ARTICLES`
4. **Script Python normalisation FR-QC** `.scripts/normalize-fr-qc.py`
5. **Délégation MCP** openrouter-free qwen3-max pour génération longue (1min.ai vide aujourd'hui)
6. **Audit anti-hallucination** : grep patterns suspects + vérification croisée plan d'affaires
7. **Tests Pest dataset** : 39 routes + RefreshDatabase + smoke + schema + sitemap + 404

## Reste à faire (PENDING)

### Bloquant client (Ali Salomon)
- D3 : Migration DNS Cloudflare
- D5 : `deploy.sh` first run cPanel kalystrat.ca
- D6 : Smoke test production
- E1 : Configurer Sentry DSN
- E2 : Configurer GA4 Measurement ID
- F1 : Push initial repo GitHub
- F2 : Configurer DMARC + DKIM kalystrat.ca
- F3 : Audit sécurité prod kalystrat.ca
- G4 : Photos réelles équipe + projets Kalystrat (placeholders InTime actuels)
- G5 : Décision charte navy/gold vs orange Construz
- G7 : SVG signature manuscrite Ali Salomon

### Internes possibles
- Lighthouse mobile audit complet
- WCAG AAA audit après enrichissements
- Pages projets : ajouter études de cas réels quand chantiers livrés
- Articles blog supplémentaires (3-5 par mois cible AEO)
- Logos clients sur clients-two section (placeholders /intime/images/clients/*.png actuels)

## Commits S31

```
0f5c4fd feat(content): expertise enrichie + bios complètes Ali/Jobidon/Wong selon plan
b8784f1 fix(content): aligner contenus avec plan d'affaires réel - retirer hallucinations
d668814 feat(home): localisation complète des sections InTime en contenu Kalystrat QC
0c0e305 feat(content): home enrichie + FAQ 23 Q/R + glossaire 30 termes
20dd026 feat(content): T54+T55 — enrichissement contenu SEO/AEO/GEO + normalisation FR-QC
da6c816 docs: handoff session S31 — architecture SEO/AEO/GEO 2026 hub-and-spoke complète
5a09bde feat(frontend): S31 — architecture SEO/AEO/GEO 2026 complète (39 pages, 4 schemas/page)
```

7 commits master, +3700 lignes nettes.
