@extends('frontend::layout')

@push('head')
<meta name="dateModified" content="2026-05-04">
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'Zones desservies par Kalystrat — Capitale-Nationale et Chaudière-Appalaches',
    'url' => 'https://kalystrat.ca/zones-desservies',
    'inLanguage' => 'fr-CA',
    'about' => ['@type' => 'Organization', 'name' => 'Gestion Kalystrat Inc.', 'url' => 'https://kalystrat.ca'],
    'mainEntity' => [
        '@type' => 'ItemList',
        'numberOfItems' => count($villes),
        'itemListElement' => collect($villes)->values()->map(function ($v, $i) {
            return [
                '@type' => 'ListItem',
                'position' => $i + 1,
                'item' => [
                    '@type' => 'Place',
                    'name' => $v['nom_long'],
                    'url' => 'https://kalystrat.ca/zones-desservies/' . $v['slug'],
                ],
            ];
        })->toArray(),
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Zones desservies', 'item' => 'https://kalystrat.ca/zones-desservies'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
<style>
    .ks-zone-card {
        background: #FFFFFF;
        border: 1px solid rgba(10, 22, 40, 0.08);
        border-radius: 0.75rem;
        padding: 1.75rem;
        height: 100%;
        transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        text-decoration: none;
        display: block;
        color: inherit;
    }
    .ks-zone-card:hover, .ks-zone-card:focus-visible {
        transform: translateY(-3px);
        box-shadow: 0 16px 40px rgba(10, 22, 40, 0.1);
        border-color: var(--ks-gold, #B8A472);
        color: inherit;
    }
    .ks-zone-card__region {
        display: inline-block;
        font-size: 0.75rem;
        font-weight: 700;
        color: #5C4F2C; /* WCAG AAA : gold #B8A472 sur blanc = 2.44:1 non conforme. Navy-gold dérivé = 8:1 OK */
        letter-spacing: 0.18em;
        text-transform: uppercase;
        margin-bottom: 0.75rem;
    }
    .ks-zone-card__name {
        color: var(--ks-navy, #0A1628);
        font-size: 1.5rem;
        font-weight: 700;
        margin: 0 0 0.5rem;
    }
    .ks-zone-card__teaser {
        color: rgba(10, 22, 40, 0.7);
        font-size: 0.9375rem;
        line-height: 1.55;
        margin: 0 0 1rem;
    }
    .ks-zone-card__cta {
        color: var(--ks-navy, #0A1628);
        font-weight: 600;
        font-size: 0.9375rem;
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
    }
    .ks-zone-card:hover .ks-zone-card__cta { color: var(--ks-gold, #B8A472); }
    .ks-zones-other {
        background-color: #0A1628; /* fallback solide explicite — sans ça l'auditeur WCAG calcule blanc-sur-blanc */
        background-image: linear-gradient(180deg, #0A1628 0%, #14223A 100%);
        color: #FFFFFF;
        padding: 4rem 0;
        margin-top: 4rem;
        border-top: 1px solid rgba(184, 164, 114, 0.18);
    }
    .ks-zones-other h2 { color: #FFFFFF !important; } /* override .sec-title navy par défaut */
    .ks-zones-other p { color: #E8DCC8; } /* rgba(255,255,255,0.78) sur navy = 12:1 OK, mais auditeur scan parent blanc → couleur solide */
    .ks-zones-other .sub-title { color: #C4B285 !important; }
</style>
@endpush

@section('content')

@include('frontend::partials.page-banner', [
    'title' => 'Zones desservies',
    'breadcrumbs' => [
        ['label' => 'Accueil', 'url' => route('index')],
        ['label' => 'Zones desservies', 'url' => null],
    ],
])

<div class="space-top space-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="title-area text-center">
                    <span class="sub-title text-theme">Notre périmètre d'intervention</span>
                    <h2 class="sec-title">Bâtir partout au Québec, ancré dans la Capitale-Nationale</h2>
                    <p class="sec-text">Kalystrat opère son siège social à Québec et concentre l'essentiel de ses chantiers dans la <strong>Capitale-Nationale</strong> et la <strong>Chaudière-Appalaches</strong>. Pour les projets d'envergure (multi-logement, commercial, institutionnel), notre intégration verticale et notre logistique mobile nous permettent d'intervenir partout au Québec.</p>
                </div>
            </div>
        </div>

        <div class="row gy-30 mt-50">
            @foreach($villes as $slug => $ville)
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('ville', ['slug' => $slug]) }}" class="ks-zone-card" aria-label="Page-ville Kalystrat — {{ $ville['nom_long'] }}">
                    <span class="ks-zone-card__region">{{ $ville['region'] }}</span>
                    <h3 class="ks-zone-card__name">{{ $ville['nom'] }}</h3>
                    <p class="ks-zone-card__teaser">{{ Str::limit($ville['intro_paragraph'], 130) }}</p>
                    <span class="ks-zone-card__cta">Voir la page-ville&nbsp;<i class="ri-arrow-right-line" aria-hidden="true"></i></span>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

<section class="ks-zones-other">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-9">
<span class="sub-title" style="color: #C4B285; font-weight: 700; letter-spacing: 0.18em; text-transform: uppercase; font-size: 0.875rem;">Hors zone listée</span>
                <h2 class="sec-title" style="margin-top: 0.5rem;">Votre projet ailleurs au Québec&nbsp;?</h2>
                <p style="font-size: 1.0625rem; line-height: 1.7; margin: 1.25rem auto 2rem; max-width: 720px;">Vous êtes à Montréal, Laval, Longueuil, Sherbrooke, Trois-Rivières, Gatineau, Saguenay ou ailleurs&nbsp;? Pour les projets d'envergure (immeubles multi-logement, commerciaux ou institutionnels), Kalystrat se déplace partout au Québec avec ses six filiales spécialisées coordonnées sous une seule signature.</p>
                <p style="font-size: 1rem; color: rgba(255,255,255,0.65); margin: 0 auto 2rem; max-width: 640px;">Décrivez-nous votre projet en quelques minutes&nbsp;: localisation, type, échéancier, budget. Nous évaluons la faisabilité et revenons vers vous sous 48 heures ouvrables.</p>
                <a href="{{ route('contact') }}?ville=autre" class="btn style2" aria-label="Décrire un projet hors des zones listées">Décrire mon projet&nbsp;<i class="ri-arrow-right-up-line" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</section>

<div class="space-top space-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="title-area text-center">
                    <span class="sub-title text-theme">Six expertises mobilisables partout</span>
                    <h2 class="sec-title">Toutes nos filiales au service de votre territoire</h2>
                    <p class="sec-text">Quel que soit le secteur, les six filiales Kalystrat travaillent en synergie sous une seule marque. Un projet, un interlocuteur, six expertises spécialisées coordonnées — c'est la promesse de l'intégration verticale.</p>
                </div>
                <div class="row gy-20 mt-30 justify-content-center">
                    <div class="col-md-6 col-lg-4 text-center">
                        <a href="{{ url('/filiales/fondations') }}" style="display: block; padding: 0.75rem; color: var(--ks-navy); text-decoration: none; border: 1px solid rgba(184,164,114,0.3); border-radius: 0.375rem;">Kalystrat Fondations →</a>
                    </div>
                    <div class="col-md-6 col-lg-4 text-center">
                        <a href="{{ url('/filiales/structure') }}" style="display: block; padding: 0.75rem; color: var(--ks-navy); text-decoration: none; border: 1px solid rgba(184,164,114,0.3); border-radius: 0.375rem;">Kalystrat Structure →</a>
                    </div>
                    <div class="col-md-6 col-lg-4 text-center">
                        <a href="{{ url('/filiales/toiture') }}" style="display: block; padding: 0.75rem; color: var(--ks-navy); text-decoration: none; border: 1px solid rgba(184,164,114,0.3); border-radius: 0.375rem;">Kalystrat Toiture →</a>
                    </div>
                    <div class="col-md-6 col-lg-4 text-center">
                        <a href="{{ url('/filiales/finition') }}" style="display: block; padding: 0.75rem; color: var(--ks-navy); text-decoration: none; border: 1px solid rgba(184,164,114,0.3); border-radius: 0.375rem;">Kalystrat Finition →</a>
                    </div>
                    <div class="col-md-6 col-lg-4 text-center">
                        <a href="{{ url('/filiales/immobilier') }}" style="display: block; padding: 0.75rem; color: var(--ks-navy); text-decoration: none; border: 1px solid rgba(184,164,114,0.3); border-radius: 0.375rem;">Kalystrat Immobilier →</a>
                    </div>
                    <div class="col-md-6 col-lg-4 text-center">
                        <a href="{{ url('/filiales/placement') }}" style="display: block; padding: 0.75rem; color: var(--ks-navy); text-decoration: none; border: 1px solid rgba(184,164,114,0.3); border-radius: 0.375rem;">Kalystrat Placement →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
