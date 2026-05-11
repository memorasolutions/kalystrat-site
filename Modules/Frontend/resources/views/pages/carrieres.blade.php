@extends('frontend::layouts.intime')

@section('title', 'Carrières en construction au Québec | Kalystrat')

@push('meta')
<meta name="description" content="Travailler chez Kalystrat : six filiales spécialisées, main-d’œuvre CCQ, formation continue, projets diversifiés au Québec. Postulez via Kalystrat Placement Construction.">
<link rel="canonical" href="{{ url('/carrieres') }}">
@endpush

@push('schema')
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'AboutPage',
    'name' => 'Carrières Kalystrat',
    'url' => url('/carrieres'),
    'description' => 'Opportunités de carrière en construction au Québec via Kalystrat Placement Construction',
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Carrières', 'item' => 'https://kalystrat.ca/carrieres'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<header class="ks-page-hero ks-page-hero--photo" style="--ks-hero-photo: url('/intime/images/pages/carrieres-hero.webp')">
    <div class="ks-page-hero__overlay" aria-hidden="true"></div>
    <div class="ks-container ks-page-hero__inner">
        <ul class="ks-page-hero__breadcrumb">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>Carrières</li>
        </ul>
        <span class="ks-eyebrow ks-page-hero__eyebrow">Rejoindre l’équipe</span>
        <h1>Carrières chez Kalystrat</h1>
        <p class="ks-page-hero__subtitle">Le secteur de la construction au Québec compte plus de 11 000 postes vacants. Apprenti, compagnon expérimenté ou cadre de chantier&nbsp;: nous avons probablement une opportunité pour vous.</p>
    </div>
</header>

<section class="ks-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left">
            <span class="ks-eyebrow">Rejoignez l’équipe</span>
            <h2 class="ks-h2">Construire votre carrière dans la construction</h2>
            <p class="ks-lead">Kalystrat Placement Construction recrute en continu pour les six filiales du groupe et pour les entreprises partenaires. Nous valorisons l’apprentissage progressif, la promotion interne et la stabilité d’emploi.</p>
        </div>
    </div>
</section>

@php
$avantages = [
    ['t' => 'Diversité de projets', 'd' => "Résidentiel, commercial, institutionnel, industriel, municipal — vous ne ferez jamais deux fois le même chantier."],
    ['t' => 'Formation continue', 'd' => "Programmes CCQ, formations sécurité, mises à jour techniques. L’évolution professionnelle fait partie du contrat."],
    ['t' => 'Salaire compétitif', 'd' => "Échelle salariale CCQ + bonus de performance. Avantages sociaux complets pour les postes permanents."],
    ['t' => 'Stabilité d’emploi', 'd' => "Six filiales internes assurent un flux continu de chantiers. Moins de mises à pied saisonnières que la moyenne du secteur."],
    ['t' => 'Proximité géographique', 'd' => "Sauf cas spéciaux, nos chantiers sont à distance raisonnable de Québec. Moins de déplacements, plus de qualité de vie."],
    ['t' => 'Évolution interne', 'd' => "Apprenti aujourd’hui, compagnon dans 4 ans, contremaître dans 8 ans. Nous priorisons les promotions internes."],
];

$metiers = [
    'Charpentier-menuisier', 'Briqueteur-maçon', 'Plâtrier-tireur de joints', 'Peintre',
    'Couvreur', 'Ferrailleur', 'Cimentier-applicateur', 'Opérateur d’équipement lourd',
    'Électricien (en partenariat)', 'Plombier (en partenariat)', 'Manœuvre spécialisé',
    'Estimateur', 'Chargé de projet', 'Contremaître', 'Surintendant',
];
@endphp

<section class="ks-section ks-section--alt">
    <div class="ks-container">
        <div class="ks-section__heading">
            <span class="ks-eyebrow">Pourquoi Kalystrat</span>
            <h2 class="ks-h2">Six raisons de nous rejoindre</h2>
        </div>
        <div class="ks-bento ks-bento--3col">
            @foreach($avantages as $i => $a)
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Avantage</span>
                <h3 class="ks-card__title">{{ $a['t'] }}</h3>
                <p class="ks-card__text">{{ $a['d'] }}</p>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-section ks-section--dark">
    <div class="ks-container">
        <div class="ks-section__heading">
            <span class="ks-eyebrow">Postes recherchés</span>
            <h2 class="ks-h2">Métiers en demande</h2>
            <p class="ks-lead" style="color:rgba(255,255,255,0.85)">Les quinze profils les plus sollicités sur nos chantiers. Si votre métier n’y figure pas, envoyez-nous quand même votre candidature.</p>
        </div>
        <div class="ks-bento ks-bento--3col">
            @foreach($metiers as $i => $m)
            <article class="ks-card ks-card--dark" style="padding:18px 22px">
                <div class="ks-card__meta" style="color:var(--ks-gold-500)">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</div>
                <p class="ks-card__text" style="margin:0;font-weight:500;color:var(--ks-white);font-family:var(--ks-font-display);font-size:1.125rem">{{ $m }}</p>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Envoyer votre candidature</h2>
        <p>Courriel direct&nbsp;: <a href="mailto:carrieres@kalystrat.ca" style="color:var(--ks-gold-500);text-decoration:underline">carrieres@kalystrat.ca</a>. Réponse sous 5 jours ouvrables.</p>
        <a href="{{ route('contact') }}" class="ks-cta-primary">Postuler maintenant</a>
    </div>
</section>

@endsection
