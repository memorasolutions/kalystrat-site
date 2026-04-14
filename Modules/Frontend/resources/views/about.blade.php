@extends('frontend::layout')

@section('title', 'À propos - Kalystrat')
@section('meta_description', 'Découvrez Kalystrat, votre partenaire stratégique en construction et développement immobilier à Québec.')
@section('breadcrumb_title', 'À propos')
@section('breadcrumb')
    <li>À propos</li>
@endsection

@section('content')
    {{-- About intro --}}
    <section class="space-top space-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 wow fadeInLeft">
                    <div class="img-box1">
                        <img src="{{ asset('assets/construz/img/normal/about_1-1.png') }}" alt="À propos de Kalystrat" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight">
                    <div class="title-area">
                        <span class="sub-title"><i class="ri-focus-2-line"></i> NOTRE HISTOIRE</span>
                        <h2 class="sec-title">Notre histoire</h2>
                    </div>
                    <p>Fondée avec une vision stratégique pour redéfinir la construction dans la ville de Québec, Kalystrat s'est imposée comme un leader de l'industrie. Notre engagement envers l'excellence guide chaque projet, de la conception à la réalisation.</p>
                    <p>Inspirés par les principes fondamentaux de l'architecture — planification, organisation, ordre et précision — nous bâtissons l'avenir avec stratégie. Chaque construction commence par une vision claire et une exécution méticuleuse.</p>
                    <div class="mt-4">
                        <h4 class="mb-3">Nos valeurs fondamentales</h4>
                        <div class="row g-2">
                            <div class="col-6"><span class="text-theme"><i class="ri-check-double-line"></i></span> Stratégie</div>
                            <div class="col-6"><span class="text-theme"><i class="ri-check-double-line"></i></span> Excellence</div>
                            <div class="col-6"><span class="text-theme"><i class="ri-check-double-line"></i></span> Innovation</div>
                            <div class="col-6"><span class="text-theme"><i class="ri-check-double-line"></i></span> Intégrité</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Team --}}
    <section class="space-top space-bottom bg-smoke">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title"><i class="ri-focus-2-line"></i> L'ÉQUIPE</span>
                <h2 class="sec-title">Notre équipe</h2>
            </div>
            <div class="row gx-30 gy-30">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-card text-center">
                        <div class="team-img">
                            <img src="{{ asset('assets/construz/img/team/team-1-1.png') }}" alt="Ali Salomon">
                        </div>
                        <div class="team-content">
                            <h3 class="team-title">Ali Salomon</h3>
                            <span class="team-desig">Fondateur & PDG</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="team-card text-center">
                        <div class="team-img">
                            <img src="{{ asset('assets/construz/img/team/team-1-2.png') }}" alt="Nathalia Benavidez">
                        </div>
                        <div class="team-content">
                            <h3 class="team-title">Nathalia Benavidez</h3>
                            <span class="team-desig">Directrice des opérations</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-card text-center">
                        <div class="team-img">
                            <img src="{{ asset('assets/construz/img/team/team-1-3.png') }}" alt="Amed Zakzuk">
                        </div>
                        <div class="team-content">
                            <h3 class="team-title">Amed Zakzuk</h3>
                            <span class="team-desig">Directeur de projets</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Why us --}}
    <section class="space-top space-bottom">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title"><i class="ri-focus-2-line"></i> POURQUOI NOUS</span>
                <h2 class="sec-title">Pourquoi nous choisir</h2>
            </div>
            <div class="row gx-30 gy-30">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="feature-box text-center p-4">
                        <i class="ri-lightbulb-line" style="font-size: 3rem; color: var(--ks-gold);"></i>
                        <h5 class="mt-3 mb-2">Approche stratégique</h5>
                        <p>Nous planifions chaque projet avec précision pour assurer des résultats optimaux.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-box text-center p-4">
                        <i class="ri-shield-check-line" style="font-size: 3rem; color: var(--ks-gold);"></i>
                        <h5 class="mt-3 mb-2">Qualité garantie</h5>
                        <p>Nous nous engageons à fournir les standards de qualité les plus élevés.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="feature-box text-center p-4">
                        <i class="ri-timer-line" style="font-size: 3rem; color: var(--ks-gold);"></i>
                        <h5 class="mt-3 mb-2">Respect des délais</h5>
                        <p>La ponctualité est au cœur de notre méthodologie de travail.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="feature-box text-center p-4">
                        <i class="ri-hand-heart-line" style="font-size: 3rem; color: var(--ks-gold);"></i>
                        <h5 class="mt-3 mb-2">Transparence totale</h5>
                        <p>Une communication claire et honnête à chaque étape du projet.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
