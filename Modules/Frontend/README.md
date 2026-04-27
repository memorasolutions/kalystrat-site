# Frontend Module — Kalystrat

Site holding québécois construction (6 filiales) basé sur theme Construz home-5 multipage officiel.

## Architecture
- **6 vues principales** (Construz pures via sed) : `resources/views/{home,about,services,portfolio,contact,filiale}-construz.blade.php` (6375 lignes copiées 1:1 du HTML source)
- **Source HTML originelle** : `.themes/main-file/construz/{home-5,about,service,service-details,project,contact}.html`
- **Partial Schema.org séparé** : `resources/views/partials-v2/schema-jsonld.blade.php` (17 entrées JSON-LD : Organization + LocalBusiness + 6 SubOrg + 6 Service + HowTo + WebSite + BreadcrumbList + FAQPage)
- **CSS WCAG séparé** : `public/assets/css/kalystrat-wcag.css` (skip-link + focus-visible + sr-only)
- **Theme assets** : `public/assets/construz-new/` (18 MB officiel intact)
- **Logos client** : `public/assets/construz-new/img/logo*.svg` (Kalystrat installés)
- **Photos Kalystrat** : `public/assets/img/kalystrat/*.jpg` (hero-skyline, about-strategy, project-residential/blueprint/commercial/apartments)
- **Script génération** : `.scripts/kalystratize-v3.sh` (8 KB, 70+ substitutions sed paths/liens/textes EN→FR)

## Workflow modifications

**RÈGLE CARDINALE** : pas de patchage manuel des vues `*-construz.blade.php`. Toute modification passe par le script sed déterministe.

```bash
# 1. Modifier .scripts/kalystratize-v3.sh (étendre avec nouvelles substitutions)
# 2. Re-générer les 6 vues
bash .scripts/kalystratize-v3.sh .themes/main-file/construz/home-5.html Modules/Frontend/resources/views/home-construz.blade.php
# (idem pour about/service/service-details/project/contact)

# 3. Smoke test
curl -s -o /dev/null -w "%{http_code}\n" -L -k https://kalystrat.test/

# 4. Validation visuelle Playwright (optionnel)
```

**INTERDIT** : utiliser MCP qwen3-max pour conversion HTML→Blade massive (hallucinations classes Construz garanties — leçons `Theme-L1` + `Reset-L1` + `Sed-L1+L2`).

**EXCEPTION DOM modification** (ex S2 6 tabs filiales) : Edit Blade ciblé qui DUPLIQUE le pattern Construz existant. Pas de markup inventé.

## Commandes Artisan
```bash
php artisan frontend:sitemap   # Régénère public/sitemap.xml (12 URLs Kalystrat)
```

Cron Laravel quotidien 03:00 : `$schedule->command('frontend:sitemap')->daily()->at('03:00');` dans `app/Providers/FrontendServiceProvider.php::configureSchedules()`.

## Routes opérationnelles

| URI | Vue Blade | Source HTML |
|-----|-----------|-------------|
| `/` | `home-construz` | `home-5.html` |
| `/a-propos` | `about-construz` | `about.html` |
| `/services` | `services-construz` | `service.html` |
| `/portfolio` | `portfolio-construz` | `project.html` |
| `/contact` | `contact-construz` | `contact.html` |
| `/filiales/{slug}` | `filiale-construz` | `service-details.html` |
| `/faq` | `faq-v2` (perso) | — |
| `/sitemap.xml` | Static `public/sitemap.xml` (auto-régénéré) | — |
| `/robots.txt` | Static `public/robots.txt` (13 LLM bots autorisés) | — |

Slugs filiales : `fondations`, `structure`, `toiture`, `finition`, `immobilier`, `placement`.

## Configuration

**Module activé** : `modules_statuses.json` doit avoir `"Frontend": true` (par défaut).

**Variables `.env`** :
```ini
APP_URL=https://kalystrat.test       # dev local Herd
# APP_URL=https://kalystrat.ca       # production cPanel
```

**Coordonnées** (hardcodées dans vues + .scripts/kalystratize-v3.sh) :
- Tél : `1-581-578-6145` (VoIP.ms)
- Email : `info@kalystrat.ca`
- Adresse : Québec, QC, Canada

## Tests

```bash
vendor/bin/pest --filter SmokeTest
```

**Statut** : tests créés dans `tests/Feature/SmokeTest.php` mais Pest config absente (P20 TODO : créer `tests/Pest.php` + `tests/TestCase.php`).

Validation manuelle disponible :
```bash
for url in / /a-propos /services /portfolio /contact /faq /filiales/fondations; do
  curl -s -o /dev/null -w "$url → %{http_code}\n" -L -k "https://kalystrat.test$url"
done
```

## Déploiement

Script `.scripts/deploy-prod.sh` (DRY_RUN=1 par défaut). Voir le script pour étapes : git clean check, smoke local, rsync, composer install, artisan migrate, sitemap, smoke prod.

Pour exécuter : `DRY_RUN=0 bash .scripts/deploy-prod.sh`.

Mode rollback : `bash .scripts/deploy-prod.sh --rollback` (revient au dernier tag git).

## Méthode validée

- **`Reset-L1`** : pour theme externe, sed sur source > MCP qwen3-max
- **`Sed-L1+L2+L3`** : sed déterministe absorbe 70+ substitutions (paths + liens + textes)
- **`NoPatchage-L1`** : ajout fonctionnalités via fichiers séparés + `@include` (Schema.org, WCAG CSS) — désactivable instantanément
- **`Bascule-L1`** : modifier méthodes controller (retourner vues -construz) plutôt que routes doublons
- **`Module-L1`** : nwidart Modules nécessite `protected array $commands` dans ServiceProvider pour découvrir Artisan commands

## Backups conservés (rollback < 30s)

- `storage/app/archive/v2-charte-prematuree-2026-04-26/` : home-v2 + layout-v2 patchage
- `storage/app/archive/v2-patche-2026-04-26/` : 6 vues V2 patchées (about/services/portfolio/contact/filiale/faq)
- Vues V1 originales conservées dans `views/` (`home.blade.php`, `about.blade.php`, etc.)
- Logos Construz originaux : `public/assets/construz-new/img/logo*-construz-original.svg.bak`

Rollback rapide : `git revert <commit-hash>` ou bascule controller pour pointer vers vues V1/V2.
