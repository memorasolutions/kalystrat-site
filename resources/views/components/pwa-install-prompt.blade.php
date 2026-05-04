<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
{{-- Bannière d'installation PWA - Alpine.js + Bootstrap 5 --}}
<div x-data="{
    show: false,
    isStandalone: window.matchMedia('(display-mode: standalone)').matches,
    isDismissed: localStorage.getItem('pwa-install-dismissed') &&
                 (Date.now() - parseInt(localStorage.getItem('pwa-install-dismissed'))) < (7 * 24 * 60 * 60 * 1000)
}"
    x-init="
        if (!isStandalone && !isDismissed) {
            window.addEventListener('pwa-install-available', () => { show = true; });
            window.addEventListener('pwa-installed', () => { show = false; });
        }
    "
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:leave="transition ease-in duration-200"
    class="position-fixed bottom-0 start-0 end-0"
    style="display: none; z-index: 9999;">
    {{-- WCAG AAA : navy #0A1628 sur texte blanc = 16:1 (Bootstrap bg-primary #0d6efd = 4:1 NON conforme AAA). Heading h6 → strong (saut hiérarchie h1→h2→h3→h6). --}}
    <div class="text-white rounded-top shadow-lg p-3" style="background-color: #0A1628;">
        <div class="d-flex justify-content-between align-items-center">
            <div class="me-3">
                <strong class="d-block mb-1">{{ __('Installer l\'application') }}</strong>
                <p class="mb-0 small" style="color: #FFFFFF;">{{ __('Accédez rapidement depuis votre écran d\'accueil.') }}</p>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-light btn-sm" @click="window.pwaInstall?.()" style="font-weight: 700;">
                    {{ __('Installer') }}
                </button>
                <button class="btn btn-outline-light btn-sm"
                        @click="show = false; localStorage.setItem('pwa-install-dismissed', Date.now().toString())"
                        aria-label="{{ __('Fermer la bannière d\'installation') }}">
                    &times;
                </button>
            </div>
        </div>
    </div>
</div>
