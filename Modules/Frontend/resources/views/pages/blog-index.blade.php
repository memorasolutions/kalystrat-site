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

<header class="ks-page-hero">
    <div class="ks-container">
        <ul class="ks-page-hero__breadcrumb">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>Blog</li>
        </ul>
        <h1>Blog Kalystrat</h1>
        <p class="ks-page-hero__subtitle">Analyses de marché, évolutions réglementaires et conseils pratiques pour les promoteurs, propriétaires, investisseurs et candidats à l’embauche au Québec.</p>
    </div>
</header>

<section class="ks-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left">
            <span class="ks-eyebrow">Articles experts</span>
            <h2 class="ks-h2">Construction et immobilier au Québec</h2>
            <p class="ks-lead">Chaque article est rédigé par notre équipe ou les chargés de projet Kalystrat, à partir des chantiers en cours et des dossiers réels que nous traitons quotidiennement.</p>
        </div>
    </div>
</section>

<section class="ks-section ks-section--alt">
    <div class="ks-container">
        <div class="ks-bento ks-bento--3col">
            @foreach($articles as $aslug => $a)
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">{{ $a['categorie'] }}</span>
                <h3 class="ks-card__title"><a href="{{ route('blog.show', $aslug) }}">{{ $a['titre'] }}</a></h3>
                <p class="ks-card__text">{{ $a['extrait'] }}</p>
                <div class="ks-card__cta" style="display:flex;justify-content:space-between;align-items:center;gap:1rem">
                    <span style="font-size:0.875rem;color:var(--ks-gray-500)">{{ \Carbon\Carbon::parse($a['date'])->locale('fr_CA')->isoFormat('LL') }}</span>
                    <a href="{{ route('blog.show', $aslug) }}" class="ks-cta-secondary">Lire l’article</a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Vous avez un projet de construction&nbsp;?</h2>
        <p>Discutez avec un chargé de projet Kalystrat. Soumission gratuite, conseil intégré sur les six métiers du groupe.</p>
        <a href="{{ route('contact') }}" class="ks-cta-primary">Discutons-en</a>
    </div>
</section>

@endsection
