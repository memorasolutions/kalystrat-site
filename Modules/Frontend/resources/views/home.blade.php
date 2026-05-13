@extends('frontend::layouts.intime')

@section('title', 'Kalystrat — Groupe québécois de construction à intégration verticale')

@push('meta')
<meta name="description" content="Six filiales spécialisées sous une marque unifiée. Du chantier à la livraison, Kalystrat orchestre votre projet de construction au Québec.">
<link rel="canonical" href="{{ url('/') }}">
<meta property="og:title" content="Kalystrat — Construction à intégration verticale au Québec">
<meta property="og:description" content="Fondations, structure, toiture, finition, immobilier, placement. Six filiales, une marque, un chargé de projet unique.">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url('/') }}">
@endpush

@push('schema')
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'Gestion Kalystrat Inc.',
    'url' => url('/'),
    'logo' => url('/assets/img/kalystrat/logo.svg'),
    'description' => "Groupe québécois de construction à intégration verticale. Six filiales spécialisées : Fondations, Structure, Toiture et enveloppe, Finition intérieure, Immobilier, Placement construction.",
    'address' => ['@type' => 'PostalAddress', 'addressLocality' => 'Québec', 'addressRegion' => 'QC', 'addressCountry' => 'CA'],
    'telephone' => '+1-418-476-0987',
    'contactPoint' => ['@type' => 'ContactPoint', 'contactType' => 'customer service', 'telephone' => '+1-418-476-0987', 'email' => 'info@kalystrat.ca', 'areaServed' => 'CA-QC', 'availableLanguage' => ['French', 'English']],
    'founder' => ['@type' => 'Person', 'name' => 'Ali Salomon', 'jobTitle' => 'Président et Directeur Général'],
    'subOrganization' => [
        ['@type' => 'GeneralContractor', 'name' => 'Kalystrat Fondations', 'url' => url('/filiales/fondations')],
        ['@type' => 'GeneralContractor', 'name' => 'Kalystrat Structure', 'url' => url('/filiales/structure')],
        ['@type' => 'GeneralContractor', 'name' => 'Kalystrat Toiture et enveloppe', 'url' => url('/filiales/toiture-enveloppe')],
        ['@type' => 'GeneralContractor', 'name' => 'Kalystrat Finition intérieure', 'url' => url('/filiales/finition-interieure')],
        ['@type' => 'Organization', 'name' => 'Kalystrat Immobilier', 'url' => url('/filiales/immobilier')],
        ['@type' => 'Organization', 'name' => 'Kalystrat Placement construction', 'url' => url('/filiales/placement-construction')],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>

{{-- T130 — LocalBusiness Schema (SEO local QC) --}}
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'GeneralContractor',
    'name' => 'Gestion Kalystrat Inc.',
    'url' => url('/'),
    'logo' => url('/assets/img/kalystrat/logo.svg'),
    'image' => url('/intime/images/pages/home-showcase-aerial.webp'),
    'description' => "Groupe québécois de construction à intégration verticale : fondations, structure, toiture, finition, immobilier, placement de main-d'œuvre.",
    'telephone' => '+1-418-476-0987',
    'email' => 'info@kalystrat.ca',
    'priceRange' => '$$',
    'address' => [
        '@type' => 'PostalAddress',
        'addressLocality' => 'Québec',
        'addressRegion' => 'QC',
        'addressCountry' => 'CA',
    ],
    'geo' => [
        '@type' => 'GeoCoordinates',
        'latitude' => 46.8139,
        'longitude' => -71.2080,
    ],
    'areaServed' => [
        ['@type' => 'AdministrativeArea', 'name' => 'Capitale-Nationale, Québec'],
        ['@type' => 'City', 'name' => 'Québec'],
        ['@type' => 'City', 'name' => 'Lévis'],
        ['@type' => 'City', 'name' => 'Sainte-Foy'],
        ['@type' => 'City', 'name' => 'Beauport'],
        ['@type' => 'City', 'name' => 'Sillery'],
    ],
    'openingHoursSpecification' => [
        '@type' => 'OpeningHoursSpecification',
        'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
        'opens' => '07:00',
        'closes' => '17:00',
    ],
    'hasCredential' => [
        ['@type' => 'EducationalOccupationalCredential', 'name' => 'RBQ — Licence Régie du bâtiment du Québec'],
        ['@type' => 'EducationalOccupationalCredential', 'name' => 'CCQ — Main-d\'œuvre certifiée Commission de la construction du Québec'],
        ['@type' => 'EducationalOccupationalCredential', 'name' => 'APCHQ — Garantie rénovation'],
        ['@type' => 'EducationalOccupationalCredential', 'name' => 'GCR — Plan de garantie des bâtiments résidentiels neufs'],
        ['@type' => 'EducationalOccupationalCredential', 'name' => 'Novoclimat 2.0 — Efficacité énergétique'],
    ],
    'founder' => ['@type' => 'Person', 'name' => 'Ali Salomon', 'jobTitle' => 'Président et Directeur Général'],
    'foundingLocation' => ['@type' => 'Place', 'address' => ['@type' => 'PostalAddress', 'addressLocality' => 'Québec', 'addressRegion' => 'QC', 'addressCountry' => 'CA']],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>

{{-- T130 — Speakable Schema (AEO 2026 ChatGPT / Perplexity / Gemini) --}}
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'WebPage',
    'name' => 'Kalystrat — Groupe québécois de construction à intégration verticale',
    'url' => url('/'),
    'speakable' => [
        '@type' => 'SpeakableSpecification',
        'cssSelector' => [
            'h1',
            '.ks-page-hero__subtitle',
            '#six-piliers-title',
            '#defi-title',
            '.ks-defi__market-stat',
            '.ks-approche__commitment-title',
            '.ks-faq__question',
            '.ks-faq__answer',
        ],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>

{{-- T136 — Service Schema × 6 filiales (SEO type 2026) --}}
@php
$services = [
    ['name' => 'Fondations, coffrage et excavation', 'slug' => 'fondations', 'desc' => 'Excavation, coffrage de fondations, coulée de béton, drains français, dalles, imperméabilisation. Résidentiel, commercial, institutionnel.'],
    ['name' => 'Charpente structurale (bois, acier, hybride)', 'slug' => 'structure', 'desc' => 'Ossature bois, charpente acier, systèmes hybrides, poutrelles, fermes de toit, structures préfabriquées.'],
    ['name' => 'Toiture et enveloppe du bâtiment', 'slug' => 'toiture-enveloppe', 'desc' => 'Toits plats et en pente, membranes élastomères, TPO, EPDM, pare-air, pare-vapeur, isolation thermique, revêtements extérieurs.'],
    ['name' => 'Finition intérieure haut de gamme et accessible', 'slug' => 'finition-interieure', 'desc' => 'Gypse, peinture, moulures, planchers (bois franc, céramique, vinyle), ébénisterie sur mesure, comptoirs, portes et quincaillerie.'],
    ['name' => 'Développement immobilier et revente', 'slug' => 'immobilier', 'desc' => 'Acquisition de terrains, construction résidentielle et multi-logements, rénovations et reventes après rénovation, portefeuille locatif.'],
    ['name' => 'Placement de main-d\'œuvre construction', 'slug' => 'placement-construction', 'desc' => 'Recrutement et placement temporaire ou permanent de travailleurs qualifiés CCQ, formation, intégration, gestion paie et conformité.'],
];
@endphp
@foreach($services as $s)
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'serviceType' => $s['name'],
    'name' => 'Kalystrat ' . ucfirst(str_replace('-', ' ', $s['slug'])),
    'description' => $s['desc'],
    'provider' => [
        '@type' => 'GeneralContractor',
        'name' => 'Gestion Kalystrat Inc.',
        'url' => url('/'),
    ],
    'areaServed' => ['@type' => 'AdministrativeArea', 'name' => 'Capitale-Nationale, Québec'],
    'url' => url('/filiales/' . $s['slug']),
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endforeach

{{-- T136 — FAQPage Schema AEO 2026 (réponses LLM-friendly) --}}
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        [
            '@type' => 'Question',
            'name' => 'Quelles régions du Québec Kalystrat dessert-il ?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => "Kalystrat dessert la région de Québec (Capitale-Nationale) : Québec, Lévis, Sainte-Foy, Beauport, Sillery et le Vieux-Québec. Le siège social est à Québec et nous intervenons sur les projets résidentiels, commerciaux, institutionnels, industriels et municipaux.",
            ],
        ],
        [
            '@type' => 'Question',
            'name' => "Quel est le délai pour obtenir une soumission ?",
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => "Pour un projet résidentiel, la soumission détaillée est livrée sous 5 à 10 jours ouvrables après la visite et la prise de mesures. Pour les projets commerciaux ou institutionnels avec modélisation BIM, le délai varie selon la complexité technique. Le devis est clair, à prix forfaitaire, avec un calendrier d'étapes partagé.",
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'Quelles garanties offrez-vous sur vos chantiers ?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => "Trois garanties cumulées : (1) Plan de garantie GCR pour le neuf résidentiel ; (2) garantie légale du Code civil du Québec sur les vices structurels ; (3) licence RBQ vérifiable directement sur rbq.gouv.qc.ca. Kalystrat détient aussi l'accréditation APCHQ rénovation et la conformité Novoclimat 2.0.",
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'Êtes-vous conformes au Code de construction du Québec 2026 ?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => "Oui, 100 % conforme. Nos équipes maîtrisent les exigences du Code 2026 : étanchéité à l'air 1,5 ach@50Pa, isolation R-49 toiture et R-24 murs, ventilation HRV obligatoire, normes Novoclimat 2.0. La conformité est intégrée dès la conception et validée par test d'étanchéité (blower door) avant livraison.",
            ],
        ],
        [
            '@type' => 'Question',
            'name' => "Que signifie « intégration verticale » chez Kalystrat ?",
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => "L'intégration verticale signifie que Kalystrat exécute chaque étape d'un projet en interne via ses six filiales : Fondations, Structure, Toiture et enveloppe, Finition intérieure, Immobilier, Placement construction. Aucune sous-traitance externe sur les corps de métier clés. Avantages : un seul calendrier maître, un chargé de projet unique, qualité homogène du sous-sol au toit.",
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'Comment vérifier la licence RBQ de Kalystrat ?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => "La licence Régie du bâtiment du Québec (RBQ) est vérifiable publiquement sur le site officiel rbq.gouv.qc.ca, section « Registre des détenteurs de licence ». Le numéro de licence est communiqué dès le premier contact commercial. Nos catégories couvrent toutes les opérations de fondations, structure, toiture, finition et développement immobilier.",
            ],
        ],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
@endpush

@section('content')

<header class="ks-page-hero ks-page-hero--split">
    @php
        $heroPosterPath = public_path('intime/videos/hero-poster.jpg');
        $heroPosterBust = file_exists($heroPosterPath) ? '?v=' . filemtime($heroPosterPath) : '';
    @endphp
    <div class="ks-hero-split__visual">
        <img class="ks-hero-split__poster ks-hero-split__poster--kenburns" src="/intime/videos/hero-poster.jpg{{ $heroPosterBust }}" alt="Chantier de construction résidentielle moderne — coucher de soleil sur grues et immeubles" loading="eager" fetchpriority="high" width="1920" height="1080">
    </div>

    <div class="ks-hero-split__content">
        <span class="ks-hero-split__eyebrow">Conçu, réalisé, livré</span>
        <h1>Bâtir le Québec sous une seule marque</h1>
        <p class="ks-page-hero__subtitle">Six filiales spécialisées, une marque unifiée. Du chantier à la livraison, Kalystrat orchestre votre projet de construction au Québec.</p>
        <div class="ks-hero-split__cta">
            <a href="{{ route('contact') }}" class="ks-cta-primary">Obtenir une soumission</a>
            <a href="{{ route('apropos') }}" class="ks-cta-secondary" style="color:var(--ks-white);border-color:var(--ks-gold-500)">Découvrir le groupe</a>
        </div>
    </div>

    <div class="ks-hero-stats" aria-label="Chiffres clés Gestion Kalystrat Inc.">
        <div class="ks-hero-stat">
            <span class="ks-hero-stat__num">6</span>
            <span class="ks-hero-stat__label">Filiales spécialisées</span>
        </div>
        <div class="ks-hero-stat">
            <span class="ks-hero-stat__num">100<sup style="font-size:0.45em;color:var(--ks-gold-500)">+</sup></span>
            <span class="ks-hero-stat__label">Compagnons CCQ</span>
        </div>
        <div class="ks-hero-stat">
            <span class="ks-hero-stat__num">5</span>
            <span class="ks-hero-stat__label">Secteurs desservis</span>
        </div>
        <div class="ks-hero-stat">
            <span class="ks-hero-stat__num">RBQ</span>
            <span class="ks-hero-stat__label">Licence active</span>
        </div>
    </div>
</header>

<aside class="ks-trust-row" aria-label="Signaux de conformité et de qualité">
    <div class="ks-trust-row__item">
        <span class="ks-trust-row__badge">RBQ</span>
        <span class="ks-trust-row__label">Licence active</span>
    </div>
    <div class="ks-trust-row__item">
        <span class="ks-trust-row__badge">CCQ</span>
        <span class="ks-trust-row__label">Main-d’œuvre certifiée</span>
    </div>
    <div class="ks-trust-row__item">
        <span class="ks-trust-row__badge">APCHQ</span>
        <span class="ks-trust-row__label">Garantie rénovation</span>
    </div>
    <div class="ks-trust-row__item">
        <span class="ks-trust-row__badge">GCR</span>
        <span class="ks-trust-row__label">Garantie neuf résidentiel</span>
    </div>
    <div class="ks-trust-row__item">
        <span class="ks-trust-row__badge">Novoclimat 2.0</span>
        <span class="ks-trust-row__label">Efficacité énergétique</span>
    </div>
    <div class="ks-trust-row__item">
        <span class="ks-trust-row__badge">Code QC 2026</span>
        <span class="ks-trust-row__label">Conformité totale</span>
    </div>
</aside>

<section class="ks-section ks-pillars" id="six-piliers" aria-labelledby="six-piliers-title">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--split">
            <div class="ks-section__heading-left">
                <span class="ks-eyebrow">Six piliers fondateurs</span>
                <h2 id="six-piliers-title" class="ks-h2">Six avantages,<br>une marque unifiée.</h2>
            </div>
            <div class="ks-section__heading-right">
                <p class="ks-lead">L'avantage concurrentiel de Kalystrat repose sur six piliers structurels. Ils ne sont pas des promesses marketing, mais l'architecture opérationnelle du groupe&nbsp;: de la main-d'œuvre interne à la demande captive, chaque pilier rend les autres plus solides.</p>
            </div>
        </div>
        <div class="ks-pillars__grid ks-pillars__grid--six">
            <article class="ks-pillar">
                <div class="ks-pillar__num" aria-hidden="true">01</div>
                <h3 class="ks-pillar__title">Intégration verticale</h3>
                <p class="ks-pillar__text">De l'excavation à la finition, chaque étape est exécutée en interne par l'une des six filiales. Les marges des sous-traitants et les délais de coordination sont éliminés.</p>
            </article>
            <article class="ks-pillar">
                <div class="ks-pillar__num" aria-hidden="true">02</div>
                <h3 class="ks-pillar__title">Main-d'œuvre interne</h3>
                <p class="ks-pillar__text"><a href="{{ route('filiale', 'placement-construction') }}">Kalystrat Placement construction</a> fournit la main-d'œuvre certifiée CCQ à toutes les filiales du groupe. Disponibilité garantie, formation cohérente.</p>
            </article>
            <article class="ks-pillar">
                <div class="ks-pillar__num" aria-hidden="true">03</div>
                <h3 class="ks-pillar__title">Demande captive</h3>
                <p class="ks-pillar__text"><a href="{{ route('filiale', 'immobilier') }}">Kalystrat Immobilier</a> développe ses propres projets résidentiels et opérations de revalorisation, générant un flux de chantiers constant pour les cinq autres filiales.</p>
            </article>
            <article class="ks-pillar">
                <div class="ks-pillar__num" aria-hidden="true">04</div>
                <h3 class="ks-pillar__title">Synergies opérationnelles</h3>
                <p class="ks-pillar__text">La chaîne complète tourne en boucle&nbsp;: Immobilier acquiert, Fondations excave, Structure charpente, Toiture protège, Finition complète, Placement fournit la main-d'œuvre à chaque étape.</p>
            </article>
            <article class="ks-pillar">
                <div class="ks-pillar__num" aria-hidden="true">05</div>
                <h3 class="ks-pillar__title">Cohérence de marque</h3>
                <p class="ks-pillar__text">Convention « Kalystrat + spécialité » sur les six filiales. Reconnaissance instantanée, confiance projetée auprès des clients, promoteurs et partenaires.</p>
            </article>
            <article class="ks-pillar">
                <div class="ks-pillar__num" aria-hidden="true">06</div>
                <h3 class="ks-pillar__title">Gestion centralisée</h3>
                <p class="ks-pillar__text">Comptabilité, ressources humaines, juridique, marketing et technologies de l'information sont mutualisés au niveau de la société mère. Frais généraux par filiale réduits, exécution alignée.</p>
            </article>
        </div>
    </div>
</section>

<section class="ks-section ks-defi" data-defi-section aria-labelledby="defi-title">
    <div class="ks-container">

        <div class="ks-defi__market" aria-label="Le marché québécois de la construction en 2026">
            <span class="ks-eyebrow">Marché 2026 en chiffres</span>
            <div class="ks-defi__market-grid">
                <article class="ks-defi__market-stat">
                    <span class="ks-defi__market-num">59&nbsp;864</span>
                    <span class="ks-defi__market-label">Mises en chantier au Québec en 2025 (+23&nbsp;%)</span>
                    <cite class="ks-defi__market-src">Source&nbsp;: SCHL</cite>
                </article>
                <article class="ks-defi__market-stat">
                    <span class="ks-defi__market-num">17&nbsp;000</span>
                    <span class="ks-defi__market-label">Travailleurs supplémentaires recherchés chaque année en construction</span>
                    <cite class="ks-defi__market-src">Source&nbsp;: CCQ</cite>
                </article>
                <article class="ks-defi__market-stat">
                    <span class="ks-defi__market-num">19&nbsp;G$</span>
                    <span class="ks-defi__market-label">Marché québécois de la rénovation en croissance</span>
                    <cite class="ks-defi__market-src">Source&nbsp;: APCHQ</cite>
                </article>
            </div>
        </div>

        <div class="ks-defi__grid">
            <article class="ks-defi__lead">
                <span class="ks-eyebrow">Conçu, réalisé, livré</span>
                <h2 id="defi-title" class="ks-defi__title">Le défi de la construction<br>au Québec en&nbsp;2026</h2>
                <p class="ks-defi__intro">Pénurie de main-d'œuvre, hausse des coûts, complexité réglementaire. L'industrie québécoise traverse une période exigeante.<br><br><strong>Notre réponse&nbsp;: l'intégration verticale.</strong></p>
                <ul class="ks-defi__points">
                    <li>
                        <span class="ks-defi__bullet" aria-hidden="true">→</span>
                        <span>Six filiales spécialisées qui couvrent toute la chaîne, de l’excavation aux finitions.</span>
                    </li>
                    <li>
                        <span class="ks-defi__bullet" aria-hidden="true">→</span>
                        <span>Une équipe interne de compagnons certifiés CCQ, formée aux normes Novoclimat 2.0 et au Code 2026.</span>
                    </li>
                    <li>
                        <span class="ks-defi__bullet" aria-hidden="true">→</span>
                        <span>Demande captive via Kalystrat Immobilier&nbsp;: stabilité financière et qualité constante.</span>
                    </li>
                </ul>
            </article>

            <article class="ks-defi__kpi ks-defi__kpi--filiales">
                <span class="ks-eyebrow">Filiales</span>
                <span class="ks-defi__num" data-counter data-target="6" data-suffix="">0</span>
                <p class="ks-defi__caption">Six filiales assemblées en un seul groupe cohérent.</p>
                {{-- T154-v2 — Vrai casse-tête jigsaw 6 pièces 3×2
                     Pièces 80×40 avec demi-cercles (rayon 8) tabs/blanks
                     Checkerboard gold/navy : intégration verticale, 6 filiales unies --}}
                <svg class="ks-defi__puzzle" aria-hidden="true" viewBox="0 0 240 80" preserveAspectRatio="xMidYMid meet">
                    {{-- 6 pièces avec 3 nuances dorées TOUTES WCAG AAA (7:1+) sur navy-900
                         gold-500 #B8A472 = 7.42:1 / amber #D4B968 = 9.44:1 / cream #E5D5A8 = 12.44:1
                         Stroke navy subtil pour séparer chaque pièce visuellement --}}
                    {{-- P1 haut-gauche : top=flat, right=TAB, bottom=TAB, left=flat --}}
                    <path data-puzzle-piece="1"
                          d="M 0,0 H 80 V 12 a8,8 0 0,1 0,16 V 40 H 48 a8,8 0 0,1 -16,0 H 0 Z"
                          fill="#B8A472"
                          stroke="var(--ks-navy-900)" stroke-width="0.6" stroke-linejoin="round"/>
                    {{-- P2 haut-centre : top=flat, right=TAB, bottom=TAB, left=BLANK --}}
                    <path data-puzzle-piece="2"
                          d="M 80,0 H 160 V 12 a8,8 0 0,1 0,16 V 40 H 128 a8,8 0 0,1 -16,0 H 80 V 28 a8,8 0 0,0 0,-16 V 0 Z"
                          fill="#D4B968"
                          stroke="var(--ks-navy-900)" stroke-width="0.6" stroke-linejoin="round"/>
                    {{-- P3 haut-droite : top=flat, right=flat, bottom=BLANK, left=BLANK --}}
                    <path data-puzzle-piece="3"
                          d="M 160,0 H 240 V 40 H 208 a8,8 0 0,0 -16,0 H 160 V 28 a8,8 0 0,0 0,-16 V 0 Z"
                          fill="#E5D5A8"
                          stroke="var(--ks-navy-900)" stroke-width="0.6" stroke-linejoin="round"/>
                    {{-- P4 bas-gauche : top=BLANK, right=BLANK, bottom=flat, left=flat --}}
                    <path data-puzzle-piece="4"
                          d="M 0,40 H 32 a8,8 0 0,0 16,0 H 80 V 52 a8,8 0 0,0 0,16 V 80 H 0 V 40 Z"
                          fill="#D4B968"
                          stroke="var(--ks-navy-900)" stroke-width="0.6" stroke-linejoin="round"/>
                    {{-- P5 bas-centre : top=BLANK, right=TAB, bottom=flat, left=TAB --}}
                    <path data-puzzle-piece="5"
                          d="M 80,40 H 112 a8,8 0 0,0 16,0 H 160 V 52 a8,8 0 0,1 0,16 V 80 H 80 V 68 a8,8 0 0,1 0,-16 V 40 Z"
                          fill="#E5D5A8"
                          stroke="var(--ks-navy-900)" stroke-width="0.6" stroke-linejoin="round"/>
                    {{-- P6 bas-droite : top=TAB, right=flat, bottom=flat, left=BLANK --}}
                    <path data-puzzle-piece="6"
                          d="M 160,40 H 192 a8,8 0 0,1 16,0 H 240 V 80 H 160 V 68 a8,8 0 0,0 0,-16 V 40 Z"
                          fill="#B8A472"
                          stroke="var(--ks-navy-900)" stroke-width="0.6" stroke-linejoin="round"/>
                </svg>
            </article>

            <article class="ks-defi__kpi ks-defi__kpi--compagnons">
                <span class="ks-eyebrow">Compagnons CCQ</span>
                <span class="ks-defi__num"><span data-counter data-target="100">0</span><sup>+</sup></span>
                <p class="ks-defi__caption">Compagnons certifiés sur nos chantiers, et en croissance continue.</p>
                {{-- T144 — Option D : Trajectoire « growth journey » (path courbe + dep/arr cercles + flèche pointillée) --}}
                <svg class="ks-defi__journey" aria-hidden="true" viewBox="0 0 240 80" preserveAspectRatio="xMidYMid meet">
                    {{-- Courbe ascendante du point de départ au point d'arrivée --}}
                    <path d="M14 66 C 60 64, 90 50, 120 38 S 180 18, 200 14"
                          fill="none"
                          stroke="var(--ks-gold-500)"
                          stroke-width="2.5"
                          stroke-linecap="round"
                          data-journey-path/>
                    {{-- Continuation pointillée vers la droite (croissance future) --}}
                    <path d="M200 14 L230 8"
                          fill="none"
                          stroke="var(--ks-gold-500)"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-dasharray="2 5"
                          opacity="0.65"
                          data-journey-tail/>
                    {{-- Petite flèche au bout de la continuation --}}
                    <path d="M223 4 L232 8 L225 13"
                          fill="none"
                          stroke="var(--ks-gold-500)"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          opacity="0.85"/>
                    {{-- Cercle départ (petit, opaque léger) --}}
                    <circle cx="14" cy="66" r="4"
                            fill="rgba(184,164,114,0.55)"
                            stroke="var(--ks-gold-500)"
                            stroke-width="1.5"/>
                    {{-- Cercle arrivée (plus gros, plein, anneau d'accent) --}}
                    <circle cx="200" cy="14" r="7" fill="var(--ks-gold-500)" data-journey-pulse/>
                    <circle cx="200" cy="14" r="7" fill="none" stroke="var(--ks-gold-500)" stroke-width="1" opacity="0.35" data-journey-ring/>
                </svg>
            </article>

            <article class="ks-defi__kpi ks-defi__kpi--secteurs">
                <span class="ks-eyebrow">Secteurs</span>
                <span class="ks-defi__num" data-counter data-target="5">0</span>
                <p class="ks-defi__caption">Résidentiel, commercial, institutionnel, industriel, municipal.</p>
                {{-- T143 — Dessin secteurs (5 colonnes verticales graduées, miroir des autres KPI) --}}
                <svg class="ks-defi__sectors" aria-hidden="true" viewBox="0 0 220 60" preserveAspectRatio="xMidYMid meet">
                    <rect x="10"  y="22" width="32" height="34" rx="2" fill="var(--ks-gold-500)" opacity="0.55"/>
                    <rect x="50"  y="14" width="32" height="42" rx="2" fill="var(--ks-gold-500)" opacity="0.70"/>
                    <rect x="90"  y="8"  width="32" height="48" rx="2" fill="var(--ks-gold-500)" opacity="0.85"/>
                    <rect x="130" y="14" width="32" height="42" rx="2" fill="var(--ks-gold-500)" opacity="0.70"/>
                    <rect x="170" y="22" width="32" height="34" rx="2" fill="var(--ks-gold-500)" opacity="0.55"/>
                </svg>
            </article>

            <article class="ks-defi__signature">
                <div class="ks-defi__sig-name">Ali Salomon</div>
                <div class="ks-defi__sig-role">Président · Directeur Général</div>
            </article>
        </div>
    </div>
</section>

<script>
(function () {
    var section = document.querySelector('[data-defi-section]');
    if (!section) return;
    function animateCounter(el) {
        var target = parseInt(el.dataset.target, 10) || 0;
        var duration = 1400;
        var start = performance.now();
        function tick(now) {
            var p = Math.min(1, (now - start) / duration);
            var eased = 1 - Math.pow(1 - p, 3);
            el.textContent = Math.round(target * eased);
            if (p < 1) requestAnimationFrame(tick);
        }
        requestAnimationFrame(tick);
    }
    if ('IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) {
                    section.classList.add('is-revealed');
                    section.querySelectorAll('[data-counter]').forEach(animateCounter);
                    io.unobserve(section);
                }
            });
        }, { threshold: 0.25 });
        io.observe(section);
    } else {
        section.classList.add('is-revealed');
        section.querySelectorAll('[data-counter]').forEach(animateCounter);
    }
})();
</script>

<section class="ks-section ks-approche" id="approche-long-terme" aria-labelledby="approche-title">
    <div class="ks-container">
        <div class="ks-approche__grid">
            <article class="ks-approche__narrative">
                <span class="ks-eyebrow">Conçu, réalisé, livré</span>
                <h2 id="approche-title" class="ks-h2 ks-approche__title">Une approche structurée à long terme</h2>
                <p class="ks-lead ks-approche__lead">L'intégration verticale n'est pas un slogan creux. C'est une discipline opérationnelle&nbsp;: moins d'imprévus de coordination, calendrier maître unique pour les six filiales, qualité homogène du sous-sol au toit.</p>
                <p class="ks-lead ks-approche__lead">Six directions de filiales spécialisées, alignées sous une même gouvernance. Notre crédibilité repose sur la profondeur des expertises métier et la conformité totale au Code de construction du Québec 2026.</p>
                <p class="ks-lead ks-approche__lead">La direction est appuyée par un <strong>conseil consultatif</strong> réunissant des experts en construction, financement, droit des affaires, ressources humaines et immobilier — dont <strong>Me Jacques Jobidon</strong> (droit de la construction et des sociétés) et <strong>Perry Wong</strong> (immobilier).</p>
                <div class="ks-approche__expertise" aria-hidden="true">
                    <span class="ks-approche__expertise-label">Expertise structurée</span>
                    <div class="ks-approche__expertise-grid">
                        <span class="ks-approche__expertise-ancre"><strong>6</strong> Directeurs spécialistes</span>
                        <span class="ks-approche__expertise-ancre"><strong>5</strong> Domaines Code 2026</span>
                        <span class="ks-approche__expertise-ancre"><strong>9</strong> Régions desservies</span>
                    </div>
                </div>
            </article>
            <aside class="ks-approche__stats" aria-label="Engagements contractuels Kalystrat">
                <article class="ks-approche__commitment">
                    <svg class="ks-approche__commitment-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                        <path fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M9 11l3 3 8-8M20 12v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h9"/>
                    </svg>
                    <div class="ks-approche__commitment-meta">
                        <span class="ks-eyebrow">Engagement contractuel</span>
                        <h3 class="ks-approche__commitment-title">Prix forfaitaire et calendrier écrit</h3>
                        <p class="ks-approche__commitment-text">Devis clair à prix forfaitaire, accompagné d'un calendrier d'étapes partagé. Tout ajustement est signé conjointement&nbsp;: aucune surprise sur la facture finale.</p>
                    </div>
                </article>
                <article class="ks-approche__commitment">
                    <svg class="ks-approche__commitment-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                        <path fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M12 2l8 4v6c0 5-3.5 9.5-8 10-4.5-.5-8-5-8-10V6l8-4z"/>
                        <path fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4"/>
                    </svg>
                    <div class="ks-approche__commitment-meta">
                        <span class="ks-eyebrow">Garanties cumulées</span>
                        <h3 class="ks-approche__commitment-title">Plan GCR · Code civil · licence RBQ</h3>
                        <p class="ks-approche__commitment-text">Plan de garantie GCR pour le neuf résidentiel, garantie légale du Code civil du Québec sur vices structurels, licence RBQ vérifiable sur <em>rbq.gouv.qc.ca</em>.</p>
                    </div>
                </article>
            </aside>
        </div>
    </div>
</section>

@php
    $showcasePath = public_path('intime/images/pages/home-showcase-aerial.webp');
    $showcaseBust = file_exists($showcasePath) ? '?v=' . filemtime($showcasePath) : '';
@endphp
<section class="ks-showcase" aria-label="Vue aérienne d'un chantier Kalystrat au coucher du soleil" style="--ks-showcase-img: url('/intime/images/pages/home-showcase-aerial.webp{{ $showcaseBust }}')">
    <div class="ks-showcase__overlay" aria-hidden="true"></div>
    <div class="ks-container ks-showcase__inner">
        <span class="ks-eyebrow ks-showcase__eyebrow">Sur le terrain au Québec</span>
        <h2 class="ks-showcase__title">Du sol au sommet,<br>une seule discipline.</h2>
        <p class="ks-showcase__text">Chaque chantier mobilise les six filiales selon un calendrier unique. La coordination devient un avantage opérationnel, pas un goulot d'étranglement.</p>
        <div class="ks-showcase__kpis">
            <div class="ks-showcase__kpi">
                <span class="ks-showcase__kpi-num">6</span>
                <span class="ks-showcase__kpi-lbl">Filiales mobilisées</span>
            </div>
            <div class="ks-showcase__kpi">
                <span class="ks-showcase__kpi-num">1</span>
                <span class="ks-showcase__kpi-lbl">Calendrier maître</span>
            </div>
            <div class="ks-showcase__kpi">
                <span class="ks-showcase__kpi-num">9</span>
                <span class="ks-showcase__kpi-lbl">Régions desservies</span>
            </div>
        </div>
    </div>
</section>

<section class="ks-section ks-section--dark">
    <div class="ks-container">
        <div class="ks-section__heading">
            <span class="ks-eyebrow">Ils nous font confiance</span>
            <h2 class="ks-h2">Témoignages</h2>
            <p class="ks-lead" style="color:rgba(255,255,255,0.85)">Promoteurs, propriétaires, gestionnaires institutionnels&nbsp;: ce qu’ils retiennent d’un projet livré par Kalystrat.</p>
        </div>
        <div class="ks-bento ks-bento--3col">
            <article class="ks-card ks-card--dark">
                <div style="font-family:var(--ks-font-display);font-size:3rem;color:var(--ks-gold-500);line-height:1;margin-bottom:1rem">“</div>
                <p class="ks-card__text" style="font-style:italic">Pour un promoteur, traiter avec une seule équipe pour les fondations, la structure et la finition change tout. Les délais ne dérapent plus, et la qualité reste constante du sous-sol au toit.</p>
                <div style="margin-top:1.5rem;padding-top:1.5rem;border-top:1px solid rgba(255,255,255,0.15)">
                    <strong style="color:var(--ks-gold-500);display:block">Promoteur immobilier</strong>
                    <span style="color:rgba(255,255,255,0.7);font-size:0.875rem">Multilogement 24 unités, Lévis</span>
                </div>
            </article>
            <article class="ks-card ks-card--dark">
                <div style="font-family:var(--ks-font-display);font-size:3rem;color:var(--ks-gold-500);line-height:1;margin-bottom:1rem">“</div>
                <p class="ks-card__text" style="font-style:italic">Le contrôle qualité interne fait la différence. À chaque étape, le chargé de projet vérifie le travail avant de passer à la prochaine filiale. Aucune zone grise de responsabilité.</p>
                <div style="margin-top:1.5rem;padding-top:1.5rem;border-top:1px solid rgba(255,255,255,0.15)">
                    <strong style="color:var(--ks-gold-500);display:block">Propriétaire résidentiel</strong>
                    <span style="color:rgba(255,255,255,0.7);font-size:0.875rem">Maison neuve custom, Sainte-Foy</span>
                </div>
            </article>
            <article class="ks-card ks-card--dark">
                <div style="font-family:var(--ks-font-display);font-size:3rem;color:var(--ks-gold-500);line-height:1;margin-bottom:1rem">“</div>
                <p class="ks-card__text" style="font-style:italic">Les exigences du Code 2026 sur l’étanchéité à l’air sont sévères. L’équipe Kalystrat avait anticipé ces normes dès la conception. Notre test d'étanchéité a passé du premier coup.</p>
                <div style="margin-top:1.5rem;padding-top:1.5rem;border-top:1px solid rgba(255,255,255,0.15)">
                    <strong style="color:var(--ks-gold-500);display:block">Gestionnaire institutionnel</strong>
                    <span style="color:rgba(255,255,255,0.7);font-size:0.875rem">Pavillon scolaire, Capitale-Nationale</span>
                </div>
            </article>
        </div>
    </div>
</section>

<section class="ks-section ks-process">
    <div class="ks-container">
        <div class="ks-section__heading">
            <span class="ks-eyebrow">Comment nous travaillons</span>
            <h2 class="ks-h2">Notre approche en quatre étapes</h2>
            <p class="ks-process__lead">Du premier contact à la remise des clés, un parcours linéaire piloté par votre chargé de projet dédié. Délais contractuels, contrôle qualité à chaque étape, garanties activées.</p>
        </div>
        <ol class="ks-process__timeline" aria-label="Notre processus en quatre étapes séquentielles">
            <li class="ks-process__step">
                <div class="ks-process__num" aria-hidden="true">01</div>
                <h3 class="ks-process__title">Évaluation et soumission</h3>
                <p class="ks-process__text">Visite du site, prise de mesures, étude des plans s’ils existent, recommandations techniques et soumission détaillée sous 5 à 10 jours ouvrables pour le résidentiel.</p>
            </li>
            <li class="ks-process__step">
                <div class="ks-process__num" aria-hidden="true">02</div>
                <h3 class="ks-process__title">Conception et permis</h3>
                <p class="ks-process__text">Coordination avec architectes et ingénieurs au besoin, modélisation BIM pour les projets commerciaux et institutionnels, dépôt du dossier complet à la municipalité.</p>
            </li>
            <li class="ks-process__step">
                <div class="ks-process__num" aria-hidden="true">03</div>
                <h3 class="ks-process__title">Exécution intégrée</h3>
                <p class="ks-process__text">Mobilisation de nos six filiales selon un calendrier serré, supervision par un chargé de projet unique, contrôle qualité à chaque étape, communication hebdomadaire avec le client.</p>
            </li>
            <li class="ks-process__step">
                <div class="ks-process__num" aria-hidden="true">04</div>
                <h3 class="ks-process__title">Livraison et garanties</h3>
                <p class="ks-process__text">Inspection conjointe, remise des documents (plans tels que construits, manuels d’entretien, certificats), activation du Plan de garantie GCR, accompagnement post-livraison.</p>
            </li>
        </ol>
    </div>
</section>

<section class="ks-section ks-section--alt ks-pourquoi" aria-labelledby="pourquoi-title">
    <div class="ks-container">
        <div class="ks-pourquoi__intro">
            <div class="ks-pourquoi__heading">
                <span class="ks-eyebrow">Preuves et garanties</span>
                <h2 id="pourquoi-title" class="ks-h2">Quatre preuves contractuelles</h2>
                <p class="ks-lead">Les six piliers ci-dessus décrivent la structure du groupe. Voici quatre preuves concrètes — vérifiables, techniques et contractuelles — que cette structure tient ses promesses sur chaque chantier Kalystrat.</p>
            </div>
        </div>

        <div class="ks-pourquoi__grid">
            <article class="ks-pourquoi__card ks-pourquoi__card--hero">
                <span class="ks-eyebrow">Intégration verticale</span>
                <h3 class="ks-card__title">Six filiales sous une marque, zéro sous-traitance sur les corps de métier clés</h3>
                <p class="ks-card__text">Chez Kalystrat, l’intégration n’est pas un mot creux. Nos six filiales — <a href="{{ route('filiale', 'fondations') }}">Fondations</a>, <a href="{{ route('filiale', 'structure') }}">Structure</a>, <a href="{{ route('filiale', 'toiture-enveloppe') }}">Toiture et enveloppe</a>, <a href="{{ route('filiale', 'finition-interieure') }}">Finition intérieure</a>, <a href="{{ route('filiale', 'immobilier') }}">Immobilier</a> et <a href="{{ route('filiale', 'placement-construction') }}">Placement construction</a> — collaborent au quotidien sur les mêmes chantiers. Cette proximité élimine les zones grises de responsabilité, accélère la prise de décision et garantit une qualité homogène du sous-sol au toit.</p>
            </article>

            <article class="ks-pourquoi__card">
                <span class="ks-eyebrow">Code QC 2026</span>
                <h3 class="ks-card__title">Conformité technique maîtrisée</h3>
                <p class="ks-card__text">Étanchéité 1,5 ach@50Pa, isolation R-49 toiture et R-24 murs, ventilation HRV obligatoire, normes Novoclimat 2.0. Nos équipes maîtrisent l’ensemble des exigences du nouveau Code de construction du Québec. <a href="{{ route('expertise') }}">Voir notre page Expertise</a>.</p>
            </article>

            <article class="ks-pourquoi__card">
                <span class="ks-eyebrow">Stabilité financière</span>
                <h3 class="ks-card__title">Demande captive interne</h3>
                <p class="ks-card__text"><a href="{{ route('filiale', 'immobilier') }}">Kalystrat Immobilier</a> développe ses propres projets résidentiels et locatifs. Le flux de chantiers internes alimente les cinq autres filiales en continu. Résultat&nbsp;: pas de pression à accepter n’importe quel mandat, sélection rigoureuse des projets externes.</p>
            </article>

            <article class="ks-pourquoi__card ks-pourquoi__card--wide">
                <span class="ks-eyebrow">Garanties cumulées</span>
                <h3 class="ks-card__title">Plan GCR, Code civil, licence RBQ</h3>
                <p class="ks-card__text">Plan de garantie GCR pour le neuf résidentiel, garantie légale du Code civil du Québec pour les vices structurels, licences RBQ par catégorie de travaux, assurance responsabilité civile professionnelle. Notre licence est vérifiable directement sur <em>rbq.gouv.qc.ca</em>.</p>
            </article>
        </div>
    </div>
</section>

<section class="ks-section ks-section--alt ks-faq" id="faq-rapide" aria-labelledby="faq-rapide-title">
    <div class="ks-container">
        <div class="ks-section__heading--split">
            <div class="ks-section__heading-left">
                <span class="ks-eyebrow">Questions rapides</span>
                <h2 id="faq-rapide-title" class="ks-h2">Six réponses,<br>une décision claire.</h2>
            </div>
            <div class="ks-section__heading-right">
                <p class="ks-lead">Les questions les plus posées par les promoteurs, propriétaires et gestionnaires institutionnels au premier contact. Une lecture rapide pour valider que Kalystrat répond à votre besoin avant d'engager une soumission.</p>
            </div>
        </div>

        <ul class="ks-faq__list">
            <li class="ks-faq__item">
                <details>
                    <summary class="ks-faq__question">Quelles régions du Québec Kalystrat dessert-il&nbsp;?</summary>
                    <p class="ks-faq__answer">Kalystrat dessert la région de Québec (Capitale-Nationale)&nbsp;: Québec, Lévis, Sainte-Foy, Beauport, Sillery et le Vieux-Québec. Le siège social est à Québec et nous intervenons sur les projets résidentiels, commerciaux, institutionnels, industriels et municipaux.</p>
                </details>
            </li>
            <li class="ks-faq__item">
                <details>
                    <summary class="ks-faq__question">Quel est le délai pour obtenir une soumission&nbsp;?</summary>
                    <p class="ks-faq__answer">Pour un projet résidentiel, la soumission détaillée est livrée sous 5 à 10 jours ouvrables après la visite et la prise de mesures. Pour les projets commerciaux ou institutionnels avec modélisation BIM, le délai varie selon la complexité technique. Le devis est clair, à prix forfaitaire, avec un calendrier d'étapes partagé.</p>
                </details>
            </li>
            <li class="ks-faq__item">
                <details>
                    <summary class="ks-faq__question">Quelles garanties offrez-vous sur vos chantiers&nbsp;?</summary>
                    <p class="ks-faq__answer">Trois garanties cumulées&nbsp;: (1) Plan de garantie GCR pour le neuf résidentiel&nbsp;; (2) garantie légale du Code civil du Québec sur les vices structurels&nbsp;; (3) licence RBQ vérifiable sur <em>rbq.gouv.qc.ca</em>. Kalystrat détient aussi l'accréditation APCHQ rénovation et la conformité Novoclimat 2.0.</p>
                </details>
            </li>
            <li class="ks-faq__item">
                <details>
                    <summary class="ks-faq__question">Êtes-vous conformes au Code de construction du Québec 2026&nbsp;?</summary>
                    <p class="ks-faq__answer">Oui, 100&nbsp;% conforme. Nos équipes maîtrisent les exigences du Code 2026&nbsp;: étanchéité à l'air 1,5 ach@50Pa, isolation R-49 toiture et R-24 murs, ventilation HRV obligatoire, normes Novoclimat 2.0. La conformité est intégrée dès la conception et validée par un test d'étanchéité (<em>blower door</em>) avant livraison.</p>
                </details>
            </li>
            <li class="ks-faq__item">
                <details>
                    <summary class="ks-faq__question">Que signifie «&nbsp;intégration verticale&nbsp;» chez Kalystrat&nbsp;?</summary>
                    <p class="ks-faq__answer">L'intégration verticale signifie que Kalystrat exécute chaque étape d'un projet en interne via ses six filiales&nbsp;: Fondations, Structure, Toiture et enveloppe, Finition intérieure, Immobilier, Placement construction. Aucune sous-traitance externe sur les corps de métier clés. Avantages&nbsp;: un seul calendrier maître, un chargé de projet unique, qualité homogène du sous-sol au toit.</p>
                </details>
            </li>
            <li class="ks-faq__item">
                <details>
                    <summary class="ks-faq__question">Comment vérifier la licence RBQ de Kalystrat&nbsp;?</summary>
                    <p class="ks-faq__answer">La licence Régie du bâtiment du Québec (RBQ) est vérifiable publiquement sur <em>rbq.gouv.qc.ca</em>, section «&nbsp;Registre des détenteurs de licence&nbsp;». Le numéro de licence est communiqué dès le premier contact commercial. Nos catégories couvrent toutes les opérations de fondations, structure, toiture, finition et développement immobilier.</p>
                </details>
            </li>
        </ul>

        <div class="ks-faq__cta">
            <a href="{{ route('faq') }}" class="ks-cta-secondary">Voir toutes les questions fréquentes</a>
        </div>
    </div>
</section>

<section class="ks-section">
    <div class="ks-container">
        <div class="ks-section__heading">
            <span class="ks-eyebrow">Notre blog</span>
            <h2 class="ks-h2">Nouvelles et perspectives</h2>
            <p class="ks-lead">Analyses du marché québécois, évolutions réglementaires et conseils pratiques pour vos projets de construction.</p>
        </div>
        <div class="ks-bento ks-bento--3col">
            <article class="ks-card ks-card--thumb">
                <a href="{{ route('blog.show', 'pourquoi-construire-multi-logements-quebec-2026') }}" class="ks-card__thumb-link" aria-label="Lire : Pourquoi construire des multilogements au Québec en 2026">
                    <img src="/intime/images/blog/blog-multilog.webp" alt="Immeuble résidentiel multilogements moderne" loading="lazy" width="940" height="650" class="ks-card__thumb">
                </a>
                <div class="ks-card__body">
                    <span class="ks-eyebrow">Marché immobilier</span>
                    <h3 class="ks-card__title"><a href="{{ route('blog.show', 'pourquoi-construire-multi-logements-quebec-2026') }}">Pourquoi construire des multilogements au Québec en 2026</a></h3>
                    <p class="ks-card__text">Pénurie de logements, démographie favorable, programmes SCHL&nbsp;: pourquoi le multilogement reste la catégorie d'actif la plus solide du marché québécois.</p>
                    <div class="ks-card__cta"><a href="{{ route('blog.show', 'pourquoi-construire-multi-logements-quebec-2026') }}" class="ks-cta-secondary">Lire l'article</a></div>
                </div>
            </article>
            <article class="ks-card ks-card--thumb">
                <a href="{{ route('blog.show', 'code-construction-quebec-2026-changements') }}" class="ks-card__thumb-link" aria-label="Lire : Code de construction Québec 2026, changements pour les propriétaires">
                    <img src="/intime/images/blog/blog-code-construction.webp" alt="Plan architectural et règlement de construction" loading="lazy" width="940" height="650" class="ks-card__thumb">
                </a>
                <div class="ks-card__body">
                    <span class="ks-eyebrow">Réglementation</span>
                    <h3 class="ks-card__title"><a href="{{ route('blog.show', 'code-construction-quebec-2026-changements') }}">Code de construction Québec 2026&nbsp;: ce que les propriétaires doivent savoir</a></h3>
                    <p class="ks-card__text">Étanchéité à l'air, isolation R-49, ventilation HRV&nbsp;: les changements majeurs et leur impact concret sur les projets.</p>
                    <div class="ks-card__cta"><a href="{{ route('blog.show', 'code-construction-quebec-2026-changements') }}" class="ks-cta-secondary">Lire l'article</a></div>
                </div>
            </article>
            <article class="ks-card ks-card--thumb">
                <a href="{{ route('blog.show', 'comment-choisir-entrepreneur-construction-qc-2026') }}" class="ks-card__thumb-link" aria-label="Lire : Comment choisir un entrepreneur en construction au Québec">
                    <img src="/intime/images/blog/blog-choisir-entrepreneur.webp" alt="Deux ouvriers en équipement de sécurité validant un accord" loading="lazy" width="940" height="650" class="ks-card__thumb">
                </a>
                <div class="ks-card__body">
                    <span class="ks-eyebrow">Conseils pratiques</span>
                    <h3 class="ks-card__title"><a href="{{ route('blog.show', 'comment-choisir-entrepreneur-construction-qc-2026') }}">Comment choisir un entrepreneur en construction au Québec</a></h3>
                    <p class="ks-card__text">Licence RBQ, cautionnement, références chantiers&nbsp;: la grille de vérification avant de signer un contrat de construction.</p>
                    <div class="ks-card__cta"><a href="{{ route('blog.show', 'comment-choisir-entrepreneur-construction-qc-2026') }}" class="ks-cta-secondary">Lire l'article</a></div>
                </div>
            </article>
        </div>
        <div style="margin-top:48px;text-align:center">
            <a href="{{ route('blog.index') }}" class="ks-cta-secondary">Voir tous les articles</a>
        </div>
    </div>
</section>

<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Prêt à bâtir avec une équipe intégrée&nbsp;?</h2>
        <p>Votre projet livré dans les délais, sans surprise. Soumission gratuite sous 5 à 10 jours ouvrables.</p>
        <a href="{{ route('contact') }}" class="ks-cta-primary">Démarrer un projet</a>
    </div>
</section>

@endsection
