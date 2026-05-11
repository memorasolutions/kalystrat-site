@extends('frontend::layouts.intime')

@section('title', 'Projets et réalisations | Kalystrat')

@push('meta')
<meta name="description" content="Réalisations Kalystrat : projets résidentiels, commerciaux et institutionnels au Québec. Galerie de chantiers livrés par les six filiales du holding.">
<link rel="canonical" href="{{ url('/projets') }}">
@endpush

@push('schema')
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'Projets Kalystrat',
    'url' => url('/projets'),
    'description' => 'Études de cas et chantiers livrés par les filiales Kalystrat',
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Projets', 'item' => 'https://kalystrat.ca/projets'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<header class="ks-page-hero">
    <div class="ks-container">
        <ul class="ks-page-hero__breadcrumb">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>Projets</li>
        </ul>
        <h1>Projets et réalisations</h1>
        <p class="ks-page-hero__subtitle">Maisons custom, condominiums, bâtiments commerciaux et institutionnels&nbsp;: nos chantiers en cours et livrés par les six filiales Kalystrat.</p>
    </div>
</header>

<section class="ks-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left">
            <span class="ks-eyebrow">Études de cas</span>
            <h2 class="ks-h2">Une sélection de nos chantiers</h2>
            <p class="ks-lead">Cette galerie présente quelques-uns de nos projets emblématiques. Les photos détaillées seront ajoutées progressivement à mesure que les phases de construction se terminent. <em>Pour visualiser des projets en cours, contactez-nous directement.</em></p>
        </div>
    </div>
</section>

@php
$categories = [
    ['t' => 'Résidentiel haut de gamme', 'd' => "Maisons custom de 250 à 800 m², villas de prestige, propriétés de bord de fleuve. Architecture contemporaine ou classique, finition haut de gamme."],
    ['t' => 'Multilogements', 'd' => "Condominiums urbains, immeubles locatifs 6 à 60 unités, projets intergénérationnels. Optimisation densité et viabilité financière."],
    ['t' => 'Commercial bureaux', 'd' => "Édifices de bureaux LEED, commerces de détail, restaurants, espaces de coworking. Délais serrés et qualité d’exécution irréprochable."],
    ['t' => 'Institutionnel scolaire', 'd' => "Écoles primaires et secondaires, pavillons collégiaux et universitaires, installations sportives. Conformité Code 2026 et standards MEQ."],
    ['t' => 'Industriel logistique', 'd' => "Entrepôts grande surface, centres de distribution, ateliers de production. Charpente acier ou béton préfabriqué, dalles renforcées."],
    ['t' => 'Rénovations majeures', 'd' => "Transformations de bâtiments existants, agrandissements, mise aux normes énergétiques. Diagnostic, plans, permis, exécution complète."],
];
@endphp

<section class="ks-section ks-section--alt">
    <div class="ks-container">
        <div class="ks-section__heading">
            <span class="ks-eyebrow">Six segments d’expertise</span>
            <h2 class="ks-h2">Catégories de projets</h2>
            <p class="ks-lead">Chaque catégorie mobilise une combinaison spécifique de filiales Kalystrat selon les besoins du chantier.</p>
        </div>
        <div class="ks-bento ks-bento--3col">
            @foreach($categories as $i => $cat)
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Segment {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                <h3 class="ks-card__title">{{ $cat['t'] }}</h3>
                <p class="ks-card__text">{{ $cat['d'] }}</p>
                <div class="ks-card__meta" style="color:var(--ks-gray-500);text-transform:none;letter-spacing:0;font-weight:500;font-style:italic">Études de cas à venir</div>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Discutons de votre projet</h2>
        <p>Visite du site, prise de mesures, étude des plans et soumission détaillée sous 5 à 10 jours ouvrables pour le résidentiel.</p>
        <a href="{{ route('contact') }}" class="ks-cta-primary">Démarrer la conversation</a>
    </div>
</section>

@endsection
