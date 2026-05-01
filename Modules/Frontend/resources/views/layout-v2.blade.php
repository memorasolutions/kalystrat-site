<!DOCTYPE html>
<html class="no-js" lang="fr-CA">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', config('app.name', 'Kalystrat'))</title>
    <meta name="description" content="@yield('meta_description', 'Holding québécois de construction à intégration verticale. Six filiales spécialisées : Fondations, Structure, Toiture, Finition, Immobilier, Placement. Conçu. Réalisé. Livré.')">
    <meta name="keywords" content="@yield('meta_keywords', 'construction, holding, Québec, fondations, charpente, toiture, finition, immobilier, placement main-d œuvre, RBQ, CCQ')">
    <meta name="robots" content="@yield('meta_robots', 'INDEX,FOLLOW')">
    <meta name="author" content="Gestion Kalystrat Inc.">
    <meta name="geo.region" content="CA-QC">
    <meta name="geo.placename" content="Québec">
    <meta name="geo.position" content="46.8139;-71.2080">
    <meta name="ICBM" content="46.8139, -71.2080">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- Open Graph + Twitter Card --}}
    <link rel="canonical" href="@yield('canonical', url()->current())">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="fr_CA">
    <meta property="og:site_name" content="Kalystrat">
    <meta property="og:title" content="@yield('og_title', 'Kalystrat — Holding construction Québec')">
    <meta property="og:description" content="@yield('og_description', 'Holding québécois 6 filiales construction. Conçu. Réalisé. Livré.')">
    <meta property="og:image" content="@yield('og_image', asset('assets/img/kalystrat/logo-header.svg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'Kalystrat — Holding construction Québec')">
    <meta name="twitter:description" content="@yield('og_description', 'Holding québécois 6 filiales construction.')">

    {{-- Favicons --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/img/kalystrat/favicon.svg') }}">

    {{-- Google Fonts (Archivo + Titillium Web - construz officiel) --}}

    {{-- Construz CSS officiel --}}
    <link rel="stylesheet" href="{{ asset('assets/construz-new/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/construz-new/fonts/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/construz-new/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/construz-new/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/construz-new/css/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/construz-new/css/style.css') }}">

    {{-- Kalystrat overrides (charte navy/gold) --}}
    <link rel="stylesheet" href="{{ asset('assets/css/kalystrat-v2.css') }}?v={{ @filemtime(public_path('assets/css/kalystrat-v2.css')) ?: time() }}">

    {{-- P22-S6b — Header unifié Kalystrat 2026 (désactivable en commentant la ligne) --}}
    <link rel="stylesheet" href="{{ asset('themes/construz/assets/css/kalystrat/fixes.css') }}?v={{ @filemtime(public_path('themes/construz/assets/css/kalystrat/fixes.css')) ?: time() }}">

    {{-- Schema.org JSON-LD --}}
    @include('frontend::partials-v2.schema-jsonld')

    @stack('styles')
</head>

<body>

    {{-- Skip link WCAG 2.4.1 --}}
    <a href="#main-content" class="skip-link">Aller au contenu principal</a>

    {{-- Preloader --}}
    <div class="preloader">
        <div class="preloader-inner">
            <span class="loader"></span>
        </div>
    </div>

    @include('frontend::partials-v2.popup-search')
    @include('frontend::partials-v2.sidemenu')
    {{-- P22-S6b — Header unifié Kalystrat 2026 (remplace partials-v2.header).
         Pour rétablir : remplacer la ligne suivante par @include('frontend::partials-v2.header') --}}
    @include('frontend::elements.header')

    <main id="main-content">
        @yield('content')
    </main>

    @include('frontend::partials-v2.footer')

    {{-- Scroll To Top --}}
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102" aria-hidden="true">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
        </svg>
    </div>

    {{-- Construz JS officiel --}}
    <script src="{{ asset('assets/construz-new/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/construz-new/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/construz-new/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/construz-new/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/construz-new/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/construz-new/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/construz-new/js/jquery.marquee.min.js') }}"></script>
    <script src="{{ asset('assets/construz-new/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/construz-new/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/construz-new/js/nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/construz-new/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/construz-new/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/construz-new/js/main.js') }}"></script>

    {{-- P22-S6b — Header unifié Kalystrat 2026 (sticky shrink + offcanvas + dropdown vanilla) --}}
    <script src="{{ asset('themes/construz/assets/js/kalystrat-header.js') }}?v={{ @filemtime(public_path('themes/construz/assets/js/kalystrat-header.js')) ?: time() }}" defer></script>

    @stack('scripts')

</body>
</html>
