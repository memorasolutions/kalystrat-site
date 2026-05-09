@extends('frontend::layouts.intime')

@section('title', 'Blog construction et immobilier au Québec | Kalystrat')

@php $articles = \Modules\Frontend\Http\Controllers\PageController::ARTICLES; @endphp

@push('meta')
<meta name="description" content="Articles d’experts Kalystrat sur la construction et l’immobilier au Québec en 2026 : Code de construction, multilogements, choix d’entrepreneur, intégration verticale.">
<link rel="canonical" href="{{ url('/blog') }}">
@endpush

@push('schema')
<script type="application/ld+json">@php
$itemList = [];
$pos = 1;
foreach ($articles as $aslug => $a) {
    $itemList[] = [
        '@type' => 'ListItem',
        'position' => $pos++,
        'item' => [
            '@type' => 'Article',
            'headline' => $a['titre'],
            'url' => url('/blog/' . $aslug),
            'datePublished' => $a['date'],
        ],
    ];
}
echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Blog',
    'name' => 'Blog Kalystrat',
    'url' => url('/blog'),
    'description' => 'Articles experts construction et immobilier au Québec',
    'publisher' => ['@type' => 'Organization', 'name' => 'Gestion Kalystrat Inc.', 'url' => 'https://kalystrat.ca'],
    'blogPost' => $itemList,
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
@endphp</script>
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
                    <p>Notre blog rassemble les analyses de marché, les évolutions réglementaires et les conseils pratiques pour les promoteurs, propriétaires, investisseurs et candidats. Chaque article est rédigé par notre équipe ou les chargés de projet Kalystrat, à partir des chantiers en cours et des dossiers réels que nous traitons quotidiennement.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ks-content-section" style="padding:60px 0;background:#f7f7f7">
    <div class="auto-container">
        <div class="row clearfix">
            @foreach($articles as $aslug => $a)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div style="background:#fff;padding:30px;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,0.06);margin-bottom:25px;height:calc(100% - 25px)">
                    <div style="color:#FFA000;font-size:13px;font-weight:600;text-transform:uppercase;letter-spacing:1px;margin-bottom:12px">{{ $a['categorie'] }}</div>
                    <h4><a href="{{ route('blog.show', $aslug) }}">{{ $a['titre'] }}</a></h4>
                    <p style="margin:15px 0 20px;color:#555;line-height:1.6">{{ $a['extrait'] }}</p>
                    <div style="display:flex;justify-content:space-between;align-items:center">
                        <span style="font-size:13px;color:#888">{{ \Carbon\Carbon::parse($a['date'])->locale('fr_CA')->isoFormat('LL') }}</span>
                        <a href="{{ route('blog.show', $aslug) }}" class="theme-btn btn-style-ten"><span class="text-one">Lire</span><span class="text-two">Lire</span></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="call-to-action" style="background:#f7f7f7;padding:60px 0;text-align:center">
    <div class="auto-container">
        <h2 style="margin-bottom:20px">Vous avez un projet de construction ?</h2>
        <a href="{{ route('contact') }}" class="theme-btn btn-style-ten"><div class="btn-wrap"><span class="text-one">Discutons-en</span><span class="text-two">Discutons</span></div></a>
    </div>
</section>

@endsection
