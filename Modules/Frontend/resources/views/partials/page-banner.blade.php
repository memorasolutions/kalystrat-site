{{--
    Page banner réutilisable – Kalystrat
    Usage :
    @include('frontend::partials.page-banner', [
        'title' => 'À propos de Kalystrat',
        'breadcrumbs' => [
            ['label' => 'Accueil', 'url' => route('index')],
            ['label' => 'À propos', 'url' => null], // null = page courante
        ],
        'image' => 'assets/img/kalystrat/hero-skyline.jpg?v=4', // optionnel
    ])

    Hauteur responsive Option E (validée 92/100) :
    - desktop : padding 10rem 0 6rem (≈ 336px)
    - tablet  : padding 7rem 0 4rem  (≈ 256px)
    - mobile  : padding 5rem 0 3rem  (≈ 192px)
--}}
@php
    $bannerImage = $image ?? 'assets/img/kalystrat/hero-skyline.jpg?v=5';
    $bannerTitle = $title ?? 'Page';
    $bannerCrumbs = $breadcrumbs ?? [];
@endphp

<div class="ks-page-banner breadcumb-wrapper"
     style="background-image: url('{{ asset($bannerImage) }}'); background-size: cover; background-position: center; background-color: #0A1628; color: #FFFFFF;"
     role="banner"
     aria-label="En-tête de page : {{ $bannerTitle }}">
    <div class="container">
        <div class="ks-page-banner__content breadcumb-content text-center">
            <h1 class="ks-page-banner__title breadcumb-title">{{ $bannerTitle }}</h1>

            @if(count($bannerCrumbs) > 0)
            <nav aria-label="Fil d'Ariane (breadcrumb)" class="ks-breadcrumb">
                <ul class="ks-page-banner__crumbs breadcumb-menu">
                    @foreach($bannerCrumbs as $i => $crumb)
                        @if(!is_null($crumb['url']) && $i < count($bannerCrumbs) - 1)
                            <li>
                                <a href="{{ $crumb['url'] }}">{{ $crumb['label'] }}</a>
                            </li>
                            <li aria-hidden="true">/</li>
                        @else
                            <li aria-current="page">{{ $crumb['label'] }}</li>
                        @endif
                    @endforeach
                </ul>
            </nav>
            @endif
        </div>
    </div>
</div>
