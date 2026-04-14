<!DOCTYPE html>
<html lang="fr" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $__env->yieldContent('title', 'Kalystrat - Strategic Construction & Development'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Kalystrat offre des solutions stratégiques en construction et développement immobilier à Québec.'); ?>">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="theme-color" content="#0A1628">

    
    <meta property="og:title" content="<?php echo $__env->yieldContent('og_title', 'Kalystrat - Strategic Construction & Development'); ?>">
    <meta property="og:description" content="<?php echo $__env->yieldContent('meta_description', 'Construction stratégique et développement immobilier à Québec.'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <meta property="og:image" content="<?php echo $__env->yieldContent('og_image', asset('assets/img/kalystrat/og-image.jpg')); ?>">
    <meta property="og:site_name" content="Kalystrat">
    <meta property="og:locale" content="fr_CA">

    
    <link rel="canonical" href="<?php echo e(url()->current()); ?>">

    
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('assets/img/kalystrat/favicon.png')); ?>">

    
    <style>
        @font-face {
            font-family: 'Akzidenz Grotesk';
            src: url('<?php echo e(asset("assets/fonts/AkzidenzGrotesk-Light.otf")); ?>') format('opentype');
            font-weight: 300;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Akzidenz Grotesk';
            src: url('<?php echo e(asset("assets/fonts/AkzidenzGrotesk-Regular.otf")); ?>') format('opentype');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Akzidenz Grotesk';
            src: url('<?php echo e(asset("assets/fonts/AkzidenzGrotesk-Medium.otf")); ?>') format('opentype');
            font-weight: 500;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Akzidenz Grotesk';
            src: url('<?php echo e(asset("assets/fonts/AkzidenzGrotesk-Bold.otf")); ?>') format('opentype');
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Akzidenz Grotesk';
            src: url('<?php echo e(asset("assets/fonts/AkzidenzGrotesk-LightItalic.otf")); ?>') format('opentype');
            font-weight: 300;
            font-style: italic;
            font-display: swap;
        }
    </style>

    
    <link rel="stylesheet" href="<?php echo e(asset('assets/construz/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/construz/fonts/remixicon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/construz/css/magnific-popup.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/construz/css/slick.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/construz/css/nice-select.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/construz/css/style.css')); ?>">

    
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/kalystrat.css')); ?>">

    
    <?php echo $__env->make('frontend::partials.schema-jsonld', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>

    
    <a class="skip-link visually-hidden-focusable" href="#main-content">Aller au contenu principal</a>

    
    <div class="preloader">
        <button class="btn preloaderCls" aria-label="Fermer le préchargement">
            <i class="ri-close-line"></i>
        </button>
        <div class="preloader-wrap">
            <div class="loading loading04">
                <span>K</span><span>A</span><span>L</span><span>Y</span><span>S</span><span>T</span><span>R</span><span>A</span><span>T</span>
            </div>
        </div>
    </div>

    
    <header class="nav-header header-layout1">
        <div class="header-top">
            <div class="container">
                <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                    <div class="col-auto d-none d-lg-block">
                        <div class="header-top-left">
                            <div class="header-links">
                                <ul>
                                    <li>
                                        <div class="social-links">
                                            <a href="#" aria-label="Facebook"><i class="ri-facebook-fill"></i></a>
                                            <a href="#" aria-label="LinkedIn"><i class="ri-linkedin-fill"></i></a>
                                            <a href="#" aria-label="Instagram"><i class="ri-instagram-line"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="header-top-right">
                            <div class="header-links ps-0">
                                <ul>
                                    <li><i class="ri-phone-line"></i><a href="tel:4184760987">418-476-0987</a></li>
                                    <li><i class="ri-mail-line"></i><a href="mailto:info@kalystrat.ca">info@kalystrat.ca</a></li>
                                    <li><i class="ri-map-pin-line"></i>Québec, QC</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-wrapper">
            <div class="menu-area">
                <div class="header-navbar-logo">
                    <a href="<?php echo e(route('frontend.home')); ?>"><img src="<?php echo e(asset('assets/img/kalystrat/logo-header.svg')); ?>" alt="Kalystrat"></a>
                </div>
                <div class="logo-bg"></div>
                <div class="container">
                    <div class="row align-items-center justify-content-lg-start justify-content-between">
                        <div class="col-auto d-xxl-none d-block">
                            <div class="header-logo">
                                <a href="<?php echo e(route('frontend.home')); ?>"><img src="<?php echo e(asset('assets/img/kalystrat/logo-header.svg')); ?>" alt="Kalystrat"></a>
                            </div>
                        </div>
                        <div class="col-auto ms-auto ms-xxl-0">
                            <nav class="main-menu d-none d-lg-inline-block" aria-label="Navigation principale">
                                <ul>
                                    <li>
                                        <a href="<?php echo e(route('frontend.home')); ?>" class="<?php echo e(request()->routeIs('frontend.home') ? 'active' : ''); ?>">ACCUEIL</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('frontend.about')); ?>" class="<?php echo e(request()->routeIs('frontend.about') ? 'active' : ''); ?>">À PROPOS</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('frontend.services')); ?>" class="<?php echo e(request()->routeIs('frontend.services*') ? 'active' : ''); ?>">SERVICES</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('frontend.portfolio')); ?>" class="<?php echo e(request()->routeIs('frontend.portfolio*') ? 'active' : ''); ?>">PORTFOLIO</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('frontend.contact')); ?>" class="<?php echo e(request()->routeIs('frontend.contact') ? 'active' : ''); ?>">CONTACT</a>
                                    </li>
                                </ul>
                            </nav>
                            <div class="navbar-right d-inline-flex d-lg-none">
                                <button type="button" class="menu-toggle icon-btn" aria-label="Ouvrir le menu"><i class="ri-menu-line"></i></button>
                            </div>
                        </div>
                        <div class="col-auto ms-auto d-xl-block d-none">
                            <div class="header-button">
                                <a href="<?php echo e(route('frontend.contact')); ?>" class="btn">SOUMISSION GRATUITE <i class="ri-arrow-right-up-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar-right-desc d-xxl-flex d-none">
                    <div class="icon-btn">
                        <i class="ri-phone-fill"></i>
                    </div>
                    <div class="navbar-right-desc-details">
                        <h6 class="title">Appelez-nous</h6>
                        <a class="link" href="tel:4184760987">418-476-0987</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-area">
            <div class="mobile-logo">
                <a href="<?php echo e(route('frontend.home')); ?>"><img src="<?php echo e(asset('assets/img/kalystrat/logo-header.svg')); ?>" alt="Kalystrat"></a>
                <button class="menu-toggle" aria-label="Fermer le menu"><i class="ri-close-line"></i></button>
            </div>
            <div class="mobile-menu">
                <ul>
                    <li><a href="<?php echo e(route('frontend.home')); ?>">Accueil</a></li>
                    <li><a href="<?php echo e(route('frontend.about')); ?>">À propos</a></li>
                    <li><a href="<?php echo e(route('frontend.services')); ?>">Services</a></li>
                    <li><a href="<?php echo e(route('frontend.portfolio')); ?>">Portfolio</a></li>
                    <li><a href="<?php echo e(route('frontend.contact')); ?>">Contact</a></li>
                </ul>
            </div>
            <div class="mobile-menu-bottom">
                <a href="<?php echo e(route('frontend.contact')); ?>" class="btn w-100">Soumission gratuite</a>
            </div>
        </div>
    </div>

    
    <?php if (! empty(trim($__env->yieldContent('breadcrumb')))): ?>
        <div class="breadcrumb-wrapper" data-bg-src="<?php echo e(asset('assets/construz/img/bg/breadcrumb-bg.jpg')); ?>">
            <div class="container">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-title"><?php echo $__env->yieldContent('breadcrumb_title'); ?></h1>
                    <ul class="breadcrumb-menu">
                        <li><a href="<?php echo e(route('frontend.home')); ?>">Accueil</a></li>
                        <?php echo $__env->yieldContent('breadcrumb'); ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <main id="main-content" role="main">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    
    <footer class="footer-wrapper footer-layout1">
        <div class="container">
            <div class="footer-top-1">
                <div class="footer-logo">
                    <a href="<?php echo e(route('frontend.home')); ?>"><img src="<?php echo e(asset('assets/img/kalystrat/logo-white.svg')); ?>" alt="Kalystrat" style="max-width: 200px; height: auto;"></a>
                </div>
                <div class="subscribe-box">
                    <p class="subscribe-box_text">Restez informé des dernières nouvelles et tendances en construction stratégique.</p>
                </div>
            </div>
            <div class="widget-area">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-3">
                        <div class="widget widget-about footer-widget">
                            <h3 class="widget_title">À propos</h3>
                            <p class="about-text">Construction stratégique et développement immobilier à Québec. Chaque projet commence par une stratégie.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Liens rapides</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li><a href="<?php echo e(route('frontend.home')); ?>">Accueil</a></li>
                                    <li><a href="<?php echo e(route('frontend.about')); ?>">À propos</a></li>
                                    <li><a href="<?php echo e(route('frontend.services')); ?>">Services</a></li>
                                    <li><a href="<?php echo e(route('frontend.portfolio')); ?>">Portfolio</a></li>
                                    <li><a href="<?php echo e(route('frontend.contact')); ?>">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget widget-contact">
                            <h3 class="widget_title">Coordonnées</h3>
                            <p class="contact-text">Québec, QC, Canada</p>
                            <h3 class="widget_title">Courriel</h3>
                            <p class="footer-text"><a href="mailto:info@kalystrat.ca">info@kalystrat.ca</a></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">Téléphone</h3>
                            <p class="footer-text">
                                <a href="tel:4184760987">418-476-0987</a>
                            </p>
                            <h3 class="widget_title">Suivez-nous</h3>
                            <div class="social-btn style2">
                                <a href="#" aria-label="Facebook"><i class="ri-facebook-fill"></i></a>
                                <a href="#" aria-label="LinkedIn"><i class="ri-linkedin-fill"></i></a>
                                <a href="#" aria-label="Instagram"><i class="ri-instagram-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright-wrap">
                <div class="row gy-3 justify-content-md-between justify-content-center">
                    <div class="col-auto align-self-center">
                        <p class="copyright-text text-center">&copy; <?php echo e(date('Y')); ?> Kalystrat. Tous droits réservés.</p>
                    </div>
                    <div class="col-auto">
                        <div class="footer-links">
                            <span class="text-white">Construit par <a href="https://memora.solutions" target="_blank" rel="noopener noreferrer">MEMORA solutions</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    
    <div class="scroll-top" role="button" aria-label="Retour en haut de page" tabindex="0">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102" role="img" aria-hidden="true">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
        </svg>
    </div>

    
    <div class="d-lg-none position-fixed bottom-0 start-0 end-0 p-3 bg-white shadow-lg" style="z-index: 999;">
        <a href="<?php echo e(route('frontend.contact')); ?>" class="btn w-100 text-center">SOUMISSION GRATUITE <i class="ri-arrow-right-up-line"></i></a>
    </div>

    
    <script src="<?php echo e(asset('assets/construz/js/vendor/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/construz/js/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/construz/js/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/construz/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/construz/js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/construz/js/jquery.counterup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/construz/js/jquery.marquee.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/construz/js/imagesloaded.pkgd.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/construz/js/isotope.pkgd.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/construz/js/nice-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/construz/js/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/construz/js/waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/construz/js/main.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH /Users/stephanelapointe/__IA__/_____SERVEUR_____/site_internet/kalystrat/Modules/Frontend/resources/views/layout.blade.php ENDPATH**/ ?>