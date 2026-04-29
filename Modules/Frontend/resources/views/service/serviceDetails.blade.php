@extends('frontend::layout.layout')

@php
    $title='Service Details';
    $subTitle='Service Details';
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
                        <div class="service-thumb mb-50">
                            <img class="w-100" src="{{ asset('themes/construz/assets/img/service/service_details1_1.png') }}" alt="img">
                        </div>
                        <h2 class="sec-title mb-25">General Construction</h2>
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
                        <div class="mt-60 mb-60">
                            <div class="row justify-content-between align-items-center gy-40">
                                <div class="col-lg-6">
                                    <div class="title-area text-md-start text-center">
                                        <h2 class="sec-title">Awesome Benefits</h2>
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
                        <div class="row align-items-end gy-40 justify-content-between">
                            <div class="col-xl-6">
                                <h3 class="fw-semibold">Solutions & Planning</h3>
                                <p>Industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leapinto electronic typesetting.</p>
                                <div class="mb-35">
                                    <div class="row gy-2">
                                        <div class="col-lg-6">
                                            <div class="checklist style6">
                                                <ul>
                                                    <li>Powerful Product Strategy
                                                    </li>
                                                    <li>Professional Team Works
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="checklist style6">
                                                <ul>
                                                    <li>Quality Control System
                                                    </li>
                                                    <li>Budget Friendly  Project
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                            <div class="col-xxl-5 col-xl-6">
                                <div class="video-wrap">
                                    <img class="w-100" src="{{ asset('themes/construz/assets/img/service/service_details1_2.png') }}" alt="img">
                                    <a href="https://www.youtube.com/watch?v=Mp8IXI1kzvQ" class="play-btn style7 popup-video"><i class="ri-play-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
    FAQ Area 01  
    ==============================-->
    <div class="faq-area-1 space overflow-hidden">
        <div class="container">
            <div class="title-area text-center">
                <h2 class="sec-title">Your frequently asked question</h2>
            </div>
            <div class="row gy-50 gx-50 justify-content-center">
                <div class="col-xl-8">
                    <div class="accordion-area accordion" id="faqAccordion">

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

                        <div class="accordion-card ">
                            <div class="accordion-header" id="collapse-item-6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-6" aria-expanded="false" aria-controls="collapse-6"> Measure quality in construction projects?</button>
                            </div>
                            <div id="collapse-6" class="accordion-collapse collapse " aria-labelledby="collapse-item-6" data-bs-parent="#faqAccordion">
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

@endsection