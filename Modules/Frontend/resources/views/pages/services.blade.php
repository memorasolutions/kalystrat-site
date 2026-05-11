@extends('frontend::layouts.intime')

@section('title', 'Services de construction au Québec | Kalystrat')

@push('meta')
<meta name="description" content="Catalogue de services Kalystrat : excavation, fondations, charpente, toiture, finition, immobilier, placement. Six filiales, une marque unifiée au Québec.">
<link rel="canonical" href="{{ url('/services') }}">
<meta property="og:title" content="Services de construction Kalystrat">
<meta property="og:description" content="Six filiales spécialisées : excavation, charpente, toiture, finition, immobilier, placement.">
<meta property="og:type" content="website">
@endpush

@push('schema')
<script type="application/ld+json">@php
$itemList = [];
$pos = 1;
foreach($filiales as $s => $f) {
    foreach($f['services'] as $svc) {
        $itemList[] = ['@type' => 'ListItem', 'position' => $pos++, 'item' => ['@type' => 'Service', 'name' => $svc, 'provider' => ['@type' => 'GeneralContractor', 'name' => $f['nom_court'], 'url' => url('/filiales/' . $s)]]];
    }
}
echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'Services de construction Kalystrat',
    'url' => url('/services'),
    'mainEntity' => ['@type' => 'ItemList', 'itemListElement' => $itemList],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
@endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => 'https://kalystrat.ca/services'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<x-frontend::page-hero
    photo="/intime/images/pages/services-hero.webp"
    eyebrow="Conçu, réalisé, livré"
    title="Tous les métiers de la construction"
    subtitle="Du premier coup de pelle à la pose des dernières moulures, Kalystrat couvre l'intégralité du cycle de construction. Chaque service est exécuté par une de nos six filiales spécialisées."
>
    <x-slot:breadcrumb>
        <li><a href="{{ url('/') }}">Accueil</a></li>
        <li>Services</li>
    </x-slot:breadcrumb>
</x-frontend::page-hero>

@foreach($filiales as $slug => $f)
<section class="ks-section{{ $loop->odd ? ' ks-section--alt' : '' }}">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left">
            <span class="ks-eyebrow">Filiale 0{{ $loop->iteration }} — {{ $f['specialite'] }}</span>
            <h2 class="ks-h2"><a href="{{ route('filiale', $slug) }}" style="color:inherit;text-decoration:none">{{ $f['nom_court'] }}</a></h2>
            <p class="ks-lead">{{ $f['tagline'] }}</p>
        </div>
        <div class="ks-bento ks-bento--3col">
            @foreach($f['services'] as $service)
            <article class="ks-card ks-card--accent-gold" style="padding:20px 24px">
                <p class="ks-card__text" style="margin:0;font-weight:500;color:var(--ks-navy-900)">{{ $service }}</p>
            </article>
            @endforeach
        </div>
        <div style="margin-top:32px">
            <a href="{{ route('filiale', $slug) }}" class="ks-cta-secondary">Découvrir la filiale {{ $f['nom_court'] }}</a>
        </div>
    </div>
</section>
@endforeach

<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Un service que vous cherchez ?</h2>
        <p>Décrivez-nous votre projet (résidentiel, commercial, institutionnel) et obtenez une soumission détaillée sous 5 à 10 jours ouvrables.</p>
        <a href="{{ route('contact') }}" class="ks-cta-primary">Obtenir une soumission</a>
    </div>
</section>

@endsection
