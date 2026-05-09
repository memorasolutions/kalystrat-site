@extends('frontend::layouts.intime')

@section('title', 'Partenaires et écosystème | Kalystrat')

@push('meta')
<meta name="description" content="Partenaires Kalystrat : architectes, designers, ingénieurs, promoteurs immobiliers, courtiers, sous-traitants spécialisés. Écosystème collaboratif au Québec.">
<link rel="canonical" href="{{ url('/partenaires') }}">
@endpush

@push('schema')
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'AboutPage',
    'name' => 'Partenaires Kalystrat',
    'url' => url('/partenaires'),
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Partenaires', 'item' => 'https://kalystrat.ca/partenaires'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<section class="page-title" style="background-image:url(/intime/images/background/2.jpg)">
    <div class="auto-container">
        <h1>Partenaires</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>Partenaires</li>
        </ul>
    </div>
</section>

<section class="about-section-two">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 content-column">
                <div class="sec-title">
                    <span class="sub-title">Écosystème de la construction</span>
                    <h2>Construire ensemble, mieux et plus vite</h2>
                </div>
                <div class="text">
                    <p>L'intégration verticale de Kalystrat n'élimine pas la collaboration : elle la rend plus efficace. Nous travaillons avec un réseau d'architectes, de designers, d'ingénieurs et de promoteurs qui apportent leur expertise spécifique à nos projets.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@php
$types = [
    ['t' => 'Architectes et designers', 'd' => "Bureaux d'architecture résidentiels et commerciaux, designers d'intérieur, urbanistes. Nous accompagnons leurs concepts de la planche à dessin jusqu'à la livraison."],
    ['t' => 'Ingénieurs', 'd' => "Génie civil, structural, mécanique, électrique, environnemental. Nos chargés de projet coordonnent les disciplines pour livrer un bâtiment conforme et performant."],
    ['t' => 'Promoteurs immobiliers', 'd' => "Développement résidentiel, commercial et mixte. Kalystrat exécute les projets de promoteurs externes en plus des projets internes via Kalystrat Immobilier."],
    ['t' => 'Courtiers et investisseurs', 'd' => "Courtiers immobiliers, fonds d'investissement immobilier, investisseurs privés. Conseil et exécution sur acquisitions, rénovations et reventes."],
    ['t' => 'Fournisseurs spécialisés', 'd' => "Béton, charpente, menuiserie, fenêtres, mécanique du bâtiment. Relations long terme garantissant qualité et délais."],
    ['t' => 'Sous-traitants ciblés', 'd' => "Pour les services hors expertise (climatisation industrielle, levage spécialisé), nous travaillons avec des sous-traitants sélectionnés sur leur fiabilité."],
];
@endphp

<section class="feature-section-four" style="background-color:#f7f7f7;padding:60px 0">
    <div class="auto-container">
        <div class="row clearfix">
            @foreach($types as $t)
            <div class="feature-block_four col-lg-6 col-md-12 col-sm-12">
                <div class="inner-box" style="background:#fff;padding:30px;border-radius:8px;margin-bottom:25px;border-left:4px solid #FFA000">
                    <h4>{{ $t['t'] }}</h4>
                    <div class="text" style="margin-top:10px">{{ $t['d'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="call-to-action" style="background:#f7f7f7;padding:60px 0;text-align:center">
    <div class="auto-container">
        <h2 style="margin-bottom:20px">Devenir partenaire Kalystrat ?</h2>
        <a href="{{ route('contact') }}" class="theme-btn btn-style-ten"><div class="btn-wrap"><span class="text-one">Discutons-en</span><span class="text-two">Discutons</span></div></a>
    </div>
</section>

@endsection
