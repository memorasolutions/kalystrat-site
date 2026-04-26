@extends('frontend::layout-v2')

@section('title', 'Nos filiales - Kalystrat')
@section('meta_description', '6 filiales spécialisées Kalystrat : Fondations, Structure, Toiture, Finition, Immobilier, Placement Construction. Intégration verticale au Québec.')

@section('content')

@include('frontend::partials-v2.breadcumb-v2', [
    'pageTitle' => 'Nos filiales',
    'breadcumbItems' => [
        ['label' => 'Accueil', 'url' => route('frontend.home')],
        ['label' => 'Nos filiales', 'url' => null]
    ]
])

<div class="service-area-4 space-top overflow-hidden">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="title-area text-center">
                    <span class="sub-title text-theme">NOTRE APPROCHE INTÉGRÉE <i class="ri-arrow-right-down-line"></i></span>
                    <h2 class="sec-title">Six filiales spécialisées en synergie</h2>
                    <p>De l'excavation aux finitions intérieures, nos six filiales couvrent l'intégralité de la chaîne de valeur.</p>
                </div>
            </div>
        </div>
        <div class="row gy-30 gx-30">
            @foreach($filiales as $slug => $f)
            <div class="col-lg-4 col-md-6">
                <div class="service-card style3">
                    <div class="service-card-shadow-text">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
                    <div class="service-card_content">
                        <div class="service-card_icon">
                            @if($slug === 'fondations')<i class="ri-stack-line"></i>
                            @elseif($slug === 'structure')<i class="ri-building-2-line"></i>
                            @elseif($slug === 'toiture')<i class="ri-home-roof-line"></i>
                            @elseif($slug === 'finition')<i class="ri-paint-brush-line"></i>
                            @elseif($slug === 'immobilier')<i class="ri-key-2-line"></i>
                            @elseif($slug === 'placement')<i class="ri-team-line"></i>
                            @endif
                        </div>
                        <h3 class="service-card_title"><a href="{{ route('frontend.filiale', $slug) }}">{{ $f['nom_court'] }}</a></h3>
                        <p class="service-card_text">{{ $f['specialite'] }}</p>
                        <a href="{{ route('frontend.filiale', $slug) }}" class="link-btn">Découvrir <i class="ri-arrow-right-line"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<section class="process-area-1 space-top">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title text-theme">NOTRE MÉTHODOLOGIE</span>
            <h2 class="sec-title">Du plan au chantier livré</h2>
        </div>
        <div class="row gy-30 gx-30">
            <div class="col-lg-3 col-md-6"><div class="process-card text-center"><div class="process-card_number">01</div><h3>Planification</h3><p>Évaluation terrain, étude besoins, RBQ, budget intégré.</p></div></div>
            <div class="col-lg-3 col-md-6"><div class="process-card text-center"><div class="process-card_number">02</div><h3>Conception</h3><p>Plans architecturaux, ingénierie, matériaux, permis.</p></div></div>
            <div class="col-lg-3 col-md-6"><div class="process-card text-center"><div class="process-card_number">03</div><h3>Réalisation</h3><p>Excavation, fondations, structure, toiture, finition.</p></div></div>
            <div class="col-lg-3 col-md-6"><div class="process-card text-center"><div class="process-card_number">04</div><h3>Livraison</h3><p>Inspection finale, remise des clés, garanties.</p></div></div>
        </div>
    </div>
</section>

<div class="cta-area-5 space-bottom space-top">
    <div class="container">
        <div class="cta-wrap5" data-bg-src="{{ asset('assets/construz-new/img/bg/cta-bg5-1.png') }}" style="background-image: url('{{ asset('assets/construz-new/img/bg/cta-bg5-1.png') }}');">
            <h4 class="cta-title text-white">Explorons ensemble vos opportunités</h4>
            <a class="btn style4" href="{{ route('frontend.contact') }}">DEMANDER UNE SOUMISSION <i class="ri-arrow-right-up-line"></i></a>
        </div>
    </div>
</div>

@endsection
