@extends('frontend::layout-v2')

@section('title', 'Kalystrat — Holding québécois construction 6 filiales')
@section('meta_description', 'Holding québécois construction à intégration verticale. 6 filiales spécialisées : Fondations, Structure, Toiture, Finition, Immobilier, Placement. Conçu. Réalisé. Livré.')

@section('content')

<section class="hero-wrapper hero-layout5" style="background-image: url('{{ asset('assets/img/kalystrat/hero-skyline.jpg') }}');">
    <div class="container">
        <div class="hero-content text-center">
            <p class="hero-subtitle">Conçu. Réalisé. Livré.</p>
            <h1 class="hero-title">Holding québécois en construction</h1>
            <p>6 filiales spécialisées en synergie sous une marque unifiée. De la fondation à la livraison clés en main.</p>
            <div class="btn-wrap">
                <a href="{{ route('frontend.services') }}" class="btn style1" aria-label="Découvrir nos six filiales spécialisées">DÉCOUVRIR NOS FILIALES</a>
                <a href="{{ route('frontend.contact') }}" class="btn style2" aria-label="Demander une soumission gratuite">DEMANDER UNE SOUMISSION</a>
            </div>
        </div>
    </div>
</section>

<section class="about-area space">
    <div class="container">
        <div class="row align-items-center gy-4">
            <div class="col-lg-6">
                <div class="img-box">
                    <img src="{{ asset('assets/img/kalystrat/about-strategy.jpg') }}" alt="Équipe Kalystrat sur chantier — expertise construction québécoise" class="w-100">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content">
                    <h6 class="text-gold">À PROPOS DE KALYSTRAT</h6>
                    <h2>Excellence en construction grâce à 6 filiales spécialisées</h2>
                    <p>Gestion Kalystrat Inc. réunit des expertises complémentaires sous une marque unifiée. Chaque filiale apporte une spécialité, l'ensemble livre une qualité d'exécution rare au Québec.</p>
                    <ul class="checklist">
                        <li><i class="ri-check-line" aria-hidden="true"></i> Intégration verticale — toutes les étapes coordonnées</li>
                        <li><i class="ri-check-line" aria-hidden="true"></i> Marque unifiée — confiance et garantie communes</li>
                        <li><i class="ri-check-line" aria-hidden="true"></i> Excellence québécoise — RBQ, CCQ, normes provinciales</li>
                        <li><i class="ri-check-line" aria-hidden="true"></i> Livraison clés en main — un seul interlocuteur, six expertises</li>
                    </ul>
                    <a href="{{ route('frontend.about') }}" class="btn style1">EN APPRENDRE PLUS</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="service-area space-bottom">
    <div class="container">
        <div class="title-area text-center">
            <h6 class="text-gold">NOS 6 FILIALES</h6>
            <h2>Six expertises, une seule promesse</h2>
        </div>
        <div class="row gy-4">
            @foreach($filiales as $slug => $f)
            <div class="col-lg-4 col-md-6">
                <div class="service-card filiale-{{ $slug }}">
                    <div class="service-icon">
                        @if($slug === 'fondations')
                            <i class="ri-stack-line" aria-hidden="true"></i>
                        @elseif($slug === 'structure')
                            <i class="ri-building-2-line" aria-hidden="true"></i>
                        @elseif($slug === 'toiture')
                            <i class="ri-home-roof-line" aria-hidden="true"></i>
                        @elseif($slug === 'finition')
                            <i class="ri-paint-brush-line" aria-hidden="true"></i>
                        @elseif($slug === 'immobilier')
                            <i class="ri-key-2-line" aria-hidden="true"></i>
                        @elseif($slug === 'placement')
                            <i class="ri-team-line" aria-hidden="true"></i>
                        @endif
                    </div>
                    <h3>{{ $f['nom_court'] }}</h3>
                    <p>{{ $f['specialite'] }}</p>
                    <a href="{{ route('frontend.filiale', $slug) }}" aria-label="Découvrir la filiale {{ $f['nom_complet'] }}">DÉCOUVRIR <i class="ri-arrow-right-up-line" aria-hidden="true"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="counter-area space" style="background-color: #0A1628;">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-3 col-sm-6">
                <div class="counter-card text-center">
                    <h3><span class="counter-number" data-count="6">0</span></h3>
                    <span>FILIALES SPÉCIALISÉES</span>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="counter-card text-center">
                    <h3><span class="counter-number" data-count="59864">0</span></h3>
                    <span>KM² PROVINCE DE QUÉBEC</span>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="counter-card text-center">
                    <h3>19 G$</h3>
                    <span>MARCHÉ CONSTRUCTION QC 2025</span>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="counter-card text-center">
                    <h3><span class="counter-number" data-count="100">0</span>%</h3>
                    <span>QUÉBÉCOIS, FIER ET LOCAL</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="process-area space">
    <div class="container">
        <div class="title-area text-center">
            <h6 class="text-gold">NOTRE MÉTHODOLOGIE</h6>
            <h2>De l'idée aux clés : 4 étapes maîtrisées</h2>
        </div>
        <div class="row gy-4">
            <div class="col-md-6 col-lg-3">
                <div class="process-step">
                    <h4>01 — Planification</h4>
                    <p>Évaluation terrain, étude besoins, analyse RBQ, budget intégré.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="process-step">
                    <h4>02 — Conception</h4>
                    <p>Plans architecturaux, ingénierie, choix matériaux, permis.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="process-step">
                    <h4>03 — Réalisation</h4>
                    <p>Excavation, fondations, structure, toiture, finition. Six filiales coordonnées.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="process-step">
                    <h4>04 — Livraison</h4>
                    <p>Inspection finale, mise en service, remise des clés, garanties prolongées.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta-area" style="background-color: #B8A472;">
    <div class="container">
        <div class="text-center">
            <h2 style="color: #0A1628;">Prêt à concevoir votre projet ?</h2>
            <p style="color: #0A1628; font-size: 18px; margin-bottom: 25px;">Une question, un terrain, un projet — parlons-en.</p>
            <a href="{{ route('frontend.contact') }}" class="btn style1" style="background-color: #0A1628; color: #B8A472; border-color: #0A1628;">DEMANDER UNE SOUMISSION</a>
        </div>
    </div>
</section>

@endsection
