<!doctype html>
<html class="no-js" lang="zxx">

    @include('frontend::elements.head')

<body>

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
    <header class="nav-header header-layout3 onepage-nav">
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
                                        <a href="#hero-sec">HOME</a>
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
                                        <a href="#about-sec">ABOUT</a>
                                    </li>
                                    <li>
                                        <a href="#service-sec">SERVICES</a>
                                    </li>
                                    <li>
                                        <a href="#project-sec">PORTFOLIO</a>
                                    </li>
                                    <li>
                                        <a href="#blog-sec">NEWS</a>
                                    </li>                                                                      
                                    <li>
                                        <a href="#contact-sec">CONTACT</a>
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
                                        <a class="link" href="tel:+15815786145">1-581-578-6145</a>
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
    <div class="hero-wrapper hero-3" id="hero-sec">
        <div class="hero-bg-3-1" data-mask-src="{{ asset('themes/construz/assets/img/hero/hero_bg_mask_3_1.png') }}" data-bg-src="{{ asset('themes/construz/assets/img/hero/hero_bg_3_1.png') }}"></div>
        <div class="hero-shadow-text">construz</div>
        <div class="hero-bg-shape3-1 shape-mockup jump" data-bottom="3%" data-left="3%">
            <img src="{{ asset('themes/construz/assets/img/shape/sec-bg-shape2.png') }}" alt="img">
        </div>
        
        <div class="container">
            <div class="hero-style3">
                <div class="row">
                    <div class="col-lg-12">
                        <span class="hero-subtitle">Our Vision <img src="{{ asset('themes/construz/assets/img/icon/long-arrow-right2.svg') }}" alt="img"></span>
                        <h1 class="hero-title">Quality Construction</h1>
                        <h1 class="hero-title style2">& Honest Service</h1>
                        <p class="hero-text">We craft unique digital experiences. With more than 7 years of expertise we design and code clean websites.</p>
                        <a href="{{ route('about') }}" class="btn style2">DISCOVER MORE <i class="ri-arrow-right-up-line"></i></a>
                    </div>
                </div>
            </div>                
        </div>
    </div>
    <!--======== / Hero Section ========-->

    <!--==============================
    About Area  
    ==============================-->
    <div class="about-area-3 space overflow-hidden" id="about-sec">
        <div class="container">
            <div class="row gy-80 gx-100 align-items-end">                
                <div class="col-xl-7">
                    <div class="about-wrap3">
                        <div class="title-area mb-25">
                            <span class="sub-title text-theme">ABOUT US <i class="ri-arrow-right-down-line"></i></span>
                            <h2 class="sec-title">We building everything that you needed</h2>
                            <p class="sec-text">We craft unique digital experiences. With more than 7 years of expertise we design and code clean websites. </p>
                            
                        </div>
                        <div class="checklist mb-35">
                            <ul>
                                <li><img src="{{ asset('themes/construz/assets/img/icon/about-checklsit-icon1-1.svg') }}" alt="img">Providing Solutions For Construction, Management
                                </li>
                                <li><img src="{{ asset('themes/construz/assets/img/icon/about-checklsit-icon1-1.svg') }}" alt="img">Engineers design and build the structure</li>
                            </ul>
                        </div>
                        <div class="btn-wrap">
                            <div class="cta-grid-wrap">
                                <div class="icon-btn">
                                    <i class="ri-phone-fill"></i>
                                </div>
                                <div class="media-body">
                                    <a class="link" href="tel:+15815786145">1-581-578-6145</a>
                                    <h6 class="title">Ned Help?</h6>
                                </div>
                            </div>
                            <div class="about-author-wrap">
                                <div class="author-thumb">
                                    <img src="{{ asset('themes/construz/assets/img/normal/about_3-4.png') }}" alt="img">
                                </div>
                                <div class="media-body">
                                    <div class="author-sign">
                                        <img src="{{ asset('themes/construz/assets/img/normal/about_3-3.png') }}" alt="img">
                                    </div>
                                    <div class="author-text">Founder of Construz</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="about-thumb3 mt-70"> 
                        <div class="video-wrap about-img-1">
                            <img src="{{ asset('themes/construz/assets/img/normal/about_3-1.png') }}" alt="img">
                            <a href="https://www.youtube.com/watch?v=Mp8IXI1kzvQ" class="play-btn style6 popup-video"><i class="ri-play-fill"></i></a>
                        </div>
                    </div>                                  
                </div>
                <div class="col-xl-5 col-md-8">
                    <div class="about-thumb3 mb-30"> 
                        <div class="about-img-2" data-mask-src="{{ asset('themes/construz/assets/img/normal/about_mask3-2.png') }}">
                            <img src="{{ asset('themes/construz/assets/img/normal/about_3-2.png') }}" alt="img">
                        </div>
                    </div>
                    <p>We craft unique digital experiences. With more than 7 years of expertise we design and code clean websites. </p>
                    <div class="btn-group mt-35">
                        <a href="{{ route('about') }}" class="btn">Now more Company <i class="ri-arrow-right-up-line"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
    <!--==============================
    Why Choose Area 03  
    ==============================-->
    <div class="why-area-3 space-top overflow-hidden" id="service-sec">
        <div class="why-sec-bg3-1" data-bg-src="{{ asset('themes/construz/assets/img/bg/why-bg3-1.png') }}"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="title-area text-center">
                        <span class="sub-title text-theme">What we do <i class="ri-arrow-right-down-line"></i></span>
                        <h2 class="sec-title">We provide excellent service to our customers</h2>
                    </div>
                </div>
            </div>
            <div class="row gy-50">
                <div class="col-xl-4">
                    <ul class="why-tab-wrap nav nav-pills" role=tablist>
                        <li class="nav-item">
                          <button class="nav-link active" id="why-pill-1-tab" data-bs-toggle="pill" data-bs-target="#why-pill-1" type="button" role="tab" aria-controls="why-pill-1" aria-selected="true">General construction <i class="ri-arrow-right-down-line"></i></button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="why-pill-2-tab" data-bs-toggle="pill" data-bs-target="#why-pill-2" type="button" role="tab" aria-controls="why-pill-2" aria-selected="false">Property maintenance <i class="ri-arrow-right-down-line"></i></button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="why-pill-3-tab" data-bs-toggle="pill" data-bs-target="#why-pill-3" type="button" role="tab" aria-controls="why-pill-3" aria-selected="false">Project management <i class="ri-arrow-right-down-line"></i></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="why-pill-4-tab" data-bs-toggle="pill" data-bs-target="#why-pill-4" type="button" role="tab" aria-controls="why-pill-4" aria-selected="false">Renovation & Remodeling <i class="ri-arrow-right-down-line"></i></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="why-pill-5-tab" data-bs-toggle="pill" data-bs-target="#why-pill-5" type="button" role="tab" aria-controls="why-pill-5" aria-selected="false">Preconstruction <i class="ri-arrow-right-down-line"></i></button>
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
                                            <img src="{{ asset('themes/construz/assets/img/why/why-tab-thumb3-1.png') }}" alt="img">
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
                                        <h5 class="subtitle">General construction</h5>
                                        <p class="text">We craft unique digital experiences. With more than 7 years of expertise we design and code clean websites we have been the trusted name in heating, air conditioning and plumbing businesses.</p>
                                        <div class="checklist mb-35">
                                            <ul>
                                                <li><img src="{{ asset('themes/construz/assets/img/icon/about-checklsit-icon1-1.svg') }}" alt="img">Regularly Maintaining and Organizing your Tools
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group mt-35">
                                            <a href="{{ route('service') }}" class="btn style3">More Details <i class="ri-arrow-right-up-line"></i></a>
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
                                            <img src="{{ asset('themes/construz/assets/img/why/why-tab-thumb3-2.png') }}" alt="img">
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
                                        <h5 class="subtitle">Property maintenance</h5>
                                        <p class="text">We craft unique digital experiences. With more than 7 years of expertise we design and code clean websites we have been the trusted name in heating, air conditioning and plumbing businesses.</p>
                                        <div class="checklist mb-35">
                                            <ul>
                                                <li><img src="{{ asset('themes/construz/assets/img/icon/about-checklsit-icon1-1.svg') }}" alt="img">Regularly Maintaining and Organizing your Tools
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group mt-35">
                                            <a href="{{ route('service') }}" class="btn style3">More Details <i class="ri-arrow-right-up-line"></i></a>
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
                                            <img src="{{ asset('themes/construz/assets/img/why/why-tab-thumb3-1.png') }}" alt="img">
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
                                        <h5 class="subtitle">Project management</h5>
                                        <p class="text">We craft unique digital experiences. With more than 7 years of expertise we design and code clean websites we have been the trusted name in heating, air conditioning and plumbing businesses.</p>
                                        <div class="checklist mb-35">
                                            <ul>
                                                <li><img src="{{ asset('themes/construz/assets/img/icon/about-checklsit-icon1-1.svg') }}" alt="img">Regularly Maintaining and Organizing your Tools
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group mt-35">
                                            <a href="{{ route('service') }}" class="btn style3">More Details <i class="ri-arrow-right-up-line"></i></a>
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
                                            <img src="{{ asset('themes/construz/assets/img/why/why-tab-thumb3-2.png') }}" alt="img">
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
                                        <h5 class="subtitle">Renovation & Remodeling</h5>
                                        <p class="text">We craft unique digital experiences. With more than 7 years of expertise we design and code clean websites we have been the trusted name in heating, air conditioning and plumbing businesses.</p>
                                        <div class="checklist mb-35">
                                            <ul>
                                                <li><img src="{{ asset('themes/construz/assets/img/icon/about-checklsit-icon1-1.svg') }}" alt="img">Regularly Maintaining and Organizing your Tools
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group mt-35">
                                            <a href="{{ route('service') }}" class="btn style3">More Details <i class="ri-arrow-right-up-line"></i></a>
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
                                            <img src="{{ asset('themes/construz/assets/img/why/why-tab-thumb3-1.png') }}" alt="img">
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
                                        <h5 class="subtitle">Preconstruction</h5>
                                        <p class="text">We craft unique digital experiences. With more than 7 years of expertise we design and code clean websites we have been the trusted name in heating, air conditioning and plumbing businesses.</p>
                                        <div class="checklist mb-35">
                                            <ul>
                                                <li><img src="{{ asset('themes/construz/assets/img/icon/about-checklsit-icon1-1.svg') }}" alt="img">Regularly Maintaining and Organizing your Tools
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group mt-35">
                                            <a href="{{ route('service') }}" class="btn style3">More Details <i class="ri-arrow-right-up-line"></i></a>
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
    Process Area  
    ==============================-->
    <section class="process-area-2 space-top overflow-hidden">
        <div class="container">
            <div class="row justify-content-between align-items-center gy-40">
                <div class="col-lg-6">
                    <div class="title-area text-md-start text-center">
                        <span class="sub-title text-theme">Our Benefits <i class="ri-arrow-right-down-line"></i></span>
                        <h2 class="sec-title">Why choose us</h2>
                    </div>
                    <div class="process-thumb2-1">
                        <img src="{{ asset('themes/construz/assets/img/normal/process-thumb2-1.png') }}" alt="img">
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
    Portfolio Area  
    ==============================-->
    <div class="portfolio-area-3 space" id="project-sec">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7">
                    <div class="title-area text-lg-start text-center">
                        <span class="sub-title text-theme">Complete Works <i class="ri-arrow-right-down-line"></i></span>
                        <h2 class="sec-title">Explore recent projects</h2>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="sec-btn">
                        <a href="{{ route('project') }}" class="btn">View All Projects <i class="ri-arrow-right-up-line"></i></a>
                    </div>
                </div>
            </div>
            <div class="portfolio-slider3 overflow-hidden">
                <div class="row gy-30 gx-30 global-carousel" data-slide-show="2" data-ml-slide-show="2" data-lg-slide-show="1">
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
    Contact Area  
    ==============================-->
    <section class="contact-area-2 space-bottom overflow-hidden" id="contact-sec">        
        <div class="container">
            <div class="contact-wrap2 space overflow-hidden" data-bg-src="{{ asset('themes/construz/assets/img/bg/contact-bg3-1.png') }}">
                <div class="section-animation-shape1-1 shape-mockup animation-infinite" data-top="0" data-left="0" data-bg-src="{{ asset('themes/construz/assets/img/shape/global-line-shape1.png') }}">
                </div>
                <div class="row gy-60 justify-content-lg-end justify-content-center">
                    <div class="col-xl-7">
                        <div class="contact-form-wrap">
                            <div class="title-area">
                                <span class="sub-title text-theme">Get Free Quote <i class="ri-arrow-right-down-line"></i></span>
                                <h2 class="sec-title">Have a project in mind?</h2>
                            </div>
                            <form action="mail.php" method="POST" class="contact-form ajax-contact">
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Your Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="tel" class="form-control" name="number" id="number" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
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
                                    
                                    <div class="col-12">
                                        <div class="form-group ">
                                            <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Message..."></textarea>
                                        </div>
                                    </div>
                                    <div class="form-btn col-12">
                                        <button class="btn w-100">Submit Now <i class="ri-arrow-right-up-line"></i></button>
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
    Testimonial Area  
    ==============================-->
    <div class="testimonial-area-3 overflow-hidden">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7">
                    <div class="title-area text-lg-start text-center">
                        <span class="sub-title text-theme">Testimonials <i class="ri-arrow-right-down-line"></i></span>
                        <h2 class="sec-title">What client saying about us</h2>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="sec-btn btn-wrap">
                        <div class="client-group-thumb">
                            <img src="{{ asset('themes/construz/assets/img/normal/client_group_1-2.png') }}" alt="img">
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
                            <img src="{{ asset('themes/construz/assets/img/testimonial/testi_2_2.png') }}" alt="img">
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
                            <img src="{{ asset('themes/construz/assets/img/icon/quote3.svg') }}" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testi-card style3">
                        <div class="testi-card-thumb">
                            <img src="{{ asset('themes/construz/assets/img/testimonial/testi_2_3.png') }}" alt="img">
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
                            <img src="{{ asset('themes/construz/assets/img/icon/quote3.svg') }}" alt="img">
                        </div>                      
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testi-card style3">
                        <div class="testi-card-thumb">
                            <img src="{{ asset('themes/construz/assets/img/testimonial/testi_2_1.png') }}" alt="img">
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
                            <img src="{{ asset('themes/construz/assets/img/icon/quote3.svg') }}" alt="img">
                        </div>                      
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testi-card style3">
                        <div class="testi-card-thumb">
                            <img src="{{ asset('themes/construz/assets/img/testimonial/testi_2_2.png') }}" alt="img">
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
                            <img src="{{ asset('themes/construz/assets/img/icon/quote3.svg') }}" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testi-card style3">
                        <div class="testi-card-thumb">
                            <img src="{{ asset('themes/construz/assets/img/testimonial/testi_2_3.png') }}" alt="img">
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
                            <img src="{{ asset('themes/construz/assets/img/icon/quote3.svg') }}" alt="img">
                        </div>                      
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testi-card style3">
                        <div class="testi-card-thumb">
                            <img src="{{ asset('themes/construz/assets/img/testimonial/testi_2_1.png') }}" alt="img">
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
                            <img src="{{ asset('themes/construz/assets/img/icon/quote3.svg') }}" alt="img">
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
        </div>
    </div> 

    <!--==============================
    Team Area  
    ==============================-->
    <div class="team-area-2 space-bottom">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-7 col-md-7">
                    <div class="title-area text-md-start text-center">
                        <span class="sub-title text-theme">Worker <i class="ri-arrow-right-down-line"></i></span>
                        <h2 class="sec-title">Meet with our expert team</h2>
                    </div>
                </div>
                <div class="col-md-auto">
                    <div class="sec-btn">
                        <a href="{{ route('about') }}" class="btn">View All Worker <i class="ri-arrow-right-up-line"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="row gy-30 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="team-card style2">                        
                        <div class="team-card_img">
                            <img src="{{ asset('themes/construz/assets/img/team/team-2-1.png') }}" alt="img">
                            <div class="team-social_wrap">
                                <div class="social-btn">
                                    <a href="https://facebook.com/"><i class="ri-facebook-fill"></i></a>
                                    <a href="https://www.twitter.com/"><i class="ri-twitter-x-line"></i></a>
                                    <a href="https://instagram.com/"><i class="ri-instagram-line"></i></a>                           
                                </div>
                            </div>                     
                        </div>
                        <div class="team-card_content">
                            <h4 class="team-card_title"><a href="{{ route('teamDetails') }}">Richard Jackson</a>
                            </h4>
                            <span class="team-card_desig">CEO, of Construz</span>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="team-card style2">                        
                        <div class="team-card_img">
                            <img src="{{ asset('themes/construz/assets/img/team/team-2-2.png') }}" alt="img">
                            <div class="team-social_wrap">
                                <div class="social-btn">
                                    <a href="https://facebook.com/"><i class="ri-facebook-fill"></i></a>
                                    <a href="https://www.twitter.com/"><i class="ri-twitter-x-line"></i></a>
                                    <a href="https://instagram.com/"><i class="ri-instagram-line"></i></a>                           
                                </div>
                            </div>                     
                        </div>
                        <div class="team-card_content">
                            <h4 class="team-card_title"><a href="{{ route('teamDetails') }}">Mark Ronaldo</a>
                            </h4>
                            <span class="team-card_desig">Engineer</span>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="team-card style2">                        
                        <div class="team-card_img">
                            <img src="{{ asset('themes/construz/assets/img/team/team-2-3.png') }}" alt="img">
                            <div class="team-social_wrap">
                                <div class="social-btn">
                                    <a href="https://facebook.com/"><i class="ri-facebook-fill"></i></a>
                                    <a href="https://www.twitter.com/"><i class="ri-twitter-x-line"></i></a>
                                    <a href="https://instagram.com/"><i class="ri-instagram-line"></i></a>                           
                                </div>
                            </div>                     
                        </div>
                        <div class="team-card_content">
                            <h4 class="team-card_title"><a href="{{ route('teamDetails') }}">John Maxwell</a>
                            </h4>
                            <span class="team-card_desig">John Maxwell</span>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
    CTA Area 03  
    ==============================-->
    <div class="cta-area-3">
        <div class="container">
            <div class="cta-wrap3 text-center" data-bg-src="{{ asset('themes/construz/assets/img/bg/cta-bg3-1.png') }}" data-overlay="title" data-opacity="6">
                <div class="title-area mb-30">
                    <span class="sub-title text-white">We have won many factory awards <i class="ri-arrow-right-down-line"></i></span>
                    <h2 class="cta-title style2">Your Renovation</h2>
                    <h3 class="cta-title text-white">Starts Here</h3>
                </div>
                <div class="btn-wrap justify-content-center">
                    <a href="{{ route('contact') }}" class="btn">Get in Touch <i class="ri-arrow-right-up-line"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
    Blog Area  
    ==============================-->
    <section class="blog-area-2 space" id="blog-sec">
        <div class="section-animation-shape1-1 shape-mockup animation-infinite" data-top="0" data-bg-src="{{ asset('themes/construz/assets/img/shape/global-line-shape1.png') }}">
        </div>
        <div class="container">
            <div class="row justify-content-lg-between justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="title-area text-lg-start text-center">
                        <span class="sub-title text-theme">Daily update <i class="ri-arrow-right-down-line"></i></span>
                        <h2 class="sec-title">Our Latest News & Blog</h2>
                    </div>
                </div>
                <div class="col-md-auto">
                    <div class="sec-btn">
                        <a href="{{ route('blog') }}" class="btn">View All News <i class="ri-arrow-right-up-line"></i></a>
                    </div>
                </div>
            </div>
            <div class="row global-carousel blog-slider slider-shadow" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="1" data-xs-slide-show="1" data-dots="false">
                <div class="col-md-6 col-lg-4">
                    <div class="blog-card style2">
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
                            <p class="blog-text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam odio ut sem</p>
                            <a href="{{ route('blogDetails') }}" class="btn style2">More Details <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="blog-card style2">
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
                            <p class="blog-text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam odio ut sem</p>
                            <a href="{{ route('blogDetails') }}" class="btn style2">More Details <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="blog-card style2">
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
                            <p class="blog-text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam odio ut sem</p>
                            <a href="{{ route('blogDetails') }}" class="btn style2">More Details <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="blog-card style2">
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
                            <p class="blog-text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam odio ut sem</p>
                            <a href="{{ route('blogDetails') }}" class="btn style2">More Details <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="blog-card style2">
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
                            <p class="blog-text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam odio ut sem</p>
                            <a href="{{ route('blogDetails') }}" class="btn style2">More Details <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="blog-card style2">
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
                            <p class="blog-text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam odio ut sem</p>
                            <a href="{{ route('blogDetails') }}" class="btn style2">More Details <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>   

    @include('frontend::elements.footer')

    <!-- Scroll To Top -->
    @include('frontend::elements.scrollTop')

    <!-- Jquery -->
    @include('frontend::elements.script')

</body>

</html>