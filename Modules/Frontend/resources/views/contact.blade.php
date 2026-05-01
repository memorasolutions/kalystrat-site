@extends('frontend::layout.layout')

@php
    $title='Communiquez avec nous';
    $subTitle='Communiquez avec nous';
@endphp

@section('content')

    <!--==============================
    Contact Page Area  
    ==============================-->
    <section class="contact-page-area space">
        <div class="container">
            <div class="row gy-4 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="contact-page-card bg-smoke">
                        <div class="contact-page-card-details">
                            <h4 class="contact-page-card_title">Siège social</h4>
                            <div class="contact-page-card-text"><i class="ri-phone-line"></i><a class="contact-page-card_link" href="tel:+15815786145">1-581-578-6145</a></div>   
                            <div class="contact-page-card-text"><i class="ri-mail-line"></i><a class="contact-page-card_link" href="mailto:info@kalystrat.ca">info@kalystrat.ca</a></div>   
                            <div class="contact-page-card-text"><i class="ri-time-line"></i>Lun - Ven 8h00 - 17h00</div>
                        </div>
                        <div class="contact-page-card-thumb">
                            <img src="{{ asset('assets/img/kalystrat/about-meeting.jpg') }}" alt="img">
                        </div>  
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="contact-page-card bg-smoke">
                        <div class="contact-page-card-details">
                            <h4 class="contact-page-card_title">Bureau régional</h4>
                            <div class="contact-page-card-text"><i class="ri-phone-line"></i><a class="contact-page-card_link" href="tel:+15815786145">1-581-578-6145</a></div>   
                            <div class="contact-page-card-text"><i class="ri-mail-line"></i><a class="contact-page-card_link" href="mailto:info@kalystrat.ca">info@kalystrat.ca</a></div>   
                            <div class="contact-page-card-text"><i class="ri-time-line"></i>Lun - Ven 8h00 - 17h00</div>
                        </div>
                        <div class="contact-page-card-thumb">
                            <img src="{{ asset('assets/img/kalystrat/hero-skyline.jpg') }}" alt="img">
                        </div>  
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="contact-page-card bg-smoke">
                        <div class="contact-page-card-details">
                            <h4 class="contact-page-card_title">Chantiers en cours</h4>
                            <div class="contact-page-card-text"><i class="ri-phone-line"></i><a class="contact-page-card_link" href="tel:+15815786145">1-581-578-6145</a></div>   
                            <div class="contact-page-card-text"><i class="ri-mail-line"></i><a class="contact-page-card_link" href="mailto:info@kalystrat.ca">info@kalystrat.ca</a></div>
                            <div class="contact-page-card-text"><i class="ri-time-line"></i>Lun - Ven 8h00 - 17h00</div>
                        </div>
                        <div class="contact-page-card-thumb">
                            <img src="{{ asset('assets/img/kalystrat/hero/slide-1-montreal-chantier.jpg') }}" alt="img">
                        </div>  
                    </div>
                </div>

            </div>
        </div>
    </section>  
    
    <!--==============================
    Contact Area  
    ==============================-->
    <section class="contact-area-2 space-bottom overflow-hidden">        
        <div class="container">
            <div class="contact-wrap2 space overflow-hidden" data-bg-src="{{ asset('assets/img/kalystrat/project-blueprint.jpg') }}">
                <div class="section-animation-shape1-1 shape-mockup animation-infinite" data-top="0" data-left="0" data-bg-src="{{ asset('themes/construz/assets/img/shape/global-line-shape1.png') }}">
                </div>
                <div class="row gy-60 justify-content-lg-end justify-content-center">
                    <div class="col-xl-7">
                        <div class="contact-form-wrap">
                            <div class="title-area">
                                <span class="sub-title text-theme"><img src="{{ asset('themes/construz/assets/img/icon/section-subtitle-icon.svg') }}" alt="img">Demande de soumission </span>
                                <h2 class="sec-title">Vous avez un projet en tête?</h2>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $err)<li>{{ $err }}</li>@endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom complet" autocomplete="name" required aria-label="Nom complet" value="{{ old('nom') }}" maxlength="120">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Courriel" autocomplete="email" required aria-label="Courriel" value="{{ old('email') }}" maxlength="180">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="tel" class="form-control" name="telephone" id="telephone" placeholder="Téléphone" autocomplete="tel" aria-label="Téléphone" value="{{ old('telephone') }}" maxlength="30">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select name="filiale" id="filiale" class="form-select" aria-label="Filiale concernée">
                                                <option value="" selected>Type de demande (filiale)</option>
                                                <option value="fondations" @selected(old('filiale')==='fondations')>Kalystrat Fondations</option>
                                                <option value="structure" @selected(old('filiale')==='structure')>Kalystrat Structure</option>
                                                <option value="toiture" @selected(old('filiale')==='toiture')>Kalystrat Toiture et Enveloppe</option>
                                                <option value="finition" @selected(old('filiale')==='finition')>Kalystrat Finition Intérieure</option>
                                                <option value="immobilier" @selected(old('filiale')==='immobilier')>Kalystrat Immobilier</option>
                                                <option value="placement" @selected(old('filiale')==='placement')>Kalystrat Placement Construction</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea name="message" id="message" cols="30" rows="4" class="form-control" placeholder="Votre message" required aria-label="Message" minlength="10" maxlength="3000">{{ old('message') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-btn col-12">
                                        <button type="submit" class="btn w-100">Envoyer <i class="ri-arrow-right-up-line" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>            
                </div>
            </div>
            
        </div>
    </section>   

    <div class="map-area overflow-hidden">
        <div class="map-sec">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3644.7310056272386!2d89.2286059153658!3d24.00527418490799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fe9b97badc6151%3A0x30b048c9fb2129bc!2s!5e0!3m2!1sen!2sbd!4v1651028958211!5m2!1sen!2sbd" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

@endsection