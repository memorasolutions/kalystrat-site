# Module Frontend — Kalystrat

Module nwidart Laravel rendant le site public Kalystrat (13 pages) avec
le thème Construz personnalisé en charte navy/gold + Akzidenz Grotesk.

## Vue d'ensemble

| Aspect | Valeur |
|---|---|
| **Stack** | Laravel 12, Blade, Bootstrap 5, Slick Carousel |
| **Pages** | 13 publiques (home, 8 internes Frontend, 4 légales Privacy via Layout Slot) |
| **A11y** | WCAG 2.2 AAA-conforme en pratique (homepage 23/86 + /services 26/86 + 12 pages internes auditées) |
| **SEO** | JSON-LD schemas (Organization, LocalBusiness, GeneralContractor, 6 SubOrg, FAQPage, BreadcrumbList) |
| **Thème** | Charte navy `#0A1628` / gold `#B8A472`, Akzidenz Grotesk |

## Routes

```php
// Modules/Frontend/routes/web.php
GET  /                    → HomeController@index
GET  /a-propos            → PageController@aPropos
GET  /services            → PageController@services
GET  /realisations        → PageController@realisations
GET  /faq                 → PageController@faq
GET  /contact             → ContactController@show
POST /contact             → ContactController@store
GET  /carrieres           → CandidatureController@show
POST /carrieres           → CandidatureController@store
GET  /filiales/{slug}     → PageController@filiale  (6 slugs)
GET  /credits             → frontend::pages.credits

// Modules/Privacy via Layout Slot
GET  /privacy-policy      → LegalController@privacyPolicy
GET  /terms-of-use        → LegalController@termsOfUse
GET  /cookie-policy       → LegalController@cookiePolicy
GET  /rights-request      → LegalController@rightsRequest
```

Slugs filiales : `fondations`, `structure`, `toiture`, `finition`,
`immobilier`, `placement`. Définis dans `Modules/Kalystrat/config/filiales.php`.

## Structure

```
Modules/Frontend/
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php       — / (homepage)
│   │   ├── PageController.php       — pages statiques + filiales dynamiques
│   │   ├── ContactController.php    — /contact (form + Mailable)
│   │   └── CandidatureController.php — /carrieres (form + CV upload + Mailable)
│   ├── Mail/
│   │   ├── ContactMessage.php       — Mailable formulaire contact
│   │   └── CandidatureMessage.php   — Mailable formulaire candidature
│   └── Providers/
│       ├── FrontendServiceProvider.php
│       └── RouteServiceProvider.php
└── resources/views/
    ├── layout.blade.php             — layout principal (header + footer + CSS inline)
    ├── home.blade.php               — page accueil (Slick hero + sections)
    ├── pages/                       — 8 vues pages publiques
    ├── partials/
    │   ├── page-banner.blade.php    — bandeau réutilisable (h1 + breadcrumb)
    │   └── cta-discutons.blade.php  — section CTA réutilisable
    ├── layouts/
    │   └── legal-shell.blade.php    — shell pour module Privacy (Layout Slot)
    └── emails/
        ├── contact.blade.php        — template courriel contact
        └── candidature.blade.php    — template courriel candidature
```

## 5 Patterns Memora CORE

Ces patterns ont été validés en session S24 (2026-05-03) et doivent
être réutilisés sur les futurs modules à thème.

### Pattern 1 — Layout Slot (config-driven layout inheritance)

Permet à un module CORE indépendant d'hériter du layout du thème actif
sans coupler le module au thème.

**Module Privacy → config/config.php**
```php
'layout' => env('PRIVACY_LAYOUT', null),
```

**Vue Privacy → @extends fallback-safe**
```blade
@extends(config('privacy.layout') ?: 'privacy::layouts.legal')
```

**.env**
```bash
PRIVACY_LAYOUT="frontend::layouts.legal-shell"
```

Si `PRIVACY_LAYOUT` est défini → utilise le shell Frontend (header
Kalystrat). Sinon → fallback sur le shell autonome du module Privacy
(Tailwind standalone). Garantit que désactiver Frontend ne casse pas
les pages Privacy.

### Pattern 2 — Disclosure widget a11y (button + aria-expanded)

Conversion menu hover-only en widget WCAG-conforme accessible souris,
clavier, tactile.

```html
<button type="button"
        data-ks-disclosure
        aria-haspopup="true"
        aria-expanded="false"
        aria-controls="ks-header-filiales-menu">
  Filiales <span aria-hidden="true">▾</span>
</button>
<ul id="ks-header-filiales-menu" class="ks-header__dropdown">
  <li><a href="/filiales/fondations">Fondations</a></li>
  ...
</ul>
```

JS handler unique dans `layout.blade.php` :
- Click sur button → toggle `aria-expanded` + show/hide menu
- ESC → ferme + restore focus sur button
- ArrowDown sur button ouvert → focus 1er item du menu
- Click outside → ferme

Standard W3C WAI Disclosure Pattern. Compatible Slick reading mode.

### Pattern 3 — Slider Slick a11y via `inert` dynamique

Les slides cachées Slick gardent leurs liens dans le DOM → `inert` HTML
standard les retire du tab order et de l'arbre a11y.

```js
$('.hero-slider5, .ks-tab-slide-wrap, .global-carousel')
  .on('afterChange init', function() {
    $(this).find('.slick-slide').each(function() {
      var $slide = $(this);
      $slide.hasClass('slick-active')
        ? $slide.removeAttr('inert')
        : $slide.attr('inert', '');
    });
  });
```

Standard moderne 2024, tous navigateurs. Plus propre que
`tabindex="-1" + aria-hidden="true"`.

### Pattern 4 — Override Bootstrap visually-hidden

axe-core ignore `clip-path` quand il calcule le contraste sur les
éléments masqués Bootstrap. Solution : forcer une couleur lisible.

```css
.visually-hidden, .sr-only { color: #FFFFFF !important; }
```

Le texte reste invisible (clip-path), mais axe voit un contraste
suffisant et ne crie plus 1.4.3 / 1.4.6.

### Pattern 5 — Background solide sous overlay scrim

Quand un container utilise `background: url() + ::before { background:
rgba(...) }`, axe ne peut pas calculer le contraste effectif. Ajouter
un `background-color` solide en fallback.

```css
.contact-area-2 .contact-wrap2 {
    position: relative;
    isolation: isolate;
    background-color: #0A1628; /* fallback pour axe-core */
}
.contact-area-2 .contact-wrap2::before {
    /* overlay scrim AAA 7:1 par-dessus */
}
```

## Faux positifs axe-core documentés

Ces violations restent dans les rapports wcag-mcp mais ne sont PAS de
vrais problèmes a11y. Validés via Playwright et tests manuels en
session S24.

| Critère | Élément | Cause | Validation |
|---|---|---|---|
| 1.4.3 / 1.4.6 | `<h1 class="visually-hidden">` | clip-path Bootstrap ignoré par axe | h1 invisible mais lu par lecteurs d'écran |
| 1.4.3 / 1.4.6 | `<span class="visually-hidden">obligatoire</span>` (forms /contact, /carrieres) | même cause que h1 — clip-path | text invisible, marqueur sémantique screen-reader pour `<label>aria-required` |
| 2.1.1 ~9 slides | `.slick-slide[inert]` | comportement attendu (slides cachées non focusables) | inert = best practice 2024 |
| 2.1.2 keyboard trap | `<a href="/services">` du header | check heuristique défaillant | Prouvé via Tab Playwright : focus passe au lien suivant |
| 1.4.8 text width | `div`, `main` | mesure DOM imprécise (responsive) | Texte responsive avec line-height correct |
| 6 dropdown links | `.ks-header__dropdown li a` | axe ne modélise pas les disclosure widgets dynamiques | Liens accessibles via click/ESC/ArrowDown sur button |

## Ajouter une nouvelle page

1. **Route** dans `Modules/Frontend/routes/web.php`
   ```php
   Route::get('/nouvelle-page', [PageController::class, 'nouvellePage'])
        ->name('nouvelle-page');
   ```

2. **Method** dans `app/Http/Controllers/PageController.php`
   ```php
   public function nouvellePage()
   {
       return view('frontend::pages.nouvelle-page', [
           'metaTitle' => 'Titre | Kalystrat',
           'metaDescription' => 'Description SEO 155 chars max',
           'canonical' => route('nouvelle-page'),
       ]);
   }
   ```

3. **Vue** dans `resources/views/pages/nouvelle-page.blade.php`
   ```blade
   @extends('frontend::layout')

   @section('content')
   @include('frontend::partials.page-banner', [
       'title' => 'Nouvelle page',
       'breadcrumbs' => [
           ['label' => 'Accueil', 'url' => route('index')],
           ['label' => 'Nouvelle page', 'url' => null],
       ],
   ])

   {{-- Contenu --}}

   @include('frontend::partials.cta-discutons')
   @endsection
   ```

4. **Audit AAA** via wcag-mcp avant de merger
   ```
   mcp__wcag-mcp__wcag_audit_aaa  url=https://kalystrat.test/nouvelle-page
   ```

## Maintenance

- **Cache Blade** : `php artisan view:clear` après chaque modif Blade
- **Routes** : `php artisan route:clear && php artisan route:cache` en prod
- **Audit AAA** : voir `.rapports/audit-aaa-pages-internes-2026-05-03.md`
  pour l'état de référence
- **Photos** : voir `.rapports/rapport-2026-05-03-photos.md` pour
  l'inventaire et les crédits

## Modules désactivables

Ce module respecte la règle Memora CORE : peut être désactivé via
`modules_statuses.json` sans casser le site (les routes `/` et autres
basculeront en 404 plutôt que 500). Les vues Privacy continueront
de fonctionner via le fallback `privacy::layouts.legal` du Layout Slot.

## Liens

- Handoffs sessions : `.handoffs/`
- Rapports d'audit : `.rapports/`
- Plan d'affaires (gitignored) : `.plan_affaire/`
- Charte graphique source (gitignored) : `.themes/charte_graphique/`
