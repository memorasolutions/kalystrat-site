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
                <span class="sub-title"><i class="ri-focus-2-line" aria-hidden="true"></i> NOTRE APPROCHE INTÉGRÉE</span>
                <h2 class="sec-title">Six filiales spécialisées en synergie</h2>
                <p>De l'excavation aux finitions intérieures, nos six filiales construction couvrent l'intégralité de la chaîne de valeur d'un bâtiment, soutenues par une agence de placement de main-d'œuvre interne. Cette intégration verticale élimine les sous-traitants et garantit délais, qualité et coûts maîtrisés.</p>
            </div>
            <div class="row gx-30 gy-30">
                @php
                    $filiales_services = require module_path('Frontend', 'config/filiales.php');
                    $icons_services = ['fondations'=>'ri-tools-line','structure'=>'ri-layout-grid-line','toiture'=>'ri-home-2-line','finition'=>'ri-paint-brush-line','immobilier'=>'ri-building-line','placement'=>'ri-team-line'];
                @endphp
                @foreach ($filiales_services as $slug => $f)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->iteration }}s">
                        <div class="service-card" style="border-left: 4px solid {{ $f['hex_couleur'] }};">
                            <div class="service-card_icon" style="color: {{ $f['hex_couleur'] }};"><i class="{{ $icons_services[$slug] ?? 'ri-building-4-line' }}" aria-hidden="true"></i></div>
                            <h3 class="service-card_title">{{ $f['nom_court'] }}</h3>
                            <p class="service-card_text">{{ $f['specialite'] }}</p>
                            <a href="{{ route('frontend.filiale', $slug) }}" class="link-btn" aria-label="Découvrir {{ $f['nom_complet'] }}">Découvrir <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
                        </div>
                    </div>
                @endforeach
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
