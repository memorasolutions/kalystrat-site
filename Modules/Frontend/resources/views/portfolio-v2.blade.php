@extends('frontend::layout-v2')

@section('title', 'Portfolio — Premiers chantiers à venir | Kalystrat')
@section('meta_description', 'Holding nouvellement constitué — premiers chantiers Kalystrat à venir. 6 filiales spécialisées en construction au Québec.')

@section('content')

@include('frontend::partials-v2.breadcumb-v2', [
    'pageTitle' => 'Portfolio',
    'breadcumbItems' => [
        ['label' => 'Accueil', 'url' => route('frontend.home')],
        ['label' => 'Portfolio', 'url' => null]
    ]
])

<section class="space-top">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title text-theme">RÉALISATIONS</span>
            <h2 class="sec-title">Premiers chantiers à venir</h2>
            <p>Gestion Kalystrat Inc. est un holding nouvellement constitué. Nos six filiales spécialisées entament leurs premiers projets de construction au Québec.</p>
        </div>
    </div>
</section>

<div class="portfolio-area-5 space overflow-hidden">
    <div class="container">
        <div class="row gy-30 gx-30">
            @foreach($filiales as $slug => $f)
            <div class="col-lg-{{ $loop->first ? '8' : '4' }} col-md-6">
                <div class="portfolio-card style5">
                    <div class="portfolio-card-thumb">
                        <img src="{{ asset('assets/construz-new/img/project/project5_' . (($loop->iteration - 1) % 5 + 1) . '.png') }}" alt="img">
                    </div>
                    <div class="portfolio-card-details">
                        <div class="media-left">
                            <span class="portfolio-card-subtitle">{{ $f['nom_court'] }}</span>
                            <h4 class="portfolio-card-title"><a href="{{ route('frontend.filiale', $slug) }}">Premiers chantiers à venir</a></h4>
                        </div>
                        <div class="btn-group">
                            <a href="{{ route('frontend.filiale', $slug) }}" class="btn style2">Découvrir filiale <i class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="cta-area-5 space-bottom">
    <div class="container">
        <div class="cta-wrap5" data-bg-src="{{ asset('assets/construz-new/img/bg/cta-bg5-1.png') }}" style="background-image: url('{{ asset('assets/construz-new/img/bg/cta-bg5-1.png') }}');">
            <h4 class="cta-title text-white">Vous avez un projet en tête ?</h4>
            <a class="btn style4" href="{{ route('frontend.contact') }}">CONTACTEZ-NOUS <i class="ri-arrow-right-up-line"></i></a>
        </div>
    </div>
</div>

@endsection
