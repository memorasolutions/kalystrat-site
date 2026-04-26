@extends('frontend::layout-v2')

@section('title', 'Portfolio — Premiers chantiers à venir | Kalystrat')
@section('meta_description', 'Découvrez les premiers projets de construction des 6 filiales Kalystrat au Québec. Holding nouvellement constitué, premiers chantiers à venir.')

@section('content')

@include('frontend::partials-v2.page-hero', [
    'heroTitle' => 'Portfolio',
    'heroSubtitle' => 'Réalisations Kalystrat',
    'heroBg' => 'assets/img/kalystrat/project-residential.jpg',
    'heroBreadcrumb' => [
        ['label' => 'Accueil', 'url' => route('frontend.home')],
        ['label' => 'Portfolio'],
    ],
])

<section class="space">
    <div class="container">
        <div class="title-area text-center">
            <h6 class="text-gold">RÉALISATIONS</h6>
            <h2>Premiers chantiers à venir</h2>
            <p>Gestion Kalystrat Inc. est un holding nouvellement constitué. Nos six filiales spécialisées entament leurs premiers projets de construction au Québec. Cette page présentera prochainement nos réalisations livrées et en cours, par filiale.</p>
        </div>
    </div>
</section>

<section class="space-bottom">
    <div class="container">
        <div class="row gy-4 justify-content-center">
            @foreach($filiales as $slug => $f)
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('frontend.filiale', $slug) }}" class="text-decoration-none portfolio-card-filiale" aria-label="Voir les chantiers à venir de {{ $f['nom_complet'] }}" style="display: block; padding: 30px; background: #fff; border: 1px solid rgba(10,22,40,0.08); border-left: 4px solid {{ $f['hex_couleur'] }}; height: 100%; transition: 0.3s;">
                    <span style="display: inline-block; padding: 4px 10px; margin-bottom: 15px; background: {{ $f['hex_couleur'] }}; color: #fff; font-size: 11px; text-transform: uppercase; letter-spacing: 1px; font-family: 'Archivo', sans-serif; font-weight: 700;">{{ $f['nom_court'] }}</span>
                    <h3 style="font-size: 20px; color: #0A1628; margin-bottom: 10px;">{{ $f['specialite'] }}</h3>
                    <p style="color: #555; margin-bottom: 12px;">Chantiers à venir.</p>
                    <span style="color: {{ $f['hex_couleur'] }}; font-weight: 700;">Découvrir la filiale <i class="ri-arrow-right-line" aria-hidden="true"></i></span>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

@include('frontend::partials-v2.section-cta', [
    'ctaTitle' => 'Vous avez un projet en tête ?',
    'ctaText' => 'Contactez notre équipe dès aujourd\'hui pour discuter de votre projet de construction ou de rénovation.',
    'ctaButtonText' => 'CONTACTEZ-NOUS',
])

@endsection
