@extends('frontend::layout.layout')

@php
    $title='Nos services';
    $subTitle='Nos services';
@endphp

@section('content')
<div class="container py-5">
    {{-- P22-S20b Hub services Kalystrat. Désactivable en revertant ce fichier vers la version Construz originale (git checkout). --}}

    <header class="text-center mb-5" role="region" aria-labelledby="services-hero-title">
        <h1 id="services-hero-title" class="display-4 fw-bold text-primary">Nos services intégrés</h1>
        <p class="lead text-muted mt-3">Six filiales spécialisées qui couvrent toute la chaîne de construction, du concept aux clés en main.</p>
    </header>

    <section class="mb-5" role="region" aria-labelledby="overview-title">
        <h2 id="overview-title" class="h3 fw-bold mb-4 text-primary">Vue d'ensemble</h2>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="p-4 bg-light rounded text-center h-100">
                    <p class="display-6 fw-bold text-primary mb-1">6</p>
                    <p class="mb-0">filiales spécialisées</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="p-4 bg-light rounded text-center h-100">
                    <p class="display-6 fw-bold text-primary mb-1">100&nbsp;%</p>
                    <p class="mb-0">intégration verticale</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="p-4 bg-light rounded text-center h-100">
                    <p class="display-6 fw-bold text-primary mb-1">1</p>
                    <p class="mb-0">équipe centralisée</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="p-4 bg-light rounded text-center h-100">
                    <p class="display-6 fw-bold text-primary mb-1">59 864</p>
                    <p class="mb-0">mises en chantier (QC, 2025)</p>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-5" role="region" aria-labelledby="filiales-title">
        <h2 id="filiales-title" class="h3 fw-bold mb-4 text-primary">Nos 6 filiales</h2>
        <div class="row g-4">
            @foreach(config('kalystrat.filiales', []) as $slug => $filiale)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-header d-flex align-items-center" style="background-color: {{ $filiale['hex_couleur'] ?? '#0A1628' }};">
                            <span class="dot me-2" aria-hidden="true" style="display: inline-block; width: 12px; height: 12px; background-color: #B8A472; border-radius: 50%;"></span>
                            <h3 class="h5 text-white mb-0">{{ $filiale['nom_court'] ?? $slug }}</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted small mb-3">{{ $filiale['specialite'] ?? '' }}</p>
                            <ul class="list-unstyled">
                                @foreach(($filiale['services'] ?? []) as $service)
                                    <li class="mb-1"><i class="ri-check-line text-primary me-1" aria-hidden="true"></i>{{ $service }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <a href="{{ route('kalystrat.filiale', ['slug' => $slug]) }}" class="btn btn-outline-primary btn-sm" aria-label="En savoir plus sur {{ $filiale['nom_court'] ?? $slug }}">
                                Détails <i class="ri-arrow-right-up-line" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="mb-5" role="region" aria-labelledby="why-choose-title">
        <h2 id="why-choose-title" class="h3 fw-bold mb-4 text-primary">Pourquoi choisir Kalystrat</h2>
        <div class="row g-4">
            @php
                $piliers = [
                    ['titre' => 'Intégration verticale complète', 'desc' => "De l'excavation à la finition, tout en interne. Aucun sous-traitant inconnu."],
                    ['titre' => "Main-d'œuvre interne CCQ", 'desc' => 'Filiale Placement Construction garantit la disponibilité et la cohérence de formation.'],
                    ['titre' => 'Demande captive', 'desc' => 'Kalystrat Immobilier développe ses propres projets, alimentant les 5 autres filiales.'],
                    ['titre' => 'Synergies opérationnelles', 'desc' => 'Chaîne complète en boucle : aucun délai de coordination entre étapes.'],
                    ['titre' => 'Marque unifiée Kalystrat', 'desc' => 'Convention « Kalystrat + Spécialité » : reconnaissance et confiance B2B Québec.'],
                    ['titre' => 'Gestion centralisée', 'desc' => 'Comptabilité, RH, juridique, marketing, TI mutualisés à la holding.'],
                ];
            @endphp
            @foreach($piliers as $p)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="me-3 flex-shrink-0" style="width: 44px; height: 44px; background-color: #B8A472; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="ri-check-line text-white" aria-hidden="true" style="font-size: 1.25rem;"></i>
                                </div>
                                <div>
                                    <h3 class="h6 fw-bold mb-1">{{ $p['titre'] }}</h3>
                                    <p class="text-muted small mb-0">{{ $p['desc'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="text-center py-5" role="region" aria-labelledby="cta-title">
        <h2 id="cta-title" class="h3 fw-bold mb-3 text-primary">Démarrons votre projet</h2>
        <p class="lead text-muted mb-4">Soumission gratuite, réponse sous 48h ouvrables.</p>
        <a href="{{ route('contact') }}" class="btn btn-lg px-5 py-3" style="background-color: #B8A472; border-color: #B8A472; color: #0A1628;" aria-label="Aller au formulaire de contact pour demander une soumission">
            Demander une soumission <i class="ri-arrow-right-up-line" aria-hidden="true"></i>
        </a>
    </section>
</div>
@endsection
