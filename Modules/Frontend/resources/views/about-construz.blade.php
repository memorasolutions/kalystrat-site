<!doctype html>
<html class="no-js" lang="fr-CA">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    {{-- P22-S20e SEO/AEO/GEO 2026 --}}
    <title>À propos | Kalystrat - Holding québécois construction intégrée</title>
    <meta name="description" content="Kalystrat est un holding québécois de construction fondé en 2026 par Ali Salomon. Six filiales spécialisées intégrées verticalement : du concept aux clés en main.">
    <meta name="keywords" content="Kalystrat à propos, holding construction Québec, Ali Salomon fondateur, intégration verticale construction, 6 filiales Kalystrat">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="alternate" hreflang="fr-CA" href="{{ url()->current() }}">
    <meta name="author" content="Gestion Kalystrat Inc.">
    <meta name="geo.region" content="CA-QC">
    <meta name="geo.placename" content="Québec">
    <meta name="geo.position" content="46.8139;-71.2080">
    <meta name="ICBM" content="46.8139, -71.2080">
    <meta name="robots" content="INDEX,FOLLOW">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:locale" content="fr_CA">
    <meta property="og:site_name" content="Kalystrat">
    <meta property="og:title" content="À propos de Kalystrat">
    <meta property="og:description" content="Holding québécois de construction à intégration verticale, fondé en 2026 par Ali Salomon. Six filiales du concept aux clés en main.">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('assets/img/kalystrat/logo-header.svg') }}">
    <meta property="og:image:alt" content="Logo Kalystrat">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="À propos de Kalystrat">
    <meta name="twitter:description" content="Holding québécois de construction à intégration verticale, fondé en 2026 par Ali Salomon.">
    <meta name="twitter:image" content="{{ asset('assets/img/kalystrat/logo-header.svg') }}">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
	  Google Fonts
	============================== -->


    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/construz-new/css/bootstrap.min.css') }}">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{{ asset('themes/construz/assets/fonts/remixicon.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('assets/construz-new/css/magnific-popup.min.css') }}">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{ asset('assets/construz-new/css/slick.min.css') }}">
    <!-- Nice Select -->
    <link rel="stylesheet" href="{{ asset('assets/construz-new/css/nice-select.min.css') }}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/construz-new/css/style.css') }}">

    @include('frontend::partials-v2.schema-jsonld')

    {{-- P22-S20e BreadcrumbList JSON-LD pour /a-propos --}}
    @php $title = 'À propos'; @endphp
    @include('frontend::partials.breadcrumb-jsonld')

    <link rel="stylesheet" href="{{ asset('assets/css/kalystrat-wcag.css') }}">
</head>

<body>
    <a href="#main-content" class="skip-link">Aller au contenu principal</a>
    <!--********************************
   		Code Start From Here 
	******************************** -->




    <!--==============================
     Preloader
    ==============================-->
    <div class="preloader ">
        <div class="preloader-inner">
            <span class="loader"></span>
        </div>
    </div>

    <!--==============================
     Search
    ==============================-->
    <div class="popup-search-box">
        <button class="searchClose"><i class="ri-close-line"></i></button>
        <form action="#">
            <input type="text" placeholder="Search Here..">
            <button type="submit"><i class="ri-search-line"></i></button>
        </form>
    </div>

    <!--==============================
     SideMenu
    ==============================-->
    <div class="sidemenu-wrapper">
        <div class="sidemenu-content">
            <button class="closeButton sideMenuCls"><i class="ri-close-line"></i></button>
            <div class="widget widget-about footer-widget">
                <div class="footer-logo">
                    <a href="{{ route('index') }}"><img src="{{ asset('assets/construz-new/img/logo.svg') }}" alt="logo"></a>
                </div>
                <p class="about-text mb-4">Gestion Kalystrat Inc. est un holding québécois regroupant six filiales spécialisées en construction.</p>
                
                <p class="footer-text">
                    <a href="tel:+15815786145"><i class="ri-phone-line me-2"></i>1-581-578-6145</a>
                </p>
                <p class="contact-text"><i class="ri-map-pin-line me-2"></i> Québec, QC, Canada</p>
                <p class="footer-text"><a href="mailto:info@kalystrat.ca"><i class="ri-mail-line me-2"></i>info@kalystrat.ca</a></p>
                <div class="social-btn style3 mt-30">
                    <a href="https://www.twitter.com/"><i class="ri-twitter-x-line"></i></a>
                    <a href="https://instagram.com/"><i class="ri-instagram-line"></i></a>                           
                    <a href="https://facebook.com/"><i class="ri-facebook-fill"></i></a>
                    <a href="https://linkedin.com/"><i class="ri-linkedin-fill"></i></a>
                </div>
                <div class="recent-post-wrap mt-40">
                    <div class="recent-post">
                        <div class="media-img">
                            <a href="#"><img src="{{ asset('assets/construz-new/img/blog/recent-post1.png') }}" alt="Blog Image"></a>
                        </div>
                        <div class="media-body">
                            <h4 class="post-title"><a class="text-inherit" href="#">Best features of Building construction work</a></h4>
                            <div class="recent-post-meta">
                                <a href="#">By Nicholes</a>
                                <a href="#">30 min ago</a>
                            </div>
                        </div>
                    </div>
                    <div class="recent-post">
                        <div class="media-img">
                            <a href="#"><img src="{{ asset('assets/construz-new/img/blog/recent-post2.png') }}" alt="Blog Image"></a>
                        </div>
                        <div class="media-body">
                            <h4 class="post-title"><a class="text-inherit" href="#">The beast team is a around and how we make it</a></h4>
                            <div class="recent-post-meta">
                                <a href="#">By Nicholes</a>
                                <a href="#">2 days ago</a>
                            </div>
                        </div>
                    </div>
                    <div class="recent-post">
                        <div class="media-img">
                            <a href="#"><img src="{{ asset('assets/construz-new/img/blog/recent-post4.png') }}" alt="Blog Image"></a>
                        </div>
                        <div class="media-body">
                            <h4 class="post-title"><a class="text-inherit" href="#">A well designed construction website is user accessible</a></h4>
                            <div class="recent-post-meta">
                                <a href="#">By Nicholes</a>
                                <a href="#">3 week ago</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--==============================
    Mobile Menu
    ============================== -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-area">
            <div class="mobile-logo">
                <a href="{{ route('index') }}"><img src="{{ asset('assets/construz-new/img/logo.svg') }}" alt="Kalystrat"></a>
                <button class="menu-toggle"><i class="ri-close-line"></i></button>
            </div>
            <div class="mobile-menu">
                <ul>
                    <li class="menu-item-has-children">
                        <a href="#">Home</a>
                        <ul class="sub-menu">
                            <li class="menu-item-has-children">
                                <a href="#">Multipage</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{ route('index') }}">Accueil</a>
                                    </li>
                                    <li>
                                        <a href="#">Home 02</a>
                                    </li>
                                    <li>
                                        <a href="#">Home 03</a>
                                    </li>
                                    <li>
                                        <a href="#">Home 04</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('index') }}">Accueil</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Onepage</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="#">Home 01 Onepage</a>
                                    </li>
                                    <li>
                                        <a href="#">Home 02 Onepage</a>
                                    </li>
                                    <li>
                                        <a href="#">Home 03 Onepage</a>
                                    </li>
                                    <li>
                                        <a href="#">Home 04 Onepage</a>
                                    </li>
                                    <li>
                                        <a href="#">Home 05 Onepage</a>
                                    </li>
                                </ul>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('kalystrat.apropos') }}">About</a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Pages</a>
                        <ul class="sub-menu">
                            <li><a href="#">Équipe</a></li>
                            <li><a href="#">Membre</a></li>
                            <li><a href="#">Boutique</a></li>
                            <li><a href="#">Produit</a></li>
                            <li><a href="#">Cart</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Wishlist</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Project</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('project') }}">Projects</a></li>
                            <li><a href="{{ route('project') }}">Projet</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Service</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('service') }}">Service</a></li>
                            <li><a href="{{ route('kalystrat.filiale', 'fondations') }}">Filiale</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Shop</a>
                        <ul class="sub-menu">
                            <li><a href="#">Shop</a></li>
                            <li><a href="#">Produit</a></li>
                            <li><a href="#">Cart</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Wishlist</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Blog</a>
                        <ul class="sub-menu">
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Article</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================
	Header Area
    ==============================-->
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
                                            <a href="https://www.facebook.com/"><i class="ri-facebook-fill"></i></a>
                                            <a href="https://www.twitter.com/"><i class="ri-twitter-x-fill"></i></a>
                                            <a href="https://www.instagram.com/"><i class="ri-instagram-line"></i></a>
                                            <a href="https://www.linkedin.com/"><i class="ri-linkedin-fill"></i></a>
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
                                    <li><i class="ri-time-line"></i>Lun - Ven / 8h - 17h</li>
                                    <li><i class="ri-map-pin-line"></i><a href="https://www.google.com/maps">Québec, QC, Canada</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-wrapper">
            <!-- Main Menu Area -->
            <div class="menu-area">
                <div class="header-navbar-logo">
                    <a href="{{ route('index') }}"><img src="{{ asset('assets/construz-new/img/logo.svg') }}" alt="logo"></a>
                </div>
                <div class="logo-bg"></div>
                <div class="container">
                    <div class="row align-items-center justify-content-lg-start justify-content-between">
                        <div class="col-auto d-xxl-none d-block">
                            <div class="header-logo">
                                <a href="{{ route('index') }}"><img src="{{ asset('assets/construz-new/img/logo.svg') }}" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-auto ms-auto ms-xxl-0">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <ul>
                                    <li class="menu-item-has-children">
                                        <a href="#">ACCUEIL</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item-has-children">
                                                <a href="#">Multipage</a>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="{{ route('index') }}">Accueil</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Home 02</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Home 03</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Home 04</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('index') }}">Accueil</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="#">Onepage</a>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="#">Home 01 Onepage</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Home 02 Onepage</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Home 03 Onepage</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Home 04 Onepage</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Home 05 Onepage</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ route('kalystrat.apropos') }}">À PROPOS</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">NOS FILIALES</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('service') }}">Service</a></li>
                                            <li><a href="{{ route('kalystrat.filiale', 'fondations') }}">Filiale</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">PAGES</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('project') }}">Project Page</a></li>
                                            <li><a href="{{ route('project') }}">Projet</a></li>
                                            <li><a href="#">Équipe</a></li>
                                            <li><a href="#">Membre</a></li>
                                            <li><a href="#">Boutique</a></li>
                                            <li><a href="#">Produit</a></li>
                                            <li><a href="#">Cart</a></li>
                                            <li><a href="#">Checkout</a></li>
                                            <li><a href="#">Wishlist</a></li>
                                        </ul>
                                    </li>  
                                    <li class="menu-item-has-children">
                                        <a href="#">BLOG</a>
                                        <ul class="sub-menu">
                                            <li><a href="#">News</a></li>
                                            <li><a href="#">News Details</a></li>
                                        </ul>
                                    </li>
                                                                      
                                    <li>
                                        <a href="{{ route('contact') }}">NOUS JOINDRE</a>
                                    </li>
                                </ul>
                            </nav>
                            <div class="navbar-right d-inline-flex d-lg-none">
                                <button type="button" class="menu-toggle icon-btn"><i class="ri-menu-line"></i></button>
                            </div>
                        </div>
                        <div class="col-auto ms-auto d-xl-block d-none">
                            <div class="header-button">
                                <a href="{{ route('kalystrat.apropos') }}" class="btn">DEMANDER UNE SOUMISSION <i class="ri-arrow-right-up-line"></i></a>
                                <button type="button" class="search-btn searchBoxToggler simple-icon">
                                    <i class="ri-search-line"></i>
                                </button>
                                <button type="button" class="sidebar-btn sideMenuToggler simple-icon">
                                    <i class="ri-grid-fill"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="navbar-right-desc d-xxl-flex d-none" data-bg-src="{{ asset('assets/construz-new/img/bg/header-1-bg.png') }}">
                    <div class="icon-btn">
                        <i class="ri-phone-fill"></i>
                    </div>
                    <div class="navbar-right-desc-details">
                        <h6 class="title">Appelez-nous</h6>
                        <a class="link" href="tel:+15815786145">1-581-578-6145</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--==============================
    Breadcumb
    ============================== -->
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('assets/img/kalystrat/hero-skyline.jpg') }}">
        <div class="section-animation-shape1-1 shape-mockup animation-infinite" data-top="0" data-bg-src="{{ asset('assets/construz-new/img/shape/global-line-shape1.png') }}">
        </div>
        <!-- bg animated image/ -->   
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcumb-content">
                        <h1 class="breadcumb-title">À propos</h1>
                        <ul class="breadcumb-menu">
                            <li><a href="{{ route('index') }}"><i class="ri-home-4-fill"></i> HOME</a></li>
                            <li class="active">À PROPOS</li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <!--==============================
    About Area  
    ==============================-->
    <div class="about-area-2 space-top overflow-hidden">
        <div class="container">
            <div class="row gx-60 align-items-center flex-row-reverse">
                <div class="col-xl-6">
                    <div class="about-thumb2 mb-60 mb-xl-0"> 
                        <div class="about-img-1">
                            <img src="{{ asset('assets/img/kalystrat/about-strategy.jpg') }}" alt="img">
                        </div>
                        <div class="about-counter-wrap style2 jump-reverse">
                            <div class="about-counter-wrap-bg"><img src="{{ asset('assets/construz-new/img/normal/about_shape_2-2.png') }}" alt="img"></div>
                            <div class="about-counter-icon"><img src="{{ asset('assets/construz-new/img/hero/hero_experience_wrap_icon_1_1.png') }}" alt="img"></div>
                            <h3 class="about-counter-number"><span class="counter-number">40</span>+</h3>
                            <p class="about-counter-text">Années d'expérience</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="title-area mb-25">
                        <span class="sub-title"><img src="{{ asset('assets/construz-new/img/icon/section-subtitle-icon.svg') }}" alt="img">À propos</span>
                        <h2 class="sec-title">Nous construisons tout ce dont vous avez besoin</h2>
                        <p class="sec-text">6 filiales spécialisées en synergie sous une marque unifiée. De la fondation à la livraison clés en main au Québec.  
                        </p>
                    </div>
                    <div class="checklist mb-35">
                        <ul>
                            <li><img src="{{ asset('assets/construz-new/img/icon/about-checklsit-icon1-1.svg') }}" alt="img">Solutions complètes en construction et gestion
                            </li>
                            <li><img src="{{ asset('assets/construz-new/img/icon/about-checklsit-icon1-1.svg') }}" alt="img">Ingénieurs qualifiés pour concevoir et bâtir</li>
                        </ul>
                    </div>
                    <div class="about-grid-wrap">
                        <div class="icon">
                            <img src="{{ asset('assets/construz-new/img/icon/about-grid-icon1-1.svg') }}" alt="img">
                        </div>
                        <div class="about-grid-details">
                            <h4 class="title">Notre mission</h4>
                            <p class="text">Excellence opérationnelle, qualité et fiabilité sur tous nos projets </p>
                        </div>
                    </div>
                    <div class="about-grid-wrap">
                        <div class="icon">
                            <img src="{{ asset('assets/construz-new/img/icon/about-grid-icon1-2.svg') }}" alt="img">
                        </div>
                        <div class="about-grid-details">
                            <h4 class="title">Notre vision</h4>
                            <p class="text">Excellence opérationnelle, qualité et fiabilité sur tous nos projets </p>
                        </div>
                    </div>
                    <div class="btn-group mt-60">
                        <a href="{{ route('kalystrat.apropos') }}" class="btn style3">Découvrir l'entreprise <i class="ri-arrow-right-up-line"></i></a>
                    </div>                
                </div>
            </div>
        </div>
    </div>   

    <!--==============================
    Why Choose Area 01  
    ==============================-->
    <div class="space-top text-center overflow-hidden">
        <div class="container">
            <div class="title-area text-center">
                <div class="shadow-title">Pourquoi Kalystrat</div>
                <span class="sub-title"><img src="{{ asset('assets/construz-new/img/icon/section-subtitle-icon.svg') }}" alt="img"> Pourquoi nous</span>
                <h2 class="sec-title">Six filiales, une seule promesse</h2>
            </div>
            <div class="row gy-50 align-items-center">
                <div class="col-xl-4 col-md-6">
                    <div class="wcu-card-wrap left-align">
                        <div class="wcu-card">
                            <div class="wcu-card-icon">
                                <img src="{{ asset('assets/construz-new/img/icon/why-icon1-1.svg') }}" alt="img">
                            </div>
                            <div class="wcu-card-details">
                                <h4 class="wcu-card-title">Intégration verticale</h4>
                                <p class="wcu-card-text">De l excavation à la finition : chaque étape executée par notre équipe interne.</p>
                            </div>
                        </div>
                        <div class="wcu-card">
                            <div class="wcu-card-icon">
                                <img src="{{ asset('assets/construz-new/img/icon/why-icon1-2.svg') }}" alt="img">
                            </div>
                            <div class="wcu-card-details">
                                <h4 class="wcu-card-title">Main-d œuvre interne</h4>
                                <p class="wcu-card-text">Notre filiale Placement fournit la main-d œuvre qualifiée à toutes les filiales.</p>
                            </div>
                        </div>
                        <div class="wcu-card">
                            <div class="wcu-card-icon">
                                <img src="{{ asset('assets/construz-new/img/icon/why-icon1-3.svg') }}" alt="img">
                            </div>
                            <div class="wcu-card-details">
                                <h4 class="wcu-card-title">Demande captive</h4>
                                <p class="wcu-card-text">Kalystrat Immobilier alimente un flux constant de projets pour les autres filiales.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 order-xl-3">
                    <div class="wcu-card-wrap right-align">
                        <div class="wcu-card">
                            <div class="wcu-card-icon">
                                <img src="{{ asset('assets/construz-new/img/icon/why-icon1-4.svg') }}" alt="img">
                            </div>
                            <div class="wcu-card-details">
                                <h4 class="wcu-card-title">Synergies opérationnelles</h4>
                                <p class="wcu-card-text">Six filiales qui se passent les chantiers sans coordination externe.</p>
                            </div>
                        </div>
                        <div class="wcu-card">
                            <div class="wcu-card-icon">
                                <img src="{{ asset('assets/construz-new/img/icon/why-icon1-5.svg') }}" alt="img">
                            </div>
                            <div class="wcu-card-details">
                                <h4 class="wcu-card-title">Cohérence de marque</h4>
                                <p class="wcu-card-text">Une marque unifiée qui inspire confiance aux clients et partenaires QC.</p>
                            </div>
                        </div>
                        <div class="wcu-card">
                            <div class="wcu-card-icon">
                                <img src="{{ asset('assets/construz-new/img/icon/why-icon1-6.svg') }}" alt="img">
                            </div>
                            <div class="wcu-card-details">
                                <h4 class="wcu-card-title">Gestion centralisée</h4>
                                <p class="wcu-card-text">Comptabilité, RH, juridique, marketing et TI mutualises au niveau de la holding.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="wcu-thumb1-1">
                        <img src="{{ asset('assets/img/kalystrat/about-strategy.jpg') }}" alt="img">
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!--==============================
    Process Area  
    ==============================-->
    <section class="process-area-1 space-top bg-attachment process-bg-half" data-bg-src="{{ asset('assets/construz-new/img/bg/process-bg1-1.png') }}" data-overlay="title" data-opacity="8">
        <div class="process_shape_1-1 movingX shape-mockup d-lg-block d-none"></div>
        <div class="process_shape_1-2 moving shape-mockup d-lg-block d-none"></div>
        <div class="process_shape_1-3 shape-mockup jump-reverse d-xl-block d-none" data-bottom="-50%" data-right="0">
            <img src="{{ asset('assets/construz-new/img/shape/sec-bg-shape1.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-4 col-md-6">
                    <div class="title-area text-md-start text-center">
                        <span class="sub-title text-white"><img src="{{ asset('assets/construz-new/img/icon/section-subtitle-icon.svg') }}" alt="img">Work Process</span>
                        <h2 class="sec-title text-white">Six filiales spécialisées en synergie</h2>
                    </div>
                </div>
                <div class="col-md-auto">
                    <div class="sec-btn text-center">
                        <a href="https://www.youtube.com/watch?v=Mp8IXI1kzvQ" class="popup-video play-btn-wrap">
                            Play Video
                            <span class="play-btn style2">
                                <i class="ri-play-fill"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="process-card-wrap">
                <div class="row gy-30 gx-30">
                    <div class="col-xl-3 col-md-6">
                        <div class="process-card">
                            <div class="process-card-number">
                                <span>
                                    01
                                </span>
                                STEP
                            </div>
                            <h4 class="process-card-title">Consultation et analyse du projet</h4>
                            <p class="process-card-text">Rencontre avec un expert Kalystrat pour cerner besoins, contraintes et budget.</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="process-card">
                            <div class="process-card-number">
                                <span>
                                    02
                                </span>
                                STEP
                            </div>
                            <h4 class="process-card-title">Conception et planification</h4>
                            <p class="process-card-text">Plans, devis détaillé et calendrier livrés sous 5 jours ouvrables.</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="process-card">
                            <div class="process-card-number">
                                <span>
                                    03
                                </span>
                                STEP
                            </div>
                            <h4 class="process-card-title">Suivi qualité chantier</h4>
                            <p class="process-card-text">Inspection RBQ/CCQ à chaque étape, communication transparente.</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="process-card">
                            <div class="process-card-number">
                                <span>
                                    04
                                </span>
                                STEP
                            </div>
                            <h4 class="process-card-title">Livraison clés en main</h4>
                            <p class="process-card-text">Réception finale, garantie 1 an pièces et main-d œuvre, suivi long terme.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 

    <!--==============================
    Counter Area 01  
    ==============================-->
    <div class="counter-area-1 space-bottom">
        <div class="section-animation-shape1-1 shape-mockup animation-infinite" data-bottom="0" data-bg-src="{{ asset('assets/construz-new/img/shape/global-line-shape2.png') }}">
        </div>
        <div class="container">
            <div class="row justify-content-between gy-40">
                <div class="col-auto">
                    <div class="counter-card">
                        <h2 class="counter-card_number"><span class="counter-number">26</span>k+</h2>
                        <p class="counter-card_text">Projets livrés</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="counter-card">
                        <h2 class="counter-card_number"><span class="counter-number">98</span>%</h2>
                        <p class="counter-card_text">Clients satisfaits</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="counter-card">
                        <h2 class="counter-card_number"><span class="counter-number">20</span>M</h2>
                        <p class="counter-card_text">Filiales en synergie</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="counter-card">
                        <h2 class="counter-card_number"><span class="counter-number">30</span>+</h2>
                        <p class="counter-card_text">Années d expertise</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
    Testimonial Area  
    ==============================-->
    <div class="testimonial-area-1 overflow-hidden space bg-smoke" data-bg-src="{{ asset('assets/img/kalystrat/about-bg.jpg') }}">
        <div class="testimonial_shape_1-1 shape-mockup jump d-xxl-block d-none" data-top="0" data-right="4%">
            <img src="{{ asset('assets/construz-new/img/shape/sec-bg-shape2.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="row gx-100 gy-60 flex-row-reverse">                
                <div class="col-xl-6">
                    <div class="title-area">
                        <span class="sub-title"><img src="{{ asset('assets/construz-new/img/icon/section-subtitle-icon.svg') }}" alt="img">Témoignages</span>
                        <h2 class="sec-title">Nos clients satisfaits</h2>
                    </div>
                    <div class="row global-carousel testi-slider1" data-slide-show="1">
                        <div class="col-lg-6">
                            <div class="testi-card">
                                <div class="quote-icon">
                                    <img src="{{ asset('assets/construz-new/img/icon/quote.svg') }}" alt="img">
                                </div>                                          
                                <div class="testi-card-thumb">
                                    <img src="{{ asset('assets/img/kalystrat/testi-1-engineer-suit.jpg') }}" alt="img">
                                </div>  
                                <div class="testi-card_content">
                                    <h4 class="testi-card_title">Coordination simplifiée</h4>
                                    <p class="testi-card_text">Kalystrat simplifie la coordination entre les corps de métier. On gagne du temps et de la qualité.</p>
                                    <div class="testi-card-profile">
                                        <h4 class="testi-profile-title">Promoteur résidentiel</h4>
                                        <span class="testi-profile-desig">CEO at Kalystrat</span>                                                                       
                                    </div>
                                </div>                        
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="testi-card">
                                <div class="quote-icon">
                                    <img src="{{ asset('assets/construz-new/img/icon/quote.svg') }}" alt="img">
                                </div>                                          
                                <div class="testi-card-thumb">
                                    <img src="{{ asset('assets/img/kalystrat/testi-2-business-woman.jpg') }}" alt="img">
                                </div>  
                                <div class="testi-card_content">
                                    <h4 class="testi-card_title">Coordination simplifiée</h4>
                                    <p class="testi-card_text">Leur intégration verticale réduit les imprévus sur chantier. Un partenaire fiable d un bout à l autre.</p>
                                    <div class="testi-card-profile">
                                        <h4 class="testi-profile-title">Entrepreneur général</h4>
                                        <span class="testi-profile-desig">CEO at Kalystrat</span>                                                                       
                                    </div>
                                </div>                        
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="testi-card">
                                <div class="quote-icon">
                                    <img src="{{ asset('assets/construz-new/img/icon/quote.svg') }}" alt="img">
                                </div>                                          
                                <div class="testi-card-thumb">
                                    <img src="{{ asset('assets/img/kalystrat/testi-3-worker-hardhat.jpg') }}" alt="img">
                                </div>  
                                <div class="testi-card_content">
                                    <h4 class="testi-card_title">Coordination simplifiée</h4>
                                    <p class="testi-card_text">Travailler avec Kalystrat, c est avoir un seul interlocuteur pour des livrables alignés sur les plans.</p>
                                    <div class="testi-card-profile">
                                        <h4 class="testi-profile-title">Architecte</h4>
                                        <span class="testi-profile-desig">CEO at Kalystrat</span>                                                                       
                                    </div>
                                </div>                        
                            </div>
                        </div>
                    </div> 
                    <div class="btn-wrap mt-70">
                        <div class="icon-box">
                            <button data-slick-prev=".testi-slider1" class="slick-arrow style2 default"><i class="ri-arrow-left-down-line"></i></button>
                            <button data-slick-next=".testi-slider1" class="slick-arrow style2 default"><i class="ri-arrow-right-up-line"></i></button>
                        </div>
                        <div class="client-group-thumb">
                            <img src="{{ asset('assets/img/kalystrat/testi-1-engineer-suit.jpg') }}" alt="img">
                        </div>
                        <div class="testi-counter-wrap">
                            <h3 class="testi-counter-number"><span class="counter-number">2</span>m+</h3>
                            <p class="testi-counter-text">Personnes recrutées</p>                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="testimonial-card" data-bg-src="{{ asset('assets/img/kalystrat/about-bg.jpg') }}">
                        <h3 class="testimonial-card-title">Une question?</h3>
                        <p class="testimonial-card-text">L'équipe Kalystrat a livré notre projet dans les délais avec une qualité irréprochable, du gros oeuvre à la finition.</p>
                        <div class="btn-group">
                            <a href="{{ route('contact') }}" class="btn style6">Nous joindre <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>         
        </div>
    </div>

    <!--==============================
        Footer Area
    ==============================-->
    <footer class="footer-wrapper footer-layout1" data-bg-src="{{ asset('assets/construz-new/img/bg/footer-bg1-1.png') }}">    
        <div class="container">
            <div class="footer-top-1">
                <div class="footer-logo">
                    <a href="{{ route('index') }}"><img src="{{ asset('assets/construz-new/img/logo-white.svg') }}" alt="Kalystrat"></a>
                </div>
                <div class="subscribe-box">
                    <p class="subscribe-box_text">Recevez nos nouvelles et chantiers récents.</p>
                    <form class="newsletter-form">
                        <input class="form-control" type="email" placeholder="Votre adresse courriel" required="">
                        <button type="submit" class="btn style2">S&apos;INSCRIRE<i class="ri-arrow-right-up-line"></i></button>
                    </form>
                </div>
            </div>
            <div class="widget-area">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-3">
                        <div class="widget widget-about footer-widget">
                            <h3 class="widget_title">À propos</h3>
                            <p class="about-text">Gestion Kalystrat Inc. est un holding québécois regroupant six filiales spécialisées en construction.</p>
                            <h4 class="about-year">Depuis 2026</h4>
                            <h5 class="about-subtitle">Nous sommes disponibles</h5>
                            <p class="about-text"><span class="text-theme">Lun-Ven :</span> 8 h 00 à 17 h 00</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Liens utiles</h3>
                            <div class="menu-all-pages-container grid-style">
                                <ul class="menu">
                                    <li><a href="{{ route('kalystrat.apropos') }}">À propos</a></li>
                                    <li><a href="{{ route('service') }}">Nos filiales</a></li>
                                    <li><a href="{{ route('service') }}">Blog</a></li>
                                    <li><a href="{{ route('service') }}">Réalisations</a></li>
                                    <li><a href="{{ route('kalystrat.faq') }}">FAQ</a></li>
                                </ul>
                                <ul class="menu">
                                    <li><a href="#">Notre équipe</a></li>
                                    <li><a href="{{ route('service') }}">Carrières</a></li>
                                    <li><a href="{{ route('service') }}">Témoignages</a></li>
                                    <li><a href="{{ route('contact') }}">Confidentialité</a></li>
                                    <li><a href="{{ route('contact') }}">Conditions</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget widget-contact">
                            <h3 class="widget_title">Adresse</h3>
                            <p class="contact-text">Québec, QC, Canada</p>
                            <h3 class="widget_title">Courriel</h3> 
                            <p class="text-white footer-text">Une question ?</p>   
                            <p class="footer-text"><a href="mailto:info@kalystrat.ca">info@kalystrat.ca</a></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">Téléphone</h3>
                            <p class="footer-text">
                                <a href="tel:+15815786145">1-581-578-6145</a>
                            </p>
                            <p class="footer-text">
                                <a href="tel:+15815786145">1-581-578-6145</a>
                            </p>
                            <h3 class="widget_title">Suivez-nous</h3>
                            <div class="social-btn style2">
                                <a href="https://www.twitter.com/"><i class="ri-twitter-x-line"></i></a>
                                <a href="https://instagram.com/"><i class="ri-instagram-line"></i></a>                           
                                <a href="https://facebook.com/"><i class="ri-facebook-fill"></i></a>
                                <a href="https://linkedin.com/"><i class="ri-linkedin-fill"></i></a>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright-wrap">
                <div class="row gy-3 justify-content-md-between justify-content-center">
                    <div class="col-auto align-self-center"><p class="copyright-text text-center">© 2026 <a href="#">Kalystrat</a>  |  Tous droits réservés</p></div>
                    <div class="col-auto">
                        <div class="footer-links">
                            <a href="{{ route('contact') }}">Conditions</a>
                            <a href="{{ route('contact') }}">Confidentialité</a>
                            <a href="{{ route('contact') }}">Nous joindre</a>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </footer>

    <!--********************************
			Code End  Here 
	******************************** -->

    <!-- Scroll To Top -->
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
        </svg>
    </div>

    <!--==============================
    All Js File
    ============================== -->
    <!-- Jquery -->
    <script src="{{ asset('assets/construz-new/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('assets/construz-new/js/slick.min.js') }}"></script>
    <!-- Range Slider -->
    <script src="{{ asset('assets/construz-new/js/jquery-ui.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/construz-new/js/bootstrap.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('assets/construz-new/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Counter Up -->
    <script src="{{ asset('assets/construz-new/js/jquery.counterup.min.js') }}"></script>
    <!-- Marquee -->
    <script src="{{ asset('assets/construz-new/js/jquery.marquee.min.js') }}"></script>
    <!-- Isotope Filter -->
    <script src="{{ asset('assets/construz-new/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/construz-new/js/isotope.pkgd.min.js') }}"></script>
    <!-- Nice Select -->
    <script src="{{ asset('assets/construz-new/js/nice-select.min.js') }}"></script>
    <!-- WOW -->
    <script src="{{ asset('assets/construz-new/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/construz-new/js/waypoints.min.js') }}"></script>
    
    <!-- Main Js File -->
    <script src="{{ asset('assets/construz-new/js/main.js') }}"></script>
</body>

</html>