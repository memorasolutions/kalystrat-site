<!doctype html>
<html class="no-js" lang="zxx">

    @include('frontend::elements.head')

<body>
    <!--********************************
   	Code Start From Here 
	******************************** -->

    @include('frontend::elements.preloader')

    <!--==============================
    Search
    ==============================-->
    @include('frontend::elements.popupBox')

    <!--==============================
    SideMenu
    ==============================-->
    @include('frontend::elements.sidemenu')

    <!--==============================
    Mobile Menu
    ============================== -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-area">
            <div class="mobile-logo">
                <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/logo.svg') }}" alt="Construz"></a>
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
                                        <a href="{{ route('index') }}">Home 01</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home2') }}">Home 02</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home3') }}">Home 03</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home4') }}">Home 04</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home5') }}">Home 05</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Onepage</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{ route('home1Op') }}">Home 01 Onepage</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home2Op') }}">Home 02 Onepage</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home3Op') }}">Home 03 Onepage</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home4Op') }}">Home 04 Onepage</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home5Op') }}">Home 05 Onepage</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('about') }}">About</a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Pages</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('team') }}">Team Page</a></li>
                            <li><a href="{{ route('teamDetails') }}">Team Details</a></li>
                            <li><a href="{{ route('shop') }}">Shop Page</a></li>
                            <li><a href="{{ route('shopDetails') }}">Shop Details</a></li>
                            <li><a href="{{ route('cart') }}">Cart</a></li>
                            <li><a href="{{ route('checkout') }}">Checkout</a></li>
                            <li><a href="{{ route('wishlist') }}">Wishlist</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Project</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('project') }}">Projects</a></li>
                            <li><a href="{{ route('projectDetails') }}">Project Details</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Service</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('service') }}">Service</a></li>
                            <li><a href="{{ route('serviceDetails') }}">Service Details</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Shop</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('shop') }}">Shop</a></li>
                            <li><a href="{{ route('shopDetails') }}">Shop Details</a></li>
                            <li><a href="{{ route('cart') }}">Cart</a></li>
                            <li><a href="{{ route('checkout') }}">Checkout</a></li>
                            <li><a href="{{ route('wishlist') }}">Wishlist</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Blog</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('blog') }}">Blog</a></li>
                            <li><a href="{{ route('blogDetails') }}">Blog Details</a></li>
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
    <header class="nav-header header-layout3">
        <div class="sticky-wrapper">
            <!-- Main Menu Area -->
            <div class="menu-area">
                <div class="container">
                    <div class="row align-items-center justify-content-lg-start justify-content-between">
                        <div class="col-auto">
                            <div class="header-logo">
                                <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/logo.svg') }}" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-auto ms-auto ms-xxl-0">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <ul>
                                    <li class="menu-item-has-children">
                                        <a href="#">HOME</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item-has-children">
                                                <a href="#">Multipage</a>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="{{ route('index') }}">Home 01</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('home2') }}">Home 02</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('home3') }}">Home 03</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('home4') }}">Home 04</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('home5') }}">Home 05</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="#">Onepage</a>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="{{ route('home1Op') }}">Home 01 Onepage</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('home2Op') }}">Home 02 Onepage</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('home3Op') }}">Home 03 Onepage</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('home4Op') }}">Home 04 Onepage</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('home5Op') }}">Home 05 Onepage</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ route('about') }}">ABOUT</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">SERVICES</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('service') }}">Service</a></li>
                                            <li><a href="{{ route('serviceDetails') }}">Service Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">PAGES</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('project') }}">Project Page</a></li>
                                            <li><a href="{{ route('projectDetails') }}">Project Details</a></li>
                                            <li><a href="{{ route('team') }}">Team Page</a></li>
                                            <li><a href="{{ route('teamDetails') }}">Team Details</a></li>
                                            <li><a href="{{ route('shop') }}">Shop Page</a></li>
                                            <li><a href="{{ route('shopDetails') }}">Shop Details</a></li>
                                            <li><a href="{{ route('cart') }}">Cart</a></li>
                                            <li><a href="{{ route('checkout') }}">Checkout</a></li>
                                            <li><a href="{{ route('wishlist') }}">Wishlist</a></li>
                                        </ul>
                                    </li>  
                                    <li class="menu-item-has-children">
                                        <a href="#">NEWS</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('blog') }}">News</a></li>
                                            <li><a href="{{ route('blogDetails') }}">News Details</a></li>
                                        </ul>
                                    </li>
                                                                      
                                    <li>
                                        <a href="{{ route('contact') }}">CONTACT</a>
                                    </li>
                                </ul>
                            </nav>
                            <div class="navbar-right d-inline-flex d-lg-none">
                                <button type="button" class="menu-toggle icon-btn"><i class="ri-menu-line"></i></button>
                            </div>
                        </div>
                        <div class="col-auto ms-auto d-xl-block d-none">
                            <div class="header-button">
                                <div class="navbar-right-desc">
                                    <div class="icon-btn">
                                        <i class="ri-phone-fill"></i>
                                    </div>
                                    <div class="navbar-right-desc-details">
                                        <h6 class="title">Call us any time</h6>
                                        <a class="link" href="tel:+2590256215">+123 556 8824</a>
                                    </div>
                                </div>
                                <a href="{{ route('about') }}" class="btn d-xxl-flex d-none">GET IN TOUCH <i class="ri-arrow-right-up-line"></i></a>
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
    <div class="hero-wrapper hero-4" id="hero">
        <div class="hero-slider4 global-carousel" data-slide-show="1" data-fade="true">
            <div class="hero-slide" data-bg-src="{{ asset('themes/construz/assets/img/hero/hero_bg_4_1.png') }}" data-overlay="title" data-opacity="4">
                <div class="container">
                    <div class="hero-style4">
                        <div class="hero-shadow-text">Architecture</div>
                        <div class="jump-reverse hero-shadow-text-wrap">
                            <div class="hero-shadow-text2">Contact Info <img src="{{ asset('themes/construz/assets/img/icon/long-arrow-right2.svg') }}" alt="img"> Scroll Down</div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-xxl-7 col-xl-8">
                                <div class="hero-subtitle" data-ani="slider-custom-anim-left" data-ani-delay="0.1s">Our Vision <img src="{{ asset('themes/construz/assets/img/icon/long-arrow-right2.svg') }}" alt="img"></div>
                                <h1 class="hero-title" data-ani="slider-custom-anim-left" data-ani-delay="0.1s">Comprehensive</h1>
                                <h1 class="hero-title" data-ani="slider-custom-anim-left" data-ani-delay="0.2s">architectural solutions</h1>
                                <p class="hero-text" data-ani="slider-custom-anim-left" data-ani-delay="0.2s">We craft unique digital experiences. With more than 7 years of expertise we design and code clean websites.</p>
                            </div>
                            <div class="col-xxl-5 col-xl-4 text-xl-center">
                                <div class="hero-tag" data-ani="slideinup" data-ani-delay="0.4s">
                                    <div class="about-experience-tag style2">
                                        <span class="hero-title-anime">Explore More - Explore More -</span>
                                    </div>
                                    <a href="{{ route('contact') }}" class="hero-tag_icon">
                                        <i class="ri-arrow-right-up-line"></i>
                                    </a>
                                </div>                                
                            </div>
                        </div>
                    </div>                
                </div>
            </div>
            <div class="hero-slide" data-bg-src="{{ asset('themes/construz/assets/img/hero/hero_bg_4_2.png') }}" data-overlay="title" data-opacity="4">
                <div class="container">
                    <div class="hero-style4">
                        <div class="hero-shadow-text">Architecture</div>
                        <div class="jump-reverse hero-shadow-text-wrap">
                            <div class="hero-shadow-text2">Contact Info <img src="{{ asset('themes/construz/assets/img/icon/long-arrow-right2.svg') }}" alt="img"> Scroll Down</div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-xxl-7 col-xl-8">
                                <div class="hero-subtitle" data-ani="slider-custom-anim-left" data-ani-delay="0.1s">Our Vision <img src="{{ asset('themes/construz/assets/img/icon/long-arrow-right2.svg') }}" alt="img"></div>
                                <h1 class="hero-title" data-ani="slider-custom-anim-left" data-ani-delay="0.1s">Comprehensive</h1>
                                <h1 class="hero-title" data-ani="slider-custom-anim-left" data-ani-delay="0.2s">architectural solutions</h1>
                                <p class="hero-text" data-ani="slider-custom-anim-left" data-ani-delay="0.2s">We craft unique digital experiences. With more than 7 years of expertise we design and code clean websites.</p>
                            </div>
                            <div class="col-xxl-5 col-xl-4 text-xl-center">
                                <div class="hero-tag" data-ani="slideinup" data-ani-delay="0.4s">
                                    <div class="about-experience-tag style2">
                                        <span class="hero-title-anime">Explore More - Explore More -</span>
                                    </div>
                                    <a href="{{ route('contact') }}" class="hero-tag_icon">
                                        <i class="ri-arrow-right-up-line"></i>
                                    </a>
                                </div>                                
                            </div>
                        </div>
                    </div>                
                </div>
            </div>
            <div class="hero-slide" data-bg-src="{{ asset('themes/construz/assets/img/hero/hero_bg_4_3.png') }}" data-overlay="title" data-opacity="4">
                <div class="container">
                    <div class="hero-style4">
                        <div class="hero-shadow-text">Architecture</div>
                        <div class="jump-reverse hero-shadow-text-wrap">
                            <div class="hero-shadow-text2">Contact Info <img src="{{ asset('themes/construz/assets/img/icon/long-arrow-right2.svg') }}" alt="img"> Scroll Down</div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-xxl-7 col-xl-8">
                                <div class="hero-subtitle" data-ani="slider-custom-anim-left" data-ani-delay="0.1s">Our Vision <img src="{{ asset('themes/construz/assets/img/icon/long-arrow-right2.svg') }}" alt="img"></div>
                                <h1 class="hero-title" data-ani="slider-custom-anim-left" data-ani-delay="0.1s">Comprehensive</h1>
                                <h1 class="hero-title" data-ani="slider-custom-anim-left" data-ani-delay="0.2s">architectural solutions</h1>
                                <p class="hero-text" data-ani="slider-custom-anim-left" data-ani-delay="0.2s">We craft unique digital experiences. With more than 7 years of expertise we design and code clean websites.</p>
                            </div>
                            <div class="col-xxl-5 col-xl-4 text-xl-center">
                                <div class="hero-tag" data-ani="slideinup" data-ani-delay="0.4s">
                                    <div class="about-experience-tag style2">
                                        <span class="hero-title-anime">Explore More - Explore More -</span>
                                    </div>
                                    <a href="{{ route('contact') }}" class="hero-tag_icon">
                                        <i class="ri-arrow-right-up-line"></i>
                                    </a>
                                </div>                                
                            </div>
                        </div>
                    </div>                
                </div>
            </div>
        </div>
        <div class="container">
            <div class="hero-4-number-tab" data-asnavfor=".hero-slider4">
                <button class="tab-btn active" type="button">01</button>
                <button class="tab-btn" type="button">02</button>
                <button class="tab-btn" type="button">03</button>
            </div>
        </div>
    </div>
    <!--======== / Hero Section ========-->

    <div class="hero-contact-area position-relative z-index-common">
        <div class="hero-contact-bg-img bg-title">
            <img src="{{ asset('themes/construz/assets/img/hero/hero_4_contact_bg.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="hero-contact-wrap">
                <div class="hero-award-wrap" data-bg-src="{{ asset('themes/construz/assets/img/hero/hero_4_award_bg.png') }}">
                    <div class="hero-award-icon">
                        <img src="{{ asset('themes/construz/assets/img/hero/hero_4_award_icon.svg') }}" alt="img">
                    </div>
                    <div class="hero-award-logo">
                        <img src="{{ asset('themes/construz/assets/img/logo-white2.svg') }}" alt="img">
                    </div>
                    <h4 class="hero-award-title">We're Award Winning Company</h4>
                </div>
                <div class="hero-contact-info-wrap">
                    <div class="hero-contact-icon">
                        <img src="{{ asset('themes/construz/assets/img/hero/hero4-contact-info-icon1.svg') }}" alt="img">
                    </div>
                    <h4 class="hero-contact-info-title">Working Hours</h4>
                    <p class="hero-contact-info-text">Mon - Sat 07:00 - 22:00</p>
                </div>
                <div class="hero-contact-info-wrap">
                    <div class="hero-contact-icon">
                        <img src="{{ asset('themes/construz/assets/img/hero/hero4-contact-info-icon2.svg') }}" alt="img">
                    </div>
                    <h4 class="hero-contact-info-title">Call Any Time</h4>
                    <p class="hero-contact-info-text">+971 551 579 261</p>
                </div>
                <div class="hero-contact-info-wrap">
                    <div class="hero-contact-icon">
                        <img src="{{ asset('themes/construz/assets/img/hero/hero4-contact-info-icon3.svg') }}" alt="img">
                    </div>
                    <h4 class="hero-contact-info-title">Say Something</h4>
                            <p class="hero-contact-info-text">info@construz.example</p>
                </div>
            </div>           
        </div>
    </div>

    <!--==============================
    Service Area 05  
    ==============================-->
    <div class="service-area-5 space-top overflow-hidden">
        <div class="container">
            <div class="service-card-wrap5">
                <div class="row gy-50 justify-content-xl-between justify-content-center">
                    <div class="col-xxl-auto col-xl-4 col-md-6">
                        <div class="service-card style5">
                            <div class="service-card-number">
                                1
                            </div>
                            <div class="service-card_content">
                                <div class="service-card_icon">
                                    <img src="{{ asset('themes/construz/assets/img/icon/service-icon4-1.svg') }}" alt="img">
                                </div>
                                <h4 class="service-card_title"><a href="{{ route('serviceDetails') }}">Buildings</a></h4>
                                <p class="service-card_text">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-auto col-xl-4 col-md-6">
                        <div class="service-card style5">
                            <div class="service-card-number">
                                2
                            </div>
                            <div class="service-card_content">
                                <div class="service-card_icon">
                                    <img src="{{ asset('themes/construz/assets/img/icon/service-icon4-2.svg') }}" alt="img">
                                </div>
                                <h4 class="service-card_title"><a href="{{ route('serviceDetails') }}">Civil Infrastructure</a></h4>
                                <p class="service-card_text">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-auto col-xl-4 col-md-6">
                        <div class="service-card style5">
                            <div class="service-card-number">
                                3
                            </div>
                            <div class="service-card_content">
                                <div class="service-card_icon">
                                    <img src="{{ asset('themes/construz/assets/img/icon/service-icon4-3.svg') }}" alt="img">
                                </div>
                                <h4 class="service-card_title"><a href="{{ route('serviceDetails') }}">Multipurpose</a></h4>
                                <p class="service-card_text">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
    About Area  
    ==============================-->
    <div class="about-area-4 space overflow-hidden">
        <div class="about-bg-shape4-1 shape-mockup" data-top="0">
            <img src="{{ asset('themes/construz/assets/img/bg/about-bg-shape4-1.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="row gx-70 align-items-center flex-row-reverse">
                <div class="col-xl-6">
                    <div class="about-thumb4 mb-40 mb-xl-0"> 
                        <div class="about-img-1">
                            <img src="{{ asset('themes/construz/assets/img/normal/about_4-1.png') }}" alt="img">
                        </div>
                        <div class="about-img-2">
                            <img src="{{ asset('themes/construz/assets/img/normal/about_4-2.png') }}" alt="img">
                        </div>
                        <div class="client-group-4-1 jump">
                            <img src="{{ asset('themes/construz/assets/img/normal/client_group_4-1.png') }}" alt="img">
                        </div>
                        <div class="about-counter-wrap">
                            <h3 class="about-counter-number"><span class="counter-number">2.6</span>k+</h3>
                            <p class="about-counter-text">Client satisfaction our services</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-wrap4">
                        <div class="title-area mb-40">
                            <span class="sub-title text-theme">ABOUT US <i class="ri-arrow-right-down-line"></i></span>
                            <h2 class="sec-title">We building everything that you needed</h2>
                            <p class="sec-text">Welcome to Construz. We are architecture with a rich history of excellence, we have been empowering industries and driving progress for over 36 years.
                            </p>
                        </div>
                        <div class="about-tab-4">
                            <div class="filter-menu-active">
                                <button data-filter=".cat1" class="active" type="button">Our History</button>
                                <button data-filter=".cat2" type="button">Our Mission</button>
                                <button data-filter=".cat3" type="button">Our Vision</button>
                            </div>
                            <div class="filter-active-cat1">
                                <div class="filter-item cat1">
                                    <p class="about-tab-text">These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed</p>                                
                                </div>
                                <div class="filter-item cat2">
                                    <p class="about-tab-text">These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed</p>  
                                </div>
                                <div class="filter-item cat3">
                                    <p class="about-tab-text">These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed</p>  
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checklist style7">
                                    <ul>
                                        <li><i class="ri-checkbox-circle-line"></i> Quality control system
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checklist style7">
                                    <ul>
                                        <li><i class="ri-checkbox-circle-line"></i> Transforming ideas into reality
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="btn-group mt-50">
                            <a href="{{ route('about') }}" class="btn">NOW MORE COMPANY <i class="ri-arrow-right-up-line"></i></a>
                            <img src="{{ asset('themes/construz/assets/img/normal/about_4-sign.png') }}" alt="img">
                        </div>                
                    </div>
                </div>
            </div>
        </div>
    </div>   
    
    <!--==============================
    Service Area 06  
    ==============================-->
    <div class="space-hd-bottom">
        <div class="service-area-6 space overflow-hidden position-relative" data-bg-src="{{ asset('themes/construz/assets/img/bg/service-bg6-1.png') }}">
            <div class="section-animation-shape1-1 shape-mockup animation-infinite" data-top="0" data-bg-src="{{ asset('themes/construz/assets/img/shape/global-line-shape1.png') }}">
            </div>
            <div class="container">
                <div class="service-card-wrap6">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="title-area text-center mb-50">
                                <span class="sub-title text-theme">WHAT WE DO <i class="ri-arrow-right-down-line"></i></span>
                                <h2 class="sec-title">We provide our services all over the world</h2>                      
                            </div>
                        </div>
                    </div>
                    <div class="row global-carousel service-slider6" data-slide-show="3" data-md-slide-show="2" data-dots="true" data-xl-dots="true" data-ml-dots="true" data-lg-dots="true" data-md-dots="true">
                        <div class="col-xxl-auto col-xl-4 col-md-6">
                            <div class="service-card style6" data-bg-src="{{ asset('themes/construz/assets/img/bg/service-card-bg6-1.png') }}">
                                <div class="service-card-number">
                                    N.01
                                </div>
                                <div class="service-card-thumb" data-mask-src="{{ asset('themes/construz/assets/img/service/service_thumb6_mask.png') }}">
                                    <img src="{{ asset('themes/construz/assets/img/service/service_thumb6_1.png') }}" alt="img">
                                </div>
                                <div class="service-card_content">
                                    <div class="service-card_icon">
                                        <img src="{{ asset('themes/construz/assets/img/icon/service-icon2-1.svg') }}" alt="img">
                                    </div>
                                    <h4 class="service-card_title"><a href="{{ route('serviceDetails') }}">Architectural Design</a></h4>
                                    <p class="service-card_text">We craft unique digital experiences with more than 7 years of expertise we design </p>
                                    <div class="btn-group">
                                        <a href="{{ route('service') }}" class="btn">EXPLORE SERVICE <i class="ri-arrow-right-up-line"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-auto col-xl-4 col-md-6">
                            <div class="service-card style6" data-bg-src="{{ asset('themes/construz/assets/img/bg/service-card-bg6-1.png') }}">
                                <div class="service-card-number">
                                    N.02
                                </div>
                                <div class="service-card-thumb" data-mask-src="{{ asset('themes/construz/assets/img/service/service_thumb6_mask.png') }}">
                                    <img src="{{ asset('themes/construz/assets/img/service/service_thumb6_2.png') }}" alt="img">
                                </div>
                                <div class="service-card_content">
                                    <div class="service-card_icon">
                                        <img src="{{ asset('themes/construz/assets/img/icon/service-icon2-2.svg') }}" alt="img">
                                    </div>
                                    <h4 class="service-card_title"><a href="{{ route('serviceDetails') }}">Project Management</a></h4>
                                    <p class="service-card_text">We craft unique digital experiences with more than 7 years of expertise we design </p>
                                    <div class="btn-group">
                                        <a href="{{ route('service') }}" class="btn">EXPLORE SERVICE <i class="ri-arrow-right-up-line"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-auto col-xl-4 col-md-6">
                            <div class="service-card style6" data-bg-src="{{ asset('themes/construz/assets/img/bg/service-card-bg6-1.png') }}">
                                <div class="service-card-number">
                                    N.03
                                </div>
                                <div class="service-card-thumb" data-mask-src="{{ asset('themes/construz/assets/img/service/service_thumb6_mask.png') }}">
                                    <img src="{{ asset('themes/construz/assets/img/service/service_thumb6_3.png') }}" alt="img">
                                </div>
                                <div class="service-card_content">
                                    <div class="service-card_icon">
                                        <img src="{{ asset('themes/construz/assets/img/icon/service-icon2-3.svg') }}" alt="img">
                                    </div>
                                    <h4 class="service-card_title"><a href="{{ route('serviceDetails') }}">Interior Design</a></h4>
                                    <p class="service-card_text">We craft unique digital experiences with more than 7 years of expertise we design </p>
                                    <div class="btn-group">
                                        <a href="{{ route('service') }}" class="btn">EXPLORE SERVICE <i class="ri-arrow-right-up-line"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-auto col-xl-4 col-md-6">
                            <div class="service-card style6" data-bg-src="{{ asset('themes/construz/assets/img/bg/service-card-bg6-1.png') }}">
                                <div class="service-card-number">
                                    N.01
                                </div>
                                <div class="service-card-thumb" data-mask-src="{{ asset('themes/construz/assets/img/service/service_thumb6_mask.png') }}">
                                    <img src="{{ asset('themes/construz/assets/img/service/service_thumb6_1.png') }}" alt="img">
                                </div>
                                <div class="service-card_content">
                                    <div class="service-card_icon">
                                        <img src="{{ asset('themes/construz/assets/img/icon/service-icon2-1.svg') }}" alt="img">
                                    </div>
                                    <h4 class="service-card_title"><a href="{{ route('serviceDetails') }}">Architectural Design</a></h4>
                                    <p class="service-card_text">We craft unique digital experiences with more than 7 years of expertise we design </p>
                                    <div class="btn-group">
                                        <a href="{{ route('service') }}" class="btn">EXPLORE SERVICE <i class="ri-arrow-right-up-line"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-auto col-xl-4 col-md-6">
                            <div class="service-card style6" data-bg-src="{{ asset('themes/construz/assets/img/bg/service-card-bg6-1.png') }}">
                                <div class="service-card-number">
                                    N.02
                                </div>
                                <div class="service-card-thumb" data-mask-src="{{ asset('themes/construz/assets/img/service/service_thumb6_mask.png') }}">
                                    <img src="{{ asset('themes/construz/assets/img/service/service_thumb6_2.png') }}" alt="img">
                                </div>
                                <div class="service-card_content">
                                    <div class="service-card_icon">
                                        <img src="{{ asset('themes/construz/assets/img/icon/service-icon2-2.svg') }}" alt="img">
                                    </div>
                                    <h4 class="service-card_title"><a href="{{ route('serviceDetails') }}">Project Management</a></h4>
                                    <p class="service-card_text">We craft unique digital experiences with more than 7 years of expertise we design </p>
                                    <div class="btn-group">
                                        <a href="{{ route('service') }}" class="btn">EXPLORE SERVICE <i class="ri-arrow-right-up-line"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-auto col-xl-4 col-md-6">
                            <div class="service-card style6" data-bg-src="{{ asset('themes/construz/assets/img/bg/service-card-bg6-1.png') }}">
                                <div class="service-card-number">
                                    N.03
                                </div>
                                <div class="service-card-thumb" data-mask-src="{{ asset('themes/construz/assets/img/service/service_thumb6_mask.png') }}">
                                    <img src="{{ asset('themes/construz/assets/img/service/service_thumb6_3.png') }}" alt="img">
                                </div>
                                <div class="service-card_content">
                                    <div class="service-card_icon">
                                        <img src="{{ asset('themes/construz/assets/img/icon/service-icon2-3.svg') }}" alt="img">
                                    </div>
                                    <h4 class="service-card_title"><a href="{{ route('serviceDetails') }}">Interior Design</a></h4>
                                    <p class="service-card_text">We craft unique digital experiences with more than 7 years of expertise we design </p>
                                    <div class="btn-group">
                                        <a href="{{ route('service') }}" class="btn">EXPLORE SERVICE <i class="ri-arrow-right-up-line"></i></a>
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
    Why Choose Area 04  
    ==============================-->
    <div class="why-area-4 space overflow-hidden" data-bg-src="{{ asset('themes/construz/assets/img/bg/why-bg4-1.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-xxl-5 col-lg-6">
                    <div class="title-area">
                        <span class="sub-title text-theme">What we do <i class="ri-arrow-right-down-line"></i></span>
                        <h2 class="sec-title text-white">Solution that inspire progress</h2>
                    </div>
                </div>
                <div class="col-xxl-4 offset-xxl-2 col-lg-6">
                    <div class="wcu-card-wrap4 m-0">
                        <div class="wcu-card">
                            <div class="wcu-card-icon">
                                <img src="{{ asset('themes/construz/assets/img/icon/why-icon1-5.svg') }}" alt="img">
                            </div>
                            <div class="wcu-card-details">
                                <h4 class="wcu-card-title text-white">Skilled Team</h4>
                                <p class="wcu-card-text">We are expert your all work is very nice waiting for next project.</p>
                            </div>
                        </div>
                        <div class="wcu-card">
                            <div class="wcu-card-icon">
                                <img src="{{ asset('themes/construz/assets/img/icon/why-icon1-2.svg') }}" alt="img">
                            </div>
                            <div class="wcu-card-details">
                                <h4 class="wcu-card-title text-white">Core Planning</h4>
                                <p class="wcu-card-text">Ipsum is that it has a more-or-less normal distribution of letters opposed to using</p>
                            </div>
                        </div>
                        <div class="wcu-card">
                            <div class="wcu-card-icon">
                                <img src="{{ asset('themes/construz/assets/img/icon/why-icon1-6.svg') }}" alt="img">
                            </div>
                            <div class="wcu-card-details">
                                <h4 class="wcu-card-title text-white">Save Money</h4>
                                <p class="wcu-card-text"> Content here, content here', making it look like readable English. Many desktop</p>
                            </div>
                        </div>
                        <div class="wcu-card">
                            <div class="wcu-card-icon">
                                <img src="{{ asset('themes/construz/assets/img/icon/why-icon1-1.svg') }}" alt="img">
                            </div>
                            <div class="wcu-card-details">
                                <h4 class="wcu-card-title text-white">Technology</h4>
                                <p class="wcu-card-text"> We are expert your all work is very nice waiting for next project  publishing packages</p>
                            </div>
                        </div>
                        <div class="wcu-card">
                            <div class="wcu-card-icon">
                                <img src="{{ asset('themes/construz/assets/img/icon/why-icon1-3.svg') }}" alt="img">
                            </div>
                            <div class="wcu-card-details">
                                <h4 class="wcu-card-title text-white">Project Result</h4>
                                <p class="wcu-card-text"> Making this the first true generator on the Internet uses a dictionary</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
    Video Area 012 
    ==============================-->
    <div class="video-area-2 position-relative">
        <div class="video_thumb2-1" data-bg-src="{{ asset('themes/construz/assets/img/normal/testimonial_2-1.png') }}">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="video-wrap2" data-bg-src="{{ asset('themes/construz/assets/img/bg/video-bg2-1.png') }}">
                        <a href="https://www.youtube.com/watch?v=Mp8IXI1kzvQ" class="popup-video play-btn-wrap style2 justify-content-end text-end">
                            <div class="video-text">
                                See our intro video
                            </div>
                            <span class="play-btn style8">
                                <i class="ri-play-fill"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-shape" data-bg-src="{{ asset('themes/construz/assets/img/bg/project-bg4-1.png') }}">
        <!--==============================
        Portfolio Area  
        ==============================-->
        <div class="portfolio-area-4 space-top">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-7">
                        <div class="title-area text-lg-start text-center">
                            <span class="sub-title text-theme">Recent Projects <i class="ri-arrow-right-down-line"></i></span>
                            <h2 class="sec-title">Architecture heavy project solutions</h2>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <div class="sec-btn">
                            <div class="icon-box">
                                <button data-slick-prev=".portfolio-slider4" class="slick-arrow default style2"><i class="ri-arrow-left-line"></i></button>
                                <button data-slick-next=".portfolio-slider4" class="slick-arrow default style2"><i class="ri-arrow-right-line"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overflow-hidden">
                    <div class="row gy-30 gx-30 global-carousel portfolio-slider4" data-slide-show="3" data-ml-slide-show="2" data-lg-slide-show="2" data-md-slide-show="2">
                        <div class="col-lg-4">
                            <div class="portfolio-card style4">
                                <div class="portfolio-card-thumb">
                                    <img src="{{ asset('themes/construz/assets/img/project/project4_1.png') }}" alt="img">
                                    <span class="portfolio-card-number">N.01</span>
                                </div>
                                <div class="portfolio-card-details">
                                    <span class="portfolio-card-subtitle">Architecture</span>
                                    <h4 class="portfolio-card-title"><a href="{{ route('projectDetails') }}">News Office Building</a></h4>                     
                                </div>
                                <a href="{{ route('projectDetails') }}" class="icon-btn">
                                    <i class="ri-arrow-right-line"></i>
                                </a> 
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="portfolio-card style4">
                                <div class="portfolio-card-thumb">
                                    <img src="{{ asset('themes/construz/assets/img/project/project4_2.png') }}" alt="img">
                                    <span class="portfolio-card-number">N.02</span>
                                </div>
                                <div class="portfolio-card-details">
                                    <span class="portfolio-card-subtitle">Building</span>
                                    <h4 class="portfolio-card-title"><a href="{{ route('projectDetails') }}">General Construction</a></h4>                     
                                </div>
                                <a href="{{ route('projectDetails') }}" class="icon-btn">
                                    <i class="ri-arrow-right-line"></i>
                                </a> 
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="portfolio-card style4">
                                <div class="portfolio-card-thumb">
                                    <img src="{{ asset('themes/construz/assets/img/project/project4_3.png') }}" alt="img">
                                    <span class="portfolio-card-number">N.03</span>
                                </div>
                                <div class="portfolio-card-details">
                                    <span class="portfolio-card-subtitle">Industry</span>
                                    <h4 class="portfolio-card-title"><a href="{{ route('projectDetails') }}">Renovation & Remodeling</a></h4>                     
                                </div>
                                <a href="{{ route('projectDetails') }}" class="icon-btn">
                                    <i class="ri-arrow-right-line"></i>
                                </a> 
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="portfolio-card style4">
                                <div class="portfolio-card-thumb">
                                    <img src="{{ asset('themes/construz/assets/img/project/project4_1.png') }}" alt="img">
                                    <span class="portfolio-card-number">N.01</span>
                                </div>
                                <div class="portfolio-card-details">
                                    <span class="portfolio-card-subtitle">Architecture</span>
                                    <h4 class="portfolio-card-title"><a href="{{ route('projectDetails') }}">News Office Building</a></h4>                     
                                </div>
                                <a href="{{ route('projectDetails') }}" class="icon-btn">
                                    <i class="ri-arrow-right-line"></i>
                                </a> 
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="portfolio-card style4">
                                <div class="portfolio-card-thumb">
                                    <img src="{{ asset('themes/construz/assets/img/project/project4_2.png') }}" alt="img">
                                    <span class="portfolio-card-number">N.02</span>
                                </div>
                                <div class="portfolio-card-details">
                                    <span class="portfolio-card-subtitle">Building</span>
                                    <h4 class="portfolio-card-title"><a href="{{ route('projectDetails') }}">General Construction</a></h4>                     
                                </div>
                                <a href="{{ route('projectDetails') }}" class="icon-btn">
                                    <i class="ri-arrow-right-line"></i>
                                </a> 
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="portfolio-card style4">
                                <div class="portfolio-card-thumb">
                                    <img src="{{ asset('themes/construz/assets/img/project/project4_3.png') }}" alt="img">
                                    <span class="portfolio-card-number">N.03</span>
                                </div>
                                <div class="portfolio-card-details">
                                    <span class="portfolio-card-subtitle">Industry</span>
                                    <h4 class="portfolio-card-title"><a href="{{ route('projectDetails') }}">Renovation & Remodeling</a></h4>                     
                                </div>
                                <a href="{{ route('projectDetails') }}" class="icon-btn">
                                    <i class="ri-arrow-right-line"></i>
                                </a> 
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
    </div>

    <!--==============================
    Testimonial Area  
    ==============================-->
    <div class="testimonial-area-4 overflow-hidden space bg-smoke" data-bg-src="{{ asset('themes/construz/assets/img/bg/testimonial-bg4-1.png') }}">
        <div class="testimonial_shape_1-1 shape-mockup jump d-xxl-block d-none" data-top="0" data-right="4%">
            <img src="{{ asset('themes/construz/assets/img/shape/sec-bg-shape2.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="row gx-100 gy-60 flex-row-reverse">                
                <div class="col-xl-6">
                    <div class="title-area">
                        <span class="sub-title text-theme">Testimonials <i class="ri-arrow-right-down-line"></i></span>
                        <h2 class="sec-title">Our happy customers</h2>
                    </div>
                    <div class="row global-carousel testi-slider1" data-slide-show="1">
                        <div class="col-lg-6">
                            <div class="testi-card">
                                <div class="quote-icon">
                                    <img src="{{ asset('themes/construz/assets/img/icon/quote.svg') }}" alt="img">
                                </div>                                          
                                <div class="testi-card-thumb">
                                    <img src="{{ asset('themes/construz/assets/img/testimonial/testi_1_1.png') }}" alt="img">
                                </div>  
                                <div class="testi-card_content">
                                    <h4 class="testi-card_title">Best Company!</h4>
                                    <p class="testi-card_text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam. Odio ut sem nulla phar. Purus sit ame nus mas do eiusmod.</p>
                                    <div class="testi-card-profile">
                                        <h4 class="testi-profile-title">Aleesha brown.</h4>
                                        <span class="testi-profile-desig">CEO at Construz</span>                                                                       
                                    </div>
                                </div>                        
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="testi-card">
                                <div class="quote-icon">
                                    <img src="{{ asset('themes/construz/assets/img/icon/quote.svg') }}" alt="img">
                                </div>                                          
                                <div class="testi-card-thumb">
                                    <img src="{{ asset('themes/construz/assets/img/testimonial/testi_1_2.png') }}" alt="img">
                                </div>  
                                <div class="testi-card_content">
                                    <h4 class="testi-card_title">Best Company!</h4>
                                    <p class="testi-card_text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam. Odio ut sem nulla phar. Purus sit ame nus mas do eiusmod.</p>
                                    <div class="testi-card-profile">
                                        <h4 class="testi-profile-title">Aleesha brown.</h4>
                                        <span class="testi-profile-desig">CEO at Construz</span>                                                                       
                                    </div>
                                </div>                        
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="testi-card">
                                <div class="quote-icon">
                                    <img src="{{ asset('themes/construz/assets/img/icon/quote.svg') }}" alt="img">
                                </div>                                          
                                <div class="testi-card-thumb">
                                    <img src="{{ asset('themes/construz/assets/img/testimonial/testi_1_1.png') }}" alt="img">
                                </div>  
                                <div class="testi-card_content">
                                    <h4 class="testi-card_title">Best Company!</h4>
                                    <p class="testi-card_text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam. Odio ut sem nulla phar. Purus sit ame nus mas do eiusmod.</p>
                                    <div class="testi-card-profile">
                                        <h4 class="testi-profile-title">Aleesha brown.</h4>
                                        <span class="testi-profile-desig">CEO at Construz</span>                                                                       
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
                            <img src="{{ asset('themes/construz/assets/img/normal/client_group_1-2.png') }}" alt="img">
                        </div>
                        <div class="testi-counter-wrap">
                            <h3 class="testi-counter-number"><span class="counter-number">2</span>m+</h3>
                            <p class="testi-counter-text">Success Peoples</p>                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="accordion-area style2 accordion" id="faqAccordion">

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

                    </div>
                </div>
            </div>         
        </div>
    </div>

    <div class="bg-shape" data-bg-src="{{ asset('themes/construz/assets/img/bg/cta-bg4-2.png') }}">
        <!--==============================
        CTA Area 04  
        ==============================-->
        <div class="cta-area-4 space-top">
            <div class="container">
                <div class="cta-wrap4 text-center" data-bg-src="{{ asset('themes/construz/assets/img/bg/cta-bg4-1.png') }}" data-overlay="title" data-opacity="6">
                    <div class="title-area mb-30">
                        <span class="sub-title text-white">We have won many factory awards</span>
                        <h2 class="cta-title style2">Your Renovation</h2>
                        <h3 class="cta-title text-white">Starts Here</h3>
                    </div>
                    <div class="btn-wrap justify-content-center">
                        <a href="{{ route('contact') }}" class="btn style2">Get in Touch <i class="ri-arrow-right-up-line"></i></a>
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
                            <span class="sub-title text-theme">Journal <i class="ri-arrow-right-down-line"></i></span>
                            <h2 class="sec-title">News and Article</h2>
                        </div>
                    </div>
                    <div class="col-md-auto">
                        <div class="sec-btn">
                            <div class="icon-box">
                                <button data-slick-prev=".blog-slider4" class="slick-arrow default style2"><i class="ri-arrow-left-line"></i></button>
                                <button data-slick-next=".blog-slider4" class="slick-arrow default style2"><i class="ri-arrow-right-line"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row global-carousel blog-slider4 slider-shadow" data-slide-show="3" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="1" data-xs-slide-show="1" data-dots="false">
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-card style4">
                            <div class="blog-img">
                                <img src="{{ asset('themes/construz/assets/img/blog/blog_4_1.png') }}" alt="blog image">
                                <div class="blog-date">
                                    <a href="{{ route('blog') }}"><span>17</span>JUN</a>
                                </div>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <a href="{{ route('blog') }}">By Rebecca</a>
                                    <a href="{{ route('blog') }}">Architecture</a>
                                </div>
                                <h3 class="blog-title"><a href="{{ route('blogDetails') }}">Cultural artifacts and new attitudes</a></h3>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-card style4">
                            <div class="blog-img">
                                <img src="{{ asset('themes/construz/assets/img/blog/blog_4_2.png') }}" alt="blog image">
                                <div class="blog-date">
                                    <a href="{{ route('blog') }}"><span>20</span>AUG</a>
                                </div>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <a href="{{ route('blog') }}">By Rebecca</a>
                                    <a href="{{ route('blog') }}">Office</a>
                                    <a href="{{ route('blog') }}">News 2024</a>
                                </div>
                                <h3 class="blog-title"><a href="{{ route('blogDetails') }}">Interactive technologies in factories and plants</a></h3>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-card style4">
                            <div class="blog-img">
                                <img src="{{ asset('themes/construz/assets/img/blog/blog_4_3.png') }}" alt="blog image">
                                <div class="blog-date">
                                    <a href="{{ route('blog') }}"><span>30</span>SEP</a>
                                </div>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <a href="{{ route('blog') }}">By Rebecca</a>
                                    <a href="{{ route('blog') }}">Building</a>
                                </div>
                                <h3 class="blog-title"><a href="{{ route('blogDetails') }}">Creation of industrial projects around the world</a></h3>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-card style4">
                            <div class="blog-img">
                                <img src="{{ asset('themes/construz/assets/img/blog/blog_4_1.png') }}" alt="blog image">
                                <div class="blog-date">
                                    <a href="{{ route('blog') }}"><span>17</span>JUN</a>
                                </div>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <a href="{{ route('blog') }}">By Rebecca</a>
                                    <a href="{{ route('blog') }}">Architecture</a>
                                </div>
                                <h3 class="blog-title"><a href="{{ route('blogDetails') }}">Cultural artifacts and new attitudes</a></h3>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-card style4">
                            <div class="blog-img">
                                <img src="{{ asset('themes/construz/assets/img/blog/blog_4_2.png') }}" alt="blog image">
                                <div class="blog-date">
                                    <a href="{{ route('blog') }}"><span>20</span>AUG</a>
                                </div>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <a href="{{ route('blog') }}">By Rebecca</a>
                                    <a href="{{ route('blog') }}">Office</a>
                                    <a href="{{ route('blog') }}">News 2024</a>
                                </div>
                                <h3 class="blog-title"><a href="{{ route('blogDetails') }}">Interactive technologies in factories and plants</a></h3>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-card style4">
                            <div class="blog-img">
                                <img src="{{ asset('themes/construz/assets/img/blog/blog_4_3.png') }}" alt="blog image">
                                <div class="blog-date">
                                    <a href="{{ route('blog') }}"><span>30</span>SEP</a>
                                </div>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <a href="{{ route('blog') }}">By Rebecca</a>
                                    <a href="{{ route('blog') }}">Building</a>
                                </div>
                                <h3 class="blog-title"><a href="{{ route('blogDetails') }}">Creation of industrial projects around the world</a></h3>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section> 
    </div>

    <!--==============================
    Client Area  
    ==============================-->
    <div class="client-area-4 bg-smoke" data-bg-src="{{ asset('themes/construz/assets/img/bg/client-bg4-1.png') }}">
        <div class="container">
            <div class="row global-carousel client-slider2 space text-center" data-slide-show="5" data-lg-slide-show="4" data-md-slide-show="3" data-sm-slide-show="2">
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/client/client-2-1.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/client/client-2-2.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/client/client-2-3.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/client/client-2-4.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/client/client-2-5.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/client/client-2-1.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/client/client-2-2.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/client/client-2-3.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/client/client-2-4.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/client/client-2-5.svg') }}" alt="img"></a>
                    </div>
                </div>
            </div>

            <div class="subscribe-area-4" data-bg-src="{{ asset('themes/construz/assets/img/bg/subscribe-bg4-1.png') }}">
                <div class="subscribe-thumb4-1">
                    <img src="{{ asset('themes/construz/assets/img/normal/subscribe_4-1.png') }}" alt="img">
                </div>
                <div class="subscribe-box">
                    <h4 class="subscribe-box_title">Sign up to get the latest updates!</h4>
                    <form class="newsletter-form">
                        <input class="form-control" type="email" placeholder="Enter Your Email..." required="">
                        <button type="submit" class="btn style3">SUBCRIBE<i class="ri-arrow-right-up-line"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>       

    <footer class="footer-wrapper footer-layout3" data-bg-src="{{ asset('themes/construz/assets/img/bg/footer-bg1-1.png') }}">    
        <div class="container">
            <div class="widget-area">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-3">
                        <div class="widget widget-about footer-widget">
                            <h3 class="widget_title">About Company</h3>
                            <p class="about-text">A small business can be better than a big business because of agility and adaptability due to their size and scale.</p>
                            <h4 class="about-year">Since 2000</h4>
                            <h5 class="about-subtitle">WE ARE AVAILABLE</h5>
                            <p class="about-text"><span class="text-theme">Mon-Sat:</span> 10:00am to 07:30pm</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Useful Links</h3>
                            <div class="menu-all-pages-container grid-style">
                                <ul class="menu">
                                    <li><a href="{{ route('about') }}">About Us</a></li>
                                    <li><a href="{{ route('service') }}">What We Do</a></li>
                                    <li><a href="{{ route('service') }}">News & Article</a></li>
                                    <li><a href="{{ route('service') }}">Success Story</a></li>
                                    <li><a href="{{ route('service') }}">FAQ’s</a></li>
                                </ul>
                                <ul class="menu">
                                    <li><a href="{{ route('team') }}">Our Team</a></li>
                                    <li><a href="{{ route('service') }}">Careers</a></li>
                                    <li><a href="{{ route('service') }}">Testimonials</a></li>
                                    <li><a href="{{ route('contact') }}">Privacy Policy</a></li>
                                    <li><a href="{{ route('contact') }}">Terms of use</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget widget-contact">
                            <h3 class="widget_title">Office Address</h3>
                            <p class="contact-text">Losangle, Street Road 24, New York, USA - 67452</p>
                            <h3 class="widget_title">Email Address</h3> 
                            <p class="text-white footer-text">Get in Touch !</p>   
                            <p class="footer-text"><a href="mailto:info@construz.example">info@construz.example</a></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">Phone Number</h3>
                            <p class="footer-text">
                                <a href="tel:121551579266">+121 551 579 266</a>
                            </p>
                            <p class="footer-text">
                                <a href="tel:851555961658">+85 155 596 1658</a>
                            </p>
                            <h3 class="widget_title">Follow Us</h3>
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
                    <div class="col-auto align-self-center"><p class="copyright-text text-center">© 2025 <a href="#">Construz</a>  |  All rights reserved</p></div>
                    <div class="col-auto">
                        <div class="footer-links">
                            <a href="{{ route('contact') }}">Terms & Condition</a>
                            <a href="{{ route('contact') }}">Privacy Policy</a>
                            <a href="{{ route('contact') }}">Contact Us</a>
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
    @include('frontend::elements.scrollTop')

    <!--==============================
    All Js File
    ============================== -->
    @include('frontend::elements.script')

</body>

</html>