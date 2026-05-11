@extends('frontend::layouts.intime')

@php
$q = [
    'nom' => 'Vieux-Québec',
    'ville_parente' => 'Québec',
    'ville_slug' => 'quebec',
    'classement' => 'Site du patrimoine mondial de l\'UNESCO depuis 1985',
    'lat' => 46.8129,
    'lng' => -71.2080,
    'specialite_top' => 'Rénovation patrimoniale, finition intérieure haut de gamme',
    'photo' => '/intime/images/pages/zone-ville-hero.webp',
];
@endphp

@section('title', 'Construction et rénovation au Vieux-Québec | Kalystrat')

@push('meta')
<meta name="description" content="Rénovation patrimoniale et finition intérieure haut de gamme au Vieux-Québec par Kalystrat. Site UNESCO depuis 1985, exigences strictes du comité consultatif d'urbanisme.">
<link rel="canonical" href="{{ url('/zones-desservies/quebec/vieux-quebec') }}">
<meta property="og:title" content="Kalystrat au Vieux-Québec — Rénovation patrimoniale">
@endpush

@push('schema')
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    'name' => 'Gestion Kalystrat Inc. — Vieux-Québec',
    'url' => url('/zones-desservies/quebec/vieux-quebec'),
    'description' => 'Rénovation patrimoniale et finition intérieure haut de gamme au Vieux-Québec, site UNESCO',
    'address' => ['@type' => 'PostalAddress', 'addressLocality' => 'Québec', 'addressRegion' => 'QC', 'addressCountry' => 'CA', 'postalCode' => 'G1R'],
    'geo' => ['@type' => 'GeoCoordinates', 'latitude' => $q['lat'], 'longitude' => $q['lng']],
    'areaServed' => ['@type' => 'Place', 'name' => 'Vieux-Québec', 'containedInPlace' => ['@type' => 'City', 'name' => 'Québec']],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Zones desservies', 'item' => 'https://kalystrat.ca/zones-desservies'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Québec', 'item' => 'https://kalystrat.ca/zones-desservies/quebec'],
        ['@type' => 'ListItem', 'position' => 4, 'name' => 'Vieux-Québec', 'item' => url('/zones-desservies/quebec/vieux-quebec')],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<x-frontend::page-hero
    photo="{{ $q['photo'] }}"
    eyebrow="{{ $q['classement'] }}"
    title="Construction et rénovation au Vieux-Québec"
    subtitle="{{ $q['specialite_top'] }}. Encadrement strict du comité consultatif d'urbanisme et du règlement de la Ville de Québec sur l'arrondissement historique."
>
    <x-slot:breadcrumb>
        <li><a href="{{ url('/') }}">Accueil</a></li>
        <li><a href="{{ route('zones.index') }}">Zones desservies</a></li>
        <li><a href="{{ route('zones.ville', 'quebec') }}">Québec</a></li>
        <li>Vieux-Québec</li>
    </x-slot:breadcrumb>
</x-frontend::page-hero>

<section class="ks-section">
    <div class="ks-container" style="max-width:880px">
        <div class="ks-section__heading ks-section__heading--left">
            <span class="ks-eyebrow">Quartier patrimonial</span>
            <h2 class="ks-h2">Bâtir dans un site UNESCO&nbsp;: les règles à connaître</h2>
            <p class="ks-lead">Le Vieux-Québec — Haute-Ville, Basse-Ville et fortifications — est inscrit au patrimoine mondial de l'UNESCO depuis 1985. Toute intervention en façade, en toiture ou sur les éléments visibles depuis la rue est soumise à des règles particulières. Kalystrat coordonne les démarches techniques et patrimoniales pour les propriétaires de bâtiments protégés.</p>
        </div>

        <h3 class="ks-h3">Encadrement réglementaire</h3>
        <p>Toute demande de permis pour un projet dans le Vieux-Québec passe obligatoirement par le <strong>comité consultatif d'urbanisme (CCU)</strong> de la Ville de Québec et, selon le cas, par le <strong>ministère de la Culture et des Communications du Québec</strong> au titre de la Loi sur le patrimoine culturel. Les délais d'approbation s'étendent typiquement de 60 à 120 jours pour les interventions importantes. Les matériaux, dimensions des ouvertures, couleurs et profilés doivent respecter le caractère historique. Les démolitions sont strictement contrôlées.</p>

        <h3 class="ks-h3">Spécialités Kalystrat dans le secteur</h3>
        <ul>
            <li><strong>Rénovation patrimoniale</strong>&nbsp;: restauration de fenêtres, conservation de façades en pierre de Cap-Tourmente, rejointoiement à la chaux.</li>
            <li><strong>Toiture en tôle à baguette</strong>&nbsp;: pose et restauration des toitures métalliques caractéristiques.</li>
            <li><strong>Finition intérieure haut de gamme</strong>&nbsp;: ébénisterie sur mesure, planchers à larges lattes, plâtre traditionnel.</li>
            <li><strong>Mises aux normes énergétiques</strong>&nbsp;: solutions discrètes pour respecter le Code 2026 sans altérer le caractère du bâtiment.</li>
        </ul>

        <h3 class="ks-h3">Saisonnalité et logistique</h3>
        <p>Les rues étroites et l'accessibilité limitée du Vieux-Québec imposent une logistique fine pour les chantiers&nbsp;: permis d'occupation temporaire, gestion des flux touristiques (mai à octobre), restrictions de stationnement, livraisons matinales. Les chantiers structurels sont généralement planifiés d'octobre à avril pour minimiser l'impact sur le secteur commercial et touristique.</p>
    </div>
</section>

<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Projet patrimonial au Vieux-Québec&nbsp;?</h2>
        <p>Demandez une évaluation préliminaire. Notre équipe coordonne le volet patrimonial avec le CCU et le ministère, et propose un calendrier compatible avec la saisonnalité du secteur.</p>
        <a href="{{ route('contact') }}" class="ks-cta-primary">Demander une évaluation</a>
    </div>
</section>

@endsection
