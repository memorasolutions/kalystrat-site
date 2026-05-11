@extends('frontend::layouts.intime')

@section('title', $article['titre'] . ' | Blog Kalystrat')

@push('meta')
<meta name="description" content="{{ $article['extrait'] }}">
<link rel="canonical" href="{{ url('/blog/' . $slug) }}">
<meta property="og:title" content="{{ $article['titre'] }}">
<meta property="og:description" content="{{ $article['extrait'] }}">
<meta property="og:type" content="article">
<meta property="og:url" content="{{ url('/blog/' . $slug) }}">
<meta property="article:published_time" content="{{ $article['date'] }}T08:00:00-04:00">
<meta property="article:section" content="{{ $article['categorie'] }}">
@endpush

@push('schema')
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Article',
    'headline' => $article['titre'],
    'description' => $article['extrait'],
    'datePublished' => $article['date'],
    'dateModified' => $article['date'],
    'articleSection' => $article['categorie'],
    'url' => url('/blog/' . $slug),
    'author' => ['@type' => 'Organization', 'name' => 'Gestion Kalystrat Inc.', 'url' => 'https://kalystrat.ca'],
    'publisher' => ['@type' => 'Organization', 'name' => 'Gestion Kalystrat Inc.', 'url' => 'https://kalystrat.ca'],
    'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => url('/blog/' . $slug)],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Blog', 'item' => 'https://kalystrat.ca/blog'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => $article['titre'], 'item' => url('/blog/' . $slug)],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<header class="ks-page-hero">
    <div class="ks-container">
        <ul class="ks-page-hero__breadcrumb">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li><a href="{{ route('blog.index') }}">Blog</a></li>
            <li>{{ $article['categorie'] }}</li>
        </ul>
        <span class="ks-eyebrow" style="color:var(--ks-gold-500);margin-bottom:1rem;display:block">{{ $article['categorie'] }}</span>
        <h1>{{ $article['titre'] }}</h1>
        <p class="ks-page-hero__subtitle">{{ \Carbon\Carbon::parse($article['date'])->locale('fr_CA')->isoFormat('LL') }} &middot; Lecture estimée 6 à 9 minutes</p>
    </div>
</header>

<section class="ks-section">
    <div class="ks-container" style="max-width:780px">
        <article class="ks-article-content" style="font-family:var(--ks-font-body);font-size:var(--ks-body-size);line-height:var(--ks-line-height);color:var(--ks-gray-700)">
            @php $articleContent = 'frontend::partials.blog-content.' . $slug; @endphp
            @if(view()->exists($articleContent))
                @include($articleContent)
            @endif
        </article>
    </div>
</section>

<section class="ks-section ks-section--alt">
    <div class="ks-container">
        <div class="ks-section__heading">
            <span class="ks-eyebrow">Continuer la lecture</span>
            <h2 class="ks-h2">Autres articles</h2>
        </div>
        <div class="ks-bento ks-bento--3col">
            @php $other = collect(\Modules\Frontend\Http\Controllers\PageController::ARTICLES)->except($slug)->take(3); @endphp
            @foreach($other as $oslug => $a)
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">{{ $a['categorie'] }}</span>
                <h3 class="ks-card__title"><a href="{{ route('blog.show', $oslug) }}">{{ $a['titre'] }}</a></h3>
                <p class="ks-card__text">{{ $a['extrait'] }}</p>
                <div class="ks-card__cta"><a href="{{ route('blog.show', $oslug) }}" class="ks-cta-secondary">Lire l’article</a></div>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Prêt à passer à l’action&nbsp;?</h2>
        <p>L’équipe Kalystrat évalue votre projet et propose une stratégie adaptée à vos contraintes budgétaires et réglementaires.</p>
        <a href="{{ route('contact') }}" class="ks-cta-primary">Obtenir une soumission</a>
    </div>
</section>

@endsection
