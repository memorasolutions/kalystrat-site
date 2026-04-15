<!DOCTYPE html>
<html lang="fr" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Kalystrat - Investissement stratégique et développement')</title>
    <meta name="description" content="@yield('meta_description', 'Kalystrat développe et gère des actifs stratégiques à Québec. Investissement immobilier, développement et gestion avec vision à long terme.')">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="theme-color" content="#0A1628">

    {{-- Open Graph --}}
    <meta property="og:title" content="@yield('og_title', 'Kalystrat - Investissement stratégique et développement')">
    <meta property="og:description" content="@yield('meta_description', 'Kalystrat développe et gère des actifs stratégiques à Québec. Investissement immobilier, développement et gestion avec vision à long terme.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('assets/img/kalystrat/og-image.jpg'))">
    <meta property="og:site_name" content="Kalystrat">
    <meta property="og:locale" content="fr_CA">

    {{-- Canonical --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/img/kalystrat/favicon.svg') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/kalystrat/apple-touch-icon.png') }}">

    {{-- Fonts Akzidenz Grotesk --}}
    <style>
        @font-face {
            font-family: 'Akzidenz Grotesk';
            src: url('{{ asset("assets/fonts/AkzidenzGrotesk-Light.otf") }}') format('opentype');
            font-weight: 300;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Akzidenz Grotesk';
            src: url('{{ asset("assets/fonts/AkzidenzGrotesk-Regular.otf") }}') format('opentype');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Akzidenz Grotesk';
            src: url('{{ asset("assets/fonts/AkzidenzGrotesk-Medium.otf") }}') format('opentype');
            font-weight: 500;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Akzidenz Grotesk';
            src: url('{{ asset("assets/fonts/AkzidenzGrotesk-Bold.otf") }}') format('opentype');
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Akzidenz Grotesk';
            src: url('{{ asset("assets/fonts/AkzidenzGrotesk-LightItalic.otf") }}') format('opentype');
            font-weight: 300;
            font-style: italic;
            font-display: swap;
        }
    </style>

    {{-- CSS Construz theme --}}
    <link rel="stylesheet" href="{{ asset('assets/construz/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/construz/fonts/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/construz/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/construz/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/construz/css/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/construz/css/style.css') }}">

    {{-- Kalystrat custom CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/kalystrat.css') }}">

    {{-- Schema.org JSON-LD --}}
    @include('frontend::partials.schema-jsonld')

    @stack('styles')
</head>
<body>

    {{-- Skip to content (WCAG 2.2 AA) --}}
    <a class="skip-link visually-hidden-focusable" href="#main-content">Aller au contenu principal</a>

    {{-- Preloader --}}
    <div class="preloader">
        <button class="btn preloaderCls" aria-label="Fermer le préchargement">
            <i class="ri-close-line"></i>
        </button>
        <div class="preloader-wrap">
            <div class="loading loading04">
                <span>K</span><span>A</span><span>L</span><span>Y</span><span>S</span><span>T</span><span>R</span><span>A</span><span>T</span>
            </div>
        </div>
    </div>

    {{-- Header --}}
    <header class="nav-header header-layout1">
        <div class="header-top">
            <div class="container">
                <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                    <div class="col-auto d-none d-lg-block">
                        <div class="header-top-left">
                            <div class="header-links">
                                <ul>
                                    <li>
                                        <div class="social-links">
                                            <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="ri-facebook-fill"></i></a>
                                            <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><i class="ri-linkedin-fill"></i></a>
                                            <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="ri-instagram-line"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="header-top-right">
                            <div class="header-links ps-0">
                                <ul>
                                    <li><i class="ri-phone-line"></i><a href="tel:4184760987">418-476-0987</a></li>
                                    <li><i class="ri-mail-line"></i><a href="mailto:info@kalystrat.ca">info@kalystrat.ca</a></li>
                                    <li><i class="ri-map-pin-line"></i>Québec, QC</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-wrapper">
            <div class="menu-area">
                <div class="header-navbar-logo">
                    <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/img/kalystrat/logo-header.svg') }}" alt="Kalystrat"></a>
                </div>
                <div class="logo-bg"></div>
                <div class="container">
                    <div class="row align-items-center justify-content-lg-start justify-content-between">
                        <div class="col-auto d-xxl-none d-block">
                            <div class="header-logo">
                                <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/img/kalystrat/logo-header.svg') }}" alt="Kalystrat"></a>
                            </div>
                        </div>
                        <div class="col-auto ms-auto ms-xxl-0">
                            <nav class="main-menu d-none d-lg-inline-block" aria-label="Navigation principale">
                                <ul>
                                    <li>
                                        <a href="{{ route('frontend.home') }}" class="{{ request()->routeIs('frontend.home') ? 'active' : '' }}">ACCUEIL</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('frontend.about') }}" class="{{ request()->routeIs('frontend.about') ? 'active' : '' }}">QUI NOUS SOMMES</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('frontend.services') }}" class="{{ request()->routeIs('frontend.services*') ? 'active' : '' }}">NOTRE APPROCHE</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('frontend.portfolio') }}" class="{{ request()->routeIs('frontend.portfolio*') ? 'active' : '' }}">PORTFOLIO</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('frontend.contact') }}" class="{{ request()->routeIs('frontend.contact') ? 'active' : '' }}">NOUS JOINDRE</a>
                                    </li>
                                </ul>
                            </nav>
                            <div class="navbar-right d-inline-flex d-lg-none">
                                <button type="button" class="menu-toggle icon-btn" aria-label="Ouvrir le menu"><i class="ri-menu-line"></i></button>
                            </div>
                        </div>
                        <div class="col-auto ms-auto d-xl-block d-none">
                            <div class="header-button">
                                <a href="{{ route('frontend.contact') }}" class="btn">NOUS JOINDRE <i class="ri-arrow-right-up-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar-right-desc d-xxl-flex d-none">
                    <div class="icon-btn">
                        <i class="ri-phone-fill"></i>
                    </div>
                    <div class="navbar-right-desc-details">
                        <h6 class="title">Appelez-nous</h6>
                        <a class="link" href="tel:4184760987">418-476-0987</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- Mobile Menu --}}
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-area">
            <div class="mobile-logo">
                <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/img/kalystrat/logo-header.svg') }}" alt="Kalystrat"></a>
                <button class="menu-toggle" aria-label="Fermer le menu"><i class="ri-close-line"></i></button>
            </div>
            <div class="mobile-menu">
                <ul>
                    <li><a href="{{ route('frontend.home') }}">Accueil</a></li>
                    <li><a href="{{ route('frontend.about') }}">Qui nous sommes</a></li>
                    <li><a href="{{ route('frontend.services') }}">Notre approche</a></li>
                    <li><a href="{{ route('frontend.portfolio') }}">Portfolio</a></li>
                    <li><a href="{{ route('frontend.contact') }}">Nous joindre</a></li>
                </ul>
            </div>
            <div class="mobile-menu-bottom">
                <a href="{{ route('frontend.contact') }}" class="btn w-100">Soumission gratuite</a>
            </div>
        </div>
    </div>

    {{-- Breadcrumb --}}
    @hasSection('breadcrumb')
        <div class="breadcrumb-wrapper" data-bg-src="{{ asset('assets/construz/img/bg/breadcrumb-bg.jpg') }}">
            <div class="container">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-title">@yield('breadcrumb_title')</h1>
                    <ul class="breadcrumb-menu">
                        <li><a href="{{ route('frontend.home') }}">Accueil</a></li>
                        @yield('breadcrumb')
                    </ul>
                </div>
            </div>
        </div>
    @endif

    {{-- Main Content --}}
    <main id="main-content" role="main">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="footer-wrapper footer-layout1">
        <div class="container">
            <div class="footer-top-1">
                <div class="footer-logo">
                    <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/img/kalystrat/logo-white.svg') }}" alt="Kalystrat" style="max-width: 200px; height: auto;"></a>
                </div>
                <div class="subscribe-box">
                    <p class="subscribe-box_text">Restez informé de nos projets de développement et opportunités d'investissement.</p>
                </div>
            </div>
            <div class="widget-area">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-3">
                        <div class="widget widget-about footer-widget">
                            <h3 class="widget_title">À propos</h3>
                            <p class="about-text">Investissement stratégique et développement. Nous développons et gérons des actifs qui génèrent une valeur durable à long terme.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Liens rapides</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li><a href="{{ route('frontend.home') }}">Accueil</a></li>
                                    <li><a href="{{ route('frontend.about') }}">Qui nous sommes</a></li>
                                    <li><a href="{{ route('frontend.services') }}">Notre approche</a></li>
                                    <li><a href="{{ route('frontend.portfolio') }}">Portfolio</a></li>
                                    <li><a href="{{ route('frontend.contact') }}">Nous joindre</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget widget-contact">
                            <h3 class="widget_title">Coordonnées</h3>
                            <p class="contact-text">Québec, QC, Canada</p>
                            <h3 class="widget_title">Courriel</h3>
                            <p class="footer-text"><a href="mailto:info@kalystrat.ca">info@kalystrat.ca</a></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">Téléphone</h3>
                            <p class="footer-text">
                                <a href="tel:4184760987">418-476-0987</a>
                            </p>
                            <h3 class="widget_title">Suivez-nous</h3>
                            <div class="social-btn style2">
                                <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="ri-facebook-fill"></i></a>
                                <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><i class="ri-linkedin-fill"></i></a>
                                <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="ri-instagram-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright-wrap">
                <div class="row gy-3 justify-content-md-between justify-content-center">
                    <div class="col-auto align-self-center">
                        <p class="copyright-text text-center">&copy; {{ date('Y') }} Kalystrat. Tous droits réservés.</p>
                    </div>
                    <div class="col-auto">
                        <div class="footer-links">
                            <span class="text-white">Construit par <a href="https://memora.solutions" target="_blank" rel="noopener noreferrer">MEMORA solutions</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    {{-- Scroll To Top --}}
    <div class="scroll-top" role="button" aria-label="Retour en haut de page" tabindex="0">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102" role="img" aria-label="Progression du défilement">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
        </svg>
    </div>

    {{-- CTA sticky mobile --}}
    <div class="d-lg-none position-fixed bottom-0 start-0 end-0 p-3 bg-white shadow-lg" style="z-index: 999;">
        <a href="{{ route('frontend.contact') }}" class="btn w-100 text-center">NOUS JOINDRE <i class="ri-arrow-right-up-line"></i></a>
    </div>

    {{-- JS --}}
    <script src="{{ asset('assets/construz/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/construz/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/construz/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/construz/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/construz/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/construz/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/construz/js/jquery.marquee.min.js') }}"></script>
    <script src="{{ asset('assets/construz/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/construz/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/construz/js/nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/construz/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/construz/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/construz/js/main.js') }}"></script>

    @stack('scripts')
</body>
</html>
