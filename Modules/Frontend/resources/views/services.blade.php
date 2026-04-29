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
                    $bentoBgs_services = [
                        'fondations' => 'assets/img/kalystrat/project-blueprint.jpg',
                        'structure'  => 'assets/img/kalystrat/project-residential.jpg',
                        'toiture'    => 'assets/img/kalystrat/project-apartments.jpg',
                        'finition'   => 'assets/img/kalystrat/about-strategy.jpg',
                        'immobilier' => 'assets/img/kalystrat/project-commercial.jpg',
                        'placement'  => 'assets/img/kalystrat/about-meeting.jpg',
                    ];
                @endphp
                @foreach ($filiales_services as $slug => $f)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->iteration }}s">
                        <a href="{{ route('kalystrat.filiale', $slug) }}" class="service-card-bento" style="--accent: {{ $f['hex_couleur'] }}; background-image: url('{{ asset($bentoBgs_services[$slug] ?? 'assets/img/kalystrat/hero-skyline.jpg') }}');" aria-label="Découvrir {{ $f['nom_complet'] }}">
                            <div>
                                <h3>{{ $f['nom_court'] }}</h3>
                                <p>{{ $f['specialite'] }}</p>
                            </div>
                            <span class="bento-link">Découvrir <i class="ri-arrow-right-line" aria-hidden="true"></i></span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Méthodologie construction --}}
    <section class="space-top space-bottom bg-smoke">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title"><i class="ri-focus-2-line" aria-hidden="true"></i> NOTRE MÉTHODOLOGIE</span>
                <h2 class="sec-title">Du plan au chantier livré</h2>
                <p>Une approche structurée pour piloter chaque projet de construction de bout en bout, en coordonnant nos six filiales sous une gouvernance unique.</p>
            </div>
            <div class="row gx-30 gy-30 text-center">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="process-box">
                        <div class="process-number">01</div>
                        <h3 class="h5">Planification</h3>
                        <p>Évaluation du terrain, étude des besoins, analyse réglementaire (RBQ, code du bâtiment) et estimation budgétaire intégrée par filiale.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="process-box">
                        <div class="process-number">02</div>
                        <h3 class="h5">Conception</h3>
                        <p>Plans architecturaux, ingénierie structurale et mécanique, choix des matériaux, validation conformité et permis de construction.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="process-box">
                        <div class="process-number">03</div>
                        <h3 class="h5">Réalisation</h3>
                        <p>Excavation, fondations, structure, toiture, finition. Six filiales coordonnées par notre équipe centrale, main-d'œuvre interne via Placement.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="process-box">
                        <div class="process-number">04</div>
                        <h3 class="h5">Livraison</h3>
                        <p>Inspection finale, mise en service, remise des clés et accompagnement post-livraison. Garanties prolongées sur les éléments structuraux.</p>
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
                <a href="{{ route('contact') }}" class="btn wow fadeInUp" data-wow-delay="0.2s" aria-label="Contacter Kalystrat pour explorer vos opportunités">NOUS CONTACTER <i class="ri-arrow-right-up-line" aria-hidden="true"></i></a>
            </div>
        </div>
    </section>
@endsection
