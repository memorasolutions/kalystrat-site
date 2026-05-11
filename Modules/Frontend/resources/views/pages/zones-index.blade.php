@extends('frontend::layouts.intime')

@section('title', 'Zones desservies au Québec | Kalystrat')

@php
$zones = [
    'quebec' => ['nom' => 'Québec', 'desc' => 'Capitale nationale, siège social Kalystrat. Couverture complète résidentiel, commercial, institutionnel.'],
    'levis' => ['nom' => 'Lévis', 'desc' => 'Rive-Sud du Saint-Laurent. Projets résidentiels et multilogements en croissance.'],
    'sainte-foy' => ['nom' => 'Sainte-Foy', 'desc' => 'Secteur ouest de Québec. Spécialités finition haut de gamme et institutionnel.'],
    'beauport' => ['nom' => 'Beauport', 'desc' => 'Est de Québec. Constructions neuves et rénovations résidentielles.'],
    'sillery' => ['nom' => 'Sillery', 'desc' => 'Quartier patrimonial. Rénovations haut de gamme et adaptations historiques.'],
    'trois-rivieres' => ['nom' => 'Trois-Rivières', 'desc' => 'Mauricie. Couverture commerciale et résidentielle ciblée.'],
    'saguenay' => ['nom' => 'Saguenay', 'desc' => 'Saguenay-Lac-Saint-Jean. Projets industriels et institutionnels.'],
    'montreal' => ['nom' => 'Montréal', 'desc' => 'Métropole. Projets d’envergure commerciaux et institutionnels.'],
    'laval' => ['nom' => 'Laval', 'desc' => 'Région métropolitaine. Multilogements et commercial.'],
];
@endphp

@push('meta')
<meta name="description" content="Zones desservies par Kalystrat au Québec : Québec, Lévis, Sainte-Foy, Beauport, Sillery, Trois-Rivières, Saguenay, Montréal, Laval. Construction résidentielle, commerciale et institutionnelle.">
<link rel="canonical" href="{{ url('/zones-desservies') }}">
@endpush

@push('schema')
<script type="application/ld+json">@php
$itemList = [];
$pos = 1;
foreach($zones as $slug => $z) {
    $itemList[] = ['@type' => 'ListItem', 'position' => $pos++, 'name' => $z['nom'], 'url' => url('/zones-desservies/' . $slug)];
}
echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'Zones desservies — Kalystrat construction Québec',
    'url' => url('/zones-desservies'),
    'mainEntity' => ['@type' => 'ItemList', 'itemListElement' => $itemList],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
@endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Zones desservies', 'item' => 'https://kalystrat.ca/zones-desservies'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<header class="ks-page-hero ks-page-hero--photo" style="--ks-hero-photo: url('/intime/images/pages/zone-ville-hero.jpg')">
    <div class="ks-page-hero__overlay" aria-hidden="true"></div>
    <div class="ks-container ks-page-hero__inner">
        <ul class="ks-page-hero__breadcrumb">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>Zones desservies</li>
        </ul>
        <span class="ks-eyebrow ks-page-hero__eyebrow">Couverture provinciale</span>
        <h1>Zones desservies au Québec</h1>
        <p class="ks-page-hero__subtitle">Notre siège est à Québec, mais nos chantiers s’étendent de la rive-sud du Saint-Laurent jusqu’au Saguenay et à la grande région de Montréal. Neuf villes principales couvertes en continu.</p>
    </div>
</header>

<section class="ks-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left">
            <span class="ks-eyebrow">Couverture territoriale</span>
            <h2 class="ks-h2">Présents partout au Québec</h2>
            <p class="ks-lead">Que votre projet soit résidentiel, commercial ou institutionnel, nous évaluons sa faisabilité dans toute la province. Réponse sous 24 heures ouvrables pour qualifier la zone et confirmer la disponibilité de l’équipe.</p>
        </div>
    </div>
</section>

<section class="ks-section ks-section--alt">
    <div class="ks-container">
        <div class="ks-bento ks-bento--3col">
            @foreach($zones as $slug => $z)
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Zone</span>
                <h3 class="ks-card__title"><a href="{{ route('zones.ville', $slug) }}">{{ $z['nom'] }}</a></h3>
                <p class="ks-card__text">{{ $z['desc'] }}</p>
                <div class="ks-card__cta"><a href="{{ route('zones.ville', $slug) }}" class="ks-cta-secondary">En savoir plus</a></div>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Votre ville n’apparaît pas&nbsp;?</h2>
        <p>Nous évaluons les projets hors zones principales selon l’ampleur du chantier. Contactez-nous pour valider la faisabilité.</p>
        <a href="{{ route('contact') }}" class="ks-cta-primary">Demander une évaluation</a>
    </div>
</section>

@endsection
