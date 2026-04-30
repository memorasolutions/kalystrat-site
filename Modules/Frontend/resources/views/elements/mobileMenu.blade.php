{{-- P22-S5c PASS 2 mobileMenu refactor : nav Kalystrat propre FR. Désactivable en revertant le fichier vers la version Construz originale (git checkout). --}}
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-area">
        <div class="mobile-logo">
            <a href="{{ route('index') }}"><img src="{{ asset('assets/img/kalystrat/logo-header.svg') }}" alt="Logo Kalystrat"></a>
            <button class="menu-toggle" aria-label="Fermer le menu"><i class="ri-close-line" aria-hidden="true"></i></button>
        </div>
        <nav class="mobile-menu" role="navigation" aria-label="Navigation mobile legacy">
            <ul>
                <li><a href="{{ route('index') }}">Accueil</a></li>
                <li><a href="{{ route('kalystrat.apropos') }}">À propos</a></li>
                <li class="menu-item-has-children">
                    <a href="{{ route('service') }}">Services</a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('service') }}">Vue d'ensemble</a></li>
                        @foreach(config('kalystrat.filiales', []) as $slug => $filiale)
                            <li><a href="{{ route('kalystrat.filiale', ['slug' => $slug]) }}">{{ $filiale['nom_court'] ?? $slug }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ route('project') }}">Réalisations</a></li>
                <li><a href="{{ route('kalystrat.faq') }}">FAQ</a></li>
                <li><a href="{{ route('kalystrat.carrieres') }}">Carrières</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </nav>
    </div>
</div>
