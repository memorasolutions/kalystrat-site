# Analyse 582 fails Pest backend — diagnostic + plan remédiation

**Date** : 2026-05-08 (S30)
**Branche** : master, HEAD `d3b4cad`
**Run** : `php artisan test` complet, **582 failed / 1104 passed / 1686 total** (Duration 825s)

## TL;DR

Les fails Pest backend ne sont **pas une régression S29**. Ils existaient avant et sont causés par 2 problèmes structurels indépendants :

1. **Tests des modules désactivés** (AI, Booking, Translation) — ~310 tests qui tournent alors que les modules sont OFF dans `modules_statuses.json`.
2. **RolesAndPermissionsSeeder non systématique** dans les tests admin — ~270 tests admin retournent 403 Forbidden au lieu de 200.

Tests Frontend smoke (objectif principal projet) : **27/27 PASS** ✅
Tests AdminPagesSmokeTest (structure admin Tabler) : **4/4 PASS** ✅

## Données du run

```
Tests:    582 failed, 1104 passed (2440 assertions)
Duration: 825.19s (13 min 45 s)
```

### Répartition des fails par module

| Module | Activé ? | Groupes FAIL | Tests fails ~ | Cause |
|---|---|---|---|---|
| **Booking** | ❌ false | 27 | ~216 | Module désactivé (1) |
| **AI** | ❌ false | 12 | ~96 | Module désactivé (1) |
| **Translation** | ❌ false | 1 | ~5 | Module désactivé (1) |
| Backoffice | ✅ true | 5 | ~80 | 403 admin (2) |
| Newsletter | ✅ true | 4 | ~24 | 403 admin (2) |
| Privacy | ✅ true | 3 | ~18 | 403 admin (2) |
| Blog | ✅ true | 3 | ~18 | 403 admin (2) |
| Notifications | ✅ true | 2 | ~12 | 403 admin (2) |
| Auth | ✅ true | 2 | ~12 | 403 admin (2) |
| Core | ✅ true | 2 | ~12 | seed missing (2) |
| Ecommerce | ✅ true | 5 | ~40 | seed missing (2) |
| Widget, Pages, Menu, etc. | ✅ true | 1 chacun | ~25 | 403 admin (2) |
| **TOTAL** | | ~70 groupes | ~582 | |

## Cause racine #1 — Modules désactivés font tourner leurs tests

### Symptôme
- AI, Booking, Translation = `false` dans `modules_statuses.json`
- Pourtant Pest découvre et exécute leurs tests qui échouent (le code module n'est pas chargé en mémoire, services providers absents, routes absentes).

### Configuration actuelle
```php
// tests/Pest.php
uses(TestCase::class)->in('Feature', 'Unit')->in('../Modules/Frontend/tests/Feature');
uses(RefreshDatabase::class)->in('../Modules/Frontend/tests/Feature');
```

Pest n'a pas de configuration excluant les modules désactivés. Tous les `Modules/*/tests/Feature/*Test.php` sont auto-découverts par PHPUnit.

### Remédiation proposée

**Option 1A** — Skip global via Pest beforeAll dans chaque test de module désactivé :
```php
// Modules/Booking/tests/Feature/BookingTest.php — exemple
beforeAll(function () {
    if (! \Nwidart\Modules\Facades\Module::isEnabled('Booking')) {
        test()->markTestSkipped('Module Booking désactivé');
    }
});
```
Avantage : déclaratif, propre.
Coût : 40+ fichiers à éditer (1 par test class).

**Option 1B** — Helper global dans Pest.php :
```php
// tests/Pest.php
function skipIfModuleDisabled(string $module): void {
    if (! \Nwidart\Modules\Facades\Module::isEnabled($module)) {
        test()->markTestSkipped("Module {$module} désactivé");
    }
});
```
Puis dans chaque test : `skipIfModuleDisabled('Booking');`
Coût : 40+ fichiers, mais 1 ligne par fichier.

**Option 1C** — Configuration phpunit.xml exclusions :
```xml
<exclude>./Modules/AI</exclude>
<exclude>./Modules/Booking</exclude>
<exclude>./Modules/Translation</exclude>
```
Avantage : 0 modif code test. Les tests ne tournent plus du tout pour ces modules.
Inconvénient : configuration statique, ne se synchronise pas avec `modules_statuses.json`.

**Recommandation** : Option 1C pour gain immédiat, transition vers 1B quand modules désactivés deviendront fluctuants.

### Impact attendu Option 1C

~310 fails éliminés (Booking + AI + Translation = 217 + 96 + 5).

## Cause racine #2 — Tests admin sans rôle admin (403 Forbidden)

### Symptôme
Pattern dominant pour tests modules activés :
```
FAILED  Modules\Backoffice\tests\Feature\AdminCrudControllersTest > UserController → it admin can view users index
Expected response status code [200] but received 403.
```

### Configuration actuelle
```php
// Modules/Backoffice/tests/Feature/LivewireTablesTest.php (BON pattern)
beforeEach(function () {
    $this->seed(RolesAndPermissionsSeeder::class);
    $this->admin = User::factory()->create();
    // ... assignement role admin si fait
});
```

Mais la majorité des tests admin font seulement :
```php
$this->actingAs($admin)->get('/admin/...')->assertOk();
```
Sans seed du `RolesAndPermissionsSeeder` ni assignement explicite du rôle admin → middleware `role:admin` retourne 403.

### Remédiation proposée

**Option 2A** — Setup global dans `tests/Pest.php` :
```php
uses(RefreshDatabase::class)->in('../Modules');

beforeEach(function () {
    if (in_array($this->getName(), ['admin'])) {
        $this->seed(\Modules\RolesPermissions\Database\Seeders\RolesAndPermissionsSeeder::class);
    }
})->in('../Modules');
```
Coût : 1 fichier à éditer (Pest.php), aucun test individuel touché.

**Option 2B** — Refactor User::factory()->create() pour assigner role admin par défaut sur les tests admin :
```php
// Helper dans Pest.php
function adminUser(): User {
    static $seeded = false;
    if (! $seeded) {
        $this->seed(RolesAndPermissionsSeeder::class);
        $seeded = true;
    }
    return User::factory()->create()->assignRole('admin');
}
```
Coût : 1 helper + remplacer `User::factory()->create()` par `adminUser()` dans ~50 fichiers tests.

**Recommandation** : Option 2A en priorité, 2B en cleanup ultérieur.

### Impact attendu Option 2A

~270 fails éliminés (modules admin actifs : Backoffice, Newsletter, Privacy, Blog, Auth, Notifications, Widget, Pages, Menu, Core, Ecommerce, etc.).

## Plan d'attaque proposé (par session)

### S31 — quick wins (effort 30-60 min)
1. Implémenter Option 1C (phpunit.xml exclude des 3 modules désactivés) → -310 fails
2. Re-run Pest → mesurer baseline réelle (devrait être ~272 fails / ~1104 passed → ~80% pass rate)
3. Commit `chore(tests): exclure modules désactivés du run Pest`

### S32 — root fix admin tests (effort 1-2h)
1. Implémenter Option 2A (Pest.php beforeEach seed RolesAndPermissionsSeeder global Modules)
2. Vérifier que `RolesAndPermissionsSeeder` est cohérent avec les routes admin actuelles (rôles `admin`, `editor`, `user`)
3. Re-run Pest → cible 0-50 fails restants
4. Commit `fix(tests): seed RolesAndPermissionsSeeder global pour tests modules`

### S33 — finalisation (effort variable)
1. Reste 0-50 fails à analyser cas par cas
2. Skip propre les tests obsolètes (`->skip('reason: deprecated route')`)
3. Cible finale : 100% pass ou 0 fails dans CI

## Décision pour cette session S30

**Aucune action backend dans S30**. Le scope projet Kalystrat est le **Frontend public** (Construz home-5 + 13 pages + WCAG AAA + SEO). Le diagnostic est suffisant pour S30 — l'implémentation des fix sera priorisée par Ali en fonction du calendrier.

Si Ali demande pendant S30 ou S31 de corriger les Pest, le plan ci-dessus est prêt à exécuter en ~3-4h cumulées.

## Références

- `tests/Pest.php` — config Pest actuelle
- `tests/TestCase.php` — TestCase minimal (peut être étendu)
- `modules_statuses.json` — état activation modules
- `Modules/Backoffice/tests/Feature/LivewireTablesTest.php:28` — bon pattern à généraliser
- `Modules/Widget/tests/Feature/WidgetTest.php:118` — exemple fail 403
- `tests/Feature/PublicPagesSmokeTest.php` — référence santé Frontend (27/27 PASS)
- `tests/Feature/AdminPagesSmokeTest.php` — admin layout structure (4/4 PASS)
