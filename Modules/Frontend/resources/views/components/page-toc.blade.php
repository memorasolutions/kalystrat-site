{{--
    Composant <x-frontend::page-toc> — Table des matières sticky rail gauche
    Pattern 2026 NNG : scroll-spy IntersectionObserver + drawer mobile.
    Usage :
        <x-frontend::page-toc :items="[
            ['id' => 'vision', 'num' => '01', 'label' => 'Notre vision'],
            ['id' => 'direction', 'num' => '02', 'label' => 'Direction'],
        ]"/>
--}}
@props([
    'items' => [],
    'label' => 'Sommaire de la page',
])

@if(count($items) > 0)
<aside class="ks-page-toc" aria-label="{{ $label }}" data-ks-toc>
    <button type="button" class="ks-page-toc__mobile-toggle" aria-expanded="false" aria-controls="ks-page-toc-list" data-ks-toc-toggle>
        <span class="ks-page-toc__mobile-icon" aria-hidden="true">☰</span>
        <span>Sommaire</span>
    </button>
    <nav class="ks-page-toc__panel" id="ks-page-toc-list">
        <p class="ks-page-toc__title" aria-hidden="true">{{ $label }}</p>
        <ol class="ks-page-toc__list">
            @foreach($items as $item)
            <li class="ks-page-toc__item">
                <a class="ks-page-toc__link" href="#{{ $item['id'] }}" data-ks-toc-link>
                    <span class="ks-page-toc__num" aria-hidden="true">{{ $item['num'] }}</span>
                    <span class="ks-page-toc__label">{{ $item['label'] }}</span>
                </a>
            </li>
            @endforeach
        </ol>
    </nav>
</aside>
@endif
