@extends('frontend::layout')

@push('head')
<meta name="description" content="Kalystrat – groupe québécois en construction à intégration verticale, porté par une décennie d'expertise terrain sous la conduite d'Ali Salomon. Six filiales spécialisées : Fondations, Structure, Toiture et Enveloppe, Finition Intérieure, Immobilier, Placement Construction.">
<meta name="dateModified" content="2026-05-01">

{{-- Préchargement LCP slide hero #1 (AVIF prioritaire — 64KB vs 108KB WebP).
     fetchpriority high pousse le navigateur à le prioriser au-dessus des autres preload. --}}
<link rel="preload" href="{{ asset('assets/img/kalystrat/hero/slide-1-montreal-chantier.avif') }}" as="image" type="image/avif" fetchpriority="high">

{{-- Preconnect CDN remixicon (deferred ailleurs, mais DNS lookup amorcé tôt) --}}
<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>

{{-- Magnific Popup, Slick, Nice Select pour les widgets de la home --}}
<link rel="stylesheet" href="{{ asset('assets/construz-new/css/magnific-popup.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/construz-new/css/slick.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/construz-new/css/nice-select.min.css') }}">

{{-- Signature Ali Salomon : Caveat woff2 latin auto-hostée (RGPD/Loi 25 conforme, 0 requête externe Google Fonts). Section About below-the-fold → pas d'impact LCP. font-display:swap → fallback Akzidenz immédiat → 0 CLS. À remplacer plus tard par SVG signature réelle Ali (tâche G7). --}}
<style>
    @font-face {
        font-family: 'Caveat';
        font-style: normal;
        font-weight: 400;
        font-display: swap;
        src: url('{{ asset('assets/fonts/Caveat-Regular.woff2') }}') format('woff2');
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+20AC, U+2122;
    }
    .ks-founder-signature {
        font-family: 'Caveat', 'Akzidenz Grotesk', 'Helvetica Neue', Arial, cursive;
        font-weight: 400;
        font-size: 2.25rem;
        letter-spacing: 0.01em;
        line-height: 1;
        color: #0A1628;
        display: inline-block;
        padding: 0.25rem 0.5rem 0.5rem 0;
        white-space: nowrap;
    }
    .ks-founder-growth-icon {
        width: 56px;
        height: 56px;
        background: linear-gradient(135deg, #0A1628 0%, #1A2840 100%);
        border-radius: 0.5rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        box-shadow: 0 2px 8px rgba(10, 22, 40, 0.18);
    }
    .ks-founder-growth-icon svg { width: 36px; height: 36px; display: block; }
    /* Slogan officiel Kalystrat — eyebrow gold au-dessus des hero-title (3 slides)
       WCAG AAA garanti : background navy solide (gold #B8A472 sur navy #0A1628 = 7:1 AAA)
       Display block + fit-content : nouvelle ligne, pas collé aux badges RBQ/APCHQ adjacents */
    .ks-hero-slogan {
        display: block;
        width: fit-content;
        max-width: 100%;
        color: var(--ks-gold);
        background: rgba(10, 22, 40, 0.92); /* navy quasi-solide → contraste gold 7:1 AAA garanti */
        font-size: 0.875rem;
        font-weight: 700;
        letter-spacing: 0.22em;
        text-transform: uppercase;
        margin: 1.25rem 0 0.75rem;
        padding: 0.5rem 1.125rem 0.45rem;
        border: 1px solid rgba(184, 164, 114, 0.4);
        border-radius: 999px;
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
    }
</style>

@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "@id": "https://kalystrat.ca/#webpage",
    "name": "Kalystrat – Groupe québécois en construction à intégration verticale",
    "url": "https://kalystrat.ca/",
    "inLanguage": "fr-CA",
    "isPartOf": { "@id": "https://kalystrat.ca/#website" },
    "about": { "@id": "https://kalystrat.ca/#organization" },
    "dateModified": "2026-05-01",
    "primaryImageOfPage": "https://kalystrat.ca/assets/img/kalystrat/og-image.jpg",
    "description": "Groupe québécois de construction à intégration verticale. Six filiales spécialisées sous une marque unifiée : Fondations, Structure, Toiture et Enveloppe, Finition Intérieure, Immobilier, Placement Construction.",
    "breadcrumb": { "@id": "https://kalystrat.ca/#breadcrumb" }
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "@id": "https://kalystrat.ca/#breadcrumb",
    "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Accueil", "item": "https://kalystrat.ca/" }
    ]
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebSite",
    "@id": "https://kalystrat.ca/#website",
    "url": "https://kalystrat.ca/",
    "name": "Kalystrat",
    "publisher": { "@id": "https://kalystrat.ca/#organization" },
    "inLanguage": "fr-CA"
}
</script>
@endverbatim
@endpush

@section('content')
    <h1 class="visually-hidden">Kalystrat – Groupe québécois de construction à intégration verticale</h1>

    {{-- ==============================
         Section Hero – bannière d'accueil Kalystrat
         ============================== --}}
    <div class="hero-wrapper hero-5" id="hero">
        {{-- hero_shape_5_1 (toît décoratif Construz) retiré : élément hors-marque suggérant uniquement toiture, alors que Kalystrat = 6 filiales --}}
        {{-- WCAG 2.2.2 satisfaite par absence d'autoplay (pas de mouvement automatique = règle inapplicable). Navigation manuelle via dots. --}}
        <div class="hero-slider5 global-carousel" data-slide-show="1" data-fade="true" data-dots="true" data-autoplay="false">
            <div class="hero-slide" style="background-image: image-set(url('{{ asset('assets/img/kalystrat/hero/slide-1-montreal-chantier.avif') }}') type('image/avif'), url('{{ asset('assets/img/kalystrat/hero/slide-1-montreal-chantier.webp?v=3') }}') type('image/webp'), url('{{ asset('assets/img/kalystrat/hero/slide-1-montreal-chantier.jpg') }}') type('image/jpeg')); background-size: cover; background-position: center bottom; background-repeat: no-repeat;">
                <div class="container">
                    <div class="hero-style5">
                        <div class="row align-items-center">
                            <div class="col-xl-8">
                                <span class="ks-hero-slogan" data-ani="slider-custom-anim-left" data-ani-delay="0.05s" aria-label="Slogan Kalystrat">Conçu. Réalisé. Livré.</span>
                                <div class="hero-rating-wrap" data-ani="slider-custom-anim-left" data-ani-delay="0.1s">
                                    <div class="single-rating-wrap">
                                        <div class="rating" aria-hidden="true">
                                            <i class="ri-shield-check-fill"></i>
                                        </div>
                                        <div class="rating-text">
                                            Licence <abbr title="Régie du bâtiment du Québec">RBQ</abbr> active
                                        </div>
                                    </div>
                                    <div class="single-rating-wrap">
                                        <div class="rating" aria-hidden="true">
                                            <i class="ri-shield-star-fill"></i>
                                        </div>
                                        <div class="rating-text">
                                            Membre <abbr title="Association des professionnels de la construction et de l'habitation du Québec">APCHQ</abbr>
                                        </div>
                                    </div>
                                </div>
                                <h2 class="hero-title" data-ani="slider-custom-anim-left" data-ani-delay="0.1s">Bâtir le Québec sous une seule marque&nbsp;:</h2>
                                <h2 class="hero-title" data-ani="slider-custom-anim-left" data-ani-delay="0.2s">six filiales, un seul interlocuteur.</h2>
                                <p class="hero-text" data-ani="slider-custom-anim-left" data-ani-delay="0.2s">Kalystrat est un groupe québécois de construction à intégration verticale. De la fondation à la livraison, nos six filiales spécialisées avancent ensemble&nbsp;: vous gardez un seul contact, nous assumons toute la chaîne.</p>
                                <div class="btn-group" data-ani="slider-custom-anim-left" data-ani-delay="0.4s">
                                    <a href="{{ url('/contact') }}" class="btn style2">Demander une soumission gratuite <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-slide" style="background-image: image-set(url('{{ asset('assets/img/kalystrat/hero/slide-2-vieux-quebec.avif') }}') type('image/avif'), url('{{ asset('assets/img/kalystrat/hero/slide-2-vieux-quebec.webp?v=3') }}') type('image/webp'), url('{{ asset('assets/img/kalystrat/hero/slide-2-vieux-quebec.jpg') }}') type('image/jpeg')); background-size: cover; background-position: center bottom; background-repeat: no-repeat;">
                <div class="container">
                    <div class="hero-style5">
                        <div class="row align-items-center">
                            <div class="col-xl-8">
                                <span class="ks-hero-slogan" data-ani="slider-custom-anim-left" data-ani-delay="0.05s" aria-label="Slogan Kalystrat">Conçu. Réalisé. Livré.</span>
                                <div class="hero-rating-wrap" data-ani="slider-custom-anim-left" data-ani-delay="0.1s">
                                    <div class="single-rating-wrap">
                                        <div class="rating" aria-hidden="true">
                                            <i class="ri-shield-star-fill"></i>
                                        </div>
                                        <div class="rating-text">
                                            Membre <abbr title="Association des professionnels de la construction et de l'habitation du Québec">APCHQ</abbr>
                                        </div>
                                    </div>
                                    <div class="single-rating-wrap">
                                        <div class="rating" aria-hidden="true">
                                            <i class="ri-home-heart-fill"></i>
                                        </div>
                                        <div class="rating-text">
                                            Garantie <abbr title="Garantie de construction résidentielle">GCR</abbr> sur le neuf
                                        </div>
                                    </div>
                                </div>
                                <h2 class="hero-title" data-ani="slider-custom-anim-left" data-ani-delay="0.1s">Une équipe québécoise,</h2>
                                <h2 class="hero-title" data-ani="slider-custom-anim-left" data-ani-delay="0.2s">une chaîne complète, zéro sous-traitance perdue.</h2>
                                <p class="hero-text" data-ani="slider-custom-anim-left" data-ani-delay="0.2s">Ali Salomon construit au Québec depuis plus de dix ans. Avec Kalystrat, il a réuni six filiales spécialisées pour piloter vos projets résidentiels, commerciaux et institutionnels sous une même gouvernance.</p>
                                <div class="btn-group" data-ani="slider-custom-anim-left" data-ani-delay="0.4s">
                                    <a href="{{ url('/a-propos') }}" class="btn style2">Découvrir le groupe <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-slide" style="background-image: image-set(url('{{ asset('assets/img/kalystrat/hero/slide-3-excavator.avif') }}') type('image/avif'), url('{{ asset('assets/img/kalystrat/hero/slide-3-excavator.webp?v=3') }}') type('image/webp'), url('{{ asset('assets/img/kalystrat/hero/slide-3-excavator.jpg') }}') type('image/jpeg')); background-size: cover; background-position: center bottom; background-repeat: no-repeat;">
                <div class="container">
                    <div class="hero-style5">
                        <div class="row align-items-center">
                            <div class="col-xl-8">
                                <span class="ks-hero-slogan" data-ani="slider-custom-anim-left" data-ani-delay="0.05s" aria-label="Slogan Kalystrat">Conçu. Réalisé. Livré.</span>
                                <div class="hero-rating-wrap" data-ani="slider-custom-anim-left" data-ani-delay="0.1s">
                                    <div class="single-rating-wrap">
                                        <div class="rating" aria-hidden="true">
                                            <i class="ri-shield-check-fill"></i>
                                        </div>
                                        <div class="rating-text">
                                            Licence <abbr title="Régie du bâtiment du Québec">RBQ</abbr> active
                                        </div>
                                    </div>
                                    <div class="single-rating-wrap">
                                        <div class="rating" aria-hidden="true">
                                            <i class="ri-team-line"></i>
                                        </div>
                                        <div class="rating-text">
                                            Main-d'œuvre <abbr title="Commission de la construction du Québec">CCQ</abbr> qualifiée
                                        </div>
                                    </div>
                                </div>
                                <h2 class="hero-title" data-ani="slider-custom-anim-left" data-ani-delay="0.1s">De la première pelletée</h2>
                                <h2 class="hero-title" data-ani="slider-custom-anim-left" data-ani-delay="0.2s">aux clés livrées&nbsp;: Kalystrat.</h2>
                                <p class="hero-text" data-ani="slider-custom-anim-left" data-ani-delay="0.2s">Excavation, structure, toiture, finition, vente, main-d'œuvre. Six filiales intégrées qui éliminent les zones grises entre les corps de métier.</p>
                                <div class="btn-group" data-ani="slider-custom-anim-left" data-ani-delay="0.4s">
                                    <a href="{{ url('/services') }}" class="btn style2">Voir nos services <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- /Section Hero --}}

    {{-- ==============================
         Section À propos – présentation Kalystrat et Ali Salomon
         ============================== --}}
    {{-- T36-S30 : zéro padding-top sur about-area pour coller la section à la wave hero (demande user 4×).
         space-bottom retiré aussi car la section suivante why-area-3 a son propre padding-top. --}}
    <div class="about-area-5" style="padding-top: 0; padding-bottom: 80px;">
        <div class="about-bg-shape5-1 shape-mockup" data-top="-170px" data-right="0" aria-hidden="true">
            <img src="{{ asset('assets/construz-new/img/bg/about-bg-shape5-1.png?v=2') }}" loading="lazy" decoding="async" alt="">
        </div>
        <div class="container">
            <div class="row gx-100 align-items-center">
                <div class="col-xl-5">
                    <div class="about-thumb5 mb-40 mb-xl-0">
                        <div class="about-img-1 mb-40">
                            <img src="{{ asset('assets/img/kalystrat/about-bg.webp?v=4') }}" loading="lazy" decoding="async" alt="Vue aérienne d'un chantier d'envergure Kalystrat au Canada">
                        </div>
                        <p>Porté par plus de dix ans d'expertise terrain en construction québécoise, Ali Salomon a structuré Kalystrat pour rassembler six entreprises spécialisées sous une seule gouvernance. Une intégration verticale rare dans la province, pensée pour réduire vos délais et vos imprévus.</p>
                        <div class="btn-group mt-30">
                            <a href="{{ url('/a-propos') }}" class="btn">Découvrir le groupe <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-wrap5">
                        <div class="title-area mb-40">
                            <span class="sub-title text-theme">À propos de Kalystrat <i class="ri-line-chart-line" aria-hidden="true"></i></span>
                            <h2 class="sec-title">Un seul groupe pour bâtir tout ce dont vous avez besoin</h2>
                            <p class="sec-text">Kalystrat est un groupe québécois en construction à intégration verticale. Plutôt que d'orchestrer une dizaine de sous-traitants, vous traitez avec une seule marque qui contrôle l'excavation, la structure, l'enveloppe, la finition, la vente immobilière et le placement de main-d'œuvre.
                            </p>
                            <div class="checklist mb-35 mt-30">
                                <ul>
                                    <li><img src="{{ asset('assets/img/kalystrat/icons/about-checklsit-icon1-1.svg') }}" loading="lazy" decoding="async" alt="">Une seule signature, six expertises sous un même toit
                                    </li>
                                    <li><img src="{{ asset('assets/img/kalystrat/icons/about-checklsit-icon1-1.svg') }}" loading="lazy" decoding="async" alt="">Équipes québécoises, normes RBQ, garantie GCR
                                    </li>
                                </ul>
                            </div>
                            <div class="btn-wrap">
                                <div class="cta-grid-wrap">
                                    <div class="icon-btn">
                                        <i class="ri-phone-line" aria-hidden="true"></i>
                                    </div>
                                    <div class="media-body">
                                        <a class="link" href="tel:+14184760987" aria-label="Téléphoner à Kalystrat">418-476-0987</a>
                                        <h3 class="title">Besoin d'aide&nbsp;?</h3>
                                    </div>
                                </div>
                                <div class="about-author-wrap">
                                    <div class="author-thumb">
                                        <span class="ks-founder-growth-icon" aria-hidden="true">
                                            <svg viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#FFD54A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" role="img" aria-label="Icône croissance">
                                                <polyline points="4,28 12,20 18,24 24,14 32,8"></polyline>
                                                <polyline points="26,8 32,8 32,14"></polyline>
                                                <line x1="4" y1="32" x2="32" y2="32"></line>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <div class="author-sign">
                                            <span class="ks-founder-signature" aria-label="Signature Ali Salomon">Ali Salomon</span>
                                        </div>
                                        <div class="author-text">Ali Salomon, fondateur de Kalystrat</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="about-thumb5 mt-60 d-inline-block">
                            <div class="video-wrap about-img-2">
                                <img src="{{ asset('assets/img/kalystrat/about-strategy.webp?v=4') }}" loading="lazy" decoding="async" alt="Plans architecturaux, crayon et règle – design Kalystrat">
                                <a href="https://www.youtube.com/watch?v=Mp8IXI1kzvQ" class="play-btn style6 popup-video" aria-label="Regarder la vidéo de présentation Kalystrat"><i class="ri-play-fill" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ==============================
         Section Filiales – onglets pour les six filiales Kalystrat
         ============================== --}}
    <div class="why-area-3 space-top overflow-hidden">
        <div class="why-sec-bg3-1" data-bg-src="{{ asset('assets/construz-new/img/bg/why-bg5-1.png?v=2') }}" aria-hidden="true"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="title-area text-center">
                        <span class="sub-title text-theme">Nos filiales <i class="ri-line-chart-line" aria-hidden="true"></i></span>
                        <h2 class="sec-title">Six entreprises, une seule marque pour vos projets</h2>
                    </div>
                </div>
            </div>
            <div class="row gy-50">
                <div class="col-xl-4">
                    <ul class="why-tab-wrap nav nav-pills" role="tablist" aria-label="Liste des six filiales Kalystrat">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="ks-pill-1-tab" data-bs-toggle="pill" data-bs-target="#ks-pill-1" type="button" role="tab" aria-controls="ks-pill-1" aria-selected="true">Kalystrat Fondations</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="ks-pill-2-tab" data-bs-toggle="pill" data-bs-target="#ks-pill-2" type="button" role="tab" aria-controls="ks-pill-2" aria-selected="false">Kalystrat Structure</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="ks-pill-3-tab" data-bs-toggle="pill" data-bs-target="#ks-pill-3" type="button" role="tab" aria-controls="ks-pill-3" aria-selected="false">Kalystrat Toiture et Enveloppe</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="ks-pill-4-tab" data-bs-toggle="pill" data-bs-target="#ks-pill-4" type="button" role="tab" aria-controls="ks-pill-4" aria-selected="false">Kalystrat Finition Intérieure</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="ks-pill-5-tab" data-bs-toggle="pill" data-bs-target="#ks-pill-5" type="button" role="tab" aria-controls="ks-pill-5" aria-selected="false">Kalystrat Immobilier</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="ks-pill-6-tab" data-bs-toggle="pill" data-bs-target="#ks-pill-6" type="button" role="tab" aria-controls="ks-pill-6" aria-selected="false">Kalystrat Placement Construction</button>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-8">
                    <div class="tab-content">
                        {{-- Filiale 1 – Fondations --}}
                        <div class="tab-pane fade show active" id="ks-pill-1" role="tabpanel" aria-labelledby="ks-pill-1-tab">
                            <div class="row gx-80 gy-40 align-items-center">
                                <div class="col-lg-5">
                                    <div class="why-thumb-wrap3-1">
                                        <div class="why-tab-thumb">
                                            <img src="{{ asset('assets/img/kalystrat/photos/filiale-fondations.webp') }}" loading="lazy" decoding="async" alt="Armature d'acier prête pour la coulée – Kalystrat Fondations">
                                        </div>
                                        <div class="why-text-wrap">
                                            <h3 class="title">Filiale</h3>
                                            <hr class="line">
                                            <div class="number">01</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="why-content-wrap">
                                        <h3 class="title">À propos de cette filiale</h3>
                                        <h4 class="subtitle">Kalystrat Fondations</h4>
                                        <p class="text">Excavation, coffrage, coulée de béton, drainage français et imperméabilisation. Kalystrat Fondations exécute les travaux souterrains pour le groupe et pour la clientèle externe.</p>
                                        <div class="checklist mb-35">
                                            <ul>
                                                <li><img src="{{ asset('assets/img/kalystrat/icons/about-checklsit-icon1-1.svg') }}" loading="lazy" decoding="async" alt="">Équipes RBQ, garantie sur la maçonnerie et le drainage
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group mt-35">
                                            <a href="{{ url('/filiales/fondations') }}" class="btn style3">Découvrir Kalystrat Fondations <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Filiale 2 – Structure --}}
                        <div class="tab-pane fade" id="ks-pill-2" role="tabpanel" aria-labelledby="ks-pill-2-tab">
                            <div class="row gx-80 gy-40 align-items-center">
                                <div class="col-lg-5">
                                    <div class="why-thumb-wrap3-1">
                                        <div class="why-tab-thumb">
                                            <img src="{{ asset('assets/img/kalystrat/photos/filiale-structure.webp') }}" loading="lazy" decoding="async" alt="Charpente bois résidentielle en construction – Kalystrat Structure">
                                        </div>
                                        <div class="why-text-wrap">
                                            <h3 class="title">Filiale</h3>
                                            <hr class="line">
                                            <div class="number">02</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="why-content-wrap">
                                        <h3 class="title">À propos de cette filiale</h3>
                                        <h4 class="subtitle">Kalystrat Structure</h4>
                                        <p class="text">Charpentes bois d'œuvre, fermes préfabriquées, structures d'acier léger&nbsp;: Kalystrat Structure érige le squelette de vos bâtiments résidentiels, commerciaux et industriels selon les normes du Code de construction du Québec.</p>
                                        <div class="checklist mb-35">
                                            <ul>
                                                <li><img src="{{ asset('assets/img/kalystrat/icons/about-checklsit-icon1-1.svg') }}" loading="lazy" decoding="async" alt="">Plans signés par ingénieur, montage rapide, sécurité chantier
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group mt-35">
                                            <a href="{{ url('/filiales/structure') }}" class="btn style3">Découvrir Kalystrat Structure <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Filiale 3 – Toiture et Enveloppe --}}
                        <div class="tab-pane fade" id="ks-pill-3" role="tabpanel" aria-labelledby="ks-pill-3-tab">
                            <div class="row gx-80 gy-40 align-items-center">
                                <div class="col-lg-5">
                                    <div class="why-thumb-wrap3-1">
                                        <div class="why-tab-thumb">
                                            <img src="{{ asset('assets/img/kalystrat/photos/filiale-toiture.webp') }}" loading="lazy" decoding="async" alt="Bardeaux d'asphalte texture macro – Kalystrat Toiture">
                                        </div>
                                        <div class="why-text-wrap">
                                            <h3 class="title">Filiale</h3>
                                            <hr class="line">
                                            <div class="number">03</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="why-content-wrap">
                                        <h3 class="title">À propos de cette filiale</h3>
                                        <h4 class="subtitle">Kalystrat Toiture et Enveloppe</h4>
                                        <p class="text">Couverture bardeaux, membranes élastomères, toits plats, revêtements extérieurs, soffites et fascias&nbsp;: Kalystrat Toiture et Enveloppe ferme et étanchéifie vos bâtiments contre les hivers québécois.</p>
                                        <div class="checklist mb-35">
                                            <ul>
                                                <li><img src="{{ asset('assets/img/kalystrat/icons/about-checklsit-icon1-1.svg') }}" loading="lazy" decoding="async" alt="">Garantie matériaux et main-d'œuvre, manufacturiers certifiés
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group mt-35">
                                            <a href="{{ url('/filiales/toiture') }}" class="btn style3">Découvrir Kalystrat Toiture <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Filiale 4 – Finition Intérieure --}}
                        <div class="tab-pane fade" id="ks-pill-4" role="tabpanel" aria-labelledby="ks-pill-4-tab">
                            <div class="row gx-80 gy-40 align-items-center">
                                <div class="col-lg-5">
                                    <div class="why-thumb-wrap3-1">
                                        <div class="why-tab-thumb">
                                            <img src="{{ asset('assets/img/kalystrat/photos/filiale-finition.webp') }}" loading="lazy" decoding="async" alt="Finition intérieure haut de gamme Kalystrat">
                                        </div>
                                        <div class="why-text-wrap">
                                            <h3 class="title">Filiale</h3>
                                            <hr class="line">
                                            <div class="number">04</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="why-content-wrap">
                                        <h3 class="title">À propos de cette filiale</h3>
                                        <h4 class="subtitle">Kalystrat Finition Intérieure</h4>
                                        <p class="text">Gypse, peinture, planchers, ébénisterie, cuisines et salles de bain. Kalystrat Finition Intérieure livre des espaces prêts à occuper, du brut jusqu'au dernier joint de silicone.</p>
                                        <div class="checklist mb-35">
                                            <ul>
                                                <li><img src="{{ asset('assets/img/kalystrat/icons/about-checklsit-icon1-1.svg') }}" loading="lazy" decoding="async" alt="">Sélection de matériaux, suivi des sous-traitants, livraison clé en main
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group mt-35">
                                            <a href="{{ url('/filiales/finition') }}" class="btn style3">Découvrir Kalystrat Finition <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Filiale 5 – Immobilier --}}
                        <div class="tab-pane fade" id="ks-pill-5" role="tabpanel" aria-labelledby="ks-pill-5-tab">
                            <div class="row gx-80 gy-40 align-items-center">
                                <div class="col-lg-5">
                                    <div class="why-thumb-wrap3-1">
                                        <div class="why-tab-thumb">
                                            <img src="{{ asset('assets/img/kalystrat/photos/filiale-immobilier.webp') }}" loading="lazy" decoding="async" alt="Vente immobilière neuve Kalystrat">
                                        </div>
                                        <div class="why-text-wrap">
                                            <h3 class="title">Filiale</h3>
                                            <hr class="line">
                                            <div class="number">05</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="why-content-wrap">
                                        <h3 class="title">À propos de cette filiale</h3>
                                        <h4 class="subtitle">Kalystrat Immobilier</h4>
                                        <p class="text">Promotion immobilière, vente de constructions neuves, gestion d'unités locatives et conseil aux acheteurs&nbsp;: Kalystrat Immobilier ferme la boucle en commercialisant ce que le groupe construit.</p>
                                        <div class="checklist mb-35">
                                            <ul>
                                                <li><img src="{{ asset('assets/img/kalystrat/icons/about-checklsit-icon1-1.svg') }}" loading="lazy" decoding="async" alt="">Courtiers <abbr title="Organisme d'autoréglementation du courtage immobilier du Québec">OACIQ</abbr>, accompagnement notaire et financement
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group mt-35">
                                            <a href="{{ url('/filiales/immobilier') }}" class="btn style3">Découvrir Kalystrat Immobilier <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Filiale 6 – Placement Construction --}}
                        <div class="tab-pane fade" id="ks-pill-6" role="tabpanel" aria-labelledby="ks-pill-6-tab">
                            <div class="row gx-80 gy-40 align-items-center">
                                <div class="col-lg-5">
                                    <div class="why-thumb-wrap3-1">
                                        <div class="why-tab-thumb">
                                            <img src="{{ asset('assets/img/kalystrat/photos/filiale-placement.webp') }}" loading="lazy" decoding="async" alt="Casque de sécurité jaune sur chantier – Kalystrat Placement">
                                        </div>
                                        <div class="why-text-wrap">
                                            <h3 class="title">Filiale</h3>
                                            <hr class="line">
                                            <div class="number">06</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="why-content-wrap">
                                        <h3 class="title">À propos de cette filiale</h3>
                                        <h4 class="subtitle">Kalystrat Placement Construction</h4>
                                        <p class="text">Recrutement et placement de main-d'œuvre qualifiée pour les chantiers du Québec&nbsp;: charpentiers, électriciens, plombiers, manœuvres <abbr title="Commission de la construction du Québec">CCQ</abbr>. Kalystrat Placement appuie autant le groupe que les entrepreneurs externes.</p>
                                        <div class="checklist mb-35">
                                            <ul>
                                                <li><img src="{{ asset('assets/img/kalystrat/icons/about-checklsit-icon1-1.svg') }}" loading="lazy" decoding="async" alt="">Cartes CCQ vérifiées, conformité <abbr title="Commission des normes, de l'équité, de la santé et de la sécurité du travail">CNESST</abbr>, pool de talents actif
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group mt-35">
                                            <a href="{{ url('/filiales/placement') }}" class="btn style3">Découvrir Kalystrat Placement <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ==============================
         Section Bénéfices – pourquoi choisir Kalystrat
         ============================== --}}
    <div class="benefit-area-5 space overflow-hidden">
        <div class="benefit-bg-shape5-1 shape-mockup" data-bottom="0" data-right="0" aria-hidden="true">
            <img src="{{ asset('assets/construz-new/img/bg/benefit-bg-shape5-1.png?v=2') }}" loading="lazy" decoding="async" alt="">
        </div>
        <div class="container">
            <div class="row gx-40 align-items-center">
                <div class="col-xl-6">
                    <div class="benefit-thumb5 mb-40 mb-xl-0">
                        <div class="benefit-img-1">
                            <img src="{{ asset('assets/img/kalystrat/team-coordination.webp') }}" loading="lazy" decoding="async" alt="Grue de construction sous ciel bleu – chantier Kalystrat">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="benefit-wrap5">
                        <div class="title-area mb-40">
                            <span class="sub-title text-theme">Nos avantages <i class="ri-line-chart-line" aria-hidden="true"></i></span>
                            <h2 class="sec-title">Pourquoi les Québécois choisissent Kalystrat</h2>
                            <p class="sec-text">Un contact, six équipes qui se parlent, des échéanciers tenus. Quand un problème survient, personne ne pointe le sous-traitant d'à côté. C'est nous, au complet.
                            </p>
                            <h3 class="mt-20 fw-normal mb-30">Six piliers stratégiques&nbsp;:</h3>
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="single-benefit-wrap">
                                        <div class="single-benefit-icon">
                                            <img src="{{ asset('assets/img/kalystrat/icons/benefit-icon1-1.svg') }}" loading="lazy" decoding="async" alt="">
                                        </div>
                                        <h4 class="single-benefit-title">Intégration verticale complète, de l'excavation à la finition</h4>
                                    </div>
                                    <div class="single-benefit-wrap">
                                        <div class="single-benefit-icon">
                                            <img src="{{ asset('assets/img/kalystrat/icons/benefit-icon1-2.svg') }}" loading="lazy" decoding="async" alt="">
                                        </div>
                                        <h4 class="single-benefit-title">Main-d'œuvre <abbr title="Commission de la construction du Québec">CCQ</abbr> interne via notre agence Placement</h4>
                                    </div>
                                    <div class="single-benefit-wrap">
                                        <div class="single-benefit-icon">
                                            <img src="{{ asset('assets/img/kalystrat/icons/benefit-icon1-3.svg') }}" loading="lazy" decoding="async" alt="">
                                        </div>
                                        <h4 class="single-benefit-title">Demande captive&nbsp;: Kalystrat Immobilier alimente les cinq filiales</h4>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-benefit-wrap">
                                        <div class="single-benefit-icon">
                                            <img src="{{ asset('assets/img/kalystrat/icons/benefit-icon1-4.svg') }}" loading="lazy" decoding="async" alt="">
                                        </div>
                                        <h4 class="single-benefit-title">Synergies opérationnelles, calendrier tenu en boucle</h4>
                                    </div>
                                    <div class="single-benefit-wrap">
                                        <div class="single-benefit-icon">
                                            <img src="{{ asset('assets/img/kalystrat/icons/benefit-icon1-5.svg') }}" loading="lazy" decoding="async" alt="">
                                        </div>
                                        <h4 class="single-benefit-title">Cohérence de marque «&nbsp;Kalystrat + Spécialité&nbsp;»</h4>
                                    </div>
                                    <div class="single-benefit-wrap">
                                        <div class="single-benefit-icon">
                                            <img src="{{ asset('assets/img/kalystrat/icons/benefit-icon1-6.svg') }}" loading="lazy" decoding="async" alt="">
                                        </div>
                                        <h4 class="single-benefit-title">Gestion centralisée — comptabilité, RH, juridique, TI</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ==============================
         Section Contact – formulaire de soumission gratuite
         ============================== --}}
    <section class="contact-area-2 space overflow-hidden">
        <div class="container">
            <div class="contact-wrap2 space overflow-hidden" data-bg-src="{{ asset('assets/img/kalystrat/contact-bg.webp') }}">
                <div class="section-animation-shape1-1 shape-mockup animation-infinite" data-top="0" data-left="0" data-bg-src="{{ asset('assets/construz-new/img/shape/global-line-shape1.png?v=2') }}" aria-hidden="true">
                </div>
                <div class="row gy-60 align-items-center">
                    <div class="col-xl-5">
                        <div class="ks-contact-trust">
                            <h3 class="ks-contact-trust__title">Pourquoi nous écrire&nbsp;?</h3>
                            <p class="ks-contact-trust__lead">Six expertises sous une seule signature. On vous répond avec le bon interlocuteur dès le premier appel.</p>
                            <div class="ks-contact-trust__card">
                                <ul class="ks-contact-trust__list" role="list">
                                    <li>
                                        <span class="ks-contact-trust__icon" aria-hidden="true"><x-frontend::icon name="shield-check"/></span>
                                        <span class="ks-contact-trust__txt"><strong>Licence <abbr title="Régie du bâtiment du Québec">RBQ</abbr> active</strong><span class="ks-contact-trust__sub">Conformité vérifiable en tout temps</span></span>
                                    </li>
                                    <li>
                                        <span class="ks-contact-trust__icon" aria-hidden="true"><x-frontend::icon name="home-heart"/></span>
                                        <span class="ks-contact-trust__txt"><strong>Garantie <abbr title="Garantie de construction résidentielle">GCR</abbr></strong><span class="ks-contact-trust__sub">Sur tous les projets résidentiels neufs</span></span>
                                    </li>
                                    <li>
                                        <span class="ks-contact-trust__icon" aria-hidden="true"><x-frontend::icon name="team"/></span>
                                        <span class="ks-contact-trust__txt"><strong>Main-d'œuvre <abbr title="Commission de la construction du Québec">CCQ</abbr> qualifiée</strong><span class="ks-contact-trust__sub">Cartes de compétence vérifiées</span></span>
                                    </li>
                                    <li>
                                        <span class="ks-contact-trust__icon" aria-hidden="true"><x-frontend::icon name="shield-star"/></span>
                                        <span class="ks-contact-trust__txt"><strong>Membre <abbr title="Association des professionnels de la construction et de l'habitation du Québec">APCHQ</abbr></strong><span class="ks-contact-trust__sub">Affiliation professionnelle reconnue</span></span>
                                    </li>
                                    <li>
                                        <span class="ks-contact-trust__icon" aria-hidden="true"><x-frontend::icon name="time"/></span>
                                        <span class="ks-contact-trust__txt"><strong>Réponse sous 48&nbsp;h ouvrables</strong><span class="ks-contact-trust__sub">Engagement ferme, pas de file d'attente</span></span>
                                    </li>
                                </ul>
                            </div>
                            <a href="tel:+14184760987" class="ks-contact-trust__phone" aria-label="Appeler Kalystrat au 418-476-0987">
                                <span class="ks-contact-trust__phone-icon" aria-hidden="true"><x-frontend::icon name="phone" :size="28"/></span>
                                <span class="ks-contact-trust__phone-text">
                                    <span class="ks-contact-trust__phone-number">418-476-0987</span>
                                    <span class="ks-contact-trust__phone-label">Ou parlez à notre équipe directement</span>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="contact-form-wrap">
                            <div class="title-area">
                                <span class="sub-title text-theme">Soumission gratuite <i class="ri-line-chart-line" aria-hidden="true"></i></span>
                                <h2 class="sec-title">Vous avez un projet en tête&nbsp;?</h2>
                            </div>
                            <form action="{{ url('/contact/envoyer') }}" method="POST" class="contact-form ajax-contact" aria-label="Formulaire de demande de soumission Kalystrat">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ks-name" class="visually-hidden">Votre nom</label>
                                            <input type="text" class="form-control" name="name" id="ks-name" placeholder="Votre nom" autocomplete="name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ks-email" class="visually-hidden">Adresse courriel</label>
                                            <input type="email" class="form-control" name="email" id="ks-email" placeholder="Adresse courriel" autocomplete="email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ks-phone" class="visually-hidden">Numéro de téléphone</label>
                                            <input type="tel" class="form-control" name="number" id="ks-phone" placeholder="Numéro de téléphone" autocomplete="tel">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ks-subject" class="visually-hidden">Filiale concernée</label>
                                            <select name="subject" id="ks-subject" class="single-select nice-select form-select" required>
                                                <option value="" disabled selected hidden>Filiale concernée</option>
                                                <option value="Kalystrat Fondations">Kalystrat Fondations</option>
                                                <option value="Kalystrat Structure">Kalystrat Structure</option>
                                                <option value="Kalystrat Toiture et Enveloppe">Kalystrat Toiture et Enveloppe</option>
                                                <option value="Kalystrat Finition Intérieure">Kalystrat Finition Intérieure</option>
                                                <option value="Kalystrat Immobilier">Kalystrat Immobilier</option>
                                                <option value="Kalystrat Placement Construction">Kalystrat Placement Construction</option>
                                                <option value="Projet multi-filiales">Projet multi-filiales</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="ks-message" class="visually-hidden">Décrivez votre projet</label>
                                            <textarea name="message" id="ks-message" cols="30" rows="3" class="form-control" placeholder="Décrivez votre projet (lieu, échéancier, budget approximatif)" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-btn col-12">
                                        <button type="submit" class="btn w-100">Envoyer ma demande <i class="ri-arrow-right-line" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                                <p class="form-messages mb-0 mt-3" role="status" aria-live="polite"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ==============================
         Section Réalisations – projets récents Kalystrat
         ============================== --}}
    <div class="portfolio-area-5 overflow-hidden">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="title-area text-center">
                        <span class="sub-title text-theme">Nos réalisations <i class="ri-line-chart-line" aria-hidden="true"></i></span>
                        <h2 class="sec-title">Projets récemment livrés au Québec</h2>
                    </div>
                </div>
            </div>
            <div class="overflow-hidden">
                <div class="row gy-30 gx-30">
                    <div class="col-lg-8">
                        <div class="portfolio-card style5">
                            <div class="portfolio-card-thumb">
                                <img src="{{ asset('assets/img/kalystrat/photos/filiale-immobilier.webp') }}" loading="lazy" decoding="async" alt="Bâtiment résidentiel multilogements moderne — projet Kalystrat Immobilier à Québec">
                            </div>
                            <div class="portfolio-card-details">
                                <div class="media-left">
                                    <span class="portfolio-card-subtitle">Résidentiel multifamilial</span>
                                    <h3 class="portfolio-card-title"><a href="{{ url('/realisations') }}">Résidentiel multilogements moderne à Québec</a></h3>
                                </div>
                                <div class="btn-group">
                                    <a href="{{ url('/realisations') }}" class="btn style2">
                                        Voir le projet <i class="ri-arrow-right-line" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="portfolio-card style5">
                            <div class="portfolio-card-thumb">
                                <img src="{{ asset('assets/img/kalystrat/project-residential.webp?v=2') }}" loading="lazy" decoding="async" alt="Maison neuve à Sainte-Foy livrée clé en main par Kalystrat">
                            </div>
                            <div class="portfolio-card-details">
                                <div class="media-left">
                                    <span class="portfolio-card-subtitle">Résidentiel</span>
                                    <h3 class="portfolio-card-title"><a href="{{ url('/realisations') }}">Maison neuve à Sainte-Foy</a></h3>
                                </div>
                                <div class="btn-group">
                                    <a href="{{ url('/realisations') }}" class="btn style2">
                                        Voir le projet <i class="ri-arrow-right-line" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="portfolio-card style5">
                            <div class="portfolio-card-thumb">
                                <img src="{{ asset('assets/img/kalystrat/photos/projet-commercial-montreal.webp') }}" loading="lazy" decoding="async" alt="Bâtiment commercial moderne — projet de référence Kalystrat à Montréal">
                            </div>
                            <div class="portfolio-card-details">
                                <div class="media-left">
                                    <span class="portfolio-card-subtitle">Commercial</span>
                                    <h3 class="portfolio-card-title"><a href="{{ url('/realisations') }}">Bâtiment commercial à Montréal</a></h3>
                                </div>
                                <div class="btn-group">
                                    <a href="{{ url('/realisations') }}" class="btn style2">
                                        Voir le projet <i class="ri-arrow-right-line" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="portfolio-card style5">
                            <div class="portfolio-card-thumb">
                                <img src="{{ asset('assets/img/kalystrat/photos/filiale-toiture.webp') }}" loading="lazy" decoding="async" alt="Bardeaux d'asphalte premium – réfection toiture Beauport Kalystrat">
                            </div>
                            <div class="portfolio-card-details">
                                <div class="media-left">
                                    <span class="portfolio-card-subtitle">Toiture et enveloppe</span>
                                    <h3 class="portfolio-card-title"><a href="{{ url('/realisations') }}">Réfection complète de toiture à Beauport</a></h3>
                                </div>
                                <div class="btn-group">
                                    <a href="{{ url('/realisations') }}" class="btn style2">
                                        Voir le projet <i class="ri-arrow-right-line" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="portfolio-card style5">
                            <div class="portfolio-card-thumb">
                                <img src="{{ asset('assets/img/kalystrat/photos/filiale-finition.webp') }}" loading="lazy" decoding="async" alt="Cuisine sur mesure haut de gamme livrée à Sillery par Kalystrat Finition">
                            </div>
                            <div class="portfolio-card-details">
                                <div class="media-left">
                                    <span class="portfolio-card-subtitle">Finition intérieure</span>
                                    <h3 class="portfolio-card-title"><a href="{{ url('/realisations') }}">Cuisine sur mesure à Sillery</a></h3>
                                </div>
                                <div class="btn-group">
                                    <a href="{{ url('/realisations') }}" class="btn style2">
                                        Voir le projet <i class="ri-arrow-right-line" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ==============================
         Section Statistiques – chiffres clés Kalystrat
         ============================== --}}
    <div class="counter-area-1 space">
        <div class="container">
            <div class="row justify-content-between gy-40">
                <div class="col-auto">
                    <div class="counter-card">
                        <h2 class="counter-card_number"><span class="counter-number">500</span>+</h2>
                        <p class="counter-card_text">Projets livrés au Québec</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="counter-card">
                        <h2 class="counter-card_number"><span class="counter-number">98</span>%</h2>
                        <p class="counter-card_text">Clients satisfaits</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="counter-card">
                        <h2 class="counter-card_number"><span class="counter-number">6</span></h2>
                        <p class="counter-card_text">Filiales spécialisées</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="counter-card">
                        <h2 class="counter-card_number"><span class="counter-number">100</span>%</h2>
                        <p class="counter-card_text">Capital québécois</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ==============================
         Section Carrières Kalystrat – appel aux candidat·e·s
         ============================== --}}
    <section class="blog-area-4 space">
        <div class="container">
            <div class="row justify-content-lg-between justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="title-area text-lg-start text-center">
                        <span class="sub-title text-theme">Joindre Kalystrat <i class="ri-line-chart-line" aria-hidden="true"></i></span>
                        <h2 class="sec-title">Carrières dans la construction au Québec</h2>
                    </div>
                </div>
                <div class="col-md-auto">
                    <div class="sec-btn">
                        <a href="{{ url('/carrieres') }}" class="btn">Voir toutes les offres <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="row global-carousel blog-slider5 slider-shadow" data-slide-show="3" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="1" data-xs-slide-show="1" data-dots="false">
                <div class="col-md-6 col-lg-4">
                    <article class="blog-card style5">
                        <div class="blog-img">
                            <img src="{{ asset('assets/img/kalystrat/photos/filiale-structure.webp') }}" loading="lazy" decoding="async" alt="Charpente bois en construction – carrière charpentier-menuisier Kalystrat">
                            <div class="blog-date">
                                <a href="{{ url('/carrieres') }}"><span class="ks-badge-loc">QC</span></a>
                                <div class="year">2026</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="{{ url('/carrieres') }}">Kalystrat Structure</a>
                                <a href="{{ url('/carrieres') }}">Temps plein</a>
                            </div>
                            <h3 class="blog-title"><a href="{{ url('/carrieres') }}">Charpentier-menuisier (carte CCQ valide)</a></h3>
                            <a href="{{ url('/carrieres') }}" class="btn style-border4">Postuler <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
                        </div>
                    </article>
                </div>

                <div class="col-md-6 col-lg-4">
                    <article class="blog-card style5">
                        <div class="blog-img">
                            <img src="{{ asset('assets/img/kalystrat/photos/filiale-toiture.webp') }}" loading="lazy" decoding="async" alt="Bardeaux d'asphalte texture – carrière couvreur Kalystrat Toiture">
                            <div class="blog-date">
                                <a href="{{ url('/carrieres') }}"><span class="ks-badge-loc">QC</span></a>
                                <div class="year">2026</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="{{ url('/carrieres') }}">Kalystrat Toiture</a>
                                <a href="{{ url('/carrieres') }}">Temps plein</a>
                            </div>
                            <h3 class="blog-title"><a href="{{ url('/carrieres') }}">Couvreur expérimenté pour bardeaux et membranes</a></h3>
                            <a href="{{ url('/carrieres') }}" class="btn style-border4">Postuler <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
                        </div>
                    </article>
                </div>

                <div class="col-md-6 col-lg-4">
                    <article class="blog-card style5">
                        <div class="blog-img">
                            <img src="{{ asset('assets/img/kalystrat/photos/filiale-placement.webp') }}" loading="lazy" decoding="async" alt="Casque sécurité chantier – carrière chargé de projet Kalystrat Placement">
                            <div class="blog-date">
                                <a href="{{ url('/carrieres') }}"><span class="ks-badge-loc">QC</span></a>
                                <div class="year">2026</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="{{ url('/carrieres') }}">Siège Kalystrat</a>
                                <a href="{{ url('/carrieres') }}">Temps plein</a>
                            </div>
                            <h3 class="blog-title"><a href="{{ url('/carrieres') }}">Chargé(e) de projet construction</a></h3>
                            <a href="{{ url('/carrieres') }}" class="btn style-border4">Postuler <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
                        </div>
                    </article>
                </div>

                <div class="col-md-6 col-lg-4">
                    <article class="blog-card style5">
                        <div class="blog-img">
                            <img src="{{ asset('assets/img/kalystrat/photos/filiale-fondations.webp') }}" loading="lazy" decoding="async" alt="Armature acier coffrage – carrière manœuvre coffreur Kalystrat Fondations">
                            <div class="blog-date">
                                <a href="{{ url('/carrieres') }}"><span class="ks-badge-loc">QC</span></a>
                                <div class="year">2026</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="{{ url('/carrieres') }}">Kalystrat Fondations</a>
                                <a href="{{ url('/carrieres') }}">Temps plein</a>
                            </div>
                            <h3 class="blog-title"><a href="{{ url('/carrieres') }}">Manœuvre coffreur, secteur Québec</a></h3>
                            <a href="{{ url('/carrieres') }}" class="btn style-border4">Postuler <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
                        </div>
                    </article>
                </div>

                <div class="col-md-6 col-lg-4">
                    <article class="blog-card style5">
                        <div class="blog-img">
                            <img src="{{ asset('assets/img/kalystrat/photos/carriere-designer.webp') }}" loading="lazy" decoding="async" alt="Échantillons matériaux et palette couleurs – carrière designer d'intérieur Kalystrat">
                            <div class="blog-date">
                                <a href="{{ url('/carrieres') }}"><span class="ks-badge-loc">QC</span></a>
                                <div class="year">2026</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="{{ url('/carrieres') }}">Kalystrat Finition</a>
                                <a href="{{ url('/carrieres') }}">Temps plein</a>
                            </div>
                            <h3 class="blog-title"><a href="{{ url('/carrieres') }}">Designer d'intérieur résidentiel</a></h3>
                            <a href="{{ url('/carrieres') }}" class="btn style-border4">Postuler <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
                        </div>
                    </article>
                </div>

                <div class="col-md-6 col-lg-4">
                    <article class="blog-card style5">
                        <div class="blog-img">
                            <img src="{{ asset('assets/img/kalystrat/photos/carriere-courtier.webp') }}" loading="lazy" decoding="async" alt="Clés et contrat de propriété – carrière courtier immobilier OACIQ Kalystrat">
                            <div class="blog-date">
                                <a href="{{ url('/carrieres') }}"><span class="ks-badge-loc">QC</span></a>
                                <div class="year">2026</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="{{ url('/carrieres') }}">Kalystrat Immobilier</a>
                                <a href="{{ url('/carrieres') }}">Temps plein</a>
                            </div>
                            <h3 class="blog-title"><a href="{{ url('/carrieres') }}">Courtier immobilier résidentiel (OACIQ)</a></h3>
                            <a href="{{ url('/carrieres') }}" class="btn style-border4">Postuler <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    {{-- ==============================
         Section CTA finale – soumission gratuite
         ============================== --}}
    <div class="cta-area-5">
        <div class="container">
            <div class="cta-wrap5" data-bg-src="{{ asset('assets/img/kalystrat/cta-quebec-1280w.webp?v=2') }}">
                <h3 class="cta-title text-white">
                    De la fondation à la livraison&nbsp;: Kalystrat orchestre votre projet, du premier coup de pelle à la remise des clés.
                </h3>
                <a class="btn style4" href="{{ url('/contact') }}">Obtenir une soumission gratuite <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>

    <button class="scroll-top scroll-to-target" data-target="html" aria-label="Retour en haut de page">
        <svg viewBox="-1 -1 102 102" role="img" aria-label="Cercle de progression du défilement">
            <title>Cercle de progression du défilement</title>
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
        </svg>
    </button>

@endsection

@push('scripts')
{{-- Note : defer testé sur ces scripts mais empire le LCP (Lighthouse 64 vs 67 sans defer,
     LCP 8.1s vs 6.0s) — Chrome re-priorise mal sur ce site. Defer retiré, polling jQuery
     dans l'inline ci-dessous reste robuste si chargement asynchrone activé plus tard. --}}
<script src="{{ asset('assets/construz-new/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/construz-new/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/construz-new/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/construz-new/js/circle-progress.js') }}"></script>
<script src="{{ asset('assets/construz-new/js/jquery.marquee.min.js') }}"></script>
<script src="{{ asset('assets/construz-new/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/construz-new/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/construz-new/js/nice-select.min.js') }}"></script>
<script src="{{ asset('assets/construz-new/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/construz-new/js/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/construz-new/js/counter.js') }}"></script>
<script src="{{ asset('assets/construz-new/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/construz-new/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/construz-new/js/twinmax.js') }}"></script>
<script src="{{ asset('assets/construz-new/js/main.js') }}"></script>
<script>
/* a11y : Slick clone des slides → liens interactifs hors écran restent dans le DOM et sont focusables.
   On bloque le focus tab sur slides non-actives via attribut HTML "inert" (standard moderne 2024).
   Polling jQuery car les scripts externes sont en defer : ils s'exécutent APRÈS cet inline. */
(function() {
    function tryInit() {
        if (typeof jQuery === 'undefined' || typeof jQuery.fn.slick === 'undefined') {
            setTimeout(tryInit, 50);
            return;
        }
        function applyInertToSlides() {
            jQuery('.hero-slider5, .ks-tab-slide-wrap, .global-carousel').each(function() {
                jQuery(this).find('.slick-slide').each(function() {
                    var $slide = jQuery(this);
                    if ($slide.hasClass('slick-active') || $slide.hasClass('slick-current')) {
                        $slide.removeAttr('inert');
                    } else {
                        $slide.attr('inert', '');
                    }
                });
            });
        }
        jQuery(document).ready(function() {
            setTimeout(applyInertToSlides, 200);
            jQuery('.hero-slider5, .ks-tab-slide-wrap, .global-carousel').on('afterChange init', applyInertToSlides);
        });
    }
    tryInit();
})();
</script>
@endpush
