@extends('frontend::layout')

@push('head')
<meta name="dateModified" content="2026-05-02">

@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "CollectionPage",
    "name": "Réalisations Kalystrat",
    "url": "https://kalystrat.ca/realisations",
    "dateModified": "2026-05-02",
    "about": {"@type": "Organization", "name": "Kalystrat", "url": "https://kalystrat.ca"}
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Accueil", "item": "https://kalystrat.ca/" },
        { "@type": "ListItem", "position": 2, "name": "Réalisations", "item": "https://kalystrat.ca/realisations" }
    ]
}
</script>
@endverbatim
@endpush

@section('content')

{{-- Bannière --}}
@include('frontend::partials.page-banner', [
    'title' => 'Nos réalisations',
    'breadcrumbs' => [
        ['label' => 'Accueil', 'url' => route('index')],
        ['label' => 'Réalisations', 'url' => null],
    ],
])

{{-- BLOC 1 – Intro honnête --}}
<div class="space-top" style="padding: 5rem 0 2rem;">
    <div class="container">
        <div class="title-area text-center" style="max-width: 820px; margin: 0 auto;">
            <span class="sub-title text-theme">Galerie en construction</span>
            <h2 class="sec-title" style="color: var(--ks-navy); font-size: 2.25rem; font-weight: 700;">Une décennie de chantiers, une nouvelle bannière</h2>
            <p class="sec-text" style="margin: 1rem auto 0;">Les six filiales du groupe livrent depuis plus de dix ans des projets résidentiels, commerciaux et institutionnels au Québec. Cette galerie publique se construit progressivement sous la bannière Kalystrat avec des photos professionnelles ; pour des références projets vérifiables dès maintenant, contactez-nous directement.</p>
        </div>
    </div>
</div>

{{-- BLOC 2 – Expertise par filiale --}}
<div class="space-bottom" style="padding-bottom: 5rem;">
    <div class="container">
        <div class="title-area text-center mb-5" style="max-width: 720px; margin: 0 auto 3rem;">
            <span class="sub-title text-theme">Expertise terrain</span>
            <h2 class="sec-title" style="color: var(--ks-navy); font-size: 1.875rem; font-weight: 700;">Ce que nos filiales livrent au quotidien</h2>
        </div>
        <div class="row g-4">
            @php
                $expertises = [
                    [
                        'filiale' => 'Kalystrat Fondations',
                        'icone' => 'ri-building-4-line',
                        'chantiers' => 'Excavation, coffrage et dalle pour résidentiel et commercial.',
                        'volume' => 'Plusieurs dizaines de fondations livrées chaque année par notre équipe terrain.',
                    ],
                    [
                        'filiale' => 'Kalystrat Structure',
                        'icone' => 'ri-building-3-line',
                        'chantiers' => 'Charpente bois, ossature et structure légère pour neuf et rénovation.',
                        'volume' => 'Présence régulière sur les chantiers résidentiels du Québec depuis plus de dix ans.',
                    ],
                    [
                        'filiale' => 'Kalystrat Toiture et Enveloppe',
                        'icone' => 'ri-home-4-line',
                        'chantiers' => 'Toiture résidentielle et commerciale, revêtement et étanchéité.',
                        'volume' => 'Plusieurs dizaines de toitures réalisées par saison.',
                    ],
                    [
                        'filiale' => 'Kalystrat Finition Intérieure',
                        'icone' => 'ri-paint-brush-line',
                        'chantiers' => 'Gypse, peinture et finition haut de gamme pour résidentiel et condo.',
                        'volume' => 'Travaux de finition livrés régulièrement sur des projets clés en main.',
                    ],
                    [
                        'filiale' => 'Kalystrat Immobilier',
                        'icone' => 'ri-community-line',
                        'chantiers' => 'Promotion immobilière résidentielle et multilogements.',
                        'volume' => 'Projets multi-unités en développement actif dans la grande région de Québec.',
                    ],
                    [
                        'filiale' => 'Kalystrat Placement Construction',
                        'icone' => 'ri-team-line',
                        'chantiers' => 'Placement de main-d\'oeuvre CCQ qualifiée pour entrepreneurs généraux.',
                        'volume' => 'Mandats récurrents auprès d\'entrepreneurs partenaires au Québec.',
                    ],
                ];
            @endphp
            @foreach($expertises as $e)
            <div class="col-md-6 col-lg-4">
                <article class="ks-card ks-card--accent" style="--card-accent: #B8A472;">
                    <span class="ks-card__icon" aria-hidden="true"><i class="{{ $e['icone'] }}"></i></span>
                    <h3 class="ks-card__title">{{ $e['filiale'] }}</h3>
                    <p class="ks-card__text">{{ $e['chantiers'] }}</p>
                    <p style="color: #2C3340; font-size: 0.85rem; margin: 0; font-style: italic;">{{ $e['volume'] }}</p>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- BLOC 3 – Encart double action --}}
<div style="background-color: #F8F8F6; padding: 4rem 0;">
    <div class="container">
        <div class="row g-4 align-items-stretch">
            <div class="col-lg-6">
                <article class="ks-card">
                    <span style="display: inline-block; background: #0A1628; color: #FFD54A; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; padding: 0.35rem 0.75rem; border-radius: 999px; margin-bottom: 0.75rem; align-self: flex-start;">Propriétaires et promoteurs</span>
                    <h3 class="ks-card__title ks-card__title--lg">Demander des références projets</h3>
                    <p class="ks-card__text">Nous transmettons volontiers les coordonnées de clients récents pertinents à votre type de projet, sur demande et avec leur accord.</p>
                    <a href="{{ route('contact') }}" style="align-self: flex-start; display: inline-flex; align-items: center; gap: 0.5rem; background: var(--ks-navy); color: #FFFFFF; padding: 0.75rem 1.5rem; border-radius: 0.375rem; text-decoration: none; font-weight: 600; min-height: 44px; margin-top: auto;">
                        Nous écrire <i class="ri-arrow-right-line" aria-hidden="true"></i>
                    </a>
                </article>
            </div>
            <div class="col-lg-6">
                <article class="ks-card">
                    <span style="display: inline-block; background: #0A1628; color: #FFD54A; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; padding: 0.35rem 0.75rem; border-radius: 999px; margin-bottom: 0.75rem; align-self: flex-start;">Clients récents</span>
                    <h3 class="ks-card__title ks-card__title--lg">Autoriser la publication de votre projet</h3>
                    <p class="ks-card__text">Vous avez fait affaire avec une de nos filiales et acceptez que votre chantier figure dans cette galerie&nbsp;? Écrivez-nous, nous organisons la séance photo.</p>
                    <a href="mailto:info@kalystrat.ca?subject=Autorisation%20publication%20galerie" style="align-self: flex-start; display: inline-flex; align-items: center; gap: 0.5rem; background: transparent; color: var(--ks-navy); padding: 0.75rem 1.5rem; border: 2px solid var(--ks-navy); border-radius: 0.375rem; text-decoration: none; font-weight: 600; min-height: 44px; margin-top: auto;">
                        info@kalystrat.ca <i class="ri-mail-line" aria-hidden="true"></i>
                    </a>
                </article>
            </div>
        </div>
    </div>
</div>

{{-- CTA finale --}}
@include('frontend::partials.cta-discutons', [
    'ctaEyebrow' => 'Votre projet',
    'ctaTitle' => 'Le prochain chantier sur cette page pourrait être le vôtre',
    'ctaDescription' => '',
])

@endsection
