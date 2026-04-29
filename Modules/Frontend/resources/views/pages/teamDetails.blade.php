@extends('frontend::layout.layout')

@php
    $title='Team Details';
    $subTitle='Team Details';
@endphp

@section('content')

    <!--==============================
    Service Details Area 
    ==============================-->
    <div class="service-details-area space-top overflow-hidden">
        <div class="container">
            <div class="row gy-30 gx-30">
                <div class="col-12">
                    <div class="single-page">
                        <div class="team-single-card mb-60">
                            <div class="team-single-card_img text-end bg-smoke" data-bg-src="{{ asset('themes/construz/assets/img/bg/team-card-bg1-1.png') }}">
                                <img src="{{ asset('themes/construz/assets/img/team/team-1-1.png') }}" alt="img">
                            </div> 
                            <div class="team-about-card_box" data-bg-src="{{ asset('themes/construz/assets/img/team/team-details-card-bg-1.png') }}">
                                <span class="team-about-card_subtitle">Hello I'm</span>
                                <h3 class="team-about-card_title">John Maxwell</h3>
                                <p class="team-about-card_desig">CEO of Industrie</p>
                                <div class="about-contact-wrap">
                                    <div class="about-contact">
                                        <h6 class="about-contact-title">Department:</h6>
                                        <p class="about-contact-text">Engineer</p>                                            
                                    </div>
                                    <div class="about-contact">
                                        <h6 class="about-contact-title">Experience:</h6>
                                        <p class="about-contact-text">10 Years</p>
                                    </div>
                                    <div class="about-contact">
                                        <h6 class="about-contact-title">Email:</h6>
                                        <a href="mailto:info@construz.example" class="about-contact-text">info@construz.example</a>
                                    </div>
                                    <div class="about-contact">
                                        <h6 class="about-contact-title">Phone:</h6>
                                        <a href="tel:+19562365478" class="about-contact-text">+855 (2669) 1234</a>
                                    </div>
                                </div>
                                <div class="social-btn style6">
                                    <a href="https://www.twitter.com/"><i class="ri-twitter-x-line"></i></a>
                                    <a href="https://instagram.com/"><i class="ri-instagram-line"></i></a>                           
                                    <a href="https://facebook.com/"><i class="ri-facebook-fill"></i></a>
                                    <a href="https://linkedin.com/"><i class="ri-linkedin-fill"></i></a>
                                </div>
                            </div>
                        </div>
                        <p class="mb-50"><span class="text-theme d-inline-flex fw-semibold">Hello There!</span> my name is Jhon Maxwell. I am a Engineer of Construction LTD. Collaborative administrate empowered markets via plug-and-play networks. Proactively envisioned multimedia based expertise and cross-media growth strategies seamlessly visualize quality intellectual capital without superior.</p>
                        
                        <div class="row gy-40 gx-100 justify-content-between">
                            <div class="col-xl-6">
                                <h3 class="fw-semibold mb-20">Professional Skills</h3>
                                <p class="mb-25">Industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                
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
                            <div class="col-xl-6">
                                <h3 class="fw-semibold mb-20">Education Experience</h3>
                                <p class="mb-35">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="education-card-wrap">
                                    <div class="education-card">
                                        <div class="education-card-number">
                                            1st
                                        </div>
                                        <div class="education-card-details">
                                            <h4 class="education-card-title">Business Expert</h4>
                                            <p class="education-card-text">2025 Present <span class="text-theme">Google Co.</span></p>
                                        </div>
                                    </div>
                                    <div class="education-card">
                                        <div class="education-card-number">
                                            2nd
                                        </div>
                                        <div class="education-card-details">
                                            <h4 class="education-card-title">Experience Employee</h4>
                                            <p class="education-card-text">2015 - 2021 <span class="text-theme">Kalystrat</span></p>
                                        </div>
                                    </div>
                                    <div class="education-card">
                                        <div class="education-card-number">
                                            3rd
                                        </div>
                                        <div class="education-card-details">
                                            <h4 class="education-card-title">Finance Manager</h4>
                                            <p class="education-card-text">2014 - 2010 <span class="text-theme">Kalystrat</span></p>
                                        </div>
                                    </div>
                                    <div class="education-card">
                                        <div class="education-card-number">
                                            4th
                                        </div>
                                        <div class="education-card-details">
                                            <h4 class="education-card-title">Junior Consultant</h4>
                                            <p class="education-card-text">2009 - 2005 <span class="text-theme">Uplabs LTD</span></p>
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
    Contact Area  
    ==============================-->
    <section class="contact-area-2 space overflow-hidden">        
        <div class="container">
            <div class="contact-wrap2 space overflow-hidden" data-bg-src="{{ asset('themes/construz/assets/img/bg/contact-bg3-1.png') }}">
                <div class="section-animation-shape1-1 shape-mockup animation-infinite" data-top="0" data-left="0" data-bg-src="{{ asset('themes/construz/assets/img/shape/global-line-shape1.png') }}">
                </div>
                <div class="row gy-60 justify-content-lg-end justify-content-center">
                    <div class="col-xl-7">
                        <div class="contact-form-wrap">
                            <div class="title-area">
                                <span class="sub-title text-theme"><img src="{{ asset('themes/construz/assets/img/icon/section-subtitle-icon.svg') }}" alt="img">Get Free Quote </span>
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