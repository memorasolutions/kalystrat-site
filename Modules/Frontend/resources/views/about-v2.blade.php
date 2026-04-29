@extends('frontend::layout-v2')

@section('title', 'Qui nous sommes - Kalystrat')
@section('meta_description', 'Kalystrat — holding québécois construction à intégration verticale fondé par Ali Salomon. 6 filiales, vision 8 ans, conseil consultatif Jobidon/Wong.')

@section('content')

@include('frontend::partials-v2.breadcumb-v2', [
    'pageTitle' => 'Qui nous sommes',
    'breadcumbItems' => [
        ['label' => 'Accueil', 'url' => route('index')],
        ['label' => 'À propos', 'url' => null]
    ]
])

<div class="about-area-2 space-top overflow-hidden">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6">
                <div class="about-thumb2 mb-60 mb-xl-0">
                    <div class="about-img-1">
                        <img src="{{ asset('assets/construz-new/img/normal/about_2-1.png') }}" alt="img">
                    </div>
                    <div class="about-counter-wrap style2 jump-reverse">
                        <div class="about-counter-icon"><img src="{{ asset('assets/construz-new/img/hero/hero_experience_wrap_icon_1_1.png') }}" alt="img"></div>
                        <div class="about-counter-details">
                            <h3 class="about-counter-number"><span class="counter-number">2026</span></h3>
                            <p class="about-counter-text">Année de fondation</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-wrap2">
                    <div class="title-area mb-40">
                        <span class="sub-title text-theme">À PROPOS DE KALYSTRAT <i class="ri-arrow-right-down-line"></i></span>
                        <h2 class="sec-title">Holding québécois construction à intégration verticale</h2>
                        <p class="sec-text">Gestion Kalystrat Inc. réunit six filiales spécialisées sous une marque unifiée, fondée par Ali Salomon. Notre mission : excellence en construction et qualité supérieure à chaque projet. Notre ambition : devenir un groupe intégré de référence au Québec dans un horizon de huit ans.</p>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6"><div class="about-grid-wrap"><div class="about-grid-icon"><i class="ri-building-line" style="font-size:2rem;"></i></div><div class="about-grid-details"><h4>Intégration verticale</h4><p>6 filiales coordonnées sous gouvernance unique.</p></div></div></div>
                        <div class="col-md-6"><div class="about-grid-wrap"><div class="about-grid-icon"><i class="ri-shield-star-line" style="font-size:2rem;"></i></div><div class="about-grid-details"><h4>Excellence québécoise</h4><p>RBQ, CCQ, normes provinciales.</p></div></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="space-top text-center overflow-hidden">
    <div class="container">
        <div class="title-area">
            <span class="sub-title text-theme">DIRECTION ET GOUVERNANCE</span>
            <h2 class="sec-title">Une direction structurée</h2>
            <p>Soutenue par un conseil consultatif d'experts en construction, droit et immobilier.</p>
        </div>
        <div class="row gy-4 justify-content-center">
            <div class="col-lg-5"><div class="about-grid-wrap p-4" style="background:#f8f9fa;"><h3>Ali Salomon</h3><p class="text-muted">Fondateur, président et directeur général</p><p>Pilote la stratégie globale, supervise les six filiales et oriente les acquisitions.</p></div></div>
            <div class="col-lg-5"><div class="about-grid-wrap p-4" style="background:#f8f9fa;"><h3>Conseil consultatif</h3><p class="text-muted">En constitution</p><p>M<sup>e</sup> Jacques Jobidon (droit), Perry Wong (immobilier). 3 sièges à pourvoir.</p></div></div>
        </div>
    </div>
</div>

<div class="counter-area-1 space">
    <div class="container">
        <div class="row justify-content-between gy-40">
            <div class="col-auto"><div class="counter-card"><h2 class="counter-card_number"><span class="counter-number">6</span></h2><p class="counter-card_text">Filiales spécialisées</p></div></div>
            <div class="col-auto"><div class="counter-card"><h2 class="counter-card_number"><span class="counter-number">100</span>%</h2><p class="counter-card_text">Québécois et fier</p></div></div>
            <div class="col-auto"><div class="counter-card"><h2 class="counter-card_number">19 G$</h2><p class="counter-card_text">Marché construction QC</p></div></div>
            <div class="col-auto"><div class="counter-card"><h2 class="counter-card_number"><span class="counter-number">2026</span></h2><p class="counter-card_text">Année de fondation</p></div></div>
        </div>
    </div>
</div>

<div class="cta-area-5">
    <div class="container">
        <div class="cta-wrap5" data-bg-src="{{ asset('assets/construz-new/img/bg/cta-bg5-1.png') }}" style="background-image: url('{{ asset('assets/construz-new/img/bg/cta-bg5-1.png') }}');">
            <h4 class="cta-title text-white">Construisons ensemble votre projet</h4>
            <a class="btn style4" href="{{ route('contact') }}">DEMANDER UNE SOUMISSION <i class="ri-arrow-right-up-line"></i></a>
        </div>
    </div>
</div>

@endsection
