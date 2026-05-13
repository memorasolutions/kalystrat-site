@extends('frontend::layouts.intime')

@section('title', $filiale['nom_court'] . ' | Kalystrat')

@push('meta')
<meta name="description" content="{{ $filiale['nom_court'] }} — {{ $filiale['specialite'] }}. Filiale du groupe Kalystrat à intégration verticale, basée à Québec.">
<link rel="canonical" href="{{ url('/filiales/' . $slug) }}">
<meta property="og:title" content="{{ $filiale['nom_court'] }}">
<meta property="og:description" content="{{ $filiale['tagline'] }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url('/filiales/' . $slug) }}">
<meta property="og:image" content="{{ url('/intime/images/filiales/' . $slug . '-hero-2026.webp') }}">
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
    'image' => url('/intime/images/filiales/' . $slug . '-hero-2026.webp'),
    'areaServed' => ['@type' => 'AdministrativeArea', 'name' => 'Capitale-Nationale, Québec'],
    'address' => ['@type' => 'PostalAddress', 'addressLocality' => 'Québec', 'addressRegion' => 'QC', 'addressCountry' => 'CA'],
    'hasOfferCatalog' => [
        '@type' => 'OfferCatalog',
        'name' => $filiale['specialite'],
        'itemListElement' => array_map(fn($s) => ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => $s]], $filiale['services']),
    ],
    'speakable' => [
        '@type' => 'SpeakableSpecification',
        'cssSelector' => ['h1', '.ks-page-hero__subtitle', '.ks-card__title', '.ks-kpi__value'],
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

<x-frontend::page-hero
    photo="/intime/images/filiales/{{ $slug }}-hero-2026.webp"
    eyebrow="{{ $filiale['specialite'] }}"
    title="{{ $filiale['nom_court'] }}"
    subtitle="{{ $filiale['tagline'] }}"
>
    <x-slot:breadcrumb>
        <li><a href="{{ url('/') }}">Accueil</a></li>
        <li><a href="{{ route('filiales.index') }}">Filiales</a></li>
        <li>{{ $filiale['nom_court'] }}</li>
    </x-slot:breadcrumb>
</x-frontend::page-hero>

{{-- T198 — Section 01 : Intro pillar + Bento KPI 3 chiffres clés --}}
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

        @if(!empty($filiale['kpi']))
        <div class="ks-bento ks-bento--3col ks-fade-in" style="margin-top:clamp(32px, 4vw, 56px)">
            @foreach($filiale['kpi'] as $k)
            <article class="ks-card ks-card--accent-gold" style="text-align:center;padding:clamp(24px, 3vw, 40px)">
                <div class="ks-stat__number" style="font-size:clamp(2.5rem, 5vw, 4rem);color:var(--ks-navy-900);font-weight:800;line-height:1.05">{!! $k['valeur'] !!}</div>
                <div class="ks-stat__label" style="margin-top:0.5rem;color:var(--ks-gold-aaa);font-weight:600;text-transform:uppercase;letter-spacing:0.08em;font-size:0.8125rem">{{ $k['label'] }}</div>
            </article>
            @endforeach
        </div>
        @endif
    </div>
</section>

{{-- T198 — Contenu spécifique filiale (partial enrichi avec photos) --}}
@php $contentPath = 'frontend::partials.filiale-content.' . $slug; @endphp
@if(view()->exists($contentPath))
    @include($contentPath)
@endif

{{-- T198 — Section 02 : Services Bento 3col --}}
<section class="ks-section ks-section--alt ks-page-section">
    <div class="ks-container">
        <div class="ks-page-section__intro ks-fade-in">
            <span class="ks-page-section__num" aria-hidden="true">02</span>
            <div class="ks-page-section__heading">
                <span class="ks-eyebrow">Services offerts</span>
                <h2 class="ks-h2">Notre offre de services</h2>
                <p class="ks-lead">Prestations exécutées par les équipes {{ $filiale['nom_court'] }}, sous le contrôle qualité du groupe.</p>
            </div>
        </div>
        <div class="ks-bento ks-bento--3col">
            @foreach($filiale['services'] as $service)
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Service</span>
                <h3 class="ks-card__title">{{ $service }}</h3>
            </article>
            @endforeach
        </div>
    </div>
</section>

{{-- T198 — Section 03 : Pour qui + Comment (Bento 2col) --}}
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

{{-- T198 — Section 04 : Synergies (3 filiales connexes, pas 5) --}}
@php
$synergiesSlugs = $filiale['synergies'] ?? array_diff(array_keys(\Modules\Frontend\Http\Controllers\FilialeController::FILIALES), [$slug]);
@endphp
<section class="ks-section ks-section--dark ks-page-section ks-page-section--dark">
    <div class="ks-container">
        <div class="ks-page-section__intro ks-fade-in">
            <span class="ks-page-section__num" aria-hidden="true">04</span>
            <div class="ks-page-section__heading">
                <span class="ks-eyebrow">Intégration verticale</span>
                <h2 class="ks-h2">Synergies avec les filiales du groupe</h2>
                <p class="ks-lead" style="color:rgba(255,255,255,0.85)">Sur un même chantier, {{ $filiale['nom_court'] }} collabore quotidiennement avec ces filiales connexes pour livrer un projet cohérent.</p>
            </div>
        </div>
        <div class="ks-bento ks-bento--3col">
            @foreach($synergiesSlugs as $synergie_slug)
                @php $other_f = \Modules\Frontend\Http\Controllers\FilialeController::FILIALES[$synergie_slug] ?? null; @endphp
                @if($other_f)
                <article class="ks-card ks-card--dark">
                    <span class="ks-eyebrow" style="color:var(--ks-gold-500)">Filiale connexe</span>
                    <h3 class="ks-card__title"><a href="{{ route('filiale', $synergie_slug) }}">{{ $other_f['nom_court'] }}</a></h3>
                    <p class="ks-card__text">{{ $other_f['specialite'] }}</p>
                    <div class="ks-card__cta"><a href="{{ route('filiale', $synergie_slug) }}" class="ks-cta-secondary" style="color:var(--ks-white);border-color:var(--ks-gold-500)">Découvrir</a></div>
                </article>
                @endif
            @endforeach
        </div>
    </div>
</section>

{{-- T198 — CTA enrichi : navy + tel + soumission --}}
<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Discutons de votre projet {{ Str::lower($filiale['specialite']) }}</h2>
        <p>Visite, prise de mesures, étude technique et soumission détaillée sous 5 à 10 jours ouvrables pour le résidentiel.</p>
        <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;margin-top:1.5rem">
            <a href="{{ route('contact') }}" class="ks-cta-primary">Obtenir une soumission</a>
            <a href="tel:+14184760987" class="ks-cta-secondary" aria-label="Appeler Kalystrat au 418 476 0987">418&nbsp;476-0987</a>
        </div>
    </div>
</section>

@endsection
