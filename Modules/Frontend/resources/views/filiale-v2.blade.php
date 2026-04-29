@extends('frontend::layout-v2')

@section('title', $title)
@section('meta_description', $filiale['nom_complet'] . ' — ' . $filiale['specialite'] . '. Filiale Kalystrat. Soumission gratuite Québec.')

@section('content')

@include('frontend::partials-v2.breadcumb-v2', [
    'pageTitle' => $filiale['nom_complet'],
    'breadcumbItems' => [
        ['label' => 'Accueil', 'url' => route('index')],
        ['label' => 'Nos filiales', 'url' => route('service')],
        ['label' => $filiale['nom_court'], 'url' => null]
    ]
])

<section class="service-details-area space-top space-bottom">
    <div class="container">
        <div class="row gx-50">
            <div class="col-lg-12">
                <div class="title-area mb-40">
                    <span class="sub-title text-theme" style="color: {{ $filiale['hex_couleur'] }};">SPÉCIALITÉ</span>
                    <h2 class="sec-title">{{ $filiale['nom_complet'] }}</h2>
                    <p class="lead">{{ $filiale['specialite'] }}</p>
                </div>
            </div>
        </div>
        <div class="row gy-50">
            <div class="col-lg-6">
                <div class="service-feature-wrap">
                    <h3 class="h4">Services offerts</h3>
                    <ul class="checklist">
                        @foreach($filiale['services'] as $service)
                        <li><i class="ri-check-line" style="color: {{ $filiale['hex_couleur'] }};"></i> {{ $service }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service-feature-wrap">
                    <h3 class="h4">Clientèles cibles</h3>
                    <ul class="checklist">
                        @foreach($filiale['cibles'] as $cible)
                        <li><i class="ri-arrow-right-line" style="color: {{ $filiale['hex_couleur'] }};"></i> {{ $cible }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="cta-area-5 space-bottom">
    <div class="container">
        <div class="cta-wrap5" style="background: linear-gradient(135deg, {{ $filiale['hex_couleur'] }}d0 0%, #0A1628 100%);">
            <h4 class="cta-title text-white">Démarrez votre projet avec {{ $filiale['nom_court'] }}</h4>
            <a class="btn style4" href="{{ route('contact') }}" style="background: {{ $filiale['hex_couleur'] }};">DEMANDER UNE SOUMISSION <i class="ri-arrow-right-up-line"></i></a>
        </div>
    </div>
</div>

@endsection
