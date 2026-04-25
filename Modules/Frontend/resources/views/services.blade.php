@extends('frontend::layout')

@section('title', 'Notre approche - Kalystrat')
@section('meta_description', 'Découvrez l\'approche stratégique de Kalystrat : développement immobilier, gestion d\'actifs, investissement, consultation et acquisition.')
@section('breadcrumb_title', 'Notre approche')
@section('breadcrumb')
    <li>Notre approche</li>
@endsection

@section('content')
    {{-- Services grid --}}
    <section class="space-top space-bottom">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title"><i class="ri-focus-2-line" aria-hidden="true"></i> CE QUE NOUS FAISONS</span>
                <h2 class="sec-title">Investissement stratégique et développement</h2>
                <p>Kalystrat conçoit, structure et pilote des opérations d'investissement à forte valeur ajoutée. Notre approche couvre l'ensemble du cycle de vie des actifs.</p>
            </div>
            <div class="row gx-30 gy-30">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-card">
                        <div class="service-card_icon"><i class="ri-building-4-line" aria-hidden="true"></i></div>
                        <h3 class="service-card_title">Développement immobilier</h3>
                        <p class="service-card_text">Nous identifions, structurons et développons des actifs immobiliers stratégiques à fort potentiel. Notre expertise couvre le tertiaire, résidentiel, mixte et logistique.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-card">
                        <div class="service-card_icon"><i class="ri-bar-chart-grouped-line" aria-hidden="true"></i></div>
                        <h3 class="service-card_title">Gestion d'actifs</h3>
                        <p class="service-card_text">Nous assurons la gestion opérationnelle et financière de portefeuilles diversifiés. Objectif : maximiser la performance et la valeur patrimoniale sur le long terme.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-card">
                        <div class="service-card_icon"><i class="ri-funds-line" aria-hidden="true"></i></div>
                        <h3 class="service-card_title">Investissement stratégique</h3>
                        <p class="service-card_text">Nous déployons des capitaux dans des opérations ciblées à haute valeur ajoutée. Analyse rigoureuse des fondamentaux et des leviers de création de valeur.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="service-card">
                        <div class="service-card_icon"><i class="ri-layout-masonry-line" aria-hidden="true"></i></div>
                        <h3 class="service-card_title">Gestion de projets</h3>
                        <p class="service-card_text">Nous pilotons des projets complexes de bout en bout en coordonnant l'ensemble des parties prenantes. Rigueur méthodologique, respect des délais et des budgets.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-card">
                        <div class="service-card_icon"><i class="ri-lightbulb-flash-line" aria-hidden="true"></i></div>
                        <h3 class="service-card_title">Consultation stratégique</h3>
                        <p class="service-card_text">Nous accompagnons dirigeants et investisseurs dans leurs décisions stratégiques. Analyses approfondies et recommandations sur mesure en allocation de capital.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="service-card">
                        <div class="service-card_icon"><i class="ri-exchange-line" aria-hidden="true"></i></div>
                        <h3 class="service-card_title">Acquisition et restructuration</h3>
                        <p class="service-card_text">Nous identifions des opportunités d'acquisition et orchestrons des opérations de restructuration. Due diligence, négociation et intégration post-acquisition.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Process --}}
    <section class="space-top space-bottom bg-smoke">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title"><i class="ri-focus-2-line" aria-hidden="true"></i> NOTRE PROCESSUS</span>
                <h2 class="sec-title">Notre méthodologie</h2>
                <p>Une approche structurée et éprouvée pour sécuriser chaque étape du cycle d'investissement et maximiser la création de valeur.</p>
            </div>
            <div class="row gx-30 gy-30 text-center">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="process-box">
                        <div class="process-number">01</div>
                        <h3 class="h5">Analyse et sourcing</h3>
                        <p>Veille active des marchés, identification des opportunités et analyse approfondie des fondamentaux selon des critères de rendement et de risque.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="process-box">
                        <div class="process-number">02</div>
                        <h5>Structuration</h5>
                        <p>Conception de la structure juridique, financière et opérationnelle optimale. Montages sur mesure alignant les intérêts de toutes les parties.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="process-box">
                        <div class="process-number">03</div>
                        <h5>Exécution</h5>
                        <p>Pilotage rigoureux de la mise en œuvre. Coordination des équipes, suivi des indicateurs de performance et gestion proactive des risques.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="process-box">
                        <div class="process-number">04</div>
                        <h5>Valorisation</h5>
                        <p>Optimisation continue de la valeur des actifs sous gestion. Stratégies de valorisation active pour maximiser les rendements.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="space-top space-bottom">
        <div class="container">
            <div class="cta-wrap2 text-center">
                <h2 class="title wow fadeInUp">Explorons ensemble vos opportunités</h2>
                <p class="wow fadeInUp" data-wow-delay="0.1s">Vous avez un projet d'investissement, un actif à valoriser ou une vision stratégique à concrétiser? Nos équipes sont à votre disposition.</p>
                <a href="{{ route('frontend.contact') }}" class="btn wow fadeInUp" data-wow-delay="0.2s" aria-label="Contacter Kalystrat pour explorer vos opportunités">NOUS CONTACTER <i class="ri-arrow-right-up-line" aria-hidden="true"></i></a>
            </div>
        </div>
    </section>
@endsection
