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

<section class="page-title" style="background-image:url(/intime/images/background/2.jpg)">
    <div class="auto-container">
        <h1>Secteurs desservis</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>Secteurs</li>
        </ul>
    </div>
</section>

<section class="about-section-two">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 content-column">
                <div class="sec-title">
                    <span class="sub-title">Verticaux d’expertise</span>
                    <h2>Cinq marchés, six filiales mobilisées</h2>
                </div>
                <div class="text">
                    <p>Chaque secteur de la construction a ses propres exigences réglementaires, ses standards techniques et ses contraintes budgétaires. Kalystrat adapte sa méthode et ses équipes aux particularités de chacun.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="feature-section-four" style="background-color:#f7f7f7;padding:60px 0">
    <div class="auto-container">
        <div class="row clearfix">
            @foreach($secteurs as $slug => $s)
            <div class="feature-block_four col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box" style="background:#fff;padding:30px;border-radius:8px;margin-bottom:25px;box-shadow:0 4px 12px rgba(0,0,0,0.06)">
                    <h4><a href="{{ route('secteurs.show', $slug) }}">{{ $s['nom'] }}</a></h4>
                    <div class="text" style="margin-top:10px;color:#555">{{ $s['desc'] }}</div>
                    <div style="margin-top:20px"><a href="{{ route('secteurs.show', $slug) }}" class="theme-btn btn-style-ten"><span class="text-one">Détails</span><span class="text-two">Détails</span></a></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
