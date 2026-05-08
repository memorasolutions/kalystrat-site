{{--
    <x-frontend::icon> — Composant Blade SVG inline (T35-S30)

    Pattern réutilisable pour servir des SVG icons centrés et indépendants
    de la police custom kalystrat-icons (subset 43 glyphes S27 -98% poids,
    mais certains glyphes mal centrés dans leur em-box).

    Usage :
        <x-frontend::icon name="shield-check"/>
        <x-frontend::icon name="phone" :size="28"/>
        <x-frontend::icon name="time" class="my-custom-class"/>

    Tous les SVG :
    - viewBox 0 0 24 24 (centrage parfait)
    - fill="currentColor" (color CSS du parent)
    - aria-hidden + focusable=false (decoratives)
    - Path data Material/Heroicons-style fill plein

    Liste : shield-check, home-heart, team, shield-star, time, phone.
    Ajouter au switch ci-dessous pour étendre.

    @author MEMORA solutions <stephane@memora.ca>
--}}
@props(['name', 'size' => 24])
@php
    $svgPaths = [
        'shield-check' => 'M12 1 3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-1.93 14.93-3.5-3.5L8 10.93l2.07 2.07 5-5L16.5 9.43l-6.43 6.5z',
        'home-heart'   => 'M12 3 2 12h3v8h6v-6h2v6h6v-8h3L12 3zm0 7.5c1.1-1.5 3-1.5 3.5 0 .5 1.5-.5 3-3.5 4.5-3-1.5-4-3-3.5-4.5.5-1.5 2.4-1.5 3.5 0z',
        'team'         => 'M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-7 0c1.66 0 3-1.34 3-3S6.66 6 5 6 2 7.34 2 9s1.34 3 3 3zm14 0c1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3 1.34 3 3 3zM5 14c-2.33 0-7 1.17-7 3.5V20h7v-2.5c0-.85.33-2.34 2.37-3.47-.87-.02-1.74-.03-2.37-.03zm14 0c-.63 0-1.5.01-2.37.03 2.04 1.13 2.37 2.62 2.37 3.47V20h7v-2.5c0-2.33-4.67-3.5-7-3.5zm-7 0c-3.33 0-9 1.67-9 5v3h18v-3c0-3.33-5.67-5-9-5z',
        'shield-star'  => 'M12 1 3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 6 1.69 3.42 3.78.55-2.74 2.67.65 3.77L12 15.62l-3.38 1.79.65-3.77-2.74-2.67 3.78-.55L12 7z',
        'time'         => 'M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.24 14.24L11 13V7h1.5v5.25l4.5 2.67-.76 1.32z',
        'phone'        => 'M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.28-.28.67-.36 1.02-.25 1.12.37 2.32.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1A17 17 0 0 1 3 4c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z',
        'menu'         => 'M3 6h18v2H3V6zm0 5h18v2H3v-2zm0 5h18v2H3v-2z',
    ];
    $path = $svgPaths[$name] ?? null;
@endphp
@if ($path)
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="{{ $size }}" height="{{ $size }}" fill="currentColor" aria-hidden="true" focusable="false" {{ $attributes }}><path d="{{ $path }}"/></svg>
@else
{{-- Fallback : nom inconnu, ne rien afficher (ou logger en dev) --}}
@endif
