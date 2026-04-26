/**
 * @file    kalystrat-ui.js
 * @description Count-up KPI + reveal scroll + scroll-to-top show/hide
 * @author  MEMORA solutions
 * @version 1.0.0
 */
;(function () {
    'use strict';

    var prefersReducedMotion =
        window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ==========================================================
       Feature A — Scroll-to-top show / hide
       ========================================================== */
    (function scrollToTop() {
        var btn = document.querySelector('.scroll-top');
        if (!btn) return;

        function toggle() {
            if (window.pageYOffset > 300) {
                btn.classList.add('show');
            } else {
                btn.classList.remove('show');
            }
        }

        window.addEventListener('scroll', toggle, { passive: true });
        toggle();

        btn.addEventListener('click', function (e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    })();

    /* ==========================================================
       Feature F — Count-up KPI
       ========================================================== */
    (function countUp() {
        var counters = document.querySelectorAll('.counter-card .title, .counter');
        if (!counters.length) return;

        function easeOutCubic(t) {
            return 1 - Math.pow(1 - t, 3);
        }

        function formatLikeSample(num, sample) {
            var sepMatch = sample.match(/[0-9]([^0-9])[0-9]{3}/);
            if (!sepMatch) return String(num);
            var sep = sepMatch[1];
            var parts = [];
            var s = String(num);
            while (s.length > 3) {
                parts.unshift(s.slice(-3));
                s = s.slice(0, -3);
            }
            parts.unshift(s);
            return parts.join(sep);
        }

        function animate(el) {
            var raw = el.textContent.trim();
            var target = parseInt(raw.replace(/[^0-9]/g, ''), 10);
            if (isNaN(target) || target === 0) return;

            if (prefersReducedMotion) {
                el.textContent = raw;
                return;
            }

            var duration = 1500;
            var start = null;
            var originalRaw = raw;
            el.textContent = '0';

            function step(ts) {
                if (!start) start = ts;
                var progress = Math.min((ts - start) / duration, 1);
                var current = Math.floor(easeOutCubic(progress) * target);
                el.textContent = formatLikeSample(current, originalRaw);
                if (progress < 1) {
                    requestAnimationFrame(step);
                } else {
                    el.textContent = originalRaw;
                }
            }

            requestAnimationFrame(step);
        }

        if (!('IntersectionObserver' in window)) {
            return;
        }

        var observed = new IntersectionObserver(
            function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        animate(entry.target);
                        observed.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.3 }
        );

        counters.forEach(function (el) {
            observed.observe(el);
        });
    })();

    /* ==========================================================
       Feature G — Reveal scroll
       ========================================================== */
    (function reveal() {
        var els = document.querySelectorAll('.ks-reveal');
        if (!els.length) return;

        if (prefersReducedMotion) {
            els.forEach(function (el) { el.classList.add('is-visible'); });
            return;
        }

        if (!('IntersectionObserver' in window)) {
            els.forEach(function (el) { el.classList.add('is-visible'); });
            return;
        }

        var observer = new IntersectionObserver(
            function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.15 }
        );

        els.forEach(function (el) {
            observer.observe(el);
        });
    })();

})();
