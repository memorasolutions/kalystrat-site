@extends('frontend::layout')

@section('title', 'Portfolio - Kalystrat')
@section('meta_description', 'Découvrez les projets de développement stratégique et d\'investissement immobilier réalisés par Kalystrat à Québec.')
@section('breadcrumb_title', 'Portfolio')
@section('breadcrumb')
    <li>Portfolio</li>
@endsection

@section('content')
    {{-- Portfolio grid --}}
    <section class="space-top space-bottom">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title"><i class="ri-focus-2-line" aria-hidden="true"></i> RÉALISATIONS</span>
                <h2 class="sec-title">Premiers chantiers à venir</h2>
                <p>Gestion Kalystrat Inc. est un holding nouvellement constitué. Nos six filiales spécialisées entament leurs premiers projets de construction au Québec. Cette page présentera prochainement nos réalisations livrées et en cours, par filiale.</p>
            </div>

            {{-- Six filiales en charge des chantiers (en attendant premiers projets livrés) --}}
            <div class="row gx-30 gy-30 justify-content-center">
                @php
                    $filiales_portfolio = require module_path('Frontend', 'config/filiales.php');
                @endphp
                @foreach ($filiales_portfolio as $slug => $f)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->iteration }}s">
                        <a href="{{ route('frontend.filiale', $slug) }}" class="text-decoration-none" aria-label="Voir les chantiers à venir de {{ $f['nom_complet'] }}">
                            <div class="p-4" style="border: 1px solid rgba(10,22,40,0.08); border-left: 4px solid {{ $f['hex_couleur'] }}; background: var(--ks-white); height: 100%;">
                                <span class="d-inline-block px-2 py-1 mb-3" style="background: {{ $f['hex_couleur'] }}; color: var(--ks-white); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em;">{{ $f['nom_court'] }}</span>
                                <h3 class="h5" style="color: var(--ks-navy);">{{ $f['specialite'] }}</h3>
                                <p style="color: var(--ks-navy); margin-bottom: 0.5rem;">Chantiers à venir.</p>
                                <span class="link-btn" style="color: {{ $f['hex_couleur'] }};">Découvrir la filiale <i class="ri-arrow-right-line" aria-hidden="true"></i></span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="space-top space-bottom">
        <div class="container">
            <div class="cta-wrap2 text-center">
                <h2 class="title wow fadeInUp">Vous avez un projet en tête?</h2>
                <p class="wow fadeInUp" data-wow-delay="0.1s">Contactez notre équipe dès aujourd'hui pour discuter de votre projet de construction ou de rénovation.</p>
                <a href="{{ route('frontend.contact') }}" class="btn wow fadeInUp" data-wow-delay="0.2s">CONTACTEZ-NOUS <i class="ri-arrow-right-up-line"></i></a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var grid = document.querySelector('.isotope-grid');
        if (grid) {
            imagesLoaded(grid, function () {
                var iso = new Isotope(grid, {
                    itemSelector: '.isotope-item',
                    layoutMode: 'fitRows'
                });

                document.querySelectorAll('.btn-filter').forEach(function (btn) {
                    btn.addEventListener('click', function () {
                        document.querySelectorAll('.btn-filter').forEach(function (b) {
                            b.classList.remove('active');
                        });
                        this.classList.add('active');
                        iso.arrange({ filter: this.getAttribute('data-filter') });
                    });
                });
            });
        }
    });
</script>
@endpush
