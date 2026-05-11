@extends('frontend::layouts.intime')

@php
$q = [
    'nom' => 'Plateau-Mont-Royal',
    'ville_parente' => 'Montréal',
    'ville_slug' => 'montreal',
    'classement' => 'Arrondissement emblématique de Montréal',
    'lat' => 45.5260,
    'lng' => -73.5810,
    'specialite_top' => 'Rénovation de triplex, conversions, finition intérieure urbaine',
    'photo' => '/intime/images/pages/zone-ville-hero.webp',
];
@endphp

@section('title', 'Rénovation de triplex au Plateau-Mont-Royal | Kalystrat')

@push('meta')
<meta name="description" content="Rénovation de triplex, plex et finition intérieure urbaine au Plateau-Mont-Royal par Kalystrat. Conversions résidentielles, mises aux normes Code 2026, encadrement de l'arrondissement.">
<link rel="canonical" href="{{ url('/zones-desservies/montreal/plateau-mont-royal') }}">
@endpush

@push('schema')
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    'name' => 'Gestion Kalystrat Inc. — Plateau-Mont-Royal',
    'url' => url('/zones-desservies/montreal/plateau-mont-royal'),
    'description' => 'Rénovation de triplex et plex au Plateau-Mont-Royal, conversions résidentielles, finition urbaine',
    'address' => ['@type' => 'PostalAddress', 'addressLocality' => 'Montréal', 'addressRegion' => 'QC', 'addressCountry' => 'CA', 'postalCode' => 'H2J'],
    'geo' => ['@type' => 'GeoCoordinates', 'latitude' => $q['lat'], 'longitude' => $q['lng']],
    'areaServed' => ['@type' => 'Place', 'name' => 'Plateau-Mont-Royal', 'containedInPlace' => ['@type' => 'City', 'name' => 'Montréal']],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Zones desservies', 'item' => 'https://kalystrat.ca/zones-desservies'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Montréal', 'item' => 'https://kalystrat.ca/zones-desservies/montreal'],
        ['@type' => 'ListItem', 'position' => 4, 'name' => 'Plateau-Mont-Royal', 'item' => url('/zones-desservies/montreal/plateau-mont-royal')],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<x-frontend::page-hero
    photo="{{ $q['photo'] }}"
    eyebrow="{{ $q['classement'] }}"
    title="Rénovation de triplex au Plateau-Mont-Royal"
    subtitle="{{ $q['specialite_top'] }}. Encadrement de l'arrondissement, contraintes structurelles des plex centenaires, conformité Code de construction du Québec 2026."
>
    <x-slot:breadcrumb>
        <li><a href="{{ url('/') }}">Accueil</a></li>
        <li><a href="{{ route('zones.index') }}">Zones desservies</a></li>
        <li><a href="{{ route('zones.ville', 'montreal') }}">Montréal</a></li>
        <li>Plateau-Mont-Royal</li>
    </x-slot:breadcrumb>
</x-frontend::page-hero>

<section class="ks-section">
    <div class="ks-container" style="max-width:880px">
        <div class="ks-section__heading ks-section__heading--left">
            <span class="ks-eyebrow">Plex centenaires</span>
            <h2 class="ks-h2">Rénover sans dénaturer&nbsp;: l'art du Plateau</h2>
            <p class="ks-lead">Le Plateau-Mont-Royal compte un parc résidentiel majoritairement bâti entre 1900 et 1930, dominé par les duplex et triplex à façade de brique avec escaliers extérieurs en colimaçon. La rénovation y demande une coordination fine entre structure d'époque, mises aux normes contemporaines et préservation du caractère architectural protégé par l'arrondissement.</p>
        </div>

        <h3 class="ks-h3">Encadrement réglementaire</h3>
        <p>L'arrondissement du Plateau-Mont-Royal applique des règlements d'urbanisme stricts sur les façades visibles depuis la rue, les escaliers extérieurs, les ouvertures et les matériaux. Toute intervention visible nécessite un permis avec validation par le <strong>comité consultatif d'urbanisme local</strong>. Les délais d'approbation oscillent entre 45 et 90 jours selon la nature de l'intervention. La conversion d'un duplex ou triplex en condo divis demande un changement d'usage formel et l'avis du conseil d'arrondissement.</p>

        <h3 class="ks-h3">Spécialités Kalystrat dans le secteur</h3>
        <ul>
            <li><strong>Rénovation structurelle plex</strong>&nbsp;: renforcement des planchers, mises aux normes parasismiques, isolation acoustique entre étages.</li>
            <li><strong>Façades en brique d'époque</strong>&nbsp;: rejointoiement, remplacement sélectif de briques rouges, ravalement.</li>
            <li><strong>Mises aux normes énergétiques</strong>&nbsp;: isolation R-24 murs et R-49 toiture sans dénaturer le profil extérieur, ventilation HRV.</li>
            <li><strong>Conversions résidentielles</strong>&nbsp;: triplex en condos, ajout d'unités secondaires, ouvertures d'espaces intérieurs.</li>
        </ul>

        <h3 class="ks-h3">Saisonnalité et logistique</h3>
        <p>La densité urbaine du Plateau impose des contraintes logistiques précises&nbsp;: permis d'occupation de la voie publique, gestion du stationnement résidentiel (vignettes), nuisances sonores encadrées par l'arrondissement, accès via ruelles. Les chantiers majeurs sont généralement planifiés du printemps à l'automne, avec interruptions hivernales pour les façades.</p>
    </div>
</section>

<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Projet de triplex ou de conversion au Plateau&nbsp;?</h2>
        <p>Demandez une évaluation. Notre équipe coordonne l'expertise structurelle, les permis et le calendrier en respectant les particularités de l'arrondissement.</p>
        <a href="{{ route('contact') }}" class="ks-cta-primary">Demander une évaluation</a>
    </div>
</section>

@endsection
