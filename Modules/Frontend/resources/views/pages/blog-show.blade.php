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

<section class="page-title" style="background-image:url(/intime/images/background/2.jpg)">
    <div class="auto-container">
        <h1 style="max-width:900px">{{ $article['titre'] }}</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li><a href="{{ route('blog.index') }}">Blog</a></li>
            <li>{{ $article['categorie'] }}</li>
        </ul>
    </div>
</section>

<section class="ks-content-section" style="padding:60px 0">
    <div class="auto-container" style="max-width:820px">
        <div style="margin-bottom:25px;color:#888;font-size:14px">
            <span>{{ \Carbon\Carbon::parse($article['date'])->locale('fr_CA')->isoFormat('LL') }}</span>
            <span style="margin:0 10px">·</span>
            <span>{{ $article['categorie'] }}</span>
        </div>
        <article>
            @php $articleContent = 'frontend::partials.blog-content.' . $slug; @endphp
            @if(view()->exists($articleContent))
                @include($articleContent)
            @endif
        </article>
    </div>
</section>

<section class="ks-content-section" style="padding:60px 0;background:#f7f7f7">
    <div class="auto-container">
        <h2 style="text-align:center;margin-bottom:40px">Autres articles</h2>
        <div class="row clearfix">
            @php $other = collect(\Modules\Frontend\Http\Controllers\PageController::ARTICLES)->except($slug)->take(3); @endphp
            @foreach($other as $oslug => $a)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div style="background:#fff;padding:25px;border-radius:8px;margin-bottom:20px">
                    <div style="color:#FFA000;font-size:13px;font-weight:600;text-transform:uppercase;margin-bottom:10px">{{ $a['categorie'] }}</div>
                    <h4><a href="{{ route('blog.show', $oslug) }}">{{ $a['titre'] }}</a></h4>
                    <p style="margin-top:12px;color:#555">{{ $a['extrait'] }}</p>
                    <div style="margin-top:18px"><a href="{{ route('blog.show', $oslug) }}" class="theme-btn btn-style-ten"><span class="text-one">Lire l’article</span><span class="text-two">Lire</span></a></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
