# Déploiement Kalystrat — procédure préparée

Ce dossier `.deploy/` contient les fichiers de configuration **prêts à activer**
pour le déploiement de kalystrat.ca en production. Aucun de ces fichiers
n'est actif tant qu'il n'est pas copié à son emplacement cible.

## Fichiers fournis

| Fichier | Cible | Description |
|---------|-------|-------------|
| `.env.production.kalystrat.example` | `/home/{cpanel}/kalystrat/.env` | Template `.env` Kalystrat-spécifique avec valeurs prédéfinies + champs `TO_FILL` |
| `github-actions-ci.yml.example` | `.github/workflows/ci.yml` | Workflow CI avec Pest + axe-core + Lighthouse CI sur PR |

## Pré-requis (inputs user attendus pour la prochaine session)

Avant le déploiement, fournir :

- [ ] **Repo GitHub remote** : URL/SSH key (privé recommandé, org Memora ou perso)
- [ ] **IP cPanel cible** (probablement server.memora.pro)
- [ ] **Credentials cPanel** : login + DB credentials (DB_NAME/USER/PASS)
- [ ] **Cloudflare API token** (scope DNS edit + Page Rules)
- [ ] **Password choisi** stephane@memora.ca (16+ chars, alphanum + symbol)
       OU générer fort : `openssl rand -base64 24 | tr -d '/+='`
       NB : seeder lance `RuntimeException` si `ADMIN_PASSWORD` vide en prod
- [ ] **MX records** info@kalystrat.ca (Gmail Workspace ou autre ?)
- [ ] **SMTP credentials** (provider + login + password) pour formulaire contact
- [ ] **Sentry DSN** Kalystrat (créer projet sur sentry.io après déploiement)
- [ ] **GA4 Measurement ID** (G-XXXXXXXXXX, post-création GA4 property)

## Procédure de déploiement (synthèse, à exécuter quand inputs disponibles)

### 1. GitHub remote (D4)
```bash
git remote add origin git@github.com:<org>/kalystrat.git
git push -u origin master
cp .deploy/github-actions-ci.yml.example .github/workflows/ci.yml
git add .github/workflows/ci.yml
git commit -m "ci: enable Pest + axe + Lighthouse on PR"
git push
```

### 2. Cloudflare DNS + SSL (D3)
- A record kalystrat.ca → IP cPanel server.memora.pro
- CNAME www → kalystrat.ca
- MX → Gmail Workspace (à confirmer)
- SPF/DKIM/DMARC TXT
- SSL Full (Strict)
- Page Rule : cache assets/, bypass /admin /dashboard /login
- Transform Rule CSP header

### 3. Déploiement cPanel (D5)
Via sub-agent `laravel-deployer` ou manuellement :
```bash
# Sur cPanel SSH
cd ~/
git clone <repo> kalystrat
cd kalystrat
cp .deploy/.env.production.kalystrat.example .env
# Éditer .env : remplir tous les TO_FILL
nano .env
composer install --no-dev --optimize-autoloader
php artisan key:generate
php artisan migrate --force
php artisan db:seed --force        # crée superadmin avec ADMIN_PASSWORD
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
php artisan storage:link
chmod -R 775 storage bootstrap/cache
# Vider ADMIN_PASSWORD du .env après seed
```

### 4. Smoke test post-déploiement (D6)
- 13 URLs HTTP 200
- Form contact submit + arrivée Gmail
- Login superadmin
- /pulse accessible avec super_admin
- sitemap.xml + robots.txt
- SSL grade A+ (ssllabs.com)

### 5. Observabilité (Section E)
- E1 Sentry : `composer require sentry/sentry-laravel`, ajouter SENTRY_LARAVEL_DSN
- E2 GA4 + GSC : ajouter G-XXX dans .env, soumettre sitemap dans GSC
- E3 Pulse : `composer require laravel/pulse`, `php artisan pulse:install`
- E4 Backups : `composer require spatie/laravel-backup`, cron `0 2 * * * php artisan backup:run`

## Tâches restantes (référence)

Voir tâches #14 à #23 dans le système de tracking + handoff S25.

## Faux positifs axe-core tolérés en CI

Le workflow CI (`github-actions-ci.yml.example`) tolère jusqu'à 5 violations
axe-core qui sont des **faux positifs documentés** dans `Modules/Frontend/README.md` :

1. `1.4.3 / 1.4.6` sur `<h1 class="visually-hidden">` (clip-path Bootstrap)
2. `2.1.1` sur `.slick-slide[inert]` (slides cachées by design)
3. `2.1.2` sur `<a href="/services">` du header (heuristique défaillante)
4. `1.4.8` sur `div`/`main` (mesure DOM imprécise responsive)
5. `4.1.2` sur `.ks-header__dropdown li a` (axe ne modélise pas disclosure widgets)

Si le nombre de violations dépasse 5, le job échoue et bloque le merge.

---

*Préparé en session 2026-05-04 — voir handoff S25 pour contexte complet.*
