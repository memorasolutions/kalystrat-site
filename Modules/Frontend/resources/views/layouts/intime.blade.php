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
    'logo' => url('/intime/images/logo.png'),
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

<link rel="shortcut icon" href="/intime/images/favicon.png" type="image/x-icon">
<link rel="icon" href="/intime/images/favicon.png" type="image/x-icon">

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
					<div class="logo"><a href="/" aria-label="Kalystrat — accueil"><img src="/intime/images/logo-6.png" alt="Logo Kalystrat — Groupe québécois de construction" title="Kalystrat"></a></div>
					
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
						<a href="/" aria-label="Kalystrat — accueil"><img src="/intime/images/logo-6.png" alt="Logo Kalystrat" title="Kalystrat"></a>
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
                <div class="nav-logo"><a href="/" aria-label="Kalystrat — accueil"><img src="/intime/images/logo.png" alt="Logo Kalystrat" title="Kalystrat"></a></div>
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

	<footer class="main-footer style-six" style="background-image:url(/intime/images/background/pattern-35.jpg)">
		<div class="auto-container">
			
			<!-- Upper Box -->
			<div class="upper-box">
				<div class="inner-container">
					<div class="row clearfix">
						<div class="col-lg-6 col-md-12 col-sm-12">
							<h3>Recevez nos actualités</h3>
						</div>
						<div class="col-lg-6 col-md-12 col-sm-12">
							<!-- Subscribe Box -->
							<div class="subscribe-box">
								<form method="post" action="contact.html">
									<div class="form-group">
										<label for="ks-newsletter-email" class="visually-hidden">Adresse courriel pour l'infolettre</label>
										<input type="email" id="ks-newsletter-email" name="email" value="" placeholder="Votre courriel" autocomplete="email" aria-label="Adresse courriel pour l'infolettre" required>
										<button type="submit">S&apos;inscrire</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Widgets Section -->
			<div class="widgets-section">
				<div class="row clearfix">
					
					<!-- Big Column -->
					<div class="big-column col-lg-5 col-md-12 col-sm-12">
						<div class="row clearfix">
							
							<!-- Footer Column -->
							<div class="footer-column col-lg-7 col-md-6 col-sm-12">
								<div class="footer-widget logo-widget">
									<h4>À propos</h4>
									<div class="text">Groupe québécois de construction à intégration verticale. Six filiales spécialisées sous une marque unifiée - du chantier à la livraison.</div>
									<p style="margin-top:1rem;color:var(--ks-gold-500);font-family:var(--ks-font-display);font-weight:700;font-size:0.95rem">
										<a href="tel:+14184760987" style="color:var(--ks-gold-500)" aria-label="Appeler Kalystrat au 418 476 0987">📞&nbsp;418&nbsp;476-0987</a>
										&nbsp;·&nbsp;
										<a href="mailto:info@kalystrat.ca" style="color:var(--ks-gold-500)">info@kalystrat.ca</a>
									</p>
									<!-- Social Box -->
									<ul class="footer-six_social-box">
										<li class="facebook"><a href="https://www.twitter.com/" class="fa-brands fa-facebook-f fa-fw" aria-label="Suivre Kalystrat sur Facebook"></a></li>
										<li class="twitter"><a href="https://www.facebook.com/" class="fa-brands fa-twitter fa-fw" aria-label="Suivre Kalystrat sur Twitter"></a></li>
										<li class="facebook"><a href="https://instagram.com/" class="fa-solid fa-instagram fa-fw" aria-label="Suivre Kalystrat sur Instagram"></a></li>
										<li class="youtube"><a href="https://www.youtube.com/" class="fa-brands fa-youtube fa-fw" aria-label="Suivre Kalystrat sur YouTube"></a></li>
									</ul>
								</div>
							</div>
							
							<!-- Footer Column -->
							<div class="footer-column col-lg-5 col-md-6 col-sm-12">
								<div class="footer-widget links-widget">
									<h4>Liens utiles</h4>
									<ul class="footer-links">
										<li><a href="/a-propos">À propos</a></li>
										<li><a href="/filiales">Six filiales</a></li>
										<li><a href="/services">Services</a></li>
										<li><a href="/expertise">Expertise</a></li>
										<li><a href="/equipe">Équipe</a></li>
										<li><a href="/zones-desservies">Zones desservies</a></li>
										<li><a href="/secteurs">Secteurs</a></li>
										<li><a href="/faq">FAQ</a></li>
										<li><a href="/glossaire">Glossaire</a></li>
										<li><a href="/carrieres">Carrières</a></li>
										<li><a href="/contact">Contact</a></li>
									</ul>
								</div>
							</div>
							
						</div>
					</div>
					
					<!-- Big Column -->
					<div class="big-column col-lg-7 col-md-12 col-sm-12">
						<div class="row clearfix">
							
							<!-- Footer Column -->
							<div class="footer-column col-lg-5 col-md-6 col-sm-12">
								<div class="footer-widget instagram-widget">
									<h4>Galerie</h4>
									<div class="widget-content">
										<div class="images-outer clearfix">
											<!--Image Box-->
											<figure class="image-box"><a class="lightbox-image" href="/intime/images/gallery/1.jpg"><img src="/intime/images/gallery/footer-gallery-thumb-1.jpg" alt="Galerie Kalystrat — réalisation 1"></a></figure>
											<!--Image Box-->
											<figure class="image-box"><a class="lightbox-image" href="/intime/images/gallery/2.jpg"><img src="/intime/images/gallery/footer-gallery-thumb-2.jpg" alt="Galerie Kalystrat — réalisation 2"></a></figure>
											<!--Image Box-->
											<figure class="image-box"><a class="lightbox-image" href="/intime/images/gallery/3.jpg"><img src="/intime/images/gallery/footer-gallery-thumb-3.jpg" alt="Galerie Kalystrat — réalisation 3"></a></figure>
											<!--Image Box-->
											<figure class="image-box"><a class="lightbox-image" href="/intime/images/gallery/4.jpg"><img src="/intime/images/gallery/footer-gallery-thumb-4.jpg" alt="Galerie Kalystrat — réalisation 4"></a></figure>
											<!--Image Box-->
											<figure class="image-box"><a class="lightbox-image" href="/intime/images/gallery/5.jpg"><img src="/intime/images/gallery/footer-gallery-thumb-5.jpg" alt="Galerie Kalystrat — réalisation 5"></a></figure>
											<!--Image Box-->
											<figure class="image-box"><a class="lightbox-image" href="/intime/images/gallery/6.jpg"><img src="/intime/images/gallery/footer-gallery-thumb-6.jpg" alt="Galerie Kalystrat — réalisation 6"></a></figure>
										</div>
									</div>
								</div>
							</div>

							<!-- Footer Column -->
							<div class="footer-column col-lg-7 col-md-6 col-sm-12">
								<div class="footer-widget news-widget">
									<h4>Actualités</h4>
									<!--News Widget Block-->
									<div class="news-widget-block">
										<div class="news-widget_image">
											<img src="/intime/images/resource/news-widget-1.jpg" alt="Article — Bâtir ensemble : six métiers, une marque" />
										</div>
										<div class="news-widget_post-date">Nov 08, 2020</div>
										<h5 class="news-widget_title"><a href="/blog">Bâtir ensemble : six métiers, une marque</a></h5>
									</div>
									
									<!--News Widget Block-->
									<div class="news-widget-block">
										<div class="news-widget_image">
											<img src="/intime/images/resource/news-widget-2.jpg" alt="Article — Pénurie de main-d'œuvre, Kalystrat Placement" />
										</div>
										<div class="news-widget_post-date">Nov 08, 2020</div>
										<h5 class="news-widget_title"><a href="/blog">Pénurie de main-d&apos;œuvre : Kalystrat Placement</a></h5>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					
				</div>
			</div>
			
		</div>
		<div class="footer-bottom">
			<div class="auto-container">
				<div class="inner-container">
					<div class="d-flex justify-content-between align-items-center flex-wrap">
						
						<!-- Logo Box -->
						<div class="logo"><a href="/" aria-label="Kalystrat — accueil"><img src="/intime/images/logo-6.png" alt="Logo Kalystrat" title="Kalystrat"></a></div>

						<div class="copyright">&copy; 2026 Gestion Kalystrat Inc. Tous droits réservés.</div>
						
					</div>
				</div>
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
