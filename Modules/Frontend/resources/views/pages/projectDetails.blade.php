@extends('frontend::layout.layout')

@php
    $title='Project Details';
    $subTitle='Project Details';
@endphp

@section('content')

    <!--==============================
    Project Details Area  
    ==============================-->
    <div class="project-details-area space-top overflow-hidden">
        <div class="container">
            <div class="row gy-30 gx-30">
                <div class="col-12">
                    <div class="single-page">
                        <div class="project-page-thumb mb-50">
                            <img class="w-100" src="{{ asset('themes/construz/assets/img/project/project_details1_1.png') }}" alt="img">
                            <aside class="sidebar-area">
                                <div class="widget widget_project_info style2">
                                    <h3 class="widget_title">Project Info</h3>
                                    <ul class="project-info-list border-0 p-0 m-0">
                                        <li><strong>Client<span>:</span></strong> <span>Rebecca Tylor</span></li>
                                        <li><strong>Category<span>:</span></strong> <span>Building</span></li>
                                        <li><strong>Location<span>:</span></strong> <span>New York to London</span></li>
                                        <li><strong>Date<span>:</span></strong> <span>12 January, 2024</span></li>
                                        <li><strong>Status<span>:</span></strong> <span>Completed</span></li>
                                        <li><strong>Budget<span>:</span></strong> <span>$200,560</span></li>
                                    </ul>
                                </div>
                            </aside>
                        </div>
                        <h2 class="sec-title mb-25">Project Overview</h2>
                        <p class="mb-50">Industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leapinto electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release 
                            letraset sheets containing. Richard Clintock a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure latin words, consectetur, from a Lorem Ipsum passage.</p>
                        <div class="row gy-4 justify-content-center">
                            <div class="col-xl-4 col-lg-6">
                                <div class="service-card style4">
                                    <div class="service-card_icon">
                                        <img src="{{ asset('themes/construz/assets/img/icon/service-icon1-1.png') }}" alt="img">
                                    </div>
                                    <div class="service-card_content">
                                        <h4 class="service-card_title"><a href="{{ route('serviceDetails') }}">Full Principal Contractor service</a></h4>
                                        <p class="service-card_text">There are many passages of lorem ipsum available</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6">
                                <div class="service-card style4">
                                    <div class="service-card_icon">
                                        <img src="{{ asset('themes/construz/assets/img/icon/service-icon1-2.png') }}" alt="img">
                                    </div>
                                    <div class="service-card_content">
                                        <h4 class="service-card_title"><a href="{{ route('serviceDetails') }}">Full-time Onsite Supervision</a></h4>
                                        <p class="service-card_text">There are many passages of lorem ipsum available</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6">
                                <div class="service-card style4">
                                    <div class="service-card_icon">
                                        <img src="{{ asset('themes/construz/assets/img/icon/service-icon1-3.png') }}" alt="img">
                                    </div>
                                    <div class="service-card_content">
                                        <h4 class="service-card_title"><a href="{{ route('serviceDetails') }}">Timber and steel frame construction</a></h4>
                                        <p class="service-card_text">There are many passages of lorem ipsum available</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <blockquote>
                            <p>“Tortor posuere ac ut consequat tellusi elem isis etum sag ittis vitae 
                                atleo duis ut diam odio ut sem nulla phar. Purus sit ame  nus mas highly efficient solution whereas open-source application.”</p>
                            <cite>Aleesha brown</cite>
                            <span class="desig">Company, CEO</span>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="video-area overflow-hidden">
        <div class="video-wrap mt-20">
            <img src="{{ asset('themes/construz/assets/img/project/project_details1_2.png') }}" alt="img">
            <a href="https://www.youtube.com/watch?v=Mp8IXI1kzvQ" class="play-btn style3 popup-video"><i class="ri-play-fill"></i></a>
        </div>
        <div class="container">
            <p class="mt-40 mb-0">Industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leapinto electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release 
                letraset sheets containing.</p>
        </div>
    </div>
    <div class="pt-60 pb-60 overflow-hidden">
        <div class="container">
            <div class="row justify-content-between align-items-center gy-40">
                <div class="col-lg-6">
                    <div class="title-area text-md-start text-center">
                        <h2 class="sec-title">Features of Project</h2>
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
                                <span class="sub-title text-theme"><img src="{{ asset('themes/construz/assets/img/icon/section-subtitle-icon.svg') }}" alt="img">Get Free Quote</span>
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