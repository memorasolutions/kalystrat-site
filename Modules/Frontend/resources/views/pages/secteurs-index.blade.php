@extends('frontend::layouts.intime')

@section('title', 'Secteurs et marchés desservis | Kalystrat')

@php
$secteurs = [
    'residentiel' => ['nom' => 'Résidentiel', 'desc' => 'Maisons unifamiliales, condos, multilogements, rénovations majeures et agrandissements.'],
    'commercial' => ['nom' => 'Commercial', 'desc' => 'Bureaux, centres commerciaux, restaurants, espaces de vente, immeubles à bureaux.'],
    'institutionnel' => ['nom' => 'Institutionnel', 'desc' => 'Écoles, universités, hôpitaux, garderies, centres communautaires, bâtiments publics.'],
    'industriel' => ['nom' => 'Industriel', 'desc' => 'Entrepôts, usines de production, ateliers, bâtiments logistiques, parcs industriels.'],
    'municipal' => ['nom' => 'Municipal', 'desc' => 'Infrastructures publiques, garages municipaux, casernes, bâtiments services aux citoyens.'],
];
@endphp

@push('meta')
<meta name="description" content="Secteurs desservis par Kalystrat : résidentiel, commercial, institutionnel, industriel, municipal. Construction adaptée à chaque marché vertical au Québec.">
<link rel="canonical" href="{{ url('/secteurs') }}">
@endpush

@push('schema')
<script type="application/ld+json">@php
$itemList = [];
$pos = 1;
foreach($secteurs as $slug => $s) {
    $itemList[] = ['@type' => 'ListItem', 'position' => $pos++, 'name' => $s['nom'], 'url' => url('/secteurs/' . $slug)];
}
echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'Secteurs desservis Kalystrat',
    'url' => url('/secteurs'),
    'mainEntity' => ['@type' => 'ItemList', 'itemListElement' => $itemList],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
@endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Secteurs', 'item' => 'https://kalystrat.ca/secteurs'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<x-frontend::page-hero
    photo="/intime/images/pages/projets-hero.webp"
    eyebrow="Verticaux d’expertise"
    title="Secteurs desservis"
    subtitle="Cinq marchés verticaux au Québec, mobilisant les six filiales selon les besoins du chantier&nbsp;: résidentiel, commercial, institutionnel, industriel et municipal."
>
    <x-slot:breadcrumb>
        <li><a href="{{ url('/') }}">Accueil</a></li>
        <li>Secteurs</li>
    </x-slot:breadcrumb>
</x-frontend::page-hero>

<section class="ks-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left">
            <span class="ks-eyebrow">Verticaux d’expertise</span>
            <h2 class="ks-h2">Cinq marchés, six filiales mobilisées</h2>
            <p class="ks-lead">Chaque secteur de la construction a ses propres exigences réglementaires, ses standards techniques et ses contraintes budgétaires. Kalystrat adapte sa méthode et ses équipes aux particularités de chacun.</p>
        </div>
    </div>
</section>

<section class="ks-section ks-section--alt">
    <div class="ks-container">
        <div class="ks-bento ks-bento--3col">
            @foreach($secteurs as $slug => $s)
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Secteur d’expertise</span>
                <h3 class="ks-card__title"><a href="{{ route('secteurs.show', $slug) }}">{{ $s['nom'] }}</a></h3>
                <p class="ks-card__text">{{ $s['desc'] }}</p>
                <div class="ks-card__cta"><a href="{{ route('secteurs.show', $slug) }}" class="ks-cta-secondary">Détails</a></div>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Votre projet n’entre dans aucune case&nbsp;?</h2>
        <p>Certains chantiers mixtes (résidentiel + commercial, institutionnel + industriel) demandent une approche sur mesure. Soumettez le contexte, nous évaluons.</p>
        <a href="{{ route('contact') }}" class="ks-cta-primary">Discutons-en</a>
    </div>
</section>

@endsection
