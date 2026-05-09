@extends('frontend::layouts.intime')

@section('title', 'Nos six filiales spécialisées | Kalystrat')

@push('meta')
<meta name="description" content="Six filiales Kalystrat : Fondations, Structure, Toiture-Enveloppe, Finition Intérieure, Immobilier, Placement Construction. Chaîne complète de la construction au Québec.">
<link rel="canonical" href="{{ url('/filiales') }}">
<meta property="og:title" content="Six filiales Kalystrat — Construction à intégration verticale">
<meta property="og:description" content="Six métiers, une marque : Fondations, Structure, Toiture, Finition, Immobilier, Placement.">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url('/filiales') }}">
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

<section class="page-title" style="background-image:url(/intime/images/background/2.jpg)">
    <div class="auto-container">
        <h1>Nos six filiales</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>Filiales</li>
        </ul>
    </div>
</section>

<section class="about-section-two">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 content-column">
                <div class="sec-title">
                    <span class="sub-title">Structure du groupe</span>
                    <h2>Six métiers, une marque unifiée</h2>
                </div>
                <div class="text">
                    <p>Gestion Kalystrat Inc. opère via six filiales spécialisées qui couvrent l’intégralité de la chaîne de valeur en construction. De l’excavation aux finitions, du développement immobilier au placement de main-d’œuvre, chaque filiale détient une expertise pointue et travaille en synergie avec les autres divisions du groupe.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="feature-section-four" style="background-color:#f7f7f7;padding:80px 0">
    <div class="auto-container">
        <div class="row clearfix">
            @foreach($filiales as $slug => $f)
            <div class="feature-block_four col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box" style="padding:30px;background:#fff;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,0.06);margin-bottom:30px">
                    <h4><a href="{{ route('filiale', $slug) }}">{{ $f['nom_court'] }}</a></h4>
                    <div class="text" style="margin:15px 0"><strong>{{ $f['specialite'] }}</strong></div>
                    <div class="text" style="margin-bottom:20px">{{ $f['tagline'] }}</div>
                    <a href="{{ route('filiale', $slug) }}" class="theme-btn btn-style-ten"><span class="text-one">En savoir plus</span><span class="text-two">En savoir plus</span></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="call-to-action" style="background:#f7f7f7;padding:60px 0;text-align:center">
    <div class="auto-container">
        <h2 style="margin-bottom:20px">Un seul interlocuteur, six expertises</h2>
        <a href="{{ route('contact') }}" class="theme-btn btn-style-ten"><div class="btn-wrap"><span class="text-one">Obtenir une soumission</span><span class="text-two">Obtenir une soumission</span></div></a>
    </div>
</section>

@endsection
