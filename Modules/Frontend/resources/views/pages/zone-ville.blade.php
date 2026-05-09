@extends('frontend::layouts.intime')

@php
$zones = [
    'quebec' => ['nom' => 'Québec', 'lat' => 46.8139, 'lng' => -71.2080, 'pop' => '550 000+', 'specialites' => 'Résidentiel haut de gamme, multilogements, commercial bureaux, institutionnel (universités, hôpitaux)'],
    'levis' => ['nom' => 'Lévis', 'lat' => 46.7382, 'lng' => -71.2465, 'pop' => '150 000+', 'specialites' => 'Résidentiel unifamilial, condos rive-sud, commerce de proximité'],
    'sainte-foy' => ['nom' => 'Sainte-Foy', 'lat' => 46.7826, 'lng' => -71.2978, 'pop' => 'Quartier Québec', 'specialites' => 'Finition haut de gamme, rénovation patrimoniale, commercial Université Laval'],
    'beauport' => ['nom' => 'Beauport', 'lat' => 46.8810, 'lng' => -71.1894, 'pop' => 'Arrondissement Québec', 'specialites' => 'Constructions neuves, rénovations résidentielles, lotissements'],
    'sillery' => ['nom' => 'Sillery', 'lat' => 46.7700, 'lng' => -71.2700, 'pop' => 'Quartier Québec', 'specialites' => 'Rénovations patrimoniales, constructions de prestige, agrandissements'],
    'trois-rivieres' => ['nom' => 'Trois-Rivières', 'lat' => 46.3433, 'lng' => -72.5410, 'pop' => '140 000+', 'specialites' => 'Résidentiel, commercial centre-ville, institutionnel'],
    'saguenay' => ['nom' => 'Saguenay', 'lat' => 48.4280, 'lng' => -71.0680, 'pop' => '145 000+', 'specialites' => 'Industriel, institutionnel, projets miniers et forestiers'],
    'montreal' => ['nom' => 'Montréal', 'lat' => 45.5019, 'lng' => -73.5674, 'pop' => '1.7M+', 'specialites' => 'Commercial bureaux, condominiums urbains, institutionnel'],
    'laval' => ['nom' => 'Laval', 'lat' => 45.6066, 'lng' => -73.7124, 'pop' => '440 000+', 'specialites' => 'Multilogements, commercial banlieue, lotissements'],
];
abort_unless(isset($zones[$ville]), 404);
$z = $zones[$ville];
@endphp

@section('title', 'Construction à ' . $z['nom'] . ' | Kalystrat')

@push('meta')
<meta name="description" content="Services de construction à {{ $z['nom'] }} par Kalystrat. {{ $z['specialites'] }}. Holding québécois à intégration verticale, six filiales spécialisées.">
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
@endpush

@section('content')

<section class="page-title" style="background-image:url(/intime/images/background/2.jpg)">
    <div class="auto-container">
        <h1>Construction à {{ $z['nom'] }}</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li><a href="{{ route('zones.index') }}">Zones desservies</a></li>
            <li>{{ $z['nom'] }}</li>
        </ul>
    </div>
</section>

<section class="about-section-two">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-8 content-column">
                <div class="sec-title">
                    <span class="sub-title">{{ $z['pop'] }} habitants</span>
                    <h2>Kalystrat à {{ $z['nom'] }}</h2>
                </div>
                <div class="text">
                    <p>Nos six filiales spécialisées interviennent sur les chantiers de la région de {{ $z['nom'] }}, couvrant tous les types de projets : {{ $z['specialites'] }}.</p>
                    <p>Que vous soyez un particulier qui souhaite rénover, un promoteur immobilier, un gestionnaire commercial ou une organisation publique, notre équipe locale connaît les particularités du marché et de la réglementation municipale.</p>
                </div>
            </div>
            <div class="col-lg-4 content-column">
                <div class="inner-column" style="background:#f7f7f7;padding:25px;border-radius:8px">
                    <h4>Filiales actives</h4>
                    <ul style="list-style:none;padding:0;margin-top:15px">
                        @foreach(\Modules\Frontend\Http\Controllers\FilialeController::FILIALES as $slug => $f)
                        <li style="padding:8px 0;border-bottom:1px solid #ddd"><a href="{{ route('filiale', $slug) }}">{{ $f['nom_court'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="call-to-action" style="background:#f7f7f7;padding:60px 0;text-align:center">
    <div class="auto-container">
        <h2 style="margin-bottom:20px">Un projet à {{ $z['nom'] }} ?</h2>
        <a href="{{ route('contact') }}" class="theme-btn btn-style-ten"><div class="btn-wrap"><span class="text-one">Obtenir une soumission</span><span class="text-two">Soumission</span></div></a>
    </div>
</section>

@endsection
