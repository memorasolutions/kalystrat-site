{{--
    <x-frontend::disclosure> — Pattern 2 Memora CORE (a11y disclosure widget)

    Convertit un menu hover-only en widget WCAG 2.2 AAA-conforme accessible
    souris, clavier et tactile. Standard W3C WAI Disclosure Pattern.

    Le JS handler global (data-ks-disclosure) est dans layout.blade.php :
    - Click button → toggle aria-expanded + show/hide menu
    - ESC → ferme + restore focus sur button
    - ArrowDown sur button ouvert → focus 1er item du menu
    - Click outside → ferme

    Props
    - id (string, required) : id du menu, lié à aria-controls
    - label (string) : texte affiché dans le button (défaut "Menu")
    - triggerClass (string) : classes CSS additionnelles sur le button
    - menuClass (string) : classes CSS additionnelles sur le ul
    - arrow (bool, défaut true) : afficher la flèche ▾ qui pivote 180° quand
      aria-expanded="true" (rotation gérée via CSS)

    Slot par défaut : items de menu (li > a chacun)

    Usage
    <x-frontend::disclosure
        id="ks-header-filiales-menu"
        label="Filiales"
        triggerClass="ks-header__nav-link"
        menuClass="ks-header__dropdown">
        <li><a href="/filiales/fondations" class="ks-header__dropdown-link">Fondations</a></li>
        ...
    </x-frontend::disclosure>
--}}
@props([
    'id',
    'label' => 'Menu',
    'triggerClass' => '',
    'menuClass' => '',
    'arrow' => true,
])

<button type="button"
        @if($triggerClass) class="{{ $triggerClass }}" @endif
        aria-haspopup="true"
        aria-expanded="false"
        aria-controls="{{ $id }}"
        data-ks-disclosure>{{ $label }}@if($arrow) <span class="ks-header__nav-arrow" aria-hidden="true">▾</span>@endif</button>
<ul id="{{ $id }}" @if($menuClass) class="{{ $menuClass }}" @endif>
    {{ $slot }}
</ul>
