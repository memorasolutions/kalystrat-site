    <header class="nav-header header-layout1 onepage-nav">
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
                                    <li><i class="ri-time-line"></i>Mon - Sat / 8am : 12pm</li>
                                    <li><i class="ri-map-pin-line"></i><a href="https://www.google.com/maps">96 Jones Street, New York, USA</a></li>
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
                    <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/logo.svg') }}" alt="logo"></a>
                </div>
                <div class="logo-bg"></div>
                <div class="container">
                    <div class="row align-items-center justify-content-lg-start justify-content-between">
                        <div class="col-auto d-xxl-none d-block">
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
                                <a href="{{ route('about') }}" class="btn">GET IN TOUCH <i class="ri-arrow-right-up-line"></i></a>
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
                <div class="navbar-right-desc d-xxl-flex d-none" data-bg-src="{{ asset('themes/construz/assets/img/bg/header-1-bg.png') }}">
                    <div class="icon-btn">
                        <i class="ri-phone-fill"></i>
                    </div>
                    <div class="navbar-right-desc-details">
                        <h6 class="title">Call us any time</h6>
                        <a class="link" href="tel:+2590256215">+123 556 8824</a>
                    </div>
                </div>
            </div>
        </div>
    </header>