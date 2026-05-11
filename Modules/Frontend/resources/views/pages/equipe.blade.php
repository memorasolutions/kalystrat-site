@extends('frontend::layouts.intime')

@section('title', 'Équipe et conseil consultatif | Kalystrat')

@php
$membres = [
    'ali-salomon' => ['nom' => 'Ali Salomon', 'titre' => 'Président et Directeur Général', 'role' => 'Fondateur', 'desc' => "Visionnaire et entrepreneur, Ali Salomon a conçu le modèle d'affaires intégré de Gestion Kalystrat Inc. Il supervise la stratégie globale, les acquisitions et la gouvernance du groupe."],
    'jacques-jobidon' => ['nom' => 'Jacques Jobidon', 'titre' => 'Conseiller — Droit de la construction', 'role' => 'Conseil consultatif', 'desc' => "Avocat reconnu en droit de la construction au Québec, Jacques Jobidon apporte son expertise sur les contrats, la gestion des litiges et la conformité réglementaire des chantiers du groupe."],
    'perry-wong' => ['nom' => 'Perry Wong', 'titre' => 'Conseiller — Immobilier québécois', 'role' => 'Conseil consultatif', 'desc' => "Spécialiste en immobilier québécois, Perry Wong conseille Kalystrat Immobilier sur les acquisitions de terrains, les analyses de marché et le développement de projets résidentiels et locatifs."],
];
@endphp

@push('meta')
<meta name="description" content="Équipe Kalystrat : Ali Salomon (Président), six directions de filiales, conseil consultatif (Jacques Jobidon droit, Perry Wong immobilier).">
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

<x-frontend::page-hero
    photo="/intime/images/pages/equipe-hero.webp"
    eyebrow="Conçu, réalisé, livré"
    title="Équipe et gouvernance"
    subtitle="Une présidence forte, six directions de filiales, un conseil consultatif d'experts indépendants. Gouvernance centralisée, exécution décentralisée."
>
    <x-slot:breadcrumb>
        <li><a href="{{ url('/') }}">Accueil</a></li>
        <li>Équipe</li>
    </x-slot:breadcrumb>
</x-frontend::page-hero>

<section class="ks-section">
    <div class="ks-container">
        <div class="ks-section__heading">
            <span class="ks-eyebrow">Direction</span>
            <h2 class="ks-h2">Présidence et direction des filiales</h2>
            <p class="ks-lead">Le fondateur Ali Salomon dirige le groupe et chaque direction de filiale lui relève directement. Cette structure permet une vision unifiée à l'échelle du groupe et une exécution rigoureuse au niveau de chaque métier.</p>
        </div>
        <div class="ks-bento">
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Fondateur</span>
                <h3 class="ks-card__title"><a href="{{ route('equipe.membre', 'ali-salomon') }}">Ali Salomon</a></h3>
                <div class="ks-card__meta">Président et Directeur Général</div>
                <p class="ks-card__text">Visionnaire et entrepreneur, Ali Salomon a conçu le modèle d'affaires intégré de Gestion Kalystrat Inc. Il supervise la stratégie globale, les acquisitions et la gouvernance du groupe.</p>
                <div class="ks-card__cta"><a href="{{ route('equipe.membre', 'ali-salomon') }}" class="ks-cta-secondary">Profil complet</a></div>
            </article>
            @foreach(\Modules\Frontend\Http\Controllers\FilialeController::FILIALES as $fslug => $f)
            <article class="ks-card">
                <span class="ks-eyebrow">Direction de filiale</span>
                <h3 class="ks-card__title">Directeur</h3>
                <div class="ks-card__meta" style="color:var(--ks-gray-700);text-transform:none;letter-spacing:0;font-weight:500">{{ $f['nom_court'] }}</div>
                <p class="ks-card__text">Pilote opérationnel de la filiale, responsable de l'exécution, de la qualité et du respect des échéanciers. Relève directement de la présidence. <em>Nomination à confirmer.</em></p>
                <div class="ks-card__cta"><a href="{{ route('filiale', $fslug) }}" class="ks-cta-secondary">Voir la filiale</a></div>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-section ks-section--alt">
    <div class="ks-container">
        <div class="ks-section__heading">
            <span class="ks-eyebrow">Conseil consultatif</span>
            <h2 class="ks-h2">Cinq sièges, deux conseillers nommés</h2>
            <p class="ks-lead">Le conseil réunira cinq profils complémentaires&nbsp;: construction et ingénierie, financement et investissement, droit des affaires, ressources humaines, immobilier. Deux sièges sont actuellement pourvus.</p>
        </div>
        <div class="ks-bento ks-bento--2col">
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Conseiller — Droit des affaires</span>
                <h3 class="ks-card__title"><a href="{{ route('equipe.membre', 'jacques-jobidon') }}">Jacques Jobidon</a></h3>
                <div class="ks-card__meta">Avocat, droit de la construction et des sociétés</div>
                <p class="ks-card__text">Apporte son expertise sur les contrats, les litiges et la conformité réglementaire des chantiers du groupe (RBQ, CCQ, articles 2118, 2724 du Code civil du Québec).</p>
                <div class="ks-card__cta"><a href="{{ route('equipe.membre', 'jacques-jobidon') }}" class="ks-cta-secondary">Profil complet</a></div>
            </article>
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Conseiller — Immobilier</span>
                <h3 class="ks-card__title"><a href="{{ route('equipe.membre', 'perry-wong') }}">Perry Wong</a></h3>
                <div class="ks-card__meta">Spécialiste du marché immobilier québécois</div>
                <p class="ks-card__text">Conseille Kalystrat Immobilier sur les acquisitions, les analyses de marché et le développement de projets résidentiels et locatifs dans les zones urbaines en croissance.</p>
                <div class="ks-card__cta"><a href="{{ route('equipe.membre', 'perry-wong') }}" class="ks-cta-secondary">Profil complet</a></div>
            </article>
        </div>
    </div>
</section>

<section class="ks-section">
    <div class="ks-container">
        <div class="ks-section__heading">
            <span class="ks-eyebrow">À pourvoir</span>
            <h2 class="ks-h2">Trois sièges en cours de recrutement</h2>
        </div>
        <div class="ks-bento ks-bento--3col">
            <article class="ks-card">
                <div class="ks-card__meta">Profil recherché</div>
                <h3 class="ks-card__title">Construction et ingénierie</h3>
                <p class="ks-card__text">Expert sénior de l'industrie de la construction au Québec, idéalement avec expérience en grand chantier institutionnel ou industriel.</p>
            </article>
            <article class="ks-card">
                <div class="ks-card__meta">Profil recherché</div>
                <h3 class="ks-card__title">Financement et investissement</h3>
                <p class="ks-card__text">Professionnel en financement d'entreprise et structuration financière, expérience en société de portefeuille et acquisitions un atout.</p>
            </article>
            <article class="ks-card">
                <div class="ks-card__meta">Profil recherché</div>
                <h3 class="ks-card__title">Ressources humaines</h3>
                <p class="ks-card__text">Spécialiste du recrutement et de la gestion de la main-d'œuvre en construction, connaissance approfondie de la CCQ.</p>
            </article>
        </div>
    </div>
</section>

<section class="ks-section ks-section--dark">
    <div class="ks-container">
        <div class="ks-section__heading">
            <span class="ks-eyebrow">Services centralisés</span>
            <h2 class="ks-h2">Six fonctions transverses à l'échelle du groupe</h2>
            <p class="ks-lead" style="color:rgba(255,255,255,0.85)">La centralisation des fonctions de soutien au niveau de Gestion Kalystrat Inc. maximise l'efficacité et réduit les frais généraux pour chaque filiale.</p>
        </div>
        <div class="ks-bento">
            <article class="ks-card ks-card--dark">
                <div class="ks-card__meta">Comptabilité et finances</div>
                <p class="ks-card__text">Tenue de livres, états financiers consolidés, gestion de la trésorerie, planification fiscale, budgétisation.</p>
            </article>
            <article class="ks-card ks-card--dark">
                <div class="ks-card__meta">Ressources humaines</div>
                <p class="ks-card__text">Recrutement de cadres, paie, avantages sociaux, santé-sécurité au travail, conformité CCQ.</p>
            </article>
            <article class="ks-card ks-card--dark">
                <div class="ks-card__meta">Juridique</div>
                <p class="ks-card__text">Contrats, conformité réglementaire (RBQ, CCQ), propriété intellectuelle, gestion des litiges.</p>
            </article>
            <article class="ks-card ks-card--dark">
                <div class="ks-card__meta">Marketing</div>
                <p class="ks-card__text">Stratégie de marque unifiée, site web, médias sociaux, publicité et relations publiques.</p>
            </article>
            <article class="ks-card ks-card--dark">
                <div class="ks-card__meta">Technologies de l'information</div>
                <p class="ks-card__text">Infrastructure informatique, logiciels de gestion de projet, système ERP, cybersécurité.</p>
            </article>
            <article class="ks-card ks-card--dark">
                <div class="ks-card__meta">Stratégie et acquisitions</div>
                <p class="ks-card__text">Direction stratégique du groupe, acquisitions, allocation des ressources entre filiales.</p>
            </article>
        </div>
    </div>
</section>

<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Vous voulez en savoir plus ?</h2>
        <p>Rencontrez l'équipe et découvrez comment notre structure intégrée peut piloter votre projet.</p>
        <a href="{{ route('contact') }}" class="ks-cta-primary">Nous contacter</a>
    </div>
</section>

@endsection
