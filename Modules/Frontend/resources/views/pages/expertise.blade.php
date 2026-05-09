@extends('frontend::layouts.intime')

@section('title', 'Notre expertise — Méthodes, normes et qualité | Kalystrat')

@push('meta')
<meta name="description" content="Expertise Kalystrat : BIM, RBQ, CNESST, préfabrication, Code de construction Québec, contrôle qualité centralisé. Excellence technique éprouvée.">
<link rel="canonical" href="{{ url('/expertise') }}">
<meta property="og:title" content="Expertise Kalystrat construction">
<meta property="og:type" content="website">
@endpush

@push('schema')
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'AboutPage',
    'name' => 'Expertise Kalystrat',
    'url' => url('/expertise'),
    'about' => 'Méthodes, normes, qualité, BIM, sécurité en construction',
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Expertise', 'item' => 'https://kalystrat.ca/expertise'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<section class="page-title" style="background-image:url(/intime/images/background/2.jpg)">
    <div class="auto-container">
        <h1>Notre expertise</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>Expertise</li>
        </ul>
    </div>
</section>

<section class="about-section-two">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 content-column">
                <div class="sec-title">
                    <span class="sub-title">Méthodes et standards</span>
                    <h2>Excellence technique appliquée à chaque chantier</h2>
                </div>
                <div class="text">
                    <p>L’expertise Kalystrat ne se résume pas à des compétences individuelles : c’est un système intégré qui combine méthodes éprouvées, normes provinciales rigoureuses, technologies modernes (BIM, préfabrication) et culture de sécurité partagée par les six filiales.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@php
$piliers = [
    ['t' => 'Conformité RBQ et CCQ', 'd' => "Toutes nos filiales actives détiennent les licences RBQ requises pour leurs catégories de travaux. La main-d'œuvre est CCQ, formée et certifiée selon les exigences provinciales. Audits internes trimestriels."],
    ['t' => 'Code de construction du Québec', 'd' => "Application stricte du Code de construction (chapitre Bâtiment) et des règlements municipaux applicables. Plans soumis à un superviseur qualifié avant exécution sur chantier."],
    ['t' => 'Sécurité chantier (CNESST)', 'd' => "Programme de prévention conforme aux exigences CNESST. Formation SIMDUT, ASP Construction et premiers soins pour tous les travailleurs. Tolérance zéro sur les manquements EPI."],
    ['t' => 'BIM et numérisation', 'd' => "Modélisation 3D pour les projets commerciaux et institutionnels. Coordination MEP via Revit. Détection de conflits avant exécution pour réduire les imprévus de chantier."],
    ['t' => 'Préfabrication et hors-site', 'd' => "Charpentes, panneaux muraux et modules préfabriqués en atelier pour les projets résidentiels et commerciaux légers. Réduction des délais d'installation et meilleure tolérance dimensionnelle."],
    ['t' => 'Contrôle qualité centralisé', 'd' => "Le holding centralise les standards qualité à travers les six filiales : un même cahier de charges, mêmes critères de réception, mêmes garanties post-livraison."],
    ['t' => 'Développement durable', 'd' => "Matériaux à faible empreinte carbone, isolation supérieure aux exigences minimales, gestion des déchets de chantier (récupération bois, métal, gypse). Visions LEED et Novoclimat selon projet."],
    ['t' => 'Gestion de projet intégrée', 'd' => "Un chargé de projet unique coordonne les six filiales pour un même chantier, éliminant les zones grises de responsabilité et accélérant la prise de décision."],
];
@endphp

<section class="feature-section-four" style="background-color:#f7f7f7;padding:80px 0">
    <div class="auto-container">
        <div class="row clearfix">
            @foreach($piliers as $p)
            <div class="feature-block_four col-lg-6 col-md-12 col-sm-12">
                <div class="inner-box" style="padding:30px;background:#fff;border-radius:8px;margin-bottom:25px;border-left:4px solid #8F3F00">
                    <h4>{{ $p['t'] }}</h4>
                    <div class="text" style="margin-top:10px">{{ $p['d'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-content-section" style="padding:60px 0">
    <div class="auto-container">
        <h2>L’avantage de l’intégration verticale au quotidien</h2>
        <p style="line-height:1.7">L’intégration verticale n’est pas un slogan. Sur un chantier Kalystrat, elle se traduit concrètement par six gestes opérationnels qui transforment la façon dont un projet est exécuté. Premier geste : un seul contrat, un seul calendrier maître. Le client signe un mandat unique avec Gestion Kalystrat Inc. ; la holding répartit ensuite les tâches entre les six filiales selon une séquence pensée en amont. Deuxième geste : la coordination interquipes se passe en réunion hebdomadaire, pas par courriels en cascade entre sous-traitants étrangers les uns aux autres. Troisième geste : nos compagnons CCQ travaillent ensemble sur d’autres chantiers, ils se connaissent, ce qui réduit les frictions et accélère le rythme. Quatrième geste : les standards qualité sont définis une fois au niveau du holding et appliqués partout. Cinquième geste : la chaîne d’approvisionnement est mutualisée entre les filiales pour des achats groupés. Sixième geste : un chargé de projet unique pilote tout, ce qui élimine les zones grises de responsabilité.</p>
    </div>
</section>

<section class="ks-content-section" style="padding:60px 0;background:#f7f7f7">
    <div class="auto-container">
        <h2>Reconnaissance sur le chantier et au-delà</h2>
        <p style="line-height:1.7">Notre marketing terrain prolonge l’expérience client au-delà du contrat. Chacun de nos véhicules de travail porte le lettrage Kalystrat. Sur chaque chantier, un panneau de grande visibilité identifie le projet comme « réalisé par le groupe Kalystrat » et présente l’ensemble des filiales mobilisées. Nos équipements de protection individuelle (casques, vestes, accessoires de sécurité) arborent la marque et le logo Kalystrat, ce qui renforce l’unité visuelle des chantiers et la sécurité des travailleurs. Nous participons aux salons professionnels comme le Salon national de l’habitation et le Congrès de l’APCHQ pour entretenir les relations avec architectes, courtiers et promoteurs. Nos fiches Google Business Profile sont distinctes pour chaque filiale, permettant aux clients locaux de trouver précisément l’expertise qu’ils cherchent.</p>
    </div>
</section>

<section class="call-to-action" style="background:#f7f7f7;padding:60px 0;text-align:center">
    <div class="auto-container">
        <h2 style="margin-bottom:20px">Discutez avec nos experts</h2>
        <a href="{{ route('contact') }}" class="theme-btn btn-style-ten"><div class="btn-wrap"><span class="text-one">Nous contacter</span><span class="text-two">Nous contacter</span></div></a>
    </div>
</section>

@endsection
