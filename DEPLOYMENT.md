# Guide de deploiement

> MEMORA solutions - Template Laravel 12 SaaS

Ce guide detaille la mise en production sur un environnement **cPanel** (hebergement mutualise ou cloud dedie).

## 1. Prerequis serveur

- **PHP 8.4** (extensions : bcmath, ctype, fileinfo, intl, mbstring, openssl, pdo_mysql, redis, gd, zip)
- **MySQL 8.0+**
- **Redis 7.0+** (requis pour Horizon, cache, sessions)
- **Node.js 20+** et NPM
- **Composer 2.8+**
- **Acces SSH** (indispensable pour les commandes artisan et le script de deploiement)
- **Gestionnaire de processus** (Supervisor si disponible, sinon terminal persistant)

## 2. Installation nouveau projet

1. **Cloner et installer les dependances** :
   ```bash
   git clone <repo_url> public_html
   cd public_html
   composer install --no-dev --optimize-autoloader
   npm install && npm run build
   ```

2. **Initialisation interactive** (DB, admin, Stripe) :
   ```bash
   php artisan app:install
   ```

3. **Selection des modules** (39 disponibles, activer selon le client) :
   ```bash
   php artisan core:new-project
   ```

4. **Optimisation** :
   ```bash
   make setup
   make warmup
   ```

## 3. Configuration .env production

Cles critiques a configurer imperativement :

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://votre-domaine.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=u123_prod
DB_USERNAME=u123_user
DB_PASSWORD=<mot_de_passe_fort>

QUEUE_CONNECTION=redis
CACHE_STORE=redis
SESSION_DRIVER=redis
SESSION_SECURE_COOKIE=true

FORCE_HTTPS=true
CSP_ENABLED=true
TELESCOPE_ENABLED=false

STRIPE_KEY=pk_live_...
STRIPE_SECRET=sk_live_...
STRIPE_WEBHOOK_SECRET=whsec_...

MAIL_MAILER=smtp
MAIL_HOST=smtp.votre-fournisseur.com
MAIL_PORT=587
MAIL_USERNAME=<username>
MAIL_PASSWORD=<password>
MAIL_FROM_ADDRESS=noreply@votre-domaine.com
```

Voir `.env.production.example` pour un template complet.

## 4. Deploiement

Le script `scripts/deploy.sh` automatise le flux :

```bash
bash scripts/deploy.sh
```

**Flux execute :**
1. Mode maintenance active (`php artisan down`)
2. `git pull origin master`
3. `composer install --no-dev --optimize-autoloader`
4. `npm run build`
5. `php artisan migrate --force`
6. Caches optimises (config, route, view, event, icons)
7. `php artisan queue:restart`
8. Horizon termine et relance
9. `php artisan storage:link`
10. Permissions 755 sur storage et bootstrap/cache
11. Mode maintenance desactive (`php artisan up`)

## 5. Post-deploiement

```bash
php artisan app:check
# ou
make check
```

Verifications manuelles :
- Page d'accueil accessible (HTTPS)
- Connexion admin fonctionnelle
- Webhook Stripe testable via dashboard Stripe
- Emails de test envoyables

## 6. Cron et workers

### Planificateur (toutes les minutes)
Dans cPanel > Cron Jobs :
```bash
* * * * * /usr/local/bin/php /home/user/public_html/artisan schedule:run >> /dev/null 2>&1
```

### Laravel Horizon (queues Redis)
```bash
php artisan horizon
```
Idealement via Supervisor. Sinon, ajouter un cron de surveillance :
```bash
*/5 * * * * /usr/local/bin/php /home/user/public_html/artisan horizon:status | grep -q "running" || /usr/local/bin/php /home/user/public_html/artisan horizon >> /dev/null 2>&1
```

### Laravel Reverb (WebSockets)
```bash
php artisan reverb:start --host=0.0.0.0 --port=8080
```
S'assurer que le port 8080 est ouvert dans le pare-feu cPanel (CSF).

## 7. SSL et DNS

- **SSL** : certificat Let's Encrypt via cPanel (AutoSSL)
- **Force HTTPS** : `FORCE_HTTPS=true` dans .env
- **DNS** : enregistrement A vers l'IP du serveur
- **Cloudflare** : si utilise, desactiver le proxy pour Reverb ou configurer un tunnel

## 8. Monitoring

| Outil | URL | Description |
|-------|-----|-------------|
| Pulse | `/pulse` | Monitoring temps reel (protege par Gate) |
| Horizon | `/horizon` | Dashboard queues Redis |
| ErrorMonitoring | `/admin/error-monitoring` | Erreurs 404/403/429/500 avec fingerprinting |
| Logs | `storage/logs/laravel.log` | Logs applicatifs |
| Health | `php artisan app:check` | Verification sante complete |

## 9. Rollback

En cas d'echec critique :

1. **Code** : `git revert HEAD` ou `git checkout <commit_precedent>`
2. **Cache** : `php artisan optimize:clear`
3. **Database** : `php artisan migrate:rollback --step=1` (si migration problematique)
4. **Workers** : `php artisan horizon:terminate`
5. **Verification** : `php artisan app:check`

Ne JAMAIS utiliser `migrate:fresh` en production.

## 10. Checklist pre-production

- [ ] `APP_DEBUG=false`
- [ ] `APP_ENV=production`
- [ ] `FORCE_HTTPS=true`
- [ ] `CSP_ENABLED=true`
- [ ] `TELESCOPE_ENABLED=false`
- [ ] `SESSION_SECURE_COOKIE=true`
- [ ] `php artisan key:generate` execute
- [ ] Webhooks Stripe configures vers `https://domaine.com/stripe/webhook`
- [ ] `php artisan storage:link` execute
- [ ] Permissions 755 sur `storage/` et `bootstrap/cache/`
- [ ] Feature flags (Pennant) configures pour le client
- [ ] Index Scout synchronises : `php artisan scout:import`
- [ ] Cron `schedule:run` configure
- [ ] Horizon en cours d'execution
- [ ] `make quality` passe sans erreur
- [ ] `php artisan app:check` retourne OK sur tous les points
- [ ] Backup initial effectue
- [ ] DNS et SSL configures et verifies
