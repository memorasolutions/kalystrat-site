@extends('frontend::layout.layout')

@php
    $title='Our Services';
    $subTitle='Our Services';
@endphp

@section('content')

    <!--==============================
    Service Area 01  
    ==============================-->
    <div class="service-area-4 space-top overflow-hidden">
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
                    <div class="service-card style3">
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
                    <div class="service-card style3">
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
                    <div class="service-card style3">
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
                    <div class="service-card style3">
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
                    <div class="service-card style3">
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
    Process Area  
    ==============================-->
    <section class="process-area-2 space overflow-hidden">
        <div class="container">
            <div class="row justify-content-between align-items-center gy-40">
                <div class="col-lg-6">
                    <div class="title-area text-md-start text-center">
                        <span class="sub-title"><img src="{{ asset('themes/construz/assets/img/icon/section-subtitle-icon.svg') }}" alt="img">Our Benefits</span>
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
    Testimonial Area  
    ==============================-->
    <div class="testimonial-area-3 overflow-hidden">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7">
                    <div class="title-area text-lg-start text-center">
                        <span class="sub-title"><img src="{{ asset('themes/construz/assets/img/icon/section-subtitle-icon.svg') }}" alt="img"> Testimonials</span>
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
    Contact Area  
    ==============================-->
    <section class="contact-area-2 space-bottom overflow-hidden">        
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

@endsection