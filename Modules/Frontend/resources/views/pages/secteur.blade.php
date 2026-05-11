@extends('frontend::layouts.intime')

@php
$secteurs = [
    'residentiel' => [
        'nom' => 'Résidentiel',
        'tagline' => 'Maisons, condos, multilogements, rénovations',
        'desc' => "Le secteur résidentiel représente le cœur historique de Kalystrat. De la maison unifamiliale custom au projet de condominiums multilogements, nous accompagnons promoteurs, particuliers et investisseurs immobiliers.",
        'projets' => ['Maisons unifamiliales custom', 'Multilogements 4 à 50 unités', 'Condos prestige', 'Rénovations majeures', 'Agrandissements et extensions', 'Garages et abris d’auto'],
    ],
    'commercial' => [
        'nom' => 'Commercial',
        'tagline' => 'Bureaux, commerces, restaurants, centres commerciaux',
        'desc' => "Pour les espaces commerciaux, Kalystrat allie respect des délais (chaque jour de retard coûte) et qualité d’exécution irréprochable. Nous gérons les enjeux opérationnels (chantier en bâtiment occupé, livraisons fractionnées) avec rigueur.",
        'projets' => ['Immeubles à bureaux', 'Espaces de vente au détail', 'Centres commerciaux', 'Restaurants et hôtellerie', 'Aménagements d’espaces locatifs', 'Rénovations commerciales'],
    ],
    'institutionnel' => [
        'nom' => 'Institutionnel',
        'tagline' => 'Écoles, hôpitaux, garderies, bâtiments publics',
        'desc' => "Le secteur institutionnel exige conformité réglementaire stricte, normes de sécurité élevées et processus d’appel d’offres maîtrisés. Notre expertise des contrats publics garantit transparence et respect des cahiers de charges.",
        'projets' => ['Écoles primaires et secondaires', 'Pavillons universitaires', 'Cliniques et hôpitaux', 'Garderies (CPE)', 'Centres communautaires', 'Bibliothèques publiques'],
    ],
    'industriel' => [
        'nom' => 'Industriel',
        'tagline' => 'Entrepôts, usines, ateliers, parcs logistiques',
        'desc' => "Construction industrielle&nbsp;: grandes portées, hauteurs élevées, charges importantes, contraintes opérationnelles spécifiques. Kalystrat maîtrise les structures préfabriquées, les enveloppes étanches et les systèmes de levage.",
        'projets' => ['Entrepôts logistiques', 'Usines de transformation', 'Ateliers manufacturiers', 'Centres de distribution', 'Bâtiments agroalimentaires', 'Hangars et stockages'],
    ],
    'municipal' => [
        'nom' => 'Municipal',
        'tagline' => 'Infrastructures publiques, garages municipaux, casernes',
        'desc' => "Les infrastructures municipales servent les citoyens 24/7. Kalystrat construit avec des standards de durabilité élevés, en tenant compte des contraintes budgétaires des municipalités et des cycles d’entretien longs.",
        'projets' => ['Garages municipaux', 'Casernes de pompiers', 'Centres de services aux citoyens', 'Bâtiments d’usine de filtration', 'Aréna et complexes sportifs', 'Bâtiments des travaux publics'],
    ],
];
abort_unless(isset($secteurs[$slug]), 404);
$s = $secteurs[$slug];
@endphp

@section('title', $s['nom'] . ' — Construction au Québec | Kalystrat')

@push('meta')
<meta name="description" content="Kalystrat construction {{ Str::lower($s['nom']) }} au Québec. {{ $s['tagline'] }}. Six filiales spécialisées au service de votre projet.">
<link rel="canonical" href="{{ url('/secteurs/' . $slug) }}">
@endpush

@push('schema')
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'serviceType' => 'Construction ' . strtolower($s['nom']),
    'name' => 'Construction ' . $s['nom'] . ' Kalystrat',
    'description' => str_replace('&nbsp;', ' ', $s['desc']),
    'provider' => ['@type' => 'GeneralContractor', 'name' => 'Gestion Kalystrat Inc.', 'url' => 'https://kalystrat.ca'],
    'areaServed' => ['@type' => 'AdministrativeArea', 'name' => 'Québec, Canada'],
    'speakable' => [
        '@type' => 'SpeakableSpecification',
        'cssSelector' => ['h1', '.ks-page-hero__subtitle', '.ks-h2', '.ks-card__text'],
    ],
    'inLanguage' => 'fr-CA',
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Secteurs', 'item' => 'https://kalystrat.ca/secteurs'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => $s['nom'], 'item' => url('/secteurs/' . $slug)],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<x-frontend::page-hero
    photo="/intime/images/secteurs/{{ $slug }}-hero.webp"
    eyebrow="{{ $s['tagline'] }}"
    title="Construction {{ Str::lower($s['nom']) }}"
    subtitle="{!! $s['desc'] !!}"
>
    <x-slot:breadcrumb>
        <li><a href="{{ url('/') }}">Accueil</a></li>
        <li><a href="{{ route('secteurs.index') }}">Secteurs</a></li>
        <li>{{ $s['nom'] }}</li>
    </x-slot:breadcrumb>
</x-frontend::page-hero>

@php $secteurContentPath = 'frontend::partials.secteur-content.' . $slug; @endphp
@if(view()->exists($secteurContentPath))
<section class="ks-section ks-page-section">
    <div class="ks-container" style="max-width:880px">
        <div class="ks-page-section__intro ks-fade-in">
            <span class="ks-page-section__num" aria-hidden="true">01</span>
            <div class="ks-page-section__heading">
                <span class="ks-eyebrow">Notre approche</span>
                <h2 class="ks-h2">Spécificités du secteur {{ Str::lower($s['nom']) }}</h2>
            </div>
        </div>
        @include($secteurContentPath)
    </div>
</section>
@endif

<section class="ks-section ks-section--alt ks-page-section">
    <div class="ks-container">
        <div class="ks-page-section__intro ks-fade-in">
            <span class="ks-page-section__num" aria-hidden="true">02</span>
            <div class="ks-page-section__heading">
                <span class="ks-eyebrow">Types de projets</span>
                <h2 class="ks-h2">Ce que nous construisons</h2>
                <p class="ks-lead">Six familles de projets que nos six filiales orchestrent dans le secteur {{ Str::lower($s['nom']) }}.</p>
            </div>
        </div>
        <div class="ks-bento ks-bento--3col">
            @foreach($s['projets'] as $i => $p)
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Type de projet</span>
                <h3 class="ks-card__title">{{ $p }}</h3>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Un projet {{ Str::lower($s['nom']) }}&nbsp;?</h2>
        <p>Discutez avec un chargé de projet pour valider la faisabilité, le calendrier et les permis municipaux requis.</p>
        <a href="{{ route('contact') }}" class="ks-cta-primary">Obtenir une soumission</a>
    </div>
</section>

@endsection
