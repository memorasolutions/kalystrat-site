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

{{-- T138b — FAQPage régionale (hub topical authority) --}}
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        [
            '@type' => 'Question',
            'name' => 'Quelles régions du Québec Kalystrat dessert-il ?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => "Kalystrat dessert principalement neuf villes au Québec : Québec, Lévis, Sainte-Foy, Beauport, Sillery, Trois-Rivières, Saguenay, Montréal et Laval. Le siège social est à Québec et nos chantiers s'étendent de la rive-sud du Saint-Laurent jusqu'au Saguenay et à la grande région de Montréal.",
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'Mon projet est en dehors de ces neuf villes — êtes-vous disponibles ?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => "Oui, nous évaluons les projets hors zones principales selon l'ampleur du chantier et la disponibilité des équipes. Contactez-nous avec les informations clés (type, surface, échéance) pour confirmer la faisabilité.",
            ],
        ],
        [
            '@type' => 'Question',
            'name' => "Combien de temps pour qualifier ma zone ?",
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => "Réponse sous 24 heures ouvrables pour confirmer la disponibilité d'équipe et amorcer le processus de soumission. Pour les chantiers complexes, une visite préalable est planifiée dans les 5 jours suivants.",
            ],
        ],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>

{{-- T138b — Speakable Schema (AEO LLM-friendly) --}}
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'WebPage',
    'name' => 'Zones desservies au Québec — Kalystrat',
    'url' => url('/zones-desservies'),
    'speakable' => [
        '@type' => 'SpeakableSpecification',
        'cssSelector' => ['h1', '.ks-page-hero__subtitle', '.ks-h2', '.ks-lead'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<x-frontend::page-hero
    photo="/intime/images/pages/zone-ville-hero.webp"
    eyebrow="Couverture provinciale"
    title="Zones desservies au Québec"
    subtitle="Notre siège est à Québec, mais nos chantiers s’étendent de la rive-sud du Saint-Laurent jusqu’au Saguenay et à la grande région de Montréal. Neuf villes principales couvertes en continu."
>
    <x-slot:breadcrumb>
        <li><a href="{{ url('/') }}">Accueil</a></li>
        <li>Zones desservies</li>
    </x-slot:breadcrumb>
</x-frontend::page-hero>

<section class="ks-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left">
            <span class="ks-eyebrow">Couverture territoriale</span>
            <h2 class="ks-h2">Présents partout au Québec</h2>
            <p class="ks-lead">Que votre projet soit résidentiel, commercial ou institutionnel, nous évaluons sa faisabilité dans toute la province. Réponse sous 24 heures ouvrables pour qualifier la zone et confirmer la disponibilité de l’équipe.</p>
        </div>
    </div>
</section>

<section class="ks-section">
    <div class="ks-container">
        <div class="ks-section__heading--split">
            <div class="ks-section__heading-left">
                <span class="ks-eyebrow">Géographie de la couverture</span>
                <h2 class="ks-h2">Cinq régions,<br>neuf villes principales.</h2>
            </div>
            <div class="ks-section__heading-right">
                <p class="ks-lead">Notre territoire principal couvre la grande région de Québec, la Rive-Sud, la Mauricie, le Saguenay et la région métropolitaine de Montréal. Chaque ville a ses particularités&nbsp;: sols, permis municipaux, réglementations patrimoniales, saisonnalité des chantiers. Nos équipes sont calibrées pour chacune.</p>
            </div>
        </div>

        <div class="ks-zones__geo" aria-label="Regroupement géographique des villes desservies">
<article class="ks-zones__geo-group">
                <h3 class="ks-zones__geo-title">Capitale-Nationale</h3>
                <ul class="ks-zones__geo-list">
                    <li><a href="{{ route('zones.ville', 'quebec') }}">Québec</a></li>
                    <li><a href="{{ route('quartier.vieux-quebec') }}" style="font-size:0.875rem;padding-left:0.75rem;opacity:0.85">↳ Vieux-Québec</a></li>
                    <li><a href="{{ route('zones.ville', 'sainte-foy') }}">Sainte-Foy</a></li>
                    <li><a href="{{ route('zones.ville', 'beauport') }}">Beauport</a></li>
                    <li><a href="{{ route('zones.ville', 'sillery') }}">Sillery</a></li>
                </ul>
            </article>
            <article class="ks-zones__geo-group">
                <h3 class="ks-zones__geo-title">Rive-Sud du Saint-Laurent</h3>
                <ul class="ks-zones__geo-list">
                    <li><a href="{{ route('zones.ville', 'levis') }}">Lévis</a></li>
                </ul>
            </article>
            <article class="ks-zones__geo-group">
                <h3 class="ks-zones__geo-title">Mauricie</h3>
                <ul class="ks-zones__geo-list">
                    <li><a href="{{ route('zones.ville', 'trois-rivieres') }}">Trois-Rivières</a></li>
                </ul>
            </article>
            <article class="ks-zones__geo-group">
                <h3 class="ks-zones__geo-title">Saguenay–Lac-Saint-Jean</h3>
                <ul class="ks-zones__geo-list">
                    <li><a href="{{ route('zones.ville', 'saguenay') }}">Saguenay</a></li>
                </ul>
            </article>
<article class="ks-zones__geo-group">
                <h3 class="ks-zones__geo-title">Grand Montréal</h3>
                <ul class="ks-zones__geo-list">
                    <li><a href="{{ route('zones.ville', 'montreal') }}">Montréal</a></li>
                    <li><a href="{{ route('quartier.plateau-mont-royal') }}" style="font-size:0.875rem;padding-left:0.75rem;opacity:0.85">↳ Plateau-Mont-Royal</a></li>
                    <li><a href="{{ route('quartier.westmount') }}" style="font-size:0.875rem;padding-left:0.75rem;opacity:0.85">↳ Westmount</a></li>
                    <li><a href="{{ route('zones.ville', 'laval') }}">Laval</a></li>
                </ul>
            </article>
        </div>
    </div>
</section>

<section class="ks-section ks-section--alt">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left">
            <span class="ks-eyebrow">Détail par ville</span>
            <h2 class="ks-h2">Pages locales détaillées</h2>
            <p class="ks-lead">Chaque page ville couvre les spécificités du territoire&nbsp;: sols, permis, saisonnalité et particularités réglementaires locales.</p>
        </div>
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
