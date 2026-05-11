@extends('frontend::layouts.intime')

@section('title', 'Crédits et mentions | Kalystrat')

@push('meta')
<meta name="description" content="Crédits du site kalystrat.ca : photographies sous licence Pexels, polices Akzidenz Grotesk, frameworks open source. Conformité Loi 25 et mentions tierces.">
<link rel="canonical" href="{{ url('/credits') }}">
<meta name="robots" content="index, follow">
@endpush

@push('schema')
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'AboutPage',
    'name' => 'Crédits Kalystrat',
    'url' => url('/credits'),
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Crédits', 'item' => 'https://kalystrat.ca/credits'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<x-frontend::page-hero
    photo="/intime/images/pages/glossaire-hero.webp"
    eyebrow="Transparence"
    title="Crédits et mentions du site"
    subtitle="Thèmes, polices, bibliothèques et services qui font fonctionner kalystrat.ca, ainsi que les équipes de conception."
>
    <x-slot:breadcrumb>
        <li><a href="{{ url('/') }}">Accueil</a></li>
        <li>Crédits</li>
    </x-slot:breadcrumb>
</x-frontend::page-hero>

@php
$credits = [
    ['e' => '01', 't' => 'Thème et design', 'd' => "Le site utilise comme base le thème HTML InTime (Bootstrap, jQuery, Owl Carousel) personnalisé pour Gestion Kalystrat Inc. Design system maison « ks-* » (navy/gold, Bento 2026)."],
    ['e' => '02', 't' => 'Photographies', 'd' => "Photos de placeholder fournies par le thème InTime. Les photos réelles des chantiers et de l’équipe Kalystrat seront ajoutées progressivement."],
    ['e' => '03', 't' => 'Polices', 'd' => "Akzidenz Grotesk (Adobe Fonts / Berthold), Libre Caslon Text et Roboto. Licences commerciales valides."],
    ['e' => '04', 't' => 'Bibliothèques tierces', 'd' => "Laravel 12 (MIT), Bootstrap (MIT), jQuery (MIT), Owl Carousel (MIT), Remix Icon (Apache 2.0)."],
    ['e' => '05', 't' => 'Hébergement', 'd' => "Hébergement web cPanel, CDN Cloudflare, serveurs au Canada. Sauvegardes automatisées quotidiennes."],
    ['e' => '06', 't' => 'Conception et développement', 'd' => "Conception et développement par MEMORA solutions pour Gestion Kalystrat Inc."],
];
@endphp

<section class="ks-section ks-section--alt">
    <div class="ks-container">
        <div class="ks-bento ks-bento--2col">
            @foreach($credits as $c)
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">{{ $c['e'] }}</span>
                <h3 class="ks-card__title">{{ $c['t'] }}</h3>
                <p class="ks-card__text">{{ $c['d'] }}</p>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Une question sur le site&nbsp;?</h2>
        <p>Pour toute remarque sur les crédits, le contenu ou la conformité, contactez l’équipe.</p>
        <a href="{{ route('contact') }}" class="ks-cta-primary">Nous écrire</a>
    </div>
</section>

@endsection
