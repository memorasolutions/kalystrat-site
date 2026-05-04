@extends('frontend::layout')

@push('head')
<meta name="dateModified" content="2026-05-04">
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'AboutPage',
    'name' => 'Conseil consultatif Kalystrat',
    'url' => 'https://kalystrat.ca/conseil-consultatif',
    'inLanguage' => 'fr-CA',
    'about' => ['@type' => 'Organization', 'name' => 'Gestion Kalystrat Inc.', 'url' => 'https://kalystrat.ca'],
    'mentions' => [
        ['@type' => 'Person', 'name' => 'Ali Salomon', 'jobTitle' => 'Fondateur, Président et Directeur général', 'worksFor' => ['@type' => 'Organization', 'name' => 'Gestion Kalystrat Inc.']],
        ['@type' => 'Person', 'name' => 'Jacques Jobidon', 'jobTitle' => 'Conseiller — Droit de la construction'],
        ['@type' => 'Person', 'name' => 'Perry Wong', 'jobTitle' => 'Conseiller — Immobilier'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'À propos', 'item' => 'https://kalystrat.ca/a-propos'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Conseil consultatif', 'item' => 'https://kalystrat.ca/conseil-consultatif'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
<style>
    .ks-conseil-card {
        background: var(--ks-white, #FFFFFF);
        border: 1px solid rgba(10, 22, 40, 0.08);
        border-radius: 0.75rem;
        padding: 2.25rem 1.75rem;
        height: 100%;
        text-align: center;
        transition: box-shadow 0.2s ease, transform 0.2s ease;
    }
    .ks-conseil-card:hover { box-shadow: 0 12px 36px rgba(10, 22, 40, 0.08); transform: translateY(-2px); }
    .ks-conseil-avatar {
        width: 96px;
        height: 96px;
        margin: 0 auto 1.5rem;
        border-radius: 50%;
        background: linear-gradient(135deg, #0A1628 0%, #1A2840 100%);
        color: var(--ks-gold, #B8A472);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        font-weight: 700;
        letter-spacing: 0.02em;
        border: 3px solid var(--ks-gold, #B8A472);
    }
    .ks-conseil-name { font-size: 1.375rem; font-weight: 700; margin: 0 0 0.5rem; color: var(--ks-navy, #0A1628); }
    /* WCAG AAA : navy #0A1628 sur blanc = ratio 16.6:1 (gold #B8A472 sur blanc = 2.44:1, non conforme AA/AAA) */
    .ks-conseil-role { color: #5C4F2C; font-size: 0.875rem; font-weight: 700; letter-spacing: 0.02em; margin: 0 0 1rem; text-transform: uppercase; }
    .ks-conseil-bio { color: #2C3340; font-size: 0.9375rem; line-height: 1.6; margin: 0 0 1rem; }
    .ks-conseil-expertise { font-size: 0.8125rem; color: #2C3340; font-style: italic; margin: 0; }
    .ks-conseil-card--vacant {
        background: #F4F4F2; /* solide (était rgba 0.025 = quasi blanc, contraste 1:1 sur texte navy) */
        border-style: dashed;
        border-color: rgba(184, 164, 114, 0.4);
    }
    .ks-conseil-vacant-badge {
        display: inline-block;
        background: var(--ks-gold, #B8A472);
        color: var(--ks-navy, #0A1628);
        padding: 0.4rem 1rem;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        border-radius: 999px;
        margin-bottom: 1.25rem;
    }
</style>
@endpush

@section('content')

@include('frontend::partials.page-banner', [
    'title' => 'Conseil consultatif',
    'breadcrumbs' => [
        ['label' => 'Accueil', 'url' => route('index')],
        ['label' => 'À propos', 'url' => route('apropos')],
        ['label' => 'Conseil consultatif', 'url' => null],
    ],
])

<div class="space-top space-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="title-area text-center">
                    <span class="sub-title text-theme">Gouvernance</span>
                    <h2 class="sec-title">Une expertise composite pour bâtir avec rigueur</h2>
                    <p class="sec-text">Le conseil consultatif de Kalystrat réunit des experts indépendants dont les compétences complémentaires appuient notre modèle d'intégration verticale. Il joue un rôle stratégique en orientant les décisions clés, en renforçant la gouvernance et en assurant la rigueur opérationnelle à chaque étape du processus de construction.</p>
                </div>
            </div>
        </div>

        <div class="row gy-40 mt-50">
            <div class="col-lg-4 col-md-6">
                <article class="ks-conseil-card">
                    <div class="ks-conseil-avatar" aria-hidden="true">AS</div>
                    <h3 class="ks-conseil-name">Ali Salomon</h3>
                    <p class="ks-conseil-role">Fondateur, Président et Directeur général</p>
                    <p class="ks-conseil-bio">Entrepreneur québécois, plus de dix ans d'expérience terrain en construction. Conçoit Kalystrat comme holding à intégration verticale pour offrir une approche complète, rigoureuse et coordonnée à chaque étape du processus de bâtiment.</p>
                    <p class="ks-conseil-expertise"><strong>Expertise&nbsp;:</strong> stratégie globale, gouvernance, intégration verticale</p>
                </article>
            </div>

            <div class="col-lg-4 col-md-6">
                <article class="ks-conseil-card">
                    <div class="ks-conseil-avatar" aria-hidden="true">JJ</div>
                    <h3 class="ks-conseil-name">Jacques Jobidon</h3>
                    <p class="ks-conseil-role">Conseiller — Droit de la construction</p>
                    <p class="ks-conseil-bio">Avocat spécialisé en droit de la construction et des sociétés au Québec. Apporte son expertise sur les contrats, la conformité réglementaire (<abbr title="Régie du bâtiment du Québec">RBQ</abbr>, <abbr title="Commission de la construction du Québec">CCQ</abbr>) et la gestion de litiges.</p>
                    <p class="ks-conseil-expertise"><strong>Expertise&nbsp;:</strong> droit, contrats, RBQ&nbsp;/&nbsp;CCQ</p>
                </article>
            </div>

            <div class="col-lg-4 col-md-6">
                <article class="ks-conseil-card">
                    <div class="ks-conseil-avatar" aria-hidden="true">PW</div>
                    <h3 class="ks-conseil-name">Perry Wong</h3>
                    <p class="ks-conseil-role">Conseiller — Immobilier</p>
                    <p class="ks-conseil-bio">Promoteur et courtier expérimenté du marché québécois. Apporte sa connaissance du développement résidentiel, des montages financiers immobiliers et des opportunités de marché.</p>
                    <p class="ks-conseil-expertise"><strong>Expertise&nbsp;:</strong> développement immobilier, marché québécois</p>
                </article>
            </div>
        </div>

        <div class="row justify-content-center mt-80">
            <div class="col-lg-9">
                <div class="title-area text-center">
                    <span class="sub-title text-theme">Recrutement actif</span>
                    <h2 class="sec-title">Postes à pourvoir au conseil</h2>
                    <p class="sec-text">Trois sièges restent à compléter pour parachever notre conseil consultatif. Nous accueillons les candidatures de professionnels expérimentés dans les domaines suivants&nbsp;:</p>
                </div>
            </div>
        </div>

        <div class="row gy-30 mt-30">
            <div class="col-lg-4 col-md-6">
                <article class="ks-conseil-card ks-conseil-card--vacant">
                    <span class="ks-conseil-vacant-badge">À pourvoir</span>
                    <h3 class="ks-conseil-name">Construction et ingénierie</h3>
                    <p class="ks-conseil-bio">Un expert sénior de l'industrie de la construction au Québec, capable d'apporter une vision technique et opérationnelle de premier plan.</p>
                </article>
            </div>

            <div class="col-lg-4 col-md-6">
                <article class="ks-conseil-card ks-conseil-card--vacant">
                    <span class="ks-conseil-vacant-badge">À pourvoir</span>
                    <h3 class="ks-conseil-name">Financement et investissement</h3>
                    <p class="ks-conseil-bio">Un professionnel en financement d'entreprise et structuration financière, pour orienter notre stratégie de croissance et nos montages.</p>
                </article>
            </div>

            <div class="col-lg-4 col-md-6">
                <article class="ks-conseil-card ks-conseil-card--vacant">
                    <span class="ks-conseil-vacant-badge">À pourvoir</span>
                    <h3 class="ks-conseil-name">Ressources humaines</h3>
                    <p class="ks-conseil-bio">Un spécialiste du recrutement et de la gestion de la main-d'œuvre en construction, pour appuyer notre filiale Placement Construction.</p>
                </article>
            </div>
        </div>

        <div class="text-center mt-60">
            <a href="{{ route('contact') }}" class="btn style3" aria-label="Soumettre votre candidature au conseil consultatif Kalystrat">Soumettre votre candidature&nbsp;<i class="ri-arrow-right-up-line" aria-hidden="true"></i></a>
            <p class="mt-3" style="font-size: 0.9375rem; color: rgba(10, 22, 40, 0.6);">
                <a href="{{ route('apropos') }}" style="color: var(--ks-navy, #0A1628); text-decoration: underline;">← Retour à À propos</a>
            </p>
        </div>
    </div>
</div>

@endsection
