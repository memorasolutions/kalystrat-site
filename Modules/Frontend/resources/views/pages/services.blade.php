@extends('frontend::layout')

@push('head')
<meta name="dateModified" content="2026-05-01">

@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Service",
    "serviceType": "Construction résidentielle, commerciale et institutionnelle",
    "provider": {"@type": "Organization", "name": "Kalystrat", "url": "https://kalystrat.ca"},
    "areaServed": {"@type": "AdministrativeArea", "name": "Québec, Canada"},
    "url": "https://kalystrat.ca/services"
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "HowTo",
    "name": "Méthodologie de construction Kalystrat — Conçu. Réalisé. Livré.",
    "description": "Kalystrat suit 4 étapes structurées via intégration verticale regroupant 6 filiales spécialisées, garantissant un contrôle total de la chaîne de construction.",
    "totalTime": "P3M",
    "inLanguage": "fr-CA",
    "url": "https://kalystrat.ca/services",
    "step": [
        {"@type": "HowToStep", "position": 1, "name": "Planification", "text": "Évaluation terrain, étude des besoins, analyse RBQ, budget intégré.", "url": "https://kalystrat.ca/services#etape-1"},
        {"@type": "HowToStep", "position": 2, "name": "Conception", "text": "Plans architecturaux, ingénierie, choix matériaux, permis.", "url": "https://kalystrat.ca/services#etape-2"},
        {"@type": "HowToStep", "position": 3, "name": "Réalisation", "text": "Excavation, fondations, structure, toiture, finition coordonnées par les six filiales.", "url": "https://kalystrat.ca/services#etape-3"},
        {"@type": "HowToStep", "position": 4, "name": "Livraison", "text": "Inspection finale, mise en service, remise des clés, garanties prolongées sur les éléments structuraux.", "url": "https://kalystrat.ca/services#etape-4"}
    ]
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Accueil", "item": "https://kalystrat.ca/" },
        { "@type": "ListItem", "position": 2, "name": "Services", "item": "https://kalystrat.ca/services" }
    ]
}
</script>
@endverbatim
@endpush

@section('content')

{{-- Bannière --}}
@include('frontend::partials.page-banner', [
    'title' => 'Nos services',
    'breadcrumbs' => [
        ['label' => 'Accueil', 'url' => route('index')],
        ['label' => 'Services', 'url' => null],
    ],
])

{{-- Intro services --}}
<div class="service-area-4 space-top overflow-hidden" style="padding: 5rem 0 2rem;">
    <div class="container">
        <div class="title-area text-center mb-5">
            <span class="sub-title text-theme">Ce que nous faisons</span>
            <h2 class="sec-title" style="color: var(--ks-navy); font-size: 2.25rem; font-weight: 700;">Six expertises construction au Québec</h2>
            <p class="sec-text" style="max-width: 760px; margin: 1rem auto 0;">Kalystrat regroupe six filiales spécialisées qui couvrent chaque étape d'un projet&nbsp;: fondations, structure, toiture et enveloppe, finition intérieure, promotion immobilière et placement de main-d'œuvre. Une gouvernance, six métiers.</p>
        </div>
    </div>
</div>

{{-- Grille des 6 filiales --}}
<div class="space-bottom" style="padding-bottom: 5rem;">
    <div class="container">
        <div class="row g-4">
            @foreach(config('kalystrat.filiales', []) as $slug => $f)
            <div class="col-md-6 col-lg-4">
                <article class="ks-card ks-card--accent" style="--card-accent: {{ $f['hex_couleur'] ?? '#B8A472' }};">
                    <span class="ks-card__icon" aria-hidden="true"><i class="ri-building-2-line"></i></span>
                    <h2 class="ks-card__title ks-card__title--lg">{{ $f['nom_court'] ?? ucfirst($slug) }}</h2>
                    <p class="ks-card__text">{{ $f['specialite'] ?? '' }}</p>
                    @if(!empty($f['services']))
                    <ul style="padding-left: 1.25rem; color: #2C3340; font-size: 0.9rem; margin-bottom: 1.25rem;">
                        @foreach(array_slice($f['services'], 0, 3) as $s)
                            <li>{{ $s }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <a href="{{ route('filiale', ['slug' => $slug]) }}" class="ks-card__link" aria-label="En savoir plus sur {{ $f['nom_court'] ?? ucfirst($slug) }}">En savoir plus <i class="ri-arrow-right-up-line" aria-hidden="true"></i></a>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Section "Pourquoi nous choisir" — 4 cards uniformes .ks-card --}}
<div class="ks-card-section--grey">
    <div class="container">
        <div class="title-area text-center mb-5">
            <span class="sub-title text-theme">Pourquoi Kalystrat</span>
            <h2 class="sec-title" style="color: var(--ks-navy); font-size: 2rem; font-weight: 700;">Quatre raisons de nous confier votre projet</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <article class="ks-card ks-card--centered ks-card--sober">
                    <span class="ks-card__icon ks-card__icon--circle" aria-hidden="true"><i class="ri-shield-check-fill"></i></span>
                    <h3 class="ks-card__title"><abbr title="Régie du bâtiment du Québec">RBQ</abbr> et garantie <abbr title="Garantie de construction résidentielle">GCR</abbr></h3>
                    <p class="ks-card__text">Licences à jour et garantie de construction résidentielle pour le neuf.</p>
                </article>
            </div>
            <div class="col-md-6 col-lg-3">
                <article class="ks-card ks-card--centered ks-card--sober">
                    <span class="ks-card__icon ks-card__icon--circle" aria-hidden="true"><i class="ri-team-fill"></i></span>
                    <h3 class="ks-card__title">Main-d'œuvre <abbr title="Commission de la construction du Québec">CCQ</abbr></h3>
                    <p class="ks-card__text">Personnel qualifié, formé et placé via notre filiale Placement Construction.</p>
                </article>
            </div>
            <div class="col-md-6 col-lg-3">
                <article class="ks-card ks-card--centered ks-card--sober">
                    <span class="ks-card__icon ks-card__icon--circle" aria-hidden="true"><i class="ri-time-fill"></i></span>
                    <h3 class="ks-card__title">Délais maîtrisés</h3>
                    <p class="ks-card__text">Intégration verticale&nbsp;: pas d'intermédiaire entre les corps de métier, calendrier tenu.</p>
                </article>
            </div>
            <div class="col-md-6 col-lg-3">
                <article class="ks-card ks-card--centered ks-card--sober">
                    <span class="ks-card__icon ks-card__icon--circle" aria-hidden="true"><i class="ri-customer-service-2-fill"></i></span>
                    <h3 class="ks-card__title">Un seul interlocuteur</h3>
                    <p class="ks-card__text">Du devis à la livraison, vous traitez avec une seule équipe Kalystrat.</p>
                </article>
            </div>
        </div>
    </div>
</div>

{{-- CTA finale --}}
@include('frontend::partials.cta-discutons', [
    'ctaEyebrow' => 'Soumission gratuite',
    'ctaTitle' => 'Décrivez-nous votre projet',
    'ctaDescription' => 'Réponse sous 48&nbsp;h ouvrables. Sans engagement.',
])

@endsection
