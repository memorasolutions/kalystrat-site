# Déploiement Kalystrat — kalystrat.ca

Hébergement cible : cPanel MEMORA (server.memora.pro). SiteGround = courriels uniquement (jusqu'à mars 2027).

## 1. Pré-vol local

- [ ] `php artisan test` vert (Pest)
- [ ] `npm run build` ok, assets compilés dans `public/build/`
- [ ] Smoke test 13 pages (curl ou navigation Herd)
- [ ] `git status` propre, tout committé sur la branche de release
- [ ] Tag de version posé : `git tag -a v1.0.0 -m "Lancement Kalystrat"`

## 2. Préparation cPanel (one-shot)

- [ ] Créer le compte cPanel sous le domaine `kalystrat.ca` (ou subdomain de staging d'abord)
- [ ] Pointer DNS du domaine vers cPanel MEMORA (A record + propagation Cloudflare si applicable)
- [ ] Activer SSL Let's Encrypt (AutoSSL cPanel)
- [ ] MySQL : créer base + utilisateur + privilèges all
- [ ] Vérifier PHP 8.3+ activé pour le compte
- [ ] Activer Redis si dispo, sinon laisser `SESSION_DRIVER=database`, `CACHE_STORE=file`, `QUEUE_CONNECTION=database`
- [ ] Pointer le webroot du compte vers `/public_html/kalystrat/public` (pas vers la racine du repo)

## 3. Déploiement initial

```bash
# Sur le serveur, dans /home/USER/
git clone https://github.com/MEMORA/kalystrat.git kalystrat
cd kalystrat
composer install --no-dev --optimize-autoloader
cp .env.production .env
# Éditer .env : remplir DB_*, MAIL_PASSWORD, puis :
php artisan key:generate
php artisan storage:link
php artisan migrate --force
php artisan db:seed --force --class=ContentSeeder
php artisan optimize
php artisan view:cache
php artisan event:cache
chmod -R 755 storage bootstrap/cache
chown -R USER:nobody storage bootstrap/cache
```

## 4. Configuration crons (cPanel > Cron Jobs)

- [ ] Scheduler Laravel : `* * * * * cd /home/USER/kalystrat && php artisan schedule:run >> /dev/null 2>&1`
- [ ] Worker queue : `* * * * * cd /home/USER/kalystrat && php artisan queue:work --tries=3 --timeout=60 --stop-when-empty >> /dev/null 2>&1`

## 5. Vérifications post-deploy

- [ ] `https://kalystrat.ca` charge (HTTP 200, pas de 500)
- [ ] Toutes les 13 pages : `/`, `/a-propos`, `/service`, `/project`, `/contact`, `/faq`, `/carrieres`, `/filiales/{6 slugs}`
- [ ] Form `/contact` : POST réel avec données test, vérifier réception courriel `info@kalystrat.ca`
- [ ] Form `/carrieres` : POST réel, vérifier réception courriel `rh@kalystrat.ca`
- [ ] `/sitemap.xml` accessible
- [ ] `/robots.txt` accessible
- [ ] HTTPS forcé (redirect 301 depuis http://)
- [ ] Headers sécurité présents (HSTS, CSP, X-Frame-Options) — voir tâche #32

## 6. Rollback (si problème)

```bash
# En SSH sur le serveur
cd /home/USER/kalystrat
git log --oneline -5            # repérer le dernier commit stable
git checkout <SHA_PRECEDENT>
composer install --no-dev --optimize-autoloader
php artisan migrate:rollback --force --step=1
php artisan optimize
```

## 7. Smoke test automatisé (à lancer après chaque deploy)

```bash
for url in / /a-propos /service /project /contact /faq /carrieres \
           /filiales/fondations /filiales/structure /filiales/toiture \
           /filiales/finition /filiales/immobilier /filiales/placement; do
    code=$(curl -sko /dev/null -w "%{http_code}" "https://kalystrat.ca$url")
    echo "$code $url"
done
```

Sortie attendue : tous `200`. Tout `5xx` ou `404` = stop, investiguer logs.
