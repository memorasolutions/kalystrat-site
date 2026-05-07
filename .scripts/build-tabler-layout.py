#!/usr/bin/env python3
"""
Construit Modules/AdminTabler/resources/views/layouts/admin.blade.php
en copiant VERBATIM le HTML officiel preview.tabler.io/layout-navbar-overlap.html.

Substitutions Laravel UNIQUEMENT (aucune autre modification) :
- assets statiques → @vite() / asset()
- "./profile.html" → {{ route('admin.profile') }}
- "./settings.html" → {{ route('admin.settings.index') }}
- "./sign-in.html" → "#" (+ form CSRF caché logout)
- "Paweł Kuna" → {{ auth()->user()->name }}
- "UI Designer" → {{ auth()->user()->roles->first()?->name ?? 'Utilisateur' }}
- "Overview" (page-pretitle) → {{ $subtitle ?? __('Administration') }}
- "Navbar overlap layout" (page-title) → {{ $title ?? __('Tableau de bord') }}
- avatar URL ./static/avatars/000m.jpg → UI Avatars API
- page-body content (cards démo) → @yield('content')
- href="." (logo) → {{ route('admin.dashboard') }}
"""
import re
from pathlib import Path

ROOT = Path("/Users/stephanelapointe/__IA__/_____SERVEUR_____/site_internet/kalystrat")
SRC = ROOT / ".rapports/tabler-source-2026-05-07/layout-navbar-overlap.html"
DST = ROOT / "Modules/AdminTabler/resources/views/layouts/admin.blade.php"

# Sections (1-based line numbers from HTML source)
HEADER_START, HEADER_END = 120, 1340         # navbar dark complet (skip ligne 119 <div class="page"> car déjà dans le boilerplate Blade)
PAGE_HEADER_START, PAGE_HEADER_END = 1341, 1407  # page-wrapper open + page-header
FOOTER_START, FOOTER_END = 4055, 4101        # footer transparent

src_lines = SRC.read_text(encoding='utf-8').splitlines(keepends=True)

def slice_lines(start, end):
    """Lines 1-based inclusive."""
    return ''.join(src_lines[start-1:end])

def apply_laravel_substitutions(html):
    # ===== Logo brand : remplace le SVG officiel Tabler par logo Kalystrat =====
    # Pattern : <a href="." aria-label="Tabler"><svg ...>...</svg></a>
    # → <a href="{{ route('admin.dashboard') }}" aria-label="..."><img src="..." class="navbar-brand-image"></a>
    logo_pattern = re.compile(
        r'<a href="\." aria-label="Tabler"\s*><svg[^>]*class="navbar-brand-image">.*?</svg\s*\n?\s*></a>',
        re.DOTALL
    )
    # Logo Kalystrat SVG inline (lecture du fichier source) — fidèle structure Tabler officiel SVG inline
    logo_svg_path = ROOT / "public/assets/img/kalystrat/logo-white.svg"
    logo_svg_content = logo_svg_path.read_text(encoding='utf-8')
    # Adapter dimensions (officiel Tabler logo : width 110 height 32 viewBox custom)
    # Notre logo : width 400 height 70 viewBox 0 0 400 70 → ratio ~5.7
    # Pour navbar : height 32 → width = 32 * 400/70 = 183
    logo_svg_content = logo_svg_content.replace('<svg xmlns="http://www.w3.org/2000/svg" width="400" height="70"',
                                                 '<svg xmlns="http://www.w3.org/2000/svg" width="183" height="32"')
    logo_svg_content = logo_svg_content.replace('aria-hidden="true"', 'aria-hidden="true" class="navbar-brand-image"')
    logo_replacement = (
        '<a href="{{ route(\'admin.dashboard\') }}" aria-label="{{ config(\'app.name\') }}">'
        + logo_svg_content.strip() +
        '</a>'
    )
    html = logo_pattern.sub(lambda m: logo_replacement, html)

    # Routes
    html = html.replace('"./profile.html"', '"{{ route(\'admin.profile\') }}"')
    html = html.replace('"./settings.html"', '"{{ route(\'admin.settings.index\') }}"')

    # Logout : sign-in.html → JS submit form caché
    html = html.replace(
        '<a href="./sign-in.html" class="dropdown-item">Logout</a>',
        '<a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById(\'admintabler-logout-form\').submit();">Logout</a>'
    )

    # User identity
    html = html.replace('<div>Paweł Kuna</div>', '<div>{{ auth()->user()->name }}</div>')
    html = html.replace(
        '<div class="mt-1 small text-secondary">UI Designer</div>',
        '<div class="mt-1 small text-secondary">{{ auth()->user()->roles->first()?->name ?? __(\'Utilisateur\') }}</div>'
    )

    # Avatar background-image static → UI Avatars dynamic
    html = re.sub(
        r'background-image:\s*url\(\./static/avatars/000m\.jpg\)',
        'background-image: url(https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=066fd1&color=fff&size=64)',
        html
    )

    # Page header content
    html = html.replace('<div class="page-pretitle">Overview</div>',
                        '<div class="page-pretitle">{{ $subtitle ?? __(\'Administration\') }}</div>')
    html = html.replace('<h2 class="page-title">Navbar overlap layout</h2>',
                        '<h2 class="page-title">{{ $title ?? __(\'Tableau de bord\') }}</h2>')

    # Page header actions area : remplacer le btn-list démo par @yield('page-actions')
    # Le bloc btn-list démo officiel (New view + Create new report + modal trigger) lignes 1352-1405 environ
    html = re.sub(
        r'<div class="btn-list">.*?</div>\s*<!-- BEGIN MODAL -->\s*<!-- END MODAL -->',
        '<div class="btn-list">@yield(\'page-actions\')</div>',
        html,
        flags=re.DOTALL
    )

    return html

def replace_nav_menu_with_kalystrat_loop(html):
    """
    Remplace le bloc nav-menu démo Tabler (Home/Interface/Forms/Extra/Layout/Plugins/Addons/Help)
    par une boucle Blade peuplée par le NavigationService Kalystrat (8 sections : Accueil/Contenu/...).
    La STRUCTURE HTML reste identique à l'officiel (.nav-item, .dropdown-toggle, .dropdown-menu, .dropdown-menu-columns, .dropdown-header, .dropdown-item).
    """
    blade_loop = '''            <!-- BEGIN NAVBAR MENU -->
            @inject('navService', 'Modules\\Backoffice\\Services\\NavigationService')
            @php
                $kSections = $navService->getNavigation(auth()->user());
                $kBadges = $navService->getBadges();
            @endphp
            <ul class="navbar-nav">
              @foreach($kSections as $sIdx => $section)
                @php
                    $items = $section['items'] ?? [];
                    $hasChildren = false;
                    $sectionActive = false;
                    foreach ($items as $item) {
                        if (!empty($item['children'])) { $hasChildren = true; }
                        if (isset($item['route'])) {
                            $wild = str_replace('.index', '.*', $item['route']);
                            if (request()->routeIs($item['route']) || request()->routeIs($wild)) { $sectionActive = true; }
                        }
                        if (!empty($item['children'])) {
                            foreach ($item['children'] as $child) {
                                if (isset($child['route'])) {
                                    $wild = str_replace('.index', '.*', $child['route']);
                                    if (request()->routeIs($child['route']) || request()->routeIs($wild)) { $sectionActive = true; }
                                }
                            }
                        }
                    }
                    $simpleSingle = (count($items) === 1 && empty($items[0]['children']));
                @endphp
                @if($simpleSingle)
                  @php $item = $items[0]; $isActive = isset($item['route']) && request()->routeIs(str_replace('.index', '.*', $item['route'])); @endphp
                  <li class="nav-item {{ $isActive ? 'active' : '' }}">
                    <a class="nav-link" href="{{ isset($item['route']) ? route($item['route']) : '#' }}">
                      <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <i class="ti ti-{{ $section['icon'] ?? 'circle' }}" style="width:24px;height:24px;font-size:18px;"></i>
                      </span>
                      <span class="nav-link-title"> {{ __($section['label']) }} </span>
                    </a>
                  </li>
                @else
                  <li class="nav-item dropdown {{ $sectionActive ? 'active' : '' }}">
                    <a
                      class="nav-link dropdown-toggle"
                      href="#navbar-section-{{ $sIdx }}"
                      data-bs-toggle="dropdown"
                      data-bs-auto-close="outside"
                      role="button"
                      aria-expanded="false"
                    >
                      <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <i class="ti ti-{{ $section['icon'] ?? 'circle' }}" style="width:24px;height:24px;font-size:18px;"></i>
                      </span>
                      <span class="nav-link-title"> {{ __($section['label']) }} </span>
                    </a>
                    <div class="dropdown-menu">
                      @if($hasChildren)
                        <div class="dropdown-menu-columns">
                          @foreach($items as $item)
                            <div class="dropdown-menu-column">
                              @if(!empty($item['children']))
                                <div class="dropdown-header">{{ __($item['label']) }}</div>
                                @foreach($item['children'] as $child)
                                  @php
                                      $childWild = isset($child['route']) ? str_replace('.index', '.*', $child['route']) : '';
                                      $childActive = isset($child['route']) && (request()->routeIs($child['route']) || request()->routeIs($childWild));
                                  @endphp
                                  <a class="dropdown-item {{ $childActive ? 'active' : '' }}" href="{{ isset($child['route']) ? route($child['route']) : '#' }}">{{ __($child['label']) }}</a>
                                @endforeach
                              @else
                                @php
                                    $itemWild = isset($item['route']) ? str_replace('.index', '.*', $item['route']) : '';
                                    $itemActive = isset($item['route']) && (request()->routeIs($item['route']) || request()->routeIs($itemWild));
                                @endphp
                                <a class="dropdown-item {{ $itemActive ? 'active' : '' }}" href="{{ isset($item['route']) ? route($item['route']) : '#' }}">
                                  {{ __($item['label']) }}
                                  @if(isset($item['route'], $kBadges[$item['route']]))
                                    <span class="badge bg-red ms-auto">{{ $kBadges[$item['route']] }}</span>
                                  @endif
                                </a>
                              @endif
                            </div>
                          @endforeach
                        </div>
                      @else
                        @foreach($items as $item)
                          @php
                              $itemWild = isset($item['route']) ? str_replace('.index', '.*', $item['route']) : '';
                              $itemActive = isset($item['route']) && (request()->routeIs($item['route']) || request()->routeIs($itemWild));
                          @endphp
                          <a class="dropdown-item {{ $itemActive ? 'active' : '' }}" href="{{ isset($item['route']) ? route($item['route']) : '#' }}">
                            {{ __($item['label']) }}
                            @if(isset($item['route'], $kBadges[$item['route']]))
                              <span class="badge bg-red ms-auto">{{ $kBadges[$item['route']] }}</span>
                            @endif
                          </a>
                        @endforeach
                      @endif
                    </div>
                  </li>
                @endif
              @endforeach
            </ul>
            <!-- END NAVBAR MENU -->'''

    # Match le bloc complet entre <!-- BEGIN NAVBAR MENU --> et <!-- END NAVBAR MENU --> (inclusive)
    pattern = re.compile(
        r'<!-- BEGIN NAVBAR MENU -->.*?<!-- END NAVBAR MENU -->',
        re.DOTALL
    )
    return pattern.sub(lambda m: blade_loop, html)


# ===== Build sections =====
header = slice_lines(HEADER_START, HEADER_END)
header = apply_laravel_substitutions(header)
header = replace_nav_menu_with_kalystrat_loop(header)

page_header = slice_lines(PAGE_HEADER_START, PAGE_HEADER_END)
page_header = apply_laravel_substitutions(page_header)

footer = slice_lines(FOOTER_START, FOOTER_END)
# Footer Kalystrat overrides
footer = footer.replace(
    '<a href="https://docs.tabler.io" target="_blank" class="link-secondary" rel="noopener">Documentation</a>',
    '<a href="{{ url(\'/\') }}" target="_blank" class="link-secondary" rel="noopener">{{ __(\'Voir le site\') }}</a>'
)
footer = footer.replace('<li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a></li>', '')
footer = footer.replace(
    '<a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Source code</a>',
    '<a href="https://memora.solutions" target="_blank" class="link-secondary" rel="noopener">MEMORA solutions</a>'
)
footer = footer.replace(
    '''<li class="list-inline-item">
                    <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">''',
    '''<li class="list-inline-item d-none">
                    <a href="#" class="link-secondary">'''
)
footer = footer.replace('Copyright &copy; 2025', 'Copyright &copy; {{ date(\'Y\') }}')
footer = footer.replace(
    '<a href="." class="link-secondary">Tabler</a>',
    '<a href="{{ url(\'/\') }}" class="link-secondary">{{ config(\'app.name\') }}</a>'
)
footer = footer.replace(
    '<a href="./changelog.html" class="link-secondary" rel="noopener"> v1.4.0 </a>',
    ''
)

# ===== Compose Blade layout =====
blade = '''<!doctype html>
{{-- ================================================================== --}}
{{-- LAYOUT VERBATIM Tabler 1.4 — preview.tabler.io/layout-navbar-overlap.html --}}
{{-- Copyright 2018-2025 Paweł Kuna — Licensed under MIT --}}
{{-- Substitutions Laravel UNIQUEMENT (routes, user, avatar URL, form CSRF logout, @vite, @stack, @yield) --}}
{{-- AUCUNE modification de structure, classes, SVG, ou contenu démo des dropdowns. --}}
{{-- ================================================================== --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? __('Administration') }} &middot; {{ $adminBranding['site_name'] ?? config('app.name') }}</title>
    <meta name="msapplication-TileColor" content="{{ $adminBranding['primary'] ?? '#066fd1' }}" />
    <meta name="theme-color" content="{{ $adminBranding['primary'] ?? '#066fd1' }}" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" />

    {{-- Branding dynamique CSS vars --}}
    <style>
        :root {
            --admintabler-primary: {{ $adminBranding['primary'] ?? '#066fd1' }};
            --tblr-primary: {{ $adminBranding['primary'] ?? '#066fd1' }};
            --tblr-primary-rgb: {{ implode(', ', sscanf($adminBranding['primary'] ?? '#066fd1', '#%02x%02x%02x')) }};
        }
    </style>

    {{-- BEGIN GLOBAL MANDATORY STYLES + PLUGINS STYLES + ICONS + Inter font --}}
    @vite(['Modules/AdminTabler/resources/assets/sass/app.scss'])
    {{-- END STYLES --}}

    @livewireStyles
    @stack('plugin-styles')
    @stack('styles')
</head>
<body>
    {{-- BEGIN GLOBAL THEME SCRIPT (anti-flash dark mode) --}}
    <script src="{{ asset('build/admintabler/tabler-theme.min.js') }}"></script>
    {{-- END GLOBAL THEME SCRIPT --}}
    <div class="page">
''' + header + '''
''' + page_header + '''
        {{-- BEGIN PAGE BODY --}}
        <div class="page-body">
          <div class="container-xl">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible mb-3" role="alert">
                    <div>{{ session('success') }}</div>
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('Fermer') }}"></a>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible mb-3" role="alert">
                    <div>{{ session('error') }}</div>
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('Fermer') }}"></a>
                </div>
            @endif

            @yield('content')
          </div>
        </div>
        {{-- END PAGE BODY --}}
''' + footer + '''
      </div>
    </div>

    {{-- Form caché Logout (CSRF Laravel obligatoire) --}}
    <form id="admintabler-logout-form" method="POST" action="{{ route('logout') }}" class="d-none">
        @csrf
    </form>

    {{-- Toasts Memora (compat) --}}
    @includeIf('backoffice::partials.toast-notifications')

    {{-- Tabler core JS --}}
    @vite(['Modules/AdminTabler/resources/assets/js/app.js'])

    @livewireScripts
    @stack('plugin-scripts')
    @stack('custom-scripts')
    @stack('scripts')
  </body>
</html>
'''

DST.write_text(blade, encoding='utf-8')
print(f"OK — layout généré : {DST}")
print(f"   {len(blade.splitlines())} lignes")
