<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
{{-- Toast de mise à jour PWA - Alpine.js + Bootstrap 5 --}}
<div x-data="{ show: false }"
     x-init="window.addEventListener('pwa-update-available', () => { show = true; })"
     x-show="show"
     x-transition
     class="position-fixed top-0 end-0 m-3"
     style="display: none; z-index: 9999;">
    {{-- WCAG AAA : navy #0A1628 sur texte blanc = 16:1 (Bootstrap bg-success #198754 = 4:1 NON conforme AAA). Bordure gold pour différencier du install-prompt. h6 → strong (overlay UI, pas heading). --}}
    <div class="text-white rounded shadow p-3" style="background-color: #0A1628; border-left: 4px solid #B8A472;">
        <div class="d-flex justify-content-between align-items-center">
            <div class="me-3">
                <strong class="d-block mb-1">{{ __('Mise à jour disponible') }}</strong>
                <p class="mb-0 small" style="color: #FFFFFF;">{{ __('Une nouvelle version est prête.') }}</p>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-light btn-sm" @click="window.pwaUpdate?.()" style="font-weight: 700;">
                    {{ __('Mettre à jour') }}
                </button>
                <button class="btn btn-outline-light btn-sm" @click="show = false" aria-label="{{ __('Fermer la notification') }}">
                    &times;
                </button>
            </div>
        </div>
    </div>
</div>
