{{-- Page filiale dynamique - D1 MVP additif (désactivable en commentant la route) --}}
@extends('frontend::layout')

@section('title', $title)

{{-- Pas de @section('breadcrumb*') volontairement : le hero ci-dessous porte le h1 unique de la page (évite double h1 WCAG 1.3.1) --}}

@section('content')
    {{-- Hero filiale fullbleed avec image + overlay gradient couleur filiale --}}
    <section class="filiale-hero-fullbleed"
             style="background-image: url('{{ asset('assets/img/kalystrat/about-bg.jpg') }}'); --filiale-overlay: {{ $filiale['hex_couleur'] }}d9;">
        <div class="container">
            <h1>{{ $filiale['nom_complet'] }}</h1>
            <p class="filiale-subtitle">{{ $filiale['specialite'] }}</p>
        </div>
    </section>

    {{-- Services offerts + Clientèles cibles --}}
    <section class="space" style="padding: 80px 0;">
        <div class="container">
            <div class="row gx-30 gy-30">
                <div class="col-lg-6">
                    <h2 class="sec-title mb-4" style="color: var(--ks-navy);">Services offerts</h2>
                    <ul style="list-style: none; padding-left: 0;">
                        @foreach ($filiale['services'] as $service)
                            <li style="padding: 8px 0; border-bottom: 1px solid rgba(10,22,40,0.08);">
                                <i class="ri-check-line" aria-hidden="true" style="color: {{ $filiale['hex_couleur'] }}; margin-right: 8px;"></i>
                                {{ $service }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-6">
                    <h2 class="sec-title mb-4" style="color: var(--ks-navy);">Clientèles cibles</h2>
                    <ul style="list-style: none; padding-left: 0;">
                        @foreach ($filiale['cibles'] as $cible)
                            <li style="padding: 8px 0; border-bottom: 1px solid rgba(10,22,40,0.08);">
                                <i class="ri-arrow-right-line" aria-hidden="true" style="color: {{ $filiale['hex_couleur'] }}; margin-right: 8px;"></i>
                                {{ $cible }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Image placeholder (à remplacer par photos Ali) --}}
    <section class="space" style="padding: 60px 0; background: rgba(10,22,40,0.02);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    {{-- TODO Ali : remplacer par photo réelle de l'équipe/chantier {{ $filiale['nom_court'] }} --}}
                    <img src="{{ asset('assets/img/kalystrat/about-bg.jpg') }}"
                         alt="Équipe et réalisations {{ $filiale['nom_court'] }} (image temporaire)"
                         class="img-fluid"
                         loading="lazy"
                         style="border: 4px solid {{ $filiale['hex_couleur'] }}; border-radius: 4px; max-width: 100%;">
                </div>
            </div>
        </div>
    </section>

    {{-- CTA contact --}}
    <section class="space" style="padding: 80px 0; background: var(--ks-navy); color: #FFFFFF;">
        <div class="container text-center">
            <h2 style="color: #FFFFFF;">Démarrez votre projet avec {{ $filiale['nom_court'] }}</h2>
            <p style="color: rgba(255,255,255,0.85); max-width: 640px; margin: 0 auto 24px;">
                Notre équipe vous accompagne dès la première rencontre. Demandez une soumission gratuite et personnalisée.
            </p>
            <a href="{{ route('frontend.contact') }}" class="btn"
               style="background: {{ $filiale['hex_couleur'] }}; color: #FFFFFF; padding: 14px 32px; border: 0; font-weight: 600;">
                Demander une soumission
                <i class="ri-arrow-right-up-line" aria-hidden="true" style="margin-left: 8px;"></i>
            </a>
        </div>
    </section>
@endsection
