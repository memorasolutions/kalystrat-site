@extends('frontend::layouts.intime')

@section('title', 'Carrières en construction au Québec | Kalystrat')

@push('meta')
<meta name="description" content="Travailler chez Kalystrat : six filiales spécialisées, main-d'œuvre CCQ, formation continue, projets diversifiés au Québec. Postulez via Kalystrat Placement Construction.">
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

<section class="page-title" style="background-image:url(/intime/images/background/2.jpg)">
    <div class="auto-container">
        <h1>Carrières chez Kalystrat</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>Carrières</li>
        </ul>
    </div>
</section>

<section class="about-section-two">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 content-column">
                <div class="sec-title">
                    <span class="sub-title">Rejoignez l’équipe</span>
                    <h2>Construire votre carrière dans la construction</h2>
                </div>
                <div class="text">
                    <p>Le secteur de la construction au Québec compte plus de 11 000 postes vacants. Kalystrat Placement Construction recrute en continu pour ses six filiales et pour des entreprises partenaires. Que vous soyez apprenti, compagnon expérimenté ou cadre de chantier, nous avons probablement une opportunité pour vous.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@php
$avantages = [
    ['t' => 'Diversité de projets', 'd' => "Résidentiel, commercial, institutionnel, industriel, municipal — vous ne ferez jamais deux fois le même chantier."],
    ['t' => 'Formation continue', 'd' => "Programmes CCQ, formations sécurité, mises à jour techniques. L'évolution professionnelle fait partie du contrat."],
    ['t' => 'Salaire compétitif', 'd' => "Échelle salariale CCQ + bonus de performance. Avantages sociaux complets pour les postes permanents."],
    ['t' => 'Stabilité d\'emploi', 'd' => "Six filiales internes assurent un flux continu de chantiers. Moins de mises à pied saisonnières que la moyenne du secteur."],
    ['t' => 'Proximité géographique', 'd' => "Sauf cas spéciaux, nos chantiers sont à distance raisonnable de Québec. Moins de déplacements, plus de qualité de vie."],
    ['t' => 'Évolution interne', 'd' => "Apprenti aujourd'hui, compagnon dans 4 ans, contremaître dans 8 ans. Nous priorisons les promotions internes."],
];

$metiers = [
    'Charpentier-menuisier', 'Briqueteur-maçon', 'Plâtrier-tireur de joints', 'Peintre',
    'Couvreur', 'Ferrailleur', 'Cimentier-applicateur', 'Opérateur d\'équipement lourd',
    'Électricien (en partenariat)', 'Plombier (en partenariat)', 'Manœuvre spécialisé',
    'Estimateur', 'Chargé de projet', 'Contremaître', 'Surintendant',
];
@endphp

<section class="feature-section-four" style="background-color:#f7f7f7;padding:60px 0">
    <div class="auto-container">
        <div class="sec-title centered">
            <span class="sub-title">Pourquoi Kalystrat</span>
            <h2>Six raisons de nous rejoindre</h2>
        </div>
        <div class="row clearfix">
            @foreach($avantages as $a)
            <div class="feature-block_four col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box" style="background:#fff;padding:25px;border-radius:8px;margin-bottom:20px">
                    <h5>{{ $a['t'] }}</h5>
                    <div class="text" style="margin-top:10px">{{ $a['d'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="about-section-two">
    <div class="auto-container">
        <div class="sec-title">
            <span class="sub-title">Postes recherchés</span>
            <h2>Métiers en demande</h2>
        </div>
        <div class="row clearfix">
            @foreach($metiers as $m)
            <div class="col-lg-4 col-md-6 col-sm-12" style="margin-bottom:10px">
                <div style="padding:12px 18px;background:#f7f7f7;border-left:3px solid #FFA000">{{ $m }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="call-to-action" style="background:#f7f7f7;padding:60px 0;text-align:center">
    <div class="auto-container">
        <h2 style="margin-bottom:15px">Envoyer votre candidature</h2>
        <p style="margin-bottom:20px">Courriel : <a href="mailto:carrieres@kalystrat.ca">carrieres@kalystrat.ca</a></p>
        <a href="{{ route('contact') }}" class="theme-btn btn-style-ten"><div class="btn-wrap"><span class="text-one">Postuler maintenant</span><span class="text-two">Postuler</span></div></a>
    </div>
</section>

@endsection
