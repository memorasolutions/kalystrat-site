@extends('frontend::layouts.intime')

@section('title', 'Zones desservies au Québec | Kalystrat')

@php
$zones = [
    'quebec' => ['nom' => 'Québec', 'desc' => 'Capitale nationale, siège social Kalystrat. Couverture complète résidentiel, commercial, institutionnel.'],
    'levis' => ['nom' => 'Lévis', 'desc' => 'Rive-Sud du Saint-Laurent. Projets résidentiels et multilogements en croissance.'],
    'sainte-foy' => ['nom' => 'Sainte-Foy', 'desc' => 'Secteur ouest de Québec. Spécialités finition haut de gamme et institutionnel.'],
    'beauport' => ['nom' => 'Beauport', 'desc' => 'Est de Québec. Constructions neuves et rénovations résidentielles.'],
    'sillery' => ['nom' => 'Sillery', 'desc' => 'Quartier patrimonial. Rénovations haut de gamme et adaptations historiques.'],
    'trois-rivieres' => ['nom' => 'Trois-Rivières', 'desc' => 'Mauricie. Couverture commerciale et résidentielle ciblée.'],
    'saguenay' => ['nom' => 'Saguenay', 'desc' => 'Saguenay—Lac-Saint-Jean. Projets industriels et institutionnels.'],
    'montreal' => ['nom' => 'Montréal', 'desc' => 'Métropole. Projets d\'envergure commerciaux et institutionnels.'],
    'laval' => ['nom' => 'Laval', 'desc' => 'Région métropolitaine. Multilogements et commercial.'],
];
@endphp

@push('meta')
<meta name="description" content="Zones desservies par Kalystrat au Québec : Québec, Lévis, Sainte-Foy, Beauport, Sillery, Trois-Rivières, Saguenay, Montréal, Laval. Construction résidentielle, commerciale et institutionnelle.">
<link rel="canonical" href="{{ url('/zones-desservies') }}">
@endpush

@push('schema')
<script type="application/ld+json">@php
$itemList = [];
$pos = 1;
foreach($zones as $slug => $z) {
    $itemList[] = ['@type' => 'ListItem', 'position' => $pos++, 'name' => $z['nom'], 'url' => url('/zones-desservies/' . $slug)];
}
echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'Zones desservies — Kalystrat construction Québec',
    'url' => url('/zones-desservies'),
    'mainEntity' => ['@type' => 'ItemList', 'itemListElement' => $itemList],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
@endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Zones desservies', 'item' => 'https://kalystrat.ca/zones-desservies'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<section class="page-title" style="background-image:url(/intime/images/background/2.jpg)">
    <div class="auto-container">
        <h1>Zones desservies</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>Zones desservies</li>
        </ul>
    </div>
</section>

<section class="about-section-two">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 content-column">
                <div class="sec-title">
                    <span class="sub-title">Couverture territoriale</span>
                    <h2>Présents partout au Québec</h2>
                </div>
                <div class="text">
                    <p>Notre siège social est à Québec, mais nos chantiers s'étendent de la rive-sud du Saint-Laurent jusqu'au Saguenay et à la grande région de Montréal. Que votre projet soit résidentiel, commercial ou institutionnel, nous évaluons sa faisabilité dans toute la province.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="feature-section-four" style="background-color:#f7f7f7;padding:60px 0">
    <div class="auto-container">
        <div class="row clearfix">
            @foreach($zones as $slug => $z)
            <div class="feature-block_four col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box" style="background:#fff;padding:25px;border-radius:8px;margin-bottom:20px;box-shadow:0 4px 12px rgba(0,0,0,0.06)">
                    <h4><a href="{{ route('zones.ville', $slug) }}">{{ $z['nom'] }}</a></h4>
                    <div class="text" style="margin-top:10px;color:#555">{{ $z['desc'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
