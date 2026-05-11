@extends('frontend::layouts.intime')

@php
$membres = [
    'ali-salomon' => [
        'nom' => 'Ali Salomon',
        'titre' => 'Président et Directeur Général',
        'role' => 'Fondateur',
        'bio' => "Ali Salomon est le fondateur, Président et Directeur Général de Gestion Kalystrat Inc. Il a conçu le modèle d’intégration verticale du groupe&nbsp;: six filiales spécialisées qui couvrent l’intégralité de la chaîne de valeur d’un bâtiment, de l’excavation aux finitions, en passant par le développement immobilier et le placement de la main-d’œuvre.",
        'mission' => "Son ambition est de positionner Kalystrat comme un groupe intégré de référence au Québec dans un horizon de huit ans, en tirant parti de la pénurie de main-d’œuvre, de la demande record en habitation et de la croissance du marché de la rénovation.",
        'role_groupe' => "À titre de Président, il supervise la stratégie globale, la gouvernance, les acquisitions et l’allocation des ressources entre les filiales. Chaque direction de filiale relève directement de lui, ce qui assure une exécution alignée sur la vision du groupe.",
        'expertises' => ['Stratégie d’entreprise', 'Intégration verticale', 'Gouvernance de groupe', 'Construction au Québec', 'Développement immobilier', 'Gestion de portefeuille opératif'],
    ],
    'jacques-jobidon' => [
        'nom' => 'Jacques Jobidon',
        'titre' => 'Conseiller — Droit des affaires et de la construction',
        'role' => 'Conseil consultatif',
        'bio' => "Jacques Jobidon est avocat spécialisé en droit de la construction et des sociétés. Au sein du conseil consultatif de Gestion Kalystrat Inc., il conseille la présidence sur les contrats inter-filiales, la conformité réglementaire (RBQ, CCQ), la gestion des litiges et la structure juridique du groupe.",
        'mission' => "Sa connaissance approfondie du Code civil du Québec en matière de construction (hypothèques légales, garanties prévues à l’article 2118, vices cachés selon l’article 1726) éclaire les décisions stratégiques du groupe et sécurise les engagements contractuels avec les sous-traitants externes et les promoteurs partenaires.",
        'role_groupe' => "Au sein du conseil, Jacques apporte une vigie juridique constante sur les évolutions législatives québécoises (Loi sur le bâtiment, Code civil, Loi 25) et participe à la rédaction des contrats-cadres entre filiales et clients institutionnels.",
        'expertises' => ['Droit de la construction au Québec', 'Droit des sociétés', 'Contrats inter-filiales', 'Conformité RBQ et CCQ', 'Litiges chantier', 'Hypothèques légales (article 2724 C.c.Q.)'],
    ],
    'perry-wong' => [
        'nom' => 'Perry Wong',
        'titre' => 'Conseiller — Immobilier québécois',
        'role' => 'Conseil consultatif',
        'bio' => "Perry Wong est promoteur et expert reconnu du marché immobilier québécois. Au sein du conseil consultatif, il conseille Kalystrat Immobilier sur l’acquisition de terrains stratégiques, l’analyse de marché, la structuration financière des projets résidentiels et la constitution d’un portefeuille locatif durable.",
        'mission' => "Son apport est particulièrement précieux dans le contexte de la pénurie de logements au Québec&nbsp;: il aide à identifier les opportunités à fort potentiel dans les zones en croissance comme Québec, Lévis, Sherbrooke et la grande région de Montréal, tout en respectant les exigences municipales d’urbanisme et les contraintes du Tribunal administratif du logement.",
        'role_groupe' => "Au sein du conseil, Perry contribue aux comités d’investissement, valide les analyses de faisabilité et oriente la stratégie de développement immobilier vers les segments les plus porteurs (locatif abordable, résidentiel intergénérationnel, projets mixtes).",
        'expertises' => ['Marché immobilier québécois', 'Acquisition de terrains', 'Analyse de marché et démographie', 'Développement résidentiel multilogements', 'Portefeuille locatif', 'Programmes SCHL et incitatifs municipaux'],
    ],
];
abort_unless(isset($membres[$slug]), 404);
$m = $membres[$slug];
@endphp

@section('title', $m['nom'] . ' | Équipe Kalystrat')

@push('meta')
<meta name="description" content="{{ $m['nom'] }}, {{ $m['titre'] }} chez Gestion Kalystrat Inc. {{ Str::limit(strip_tags($m['bio']), 130) }}">
<link rel="canonical" href="{{ url('/equipe/' . $slug) }}">
<meta property="og:title" content="{{ $m['nom'] }} — {{ $m['titre'] }}">
<meta property="og:type" content="profile">
@endpush

@push('schema')
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Person',
    'name' => $m['nom'],
    'jobTitle' => $m['titre'],
    'description' => strip_tags($m['bio']),
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

<header class="ks-page-hero ks-page-hero--photo" style="--ks-hero-photo: url('/intime/images/pages/membre-hero.jpg')">
    <div class="ks-page-hero__overlay" aria-hidden="true"></div>
    <div class="ks-container ks-page-hero__inner">
        <ul class="ks-page-hero__breadcrumb">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li><a href="{{ route('equipe') }}">Équipe</a></li>
            <li>{{ $m['nom'] }}</li>
        </ul>
        <span class="ks-eyebrow ks-page-hero__eyebrow">{{ $m['role'] }}</span>
        <h1>{{ $m['nom'] }}</h1>
        <p class="ks-page-hero__subtitle">{!! $m['titre'] !!}</p>
    </div>
</header>

<section class="ks-section">
    <div class="ks-container">
        <div class="ks-bento ks-bento--2col" style="align-items:start">
            <article>
                <span class="ks-eyebrow">Profil</span>
                <h2 class="ks-h2" style="font-size:clamp(1.75rem, 3vw, 2.5rem)">Parcours et engagement</h2>
                <p class="ks-lead" style="font-size:var(--ks-body-size)">{!! $m['bio'] !!}</p>
                <p class="ks-lead" style="font-size:var(--ks-body-size)">{!! $m['mission'] !!}</p>
                <p class="ks-lead" style="font-size:var(--ks-body-size)">{!! $m['role_groupe'] !!}</p>
            </article>

            <aside style="display:flex;flex-direction:column;gap:20px;position:sticky;top:100px">
                <article class="ks-card ks-card--accent-gold">
                    <span class="ks-eyebrow">Domaines d’expertise</span>
                    <h3 class="ks-card__title" style="font-size:1.25rem">Compétences clés</h3>
                    <ul style="list-style:none;padding:0;margin:1rem 0 0">
                        @foreach($m['expertises'] as $exp)
                        <li style="padding:12px 0;border-bottom:1px solid var(--ks-gray-300);color:var(--ks-navy-900);font-weight:500">{{ $exp }}</li>
                        @endforeach
                    </ul>
                </article>

                <article class="ks-card ks-card--dark">
                    <span class="ks-eyebrow">Discutons</span>
                    <h3 class="ks-card__title" style="font-size:1.25rem">Un projet à présenter&nbsp;?</h3>
                    <p class="ks-card__text">Échangez avec l’équipe Kalystrat pour évaluer votre projet et obtenir une soumission détaillée.</p>
                    <div class="ks-card__cta"><a href="{{ route('contact') }}" class="ks-cta-secondary" style="color:var(--ks-white);border-color:var(--ks-gold-500)">Nous contacter</a></div>
                </article>
            </aside>
        </div>
    </div>
</section>

<section class="ks-section ks-section--alt">
    <div class="ks-container">
        <div class="ks-section__heading">
            <span class="ks-eyebrow">Reste de l’équipe</span>
            <h2 class="ks-h2">Découvrez les autres profils</h2>
            <p class="ks-lead">Présidence, conseil consultatif et six directions de filiales : la gouvernance Kalystrat repose sur des profils complémentaires.</p>
        </div>
        <div class="ks-bento ks-bento--3col">
            @foreach($membres as $other_slug => $other)
                @if($other_slug !== $slug)
                <article class="ks-card ks-card--accent-gold">
                    <span class="ks-eyebrow">{{ $other['role'] }}</span>
                    <h3 class="ks-card__title"><a href="{{ route('equipe.membre', $other_slug) }}">{{ $other['nom'] }}</a></h3>
                    <div class="ks-card__meta" style="color:var(--ks-gray-700);text-transform:none;letter-spacing:0;font-weight:500">{{ $other['titre'] }}</div>
                    <div class="ks-card__cta"><a href="{{ route('equipe.membre', $other_slug) }}" class="ks-cta-secondary">Profil complet</a></div>
                </article>
                @endif
            @endforeach
        </div>
        <div style="margin-top:48px;text-align:center">
            <a href="{{ route('equipe') }}" class="ks-cta-secondary">Voir toute l’équipe</a>
        </div>
    </div>
</section>

@endsection
