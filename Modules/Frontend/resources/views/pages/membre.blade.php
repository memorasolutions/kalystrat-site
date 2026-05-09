@extends('frontend::layouts.intime')

@php
$membres = [
    'ali-salomon' => [
        'nom' => 'Ali Salomon',
        'titre' => 'Président et Directeur Général',
        'role' => 'Fondateur',
        'bio' => "Ali Salomon est le fondateur, Président et Directeur Général de Gestion Kalystrat Inc. Il a conçu le modèle d’intégration verticale du groupe : six filiales spécialisées qui couvrent l’intégralité de la chaîne de valeur d’un bâtiment, de l’excavation aux finitions, en passant par le développement immobilier et le placement de la main-d’œuvre. Son ambition est de positionner Kalystrat comme un groupe intégré de référence au Québec dans un horizon de huit ans, en tirant parti de la pénurie de main-d’œuvre, de la demande record en habitation et de la croissance du marché de la rénovation. À titre de Président, il supervise la stratégie globale, la gouvernance, les acquisitions et l’allocation des ressources entre les filiales. Chaque direction de filiale relève directement de lui, ce qui assure une exécution alignée sur la vision de la holding.",
        'expertises' => ['Stratégie d’entreprise', 'Intégration verticale', 'Gouvernance de holding', 'Construction au Québec', 'Développement immobilier', 'Gestion de portefeuille opératif'],
    ],
    'jacques-jobidon' => [
        'nom' => 'Jacques Jobidon',
        'titre' => 'Conseiller — Droit des affaires et de la construction',
        'role' => 'Conseil consultatif',
        'bio' => "Jacques Jobidon est avocat spécialisé en droit de la construction et des sociétés. Au sein du conseil consultatif de Gestion Kalystrat Inc., il conseille la présidence sur les contrats inter-filiales, la conformité réglementaire (RBQ, CCQ), la gestion des litiges et la structure juridique du groupe. Sa connaissance approfondie du Code civil du Québec en matière de construction (hypothèques légales, garanties prévues à l’article 2118, vices cachés selon l’article 1726) éclaire les décisions stratégiques du holding et sécurise les engagements contractuels avec les sous-traitants externes et les promoteurs partenaires.",
        'expertises' => ['Droit de la construction au Québec', 'Droit des sociétés', 'Contrats inter-filiales', 'Conformité RBQ et CCQ', 'Litiges chantier', 'Hypothèques légales (article 2724 C.c.Q.)'],
    ],
    'perry-wong' => [
        'nom' => 'Perry Wong',
        'titre' => 'Conseiller — Immobilier québécois',
        'role' => 'Conseil consultatif',
        'bio' => "Perry Wong est promoteur et expert reconnu du marché immobilier québécois. Au sein du conseil consultatif, il conseille Kalystrat Immobilier sur l’acquisition de terrains stratégiques, l’analyse de marché, la structuration financière des projets résidentiels et la constitution d’un portefeuille locatif durable. Son apport est particulièrement précieux dans le contexte de la pénurie de logements au Québec : il aide à identifier les opportunités à fort potentiel dans les zones en croissance comme Québec, Lévis, Sherbrooke et la grande région de Montréal, tout en respectant les exigences municipales d’urbanisme et les contraintes du Tribunal administratif du logement.",
        'expertises' => ['Marché immobilier québécois', 'Acquisition de terrains', 'Analyse de marché et démographie', 'Développement résidentiel multilogements', 'Portefeuille locatif', 'Programmes SCHL et incitatifs municipaux'],
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
