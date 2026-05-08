# Audit security headers local — S30

**Date** : 2026-05-08 (S30)
**Branche** : master, HEAD post-T34
**Méthode** : `mcp__security__sec_headers` (KO local self-signed) + `curl -skI` + audit middleware

## TL;DR

État local après T34 :
- ✅ X-Content-Type-Options : `nosniff`
- ✅ X-Frame-Options : `SAMEORIGIN`
- ✅ **X-XSS-Protection : `0`** (T34 fix — déprécié, value `1; mode=block` retirée)
- ✅ Referrer-Policy : `strict-origin-when-cross-origin`
- ✅ Permissions-Policy : `camera=(), microphone=(), geolocation=()`
- ⏸️ Strict-Transport-Security : conditionnel `production` only (sera activé en prod)
- ⏸️ Content-Security-Policy : middleware existe mais pas appliqué (dette S31)

## Fix T34 appliqué

### X-XSS-Protection déprécié

**Avant** :
```php
$response->headers->set('X-XSS-Protection', '1; mode=block');
```

**Après** :
```php
// T34-S30 : X-XSS-Protection déprécié 2020+ (Chrome 78+, Firefox 66+ ne le respectent plus).
// OWASP recommande 0 ou suppression — la protection moderne se fait via CSP.
$response->headers->set('X-XSS-Protection', '0');
```

**Pourquoi** :
- L'header `X-XSS-Protection` est obsolète depuis 2020. Chromium-based (Chrome, Edge, Opera) et Firefox 66+ ne l'implémentent plus.
- Sur certains navigateurs anciens, la valeur `1; mode=block` peut introduire des vulnérabilités XS-Leak (cross-site leaks).
- OWASP Secure Headers Project recommande explicitement `0` ou la suppression : https://owasp.org/www-project-secure-headers/#x-xss-protection
- La protection moderne se fait via Content-Security-Policy (CSP).

**Validation** : `curl -skI https://kalystrat.test/` retourne maintenant `x-xss-protection: 0`. Pest smoke 31/31 PASS.

## Dette technique S31 — activer CSP global

`Modules/Core/Http/Middleware/ContentSecurityPolicy.php` est un middleware bien fait avec :
- `default-src 'self'`
- `script-src 'self' 'nonce-{$nonce}'` (nonce dynamique random_bytes)
- `style-src 'self' 'unsafe-inline'` (compat Construz inline styles)
- `img-src 'self' data: https:`
- `font-src 'self' https://fonts.gstatic.com https://cdn.jsdelivr.net`
- `connect-src 'self' wss: ws:`
- `frame-src 'self' https://lookerstudio.google.com`
- `frame-ancestors 'self'`, `base-uri 'self'`, `form-action 'self'`
- Mode adaptatif : `Report-Only` en dev, enforced en prod.

Mais il est enregistré comme **alias** `'csp'` dans `bootstrap/app.php:61` et **n'est appliqué nulle part** (les routes Frontend ne le déclarent pas).

### Action S31 (post audit visuel rigoureux)

1. Activer en mode `Report-Only` global d'abord :
   ```php
   // bootstrap/app.php (T34+S31)
   $middleware->append(SecurityHeaders::class);
   $middleware->append(ContentSecurityPolicy::class); // <-- ajouter
   ```
2. Tester en local 1 semaine — observer les rapports CSP-Report-Only dans la console DevTools.
3. Identifier les inline scripts/styles bloqués (dans le markup Construz). Soit injecter le nonce, soit relâcher le CSP avec `'unsafe-inline'` pour script-src (déconseillé).
4. Itérer jusqu'à 0 violation report-only.
5. Passer en `Content-Security-Policy` enforced en prod.

**Risque** : moyen. Sans test, peut bloquer 5 sliders Construz qui utilisent du JS inline ou eval.

## Anticipation prod — grade A+ Mozilla Observatory

En prod (cPanel Apache + .htaccess), HSTS sera ajouté automatiquement par le middleware `SecurityHeaders.php:36-38` (condition `app()->environment('production')`).

| Header | Local | Prod attendu | Grade A+ requis |
|---|---|---|---|
| Strict-Transport-Security | absent | `max-age=31536000; includeSubDomains; preload` | ✅ |
| X-Content-Type-Options | nosniff | nosniff | ✅ |
| X-Frame-Options | SAMEORIGIN | SAMEORIGIN | ✅ |
| X-XSS-Protection | 0 | 0 | ✅ |
| Referrer-Policy | strict-origin-when-cross-origin | strict-origin-when-cross-origin | ✅ |
| Permissions-Policy | camera/mic/geo = () | camera/mic/geo = () | ✅ |
| Content-Security-Policy | absent (S31) | absent (S31+) | ⚠️ baisse note B+ → A+ post-S31 |

**Score Mozilla Observatory anticipé** : B+ → A après prod (ajout HSTS), A+ post-S31 (activation CSP).

## Statut tâche #34

**Audit security headers S30 = COMPLÉTÉ** ✅. Fix X-XSS-Protection appliqué. CSP middleware documenté pour activation S31.

## Références

- `Modules/Core/app/Http/Middleware/SecurityHeaders.php` — middleware global
- `Modules/Core/app/Http/Middleware/ContentSecurityPolicy.php` — middleware CSP non appliqué
- `bootstrap/app.php:58-62` — middleware registration
- `.handoffs/CHECKLIST_DEPLOY_PROD.md` étape 11 — F3 audit sécu prod
- OWASP Secure Headers : https://owasp.org/www-project-secure-headers/
- Mozilla Observatory : https://observatory.mozilla.org/
