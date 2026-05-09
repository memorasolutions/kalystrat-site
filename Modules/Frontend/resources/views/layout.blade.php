<!DOCTYPE html>
<html lang="fr-CA" dir="ltr" prefix="og: https://ogp.me/ns#">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">

    {{-- SEO --}}
    <title>{{ $title ?? 'Kalystrat – Groupe québécois en construction' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Kalystrat est un groupe québécois en construction regroupant 6 filiales spécialisées, porté par une décennie d\'expertise terrain sous la conduite d\'Ali Salomon à Québec.' }}">
    <link rel="canonical" href="{{ $canonical ?? url()->current() }}">
    <link rel="alternate" hreflang="fr-CA" href="{{ $canonical ?? url()->current() }}">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="author" content="Gestion Kalystrat Inc.">
    <meta name="language" content="fr-CA">

    {{-- AEO / GEO --}}
    <meta name="geo.region" content="CA-QC">
    <meta name="geo.placename" content="Québec">
    <meta name="geo.position" content="46.8139;-71.2080">
    <meta name="ICBM" content="46.8139, -71.2080">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:locale" content="fr_CA">
    <meta property="og:site_name" content="Kalystrat">
    <meta property="og:title" content="{{ $ogTitle ?? $title ?? 'Kalystrat – Groupe québécois en construction' }}">
    <meta property="og:description" content="{{ $metaDescription ?? 'Kalystrat est un groupe québécois en construction regroupant 6 filiales spécialisées.' }}">
    <meta property="og:url" content="{{ $canonical ?? url()->current() }}">
    <meta property="og:image" content="{{ $ogImage ?? asset('assets/img/kalystrat/og-image.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:type" content="image/jpeg">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $ogTitle ?? $title ?? 'Kalystrat – Groupe québécois en construction' }}">
    <meta name="twitter:description" content="{{ $metaDescription ?? 'Kalystrat est un groupe québécois en construction regroupant 6 filiales spécialisées.' }}">
    <meta name="twitter:image" content="{{ $ogImage ?? asset('assets/img/kalystrat/og-image.jpg') }}">

    {{-- LLMs.txt pour AI crawlers --}}
    <link rel="alternate" type="text/plain" title="LLMs.txt" href="/llms.txt">

    {{-- Préchargement logo --}}
    <link rel="preload" href="{{ asset('assets/img/kalystrat/logo-white.svg') }}" as="image" type="image/svg+xml">

    {{-- CSS critiques bloquants (Bootstrap utility + Construz layout above-the-fold) --}}
    <link rel="stylesheet" href="{{ asset('assets/construz-new/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/construz-new/css/style.min.css') }}">

    {{-- CSS icônes : differées via pattern Filament Group loadCSS (media=print + onload swap).
         Économie ~700ms de render-blocking. Fallback noscript pour navigateurs sans JS (~0.3% trafic). --}}
    <link rel="preload" href="{{ asset('themes/construz/assets/css/fontawesome.min.css') }}" as="style">
    <link rel="stylesheet" href="{{ asset('themes/construz/assets/css/fontawesome.min.css') }}" media="print" onload="this.media='all'; this.onload=null;">
    {{-- Kalystrat Icons : subset RemixIcon (43 glyphes utilisés, 159KB → 3.5KB woff2 -98%, self-hosted RGPD/Loi 25 OK) --}}
    <link rel="preload" href="{{ asset('assets/fonts/icons/kalystrat-icons.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="{{ asset('assets/fonts/icons/kalystrat-icons.css') }}">
    <noscript>
        <link rel="stylesheet" href="{{ asset('themes/construz/assets/css/fontawesome.min.css') }}">
    </noscript>

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('assets/img/kalystrat/favicon.svg') }}" type="image/svg+xml">

    {{-- PWA — manifest dynamique, theme color navy, icônes Apple/Android (config via config/pwa.php + .env) --}}
    @if(config('pwa.enabled', true))
    <link rel="manifest" href="{{ url('/manifest.webmanifest') }}">
    <meta name="theme-color" content="{{ config('pwa.theme_color', '#0A1628') }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="{{ config('pwa.short_name', config('app.name', 'Kalystrat')) }}">
    <link rel="apple-touch-icon" href="{{ asset('icons/apple-touch-icon.png') }}">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="msapplication-TileColor" content="{{ config('pwa.theme_color', '#0A1628') }}">
    @endif

    {{-- Préchargement Akzidenz Grotesk (charte v2) — variants Regular + Bold critiques au-dessus du fold --}}
    <link rel="preload" href="{{ asset('assets/fonts/AkzidenzGrotesk-Regular.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('assets/fonts/AkzidenzGrotesk-Bold.woff2') }}" as="font" type="font/woff2" crossorigin>

    {{-- Schema.org JSON-LD Organization + 6 LocalBusiness subOrganization --}}
    @verbatim
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "@id": "https://kalystrat.ca/#organization",
        "name": "Gestion Kalystrat Inc.",
        "alternateName": "Kalystrat",
        "url": "https://kalystrat.ca",
        "logo": "https://kalystrat.ca/assets/img/kalystrat/logo-header.svg",
        "image": "https://kalystrat.ca/assets/img/kalystrat/og-image.jpg",
        "foundingDate": "2026",
        "founder": {"@type": "Person", "name": "Ali Salomon"},
        "address": {"@type": "PostalAddress", "addressLocality": "Québec", "addressRegion": "QC", "addressCountry": "CA"},
        "contactPoint": {"@type": "ContactPoint", "telephone": "+14184760987", "contactType": "customer service", "email": "info@kalystrat.ca", "areaServed": "CA-QC", "availableLanguage": "French"},
        "sameAs": ["https://www.facebook.com/kalystrat", "https://www.linkedin.com/company/kalystrat", "https://www.instagram.com/kalystrat", "https://www.tiktok.com/@kalystrat"],
        "subOrganization": [
            {"@type": "GeneralContractor", "@id": "https://kalystrat.ca/filiales/fondations#business", "name": "Kalystrat Fondations Inc.", "url": "https://kalystrat.ca/filiales/fondations", "address": {"@type": "PostalAddress", "addressLocality": "Québec", "addressRegion": "QC", "addressCountry": "CA"}, "telephone": "+14184760987", "areaServed": "CA-QC", "parentOrganization": {"@type": "Organization", "name": "Gestion Kalystrat Inc."}},
            {"@type": "GeneralContractor", "@id": "https://kalystrat.ca/filiales/structure#business", "name": "Kalystrat Structure Inc.", "url": "https://kalystrat.ca/filiales/structure", "address": {"@type": "PostalAddress", "addressLocality": "Québec", "addressRegion": "QC", "addressCountry": "CA"}, "telephone": "+14184760987", "areaServed": "CA-QC", "parentOrganization": {"@type": "Organization", "name": "Gestion Kalystrat Inc."}},
            {"@type": "RoofingContractor", "@id": "https://kalystrat.ca/filiales/toiture#business", "name": "Kalystrat Toiture et Enveloppe Inc.", "url": "https://kalystrat.ca/filiales/toiture", "address": {"@type": "PostalAddress", "addressLocality": "Québec", "addressRegion": "QC", "addressCountry": "CA"}, "telephone": "+14184760987", "areaServed": "CA-QC", "parentOrganization": {"@type": "Organization", "name": "Gestion Kalystrat Inc."}},
            {"@type": "HomeAndConstructionBusiness", "@id": "https://kalystrat.ca/filiales/finition#business", "name": "Kalystrat Finition Intérieure Inc.", "url": "https://kalystrat.ca/filiales/finition", "address": {"@type": "PostalAddress", "addressLocality": "Québec", "addressRegion": "QC", "addressCountry": "CA"}, "telephone": "+14184760987", "areaServed": "CA-QC", "parentOrganization": {"@type": "Organization", "name": "Gestion Kalystrat Inc."}},
            {"@type": "RealEstateAgent", "@id": "https://kalystrat.ca/filiales/immobilier#business", "name": "Kalystrat Immobilier Inc.", "url": "https://kalystrat.ca/filiales/immobilier", "address": {"@type": "PostalAddress", "addressLocality": "Québec", "addressRegion": "QC", "addressCountry": "CA"}, "telephone": "+14184760987", "areaServed": "CA-QC", "parentOrganization": {"@type": "Organization", "name": "Gestion Kalystrat Inc."}},
            {"@type": "EmploymentAgency", "@id": "https://kalystrat.ca/filiales/placement#business", "name": "Kalystrat Placement Construction Inc.", "url": "https://kalystrat.ca/filiales/placement", "address": {"@type": "PostalAddress", "addressLocality": "Québec", "addressRegion": "QC", "addressCountry": "CA"}, "telephone": "+14184760987", "areaServed": "CA-QC", "parentOrganization": {"@type": "Organization", "name": "Gestion Kalystrat Inc."}}
        ]
    }
    </script>
    @endverbatim

    {{-- Styles critiques --}}
    @verbatim
    <style>
        /* @font-face Akzidenz Grotesk — self-hosted, charte v2 (G6 2026-05-04) */
        @font-face {
            font-family: 'Akzidenz Grotesk';
            src: url('/assets/fonts/AkzidenzGrotesk-Regular.woff2') format('woff2'),
                 url('/assets/fonts/AkzidenzGrotesk-Regular.otf') format('opentype');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Akzidenz Grotesk';
            src: url('/assets/fonts/AkzidenzGrotesk-Bold.woff2') format('woff2'),
                 url('/assets/fonts/AkzidenzGrotesk-Bold.otf') format('opentype');
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Akzidenz Grotesk';
            src: url('/assets/fonts/AkzidenzGrotesk-Medium.woff2') format('woff2'),
                 url('/assets/fonts/AkzidenzGrotesk-Medium.otf') format('opentype');
            font-weight: 500;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Akzidenz Grotesk';
            src: url('/assets/fonts/AkzidenzGrotesk-Light.woff2') format('woff2'),
                 url('/assets/fonts/AkzidenzGrotesk-Light.otf') format('opentype');
            font-weight: 300;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Akzidenz Grotesk';
            src: url('/assets/fonts/AkzidenzGrotesk-LightItalic.woff2') format('woff2'),
                 url('/assets/fonts/AkzidenzGrotesk-LightItalic.otf') format('opentype');
            font-weight: 300;
            font-style: italic;
            font-display: swap;
        }
        :root {
            --ks-navy: #0A1628;
            --ks-gold: #B8A472;
            --ks-white: #FFFFFF;
            --ks-light: #F8F8F6;
            --ks-font: "Akzidenz Grotesk", "Helvetica Neue", Arial, sans-serif;
        }
        *, *::before, *::after { box-sizing: border-box; }
        html { scroll-behavior: smooth; overflow-x: hidden; }
        body { margin: 0; padding: 0; font-family: var(--ks-font); color: var(--ks-navy); background: var(--ks-white); -webkit-font-smoothing: antialiased; overflow-x: hidden; }
        .ks-skip-link { position: absolute; top: -100%; left: 1rem; z-index: 10000; padding: 0.75rem 1.5rem; background: var(--ks-gold); color: var(--ks-navy); font-weight: 700; text-decoration: none; border-radius: 0 0 0.25rem 0.25rem; transition: top 0.2s ease; }
        .ks-skip-link:focus { top: 0; outline: 3px solid var(--ks-navy); outline-offset: 2px; }
        :focus-visible { outline: 3px solid var(--ks-gold); outline-offset: 3px; }
        a:focus-visible, button:focus-visible, input:focus-visible, select:focus-visible, textarea:focus-visible { outline: 3px solid var(--ks-gold); outline-offset: 3px; }
        .ks-header { position: sticky; top: 0; z-index: 100; background: var(--ks-navy); transition: background 0.3s ease, box-shadow 0.3s ease; }
        /* Header scroll : glassmorphism subtil (Apple Liquid Glass iOS 26).
           Fallback : blanc opaque pour navigateurs sans backdrop-filter (~3% trafic). */
        .ks-header.ks-header--scrolled {
            background: rgba(255, 255, 255, 0.85);
            box-shadow: 0 2px 12px rgba(10, 22, 40, 0.08);
            border-bottom: 1px solid rgba(10, 22, 40, 0.06);
        }
        @supports (backdrop-filter: blur(12px)) or (-webkit-backdrop-filter: blur(12px)) {
            .ks-header.ks-header--scrolled {
                background: rgba(255, 255, 255, 0.72);
                -webkit-backdrop-filter: blur(14px) saturate(150%);
                backdrop-filter: blur(14px) saturate(150%);
            }
        }
        .ks-header__inner { display: flex; align-items: center; justify-content: space-between; max-width: 1320px; margin: 0 auto; padding: 0 1.5rem; min-height: 80px; }
        .ks-header__logo { display: flex; align-items: center; flex-shrink: 0; position: relative; }
        .ks-header__logo img { height: 44px; width: auto; }
        .ks-header__logo-dark { display: none; }
        .ks-header--scrolled .ks-header__logo-white { display: none; }
        .ks-header--scrolled .ks-header__logo-dark { display: block; }
        .ks-header__nav { display: flex; align-items: center; gap: 0; list-style: none; margin: 0; padding: 0; }
        .ks-header__nav-item { position: relative; }
        .ks-header__nav-link { display: inline-flex; align-items: center; min-height: 44px; min-width: 44px; padding: 0.5rem 0.875rem; color: var(--ks-white); text-decoration: none; font-size: 0.9375rem; font-weight: 500; letter-spacing: 0.01em; transition: color 0.2s ease; white-space: nowrap; }
        .ks-header--scrolled .ks-header__nav-link { color: var(--ks-navy); }
        .ks-header__nav-link:hover, .ks-header__nav-link:focus-visible { color: var(--ks-gold); }
        .ks-header__dropdown { position: absolute; top: 100%; left: 0; z-index: 200; min-width: 280px; padding: 0.5rem 0; background: var(--ks-white); border-radius: 0.375rem; box-shadow: 0 8px 24px rgba(10,22,40,0.15); list-style: none; margin: 0; opacity: 0; visibility: hidden; pointer-events: none; transform: translateY(8px); transition: opacity 0.2s ease, visibility 0.2s ease, transform 0.2s ease; }
        .ks-header__nav-item:hover > .ks-header__dropdown,
        .ks-header__nav-item:focus-within > .ks-header__dropdown,
        .ks-header__nav-item:has([aria-expanded="true"]) > .ks-header__dropdown { pointer-events: auto; opacity: 1; visibility: visible; transform: translateY(0); }
        /* Disclosure button (Filiales) : reset look, garder identique aux liens nav */
        button.ks-header__nav-link { background: transparent; border: 0; cursor: pointer; font-family: inherit; }
        button.ks-header__nav-link[aria-expanded="true"] .ks-header__nav-arrow { transform: rotate(180deg); }
        .ks-header__nav-arrow { display: inline-block; transition: transform 0.2s ease; margin-left: 0.25rem; }
        .ks-header__dropdown-link { display: block; min-height: 44px; padding: 0.625rem 1.25rem; color: var(--ks-navy); text-decoration: none; font-size: 0.9375rem; transition: background 0.15s ease, color 0.15s ease; }
        .ks-header__dropdown-link:hover, .ks-header__dropdown-link:focus-visible { background: rgba(184,164,114,0.1); color: var(--ks-gold); }
        .ks-header__cta { display: inline-flex; align-items: center; gap: 0.5rem; min-height: 48px; height: 48px; padding: 0.75rem 1.25rem; background: var(--ks-gold); color: var(--ks-navy); text-decoration: none; font-size: 0.9375rem; font-weight: 700; border-radius: 0.375rem; transition: background 0.2s ease; white-space: nowrap; flex-shrink: 0; margin-left: 1rem; }
        .ks-header__cta:hover { background: #a6934f; color: var(--ks-navy); }
        .ks-header__hamburger { display: none; align-items: center; justify-content: center; min-height: 44px; min-width: 44px; background: none; border: none; cursor: pointer; color: var(--ks-white); }
        .ks-header--scrolled .ks-header__hamburger { color: var(--ks-navy); }
        .ks-mobile-nav { display: none; position: fixed; top: 80px; left: 0; right: 0; bottom: 0; z-index: 99; background: var(--ks-navy); padding: 2rem 1.5rem; overflow-y: auto; }
        .ks-mobile-nav--open { display: block; }
        .ks-mobile-nav__list { list-style: none; margin: 0; padding: 0; }
        .ks-mobile-nav__link { display: block; min-height: 44px; padding: 0.75rem 0; color: var(--ks-white); text-decoration: none; font-size: 1.125rem; font-weight: 500; border-bottom: 1px solid rgba(255,255,255,0.08); }
        .ks-mobile-nav__link:hover, .ks-mobile-nav__link:focus-visible { color: var(--ks-gold); }
        .ks-mobile-nav__sub { list-style: none; margin: 0; padding: 0 0 0 1.25rem; display: none; }
        .ks-mobile-nav__sub-link { display: block; min-height: 44px; padding: 0.5rem 0; color: rgba(255,255,255,0.75); text-decoration: none; font-size: 1rem; }
        .ks-mobile-nav__cta { display: inline-flex; align-items: center; gap: 0.5rem; min-height: 44px; margin-top: 1.5rem; padding: 0.75rem 1.5rem; background: var(--ks-gold); color: var(--ks-navy); text-decoration: none; font-weight: 700; border-radius: 0.375rem; }
        .ks-main { min-height: 50vh; }

        /* === CTA pré-footer "Discutons" – Pattern Awwwards 2026, centré, hiérarchie nette === */
        .ks-cta-discutons {
            background-color: #0A1628;                                         /* fallback solide pour audits a11y (gradient seul = pas de bg-color detecte) */
            background-image: linear-gradient(180deg, #0A1628 0%, #14223A 100%);
            padding: 5rem 0 4.5rem;
            border-top: 1px solid rgba(184, 164, 114, 0.12);
            border-bottom: 1px solid rgba(184, 164, 114, 0.18);
        }
        .ks-cta-discutons__wrap {
            max-width: 760px;
            margin: 0 auto;
            text-align: center;
        }
        .ks-cta-discutons__eyebrow {
            display: inline-block;
            color: var(--ks-gold);
            font-size: 0.8125rem;
            font-weight: 600;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            margin-bottom: 1.25rem;
            padding: 0.4rem 1rem;
            border: 1px solid rgba(184, 164, 114, 0.35);
            border-radius: 999px;
        }
        .ks-cta-discutons__title {
            color: #FFFFFF;
            font-size: clamp(1.75rem, 3.5vw, 2.75rem);
            font-weight: 700;
            line-height: 1.15;
            margin: 0 0 1.25rem;
            letter-spacing: -0.01em;
        }
        .ks-cta-discutons__desc {
            color: rgba(255, 255, 255, 0.75);
            font-size: 1.0625rem;
            line-height: 1.6;
            max-width: 580px;
            margin: 0 auto 2rem;
        }
        .ks-cta-discutons__actions {
            display: inline-flex;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: center;
        }
        .ks-cta-discutons__btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            min-height: 52px;
            padding: 0.9rem 1.75rem;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            border-radius: 0.5rem;
            transition: transform 0.15s ease, background 0.2s ease, color 0.2s ease;
        }
        .ks-cta-discutons__btn--primary {
            background: var(--ks-gold);
            color: var(--ks-navy);
        }
        .ks-cta-discutons__btn--primary:hover,
        .ks-cta-discutons__btn--primary:focus-visible {
            background: #d4c28c;
            color: var(--ks-navy);
            transform: translateY(-1px);
        }
        .ks-cta-discutons__btn--secondary {
            background: transparent;
            color: #FFFFFF;
            border: 1px solid rgba(255, 255, 255, 0.4);
        }
        .ks-cta-discutons__btn--secondary:hover,
        .ks-cta-discutons__btn--secondary:focus-visible {
            background: rgba(184, 164, 114, 0.12);
            border-color: var(--ks-gold);
            color: var(--ks-gold);
        }
        @media (max-width: 575px) {
            .ks-cta-discutons { padding: 3.5rem 0 3rem; }
            .ks-cta-discutons__btn { width: 100%; justify-content: center; }
            .ks-cta-discutons__actions { width: 100%; }
        }

        /* === Bande accréditations RBQ/GCR/CCQ – Pattern Pomerleau/EBC 2026 (séparation CTA↔footer + signaux confiance B2C/B2B) === */
        .ks-trust-band {
            background: #06101F;
            padding: 1.5rem 1.5rem;
            border-top: 1px solid rgba(184, 164, 114, 0.22);
            border-bottom: 1px solid rgba(184, 164, 114, 0.12);
        }
        .ks-trust-band__inner {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1rem 2.75rem;
            max-width: 1320px;
            margin: 0 auto;
        }
        .ks-trust-band__label {
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--ks-gold);
            margin: 0;
        }
        .ks-trust-band__item {
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            color: rgba(255, 255, 255, 0.88);
            font-size: 0.9375rem;
            font-weight: 600;
            letter-spacing: 0.02em;
        }
        .ks-trust-band__item i {
            color: var(--ks-gold);
            font-size: 1.25rem;
            line-height: 1;
        }
        @media (max-width: 720px) {
            .ks-trust-band { padding: 1.25rem 1rem; }
            .ks-trust-band__inner { gap: 0.75rem 1.5rem; }
            .ks-trust-band__item { font-size: 0.8125rem; }
        }

        /* === Footer Kalystrat – refonte 2026 (typo, spacing, hover) === */
        .ks-footer { background: var(--ks-navy); color: var(--ks-white); padding: 4.5rem 0 0; }
        .ks-footer a { color: rgba(255,255,255,0.7); text-decoration: none; transition: color 0.2s ease, transform 0.15s ease, padding 0.15s ease; }
        .ks-footer a:hover, .ks-footer a:focus-visible { color: var(--ks-gold); }
        .ks-footer__grid { display: grid; grid-template-columns: 1.4fr 1fr 1fr 0.8fr; gap: 3rem; max-width: 1320px; margin: 0 auto; padding: 0 1.5rem; }
        .ks-footer__heading { font-size: 0.8125rem; font-weight: 700; color: var(--ks-gold); margin: 0 0 1.25rem; letter-spacing: 0.18em; text-transform: uppercase; }
        .ks-footer__logo { height: 40px; width: auto; margin-bottom: 1rem; }
        .ks-footer__tagline { font-size: 0.9375rem; color: rgba(255,255,255,0.7); line-height: 1.6; margin: 0 0 1rem; }
        .ks-footer__links { list-style: none; margin: 0; padding: 0; }
        .ks-footer__links li { margin-bottom: 0.25rem; }
        .ks-footer__links a { font-size: 0.9375rem; min-height: 44px; display: inline-flex; align-items: center; position: relative; }
        .ks-footer__links a:hover, .ks-footer__links a:focus-visible { padding-left: 0.5rem; }
        .ks-footer__links a::before { content: ""; position: absolute; left: 0; top: 50%; width: 0; height: 1px; background: var(--ks-gold); transition: width 0.2s ease; transform: translateY(-50%); }
        .ks-footer__links a:hover::before, .ks-footer__links a:focus-visible::before { width: 0.35rem; }
        .ks-footer__contact-item { display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem; font-size: 0.9375rem; color: rgba(255,255,255,0.75); line-height: 1.6; }
        .ks-footer__contact-icon { width: 20px; height: 20px; flex-shrink: 0; fill: var(--ks-gold); }
        .ks-footer__social { display: flex; gap: 1rem; margin-top: 0.5rem; }
        .ks-footer__social-link { display: inline-flex; align-items: center; justify-content: center; min-height: 44px; min-width: 44px; padding: 0.5rem; border-radius: 50%; background: rgba(255,255,255,0.08); transition: background 0.2s ease; }
        .ks-footer__social-link:hover, .ks-footer__social-link:focus-visible { background: var(--ks-gold); }
        .ks-footer__social-link svg { width: 20px; height: 20px; fill: var(--ks-white); }
        .ks-footer__bottom { margin-top: 3.5rem; padding: 1.25rem 1.5rem; border-top: 1px solid rgba(184, 164, 114, 0.12); background: rgba(0, 0, 0, 0.18); }
        .ks-footer__bottom-inner { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 0.75rem 1.5rem; max-width: 1320px; margin: 0 auto; }
        .ks-footer__copyright { font-size: 0.8125rem; color: rgba(255,255,255,0.5); margin: 0; }
        .ks-footer__legal { display: flex; gap: 1.5rem; align-items: center; }
        .ks-footer__legal a { font-size: 0.8125rem; min-height: 44px; display: inline-flex; align-items: center; color: rgba(255,255,255,0.5); }
        .ks-footer__legal a:hover, .ks-footer__legal a:focus-visible { color: var(--ks-gold); }
        .alert { padding: 1rem 1.25rem; margin-bottom: 1rem; border-radius: 0.375rem; font-size: 0.9375rem; }
        .alert-success { background: #d1e7dd; color: #0f5132; border: 1px solid #a3cfbb; }
        .alert-danger { background: #f8d7da; color: #842029; border: 1px solid #f1aeb5; }
        .alert ul { margin: 0; padding-left: 1.25rem; }
        @media (max-width: 991.98px) {
            .ks-header__nav-desktop { display: none; }
            .ks-header__hamburger { display: flex; }
            .ks-header__cta--desktop { display: none; }
            .ks-footer__grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 575.98px) {
            .ks-footer__grid { grid-template-columns: 1fr; }
            .ks-footer__bottom-inner { flex-direction: column; text-align: center; }
            .ks-footer__legal { justify-content: center; }
        }

        /* ============================================================
           WCAG 2.2 AAA – Overrides ultra-spécifiques (anti-Construz)
           Les imports CSS Construz (style.css) battaient les règles
           inline via `.nav-link { color }`. On force la couleur via
           sélecteurs descendants + !important pour assurer 4.5:1+.
           ============================================================ */

        /* A0. Couleur héritée du header/mobile-nav – corrige faux-positif axe-core
           qui voit color:navy + bg:navy via héritage du body. */
        header.ks-header,
        header.ks-header .ks-header__inner,
        header.ks-header .ks-header__nav-desktop,
        header.ks-header .ks-header__nav,
        header.ks-header .ks-header__nav-item,
        .ks-mobile-nav,
        .ks-mobile-nav__list,
        .ks-mobile-nav__list > li {
            color: #FFFFFF !important;
        }
        /* Dropdown filiales – fond blanc, texte navy */
        header.ks-header .ks-header__dropdown,
        header.ks-header .ks-header__dropdown li {
            color: #0A1628 !important;
            background: #FFFFFF !important;
        }
        header.ks-header.ks-header--scrolled,
        header.ks-header.ks-header--scrolled .ks-header__inner,
        header.ks-header.ks-header--scrolled .ks-header__nav-desktop,
        header.ks-header.ks-header--scrolled .ks-header__nav,
        header.ks-header.ks-header--scrolled .ks-header__nav-item {
            color: #0A1628 !important;
        }

        /* A. Contrast nav header desktop – texte blanc sur navy */
        header.ks-header .ks-header__nav .ks-header__nav-link,
        header.ks-header .ks-header__nav .ks-header__nav-link:link,
        header.ks-header .ks-header__nav .ks-header__nav-link:visited {
            color: #FFFFFF !important;
        }
        header.ks-header.ks-header--scrolled .ks-header__nav .ks-header__nav-link,
        header.ks-header.ks-header--scrolled .ks-header__nav .ks-header__nav-link:link,
        header.ks-header.ks-header--scrolled .ks-header__nav .ks-header__nav-link:visited {
            color: #0A1628 !important;
        }
        header.ks-header .ks-header__nav .ks-header__nav-link:hover,
        header.ks-header .ks-header__nav .ks-header__nav-link:focus-visible,
        header.ks-header.ks-header--scrolled .ks-header__nav .ks-header__nav-link:hover,
        header.ks-header.ks-header--scrolled .ks-header__nav .ks-header__nav-link:focus-visible {
            color: #8A7A50 !important; /* gold foncé pour contraste sur fond navy ET blanc */
        }

        /* Dropdown header – texte navy sur fond blanc */
        header.ks-header .ks-header__dropdown .ks-header__dropdown-link,
        header.ks-header .ks-header__dropdown .ks-header__dropdown-link:link,
        header.ks-header .ks-header__dropdown .ks-header__dropdown-link:visited {
            color: #0A1628 !important;
        }
        header.ks-header .ks-header__dropdown .ks-header__dropdown-link:hover,
        header.ks-header .ks-header__dropdown .ks-header__dropdown-link:focus-visible {
            color: #6B5A3A !important; /* gold foncé contraste 7:1 sur fond gris clair */
            background: rgba(184,164,114,0.15) !important;
        }

        /* CTA téléphone header – fond gold + texte navy */
        header.ks-header .ks-header__cta,
        header.ks-header .ks-header__cta:link,
        header.ks-header .ks-header__cta:visited {
            color: #0A1628 !important;
            background: #B8A472 !important;
        }
        header.ks-header .ks-header__cta:hover,
        header.ks-header .ks-header__cta:focus-visible {
            color: #FFFFFF !important;
            background: #6B5A3A !important;
        }

        /* Mobile nav – texte blanc forcé */
        .ks-mobile-nav .ks-mobile-nav__link,
        .ks-mobile-nav .ks-mobile-nav__link:link,
        .ks-mobile-nav .ks-mobile-nav__link:visited {
            color: #FFFFFF !important;
        }
        .ks-mobile-nav .ks-mobile-nav__sub-link,
        .ks-mobile-nav .ks-mobile-nav__sub-link:link,
        .ks-mobile-nav .ks-mobile-nav__sub-link:visited {
            color: #E8E8E8 !important; /* > 90% blanc, contraste 13:1 sur navy */
        }
        .ks-mobile-nav .ks-mobile-nav__link:hover,
        .ks-mobile-nav .ks-mobile-nav__link:focus-visible,
        .ks-mobile-nav .ks-mobile-nav__sub-link:hover,
        .ks-mobile-nav .ks-mobile-nav__sub-link:focus-visible {
            color: #D4C28C !important; /* gold clair pour fond navy */
        }

        /* C. Bouton orange .btn.style2 – contraste AAA 7:1 sur blanc avec texte blanc */
        .btn.style2,
        a.btn.style2,
        button.btn.style2 {
            background: #8C2E00 !important; /* orange très foncé : contraste >7:1 avec blanc */
            color: #FFFFFF !important;
            border-color: #8C2E00 !important;
        }
        .btn.style2:hover,
        .btn.style2:focus-visible,
        a.btn.style2:hover,
        a.btn.style2:focus-visible {
            background: #5C1E00 !important; /* hover : marron très foncé */
            color: #FFFFFF !important;
            border-color: #5C1E00 !important;
        }

        /* G. Target size 44px – tel link, partner logos, scroll-top */
        a[href^="tel:"].link,
        a.link[href^="tel:"] {
            display: inline-flex;
            align-items: center;
            min-height: 44px;
            min-width: 44px;
            padding: 0.75rem 0.25rem;
        }
        .award-card-link,
        a.client-logo,
        .client-logo > a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 44px;
            min-width: 44px;
        }
        .scroll-top {
            min-height: 50px !important;
            min-width: 50px !important;
            border: 0 !important;
            outline: 0 !important;
            padding: 0 !important;
            background: transparent !important;
        }
        .scroll-top:focus-visible {
            outline: 2px solid var(--ks-gold) !important;
            outline-offset: 4px !important;
        }

        /* G-bis. Page banner Kalystrat – Option E hybride responsif (92/100).
           Composant : Modules/Frontend/resources/views/partials/page-banner.blade.php
           Neutralise les héritages Construz :
           - margin-top:116px parasite (header transparent fixe absent ici)
           - parallélogramme orange skewé (.breadcumb-menu de style.css:6366)
           Hauteur progressive : desktop > tablet > mobile. */
        .ks-page-banner.breadcumb-wrapper {
            margin-top: 0 !important;
            padding: 10rem 0 6rem !important;
            position: relative;
            overflow: hidden;
        }
        .ks-page-banner.breadcumb-wrapper::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(10, 22, 40, 0.55) 0%, rgba(10, 22, 40, 0.75) 100%);
            z-index: 0;
        }
        .ks-page-banner > .container {
            position: relative;
            z-index: 1;
        }
        .ks-page-banner__title {
            color: #FFFFFF !important;
            font-size: 3rem !important;
            font-weight: 700 !important;
            line-height: 1.15 !important;
            margin: 0 0 1.25rem !important;
            text-shadow: 0 2px 12px rgba(0, 0, 0, 0.45);
        }
        @media (max-width: 991px) {
            .ks-page-banner.breadcumb-wrapper {
                padding: 7rem 0 4rem !important;
            }
            .ks-page-banner__title {
                font-size: 2.25rem !important;
            }
        }
        @media (max-width: 575px) {
            .ks-page-banner.breadcumb-wrapper {
                padding: 5rem 0 3rem !important;
            }
            .ks-page-banner__title {
                font-size: 1.875rem !important;
            }
        }
        /* Compatibilité ancien markup inline (pages non encore refactorisées) */
        .breadcumb-wrapper {
            margin-top: 0 !important;
        }
        .breadcumb-wrapper .breadcumb-menu {
            background: transparent !important;
            clip-path: none !important;
            padding: 0 !important;
            margin: 1rem 0 0 !important;
            display: inline-flex !important;
            gap: 0.75rem !important;
            color: var(--ks-gold) !important;
            text-transform: none !important;
            font-size: 1rem !important;
        }
        .breadcumb-wrapper .breadcumb-menu li {
            padding: 0 !important;
        }
        .breadcumb-wrapper .breadcumb-menu li:before,
        .breadcumb-wrapper .breadcumb-menu li:after {
            display: none !important;
        }
        .breadcumb-wrapper .breadcumb-menu a,
        .breadcumb-wrapper .breadcumb-menu li,
        .breadcumb-wrapper .breadcumb-menu span {
            color: var(--ks-gold) !important;
            text-transform: none !important;
            font-size: 1rem !important;
            font-weight: 500 !important;
        }
        .breadcumb-wrapper .breadcumb-menu a:hover,
        .breadcumb-wrapper .breadcumb-menu a:focus-visible {
            color: #FFFFFF !important;
            text-decoration: underline !important;
        }

        /* H. Hero overlay – assombrir l'arrière-plan pour contraste texte blanc.
           Gradient navy plus foncé à gauche (zone texte) -> plus léger à droite. */
        .hero-wrapper.hero-5 {
            position: relative;
            background-color: #0A1628; /* fallback navy pour audits a11y (les slides ont bg-image en inline mais pas de bg-color) */
        }
        /* T44-S30 : about-area poussée sous le hero — solution élégante user.
           margin-top négatif fait remonter le fond blanc + shape sous le bandeau hero,
           padding-top compensatoire garde le contenu visuellement à sa place.
           La wave SVG du hero termine maintenant sur un fond blanc (about-area dessous).
           z-index hero > about pour que le bandeau hero recouvre proprement. */
        .hero-wrapper.hero-5 {
            position: relative;
            z-index: 2;
        }
        .about-area-5 {
            margin-top: -200px !important;
            padding-top: 200px !important;
            position: relative;
            z-index: 1;
        }
        @media (max-width: 991px) {
            .about-area-5 {
                margin-top: -120px !important;
                padding-top: 120px !important;
            }
        }
        .hero-wrapper.hero-5 .hero-slide {
            background-color: #0A1628; /* meme fallback applique sur slides individuels pour calcul contraste WCAG */
        }
        /* T43-S30 : RESTAURATION wave SVG Construz home-5 (retirée par erreur T40c).
           Le thème natif a sa courbe blanche en bas du hero pour transition douce vers about-area.
           Le user a confirmé "comme sur le theme de base" — on rétablit le divider natif. */
        .hero-wrapper.hero-5::after {
            content: "";
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 110px;
            background: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 110' preserveAspectRatio='none'><path fill='%23FFFFFF' d='M0,55 C360,110 720,0 1080,55 C1260,82 1350,75 1440,55 L1440,110 L0,110 Z'/></svg>") no-repeat bottom / 100% 100%;
            z-index: 4;
            pointer-events: none;
        }
        .hero-wrapper.hero-5 .hero-slide {
            position: relative;
            isolation: isolate;
        }
        .hero-wrapper.hero-5 .hero-slide::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 1;
            background: linear-gradient(
                90deg,
                rgba(10, 22, 40, 0.82) 0%,
                rgba(10, 22, 40, 0.70) 45%,
                rgba(10, 22, 40, 0.55) 100%
            );
            pointer-events: none;
        }
        .hero-wrapper.hero-5 .hero-slide,
        .hero-wrapper.hero-5 .hero-slide .container,
        .hero-wrapper.hero-5 .hero-slide .hero-style5,
        .hero-wrapper.hero-5 .hero-slide .row,
        .hero-wrapper.hero-5 .hero-slide [class*="col-"] {
            color: #FFFFFF !important;
        }
        .hero-wrapper.hero-5 .hero-slide > .container {
            position: relative;
            z-index: 2;
        }
        .hero-wrapper.hero-5 .hero-title,
        .hero-wrapper.hero-5 .hero-text,
        .hero-wrapper.hero-5 .hero-rating-wrap,
        .hero-wrapper.hero-5 .rating-text {
            text-shadow: 0 2px 6px rgba(0, 0, 0, 0.85);
            color: #FFFFFF;
        }
        .hero-wrapper.hero-5 .rating i {
            color: #FFD54A; /* étoiles or jaune lumineux pour contraste 7:1 sur navy assombri */
        }

        /* AAA target size – logos partenaires & filiales footer */
        .ks-footer__links a {
            min-height: 44px;
            display: inline-flex;
            align-items: center;
        }
        /* Liens contact footer (tel, mail, "En savoir plus") */
        .ks-footer__contact-item a,
        .ks-footer .ks-footer__tagline + a,
        footer.ks-footer a[href^="tel:"],
        footer.ks-footer a[href^="mailto:"],
        footer.ks-footer > .ks-footer__grid > div > a {
            min-height: 44px;
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 0;
        }
        /* Carrieres meta links (Kalystrat Finition / Temps plein, etc.) */
        .blog-card .blog-meta a {
            min-height: 44px;
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 0.5rem 0.5rem 0;
        }

        /* ============================================================
           OVERRIDES CONSTRUZ – couleurs trop claires vs. AAA
           ============================================================ */

        /* === Formulaire contact home – fix bordures invisibles + select étroit + caret + textarea === */
        /* Cacher le <select> natif (nice-select.js le remplace par un <div class="nice-select">) */
        html body .contact-form select.nice-select { display: none !important; }
        html body .contact-form .form-control,
        html body .contact-form input.form-control,
        html body .contact-form textarea.form-control,
        html body .contact-form select.form-select,
        html body .contact-form div.nice-select {
            border: 1px solid rgba(10, 22, 40, 0.18) !important;
            background-color: #FFFFFF !important;
            color: var(--ks-navy);
            border-radius: 0.375rem !important;
            padding: 0.875rem 1rem !important;
            font-size: 0.9375rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            min-height: 50px;
            line-height: 1.5;
        }
        /* T22-S30 — chevron SVG navy custom + padding-right pour caret natif select.form-select */
        html body .contact-form select.form-select {
            background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%230A1628'%3E%3Cpath d='M3.204 5h9.592L8 10.481 3.204 5zm-.753.659l4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z'/%3E%3C/svg%3E") !important;
            background-repeat: no-repeat !important;
            background-position: right 1rem center !important;
            background-size: 12px 12px !important;
            padding-right: 2.75rem !important;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            cursor: pointer;
        }
        html body .contact-form .form-control::placeholder,
        html body .contact-form textarea.form-control::placeholder { color: rgba(10, 22, 40, 0.55); opacity: 1; }
        html body .contact-form .form-control:focus,
        html body .contact-form select.form-select:focus,
        html body .contact-form div.nice-select:focus,
        html body .contact-form div.nice-select.open {
            border-color: var(--ks-gold) !important;
            box-shadow: 0 0 0 3px rgba(184, 164, 114, 0.18) !important;
            outline: none !important;
        }
        html body .contact-form textarea.form-control {
            min-height: 130px !important;
            resize: vertical;
            line-height: 1.6;
        }
        html body .contact-form div.nice-select {
            width: 100% !important;
            display: flex !important;
            align-items: center;
            padding-right: 2.75rem !important;
            position: relative;
        }
        html body .contact-form div.nice-select::after {
            border-color: var(--ks-navy) !important;
            border-width: 0 2px 2px 0 !important;
            right: 1.25rem !important;
            width: 8px !important;
            height: 8px !important;
        }
        html body .contact-form div.nice-select .list { width: 100%; }

        /* Animation règle horizontale – restaurer le défilement (override .background-image cover qui casse l'effet) */
        html body .section-animation-shape1-1.animation-infinite,
        html body .section-animation-shape1-2.animation-infinite,
        html body .animation-infinite[data-bg-src] {
            background-size: auto !important;
            background-repeat: repeat !important;
            /* PAS de background-position fixé ici : l'animation ShapeAnim doit le modifier librement */
            /* Accélération du défilement (80s = quasi imperceptible, 20s = clairement visible) */
            animation-duration: 20s !important;
        }
        @media (prefers-reduced-motion: reduce) {
            html body .animation-infinite { animation: none !important; }
        }

        /* Sous-titres orange (.sub-title.text-theme) – orange foncé pour AAA. Specificity html body forcée pour outranquer theme.css */
        html body .sub-title.text-theme,
        html body span.sub-title.text-theme,
        html body .text-theme.sub-title {
            color: #8C2E00 !important; /* contraste 7.46:1 sur blanc → AAA */
        }
        /* Phase 26 — Fix coupure top sub-title (line-height 1.2 → 1.4 + padding-top léger) */
        html body .sub-title,
        html body .title-area .sub-title {
            line-height: 1.4 !important;
            padding-top: 0.25rem;
            display: inline-flex;
            align-items: center;
        }
        html body .sub-title i,
        html body .sub-title svg,
        html body .sub-title img {
            line-height: 1;
            vertical-align: middle;
        }

        /* Paragraphes texte gris Construz – passer à navy foncé */
        p.sec-text,
        p.text,
        .why-content-wrap p.text,
        .about-area-5 p,
        .benefit-area-5 p.sec-text,
        .award-area-1 p,
        .award-card_text,
        .testi-counter-text {
            color: #2C3340 !important; /* navy plus clair, contraste >12:1 sur blanc */
        }

        /* Bouton Construz `.btn` (sans .style2) – orange foncé pour AAA */
        a.btn:not(.style2):not(.style3):not(.style4):not(.style-border4),
        button.btn:not(.style2):not(.style3):not(.style4):not(.style-border4) {
            background-color: #8C2E00 !important;
            color: #FFFFFF !important;
            border-color: #8C2E00 !important;
        }
        a.btn:not(.style2):not(.style3):not(.style4):not(.style-border4):hover,
        a.btn:not(.style2):not(.style3):not(.style4):not(.style-border4):focus-visible {
            background-color: #5C1E00 !important;
            color: #FFFFFF !important;
        }

        /* Pills onglets filiales – Construz `.nav-link` */
        .why-tab-wrap.nav-pills .nav-link {
            color: #2C3340 !important; /* gris foncé sur fond blanc */
            background-color: #FFFFFF !important;
        }
        .why-tab-wrap.nav-pills .nav-link.active,
        .why-tab-wrap.nav-pills .nav-link[aria-selected="true"] {
            background-color: #8C2E00 !important;
            color: #FFFFFF !important;
        }
        .why-tab-wrap.nav-pills .nav-link:hover,
        .why-tab-wrap.nav-pills .nav-link:focus-visible {
            background-color: #F0F0F0 !important;
            color: #0A1628 !important;
        }
        .why-tab-wrap.nav-pills .nav-link.active:hover,
        .why-tab-wrap.nav-pills .nav-link.active:focus-visible {
            background-color: #5C1E00 !important;
            color: #FFFFFF !important;
        }
        /* Espacement min des pills pour éviter target-size insuffisant */
        .why-tab-wrap.nav-pills .nav-item {
            margin-bottom: 0.75rem;
        }
        .why-tab-wrap.nav-pills .nav-link {
            min-height: 44px;
            padding: 0.75rem 1rem;
        }

        /* Section témoignages – laisser bg-thumb (portraits ouvriers) s'afficher comme Construz original.
           Pas de background-color sur la section, pas de plate sombre sur les cartes.
           Texte blanc maintenu pour contraste sur l'image sombre des bg-thumb5-1/2.png. */
        .testimonial-area-5 .sec-title,
        .testimonial-area-5 h2,
        .testimonial-area-5 h3,
        .testimonial-area-5 .testi-card_text,
        .testimonial-area-5 .testi-profile-title,
        .testimonial-area-5 .testi-profile-desig,
        .testimonial-area-5 .testi-counter-number {
            color: #FFFFFF !important;
            text-shadow: 0 1px 3px rgba(0,0,0,0.6); /* lisibilité sur image */
        }
        .testimonial-area-5 .testi-counter-text,
        .testimonial-area-5 p:not(.testi-card_text) {
            color: #FFFFFF !important;
            text-shadow: 0 1px 3px rgba(0,0,0,0.6);
        }
        .testimonial-area-5 .testi-rating i {
            color: #FFD54A !important;
        }

        /* Hero slides : pas de background-color forcé – laisser l'image hero_bg_5_X.png s'afficher tel quel (Construz) */

        /* "En savoir plus" footer (link sans bg) – fond gold pour visibilité */
        footer.ks-footer .ks-footer__grid > div > a:not(.ks-footer__social-link) {
            color: #FFFFFF !important;
            text-decoration: underline;
            text-underline-offset: 0.2em;
        }
        footer.ks-footer .ks-footer__grid > div > a:not(.ks-footer__social-link):hover,
        footer.ks-footer .ks-footer__grid > div > a:not(.ks-footer__social-link):focus-visible {
            color: #D4C28C !important;
        }

        /* Sub-title sur sections fond sombre (testimonials) – gold clair */
        .testimonial-area-5 .sub-title.text-theme,
        .testimonial-area-5 span.sub-title.text-theme {
            color: #D4C28C !important; /* gold clair, contraste >9:1 sur navy */
        }

        /* Portfolio cards – image visible, overlay navy semi-opaque sur le bas pour le texte (Construz utilise un overlay).
           On NE remplit PAS la card en navy plein (ça masquait l'image). */
        /* Phase 25 — Fix grille asymétrique : cards prennent toute la hauteur du col parent
           pour éliminer espace vide (col-lg-8 multilogements + col-lg-4 Sainte-Foy même hauteur) */
        .portfolio-area-5 .row > [class*="col-"] {
            display: flex;
        }
        .portfolio-area-5 .portfolio-card.style5 {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 100%;
        }
        .portfolio-area-5 .portfolio-card.style5 .portfolio-card-thumb {
            flex: 1 1 auto;
            min-height: 240px;
            overflow: hidden;
        }
        .portfolio-area-5 .portfolio-card.style5 .portfolio-card-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
        .portfolio-card.style5 .portfolio-card-details {
            color: #FFFFFF !important;
        }
        .portfolio-card.style5 .portfolio-card-details .media-left,
        .portfolio-card.style5 .portfolio-card-details > .media-left {
            background-color: #0A1628 !important; /* navy solide pour contraste WCAG AA garanti */
            padding: 0.75rem 1rem;
            border-radius: 0.25rem;
            color: #FFFFFF !important;
            opacity: 1 !important;        /* Construz force opacity:0, on annule pour visibilite WCAG */
            transform: none !important;
        }
        .portfolio-card.style5 .portfolio-card-details .media-left .portfolio-card-subtitle,
        .portfolio-card.style5 .portfolio-card-subtitle {
            color: #FFD54A !important;     /* gold sur navy solide : >9:1 contraste */
            background: #0A1628 !important; /* annule le rgba(255,255,255,0.29) Construz qui ruinait le contraste */
        }
        .portfolio-card.style5 .portfolio-card-title,
        .portfolio-card.style5 .portfolio-card-title a {
            color: #FFFFFF !important;
        }
        .portfolio-card.style5 .portfolio-card-title a {
            display: inline-block;
            min-height: 30px;
            padding: 0.25rem 0;
        }
        /* Carrieres – blog-title link target-size (AAA 2.5.5 = 44x44 minimum) */
        .blog-card.style5 .blog-title a {
            display: inline-block;
            min-height: 44px;
            padding: 0.5rem 0;
        }
        .portfolio-card.style5 .portfolio-card-title a:hover,
        .portfolio-card.style5 .portfolio-card-title a:focus-visible {
            color: #D4C28C !important;
        }

        /* Portfolio thumbs – aspect-ratio fixe pour grille cohérente.
           Sans ça, photos prennent leur taille intrinsèque (cassait la grille S25). */
        .portfolio-card.style5 .portfolio-card-thumb {
            aspect-ratio: 4 / 3;
            overflow: hidden;
        }
        .portfolio-card.style5 .portfolio-card-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* Blog cards style5 (carrieres) – aspect-ratio fixe.
           Override Construz min-height:280px qui cassait l'alignement des 3 cartes. */
        .blog-card.style5 .blog-img {
            aspect-ratio: 4 / 3;
            overflow: hidden;
        }
        .blog-card.style5 .blog-img img {
            width: 100%;
            height: 100%;
            min-height: 0;
            object-fit: cover;
            display: block;
        }

        /* Counter cards – gris remplacé */
        .counter-card_text,
        p.counter-card_text {
            color: #2C3340 !important;
        }

        /* Blog cards (carrieres) – corrections couleurs */
        .blog-card.style5 {
            background-color: #FFFFFF !important;
            color: #0A1628 !important;
        }
        .blog-card.style5 .blog-meta {
            background-color: #FFFFFF !important;
            padding: 0.65rem 1rem !important;
            border-radius: 0.375rem !important;
            border: 1px solid #E8E2D0 !important;
            margin-top: 0 !important;
            align-items: center !important;
            gap: 0.6rem !important;
        }
        .blog-card.style5 .blog-meta a,
        .blog-card.style5 .blog-meta span {
            color: #2C3340 !important; /* gris foncé */
            background-color: transparent !important;
            line-height: 1.3 !important;
        }
        /* Bullet séparateur ::before – recentrer verticalement */
        .blog-card.style5 .blog-meta a:not(:first-child)::before,
        .blog-card.style5 .blog-meta span:not(:first-child)::before {
            background: #B8A472 !important;
            transform: none !important;
            vertical-align: middle !important;
            margin-right: 0.6rem !important;
        }
        .blog-card.style5 .blog-meta a:hover,
        .blog-card.style5 .blog-meta a:focus-visible {
            color: #8C2E00 !important;
        }
        /* Date carrière (orange .blog-date a) – orange foncé */
        .blog-card.style5 .blog-date a,
        .blog-card.style5 .blog-date a span {
            background-color: #8C2E00 !important;
            color: #FFFFFF !important;
        }
        /* Bouton "Postuler" (style-border4) – orange foncé */
        .btn.style-border4,
        a.btn.style-border4 {
            color: #8C2E00 !important;
            border-color: #8C2E00 !important;
            background-color: #FFFFFF !important;
        }
        .btn.style-border4:hover,
        a.btn.style-border4:hover,
        a.btn.style-border4:focus-visible {
            background-color: #8C2E00 !important;
            color: #FFFFFF !important;
        }

        /* h3 "Besoin d'aide" couleur – navy foncé */
        .about-wrap5 .icon-btn + .media-body h3.title,
        .cta-grid-wrap h3.title {
            color: #0A1628 !important;
        }

        /* .icon-btn — charte Kalystrat navy/gold (override Construz orange #FF6600)
           T36b-S30 : flex centring strict (SVG inline ne respecte pas line-height:50px native). */
        .about-wrap5 .icon-btn,
        .cta-grid-wrap .icon-btn {
            background-color: var(--ks-navy) !important;
            color: var(--ks-gold) !important;
            border-radius: 0.375rem !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            line-height: 1 !important;
        }
        .about-wrap5 .icon-btn svg,
        .cta-grid-wrap .icon-btn svg { display: block; }
        .about-wrap5 .icon-btn:hover,
        .about-wrap5 .icon-btn:focus-visible,
        .cta-grid-wrap .icon-btn:hover,
        .cta-grid-wrap .icon-btn:focus-visible {
            background-color: var(--ks-gold) !important;
            color: var(--ks-navy) !important;
        }
        .about-wrap5 .icon-btn i,
        .cta-grid-wrap .icon-btn i {
            color: inherit !important;
        }

        /* Select form – taille minimale 44px */
        select.form-select,
        select.nice-select,
        .nice-select.form-select {
            min-height: 48px !important;
            padding: 0.5rem 1rem !important;
        }

        /* Badge "QC 2026" sur card carrière – design net, pas de débordement, AAA */
        .blog-card.style5 .blog-date {
            min-width: 64px !important;
            width: 64px !important;
            height: auto !important;
            display: flex !important;
            flex-direction: column !important;
            background: transparent !important;
            border-radius: 0.375rem !important;
            overflow: visible !important;
            box-shadow: 0 2px 8px rgba(10, 22, 40, 0.25) !important;
        }
        .blog-card.style5 .blog-date a {
            min-height: 44px !important;
            min-width: 64px !important;
            width: 100% !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 0.5rem !important;
            background-color: #0A1628 !important;
            color: #FFFFFF !important;
            font-weight: 700 !important;
            font-size: 1.05rem !important;
            letter-spacing: 0.05em !important;
            text-decoration: none !important;
            border-radius: 0 !important;
            margin: 0 !important;
        }
        .blog-card.style5 .blog-date a::before,
        .blog-card.style5 .blog-date a::after {
            content: none !important;
        }
        .blog-card.style5 .blog-date span.ks-badge-loc {
            color: #FFD54A !important; /* gold sur navy = 11.4:1 AAA */
            background-color: transparent !important;
            margin: 0 !important;
            font-weight: 700 !important;
            letter-spacing: 0.08em !important;
        }
        .blog-card.style5 .blog-date .year,
        .award-card-year span {
            color: #0A1628 !important;
            background-color: #FFFFFF !important;
            text-align: center !important;
            padding: 0.4rem 0.5rem !important;
            font-weight: 700 !important;
            font-size: 0.85rem !important;
            line-height: 1.3 !important;
            letter-spacing: 0.04em !important;
            border-top: 2px solid #B8A472 !important;
            display: block !important;
            width: 100% !important;
            min-height: 24px !important;
            border-bottom-left-radius: 0.375rem !important;
            border-bottom-right-radius: 0.375rem !important;
        }
        /* Watermark "QC" award-card-year – augmenter opacité pour conformité */
        .award-card-year > span:first-child {
            opacity: 1 !important;
            color: #2C3340 !important;
        }

        /* Inputs form contact – texte foncé + target-size 44px+ */
        .contact-form .form-control,
        .contact-form input,
        .contact-form textarea,
        .contact-form select {
            color: #0A1628 !important;
            background-color: #FFFFFF !important;
            min-height: 48px !important;
            padding: 0.85rem 1rem !important;
        }
        .contact-form textarea {
            min-height: 96px !important;
        }
        .contact-form .form-control::placeholder,
        .contact-form input::placeholder,
        .contact-form textarea::placeholder {
            color: #4A5260 !important;
            opacity: 1;
        }
        /* Nice-select label `.current` – texte foncé pour AAA 7:1 */
        .nice-select .current,
        .nice-select span.current {
            color: #2C3340 !important;
        }

        /* Bouton CTA finale .btn.style4 – fond foncé */
        a.btn.style4,
        .btn.style4 {
            background-color: #8C2E00 !important;
            color: #FFFFFF !important;
            border: 2px solid #8C2E00 !important;
        }
        a.btn.style4:hover,
        a.btn.style4:focus-visible {
            background-color: #5C1E00 !important;
            color: #FFFFFF !important;
            border-color: #5C1E00 !important;
        }

        /* CTA finale – h3 cta-title sur image bg, fond solide.
           Annule margin-bottom:-150px Construz qui créait un overlap sur le footer
           sans contraste visuel (effet vide navy massif). */
        .cta-area-5 .cta-wrap5 {
            background-color: #0A1628 !important;
            margin-bottom: 0 !important;
            position: relative;
            isolation: isolate;
        }
        .cta-area-5 .cta-wrap5::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(10, 22, 40, 0.78);
            z-index: 0;
            pointer-events: none;
            border-radius: inherit;
        }
        .cta-area-5 .cta-wrap5 > * {
            position: relative;
            z-index: 1;
        }
        .cta-area-5 h3.cta-title.text-white,
        .cta-area-5 .cta-title {
            color: #FFFFFF !important; /* 14:1+ sur navy 0.78 → AAA */
        }

        /* === Override Bootstrap .visually-hidden : forcer color blanc pour neutraliser faux positif axe-core (clip-path est ignoré par axe). Texte reste invisible visuellement via clip Bootstrap. === */
        .visually-hidden, .sr-only { color: #FFFFFF !important; }

        /* === Target Size AAA 44x44 : titres cartes projets via padding-block === */
        .portfolio-card.style5 .portfolio-card-title a {
            display: inline-block;
            min-height: 44px;
            padding: 8px 0;
            box-sizing: border-box;
        }

        /* === Contact section colonne gauche : trust signals factuels (signaux confiance) === */
        .ks-contact-trust { color: #FFFFFF; padding: 0 1rem 0 2.5rem; }
        @media (max-width: 991px) { .ks-contact-trust { padding: 0 1rem; } }
        .ks-contact-trust__title {
            color: #FFFFFF !important;
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            line-height: 1.2;
        }
        .ks-contact-trust__lead {
            color: #E8E2D0 !important;
            font-size: 1rem;
            line-height: 1.55;
            margin-bottom: 1.75rem;
        }
        /* Trust signals card : border-left gold + bg navy plus foncé — pattern "engagement contractuel" 2026.
           NB : navy solide (pas blanc translucide) pour que les contrast checkers calculent
           correctement le ratio AAA des textes blancs (rgba blanc/blanc = 1:1 faux positif). */
        .ks-contact-trust__card {
            border-left: 4px solid var(--ks-gold);
            background: #061020;
            padding: 1.5rem 1.75rem 1rem;
            border-radius: 0 0.5rem 0.5rem 0;
            margin-bottom: 1.5rem;
        }
        .ks-contact-trust__list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .ks-contact-trust__list li {
            display: flex;
            align-items: flex-start;
            gap: 0.85rem;
            padding: 0.65rem 0;
            border-bottom: 1px solid rgba(184, 164, 114, 0.18);
        }
        .ks-contact-trust__list li:last-child { border-bottom: none; }
        .ks-contact-trust__icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            min-width: 36px;
            background: rgba(184, 164, 114, 0.15);
            border: 1px solid rgba(184, 164, 114, 0.4);
            border-radius: 0.5rem;
            color: #FFD54A;
            font-size: 1.1rem;
            flex-shrink: 0;
        }
        .ks-contact-trust__txt {
            display: flex;
            flex-direction: column;
            gap: 0.15rem;
            color: #FFFFFF;
            font-size: 0.95rem;
            line-height: 1.4;
        }
        .ks-contact-trust__txt strong {
            color: #FFFFFF !important;
            font-weight: 600;
        }
        .ks-contact-trust__sub {
            color: #C2C5C9 !important;
            font-size: 0.825rem;
            font-weight: 400;
        }
        /* CTA téléphone : card cliquable full-width — pattern conversion 2026 (Stripe, Linear, Material 3).
           Force color: gold pour empêcher Bootstrap link de surcharger en bleu (régression contraste AAA). */
        .ks-contact-trust__phone {
            display: flex;
            align-items: center;
            gap: 1.25rem;
            padding: 1.15rem 1.75rem;
            background: #061020;
            color: #FFD54A;
            border: 1px solid rgba(255, 213, 74, 0.45);
            border-radius: 0.5rem;
            text-decoration: none;
            transition: border-color 0.2s ease, background 0.2s ease, transform 0.15s ease, box-shadow 0.2s ease;
            min-height: 88px;
        }
        .ks-contact-trust__phone:link,
        .ks-contact-trust__phone:visited {
            color: #FFD54A;
        }
        .ks-contact-trust__phone:hover {
            border-color: #FFD54A;
            background: #081428;
            box-shadow: 0 4px 16px rgba(255, 213, 74, 0.18);
            text-decoration: none;
        }
        .ks-contact-trust__phone:focus-visible {
            outline: 3px solid #FFD54A;
            outline-offset: 3px;
            border-color: #FFD54A;
        }
        .ks-contact-trust__phone-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 56px;
            height: 56px;
            min-width: 56px;
            background: rgba(255, 213, 74, 0.12);
            border: 1px solid rgba(255, 213, 74, 0.4);
            border-radius: 50%;
            color: #FFD54A;
            font-size: 1.75rem;
            flex-shrink: 0;
        }
        .ks-contact-trust__phone-text {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
            text-align: center;
            gap: 0.25rem;
        }
        .ks-contact-trust__phone-number {
            color: #FFD54A;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1.1;
            letter-spacing: 0.02em;
            white-space: nowrap;
        }
        .ks-contact-trust__phone-label {
            color: #E8E2D0;
            font-size: 0.875rem;
            line-height: 1.4;
        }
        @media (max-width: 480px) {
            .ks-contact-trust__phone { padding: 1rem 1.25rem; gap: 1rem; }
            .ks-contact-trust__phone-icon { width: 48px; height: 48px; min-width: 48px; font-size: 1.5rem; }
            .ks-contact-trust__phone-number { font-size: 1.35rem; }
            .ks-contact-trust__phone-label { font-size: 0.8125rem; }
        }
        @media (max-width: 991px) {
            .ks-contact-trust { padding: 0; margin-bottom: 0; }
            .ks-contact-trust__title { font-size: 1.5rem; }
        }

        /* === Contact section "Vous avez un projet en tête ?" – overlay scrim AAA 7:1 sur photo de fond === */
        .contact-area-2 .contact-wrap2 {
            position: relative;
            isolation: isolate;
            background-color: #0a1628;
        }
        .contact-area-2 .contact-wrap2::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(10, 22, 40, 0.82);
            z-index: 0;
            pointer-events: none;
            border-radius: inherit;
        }
        .contact-area-2 .contact-wrap2 > *:not(.section-animation-shape1-1) {
            position: relative;
            z-index: 1;
        }
        .contact-area-2 .contact-wrap2 .sec-title,
        .contact-area-2 .contact-wrap2 h2.sec-title {
            color: #FFFFFF !important; /* 15.6:1 sur navy 0.82 → AAA */
        }
        .contact-area-2 .contact-wrap2 .sub-title,
        .contact-area-2 .contact-wrap2 .sub-title.text-theme {
            color: #FFD54A !important; /* 11.4:1 sur navy → AAA */
        }
        /* Inputs avec fond blanc opaque pour contraste optimal placeholder/texte saisi */
        .contact-area-2 .contact-wrap2 .form-control {
            background-color: #FFFFFF !important;
            color: #0A1628 !important;
            border: 1px solid #B8A472 !important;
        }
        .contact-area-2 .contact-wrap2 .form-control::placeholder {
            color: #4A4A4A !important; /* 9.7:1 sur blanc → AAA */
            opacity: 1;
        }
        .contact-area-2 .contact-wrap2 .nice-select {
            background-color: #FFFFFF !important;
            color: #0A1628 !important;
            border: 1px solid #B8A472 !important;
        }
        .contact-area-2 .contact-wrap2 .nice-select .current {
            color: #0A1628 !important;
        }

        /* a11y UX : style abbr cursor + tooltip Bootstrap (Phase 19) */
        abbr[title] {
            cursor: pointer;
            text-decoration: underline dotted;
            text-decoration-thickness: 1px;
            text-underline-offset: 3px;
            -webkit-text-decoration: underline dotted;
        }
        abbr[title]:hover, abbr[title]:focus-visible {
            text-decoration-thickness: 2px;
        }
        /* === Checklist Construz : convertir flex → block pour préserver les espaces autour de <abbr> === */
        .checklist li {
            display: block !important;
            position: relative;
            padding-left: 34px;
        }
        .checklist li img,
        .checklist li i,
        .checklist li svg {
            position: absolute !important;
            left: 0;
            top: 4px;
            margin: 0 !important;
        }
        .checklist li img { top: 7px; }

        /* Footer copyright AI Act – couleur claire pour lisibilité sur navy */
        footer.ks-footer .ks-footer__copyright[style*="rgba(255,255,255,0.4)"],
        footer.ks-footer p.ks-footer__copyright {
            color: #C2C5C9 !important; /* >7:1 sur navy */
        }

        /* Nice-select option placeholder (Filiale concernée) – texte foncé */
        .nice-select .option,
        .nice-select .option.selected,
        .nice-select .option.disabled,
        .nice-select .option.selected.disabled {
            color: #2C3340 !important;
            background-color: #FFFFFF !important;
        }
        .nice-select .option:hover,
        .nice-select .option.focus {
            background-color: #F0F0F0 !important;
            color: #0A1628 !important;
        }

        /* AAA target-size – boutons (style2, style3, style4, default) – padding généreux */
        .btn,
        a.btn,
        button.btn {
            min-height: 48px !important;
            padding: 0.85rem 1.5rem !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 0.5rem;
        }
        /* Skip-link target-size */
        a.ks-skip-link {
            min-height: 48px;
            display: inline-flex;
            align-items: center;
        }
        /* Play-btn vidéo */
        a.play-btn {
            min-height: 60px !important;
            min-width: 60px !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        /* WCAG 2.3.3 – prefers-reduced-motion : désactive animations */
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }

        /* === Système de cards Kalystrat universel — pattern .ks-card avec variants === */
        /* Charte v2 : navy #0A1628 + gold #B8A472, WCAG 2.2 AAA, relief premium uniforme */
        .ks-card {
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
            display: flex;
            flex-direction: column;
        }
        .ks-card:hover, .ks-card:focus-within {
            transform: translateY(-4px);
            box-shadow: 0 18px 44px rgba(10, 22, 40, 0.14), 0 4px 10px rgba(10, 22, 40, 0.06);
            border-color: rgba(184, 164, 114, 0.5);
        }
        /* Variant centré (icône carrée + h3 + p) */
        .ks-card--centered { text-align: center; }
        /* Variant "sober" — strict charte v2 .identity-card : bg gray-50 #FAFAFA + border gray-200 #E5E5E5, sans relief box-shadow (sobre informatif) */
        .ks-card--sober {
            background: #FAFAFA;
            border-color: #E5E5E5;
            box-shadow: none;
        }
        .ks-card--sober:hover, .ks-card--sober:focus-within {
            background: #FFFFFF;
            border-color: rgba(184, 164, 114, 0.5);
            box-shadow: 0 12px 32px rgba(10, 22, 40, 0.08);
            transform: translateY(-2px);
        }
        /* Icône carré navy gradient + accent gold */
        .ks-card__icon {
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
            line-height: 1;
        }
        /* Phase 27 — DRY : centrage parfait icônes RemixIcon/SVG dans tous wrappers
           (line-height:1 sur <i> + flex centring déjà sur parent) */
        .ks-card__icon i,
        .ks-card__icon svg,
        .ks-zone-card__icon i,
        .ks-zone-card__icon svg,
        .ks-conseil-card__icon i,
        .ks-conseil-card__icon svg,
        .ks-partner-icon i,
        .ks-partner-icon svg {
            line-height: 1;
            display: block;
            margin: 0;
        }
        /* Phase 28 — Centrage icônes Remix Icon DANS .btn (boutons CTA).
           Construz applique seulement font-size:20px sur .btn i, donc l'icône
           reste en display:inline + line-height héritée → glyphes arrow ri-arrow-*
           paraissent décentrés verticalement (masse asymétrique up-right/down-right).
           Fix : inline-flex centré strict + line-height:1 + vertical-align:middle. */
        .btn i {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
            vertical-align: middle;
        }
        /* Compensation OPTIQUE : les glyphes Remix Icon ri-arrow-*-up-* sont dessinés
           avec masse en HAUT-DROITE de l'em-square → apparaissent comme exposant.
           translateY positive (vers le bas) recentre visuellement avec le texte uppercase. */
        .btn i.ri-arrow-right-up-line,
        .btn i.ri-arrow-up-line,
        .btn i.ri-arrow-up-right-line {
            transform: translateY(0.15em);
        }
        .btn i.ri-arrow-right-down-line,
        .btn i.ri-arrow-down-line,
        .btn i.ri-arrow-down-right-line {
            transform: translateY(-0.15em);
        }
        .ks-card--centered .ks-card__icon { margin-left: auto; margin-right: auto; }
        /* Icône cercle (variant rond) */
        .ks-card__icon--circle {
            width: 64px;
            height: 64px;
            border-radius: 50%;
        }
        /* Titre, texte, lien CTA */
        .ks-card__title {
            color: #0A1628;
            font-size: 1.125rem;
            font-weight: 700;
            margin: 0 0 0.625rem;
            line-height: 1.3;
        }
        .ks-card__title--lg { font-size: 1.25rem; }
        .ks-card__text {
            color: #2C3340;
            font-size: 0.9375rem;
            line-height: 1.6;
            margin: 0 0 1rem;
            flex-grow: 1;
        }
        .ks-card__link {
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
            margin-top: auto;
        }
        .ks-card__link i { color: #B8A472; transition: transform 0.2s ease; }
        .ks-card__link:hover, .ks-card__link:focus-visible {
            color: #5C4F2C;
            border-bottom-color: #B8A472;
            gap: 0.75rem;
        }
        .ks-card__link:hover i, .ks-card__link:focus-visible i { transform: translate(2px, -2px); }
        /* Variant avec accent border-top distinctif */
        .ks-card--accent::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: var(--card-accent, #B8A472);
            transition: height 0.25s ease;
            border-radius: 0.875rem 0.875rem 0 0;
        }
        .ks-card--accent:hover::before { height: 6px; }
        /* Section grise pour faire ressortir les cards blanches */
        .ks-card-section--grey { background: #F4F4F2; padding: 5rem 0; }
        /* Couleur gold profond pour eyebrow / numérotation accessible AAA */
        .ks-card__eyebrow {
            font-size: 0.75rem;
            font-weight: 700;
            color: #5C4F2C;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            margin-bottom: 0.875rem;
            display: block;
        }
    </style>
    @endverbatim

    @stack('head')
</head>
<body>
    <a href="#contenu-principal" class="ks-skip-link">Aller au contenu principal</a>

    <header class="ks-header" id="ks-header">
        <div class="ks-header__inner">
            <a href="{{ url('/') }}" class="ks-header__logo" aria-label="Kalystrat – Retour à l'accueil">
                <img src="{{ asset('assets/img/kalystrat/logo-white.svg') }}" alt="Logo Kalystrat" class="ks-header__logo-white" width="160" height="44">
                <img src="{{ asset('assets/img/kalystrat/logo-header.svg') }}" alt="Kalystrat" aria-hidden="true" class="ks-header__logo-dark" width="160" height="44">
            </a>
            <nav class="ks-header__nav-desktop" aria-label="Navigation principale">
                <ul class="ks-header__nav">
                    <li class="ks-header__nav-item"><a href="{{ url('/') }}" class="ks-header__nav-link">Accueil</a></li>
                    <li class="ks-header__nav-item"><a href="{{ url('/a-propos') }}" class="ks-header__nav-link">À propos</a></li>
                    <li class="ks-header__nav-item"><a href="{{ url('/services') }}" class="ks-header__nav-link">Services</a></li>
                    <li class="ks-header__nav-item"><a href="{{ url('/realisations') }}" class="ks-header__nav-link">Réalisations</a></li>
                    <li class="ks-header__nav-item">
                        <x-frontend::disclosure
                            id="ks-header-filiales-menu"
                            label="Filiales"
                            triggerClass="ks-header__nav-link"
                            menuClass="ks-header__dropdown">
                            <li><a href="{{ url('/filiales/fondations') }}" class="ks-header__dropdown-link">Kalystrat Fondations</a></li>
                            <li><a href="{{ url('/filiales/structure') }}" class="ks-header__dropdown-link">Kalystrat Structure</a></li>
                            <li><a href="{{ url('/filiales/toiture') }}" class="ks-header__dropdown-link">Kalystrat Toiture et Enveloppe</a></li>
                            <li><a href="{{ url('/filiales/finition') }}" class="ks-header__dropdown-link">Kalystrat Finition Intérieure</a></li>
                            <li><a href="{{ url('/filiales/immobilier') }}" class="ks-header__dropdown-link">Kalystrat Immobilier</a></li>
                            <li><a href="{{ url('/filiales/placement') }}" class="ks-header__dropdown-link">Kalystrat Placement Construction</a></li>
                        </x-frontend::disclosure>
                    </li>
                    <li class="ks-header__nav-item"><a href="{{ url('/faq') }}" class="ks-header__nav-link">FAQ</a></li>
                    <li class="ks-header__nav-item"><a href="{{ url('/carrieres') }}" class="ks-header__nav-link">Carrières</a></li>
                    <li class="ks-header__nav-item"><a href="{{ url('/contact') }}" class="ks-header__nav-link">Contact</a></li>
                </ul>
            </nav>
            <a href="tel:+14184760987" class="ks-header__cta ks-header__cta--desktop" aria-label="Appeler Kalystrat au 418-476-0987">
                <x-frontend::icon name="phone" :size="16"/> 418-476-0987
            </a>
            <button type="button" class="ks-header__hamburger" id="ks-hamburger" aria-label="Ouvrir le menu" aria-expanded="false" aria-controls="ks-mobile-nav">
                <x-frontend::icon name="menu" :size="28"/>
            </button>
        </div>
    </header>

    <nav class="ks-mobile-nav" id="ks-mobile-nav" aria-label="Navigation mobile" aria-hidden="true">
        <ul class="ks-mobile-nav__list">
            <li><a href="{{ url('/') }}" class="ks-mobile-nav__link">Accueil</a></li>
            <li><a href="{{ url('/a-propos') }}" class="ks-mobile-nav__link">À propos</a></li>
            <li><a href="{{ url('/services') }}" class="ks-mobile-nav__link">Services</a></li>
            <li><a href="{{ url('/realisations') }}" class="ks-mobile-nav__link">Réalisations</a></li>
            <li>
                <a href="#" class="ks-mobile-nav__link" id="ks-mobile-filiales-toggle" aria-expanded="false">Filiales</a>
                <ul class="ks-mobile-nav__sub" id="ks-mobile-filiales-sub">
                    <li><a href="{{ url('/filiales/fondations') }}" class="ks-mobile-nav__sub-link">Kalystrat Fondations</a></li>
                    <li><a href="{{ url('/filiales/structure') }}" class="ks-mobile-nav__sub-link">Kalystrat Structure</a></li>
                    <li><a href="{{ url('/filiales/toiture') }}" class="ks-mobile-nav__sub-link">Kalystrat Toiture et Enveloppe</a></li>
                    <li><a href="{{ url('/filiales/finition') }}" class="ks-mobile-nav__sub-link">Kalystrat Finition Intérieure</a></li>
                    <li><a href="{{ url('/filiales/immobilier') }}" class="ks-mobile-nav__sub-link">Kalystrat Immobilier</a></li>
                    <li><a href="{{ url('/filiales/placement') }}" class="ks-mobile-nav__sub-link">Kalystrat Placement Construction</a></li>
                </ul>
            </li>
            <li><a href="{{ url('/faq') }}" class="ks-mobile-nav__link">FAQ</a></li>
            <li><a href="{{ url('/carrieres') }}" class="ks-mobile-nav__link">Carrières</a></li>
            <li><a href="{{ url('/contact') }}" class="ks-mobile-nav__link">Contact</a></li>
        </ul>
        <a href="tel:+14184760987" class="ks-mobile-nav__cta" aria-label="Appeler Kalystrat au 418-476-0987">
            <x-frontend::icon name="phone" :size="16"/> 418-476-0987
        </a>
    </nav>

    <main class="ks-main" id="contenu-principal">
        @yield('content')
    </main>

    <aside class="ks-trust-band" aria-label="Accréditations et garanties Kalystrat">
        <div class="ks-trust-band__inner">
            <span class="ks-trust-band__label">Accréditations</span>
            <span class="ks-trust-band__item"><x-frontend::icon name="shield-check" :size="16"/> Licence <abbr title="Régie du bâtiment du Québec">RBQ</abbr> active</span>
            <span class="ks-trust-band__item"><x-frontend::icon name="home-heart" :size="16"/> Garantie <abbr title="Garantie de construction résidentielle">GCR</abbr></span>
            <span class="ks-trust-band__item"><x-frontend::icon name="team" :size="16"/> Main-d'oeuvre <abbr title="Commission de la construction du Québec">CCQ</abbr></span>
            <span class="ks-trust-band__item"><x-frontend::icon name="time" :size="16"/> Réponse sous 48&nbsp;h ouvrables</span>
        </div>
    </aside>

    <footer class="ks-footer" aria-label="Pied de page Kalystrat">
        <div class="ks-footer__grid">
            <div>
                <h3 class="ks-footer__heading">À propos</h3>
                <img src="{{ asset('assets/img/kalystrat/logo-white.svg') }}" alt="Logo Kalystrat" class="ks-footer__logo" width="140" height="40" loading="lazy">
                <p class="ks-footer__slogan" style="color: var(--ks-gold); font-weight: 600; letter-spacing: 0.05em; margin: 0 0 0.75rem; font-size: 1rem;">« Conçu. Réalisé. Livré.&nbsp;»</p>
                <p class="ks-footer__tagline">Groupe québécois en construction regroupant 6 filiales spécialisées. Bâtir l'avenir du Québec, une fondation à la fois.</p>
                <ul class="ks-footer__links" style="margin-top: 0.5rem;">
                    <li><a href="{{ url('/a-propos') }}">À propos du groupe</a></li>
                    <li><a href="{{ url('/conseil-consultatif') }}">Conseil consultatif</a></li>
                    <li><a href="{{ url('/partenaires') }}">Réseau de partenaires</a></li>
                    <li><a href="{{ url('/zones-desservies') }}">Zones desservies</a></li>
                </ul>
            </div>
            <div>
                <h3 class="ks-footer__heading">Filiales</h3>
                <ul class="ks-footer__links">
                    <li><a href="{{ url('/filiales/fondations') }}">Kalystrat Fondations</a></li>
                    <li><a href="{{ url('/filiales/structure') }}">Kalystrat Structure</a></li>
                    <li><a href="{{ url('/filiales/toiture') }}">Kalystrat Toiture et Enveloppe</a></li>
                    <li><a href="{{ url('/filiales/finition') }}">Kalystrat Finition Intérieure</a></li>
                    <li><a href="{{ url('/filiales/immobilier') }}">Kalystrat Immobilier</a></li>
                    <li><a href="{{ url('/filiales/placement') }}">Kalystrat Placement Construction</a></li>
                </ul>
            </div>
            <div>
                <h3 class="ks-footer__heading">Contact</h3>
                <div class="ks-footer__contact-item">
                    <svg class="ks-footer__contact-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5A2.5 2.5 0 1112 6.5a2.5 2.5 0 010 5z"/></svg>
                    <span>Québec, QC, Canada</span>
                </div>
                <div class="ks-footer__contact-item">
                    <svg class="ks-footer__contact-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24c1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1C10.07 21 3 13.93 3 4c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.1.31.03.66-.25 1.01l-2.2 2.21z"/></svg>
                    <a href="tel:+14184760987">418-476-0987</a>
                </div>
                <div class="ks-footer__contact-item">
                    <svg class="ks-footer__contact-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                    <a href="mailto:info@kalystrat.ca">info@kalystrat.ca</a>
                </div>
            </div>
            <div>
                <h3 class="ks-footer__heading">Suivez-nous</h3>
                <div class="ks-footer__social">
                    <a href="https://www.facebook.com/kalystrat" class="ks-footer__social-link" aria-label="Kalystrat sur Facebook" target="_blank" rel="noopener noreferrer">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.99 3.66 9.13 8.44 9.88v-6.99H7.9V12h2.54V9.8c0-2.51 1.49-3.89 3.78-3.89 1.09 0 2.24.2 2.24.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56V12h2.77l-.44 2.89h-2.33v6.99C18.34 21.13 22 16.99 22 12z"/></svg>
                    </a>
                    <a href="https://www.linkedin.com/company/kalystrat" class="ks-footer__social-link" aria-label="Kalystrat sur LinkedIn" target="_blank" rel="noopener noreferrer">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.45 20.45h-3.55v-5.57c0-1.33-.03-3.04-1.85-3.04-1.85 0-2.14 1.45-2.14 2.94v5.67H9.35V9h3.41v1.56h.05c.48-.9 1.64-1.85 3.37-1.85 3.6 0 4.27 2.37 4.27 5.46v6.28zM5.34 7.43a2.06 2.06 0 11-.01-4.13 2.06 2.06 0 01.01 4.13zM7.12 20.45H3.56V9h3.56v11.45z"/></svg>
                    </a>
                    <a href="https://www.instagram.com/kalystrat" class="ks-footer__social-link" aria-label="Kalystrat sur Instagram" target="_blank" rel="noopener noreferrer">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2.16c3.2 0 3.58.01 4.85.07 3.25.15 4.77 1.69 4.92 4.92.06 1.27.07 1.65.07 4.85 0 3.2-.01 3.58-.07 4.85-.15 3.23-1.66 4.77-4.92 4.92-1.27.06-1.64.07-4.85.07-3.2 0-3.58-.01-4.85-.07-3.26-.15-4.77-1.7-4.92-4.92-.06-1.27-.07-1.64-.07-4.85 0-3.2.01-3.58.07-4.85C2.27 2.69 3.79 1.15 7.05 1.07 8.33 1.01 8.74 1 12 1zm0-2C8.74 0 8.33.01 7.05.07 2.7.27.27 2.69.07 7.05.01 8.33 0 8.74 0 12s.01 3.67.07 4.95c.2 4.36 2.62 6.78 6.98 6.98 1.28.06 1.69.07 4.95.07s3.67-.01 4.95-.07c4.35-.2 6.78-2.62 6.98-6.98.06-1.28.07-1.69.07-4.95s-.01-3.67-.07-4.95c-.2-4.35-2.62-6.78-6.98-6.98C15.67.01 15.26 0 12 0zm0 5.84a6.16 6.16 0 100 12.32 6.16 6.16 0 000-12.32zm0 10.16a4 4 0 110-8 4 4 0 010 8zm6.4-11.84a1.44 1.44 0 100 2.88 1.44 1.44 0 000-2.88z"/></svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="ks-footer__bottom">
            <div class="ks-footer__bottom-inner">
                <p class="ks-footer__copyright">© 2026 Gestion Kalystrat Inc. Tous droits réservés. <span aria-hidden="true" style="margin: 0 0.5rem; opacity: 0.4;">·</span> <span style="color: rgba(212, 196, 152, 0.95); font-size: 0.75rem; letter-spacing: 0.04em;">Conçu et hébergé par <a href="https://memora.solutions" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(212, 196, 152, 0.4); text-underline-offset: 2px;">MEMORA</a>, compagnie du Québec.</span></p>
                <nav class="ks-footer__legal" aria-label="Liens légaux et conformité">
                    <a href="{{ route('legal.privacy') }}">Politique de confidentialité</a>
                    <a href="{{ route('legal.terms') }}">Conditions d'utilisation</a>
                    <a href="{{ url('/credits') }}">Crédits photos</a>
                    <a href="/llms.txt" rel="alternate" type="text/plain">LLMs.txt</a>
                </nav>
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/construz-new/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/construz-new/js/bootstrap.min.js') }}"></script>
    <script>
        (function () {
            'use strict';
            var header = document.getElementById('ks-header');
            var hamburger = document.getElementById('ks-hamburger');
            var mobileNav = document.getElementById('ks-mobile-nav');
            var filialesToggle = document.getElementById('ks-mobile-filiales-toggle');
            var filialesSub = document.getElementById('ks-mobile-filiales-sub');
            function onScroll() { if (window.scrollY > 60) { header.classList.add('ks-header--scrolled'); } else { header.classList.remove('ks-header--scrolled'); } }
            window.addEventListener('scroll', onScroll, { passive: true }); onScroll();
            hamburger.addEventListener('click', function () {
                var isOpen = mobileNav.classList.toggle('ks-mobile-nav--open');
                hamburger.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
                mobileNav.setAttribute('aria-hidden', isOpen ? 'false' : 'true');
            });
            if (filialesToggle && filialesSub) {
                filialesToggle.addEventListener('click', function (e) {
                    e.preventDefault();
                    var expanded = filialesToggle.getAttribute('aria-expanded') === 'true';
                    filialesToggle.setAttribute('aria-expanded', expanded ? 'false' : 'true');
                    filialesSub.style.display = expanded ? 'none' : 'block';
                });
            }

            /* Disclosure pattern : nav header desktop dropdowns ([data-ks-disclosure]) */
            var disclosures = document.querySelectorAll('[data-ks-disclosure]');
            disclosures.forEach(function (btn) {
                var menuId = btn.getAttribute('aria-controls');
                var menu = menuId ? document.getElementById(menuId) : null;
                if (!menu) return;
                function close() { btn.setAttribute('aria-expanded', 'false'); }
                function open() { btn.setAttribute('aria-expanded', 'true'); }
                btn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    btn.getAttribute('aria-expanded') === 'true' ? close() : open();
                });
                btn.addEventListener('keydown', function (e) {
                    if (e.key === 'Escape') { close(); btn.focus(); }
                    if (e.key === 'ArrowDown' && btn.getAttribute('aria-expanded') === 'true') {
                        e.preventDefault();
                        var firstLink = menu.querySelector('a');
                        if (firstLink) firstLink.focus();
                    }
                });
                menu.addEventListener('keydown', function (e) {
                    if (e.key === 'Escape') { close(); btn.focus(); }
                });
                document.addEventListener('click', function (e) {
                    if (!btn.contains(e.target) && !menu.contains(e.target)) close();
                });
            });

            /* AEO/GEO 2026 – auto-detect AI referrer + flag dataLayer pour GA4 */
            try {
                var ref = document.referrer || '';
                var aiSource = null;
                if (/perplexity\.ai/i.test(ref)) aiSource = 'perplexity';
                else if (/chatgpt\.com|chat\.openai\.com|openai\.com/i.test(ref)) aiSource = 'chatgpt';
                else if (/claude\.ai|anthropic\.com/i.test(ref)) aiSource = 'claude';
                else if (/gemini\.google|bard\.google/i.test(ref)) aiSource = 'gemini';
                else if (/copilot\.microsoft|bing\.com\/chat/i.test(ref)) aiSource = 'copilot';
                else if (/you\.com/i.test(ref)) aiSource = 'you';
                else if (/duckduckgo\.com\/.*assist/i.test(ref)) aiSource = 'duckduckgo-ai';
                if (aiSource) {
                    window.dataLayer = window.dataLayer || [];
                    window.dataLayer.push({ event: 'ai_referrer', ai_source: aiSource, ai_referrer_url: ref });
                    document.documentElement.setAttribute('data-ai-source', aiSource);
                }
            } catch (e) { /* silent */ }
        })();
    </script>
    {{-- Phase 19 : Bootstrap Tooltip activé sur tous les <abbr title="..."> pour UX intuitive --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
                document.querySelectorAll('abbr[title]').forEach(function(el) {
                    el.setAttribute('data-bs-toggle', 'tooltip');
                    el.setAttribute('data-bs-placement', 'top');
                    new bootstrap.Tooltip(el);
                });
            }
        });
    </script>
    @stack('scripts')

    {{-- PWA prompts (install + update) — activés via config/pwa.php --}}
    @if(config('pwa.enabled', true))
    <x-pwa-install-prompt />
    <x-pwa-update-prompt />
    @endif
</body>
</html>
