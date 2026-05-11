{{--
    Composant <x-frontend::page-hero> — DRY composant hero photo (T122 V5e)
    Usage :
        <x-frontend::page-hero
            photo="/intime/images/pages/apropos-hero-montreal-night.webp"
            eyebrow="Conçu, réalisé, livré"
            title="Un groupe québécois..."
            subtitle="Six filiales spécialisées..."
        >
            <x-slot:breadcrumb>
                <li><a href="/">Accueil</a></li>
                <li>À propos</li>
            </x-slot:breadcrumb>
        </x-frontend::page-hero>
--}}
@props([
    'photo' => null,
    'eyebrow' => 'Conçu, réalisé, livré',
    'title' => '',
    'subtitle' => '',
])

@php
    $photoPath = $photo ? public_path(ltrim($photo, '/')) : null;
    $hasPhoto = $photoPath && file_exists($photoPath);
    $bust = $hasPhoto ? '?v=' . filemtime($photoPath) : '';
@endphp

<header class="ks-page-hero ks-page-hero--photo"
    @if($hasPhoto) style="--ks-hero-photo: url('{{ $photo }}{{ $bust }}')" @endif>
    <div class="ks-page-hero__overlay" aria-hidden="true"></div>
    <div class="ks-container ks-page-hero__inner">
        @isset($breadcrumb)
            <ul class="ks-page-hero__breadcrumb">{{ $breadcrumb }}</ul>
        @endisset
        @if($eyebrow)
            <span class="ks-eyebrow ks-page-hero__eyebrow">{!! $eyebrow !!}</span>
        @endif
        @if($title)
            <h1>{!! $title !!}</h1>
        @endif
        @if($subtitle)
            <p class="ks-page-hero__subtitle">{!! $subtitle !!}</p>
        @endif
    </div>
</header>
