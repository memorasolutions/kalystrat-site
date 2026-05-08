# Audit dépendances composer + npm — S30

**Date** : 2026-05-08 (S30)
**Branche** : master, HEAD post-T32
**Outils** : `composer audit` + `npm audit`

## TL;DR

- **Composer** : 1 CVE CRITICAL résolue (dedoc/scramble). 0 advisory restant ✅
- **NPM** : 8 vulnérabilités HIGH/MODERATE en **dev dependencies uniquement** (vite, serialize-javascript). Pas d'impact runtime prod (assets compilés statiques). Plan correctif S31.

## Composer — RÉSOLU T32

### CVE-2026-44262 — dedoc/scramble RCE (CRITICAL)

**Symptôme** : Remote Code Execution via évaluation d'inputs user-controlled dans les validation rules.

**Versions affectées** : `>=0.13.2,<=0.13.21`

**Version installée avant** : `v0.13.17` ❌
**Version installée après** : `v0.13.22` ✅

**Action** : `composer update dedoc/scramble` (semver minor patch, compat préservée).

**Validation post-upgrade** :
- `composer audit` : `No security vulnerability advisories found.` ✅
- Pest smoke : 31/31 PASS ✅
- Site live : HTTP 200 ✅
- Aucune régression fonctionnelle.

## NPM — DOCUMENTÉ pour S31

### Vulnérabilités identifiées

| Package | Sévérité | CVE | Impact |
|---|---|---|---|
| `serialize-javascript ≤7.0.4` | HIGH | GHSA-5c6j-r48x-rmvq + GHSA-qj8w-gfj5-8c6v | RCE via RegExp.flags + DoS via array crafted |
| `@rollup/plugin-terser 0.2.0-0.4.4` | HIGH (transitif) | dépend serialize-javascript | indirect |
| `workbox-build 7.1.0-7.4.0` | HIGH (transitif) | dépend @rollup/plugin-terser | indirect |
| `vite 7.0.0-7.3.1` | HIGH | GHSA-4w7w-66w2-5vf9 + GHSA-v2wj-q39q-566r + GHSA-p9ff-h696-f583 | Path traversal `.map`, `server.fs.deny` bypass, WebSocket file read |

**Total** : 8 vulnérabilités (2 moderate, 6 high) toutes en `devDependencies`.

### Analyse impact prod

**RISQUE RÉEL EN PROD = NUL** :
- Vite est le bundler de dev/build. En prod, seuls les assets compilés (CSS/JS minifiés) sont servis. Aucun runtime Vite.
- workbox-build est utilisé pour générer le service-worker PWA au build, jamais exécuté côté serveur prod.
- serialize-javascript fait partie des outils de build, jamais en runtime.

**RISQUE EN DEV LOCAL** :
- Vite dev server expose path-traversal — risque limité car kalystrat.test = local Herd avec accès limité localhost. Mais à corriger avant déploiement CI distant.

### Plan correctif S31

**Option A — `npm audit fix` (préférable)** :
1. `npm audit fix` (semver-respectant)
2. Test build complet : `npm run build` + vérif assets générés sans erreur
3. Comparer empreinte assets pré/post fix (vite peut bumper version majeur si --force)
4. Pest smoke + audit visuel cross-pages
5. Si tout OK, commit `chore(deps): npm audit fix S31`

**Option B — `npm audit fix --force` (si A ne suffit pas)** :
- Risque cassure build (vite 7 → 8 = breaking changes potentiels)
- Tests obligatoires : build + audit visuel + Lighthouse comparatif

**Option C — Différer post-prod** :
- Si pressé pour déploiement, accepter risque limité (dev only) et fixer post-D5
- Documenter dans `.deploy/CHECKLIST_DEPLOY_PROD.md` étape 11 (audit sécu)

**Recommandation** : Option A avant la mise en ligne. Effort estimé 30 min.

## Statut tâche #32

**Audit dépendances S30 = COMPLÉTÉ** ✅. Vulnérabilité critical composer résolue. Vulnérabilités npm dev documentées pour S31.

## Références

- `composer.lock` : v0.13.17 → v0.13.22 (T32 commit)
- `package-lock.json` : inchangé (à fixer S31)
- `.handoffs/CHECKLIST_DEPLOY_PROD.md` étape 11 : audit sécurité prod F3
- CVE-2026-44262 : https://github.com/advisories/GHSA-4rm2-28vj-fj39
- vite advisories : https://github.com/advisories/GHSA-4w7w-66w2-5vf9 + GHSA-v2wj-q39q-566r + GHSA-p9ff-h696-f583
