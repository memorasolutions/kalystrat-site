/**
 * @file kalystrat-a11y.js
 * @description Mobile menu accessibility : pose inert + aria-hidden quand fermé,
 *              les retire quand class 'show' ajoutée par mobilemenu() Construz jQuery.
 *              Désactivable en commentant le <script> include dans layout.blade.php.
 * @author MEMORA solutions
 * @version 1.0.0
 */
(() => {
    const SELECTORS = {
        menuWrapper: '.mobile-menu-wrapper',
        menuToggle: '.menu-toggle',
        menuFirstLink: 'a[href]',
    };

    const menuWrapper = document.querySelector(SELECTORS.menuWrapper);

    if (!menuWrapper || !('inert' in HTMLElement.prototype)) {
        return;
    }

    let lastTrigger = null;

    const closeMenuA11y = () => {
        menuWrapper.setAttribute('inert', '');
        menuWrapper.setAttribute('aria-hidden', 'true');
    };

    const openMenuA11y = () => {
        menuWrapper.removeAttribute('inert');
        menuWrapper.removeAttribute('aria-hidden');
        const firstLink = menuWrapper.querySelector(SELECTORS.menuFirstLink);
        if (firstLink) firstLink.focus();
    };

    const onClassChange = () => {
        const isOpen = menuWrapper.classList.contains('show');
        if (isOpen) {
            openMenuA11y();
        } else {
            closeMenuA11y();
            if (lastTrigger && document.contains(lastTrigger)) {
                lastTrigger.focus();
                lastTrigger = null;
            }
        }
    };

    document.addEventListener('DOMContentLoaded', () => {
        if (!menuWrapper.classList.contains('show')) {
            closeMenuA11y();
        }

        document.querySelectorAll(SELECTORS.menuToggle).forEach((btn) => {
            btn.addEventListener('click', () => {
                if (!menuWrapper.classList.contains('show')) {
                    lastTrigger = btn;
                }
            });
        });

        new MutationObserver((mutations) => {
            for (const m of mutations) {
                if (m.type === 'attributes' && m.attributeName === 'class') {
                    onClassChange();
                    return;
                }
            }
        }).observe(menuWrapper, { attributes: true, attributeFilter: ['class'] });
    });
})();
