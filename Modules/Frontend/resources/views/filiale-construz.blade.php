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
                        <h1 class="breadcumb-title">Service Details</h1>
                        <ul class="breadcumb-menu">
                            <li><a href="{{ route('index') }}"><i class="ri-home-4-fill"></i> HOME</a></li>
                            <li><a href="{{ route('service') }}">OUR SERVICE</a></li>
                            <li class="active">SERVICE DETAILS </li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <!--==============================
    Service Details Area 
    ==============================-->
    <div class="service-details-area space-top overflow-hidden">
        <div class="container">
            <div class="row gy-30 gx-30">
                <div class="col-12">
                    <div class="single-page">
                        <div class="service-thumb mb-50">
                            <img class="w-100" src="{{ asset('assets/construz-new/img/service/service_details1_1.png') }}" alt="img">
                        </div>
                        <h2 class="sec-title mb-25">General Construction</h2>
                        <p class="mb-50">Industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leapinto electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release 
                            letraset sheets containing. Richard Clintock a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure latin words, consectetur, from a Lorem Ipsum passage.</p>
                        <div class="row gy-4 justify-content-center">
                            <div class="col-xl-4 col-lg-6">
                                <div class="service-card style4">
                                    <div class="service-card_icon">
                                        <img src="{{ asset('assets/construz-new/img/icon/service-icon1-1.png') }}" alt="img">
                                    </div>
                                    <div class="service-card_content">
                                        <h4 class="service-card_title"><a href="{{ route('kalystrat.filiale', 'fondations') }}">Full Principal Contractor service</a></h4>
                                        <p class="service-card_text">There are many passages of lorem ipsum available</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6">
                                <div class="service-card style4">
                                    <div class="service-card_icon">
                                        <img src="{{ asset('assets/construz-new/img/icon/service-icon1-2.png') }}" alt="img">
                                    </div>
                                    <div class="service-card_content">
                                        <h4 class="service-card_title"><a href="{{ route('kalystrat.filiale', 'fondations') }}">Full-time Onsite Supervision</a></h4>
                                        <p class="service-card_text">There are many passages of lorem ipsum available</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6">
                                <div class="service-card style4">
                                    <div class="service-card_icon">
                                        <img src="{{ asset('assets/construz-new/img/icon/service-icon1-3.png') }}" alt="img">
                                    </div>
                                    <div class="service-card_content">
                                        <h4 class="service-card_title"><a href="{{ route('kalystrat.filiale', 'fondations') }}">Timber and steel frame construction</a></h4>
                                        <p class="service-card_text">There are many passages of lorem ipsum available</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-60 mb-60">
                            <div class="row justify-content-between align-items-center gy-40">
                                <div class="col-lg-6">
                                    <div class="title-area text-md-start text-center">
                                        <h2 class="sec-title">Awesome Benefits</h2>
                                    </div>
                                    <div class="process-thumb2-1">
                                        <img src="{{ asset('assets/construz-new/img/normal/process-thumb2-1.png') }}" alt="img">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="process-grid-list style2">
                                        <div class="process-grid-list-bg-text">
                                            BENEFIT
                                        </div>
                                        <div class="process-grid">
                                            <div class="process-grid-number">01</div>
                                            <div class="process-grid-details">
                                                <h3 class="process-grid-title">Advanced Technology </h3>
                                                <p class="process-grid-text">We craft unique digital experiences. With more years of expertise we design </p>
                                            </div>
                                        </div>
                                        <div class="process-grid">
                                            <div class="process-grid-number">02</div>
                                            <div class="process-grid-details">
                                                <h3 class="process-grid-title">Trusted Company </h3>
                                                <p class="process-grid-text">We craft unique digital experiences. With more years of expertise we design </p>
                                            </div>
                                        </div>
                                        <div class="process-grid">
                                            <div class="process-grid-number">03</div>
                                            <div class="process-grid-details">
                                                <h3 class="process-grid-title">Professional Teams </h3>
                                                <p class="process-grid-text">We craft unique digital experiences. With more years of expertise we design </p>
                                            </div>
                                        </div>
                                        <div class="process-grid">
                                            <div class="process-grid-number">04</div>
                                            <div class="process-grid-details">
                                                <h3 class="process-grid-title">Stylistic formula method</h3>
                                                <p class="process-grid-text">We craft unique digital experiences. With more years of expertise we design </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-end gy-40 justify-content-between">
                            <div class="col-xl-6">
                                <h3 class="fw-semibold">Solutions & Planning</h3>
                                <p>Industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leapinto electronic typesetting.</p>
                                <div class="mb-35">
                                    <div class="row gy-2">
                                        <div class="col-lg-6">
                                            <div class="checklist style6">
                                                <ul>
                                                    <li>Powerful Product Strategy
                                                    </li>
                                                    <li>Professional Team Works
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="checklist style6">
                                                <ul>
                                                    <li>Quality Control System
                                                    </li>
                                                    <li>Budget Friendly  Project
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="skill-feature style3">
                                    <h3 class="skill-feature_title">Construction Works</h3>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 89%;">
                                        </div>
                                        <div class="progress-value"><span class="counter-number">89</span>%</div>
                                    </div>
                                </div>
                                <div class="skill-feature style3">
                                    <h3 class="skill-feature_title">Building Services</h3>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 92%;">
                                        </div>
                                        <div class="progress-value"><span class="counter-number">92</span>%</div>
                                    </div>
                                </div>
                                <div class="skill-feature style3">
                                    <h3 class="skill-feature_title">Industrial Solution</h3>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 78%;">
                                        </div>
                                        <div class="progress-value"><span class="counter-number">78</span>%</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-5 col-xl-6">
                                <div class="video-wrap">
                                    <img class="w-100" src="{{ asset('assets/construz-new/img/service/service_details1_2.png') }}" alt="img">
                                    <a href="https://www.youtube.com/watch?v=Mp8IXI1kzvQ" class="play-btn style7 popup-video"><i class="ri-play-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
    FAQ Area 01  
    ==============================-->
    <div class="faq-area-1 space overflow-hidden">
        <div class="container">
            <div class="title-area text-center">
                <h2 class="sec-title">Your frequently asked question</h2>
            </div>
            <div class="row gy-50 gx-50 justify-content-center">
                <div class="col-xl-8">
                    <div class="accordion-area accordion" id="faqAccordion">

                        <div class="accordion-card active">
                            <div class="accordion-header" id="collapse-item-1">
                                <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1"> Prepare a construction project schedule?</button>
                            </div>
                            <div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="collapse-item-1" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">The point of using lorem ipsum is that has more-or-less packages normal commercial management in construction ensures the planning, execution and coordination of a construction project finish these  specific projects.</p>
                                </div>
                            </div>
                        </div>
    
    
                        <div class="accordion-card ">
                            <div class="accordion-header" id="collapse-item-2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2"> Product Design and Planning!</button>
                            </div>
                            <div id="collapse-2" class="accordion-collapse collapse " aria-labelledby="collapse-item-2" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">The point of using lorem ipsum is that has more-or-less packages normal commercial management in construction ensures the planning, execution and coordination of a construction project finish these  specific projects.</p>
                                </div>
                            </div>
                        </div>
    
    
                        <div class="accordion-card ">
                            <div class="accordion-header" id="collapse-item-3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3"> What is commercial in construction?</button>
                            </div>
                            <div id="collapse-3" class="accordion-collapse collapse " aria-labelledby="collapse-item-3" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">The point of using lorem ipsum is that has more-or-less packages normal commercial management in construction ensures the planning, execution and coordination of a construction project finish these  specific projects.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-card ">
                            <div class="accordion-header" id="collapse-item-4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-4" aria-expanded="false" aria-controls="collapse-4"> Start a construction management?</button>
                            </div>
                            <div id="collapse-4" class="accordion-collapse collapse " aria-labelledby="collapse-item-4" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">The point of using lorem ipsum is that has more-or-less packages normal commercial management in construction ensures the planning, execution and coordination of a construction project finish these  specific projects.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-card ">
                            <div class="accordion-header" id="collapse-item-5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-5" aria-expanded="false" aria-controls="collapse-5"> How are payments handled and dealt with?</button>
                            </div>
                            <div id="collapse-5" class="accordion-collapse collapse " aria-labelledby="collapse-item-5" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">The point of using lorem ipsum is that has more-or-less packages normal commercial management in construction ensures the planning, execution and coordination of a construction project finish these  specific projects.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-card ">
                            <div class="accordion-header" id="collapse-item-6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-6" aria-expanded="false" aria-controls="collapse-6"> Measure quality in construction projects?</button>
                            </div>
                            <div id="collapse-6" class="accordion-collapse collapse " aria-labelledby="collapse-item-6" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">The point of using lorem ipsum is that has more-or-less packages normal commercial management in construction ensures the planning, execution and coordination of a construction project finish these  specific projects.</p>
                                </div>
                            </div>
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