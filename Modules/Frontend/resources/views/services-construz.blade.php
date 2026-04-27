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
                    <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/logo.svg') }}" alt="logo"></a>
                </div>
                <p class="about-text mb-4">Gestion Kalystrat Inc. est un holding québécois regroupant six filiales spécialisées en construction.</p>
                
                <p class="footer-text">
                    <a href="tel:+15815786145"><i class="ri-phone-line me-2"></i>1-581-578-6145</a>
                </p>
                <p class="contact-text"><i class="ri-map-pin-line me-2"></i> Losangle, Street Road 24, New York, USA - 67452</p>
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
                <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/logo.svg') }}" alt="Kalystrat"></a>
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
                                        <a href="{{ route('frontend.home') }}">Accueil</a>
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
                                        <a href="{{ route('frontend.home') }}">Accueil</a>
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
                        <a href="{{ route('frontend.about') }}">About</a>
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
                            <li><a href="{{ route('frontend.portfolio') }}">Projects</a></li>
                            <li><a href="{{ route('frontend.portfolio') }}">Projet</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Service</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('frontend.services') }}">Service</a></li>
                            <li><a href="{{ route('frontend.filiale', 'fondations') }}">Filiale</a></li>
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
                        <a href="{{ route('frontend.contact') }}">Contact</a>
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
                    <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/logo.svg') }}" alt="logo"></a>
                </div>
                <div class="logo-bg"></div>
                <div class="container">
                    <div class="row align-items-center justify-content-lg-start justify-content-between">
                        <div class="col-auto d-xxl-none d-block">
                            <div class="header-logo">
                                <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/logo.svg') }}" alt="logo"></a>
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
                                                        <a href="{{ route('frontend.home') }}">Accueil</a>
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
                                                        <a href="{{ route('frontend.home') }}">Accueil</a>
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
                                        <a href="{{ route('frontend.about') }}">À PROPOS</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">NOS FILIALES</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('frontend.services') }}">Service</a></li>
                                            <li><a href="{{ route('frontend.filiale', 'fondations') }}">Filiale</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">PAGES</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('frontend.portfolio') }}">Project Page</a></li>
                                            <li><a href="{{ route('frontend.portfolio') }}">Projet</a></li>
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
                                        <a href="{{ route('frontend.contact') }}">NOUS JOINDRE</a>
                                    </li>
                                </ul>
                            </nav>
                            <div class="navbar-right d-inline-flex d-lg-none">
                                <button type="button" class="menu-toggle icon-btn"><i class="ri-menu-line"></i></button>
                            </div>
                        </div>
                        <div class="col-auto ms-auto d-xl-block d-none">
                            <div class="header-button">
                                <a href="{{ route('frontend.about') }}" class="btn">DEMANDER UNE SOUMISSION <i class="ri-arrow-right-up-line"></i></a>
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
                        <a class="link" href="tel:+2590256215">1-581-578-6145</a>
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
                        <h1 class="breadcumb-title">Nos filiales</h1>
                        <ul class="breadcumb-menu">
                            <li><a href="{{ route('frontend.home') }}"><i class="ri-home-4-fill"></i> HOME</a></li>
                            <li class="active">OUR SERVICES </li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <!--==============================
    Service Area 01  
    ==============================-->
    <div class="service-area-4 space-top overflow-hidden">
        <div class="container">
            <div class="row gy-30 gx-30">
                <div class="col-xl-4 col-md-6">
                    <div class="title-area mb-0 text-md-start text-center">
                        <span class="sub-title"><img src="{{ asset('assets/construz-new/img/icon/section-subtitle-icon.svg') }}" alt="img"> What We Do</span>
                        <h2 class="sec-title">Six filiales spécialisées en synergie</h2>
                        <p>We craft unique digital experiences. With more than 7 years of expertise we design and code clean</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="service-card style3">
                        <div class="service-card-shadow-text">
                            SERVICES - 01
                        </div>
                        <div class="service-card_content">
                            <div class="service-card_icon">
                                <img src="{{ asset('assets/construz-new/img/icon/service-icon1-1.png') }}" alt="img">
                            </div>
                            <h4 class="service-card_title"><a href="{{ route('frontend.filiale', 'fondations') }}">Kalystrat Fondations</a></h4>
                            <p class="service-card_text">There are many passages of lorem ipsum available</p>
                            <div class="btn-wrap">
                                <div class="icon-btn"><i class="ri-arrow-right-up-line"></i></div>
                                <a href="{{ route('frontend.filiale', 'fondations') }}" class="btn">Explore Service <i class="ri-arrow-right-up-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="service-card style3">
                        <div class="service-card-shadow-text">
                            SERVICES - 02
                        </div>
                        <div class="service-card_content">
                            <div class="service-card_icon">
                                <img src="{{ asset('assets/construz-new/img/icon/service-icon1-2.png') }}" alt="img">
                            </div>
                            <h4 class="service-card_title"><a href="{{ route('frontend.filiale', 'fondations') }}">Kalystrat Structure</a></h4>
                            <p class="service-card_text">There are many passages of lorem ipsum available</p>
                            <div class="btn-wrap">
                                <div class="icon-btn"><i class="ri-arrow-right-up-line"></i></div>
                                <a href="{{ route('frontend.filiale', 'fondations') }}" class="btn">Explore Service <i class="ri-arrow-right-up-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="service-card style3">
                        <div class="service-card-shadow-text">
                            SERVICES - 03
                        </div>
                        <div class="service-card_content">
                            <div class="service-card_icon">
                                <img src="{{ asset('assets/construz-new/img/icon/service-icon1-3.png') }}" alt="img">
                            </div>
                            <h4 class="service-card_title"><a href="{{ route('frontend.filiale', 'fondations') }}">Kalystrat Toiture</a></h4>
                            <p class="service-card_text">There are many passages of lorem ipsum available</p>
                            <div class="btn-wrap">
                                <div class="icon-btn"><i class="ri-arrow-right-up-line"></i></div>
                                <a href="{{ route('frontend.filiale', 'fondations') }}" class="btn">Explore Service <i class="ri-arrow-right-up-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="service-card style3">
                        <div class="service-card-shadow-text">
                            SERVICES - 04
                        </div>
                        <div class="service-card_content">
                            <div class="service-card_icon">
                                <img src="{{ asset('assets/construz-new/img/icon/service-icon1-4.png') }}" alt="img">
                            </div>
                            <h4 class="service-card_title"><a href="{{ route('frontend.filiale', 'fondations') }}">Virtual design & build</a></h4>
                            <p class="service-card_text">There are many passages of lorem ipsum available</p>
                            <div class="btn-wrap">
                                <div class="icon-btn"><i class="ri-arrow-right-up-line"></i></div>
                                <a href="{{ route('frontend.filiale', 'fondations') }}" class="btn">Explore Service <i class="ri-arrow-right-up-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="service-card style3">
                        <div class="service-card-shadow-text">
                            SERVICES - 05
                        </div>
                        <div class="service-card_content">
                            <div class="service-card_icon">
                                <img src="{{ asset('assets/construz-new/img/icon/service-icon1-5.png') }}" alt="img">
                            </div>
                            <h4 class="service-card_title h5"><a href="{{ route('frontend.filiale', 'fondations') }}">Proconstruction</a></h4>
                            <p class="service-card_text">There are many passages of lorem ipsum available</p>
                            <div class="btn-wrap">
                                <div class="icon-btn"><i class="ri-arrow-right-up-line"></i></div>
                                <a href="{{ route('frontend.filiale', 'fondations') }}" class="btn">Explore Service <i class="ri-arrow-right-up-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
    Process Area  
    ==============================-->
    <section class="process-area-2 space overflow-hidden">
        <div class="container">
            <div class="row justify-content-between align-items-center gy-40">
                <div class="col-lg-6">
                    <div class="title-area text-md-start text-center">
                        <span class="sub-title"><img src="{{ asset('assets/construz-new/img/icon/section-subtitle-icon.svg') }}" alt="img">Our Benefits</span>
                        <h2 class="sec-title">Why choose us</h2>
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
    </section> 

    <!--==============================
    Testimonial Area  
    ==============================-->
    <div class="testimonial-area-3 overflow-hidden">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7">
                    <div class="title-area text-lg-start text-center">
                        <span class="sub-title"><img src="{{ asset('assets/construz-new/img/icon/section-subtitle-icon.svg') }}" alt="img"> Testimonials</span>
                        <h2 class="sec-title">What client saying about us</h2>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="sec-btn btn-wrap">
                        <div class="client-group-thumb">
                            <img src="{{ asset('assets/construz-new/img/normal/client_group_1-2.png') }}" alt="img">
                        </div>
                        <div class="testi-counter-wrap">
                            <h3 class="testi-counter-number"><span class="counter-number">2</span>m+</h3>
                            <p class="testi-counter-text">Success Peoples</p>                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row global-carousel testi-slider3 slider-shadow" data-slide-show="3" data-lg-slide-show="2" data-dots="true" data-xl-dots="true" data-ml-dots="true" data-center-mode="true" data-xl-center-mode="true" data-ml-center-mode="true">
                <div class="col-lg-4">
                    <div class="testi-card style3">
                        <div class="testi-card-thumb">
                            <img src="{{ asset('assets/construz-new/img/testimonial/testi_2_2.png') }}" alt="img">
                            <div class="media-body">
                                <h4 class="testi-card_title">Best Construction!</h4>
                                <div class="testi-card_review">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                            </div>                                       
                        </div>  
                        <div class="testi-card_content">
                            <p class="testi-card_text">We craft unique digital experiences. With more than 7 years of expertise we design and code clean.</p>
                            <div class="testi-card-profile">
                                <h4 class="testi-profile-title">Joshua Pul</h4>
                                <span class="testi-profile-desig">/ CEO Industry</span>                                                                       
                            </div>
                        </div>                        
                        <div class="quote-icon">
                            <img src="{{ asset('assets/construz-new/img/icon/quote3.svg') }}" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testi-card style3">
                        <div class="testi-card-thumb">
                            <img src="{{ asset('assets/construz-new/img/testimonial/testi_2_3.png') }}" alt="img">
                            <div class="media-body">
                                <h4 class="testi-card_title">Good Services!</h4>
                                <div class="testi-card_review">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                            </div>                                       
                        </div>  
                        <div class="testi-card_content">
                            <p class="testi-card_text">We craft unique digital experiences. With more than 7 years of expertise we design and code clean.</p>
                            <div class="testi-card-profile">
                                <h4 class="testi-profile-title">Aya Nikola</h4>
                                <span class="testi-profile-desig">/ Sr. Manager</span>                                                                       
                            </div>
                        </div>  
                        <div class="quote-icon">
                            <img src="{{ asset('assets/construz-new/img/icon/quote3.svg') }}" alt="img">
                        </div>                      
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testi-card style3">
                        <div class="testi-card-thumb">
                            <img src="{{ asset('assets/construz-new/img/testimonial/testi_2_1.png') }}" alt="img">
                            <div class="media-body">
                                <h4 class="testi-card_title">Best Company!</h4>
                                <div class="testi-card_review">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                            </div>                                       
                        </div>  
                        <div class="testi-card_content">
                            <p class="testi-card_text">We craft unique digital experiences. With more than 7 years of expertise we design and code clean.</p>
                            <div class="testi-card-profile">
                                <h4 class="testi-profile-title">Christopher</h4>
                                <span class="testi-profile-desig">/ Engineer</span>                                                                       
                            </div>
                        </div>  
                        <div class="quote-icon">
                            <img src="{{ asset('assets/construz-new/img/icon/quote3.svg') }}" alt="img">
                        </div>                      
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testi-card style3">
                        <div class="testi-card-thumb">
                            <img src="{{ asset('assets/construz-new/img/testimonial/testi_2_2.png') }}" alt="img">
                            <div class="media-body">
                                <h4 class="testi-card_title">Best Construction!</h4>
                                <div class="testi-card_review">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                            </div>                                       
                        </div>  
                        <div class="testi-card_content">
                            <p class="testi-card_text">We craft unique digital experiences. With more than 7 years of expertise we design and code clean.</p>
                            <div class="testi-card-profile">
                                <h4 class="testi-profile-title">Joshua Pul</h4>
                                <span class="testi-profile-desig">/ CEO Industry</span>                                                                       
                            </div>
                        </div>                        
                        <div class="quote-icon">
                            <img src="{{ asset('assets/construz-new/img/icon/quote3.svg') }}" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testi-card style3">
                        <div class="testi-card-thumb">
                            <img src="{{ asset('assets/construz-new/img/testimonial/testi_2_3.png') }}" alt="img">
                            <div class="media-body">
                                <h4 class="testi-card_title">Good Services!</h4>
                                <div class="testi-card_review">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                            </div>                                       
                        </div>  
                        <div class="testi-card_content">
                            <p class="testi-card_text">We craft unique digital experiences. With more than 7 years of expertise we design and code clean.</p>
                            <div class="testi-card-profile">
                                <h4 class="testi-profile-title">Aya Nikola</h4>
                                <span class="testi-profile-desig">/ Sr. Manager</span>                                                                       
                            </div>
                        </div>  
                        <div class="quote-icon">
                            <img src="{{ asset('assets/construz-new/img/icon/quote3.svg') }}" alt="img">
                        </div>                      
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testi-card style3">
                        <div class="testi-card-thumb">
                            <img src="{{ asset('assets/construz-new/img/testimonial/testi_2_1.png') }}" alt="img">
                            <div class="media-body">
                                <h4 class="testi-card_title">Best Company!</h4>
                                <div class="testi-card_review">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                            </div>                                       
                        </div>  
                        <div class="testi-card_content">
                            <p class="testi-card_text">We craft unique digital experiences. With more than 7 years of expertise we design and code clean.</p>
                            <div class="testi-card-profile">
                                <h4 class="testi-profile-title">Christopher</h4>
                                <span class="testi-profile-desig">/ Engineer</span>                                                                       
                            </div>
                        </div>  
                        <div class="quote-icon">
                            <img src="{{ asset('assets/construz-new/img/icon/quote3.svg') }}" alt="img">
                        </div>                      
                    </div>
                </div>
            </div>         
        </div>
    </div>

    <!--==============================
    Client Area  
    ==============================-->
    <div class="client-area-2 text-center space overflow-hidden">
        <div class="container">
            <div class="row global-carousel client-slider2" data-slide-show="5" data-lg-slide-show="4" data-md-slide-show="3" data-sm-slide-show="2">
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-2-1.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-2-2.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-2-3.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-2-4.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-2-5.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-2-1.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-2-2.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-2-3.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-2-4.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-2-5.svg') }}" alt="img"></a>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <!--==============================
    Contact Area  
    ==============================-->
    <section class="contact-area-2 space-bottom overflow-hidden">        
        <div class="container">
            <div class="contact-wrap2 space overflow-hidden" data-bg-src="{{ asset('assets/construz-new/img/bg/contact-bg3-1.png') }}">
                <div class="section-animation-shape1-1 shape-mockup animation-infinite" data-top="0" data-left="0" data-bg-src="{{ asset('assets/construz-new/img/shape/global-line-shape1.png') }}">
                </div>
                <div class="row gy-60 justify-content-lg-end justify-content-center">
                    <div class="col-xl-7">
                        <div class="contact-form-wrap">
                            <div class="title-area">
                                <span class="sub-title text-theme">Soumission gratuite <i class="ri-arrow-right-down-line"></i></span>
                                <h2 class="sec-title">Vous avez un projet ?</h2>
                            </div>
                            <form action="{{ route('frontend.contact.submit') }}" method="POST" class="contact-form ajax-contact">
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Nom complet *" autocomplete="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Courriel *" autocomplete="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="tel" class="form-control" name="number" id="number" placeholder="Téléphone" autocomplete="tel">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select name="subject" id="subject" class="single-select nice-select form-select">
                                                <option value="" disabled selected hidden>Sujet *</option>
                                                <option value="Web Design">Web Design</option>
                                                <option value="Web Development">Web Development</option>
                                                <option value="Engine Diagnostics">Engine Diagnostics</option>
                                                <option value="Digital Marketing">Digital Marketing</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group ">
                                            <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Décrivez votre projet..."></textarea>
                                        </div>
                                    </div>
                                    <div class="form-btn col-12">
                                        <button class="btn w-100">Envoyer ma soumission <i class="ri-arrow-right-up-line"></i></button>
                                    </div>
                                </div>
                                <p class="form-messages mb-0 mt-3"></p>
                            </form>
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
                    <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/logo-white.svg') }}" alt="Kalystrat"></a>
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
                                    <li><a href="{{ route('frontend.about') }}">À propos</a></li>
                                    <li><a href="{{ route('frontend.services') }}">Nos filiales</a></li>
                                    <li><a href="{{ route('frontend.services') }}">Blog</a></li>
                                    <li><a href="{{ route('frontend.services') }}">Réalisations</a></li>
                                    <li><a href="{{ route('frontend.faq') }}">FAQ</a></li>
                                </ul>
                                <ul class="menu">
                                    <li><a href="#">Notre équipe</a></li>
                                    <li><a href="{{ route('frontend.services') }}">Carrières</a></li>
                                    <li><a href="{{ route('frontend.services') }}">Témoignages</a></li>
                                    <li><a href="{{ route('frontend.contact') }}">Confidentialité</a></li>
                                    <li><a href="{{ route('frontend.contact') }}">Conditions</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget widget-contact">
                            <h3 class="widget_title">Adresse</h3>
                            <p class="contact-text">Losangle, Street Road 24, New York, USA - 67452</p>
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
                            <a href="{{ route('frontend.contact') }}">Conditions</a>
                            <a href="{{ route('frontend.contact') }}">Confidentialité</a>
                            <a href="{{ route('frontend.contact') }}">Nous joindre</a>
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