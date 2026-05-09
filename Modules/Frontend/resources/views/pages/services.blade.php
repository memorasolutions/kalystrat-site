@extends('frontend::layouts.intime')

@section('title', 'Services de construction au Québec | Kalystrat')

@push('meta')
<meta name="description" content="Catalogue de services Kalystrat : excavation, fondations, charpente, toiture, finition, immobilier, placement. Six filiales, une marque unifiée au Québec.">
<link rel="canonical" href="{{ url('/services') }}">
<meta property="og:title" content="Services de construction Kalystrat">
<meta property="og:description" content="Six filiales spécialisées : excavation, charpente, toiture, finition, immobilier, placement.">
<meta property="og:type" content="website">
@endpush

@push('schema')
<script type="application/ld+json">@php
$itemList = [];
$pos = 1;
foreach($filiales as $s => $f) {
    foreach($f['services'] as $svc) {
        $itemList[] = ['@type' => 'ListItem', 'position' => $pos++, 'item' => ['@type' => 'Service', 'name' => $svc, 'provider' => ['@type' => 'GeneralContractor', 'name' => $f['nom_court'], 'url' => url('/filiales/' . $s)]]];
    }
}
echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'Services de construction Kalystrat',
    'url' => url('/services'),
    'mainEntity' => ['@type' => 'ItemList', 'itemListElement' => $itemList],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
@endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => 'https://kalystrat.ca/services'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<section class="page-title" style="background-image:url(/intime/images/background/2.jpg)">
    <div class="auto-container">
        <h1>Nos services</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>Services</li>
        </ul>
    </div>
</section>

<section class="about-section-two">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 content-column">
                <div class="sec-title">
                    <span class="sub-title">Une chaîne complète</span>
                    <h2>Tous les métiers de la construction sous une seule marque</h2>
                </div>
                <div class="text">
                    <p>Du premier coup de pelle à la pose des dernières moulures, Kalystrat couvre l’intégralité du cycle de construction. Chaque service est exécuté par une de nos six filiales spécialisées, garantissant expertise dédiée, contrôle qualité interne et coordination simplifiée pour vos projets résidentiels, commerciaux et institutionnels.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@foreach($filiales as $slug => $f)
<section class="feature-section-four" style="padding:60px 0;{{ $loop->even ? 'background-color:#f7f7f7' : '' }}">
    <div class="auto-container">
        <div class="sec-title">
            <span class="sub-title">{{ $f['specialite'] }}</span>
            <h3><a href="{{ route('filiale', $slug) }}">{{ $f['nom_court'] }}</a></h3>
        </div>
        <div class="row clearfix">
            @foreach($f['services'] as $service)
            <div class="col-lg-4 col-md-6 col-sm-12" style="margin-bottom:15px">
                <div style="padding:15px;background:#fff;border-left:3px solid #8F3F00">{{ $service }}</div>
            </div>
            @endforeach
        </div>
        <div style="margin-top:25px">
            <a href="{{ route('filiale', $slug) }}" class="theme-btn btn-style-ten"><span class="text-one">Voir la filiale {{ $f['nom_court'] }}</span><span class="text-two">Voir la filiale</span></a>
        </div>
    </div>
</section>
@endforeach

<section class="call-to-action" style="background:#f7f7f7;padding:60px 0;text-align:center">
    <div class="auto-container">
        <h2 style="margin-bottom:20px">Un service que vous cherchez ?</h2>
        <a href="{{ route('contact') }}" class="theme-btn btn-style-ten"><div class="btn-wrap"><span class="text-one">Obtenir une soumission</span><span class="text-two">Obtenir une soumission</span></div></a>
    </div>
</section>

@endsection
