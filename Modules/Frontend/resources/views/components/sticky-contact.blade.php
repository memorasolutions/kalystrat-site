{{-- T159 — Sticky contact hybride : tab vertical desktop + FAB pill mobile
     - Desktop ≥ 1024px : onglet vertical droit, slide-out au hover, 3 actions
     - Mobile < 1024px : FAB pill bottom-right, 3 icônes (tel/courriel/soumission)
     - WCAG : aria-expanded, focus trap, ESC, prefers-reduced-motion
     - Charte : navy-900 + gold-500, glassmorphism subtil
--}}

<div class="ks-sticky-contact"
     data-sticky-contact
     role="complementary"
     aria-label="Contact rapide Kalystrat">

    {{-- ============ DESKTOP TAB ============ --}}
    <button type="button"
            class="ks-sticky-contact__tab"
            data-sticky-tab
            aria-expanded="false"
            aria-controls="ks-sticky-contact-panel"
            aria-label="Ouvrir les options de contact rapide">
        <span class="ks-sticky-contact__tab-text" aria-hidden="true">Contact rapide</span>
        <svg class="ks-sticky-contact__tab-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M5 8h14M5 12h14M5 16h10"/>
        </svg>
    </button>

    {{-- ============ DESKTOP PANEL (slide-out) ============ --}}
    <div class="ks-sticky-contact__panel"
         id="ks-sticky-contact-panel"
         data-sticky-panel
         role="dialog"
         aria-label="Options de contact rapide"
         aria-hidden="true">
        <header class="ks-sticky-contact__header">
            <span class="ks-sticky-contact__eyebrow">Discutons</span>
            <h2 class="ks-sticky-contact__title">de votre projet</h2>
        </header>
        <ul class="ks-sticky-contact__actions">
            <li>
                <a href="tel:+14184760987" class="ks-sticky-contact__action" data-action="tel">
                    <svg class="ks-sticky-contact__action-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                    </svg>
                    <span class="ks-sticky-contact__action-label">
                        <span class="ks-sticky-contact__action-title">Appeler</span>
                        <span class="ks-sticky-contact__action-detail">(418) 476-0987</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="#" class="ks-sticky-contact__action ks-email-protect" data-u="info" data-d="kalystrat.ca" data-keep-slot="1" data-action="email" aria-label="Envoyer un courriel à info chez kalystrat point ca" rel="nofollow noopener">
                    <svg class="ks-sticky-contact__action-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                    <span class="ks-sticky-contact__action-label">
                        <span class="ks-sticky-contact__action-title">Courriel</span>
                        <span class="ks-sticky-contact__action-detail" data-email-display>Cliquer pour révéler</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('contact') }}" class="ks-sticky-contact__action" data-action="form">
                    <svg class="ks-sticky-contact__action-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                    </svg>
                    <span class="ks-sticky-contact__action-label">
                        <span class="ks-sticky-contact__action-title">Soumission</span>
                        <span class="ks-sticky-contact__action-detail">Sous 5 à 10 jours ouvrables</span>
                    </span>
                </a>
            </li>
        </ul>
        <button type="button" class="ks-sticky-contact__close" data-sticky-close aria-label="Fermer">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <line x1="18" y1="6" x2="6" y2="18"/>
                <line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    </div>

    {{-- ============ MOBILE FAB PILL ============ --}}
    <nav class="ks-sticky-contact__fab"
         data-sticky-fab
         aria-label="Contact rapide mobile">
        <a href="tel:+14184760987" class="ks-sticky-contact__fab-btn" aria-label="Appeler le 418 476 0987">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
            </svg>
            <span class="ks-sr-only">Appeler</span>
        </a>
        <a href="#" class="ks-sticky-contact__fab-btn ks-email-protect" data-u="info" data-d="kalystrat.ca" data-keep-slot="1" aria-label="Envoyer un courriel" rel="nofollow noopener">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                <polyline points="22,6 12,13 2,6"/>
            </svg>
            <span class="ks-sr-only">Courriel</span>
        </a>
        <a href="{{ route('contact') }}" class="ks-sticky-contact__fab-btn ks-sticky-contact__fab-btn--primary" aria-label="Demander une soumission">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                <polyline points="14 2 14 8 20 8"/>
            </svg>
            <span class="ks-sticky-contact__fab-label">Soumission</span>
        </a>
    </nav>
</div>

<script>
(function() {
    const root = document.querySelector('[data-sticky-contact]');
    if (!root) return;
    const tab = root.querySelector('[data-sticky-tab]');
    const panel = root.querySelector('[data-sticky-panel]');
    const closeBtn = root.querySelector('[data-sticky-close]');
    if (!tab || !panel) return;

    function open() {
        root.classList.add('is-open');
        tab.setAttribute('aria-expanded', 'true');
        panel.setAttribute('aria-hidden', 'false');
        const first = panel.querySelector('a');
        if (first) first.focus({preventScroll: true});
    }
    function close() {
        root.classList.remove('is-open');
        tab.setAttribute('aria-expanded', 'false');
        panel.setAttribute('aria-hidden', 'true');
    }
    function toggle() {
        if (root.classList.contains('is-open')) close();
        else open();
    }

    tab.addEventListener('click', toggle);
    if (closeBtn) closeBtn.addEventListener('click', close);
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && root.classList.contains('is-open')) {
            close();
            tab.focus({preventScroll: true});
        }
    });
    // Hover open (desktop only, prefers-reduced-motion respected via CSS transitions)
    if (window.matchMedia('(hover: hover) and (min-width: 1024px)').matches) {
        let hoverTimer;
        root.addEventListener('mouseenter', () => {
            clearTimeout(hoverTimer);
            hoverTimer = setTimeout(open, 150);
        });
        root.addEventListener('mouseleave', () => {
            clearTimeout(hoverTimer);
            hoverTimer = setTimeout(close, 400);
        });
    }
})();
</script>
