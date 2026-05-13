@extends('frontend::layouts.intime')

@section('title', 'Nos six filiales spécialisées | Kalystrat')

@push('meta')
<meta name="description" content="Six filiales Kalystrat : Fondations, Structure, Toiture-Enveloppe, Finition Intérieure, Immobilier, Placement Construction. Chaîne complète de la construction au Québec.">
<link rel="canonical" href="{{ url('/filiales') }}">
<meta property="og:title" content="Six filiales Kalystrat — Construction à intégration verticale">
<meta property="og:description" content="Six métiers, une marque : Fondations, Structure, Toiture, Finition, Immobilier, Placement.">
<meta property="og:type" content="website">
@endpush

@push('schema')
<script type="application/ld+json">@php
$items = [];
$pos = 1;
foreach(\Modules\Frontend\Http\Controllers\FilialeController::FILIALES as $s => $f) {
    $items[] = ['@type' => 'ListItem', 'position' => $pos++, 'name' => $f['nom_court'], 'url' => url('/filiales/' . $s)];
}
echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'Filiales Kalystrat',
    'description' => 'Six filiales spécialisées sous le groupe Gestion Kalystrat Inc.',
    'url' => url('/filiales'),
    'mainEntity' => ['@type' => 'ItemList', 'itemListElement' => $items],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
@endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Filiales', 'item' => 'https://kalystrat.ca/filiales'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<x-frontend::page-hero
    photo="/intime/images/pages/apropos-aerial-cranes.webp"
    eyebrow="Structure du groupe"
    title="Six filiales, une marque unifiée"
    subtitle="De l'excavation aux finitions, du développement immobilier au placement de main-d'œuvre, chaque filiale détient une expertise pointue et travaille en synergie avec les autres divisions du groupe."
>
    <x-slot:breadcrumb>
        <li><a href="{{ url('/') }}">Accueil</a></li>
        <li>Filiales</li>
    </x-slot:breadcrumb>
</x-frontend::page-hero>

<section class="ks-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left">
            <span class="ks-eyebrow">Structure du groupe</span>
            <h2 class="ks-h2">Six filiales, six métiers complémentaires</h2>
        </div>
        <p class="ks-lead">Gestion Kalystrat Inc. opère via six filiales spécialisées qui couvrent l'intégralité de la chaîne de valeur en construction. Chaque filiale est dirigée par un directeur qui relève directement de la présidence, ce qui garantit cohérence stratégique et exécution rigoureuse.</p>
    </div>
</section>

<section class="ks-section ks-section--alt">
    <div class="ks-container">
        <div class="ks-bento">
            @foreach($filiales as $slug => $f)
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Filiale spécialisée</span>
                <h3 class="ks-card__title"><a href="{{ route('filiale', $slug) }}">{{ $f['nom_court'] }}</a></h3>
                <div class="ks-card__meta" style="color:var(--ks-gray-700);text-transform:none;letter-spacing:0;font-weight:500">{{ $f['specialite'] }}</div>
                <p class="ks-card__text">{{ $f['tagline'] }}</p>
                <div class="ks-card__cta">
                    <a href="{{ route('filiale', $slug) }}" class="ks-cta-secondary">En savoir plus</a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>

{{-- T193-C — Chaîne de valeur intégrée (plan d'affaires Ali) --}}
<section id="chaine-valeur" class="ks-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left">
            <span class="ks-eyebrow">Intégration verticale</span>
            <h2 class="ks-h2">La chaîne de valeur, sous un seul groupe</h2>
            <p class="ks-lead">De l'acquisition du terrain à la remise des clés, chaque étape s'enchaîne sans rupture grâce à six filiales spécialisées qui se relaient sur le même chantier.</p>
        </div>
        <ol class="ks-bento ks-bento--6col" style="counter-reset:step;list-style:none;padding:0">
            <li class="ks-card ks-card--accent-gold" style="counter-increment:step">
                <span class="ks-eyebrow" style="color:var(--ks-gold-aaa)">Étape 01</span>
                <h3 class="ks-card__title" style="font-size:1.125rem">Immobilier</h3>
                <p class="ks-card__text">Acquisition du terrain, étude de faisabilité, conception du projet.</p>
            </li>
            <li class="ks-card ks-card--accent-gold" style="counter-increment:step">
                <span class="ks-eyebrow" style="color:var(--ks-gold-aaa)">Étape 02</span>
                <h3 class="ks-card__title" style="font-size:1.125rem">Fondations</h3>
                <p class="ks-card__text">Excavation, coffrage, coulée du béton, imperméabilisation.</p>
            </li>
            <li class="ks-card ks-card--accent-gold" style="counter-increment:step">
                <span class="ks-eyebrow" style="color:var(--ks-gold-aaa)">Étape 03</span>
                <h3 class="ks-card__title" style="font-size:1.125rem">Structure</h3>
                <p class="ks-card__text">Charpente bois, acier ou hybride. Assemblage de l'ossature primaire.</p>
            </li>
            <li class="ks-card ks-card--accent-gold" style="counter-increment:step">
                <span class="ks-eyebrow" style="color:var(--ks-gold-aaa)">Étape 04</span>
                <h3 class="ks-card__title" style="font-size:1.125rem">Toiture et enveloppe</h3>
                <p class="ks-card__text">Étanchéité, isolation, revêtement extérieur. Protège le bâtiment.</p>
            </li>
            <li class="ks-card ks-card--accent-gold" style="counter-increment:step">
                <span class="ks-eyebrow" style="color:var(--ks-gold-aaa)">Étape 05</span>
                <h3 class="ks-card__title" style="font-size:1.125rem">Finition intérieure</h3>
                <p class="ks-card__text">Gypse, peinture, planchers, ébénisterie sur mesure. Complète les espaces.</p>
            </li>
            <li class="ks-card ks-card--accent-gold" style="counter-increment:step">
                <span class="ks-eyebrow" style="color:var(--ks-gold-aaa)">Transversal</span>
                <h3 class="ks-card__title" style="font-size:1.125rem">Placement construction</h3>
                <p class="ks-card__text">Main-d'œuvre qualifiée CCQ fournie à chaque étape. Disponibilité garantie.</p>
            </li>
        </ol>
    </div>
</section>

{{-- T193-C — Six piliers de l'avantage concurrentiel (plan d'affaires Ali) --}}
<section id="piliers" class="ks-section ks-section--alt">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left">
            <span class="ks-eyebrow">Avantage concurrentiel</span>
            <h2 class="ks-h2">Six piliers qui rendent Kalystrat unique</h2>
            <p class="ks-lead">Notre modèle s'articule autour de six piliers structurels. Ils ne sont pas des promesses marketing&nbsp;: ils sont l'architecture opérationnelle du groupe.</p>
        </div>
        <div class="ks-bento ks-bento--3col">
            <article class="ks-card">
                <span class="ks-page-section__num" aria-hidden="true" style="font-size:2.5rem">01</span>
                <h3 class="ks-card__title">Intégration verticale</h3>
                <p class="ks-card__text">De l'excavation à la finition finale, chaque étape est exécutée en interne. Marges sous-traitants éliminées, délais de coordination réduits.</p>
            </article>
            <article class="ks-card">
                <span class="ks-page-section__num" aria-hidden="true" style="font-size:2.5rem">02</span>
                <h3 class="ks-card__title">Main-d'œuvre captive</h3>
                <p class="ks-card__text">Kalystrat Placement construction fournit la main-d'œuvre à toutes les filiales. Disponibilité garantie, cohérence de formation, qualité d'exécution.</p>
            </article>
            <article class="ks-card">
                <span class="ks-page-section__num" aria-hidden="true" style="font-size:2.5rem">03</span>
                <h3 class="ks-card__title">Demande captive</h3>
                <p class="ks-card__text">Kalystrat Immobilier développe ses propres projets, ce qui génère un flux de travail constant pour les cinq autres filiales du groupe.</p>
            </article>
            <article class="ks-card">
                <span class="ks-page-section__num" aria-hidden="true" style="font-size:2.5rem">04</span>
                <h3 class="ks-card__title">Synergies opérationnelles</h3>
                <p class="ks-card__text">La chaîne complète fonctionne en boucle&nbsp;: Immobilier développe, Fondations excave, Structure charpente, Toiture protège, Finition complète, Placement fournit.</p>
            </article>
            <article class="ks-card">
                <span class="ks-page-section__num" aria-hidden="true" style="font-size:2.5rem">05</span>
                <h3 class="ks-card__title">Cohérence de marque</h3>
                <p class="ks-card__text">La convention de dénomination « Kalystrat + Spécialité » construit la reconnaissance et inspire confiance auprès des clients et partenaires.</p>
            </article>
            <article class="ks-card">
                <span class="ks-page-section__num" aria-hidden="true" style="font-size:2.5rem">06</span>
                <h3 class="ks-card__title">Gestion centralisée</h3>
                <p class="ks-card__text">Comptabilité, ressources humaines, juridique, marketing et TI sont centralisés au niveau de la holding. Frais généraux des filiales réduits.</p>
            </article>
        </div>
    </div>
</section>

{{-- T193-C — Marché Québécois 2026 (plan d'affaires Ali, données réelles) --}}
<section id="marche" class="ks-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left">
            <span class="ks-eyebrow">Marché 2026 en chiffres</span>
            <h2 class="ks-h2">Une demande structurelle au Québec</h2>
            <p class="ks-lead">Le marché québécois de la construction et de la rénovation est en croissance soutenue. Pénurie de main-d'œuvre, demande record en habitation, renouvellement du parc bâti.</p>
        </div>
        <div class="ks-bento ks-bento--3col">
            <article class="ks-card ks-card--accent-gold">
                <div class="ks-stat__number" style="font-size:3rem;color:var(--ks-gold-aaa)">19&nbsp;G$</div>
                <div class="ks-stat__label">Marché annuel rénovation QC</div>
                <p class="ks-card__text" style="margin-top:1rem">Volume du marché de la rénovation résidentielle et commerciale au Québec en 2026 (source&nbsp;: APCHQ).</p>
            </article>
            <article class="ks-card ks-card--accent-gold">
                <div class="ks-stat__number" style="font-size:3rem;color:var(--ks-gold-aaa)">59&nbsp;864</div>
                <div class="ks-stat__label">Mises en chantier 2025 (+23&nbsp;%)</div>
                <p class="ks-card__text" style="margin-top:1rem">Hausse marquée de la construction résidentielle au Québec (source&nbsp;: SCHL).</p>
            </article>
            <article class="ks-card ks-card--accent-gold">
                <div class="ks-stat__number" style="font-size:3rem;color:var(--ks-gold-aaa)">17&nbsp;000</div>
                <div class="ks-stat__label">Travailleurs/an recherchés QC</div>
                <p class="ks-card__text" style="margin-top:1rem">Besoin annuel en main-d'œuvre qualifiée selon la CCQ. Kalystrat Placement construction y répond.</p>
            </article>
        </div>
    </div>
</section>

<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Une porte d'entrée unique pour six métiers</h2>
        <p>Discutez de votre projet avec un chargé de dossier qui pilote la totalité des corps de métier en s'appuyant sur les six directions de filiales.</p>
        <a href="{{ route('contact') }}" class="ks-cta-primary">Obtenir une soumission</a>
    </div>
</section>

@endsection
