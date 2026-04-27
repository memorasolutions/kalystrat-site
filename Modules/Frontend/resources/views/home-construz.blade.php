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
    <header class="nav-header header-layout4">
        <div class="sticky-wrapper">
            <!-- Main Menu Area -->
            <div class="menu-area">
                <div class="logo-bg"></div>
                <div class="container">
                    <div class="row align-items-center justify-content-lg-start justify-content-between">
                        <div class="col-auto">
                            <div class="header-logo">
                                <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/logo-white.svg') }}" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-auto m-lg-auto">
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
                        <div class="col-auto d-xl-block d-none">
                            <div class="header-button">
                                <div class="navbar-right-desc">
                                    <div class="icon-btn">
                                        <i class="ri-phone-fill"></i>
                                    </div>
                                    <div class="navbar-right-desc-details">
                                        <h6 class="title">Appelez-nous</h6>
                                        <a class="link" href="tel:+2590256215">1-581-578-6145</a>
                                    </div>
                                </div>
                                <a href="{{ route('frontend.about') }}" class="btn style2 d-xxl-flex d-none">DEMANDER UNE SOUMISSION <i class="ri-arrow-right-up-line"></i></a>
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
                
            </div>
        </div>
    </header>

    <!--==============================
    Hero Area
    ==============================-->
    <div class="hero-wrapper hero-5" id="hero">
        <div class="hero_shape_5_1">
            <img src="{{ asset('assets/construz-new/img/hero/hero_shape_5_1.png') }}" alt="img">
        </div>
        <div class="hero-slider5 global-carousel" data-slide-show="1" data-fade="true" data-dots="true">
            <div class="hero-slide" data-bg-src="{{ asset('assets/img/kalystrat/hero-skyline.jpg') }}">
                <div class="container">
                    <div class="hero-style5">
                        <div class="row align-items-center">
                            <div class="col-xl-8">
                                <div class="hero-rating-wrap" data-ani="slider-custom-anim-left" data-ani-delay="0.1s">
                                    <div class="single-rating-wrap">
                                        <div class="rating">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                        </div>
                                        <div class="rating-text">
                                            <img src="{{ asset('assets/construz-new/img/icon/google-logo.svg') }}" alt="img"> 4.9 Rating
                                        </div>
                                    </div>
                                    <div class="single-rating-wrap">
                                        <div class="rating">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                        </div>
                                        <div class="rating-text">
                                            <img src="{{ asset('assets/construz-new/img/icon/facebook-logo.svg') }}" alt="img"> 5.0 Rating
                                        </div>
                                    </div>
                                    <div class="single-rating-wrap">
                                        <div class="rating">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                        </div>
                                        <div class="rating-text">
                                            <img src="{{ asset('assets/construz-new/img/icon/construz-logo.svg') }}" alt="img"> A+ Rating
                                        </div>
                                    </div>
                                </div>
                                <h1 class="hero-title" data-ani="slider-custom-anim-left" data-ani-delay="0.1s">Holding québécois</h1>
                                <h1 class="hero-title" data-ani="slider-custom-anim-left" data-ani-delay="0.2s">en construction</h1>
                                <p class="hero-text" data-ani="slider-custom-anim-left" data-ani-delay="0.2s">6 filiales spécialisées en synergie sous une marque unifiée. De la fondation à la livraison clés en main au Québec.</p>
                                <div class="btn-group" data-ani="slider-custom-anim-left" data-ani-delay="0.4s">
                                    <a href="{{ route('frontend.about') }}" class="btn style2">DEMANDER UNE SOUMISSION <i class="ri-arrow-right-up-line"></i></a>
                                </div>
                            </div>
                            
                        </div>
                    </div>                
                </div>
            </div>
            <div class="hero-slide" data-bg-src="{{ asset('assets/img/kalystrat/hero-bg.jpg') }}">
                <div class="container">
                    <div class="hero-style5">
                        <div class="row align-items-center">
                            <div class="col-xl-8">
                                <div class="hero-rating-wrap" data-ani="slider-custom-anim-left" data-ani-delay="0.1s">
                                    <div class="single-rating-wrap">
                                        <div class="rating">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                        </div>
                                        <div class="rating-text">
                                            <img src="{{ asset('assets/construz-new/img/icon/google-logo.svg') }}" alt="img"> 4.9 Rating
                                        </div>
                                    </div>
                                    <div class="single-rating-wrap">
                                        <div class="rating">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                        </div>
                                        <div class="rating-text">
                                            <img src="{{ asset('assets/construz-new/img/icon/facebook-logo.svg') }}" alt="img"> 5.0 Rating
                                        </div>
                                    </div>
                                    <div class="single-rating-wrap">
                                        <div class="rating">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                        </div>
                                        <div class="rating-text">
                                            <img src="{{ asset('assets/construz-new/img/icon/construz-logo.svg') }}" alt="img"> A+ Rating
                                        </div>
                                    </div>
                                </div>
                                <h1 class="hero-title" data-ani="slider-custom-anim-left" data-ani-delay="0.1s">Holding québécois</h1>
                                <h1 class="hero-title" data-ani="slider-custom-anim-left" data-ani-delay="0.2s">en construction</h1>
                                <p class="hero-text" data-ani="slider-custom-anim-left" data-ani-delay="0.2s">6 filiales spécialisées en synergie sous une marque unifiée. De la fondation à la livraison clés en main au Québec.</p>
                                <div class="btn-group" data-ani="slider-custom-anim-left" data-ani-delay="0.4s">
                                    <a href="{{ route('frontend.about') }}" class="btn style2">DEMANDER UNE SOUMISSION <i class="ri-arrow-right-up-line"></i></a>
                                </div>
                            </div>
                            
                        </div>
                    </div>                
                </div>
            </div>
            <div class="hero-slide" data-bg-src="{{ asset('assets/img/kalystrat/about-bg.jpg') }}">
                <div class="container">
                    <div class="hero-style5">
                        <div class="row align-items-center">
                            <div class="col-xl-8">
                                <div class="hero-rating-wrap" data-ani="slider-custom-anim-left" data-ani-delay="0.1s">
                                    <div class="single-rating-wrap">
                                        <div class="rating">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                        </div>
                                        <div class="rating-text">
                                            <img src="{{ asset('assets/construz-new/img/icon/google-logo.svg') }}" alt="img"> 4.9 Rating
                                        </div>
                                    </div>
                                    <div class="single-rating-wrap">
                                        <div class="rating">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                        </div>
                                        <div class="rating-text">
                                            <img src="{{ asset('assets/construz-new/img/icon/facebook-logo.svg') }}" alt="img"> 5.0 Rating
                                        </div>
                                    </div>
                                    <div class="single-rating-wrap">
                                        <div class="rating">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                        </div>
                                        <div class="rating-text">
                                            <img src="{{ asset('assets/construz-new/img/icon/construz-logo.svg') }}" alt="img"> A+ Rating
                                        </div>
                                    </div>
                                </div>
                                <h1 class="hero-title" data-ani="slider-custom-anim-left" data-ani-delay="0.1s">Holding québécois</h1>
                                <h1 class="hero-title" data-ani="slider-custom-anim-left" data-ani-delay="0.2s">en construction</h1>
                                <p class="hero-text" data-ani="slider-custom-anim-left" data-ani-delay="0.2s">6 filiales spécialisées en synergie sous une marque unifiée. De la fondation à la livraison clés en main au Québec.</p>
                                <div class="btn-group" data-ani="slider-custom-anim-left" data-ani-delay="0.4s">
                                    <a href="{{ route('frontend.about') }}" class="btn style2">DEMANDER UNE SOUMISSION <i class="ri-arrow-right-up-line"></i></a>
                                </div>
                            </div>
                            
                        </div>
                    </div>                
                </div>
            </div>
        </div>
    </div>
    <!--======== / Hero Section ========-->

    <!--==============================
    About Area  
    ==============================-->
    <div class="about-area-5 space">
        <div class="about-bg-shape5-1 shape-mockup" data-top="-170px" data-right="0">
            <img src="{{ asset('assets/construz-new/img/bg/about-bg-shape5-1.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="row gx-100 align-items-center">
                <div class="col-xl-5">
                    <div class="about-thumb5 mb-40 mb-xl-0"> 
                        <div class="about-img-1 mb-40">
                            <img src="{{ asset('assets/img/kalystrat/about-strategy.jpg') }}" alt="img">
                        </div>
                        <p>6 filiales spécialisées en synergie sous une marque unifiée. De la fondation à la livraison clés en main au Québec. </p>
                        <div class="btn-group mt-30">
                            <a href="{{ route('frontend.about') }}" class="btn">NOW MORE COMPANY <i class="ri-arrow-right-up-line"></i></a>
                        </div> 
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-wrap5">
                        <div class="title-area mb-40">
                            <span class="sub-title text-theme">ABOUT US <i class="ri-arrow-right-down-line"></i></span>
                            <h2 class="sec-title">We building everything that you needed</h2>
                            <p class="sec-text">6 filiales spécialisées en synergie sous une marque unifiée. De la fondation à la livraison clés en main au Québec. 
                            </p>
                            <div class="checklist mb-35 mt-30">
                                <ul>
                                    <li><img src="{{ asset('assets/construz-new/img/icon/about-checklsit-icon1-1.svg') }}" alt="img">Providing Solutions For Construction, Management
                                    </li>
                                    <li><img src="{{ asset('assets/construz-new/img/icon/about-checklsit-icon1-1.svg') }}" alt="img">Engineers design and build the structure</li>
                                </ul>
                            </div>
                            <div class="btn-wrap">
                                <div class="cta-grid-wrap">
                                    <div class="icon-btn">
                                        <i class="ri-phone-fill"></i>
                                    </div>
                                    <div class="media-body">
                                        <a class="link" href="tel:+2590256215">1-581-578-6145</a>
                                        <h6 class="title">Ned Help?</h6>
                                    </div>
                                </div>
                                <div class="about-author-wrap">
                                    <div class="author-thumb">
                                        <img src="{{ asset('assets/construz-new/img/normal/about_3-4.png') }}" alt="img">
                                    </div>
                                    <div class="media-body">
                                        <div class="author-sign">
                                            <img src="{{ asset('assets/construz-new/img/normal/about_4-sign.png') }}" alt="img">
                                        </div>
                                        <div class="author-text">Funder of Construz</div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        <div class="about-thumb5 mt-60 d-inline-block"> 
                            <div class="video-wrap about-img-2">
                                <img src="{{ asset('assets/img/kalystrat/about-meeting.jpg') }}" alt="img">
                                <a href="https://www.youtube.com/watch?v=Mp8IXI1kzvQ" class="play-btn style6 popup-video"><i class="ri-play-fill"></i></a>
                            </div>
                        </div>           
                    </div>
                </div>
            </div>
        </div>
    </div>  

    <!--==============================
    Why Choose Area 03  
    ==============================-->
    <div class="why-area-3 space-top overflow-hidden">
        <div class="why-sec-bg3-1" data-bg-src="{{ asset('assets/construz-new/img/bg/why-bg5-1.png') }}"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="title-area text-center">
                        <span class="sub-title text-theme">Notre approche <i class="ri-arrow-right-down-line"></i></span>
                        <h2 class="sec-title">We provide excellent service to our customers</h2>
                    </div>
                </div>
            </div>
            <div class="row gy-50">
                <div class="col-xl-4">
                    <ul class="why-tab-wrap nav nav-pills" role=tablist>
                        <li class="nav-item">
                          <button class="nav-link active" id="why-pill-1-tab" data-bs-toggle="pill" data-bs-target="#why-pill-1" type="button" role="tab" aria-controls="why-pill-1" aria-selected="true">Kalystrat Fondations <i class="ri-arrow-right-down-line"></i></button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="why-pill-2-tab" data-bs-toggle="pill" data-bs-target="#why-pill-2" type="button" role="tab" aria-controls="why-pill-2" aria-selected="false">Kalystrat Structure <i class="ri-arrow-right-down-line"></i></button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="why-pill-3-tab" data-bs-toggle="pill" data-bs-target="#why-pill-3" type="button" role="tab" aria-controls="why-pill-3" aria-selected="false">Kalystrat Toiture <i class="ri-arrow-right-down-line"></i></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="why-pill-4-tab" data-bs-toggle="pill" data-bs-target="#why-pill-4" type="button" role="tab" aria-controls="why-pill-4" aria-selected="false">Kalystrat Finition <i class="ri-arrow-right-down-line"></i></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="why-pill-5-tab" data-bs-toggle="pill" data-bs-target="#why-pill-5" type="button" role="tab" aria-controls="why-pill-5" aria-selected="false">Kalystrat Immobilier <i class="ri-arrow-right-down-line"></i></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="why-pill-6-tab" data-bs-toggle="pill" data-bs-target="#why-pill-6" type="button" role="tab" aria-controls="why-pill-6" aria-selected="false">Kalystrat Placement Construction <i class="ri-arrow-right-down-line"></i></button>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-8">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="why-pill-1" role="tabpanel" aria-labelledby="why-pill-1-tab">
                            <div class="row gx-80 gy-40 align-items-center">
                                <div class="col-lg-5">
                                    <div class="why-thumb-wrap3-1">
                                        <div class="why-tab-thumb">
                                            <img src="{{ asset('assets/construz-new/img/why/why-tab-thumb3-1.png') }}" alt="img">
                                        </div>
                                        <div class="why-text-wrap">
                                            <h4 class="title">Service</h4>
                                            <hr class="line">
                                            <div class="number">01</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="why-content-wrap">
                                        <h4 class="title">About this Service</h4>
                                        <h5 class="subtitle">Kalystrat Fondations</h5>
                                        <p class="text">Notre intégration verticale élimine les sous-traitants et garantit délais, qualité et coûts maîtrisés. Six filiales coordonnées sous une marque unifiée Kalystrat.</p>
                                        <div class="checklist mb-35">
                                            <ul>
                                                <li><img src="{{ asset('assets/construz-new/img/icon/about-checklsit-icon1-1.svg') }}" alt="img">Regularly Maintaining and Organizing your Tools
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group mt-35">
                                            <a href="{{ route('frontend.services') }}" class="btn style3">More Details <i class="ri-arrow-right-up-line"></i></a>
                                        </div>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="why-pill-2" role="tabpanel" aria-labelledby="why-pill-2-tab">
                            <div class="row gx-80 gy-40 align-items-center">
                                <div class="col-lg-5">
                                    <div class="why-thumb-wrap3-1">
                                        <div class="why-tab-thumb">
                                            <img src="{{ asset('assets/construz-new/img/why/why-tab-thumb3-2.png') }}" alt="img">
                                        </div>
                                        <div class="why-text-wrap">
                                            <h4 class="title">Service</h4>
                                            <hr class="line">
                                            <div class="number">02</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="why-content-wrap">
                                        <h4 class="title">About this Service</h4>
                                        <h5 class="subtitle">Kalystrat Structure</h5>
                                        <p class="text">Notre intégration verticale élimine les sous-traitants et garantit délais, qualité et coûts maîtrisés. Six filiales coordonnées sous une marque unifiée Kalystrat.</p>
                                        <div class="checklist mb-35">
                                            <ul>
                                                <li><img src="{{ asset('assets/construz-new/img/icon/about-checklsit-icon1-1.svg') }}" alt="img">Regularly Maintaining and Organizing your Tools
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group mt-35">
                                            <a href="{{ route('frontend.services') }}" class="btn style3">More Details <i class="ri-arrow-right-up-line"></i></a>
                                        </div>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="why-pill-3" role="tabpanel" aria-labelledby="why-pill-3-tab">
                            <div class="row gx-80 gy-40 align-items-center">
                                <div class="col-lg-5">
                                    <div class="why-thumb-wrap3-1">
                                        <div class="why-tab-thumb">
                                            <img src="{{ asset('assets/construz-new/img/why/why-tab-thumb3-1.png') }}" alt="img">
                                        </div>
                                        <div class="why-text-wrap">
                                            <h4 class="title">Service</h4>
                                            <hr class="line">
                                            <div class="number">03</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="why-content-wrap">
                                        <h4 class="title">About this Service</h4>
                                        <h5 class="subtitle">Kalystrat Toiture et Enveloppe</h5>
                                        <p class="text">Notre intégration verticale élimine les sous-traitants et garantit délais, qualité et coûts maîtrisés. Six filiales coordonnées sous une marque unifiée Kalystrat.</p>
                                        <div class="checklist mb-35">
                                            <ul>
                                                <li><img src="{{ asset('assets/construz-new/img/icon/about-checklsit-icon1-1.svg') }}" alt="img">Regularly Maintaining and Organizing your Tools
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group mt-35">
                                            <a href="{{ route('frontend.services') }}" class="btn style3">More Details <i class="ri-arrow-right-up-line"></i></a>
                                        </div>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="why-pill-4" role="tabpanel" aria-labelledby="why-pill-4-tab">
                            <div class="row gx-80 gy-40 align-items-center">
                                <div class="col-lg-5">
                                    <div class="why-thumb-wrap3-1">
                                        <div class="why-tab-thumb">
                                            <img src="{{ asset('assets/construz-new/img/why/why-tab-thumb3-2.png') }}" alt="img">
                                        </div>
                                        <div class="why-text-wrap">
                                            <h4 class="title">Service</h4>
                                            <hr class="line">
                                            <div class="number">04</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="why-content-wrap">
                                        <h4 class="title">About this Service</h4>
                                        <h5 class="subtitle">Kalystrat Finition Intérieure</h5>
                                        <p class="text">Notre intégration verticale élimine les sous-traitants et garantit délais, qualité et coûts maîtrisés. Six filiales coordonnées sous une marque unifiée Kalystrat.</p>
                                        <div class="checklist mb-35">
                                            <ul>
                                                <li><img src="{{ asset('assets/construz-new/img/icon/about-checklsit-icon1-1.svg') }}" alt="img">Regularly Maintaining and Organizing your Tools
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group mt-35">
                                            <a href="{{ route('frontend.services') }}" class="btn style3">More Details <i class="ri-arrow-right-up-line"></i></a>
                                        </div>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="why-pill-5" role="tabpanel" aria-labelledby="why-pill-5-tab">
                            <div class="row gx-80 gy-40 align-items-center">
                                <div class="col-lg-5">
                                    <div class="why-thumb-wrap3-1">
                                        <div class="why-tab-thumb">
                                            <img src="{{ asset('assets/construz-new/img/why/why-tab-thumb3-1.png') }}" alt="img">
                                        </div>
                                        <div class="why-text-wrap">
                                            <h4 class="title">Service</h4>
                                            <hr class="line">
                                            <div class="number">05</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="why-content-wrap">
                                        <h4 class="title">About this Service</h4>
                                        <h5 class="subtitle">Kalystrat Immobilier</h5>
                                        <p class="text">Notre intégration verticale élimine les sous-traitants et garantit délais, qualité et coûts maîtrisés. Six filiales coordonnées sous une marque unifiée Kalystrat.</p>
                                        <div class="checklist mb-35">
                                            <ul>
                                                <li><img src="{{ asset('assets/construz-new/img/icon/about-checklsit-icon1-1.svg') }}" alt="img">Regularly Maintaining and Organizing your Tools
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group mt-35">
                                            <a href="{{ route('frontend.services') }}" class="btn style3">More Details <i class="ri-arrow-right-up-line"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="why-pill-6" role="tabpanel" aria-labelledby="why-pill-6-tab">
                            <div class="row gx-80 gy-40 align-items-center">
                                <div class="col-lg-5">
                                    <div class="why-thumb-wrap3-1">
                                        <div class="why-tab-thumb">
                                            <img src="{{ asset('assets/construz-new/img/why/why-tab-thumb3-2.png') }}" alt="img">
                                        </div>
                                        <div class="why-text-wrap">
                                            <h4 class="title">Service</h4>
                                            <hr class="line">
                                            <div class="number">06</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="why-content-wrap">
                                        <h4 class="title">About this Service</h4>
                                        <h5 class="subtitle">Kalystrat Placement Construction</h5>
                                        <p class="text">Agence de placement de main-d'œuvre construction. Six filiales spécialisées approvisionnées en personnel qualifié, formé selon normes RBQ et CCQ.</p>
                                        <div class="checklist mb-35">
                                            <ul>
                                                <li><img src="{{ asset('assets/construz-new/img/icon/about-checklsit-icon1-1.svg') }}" alt="img">Personnel qualifié RBQ/CCQ — disponibilité 7j/7
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group mt-35">
                                            <a href="{{ route('frontend.filiale', 'placement') }}" class="btn style3">More Details <i class="ri-arrow-right-up-line"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>

    <!--==============================
    Benefit Area  
    ==============================-->
    <div class="benefit-area-5 space overflow-hidden">
        <div class="benefit-bg-shape5-1 shape-mockup" data-bottom="0" data-right="0">
            <img src="{{ asset('assets/construz-new/img/bg/benefit-bg-shape5-1.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="row gx-40 align-items-center">
                <div class="col-xl-6">
                    <div class="benefit-thumb5 mb-40 mb-xl-0"> 
                        <div class="benefit-img-1">
                            <img src="{{ asset('assets/img/kalystrat/about-meeting.jpg') }}" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="benefit-wrap5">
                        <div class="title-area mb-40">
                            <span class="sub-title text-theme">NOS AVANTAGES <i class="ri-arrow-right-down-line"></i></span>
                            <h2 class="sec-title">Reasons for why people 
                                choosing ‘Construz’</h2>
                            <p class="sec-text">Podcasting operational change management inside of workflows to establish a framework, taking seamless key performance indicators offline.
                            </p>
                            <h6 class="mt-20 fw-normal mb-30">Benefits of choosing our company:</h6>
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="single-benefit-wrap">
                                        <div class="single-benefit-icon">
                                            <img src="{{ asset('assets/construz-new/img/icon/benefit-icon1-1.svg') }}" alt="img">
                                        </div>
                                        <h4 class="single-benefit-title">Professional Engineers</h4>
                                    </div>
                                    <div class="single-benefit-wrap">
                                        <div class="single-benefit-icon">
                                            <img src="{{ asset('assets/construz-new/img/icon/benefit-icon1-2.svg') }}" alt="img">
                                        </div>
                                        <h4 class="single-benefit-title">Hassle-Free Service</h4>
                                    </div>
                                    <div class="single-benefit-wrap">
                                        <div class="single-benefit-icon">
                                            <img src="{{ asset('assets/construz-new/img/icon/benefit-icon1-3.svg') }}" alt="img">
                                        </div>
                                        <h4 class="single-benefit-title">10 years of experience</h4>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-benefit-wrap">
                                        <div class="single-benefit-icon">
                                            <img src="{{ asset('assets/construz-new/img/icon/benefit-icon1-4.svg') }}" alt="img">
                                        </div>
                                        <h4 class="single-benefit-title">Award Winning Company</h4>
                                    </div>
                                    <div class="single-benefit-wrap">
                                        <div class="single-benefit-icon">
                                            <img src="{{ asset('assets/construz-new/img/icon/benefit-icon1-5.svg') }}" alt="img">
                                        </div>
                                        <h4 class="single-benefit-title">Excellent Financing</h4>
                                    </div>
                                    <div class="single-benefit-wrap">
                                        <div class="single-benefit-icon">
                                            <img src="{{ asset('assets/construz-new/img/icon/benefit-icon1-6.svg') }}" alt="img">
                                        </div>
                                        <h4 class="single-benefit-title">Best Roofing Warranty</h4>
                                    </div>
                                </div>
                            </div>                            
                        </div>    
                                 
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <!--==============================
    Testimonial Area  
    ==============================-->
    <div class="testimonial-area-5 overflow-hidden space position-relative">
        <div class="testimonial-bg-thumb5-1" data-bg-src="{{ asset('assets/construz-new/img/bg/testimonial-bg5-1.png') }}"></div>
        <div class="testimonial-bg-thumb5-2" data-bg-src="{{ asset('assets/construz-new/img/bg/testimonial-bg5-2.png') }}"></div>
        <div class="container">
            <div class="row gx-100 gy-60">                
                <div class="col-xl-5 col-lg-6">
                    <div class="title-area">
                        <span class="sub-title text-theme">Témoignages <i class="ri-arrow-right-down-line"></i></span>
                        <h2 class="sec-title text-white">Témoignages clients</h2>
                    </div>
                    <div class="row global-carousel testi-slider5 dot-style2" data-slide-show="1" data-dots="true">
                        <div class="col-lg-6">
                            <div class="testi-card style5">
                                <div class="testi-card-profile">
                                    <div class="testi-card-thumb">
                                        <img src="{{ asset('assets/construz-new/img/testimonial/testi_5_1.png') }}" alt="img">
                                    </div> 
                                    <div class="testi-card-profile-details">
                                        <h4 class="testi-profile-title">Ali Salomon</h4>
                                        <span class="testi-profile-desig">Fondateur, président et directeur général</span>                                                                       
                                    </div>
                                </div>                                        
                                 
                                <div class="testi-card_content">
                                    <div class="testi-rating">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                    </div>
                                    <p class="testi-card_text">Notre engagement : excellence et qualité à chaque projet. Holding nouvellement constitué — premiers témoignages clients à venir suite aux livraisons des premiers chantiers.</p>
                                    <div class="quote-icon">
                                        <img src="{{ asset('assets/construz-new/img/icon/quote.svg') }}" alt="img">
                                    </div>  
                                </div>                        
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="testi-card style5">
                                <div class="testi-card-profile">
                                    <div class="testi-card-thumb">
                                        <img src="{{ asset('assets/construz-new/img/testimonial/testi_5_1.png') }}" alt="img">
                                    </div> 
                                    <div class="testi-card-profile-details">
                                        <h4 class="testi-profile-title">Ali Salomon</h4>
                                        <span class="testi-profile-desig">Fondateur, président et directeur général</span>                                                                       
                                    </div>
                                </div>                                        
                                 
                                <div class="testi-card_content">
                                    <div class="testi-rating">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                    </div>
                                    <p class="testi-card_text">Notre engagement : excellence et qualité à chaque projet. Holding nouvellement constitué — premiers témoignages clients à venir suite aux livraisons des premiers chantiers.</p>
                                    <div class="quote-icon">
                                        <img src="{{ asset('assets/construz-new/img/icon/quote.svg') }}" alt="img">
                                    </div>  
                                </div>                        
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="testi-card style5">
                                <div class="testi-card-profile">
                                    <div class="testi-card-thumb">
                                        <img src="{{ asset('assets/construz-new/img/testimonial/testi_5_1.png') }}" alt="img">
                                    </div> 
                                    <div class="testi-card-profile-details">
                                        <h4 class="testi-profile-title">Ali Salomon</h4>
                                        <span class="testi-profile-desig">Fondateur, président et directeur général</span>                                                                       
                                    </div>
                                </div>                                        
                                 
                                <div class="testi-card_content">
                                    <div class="testi-rating">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                    </div>
                                    <p class="testi-card_text">Notre engagement : excellence et qualité à chaque projet. Holding nouvellement constitué — premiers témoignages clients à venir suite aux livraisons des premiers chantiers.</p>
                                    <div class="quote-icon">
                                        <img src="{{ asset('assets/construz-new/img/icon/quote.svg') }}" alt="img">
                                    </div>  
                                </div>                        
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-6">
                    <div class="testi-client-group5">
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
        </div>
    </div>

    <!--==============================
    Award Area 1  
    ==============================-->
    <div class="award-area-1 space-top overflow-hidden" data-bg-src="{{ asset('assets/construz-new/img/bg/award-bg5-1.png') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="title-area text-center mb-50">
                        <span class="sub-title text-theme">Nos références <i class="ri-arrow-right-down-line"></i></span>
                        <h2 class="sec-title">Nos références et engagements</h2>  
                        <p>Podcasting operational change management inside of workflows to establish a framework, taking seamless key performance indicators offline.</p>                    
                    </div>
                </div>
            </div>
            <div class="row gy-4 gx-40 justify-content-xl-between justify-content-center">
                <div class="col-xxl-3 col-md-6">
                    <div class="award-card">
                        <div class="award-card-bg-shape">
                            <img src="{{ asset('assets/construz-new/img/bg/award-card-bg1-1.png') }}" alt="img">
                        </div>
                        <div class="award-card-thumb">
                            <img src="{{ asset('assets/construz-new/img/award/award1-1.png') }}" alt="img">
                        </div>
                        <div class="award-card-year">
                            <span>IN</span>
                            2024
                        </div>
                        <div class="award-card_content">
                            <h4 class="award-card_title">Site of the day</h4>
                            <p class="award-card_text">Winner</p>
                            <div class="award-card-tag">
                                Design Award
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="award-card">
                        <div class="award-card-bg-shape">
                            <img src="{{ asset('assets/construz-new/img/bg/award-card-bg1-1.png') }}" alt="img">
                        </div>
                        <div class="award-card-thumb">
                            <img src="{{ asset('assets/construz-new/img/award/award1-2.png') }}" alt="img">
                        </div>
                        <div class="award-card-year">
                            <span>IN</span>
                            2023
                        </div>
                        <div class="award-card_content">
                            <h4 class="award-card_title">Outstanding advisor</h4>
                            <p class="award-card_text">Winner</p>
                            <div class="award-card-tag">
                                USA Award
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="award-card">
                        <div class="award-card-bg-shape">
                            <img src="{{ asset('assets/construz-new/img/bg/award-card-bg1-1.png') }}" alt="img">
                        </div>
                        <div class="award-card-thumb">
                            <img src="{{ asset('assets/construz-new/img/award/award1-3.png') }}" alt="img">
                        </div>
                        <div class="award-card-year">
                            <span>IN</span>
                            2022
                        </div>
                        <div class="award-card_content">
                            <h4 class="award-card_title">Best choose company</h4>
                            <p class="award-card_text">Winner</p>
                            <div class="award-card-tag">
                                Best Award
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="award-card">
                        <div class="award-card-bg-shape">
                            <img src="{{ asset('assets/construz-new/img/bg/award-card-bg1-1.png') }}" alt="img">
                        </div>
                        <div class="award-card-thumb">
                            <img src="{{ asset('assets/construz-new/img/award/award1-4.png') }}" alt="img">
                        </div>
                        <div class="award-card-year">
                            <span>IN</span>
                            2021
                        </div>
                        <div class="award-card_content">
                            <h4 class="award-card_title">Best Consulting</h4>
                            <p class="award-card_text">Winner</p>
                            <div class="award-card-tag">
                                Unique Award
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!--==============================
    Contact Area  
    ==============================-->
    <section class="contact-area-2 space overflow-hidden">        
        <div class="container">
            <div class="contact-wrap2 space overflow-hidden" data-bg-src="{{ asset('assets/construz-new/img/bg/contact-bg4-1.png') }}">
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
    Portfolio Area  
    ==============================-->
    <div class="portfolio-area-5 overflow-hidden">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="title-area text-center">
                        <span class="sub-title text-theme">Nos projets <i class="ri-arrow-right-down-line"></i></span>
                        <h2 class="sec-title">Premiers chantiers à venir</h2>
                    </div>
                </div>
            </div>
            <div class="overflow-hidden">
                <div class="row gy-30 gx-30">
                    <div class="col-lg-8">
                        <div class="portfolio-card style5">
                            <div class="portfolio-card-thumb">
                                <img src="{{ asset('assets/img/kalystrat/project-residential.jpg') }}" alt="img">
                            </div>
                            <div class="portfolio-card-details">
                                <div class="media-left">
                                    <span class="portfolio-card-subtitle">Residential</span>
                                    <h4 class="portfolio-card-title"><a href="{{ route('frontend.portfolio') }}">Modern pattern style for house roof</a></h4>                     
                                </div>
                                <div class="btn-group">
                                    <a href="{{ route('frontend.portfolio') }}" class="btn style2">
                                        Explore Project <i class="ri-arrow-right-line"></i>
                                    </a> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="portfolio-card style5">
                            <div class="portfolio-card-thumb">
                                <img src="{{ asset('assets/img/kalystrat/project-blueprint.jpg') }}" alt="img">
                            </div>
                            <div class="portfolio-card-details">
                                <div class="media-left">
                                    <span class="portfolio-card-subtitle">Residential</span>
                                    <h4 class="portfolio-card-title"><a href="{{ route('frontend.portfolio') }}">Modern pattern style for house roof</a></h4>                     
                                </div>
                                <div class="btn-group">
                                    <a href="{{ route('frontend.portfolio') }}" class="btn style2">
                                        Explore Project <i class="ri-arrow-right-line"></i>
                                    </a> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="portfolio-card style5">
                            <div class="portfolio-card-thumb">
                                <img src="{{ asset('assets/img/kalystrat/project-commercial.jpg') }}" alt="img">
                            </div>
                            <div class="portfolio-card-details">
                                <div class="media-left">
                                    <span class="portfolio-card-subtitle">Residential</span>
                                    <h4 class="portfolio-card-title"><a href="{{ route('frontend.portfolio') }}">Modern pattern style for house roof</a></h4>                     
                                </div>
                                <div class="btn-group">
                                    <a href="{{ route('frontend.portfolio') }}" class="btn style2">
                                        Explore Project <i class="ri-arrow-right-line"></i>
                                    </a> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="portfolio-card style5">
                            <div class="portfolio-card-thumb">
                                <img src="{{ asset('assets/img/kalystrat/project-apartments.jpg') }}" alt="img">
                            </div>
                            <div class="portfolio-card-details">
                                <div class="media-left">
                                    <span class="portfolio-card-subtitle">Residential</span>
                                    <h4 class="portfolio-card-title"><a href="{{ route('frontend.portfolio') }}">Modern pattern style for house roof</a></h4>                     
                                </div>
                                <div class="btn-group">
                                    <a href="{{ route('frontend.portfolio') }}" class="btn style2">
                                        Explore Project <i class="ri-arrow-right-line"></i>
                                    </a> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="portfolio-card style5">
                            <div class="portfolio-card-thumb">
                                <img src="{{ asset('assets/img/kalystrat/about-meeting.jpg') }}" alt="img">
                            </div>
                            <div class="portfolio-card-details">
                                <div class="media-left">
                                    <span class="portfolio-card-subtitle">Residential</span>
                                    <h4 class="portfolio-card-title"><a href="{{ route('frontend.portfolio') }}">Modern pattern style for house roof</a></h4>                     
                                </div>
                                <div class="btn-group">
                                    <a href="{{ route('frontend.portfolio') }}" class="btn style2">
                                        Explore Project <i class="ri-arrow-right-line"></i>
                                    </a> 
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!--==============================
    Counter Area 01  
    ==============================-->
    <div class="counter-area-1 space">
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
    Client Area  
    ==============================-->
    <div class="client-area-1 text-center space bg-title overflow-hidden">
        <div class="container">
            <div class="row global-carousel client-slider1" data-slide-show="5" data-lg-slide-show="4" data-md-slide-show="3" data-sm-slide-show="2">
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-1.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-2.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-3.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-4.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-5.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-1.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-2.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-3.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-4.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-5.svg') }}" alt="img"></a>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <!--==============================
    Blog Area  
    ==============================-->
    <section class="blog-area-4 space">
        <div class="container">
            <div class="row justify-content-lg-between justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="title-area text-lg-start text-center">
                        <span class="sub-title text-theme">Blog <i class="ri-arrow-right-down-line"></i></span>
                        <h2 class="sec-title">Articles à venir</h2>
                    </div>
                </div>
                <div class="col-md-auto">
                    <div class="sec-btn">
                        <a href="#" class="btn">Tous les articles <i class="ri-arrow-right-up-line"></i></a>
                    </div>
                </div>
            </div>
            <div class="row global-carousel blog-slider5 slider-shadow" data-slide-show="3" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="1" data-xs-slide-show="1" data-dots="false">
                <div class="col-md-6 col-lg-4">
                    <div class="blog-card style5">
                        <div class="blog-img">
                            <img src="{{ asset('assets/construz-new/img/blog/blog_5_1.png') }}" alt="blog image">
                            <div class="blog-date">
                                <a href="#"><span>22</span>JUN</a>
                                <div class="year">2024</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="#">By Jr. Saller</a>
                                <a href="#">News in 2024</a>
                            </div>
                            <h3 class="blog-title"><a href="#">Protecting your roof from storm damage</a></h3>
                            <a href="#" class="btn style-border4" tabindex="0">En savoir plus <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="blog-card style5">
                        <div class="blog-img">
                            <img src="{{ asset('assets/construz-new/img/blog/blog_5_2.png') }}" alt="blog image">
                            <div class="blog-date">
                                <a href="#"><span>14</span>FEB</a>
                                <div class="year">2024</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="#">By Ashik</a>
                                <a href="#">News in 2024</a>
                            </div>
                            <h3 class="blog-title"><a href="#">Roofing are fact makes easier 10 reason</a></h3>
                            <a href="#" class="btn style-border4" tabindex="0">En savoir plus <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="blog-card style5">
                        <div class="blog-img">
                            <img src="{{ asset('assets/construz-new/img/blog/blog_5_3.png') }}" alt="blog image">
                            <div class="blog-date">
                                <a href="#"><span>09</span>JUN</a>
                                <div class="year">2024</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="#">By Jekson</a>
                                <a href="#">News in 2024</a>
                            </div>
                            <h3 class="blog-title"><a href="#">Why roofing material warranties important?</a></h3>
                            <a href="#" class="btn style-border4" tabindex="0">En savoir plus <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="blog-card style5">
                        <div class="blog-img">
                            <img src="{{ asset('assets/construz-new/img/blog/blog_5_1.png') }}" alt="blog image">
                            <div class="blog-date">
                                <a href="#"><span>22</span>JUN</a>
                                <div class="year">2024</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="#">By Jr. Saller</a>
                                <a href="#">News in 2024</a>
                            </div>
                            <h3 class="blog-title"><a href="#">Protecting your roof from storm damage</a></h3>
                            <a href="#" class="btn style-border4" tabindex="0">En savoir plus <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="blog-card style5">
                        <div class="blog-img">
                            <img src="{{ asset('assets/construz-new/img/blog/blog_5_2.png') }}" alt="blog image">
                            <div class="blog-date">
                                <a href="#"><span>14</span>FEB</a>
                                <div class="year">2024</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="#">By Ashik</a>
                                <a href="#">News in 2024</a>
                            </div>
                            <h3 class="blog-title"><a href="#">Roofing are fact makes easier 10 reason</a></h3>
                            <a href="#" class="btn style-border4" tabindex="0">En savoir plus <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="blog-card style5">
                        <div class="blog-img">
                            <img src="{{ asset('assets/construz-new/img/blog/blog_5_3.png') }}" alt="blog image">
                            <div class="blog-date">
                                <a href="#"><span>09</span>JUN</a>
                                <div class="year">2024</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="#">By Jekson</a>
                                <a href="#">News in 2024</a>
                            </div>
                            <h3 class="blog-title"><a href="#">Why roofing material warranties important?</a></h3>
                            <a href="#" class="btn style-border4" tabindex="0">En savoir plus <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>  
    
    <!--==============================
    Cta Area 5  
    ==============================-->
    <div class="cta-area-5">
        <div class="container">
            <div class="cta-wrap5" data-bg-src="{{ asset('assets/construz-new/img/bg/cta-bg5-1.png') }}">
                <h4 class="cta-title text-white">
                    Roofing & Restoration services that will leave your home better than before
                </h4>
                <a class="btn style4" href="{{ route('frontend.contact') }}">Start your free quote <i class="ri-arrow-right-up-line"></i></a>
            </div>
            
        </div>
    </div>  

    <!--==============================
        Footer Area
    ==============================-->
    <footer class="footer-wrapper footer-layout4" data-bg-src="{{ asset('assets/construz-new/img/bg/footer-bg1-1.png') }}">    
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