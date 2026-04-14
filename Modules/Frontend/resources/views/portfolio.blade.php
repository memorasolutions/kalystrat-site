@extends('frontend::layout')

@section('title', 'Portfolio - Kalystrat')
@section('meta_description', 'Découvrez les projets de construction et de développement immobilier réalisés par Kalystrat à Québec.')
@section('breadcrumb_title', 'Portfolio')
@section('breadcrumb')
    <li>Portfolio</li>
@endsection

@section('content')
    {{-- Portfolio grid --}}
    <section class="space-top space-bottom">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title"><i class="ri-focus-2-line"></i> NOS RÉALISATIONS</span>
                <h2 class="sec-title">Projets récents</h2>
                <p>Découvrez nos projets de construction les plus remarquables à travers le Québec.</p>
            </div>

            {{-- Filtres --}}
            <div class="text-center mb-4">
                <div class="portfolio-filter">
                    <button class="btn btn-filter active" data-filter="*">Tous</button>
                    <button class="btn btn-filter" data-filter=".residentiel">Résidentiel</button>
                    <button class="btn btn-filter" data-filter=".commercial">Commercial</button>
                    <button class="btn btn-filter" data-filter=".renovation">Rénovation</button>
                </div>
            </div>

            {{-- Grid --}}
            <div class="row gx-30 gy-30 isotope-grid">
                <div class="col-lg-4 col-md-6 isotope-item residentiel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="project-card">
                        <div class="project-img">
                            <img src="{{ asset('assets/construz/img/project/project1_1.png') }}" alt="Résidence Montcalm">
                        </div>
                        <div class="project-content">
                            <span class="project-cat">Résidentiel</span>
                            <h3 class="project-title">Résidence Montcalm</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 isotope-item commercial wow fadeInUp" data-wow-delay="0.2s">
                    <div class="project-card">
                        <div class="project-img">
                            <img src="{{ asset('assets/construz/img/project/project1_2.png') }}" alt="Centre commercial Laurier">
                        </div>
                        <div class="project-content">
                            <span class="project-cat">Commercial</span>
                            <h3 class="project-title">Centre commercial Laurier</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 isotope-item renovation wow fadeInUp" data-wow-delay="0.3s">
                    <div class="project-card">
                        <div class="project-img">
                            <img src="{{ asset('assets/construz/img/project/project1_3.png') }}" alt="Rénovation Vieux-Québec">
                        </div>
                        <div class="project-content">
                            <span class="project-cat">Rénovation</span>
                            <h3 class="project-title">Rénovation Vieux-Québec</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 isotope-item residentiel wow fadeInUp" data-wow-delay="0.4s">
                    <div class="project-card">
                        <div class="project-img">
                            <img src="{{ asset('assets/construz/img/project/project2_1.png') }}" alt="Condos Sainte-Foy">
                        </div>
                        <div class="project-content">
                            <span class="project-cat">Résidentiel</span>
                            <h3 class="project-title">Condos Sainte-Foy</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 isotope-item commercial wow fadeInUp" data-wow-delay="0.5s">
                    <div class="project-card">
                        <div class="project-img">
                            <img src="{{ asset('assets/construz/img/project/project2_2.png') }}" alt="Édifice Lebourgneuf">
                        </div>
                        <div class="project-content">
                            <span class="project-cat">Commercial</span>
                            <h3 class="project-title">Édifice Lebourgneuf</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 isotope-item renovation wow fadeInUp" data-wow-delay="0.6s">
                    <div class="project-card">
                        <div class="project-img">
                            <img src="{{ asset('assets/construz/img/project/project2_3.png') }}" alt="Restauration Charlesbourg">
                        </div>
                        <div class="project-content">
                            <span class="project-cat">Rénovation</span>
                            <h3 class="project-title">Restauration Charlesbourg</h3>
                        </div>
                    </div>
                </div>
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
