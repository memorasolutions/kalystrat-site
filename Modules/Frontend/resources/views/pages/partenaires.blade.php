@extends('frontend::layouts.intime')

@section('title', 'Partenaires et écosystème | Kalystrat')

@push('meta')
<meta name="description" content="Partenaires Kalystrat : architectes, designers, ingénieurs, promoteurs immobiliers, courtiers, sous-traitants spécialisés. Écosystème collaboratif au Québec.">
<link rel="canonical" href="{{ url('/partenaires') }}">
@endpush

@push('schema')
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'AboutPage',
    'name' => 'Partenaires Kalystrat',
    'url' => url('/partenaires'),
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Partenaires', 'item' => 'https://kalystrat.ca/partenaires'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<header class="ks-page-hero ks-page-hero--photo" style="--ks-hero-photo: url('/intime/images/pages/partenaires-hero.webp')">
    <div class="ks-page-hero__overlay" aria-hidden="true"></div>
    <div class="ks-container ks-page-hero__inner">
        <ul class="ks-page-hero__breadcrumb">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>Partenaires</li>
        </ul>
        <span class="ks-eyebrow ks-page-hero__eyebrow">Écosystème de la construction</span>
        <h1>Partenaires et écosystème</h1>
        <p class="ks-page-hero__subtitle">L’intégration verticale Kalystrat n’élimine pas la collaboration&nbsp;: elle la rend plus efficace. Notre réseau d’architectes, designers, ingénieurs et promoteurs apporte une expertise spécifique à chaque projet.</p>
    </div>
</header>

<section class="ks-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left">
            <span class="ks-eyebrow">Écosystème de la construction</span>
            <h2 class="ks-h2">Construire ensemble, mieux et plus vite</h2>
            <p class="ks-lead">Six familles de partenaires gravitent autour des six filiales Kalystrat. Chaque profil apporte une compétence pointue qui renforce notre capacité à livrer des projets complexes, conformes et performants.</p>
        </div>
    </div>
</section>

@php
$types = [
    ['t' => 'Architectes et designers', 'd' => "Bureaux d’architecture résidentiels et commerciaux, designers d’intérieur, urbanistes. Nous accompagnons leurs concepts de la planche à dessin jusqu’à la livraison."],
    ['t' => 'Ingénieurs', 'd' => "Génie civil, structural, mécanique, électrique, environnemental. Nos chargés de projet coordonnent les disciplines pour livrer un bâtiment conforme et performant."],
    ['t' => 'Promoteurs immobiliers', 'd' => "Développement résidentiel, commercial et mixte. Kalystrat exécute les projets de promoteurs externes en plus des projets internes via Kalystrat Immobilier."],
    ['t' => 'Courtiers et investisseurs', 'd' => "Courtiers immobiliers, fonds d’investissement immobilier, investisseurs privés. Conseil et exécution sur acquisitions, rénovations et reventes."],
    ['t' => 'Fournisseurs spécialisés', 'd' => "Béton, charpente, menuiserie, fenêtres, mécanique du bâtiment. Relations long terme garantissant qualité et délais."],
    ['t' => 'Sous-traitants ciblés', 'd' => "Pour les services hors expertise (climatisation industrielle, levage spécialisé), nous travaillons avec des sous-traitants sélectionnés sur leur fiabilité."],
];
@endphp

<section class="ks-section ks-section--alt">
    <div class="ks-container">
        <div class="ks-bento ks-bento--2col">
            @foreach($types as $i => $type)
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Catégorie de partenaire</span>
                <h3 class="ks-card__title">{{ $type['t'] }}</h3>
                <p class="ks-card__text">{{ $type['d'] }}</p>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Devenir partenaire Kalystrat&nbsp;?</h2>
        <p>Présentez votre cabinet, votre bureau ou votre entreprise. Nous évaluons les complémentarités avec nos six filiales.</p>
        <a href="{{ route('contact') }}" class="ks-cta-primary">Discutons-en</a>
    </div>
</section>

@endsection
