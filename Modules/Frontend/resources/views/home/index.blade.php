<!doctype html>
<html class="no-js" lang="fr-CA">

    @include('frontend::elements.head')

<body>

    {{-- Skip link WCAG 2.4.1 --}}
    <a href="#main-content" class="skip-link visually-hidden-focusable">Aller au contenu principal</a>

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
                <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/logo.svg') }}" alt="Kalystrat"></a>
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
    @include('frontend::elements.header')

    <main id="main-content" role="main" tabindex="-1">

    <!--==============================
    Hero Area
    ==============================-->
    <div class="hero-wrapper hero-1" id="hero" data-bg-src="{{ asset('themes/construz/assets/img/hero/hero_bg_1_1.png') }}">
        <div class="hero-bg-shape1-1"></div>
        <div class="hero-bg-shape1-2"></div>
        <div class="section-animation-shape1-1 shape-mockup animation-infinite" data-bg-src="{{ asset('themes/construz/assets/img/shape/global-line-shape1.png') }}">
        </div>
        <div class="section-animation-shape1-2 shape-mockup animation-infinite" data-bg-src="{{ asset('themes/construz/assets/img/shape/global-line-shape1.png') }}">
        </div>
        <div class="hero-slider1">
            <div class="hero-slide">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-6">
                            <div class="hero-style1">
                                <h1 class="hero-title text-white">Build Your dream buildings for the future</h1>
                                <p class="hero-text text-white">We craft unique digital experiences. With more than 7 years of
                                    expertise we design and code clean websites.</p>
        
                                <div class="btn-group">
                                    <a href="{{ route('about') }}" class="btn style2">Discover More <i class="ri-arrow-right-up-line"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>                
                </div>
                <div class="hero-thumb text-center">
                    <img src="{{ asset('themes/construz/assets/img/hero/hero_thumb_1_1.png') }}" alt="img">
                </div>
            </div>
            <div class="hero-slide">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-6">
                            <div class="hero-style1">
                                <h1 class="hero-title text-white">Quality Build Construction Service</h1>
                                <p class="hero-text text-white">We craft unique digital experiences. With more than 7 years of
                                    expertise we design and code clean websites.</p>
        
                                <div class="btn-group">
                                    <a href="{{ route('about') }}" class="btn style2">Discover More <i class="ri-arrow-right-up-line"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>                
                </div>
                <div class="hero-thumb text-center">
                    <img src="{{ asset('themes/construz/assets/img/hero/hero_thumb_1_2.png') }}" alt="img">
                </div>
            </div>
            <div class="hero-slide">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-6">
                            <div class="hero-style1">
                                <h1 class="hero-title text-white">Apex Architects Build Construction for future</h1>
                                <p class="hero-text text-white">We craft unique digital experiences. With more than 7 years of
                                    expertise we design and code clean websites.</p>
        
                                <div class="btn-group">
                                    <a href="{{ route('about') }}" class="btn style2">Discover More <i class="ri-arrow-right-up-line"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>                
                </div>
                <div class="hero-thumb text-center">
                    <img src="{{ asset('themes/construz/assets/img/hero/hero_thumb_1_3.png') }}" alt="img">
                </div>
            </div>
        </div>
        <div class="slider-controller-wrap">
            <div class="slider-btn-wrap">
                <div class="icon-box">
                    <button data-slick-prev=".hero-slider1" class="slick-arrow default"><i class="ri-arrow-left-down-line"></i></button>
                    <button data-slick-next=".hero-slider1" class="slick-arrow default"><i class="ri-arrow-right-up-line"></i></button>
                </div>
                <div class="slides-numbers">
                    <span class="active">01</span> / <span class="total"></span>
                </div>
            </div>
        </div>
        <div class="hero-shape1-1 shape-mockup movingX">
            <img src="{{ asset('themes/construz/assets/img/hero/hero_shape_1_1.png') }}" alt="img">
        </div>
        <div class="hero-experience-wrap" data-bg-src="{{ asset('themes/construz/assets/img/hero/hero_experience_wrap_bg_1_1.png') }}">
            <span class="shadow-text">Business Experience</span>
            <div class="hero-experience-icon">
                <img src="{{ asset('themes/construz/assets/img/hero/hero_experience_wrap_icon_1_1.png') }}" alt="img">
            </div>
            <h2 class="hero-experience-counter">
                <span class="counter-number">40</span>+
            </h2>
            <p class="hero-experience-text">Years we have been doing this</p>
            <div class="media">
                <div class="icon">
                    <img src="{{ asset('themes/construz/assets/img/hero/hero_experience_wrap_icon_1_2.png') }}" alt="img">
                </div>
                <a class="link-btn" href="{{ route('about') }}">Let’s work together <img src="{{ asset('themes/construz/assets/img/icon/long-arrow-right.png') }}" alt="img"></a>
            </div>
        </div>
    </div>
    <!--======== / Hero Section ========-->

    <!--==============================
    About Area  
    ==============================-->
    <div class="about-area-1 space overflow-hidden">
        <div class="section-animation-shape1-1 shape-mockup animation-infinite" data-bottom="0" data-bg-src="{{ asset('themes/construz/assets/img/shape/global-line-shape2.png') }}">
        </div>
        <div class="about_shape_1-1 shape-mockup jump-reverse" data-bottom="0" data-right="0">
            <img src="{{ asset('themes/construz/assets/img/normal/about_shape_1-2.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="row gx-60 align-items-center">
                <div class="col-xl-6">
                    <div class="about-thumb1 mb-40 mb-lg-0"> 
                        <div class="about-img-1">
                            <img src="{{ asset('themes/construz/assets/img/normal/about_1-1.png') }}" alt="img">
                        </div>
                        <div class="about-counter-wrap jump">
                            <h3 class="about-counter-number"><span class="counter-number">1.2</span>k</h3>
                            <p class="about-counter-text">Happy Customers</p>
                            <div class="about-counter-shape">
                                <img src="{{ asset('themes/construz/assets/img/normal/about_shape_1-1.png') }}" alt="img">
                            </div>
                            <div class="client-group-thumb">
                                <img src="{{ asset('themes/construz/assets/img/normal/client_group_1-1.png') }}" alt="img">
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-content-wrap1">
                        <div class="title-area mb-25">
                            <span class="sub-title"><img src="{{ asset('themes/construz/assets/img/icon/section-subtitle-icon.svg') }}" alt="img">ABOUT US</span>
                            <h2 class="sec-title">We building everything Tthat you needed</h2>
                            <p class="sec-text">We craft unique digital experiences. With more than 7 years of expertise we design and code clean websites.  
                            </p>
                        </div>
                        <div class="checklist mb-35">
                            <ul>
                                <li><img src="{{ asset('themes/construz/assets/img/icon/about-checklsit-icon1-1.svg') }}" alt="img">Providing Solutions For Construction, Management
                                </li>
                                <li><img src="{{ asset('themes/construz/assets/img/icon/about-checklsit-icon1-1.svg') }}" alt="img">Engineers design and build the structure</li>
                            </ul>
                        </div>
                        <div class="about-grid-wrap">
                            <div class="icon">
                                <img src="{{ asset('themes/construz/assets/img/icon/about-grid-icon1-1.svg') }}" alt="img">
                            </div>
                            <div class="about-grid-details">
                                <h4 class="title">Our Mission</h4>
                                <p class="text">We craft unique digital experiences. With more years of expertise we design </p>
                            </div>
                        </div>
                        <div class="about-grid-wrap">
                            <div class="icon">
                                <img src="{{ asset('themes/construz/assets/img/icon/about-grid-icon1-2.svg') }}" alt="img">
                            </div>
                            <div class="about-grid-details">
                                <h4 class="title">Our Vision</h4>
                                <p class="text">We craft unique digital experiences. With more years of expertise we design </p>
                            </div>
                        </div>
                        <div class="btn-group mt-60">
                            <a href="{{ route('about') }}" class="btn style3">Explore Our Company <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>   
    
    <!--==============================
    Service Area 01  
    ==============================-->
    <div class="service-area-1 space-top overflow-hidden" data-bg-src="{{ asset('themes/construz/assets/img/bg/service-bg1-1.png') }}">
        <div class="container">
            <div class="row gy-30 gx-30">
                <div class="col-xl-4 col-md-6">
                    <div class="title-area mb-0 text-md-start text-center">
                        <span class="sub-title"><img src="{{ asset('themes/construz/assets/img/icon/section-subtitle-icon.svg') }}" alt="img"> What We Do</span>
                        <h2 class="sec-title">Our services that we provide</h2>
                        <p>We craft unique digital experiences. With more than 7 years of expertise we design and code clean</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-shadow-text">
                            SERVICES - 01
                        </div>
                        <div class="service-card_content">
                            <div class="service-card_icon">
                                <img src="{{ asset('themes/construz/assets/img/icon/service-icon1-1.png') }}" alt="img">
                            </div>
                            <h4 class="service-card_title"><a href="{{ route('serviceDetails') }}">General construction</a></h4>
                            <p class="service-card_text">There are many passages of lorem ipsum available</p>
                            <div class="btn-wrap">
                                <div class="icon-btn"><i class="ri-arrow-right-up-line"></i></div>
                                <a href="{{ route('serviceDetails') }}" class="btn">Explore Service <i class="ri-arrow-right-up-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-shadow-text">
                            SERVICES - 02
                        </div>
                        <div class="service-card_content">
                            <div class="service-card_icon">
                                <img src="{{ asset('themes/construz/assets/img/icon/service-icon1-2.png') }}" alt="img">
                            </div>
                            <h4 class="service-card_title"><a href="{{ route('serviceDetails') }}">Property maintenance</a></h4>
                            <p class="service-card_text">There are many passages of lorem ipsum available</p>
                            <div class="btn-wrap">
                                <div class="icon-btn"><i class="ri-arrow-right-up-line"></i></div>
                                <a href="{{ route('serviceDetails') }}" class="btn">Explore Service <i class="ri-arrow-right-up-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-shadow-text">
                            SERVICES - 03
                        </div>
                        <div class="service-card_content">
                            <div class="service-card_icon">
                                <img src="{{ asset('themes/construz/assets/img/icon/service-icon1-3.png') }}" alt="img">
                            </div>
                            <h4 class="service-card_title"><a href="{{ route('serviceDetails') }}">Project management</a></h4>
                            <p class="service-card_text">There are many passages of lorem ipsum available</p>
                            <div class="btn-wrap">
                                <div class="icon-btn"><i class="ri-arrow-right-up-line"></i></div>
                                <a href="{{ route('serviceDetails') }}" class="btn">Explore Service <i class="ri-arrow-right-up-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-shadow-text">
                            SERVICES - 04
                        </div>
                        <div class="service-card_content">
                            <div class="service-card_icon">
                                <img src="{{ asset('themes/construz/assets/img/icon/service-icon1-4.png') }}" alt="img">
                            </div>
                            <h4 class="service-card_title"><a href="{{ route('serviceDetails') }}">Virtual design & build</a></h4>
                            <p class="service-card_text">There are many passages of lorem ipsum available</p>
                            <div class="btn-wrap">
                                <div class="icon-btn"><i class="ri-arrow-right-up-line"></i></div>
                                <a href="{{ route('serviceDetails') }}" class="btn">Explore Service <i class="ri-arrow-right-up-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="service-card">
                        <div class="service-card-shadow-text">
                            SERVICES - 05
                        </div>
                        <div class="service-card_content">
                            <div class="service-card_icon">
                                <img src="{{ asset('themes/construz/assets/img/icon/service-icon1-5.png') }}" alt="img">
                            </div>
                            <h4 class="service-card_title h5"><a href="{{ route('serviceDetails') }}">Proconstruction</a></h4>
                            <p class="service-card_text">There are many passages of lorem ipsum available</p>
                            <div class="btn-wrap">
                                <div class="icon-btn"><i class="ri-arrow-right-up-line"></i></div>
                                <a href="{{ route('serviceDetails') }}" class="btn">Explore Service <i class="ri-arrow-right-up-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
    CTA Area 01  
    ==============================-->
    <div class="cta-area-1">
        <div class="container">
            <div class="row gx-0 align-items-center">
                <div class="col-lg-7">
                    <div class="cta-wrap-1 position-relative">
                        <div class="section-animation-shape1-1 shape-mockup animation-infinite" data-top="0" data-left="0" data-bg-src="{{ asset('themes/construz/assets/img/shape/global-line-shape1.png') }}">
                        </div>
                        <div class="title-area mb-40 text-md-start text-center">
                            <span class="sub-title"><img src="{{ asset('themes/construz/assets/img/icon/section-subtitle-icon.svg') }}" alt="img">GET FREE QUOTE</span>
                            <h3 class="sec-title">Have a project in mind?</h3>
                        </div>
                        <form action="mail.php" method="POST" class="cta-contact-form ajax-contact">
                            <div class="row gy-15">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name" class="visually-hidden">Nom complet</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Nom complet" autocomplete="name" aria-label="Nom complet" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email" class="visually-hidden">Courriel</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Courriel" autocomplete="email" aria-label="Courriel" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="subject" id="subject" class="single-select nice-select form-select">
                                            <option value="" disabled selected hidden>Your Inquiry</option>
                                            <option value="Web Design">Web Design</option>
                                            <option value="Web Development">Web Development</option>
                                            <option value="Engine Diagnostics">Engine Diagnostics</option>
                                            <option value="Digital Marketing">Digital Marketing</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-btn col-12">
                                    <button type="submit" class="btn w-100">SUBMIT NOW<i class="ri-arrow-right-up-line"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="cta-thumb1-1">
                        <img src="{{ asset('themes/construz/assets/img/normal/cta-thumb1-1.png') }}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
    Why Choose Area 01  
    ==============================-->
    <div class="space-top text-center overflow-hidden">
        <div class="section-animation-shape1-1 shape-mockup animation-infinite" data-bottom="0" data-bg-src="{{ asset('themes/construz/assets/img/shape/global-line-shape2.png') }}">
        </div>
        <div class="container">
            <div class="title-area text-center">
                <div class="shadow-title">Why Choose Us</div>
                <span class="sub-title"><img src="{{ asset('themes/construz/assets/img/icon/section-subtitle-icon.svg') }}" alt="img"> Why Choose Us</span>
                <h2 class="sec-title">High Quality Innovate Design</h2>
            </div>
            <div class="row gy-50 align-items-center">
                <div class="col-xl-4 col-md-6">
                    <div class="wcu-card-wrap left-align">
                        <div class="wcu-card">
                            <div class="wcu-card-icon">
                                <img src="{{ asset('themes/construz/assets/img/icon/why-icon1-1.svg') }}" alt="img">
                            </div>
                            <div class="wcu-card-details">
                                <h4 class="wcu-card-title">Technology</h4>
                                <p class="wcu-card-text">We are expert your all work is very nice waiting for next project.</p>
                            </div>
                        </div>
                        <div class="wcu-card">
                            <div class="wcu-card-icon">
                                <img src="{{ asset('themes/construz/assets/img/icon/why-icon1-2.svg') }}" alt="img">
                            </div>
                            <div class="wcu-card-details">
                                <h4 class="wcu-card-title">Core Planning</h4>
                                <p class="wcu-card-text">All the Lorem Ipsum generators on the Internet tend to repeat predefined</p>
                            </div>
                        </div>
                        <div class="wcu-card">
                            <div class="wcu-card-icon">
                                <img src="{{ asset('themes/construz/assets/img/icon/why-icon1-3.svg') }}" alt="img">
                            </div>
                            <div class="wcu-card-details">
                                <h4 class="wcu-card-title">Project Result</h4>
                                <p class="wcu-card-text">Making this the first true generator on the Internet uses a dictionary</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 order-xl-3">
                    <div class="wcu-card-wrap right-align">
                        <div class="wcu-card">
                            <div class="wcu-card-icon">
                                <img src="{{ asset('themes/construz/assets/img/icon/why-icon1-4.svg') }}" alt="img">
                            </div>
                            <div class="wcu-card-details">
                                <h4 class="wcu-card-title">Trusted Clients</h4>
                                <p class="wcu-card-text">Passage of Lorem Ipsum, you need to be sure there isn't anything</p>
                            </div>
                        </div>
                        <div class="wcu-card">
                            <div class="wcu-card-icon">
                                <img src="{{ asset('themes/construz/assets/img/icon/why-icon1-5.svg') }}" alt="img">
                            </div>
                            <div class="wcu-card-details">
                                <h4 class="wcu-card-title">Skilled Team</h4>
                                <p class="wcu-card-text">We are expert your all work is very nice waiting for next project.</p>
                            </div>
                        </div>
                        <div class="wcu-card">
                            <div class="wcu-card-icon">
                                <img src="{{ asset('themes/construz/assets/img/icon/why-icon1-6.svg') }}" alt="img">
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
                        <img src="{{ asset('themes/construz/assets/img/normal/why_1-1.png') }}" alt="img">
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!--==============================
    Process Area  
    ==============================-->
    <section class="process-area-1 space-top bg-attachment process-bg-half" data-bg-src="{{ asset('themes/construz/assets/img/bg/process-bg1-1.png') }}" data-overlay="title" data-opacity="8">
        <div class="process_shape_1-1 movingX shape-mockup d-lg-block d-none"></div>
        <div class="process_shape_1-2 moving shape-mockup d-lg-block d-none"></div>
        <div class="process_shape_1-3 shape-mockup jump-reverse d-xl-block d-none" data-bottom="-50%" data-right="0">
            <img src="{{ asset('themes/construz/assets/img/shape/sec-bg-shape1.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-4 col-md-6">
                    <div class="title-area text-md-start text-center">
                        <span class="sub-title text-white"><img src="{{ asset('themes/construz/assets/img/icon/section-subtitle-icon.svg') }}" alt="img">Work Process</span>
                        <h2 class="sec-title text-white">Our services that we provide</h2>
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
                <span class="sub-title"><img src="{{ asset('themes/construz/assets/img/icon/section-subtitle-icon.svg') }}" alt="img">Recent Work</span>
                <h2 class="sec-title">Check our latest projects</h2>
                <p class="sec-text">We are the best construction agency in the world</p>
            </div>
            <div class="portfolio-slider1 overflow-hidden">
                <div class="row gy-30 gx-30 global-carousel" data-slide-show="1" data-dots="true" data-xl-dots="true" data-ml-dots="true" data-lg-dots="true" data-md-dots="true" data-center-mode="true" data-xl-center-mode="true" data-ml-center-mode="true" data-center-padding="265px" data-xl-center-padding="265px" data-ml-center-padding="200px">
                    <div class="col-lg-6">
                        <div class="portfolio-card">
                            <div class="portfolio-card-thumb">
                                <img src="{{ asset('themes/construz/assets/img/project/project1_1.png') }}" alt="img">
                                <a class="icon-btn popup-image" href="assets/img/project/project1_1.png"><i class="ri-eye-line"></i></a>
                            </div>
                            <div class="portfolio-card-details">
                                <div class="media-left">
                                    <span class="portfolio-card-subtitle">Building</span>
                                    <h4 class="portfolio-card-title"><a href="{{ route('projectDetails') }}">General Construction</a></h4>
                                    <p class="portofolio-card-text">Building since 09,01,2024</p>
                                </div>  
                            </div>
                            <a href="{{ route('projectDetails') }}" class="btn">Explore Service <i class="ri-arrow-right-up-line"></i></a>                          
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="portfolio-card">
                            <div class="portfolio-card-thumb">
                                <img src="{{ asset('themes/construz/assets/img/project/project1_2.png') }}" alt="img">
                                <a class="icon-btn popup-image" href="assets/img/project/project1_2.png"><i class="ri-eye-line"></i></a>
                            </div>
                            <div class="portfolio-card-details">
                                <div class="media-left">
                                    <span class="portfolio-card-subtitle">Building</span>
                                    <h4 class="portfolio-card-title"><a href="{{ route('projectDetails') }}">General Construction</a></h4>
                                    <p class="portofolio-card-text">Building since 09,01,2024</p>
                                </div>  
                            </div>
                            <a href="{{ route('projectDetails') }}" class="btn">Explore Service <i class="ri-arrow-right-up-line"></i></a>                          
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="portfolio-card">
                            <div class="portfolio-card-thumb">
                                <img src="{{ asset('themes/construz/assets/img/project/project1_3.png') }}" alt="img">
                                <a class="icon-btn popup-image" href="assets/img/project/project1_3.png"><i class="ri-eye-line"></i></a>
                            </div>
                            <div class="portfolio-card-details">
                                <div class="media-left">
                                    <span class="portfolio-card-subtitle">Building</span>
                                    <h4 class="portfolio-card-title"><a href="{{ route('projectDetails') }}">General Construction</a></h4>
                                    <p class="portofolio-card-text">Building since 09,01,2024</p>
                                </div>  
                            </div>
                            <a href="{{ route('projectDetails') }}" class="btn">Explore Service <i class="ri-arrow-right-up-line"></i></a>                          
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="portfolio-card">
                            <div class="portfolio-card-thumb">
                                <img src="{{ asset('themes/construz/assets/img/project/project1_1.png') }}" alt="img">
                                <a class="icon-btn popup-image" href="assets/img/project/project1_1.png"><i class="ri-eye-line"></i></a>
                            </div>
                            <div class="portfolio-card-details">
                                <div class="media-left">
                                    <span class="portfolio-card-subtitle">Building</span>
                                    <h4 class="portfolio-card-title"><a href="{{ route('projectDetails') }}">General Construction</a></h4>
                                    <p class="portofolio-card-text">Building since 09,01,2024</p>
                                </div>  
                            </div>
                            <a href="{{ route('projectDetails') }}" class="btn">Explore Service <i class="ri-arrow-right-up-line"></i></a>                          
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="portfolio-card">
                            <div class="portfolio-card-thumb">
                                <img src="{{ asset('themes/construz/assets/img/project/project1_2.png') }}" alt="img">
                                <a class="icon-btn popup-image" href="assets/img/project/project1_2.png"><i class="ri-eye-line"></i></a>
                            </div>
                            <div class="portfolio-card-details">
                                <div class="media-left">
                                    <span class="portfolio-card-subtitle">Building</span>
                                    <h4 class="portfolio-card-title"><a href="{{ route('projectDetails') }}">General Construction</a></h4>
                                    <p class="portofolio-card-text">Building since 09,01,2024</p>
                                </div>  
                            </div>
                            <a href="{{ route('projectDetails') }}" class="btn">Explore Service <i class="ri-arrow-right-up-line"></i></a>                          
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="portfolio-card">
                            <div class="portfolio-card-thumb">
                                <img src="{{ asset('themes/construz/assets/img/project/project1_3.png') }}" alt="img">
                                <a class="icon-btn popup-image" href="assets/img/project/project1_3.png"><i class="ri-eye-line"></i></a>
                            </div>
                            <div class="portfolio-card-details">
                                <div class="media-left">
                                    <span class="portfolio-card-subtitle">Building</span>
                                    <h4 class="portfolio-card-title"><a href="{{ route('projectDetails') }}">General Construction</a></h4>
                                    <p class="portofolio-card-text">Building since 09,01,2024</p>
                                </div>  
                            </div>
                            <a href="{{ route('projectDetails') }}" class="btn">Explore Service <i class="ri-arrow-right-up-line"></i></a>                          
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
        <div class="section-animation-shape1-1 shape-mockup animation-infinite" data-bottom="0" data-bg-src="{{ asset('themes/construz/assets/img/shape/global-line-shape2.png') }}">
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
    <div class="testimonial-area-1 overflow-hidden space bg-smoke" data-bg-src="{{ asset('themes/construz/assets/img/bg/testimonial-bg1-1.png') }}">
        <div class="testimonial_shape_1-1 shape-mockup jump d-xxl-block d-none" data-top="0" data-right="4%">
            <img src="{{ asset('themes/construz/assets/img/shape/sec-bg-shape2.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="row gx-100 gy-60 flex-row-reverse">                
                <div class="col-xl-6">
                    <div class="title-area">
                        <span class="sub-title"><img src="{{ asset('themes/construz/assets/img/icon/section-subtitle-icon.svg') }}" alt="img">Testimonials</span>
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
                                        <span class="testi-profile-desig">CEO at Kalystrat</span>                                                                       
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
                                        <span class="testi-profile-desig">CEO at Kalystrat</span>                                                                       
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
                            <img src="{{ asset('themes/construz/assets/img/normal/client_group_1-2.png') }}" alt="img">
                        </div>
                        <div class="testi-counter-wrap">
                            <h3 class="testi-counter-number"><span class="counter-number">2</span>m+</h3>
                            <p class="testi-counter-text">Success Peoples</p>                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="testimonial-card" data-bg-src="{{ asset('themes/construz/assets/img/bg/testimonial-card-bg1-1.png') }}">
                        <h3 class="testimonial-card-title">Have you any questions?</h3>
                        <p class="testimonial-card-text">Podcasting operational change management inside of making this the first true generator.</p>
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
        <div class="section-animation-shape1-1 shape-mockup animation-infinite" data-bottom="0" data-bg-src="{{ asset('themes/construz/assets/img/shape/global-line-shape2.png') }}">
        </div>
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-7 col-md-7">
                    <div class="title-area text-md-start text-center">
                        <span class="sub-title"><img src="{{ asset('themes/construz/assets/img/icon/section-subtitle-icon.svg') }}" alt="img">Our Team</span>
                        <h2 class="sec-title">Meet our leadership</h2>
                    </div>
                </div>
                <div class="col-md-auto">
                    <div class="sec-btn">
                        <a href="{{ route('about') }}" class="btn">View All Members <i class="ri-arrow-right-up-line"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="row gy-30 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="team-card" data-bg-src="{{ asset('themes/construz/assets/img/bg/team-card-bg1-1.png') }}">
                        <div class="team-card_content">
                            <h4 class="team-card_title"><a href="{{ route('teamDetails') }}">Penelopa Miller</a>
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
                            <img src="{{ asset('themes/construz/assets/img/team/team-1-1.png') }}" alt="img">
                        </div>
                        <a href="tel:0023745671379" class="contact-btn-wrap">
                            <span class="number">(+00) 347 456 1379</span>
                            <div class="icon-btn"><i class="ri-phone-fill"></i></div>
                        </a>                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="team-card" data-bg-src="{{ asset('themes/construz/assets/img/bg/team-card-bg1-1.png') }}">
                        <div class="team-card_content">
                            <h4 class="team-card_title"><a href="{{ route('teamDetails') }}">Mark Ronaldo</a>
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
                            <img src="{{ asset('themes/construz/assets/img/team/team-1-2.png') }}" alt="img">
                        </div>
                        <a href="tel:0023745671379" class="contact-btn-wrap">
                            <span class="number">(+00) 347 456 1379</span>
                            <div class="icon-btn"><i class="ri-phone-fill"></i></div>
                        </a>                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="team-card" data-bg-src="{{ asset('themes/construz/assets/img/bg/team-card-bg1-1.png') }}">
                        <div class="team-card_content">
                            <h4 class="team-card_title"><a href="{{ route('teamDetails') }}">John Maxwell</a>
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
                            <img src="{{ asset('themes/construz/assets/img/team/team-1-3.png') }}" alt="img">
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
    <div class="client-area-1 text-center space overflow-hidden" data-bg-src="{{ asset('themes/construz/assets/img/bg/client-bg1-1.png') }}" data-overlay="title" data-opacity="9">
        <div class="client_shape_1-1 shape-mockup jump-reverse" data-bottom="0%" data-right="-6%">
            <img src="{{ asset('themes/construz/assets/img/shape/client-bg-shape1.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title text-white"><img src="{{ asset('themes/construz/assets/img/icon/section-subtitle-icon.svg') }}" alt="img">Happy Clients</span>
                <h2 class="sec-title text-white">Our trusted partners</h2>
            </div>
            <div class="row global-carousel client-slider1" data-slide-show="5" data-lg-slide-show="4" data-md-slide-show="3" data-sm-slide-show="2">
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/client/client-1-1.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/client/client-1-2.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/client/client-1-3.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/client/client-1-4.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/client/client-1-5.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/client/client-1-1.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/client/client-1-2.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/client/client-1-3.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/client/client-1-4.svg') }}" alt="img"></a>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="client-logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/client/client-1-5.svg') }}" alt="img"></a>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <!--==============================
    Blog Area  
    ==============================-->
    <section class="blog-area-1 space">
        <div class="section-animation-shape1-1 shape-mockup animation-infinite" data-top="0" data-bg-src="{{ asset('themes/construz/assets/img/shape/global-line-shape1.png') }}">
        </div>
        <div class="container">
            <div class="row justify-content-lg-between justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="title-area text-lg-start text-center">
                        <span class="sub-title"><img src="{{ asset('themes/construz/assets/img/icon/section-subtitle-icon.svg') }}" alt="img">Latest News</span>
                        <h2 class="sec-title">Recent news and events</h2>
                    </div>
                </div>
                <div class="col-md-auto">
                    <div class="sec-btn">
                        <a href="{{ route('blog') }}" class="btn style-border">View All News <i class="ri-arrow-right-up-line"></i></a>
                    </div>
                </div>
            </div>
            <div class="row global-carousel blog-slider slider-shadow" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="1" data-xs-slide-show="1" data-dots="false">
                <div class="col-md-6 col-lg-4">
                    <div class="blog-card">
                        <div class="blog-img">
                            <img src="{{ asset('themes/construz/assets/img/blog/blog_1_1.png') }}" alt="blog image">
                            <div class="blog-date">
                                <a href="{{ route('blog') }}"><span>17</span>JUN</a>
                                <div class="year">2024</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="{{ route('blog') }}">By Rebecca</a>
                                <a href="{{ route('blog') }}">Construction</a>
                            </div>
                            <h3 class="blog-title"><a href="{{ route('blogDetails') }}">How to hire a contractor home renovation service</a></h3>
                            <p class="blog-text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam. Odio ut sem nulla phar.</p>
                            <a href="{{ route('blogDetails') }}" class="btn">More Details <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="blog-card">
                        <div class="blog-img">
                            <img src="{{ asset('themes/construz/assets/img/blog/blog_1_2.png') }}" alt="blog image">
                            <div class="blog-date">
                                <a href="{{ route('blog') }}"><span>17</span>JUN</a>
                                <div class="year">2024</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="{{ route('blog') }}">By Rebecca</a>
                                <a href="{{ route('blog') }}">Construction</a>
                            </div>
                            <h3 class="blog-title"><a href="{{ route('blogDetails') }}">Started to develop a specific testing programs</a></h3>
                            <p class="blog-text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam. Odio ut sem nulla phar.</p>
                            <a href="{{ route('blogDetails') }}" class="btn">More Details <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="blog-card">
                        <div class="blog-img">
                            <img src="{{ asset('themes/construz/assets/img/blog/blog_1_3.png') }}" alt="blog image">
                            <div class="blog-date">
                                <a href="{{ route('blog') }}"><span>17</span>JUN</a>
                                <div class="year">2024</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="{{ route('blog') }}">By Rebecca</a>
                                <a href="{{ route('blog') }}">Construction</a>
                            </div>
                            <h3 class="blog-title"><a href="{{ route('blogDetails') }}">How to stay motivated until a project is finished</a></h3>
                            <p class="blog-text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam. Odio ut sem nulla phar.</p>
                            <a href="{{ route('blogDetails') }}" class="btn">More Details <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="blog-card">
                        <div class="blog-img">
                            <img src="{{ asset('themes/construz/assets/img/blog/blog_1_1.png') }}" alt="blog image">
                            <div class="blog-date">
                                <a href="{{ route('blog') }}"><span>17</span>JUN</a>
                                <div class="year">2024</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="{{ route('blog') }}">By Rebecca</a>
                                <a href="{{ route('blog') }}">Construction</a>
                            </div>
                            <h3 class="blog-title"><a href="{{ route('blogDetails') }}">How to hire a contractor home renovation service</a></h3>
                            <p class="blog-text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam. Odio ut sem nulla phar.</p>
                            <a href="{{ route('blogDetails') }}" class="btn">More Details <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="blog-card">
                        <div class="blog-img">
                            <img src="{{ asset('themes/construz/assets/img/blog/blog_1_2.png') }}" alt="blog image">
                            <div class="blog-date">
                                <a href="{{ route('blog') }}"><span>17</span>JUN</a>
                                <div class="year">2024</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="{{ route('blog') }}">By Rebecca</a>
                                <a href="{{ route('blog') }}">Construction</a>
                            </div>
                            <h3 class="blog-title"><a href="{{ route('blogDetails') }}">Started to develop a specific testing programs</a></h3>
                            <p class="blog-text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam. Odio ut sem nulla phar.</p>
                            <a href="{{ route('blogDetails') }}" class="btn">More Details <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="blog-card">
                        <div class="blog-img">
                            <img src="{{ asset('themes/construz/assets/img/blog/blog_1_3.png') }}" alt="blog image">
                            <div class="blog-date">
                                <a href="{{ route('blog') }}"><span>17</span>JUN</a>
                                <div class="year">2024</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="{{ route('blog') }}">By Rebecca</a>
                                <a href="{{ route('blog') }}">Construction</a>
                            </div>
                            <h3 class="blog-title"><a href="{{ route('blogDetails') }}">How to stay motivated until a project is finished</a></h3>
                            <p class="blog-text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam. Odio ut sem nulla phar.</p>
                            <a href="{{ route('blogDetails') }}" class="btn">More Details <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    </main>

    <!--==============================
    Footer Area
    ==============================-->
    @include('frontend::elements.footer')

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