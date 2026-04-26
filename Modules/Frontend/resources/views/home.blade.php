@extends('frontend::layout')

@section('title', 'Kalystrat - Investissement stratégique et développement')
@section('meta_description', 'Kalystrat développe et gère des actifs stratégiques à Québec. Investissement immobilier, développement et gestion avec précision et vision à long terme.')

@section('content')

{{-- Hero --}}
<section class="hero-wrapper hero-1" data-bg-src="{{ asset('assets/img/kalystrat/hero-skyline.jpg') }}">
    <div class="container">
        <div class="row align-items-center justify-content-center" style="min-height: 92vh;">
            <div class="col-xl-9 col-lg-10 text-center">
                <div class="hero-style1">
                    <span class="sub-title wow fadeInUp" data-wow-delay="0.1s">Holding construction 6 filiales · Québec</span>
                    <h1 class="hero-title wow fadeInUp" data-wow-delay="0.2s">Conçu. <span class="text-theme">Réalisé.</span> Livré.</h1>
                    <p class="hero-text wow fadeInUp" data-wow-delay="0.3s">Six filiales spécialisées en synergie sous une marque unifiée. De l'excavation à la finition, Kalystrat livre des projets de construction intégrés au Québec.</p>
                    <div class="btn-group wow fadeInUp" data-wow-delay="0.4s">
                        <a href="{{ route('frontend.services') }}" class="btn" aria-label="Découvrir notre approche stratégique">DÉCOUVRIR NOTRE APPROCHE <i class="ri-arrow-right-up-line" aria-hidden="true"></i></a>
                        <a href="{{ route('frontend.contact') }}" class="btn style2" aria-label="Nous joindre pour discuter de votre projet">NOUS JOINDRE <i class="ri-arrow-right-up-line" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- About teaser --}}
<section class="space-top space-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 wow fadeInLeft">
                <div class="img-box1" style="position: relative; overflow: hidden;">
                    <img src="{{ asset('assets/img/kalystrat/about-meeting.jpg') }}" alt="Réunion stratégique de l'équipe Kalystrat" loading="lazy" style="width: 100%; height: 520px; object-fit: cover;">
                    <div style="position: absolute; bottom: 0; left: 0; background: var(--ks-gold); padding: 1.75rem 2.25rem;">
                        <span style="display: block; font-size: 2.5rem; font-weight: 700; color: var(--ks-navy); line-height: 1;">6</span>
                        <span style="display: block; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.15em; color: var(--ks-navy); margin-top: 0.25rem;">Filiales intégrées</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1 wow fadeInRight">
                <div class="title-area">
                    <span class="sub-title"><i class="ri-focus-2-line" aria-hidden="true"></i> À PROPOS DE KALYSTRAT</span>
                    <h2 class="sec-title">Créer de la valeur au-delà de la construction</h2>
                </div>
                <p>Gestion Kalystrat Inc. est un holding québécois de construction à intégration verticale, fondé par Ali Salomon. Six filiales spécialisées opèrent en synergie, de l'excavation aux finitions, soutenues par une agence de placement de main-d'œuvre interne.</p>
                <p>Cette intégration verticale élimine la dépendance aux sous-traitants, raccourcit les délais et garantit une qualité supérieure à chaque étape. Notre ambition : devenir un groupe intégré de référence au Québec dans 8 ans.</p>
                <a href="{{ route('frontend.about') }}" class="link-btn" aria-label="En savoir plus sur l'approche Kalystrat">En savoir plus <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</section>

{{-- Services --}}
<section class="space-top space-bottom bg-smoke">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title"><i class="ri-focus-2-line" aria-hidden="true"></i> NOS 6 FILIALES</span>
            <h2 class="sec-title">Une chaîne de valeur intégrée, du sol aux finitions</h2>
        </div>
        <div class="row gx-30 gy-30">
            @php
                $filiales_home = require module_path('Frontend', 'config/filiales.php');
                $icons = ['fondations'=>'ri-tools-line','structure'=>'ri-layout-grid-line','toiture'=>'ri-home-2-line','finition'=>'ri-paint-brush-line','immobilier'=>'ri-building-line','placement'=>'ri-team-line'];
            @endphp
            @foreach ($filiales_home as $slug => $f)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->iteration }}s">
                    <div class="service-card" style="border-left: 4px solid {{ $f['hex_couleur'] }};">
                        <div class="service-card_icon" style="color: {{ $f['hex_couleur'] }};"><i class="{{ $icons[$slug] ?? 'ri-building-4-line' }}" aria-hidden="true"></i></div>
                        <h3 class="service-card_title">{{ $f['nom_court'] }}</h3>
                        <p class="service-card_text">{{ $f['specialite'] }}</p>
                        <a href="{{ route('frontend.filiale', $slug) }}" class="link-btn" aria-label="Découvrir {{ $f['nom_complet'] }}">Découvrir <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Counter/Stats --}}
<section class="counter-wrap">
    <div class="container">
        <div class="row gy-4 text-center">
            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="counter-card">
                    <h3 class="title">6</h3>
                    <p>Filiales spécialisées</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="counter-card">
                    <h3 class="title">59&nbsp;864</h3>
                    <p>Mises en chantier au Québec en 2025</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                <div class="counter-card">
                    <h3 class="title">19&nbsp;G$</h3>
                    <p>Marché de la rénovation au Québec</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.4s">
                <div class="counter-card">
                    <h3 class="title">100%</h3>
                    <p>Intégration verticale</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Section portfolio teaser SUPPRIMÉE 2026-04-25 (projets fictifs).
     Sera réintroduite avec vrais chantiers livrés des 6 filiales. --}}

{{-- Chaîne de valeur intégrée (différenciateur principal Kalystrat) --}}
<section class="space-top space-bottom">
  <div class="container">
    <div class="title-area text-center mb-5">
      <span class="sub-title"><i class="ri-focus-2-line" aria-hidden="true"></i> CHAÎNE DE VALEUR INTÉGRÉE</span>
      <h2 class="sec-title">De l'acquisition à la livraison</h2>
      <p class="mx-auto" style="max-width:680px;">Kalystrat maîtrise chaque maillon de la construction grâce à ses six filiales spécialisées, garantissant qualité, délais et traçabilité sur l'ensemble du cycle projet.</p>
    </div>
    <div class="d-flex flex-column flex-md-row align-items-center justify-content-center gap-3 gap-md-0 position-relative wow fadeInUp">
      <div class="text-center px-2">
        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-2" style="width:72px;height:72px;background:#2E5266;">
          <i class="ri-building-line text-white" style="font-size:28px;" aria-hidden="true"></i>
        </div>
        <a href="{{ route('frontend.filiale', 'immobilier') }}" class="d-block fw-semibold small text-uppercase text-decoration-none" style="color:#2E5266;">1 — Immobilier</a>
      </div>
      <i class="ri-arrow-right-line d-none d-md-block mx-2" style="font-size:24px;color:#6B7B8C;" aria-hidden="true"></i>
      <div class="text-center px-2">
        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-2" style="width:72px;height:72px;background:#8B6F47;">
          <i class="ri-tools-line text-white" style="font-size:28px;" aria-hidden="true"></i>
        </div>
        <a href="{{ route('frontend.filiale', 'fondations') }}" class="d-block fw-semibold small text-uppercase text-decoration-none" style="color:#8B6F47;">2 — Fondations</a>
      </div>
      <i class="ri-arrow-right-line d-none d-md-block mx-2" style="font-size:24px;color:#6B7B8C;" aria-hidden="true"></i>
      <div class="text-center px-2">
        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-2" style="width:72px;height:72px;background:#6B7B8C;">
          <i class="ri-layout-grid-line text-white" style="font-size:28px;" aria-hidden="true"></i>
        </div>
        <a href="{{ route('frontend.filiale', 'structure') }}" class="d-block fw-semibold small text-uppercase text-decoration-none" style="color:#6B7B8C;">3 — Structure</a>
      </div>
      <i class="ri-arrow-right-line d-none d-md-block mx-2" style="font-size:24px;color:#6B7B8C;" aria-hidden="true"></i>
      <div class="text-center px-2">
        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-2" style="width:72px;height:72px;background:#4A5D6F;">
          <i class="ri-home-2-line text-white" style="font-size:28px;" aria-hidden="true"></i>
        </div>
        <a href="{{ route('frontend.filiale', 'toiture') }}" class="d-block fw-semibold small text-uppercase text-decoration-none" style="color:#4A5D6F;">4 — Toiture</a>
      </div>
      <i class="ri-arrow-right-line d-none d-md-block mx-2" style="font-size:24px;color:#6B7B8C;" aria-hidden="true"></i>
      <div class="text-center px-2">
        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-2" style="width:72px;height:72px;background:#B8A472;">
          <i class="ri-paint-brush-line text-white" style="font-size:28px;" aria-hidden="true"></i>
        </div>
        <a href="{{ route('frontend.filiale', 'finition') }}" class="d-block fw-semibold small text-uppercase text-decoration-none" style="color:#B8A472;">5 — Finition</a>
      </div>
    </div>
    <div class="mt-5 text-center py-3 px-3 wow fadeInUp" style="background:#7A6738;border-radius:4px;">
      <a href="{{ route('frontend.filiale', 'placement') }}" class="text-white fw-bold text-uppercase small text-decoration-none" style="letter-spacing:0.1em;">
        <i class="ri-team-line me-2" aria-hidden="true"></i>Kalystrat Placement Construction — Main-d'œuvre interne transverse à chaque étape
      </a>
    </div>
  </div>
</section>

{{-- Section témoignages SUPPRIMÉE 2026-04-25 (mensonge institutionnel : noms inventés) --}}
{{-- Sera réintroduite avec vrais témoignages clients quand disponibles. --}}

{{-- CTA Banner --}}
<section class="space-top space-bottom">
    <div class="container">
        <div class="cta-wrap2 text-center">
            <h2 class="title wow fadeInUp">Un projet de construction intégré ?</h2>
            <p class="wow fadeInUp" data-wow-delay="0.1s">De l'excavation aux finitions, Kalystrat coordonne l'ensemble de votre chantier via ses six filiales spécialisées. Demandez une soumission gratuite et personnalisée.</p>
            <div class="wow fadeInUp" data-wow-delay="0.2s" style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="{{ route('frontend.contact') }}" class="btn" aria-label="Demander une soumission à Kalystrat">DEMANDER UNE SOUMISSION <i class="ri-arrow-right-up-line" aria-hidden="true"></i></a>
                <a href="{{ route('frontend.services') }}" class="btn style2" aria-label="Découvrir les six filiales Kalystrat">NOS 6 FILIALES <i class="ri-arrow-right-up-line" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</section>
@endsection
