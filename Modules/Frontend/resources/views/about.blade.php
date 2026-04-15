@extends('frontend::layout')

@section('title', 'Qui nous sommes - Kalystrat')
@section('meta_description', 'Découvrez Kalystrat, plateforme de développement stratégique et d\'investissement immobilier à Québec. Vision, équipe et approche.')
@section('breadcrumb_title', 'Qui nous sommes')
@section('breadcrumb')
    <li>Qui nous sommes</li>
@endsection

@section('content')
    {{-- Notre vision --}}
    <section class="space-top space-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 wow fadeInLeft">
                    <div class="img-box1">
                        <img src="{{ asset('assets/img/kalystrat/about-strategy.jpg') }}" alt="Réunion stratégique Kalystrat" loading="lazy" style="width: 100%; object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight">
                    <div class="title-area">
                        <span class="sub-title"><i class="ri-focus-2-line" aria-hidden="true"></i> INVESTISSEMENT STRATÉGIQUE ET DÉVELOPPEMENT</span>
                        <h2 class="sec-title">Notre vision</h2>
                    </div>
                    <p>Kalystrat est une plateforme de développement stratégique dédiée à la création de valeur au-delà de la construction. Nous identifions, structurons et développons des actifs à fort potentiel en conjuguant expertise en investissement immobilier, gestion d'actifs et vision à long terme.</p>
                    <p>Notre approche repose sur une conviction fondamentale : la performance durable naît de la convergence entre rigueur analytique, excellence opérationnelle et alignement des intérêts avec nos partenaires.</p>
                    <div class="row mt-4 g-2">
                        <div class="col-6"><span class="text-theme"><i class="ri-check-double-line" aria-hidden="true"></i></span> Rigueur</div>
                        <div class="col-6"><span class="text-theme"><i class="ri-check-double-line" aria-hidden="true"></i></span> Vision</div>
                        <div class="col-6"><span class="text-theme"><i class="ri-check-double-line" aria-hidden="true"></i></span> Performance</div>
                        <div class="col-6"><span class="text-theme"><i class="ri-check-double-line" aria-hidden="true"></i></span> Intégrité</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Équipe dirigeante --}}
    <section class="space-top space-bottom bg-smoke">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title"><i class="ri-focus-2-line" aria-hidden="true"></i> LEADERSHIP</span>
                <h2 class="sec-title">Notre équipe dirigeante</h2>
                <p>Une équipe expérimentée, animée par une exigence commune : créer de la valeur et piloter le développement d'actifs stratégiques avec discipline et ambition.</p>
            </div>
            <div class="row gx-30 gy-30 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-card text-center">
                        <div class="team-img">
                            <img src="{{ asset('assets/construz/img/team/team-1-1.png') }}" alt="Ali Salomon — Fondateur et président de Kalystrat" loading="lazy">
                        </div>
                        <div class="team-content">
                            <h3 class="team-title">Ali Salomon</h3>
                            <span class="team-desig">Fondateur et président</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="team-card text-center">
                        <div class="team-img">
                            <img src="{{ asset('assets/construz/img/team/team-1-2.png') }}" alt="Nathalia Benavidez — Directrice du développement" loading="lazy">
                        </div>
                        <div class="team-content">
                            <h3 class="team-title">Nathalia Benavidez</h3>
                            <span class="team-desig">Directrice du développement</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-card text-center">
                        <div class="team-img">
                            <img src="{{ asset('assets/construz/img/team/team-1-3.png') }}" alt="Amed Zakzuk — Directeur des investissements" loading="lazy">
                        </div>
                        <div class="team-content">
                            <h3 class="team-title">Amed Zakzuk</h3>
                            <span class="team-desig">Directeur des investissements</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Pourquoi Kalystrat --}}
    <section class="space-top space-bottom">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title"><i class="ri-focus-2-line" aria-hidden="true"></i> NOS AVANTAGES DISTINCTIFS</span>
                <h2 class="sec-title">Pourquoi choisir Kalystrat</h2>
            </div>
            <div class="row gx-30 gy-30">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="feature-box text-center p-4">
                        <i class="ri-eye-line" aria-hidden="true" style="font-size: 3rem; color: var(--ks-gold);"></i>
                        <h5 class="mt-3 mb-2">Vision stratégique</h5>
                        <p>Nous anticipons les dynamiques de marché pour identifier les opportunités à fort potentiel de valorisation.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-box text-center p-4">
                        <i class="ri-settings-3-line" aria-hidden="true" style="font-size: 3rem; color: var(--ks-gold);"></i>
                        <h5 class="mt-3 mb-2">Rigueur opérationnelle</h5>
                        <p>Chaque projet est piloté avec une discipline d'exécution irréprochable, du sourcing à la livraison.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="feature-box text-center p-4">
                        <i class="ri-line-chart-line" aria-hidden="true" style="font-size: 3rem; color: var(--ks-gold);"></i>
                        <h5 class="mt-3 mb-2">Performance mesurable</h5>
                        <p>Nous mesurons la performance de chaque actif selon des indicateurs financiers et opérationnels rigoureux.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="feature-box text-center p-4">
                        <i class="ri-shake-hands-line" aria-hidden="true" style="font-size: 3rem; color: var(--ks-gold);"></i>
                        <h5 class="mt-3 mb-2">Partenariats durables</h5>
                        <p>Des relations de confiance fondées sur la transparence et l'alignement des intérêts avec nos partenaires.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
