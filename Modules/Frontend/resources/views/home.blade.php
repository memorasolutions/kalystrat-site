@extends('frontend::layout')

@section('title', 'Kalystrat - Construction stratégique à Québec')
@section('meta_description', 'Kalystrat est votre partenaire de confiance pour la construction stratégique et le développement immobilier à Québec. Découvrez notre expertise et nos projets.')

@section('content')
    {{-- Hero --}}
    <section class="hero-wrapper hero-1" data-bg-src="{{ asset('assets/construz/img/hero/hero_bg_1_1.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="hero-style1">
                        <span class="sub-title wow fadeInUp" data-wow-delay="0.1s">KALYSTRAT</span>
                        <h1 class="hero-title wow fadeInUp" data-wow-delay="0.2s">Toute construction commence par une stratégie</h1>
                        <p class="hero-text wow fadeInUp" data-wow-delay="0.3s">Construction stratégique et développement immobilier à Québec</p>
                        <div class="btn-group wow fadeInUp" data-wow-delay="0.4s">
                            <a href="{{ route('frontend.services') }}" class="btn">DÉCOUVRIR NOS SERVICES <i class="ri-arrow-right-up-line"></i></a>
                            <a href="{{ route('frontend.contact') }}" class="btn style2">SOUMISSION GRATUITE <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- About teaser --}}
    <section class="space-top space-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 wow fadeInLeft">
                    <div class="img-box1">
                        <img src="{{ asset('assets/construz/img/normal/about_1-1.png') }}" alt="À propos de Kalystrat">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight">
                    <div class="title-area">
                        <span class="sub-title"><i class="ri-focus-2-line"></i> À PROPOS</span>
                        <h2 class="sec-title">Excellence et vision stratégique</h2>
                    </div>
                    <p>Chez Kalystrat, nous abordons chaque projet de construction et de développement avec une planification méticuleuse et une vision à long terme. Notre approche stratégique garantit des résultats optimaux, une efficacité accrue et une satisfaction client inégalée.</p>
                    <p>Inspirés par les principes fondamentaux de l'architecture — planification, organisation, ordre et précision — nous bâtissons l'avenir avec stratégie.</p>
                    <a href="{{ route('frontend.about') }}" class="link-btn" aria-label="En savoir plus sur Kalystrat">En savoir plus <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </section>

    {{-- Services --}}
    <section class="space-top space-bottom bg-smoke">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title"><i class="ri-focus-2-line"></i> NOS SERVICES</span>
                <h2 class="sec-title">Ce que nous offrons</h2>
            </div>
            <div class="row gx-30 gy-30">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-card">
                        <div class="service-card_icon">
                            <i class="ri-building-line"></i>
                        </div>
                        <h3 class="service-card_title">Construction résidentielle</h3>
                        <p class="service-card_text">Des maisons personnalisées aux projets multifamiliaux, nous construisons des espaces de vie exceptionnels.</p>
                        <a href="{{ route('frontend.services') }}" class="link-btn" aria-label="En savoir plus sur ce service">En savoir plus <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-card">
                        <div class="service-card_icon">
                            <i class="ri-home-4-line"></i>
                        </div>
                        <h3 class="service-card_title">Développement immobilier</h3>
                        <p class="service-card_text">Nous transformons les visions en réalités tangibles, du concept à la réalisation de projets immobiliers.</p>
                        <a href="{{ route('frontend.services') }}" class="link-btn" aria-label="En savoir plus sur ce service">En savoir plus <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-card">
                        <div class="service-card_icon">
                            <i class="ri-bar-chart-box-line"></i>
                        </div>
                        <h3 class="service-card_title">Gestion de projets</h3>
                        <p class="service-card_text">Une gestion rigoureuse pour assurer le respect des délais, des budgets et des normes de qualité.</p>
                        <a href="{{ route('frontend.services') }}" class="link-btn" aria-label="En savoir plus sur ce service">En savoir plus <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Counter/Stats --}}
    <section class="counter-wrap" data-bg-src="{{ asset('assets/construz/img/bg/counter-bg1-1.png') }}">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="counter-card">
                        <h3 class="title"><span class="counter">15</span>+</h3>
                        <p>Années d'expérience</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="counter-card">
                        <h3 class="title"><span class="counter">200</span>+</h3>
                        <p>Projets complétés</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="counter-card">
                        <h3 class="title"><span class="counter">50</span>+</h3>
                        <p>Employés qualifiés</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="counter-card">
                        <h3 class="title"><span class="counter">100</span>%</h3>
                        <p>Satisfaction client</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Portfolio teaser --}}
    <section class="space-top space-bottom">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title"><i class="ri-focus-2-line"></i> NOS PROJETS RÉCENTS</span>
                <h2 class="sec-title">Découvrez notre portfolio</h2>
            </div>
            <div class="row gx-30 gy-30">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="project-card">
                        <div class="project-img">
                            <img src="{{ asset('assets/construz/img/project/project1_1.png') }}" alt="Projet résidentiel">
                        </div>
                        <div class="project-content">
                            <h3 class="project-title">Résidence Le Plateau</h3>
                            <span class="project-cat">Construction neuve</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="project-card">
                        <div class="project-img">
                            <img src="{{ asset('assets/construz/img/project/project1_2.png') }}" alt="Développement commercial">
                        </div>
                        <div class="project-content">
                            <h3 class="project-title">Centre commercial Sainte-Foy</h3>
                            <span class="project-cat">Développement commercial</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="project-card">
                        <div class="project-img">
                            <img src="{{ asset('assets/construz/img/project/project1_3.png') }}" alt="Rénovation stratégique">
                        </div>
                        <div class="project-content">
                            <h3 class="project-title">Rénovation Immeuble Patrimonial</h3>
                            <span class="project-cat">Rénovation</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('frontend.portfolio') }}" class="btn">VOIR TOUT LE PORTFOLIO <i class="ri-arrow-right-up-line"></i></a>
            </div>
        </div>
    </section>

    {{-- Testimonials --}}
    <section class="space-top space-bottom bg-smoke">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title"><i class="ri-focus-2-line"></i> TÉMOIGNAGES</span>
                <h2 class="sec-title">Ce que disent nos clients</h2>
            </div>
            <div class="row">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testi-box">
                        <div class="testi-rating">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                        <p class="testi-text">"Kalystrat a dépassé toutes nos attentes. Leur approche stratégique et leur professionnalisme ont rendu notre projet de développement immobilier un succès retentissant."</p>
                        <div class="testi-author">
                            <h3 class="name">Jean-François Tremblay</h3>
                            <span class="designation">Propriétaire, Immobilier Québec Inc.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="testi-box">
                        <div class="testi-rating">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                        <p class="testi-text">"La gestion de projet de Kalystrat a été impeccable. Ils ont su naviguer les complexités de notre construction résidentielle avec une expertise remarquable."</p>
                        <div class="testi-author">
                            <h3 class="name">Sophie Dubois</h3>
                            <span class="designation">Directrice, Constructions Nouvelles Idées</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Banner --}}
    <section class="space-top space-bottom">
        <div class="container">
            <div class="cta-wrap2 text-center">
                <h2 class="title wow fadeInUp">Prêt à démarrer votre projet?</h2>
                <p class="wow fadeInUp" data-wow-delay="0.1s">Contactez-nous dès aujourd'hui pour une soumission gratuite et discutons de la manière dont notre expertise peut concrétiser votre vision.</p>
                <a href="{{ route('frontend.contact') }}" class="btn wow fadeInUp" data-wow-delay="0.2s">CONTACTEZ-NOUS <i class="ri-arrow-right-up-line"></i></a>
            </div>
        </div>
    </section>
@endsection
