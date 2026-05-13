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
        <p class="ks-lead">Gestion Kalystrat Inc. opère via six filiales spécialisées qui couvrent l'intégralité de la chaîne de valeur en construction. Chaque filiale est dirigée par un directeur relevant directement de la présidence&nbsp;: une seule chaîne de décision du président jusqu'au chantier.</p>
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

{{-- T201 — Chaîne de valeur intégrée : timeline horizontale 5 étapes séquentielles + 1 carte transversale full-width --}}
<section id="chaine-valeur" class="ks-section">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left">
            <span class="ks-eyebrow">Intégration verticale</span>
            <h2 class="ks-h2">La chaîne de valeur, sous un seul groupe</h2>
            <p class="ks-lead">De l'acquisition du terrain à la remise des clés, chaque étape s'enchaîne sans rupture grâce à six filiales spécialisées qui se relaient sur le même chantier.</p>
        </div>

        @php
        $etapesChaine = [
            ['num' => '01', 'titre' => 'Immobilier', 'desc' => 'Acquisition du terrain, étude de faisabilité, conception du projet.', 'slug' => 'immobilier'],
            ['num' => '02', 'titre' => 'Fondations', 'desc' => 'Excavation, coffrage, coulée du béton, imperméabilisation.', 'slug' => 'fondations'],
            ['num' => '03', 'titre' => 'Structure', 'desc' => 'Charpente bois, acier ou hybride. Assemblage de l\'ossature primaire.', 'slug' => 'structure'],
            ['num' => '04', 'titre' => 'Toiture et enveloppe', 'desc' => 'Étanchéité, isolation, revêtement extérieur. Protège le bâtiment.', 'slug' => 'toiture-enveloppe'],
            ['num' => '05', 'titre' => 'Finition intérieure', 'desc' => 'Gypse, peinture, planchers, ébénisterie sur mesure. Complète les espaces.', 'slug' => 'finition-interieure'],
        ];
        @endphp

        {{-- Timeline horizontale 5 étapes séquentielles --}}
        <ol class="ks-fade-in" style="list-style:none;padding:0;margin:clamp(32px, 4vw, 56px) 0 0;display:grid;grid-template-columns:repeat(auto-fit, minmax(200px, 1fr));gap:clamp(16px, 1.6vw, 24px)">
            @foreach($etapesChaine as $i => $etape)
            <li style="position:relative;padding:clamp(24px, 2.6vw, 32px);background:var(--ks-white);border-radius:var(--ks-radius-lg);border-top:3px solid var(--ks-gold-500);box-shadow:var(--ks-shadow-card)">
                <div style="font-family:var(--ks-font-display);font-size:clamp(2.25rem, 4.5vw, 3rem);font-weight:800;color:var(--ks-gold-aaa);line-height:1;letter-spacing:-0.02em">{{ $etape['num'] }}</div>
                <h3 class="ks-card__title" style="margin-top:0.75rem;margin-bottom:0.5rem;font-size:1.125rem"><a href="{{ route('filiale', $etape['slug']) }}" style="color:inherit;text-decoration:none">{{ $etape['titre'] }}</a></h3>
                <p class="ks-card__text" style="font-size:0.9375rem">{{ $etape['desc'] }}</p>
            </li>
            @endforeach
        </ol>

        {{-- Carte transversale Placement (full-width, accent différencié navy fond) --}}
        <article class="ks-fade-in" style="margin-top:clamp(20px, 2.4vw, 32px);padding:clamp(28px, 3vw, 40px);background:var(--ks-navy-900);color:var(--ks-white);border-radius:var(--ks-radius-lg);box-shadow:var(--ks-shadow-card);display:grid;grid-template-columns:auto 1fr;gap:clamp(20px, 2.4vw, 32px);align-items:center">
            <div style="font-family:var(--ks-font-display);font-size:clamp(2.25rem, 4.5vw, 3rem);font-weight:800;color:var(--ks-gold-500);line-height:1;letter-spacing:-0.02em;white-space:nowrap">Transversal</div>
            <div>
                <h3 class="ks-card__title" style="color:var(--ks-white);margin:0 0 0.5rem;font-size:1.25rem"><a href="{{ route('filiale', 'placement-construction') }}" style="color:inherit;text-decoration:none">Placement construction</a></h3>
                <p style="margin:0;color:rgba(255,255,255,0.85);line-height:var(--ks-line-height)">Main-d'œuvre qualifiée CCQ fournie à chaque étape, des fondations à la finition. Disponibilité garantie pour les cinq filiales et nos partenaires externes.</p>
            </div>
        </article>
    </div>
</section>

{{-- T193-C — Six piliers de l'avantage concurrentiel (plan d'affaires Ali) --}}
<section id="piliers" class="ks-section ks-section--alt">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left">
            <span class="ks-eyebrow">Avantage concurrentiel</span>
            <h2 class="ks-h2">Six piliers qui définissent l'architecture du groupe</h2>
            <p class="ks-lead">Notre modèle s'articule autour de six piliers structurels qui forment l'architecture opérationnelle du groupe&nbsp;: intégration verticale, main-d'œuvre interne, demande captive, synergies, cohérence de marque et gestion centralisée.</p>
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
                <p class="ks-card__text">La convention de dénomination « Kalystrat + Spécialité » rend chaque filiale identifiable au premier coup d'œil sur un chantier, un contrat ou une soumission.</p>
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
                <div class="ks-stat__number" style="font-size:3rem;color:var(--ks-gold-aaa)">+19&nbsp;%</div>
                <div class="ks-stat__label">Marché annuel rénovation QC</div>
                <p class="ks-card__text" style="margin-top:1rem">Hausse des dépenses de rénovation résidentielle au Québec, H1 2025 vs H1 2024 (source&nbsp;: APCHQ, mi-année 2025).</p>
            </article>
            <article class="ks-card ks-card--accent-gold">
                <div class="ks-stat__number" style="font-size:3rem;color:var(--ks-gold-aaa)">+35&nbsp;%</div>
                <div class="ks-stat__label">Mises en chantier 2025 (+23&nbsp;%)</div>
                <p class="ks-card__text" style="margin-top:1rem">Hausse des mises en chantier résidentielles au Québec, H1 2025 vs H1 2024 (source&nbsp;: APCHQ, mi-année 2025).</p>
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
