@extends('frontend::layout')

@section('title', 'Services - Kalystrat')
@section('meta_description', 'Découvrez les services de construction stratégique de Kalystrat : construction résidentielle, développement immobilier, gestion de projets et plus.')
@section('breadcrumb_title', 'Services')
@section('breadcrumb')
    <li>Services</li>
@endsection

@section('content')
    {{-- Services grid --}}
    <section class="space-top space-bottom">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title"><i class="ri-focus-2-line"></i> NOS SERVICES</span>
                <h2 class="sec-title">Ce que nous offrons</h2>
            </div>
            <div class="row gx-30 gy-30">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-card">
                        <div class="service-card_icon">
                            <i class="ri-home-heart-line"></i>
                        </div>
                        <h3 class="service-card_title">Construction résidentielle</h3>
                        <p class="service-card_text">Nous bâtissons votre rêve. Des maisons personnalisées conçues pour le confort et la durabilité, adaptées à votre style de vie.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-card">
                        <div class="service-card_icon">
                            <i class="ri-building-line"></i>
                        </div>
                        <h3 class="service-card_title">Développement immobilier</h3>
                        <p class="service-card_text">Nous transformons les visions en réalités tangibles. Projets immobiliers innovants qui façonnent l'avenir de Québec.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-card">
                        <div class="service-card_icon">
                            <i class="ri-bar-chart-box-line"></i>
                        </div>
                        <h3 class="service-card_title">Gestion de projets</h3>
                        <p class="service-card_text">Une gestion experte pour assurer que chaque projet se déroule sans accroc, dans les temps et le budget impartis.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="service-card">
                        <div class="service-card_icon">
                            <i class="ri-refresh-line"></i>
                        </div>
                        <h3 class="service-card_title">Rénovation stratégique</h3>
                        <p class="service-card_text">Modernisez et valorisez votre espace. Des rénovations pensées pour améliorer la fonctionnalité et l'esthétique.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-card">
                        <div class="service-card_icon">
                            <i class="ri-lightbulb-flash-line"></i>
                        </div>
                        <h3 class="service-card_title">Consultation</h3>
                        <p class="service-card_text">Bénéficiez de notre expertise pour prendre les meilleures décisions stratégiques pour vos projets de construction.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="service-card">
                        <div class="service-card_icon">
                            <i class="ri-layout-line"></i>
                        </div>
                        <h3 class="service-card_title">Design et architecture</h3>
                        <p class="service-card_text">Des concepts architecturaux innovants et fonctionnels, créés pour répondre à vos besoins spécifiques.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Process --}}
    <section class="space-top space-bottom bg-smoke">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title"><i class="ri-focus-2-line"></i> NOTRE PROCESSUS</span>
                <h2 class="sec-title">Comment nous travaillons</h2>
            </div>
            <div class="row gx-30 gy-30 text-center">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="process-box">
                        <div class="process-number">01</div>
                        <h5>Consultation</h5>
                        <p>Définition de vos besoins et objectifs.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="process-box">
                        <div class="process-number">02</div>
                        <h5>Planification</h5>
                        <p>Élaboration du plan stratégique détaillé.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="process-box">
                        <div class="process-number">03</div>
                        <h5>Exécution</h5>
                        <p>Réalisation du projet avec expertise.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="process-box">
                        <div class="process-number">04</div>
                        <h5>Livraison</h5>
                        <p>Remise du projet finalisé et suivi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="space-top space-bottom">
        <div class="container">
            <div class="cta-wrap2 text-center">
                <h2 class="title wow fadeInUp">Prêt à concrétiser votre projet?</h2>
                <p class="wow fadeInUp" data-wow-delay="0.1s">Contactez-nous dès aujourd'hui pour une consultation gratuite et découvrez comment Kalystrat peut transformer votre vision en réalité.</p>
                <a href="{{ route('frontend.contact') }}" class="btn wow fadeInUp" data-wow-delay="0.2s">CONTACTEZ-NOUS <i class="ri-arrow-right-up-line"></i></a>
            </div>
        </div>
    </section>
@endsection
