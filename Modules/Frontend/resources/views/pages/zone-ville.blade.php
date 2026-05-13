@extends('frontend::layouts.intime')

@php
$zones = [
    'quebec' => ['nom' => 'Québec', 'lat' => 46.8139, 'lng' => -71.2080, 'pop' => '550 000+', 'specialites' => 'Résidentiel haut de gamme, multilogements, commercial bureaux, institutionnel (universités, hôpitaux)'],
    'levis' => ['nom' => 'Lévis', 'lat' => 46.7382, 'lng' => -71.2465, 'pop' => '150 000+', 'specialites' => 'Résidentiel unifamilial, condos rive-sud, commerce de proximité'],
    'sainte-foy' => ['nom' => 'Sainte-Foy', 'lat' => 46.7826, 'lng' => -71.2978, 'pop' => 'Quartier Québec', 'specialites' => 'Finition haut de gamme, rénovation patrimoniale, commercial Université Laval'],
    'beauport' => ['nom' => 'Beauport', 'lat' => 46.8810, 'lng' => -71.1894, 'pop' => 'Arrondissement Québec', 'specialites' => 'Constructions neuves, rénovations résidentielles, lotissements'],
    'sillery' => ['nom' => 'Sillery', 'lat' => 46.7700, 'lng' => -71.2700, 'pop' => 'Quartier Québec', 'specialites' => 'Rénovations patrimoniales, constructions de prestige, agrandissements'],
];
abort_unless(isset($zones[$ville]), 404);
$z = $zones[$ville];
@endphp

@section('title', 'Construction à ' . $z['nom'] . ' | Kalystrat')

@push('meta')
<meta name="description" content="Services de construction à {{ $z['nom'] }} par Kalystrat. {{ Str::limit($z['specialites'], 110) }}. Groupe québécois à intégration verticale.">
<link rel="canonical" href="{{ url('/zones-desservies/' . $ville) }}">
<meta property="og:title" content="Construction Kalystrat à {{ $z['nom'] }}">
@endpush

@push('schema')
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    'name' => 'Gestion Kalystrat Inc. — ' . $z['nom'],
    'url' => url('/zones-desservies/' . $ville),
    'description' => 'Services de construction Kalystrat à ' . $z['nom'] . '. ' . $z['specialites'],
    'address' => ['@type' => 'PostalAddress', 'addressLocality' => $z['nom'], 'addressRegion' => 'QC', 'addressCountry' => 'CA'],
    'geo' => ['@type' => 'GeoCoordinates', 'latitude' => $z['lat'], 'longitude' => $z['lng']],
    'areaServed' => ['@type' => 'City', 'name' => $z['nom']],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Zones desservies', 'item' => 'https://kalystrat.ca/zones-desservies'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => $z['nom'], 'item' => url('/zones-desservies/' . $ville)],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>

{{-- T138 — Service Schema × 6 filiales par ville (SEO local hyperlocal 2026) --}}
@php
$servicesVille = [
    ['name' => 'Fondations à ' . $z['nom'], 'slug' => 'fondations'],
    ['name' => 'Charpente structurale à ' . $z['nom'], 'slug' => 'structure'],
    ['name' => 'Toiture et enveloppe à ' . $z['nom'], 'slug' => 'toiture-enveloppe'],
    ['name' => 'Finition intérieure à ' . $z['nom'], 'slug' => 'finition-interieure'],
    ['name' => 'Développement immobilier à ' . $z['nom'], 'slug' => 'immobilier'],
    ['name' => 'Placement main-d\'œuvre à ' . $z['nom'], 'slug' => 'placement-construction'],
];
@endphp
@foreach($servicesVille as $sv)
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'name' => $sv['name'],
    'serviceType' => $sv['name'],
    'provider' => [
        '@type' => 'GeneralContractor',
        'name' => 'Gestion Kalystrat Inc.',
        'url' => url('/'),
    ],
    'areaServed' => [
        '@type' => 'City',
        'name' => $z['nom'],
        'address' => ['@type' => 'PostalAddress', 'addressLocality' => $z['nom'], 'addressRegion' => 'QC', 'addressCountry' => 'CA'],
    ],
    'url' => url('/filiales/' . $sv['slug']),
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endforeach

{{-- T138 — FAQPage locale (AEO hyperlocal 2026) --}}
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        [
            '@type' => 'Question',
            'name' => 'Kalystrat intervient-il sur les chantiers à ' . $z['nom'] . ' ?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => "Oui. Gestion Kalystrat Inc. dessert " . $z['nom'] . " via ses six filiales spécialisées (Fondations, Structure, Toiture, Finition, Immobilier, Placement Construction). Spécialités principales sur ce marché : " . $z['specialites'] . ".",
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'Quel est le délai pour une soumission à ' . $z['nom'] . ' ?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => "Pour un projet résidentiel à " . $z['nom'] . ", la soumission détaillée est livrée sous 5 à 10 jours ouvrables après la visite et la prise de mesures. Les projets commerciaux ou institutionnels avec modélisation BIM peuvent demander un délai plus long selon la complexité.",
            ],
        ],
        [
            '@type' => 'Question',
            'name' => "Quelles régulations municipales s'appliquent à " . $z['nom'] . " ?",
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => "Les chantiers à " . $z['nom'] . " respectent le Code de construction du Québec 2026, le règlement municipal local et, le cas échéant, les avis du comité consultatif d'urbanisme pour les secteurs patrimoniaux ou densifiés. Détails techniques disponibles dans la section ci-dessous.",
            ],
        ],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>

{{-- T138 — Speakable Schema (AEO LLM-friendly) --}}
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'WebPage',
    'name' => 'Construction à ' . $z['nom'] . ' | Kalystrat',
    'url' => url('/zones-desservies/' . $ville),
    'speakable' => [
        '@type' => 'SpeakableSpecification',
        'cssSelector' => ['h1', '.ks-page-hero__subtitle', '.ks-h2', '.ks-lead'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<x-frontend::page-hero
    photo="/intime/images/pages/zone-ville-hero.webp"
    eyebrow="{{ $z['pop'] }} habitants"
    title="Construction à {{ $z['nom'] }}"
    subtitle="{{ $z['specialites'] }}."
>
    <x-slot:breadcrumb>
        <li><a href="{{ url('/') }}">Accueil</a></li>
        <li><a href="{{ route('zones.index') }}">Zones desservies</a></li>
        <li>{{ $z['nom'] }}</li>
    </x-slot:breadcrumb>
</x-frontend::page-hero>

<section class="ks-section">
    <div class="ks-container">
        <div class="ks-bento ks-bento--2col" style="align-items:start">
            <article>
                <span class="ks-eyebrow">Présence locale</span>
                <h2 class="ks-h2" style="font-size:clamp(1.75rem, 3vw, 2.5rem)">Kalystrat à {{ $z['nom'] }}</h2>
                <p class="ks-lead">Nos six filiales spécialisées interviennent sur les chantiers de la région de {{ $z['nom'] }}, couvrant tous les types de projets&nbsp;: {{ $z['specialites'] }}.</p>
                <p class="ks-lead">Que vous soyez un particulier qui souhaite rénover, un promoteur immobilier, un gestionnaire commercial ou une organisation publique, notre équipe locale connaît les particularités du marché et de la réglementation municipale.</p>
            </article>

            <aside style="display:flex;flex-direction:column;gap:20px;position:sticky;top:100px">
                <article class="ks-card ks-card--accent-gold">
                    <span class="ks-eyebrow">Filiales actives</span>
                    <h3 class="ks-card__title" style="font-size:1.25rem">Six métiers mobilisés</h3>
                    <ul style="list-style:none;padding:0;margin:1rem 0 0">
                        @foreach(\Modules\Frontend\Http\Controllers\FilialeController::FILIALES as $slug => $f)
                        <li style="padding:10px 0;border-bottom:1px solid var(--ks-gray-300);font-weight:500"><a href="{{ route('filiale', $slug) }}" style="color:var(--ks-navy-900);text-decoration:none">{{ $f['nom_court'] }}</a></li>
                        @endforeach
                    </ul>
                </article>

                <article class="ks-card ks-card--dark">
                    <span class="ks-eyebrow">Soumission</span>
                    <h3 class="ks-card__title" style="font-size:1.25rem">Projet à {{ $z['nom'] }}&nbsp;?</h3>
                    <p class="ks-card__text">Visite, prise de mesures et soumission détaillée sous 5 à 10 jours ouvrables.</p>
                    <div class="ks-card__cta"><a href="{{ route('contact') }}" class="ks-cta-secondary" style="color:var(--ks-white);border-color:var(--ks-gold-500)">Nous contacter</a></div>
                </article>
            </aside>
        </div>
    </div>
</section>

@php $zoneContentPath = 'frontend::partials.zone-content.' . $ville; @endphp
@if(view()->exists($zoneContentPath))
<section class="ks-section ks-section--alt">
    <div class="ks-container" style="max-width:880px">
        @include($zoneContentPath)
    </div>
</section>
@endif

<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Un projet à {{ $z['nom'] }}&nbsp;?</h2>
        <p>Évaluez votre dossier avec un responsable familier du contexte municipal, des servitudes locales et des permis de la région.</p>
        <a href="{{ route('contact') }}" class="ks-cta-primary">Obtenir une soumission</a>
    </div>
</section>

@endsection
