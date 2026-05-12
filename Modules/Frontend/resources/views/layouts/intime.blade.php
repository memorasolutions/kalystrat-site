<!DOCTYPE html>
<html lang="fr-CA">
<head>
<meta charset="utf-8">
<script>
// Kill-switch service worker — élimine SW cachés qui bloqueraient les ressources média (T67 2026-05-10)
if ('serviceWorker' in navigator) {
    navigator.serviceWorker.getRegistrations().then(function (regs) {
        regs.forEach(function (r) { r.unregister(); });
    });
    if (window.caches && caches.keys) {
        caches.keys().then(function (names) {
            names.forEach(function (n) { caches.delete(n); });
        });
    }
}
</script>
<title>@yield('title', 'Kalystrat — Groupe québécois de construction à intégration verticale')</title>
@stack('meta')

{{-- Organization JSON-LD global (toutes pages) --}}
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'Gestion Kalystrat Inc.',
    'alternateName' => 'Kalystrat',
    'url' => 'https://kalystrat.ca',
    'logo' => url('/assets/img/kalystrat/logo.svg'),
    'founder' => ['@type' => 'Person', 'name' => 'Ali Salomon', 'jobTitle' => 'Président et Directeur Général'],
    'address' => ['@type' => 'PostalAddress', 'addressLocality' => 'Québec', 'addressRegion' => 'QC', 'addressCountry' => 'CA'],
    'contactPoint' => ['@type' => 'ContactPoint', 'contactType' => 'customer service', 'telephone' => '+1-418-476-0987', 'email' => 'info@kalystrat.ca', 'areaServed' => 'CA-QC', 'availableLanguage' => ['French', 'English']],
    'telephone' => '+1-418-476-0987',
    'subOrganization' => array_map(fn($s, $f) => ['@type' => 'GeneralContractor', 'name' => $f['nom_legal'], 'url' => 'https://kalystrat.ca/filiales/' . $s], array_keys(\Modules\Frontend\Http\Controllers\FilialeController::FILIALES), \Modules\Frontend\Http\Controllers\FilialeController::FILIALES),
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'WebSite',
    'name' => 'Kalystrat',
    'url' => 'https://kalystrat.ca',
    'inLanguage' => 'fr-CA',
    'publisher' => ['@type' => 'Organization', 'name' => 'Gestion Kalystrat Inc.'],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); @endphp</script>

@stack('schema')
<!-- Stylesheets -->
@php $ksCssBust = file_exists(public_path('intime/css/kalystrat-system.css')) ? '?v=' . filemtime(public_path('intime/css/kalystrat-system.css')) : ''; @endphp
<link href="/intime/css/bootstrap.css" rel="stylesheet">
<link href="/intime/css/style.css" rel="stylesheet">
<link href="/intime/css/responsive.css" rel="stylesheet">
<link href="/intime/css/kalystrat-system.css{{ $ksCssBust }}" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:wght@400;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<!-- T140 — Système favicon Kalystrat (SVG + apple-touch + PNG fallback) -->
<link rel="icon" type="image/svg+xml" href="/assets/img/kalystrat/favicon.svg">
<link rel="alternate icon" href="/intime/images/favicon.png" type="image/png">
<link rel="apple-touch-icon" sizes="180x180" href="/assets/img/kalystrat/apple-touch-icon.png">
<link rel="mask-icon" href="/assets/img/kalystrat/favicon.svg" color="#0A1628">
<meta name="theme-color" content="#0A1628">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

{{-- V5c — View Transitions API (Chrome 111+, ~85% support 2026) --}}
<meta name="view-transition" content="same-origin">

</head>

<body>

{{-- T83 — Skip link WCAG 2.4.1 (premier focusable, sauter au main) --}}
<a class="ks-skip-link" href="#main">Aller au contenu principal</a>

<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>
	<!-- End Preloader -->

 	<!-- Main Header / Header Style Four -->
    <header class="main-header header-style-six" role="banner">

		<!-- Header Upper -->
        <div class="header-upper">
            <div class="auto-container">
				<div class="inner-container d-flex justify-content-between align-items-center flex-wrap">
					<!-- Logo Box -->
					<div class="logo"><a href="/" aria-label="Kalystrat — accueil"><img src="/assets/img/kalystrat/logo-header.svg" alt="Logo Gestion Kalystrat Inc. — Groupe québécois de construction" title="Kalystrat" width="180" height="60"></a></div>
					
					<div class="nav-outer d-flex ">
						
						<!-- Main Menu -->
						<nav class="main-menu show navbar-expand-md d-flex align-items-center">
							<div class="navbar-header">
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							
							<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
								<ul class="navigation clearfix">
									<li><a href="/">Accueil</a></li>
									<li class="dropdown"><a href="/a-propos">À propos</a>
										<ul>
											<li><a href="/a-propos">Notre vision</a></li>
											<li><a href="/expertise">Notre expertise</a></li>
											<li><a href="/equipe">Équipe et conseil</a></li>
											<li><a href="/partenaires">Partenaires</a></li>
										</ul>
									</li>
									<li class="dropdown"><a href="/filiales">Filiales</a>
										<ul>
											<li><a href="/filiales">Vue d’ensemble</a></li>
											<li><a href="/filiales/fondations">Fondations</a></li>
											<li><a href="/filiales/structure">Structure</a></li>
											<li><a href="/filiales/toiture-enveloppe">Toiture et Enveloppe</a></li>
											<li><a href="/filiales/finition-interieure">Finition Intérieure</a></li>
											<li><a href="/filiales/immobilier">Immobilier</a></li>
											<li><a href="/filiales/placement-construction">Placement Construction</a></li>
										</ul>
									</li>
									<li class="dropdown"><a href="/services">Services</a>
										<ul>
											<li><a href="/services">Tous nos services</a></li>
											<li><a href="/secteurs">Secteurs desservis</a></li>
											<li><a href="/zones-desservies">Zones desservies</a></li>
											<li><a href="/projets">Projets</a></li>
										</ul>
									</li>
									<li class="dropdown"><a href="/blog">Ressources</a>
										<ul>
											<li><a href="/blog">Blog</a></li>
											<li><a href="/blog/pourquoi-construire-multi-logements-quebec-2026">Multilogements 2026</a></li>
											<li><a href="/blog/code-construction-quebec-2026-changements">Code construction 2026</a></li>
											<li><a href="/blog/comment-choisir-entrepreneur-construction-qc-2026">Choisir un entrepreneur</a></li>
											<li><a href="/faq">FAQ</a></li>
											<li><a href="/glossaire">Glossaire</a></li>
											<li><a href="/carrieres">Carrières</a></li>
										</ul>
									</li>
									<li><a href="/contact">Contact</a></li>
								</ul>
							</div>
							
						</nav>
						<!-- Main Menu End-->
						
						<div class="outer-box d-flex align-items-center">
							
							<!-- Button Box -->
							<div class="button-box">
								<a class="btn-style-ten theme-btn btn-item" href="/contact">
									<div class="btn-wrap">
										<span class="text-one">Obtenir une soumission</span>
										<span class="text-two">Obtenir une soumission</span>
									</div>
								</a>
							</div>
							
						</div>
						
						<!-- Mobile Navigation Toggler -->
						<div class="mobile-nav-toggler"><span class="icon fa-solid fa-bars fa-fw"></span></div>
						
					</div>
					
				</div>
			</div>
		</div>
		
		<!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="auto-container">
				<div class="d-flex justify-content-between align-items-center">
					<!-- Logo -->
					<div class="logo">
						<a href="/" aria-label="Kalystrat — accueil"><img src="/assets/img/kalystrat/logo-header.svg" alt="Logo Gestion Kalystrat Inc." title="Kalystrat" width="160" height="50"></a>
					</div>
					
					<!-- Right Col -->
					<div class="right-box d-flex align-items-center flex-wrap">
						<!-- Main Menu -->
						<nav class="main-menu d-flex align-items-center">
							<!--Keep This Empty / Menu will come through Javascript-->
						</nav>
						<!-- Main Menu End-->
						
						<div class="outer-box d-flex align-items-center">
							
							<!-- Button Box -->
							<div class="button-box">
								<a class="btn-style-ten theme-btn btn-item" href="/contact">
									<div class="btn-wrap">
										<span class="text-one">Obtenir une soumission</span>
										<span class="text-two">Obtenir une soumission</span>
									</div>
								</a>
							</div>
							
							<!-- Mobile Navigation Toggler -->
							<div class="mobile-nav-toggler"><span class="icon fa-solid fa-bars fa-fw"></span></div>
							
						</div>
						
					</div>
					
				</div>
            </div>
        </div>
		<!-- End Sticky Menu -->
		
		<!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon fas fa-window-close fa-fw"></span></div>
            <nav class="menu-box">
                <div class="nav-logo"><a href="/" aria-label="Kalystrat — accueil"><img src="/assets/img/kalystrat/logo-white.svg" alt="Logo Gestion Kalystrat Inc." title="Kalystrat" width="180" height="60"></a></div>
				<!-- Search -->
				<div class="search-box">
					<form method="post" action="contact.html">
						<div class="form-group">
							<label for="ks-search-popup" class="visually-hidden">Rechercher sur le site</label>
							<input type="search" id="ks-search-popup" name="search-field" value="" placeholder="Rechercher" aria-label="Rechercher sur le site" required>
							<button type="submit"><span class="icon flaticon-001-loupe"></span></button>
						</div>
					</form>
				</div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            </nav>
        </div>
		<!-- End Mobile Menu -->
	
    </header>

    {{-- Layout dynamique : chaque page injecte son contenu via @yield('content') --}}
    <main id="main" role="main" tabindex="-1">
    @yield('content')
    </main>

    {{-- T159 — Sticky contact hybride (tab desktop + FAB mobile) --}}
    <x-frontend::sticky-contact />

	<footer class="ks-footer" role="contentinfo">

		{{-- Zone 1 : Bandeau confiance (certifications) --}}
		<div class="ks-footer__trust" aria-label="Certifications et conformité">
			<div class="ks-footer__container">
				<ul class="ks-footer__trust-list">
					<li class="ks-footer__trust-item"><span class="ks-footer__trust-badge">RBQ</span><span class="ks-footer__trust-label">Licence active</span></li>
					<li class="ks-footer__trust-item"><span class="ks-footer__trust-badge">CCQ</span><span class="ks-footer__trust-label">Main-d'œuvre certifiée</span></li>
					<li class="ks-footer__trust-item"><span class="ks-footer__trust-badge">APCHQ</span><span class="ks-footer__trust-label">Garantie rénovation</span></li>
					<li class="ks-footer__trust-item"><span class="ks-footer__trust-badge">GCR</span><span class="ks-footer__trust-label">Plan de garantie résidentiel</span></li>
					<li class="ks-footer__trust-item"><span class="ks-footer__trust-badge">Novoclimat&nbsp;2.0</span><span class="ks-footer__trust-label">Efficacité énergétique</span></li>
					<li class="ks-footer__trust-item"><span class="ks-footer__trust-badge">Code&nbsp;QC&nbsp;2026</span><span class="ks-footer__trust-label">Conformité totale</span></li>
				</ul>
			</div>
		</div>

		{{-- Zone 2 : Main footer (marque + 3 colonnes sitemap-lite) --}}
		<div class="ks-footer__main">
			<div class="ks-footer__container">
				<div class="ks-footer__grid">

					<div class="ks-footer__brand">
						<a href="{{ url('/') }}" class="ks-footer__logo" aria-label="Kalystrat — accueil">
							<img src="/assets/img/kalystrat/logo-white.svg" alt="Logo Gestion Kalystrat Inc." width="320" height="105">
						</a>
						<p class="ks-footer__tagline">Conçu, réalisé, livré. Groupe québécois de construction à intégration verticale.</p>
						<ul class="ks-footer__contact">
							<li>
								<a href="tel:+14184760987" class="ks-footer__phone" aria-label="Appeler Kalystrat au 418 476 0987">
									<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false" width="20" height="20"><path fill="currentColor" d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.02-.24c1.12.37 2.33.57 3.57.57a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.57a1 1 0 0 1-.25 1.02l-2.2 2.2z"/></svg>
									<span>418 476-0987</span>
								</a>
							</li>
							<li>
								<a href="mailto:info@kalystrat.ca" class="ks-footer__email">
									<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false" width="20" height="20"><path fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" d="M4 6h16v12H4z M4 6l8 7 8-7"/></svg>
									<span>info@kalystrat.ca</span>
								</a>
							</li>
							<li class="ks-footer__address">
								<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false" width="20" height="20"><path fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" d="M12 22s-7-7.5-7-13a7 7 0 1 1 14 0c0 5.5-7 13-7 13z M12 11a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
								<span>Siège social&nbsp;: Québec, QC</span>
							</li>
						</ul>
					</div>

					<nav class="ks-footer__col" aria-labelledby="ks-footer-nav-services">
						<h4 id="ks-footer-nav-services" class="ks-footer__col-title">Services</h4>
						<ul class="ks-footer__links">
							<li><a href="{{ route('filiale', 'fondations') }}">Fondations</a></li>
							<li><a href="{{ route('filiale', 'structure') }}">Structure</a></li>
							<li><a href="{{ route('filiale', 'toiture-enveloppe') }}">Toiture et enveloppe</a></li>
							<li><a href="{{ route('filiale', 'finition-interieure') }}">Finition intérieure</a></li>
							<li><a href="{{ route('filiale', 'immobilier') }}">Immobilier</a></li>
							<li><a href="{{ route('filiale', 'placement-construction') }}">Placement construction</a></li>
						</ul>
					</nav>

					<nav class="ks-footer__col" aria-labelledby="ks-footer-nav-entreprise">
						<h4 id="ks-footer-nav-entreprise" class="ks-footer__col-title">Entreprise</h4>
						<ul class="ks-footer__links">
							<li><a href="{{ route('apropos') }}">À propos</a></li>
							<li><a href="{{ route('filiales.index') }}">Six filiales</a></li>
							<li><a href="{{ route('equipe') }}">Équipe</a></li>
							<li><a href="{{ route('carrieres') }}">Carrières</a></li>
							<li><a href="{{ route('contact') }}">Contact</a></li>
						</ul>
					</nav>

					<nav class="ks-footer__col" aria-labelledby="ks-footer-nav-ressources">
						<h4 id="ks-footer-nav-ressources" class="ks-footer__col-title">Ressources</h4>
						<ul class="ks-footer__links">
							<li><a href="{{ route('expertise') }}">Expertise Code QC 2026</a></li>
							<li><a href="{{ route('blog.index') }}">Blog</a></li>
							<li><a href="{{ route('faq') }}">FAQ</a></li>
							<li><a href="{{ route('glossaire') }}">Glossaire</a></li>
							<li><a href="{{ route('zones.index') }}">Zones desservies</a></li>
							<li><a href="{{ route('secteurs.index') }}">Secteurs</a></li>
						</ul>
					</nav>

				</div>
			</div>
		</div>

		{{-- Zone 3 : Sous-barre légale --}}
		<div class="ks-footer__legal">
			<div class="ks-footer__container ks-footer__legal-inner">
				<div class="ks-footer__copyright">&copy; {{ date('Y') }} Gestion Kalystrat Inc. — Tous droits réservés.</div>
				<ul class="ks-footer__legal-links">
					<li><a href="{{ url('/politique-confidentialite') }}">Politique Loi 25</a></li>
					<li><a href="/sitemap.xml">Plan du site</a></li>
				</ul>
				<div class="ks-footer__signature">Site par <a href="https://memora.ca" rel="noopener external" target="_blank">MEMORA</a></div>
			</div>
		</div>
	</footer>
	<!-- Footer -->

	<!-- Search Popup -->
	<div class="search-popup">
		<div class="color-layer"></div>
		<button class="close-search" aria-label="Fermer la recherche"><span class="fas fa-times fa-fw" aria-hidden="true"></span></button>
		<form method="post" action="blog.html">
			<div class="form-group">
				<label for="ks-search-main" class="visually-hidden">Rechercher sur le site</label>
				<input type="search" id="ks-search-main" name="search-field" value="" placeholder="Rechercher…" aria-label="Rechercher sur le site" required>
				<button type="submit" aria-label="Lancer la recherche"><i class="flaticon-search" aria-hidden="true"></i></button>
			</div>
		</form>
	</div>
	<!-- End Search Popup -->
	
</div>
<!-- End PageWrapper -->

<!-- Scroll To Top -->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fas fa-long-arrow-up fa-fw"></span></div>

<script src="/intime/js/jquery.js"></script>
<script src="/intime/js/appear.js"></script>
<script src="/intime/js/owl.js"></script>
<script src="/intime/js/wow.js"></script>
<script src="/intime/js/odometer.js"></script>
<script src="/intime/js/mixitup.js"></script>
<script src="/intime/js/knob.js"></script>
<script src="/intime/js/isotope.js"></script>
<script src="/intime/js/popper.min.js"></script>
<script src="/intime/js/isotope.js"></script>
<script src="/intime/js/parallax-scroll.js"></script>
<script src="/intime/js/parallax.min.js"></script>
<script src="/intime/js/parallax-scroll.js"></script>
<script src="/intime/js/bootstrap.min.js"></script>
<script src="/intime/js/tilt.jquery.min.js"></script>
<script src="/intime/js/magnific-popup.min.js"></script>

<script src="/intime/js/script.js"></script>


<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="/intime/js/respond.js"></script><![endif]-->

@stack('scripts')

{{-- V5d-A — Bannière de consentement Loi 25 / RGPD / LPRPDE --}}
<div class="ks-cookie-banner" role="region" aria-label="Avis de confidentialité" hidden data-ks-cookie>
    <div class="ks-cookie-banner__inner">
        <div class="ks-cookie-banner__content">
            <strong>Confidentialité</strong>
            Ce site utilise des témoins essentiels au fonctionnement et des outils de mesure d’audience. Conformément à la <strong>Loi&nbsp;25 du Québec</strong> et au RGPD, vous pouvez accepter, refuser ou consulter notre <a href="{{ url('/politique-confidentialite') }}">politique de confidentialité</a>.
        </div>
        <div class="ks-cookie-banner__actions">
            <button type="button" class="ks-cookie-banner__btn ks-cookie-banner__btn--decline" data-ks-cookie-decline>Refuser</button>
            <button type="button" class="ks-cookie-banner__btn ks-cookie-banner__btn--accept" data-ks-cookie-accept>Accepter</button>
        </div>
    </div>
</div>
<script>
(function () {
    'use strict';
    var STORAGE_KEY = 'ks-cookie-consent-v1';
    var banner = document.querySelector('[data-ks-cookie]');
    if (!banner) return;
    if (localStorage.getItem(STORAGE_KEY)) return;
    banner.hidden = false;
    document.querySelector('[data-ks-cookie-accept]').addEventListener('click', function () {
        localStorage.setItem(STORAGE_KEY, 'accepted-' + Date.now());
        banner.hidden = true;
    });
    document.querySelector('[data-ks-cookie-decline]').addEventListener('click', function () {
        localStorage.setItem(STORAGE_KEY, 'declined-' + Date.now());
        banner.hidden = true;
    });
})();
</script>

{{-- V5d-B — Sticky CTA mobile (visible scroll bas) - tel: direct conversion --}}
<a class="ks-sticky-cta" href="tel:+14184760987" aria-label="Appeler Kalystrat au 418 476 0987" hidden data-ks-sticky-cta>
    <span class="ks-sticky-cta__icon" aria-hidden="true">📞</span>
    <span class="ks-sticky-cta__text">418&nbsp;476-0987</span>
</a>
<script>
(function () {
    'use strict';
    var cta = document.querySelector('[data-ks-sticky-cta]');
    if (!cta) return;
    var revealAt = 600;
    function check() {
        if (window.innerWidth >= 768) { cta.hidden = true; return; }
        if (window.scrollY > revealAt) { cta.hidden = false; }
        else { cta.hidden = true; }
    }
    window.addEventListener('scroll', check, { passive: true });
    window.addEventListener('resize', check);
    check();
})();
</script>

<script>
{{-- T126 — Scroll-spy TOC IntersectionObserver --}}
(function () {
    'use strict';
    var toc = document.querySelector('[data-ks-toc]');
    if (!toc) return;
    var links = toc.querySelectorAll('[data-ks-toc-link]');
    var toggle = toc.querySelector('[data-ks-toc-toggle]');
    var ids = Array.from(links).map(function (l) { return l.getAttribute('href').slice(1); });
    var sections = ids.map(function (id) { return document.getElementById(id); }).filter(Boolean);

    function setActive(id) {
        links.forEach(function (l) {
            var href = l.getAttribute('href').slice(1);
            var active = href === id;
            l.classList.toggle('is-active', active);
            if (active) l.setAttribute('aria-current', 'true');
            else l.removeAttribute('aria-current');
        });
    }

    if ('IntersectionObserver' in window && sections.length) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) setActive(entry.target.id);
            });
        }, { rootMargin: '-40% 0px -50% 0px', threshold: 0 });
        sections.forEach(function (s) { io.observe(s); });
    }

    if (toggle) {
        toggle.addEventListener('click', function () {
            var open = toc.hasAttribute('data-ks-toc-open');
            if (open) toc.removeAttribute('data-ks-toc-open');
            else toc.setAttribute('data-ks-toc-open', '');
            toggle.setAttribute('aria-expanded', open ? 'false' : 'true');
        });
        // Auto-close mobile drawer on link click
        links.forEach(function (l) {
            l.addEventListener('click', function () {
                toc.removeAttribute('data-ks-toc-open');
                toggle.setAttribute('aria-expanded', 'false');
            });
        });
    }
})();
</script>

<script>
(function () {
    'use strict';
    if (!('IntersectionObserver' in window)) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
    var targets = document.querySelectorAll(
        '.ks-section:not(.ks-page-hero):not(.no-reveal), [data-ks-reveal]'
    );
    if (!targets.length) return;
    targets.forEach(function (el) { el.classList.add('ks-reveal-init'); });
    var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('ks-reveal-show');
                io.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -8% 0px' });
    targets.forEach(function (el) { io.observe(el); });
})();
</script>

</body>
