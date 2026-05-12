{{-- T178 — Bottom tab bar mobile native style (iOS/Android-like)
     - Bord-à-bord bas écran (left/right/bottom 0, pas de margin, pas de border-radius)
     - 4 items : Menu / Appeler / Filiales / Démarrer
     - Pas de dismiss : fait partie de l'expérience mobile permanente
     - Pas de copy ni badges trust (déjà présents dans le footer/hero)
     - Pas de chrome flottant : c'est la barre de l'app
--}}

<nav class="ks-tabbar" data-tabbar role="navigation" aria-label="Navigation rapide mobile">
    <button type="button" class="ks-tabbar__item" data-tabbar-menu aria-label="Ouvrir le menu" aria-controls="navbarSupportedContent">
        <svg class="ks-tabbar__icon" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/>
        </svg>
        <span class="ks-tabbar__label">Menu</span>
    </button>
    <a href="tel:+14184760987" class="ks-tabbar__item" aria-label="Appeler Kalystrat au 418 476 0987">
        <svg class="ks-tabbar__icon" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
        </svg>
        <span class="ks-tabbar__label">Appeler</span>
    </a>
    <a href="{{ route('filiales.index') }}" class="ks-tabbar__item" aria-label="Voir nos six filiales">
        <svg class="ks-tabbar__icon" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/>
        </svg>
        <span class="ks-tabbar__label">Filiales</span>
    </a>
    <a href="{{ route('contact') }}" class="ks-tabbar__item ks-tabbar__item--primary" aria-label="Démarrer un projet">
        <svg class="ks-tabbar__icon" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="5,12 19,12"/><polyline points="12,5 19,12 12,19"/>
        </svg>
        <span class="ks-tabbar__label">Démarrer</span>
    </a>
</nav>

<script>
(function() {
    var menuBtn = document.querySelector('[data-tabbar-menu]');
    if (!menuBtn) return;
    menuBtn.addEventListener('click', function() {
        var navToggler = document.querySelector('.mobile-nav-toggler') || document.querySelector('.navbar-toggler');
        if (navToggler) navToggler.click();
    });
})();
</script>
