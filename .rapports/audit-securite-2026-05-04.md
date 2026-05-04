# Audit sécurité Kalystrat — 2026-05-04 (S26)

## Synthèse exécutive

| Domaine | État | Sévérité résiduelle |
|---|---|---|
| **Dépendances Composer (CVE)** | ✅ 2 CVE patchées | Aucune |
| **Auth superadmin** | ✅ ADMIN_PASSWORD obligatoire en prod | Aucune |
| **Dashboards observabilité** | ✅ /pulse + /telescope protégés (Gate super_admin) | Aucune |
| **DNS kalystrat.ca** | ⚠️ Pointe encore SiteGround | Moyenne (migration prévue) |
| **Email security** | ⚠️ DMARC `p=none`, DKIM absent | Moyenne (post-migration) |
| **HTTPS / SSL** | ⏳ À auditer post-déploiement | À valider |
| **Headers sécurité** | ⏳ À auditer post-déploiement | À valider |

## Détails

### 1. CVE Composer (✅ corrigé commit 4104640)

`composer audit` → 0 vulnerability après update :
- `phpseclib/phpseclib` : LOW, CVE-2026-40194 (variable-time HMAC)
- `webonyx/graphql-php` : MEDIUM, CVE-2026-40476 (DoS quadratic complexity)

Laravel 12.56.0 inclut déjà le patch de CVE-2025-27515 (CRITICAL, validation wildcard bypass).

### 2. Auth superadmin (✅ corrigé commit de69231)

Avant : `config('app.admin_password', 'Admin123!')` + `config/app.php:138 'Admin123!'`
Après :
- `config/app.php` : `env('ADMIN_PASSWORD')` sans fallback
- `DatabaseSeeder` : `RuntimeException` en prod si vide ; fallback `Admin123!` en dev seulement
- `DatabaseSeeder` : skip `moderator@laravel-core.test` en prod (compte dev)
- `.env.example` : `ADMIN_PASSWORD=` vide + commentaire `openssl rand -base64 24`

### 3. Dashboards observabilité (✅ corrigé commit 7c0c7da)

Avant : aucune Gate `viewPulse` ni `viewTelescope` → potentiellement exposés.
Après : `Gate::define('viewPulse', super_admin)` + idem Telescope dans `AppServiceProvider::configureObservabilityGates()`.
Validé : `curl /pulse` → HTTP 403.

### 4. DNS kalystrat.ca (⚠️ migration à prévoir)

```
A     35.212.71.51        (SiteGround)
NS    ns1.siteground.net  ns2.siteground.net
MX    mx10/20/30.antispam.mailspamprotection.com  (SiteGround)
TXT   v=spf1 +a +mx include:kalystrat.ca.spf.auto.dnssmarthost.net ~all
```

Action déploiement (#16 D3) :
- A : changer pour IP cPanel Memora (server.memora.pro)
- NS : décision user — rester chez SiteGround comme registrar+DNS, ou passer chez Cloudflare
- MX : décider (rester SiteGround antispam, ou Gmail Workspace)

### 5. Email security (⚠️ post-migration)

| Record | Actuel | Recommandé |
|---|---|---|
| SPF | `+a +mx include:dnssmarthost.net ~all` | OK (à ajuster selon nouvel SMTP) |
| DMARC | `p=none; aspf=r; adkim=r;` | Évoluer `p=quarantine` après 2 semaines monitoring, puis `p=reject` |
| DKIM | absent (sélecteur `google` testé null) | Activer DKIM via Gmail Workspace ou SMTP nouveau |

Risque actuel : domaine spoofable pour phishing (DMARC permissif, pas de DKIM).

### 6. À auditer post-déploiement (#10 reste)

```bash
# Une fois kalystrat.ca actif sur prod cPanel + Cloudflare :
mcp__security__sec_full_audit kalystrat.ca
mcp__security__sec_ssl kalystrat.ca         # vérifier grade A+ (TLS 1.3, HSTS)
mcp__security__sec_headers kalystrat.ca     # CSP, X-Frame-Options, X-Content-Type-Options, Referrer-Policy
mcp__security__sec_subdomains kalystrat.ca  # exposition surface
```

Headers attendus en prod (config Memora `SecurityHeadersMiddleware`) :
- `Content-Security-Policy` : strict (nonce, no inline)
- `Strict-Transport-Security: max-age=31536000; includeSubDomains; preload`
- `X-Frame-Options: SAMEORIGIN`
- `X-Content-Type-Options: nosniff`
- `Referrer-Policy: strict-origin-when-cross-origin`
- `Permissions-Policy` : restrictif (camera, mic, geolocation off)

## Actions complétées en session

| Tâche | Commit |
|---|---|
| ADMIN_PASSWORD sans fallback | de69231 |
| Gates Pulse + Telescope | 7c0c7da |
| CVE Composer patchées | 4104640 |
| Route Kalystrat orpheline nettoyée | 4104640 |

## Actions bloquées (inputs externes requis)

- #16 D3 Cloudflare : token API user
- #18 D5 Déploiement cPanel : IP + credentials user
- #19 D6 Smoke test : prod active
- #21 E2 GA4 + GSC : Measurement ID + GSC verification user

## Note migration DNS

Si le user choisit Cloudflare :
1. Ajouter zone Cloudflare kalystrat.ca
2. Récupérer NS Cloudflare (2 nameservers)
3. Changer NS chez le registrar SiteGround → Cloudflare
4. Une fois propagé (24-48h) : configurer A/CNAME/MX dans Cloudflare
5. SSL Full (Strict), HSTS preload, Page Rules cache static, Transform Rule CSP

Si conservation SiteGround DNS :
1. Changer A record vers IP cPanel Memora
2. Ajouter SPF/DKIM/DMARC stricts
3. Pas de protection Cloudflare (DDoS, cache)

---
*Audit S26 — généré 2026-05-04 par Claude Opus 4.7 superviseur.*
