@extends('frontend::layout-v2')

@section('title', 'Nos filiales — 6 spécialités en synergie | Kalystrat')
@section('meta_description', 'Kalystrat : 6 filiales construction couvrant la chaîne de valeur complète : Fondations, Structure, Toiture, Finition, Immobilier, Placement. Intégration verticale au Québec.')

@section('content')

@include('frontend::partials-v2.page-hero', [
    'heroTitle' => 'Nos filiales',
    'heroSubtitle' => 'Approche intégrée',
    'heroBg' => 'assets/img/kalystrat/project-blueprint.jpg',
    'heroBreadcrumb' => [
        ['label' => 'Accueil', 'url' => route('frontend.home')],
        ['label' => 'Nos filiales'],
    ],
])

<section class="space">
    <div class="container">
        <div class="title-area text-center mb-5">
            <h6 class="text-gold">NOTRE APPROCHE INTÉGRÉE</h6>
            <h2>Six filiales spécialisées en synergie</h2>
            <p>De l'excavation aux finitions intérieures, nos six filiales construction couvrent l'intégralité de la chaîne de valeur d'un bâtiment, soutenues par une agence de placement de main-d'œuvre interne. Cette intégration verticale élimine les sous-traitants et garantit délais, qualité et coûts maîtrisés.</p>
        </div>
        @php
            $bentoBgs = [
                'fondations' => 'assets/img/kalystrat/project-blueprint.jpg',
                'structure'  => 'assets/img/kalystrat/project-residential.jpg',
                'toiture'    => 'assets/img/kalystrat/project-apartments.jpg',
                'finition'   => 'assets/img/kalystrat/about-strategy.jpg',
                'immobilier' => 'assets/img/kalystrat/project-commercial.jpg',
                'placement'  => 'assets/img/kalystrat/about-meeting.jpg',
            ];
        @endphp
        <div class="row g-4">
            @foreach($filiales as $slug => $f)
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('frontend.filiale', $slug) }}" class="services-bento-card" aria-label="Découvrir {{ $f['nom_complet'] }}" style="display: block; position: relative; padding: 35px 28px; min-height: 280px; background-image: linear-gradient(135deg, {{ $f['hex_couleur'] }}d9 0%, #0A1628d9 100%), url('{{ asset($bentoBgs[$slug] ?? 'assets/img/kalystrat/hero-skyline.jpg') }}'); background-size: cover; background-position: center; color: #fff; text-decoration: none; transition: 0.3s; overflow: hidden;">
                    <h3 style="color: #fff; font-size: 24px; margin-bottom: 12px;">{{ $f['nom_court'] }}</h3>
                    <p style="color: rgba(255,255,255,0.92); margin-bottom: 20px;">{{ $f['specialite'] }}</p>
                    <span style="color: #B8A472; font-weight: 700; letter-spacing: 1px;">DÉCOUVRIR <i class="ri-arrow-right-line" aria-hidden="true"></i></span>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="space" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="title-area text-center mb-5">
            <h6 class="text-gold">NOTRE MÉTHODOLOGIE</h6>
            <h2>Du plan au chantier livré</h2>
            <p>Une approche structurée pour piloter chaque projet de construction de bout en bout, en coordonnant nos six filiales sous une gouvernance unique.</p>
        </div>
        <div class="row g-4 text-center">
            <div class="col-lg-3 col-md-6">
                <div class="process-box p-4 bg-white">
                    <div style="font-size: 36px; color: #B8A472; font-weight: 800; font-family: 'Archivo', sans-serif;">01</div>
                    <h3 class="mt-2">Planification</h3>
                    <p class="mt-2">Évaluation du terrain, étude des besoins, analyse réglementaire (RBQ, code du bâtiment) et estimation budgétaire intégrée par filiale.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-box p-4 bg-white">
                    <div style="font-size: 36px; color: #B8A472; font-weight: 800; font-family: 'Archivo', sans-serif;">02</div>
                    <h3 class="mt-2">Conception</h3>
                    <p class="mt-2">Plans architecturaux, ingénierie structurale et mécanique, choix des matériaux, validation conformité et permis de construction.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-box p-4 bg-white">
                    <div style="font-size: 36px; color: #B8A472; font-weight: 800; font-family: 'Archivo', sans-serif;">03</div>
                    <h3 class="mt-2">Réalisation</h3>
                    <p class="mt-2">Excavation, fondations, structure, toiture, finition. Six filiales coordonnées par notre équipe centrale, main-d'œuvre interne via Placement.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-box p-4 bg-white">
                    <div style="font-size: 36px; color: #B8A472; font-weight: 800; font-family: 'Archivo', sans-serif;">04</div>
                    <h3 class="mt-2">Livraison</h3>
                    <p class="mt-2">Inspection finale, mise en service, remise des clés et accompagnement post-livraison. Garanties prolongées sur les éléments structuraux.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend::partials-v2.section-cta', [
    'ctaTitle' => 'Explorons ensemble vos opportunités',
    'ctaText' => 'Vous avez un projet d\'investissement, un actif à valoriser ou une vision stratégique à concrétiser ? Nos équipes sont à votre disposition.',
    'ctaButtonText' => 'NOUS CONTACTER',
])

@endsection
