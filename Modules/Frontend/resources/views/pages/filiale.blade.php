@extends('frontend::layouts.intime')

@section('title', $filiale['nom_court'] . ' | Kalystrat')

@push('meta')
<meta name="description" content="{{ $filiale['nom_court'] }} — {{ $filiale['specialite'] }}. Filiale du holding Kalystrat à intégration verticale, basée à Québec.">
<link rel="canonical" href="{{ url('/filiales/' . $slug) }}">
<meta property="og:title" content="{{ $filiale['nom_court'] }}">
<meta property="og:description" content="{{ $filiale['tagline'] }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url('/filiales/' . $slug) }}">
@endpush

@push('schema')
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'GeneralContractor',
    'name' => $filiale['nom_legal'],
    'alternateName' => $filiale['nom_court'],
    'parentOrganization' => ['@type' => 'Organization', 'name' => 'Gestion Kalystrat Inc.', 'url' => 'https://kalystrat.ca'],
    'description' => $filiale['specialite'],
    'url' => url('/filiales/' . $slug),
    'areaServed' => ['@type' => 'AdministrativeArea', 'name' => 'Québec, Canada'],
    'address' => ['@type' => 'PostalAddress', 'addressLocality' => 'Québec', 'addressRegion' => 'QC', 'addressCountry' => 'CA'],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Filiales', 'item' => 'https://kalystrat.ca/filiales'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => $filiale['nom_court'], 'item' => url('/filiales/' . $slug)],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<section class="page-title" style="background-image:url(/intime/images/background/2.jpg)">
    <div class="auto-container">
        <h1>{{ $filiale['nom_court'] }}</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li><a href="{{ route('filiales.index') }}">Filiales</a></li>
            <li>{{ $filiale['nom_court'] }}</li>
        </ul>
    </div>
</section>

<section class="about-section-two">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 content-column">
                <div class="sec-title">
                    <span class="sub-title">{{ $filiale['specialite'] }}</span>
                    <h2>{{ $filiale['tagline'] }}</h2>
                </div>
                <div class="text">
                    <p>{{ $filiale['nom_legal'] }} est l’une des six filiales spécialisées de Gestion Kalystrat Inc., holding québécois de construction à intégration verticale. Notre expertise s’inscrit dans une chaîne complète, de l’excavation à la livraison, garantissant cohérence technique et synergie avec les autres divisions du groupe.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@php $contentPath = 'frontend::partials.filiale-content.' . $slug; @endphp
@if(view()->exists($contentPath))
    @include($contentPath)
@endif

<section class="feature-section-four" style="background-color:#f7f7f7;padding:80px 0">
    <div class="auto-container">
        <div class="sec-title centered">
            <span class="sub-title">Services offerts</span>
            <h2>Notre offre de services</h2>
        </div>
        <div class="row clearfix">
            @foreach($filiale['services'] as $service)
            <div class="feature-block_four col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <h4>{{ $service }}</h4>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="about-section-two alternate">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-6 content-column">
                <div class="inner-column">
                    <div class="sec-title">
                        <span class="sub-title">Pour qui</span>
                        <h3>Clientèle cible</h3>
                    </div>
                    <div class="text">
                        <p>{{ $filiale['cibles'] }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 content-column">
                <div class="inner-column">
                    <div class="sec-title">
                        <span class="sub-title">Modèle d’affaires</span>
                        <h3>Comment nous travaillons</h3>
                    </div>
                    <div class="text">
                        <p>{{ $filiale['modele'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="feature-section-four" style="padding:80px 0">
    <div class="auto-container">
        <div class="sec-title centered">
            <span class="sub-title">Intégration verticale</span>
            <h2>Synergies avec les autres filiales</h2>
        </div>
        <div class="row clearfix">
            @foreach(\Modules\Frontend\Http\Controllers\FilialeController::FILIALES as $other_slug => $other_f)
                @if($other_slug !== $slug)
                <div class="feature-block_four col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <h4><a href="{{ route('filiale', $other_slug) }}">{{ $other_f['nom_court'] }}</a></h4>
                        <div class="text">{{ $other_f['specialite'] }}</div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

<section class="call-to-action" style="background:#f7f7f7;padding:60px 0;text-align:center">
    <div class="auto-container">
        <h2 style="margin-bottom:20px">Discutons de votre projet</h2>
        <a href="{{ route('contact') }}" class="theme-btn btn-style-ten"><div class="btn-wrap"><span class="text-one">Obtenir une soumission</span><span class="text-two">Obtenir une soumission</span></div></a>
    </div>
</section>

@endsection
