{{-- T174 — Sticky contact bar « app feel » (Option E hybride 2026)
     Bottom nav style natif sans installation PWA.
     - Mobile : 3 icônes nav (Menu / Tel / Filiales) + CTA primaire Démarrer
     - Desktop : centrée max-w 760px, mêmes éléments
     - Dismissable cookie 24h, respect WCAG, charte navy/gold
     - Conserve psychologie T171 : micro-copy + social proof masquables
--}}

<aside class="ks-sticky-bar"
       data-sticky-bar
       role="complementary"
       aria-label="Navigation rapide et démarrer un projet">
    <div class="ks-sticky-bar__inner">
        <button type="button" class="ks-sticky-bar__dismiss" data-sticky-dismiss aria-label="Masquer la barre">
            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true">
                <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>

        <p class="ks-sticky-bar__copy">
            <span class="ks-sticky-bar__badge">Gratuit</span>
            Soumission sous 5 à 10&nbsp;jours&nbsp;·&nbsp;Réponse&nbsp;72&nbsp;h
        </p>

        <nav class="ks-sticky-bar__nav" aria-label="Navigation rapide">
            <button type="button" class="ks-sticky-bar__nav-btn" data-sticky-menu aria-label="Ouvrir le menu" aria-controls="navbarSupportedContent">
                <svg viewBox="0 0 24 24" width="22" height="22" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/>
                </svg>
                <span class="ks-sticky-bar__nav-label">Menu</span>
            </button>
            <a href="tel:+14184760987" class="ks-sticky-bar__nav-btn" aria-label="Appeler Kalystrat au 418 476 0987">
                <svg viewBox="0 0 24 24" width="22" height="22" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                </svg>
                <span class="ks-sticky-bar__nav-label">Appeler</span>
            </a>
            <a href="{{ route('filiales.index') }}" class="ks-sticky-bar__nav-btn" aria-label="Voir nos six filiales">
                <svg viewBox="0 0 24 24" width="22" height="22" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/>
                </svg>
                <span class="ks-sticky-bar__nav-label">Filiales</span>
            </a>
            <a href="{{ route('contact') }}" class="ks-sticky-bar__primary">
                <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="5,12 19,12"/><polyline points="12,5 19,12 12,19"/></svg>
                <span>Démarrer</span>
            </a>
        </nav>

        <ul class="ks-sticky-bar__trust" aria-label="Certifications">
            <li>RBQ</li>
            <li aria-hidden="true">·</li>
            <li>CCQ</li>
            <li aria-hidden="true">·</li>
            <li>APCHQ</li>
            <li aria-hidden="true">·</li>
            <li>GCR</li>
            <li class="ks-sticky-bar__trust-check" aria-hidden="true">✓</li>
        </ul>
    </div>
</aside>

<script>
(function() {
    var bar = document.querySelector('[data-sticky-bar]');
    if (!bar) return;
    var COOKIE = 'ks_sticky_dismissed';
    function getCookie(name) {
        var m = document.cookie.match(new RegExp('(^|;)\\s*' + name + '=([^;]+)'));
        return m ? m[2] : null;
    }
    function setCookie(name, val, hours) {
        var d = new Date(); d.setTime(d.getTime() + hours * 3600 * 1000);
        document.cookie = name + '=' + val + ';expires=' + d.toUTCString() + ';path=/;samesite=lax';
    }
    if (getCookie(COOKIE)) bar.classList.add('is-dismissed');
    var dismissBtn = bar.querySelector('[data-sticky-dismiss]');
    if (dismissBtn) {
        dismissBtn.addEventListener('click', function() {
            bar.classList.add('is-dismissed');
            setCookie(COOKIE, '1', 24);
        });
    }
    // Bouton Menu : ouvre le drawer mobile (mêmes triggers que .navbar-toggler/.mobile-nav-toggler)
    var menuBtn = bar.querySelector('[data-sticky-menu]');
    if (menuBtn) {
        menuBtn.addEventListener('click', function() {
            var navToggler = document.querySelector('.mobile-nav-toggler') || document.querySelector('.navbar-toggler');
            if (navToggler) navToggler.click();
        });
    }
})();
</script>
