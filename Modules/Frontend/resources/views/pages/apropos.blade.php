@extends('frontend::layouts.intime')

@section('title', 'À propos | Kalystrat — Groupe québécois de construction')

@push('meta')
<meta name="description" content="Gestion Kalystrat Inc., groupe québécois de construction à intégration verticale. Six filiales spécialisées sous une marque unifiée.">
<link rel="canonical" href="{{ url('/a-propos') }}">
<meta property="og:title" content="À propos de Gestion Kalystrat Inc.">
<meta property="og:description" content="Groupe québécois à intégration verticale. Six filiales, une marque unifiée.">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url('/a-propos') }}">
@endpush

@push('schema')
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'AboutPage',
    'name' => 'À propos de Gestion Kalystrat Inc.',
    'description' => 'Groupe québécois de construction à intégration verticale.',
    'url' => 'https://kalystrat.ca/a-propos',
    'mainEntity' => [
        '@type' => 'Organization',
        'name' => 'Gestion Kalystrat Inc.',
        'alternateName' => 'Kalystrat',
        'url' => 'https://kalystrat.ca',
        'founder' => ['@type' => 'Person', 'name' => 'Ali Salomon', 'jobTitle' => 'Président et Directeur Général'],
        'address' => ['@type' => 'PostalAddress', 'addressLocality' => 'Québec', 'addressRegion' => 'QC', 'addressCountry' => 'CA'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'À propos', 'item' => 'https://kalystrat.ca/a-propos'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<header class="ks-page-hero ks-page-hero--photo" style="--ks-hero-photo: url('/intime/images/pages/apropos-hero-montreal-night.jpg')">
    <div class="ks-page-hero__overlay" aria-hidden="true"></div>
    <div class="ks-container ks-page-hero__inner">
        <ul class="ks-page-hero__breadcrumb">
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li>À propos</li>
        </ul>
        <span class="ks-eyebrow ks-page-hero__eyebrow">Conçu, réalisé, livré</span>
        <h1>Un groupe québécois de construction à intégration verticale</h1>
        <p class="ks-page-hero__subtitle">Six filiales spécialisées sous une marque unifiée. Une vision : faire de Gestion Kalystrat Inc. une référence québécoise de la construction intégrée.</p>
    </div>
</header>

<section class="ks-section ks-page-section">
    <div class="ks-container">
        <div class="ks-page-section__intro ks-fade-in">
            <span class="ks-page-section__num" aria-hidden="true">01</span>
            <div class="ks-page-section__heading">
                <span class="ks-eyebrow">Notre vision</span>
                <h2 class="ks-h2">Bâtir un groupe intégré de référence au Québec</h2>
            </div>
        </div>
        <p class="ks-lead ks-fade-in">Gestion Kalystrat Inc. exerce un contrôle complet sur la chaîne de valeur, de l’excavation aux finitions, tout en développant des projets immobiliers et en assurant le placement stratégique de main-d’œuvre qualifiée. Notre ambition&nbsp;: devenir un acteur structurant de l’industrie québécoise de la construction, en bâtissant un groupe intégré de référence.</p>
    </div>
</section>

<section class="ks-section ks-section--alt ks-page-section">
    <div class="ks-container">
        <div class="ks-page-section__intro ks-fade-in">
            <span class="ks-page-section__num" aria-hidden="true">02</span>
            <div class="ks-page-section__heading">
                <span class="ks-eyebrow">Direction et chiffres</span>
                <h2 class="ks-h2">Une direction pilotée depuis Québec</h2>
            </div>
        </div>
        <div class="ks-bento ks-bento--feature ks-fade-in">
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Fondateur</span>
                <h3 class="ks-card__title">Ali Salomon</h3>
                <div class="ks-card__meta">Président et Directeur Général</div>
                <p class="ks-card__text">Visionnaire et entrepreneur, Ali Salomon a conçu le modèle d’affaires intégré de Kalystrat&nbsp;: six filiales spécialisées qui travaillent en synergie sous une marque unifiée. Il supervise la stratégie globale, les acquisitions et la gouvernance du groupe.</p>
                <div class="ks-card__cta">
                    <a href="{{ route('equipe.membre', 'ali-salomon') }}" class="ks-cta-secondary">Profil complet</a>
                </div>
            </article>

            <article class="ks-card">
                <div class="ks-stat__number">6</div>
                <div class="ks-stat__label">Filiales spécialisées</div>
                <p class="ks-card__text" style="margin-top:1rem">Une chaîne complète sous une seule marque.</p>
            </article>

            <article class="ks-card">
                <div class="ks-stat__number">9</div>
                <div class="ks-stat__label">Régions Québec desservies</div>
                <p class="ks-card__text" style="margin-top:1rem">Couverture provinciale du groupe, de la Capitale-Nationale à la Mauricie.</p>
            </article>

            <article class="ks-card">
                <div class="ks-stat__number">100<sup style="font-size:0.55em;color:var(--ks-gold-500)">%</sup></div>
                <div class="ks-stat__label">Code QC 2026 maîtrisé</div>
                <p class="ks-card__text" style="margin-top:1rem">Étanchéité à l’air, R-49 toiture, ventilation HRV. Nos équipes maîtrisent l’ensemble du Code 2026.</p>
            </article>

            <article class="ks-card ks-card--accent-navy">
                <span class="ks-eyebrow">Siège social</span>
                <h3 class="ks-card__title">Québec</h3>
                <p class="ks-card__text">Ancré dans la Capitale-Nationale, avec une couverture territoriale jusqu’au Saguenay, Trois-Rivières, Montréal et Laval.</p>
            </article>
        </div>
    </div>
</section>

<section class="ks-section ks-page-section">
    <div class="ks-container">
        <div class="ks-page-section__intro ks-fade-in">
            <span class="ks-page-section__num" aria-hidden="true">03</span>
            <div class="ks-page-section__heading">
                <span class="ks-eyebrow">Structure du groupe</span>
                <h2 class="ks-h2">Six filiales, une marque unifiée</h2>
                <p class="ks-lead">La convention « Kalystrat + Spécialité » construit la reconnaissance et inspire confiance. Chaque filiale est dirigée par un directeur dédié relevant directement de la présidence.</p>
            </div>
        </div>
        <figure class="ks-page-section__visual ks-fade-in">
            <img src="/intime/images/pages/apropos-aerial-cranes.jpg" alt="Vue aérienne d'un chantier urbain en construction à Montréal" loading="lazy" width="940" height="650">
            <figcaption>L’intégration verticale en action : du sol au toit, sous une seule marque.</figcaption>
        </figure>
        <div class="ks-bento ks-fade-in">
            @foreach($filiales as $slug => $f)
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">{{ $f['specialite'] }}</span>
                <h3 class="ks-card__title"><a href="{{ route('filiale', $slug) }}">{{ $f['nom_court'] }}</a></h3>
                <p class="ks-card__text">{{ $f['tagline'] }}</p>
                <div class="ks-card__cta">
                    <a href="{{ route('filiale', $slug) }}" class="ks-cta-secondary">En savoir plus</a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-section ks-section--dark ks-page-section ks-page-section--dark">
    <div class="ks-container">
        <div class="ks-page-section__intro ks-fade-in">
            <span class="ks-page-section__num" aria-hidden="true">04</span>
            <div class="ks-page-section__heading">
                <span class="ks-eyebrow">Pourquoi Kalystrat</span>
                <h2 class="ks-h2">Six piliers d’avantage concurrentiel</h2>
            </div>
        </div>
        @php
        $piliers = [
            ['n' => '01', 't' => 'Intégration verticale', 'd' => "De l’excavation à la finition, chaque étape est exécutée en interne. Élimination des marges des sous-traitants et des délais de coordination."],
            ['n' => '02', 't' => 'Main-d’œuvre interne', 'd' => "Kalystrat Placement Construction fournit la main-d’œuvre à toutes les filiales. Disponibilité garantie, formation cohérente."],
            ['n' => '03', 't' => 'Demande captive', 'd' => "Kalystrat Immobilier développe ses propres projets et génère un flux de travail constant pour les cinq autres filiales."],
            ['n' => '04', 't' => 'Synergies opérationnelles', 'd' => "Immobilier puis Fondations, Structure, Toiture-Enveloppe, Finition, Placement. La chaîne complète fonctionne en boucle."],
            ['n' => '05', 't' => 'Cohérence de marque', 'd' => "La convention « Kalystrat + Spécialité » construit la reconnaissance et inspire confiance auprès des clients et partenaires."],
            ['n' => '06', 't' => 'Gestion centralisée', 'd' => "Comptabilité, RH, juridique, marketing, TI centralisés à l'échelle du groupe. Frais généraux réduits par filiale."],
        ];
        @endphp
        <div class="ks-bento ks-fade-in">
            @foreach($piliers as $p)
            <article class="ks-card ks-card--dark">
                <div style="font-family:var(--ks-font-display);font-size:2rem;color:var(--ks-gold-500);font-weight:700">{{ $p['n'] }}</div>
                <h3 class="ks-card__title">{{ $p['t'] }}</h3>
                <p class="ks-card__text">{{ $p['d'] }}</p>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section class="ks-section ks-page-section">
    <div class="ks-container">
        <div class="ks-page-section__intro ks-fade-in">
            <span class="ks-page-section__num" aria-hidden="true">05</span>
            <div class="ks-page-section__heading">
                <span class="ks-eyebrow">Gouvernance</span>
                <h2 class="ks-h2">Conseil consultatif</h2>
                <p class="ks-lead">Cinq sièges complémentaires&nbsp;: construction et ingénierie, financement et investissement, droit des affaires, ressources humaines, immobilier. Deux conseillers nommés, trois sièges en cours de recrutement.</p>
            </div>
        </div>
        <figure class="ks-page-section__visual ks-fade-in">
            <img src="/intime/images/pages/apropos-team-architects.jpg" alt="Deux professionnels en discussion devant un plan de construction" loading="lazy" width="940" height="650">
            <figcaption>Une gouvernance qui s’appuie sur des expertises complémentaires reconnues.</figcaption>
        </figure>
        <div class="ks-bento ks-bento--2col ks-fade-in">
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Conseiller — Droit des affaires</span>
                <h3 class="ks-card__title"><a href="{{ route('equipe.membre', 'jacques-jobidon') }}">Jacques Jobidon</a></h3>
                <p class="ks-card__text">Avocat spécialisé en droit de la construction et des sociétés. Conseille la présidence sur les contrats inter-filiales, la conformité réglementaire (RBQ, CCQ), la gestion des litiges.</p>
            </article>
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Conseiller — Immobilier</span>
                <h3 class="ks-card__title"><a href="{{ route('equipe.membre', 'perry-wong') }}">Perry Wong</a></h3>
                <p class="ks-card__text">Promoteur et expert reconnu du marché immobilier québécois. Conseille Kalystrat Immobilier sur les acquisitions de terrains, l’analyse de marché, la structuration de projets.</p>
            </article>
        </div>
        <div class="ks-bento ks-bento--3col" style="margin-top:24px">
            <article class="ks-card">
                <div class="ks-card__meta">À pourvoir</div>
                <h4 class="ks-card__title" style="font-size:1.125rem">Construction et ingénierie</h4>
                <p class="ks-card__text">Profil recherché&nbsp;: expert sénior de l’industrie de la construction au Québec.</p>
            </article>
            <article class="ks-card">
                <div class="ks-card__meta">À pourvoir</div>
                <h4 class="ks-card__title" style="font-size:1.125rem">Financement et investissement</h4>
                <p class="ks-card__text">Profil recherché&nbsp;: professionnel en financement d’entreprise et structuration financière.</p>
            </article>
            <article class="ks-card">
                <div class="ks-card__meta">À pourvoir</div>
                <h4 class="ks-card__title" style="font-size:1.125rem">Ressources humaines</h4>
                <p class="ks-card__text">Profil recherché&nbsp;: spécialiste du recrutement et de la gestion de la main-d’œuvre en construction.</p>
            </article>
        </div>
    </div>
</section>

<section class="ks-section ks-section--alt ks-page-section">
    <div class="ks-container">
        <div class="ks-page-section__intro ks-fade-in">
            <span class="ks-page-section__num" aria-hidden="true">06</span>
            <div class="ks-page-section__heading">
                <span class="ks-eyebrow">Stratégie de croissance</span>
                <h2 class="ks-h2">Deux phases pour bâtir un groupe de référence</h2>
            </div>
        </div>
        <div class="ks-bento ks-bento--2col ks-fade-in">
            <article class="ks-card ks-card--accent-navy">
                <div class="ks-card__meta">Phase 1</div>
                <h3 class="ks-card__title">Consolidation</h3>
                <p class="ks-card__text">Établir les fondations opérationnelles du groupe&nbsp;: incorporation et structuration des six filiales avec licences RBQ et assurances, constitution de la force de travail interne via Kalystrat Placement Construction, exécution des premiers projets de Kalystrat Immobilier comme preuve de concept, mise en place des systèmes centralisés de gestion, premières relations commerciales avec entrepreneurs généraux, déploiement de l’identité de marque.</p>
            </article>
            <article class="ks-card ks-card--accent-gold">
                <div class="ks-card__meta">Phase 2</div>
                <h3 class="ks-card__title">Expansion</h3>
                <p class="ks-card__text">Diversifier les revenus et augmenter le volume&nbsp;: développement de la clientèle externe de Kalystrat Placement Construction, croissance du portefeuille immobilier, partenariats récurrents avec entrepreneurs généraux, investissement dans l’équipement et la machinerie pour fondations et structure, embauche de directeurs dédiés à chaque filiale, lancement de projets de rénovation haut de gamme via Kalystrat Finition Intérieure.</p>
            </article>
        </div>
        <p style="text-align:center;margin-top:2rem;font-size:0.875rem;color:var(--ks-gray-500)"><em>Source&nbsp;: plan d’affaires Gestion Kalystrat Inc., avril 2026.</em></p>
    </div>
</section>

<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Discutons de votre projet</h2>
        <p>Une équipe basée à Québec, six filiales spécialisées, un chargé de projet dédié à votre dossier du devis à la réception finale.</p>
        <a href="{{ route('contact') }}" class="ks-cta-primary">Obtenir une soumission</a>
    </div>
</section>

@endsection
