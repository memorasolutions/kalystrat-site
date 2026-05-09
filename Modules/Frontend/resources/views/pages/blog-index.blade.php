@extends('frontend::layouts.intime')

@section('title', 'Blog construction et immobilier | Kalystrat')

@push('meta')
<meta name="description" content="Articles d'experts sur la construction au Québec : intégration verticale, marché immobilier, normes techniques, gestion de projet. Blog Kalystrat.">
<link rel="canonical" href="{{ url('/blog') }}">
@endpush

@push('schema')
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Blog',
    'name' => 'Blog Kalystrat',
    'url' => url('/blog'),
    'description' => 'Articles experts construction et immobilier au Québec',
    'publisher' => ['@type' => 'Organization', 'name' => 'Gestion Kalystrat Inc.', 'url' => 'https://kalystrat.ca'],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Blog', 'item' => 'https://kalystrat.ca/blog'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<section class="page-title" style="background-image:url(/intime/images/background/2.jpg)">
    <div class="auto-container">
        <h1>Blog Kalystrat</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>Blog</li>
        </ul>
    </div>
</section>

<section class="about-section-two">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 content-column">
                <div class="sec-title">
                    <span class="sub-title">Articles experts</span>
                    <h2>Construction et immobilier au Québec</h2>
                </div>
                <div class="text">
                    <p>Notre blog partage les apprentissages de chantier, les évolutions du marché immobilier québécois, les nouveautés réglementaires et les retours d'expérience de notre équipe. Articles publiés régulièrement par les chargés de projet, l'équipe immobilière et la direction.</p>
                    <p style="margin-top:20px"><em>Premiers articles à paraître prochainement.</em></p>
                </div>
            </div>
        </div>
    </div>
</section>

@php
$themes = [
    'Marché immobilier Québec',
    'Innovation en construction',
    'Réglementation et conformité',
    'Études de cas chantier',
    'Recrutement et formation',
    'Développement durable',
];
@endphp

<section class="feature-section-four" style="background-color:#f7f7f7;padding:60px 0">
    <div class="auto-container">
        <div class="sec-title centered">
            <span class="sub-title">Bientôt</span>
            <h2>Thématiques à venir</h2>
        </div>
        <div class="row clearfix">
            @foreach($themes as $t)
            <div class="feature-block_four col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box" style="background:#fff;padding:25px;border-radius:8px;margin-bottom:20px;text-align:center">
                    <h5>{{ $t }}</h5>
                    <div style="margin-top:10px;color:#888"><em>Articles à venir</em></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
