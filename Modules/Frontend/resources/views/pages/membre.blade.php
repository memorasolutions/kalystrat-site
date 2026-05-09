@extends('frontend::layouts.intime')

@php
$membres = [
    'ali-salomon' => [
        'nom' => 'Ali Salomon',
        'titre' => 'Président et Directeur Général',
        'role' => 'Fondateur',
        'bio' => "Visionnaire et entrepreneur chevronné, Ali Salomon est le fondateur de Gestion Kalystrat Inc. En tant que Président et Directeur Général, il a conçu un modèle d'affaires unique fondé sur l'intégration verticale, qui distingue Kalystrat dans l'industrie québécoise de la construction.",
        'expertises' => ['Stratégie d\'entreprise', 'Intégration verticale', 'Construction au Québec', 'Développement immobilier', 'Gestion de holding'],
    ],
    'jacques-jobidon' => [
        'nom' => 'Jacques Jobidon',
        'titre' => 'Conseiller — Droit de la construction',
        'role' => 'Conseil consultatif',
        'bio' => "Avocat reconnu en droit de la construction au Québec, Jacques Jobidon conseille Gestion Kalystrat Inc. sur les contrats de construction, la gestion des litiges et la conformité réglementaire. Son expertise est précieuse pour structurer les ententes inter-filiales et avec les sous-traitants externes.",
        'expertises' => ['Droit de la construction', 'Contrats commerciaux', 'Litiges chantier', 'Conformité RBQ', 'Hypothèques légales'],
    ],
    'perry-wong' => [
        'nom' => 'Perry Wong',
        'titre' => 'Conseiller — Immobilier québécois',
        'role' => 'Conseil consultatif',
        'bio' => "Spécialiste reconnu de l'immobilier québécois, Perry Wong conseille Kalystrat Immobilier sur les acquisitions de terrains stratégiques, les analyses de marché et le développement de projets résidentiels et locatifs. Son réseau et sa lecture du marché renforcent la croissance de la filiale.",
        'expertises' => ['Marché immobilier QC', 'Acquisition de terrains', 'Analyse de marché', 'Développement résidentiel', 'Investissement locatif'],
    ],
];
abort_unless(isset($membres[$slug]), 404);
$m = $membres[$slug];
@endphp

@section('title', $m['nom'] . ' | Équipe Kalystrat')

@push('meta')
<meta name="description" content="{{ $m['nom'] }}, {{ $m['titre'] }} chez Gestion Kalystrat Inc. {{ $m['bio'] }}">
<link rel="canonical" href="{{ url('/equipe/' . $slug) }}">
@endpush

@push('schema')
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Person',
    'name' => $m['nom'],
    'jobTitle' => $m['titre'],
    'description' => $m['bio'],
    'url' => url('/equipe/' . $slug),
    'worksFor' => ['@type' => 'Organization', 'name' => 'Gestion Kalystrat Inc.', 'url' => 'https://kalystrat.ca'],
    'knowsAbout' => $m['expertises'],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Équipe', 'item' => 'https://kalystrat.ca/equipe'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => $m['nom'], 'item' => url('/equipe/' . $slug)],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<section class="page-title" style="background-image:url(/intime/images/background/2.jpg)">
    <div class="auto-container">
        <h1>{{ $m['nom'] }}</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li><a href="{{ route('equipe') }}">Équipe</a></li>
            <li>{{ $m['nom'] }}</li>
        </ul>
    </div>
</section>

<section class="about-section">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-6 image-column">
                <div class="image-box">
                    <figure class="image"><img src="/intime/images/resource/about-1.jpg" alt="{{ $m['nom'] }}, {{ $m['titre'] }}"></figure>
                </div>
            </div>
            <div class="col-lg-6 content-column">
                <div class="inner-column">
                    <div class="sec-title">
                        <span class="sub-title">{{ $m['role'] }}</span>
                        <h2>{{ $m['nom'] }}</h2>
                        <h4 style="color:#666;font-weight:400;margin-top:5px">{{ $m['titre'] }}</h4>
                    </div>
                    <div class="text">
                        <p>{{ $m['bio'] }}</p>
                    </div>
                    <div style="margin-top:25px">
                        <h4 style="margin-bottom:15px">Domaines d’expertise</h4>
                        <ul style="list-style:none;padding:0">
                            @foreach($m['expertises'] as $exp)
                            <li style="padding:8px 0;border-bottom:1px solid #eee">{{ $exp }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="call-to-action" style="background:#f7f7f7;padding:60px 0;text-align:center">
    <div class="auto-container">
        <h2 style="margin-bottom:20px">Découvrez le reste de l’équipe</h2>
        <a href="{{ route('equipe') }}" class="theme-btn btn-style-ten"><div class="btn-wrap"><span class="text-one">Voir tous les membres</span><span class="text-two">Voir tous</span></div></a>
    </div>
</section>

@endsection
