{{-- T160 — Layout pour pages légales (Privacy module : politique-confidentialite,
     politique-cookies, conditions-utilisation, demande-droits)
     Étend frontend::layouts.intime pour bénéficier du chrome Kalystrat
     (header navy, footer trust-band, sticky-contact, charte navy/gold).
--}}
@extends('frontend::layouts.intime')

@section('content')
<x-frontend::page-hero
    photo="/intime/images/pages/zone-ville-hero.webp"
    eyebrow="{{ trim($__env->yieldContent('banner-crumb', 'Information légale')) }}"
    title="{{ trim($__env->yieldContent('banner-title', $__env->yieldContent('title', 'Information légale'))) }}"
    subtitle=""
>
    <x-slot:breadcrumb>
        <li><a href="{{ url('/') }}">Accueil</a></li>
        <li>{{ trim($__env->yieldContent('banner-crumb', 'Information légale')) }}</li>
    </x-slot:breadcrumb>
</x-frontend::page-hero>

<section class="ks-section">
    <div class="ks-container ks-legal-content" style="max-width: 880px">
        @yield('legal-content')
    </div>
</section>
@endsection
