@extends('frontend::layout.layout')

@php
    $title='Our Projects';
    $subTitle='Our Projects';
@endphp

@section('content')

    <section class="project-page space-top space-extra-bottom">
        <div class="container">
            <div class="row gy-40 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="portfolio-card style2">
                        <div class="portfolio-card-thumb">
                            <img src="{{ asset('themes/construz/assets/img/project/project2_1.png') }}" alt="img">
                            <span class="portfolio-card-number">01</span>
                            <a class="icon-btn popup-image" href="assets/img/project/project2_1.png"><i class="ri-eye-line"></i></a>
                        </div>
                        <div class="portfolio-card-details">
                            <span class="portfolio-card-subtitle">Building</span>
                            <h4 class="portfolio-card-title"><a href="{{ route('projectDetails') }}">Building Construction</a></h4>
                            <p class="portofolio-card-text">Building since 09,01,2024</p>  
                            <a href="{{ route('projectDetails') }}" class="btn-with-icon">
                                VIEW DETAILS
                                <span class="btn-icon">
                                    <i class="ri-arrow-right-up-line"></i>
                                </span>                                        
                            </a>                      
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="portfolio-card style2">
                        <div class="portfolio-card-thumb">
                            <img src="{{ asset('themes/construz/assets/img/project/project2_2.png') }}" alt="img">
                            <span class="portfolio-card-number">02</span>
                            <a class="icon-btn popup-image" href="assets/img/project/project2_2.png"><i class="ri-eye-line"></i></a>
                        </div>
                        <div class="portfolio-card-details">
                            <span class="portfolio-card-subtitle">Construction</span>
                            <h4 class="portfolio-card-title"><a href="{{ route('projectDetails') }}">General Construction</a></h4>
                            <p class="portofolio-card-text">Building since 09,01,2024</p>  
                            <a href="{{ route('projectDetails') }}" class="btn-with-icon">
                                VIEW DETAILS
                                <span class="btn-icon">
                                    <i class="ri-arrow-right-up-line"></i>
                                </span>                                        
                            </a>                      
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="portfolio-card style2">
                        <div class="portfolio-card-thumb">
                            <img src="{{ asset('themes/construz/assets/img/project/project2_3.png') }}" alt="img">
                            <span class="portfolio-card-number">03</span>
                            <a class="icon-btn popup-image" href="assets/img/project/project2_3.png"><i class="ri-eye-line"></i></a>
                        </div>
                        <div class="portfolio-card-details">
                            <span class="portfolio-card-subtitle">Remodeling</span>
                            <h4 class="portfolio-card-title"><a href="{{ route('projectDetails') }}">Renovation & Remodeling</a></h4>
                            <p class="portofolio-card-text">Building since 09,01,2024</p>  
                            <a href="{{ route('projectDetails') }}" class="btn-with-icon">
                                VIEW DETAILS
                                <span class="btn-icon">
                                    <i class="ri-arrow-right-up-line"></i>
                                </span>                                        
                            </a>                      
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="portfolio-card style2">
                        <div class="portfolio-card-thumb">
                            <img src="{{ asset('themes/construz/assets/img/project/project2_4.png') }}" alt="img">
                            <span class="portfolio-card-number">04</span>
                            <a class="icon-btn popup-image" href="assets/img/project/project2_4.png"><i class="ri-eye-line"></i></a>
                        </div>
                        <div class="portfolio-card-details">
                            <span class="portfolio-card-subtitle">Building</span>
                            <h4 class="portfolio-card-title"><a href="{{ route('projectDetails') }}">Building Construction</a></h4>
                            <p class="portofolio-card-text">Building since 09,01,2024</p>  
                            <a href="{{ route('projectDetails') }}" class="btn-with-icon">
                                VIEW DETAILS
                                <span class="btn-icon">
                                    <i class="ri-arrow-right-up-line"></i>
                                </span>                                        
                            </a>                      
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="portfolio-card style2">
                        <div class="portfolio-card-thumb">
                            <img src="{{ asset('themes/construz/assets/img/project/project2_5.png') }}" alt="img">
                            <span class="portfolio-card-number">05</span>
                            <a class="icon-btn popup-image" href="assets/img/project/project2_5.png"><i class="ri-eye-line"></i></a>
                        </div>
                        <div class="portfolio-card-details">
                            <span class="portfolio-card-subtitle">Construction</span>
                            <h4 class="portfolio-card-title"><a href="{{ route('projectDetails') }}">General Construction</a></h4>
                            <p class="portofolio-card-text">Building since 09,01,2024</p>  
                            <a href="{{ route('projectDetails') }}" class="btn-with-icon">
                                VIEW DETAILS
                                <span class="btn-icon">
                                    <i class="ri-arrow-right-up-line"></i>
                                </span>                                        
                            </a>                      
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="portfolio-card style2">
                        <div class="portfolio-card-thumb">
                            <img src="{{ asset('themes/construz/assets/img/project/project2_6.png') }}" alt="img">
                            <span class="portfolio-card-number">06</span>
                            <a class="icon-btn popup-image" href="assets/img/project/project2_6.png"><i class="ri-eye-line"></i></a>
                        </div>
                        <div class="portfolio-card-details">
                            <span class="portfolio-card-subtitle">Remodeling</span>
                            <h4 class="portfolio-card-title"><a href="{{ route('projectDetails') }}">Renovation & Remodeling</a></h4>
                            <p class="portofolio-card-text">Building since 09,01,2024</p>  
                            <a href="{{ route('projectDetails') }}" class="btn-with-icon">
                                VIEW DETAILS
                                <span class="btn-icon">
                                    <i class="ri-arrow-right-up-line"></i>
                                </span>                                        
                            </a>                      
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="portfolio-card style2">
                        <div class="portfolio-card-thumb">
                            <img src="{{ asset('themes/construz/assets/img/project/project2_7.png') }}" alt="img">
                            <span class="portfolio-card-number">07</span>
                            <a class="icon-btn popup-image" href="assets/img/project/project2_7.png"><i class="ri-eye-line"></i></a>
                        </div>
                        <div class="portfolio-card-details">
                            <span class="portfolio-card-subtitle">Architecture</span>
                            <h4 class="portfolio-card-title"><a href="{{ route('projectDetails') }}">Building Construction</a></h4>
                            <p class="portofolio-card-text">Building since 09,01,2024</p>  
                            <a href="{{ route('projectDetails') }}" class="btn-with-icon">
                                VIEW DETAILS
                                <span class="btn-icon">
                                    <i class="ri-arrow-right-up-line"></i>
                                </span>                                        
                            </a>                      
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="portfolio-card style2">
                        <div class="portfolio-card-thumb">
                            <img src="{{ asset('themes/construz/assets/img/project/project2_8.png') }}" alt="img">
                            <span class="portfolio-card-number">08</span>
                            <a class="icon-btn popup-image" href="assets/img/project/project2_8.png"><i class="ri-eye-line"></i></a>
                        </div>
                        <div class="portfolio-card-details">
                            <span class="portfolio-card-subtitle">Construction</span>
                            <h4 class="portfolio-card-title"><a href="{{ route('projectDetails') }}">General Construction</a></h4>
                            <p class="portofolio-card-text">Building since 09,01,2024</p>  
                            <a href="{{ route('projectDetails') }}" class="btn-with-icon">
                                VIEW DETAILS
                                <span class="btn-icon">
                                    <i class="ri-arrow-right-up-line"></i>
                                </span>                                        
                            </a>                      
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="portfolio-card style2">
                        <div class="portfolio-card-thumb">
                            <img src="{{ asset('themes/construz/assets/img/project/project2_9.png') }}" alt="img">
                            <span class="portfolio-card-number">09</span>
                            <a class="icon-btn popup-image" href="assets/img/project/project2_9.png"><i class="ri-eye-line"></i></a>
                        </div>
                        <div class="portfolio-card-details">
                            <span class="portfolio-card-subtitle">Remodeling</span>
                            <h4 class="portfolio-card-title"><a href="{{ route('projectDetails') }}">Renovation & Remodeling</a></h4>
                            <p class="portofolio-card-text">Building since 09,01,2024</p>  
                            <a href="{{ route('projectDetails') }}" class="btn-with-icon">
                                VIEW DETAILS
                                <span class="btn-icon">
                                    <i class="ri-arrow-right-up-line"></i>
                                </span>                                        
                            </a>                      
                        </div>
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
    </section>   

@endsection