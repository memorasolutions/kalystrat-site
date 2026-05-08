@extends('frontend::layout')

@push('head')
<meta name="dateModified" content="2026-05-04">
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'AboutPage',
    'name' => 'Partenaires Kalystrat — Réseau de référencement',
    'url' => 'https://kalystrat.ca/partenaires',
    'inLanguage' => 'fr-CA',
    'about' => ['@type' => 'Organization', 'name' => 'Gestion Kalystrat Inc.', 'url' => 'https://kalystrat.ca'],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'À propos', 'item' => 'https://kalystrat.ca/a-propos'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Partenaires', 'item' => 'https://kalystrat.ca/partenaires'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
<style>
    .ks-partner-card {
        background: #FFFFFF;
        border: 1px solid rgba(10, 22, 40, 0.08);
        border-radius: 0.75rem;
        padding: 2.25rem;
        height: 100%;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .ks-partner-card:hover { transform: translateY(-2px); box-shadow: 0 12px 36px rgba(10, 22, 40, 0.08); }
    .ks-partner-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, #0A1628 0%, #1A2840 100%);
        border: 2px solid #B8A472;
        color: #B8A472;
        font-size: 1.875rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.25rem;
    }
    .ks-partner-title {
        color: #0A1628;
        font-size: 1.375rem;
        font-weight: 700;
        margin: 0 0 0.75rem;
    }
    .ks-partner-desc {
        color: rgba(10, 22, 40, 0.78);
        font-size: 0.9375rem;
        line-height: 1.6;
        margin: 0;
    }
    .ks-partner-section--light {
        background: #F8F8F6;
        padding: 5rem 0;
        margin-top: 4rem;
        border-top: 1px solid rgba(184, 164, 114, 0.18);
        border-bottom: 1px solid rgba(184, 164, 114, 0.18);
    }
    .ks-partner-benefit {
        text-align: center;
        padding: 1.5rem 1rem;
    }
</style>
@endpush

@section('content')

@include('frontend::partials.page-banner', [
    'title' => 'Partenaires',
    'breadcrumbs' => [
        ['label' => 'Accueil', 'url' => route('index')],
        ['label' => 'À propos', 'url' => route('apropos')],
        ['label' => 'Partenaires', 'url' => null],
    ],
])

<div class="space-top space-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="title-area text-center">
                    <span class="sub-title text-theme">Réseau de référencement</span>
                    <h2 class="sec-title">Bâtir mieux, ensemble</h2>
                    <p class="sec-text">Notre modèle d'intégration verticale s'appuie sur un écosystème de partenaires de confiance. Architectes, designers, courtiers immobiliers et promoteurs prolongent notre chaîne de valeur et nous aident à livrer chaque projet avec rigueur, du concept aux clés en main.</p>
                </div>
            </div>
        </div>

        <div class="row gy-40 mt-50">
            <div class="col-lg-6 col-md-6">
                <article class="ks-partner-card" aria-labelledby="partner-architectes">
                    <div class="ks-partner-icon" aria-hidden="true"><x-frontend::icon name="compass"/></div>
                    <h3 id="partner-architectes" class="ks-partner-title">Architectes</h3>
                    <p class="ks-partner-desc">Conception et planification techniques. Nous travaillons étroitement avec des architectes québécois pour livrer des projets fidèles à leur vision, conformes au Code de construction du Québec et aux exigences de la <abbr title="Régie du bâtiment du Québec">RBQ</abbr>.</p>
                </article>
            </div>
            <div class="col-lg-6 col-md-6">
                <article class="ks-partner-card" aria-labelledby="partner-designers">
                    <div class="ks-partner-icon" aria-hidden="true"><x-frontend::icon name="paint-brush"/></div>
                    <h3 id="partner-designers" class="ks-partner-title">Designers d'intérieur</h3>
                    <p class="ks-partner-desc">Aménagement et finition haut de gamme. Notre filiale Kalystrat Finition Intérieure exécute les concepts des designers avec précision&nbsp;: choix matériaux, ébénisterie sur mesure, comptoirs et détails finaux.</p>
                </article>
            </div>
            <div class="col-lg-6 col-md-6">
                <article class="ks-partner-card" aria-labelledby="partner-courtiers">
                    <div class="ks-partner-icon" aria-hidden="true"><x-frontend::icon name="home"/></div>
                    <h3 id="partner-courtiers" class="ks-partner-title">Courtiers immobiliers</h3>
                    <p class="ks-partner-desc">Mise en marché et représentation. Nos partenariats avec des courtiers <abbr title="Organisme d'autoréglementation du courtage immobilier du Québec">OACIQ</abbr> permettent à Kalystrat Immobilier de commercialiser les projets résidentiels neufs et de bénéficier d'une lecture de marché en continu.</p>
                </article>
            </div>
            <div class="col-lg-6 col-md-6">
                <article class="ks-partner-card" aria-labelledby="partner-promoteurs">
                    <div class="ks-partner-icon" aria-hidden="true"><x-frontend::icon name="building-3"/></div>
                    <h3 id="partner-promoteurs" class="ks-partner-title">Promoteurs</h3>
                    <p class="ks-partner-desc">Sous-traitance et chaînes de valeur. Kalystrat est un partenaire fiable pour les promoteurs cherchant des équipes <abbr title="Régie du bâtiment du Québec">RBQ</abbr>, <abbr title="Commission de la construction du Québec">CCQ</abbr> et une intégration de bout en bout, du gros œuvre à la livraison clés en main.</p>
                </article>
            </div>
        </div>
    </div>
</div>

<section class="ks-partner-section--light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="title-area text-center">
                    <span class="sub-title text-theme">Récompenses partenaires</span>
                    <h2 class="sec-title">Programme de fidélité Kalystrat</h2>
                    <p class="sec-text">Notre réseau récompense la collaboration durable. Trois bénéfices concrets pour les partenaires actifs avec qui nous bâtissons sur le long terme.</p>
                </div>
            </div>
        </div>

        <div class="row gy-30 mt-50">
            <div class="col-lg-4">
                <article class="ks-card ks-card--centered ks-card--sober" aria-labelledby="benefit-referencement">
                    <span class="ks-card__icon ks-card__icon--circle" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" aria-hidden="true" focusable="false" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg></span>
                    <h3 id="benefit-referencement" class="ks-card__title">Référencement croisé</h3>
                    <p class="ks-card__text">Visibilité mutuelle sur nos plateformes numériques, événements sectoriels et signalisations chantier.</p>
                </article>
            </div>
            <div class="col-lg-4">
                <article class="ks-card ks-card--centered ks-card--sober" aria-labelledby="benefit-tarifs">
                    <span class="ks-card__icon ks-card__icon--circle" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" aria-hidden="true" focusable="false" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M16 8h-6a2 2 0 0 0 0 4h4a2 2 0 0 1 0 4H8"/><line x1="12" y1="6" x2="12" y2="8"/><line x1="12" y1="16" x2="12" y2="18"/></svg></span>
                    <h3 id="benefit-tarifs" class="ks-card__title">Tarifs préférentiels</h3>
                    <p class="ks-card__text">Conditions avantageuses sur les services Kalystrat pour les partenaires apportant un volume récurrent.</p>
                </article>
            </div>
            <div class="col-lg-4">
                <article class="ks-card ks-card--centered ks-card--sober" aria-labelledby="benefit-visibilite">
                    <span class="ks-card__icon ks-card__icon--circle" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" aria-hidden="true" focusable="false" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></span>
                    <h3 id="benefit-visibilite" class="ks-card__title">Visibilité chantier</h3>
                    <p class="ks-card__text">Affichage de votre logo sur les panneaux de chantier et dans la documentation projet remise aux clients.</p>
                </article>
            </div>
        </div>
    </div>
</section>

<div class="space-top space-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="title-area text-center">
                    <span class="sub-title text-theme">Rejoindre le réseau</span>
                    <h2 class="sec-title">Devenir partenaire Kalystrat</h2>
                    <p class="sec-text">Vous êtes architecte, designer, courtier ou promoteur et souhaitez collaborer avec un groupe québécois en construction à intégration verticale&nbsp;? Soumettez-nous votre profil de partenariat&nbsp;: notre équipe vous recontacte dans les 48 heures ouvrables.</p>
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('contact') }}" class="btn style3" aria-label="Soumettre votre profil de partenariat à Kalystrat">Soumettre votre profil&nbsp;<i class="ri-arrow-right-line" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
