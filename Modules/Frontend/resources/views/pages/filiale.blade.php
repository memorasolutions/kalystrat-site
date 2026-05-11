@extends('frontend::layouts.intime')

@section('title', $filiale['nom_court'] . ' | Kalystrat')

@push('meta')
<meta name="description" content="{{ $filiale['nom_court'] }} — {{ $filiale['specialite'] }}. Filiale du groupe Kalystrat à intégration verticale, basée à Québec.">
<link rel="canonical" href="{{ url('/filiales/' . $slug) }}">
<meta property="og:title" content="{{ $filiale['nom_court'] }}">
<meta property="og:description" content="{{ $filiale['tagline'] }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url('/filiales/' . $slug) }}">
@endpush

@push('schema')
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'GeneralContractor',
    'name' => $filiale['nom_legal'],
    'alternateName' => $filiale['nom_court'],
    'parentOrganization' => ['@type' => 'Organization', 'name' => 'Gestion Kalystrat Inc.', 'url' => 'https://kalystrat.ca'],
    'description' => $filiale['specialite'],
    'url' => url('/filiales/' . $slug),
    'areaServed' => ['@type' => 'AdministrativeArea', 'name' => 'Québec, Canada'],
    'address' => ['@type' => 'PostalAddress', 'addressLocality' => 'Québec', 'addressRegion' => 'QC', 'addressCountry' => 'CA'],
    'speakable' => [
        '@type' => 'SpeakableSpecification',
        'cssSelector' => ['h1', '.ks-page-hero__subtitle', '.ks-card__title', '.ks-card__text'],
    ],
    'inLanguage' => 'fr-CA',
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Filiales', 'item' => 'https://kalystrat.ca/filiales'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => $filiale['nom_court'], 'item' => url('/filiales/' . $slug)],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

@php
    $filialeHeroWebp = public_path('intime/images/filiales/' . $slug . '-hero.webp');
    $filialeHeroJpg = public_path('intime/images/filiales/' . $slug . '-hero.jpg');
    $filialeHero = file_exists($filialeHeroWebp) ? $filialeHeroWebp : $filialeHeroJpg;
    $filialeHeroExt = file_exists($filialeHeroWebp) ? 'webp' : 'jpg';
    $filialeHeroExists = file_exists($filialeHero);
@endphp

<header class="ks-page-hero ks-page-hero--photo"
    @if($filialeHeroExists) style="--ks-hero-photo: url('/intime/images/filiales/{{ $slug }}-hero.{{ $filialeHeroExt }}?v={{ filemtime($filialeHero) }}')" @endif>
    <div class="ks-page-hero__overlay" aria-hidden="true"></div>
    <div class="ks-container ks-page-hero__inner">
        <ul class="ks-page-hero__breadcrumb">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li><a href="{{ route('filiales.index') }}">Filiales</a></li>
            <li>{{ $filiale['nom_court'] }}</li>
        </ul>
        <span class="ks-eyebrow ks-page-hero__eyebrow">{{ $filiale['specialite'] }}</span>
        <h1>{{ $filiale['nom_court'] }}</h1>
        <p class="ks-page-hero__subtitle">{{ $filiale['tagline'] }}</p>
    </div>
</header>

<section class="ks-section ks-page-section">
    <div class="ks-container">
        <div class="ks-page-section__intro ks-fade-in">
            <span class="ks-page-section__num" aria-hidden="true">01</span>
            <div class="ks-page-section__heading">
                <span class="ks-eyebrow">Filiale du groupe</span>
                <h2 class="ks-h2">Une expertise pointue dans un système intégré</h2>
                <p class="ks-lead">{{ $filiale['nom_legal'] }} est l’une des six filiales spécialisées de Gestion Kalystrat Inc., groupe québécois de construction à intégration verticale. Notre expertise s’inscrit dans une chaîne complète, de l’excavation à la livraison, garantissant cohérence technique et synergie avec les autres divisions du groupe.</p>
            </div>
        </div>
    </div>
</section>

@php $contentPath = 'frontend::partials.filiale-content.' . $slug; @endphp
@if(view()->exists($contentPath))
    @include($contentPath)
@endif

<section class="ks-section ks-section--alt ks-page-section">
    <div class="ks-container">
        <div class="ks-page-section__intro ks-fade-in">
            <span class="ks-page-section__num" aria-hidden="true">02</span>
            <div class="ks-page-section__heading">
                <span class="ks-eyebrow">Services offerts</span>
                <h2 class="ks-h2">Notre offre de services</h2>
                <p class="ks-lead">Liste exhaustive des prestations exécutées par les équipes {{ $filiale['nom_court'] }}, sous le contrôle qualité du groupe.</p>
            </div>
        </div>
        <div class="ks-bento ks-bento--3col">
            @foreach($filiale['services'] as $i => $service)
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Service</span>
                <h3 class="ks-card__title">{{ $service }}</h3>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-section ks-page-section">
    <div class="ks-container">
        <div class="ks-page-section__intro ks-fade-in">
            <span class="ks-page-section__num" aria-hidden="true">03</span>
            <div class="ks-page-section__heading">
                <span class="ks-eyebrow">Pour qui et comment</span>
                <h2 class="ks-h2">Clientèle ciblée et modèle d’affaires</h2>
            </div>
        </div>
        <div class="ks-bento ks-bento--2col ks-fade-in" style="align-items:start">
            <article class="ks-card ks-card--accent-navy">
                <span class="ks-eyebrow">Pour qui</span>
                <h3 class="ks-card__title">Clientèle cible</h3>
                <p class="ks-card__text">{{ $filiale['cibles'] }}</p>
            </article>
            <article class="ks-card ks-card--accent-navy">
                <span class="ks-eyebrow">Modèle d’affaires</span>
                <h3 class="ks-card__title">Comment nous travaillons</h3>
                <p class="ks-card__text">{{ $filiale['modele'] }}</p>
            </article>
        </div>
    </div>
</section>

<section class="ks-section ks-section--dark ks-page-section ks-page-section--dark">
    <div class="ks-container">
        <div class="ks-page-section__intro ks-fade-in">
            <span class="ks-page-section__num" aria-hidden="true">04</span>
            <div class="ks-page-section__heading">
                <span class="ks-eyebrow">Intégration verticale</span>
                <h2 class="ks-h2">Synergies avec les autres filiales</h2>
                <p class="ks-lead" style="color:rgba(255,255,255,0.85)">Sur un même chantier, {{ $filiale['nom_court'] }} collabore quotidiennement avec les cinq autres filiales du groupe pour livrer un projet cohérent du sous-sol au toit.</p>
            </div>
        </div>
        <div class="ks-bento ks-bento--3col">
            @foreach(\Modules\Frontend\Http\Controllers\FilialeController::FILIALES as $other_slug => $other_f)
                @if($other_slug !== $slug)
                <article class="ks-card ks-card--dark">
                    <span class="ks-eyebrow" style="color:var(--ks-gold-500)">Filiale</span>
                    <h3 class="ks-card__title"><a href="{{ route('filiale', $other_slug) }}">{{ $other_f['nom_court'] }}</a></h3>
                    <p class="ks-card__text">{{ $other_f['specialite'] }}</p>
                    <div class="ks-card__cta"><a href="{{ route('filiale', $other_slug) }}" class="ks-cta-secondary" style="color:var(--ks-white);border-color:var(--ks-gold-500)">Découvrir</a></div>
                </article>
                @endif
            @endforeach
        </div>
    </div>
</section>

<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Discutons de votre projet {{ Str::lower($filiale['specialite']) }}</h2>
        <p>Visite, prise de mesures, étude technique et soumission détaillée sous 5 à 10 jours ouvrables pour le résidentiel.</p>
        <a href="{{ route('contact') }}" class="ks-cta-primary">Obtenir une soumission</a>
    </div>
</section>

@endsection
