@extends('frontend::layout.layout')

@php
    $title='Our Team';
    $subTitle='Our Team';
@endphp

@section('content')

    <!--==============================
    Team Area  
    ==============================-->
    <div class="team-page space-top space-extra-bottom">
        <div class="container">            
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
                <div class="col-lg-4 col-md-6">
                    <div class="team-card" data-bg-src="{{ asset('themes/construz/assets/img/bg/team-card-bg1-1.png') }}">
                        <div class="team-card_content">
                            <h4 class="team-card_title"><a href="{{ route('teamDetails') }}">S. Arfan Sumon</a>
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
                            <img src="{{ asset('themes/construz/assets/img/team/team-1-4.png') }}" alt="img">
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
                            <h4 class="team-card_title"><a href="{{ route('teamDetails') }}">Aya Nikola</a>
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
                            <img src="{{ asset('themes/construz/assets/img/team/team-1-5.png') }}" alt="img">
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
                            <h4 class="team-card_title"><a href="{{ route('teamDetails') }}">K. Mrajuk Rasel</a>
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
                            <img src="{{ asset('themes/construz/assets/img/team/team-1-6.png') }}" alt="img">
                        </div>
                        <a href="tel:0023745671379" class="contact-btn-wrap">
                            <span class="number">(+00) 347 456 1379</span>
                            <div class="icon-btn"><i class="ri-phone-fill"></i></div>
                        </a>                        
                    </div>
                </div>
            </div>
            <div class="pagination justify-content-center">
                <ul>
                    <li><a class="active" href="{{ route('blog') }}">01</a></li>
                    <li><a href="{{ route('blog') }}">02</a></li>
                    <li><a href="{{ route('blog') }}">03</a></li>
                    <li><a href="{{ route('blog') }}"><i class="ri-arrow-right-line"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

@endsection