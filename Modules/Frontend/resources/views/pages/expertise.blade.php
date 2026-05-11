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

<header class="ks-page-hero">
    <div class="ks-container">
        <ul class="ks-page-hero__breadcrumb">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>Expertise</li>
        </ul>
        <h1>Notre expertise technique</h1>
        <p class="ks-page-hero__subtitle">Méthodes éprouvées, normes provinciales rigoureuses, technologies modernes (BIM, préfabrication) et culture de sécurité partagée par les six filiales.</p>
    </div>
</header>

<section class="ks-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left">
            <span class="ks-eyebrow">Méthodes et standards</span>
            <h2 class="ks-h2">Excellence technique appliquée à chaque chantier</h2>
        </div>
        <p class="ks-lead">L'expertise Kalystrat ne se résume pas à des compétences individuelles. C'est un système intégré qui combine conformité réglementaire stricte, technologies de pointe et coordination centralisée du groupe. Ces huit piliers définissent notre standard opérationnel.</p>
    </div>
</section>

@php
$piliers = [
    ['t' => 'Conformité RBQ et CCQ', 'd' => "Toutes nos filiales actives détiennent les licences RBQ requises pour leurs catégories de travaux. La main-d'œuvre est CCQ, formée et certifiée selon les exigences provinciales. Audits internes trimestriels."],
    ['t' => 'Code de construction du Québec', 'd' => "Application stricte du Code de construction (chapitre Bâtiment) et des règlements municipaux applicables. Plans soumis à un superviseur qualifié avant exécution sur chantier."],
    ['t' => 'Sécurité chantier (CNESST)', 'd' => "Programme de prévention conforme aux exigences CNESST. Formation SIMDUT, ASP Construction et premiers soins pour tous les travailleurs. Tolérance zéro sur les manquements EPI."],
    ['t' => 'BIM et numérisation', 'd' => "Modélisation 3D pour les projets commerciaux et institutionnels. Coordination MEP via Revit. Détection de conflits avant exécution pour réduire les imprévus de chantier."],
    ['t' => 'Préfabrication et hors-site', 'd' => "Charpentes, panneaux muraux et modules préfabriqués en atelier pour les projets résidentiels et commerciaux légers. Réduction des délais d'installation et meilleure tolérance dimensionnelle."],
    ['t' => 'Contrôle qualité centralisé', 'd' => "Le groupe centralise les standards qualité à travers les six filiales : un même cahier de charges, mêmes critères de réception, mêmes garanties post-livraison."],
    ['t' => 'Développement durable', 'd' => "Matériaux à faible empreinte carbone, isolation supérieure aux exigences minimales, gestion des déchets de chantier (récupération bois, métal, gypse). Visions LEED et Novoclimat selon projet."],
    ['t' => 'Gestion de projet intégrée', 'd' => "Un chargé de projet unique coordonne les six filiales pour un même chantier, éliminant les zones grises de responsabilité et accélérant la prise de décision."],
];
@endphp

<section class="ks-section ks-section--alt">
    <div class="ks-container">
        <div class="ks-bento">
            @foreach($piliers as $i => $p)
            <article class="ks-card ks-card--accent-gold">
                <div class="ks-card__meta">Pilier {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</div>
                <h3 class="ks-card__title">{{ $p['t'] }}</h3>
                <p class="ks-card__text">{{ $p['d'] }}</p>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-section ks-section--dark">
    <div class="ks-container">
        <div class="ks-section__heading">
            <span class="ks-eyebrow">Intégration verticale au quotidien</span>
            <h2 class="ks-h2">Six gestes opérationnels qui font la différence</h2>
        </div>
        <div class="ks-bento">
            <article class="ks-card ks-card--dark">
                <div style="font-family:var(--ks-font-display);font-size:2rem;color:var(--ks-gold-500);font-weight:700">01</div>
                <h3 class="ks-card__title">Un seul contrat, un seul calendrier</h3>
                <p class="ks-card__text">Le client signe un mandat unique avec Gestion Kalystrat Inc. Le groupe répartit ensuite les tâches entre les six filiales selon une séquence pensée en amont.</p>
            </article>
            <article class="ks-card ks-card--dark">
                <div style="font-family:var(--ks-font-display);font-size:2rem;color:var(--ks-gold-500);font-weight:700">02</div>
                <h3 class="ks-card__title">Coordination hebdomadaire</h3>
                <p class="ks-card__text">Réunion d'équipes inter-filiales chaque semaine, pas de courriels en cascade entre sous-traitants étrangers les uns aux autres.</p>
            </article>
            <article class="ks-card ks-card--dark">
                <div style="font-family:var(--ks-font-display);font-size:2rem;color:var(--ks-gold-500);font-weight:700">03</div>
                <h3 class="ks-card__title">Compagnons habitués</h3>
                <p class="ks-card__text">Nos compagnons CCQ travaillent ensemble sur d'autres chantiers, ils se connaissent. Frictions réduites, rythme accéléré.</p>
            </article>
            <article class="ks-card ks-card--dark">
                <div style="font-family:var(--ks-font-display);font-size:2rem;color:var(--ks-gold-500);font-weight:700">04</div>
                <h3 class="ks-card__title">Standards de groupe partagés</h3>
                <p class="ks-card__text">Les standards qualité sont définis une fois à l'échelle du groupe et appliqués partout, par toutes les filiales, sans interprétation locale.</p>
            </article>
            <article class="ks-card ks-card--dark">
                <div style="font-family:var(--ks-font-display);font-size:2rem;color:var(--ks-gold-500);font-weight:700">05</div>
                <h3 class="ks-card__title">Achats mutualisés</h3>
                <p class="ks-card__text">La chaîne d'approvisionnement est mutualisée entre les filiales pour des achats groupés et de meilleures conditions tarifaires.</p>
            </article>
            <article class="ks-card ks-card--dark">
                <div style="font-family:var(--ks-font-display);font-size:2rem;color:var(--ks-gold-500);font-weight:700">06</div>
                <h3 class="ks-card__title">Chargé de projet unique</h3>
                <p class="ks-card__text">Un chargé de projet pilote tout. Élimination des zones grises de responsabilité, prise de décision accélérée.</p>
            </article>
        </div>
    </div>
</section>

<section class="ks-section">
    <div class="ks-container">
        <div class="ks-section__heading">
            <span class="ks-eyebrow">Marketing terrain</span>
            <h2 class="ks-h2">Reconnaissance sur le chantier et au-delà</h2>
            <p class="ks-lead">Notre marketing terrain prolonge l'expérience client au-delà du contrat. Cohérence visuelle, sécurité renforcée, présence locale.</p>
        </div>
        <div class="ks-bento ks-bento--2col">
            <article class="ks-card ks-card--accent-navy">
                <span class="ks-eyebrow">Identification visuelle</span>
                <h3 class="ks-card__title">Véhicules, EPI, signalisation</h3>
                <p class="ks-card__text">Lettrage Kalystrat sur tous nos véhicules de travail. Panneau « réalisé par le groupe Kalystrat » sur chaque chantier. Casques, vestes et accessoires de sécurité aux couleurs du groupe.</p>
            </article>
            <article class="ks-card ks-card--accent-navy">
                <span class="ks-eyebrow">Présence professionnelle</span>
                <h3 class="ks-card__title">Salons et fiches GBP</h3>
                <p class="ks-card__text">Participation au Salon national de l'habitation et au Congrès de l'APCHQ. Fiches Google Business Profile distinctes pour chaque filiale, optimisées pour la recherche locale.</p>
            </article>
        </div>
    </div>
</section>

<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Discutez avec nos experts</h2>
        <p>Une équipe formée aux exigences du Code 2026 et aux normes Novoclimat 2.0. Demandez une analyse technique gratuite.</p>
        <a href="{{ route('contact') }}" class="ks-cta-primary">Nous contacter</a>
    </div>
</section>

@endsection
