<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name') }} - Holding de construction québécois à intégration verticale</title>
    <meta name="description" content="Gestion Kalystrat Inc. - Holding québécois de construction regroupant 6 filiales spécialisées : Fondations, Structure, Toiture, Finition, Immobilier et Placement Construction.">
    <meta name="keywords" content="Kalystrat, construction Québec, holding construction, fondations, charpente, toiture, finition intérieure, immobilier, placement construction">
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

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
</head>