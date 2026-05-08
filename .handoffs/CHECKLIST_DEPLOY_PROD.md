# Checklist exhaustive — Déploiement production kalystrat.ca

**Document de référence à exécuter le jour J du déploiement.**
**Statut au 2026-05-08** : prod bloquée, en attente inputs Ali (D3 DNS, D5 cPanel, E1 Sentry, E2 GA4, F1 GitHub).

> ⚠️ **Règle cardinale** : ne jamais cocher une étape sans validation explicite. En cas de doute, rollback immédiat via `bash .deploy/deploy.sh --rollback`.

## Pré-flight LOCAL (à valider AVANT toute action distante)

- [ ] **Repo local** : `git status` = clean, branche `master`, HEAD à jour
- [ ] **Pest smoke Frontend** : `php artisan test tests/Feature/PublicPagesSmokeTest.php` = **27/27 PASS**
- [ ] **Pest smoke Admin** : `php artisan test tests/Feature/AdminPagesSmokeTest.php` = **4/4 PASS**
- [ ] **Audit popups natives** : `grep -rE 'confirm\(|alert\(|prompt\(' Modules/ | grep -v 'console\.'` = 0 résultat
- [ ] **Audit visuel S30** : SYNTHESIS confirmée, 0 régression S29 (cf `.handoffs/audit_visuel_S30/SYNTHESIS.md`)
- [ ] **Lighthouse mobile** : Perf ≥ 87, A11y/BP/SEO = 100 (cf `.handoffs/lh_S30/SYNTHESIS.md`)
- [ ] **`.env.production.kalystrat.example`** complet et à jour (cf `.deploy/.env.production.kalystrat.example`)
- [ ] **Modules désactivés** confirmés : AI, Booking, Translation = `false` dans `modules_statuses.json`
- [ ] **Backup placeholder corrigé** : `config/backup.php:237` → `env('BACKUP_NOTIFICATION_MAIL', ...)` (T1-S30 ✅ commit `ce3b04c`)
- [ ] **Crons backup commentés** : `routes/console.php:15-16` (S29 ✅) — réactiver à étape 9

## Étape 1 — DNS Cloudflare (D3) — bloqué Ali

**Pré-requis** : accès Cloudflare (compte Ali ou nouveau), coordonnées DNS actuelles kalystrat.ca.

- [ ] Récupérer NS actuels : `dig NS kalystrat.ca +short`
- [ ] `mcp__cloudflare__cf_create_zone` : créer zone `kalystrat.ca`
- [ ] Noter les 2 NS Cloudflare assignés (ex: `kate.ns.cloudflare.com`, `paul.ns.cloudflare.com`)
- [ ] Chez registrar actuel : changer NS pointant vers Cloudflare
- [ ] Attendre propagation (24-48h max, vérifier via `dig NS kalystrat.ca`)
- [ ] **Records DNS minimaux à créer** :
  - [ ] A `kalystrat.ca` → IP cPanel (récupérée via `mcp__cpanel__cpanel_list_domains`)
  - [ ] A `www.kalystrat.ca` → IP cPanel (idem)
  - [ ] MX `kalystrat.ca` → serveur mail cPanel (priority 0)
  - [ ] TXT `@` → SPF `v=spf1 +a +mx ~all`
- [ ] Activer **SSL Full strict** dans Cloudflare (vérifier cert cPanel valide)
- [ ] Test : `curl -I https://kalystrat.ca/` → 200 OK + headers Cloudflare (`cf-ray`, `cf-cache-status`)

## Étape 2 — Repo GitHub (F1) — bloqué Ali

**Pré-requis** : repo GitHub créé (privé recommandé), token ou SSH key configurés.

- [ ] `git remote add origin git@github.com:USER/kalystrat.git` (URL fournie par Ali)
- [ ] `git push -u origin master` (master local, **pas main** — convention projet)
- [ ] Configurer protection branche master : require PR review (interface GitHub)
- [ ] Activer secrets GitHub Actions (si CI prévu) : `CPANEL_USER`, `CPANEL_TOKEN`, etc.
- [ ] Optionnel : copier `.deploy/github-actions-ci.yml.example` → `.github/workflows/ci.yml`

## Étape 3 — Préparer .env production cPanel

**Pré-requis** : `.deploy/.env.production.kalystrat.example` à jour, valeurs Ali récupérées.

- [ ] Copier template : `cp .deploy/.env.production.kalystrat.example /tmp/.env.prod`
- [ ] Remplir manuellement :
  - [ ] `APP_KEY=` → `php artisan key:generate --show`
  - [ ] `APP_URL=https://kalystrat.ca`
  - [ ] `APP_ENV=production`
  - [ ] `APP_DEBUG=false`
  - [ ] `DB_PASSWORD=` (cPanel MySQL, créé via `mcp__cpanel__cpanel_terminal`)
  - [ ] `MAIL_USERNAME=admin@kalystrat.ca` (cf cPanel email accounts)
  - [ ] `MAIL_PASSWORD=` (récupéré ou réinitialisé via cPanel)
  - [ ] `MAIL_FROM_ADDRESS=noreply@kalystrat.ca` (déjà valeur défaut local)
  - [ ] `BACKUP_NOTIFICATION_MAIL=admin@kalystrat.ca` (T3-prod-reactivation)
  - [ ] `ADMIN_EMAIL=` (Ali ou Stéphane)
  - [ ] `ADMIN_PASSWORD=` (généré aléatoire 32 chars, à stocker dans Bitwarden Ali)
  - [ ] `SENTRY_LARAVEL_DSN=` (E1, post-création compte Sentry)
  - [ ] `GA4_MEASUREMENT_ID=G-XXXXXXXXXX` (E2, post-création propriété GA4)
  - [ ] `LOG_CHANNEL=stack` + `LOG_LEVEL=warning` (production)

## Étape 4 — Premier déploiement cPanel (D5) — bloqué Ali

**Pré-requis** : étapes 1 (DNS propagé), 2 (repo GitHub), 3 (.env prêt) complètes.

- [ ] **Connexion cPanel** : `mcp__cpanel__cpanel_terminal` ou SSH direct
- [ ] Vérifier user cPanel + path home : `whoami && pwd`
- [ ] Cloner repo : `cd $HOME && git clone git@github.com:USER/kalystrat.git kalystrat`
- [ ] Uploader .env via `mcp__cpanel__cpanel_file_write` : `~/kalystrat/.env` (depuis /tmp/.env.prod)
- [ ] **Vérifier permissions** : `chmod 600 ~/kalystrat/.env`
- [ ] Configurer document root cPanel : `~/kalystrat/public/` (interface cPanel "Domains" ou "Subdomains")
- [ ] Lancer first-deploy : `bash ~/kalystrat/.deploy/deploy.sh --first-deploy`
- [ ] **Surveiller logs** : `tail -f ~/kalystrat/.deploy/deploy.log`
- [ ] **En cas d'échec** : rollback automatique via snapshot (cf `.deploy/README.md`)
- [ ] Vérifier post-deploy : `php ~/kalystrat/artisan --version` (doit retourner Laravel 12.x)

## Étape 5 — Migrations + cache prod

- [ ] `cd ~/kalystrat && php artisan migrate --force` (run uniquement si first-deploy n'a pas fait)
- [ ] `php artisan config:cache`
- [ ] `php artisan route:cache`
- [ ] `php artisan view:cache`
- [ ] `php artisan event:cache`
- [ ] `php artisan storage:link`
- [ ] Vérifier `~/kalystrat/storage/` permissions : `chmod -R 775 storage bootstrap/cache && chown -R USER:USER storage bootstrap/cache`

## Étape 6 — Test SMTP

- [ ] `php artisan tinker --execute "Mail::raw('Test deploy SMTP S30', fn(\$m) => \$m->to('admin@kalystrat.ca')->subject('Test SMTP'));"`
- [ ] Vérifier réception (boîte Ali ou Stéphane)
- [ ] Si échec : check `~/kalystrat/storage/logs/laravel.log`

## Étape 7 — DMARC + DKIM (F2)

**Pré-requis** : DNS Cloudflare actif (étape 1) + email cPanel fonctionnel.

- [ ] DKIM via cPanel : "Email Deliverability" → générer clé pour `kalystrat.ca`
- [ ] Copier le record TXT DKIM proposé
- [ ] `mcp__cloudflare__cf_create_dns_record` : ajouter le record TXT (nom `default._domainkey.kalystrat.ca`)
- [ ] DMARC : `mcp__cloudflare__cf_create_dns_record` TXT `_dmarc.kalystrat.ca` :
  ```
  v=DMARC1; p=quarantine; rua=mailto:postmaster@kalystrat.ca; pct=100; aspf=r; adkim=r
  ```
- [ ] Test via [mail-tester.com](https://www.mail-tester.com) — score cible **10/10**
- [ ] Test SPF/DMARC via [mxtoolbox.com](https://mxtoolbox.com)

## Étape 8 — Smoke test prod (D6) — bloqué D5

**13 routes publiques à valider HTTP 200** :

- [ ] `curl -sI https://kalystrat.ca/` → 200 + HSTS + cf-cache-status
- [ ] `curl -sI https://kalystrat.ca/a-propos` → 200
- [ ] `curl -sI https://kalystrat.ca/services` → 200
- [ ] `curl -sI https://kalystrat.ca/realisations` → 200
- [ ] `curl -sI https://kalystrat.ca/contact` → 200
- [ ] `curl -sI https://kalystrat.ca/faq` → 200
- [ ] `curl -sI https://kalystrat.ca/carrieres` → 200
- [ ] `curl -sI https://kalystrat.ca/conseil-consultatif` → 200
- [ ] `curl -sI https://kalystrat.ca/partenaires` → 200
- [ ] `curl -sI https://kalystrat.ca/zones-desservies` → 200
- [ ] `curl -sI https://kalystrat.ca/credits` → 200
- [ ] `curl -sI https://kalystrat.ca/filiales/fondations` → 200
- [ ] `curl -sI https://kalystrat.ca/sitemap.xml` → 200
- [ ] `curl -sI https://kalystrat.ca/robots.txt` → 200

**Tests visuels** :

- [ ] Re-run `.scripts/audit-screenshots.mjs` en pointant `BASE_URL=https://kalystrat.ca`
- [ ] Comparer 36 screenshots prod vs `audit_visuel_S30/` local : aucune divergence majeure
- [ ] Test formulaire contact : envoi via Playwright + vérifier réception courriel destinataire
- [ ] **Login admin** : `https://kalystrat.ca/admin/login` avec `ADMIN_EMAIL` + `ADMIN_PASSWORD`

**Tests Lighthouse prod** :

- [ ] `lighthouse https://kalystrat.ca/ --form-factor=mobile --quiet` → Perf ≥ 85, A11y/BP/SEO = 100
- [ ] `lighthouse https://kalystrat.ca/contact --form-factor=desktop` → 100/100/100/100

## Étape 9 — T3-prod-reactivation crons backup

**Pré-requis** : étapes 1-8 OK, SMTP testé (étape 6 PASS).

- [ ] Vérifier `.env` prod contient `BACKUP_NOTIFICATION_MAIL=admin@kalystrat.ca`
- [ ] Vérifier `MAIL_USERNAME` + `MAIL_PASSWORD` configurés et SMTP fonctionnel
- [ ] Editer `~/kalystrat/routes/console.php` : décommenter lignes 15-16 :
  ```php
  Schedule::command('backup:run')->dailyAt('03:00')->withoutOverlapping()->onOneServer();
  Schedule::command('backup:clean')->dailyAt('04:00')->withoutOverlapping()->onOneServer();
  ```
- [ ] `php artisan schedule:list | grep backup` → 2 entrées
- [ ] Test manuel : `php artisan backup:run --only-db` → fichier .zip créé dans storage + mail reçu
- [ ] **Si bounce mail** : re-commenter immédiatement les 2 lignes et investiguer
- [ ] Configurer cron cPanel : `* * * * * cd ~/kalystrat && php artisan schedule:run >> /dev/null 2>&1` (via `mcp__cpanel__cpanel_cron_add`)
- [ ] Attendre 24h post-deploy puis vérifier dans `~/kalystrat/storage/logs/` que le backup a tourné

## Étape 10 — Sentry + GA4

**Sentry (E1)** :

- [ ] Vérifier `composer show sentry/sentry-laravel` → installé
- [ ] `php artisan sentry:test` → event reçu dans dashboard Sentry
- [ ] Configurer dans `.env` : `SENTRY_TRACES_SAMPLE_RATE=0.1` (10% prod)
- [ ] Tester déclenchement erreur 500 contrôlée + vérifier remontée Sentry

**GA4 (E2)** :

- [ ] Vérifier intégration `gtag.js` dans `layout.blade.php` (conditionnel sur `env('GA4_MEASUREMENT_ID')`)
- [ ] Visiter https://kalystrat.ca/ depuis browser
- [ ] `mcp__ga4__ga4_realtime` → vérifier 1 active user
- [ ] Configurer events conversions GA4 : form_submit, click_phone, click_email, click_filiale

## Étape 11 — Audit sécurité prod (F3)

**Pré-requis** : étapes 1-10 OK.

- [ ] `mcp__security__sec_full_audit https://kalystrat.ca` → score global ≥ 90
- [ ] `mcp__security__sec_headers https://kalystrat.ca` → grade **A+** (CSP, HSTS preload, X-Frame-Options DENY, X-Content-Type-Options nosniff, Referrer-Policy, Permissions-Policy)
- [ ] `mcp__security__sec_ssl https://kalystrat.ca` → grade **A+** (TLS 1.3, OCSP stapling, HSTS)
- [ ] `mcp__security__sec_subdomains kalystrat.ca` → 0 takeover possible
- [ ] `mcp__security__sec_dns kalystrat.ca` → SPF/DMARC/DKIM tous présents et valides
- [ ] `mcp__security__sec_cve_search` Laravel 12 + composer.lock → 0 CVE critique
- [ ] Soumettre sitemap GSC : `mcp__gsc__gsc_submit_sitemap https://kalystrat.ca/sitemap.xml`
- [ ] Inspecter URL principale : `mcp__gsc__gsc_inspect_url https://kalystrat.ca/`
- [ ] Produire rapport : `.handoffs/audit_securite_prod_S{N}.md`

## Étape 12 — Communication & finalisation

- [ ] Rédiger courriel à Ali (via skill `/courriel-client` ou `mcp__gmail__gmail_create_draft`) annonçant mise en ligne
- [ ] Inclure : URL, login admin (mot de passe transmis séparé Bitwarden), liens GA4 + Sentry, sitemap GSC
- [ ] Mettre à jour MEMORY.md du projet : état post-déploiement, marquer D3+D5+D6+E1+E2+F1+F2+F3 = completed
- [ ] Créer handoff S{N+1} de clôture déploiement
- [ ] Bilan hebdo via skill `/bilan-hebdo-fr`

## Rollback en cas d'incident critique

```bash
# Via le script S26
bash ~/kalystrat/.deploy/deploy.sh --rollback

# Manuel (si script KO)
cd ~/kalystrat
LAST_SNAPSHOT=$(ls -t ~/backups/snapshot_*.tar.gz | head -1)
tar -xzf "$LAST_SNAPSHOT" -C ~/kalystrat
git reset --hard HEAD~1
php artisan config:cache && php artisan route:cache && php artisan view:cache
```

## Tâches dépendantes (TaskList)

| ID | Action | Dépend de |
|---|---|---|
| #7 | D3 DNS Cloudflare | inputs Ali |
| #12 | F1 GitHub repo | inputs Ali |
| #8 | D5 first-deploy | #7, #12 |
| #9 | D6 smoke prod | #8 |
| #13 | F2 DMARC/DKIM | #7 |
| #14 | F3 audit sécurité | #8, #9 |
| #18 | T3 crons backup | #1 (✅), #8 |
| #10 | E1 Sentry | inputs Ali |
| #11 | E2 GA4 | inputs Ali |

## Références

- `.deploy/deploy.sh` — script S26 idempotent + rollback automatique
- `.deploy/README.md` — documentation deploy.sh
- `.deploy/.env.production.kalystrat.example` — template .env prod
- `.deploy/github-actions-ci.yml.example` — CI/CD GitHub Actions optionnel
- `.handoffs/2026-05-04_session-handoff-s26-securite-deploy.md` — handoff sécurité S26
- `.handoffs/audit_visuel_S30/SYNTHESIS.md` — audit visuel cross-pages
- `.handoffs/lh_S30/SYNTHESIS.md` — audit Lighthouse
- `.notes_diverses/audit_orange_construz.md` — analyse migration G5
- `.notes_diverses/pest_fails_analysis_S30.md` — diagnostic Pest backend
