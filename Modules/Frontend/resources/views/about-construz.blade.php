<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kalystrat — Holding québécois construction</title>
    <meta name="description" content="Kalystrat — Holding québécois construction">
    <meta name="keywords" content="Kalystrat — Holding québécois construction">
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
    <link rel="stylesheet" href="{{ asset('assets/construz-new/css/bootstrap.min.css') }}">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="assets/fonts/remixicon.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('assets/construz-new/css/magnific-popup.min.css') }}">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{ asset('assets/construz-new/css/slick.min.css') }}">
    <!-- Nice Select -->
    <link rel="stylesheet" href="{{ asset('assets/construz-new/css/nice-select.min.css') }}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/construz-new/css/style.css') }}">

    @include('frontend::partials-v2.schema-jsonld')
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
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('assets/construz-new/img/bg/breadcrumb-bg.png') }}">
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
                        <span class="sub-title"><img src="{{ asset('assets/construz-new/img/icon/section-subtitle-icon.svg') }}" alt="img">À PROPOS</span>
                        <h2 class="sec-title">NOUS CONSTRUISONS TOUT CE DONT VOUS AVEZ BESOIN</h2>
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
                <div class="shadow-title">Why Choose Us</div>
                <span class="sub-title"><img src="{{ asset('assets/construz-new/img/icon/section-subtitle-icon.svg') }}" alt="img"> Why Choose Us</span>
                <h2 class="sec-title">High Quality Innovate Design</h2>
            </div>
            <div class="row gy-50 align-items-center">
                <div class="col-xl-4 col-md-6">
                    <div class="wcu-card-wrap left-align">
                        <div class="wcu-card">
                            <div class="wcu-card-icon">
                                <img src="{{ asset('assets/construz-new/img/icon/why-icon1-1.svg') }}" alt="img">
                            </div>
                            <div class="wcu-card-details">
                                <h4 class="wcu-card-title">Technology</h4>
                                <p class="wcu-card-text">We are expert your all work is very nice waiting for next project.</p>
                            </div>
                        </div>
                        <div class="wcu-card">
                            <div class="wcu-card-icon">
                                <img src="{{ asset('assets/construz-new/img/icon/why-icon1-2.svg') }}" alt="img">
                            </div>
                            <div class="wcu-card-details">
                                <h4 class="wcu-card-title">Core Planning</h4>
                                <p class="wcu-card-text">All the Lorem Ipsum generators on the Internet tend to repeat predefined</p>
                            </div>
                        </div>
                        <div class="wcu-card">
                            <div class="wcu-card-icon">
                                <img src="{{ asset('assets/construz-new/img/icon/why-icon1-3.svg') }}" alt="img">
                            </div>
                            <div class="wcu-card-details">
                                <h4 class="wcu-card-title">Project Result</h4>
                                <p class="wcu-card-text">Six filiales qui collaborent en synergie pour livrer du concept aux clés en main.</p>
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
                                <h4 class="wcu-card-title">Trusted Clients</h4>
                                <p class="wcu-card-text">Passage of Lorem Ipsum, you need to be sure there isn't anything</p>
                            </div>
                        </div>
                        <div class="wcu-card">
                            <div class="wcu-card-icon">
                                <img src="{{ asset('assets/construz-new/img/icon/why-icon1-5.svg') }}" alt="img">
                            </div>
                            <div class="wcu-card-details">
                                <h4 class="wcu-card-title">Skilled Team</h4>
                                <p class="wcu-card-text">We are expert your all work is very nice waiting for next project.</p>
                            </div>
                        </div>
                        <div class="wcu-card">
                            <div class="wcu-card-icon">
                                <img src="{{ asset('assets/construz-new/img/icon/why-icon1-6.svg') }}" alt="img">
                            </div>
                            <div class="wcu-card-details">
                                <h4 class="wcu-card-title">Save Money</h4>
                                <p class="wcu-card-text">We are expert your all work is very nice waiting for next project.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="wcu-thumb1-1">
                        <img src="{{ asset('assets/construz-new/img/normal/why_1-1.png') }}" alt="img">
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
                            <h4 class="process-card-title">Meet and consultant about project</h4>
                            <p class="process-card-text">Industry standard dummy text took since the when an unknown</p>
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
                            <h4 class="process-card-title">Product design and planning</h4>
                            <p class="process-card-text">Known printer took a galley of type and scrambled it to make</p>
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
                            <h4 class="process-card-title">Testing and quality control</h4>
                            <p class="process-card-text">It has survived not only centuries also the leap into electronic</p>
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
                            <h4 class="process-card-title">Final assembly and project handover</h4>
                            <p class="process-card-text">Electronic typesetting conta the popularised in the 1960s</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 

    <!--==============================
    Portfolio Area  
    ==============================-->
    <div class="portfolio-area-1 space">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title"><img src="{{ asset('assets/construz-new/img/icon/section-subtitle-icon.svg') }}" alt="img">Recent Work</span>
                <h2 class="sec-title">Check our latest projects</h2>
                <p class="sec-text">We are the best construction agency in the world</p>
            </div>
            <div class="portfolio-slider1 overflow-hidden">
                <div class="row gy-30 gx-30 global-carousel" data-slide-show="1" data-dots="true" data-xl-dots="true" data-ml-dots="true" data-lg-dots="true" data-md-dots="true" data-center-mode="true" data-xl-center-mode="true" data-ml-center-mode="true" data-center-padding="265px" data-xl-center-padding="265px" data-ml-center-padding="200px">
                    <div class="col-lg-6">
                        <div class="portfolio-card">
                            <div class="portfolio-card-thumb">
                                <img src="{{ asset('assets/construz-new/img/project/project1_1.png') }}" alt="img">
                                <a class="icon-btn popup-image" href="assets/img/project/project1_1.png"><i class="ri-eye-line"></i></a>
                            </div>
                            <div class="portfolio-card-details">
                                <div class="media-left">
                                    <span class="portfolio-card-subtitle">Building</span>
                                    <h4 class="portfolio-card-title"><a href="{{ route('project') }}">General Construction</a></h4>
                                    <p class="portofolio-card-text">Building since 09,01,2024</p>
                                </div>  
                            </div>
                            <a href="{{ route('project') }}" class="btn">Explore Service <i class="ri-arrow-right-up-line"></i></a>                          
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="portfolio-card">
                            <div class="portfolio-card-thumb">
                                <img src="{{ asset('assets/construz-new/img/project/project1_2.png') }}" alt="img">
                                <a class="icon-btn popup-image" href="assets/img/project/project1_2.png"><i class="ri-eye-line"></i></a>
                            </div>
                            <div class="portfolio-card-details">
                                <div class="media-left">
                                    <span class="portfolio-card-subtitle">Building</span>
                                    <h4 class="portfolio-card-title"><a href="{{ route('project') }}">General Construction</a></h4>
                                    <p class="portofolio-card-text">Building since 09,01,2024</p>
                                </div>  
                            </div>
                            <a href="{{ route('project') }}" class="btn">Explore Service <i class="ri-arrow-right-up-line"></i></a>                          
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="portfolio-card">
                            <div class="portfolio-card-thumb">
                                <img src="{{ asset('assets/construz-new/img/project/project1_3.png') }}" alt="img">
                                <a class="icon-btn popup-image" href="assets/img/project/project1_3.png"><i class="ri-eye-line"></i></a>
                            </div>
                            <div class="portfolio-card-details">
                                <div class="media-left">
                                    <span class="portfolio-card-subtitle">Building</span>
                                    <h4 class="portfolio-card-title"><a href="{{ route('project') }}">General Construction</a></h4>
                                    <p class="portofolio-card-text">Building since 09,01,2024</p>
                                </div>  
                            </div>
                            <a href="{{ route('project') }}" class="btn">Explore Service <i class="ri-arrow-right-up-line"></i></a>                          
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="portfolio-card">
                            <div class="portfolio-card-thumb">
                                <img src="{{ asset('assets/construz-new/img/project/project1_1.png') }}" alt="img">
                                <a class="icon-btn popup-image" href="assets/img/project/project1_1.png"><i class="ri-eye-line"></i></a>
                            </div>
                            <div class="portfolio-card-details">
                                <div class="media-left">
                                    <span class="portfolio-card-subtitle">Building</span>
                                    <h4 class="portfolio-card-title"><a href="{{ route('project') }}">General Construction</a></h4>
                                    <p class="portofolio-card-text">Building since 09,01,2024</p>
                                </div>  
                            </div>
                            <a href="{{ route('project') }}" class="btn">Explore Service <i class="ri-arrow-right-up-line"></i></a>                          
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="portfolio-card">
                            <div class="portfolio-card-thumb">
                                <img src="{{ asset('assets/construz-new/img/project/project1_2.png') }}" alt="img">
                                <a class="icon-btn popup-image" href="assets/img/project/project1_2.png"><i class="ri-eye-line"></i></a>
                            </div>
                            <div class="portfolio-card-details">
                                <div class="media-left">
                                    <span class="portfolio-card-subtitle">Building</span>
                                    <h4 class="portfolio-card-title"><a href="{{ route('project') }}">General Construction</a></h4>
                                    <p class="portofolio-card-text">Building since 09,01,2024</p>
                                </div>  
                            </div>
                            <a href="{{ route('project') }}" class="btn">Explore Service <i class="ri-arrow-right-up-line"></i></a>                          
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="portfolio-card">
                            <div class="portfolio-card-thumb">
                                <img src="{{ asset('assets/construz-new/img/project/project1_3.png') }}" alt="img">
                                <a class="icon-btn popup-image" href="assets/img/project/project1_3.png"><i class="ri-eye-line"></i></a>
                            </div>
                            <div class="portfolio-card-details">
                                <div class="media-left">
                                    <span class="portfolio-card-subtitle">Building</span>
                                    <h4 class="portfolio-card-title"><a href="{{ route('project') }}">General Construction</a></h4>
                                    <p class="portofolio-card-text">Building since 09,01,2024</p>
                                </div>  
                            </div>
                            <a href="{{ route('project') }}" class="btn">Explore Service <i class="ri-arrow-right-up-line"></i></a>                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                        <p class="counter-card_text">Projects Completed</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="counter-card">
                        <h2 class="counter-card_number"><span class="counter-number">98</span>%</h2>
                        <p class="counter-card_text">Customers Satisfied</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="counter-card">
                        <h2 class="counter-card_number"><span class="counter-number">20</span>M</h2>
                        <p class="counter-card_text">Special Machinery</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="counter-card">
                        <h2 class="counter-card_number"><span class="counter-number">30</span>+</h2>
                        <p class="counter-card_text">Years in Business</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
    Testimonial Area  
    ==============================-->
    <div class="testimonial-area-1 overflow-hidden space bg-smoke" data-bg-src="{{ asset('assets/construz-new/img/bg/testimonial-bg1-1.png') }}">
        <div class="testimonial_shape_1-1 shape-mockup jump d-xxl-block d-none" data-top="0" data-right="4%">
            <img src="{{ asset('assets/construz-new/img/shape/sec-bg-shape2.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="row gx-100 gy-60 flex-row-reverse">                
                <div class="col-xl-6">
                    <div class="title-area">
                        <span class="sub-title"><img src="{{ asset('assets/construz-new/img/icon/section-subtitle-icon.svg') }}" alt="img">Témoignages</span>
                        <h2 class="sec-title">Our happy customers</h2>
                    </div>
                    <div class="row global-carousel testi-slider1" data-slide-show="1">
                        <div class="col-lg-6">
                            <div class="testi-card">
                                <div class="quote-icon">
                                    <img src="{{ asset('assets/construz-new/img/icon/quote.svg') }}" alt="img">
                                </div>                                          
                                <div class="testi-card-thumb">
                                    <img src="{{ asset('assets/construz-new/img/testimonial/testi_1_1.png') }}" alt="img">
                                </div>  
                                <div class="testi-card_content">
                                    <h4 class="testi-card_title">Best Company!</h4>
                                    <p class="testi-card_text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam. Odio ut sem nulla phar. Purus sit ame nus mas do eiusmod.</p>
                                    <div class="testi-card-profile">
                                        <h4 class="testi-profile-title">Aleesha brown.</h4>
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
                                    <img src="{{ asset('assets/construz-new/img/testimonial/testi_1_2.png') }}" alt="img">
                                </div>  
                                <div class="testi-card_content">
                                    <h4 class="testi-card_title">Best Company!</h4>
                                    <p class="testi-card_text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam. Odio ut sem nulla phar. Purus sit ame nus mas do eiusmod.</p>
                                    <div class="testi-card-profile">
                                        <h4 class="testi-profile-title">Aleesha brown.</h4>
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
                                    <img src="{{ asset('assets/construz-new/img/testimonial/testi_1_1.png') }}" alt="img">
                                </div>  
                                <div class="testi-card_content">
                                    <h4 class="testi-card_title">Best Company!</h4>
                                    <p class="testi-card_text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam. Odio ut sem nulla phar. Purus sit ame nus mas do eiusmod.</p>
                                    <div class="testi-card-profile">
                                        <h4 class="testi-profile-title">Aleesha brown.</h4>
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
                            <img src="{{ asset('assets/construz-new/img/normal/client_group_1-2.png') }}" alt="img">
                        </div>
                        <div class="testi-counter-wrap">
                            <h3 class="testi-counter-number"><span class="counter-number">2</span>m+</h3>
                            <p class="testi-counter-text">Success Peoples</p>                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="testimonial-card" data-bg-src="{{ asset('assets/construz-new/img/bg/testimonial-card-bg1-1.png') }}">
                        <h3 class="testimonial-card-title">Have you any questions?</h3>
                        <p class="testimonial-card-text">L'équipe Kalystrat a livré notre projet dans les délais avec une qualité irréprochable, du gros oeuvre à la finition.</p>
                        <div class="btn-group">
                            <a href="{{ route('contact') }}" class="btn style6">Contact with Us <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>         
        </div>
    </div>

    <!--==============================
    Team Area  
    ==============================-->
    <div class="team-area-1 space">
        <div class="section-animation-shape1-1 shape-mockup animation-infinite" data-bottom="0" data-bg-src="{{ asset('assets/construz-new/img/shape/global-line-shape2.png') }}">
        </div>
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-7 col-md-7">
                    <div class="title-area text-md-start text-center">
                        <span class="sub-title"><img src="{{ asset('assets/construz-new/img/icon/section-subtitle-icon.svg') }}" alt="img">Filiales</span>
                        <h2 class="sec-title">Meet our leadership</h2>
                    </div>
                </div>
                <div class="col-md-auto">
                    <div class="sec-btn">
                        <a href="{{ route('kalystrat.apropos') }}" class="btn">View All Members <i class="ri-arrow-right-up-line"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="row gy-30 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="team-card" data-bg-src="{{ asset('assets/construz-new/img/bg/team-card-bg1-1.png') }}">
                        <div class="team-card_content">
                            <h4 class="team-card_title"><a href="#">Penelopa Miller</a>
                            </h4>
                            <span class="team-card_desig">Head of Production</span>
                            <div class="team-social_wrap">
                                <div class="social-btn">
                                    <a href="https://facebook.com/"><i class="ri-facebook-fill"></i></a>
                                    <a href="https://www.twitter.com/"><i class="ri-twitter-x-line"></i></a>
                                    <a href="https://instagram.com/"><i class="ri-instagram-line"></i></a>                           
                                </div>
                            </div>
                        </div>
                        <div class="team-card_img">
                            <img src="{{ asset('assets/construz-new/img/team/team-1-1.png') }}" alt="img">
                        </div>
                        <a href="tel:0023745671379" class="contact-btn-wrap">
                            <span class="number">(+00) 347 456 1379</span>
                            <div class="icon-btn"><i class="ri-phone-fill"></i></div>
                        </a>                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="team-card" data-bg-src="{{ asset('assets/construz-new/img/bg/team-card-bg1-1.png') }}">
                        <div class="team-card_content">
                            <h4 class="team-card_title"><a href="#">Mark Ronaldo</a>
                            </h4>
                            <span class="team-card_desig">Sr. Engineer</span>
                            <div class="team-social_wrap">
                                <div class="social-btn">
                                    <a href="https://facebook.com/"><i class="ri-facebook-fill"></i></a>
                                    <a href="https://www.twitter.com/"><i class="ri-twitter-x-line"></i></a>
                                    <a href="https://instagram.com/"><i class="ri-instagram-line"></i></a>                           
                                </div>
                            </div>
                        </div>
                        <div class="team-card_img">
                            <img src="{{ asset('assets/construz-new/img/team/team-1-2.png') }}" alt="img">
                        </div>
                        <a href="tel:0023745671379" class="contact-btn-wrap">
                            <span class="number">(+00) 347 456 1379</span>
                            <div class="icon-btn"><i class="ri-phone-fill"></i></div>
                        </a>                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="team-card" data-bg-src="{{ asset('assets/construz-new/img/bg/team-card-bg1-1.png') }}">
                        <div class="team-card_content">
                            <h4 class="team-card_title"><a href="#">John Maxwell</a>
                            </h4>
                            <span class="team-card_desig">Project Management</span>
                            <div class="team-social_wrap">
                                <div class="social-btn">
                                    <a href="https://facebook.com/"><i class="ri-facebook-fill"></i></a>
                                    <a href="https://www.twitter.com/"><i class="ri-twitter-x-line"></i></a>
                                    <a href="https://instagram.com/"><i class="ri-instagram-line"></i></a>                           
                                </div>
                            </div>
                        </div>
                        <div class="team-card_img">
                            <img src="{{ asset('assets/construz-new/img/team/team-1-3.png') }}" alt="img">
                        </div>
                        <a href="tel:0023745671379" class="contact-btn-wrap">
                            <span class="number">(+00) 347 456 1379</span>
                            <div class="icon-btn"><i class="ri-phone-fill"></i></div>
                        </a>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
    Client Area  
    ==============================-->
    <div class="client-area-1 text-center space overflow-hidden" data-bg-src="{{ asset('assets/construz-new/img/bg/client-bg1-1.png') }}" data-overlay="title" data-opacity="9">
        <div class="client_shape_1-1 shape-mockup jump-reverse" data-bottom="0%" data-right="-6%">
            <img src="{{ asset('assets/construz-new/img/shape/client-bg-shape1.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title text-white"><img src="{{ asset('assets/construz-new/img/icon/section-subtitle-icon.svg') }}" alt="img">Happy Clients</span>
                <h2 class="sec-title text-white">Our trusted partners</h2>
            </div>
            <div class="row global-carousel client-slider1" data-slide-show="5" data-lg-slide-show="4" data-md-slide-show="3" data-sm-slide-show="2">
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-1.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-2.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-3.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-4.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-5.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-1.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-2.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-3.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-4.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-5.svg') }}" alt="img"></a>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <!--==============================
    Blog Area  
    ==============================-->
    <section class="blog-area-1 space">
        <div class="section-animation-shape1-1 shape-mockup animation-infinite" data-top="0" data-bg-src="{{ asset('assets/construz-new/img/shape/global-line-shape1.png') }}">
        </div>
        <div class="container">
            <div class="row justify-content-lg-between justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="title-area text-lg-start text-center">
                        <span class="sub-title"><img src="{{ asset('assets/construz-new/img/icon/section-subtitle-icon.svg') }}" alt="img">Latest News</span>
                        <h2 class="sec-title">Recent news and events</h2>
                    </div>
                </div>
                <div class="col-md-auto">
                    <div class="sec-btn">
                        <a href="#" class="btn style-border">View All News <i class="ri-arrow-right-up-line"></i></a>
                    </div>
                </div>
            </div>
            <div class="row global-carousel blog-slider slider-shadow" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="1" data-xs-slide-show="1" data-dots="false">
                <div class="col-md-6 col-lg-4">
                    <div class="blog-card">
                        <div class="blog-img">
                            <img src="{{ asset('assets/construz-new/img/blog/blog_1_1.png') }}" alt="blog image">
                            <div class="blog-date">
                                <a href="#"><span>17</span>JUN</a>
                                <div class="year">2024</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="#">By Rebecca</a>
                                <a href="#">Construction</a>
                            </div>
                            <h3 class="blog-title"><a href="#">How to hire a contractor home renovation service</a></h3>
                            <p class="blog-text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam. Odio ut sem nulla phar.</p>
                            <a href="#" class="btn">More Details <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="blog-card">
                        <div class="blog-img">
                            <img src="{{ asset('assets/construz-new/img/blog/blog_1_2.png') }}" alt="blog image">
                            <div class="blog-date">
                                <a href="#"><span>17</span>JUN</a>
                                <div class="year">2024</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="#">By Rebecca</a>
                                <a href="#">Construction</a>
                            </div>
                            <h3 class="blog-title"><a href="#">Started to develop a specific testing programs</a></h3>
                            <p class="blog-text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam. Odio ut sem nulla phar.</p>
                            <a href="#" class="btn">More Details <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="blog-card">
                        <div class="blog-img">
                            <img src="{{ asset('assets/construz-new/img/blog/blog_1_3.png') }}" alt="blog image">
                            <div class="blog-date">
                                <a href="#"><span>17</span>JUN</a>
                                <div class="year">2024</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="#">By Rebecca</a>
                                <a href="#">Construction</a>
                            </div>
                            <h3 class="blog-title"><a href="#">How to stay motivated until a project is finished</a></h3>
                            <p class="blog-text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam. Odio ut sem nulla phar.</p>
                            <a href="#" class="btn">More Details <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="blog-card">
                        <div class="blog-img">
                            <img src="{{ asset('assets/construz-new/img/blog/blog_1_1.png') }}" alt="blog image">
                            <div class="blog-date">
                                <a href="#"><span>17</span>JUN</a>
                                <div class="year">2024</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="#">By Rebecca</a>
                                <a href="#">Construction</a>
                            </div>
                            <h3 class="blog-title"><a href="#">How to hire a contractor home renovation service</a></h3>
                            <p class="blog-text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam. Odio ut sem nulla phar.</p>
                            <a href="#" class="btn">More Details <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="blog-card">
                        <div class="blog-img">
                            <img src="{{ asset('assets/construz-new/img/blog/blog_1_2.png') }}" alt="blog image">
                            <div class="blog-date">
                                <a href="#"><span>17</span>JUN</a>
                                <div class="year">2024</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="#">By Rebecca</a>
                                <a href="#">Construction</a>
                            </div>
                            <h3 class="blog-title"><a href="#">Started to develop a specific testing programs</a></h3>
                            <p class="blog-text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam. Odio ut sem nulla phar.</p>
                            <a href="#" class="btn">More Details <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="blog-card">
                        <div class="blog-img">
                            <img src="{{ asset('assets/construz-new/img/blog/blog_1_3.png') }}" alt="blog image">
                            <div class="blog-date">
                                <a href="#"><span>17</span>JUN</a>
                                <div class="year">2024</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="#">By Rebecca</a>
                                <a href="#">Construction</a>
                            </div>
                            <h3 class="blog-title"><a href="#">How to stay motivated until a project is finished</a></h3>
                            <p class="blog-text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam. Odio ut sem nulla phar.</p>
                            <a href="#" class="btn">More Details <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>   


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
                            <h5 class="about-subtitle">NOUS SOMMES DISPONIBLES</h5>
                            <p class="about-text"><span class="text-theme">Lun-Ven :</span> 10:00am to 07:30pm</p>
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