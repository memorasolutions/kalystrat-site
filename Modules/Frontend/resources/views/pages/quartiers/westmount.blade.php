@extends('frontend::layouts.intime')

@php
$q = [
    'nom' => 'Westmount',
    'ville_parente' => 'Montréal',
    'ville_slug' => 'montreal',
    'classement' => 'Cité indépendante de la région métropolitaine',
    'lat' => 45.4830,
    'lng' => -73.6010,
    'specialite_top' => 'Construction et rénovation résidentielle haut de gamme',
    'photo' => '/intime/images/pages/zone-ville-hero.webp',
];
@endphp

@section('title', 'Construction et rénovation à Westmount | Kalystrat')

@push('meta')
<meta name="description" content="Construction et rénovation résidentielle haut de gamme à Westmount par Kalystrat. Finition intérieure haut de gamme, ébénisterie sur mesure, conformité aux exigences architecturales de la Cité.">
<link rel="canonical" href="{{ url('/zones-desservies/montreal/westmount') }}">
@endpush

@push('schema')
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    'name' => 'Gestion Kalystrat Inc. — Westmount',
    'url' => url('/zones-desservies/montreal/westmount'),
    'description' => 'Construction et rénovation résidentielle haut de gamme à Westmount, finition haut de gamme, ébénisterie sur mesure',
    'address' => ['@type' => 'PostalAddress', 'addressLocality' => 'Westmount', 'addressRegion' => 'QC', 'addressCountry' => 'CA', 'postalCode' => 'H3Y'],
    'geo' => ['@type' => 'GeoCoordinates', 'latitude' => $q['lat'], 'longitude' => $q['lng']],
    'areaServed' => ['@type' => 'City', 'name' => 'Westmount'],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Zones desservies', 'item' => 'https://kalystrat.ca/zones-desservies'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Montréal', 'item' => 'https://kalystrat.ca/zones-desservies/montreal'],
        ['@type' => 'ListItem', 'position' => 4, 'name' => 'Westmount', 'item' => url('/zones-desservies/montreal/westmount')],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<x-frontend::page-hero
    photo="{{ $q['photo'] }}"
    eyebrow="{{ $q['classement'] }}"
    title="Construction et rénovation à Westmount"
    subtitle="{{ $q['specialite_top'] }}. Encadrement architectural strict de la Cité de Westmount, finitions haut de gamme, ébénisterie sur mesure."
>
    <x-slot:breadcrumb>
        <li><a href="{{ url('/') }}">Accueil</a></li>
        <li><a href="{{ route('zones.index') }}">Zones desservies</a></li>
        <li><a href="{{ route('zones.ville', 'montreal') }}">Montréal</a></li>
        <li>Westmount</li>
    </x-slot:breadcrumb>
</x-frontend::page-hero>

<section class="ks-section">
    <div class="ks-container" style="max-width:880px">
        <div class="ks-section__heading ks-section__heading--left">
            <span class="ks-eyebrow">Cité de Westmount</span>
            <h2 class="ks-h2">Bâtir et rénover dans la cité résidentielle la plus exigeante de Montréal</h2>
            <p class="ks-lead">Westmount est une cité indépendante enclavée dans l'île de Montréal, reconnue pour son patrimoine architectural anglo-québécois (maisons victoriennes, édouardiennes, Tudor Revival) et ses standards de finition résidentielle parmi les plus élevés de la région métropolitaine. Construire ou rénover à Westmount demande une coordination minutieuse avec les services municipaux et un savoir-faire spécifique en finition haut de gamme.</p>
        </div>

        <h3 class="ks-h3">Encadrement réglementaire</h3>
        <p>La Cité de Westmount applique son propre règlement de zonage et d'urbanisme, distinct du règlement montréalais. Toute intervention sur une façade, une toiture ou un élément visible depuis la rue passe par le <strong>Comité consultatif d'urbanisme de Westmount</strong>. Les délais d'approbation peuvent atteindre 90 à 120 jours pour les projets significatifs. Les exigences portent sur les matériaux, l'échelle, la hauteur, les ouvertures, l'aménagement paysager et la conservation des arbres matures. Les démolitions sont sévèrement restreintes.</p>

        <h3 class="ks-h3">Spécialités Kalystrat dans le secteur</h3>
        <ul>
            <li><strong>Construction résidentielle haut de gamme</strong>&nbsp;: nouvelles constructions sur terrains rares, agrandissements respectueux du voisinage architectural.</li>
            <li><strong>Rénovation patrimoniale résidentielle</strong>&nbsp;: restauration de boiseries d'époque, conservation de planchers en bois franc d'origine, fenêtres sur mesure.</li>
            <li><strong>Finition intérieure haut de gamme</strong>&nbsp;: ébénisterie sur mesure, comptoirs en pierre naturelle, planchers en bois exotique, plafonniers de plâtre ornés.</li>
            <li><strong>Mises aux normes énergétiques discrètes</strong>&nbsp;: isolation R-24 / R-49 et ventilation HRV intégrées sans altérer le caractère architectural protégé.</li>
        </ul>

        <h3 class="ks-h3">Saisonnalité et logistique</h3>
        <p>Les rues bordées d'arbres matures, la proximité du parc du Mont-Royal et les terrains en pente imposent des précautions logistiques&nbsp;: protection des espèces végétales, accès par ruelles privées dans certains secteurs, gestion sonore stricte (horaires de chantier limités). Les chantiers de finition s'étendent toute l'année, les interventions extérieures sont privilégiées entre avril et octobre.</p>
    </div>
</section>

<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Projet de prestige à Westmount&nbsp;?</h2>
        <p>Demandez une évaluation discrète et détaillée. Notre équipe coordonne l'expertise architecturale, le volet patrimonial et la finition haut de gamme pour les clients de Westmount.</p>
        <a href="{{ route('contact') }}" class="ks-cta-primary">Demander une évaluation</a>
    </div>
</section>

@endsection
