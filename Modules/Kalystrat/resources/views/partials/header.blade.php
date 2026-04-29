<header id="kalystrat-header" class="ks-header" role="banner">
    <div class="container">
        <div class="row align-items-center justify-content-between gx-3">

            {{-- Logo Kalystrat --}}
            <div class="col-auto">
                <a href="{{ route('index') }}" class="ks-header__logo-link" aria-label="Accueil - Kalystrat">
                    <img src="{{ asset('themes/construz/assets/img/logo.svg') }}" alt="Logo Kalystrat" width="175" height="46" class="ks-header__logo-img">
                </a>
            </div>

            {{-- Navigation desktop --}}
            <div class="col d-none d-lg-flex justify-content-center">
                <nav class="ks-header__nav" role="navigation" aria-label="Navigation principale">
                    <ul class="ks-header__nav-list list-unstyled mb-0 d-flex align-items-center">
                        <li class="ks-header__nav-item">
                            <a href="{{ route('index') }}" class="ks-header__nav-link">Accueil</a>
                        </li>
                        <li class="ks-header__nav-item">
                            <a href="{{ route('kalystrat.apropos') }}" class="ks-header__nav-link">À propos</a>
                        </li>
                        <li class="ks-header__nav-item dropdown has-dropdown">
                            <a class="ks-header__nav-link dropdown-toggle" href="#" id="filialesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Nos filiales
                            </a>
                            <ul class="dropdown-menu ks-header__dropdown" aria-labelledby="filialesDropdown">
                                @foreach(config('kalystrat.filiales', []) as $slug => $filiale)
                                    <li>
                                        <a class="dropdown-item ks-header__dropdown-item" href="{{ route('kalystrat.filiale', ['slug' => $slug]) }}">
                                            <span class="ks-header__dropdown-dot" style="background-color: {{ $filiale['hex_couleur'] ?? '#FF5E14' }};" aria-hidden="true"></span>
                                            {{ $filiale['nom_court'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="ks-header__nav-item">
                            <a href="{{ route('kalystrat.faq') }}" class="ks-header__nav-link">FAQ</a>
                        </li>
                        <li class="ks-header__nav-item">
                            <a href="{{ route('contact') }}" class="ks-header__nav-link">Contact</a>
                        </li>
                    </ul>
                </nav>
            </div>

            {{-- CTA téléphone --}}
            <div class="col-auto">
                <a href="tel:+15815786145" class="ks-header__cta btn-phone-cta d-none d-lg-inline-flex" aria-label="Appeler Kalystrat au 1-581-578-6145">
                    <i class="ri-phone-line" aria-hidden="true"></i>
                    <span class="btn-phone-cta-text">1-581-578-6145</span>
                </a>
            </div>

            {{-- Hamburger mobile --}}
            <div class="col-auto d-lg-none">
                <button class="ks-header__hamburger btn p-0 border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#ksMobileNav" aria-controls="ksMobileNav" aria-label="Ouvrir le menu de navigation">
                    <i class="ri-menu-3-line" aria-hidden="true"></i>
                </button>
            </div>

        </div>
    </div>

    {{-- Offcanvas mobile navigation --}}
    <div class="offcanvas offcanvas-end" tabindex="-1" id="ksMobileNav" aria-labelledby="ksMobileNavLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title visually-hidden" id="ksMobileNavLabel">Menu de navigation</h5>
            <a href="{{ route('index') }}" aria-label="Accueil">
                <img src="{{ asset('themes/construz/assets/img/logo.svg') }}" alt="Logo Kalystrat" width="140" height="36">
            </a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Fermer le menu"></button>
        </div>
        <div class="offcanvas-body">
            <nav role="navigation" aria-label="Navigation mobile">
                <ul class="ks-header__mobile-nav list-unstyled">
                    <li><a href="{{ route('index') }}" class="ks-header__mobile-link">Accueil</a></li>
                    <li><a href="{{ route('kalystrat.apropos') }}" class="ks-header__mobile-link">À propos</a></li>
                    <li>
                        <a class="ks-header__mobile-link" data-bs-toggle="collapse" href="#mobileFiliales" role="button" aria-expanded="false" aria-controls="mobileFiliales">
                            Nos filiales
                        </a>
                        <div class="collapse" id="mobileFiliales">
                            <ul class="list-unstyled ps-3">
                                @foreach(config('kalystrat.filiales', []) as $slug => $filiale)
                                    <li>
                                        <a class="ks-header__mobile-sublink" href="{{ route('kalystrat.filiale', ['slug' => $slug]) }}">
                                            {{ $filiale['nom_court'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li><a href="{{ route('kalystrat.faq') }}" class="ks-header__mobile-link">FAQ</a></li>
                    <li><a href="{{ route('contact') }}" class="ks-header__mobile-link">Contact</a></li>
                    <li class="mt-3 pt-3 border-top">
                        <a href="tel:+15815786145" class="btn-phone-cta w-100" aria-label="Appeler Kalystrat au 1-581-578-6145">
                            <i class="ri-phone-line" aria-hidden="true"></i>
                            <span class="btn-phone-cta-text">1-581-578-6145</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
