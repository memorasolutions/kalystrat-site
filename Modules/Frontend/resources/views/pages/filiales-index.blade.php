@extends('frontend::layouts.intime')

@section('title', 'Nos six filiales spécialisées | Kalystrat')

@push('meta')
<meta name="description" content="Six filiales Kalystrat : Fondations, Structure, Toiture-Enveloppe, Finition Intérieure, Immobilier, Placement Construction. Chaîne complète de la construction au Québec.">
<link rel="canonical" href="{{ url('/filiales') }}">
<meta property="og:title" content="Six filiales Kalystrat — Construction à intégration verticale">
<meta property="og:description" content="Six métiers, une marque : Fondations, Structure, Toiture, Finition, Immobilier, Placement.">
<meta property="og:type" content="website">
@endpush

@push('schema')
<script type="application/ld+json">@php
$items = [];
$pos = 1;
foreach(\Modules\Frontend\Http\Controllers\FilialeController::FILIALES as $s => $f) {
    $items[] = ['@type' => 'ListItem', 'position' => $pos++, 'name' => $f['nom_court'], 'url' => url('/filiales/' . $s)];
}
echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'Filiales Kalystrat',
    'description' => 'Six filiales spécialisées sous le holding Gestion Kalystrat Inc.',
    'url' => url('/filiales'),
    'mainEntity' => ['@type' => 'ItemList', 'itemListElement' => $items],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
@endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Filiales', 'item' => 'https://kalystrat.ca/filiales'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<header class="ks-page-hero">
    <div class="ks-container">
        <ul class="ks-page-hero__breadcrumb">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>Filiales</li>
        </ul>
        <h1>Six filiales, une marque unifiée</h1>
        <p class="ks-page-hero__subtitle">De l'excavation aux finitions, du développement immobilier au placement de main-d'œuvre, chaque filiale détient une expertise pointue et travaille en synergie avec les autres divisions du groupe.</p>
    </div>
</header>

<section class="ks-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left">
            <span class="ks-eyebrow">Structure du groupe</span>
            <h2 class="ks-h2">Six métiers sous une seule signature</h2>
        </div>
        <p class="ks-lead">Gestion Kalystrat Inc. opère via six filiales spécialisées qui couvrent l'intégralité de la chaîne de valeur en construction. Chaque filiale est dirigée par un directeur qui relève directement de la présidence, ce qui garantit cohérence stratégique et exécution rigoureuse.</p>
    </div>
</section>

<section class="ks-section ks-section--alt">
    <div class="ks-container">
        <div class="ks-bento">
            @foreach($filiales as $slug => $f)
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Filiale 0{{ $loop->iteration }}</span>
                <h3 class="ks-card__title"><a href="{{ route('filiale', $slug) }}">{{ $f['nom_court'] }}</a></h3>
                <div class="ks-card__meta" style="color:var(--ks-gray-700);text-transform:none;letter-spacing:0;font-weight:500">{{ $f['specialite'] }}</div>
                <p class="ks-card__text">{{ $f['tagline'] }}</p>
                <div class="ks-card__cta">
                    <a href="{{ route('filiale', $slug) }}" class="ks-cta-secondary">En savoir plus</a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Six expertises, un chargé de projet unique</h2>
        <p>Discutez de votre projet avec un chargé de projet unique qui pilote la totalité des corps de métier en s'appuyant sur les six directions de filiales.</p>
        <a href="{{ route('contact') }}" class="ks-cta-primary">Obtenir une soumission</a>
    </div>
</section>

@endsection
