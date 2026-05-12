{{-- T171 — Sticky contact bar premium 2026 (psychologie compoundée, conversion-driven)
     UX unique cross-device (mobile + desktop) :
     - Bottom bar full-width mobile, max-width centrée desktop
     - Micro-copy haut : "Soumission gratuite · Réponse sous 72 h" (réciprocité + urgence)
     - Mid : tel one-tap + CTA primary "Démarrer mon projet" (friction réduite + personnalisation)
     - Bas : badges trust "RBQ · CCQ · APCHQ · GCR ✓" (social proof)
     - Dismissable + cookie 24h (anti-fatigue)
     - WCAG : aria-label, focus visible, prefers-reduced-motion
     - Charte navy/gold + glassmorphism subtil
--}}

<aside class="ks-sticky-bar"
       data-sticky-bar
       role="complementary"
       aria-label="Démarrer un projet avec Kalystrat">
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
        <div class="ks-sticky-bar__cta">
            <a href="tel:+14184760987" class="ks-sticky-bar__tel" aria-label="Appeler Kalystrat au 418 476 0987">
                <svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                </svg>
                <span class="ks-sticky-bar__tel-num">(418) 476-0987</span>
            </a>
            <a href="{{ route('contact') }}" class="ks-sticky-bar__primary">
                Démarrer mon projet
                <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12,5 19,12 12,19"/></svg>
            </a>
        </div>
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
    // Dismiss + cookie 24h (anti-fatigue)
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
})();
</script>
