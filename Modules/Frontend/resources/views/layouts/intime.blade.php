<!DOCTYPE html>
<html lang="fr-CA">
<head>
<meta charset="utf-8">
<title>@yield('title', 'Kalystrat — Holding québécois de construction à intégration verticale')</title>
@stack('meta')

{{-- Organization JSON-LD global (toutes pages) --}}
<script type="application/ld+json">@php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'Gestion Kalystrat Inc.',
    'alternateName' => 'Kalystrat',
    'url' => 'https://kalystrat.ca',
    'logo' => url('/intime/images/logo.png'),
    'foundingDate' => '2024',
    'founder' => ['@type' => 'Person', 'name' => 'Ali Salomon', 'jobTitle' => 'Président et Directeur Général'],
    'address' => ['@type' => 'PostalAddress', 'addressLocality' => 'Québec', 'addressRegion' => 'QC', 'addressCountry' => 'CA'],
    'contactPoint' => ['@type' => 'ContactPoint', 'contactType' => 'customer service', 'email' => 'info@kalystrat.ca', 'areaServed' => 'CA', 'availableLanguage' => ['French', 'English']],
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
<link href="/intime/css/bootstrap.css" rel="stylesheet">
<link href="/intime/css/style.css" rel="stylesheet">
<link href="/intime/css/responsive.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:wght@400;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<link rel="shortcut icon" href="/intime/images/favicon.png" type="image/x-icon">
<link rel="icon" href="/intime/images/favicon.png" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

</head>

<body>
 
<div class="page-wrapper">
	
    <!-- Preloader -->
    <div class="preloader"></div>
	<!-- End Preloader -->
 	
 	<!-- Main Header / Header Style Four -->
    <header class="main-header header-style-six">
    	
		<!-- Header Upper -->
        <div class="header-upper">
            <div class="auto-container">
				<div class="inner-container d-flex justify-content-between align-items-center flex-wrap">
					<!-- Logo Box -->
					<div class="logo"><a href="/"><img src="/intime/images/logo-6.png" alt="" title=""></a></div>
					
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
											<li><a href="/filiales">Vue d'ensemble</a></li>
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
									<li class="dropdown"><a href="/faq">Ressources</a>
										<ul>
											<li><a href="/faq">FAQ</a></li>
											<li><a href="/glossaire">Glossaire</a></li>
											<li><a href="/blog">Blog</a></li>
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
						<a href="/" title=""><img src="/intime/images/logo-6.png" alt="" title=""></a>
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
                <div class="nav-logo"><a href="/"><img src="/intime/images/logo.png" alt="" title=""></a></div>
				<!-- Search -->
				<div class="search-box">
					<form method="post" action="contact.html">
						<div class="form-group">
							<input type="search" name="search-field" value="" placeholder="SEARCH HERE" required>
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
    @yield('content')

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
										<input type="email" name="search-field" value="" placeholder="Votre courriel" required>
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
									<div class="text">Holding québécois de construction à intégration verticale. Six filiales spécialisées sous une marque unifiée — du chantier à la livraison.</div>
									<!-- Social Box -->
									<ul class="footer-six_social-box">
										<li class="facebook"><a href="https://www.twitter.com/" class="fa-brands fa-facebook-f fa-fw"></a></li>
										<li class="twitter"><a href="https://www.facebook.com/" class="fa-brands fa-twitter fa-fw"></a></li>
										<li class="facebook"><a href="https://instagram.com/" class="fa-solid fa-instagram fa-fw"></a></li>
										<li class="youtube"><a href="https://www.youtube.com/" class="fa-brands fa-youtube fa-fw"></a></li>
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
											<figure class="image-box"><a class="lightbox-image" href="/intime/images/gallery/1.jpg"><img src="/intime/images/gallery/footer-gallery-thumb-1.jpg" alt=""></a></figure>
											<!--Image Box-->
											<figure class="image-box"><a class="lightbox-image" href="/intime/images/gallery/2.jpg"><img src="/intime/images/gallery/footer-gallery-thumb-2.jpg" alt=""></a></figure>
											<!--Image Box-->
											<figure class="image-box"><a class="lightbox-image" href="/intime/images/gallery/3.jpg"><img src="/intime/images/gallery/footer-gallery-thumb-3.jpg" alt=""></a></figure>
											<!--Image Box-->
											<figure class="image-box"><a class="lightbox-image" href="/intime/images/gallery/4.jpg"><img src="/intime/images/gallery/footer-gallery-thumb-4.jpg" alt=""></a></figure>
											<!--Image Box-->
											<figure class="image-box"><a class="lightbox-image" href="/intime/images/gallery/5.jpg"><img src="/intime/images/gallery/footer-gallery-thumb-5.jpg" alt=""></a></figure>
											<!--Image Box-->
											<figure class="image-box"><a class="lightbox-image" href="/intime/images/gallery/6.jpg"><img src="/intime/images/gallery/footer-gallery-thumb-6.jpg" alt=""></a></figure>
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
											<img src="/intime/images/resource/news-widget-1.jpg" alt="" />
										</div>
										<div class="news-widget_post-date">Nov 08, 2020</div>
										<h6 class="news-widget_title"><a href="/blog">Bâtir ensemble : six métiers, une marque</a></h6>
									</div>
									
									<!--News Widget Block-->
									<div class="news-widget-block">
										<div class="news-widget_image">
											<img src="/intime/images/resource/news-widget-2.jpg" alt="" />
										</div>
										<div class="news-widget_post-date">Nov 08, 2020</div>
										<h6 class="news-widget_title"><a href="/blog">Pénurie de main-d&apos;œuvre : Kalystrat Placement</a></h6>
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
						<div class="logo"><a href="/"><img src="/intime/images/logo-6.png" alt="" title=""></a></div>

						<div class="copyright">2023 &copy; All rights reserved by <a href="#">Themexriver</a>copy; 2026 Gestion Kalystrat Inc. Tous droits réservés.</div>
						
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer -->

	<!-- Search Popup -->
	<div class="search-popup">
		<div class="color-layer"></div>
		<button class="close-search"><span class="fas fa-times fa-fw"></span></button>
		<form method="post" action="blog.html">
			<div class="form-group">
				<input type="search" name="search-field" value="" placeholder="Rechercher..." required="">
				<button type="submit"><i class="flaticon-search"></i></button>
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

</body>
