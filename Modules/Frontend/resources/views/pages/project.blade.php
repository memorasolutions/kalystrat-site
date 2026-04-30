@extends('frontend::layout.layout')

@php
    $title='Réalisations';
    $subTitle='Réalisations';
@endphp

@section('content')
<div class="container py-5">
    {{-- P22-S20c Page Réalisations transparente Kalystrat (entreprise nouvelle 2026, premiers projets en cours). Désactivable via git checkout. --}}

    <header class="text-center mb-5" role="region" aria-labelledby="realisations-hero">
        <h1 id="realisations-hero" class="display-4 fw-bold" style="color: #0A1628;">Nos réalisations</h1>
        <p class="lead text-muted mt-3">Holding fondé en 2026, premiers chantiers en cours. Notre portfolio s'étoffe à chaque projet livré.</p>
    </header>

    <section class="mb-5" role="region" aria-labelledby="vision-heading">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="bg-light border rounded-3 p-5 text-center">
                    <h2 id="vision-heading" class="h4 fw-bold mb-3" style="color: #0A1628;">Notre vision</h2>
                    <p class="mb-4">Kalystrat se construit projet après projet, avec rigueur et transparence. Cette page documentera bientôt nos premières réalisations livrées par les six filiales du groupe.</p>
                    <a href="{{ route('contact') }}" class="btn btn-lg" style="background-color: #B8A472; border-color: #B8A472; color: #0A1628;" aria-label="Contactez Kalystrat pour devenir un de nos premiers clients">
                        Soyez parmi nos premiers clients <i class="ri-arrow-right-up-line" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-5" role="region" aria-labelledby="types-heading">
        <h2 id="types-heading" class="h3 fw-bold text-center mb-4" style="color: #0A1628;">Types de projets que nous livrons</h2>
        <div class="row g-4">
            @php
                $types = [
                    ['icon' => 'ri-foundation-line', 'nom' => 'Fondations', 'desc' => "Excavation et fondations résidentielles, commerciales et institutionnelles."],
                    ['icon' => 'ri-building-2-line', 'nom' => 'Structure', 'desc' => "Charpentes bois et acier pour condos, multilogements, espaces commerciaux."],
                    ['icon' => 'ri-home-4-line', 'nom' => 'Toiture et Enveloppe', 'desc' => "Toitures plates, en pente, membranes TPO/EPDM pour neuf et réfection."],
                    ['icon' => 'ri-paint-brush-line', 'nom' => 'Finition Intérieure', 'desc' => "Finitions haut de gamme et accessibles : gypse, peinture, planchers, ébénisterie."],
                    ['icon' => 'ri-building-line', 'nom' => 'Immobilier', 'desc' => "Développement résidentiel, flips et constitution de portefeuille locatif."],
                    ['icon' => 'ri-team-line', 'nom' => 'Placement Construction', 'desc' => "Main-d'œuvre qualifiée pour entrepreneurs généraux et promoteurs."],
                ];
            @endphp
            @foreach($types as $t)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body d-flex flex-column align-items-center text-center p-4">
                            <div class="mb-3" style="width: 60px; height: 60px; background-color: rgba(184,164,114,0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="{{ $t['icon'] }}" aria-hidden="true" style="font-size: 1.75rem; color: #B8A472;"></i>
                            </div>
                            <h3 class="h5 fw-bold mb-2" style="color: #0A1628;">{{ $t['nom'] }}</h3>
                            <p class="card-text text-muted small mb-0">{{ $t['desc'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="mb-5" role="region" aria-labelledby="cas-heading">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="bg-light border-start border-5 rounded-3 p-4" style="border-color: #B8A472 !important;">
                    <h2 id="cas-heading" class="h5 fw-bold mb-2" style="color: #0A1628;">Études de cas à venir</h2>
                    <p class="mb-0 text-muted">Études de cas détaillées et projets livrés seront ajoutés ici dès leur complétion. Premier projet de Kalystrat Immobilier prévu en chantier 2026.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="text-center py-5" role="region" aria-labelledby="cta-realisations">
        <h2 id="cta-realisations" class="h3 fw-bold mb-3" style="color: #0A1628;">Devenez notre prochaine référence</h2>
        <p class="lead text-muted mb-4">Bâtir avec Kalystrat, c'est garantir une exécution intégrée du concept aux clés en main.</p>
        <a href="{{ route('contact') }}" class="btn btn-lg px-5 py-3" style="background-color: #B8A472; border-color: #B8A472; color: #0A1628;" aria-label="Contactez Kalystrat dès aujourd'hui">
            Démarrer un projet <i class="ri-arrow-right-up-line" aria-hidden="true"></i>
        </a>
    </section>
</div>
@endsection
