@extends('frontend::layout')

@push('head')
<meta name="dateModified" content="2026-05-04">
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    '@id' => 'https://kalystrat.ca/zones-desservies/' . $slug . '#business',
    'name' => 'Kalystrat — ' . $ville['nom'],
    'url' => 'https://kalystrat.ca/zones-desservies/' . $slug,
    'description' => $ville['meta_description'],
    'parentOrganization' => ['@type' => 'Organization', 'name' => 'Gestion Kalystrat Inc.', 'url' => 'https://kalystrat.ca'],
    'areaServed' => [
        '@type' => 'City',
        'name' => $ville['nom_long'],
        'containedInPlace' => ['@type' => 'AdministrativeArea', 'name' => $ville['region'] . ', ' . $ville['province']],
    ],
    'address' => [
        '@type' => 'PostalAddress',
        'addressLocality' => $ville['nom'],
        'addressRegion' => 'QC',
        'addressCountry' => 'CA',
    ],
    'geo' => [
        '@type' => 'GeoCoordinates',
        'latitude' => $ville['lat'],
        'longitude' => $ville['lng'],
    ],
    'telephone' => '+14184760987',
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Zones desservies', 'item' => 'https://kalystrat.ca/zones-desservies'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => $ville['nom'], 'item' => 'https://kalystrat.ca/zones-desservies/' . $slug],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
<style>
    .ks-ville-card {
        background: #FFFFFF;
        border: 1px solid rgba(10, 22, 40, 0.08);
        border-radius: 0.5rem;
        padding: 1.5rem;
        height: 100%;
    }
    .ks-ville-card__title {
        color: var(--ks-navy, #0A1628);
        font-size: 1.0625rem;
        font-weight: 700;
        margin: 0 0 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .ks-ville-card__title i {
        color: var(--ks-gold, #B8A472);
        font-size: 1.25rem;
    }
    .ks-ville-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .ks-ville-list li {
        padding: 0.4rem 0;
        color: rgba(10, 22, 40, 0.78);
        font-size: 0.9375rem;
        display: flex;
        align-items: flex-start;
        gap: 0.5rem;
    }
    .ks-ville-list li::before {
        content: "→";
        color: var(--ks-gold, #B8A472);
        font-weight: 700;
        flex-shrink: 0;
    }
    .ks-ville-stats {
        display: flex;
        gap: 2rem;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 2rem;
        padding: 1.5rem;
        background: #F4F4F2; /* WCAG AAA : était rgba 0.04 (quasi blanc), texte navy mal détecté contraste */
        border-radius: 0.5rem;
    }
    .ks-ville-stat {
        text-align: center;
    }
    .ks-ville-stat__num {
        display: block;
        color: #5C4F2C; /* gold profond — était #B8A472 sur blanc = 2.44:1 non conforme AA */
        font-size: 1.75rem;
        font-weight: 700;
        line-height: 1;
    }
    .ks-ville-stat__label {
        font-size: 0.8125rem;
        color: #2C3340; /* navy fort sur gris-clair #F4F4F2 = 14:1 OK AAA */
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
</style>
@endpush

@section('content')

@include('frontend::partials.page-banner', [
    'title' => $ville['nom'],
    'breadcrumbs' => [
        ['label' => 'Accueil', 'url' => route('index')],
        ['label' => 'Zones desservies', 'url' => route('zones')],
        ['label' => $ville['nom'], 'url' => null],
    ],
])

<div class="space-top space-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="title-area text-center">
                    <span class="sub-title text-theme">{{ $ville['region'] }}</span>
                    <h2 class="sec-title">{{ $ville['h1'] }}</h2>
                    <p class="sec-text">{{ $ville['intro_paragraph'] }}</p>
                </div>

                <div class="ks-ville-stats" aria-label="Statistiques de la ville">
                    <div class="ks-ville-stat">
                        <span class="ks-ville-stat__num">{{ number_format($ville['population'], 0, ',', ' ') }}</span>
                        <span class="ks-ville-stat__label">Population</span>
                    </div>
                    <div class="ks-ville-stat">
                        <span class="ks-ville-stat__num">{{ count($ville['arrondissements']) }}</span>
                        <span class="ks-ville-stat__label">Arrondissements desservis</span>
                    </div>
                    <div class="ks-ville-stat">
                        <span class="ks-ville-stat__num">6</span>
                        <span class="ks-ville-stat__label">Filiales Kalystrat actives</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row gy-30 mt-50">
            <div class="col-lg-6 col-md-6">
                <div class="ks-ville-card">
                    <h3 class="ks-ville-card__title"><x-frontend::icon name="map-pin"/>Arrondissements desservis</h3>
                    <ul class="ks-ville-list">
                        @foreach($ville['arrondissements'] as $arr)
                            <li>{{ $arr }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="ks-ville-card">
                    <h3 class="ks-ville-card__title"><x-frontend::icon name="building"/>Projets types à {{ $ville['nom'] }}</h3>
                    <ul class="ks-ville-list">
                        @foreach($ville['projets_types'] as $proj)
                            <li>{{ $proj }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="ks-ville-card">
                    <h3 class="ks-ville-card__title"><x-frontend::icon name="shield-check"/>Réglementation locale</h3>
                    <ul class="ks-ville-list">
                        @foreach($ville['reglementations'] as $reg)
                            <li>{{ $reg }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="ks-ville-card">
                    <h3 class="ks-ville-card__title"><x-frontend::icon name="star"/>Pourquoi choisir Kalystrat à {{ $ville['nom'] }}</h3>
                    <ul class="ks-ville-list">
                        @foreach($ville['pourquoi_kalystrat'] as $p)
                            <li>{{ $p }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-80">
            <div class="col-lg-9">
                <div class="title-area text-center">
                    <span class="sub-title text-theme">Six filiales sous une seule marque</span>
                    <h2 class="sec-title">Toutes nos expertises disponibles à {{ $ville['nom'] }}</h2>
                    <p class="sec-text">Du sol à la finition, les six filiales Kalystrat interviennent dans la {{ $ville['region'] }} sous une signature unique. Un seul contact, une seule responsabilité, six expertises spécialisées coordonnées.</p>
                </div>
                <div class="row gy-20 mt-30 justify-content-center">
                    <div class="col-md-6 col-lg-4 text-center">
                        <a href="{{ url('/filiales/fondations') }}" style="display: block; padding: 0.75rem; color: var(--ks-navy); text-decoration: none; border: 1px solid rgba(184,164,114,0.3); border-radius: 0.375rem;">Kalystrat Fondations →</a>
                    </div>
                    <div class="col-md-6 col-lg-4 text-center">
                        <a href="{{ url('/filiales/structure') }}" style="display: block; padding: 0.75rem; color: var(--ks-navy); text-decoration: none; border: 1px solid rgba(184,164,114,0.3); border-radius: 0.375rem;">Kalystrat Structure →</a>
                    </div>
                    <div class="col-md-6 col-lg-4 text-center">
                        <a href="{{ url('/filiales/toiture') }}" style="display: block; padding: 0.75rem; color: var(--ks-navy); text-decoration: none; border: 1px solid rgba(184,164,114,0.3); border-radius: 0.375rem;">Kalystrat Toiture →</a>
                    </div>
                    <div class="col-md-6 col-lg-4 text-center">
                        <a href="{{ url('/filiales/finition') }}" style="display: block; padding: 0.75rem; color: var(--ks-navy); text-decoration: none; border: 1px solid rgba(184,164,114,0.3); border-radius: 0.375rem;">Kalystrat Finition →</a>
                    </div>
                    <div class="col-md-6 col-lg-4 text-center">
                        <a href="{{ url('/filiales/immobilier') }}" style="display: block; padding: 0.75rem; color: var(--ks-navy); text-decoration: none; border: 1px solid rgba(184,164,114,0.3); border-radius: 0.375rem;">Kalystrat Immobilier →</a>
                    </div>
                    <div class="col-md-6 col-lg-4 text-center">
                        <a href="{{ url('/filiales/placement') }}" style="display: block; padding: 0.75rem; color: var(--ks-navy); text-decoration: none; border: 1px solid rgba(184,164,114,0.3); border-radius: 0.375rem;">Kalystrat Placement →</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-80">
            <a href="{{ route('contact') }}" class="btn style3" aria-label="Demander une soumission pour un projet à {{ $ville['nom'] }}">Demander une soumission à {{ $ville['nom'] }}&nbsp;<i class="ri-arrow-right-line" aria-hidden="true"></i></a>
        </div>
    </div>
</div>

@endsection
