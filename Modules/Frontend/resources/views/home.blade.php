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
    'logo' => url('/intime/images/logo.svg'),
    'description' => "Groupe québécois de construction à intégration verticale. Six filiales spécialisées : Fondations, Structure, Toiture-Enveloppe, Finition Intérieure, Immobilier, Placement Construction.",
    'address' => ['@type' => 'PostalAddress', 'addressLocality' => 'Québec', 'addressRegion' => 'QC', 'addressCountry' => 'CA'],
    'telephone' => '+1-418-476-0987',
    'contactPoint' => ['@type' => 'ContactPoint', 'contactType' => 'customer service', 'telephone' => '+1-418-476-0987', 'email' => 'info@kalystrat.ca', 'areaServed' => 'CA-QC', 'availableLanguage' => ['French', 'English']],
    'founder' => ['@type' => 'Person', 'name' => 'Ali Salomon', 'jobTitle' => 'Président et Directeur Général'],
    'subOrganization' => [
        ['@type' => 'GeneralContractor', 'name' => 'Kalystrat Fondations', 'url' => url('/filiales/fondations')],
        ['@type' => 'GeneralContractor', 'name' => 'Kalystrat Structure', 'url' => url('/filiales/structure')],
        ['@type' => 'GeneralContractor', 'name' => 'Kalystrat Toiture et Enveloppe', 'url' => url('/filiales/toiture-enveloppe')],
        ['@type' => 'GeneralContractor', 'name' => 'Kalystrat Finition Intérieure', 'url' => url('/filiales/finition-interieure')],
        ['@type' => 'Organization', 'name' => 'Kalystrat Immobilier', 'url' => url('/filiales/immobilier')],
        ['@type' => 'Organization', 'name' => 'Kalystrat Placement Construction', 'url' => url('/filiales/placement-construction')],
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

<section class="ks-section ks-pillars">
    <div class="ks-container">
        <div class="ks-section__heading ks-section__heading--left">
            <span class="ks-eyebrow">Trois piliers</span>
            <h2 class="ks-h2">Une marque, six expertises,<br>du sol au toit.</h2>
        </div>
        <div class="ks-pillars__grid">
            <article class="ks-pillar">
                <div class="ks-pillar__num" aria-hidden="true">01</div>
                <h3 class="ks-pillar__title">Six filiales spécialisées</h3>
                <p class="ks-pillar__text">Fondations, structure, toiture, finition, immobilier, placement. Chaque métier est piloté par une direction dédiée.</p>
            </article>
            <article class="ks-pillar">
                <div class="ks-pillar__num" aria-hidden="true">02</div>
                <h3 class="ks-pillar__title">Intégration verticale</h3>
                <p class="ks-pillar__text">Un chargé de projet unique, zéro sous-traitance externe sur les corps de métier clés. Fin des zones grises de responsabilité.</p>
            </article>
            <article class="ks-pillar">
                <div class="ks-pillar__num" aria-hidden="true">03</div>
                <h3 class="ks-pillar__title">Main-d’œuvre CCQ interne</h3>
                <p class="ks-pillar__text">Compagnons certifiés, formés au Code 2026 et aux normes Novoclimat 2.0. Standards de groupe partagés.</p>
            </article>
        </div>
    </div>
</section>

<section class="ks-section ks-defi" data-defi-section>
    <div class="ks-container">
        <div class="ks-defi__grid">
            <article class="ks-defi__lead">
                <span class="ks-eyebrow">Conçu, réalisé, livré</span>
                <h2 class="ks-defi__title">Le défi de la construction<br>au Québec en&nbsp;2026</h2>
                <p class="ks-defi__intro">Pénurie de main-d’œuvre, hausse des coûts, complexité réglementaire. L’industrie québécoise traverse une période exigeante.<br><br><strong>Notre réponse&nbsp;: l’intégration verticale.</strong></p>
                <ul class="ks-defi__points">
                    <li>
                        <span class="ks-defi__bullet" aria-hidden="true">→</span>
                        <span>Six filiales spécialisées qui couvrent toute la chaîne, de l’excavation aux finitions.</span>
                    </li>
                    <li>
                        <span class="ks-defi__bullet" aria-hidden="true">→</span>
                        <span>Une équipe interne CCQ formée aux normes Novoclimat 2.0 et au Code 2026.</span>
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
                <p class="ks-defi__caption">Filiales spécialisées sous Gestion Kalystrat Inc.</p>
                <div class="ks-defi__bars" aria-hidden="true">
                    <span></span><span></span><span></span><span></span><span></span><span></span>
                </div>
            </article>

            <article class="ks-defi__kpi ks-defi__kpi--compagnons">
                <span class="ks-eyebrow">Compagnons CCQ</span>
                <span class="ks-defi__num"><span data-counter data-target="100">0</span><sup>+</sup></span>
                <p class="ks-defi__caption">Compagnons certifiés sur nos chantiers.</p>
                <svg class="ks-defi__gauge" aria-hidden="true" viewBox="0 0 120 60">
                    <path d="M10 55 A50 50 0 0 1 110 55" fill="none" stroke="rgba(184,164,114,0.2)" stroke-width="4" stroke-linecap="round"/>
                    <path d="M10 55 A50 50 0 0 1 110 55" fill="none" stroke="var(--ks-gold-500)" stroke-width="4" stroke-linecap="round" stroke-dasharray="157" stroke-dashoffset="157" data-gauge-fill/>
                </svg>
            </article>

            <article class="ks-defi__kpi ks-defi__kpi--secteurs">
                <span class="ks-eyebrow">Secteurs</span>
                <span class="ks-defi__num" data-counter data-target="5">0</span>
                <p class="ks-defi__caption">Résidentiel, commercial, institutionnel, industriel, municipal.</p>
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
                <p class="ks-lead ks-approche__lead">L’intégration verticale n’est pas un buzzword. C’est une discipline opérationnelle qui se mesure&nbsp;: moins d’imprévus de coordination, des délais respectés, une qualité homogène du sous-sol au toit. Voici nos résultats concrets sur les chantiers livrés.</p>
                <p class="ks-lead ks-approche__lead">Six directions de filiales, chacune pilotée par un expert reconnu de son métier, alignées sous une même gouvernance. Notre crédibilité repose sur la profondeur des spécialisations et la conformité totale au Code de construction du Québec 2026.</p>
                <div class="ks-approche__expertise" aria-hidden="true">
                    <span class="ks-approche__expertise-label">Expertise structurée</span>
                    <div class="ks-approche__expertise-grid">
                        <span class="ks-approche__expertise-ancre"><strong>6</strong> Directeurs spécialistes</span>
                        <span class="ks-approche__expertise-ancre"><strong>5</strong> Domaines Code 2026</span>
                        <span class="ks-approche__expertise-ancre"><strong>9</strong> Régions desservies</span>
                    </div>
                </div>
            </article>
            <aside class="ks-approche__stats" data-approche-stats aria-label="Indicateurs de performance">
                <article class="ks-approche__stat" data-stat-target="62">
                    <div class="ks-approche__ring-wrap">
                        <svg class="ks-approche__ring" viewBox="0 0 120 120" aria-hidden="true" focusable="false">
                            <circle class="ks-approche__ring-bg" cx="60" cy="60" r="52"></circle>
                            <circle class="ks-approche__ring-fg" cx="60" cy="60" r="52" data-ring-fg></circle>
                        </svg>
                        <div class="ks-approche__ring-num">
                            <span data-counter="62" aria-hidden="true">0</span><span class="ks-approche__ring-pct" aria-hidden="true">%</span>
                            <span class="ks-sr-only">62 %</span>
                        </div>
                    </div>
                    <div class="ks-approche__stat-meta">
                        <span class="ks-eyebrow">Délais respectés</span>
                        <p class="ks-approche__stat-label">Projets livrés à temps sur l’ensemble des chantiers Kalystrat</p>
                    </div>
                </article>
                <article class="ks-approche__stat" data-stat-target="80">
                    <div class="ks-approche__ring-wrap">
                        <svg class="ks-approche__ring" viewBox="0 0 120 120" aria-hidden="true" focusable="false">
                            <circle class="ks-approche__ring-bg" cx="60" cy="60" r="52"></circle>
                            <circle class="ks-approche__ring-fg" cx="60" cy="60" r="52" data-ring-fg></circle>
                        </svg>
                        <div class="ks-approche__ring-num">
                            <span data-counter="80" aria-hidden="true">0</span><span class="ks-approche__ring-pct" aria-hidden="true">%</span>
                            <span class="ks-sr-only">80 %</span>
                        </div>
                    </div>
                    <div class="ks-approche__stat-meta">
                        <span class="ks-eyebrow">Recommandation</span>
                        <p class="ks-approche__stat-label">Clients qui recommandent Kalystrat à leur entourage</p>
                    </div>
                </article>
            </aside>
        </div>
    </div>
</section>

@push('scripts')
<script>
(function () {
    'use strict';
    var stats = document.querySelectorAll('[data-approche-stats] .ks-approche__stat');
    if (!stats.length || !('IntersectionObserver' in window)) {
        stats.forEach && stats.forEach(function (s) {
            var t = parseInt(s.getAttribute('data-stat-target'), 10);
            var n = s.querySelector('[data-counter]');
            var r = s.querySelector('[data-ring-fg]');
            if (n) n.textContent = String(t);
            if (r) r.style.strokeDashoffset = String(327 - (327 * t) / 100);
        });
        return;
    }
    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    function animate(stat) {
        var target = parseInt(stat.getAttribute('data-stat-target'), 10);
        var numEl = stat.querySelector('[data-counter]');
        var ring  = stat.querySelector('[data-ring-fg]');
        if (!numEl || !ring) return;
        var circ = 327;
        var offset = circ - (circ * target) / 100;
        if (reduceMotion) {
            numEl.textContent = String(target);
            ring.style.transition = 'none';
            ring.style.strokeDashoffset = String(offset);
            return;
        }
        ring.style.strokeDashoffset = String(offset);
        var duration = 1800;
        var start = performance.now();
        function tick(now) {
            var t = Math.min((now - start) / duration, 1);
            var eased = 1 - Math.pow(1 - t, 3);
            numEl.textContent = String(Math.round(eased * target));
            if (t < 1) requestAnimationFrame(tick);
        }
        requestAnimationFrame(tick);
    }
    var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                animate(entry.target);
                io.unobserve(entry.target);
            }
        });
    }, { threshold: 0.4 });
    stats.forEach(function (s) { io.observe(s); });
})();
</script>
@endpush

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
                <p class="ks-card__text" style="font-style:italic">Les exigences du Code 2026 sur l’étanchéité à l’air sont sévères. L’équipe Kalystrat avait anticipé ces normes dès la conception. Notre blower door a passé du premier coup.</p>
                <div style="margin-top:1.5rem;padding-top:1.5rem;border-top:1px solid rgba(255,255,255,0.15)">
                    <strong style="color:var(--ks-gold-500);display:block">Gestionnaire institutionnel</strong>
                    <span style="color:rgba(255,255,255,0.7);font-size:0.875rem">Pavillon scolaire, Trois-Rivières</span>
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
                <span class="ks-eyebrow">Pourquoi Kalystrat</span>
                <h2 id="pourquoi-title" class="ks-h2">Quatre raisons de nous confier votre projet</h2>
                <p class="ks-lead">Sur un chantier Kalystrat, votre chargé de projet pilote la totalité des corps de métier en s’appuyant sur les six directions de filiales. Cette unité de commandement transforme la complexité d’un projet de construction en une expérience claire, prévisible et professionnelle.</p>
            </div>
        </div>

        <div class="ks-pourquoi__grid">
            <article class="ks-pourquoi__card ks-pourquoi__card--hero">
                <span class="ks-eyebrow">Intégration verticale</span>
                <h3 class="ks-card__title">Six filiales sous une marque, zéro sous-traitance étrangère</h3>
                <p class="ks-card__text">Chez Kalystrat, l’intégration n’est pas un mot creux. Nos six filiales — <a href="{{ route('filiale', 'fondations') }}">Fondations</a>, <a href="{{ route('filiale', 'structure') }}">Structure</a>, <a href="{{ route('filiale', 'toiture-enveloppe') }}">Toiture et Enveloppe</a>, <a href="{{ route('filiale', 'finition-interieure') }}">Finition Intérieure</a>, <a href="{{ route('filiale', 'immobilier') }}">Immobilier</a> et <a href="{{ route('filiale', 'placement-construction') }}">Placement Construction</a> — collaborent au quotidien sur les mêmes chantiers. Cette proximité élimine les zones grises de responsabilité, accélère la prise de décision et garantit une qualité homogène du sous-sol au toit.</p>
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
                    <p class="ks-card__text">Pénurie de logements, démographie favorable, programmes SCHL&nbsp;: pourquoi le multilogement reste l'asset class la plus solide du marché québécois.</p>
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
