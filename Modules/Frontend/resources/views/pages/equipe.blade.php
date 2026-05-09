@extends('frontend::layouts.intime')

@section('title', 'Équipe et conseil consultatif | Kalystrat')

@php
$membres = [
    'ali-salomon' => ['nom' => 'Ali Salomon', 'titre' => 'Président et Directeur Général', 'role' => 'Fondateur', 'desc' => "Visionnaire et entrepreneur chevronné, Ali Salomon a conçu le modèle d'affaires intégré sur lequel repose Gestion Kalystrat Inc. Il supervise la stratégie globale, les acquisitions et la gouvernance du groupe."],
    'jacques-jobidon' => ['nom' => 'Jacques Jobidon', 'titre' => 'Conseiller — Droit de la construction', 'role' => 'Conseil consultatif', 'desc' => "Expert reconnu en droit de la construction au Québec, Jacques Jobidon apporte son expertise sur les contrats, la gestion des litiges et la conformité réglementaire des chantiers du groupe."],
    'perry-wong' => ['nom' => 'Perry Wong', 'titre' => 'Conseiller — Immobilier québécois', 'role' => 'Conseil consultatif', 'desc' => "Spécialiste en immobilier québécois, Perry Wong conseille Kalystrat Immobilier sur les acquisitions de terrains, les analyses de marché et le développement de projets résidentiels et locatifs."],
];
@endphp

@push('meta')
<meta name="description" content="Équipe Kalystrat : Ali Salomon (Président, fondateur), Jacques Jobidon (droit de la construction), Perry Wong (immobilier). Direction expérimentée et conseil consultatif d'experts indépendants.">
<link rel="canonical" href="{{ url('/equipe') }}">
@endpush

@push('schema')
<script type="application/ld+json">@php
$persons = [];
foreach($membres as $slug => $m) {
    $persons[] = ['@type' => 'Person', 'name' => $m['nom'], 'jobTitle' => $m['titre'], 'url' => url('/equipe/' . $slug), 'worksFor' => ['@type' => 'Organization', 'name' => 'Gestion Kalystrat Inc.']];
}
echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'Équipe Kalystrat',
    'url' => url('/equipe'),
    'mainEntity' => ['@type' => 'ItemList', 'itemListElement' => array_map(fn($i, $p) => ['@type' => 'ListItem', 'position' => $i + 1, 'item' => $p], array_keys($persons), $persons)],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
@endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Équipe', 'item' => 'https://kalystrat.ca/equipe'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<section class="page-title" style="background-image:url(/intime/images/background/2.jpg)">
    <div class="auto-container">
        <h1>Équipe et gouvernance</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>Équipe</li>
        </ul>
    </div>
</section>

<section class="about-section-two">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 content-column">
                <div class="sec-title">
                    <span class="sub-title">Direction et conseil</span>
                    <h2>Une gouvernance solide et expérimentée</h2>
                </div>
                <div class="text">
                    <p>La direction de Gestion Kalystrat Inc. combine vision entrepreneuriale et expertise sectorielle. Le conseil consultatif apporte un regard externe sur les décisions stratégiques, garantissant équilibre entre ambition et rigueur.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="team-section" style="padding:60px 0;background-color:#f7f7f7">
    <div class="auto-container">
        <div class="row clearfix">
            @foreach($membres as $slug => $m)
            <div class="team-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box" style="background:#fff;padding:30px;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,0.06);margin-bottom:25px">
                    <div class="content">
                        <span style="font-size:13px;color:#FFA000;font-weight:600;text-transform:uppercase;letter-spacing:1px">{{ $m['role'] }}</span>
                        <h4 style="margin:8px 0"><a href="{{ route('equipe.membre', $slug) }}">{{ $m['nom'] }}</a></h4>
                        <span style="color:#666">{{ $m['titre'] }}</span>
                        <div style="margin-top:15px;line-height:1.6">{{ $m['desc'] }}</div>
                        <div style="margin-top:20px"><a href="{{ route('equipe.membre', $slug) }}" class="theme-btn btn-style-ten"><span class="text-one">Profil complet</span><span class="text-two">Profil</span></a></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
