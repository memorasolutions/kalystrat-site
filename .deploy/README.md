# Déploiement Kalystrat — procédure préparée

Ce dossier `.deploy/` contient les fichiers de configuration **prêts à activer**
pour le déploiement de kalystrat.ca en production. Aucun de ces fichiers
n'est actif tant qu'il n'est pas copié à son emplacement cible.

## Fichiers fournis

| Fichier | Cible | Description |
|---------|-------|-------------|
| `.env.production.kalystrat.example` | `/home/{cpanel}/kalystrat/.env` | Template `.env` Kalystrat-spécifique avec valeurs prédéfinies + champs `TO_FILL` |
| `github-actions-ci.yml.example` | `.github/workflows/ci.yml` | Workflow CI avec Pest + axe-core + Lighthouse CI sur PR |
| `deploy.sh` | `~/kalystrat/.deploy/deploy.sh` (cPanel) | Script bash idempotent : snapshot → pull → composer → migrate → cache → smoke test → rollback auto si échec |

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

**Premier déploiement** :
```bash
# Sur cPanel SSH
cd ~/
git clone <repo> kalystrat
cd kalystrat
cp .deploy/.env.production.kalystrat.example .env
nano .env                                  # remplir tous les TO_FILL
php artisan key:generate
chmod +x .deploy/deploy.sh
bash .deploy/deploy.sh --first-deploy      # script idempotent : snapshot → composer → migrate → seed → cache → smoke test
chmod -R 775 storage bootstrap/cache
nano .env                                  # vider ADMIN_PASSWORD (mot de passe est en DB hashé)
```

**Déploiements suivants** (idempotent, rollback auto sur échec) :
```bash
ssh cpanel-user@server.memora.pro
cd ~/kalystrat
bash .deploy/deploy.sh
# Le script : snapshot tar.gz → git pull → composer install --no-dev → php artisan down →
# migrate --force → cache (config/route/view/event) → up → smoke test 3 URLs.
# Si une URL ne renvoie pas 200 → rollback auto vers commit précédent + restore .env/storage.
```

**Rollback manuel d'urgence** (si script absent ou autre incident) :
```bash
cd ~/kalystrat
git checkout <commit-hash-précédent>
tar -xzf ~/backups/snapshot_YYYYMMDD_HHMMSS.tar.gz
composer install --no-dev --optimize-autoloader
php artisan config:clear && php artisan route:clear && php artisan view:clear
php artisan up
```

### 4. Smoke test post-déploiement (D6)
- 13 URLs HTTP 200
- Form contact submit + arrivée Gmail
- Login superadmin
- /pulse accessible avec super_admin
- sitemap.xml + robots.txt
- SSL grade A+ (ssllabs.com)

### 5. Observabilité (Section E)

**Statut packages : tous déjà installés via boilerplate Memora** ✅
- E1 Sentry (`sentry/sentry-laravel 4.24.0`) : ajouter SENTRY_LARAVEL_DSN dans .env (créer projet sur sentry.io, scope `laravel`)
- E2 GA4 + GSC : ajouter `GA_MEASUREMENT_ID=G-XXX` dans .env + vérifier GSC via DNS TXT, soumettre sitemap.xml
- E3 Pulse (`laravel/pulse 1.7.2`) : déjà gated `viewPulse` super_admin (commit 7c0c7da) — accès via /pulse après login
- E4 Backups (`spatie/laravel-backup 9.4.1`) : `routes/console.php` a déjà `backup:run` daily 03:00 + `backup:clean` daily 04:00 ; activer le cron Laravel `* * * * * cd ~/kalystrat && php artisan schedule:run >> /dev/null 2>&1`

## Sécurité — état post-S26 (2026-05-04)

| Vérif | État |
|---|---|
| CVE Composer | ✅ 0 (`composer audit` clean, commit 4104640) |
| ADMIN_PASSWORD fallback hardcodé | ✅ retiré, RuntimeException en prod si vide (de69231) |
| /pulse + /telescope auth | ✅ Gate super_admin (7c0c7da) |
| Tests automatisés | ✅ 19 tests Pest sur 18 pages publiques (f240632) |

Audit complet : `.rapports/audit-securite-2026-05-04.md`

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
