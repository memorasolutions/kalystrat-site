<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    {{-- P22-S20e SEO/AEO/GEO 2026 : meta dynamiques, OG, Twitter, canonical, geo tags. Désactivable en revertant ce bloc. --}}
    @php
        $ksDefaultTitle = 'Kalystrat - Holding de construction québécois à intégration verticale';
        $ksDefaultDesc = "Gestion Kalystrat Inc. - Holding québécois de construction regroupant 6 filiales spécialisées : Fondations, Structure, Toiture, Finition, Immobilier et Placement Construction.";
        $ksTitle = isset($title) ? $title.' | Kalystrat' : $ksDefaultTitle;
        $ksDesc = $metaDescription ?? $ksDefaultDesc;
        $ksImage = $ogImage ?? asset('assets/img/kalystrat/og-image.jpg');
        $ksUrl = url()->current();
    @endphp
    <title>{{ $ksTitle }}</title>
    <meta name="description" content="{{ $ksDesc }}">
    <link rel="canonical" href="{{ $ksUrl }}">
    <link rel="alternate" hreflang="fr-CA" href="{{ $ksUrl }}">
    <meta name="keywords" content="Kalystrat, construction Québec, holding construction, fondations, charpente, toiture, finition intérieure, immobilier, placement construction">
    <meta name="author" content="Gestion Kalystrat Inc.">
    <meta name="geo.region" content="CA-QC">
    <meta name="geo.placename" content="Québec">
    <meta name="geo.position" content="46.8139;-71.2080">
    <meta name="ICBM" content="46.8139, -71.2080">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
	Google Fonts
	============================== -->

    {{-- P22-S20e Open Graph (Facebook, LinkedIn, etc.) --}}
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:locale" content="fr_CA">
    <meta property="og:site_name" content="Kalystrat">
    <meta property="og:title" content="{{ $ogTitle ?? $ksTitle }}">
    <meta property="og:description" content="{{ $ksDesc }}">
    <meta property="og:url" content="{{ $ksUrl }}">
    <meta property="og:image" content="{{ $ksImage }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:alt" content="{{ $ogImageAlt ?? 'Kalystrat - Holding de construction québécois' }}">

    {{-- P22-S20e Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $ogTitle ?? $ksTitle }}">
    <meta name="twitter:description" content="{{ $ksDesc }}">
    <meta name="twitter:image" content="{{ $ksImage }}">

    <!--==============================
	All CSS File
    ============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('themes/construz/assets/css/bootstrap.min.css') }}">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{{ asset('themes/construz/assets/fonts/remixicon.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('themes/construz/assets/css/magnific-popup.min.css') }}">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{ asset('themes/construz/assets/css/slick.min.css') }}">
    <!-- Nice Select -->
    <link rel="stylesheet" href="{{ asset('themes/construz/assets/css/nice-select.min.css') }}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('themes/construz/assets/css/style.css') }}">
    <!-- P22-S8 [D] LCP preload hero (above-the-fold) -->
    <link rel="preload" as="image" href="{{ asset('assets/img/kalystrat/hero/slide-1-montreal-chantier.webp') }}" fetchpriority="high">

    <!-- Kalystrat fixes (anti-overflow viewport <1900px) -->
    <link rel="stylesheet" href="{{ asset('themes/construz/assets/css/kalystrat/fixes.css') }}">

    {{-- P22-S8 [G] Schema.org JSON-LD (Organization + 6 Subsidiary + LocalBusiness + WebSite). Désactivable. --}}
    @include('frontend::partials.schema-jsonld')

    {{-- P22-S20e BreadcrumbList JSON-LD (auto-construit depuis $title). --}}
    @include('frontend::partials.breadcrumb-jsonld')
</head>