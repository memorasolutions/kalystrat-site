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
    'inLanguage' => 'fr-CA',
    'speakable' => [
        '@type' => 'SpeakableSpecification',
        'cssSelector' => ['h1', '.ks-page-hero__subtitle', '.ks-h2', '.ks-lead'],
    ],
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

<x-frontend::page-hero
    photo="/intime/images/pages/apropos-hero-montreal-night.webp"
    eyebrow="Conçu, réalisé, livré"
    title="Un groupe québécois de construction à intégration verticale"
    subtitle="Six filiales spécialisées sous une marque unifiée. Une vision : faire de Gestion Kalystrat Inc. une référence québécoise de la construction intégrée."
>
    <x-slot:breadcrumb>
        <li><a href="{{ url('/') }}">Accueil</a></li>
        <li>À propos</li>
    </x-slot:breadcrumb>
</x-frontend::page-hero>

<x-frontend::page-toc :items="[
    ['id' => 'vision', 'num' => '01', 'label' => 'Notre vision'],
    ['id' => 'direction', 'num' => '02', 'label' => 'Direction et équipe'],
    ['id' => 'structure', 'num' => '03', 'label' => 'Structure du groupe'],
    ['id' => 'piliers', 'num' => '04', 'label' => 'Pourquoi Kalystrat'],
    ['id' => 'gouvernance', 'num' => '05', 'label' => 'Conseil consultatif'],
    ['id' => 'marche', 'num' => '06', 'label' => 'Marché québécois 2026'],
    ['id' => 'chaine-valeur', 'num' => '07', 'label' => 'Chaîne de valeur'],
    ['id' => 'services-centralises', 'num' => '08', 'label' => 'Services centralisés'],
    ['id' => 'croissance', 'num' => '09', 'label' => 'Stratégie de croissance'],
    ['id' => 'partenaires', 'num' => '10', 'label' => 'Partenaires'],
    ['id' => 'carrieres', 'num' => '11', 'label' => 'Carrières'],
]"/>

<section id="vision" class="ks-section ks-page-section">
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

<section id="direction" class="ks-section ks-section--alt ks-page-section" data-anchor-alias="equipe ali-salomon">
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
                <p class="ks-card__text">Ancré dans la Capitale-Nationale : Québec, Lévis, Sainte-Foy, Beauport, Sillery et le Vieux-Québec.</p>
            </article>
        </div>
    </div>
</section>

<section id="structure" class="ks-section ks-page-section">
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
            <img src="/intime/images/pages/apropos-aerial-cranes.webp" alt="Vue aérienne d'un chantier urbain en construction à Québec" loading="lazy" width="940" height="650">
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

<section id="piliers" class="ks-section ks-section--dark ks-page-section ks-page-section--dark">
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
        <div class="ks-bento ks-bento--3col ks-fade-in">
            @foreach($piliers as $i => $p)
            <article class="ks-card ks-card--dark">
                <h3 class="ks-card__title">{{ $p['t'] }}</h3>
                <p class="ks-card__text">{{ $p['d'] }}</p>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section id="gouvernance" class="ks-section ks-page-section" data-anchor-alias="conseil jacques-jobidon perry-wong">
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
            <img src="/intime/images/pages/apropos-team-architects.webp" alt="Deux professionnels en discussion devant un plan de construction" loading="lazy" width="940" height="650">
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

<section id="marche" class="ks-section ks-page-section">
    <div class="ks-container">
        <div class="ks-page-section__intro ks-fade-in">
            <span class="ks-page-section__num" aria-hidden="true">06</span>
            <div class="ks-page-section__heading">
                <span class="ks-eyebrow">Marché québécois 2026</span>
                <h2 class="ks-h2">Une fenêtre stratégique pour la construction intégrée</h2>
                <p class="ks-lead">Trois forces convergent sur le marché québécois&nbsp;: demande record en habitation, marché de la rénovation en pleine expansion, et pénurie chronique de main-d’œuvre. Notre modèle intégré répond directement à ces trois enjeux.</p>
            </div>
        </div>
        <div class="ks-bento ks-bento--3col ks-fade-in">
            <article class="ks-card ks-card--accent-gold">
                <div class="ks-stat__number">59 864</div>
                <div class="ks-stat__label">Mises en chantier 2025</div>
                <p class="ks-card__text" style="margin-top:1rem">Au Québec, +23&nbsp;% en un an (source SCHL). Déficit structurel persistant qui maintient une demande soutenue pour la construction neuve.</p>
            </article>
            <article class="ks-card ks-card--accent-gold">
                <div class="ks-stat__number">19<sup style="font-size:0.55em;color:var(--ks-gold-500)"> G$</sup></div>
                <div class="ks-stat__label">Marché rénovation Québec</div>
                <p class="ks-card__text" style="margin-top:1rem">En pleine expansion, avec une tendance marquée vers le segment haut de gamme. Kalystrat Finition Intérieure et Toiture-Enveloppe s’y positionnent.</p>
            </article>
            <article class="ks-card ks-card--accent-gold">
                <div class="ks-stat__number">17 000<sup style="font-size:0.55em;color:var(--ks-gold-500)">/an</sup></div>
                <div class="ks-stat__label">Travailleurs recherchés par année</div>
                <p class="ks-card__text" style="margin-top:1rem">Selon la CCQ, le Québec doit attirer environ 17 000 travailleurs supplémentaires chaque année pour répondre à la demande en construction. Kalystrat Placement Construction sert d'abord les filiales internes, puis la clientèle externe.</p>
            </article>
        </div>
    </div>
</section>

<section id="chaine-valeur" class="ks-section ks-page-section">
    <div class="ks-container">
        <div class="ks-page-section__intro ks-fade-in">
            <span class="ks-page-section__num" aria-hidden="true">07</span>
            <div class="ks-page-section__heading">
                <span class="ks-eyebrow">Chaîne de valeur intégrée</span>
                <h2 class="ks-h2">Une boucle complète, six maillons, une seule signature</h2>
                <p class="ks-lead">Chaque projet suit le même circuit interne, de l’acquisition jusqu’à la livraison clé en main. Aucune rupture, aucun délai de coordination avec un sous-traitant externe.</p>
            </div>
        </div>
        <ol class="ks-chain ks-fade-in" aria-label="Chaîne de valeur intégrée Kalystrat">
            <li class="ks-chain__step"><span class="ks-chain__num" aria-hidden="true">01</span><strong>Kalystrat Immobilier</strong><span class="ks-chain__role">Acquiert terrain ou propriété</span></li>
            <li class="ks-chain__step"><span class="ks-chain__num" aria-hidden="true">02</span><strong>Kalystrat Fondations</strong><span class="ks-chain__role">Excave et coule la fondation</span></li>
            <li class="ks-chain__step"><span class="ks-chain__num" aria-hidden="true">03</span><strong>Kalystrat Structure</strong><span class="ks-chain__role">Charpente le bâtiment</span></li>
            <li class="ks-chain__step"><span class="ks-chain__num" aria-hidden="true">04</span><strong>Kalystrat Toiture et Enveloppe</strong><span class="ks-chain__role">Protège et étanchéifie</span></li>
            <li class="ks-chain__step"><span class="ks-chain__num" aria-hidden="true">05</span><strong>Kalystrat Finition Intérieure</strong><span class="ks-chain__role">Complète les espaces</span></li>
            <li class="ks-chain__step"><span class="ks-chain__num" aria-hidden="true">06</span><strong>Kalystrat Placement Construction</strong><span class="ks-chain__role">Fournit la main-d’œuvre à chaque étape</span></li>
        </ol>
    </div>
</section>

<section id="services-centralises" class="ks-section ks-section--alt ks-page-section">
    <div class="ks-container">
        <div class="ks-page-section__intro ks-fade-in">
            <span class="ks-page-section__num" aria-hidden="true">08</span>
            <div class="ks-page-section__heading">
                <span class="ks-eyebrow">Services centralisés</span>
                <h2 class="ks-h2">Gouvernance centralisée, exécution décentralisée</h2>
                <p class="ks-lead">Cinq fonctions de soutien sont mutualisées à l’échelle du groupe pour réduire les frais généraux par filiale et garantir la cohérence opérationnelle.</p>
            </div>
        </div>
        <div class="ks-bento ks-bento--3col ks-fade-in">
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Service centralisé</span>
                <h3 class="ks-card__title">Comptabilité et finances</h3>
                <p class="ks-card__text">Tenue de livres, états financiers consolidés, gestion de la trésorerie, planification fiscale, budgétisation.</p>
            </article>
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Service centralisé</span>
                <h3 class="ks-card__title">Ressources humaines</h3>
                <p class="ks-card__text">Recrutement de cadres, paie, avantages sociaux, santé-sécurité au travail, conformité CCQ.</p>
            </article>
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Service centralisé</span>
                <h3 class="ks-card__title">Juridique</h3>
                <p class="ks-card__text">Contrats, conformité réglementaire (RBQ, CCQ), propriété intellectuelle, gestion de litiges.</p>
            </article>
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Service centralisé</span>
                <h3 class="ks-card__title">Marketing</h3>
                <p class="ks-card__text">Stratégie de marque unifiée, site web, médias sociaux, publicité, relations publiques.</p>
            </article>
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Service centralisé</span>
                <h3 class="ks-card__title">Technologies de l’information</h3>
                <p class="ks-card__text">Infrastructure informatique, logiciels de gestion de projet, système ERP, cybersécurité.</p>
            </article>
            <article class="ks-card ks-card--accent-navy">
                <span class="ks-eyebrow">Avantage groupe</span>
                <h3 class="ks-card__title">Frais généraux réduits par filiale</h3>
                <p class="ks-card__text">La mutualisation des fonctions support permet à chaque filiale de concentrer ses ressources sur l’exécution opérationnelle, sans recréer une structure administrative complète.</p>
            </article>
        </div>
    </div>
</section>

<section id="croissance" class="ks-section ks-page-section">
    <div class="ks-container">
        <div class="ks-page-section__intro ks-fade-in">
            <span class="ks-page-section__num" aria-hidden="true">09</span>
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

{{-- Ancres invisibles pour 301 /equipe/{slug} → /a-propos#{slug} (T193) --}}
<span id="ali-salomon" class="ks-sr-only" aria-hidden="true">Ali Salomon — voir section Direction</span>
<span id="jacques-jobidon" class="ks-sr-only" aria-hidden="true">Jacques Jobidon — voir section Gouvernance</span>
<span id="perry-wong" class="ks-sr-only" aria-hidden="true">Perry Wong — voir section Gouvernance</span>
<span id="equipe" class="ks-sr-only" aria-hidden="true">Équipe — voir section Direction</span>
<span id="conseil" class="ks-sr-only" aria-hidden="true">Conseil consultatif — voir section Gouvernance</span>

{{-- T193-B — Section Partenaires fusionnée depuis /partenaires (supprimée, 301) --}}
<section id="partenaires" class="ks-section ks-section--alt ks-page-section">
    <div class="ks-container">
        <div class="ks-page-section__intro ks-fade-in">
            <span class="ks-page-section__num" aria-hidden="true">10</span>
            <div class="ks-page-section__heading">
                <span class="ks-eyebrow">Écosystème</span>
                <h2 class="ks-h2">Partenaires d'affaires</h2>
                <p class="ks-lead">Architectes, designers, promoteurs, courtiers immobiliers, fournisseurs spécialisés. Construire ensemble, mieux et plus vite.</p>
            </div>
        </div>
        <div class="ks-bento ks-bento--2col ks-fade-in">
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Catégorie</span>
                <h3 class="ks-card__title">Architectes et designers</h3>
                <p class="ks-card__text">Cabinets d'architecture et firmes de design intérieur qui complètent l'offre des six filiales sur les projets résidentiels et commerciaux haut de gamme.</p>
            </article>
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Catégorie</span>
                <h3 class="ks-card__title">Promoteurs et courtiers</h3>
                <p class="ks-card__text">Promoteurs immobiliers et courtiers qui orientent leurs projets vers la chaîne intégrée Kalystrat (fondations à finitions, main-d'œuvre interne).</p>
            </article>
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Catégorie</span>
                <h3 class="ks-card__title">Fournisseurs spécialisés</h3>
                <p class="ks-card__text">Manufacturiers de matériaux, fournisseurs d'équipement et sous-traitants techniques (génie civil, structure préfabriquée, systèmes mécaniques).</p>
            </article>
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Catégorie</span>
                <h3 class="ks-card__title">Institutionnels et municipaux</h3>
                <p class="ks-card__text">Donneurs d'ouvrage publics et institutionnels (écoles, hôpitaux, infrastructure) qui exigent une exécution intégrée et conforme.</p>
            </article>
        </div>
        <div class="ks-card__cta" style="text-align:center;margin-top:2rem">
            <a href="{{ route('contact') }}" class="ks-cta-secondary">Devenir partenaire Kalystrat</a>
        </div>
    </div>
</section>

{{-- T193-B — Section Carrières fusionnée depuis /carrieres (supprimée, 301) --}}
<section id="carrieres" class="ks-section ks-page-section">
    <div class="ks-container">
        <div class="ks-page-section__intro ks-fade-in">
            <span class="ks-page-section__num" aria-hidden="true">11</span>
            <div class="ks-page-section__heading">
                <span class="ks-eyebrow">Rejoindre l'équipe</span>
                <h2 class="ks-h2">Carrières dans la construction</h2>
                <p class="ks-lead">Kalystrat Placement Construction recrute en continu. Travailleurs qualifiés CCQ, semi-qualifiés et professionnels de gestion, pour les six filiales du groupe et pour des clients externes.</p>
            </div>
        </div>
        <div class="ks-bento ks-bento--3col ks-fade-in">
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Avantage</span>
                <h3 class="ks-card__title">Chantiers diversifiés</h3>
                <p class="ks-card__text">Fondations, structure, toiture, finition, immobilier. Six métiers, des projets résidentiels et commerciaux, du courant à l'institutionnel.</p>
            </article>
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Avantage</span>
                <h3 class="ks-card__title">Continuité d'emploi</h3>
                <p class="ks-card__text">Demande captive interne grâce à Kalystrat Immobilier qui développe ses propres projets. Moins de creux, plus d'heures travaillées par année.</p>
            </article>
            <article class="ks-card ks-card--accent-gold">
                <span class="ks-eyebrow">Avantage</span>
                <h3 class="ks-card__title">Formation continue</h3>
                <p class="ks-card__text">Programmes de formation interne, mentorat par les compagnons CCQ, perfectionnement technique sur les nouvelles normes du Code 2026.</p>
            </article>
        </div>
        <div class="ks-card__cta" style="text-align:center;margin-top:2rem">
            <a href="{{ route('contact') }}" class="ks-cta-secondary">Envoyer une candidature</a>
        </div>
    </div>
</section>

<section class="ks-cta-section">
    <div class="ks-container">
        <h2>Démarrer votre dossier de soumission</h2>
        <p>Présentez-nous votre projet en quelques lignes. Visite gratuite, étude technique et soumission détaillée sous 5 à 10 jours ouvrables pour le résidentiel.</p>
        <a href="{{ route('contact') }}" class="ks-cta-primary">Obtenir une soumission</a>
    </div>
</section>

@endsection
