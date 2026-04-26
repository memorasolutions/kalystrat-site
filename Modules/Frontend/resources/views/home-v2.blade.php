@extends('frontend::layout-v2')

@section('title', 'Kalystrat — Holding québécois construction 6 filiales')
@section('meta_description', 'Holding québécois construction à intégration verticale. 6 filiales spécialisées : Fondations, Structure, Toiture, Finition, Immobilier, Placement. Conçu. Réalisé. Livré.')

@section('content')

<div class="hero-wrapper hero-5" id="hero">
    <div class="hero_shape_5_1">
        <img src="{{ asset('assets/construz-new/img/hero/hero_shape_5_1.png') }}" alt="img">
    </div>
    <div class="hero-slider5 global-carousel" data-slide-show="1" data-fade="true" data-dots="true">
        <div class="hero-slide" data-bg-src="{{ asset('assets/construz-new/img/hero/hero_bg_5_1.png') }}" style="background-image: url('{{ asset('assets/construz-new/img/hero/hero_bg_5_1.png') }}');">
            <div class="container">
                <div class="hero-style5">
                    <div class="row align-items-center">
                        <div class="col-xl-8">
                            <div class="hero-rating-wrap" data-ani="slider-custom-anim-left" data-ani-delay="0.1s">
                                <div class="single-rating-wrap">
                                    <div class="rating">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                    </div>
                                    <div class="rating-text">
                                        <img src="{{ asset('assets/construz-new/img/icon/google-logo.svg') }}" alt="img"> 4.9 Google
                                    </div>
                                </div>
                                <div class="single-rating-wrap">
                                    <div class="rating">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                    </div>
                                    <div class="rating-text">
                                        <img src="{{ asset('assets/construz-new/img/icon/facebook-logo.svg') }}" alt="img"> 5.0 Facebook
                                    </div>
                                </div>
                                <div class="single-rating-wrap">
                                    <div class="rating">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                    </div>
                                    <div class="rating-text">
                                        <img src="{{ asset('assets/construz-new/img/icon/construz-logo.svg') }}" alt="img"> A+ Construz
                                    </div>
                                </div>
                            </div>
                            <h1 class="hero-title" data-ani="slider-custom-anim-left" data-ani-delay="0.1s">Holding québécois en construction</h1>
                            <h1 class="hero-title" data-ani="slider-custom-anim-left" data-ani-delay="0.2s">Conçu. Réalisé. Livré.</h1>
                            <p class="hero-text" data-ani="slider-custom-anim-left" data-ani-delay="0.2s">6 filiales spécialisées en synergie sous une marque unifiée. De la fondation à la livraison clés en main au Québec.</p>
                            <div class="btn-group" data-ani="slider-custom-anim-left" data-ani-delay="0.4s">
                                <a href="{{ route('frontend.contact') }}" class="btn style2">DEMANDER UNE SOUMISSION <i class="ri-arrow-right-up-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slide" data-bg-src="{{ asset('assets/construz-new/img/hero/hero_bg_5_2.png') }}" style="background-image: url('{{ asset('assets/construz-new/img/hero/hero_bg_5_2.png') }}');">
            <div class="container">
                <div class="hero-style5">
                    <div class="row align-items-center">
                        <div class="col-xl-8">
                            <div class="hero-rating-wrap" data-ani="slider-custom-anim-left" data-ani-delay="0.1s">
                                <div class="single-rating-wrap">
                                    <div class="rating">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                    </div>
                                    <div class="rating-text">
                                        <img src="{{ asset('assets/construz-new/img/icon/google-logo.svg') }}" alt="img"> 4.9 Google
                                    </div>
                                </div>
                                <div class="single-rating-wrap">
                                    <div class="rating">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                    </div>
                                    <div class="rating-text">
                                        <img src="{{ asset('assets/construz-new/img/icon/facebook-logo.svg') }}" alt="img"> 5.0 Facebook
                                    </div>
                                </div>
                                <div class="single-rating-wrap">
                                    <div class="rating">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                    </div>
                                    <div class="rating-text">
                                        <img src="{{ asset('assets/construz-new/img/icon/construz-logo.svg') }}" alt="img"> A+ Construz
                                    </div>
                                </div>
                            </div>
                            <h1 class="hero-title" data-ani="slider-custom-anim-left" data-ani-delay="0.1s">Holding québécois en construction</h1>
                            <h1 class="hero-title" data-ani="slider-custom-anim-left" data-ani-delay="0.2s">Conçu. Réalisé. Livré.</h1>
                            <p class="hero-text" data-ani="slider-custom-anim-left" data-ani-delay="0.2s">6 filiales spécialisées en synergie sous une marque unifiée. De la fondation à la livraison clés en main au Québec.</p>
                            <div class="btn-group" data-ani="slider-custom-anim-left" data-ani-delay="0.4s">
                                <a href="{{ route('frontend.contact') }}" class="btn style2">DEMANDER UNE SOUMISSION <i class="ri-arrow-right-up-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slide" data-bg-src="{{ asset('assets/construz-new/img/hero/hero_bg_5_3.png') }}" style="background-image: url('{{ asset('assets/construz-new/img/hero/hero_bg_5_3.png') }}');">
            <div class="container">
                <div class="hero-style5">
                    <div class="row align-items-center">
                        <div class="col-xl-8">
                            <div class="hero-rating-wrap" data-ani="slider-custom-anim-left" data-ani-delay="0.1s">
                                <div class="single-rating-wrap">
                                    <div class="rating">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                    </div>
                                    <div class="rating-text">
                                        <img src="{{ asset('assets/construz-new/img/icon/google-logo.svg') }}" alt="img"> 4.9 Google
                                    </div>
                                </div>
                                <div class="single-rating-wrap">
                                    <div class="rating">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                    </div>
                                    <div class="rating-text">
                                        <img src="{{ asset('assets/construz-new/img/icon/facebook-logo.svg') }}" alt="img"> 5.0 Facebook
                                    </div>
                                </div>
                                <div class="single-rating-wrap">
                                    <div class="rating">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                    </div>
                                    <div class="rating-text">
                                        <img src="{{ asset('assets/construz-new/img/icon/construz-logo.svg') }}" alt="img"> A+ Construz
                                    </div>
                                </div>
                            </div>
                            <h1 class="hero-title" data-ani="slider-custom-anim-left" data-ani-delay="0.1s">Holding québécois en construction</h1>
                            <h1 class="hero-title" data-ani="slider-custom-anim-left" data-ani-delay="0.2s">Conçu. Réalisé. Livré.</h1>
                            <p class="hero-text" data-ani="slider-custom-anim-left" data-ani-delay="0.2s">6 filiales spécialisées en synergie sous une marque unifiée. De la fondation à la livraison clés en main au Québec.</p>
                            <div class="btn-group" data-ani="slider-custom-anim-left" data-ani-delay="0.4s">
                                <a href="{{ route('frontend.contact') }}" class="btn style2">DEMANDER UNE SOUMISSION <i class="ri-arrow-right-up-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--==============================
About Area
==============================-->
<div class="about-area-5 space">
    <div class="about-bg-shape5-1 shape-mockup" data-top="-170px" data-right="0">
        <img src="{{ asset('assets/construz-new/img/bg/about-bg-shape5-1.png') }}" alt="img">
    </div>
    <div class="container">
        <div class="row gx-100 align-items-center">
            <div class="col-xl-5">
                <div class="about-thumb5 mb-40 mb-xl-0">
                    <div class="about-img-1 mb-40">
                        <img src="{{ asset('assets/construz-new/img/normal/about_5-1.png') }}" alt="img">
                    </div>
                    <p>Gestion Kalystrat Inc. réunit six filiales spécialisées sous une marque unifiée. Excellence québécoise en construction.</p>
                    <div class="btn-group mt-30">
                        <a href="{{ route('frontend.about') }}" class="btn">EN APPRENDRE PLUS <i class="ri-arrow-right-up-line"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-wrap5">
                    <div class="title-area mb-40">
                        <span class="sub-title text-theme">À PROPOS DE KALYSTRAT <i class="ri-arrow-right-down-line"></i></span>
                        <h2 class="sec-title">Excellence en construction grâce à 6 filiales spécialisées</h2>
                        <p class="sec-text">Gestion Kalystrat Inc. est un holding québécois construction à intégration verticale, fondé par Ali Salomon. Notre mission : excellence et qualité supérieure à chaque projet.</p>
                        <div class="checklist mb-35 mt-30">
                            <ul>
                                <li><img src="{{ asset('assets/construz-new/img/icon/about-checklsit-icon1-1.svg') }}" alt="img">Intégration verticale — 6 filiales coordonnées sous gouvernance unique</li>
                                <li><img src="{{ asset('assets/construz-new/img/icon/about-checklsit-icon1-1.svg') }}" alt="img">Excellence québécoise — RBQ, CCQ, normes provinciales</li>
                            </ul>
                        </div>
                        <div class="btn-wrap">
                            <div class="cta-grid-wrap">
                                <div class="icon-btn">
                                    <i class="ri-phone-fill"></i>
                                </div>
                                <div class="media-body">
                                    <a class="link" href="tel:+15815786145">1-581-578-6145</a>
                                    <h6 class="title">Besoin d'aide ?</h6>
                                </div>
                            </div>
                            <div class="about-author-wrap">
                                <div class="author-thumb">
                                    <img src="{{ asset('assets/construz-new/img/normal/about_3-4.png') }}" alt="img">
                                </div>
                                <div class="media-body">
                                    <div class="author-sign">
                                        <img src="{{ asset('assets/construz-new/img/normal/about_4-sign.png') }}" alt="img">
                                    </div>
                                    <div class="author-text">Ali Salomon, Fondateur</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="about-thumb5 mt-60 d-inline-block">
                        <div class="video-wrap about-img-2">
                            <img src="{{ asset('assets/construz-new/img/normal/about_5-2.png') }}" alt="img">
                            <a href="https://www.youtube.com/watch?v=Mp8IXI1kzvQ" class="play-btn style6 popup-video"><i class="ri-play-fill"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--==============================
Why Choose Area 03 (6 filiales tabs)
==============================-->
<div class="why-area-3 space-top overflow-hidden">
    <div class="why-sec-bg3-1" data-bg-src="{{ asset('assets/construz-new/img/bg/why-bg5-1.png') }}" style="background-image: url('{{ asset('assets/construz-new/img/bg/why-bg5-1.png') }}');"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="title-area text-center">
                    <span class="sub-title text-theme">NOS FILIALES <i class="ri-arrow-right-down-line"></i></span>
                    <h2 class="sec-title">Six expertises au service de votre projet</h2>
                </div>
            </div>
        </div>
        <div class="row gy-50">
            <div class="col-xl-4">
                <ul class="why-tab-wrap nav nav-pills" role="tablist">
                    @foreach($filiales as $slug => $f)
                    <li class="nav-item" role="{{ $loop->first ? 'tab' : 'presentation' }}">
                        <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="why-pill-{{ $loop->iteration }}-tab" data-bs-toggle="pill" data-bs-target="#why-pill-{{ $loop->iteration }}" type="button" role="tab" aria-controls="why-pill-{{ $loop->iteration }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $f['nom_court'] }} <i class="ri-arrow-right-down-line"></i></button>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-xl-8">
                <div class="tab-content">
                    @foreach($filiales as $slug => $f)
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="why-pill-{{ $loop->iteration }}" role="tabpanel" aria-labelledby="why-pill-{{ $loop->iteration }}-tab">
                        <div class="row gx-80 gy-40 align-items-center">
                            <div class="col-lg-5">
                                <div class="why-thumb-wrap3-1">
                                    <div class="why-tab-thumb">
                                        <img src="{{ asset('assets/construz-new/img/why/why-tab-thumb3-' . ($loop->iteration % 2 === 0 ? '2' : '1') . '.png') }}" alt="img">
                                    </div>
                                    <div class="why-text-wrap">
                                        <h4 class="title">Filiale</h4>
                                        <hr class="line">
                                        <div class="number">0{{ $loop->iteration }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="why-content-wrap">
                                    <h4 class="title">À propos de cette filiale</h4>
                                    <h5 class="subtitle">{{ $f['nom_complet'] }}</h5>
                                    <p class="text">{{ $f['specialite'] }}</p>
                                    <div class="checklist mb-35">
                                        <ul>
                                            <li><img src="{{ asset('assets/construz-new/img/icon/about-checklsit-icon1-1.svg') }}" alt="img">Coordination centralisée — main-d'œuvre interne via Placement</li>
                                        </ul>
                                    </div>
                                    <div class="btn-group mt-35">
                                        <a href="{{ route('frontend.filiale', $slug) }}" class="btn style3">DÉCOUVRIR <i class="ri-arrow-right-up-line"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!--==============================
Benefit Area
==============================-->
<div class="benefit-area-5 space overflow-hidden">
    <div class="benefit-bg-shape5-1 shape-mockup" data-bottom="0" data-right="0">
        <img src="{{ asset('assets/construz-new/img/bg/benefit-bg-shape5-1.png') }}" alt="img">
    </div>
    <div class="container">
        <div class="row gx-40 align-items-center">
            <div class="col-xl-6">
                <div class="benefit-thumb5 mb-40 mb-xl-0">
                    <div class="benefit-img-1">
                        <img src="{{ asset('assets/construz-new/img/normal/benefit-thumb5-1.png') }}" alt="img">
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="benefit-wrap5">
                    <div class="title-area mb-40">
                        <span class="sub-title text-theme">NOS AVANTAGES <i class="ri-arrow-right-down-line"></i></span>
                        <h2 class="sec-title">Pourquoi choisir Kalystrat — holding québécois construction</h2>
                        <p class="sec-text">Six filiales en synergie sous gouvernance unique. Une marque, une garantie, six expertises. La promesse Kalystrat.</p>
                        <h6 class="mt-20 fw-normal mb-30">Nos avantages clés :</h6>
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="single-benefit-wrap">
                                    <div class="single-benefit-icon">
                                        <img src="{{ asset('assets/construz-new/img/icon/benefit-icon1-1.svg') }}" alt="img">
                                    </div>
                                    <h4 class="single-benefit-title">Ingénieurs professionnels</h4>
                                </div>
                                <div class="single-benefit-wrap">
                                    <div class="single-benefit-icon">
                                        <img src="{{ asset('assets/construz-new/img/icon/benefit-icon1-2.svg') }}" alt="img">
                                    </div>
                                    <h4 class="single-benefit-title">Service sans tracas</h4>
                                </div>
                                <div class="single-benefit-wrap">
                                    <div class="single-benefit-icon">
                                        <img src="{{ asset('assets/construz-new/img/icon/benefit-icon1-3.svg') }}" alt="img">
                                    </div>
                                    <h4 class="single-benefit-title">Équipe expérimentée</h4>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-benefit-wrap">
                                    <div class="single-benefit-icon">
                                        <img src="{{ asset('assets/construz-new/img/icon/benefit-icon1-4.svg') }}" alt="img">
                                    </div>
                                    <h4 class="single-benefit-title">Marque unifiée</h4>
                                </div>
                                <div class="single-benefit-wrap">
                                    <div class="single-benefit-icon">
                                        <img src="{{ asset('assets/construz-new/img/icon/benefit-icon1-5.svg') }}" alt="img">
                                    </div>
                                    <h4 class="single-benefit-title">Financement structuré</h4>
                                </div>
                                <div class="single-benefit-wrap">
                                    <div class="single-benefit-icon">
                                        <img src="{{ asset('assets/construz-new/img/icon/benefit-icon1-6.svg') }}" alt="img">
                                    </div>
                                    <h4 class="single-benefit-title">Garanties prolongées</h4>
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
Cta Area 5
==============================-->
<div class="cta-area-5">
    <div class="container">
        <div class="cta-wrap5" data-bg-src="{{ asset('assets/construz-new/img/bg/cta-bg5-1.png') }}" style="background-image: url('{{ asset('assets/construz-new/img/bg/cta-bg5-1.png') }}');">
            <h4 class="cta-title text-white">
                Construction au Québec — soumission gratuite, accompagnement personnalisé
            </h4>
            <a class="btn style4" href="{{ route('frontend.contact') }}">DEMANDER UNE SOUMISSION <i class="ri-arrow-right-up-line"></i></a>
        </div>
    </div>
</div>

<!--==============================
Testimonial Area
==============================-->
<div class="testimonial-area-5 overflow-hidden space position-relative">
    <div class="testimonial-bg-thumb5-1" data-bg-src="{{ asset('assets/construz-new/img/bg/testimonial-bg5-1.png') }}" style="background-image: url('{{ asset('assets/construz-new/img/bg/testimonial-bg5-1.png') }}');"></div>
    <div class="testimonial-bg-thumb5-2" data-bg-src="{{ asset('assets/construz-new/img/bg/testimonial-bg5-2.png') }}" style="background-image: url('{{ asset('assets/construz-new/img/bg/testimonial-bg5-2.png') }}');"></div>
    <div class="container">
        <div class="row gx-100 gy-60">
            <div class="col-xl-5 col-lg-6">
                <div class="title-area">
                    <span class="sub-title text-theme">TÉMOIGNAGES <i class="ri-arrow-right-down-line"></i></span>
                    <h2 class="sec-title text-white">Témoignages clients</h2>
                </div>
                <div class="row global-carousel testi-slider5 dot-style2" data-slide-show="1" data-dots="true">
                    <div class="col-lg-6">
                        <div class="testi-card style5">
                            <div class="testi-card-profile">
                                <div class="testi-card-thumb"><img src="{{ asset('assets/construz-new/img/testimonial/testi_5_1.png') }}" alt="img"></div>
                                <div class="testi-card-profile-details">
                                    <h4 class="testi-profile-title">Ali Salomon</h4>
                                    <span class="testi-profile-desig">Fondateur, président et directeur général</span>
                                </div>
                            </div>
                            <div class="testi-card_content">
                                <div class="testi-rating"><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i></div>
                                <p class="testi-card_text">Holding nouvellement constitué — premiers témoignages clients à venir suite aux livraisons des premiers chantiers. Notre engagement : excellence et qualité à chaque projet.</p>
                                <div class="quote-icon"><img src="{{ asset('assets/construz-new/img/icon/quote.svg') }}" alt="img"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testi-card style5">
                            <div class="testi-card-profile">
                                <div class="testi-card-thumb"><img src="{{ asset('assets/construz-new/img/testimonial/testi_5_1.png') }}" alt="img"></div>
                                <div class="testi-card-profile-details">
                                    <h4 class="testi-profile-title">Conseil consultatif</h4>
                                    <span class="testi-profile-desig">En constitution</span>
                                </div>
                            </div>
                            <div class="testi-card_content">
                                <div class="testi-rating"><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i></div>
                                <p class="testi-card_text">Conseil consultatif composé d'experts en construction, droit des affaires et immobilier. Témoignages disponibles dès la finalisation du conseil.</p>
                                <div class="quote-icon"><img src="{{ asset('assets/construz-new/img/icon/quote.svg') }}" alt="img"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testi-card style5">
                            <div class="testi-card-profile">
                                <div class="testi-card-thumb"><img src="{{ asset('assets/construz-new/img/testimonial/testi_5_1.png') }}" alt="img"></div>
                                <div class="testi-card-profile-details">
                                    <h4 class="testi-profile-title">Premiers clients</h4>
                                    <span class="testi-profile-desig">À venir prochainement</span>
                                </div>
                            </div>
                            <div class="testi-card_content">
                                <div class="testi-rating"><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i></div>
                                <p class="testi-card_text">Vos premiers retours clients, témoignages et études de cas seront publiés ici dès les livraisons des chantiers en cours.</p>
                                <div class="quote-icon"><img src="{{ asset('assets/construz-new/img/icon/quote.svg') }}" alt="img"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="testi-client-group5">
                    <div class="client-group-thumb"><img src="{{ asset('assets/construz-new/img/normal/client_group_1-2.png') }}" alt="img"></div>
                    <div class="testi-counter-wrap">
                        <h3 class="testi-counter-number"><span class="counter-number">6</span></h3>
                        <p class="testi-counter-text">Filiales spécialisées</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--==============================
Award Area 1 (références/certifications)
==============================-->
<div class="award-area-1 space-top overflow-hidden" data-bg-src="{{ asset('assets/construz-new/img/bg/award-bg5-1.png') }}" style="background-image: url('{{ asset('assets/construz-new/img/bg/award-bg5-1.png') }}');">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="title-area text-center mb-50">
                    <span class="sub-title text-theme">NOS RÉFÉRENCES <i class="ri-arrow-right-down-line"></i></span>
                    <h2 class="sec-title">Nos références et engagements</h2>
                    <p>Holding nouvellement constitué — certifications et reconnaissances en cours d'obtention auprès des organismes québécois.</p>
                </div>
            </div>
        </div>
        <div class="row gy-4 gx-40 justify-content-xl-between justify-content-center">
            <div class="col-xxl-3 col-md-6">
                <div class="award-card">
                    <div class="award-card-bg-shape"><img src="{{ asset('assets/construz-new/img/bg/award-card-bg1-1.png') }}" alt="img"></div>
                    <div class="award-card-thumb"><img src="{{ asset('assets/construz-new/img/award/award1-1.png') }}" alt="img"></div>
                    <div class="award-card-year"><span>QC</span>2026</div>
                    <div class="award-card_content">
                        <h4 class="award-card_title">Licence RBQ</h4>
                        <p class="award-card_text">En cours</p>
                        <div class="award-card-tag">Régie du bâtiment</div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-md-6">
                <div class="award-card">
                    <div class="award-card-bg-shape"><img src="{{ asset('assets/construz-new/img/bg/award-card-bg1-1.png') }}" alt="img"></div>
                    <div class="award-card-thumb"><img src="{{ asset('assets/construz-new/img/award/award1-2.png') }}" alt="img"></div>
                    <div class="award-card-year"><span>QC</span>2026</div>
                    <div class="award-card_content">
                        <h4 class="award-card_title">CCQ Conformité</h4>
                        <p class="award-card_text">En cours</p>
                        <div class="award-card-tag">Construction QC</div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-md-6">
                <div class="award-card">
                    <div class="award-card-bg-shape"><img src="{{ asset('assets/construz-new/img/bg/award-card-bg1-1.png') }}" alt="img"></div>
                    <div class="award-card-thumb"><img src="{{ asset('assets/construz-new/img/award/award1-3.png') }}" alt="img"></div>
                    <div class="award-card-year"><span>QC</span>2026</div>
                    <div class="award-card_content">
                        <h4 class="award-card_title">APCHQ Membre</h4>
                        <p class="award-card_text">En cours</p>
                        <div class="award-card-tag">Habitation</div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-md-6">
                <div class="award-card">
                    <div class="award-card-bg-shape"><img src="{{ asset('assets/construz-new/img/bg/award-card-bg1-1.png') }}" alt="img"></div>
                    <div class="award-card-thumb"><img src="{{ asset('assets/construz-new/img/award/award1-4.png') }}" alt="img"></div>
                    <div class="award-card-year"><span>QC</span>2026</div>
                    <div class="award-card_content">
                        <h4 class="award-card_title">CMMTQ Partenaire</h4>
                        <p class="award-card_text">En cours</p>
                        <div class="award-card-tag">Mécanique</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--==============================
Contact Area 2 (formulaire soumission)
==============================-->
<section class="contact-area-2 space overflow-hidden">
    <div class="container">
        <div class="contact-wrap2 space overflow-hidden" data-bg-src="{{ asset('assets/construz-new/img/bg/contact-bg4-1.png') }}" style="background-image: url('{{ asset('assets/construz-new/img/bg/contact-bg4-1.png') }}');">
            <div class="section-animation-shape1-1 shape-mockup animation-infinite" data-top="0" data-left="0" data-bg-src="{{ asset('assets/construz-new/img/shape/global-line-shape1.png') }}" style="background-image: url('{{ asset('assets/construz-new/img/shape/global-line-shape1.png') }}');"></div>
            <div class="row gy-60 justify-content-lg-end justify-content-center">
                <div class="col-xl-7">
                    <div class="contact-form-wrap">
                        <div class="title-area">
                            <span class="sub-title text-theme">SOUMISSION GRATUITE <i class="ri-arrow-right-down-line"></i></span>
                            <h2 class="sec-title">Vous avez un projet ?</h2>
                        </div>
                        <form action="{{ route('frontend.contact.submit') }}" method="POST" class="contact-form ajax-contact">
                            @csrf
                            <div class="row gy-4">
                                <div class="col-md-6"><div class="form-group"><input type="text" class="form-control" name="name" id="name" placeholder="Nom complet *" required></div></div>
                                <div class="col-md-6"><div class="form-group"><input type="email" class="form-control" name="email" id="email" placeholder="Courriel *" required></div></div>
                                <div class="col-md-6"><div class="form-group"><input type="tel" class="form-control" name="phone" id="phone" placeholder="Téléphone"></div></div>
                                <div class="col-md-6"><div class="form-group"><select name="subject" id="subject" class="single-select nice-select form-select" required>
                                    <option value="" disabled selected hidden>Sujet *</option>
                                    <option value="Soumission">Soumission</option>
                                    <option value="Information">Information</option>
                                    <option value="Partenariat">Partenariat</option>
                                    <option value="Autre">Autre</option>
                                </select></div></div>
                                <div class="col-12"><div class="form-group"><textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Décrivez votre projet ou besoin..." required></textarea></div></div>
                                <div class="form-btn col-12"><button class="btn w-100">ENVOYER MA SOUMISSION <i class="ri-arrow-right-up-line"></i></button></div>
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
Portfolio Area 5 (5 filiales premières chantiers)
==============================-->
<div class="portfolio-area-5 overflow-hidden">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="title-area text-center">
                    <span class="sub-title text-theme">NOS PROJETS <i class="ri-arrow-right-down-line"></i></span>
                    <h2 class="sec-title">Premiers chantiers à venir</h2>
                </div>
            </div>
        </div>
        <div class="overflow-hidden">
            <div class="row gy-30 gx-30">
                @php
                    $filiales_portfolio = array_slice($filiales, 0, 5, true);
                @endphp
                @foreach($filiales_portfolio as $slug => $f)
                    <div class="col-lg-{{ $loop->first ? '8' : '4' }} col-md-6">
                        <div class="portfolio-card style5">
                            <div class="portfolio-card-thumb">
                                <img src="{{ asset('assets/construz-new/img/project/project5_' . $loop->iteration . '.png') }}" alt="img">
                            </div>
                            <div class="portfolio-card-details">
                                <div class="media-left">
                                    <span class="portfolio-card-subtitle">{{ $f['nom_court'] }}</span>
                                    <h4 class="portfolio-card-title"><a href="{{ route('frontend.filiale', $slug) }}">Premiers chantiers à venir</a></h4>
                                </div>
                                <div class="btn-group">
                                    <a href="{{ route('frontend.filiale', $slug) }}" class="btn style2">
                                        Découvrir filiale <i class="ri-arrow-right-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!--==============================
Counter Area 01
==============================-->
<div class="counter-area-1 space">
    <div class="container">
        <div class="row justify-content-between gy-40">
            <div class="col-auto">
                <div class="counter-card">
                    <h2 class="counter-card_number"><span class="counter-number">6</span></h2>
                    <p class="counter-card_text">Filiales spécialisées</p>
                </div>
            </div>
            <div class="col-auto">
                <div class="counter-card">
                    <h2 class="counter-card_number"><span class="counter-number">100</span>%</h2>
                    <p class="counter-card_text">Québécois et fier</p>
                </div>
            </div>
            <div class="col-auto">
                <div class="counter-card">
                    <h2 class="counter-card_number">19 G$</h2>
                    <p class="counter-card_text">Marché construction QC</p>
                </div>
            </div>
            <div class="col-auto">
                <div class="counter-card">
                    <h2 class="counter-card_number"><span class="counter-number">2026</span></h2>
                    <p class="counter-card_text">Année de fondation</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!--==============================
Client Area 1 (logos partenaires placeholder)
==============================-->
<div class="client-area-1 text-center space bg-title overflow-hidden">
    <div class="container">
        <div class="row global-carousel client-slider1" data-slide-show="5" data-lg-slide-show="4" data-md-slide-show="3" data-sm-slide-show="2">
            <div class="col-lg-auto"><div class="client-logo"><a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-1.svg') }}" alt="img"></a></div></div>
            <div class="col-lg-auto"><div class="client-logo"><a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-2.svg') }}" alt="img"></a></div></div>
            <div class="col-lg-auto"><div class="client-logo"><a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-3.svg') }}" alt="img"></a></div></div>
            <div class="col-lg-auto"><div class="client-logo"><a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-4.svg') }}" alt="img"></a></div></div>
            <div class="col-lg-auto"><div class="client-logo"><a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-5.svg') }}" alt="img"></a></div></div>
            <div class="col-lg-auto"><div class="client-logo"><a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-1.svg') }}" alt="img"></a></div></div>
            <div class="col-lg-auto"><div class="client-logo"><a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-2.svg') }}" alt="img"></a></div></div>
            <div class="col-lg-auto"><div class="client-logo"><a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-3.svg') }}" alt="img"></a></div></div>
            <div class="col-lg-auto"><div class="client-logo"><a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-4.svg') }}" alt="img"></a></div></div>
            <div class="col-lg-auto"><div class="client-logo"><a href="{{ route('frontend.home') }}"><img src="{{ asset('assets/construz-new/img/client/client-1-5.svg') }}" alt="img"></a></div></div>
        </div>
    </div>
</div>

<!--==============================
Blog Area 4 (placeholders articles à venir)
==============================-->
<section class="blog-area-4 space">
    <div class="container">
        <div class="row justify-content-lg-between justify-content-center align-items-center">
            <div class="col-lg-6">
                <div class="title-area text-lg-start text-center">
                    <span class="sub-title text-theme">BLOG <i class="ri-arrow-right-down-line"></i></span>
                    <h2 class="sec-title">Articles à venir</h2>
                </div>
            </div>
            <div class="col-md-auto">
                <div class="sec-btn">
                    <a href="#" class="btn">Tous les articles <i class="ri-arrow-right-up-line"></i></a>
                </div>
            </div>
        </div>
        <div class="row global-carousel blog-slider5 slider-shadow" data-slide-show="3" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="1" data-xs-slide-show="1" data-dots="false">
            @for($i = 1; $i <= 6; $i++)
            <div class="col-md-6 col-lg-4">
                <div class="blog-card style5">
                    <div class="blog-img">
                        <img src="{{ asset('assets/construz-new/img/blog/blog_5_' . (($i - 1) % 3 + 1) . '.png') }}" alt="blog image">
                        <div class="blog-date"><a href="#"><span>26</span>AVR</a><div class="year">2026</div></div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta"><a href="#">Kalystrat</a><a href="#">Actualité</a></div>
                        <h3 class="blog-title"><a href="#">Articles à venir prochainement</a></h3>
                        <a href="#" class="btn style-border4" tabindex="0">En savoir plus <i class="ri-arrow-right-up-line"></i></a>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>

@endsection
