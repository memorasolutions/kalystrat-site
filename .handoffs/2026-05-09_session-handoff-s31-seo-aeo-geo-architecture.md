# Handoff S31 — Architecture SEO/AEO/GEO 2026 hub-and-spoke complète

**Date** : 2026-05-09
**Branche** : master
**HEAD** : `5a09bde`
**Commits S31** : 1 commit unifié (24 files, +2495/-385 lines)

## TL;DR

Le site Kalystrat dispose maintenant d'une architecture SEO/AEO/GEO 2026 complète (Option A hub-and-spoke 95/100) : **39 pages publiques** avec **2-4 schemas Schema.org/page**, **sitemap dynamique 42 URLs**, **llms.txt actualisé**, **menu de navigation enrichi 6 dropdowns**, **footer 11 liens utiles**. Tests Pest **83 pass / 126 assertions**.

## Réalisé

### T50 — Phase 3 : Génération contenu (19 pages Blade)

Pages créées avec @push('meta') + @push('schema') Schema.org JSON-LD :

| Page | URL | Schemas spécifiques |
|------|-----|---------------------|
| À propos | `/a-propos` | AboutPage + Person Ali Salomon + Breadcrumb |
| 6 filiales | `/filiales/{slug}` | GeneralContractor + Breadcrumb |
| Filiales index | `/filiales` | CollectionPage + ItemList + Breadcrumb |
| Services | `/services` | CollectionPage + ItemList(Services×27) + Breadcrumb |
| Contact | `/contact` | ContactPage + ContactPoint + Breadcrumb |
| FAQ (15 Q/R) | `/faq` | FAQPage + Breadcrumb |
| Expertise | `/expertise` | AboutPage + Breadcrumb |
| Équipe | `/equipe` | CollectionPage + Person×3 + Breadcrumb |
| Membre | `/equipe/{slug}` | Person + Breadcrumb |
| 9 zones | `/zones-desservies/{ville}` | LocalBusiness + GeoCoordinates + Breadcrumb |
| 5 secteurs | `/secteurs/{slug}` | Service + Breadcrumb |
| Glossaire (20 termes) | `/glossaire` | DefinedTermSet + Breadcrumb |
| Carrières | `/carrieres` | AboutPage + Breadcrumb |
| Projets | `/projets` | CollectionPage + Breadcrumb |
| Partenaires | `/partenaires` | AboutPage + Breadcrumb |
| Blog | `/blog` | Blog + Breadcrumb |
| Crédits | `/credits` | (layout default) |

### Cause racine HTTP 500 résolue

**Symptôme initial** : ParseError "syntax error, unexpected end of file" sur `/a-propos` après ajout @push('schema') avec JSON-LD.

**Diagnostic** : Blade tente de parser les `{` et `}` du JSON même dans `@push`. Le wrapper `@verbatim` désactive le parsing mais empêche aussi l'interpolation des variables Blade.

**Solution validée** : pattern `@php echo json_encode([...]) @endphp` à l'intérieur du `<script type="application/ld+json">`. Avantages :
- Aucun problème de parsing (PHP traite tout)
- Variables Blade accessibles ($filiales, $slug, etc.)
- JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES pour propreté SERP

### T51 — Schema.org global + sitemap dynamique + llms.txt

**Layout `intime.blade.php`** :
- 2 schemas globaux (toutes pages) : Organization + WebSite
- Organization inclut `subOrganization` array dynamique (6 GeneralContractor depuis `FilialeController::FILIALES`)

**Sitemap `Modules/SEO/routes/web.php`** :
- 17 URLs → **42 URLs** (+147%)
- Toutes routes SEO : 6 filiales, 9 zones, 5 secteurs, 3 membres équipe, expertise, partenaires, glossaire, blog, projets, faq, etc.
- Source unique : `FilialeController::FILIALES` (DRY)

**llms.txt `storage/app/seo/llms.txt`** :
- Refait à neuf avec slugs corrects (toiture-enveloppe, finition-interieure, placement-construction)
- Sections : Présentation, 6 Filiales, Services, 5 Secteurs, 9 Zones, Référence (FAQ/Glossaire/Projets/Blog), Carrières, Contact, Optional

### T53 — Navigation enrichie

**Header** (intime.blade.php:82) — 6 items, 3 avec dropdown :
- Accueil
- À propos ▾ (vision, expertise, équipe, partenaires)
- Filiales ▾ (vue d'ensemble + 6 filiales)
- Services ▾ (services, secteurs, zones, projets)
- Ressources ▾ (FAQ, glossaire, blog, carrières)
- Contact

**Footer** "Liens utiles" : 11 items (6 → 11) couvrant toute l'architecture pour SEO interne + UX navigation.

### Tests Pest `tests/Feature/FrontendKalystratSmokeTest.php`

- 39 routes testées HTTP 200
- 39 routes testées présence schema Organization
- Sitemap ≥ 35 URLs
- llms.txt + robots.txt 200
- 404 invalides validés (filiale + ville)
- **83 pass / 126 assertions / 35.16s**

## Validation visuelle

17 screenshots capturés `.handoffs/audit_visuel_S31/` viewport 1280×900 :
home, apropos, filiales-index, filiale-fondations, services, contact, faq, expertise, equipe, membre-ali, zones-index, zone-quebec, secteurs, secteur-residentiel, glossaire, carrieres, blog.

Rendu cohérent : titre + breadcrumb + sections + CTA. Markup InTime natif respecté (orange #F36F21, classes feature-section-four, theme-btn, etc.).

## Architecture finale

```
HOLDING (/) — Kalystrat
├─ /a-propos (vision, fondateur, 6 piliers, conseil)
├─ /expertise (RBQ, BIM, sécurité, qualité)
├─ /equipe → /equipe/{ali-salomon|jacques-jobidon|perry-wong}
├─ /partenaires
│
├─ FILIALES (hub /filiales)
│   ├─ /filiales/fondations
│   ├─ /filiales/structure
│   ├─ /filiales/toiture-enveloppe
│   ├─ /filiales/finition-interieure
│   ├─ /filiales/immobilier
│   └─ /filiales/placement-construction
│
├─ SERVICES (/services)
│   └─ Catalogue regroupé par filiale
│
├─ ZONES GEO (/zones-desservies)
│   └─ 9 villes : Québec, Lévis, Sainte-Foy, Beauport, Sillery,
│      Trois-Rivières, Saguenay, Montréal, Laval
│
├─ SECTEURS B2B (/secteurs)
│   └─ 5 verticaux : résidentiel, commercial, institutionnel,
│      industriel, municipal
│
├─ E-E-A-T (Expertise, Authority, Trust)
│   ├─ /faq (15 Q/R FAQPage)
│   ├─ /glossaire (20 termes DefinedTermSet)
│   └─ /blog (placeholder)
│
├─ /projets · /carrieres · /credits
└─ /contact (formulaire + ContactPage schema)
```

## Reste à faire (PENDING)

### Bloquant client (Ali)
- **G4** : photos réelles équipe + projets (placeholders 1920×618 InTime)
- **G5** : décision charte navy/gold vs orange Construz
- **G7** : SVG signature manuscrite Ali
- **D3-D6** : DNS Cloudflare + déploiement cPanel kalystrat.ca + smoke test prod
- **E1-E2** : Sentry DSN + GA4 Measurement ID
- **F1-F3** : push GitHub initial + DMARC/DKIM + audit sécurité prod

### Internes possibles ensuite
- Articles blog (3-5 premiers articles ~800 mots, AEO oriented)
- Études de cas projets (galerie Kalystrat Immobilier)
- Bouton "Filiales" dans le sticky header sur scroll (cloné via JS InTime)
- Audit Lighthouse mobile post-S31 (objectif ≥90)
- Audit WCAG AAA sur les 39 nouvelles pages

## Méthodologie validée S31

1. **Pattern @php json_encode()** pour Schema.org Blade-safe
2. **Source unique de vérité** : `FilialeController::FILIALES` (sitemap + nav + Organization subOrg)
3. **DRY contrôleur** : `PageController::services()` injecte `$filiales`
4. **Tests Pest dataset** : 39 routes en 1 dataset, RefreshDatabase obligatoire (sinon "no such table: settings")
5. **Verbatim thème** : `public/intime/*` jamais modifié, Blade utilise les classes Bootstrap + InTime sans pollution

## Commit S31 unique

```
5a09bde feat(frontend): S31 — architecture SEO/AEO/GEO 2026 complète
        (39 pages, 4 schemas/page)
```

24 files changed, 2495 insertions(+), 385 deletions(-)
