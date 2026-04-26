@extends('frontend::layout-v2')

@section('title', $title)
@section('meta_description', $filiale['nom_complet'] . ' — ' . $filiale['specialite'] . '. Filiale Kalystrat spécialisée. Soumission gratuite, services au Québec.')

@section('content')

<section class="filiale-hero" style="background-image: url('{{ asset('assets/img/kalystrat/about-bg.jpg') }}'); position: relative; padding: 140px 0; min-height: 400px;">
    <div style="position: absolute; inset: 0; background: linear-gradient(135deg, {{ $filiale['hex_couleur'] }}E6 0%, #0A1628E6 100%); z-index: 0;"></div>
    <div class="container" style="position: relative; z-index: 1;">
        <nav aria-label="Fil d'Ariane">
            <ol class="breadcrumb" style="--bs-breadcrumb-divider-color: rgba(255,255,255,0.6);">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}" style="color: rgba(255,255,255,0.85);">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('frontend.services') }}" style="color: rgba(255,255,255,0.85);">Nos filiales</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #fff;">{{ $filiale['nom_court'] }}</li>
            </ol>
        </nav>
        <h1 style="color: #fff; font-size: 48px; margin-bottom: 15px;">{{ $filiale['nom_complet'] }}</h1>
        <p style="color: rgba(255,255,255,0.92); font-size: 20px; max-width: 720px;">{{ $filiale['specialite'] }}</p>
    </div>
</section>

<section class="space">
    <div class="container">
        <div class="row gx-30 gy-30">
            <div class="col-lg-6">
                <h2 class="sec-title">Services offerts</h2>
                <ul style="list-style: none; padding-left: 0;">
                    @foreach($filiale['services'] as $service)
                    <li style="padding: 10px 0; border-bottom: 1px solid rgba(10,22,40,0.08);"><i class="ri-check-line" aria-hidden="true" style="color: {{ $filiale['hex_couleur'] }}; margin-right: 10px;"></i>{{ $service }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-6">
                <h2 class="sec-title">Clientèles cibles</h2>
                <ul style="list-style: none; padding-left: 0;">
                    @foreach($filiale['cibles'] as $cible)
                    <li style="padding: 10px 0; border-bottom: 1px solid rgba(10,22,40,0.08);"><i class="ri-arrow-right-line" aria-hidden="true" style="color: {{ $filiale['hex_couleur'] }}; margin-right: 10px;"></i>{{ $cible }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="space" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="title-area text-center mb-4">
            <h6 class="text-gold">MÉTHODOLOGIE</h6>
            <h2>Notre approche pour {{ $filiale['nom_court'] }}</h2>
        </div>
        <p class="text-center" style="max-width: 720px; margin: 0 auto;">Chaque mandat suit notre processus standardisé en 4 étapes : Planification → Conception → Réalisation → Livraison. La rigueur Kalystrat appliquée à toutes nos filiales.</p>
    </div>
</section>

<section class="space-bottom">
    <div class="container">
        <div class="col-lg-8 mx-auto text-center">
            <img src="{{ asset('assets/img/kalystrat/about-bg.jpg') }}" alt="Équipe et réalisations {{ $filiale['nom_court'] }} (image temporaire en attendant photos chantiers réels)" class="img-fluid" loading="lazy" style="border: 4px solid {{ $filiale['hex_couleur'] }}; max-width: 100%;">
        </div>
    </div>
</section>

<section class="cta-area" style="padding: 80px 0; background: #0A1628; color: #fff;">
    <div class="container text-center">
        <h2 style="color: #fff;">Démarrez votre projet avec {{ $filiale['nom_court'] }}</h2>
        <p style="color: rgba(255,255,255,0.85); max-width: 640px; margin: 0 auto 24px;">Notre équipe vous accompagne dès la première rencontre. Demandez une soumission gratuite et personnalisée.</p>
        <a href="{{ route('frontend.contact') }}" class="btn" style="background: {{ $filiale['hex_couleur'] }}; color: #fff; border-color: {{ $filiale['hex_couleur'] }}; padding: 14px 32px; font-weight: 700;" aria-label="Demander une soumission pour {{ $filiale['nom_complet'] }}">Demander une soumission <i class="ri-arrow-right-up-line" aria-hidden="true"></i></a>
    </div>
</section>

@endsection
