@php
    $filiales_header = require module_path('Frontend', 'config/filiales.php');
@endphp
<header class="nav-header header-layout4">
    <div class="sticky-wrapper">
        <div class="menu-area">
            <div class="logo-bg"></div>
            <div class="container">
                <div class="row align-items-center justify-content-lg-start justify-content-between">

                    <div class="col-auto">
                        <div class="header-logo">
                            <a href="{{ route('index') }}"><img src="{{ asset('assets/img/kalystrat/logo-white.svg') }}" alt="Kalystrat — Conçu. Réalisé. Livré."></a>
                        </div>
                    </div>

                    <div class="col-auto m-lg-auto">
                        <nav class="main-menu d-none d-lg-inline-block" aria-label="Navigation principale">
                            <ul>
                                <li class="{{ request()->routeIs('frontend.home') ? 'active' : '' }}">
                                    <a href="{{ route('index') }}">ACCUEIL</a>
                                </li>
                                <li class="{{ request()->routeIs('frontend.about') ? 'active' : '' }}">
                                    <a href="{{ route('kalystrat.apropos') }}">À PROPOS</a>
                                </li>
                                <li class="menu-item-has-children {{ request()->routeIs('frontend.services') || request()->routeIs('frontend.filiale*') ? 'active' : '' }}">
                                    <a href="{{ route('service') }}">NOS FILIALES</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('service') }}">Vue d'ensemble</a></li>
                                        @foreach($filiales_header as $slug => $f)
                                            <li><a href="{{ route('kalystrat.filiale', $slug) }}">{{ $f['nom_court'] }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="{{ request()->routeIs('frontend.portfolio*') ? 'active' : '' }}">
                                    <a href="{{ route('project') }}">PROJETS</a>
                                </li>
                                <li class="{{ request()->routeIs('frontend.contact') ? 'active' : '' }}">
                                    <a href="{{ route('contact') }}">NOUS JOINDRE</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="navbar-right d-inline-flex d-lg-none">
                            <button type="button" class="menu-toggle icon-btn" aria-label="Ouvrir le menu mobile"><i class="ri-menu-line" aria-hidden="true"></i></button>
                        </div>
                    </div>

                    <div class="col-auto d-xl-block d-none">
                        <div class="header-button">
                            <div class="navbar-right-desc">
                                <div class="icon-btn" aria-hidden="true">
                                    <i class="ri-phone-fill"></i>
                                </div>
                                <div class="navbar-right-desc-details">
                                    <h6 class="title">Appelez-nous</h6>
                                    <a class="link" href="tel:+15815786145">1-581-578-6145</a>
                                </div>
                            </div>
                            <a href="{{ route('contact') }}" class="btn style2 d-xxl-flex d-none" aria-label="Demander une soumission gratuite">DEMANDER UNE SOUMISSION <i class="ri-arrow-right-up-line" aria-hidden="true"></i></a>
                            <button type="button" class="search-btn searchBoxToggler simple-icon" aria-label="Ouvrir la recherche"><i class="ri-search-line" aria-hidden="true"></i></button>
                            <button type="button" class="sidebar-btn sideMenuToggler simple-icon" aria-label="Ouvrir le menu latéral"><i class="ri-grid-fill" aria-hidden="true"></i></button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
