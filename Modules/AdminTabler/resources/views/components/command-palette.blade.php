{{-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca --}}
{{-- Command Palette (Ctrl+K) — recherche unifiée routes + actions admin --}}
@inject('navService', 'Modules\Backoffice\Services\NavigationService')

@php
    $sections = $navService->getNavigation(auth()->user());
    $items = [];
    foreach ($sections as $section) {
        foreach ($section['items'] as $item) {
            if (!empty($item['route'])) {
                try {
                    $items[] = [
                        'label' => __($item['label']),
                        'section' => __($section['label']),
                        'url' => route($item['route']),
                        'icon' => $item['icon'] ?? 'circle',
                    ];
                } catch (\Throwable $e) {}
            }
            if (!empty($item['children'])) {
                foreach ($item['children'] as $child) {
                    if (!empty($child['route'])) {
                        try {
                            $items[] = [
                                'label' => __($item['label']) . ' › ' . __($child['label']),
                                'section' => __($section['label']),
                                'url' => route($child['route']),
                                'icon' => $child['icon'] ?? 'circle',
                            ];
                        } catch (\Throwable $e) {}
                    }
                }
            }
        }
    }
@endphp

<div
    class="admintabler-command-palette"
    data-open="false"
    role="dialog"
    aria-modal="true"
    aria-label="{{ __('Palette de commandes') }}"
>
    <div class="admintabler-command-palette__panel">
        <input
            type="search"
            class="admintabler-command-palette__input"
            placeholder="{{ __('Rechercher une page, action, paramètre...') }}"
            aria-label="{{ __('Recherche commande') }}"
            id="admintabler-cmd-input"
            autocomplete="off"
        >
        <ul
            class="list-group list-group-flush"
            id="admintabler-cmd-results"
            style="max-height:50vh;overflow-y:auto;"
            role="listbox"
        >
            @foreach($items as $i => $item)
                <li
                    class="list-group-item list-group-item-action d-flex align-items-center"
                    data-cmd-label="{{ strtolower($item['label'] . ' ' . $item['section']) }}"
                    data-cmd-url="{{ $item['url'] }}"
                    role="option"
                    tabindex="0"
                    style="cursor:pointer;"
                >
                    <i data-lucide="{{ $item['icon'] }}" class="me-3 text-muted"></i>
                    <div class="flex-grow-1">
                        <div>{{ $item['label'] }}</div>
                        <small class="text-muted">{{ $item['section'] }}</small>
                    </div>
                    <kbd class="ms-2">↵</kbd>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<script>
    (function () {
        const input = document.getElementById('admintabler-cmd-input');
        const results = document.getElementById('admintabler-cmd-results');
        if (!input || !results) return;

        input.addEventListener('input', () => {
            const q = input.value.trim().toLowerCase();
            results.querySelectorAll('[data-cmd-label]').forEach((el) => {
                const match = !q || el.dataset.cmdLabel.includes(q);
                el.style.display = match ? '' : 'none';
            });
        });

        results.addEventListener('click', (e) => {
            const target = e.target.closest('[data-cmd-url]');
            if (target) window.location.href = target.dataset.cmdUrl;
        });

        results.addEventListener('keydown', (e) => {
            if ((e.key === 'Enter' || e.key === ' ') && e.target.dataset.cmdUrl) {
                e.preventDefault();
                window.location.href = e.target.dataset.cmdUrl;
            }
        });

        input.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                const first = results.querySelector('[data-cmd-label]:not([style*="display: none"])');
                if (first) window.location.href = first.dataset.cmdUrl;
            }
        });
    })();
</script>
