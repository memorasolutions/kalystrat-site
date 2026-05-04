@extends('frontend::layout')

@push('head')
<meta name="dateModified" content="2026-05-01">
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "AboutPage",
    "name": "À propos de Kalystrat",
    "url": "https://kalystrat.ca/a-propos",
    "dateModified": "2026-05-01",
    "mainEntity": {
        "@type": "Organization",
        "name": "Kalystrat",
        "founder": {
            "@type": "Person",
            "@id": "https://kalystrat.ca/#ali-salomon",
            "name": "Ali Salomon",
            "jobTitle": "Fondateur et président",
            "worksFor": { "@type": "Organization", "name": "Kalystrat", "url": "https://kalystrat.ca" },
            "nationality": "CA",
            "homeLocation": { "@type": "Place", "name": "Québec, Canada" },
            "knowsAbout": ["Construction résidentielle", "Groupe intégré", "Fondations", "Charpente", "Toiture", "Finition intérieure", "Promotion immobilière", "Placement de main-d'œuvre"],
            "sameAs": ["https://www.linkedin.com/company/kalystrat"]
        },
        "foundingDate": "2026",
        "foundingLocation": { "@type": "Place", "name": "Québec, Canada" },
        "numberOfEmployees": { "@type": "QuantitativeValue", "minValue": 50, "maxValue": 250 }
    }
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Accueil", "item": "https://kalystrat.ca/" },
        { "@type": "ListItem", "position": 2, "name": "À propos", "item": "https://kalystrat.ca/a-propos" }
    ]
}
</script>
@endverbatim
@endpush

@section('content')

{{-- ========================
     Bannière fil d'Ariane
     ======================== --}}
@include('frontend::partials.page-banner', [
    'title' => 'À propos de Kalystrat',
    'breadcrumbs' => [
        ['label' => 'Accueil', 'url' => route('index')],
        ['label' => 'À propos', 'url' => null],
    ],
])

{{-- ========================
     Section "À propos" – texte + image
     ======================== --}}
<div class="about-area-2 space-top space-bottom overflow-hidden" style="padding: 6rem 0;">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="img-box2" style="position: relative;">
                    <div class="img1" style="aspect-ratio: 4 / 3;">
                        <img src="{{ asset('assets/img/kalystrat/about-bg.webp') }}" alt="Équipe Kalystrat sur chantier au Québec" width="960" height="720" style="width: 100%; height: 100%; object-fit: cover; border-radius: 0.5rem;" loading="lazy">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="title-area mb-3">
                    <span class="sub-title text-theme">À propos de Kalystrat</span>
                    <h2 class="sec-title" style="color: var(--ks-navy); font-size: 2.25rem; font-weight: 700; line-height: 1.2;">Un groupe québécois à intégration verticale, fondé sur dix ans de chantiers au Québec</h2>
                </div>
                <p class="sec-text">Kalystrat réunit sous une même signature six filiales spécialisées en construction. Plus de dix ans sur les chantiers du Québec ont mené Ali&nbsp;Salomon à structurer le groupe. Chaque étape d'un projet est livrée à l'interne, de la fondation aux clés en main, sans sous-traitance externe entre les corps de métier.</p>
                <p class="sec-text">L'intégration verticale élimine les frictions entre intervenants&nbsp;: les délais raccourcissent, les responsabilités sont claires, les coûts d'interfaces disparaissent. Une seule signature, six expertises, un seul interlocuteur pour le client.</p>
                <div class="row mt-4">
                    <div class="col-sm-6 mb-3">
                        <div style="display: flex; align-items: flex-start; gap: 0.75rem;">
                            <i class="ri-checkbox-circle-fill" aria-hidden="true" style="color: var(--ks-gold); font-size: 1.5rem;"></i>
                            <span><strong>Six filiales</strong> spécialisées en synergie</span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div style="display: flex; align-items: flex-start; gap: 0.75rem;">
                            <i class="ri-checkbox-circle-fill" aria-hidden="true" style="color: var(--ks-gold); font-size: 1.5rem;"></i>
                            <span><strong><abbr title="Régie du bâtiment du Québec">RBQ</abbr></strong> et personnel <strong><abbr title="Commission de la construction du Québec">CCQ</abbr></strong> qualifié</span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div style="display: flex; align-items: flex-start; gap: 0.75rem;">
                            <i class="ri-checkbox-circle-fill" aria-hidden="true" style="color: var(--ks-gold); font-size: 1.5rem;"></i>
                            <span><strong>Garantie <abbr title="Garantie de construction résidentielle">GCR</abbr></strong> sur les projets résidentiels neufs</span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div style="display: flex; align-items: flex-start; gap: 0.75rem;">
                            <i class="ri-checkbox-circle-fill" aria-hidden="true" style="color: var(--ks-gold); font-size: 1.5rem;"></i>
                            <span><strong>Réponse</strong> sous 48&nbsp;h ouvrables</span>
                        </div>
                    </div>
                </div>
                <a href="{{ route('contact') }}" class="btn style2 mt-3">Demander une soumission <i class="ri-arrow-right-up-line" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</div>

{{-- ========================
     Section "Notre fondateur" – Ali Salomon
     ======================== --}}
<div class="space-top space-bottom" style="background-color: #F8F8F6; padding: 5rem 0;">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <div class="title-area mb-3">
                    <span class="sub-title text-theme">Le fondateur</span>
                    <h2 class="sec-title" style="color: var(--ks-navy); font-size: 2rem; font-weight: 700;" id="ali-salomon">Ali&nbsp;Salomon, fondateur et président</h2>
                </div>
            </div>
            <div class="col-lg-7">
                <p class="sec-text">Plus d'une décennie sur les chantiers résidentiels du Québec a forgé la conviction d'Ali&nbsp;Salomon. Regrouper les corps de métier sous une marque unifiée règle la sous-traitance fragmentée. Il pilote aujourd'hui Kalystrat depuis le siège social de Québec, coordonnant les six filiales du groupe.</p>
                <p class="sec-text">Sa philosophie&nbsp;: redonner au client final la fluidité d'un seul interlocuteur, du devis aux clés en main, en regroupant sous une même marque les compétences habituellement éclatées entre cinq ou six entreprises distinctes.</p>
            </div>
        </div>
    </div>
</div>

{{-- ========================
     Section Mission, vision, différenciateur
     ======================== --}}
<section class="space-top space-extra-bottom" style="background-color: #F8F8F6; padding: 5rem 0;">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8">
                <span class="sub-title text-theme">Trois convictions fondatrices</span>
                <h2 class="sec-title" style="color: var(--ks-navy); font-size: 2.25rem; font-weight: 700;">Ce qui nous définit</h2>
                <p style="color: #2C3340; margin-top: 1rem;">« Conçu. Réalisé. Livré. » Trois mots, une promesse&nbsp;: prendre le projet à bras-le-corps du devis aux clés en main, sans déléguer la responsabilité à personne d'autre.</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="p-4 bg-white rounded-3 h-100 shadow-sm">
                    <div class="mb-3"><i class="ri-compass-3-line" aria-hidden="true" style="font-size: 2.5rem; color: var(--ks-gold);"></i></div>
                    <h3 class="h5 fw-bold" style="color: var(--ks-navy);">Notre mission</h3>
                    <p style="color: #2C3340;">Livrer des projets de construction de qualité en réunissant des filiales spécialisées sous une même enseigne. Pas de sous-traitance en cascade, pas de zones grises contractuelles&nbsp;: un interlocuteur, un standard, un résultat. Quand un client signe avec Kalystrat, l'équipe qui coule ses fondations parle à celle qui posera sa toiture, parce qu'elles portent le même dossard.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4 bg-white rounded-3 h-100 shadow-sm">
                    <div class="mb-3"><i class="ri-eye-line" aria-hidden="true" style="font-size: 2.5rem; color: var(--ks-gold);"></i></div>
                    <h3 class="h5 fw-bold" style="color: var(--ks-navy);">Notre vision</h3>
                    <p style="color: #2C3340;">D'ici 2034, devenir le groupe intégré de référence au Québec. Huit ans pour prouver qu'un modèle vertical, discipliné et ancré localement peut rivaliser avec les grands donneurs d'ouvrage tout en gardant l'agilité d'une PME. L'objectif n'est pas de grossir pour grossir. C'est de structurer une offre complète qui réduit les coûts et les délais sans sacrifier l'exécution.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4 bg-white rounded-3 h-100 shadow-sm">
                    <div class="mb-3"><i class="ri-stack-line" aria-hidden="true" style="font-size: 2.5rem; color: var(--ks-gold);"></i></div>
                    <h3 class="h5 fw-bold" style="color: var(--ks-navy);">Notre différenciateur</h3>
                    <p style="color: #2C3340;">L'intégration verticale complète – de l'excavation jusqu'à la finition intérieure, en passant par le placement de main-d'œuvre et le développement immobilier. Au Québec, la plupart des entrepreneurs généraux coordonnent des sous-traitants. Kalystrat, lui, possède les filiales. Résultat concret&nbsp;: moins d'interfaces, moins de litiges, des échéanciers tenus. Un seul groupe, six métiers, zéro excuse.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ========================
     Section Six piliers concurrentiels
     ======================== --}}
<style>
    /* Cards "Six piliers" — pattern .ks-pillar-card aligné sur .ks-filiale-card pour cohérence visuelle */
    .ks-pillar-card {
        position: relative;
        background: #FFFFFF;
        border: 1px solid rgba(10, 22, 40, 0.10);
        border-radius: 0.875rem;
        padding: 2rem;
        height: 100%;
        box-shadow: 0 8px 24px rgba(10, 22, 40, 0.08), 0 2px 6px rgba(10, 22, 40, 0.04);
        transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1),
                    box-shadow 0.25s cubic-bezier(0.4, 0, 0.2, 1),
                    border-color 0.25s ease;
    }
    .ks-pillar-card:hover, .ks-pillar-card:focus-within {
        transform: translateY(-4px);
        box-shadow: 0 18px 44px rgba(10, 22, 40, 0.14), 0 4px 10px rgba(10, 22, 40, 0.06);
        border-color: rgba(184, 164, 114, 0.5);
    }
    .ks-pillar-card__icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 56px;
        height: 56px;
        background: linear-gradient(135deg, #0A1628 0%, #1A2840 100%);
        color: #B8A472;
        border-radius: 0.5rem;
        font-size: 1.5rem;
        margin-bottom: 1.25rem;
    }
    .ks-pillar-card__title {
        color: #0A1628;
        font-size: 1.125rem;
        font-weight: 700;
        margin: 0 0 0.625rem;
    }
    .ks-pillar-card__text {
        color: #2C3340;
        font-size: 0.9375rem;
        line-height: 1.6;
        margin: 0;
    }
</style>
<section class="space-top space-extra-bottom" style="background-color: #F4F4F2; padding: 5rem 0;">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-9">
                <span class="sub-title text-theme">Avantage structurel</span>
                <h2 class="sec-title" style="color: var(--ks-navy); font-size: 2.25rem; font-weight: 700;">Six piliers, un avantage durable</h2>
                <p style="color: #2C3340; margin-top: 1rem;">Construire une maison solide exige de bons matériaux. Construire une entreprise solide, c'est pareil. Voici les six éléments qui distinguent Kalystrat de la fragmentation habituelle du marché québécois.</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <article class="ks-pillar-card">
                    <span class="ks-pillar-card__icon" aria-hidden="true"><i class="ri-git-merge-line"></i></span>
                    <h3 class="ks-pillar-card__title">Intégration verticale</h3>
                    <p class="ks-pillar-card__text">Chaque étape du chantier reste à l'interne. On contrôle la chaîne de valeur du premier coup de pelle jusqu'à la remise des clés, ce qui élimine les marges intermédiaires et les délais de coordination.</p>
                </article>
            </div>
            <div class="col-lg-4 col-md-6">
                <article class="ks-pillar-card">
                    <span class="ks-pillar-card__icon" aria-hidden="true"><i class="ri-team-line"></i></span>
                    <h3 class="ks-pillar-card__title">Main-d'œuvre interne</h3>
                    <p class="ks-pillar-card__text">Dans un marché où la CCQ prévoit le recrutement de 16&nbsp;000 nouveaux travailleurs par année jusqu'en 2029, disposer de ses propres équipes n'est pas un luxe — c'est un avantage opérationnel. Nos travailleurs sont formés, encadrés et fidélisés selon les normes de la CCQ.</p>
                </article>
            </div>
            <div class="col-lg-4 col-md-6">
                <article class="ks-pillar-card">
                    <span class="ks-pillar-card__icon" aria-hidden="true"><i class="ri-refresh-line"></i></span>
                    <h3 class="ks-pillar-card__title">Demande captive</h3>
                    <p class="ks-pillar-card__text">La filiale immobilière génère des projets que les filiales de construction réalisent. Pas besoin de courir après les contrats quand le carnet de commandes se remplit de l'intérieur.</p>
                </article>
            </div>
            <div class="col-lg-4 col-md-6">
                <article class="ks-pillar-card">
                    <span class="ks-pillar-card__icon" aria-hidden="true"><i class="ri-links-line"></i></span>
                    <h3 class="ks-pillar-card__title">Synergies opérationnelles</h3>
                    <p class="ks-pillar-card__text">Achats groupés, équipements partagés, planification centralisée&nbsp;: quand six filiales parlent le même langage, les économies d'échelle deviennent tangibles dès le premier projet conjoint.</p>
                </article>
            </div>
            <div class="col-lg-4 col-md-6">
                <article class="ks-pillar-card">
                    <span class="ks-pillar-card__icon" aria-hidden="true"><i class="ri-award-line"></i></span>
                    <h3 class="ks-pillar-card__title">Cohérence de marque</h3>
                    <p class="ks-pillar-card__text">Un logo, une promesse, une réputation à défendre partout. Le client ne navigue pas entre cinq entreprises aux standards différents. Il fait affaire avec Kalystrat, point.</p>
                </article>
            </div>
            <div class="col-lg-4 col-md-6">
                <article class="ks-pillar-card">
                    <span class="ks-pillar-card__icon" aria-hidden="true"><i class="ri-dashboard-3-line"></i></span>
                    <h3 class="ks-pillar-card__title">Gestion centralisée</h3>
                    <p class="ks-pillar-card__text">Comptabilité, conformité RBQ, relations CCQ, stratégie&nbsp;: tout converge vers le groupe. Les filiales se concentrent sur leur métier pendant que Kalystrat pilote la vue d'ensemble.</p>
                </article>
            </div>
        </div>
    </div>
</section>

{{-- ========================
     Section Statistiques marché Québec
     ======================== --}}
<section class="space-top space-extra-bottom" style="background-color: var(--ks-navy); padding: 5rem 0;">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8">
                <span class="sub-title" style="color: var(--ks-gold); text-transform: uppercase; letter-spacing: 0.1em; font-size: 0.875rem; font-weight: 700;">Contexte porteur</span>
                <h2 class="sec-title" style="color: #FFFFFF; font-size: 2.25rem; font-weight: 700;">Le marché québécois en chiffres</h2>
            </div>
        </div>
        <div class="row g-4 text-center">
            <div class="col-lg-4">
                <div class="p-4">
                    <span class="d-block fw-bold mb-2" style="font-size: 3rem; color: var(--ks-gold);">59&nbsp;864<sup style="font-size: 0.875rem; color: var(--ks-gold); font-weight: 400; margin-left: 0.15rem;"><a href="#stats-source-1" aria-label="Voir source 1 (Institut de la statistique du Québec)" aria-describedby="stats-source-1" style="color: var(--ks-gold); text-decoration: none; display: inline-flex; align-items: center; justify-content: center; min-width: 24px; min-height: 24px; padding: 0.25rem;">1</a></sup></span>
                    <span class="d-block fw-semibold mb-2" style="color: #FFFFFF; font-size: 1.1rem;">mises en chantier au Québec en 2025</span>
                    <p style="color: #C2C5C9; font-size: 0.95rem;">Une hausse de 22,9&nbsp;% par rapport à 2024 (+11&nbsp;151 unités), deuxième croissance annuelle consécutive. L'immigration, le rattrapage post-pandémique et la pénurie de logements stimulent la demande résidentielle. Plus de chantiers, c'est plus d'occasions – à condition d'avoir la capacité de livrer.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4">
                    <span class="d-block fw-bold mb-2" style="font-size: 3rem; color: var(--ks-gold);">80&nbsp;000<sup style="font-size: 0.875rem; color: var(--ks-gold); font-weight: 400; margin-left: 0.15rem;"><a href="#stats-source-2" aria-label="Voir source 2 (Commission de la construction du Québec)" aria-describedby="stats-source-2" style="color: var(--ks-gold); text-decoration: none; display: inline-flex; align-items: center; justify-content: center; min-width: 24px; min-height: 24px; padding: 0.25rem;">2</a></sup></span>
                    <span class="d-block fw-semibold mb-2" style="color: #FFFFFF; font-size: 1.1rem;">travailleurs à recruter d'ici 2029</span>
                    <p style="color: #C2C5C9; font-size: 0.95rem;">La Commission de la construction du Québec estime à 80&nbsp;000 le nombre de nouveaux travailleurs nécessaires sur cinq ans, soit environ 16&nbsp;000 par année. Charpentiers, opérateurs de machinerie, couvreurs&nbsp;: les entreprises se battent pour recruter. Notre filiale Placement Construction répond à ce goulot d'étranglement.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4">
                    <span class="d-block fw-bold mb-2" style="font-size: 3rem; color: var(--ks-gold);">22&nbsp;G$<sup style="font-size: 0.875rem; color: var(--ks-gold); font-weight: 400; margin-left: 0.15rem;"><a href="#stats-source-3" aria-label="Voir source 3 (APCHQ – Analyses économiques)" aria-describedby="stats-source-3" style="color: var(--ks-gold); text-decoration: none; display: inline-flex; align-items: center; justify-content: center; min-width: 24px; min-height: 24px; padding: 0.25rem;">3</a></sup></span>
                    <span class="d-block fw-semibold mb-2" style="color: #FFFFFF; font-size: 1.1rem;">investis en rénovation au Québec</span>
                    <p style="color: #C2C5C9; font-size: 0.95rem;">Plus de vingt milliards de dollars sont investis chaque année par les Québécois pour rénover, agrandir et adapter leur patrimoine bâti (estimation pour 2024-2025, basée sur la part québécoise des investissements résidentiels canadiens). Un bassin de revenus récurrents que nos filiales Finition et Toiture captent naturellement, en complément du neuf.</p>
                </div>
            </div>
        </div>

        {{-- Notes de bas de section : sources officielles (style éditorial sobre, pattern NYT/Le Monde) --}}
        <aside class="ks-stats-sources mt-5 pt-4" style="border-top: 1px solid rgba(184, 164, 114, 0.18); max-width: 920px; margin-left: auto; margin-right: auto;" aria-label="Sources officielles citées dans cette section">
            <p style="color: rgba(255, 255, 255, 0.55); font-size: 0.8125rem; font-style: italic; margin-bottom: 0.75rem; text-align: center;">Sources officielles · données vérifiées au 2&nbsp;mai&nbsp;2026</p>
            <ol style="list-style: none; padding: 0; margin: 0; display: flex; flex-wrap: wrap; gap: 1.5rem 2rem; justify-content: center; font-size: 0.8125rem; color: rgba(255, 255, 255, 0.6);">
                <li id="stats-source-1"><span style="color: var(--ks-gold); font-weight: 600;">1.</span> <a href="https://statistique.quebec.ca/fr/produit/publication/mises-chantier" target="_blank" rel="noopener noreferrer" style="color: rgba(255, 255, 255, 0.7); text-decoration: underline; text-decoration-color: rgba(184, 164, 114, 0.4); text-underline-offset: 3px;">Institut de la statistique du Québec – Mises en chantier 2025</a></li>
                <li id="stats-source-2"><span style="color: var(--ks-gold); font-weight: 600;">2.</span> <a href="https://www.ccq.org/fr-CA" target="_blank" rel="noopener noreferrer" style="color: rgba(255, 255, 255, 0.7); text-decoration: underline; text-decoration-color: rgba(184, 164, 114, 0.4); text-underline-offset: 3px;">Commission de la construction du Québec (CCQ)</a></li>
                <li id="stats-source-3"><span style="color: var(--ks-gold); font-weight: 600;">3.</span> <a href="https://www.apchq.com/a-propos/analyses-et-representations-economiques-et-gouvernementales/" target="_blank" rel="noopener noreferrer" style="color: rgba(255, 255, 255, 0.7); text-decoration: underline; text-decoration-color: rgba(184, 164, 114, 0.4); text-underline-offset: 3px;">APCHQ – Analyses économiques</a></li>
            </ol>
        </aside>
    </div>
</section>

{{-- ========================
     Section Conseil consultatif
     ======================== --}}
<section class="space-top space-extra-bottom" style="background-color: #F8F8F6; padding: 5rem 0;">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8">
                <span class="sub-title text-theme">Gouvernance</span>
                <h2 class="sec-title" style="color: var(--ks-navy); font-size: 2.25rem; font-weight: 700;">Notre conseil consultatif</h2>
                <p style="color: #2C3340; margin-top: 1rem;">Ali Salomon a voulu s'entourer tôt. Pas pour l'image, pour la rigueur. Le conseil consultatif de Kalystrat réunit des professionnels chevronnés qui apportent l'expérience sectorielle que seul le temps forge. Trois sièges restent à pourvoir&nbsp;: nous cherchons des profils complémentaires en construction senior, financement et gestion RH/CCQ.</p>
                <p style="margin-top: 1rem; color: #0A1628;"><a href="{{ route('conseil') }}" style="color: #0A1628; font-weight: 700; text-decoration: underline; text-underline-offset: 3px;">Voir les profils détaillés du conseil consultatif&nbsp;→</a></p>
            </div>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6">
                <article class="p-4 bg-white rounded-3 h-100 shadow-sm text-center">
                    <div class="mb-3"><i class="ri-scales-3-line" aria-hidden="true" style="font-size: 2.5rem; color: var(--ks-gold);"></i></div>
                    <h3 class="h5 fw-bold" style="color: var(--ks-navy);">Jacques Jobidon</h3>
                    <span class="d-block mb-3" style="color: #5C4F2C; font-size: 0.9rem; font-weight: 700;">Conseiller – Droit de la construction</span>
                    <p style="color: #2C3340; font-size: 0.95rem;">Avocat spécialisé en droit de la construction, Jacques accompagne des entrepreneurs et des donneurs d'ouvrage depuis plus de deux décennies. Sa connaissance fine des contrats, des hypothèques légales et de la jurisprudence RBQ permet à Kalystrat de structurer ses ententes avec une solidité juridique dès le départ.</p>
                </article>
            </div>
            <div class="col-lg-4 col-md-6">
                <article class="p-4 bg-white rounded-3 h-100 shadow-sm text-center">
                    <div class="mb-3"><i class="ri-building-2-line" aria-hidden="true" style="font-size: 2.5rem; color: var(--ks-gold);"></i></div>
                    <h3 class="h5 fw-bold" style="color: var(--ks-navy);">Perry Wong</h3>
                    <span class="d-block mb-3" style="color: #5C4F2C; font-size: 0.9rem; font-weight: 700;">Conseiller – Immobilier</span>
                    <p style="color: #2C3340; font-size: 0.95rem;">Actif dans le développement immobilier, Perry apporte une lecture marché indispensable à notre filiale Immobilier. Identification de terrains, analyse de rentabilité, positionnement de produit&nbsp;: son regard oriente les décisions d'investissement du groupe vers des projets viables et alignés avec la demande locale.</p>
                </article>
            </div>
            <div class="col-lg-4 col-md-6">
                <article class="p-4 bg-white rounded-3 h-100 shadow-sm text-center" style="border: 2px dashed var(--ks-gold);">
                    <div class="mb-3"><i class="ri-user-add-line" aria-hidden="true" style="font-size: 2.5rem; color: var(--ks-gold);"></i></div>
                    <h3 class="h5 fw-bold" style="color: var(--ks-navy);">Trois sièges à pourvoir</h3>
                    <span class="d-block mb-3" style="color: #5C4F2C; font-size: 0.9rem; font-weight: 700;">Construction senior · Financement · RH/CCQ</span>
                    <p style="color: #2C3340; font-size: 0.95rem;">Nous recherchons des professionnels expérimentés prêts à contribuer à la gouvernance d'un groupe en construction. Vous avez 15&nbsp;ans et plus d'expérience dans l'un de ces domaines&nbsp;? Écrivez-nous à <a href="mailto:info@kalystrat.ca" style="color: #8C2E00; text-decoration: underline; font-weight: 600;">info@kalystrat.ca</a> ou téléphonez au <a href="tel:+14184760987" style="color: #8C2E00; text-decoration: underline; font-weight: 600;">418-476-0987</a>.</p>
                </article>
            </div>
        </div>
    </div>
</section>

{{-- ========================
     Section "Nos six filiales"
     ======================== --}}
<div class="space-top space-bottom overflow-hidden" style="padding: 5rem 0; background: #F4F4F2;">
    <div class="container">
        <div class="title-area text-center mb-5">
            <span class="sub-title text-theme">Six filiales, une marque</span>
            <h2 class="sec-title" style="color: var(--ks-navy); font-size: 2.25rem; font-weight: 700;">Six expertises sous la signature Kalystrat</h2>
        </div>
        <style>
            /* Cards filiales premium — relief marqué sur fond gris #F4F4F2, hover lift, numérotation, accent couleur par filiale */
            .ks-filiale-card {
                position: relative;
                background: #FFFFFF;
                border: 1px solid rgba(10, 22, 40, 0.10);
                border-radius: 0.875rem;
                padding: 2.5rem 2rem 2rem;
                height: 100%;
                box-shadow: 0 8px 24px rgba(10, 22, 40, 0.08), 0 2px 6px rgba(10, 22, 40, 0.04);
                transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1),
                            box-shadow 0.25s cubic-bezier(0.4, 0, 0.2, 1),
                            border-color 0.25s ease;
                overflow: hidden;
                display: flex;
                flex-direction: column;
            }
            .ks-filiale-card::before {
                content: '';
                position: absolute;
                top: 0; left: 0; right: 0;
                height: 4px;
                background: var(--card-accent, #B8A472);
                transition: height 0.25s ease;
            }
            .ks-filiale-card:hover, .ks-filiale-card:focus-within {
                transform: translateY(-6px);
                box-shadow: 0 24px 56px rgba(10, 22, 40, 0.18), 0 4px 12px rgba(10, 22, 40, 0.08);
                border-color: rgba(184, 164, 114, 0.6);
            }
            .ks-filiale-card:hover::before, .ks-filiale-card:focus-within::before { height: 6px; }
            .ks-filiale-card__num {
                font-size: 0.75rem;
                font-weight: 700;
                color: #5C4F2C; /* WCAG AAA : couleur fixée 8:1 sur blanc, vs --card-accent variable (Finition #B8A472 = 2.44:1 non conforme) */
                letter-spacing: 0.22em;
                text-transform: uppercase;
                margin-bottom: 0.875rem;
                display: block;
            }
            .ks-filiale-card__title {
                color: #0A1628;
                font-size: 1.375rem;
                font-weight: 700;
                line-height: 1.25;
                margin: 0 0 0.75rem;
            }
            .ks-filiale-card__desc {
                color: #2C3340;
                font-size: 0.9375rem;
                line-height: 1.6;
                margin: 0 0 1.5rem;
                flex-grow: 1;
            }
            .ks-filiale-card__link {
                color: #0A1628;
                font-weight: 700;
                font-size: 0.9375rem;
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                min-height: 44px;
                letter-spacing: 0.04em;
                text-transform: uppercase;
                border-bottom: 2px solid transparent;
                padding-bottom: 0.125rem;
                transition: color 0.2s ease, border-color 0.2s ease, gap 0.2s ease;
                align-self: flex-start;
            }
            .ks-filiale-card__link i { color: #B8A472; transition: transform 0.2s ease; }
            .ks-filiale-card__link:hover, .ks-filiale-card__link:focus-visible {
                color: #5C4F2C;
                border-bottom-color: #B8A472;
                gap: 0.75rem;
            }
            .ks-filiale-card__link:hover i, .ks-filiale-card__link:focus-visible i { transform: translate(2px, -2px); }
        </style>
        <div class="row g-4">
            @foreach(config('kalystrat.filiales', []) as $slug => $f)
            <div class="col-md-6 col-lg-4">
                <article class="ks-filiale-card" style="--card-accent: {{ $f['hex_couleur'] ?? '#B8A472' }};">
                    <span class="ks-filiale-card__num">{{ str_pad((string) ($loop->iteration), 2, '0', STR_PAD_LEFT) }} — Filiale</span>
                    <h3 class="ks-filiale-card__title">{{ $f['nom_court'] ?? ucfirst($slug) }}</h3>
                    <p class="ks-filiale-card__desc">{{ $f['specialite'] ?? '' }}</p>
                    <a href="{{ route('filiale', ['slug' => $slug]) }}" class="ks-filiale-card__link" aria-label="En savoir plus sur {{ $f['nom_court'] ?? ucfirst($slug) }}">En savoir plus<i class="ri-arrow-right-up-line" aria-hidden="true"></i></a>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- ========================
     Section CTA finale
     ======================== --}}
@include('frontend::partials.cta-discutons')

@endsection
