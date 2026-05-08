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
        'arrow-right'  => 'M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z',
        'line-chart'   => 'M3.5 18.5l6-6.5 4 4L22 6l-1.41-1.41L13.5 13.71l-4-4L2 17.91l1.5.59z',
        'checkbox-circle' => 'M12 22C6.48 22 2 17.52 2 12S6.48 2 12 2s10 4.48 10 10-4.48 10-10 10zm-1-7l5.59-5.59L15.18 8 11 12.18 8.82 10 7.41 11.41 11 15z',
        'mail'         => 'M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z',
        'map-pin'      => 'M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z',
        'building'     => 'M19 2H5C3.9 2 3 2.9 3 4v18h18V4c0-1.1-.9-2-2-2zM7 20H5v-2h2v2zm0-4H5v-2h2v2zm0-4H5v-2h2v2zm0-4H5V6h2v2zm6 12h-2v-2h2v2zm0-4h-2v-2h2v2zm0-4h-2v-2h2v2zm0-4h-2V6h2v2zm6 12h-2v-2h2v2zm0-4h-2v-2h2v2zm0-4h-2v-2h2v2zm0-4h-2V6h2v2z',
        'building-2'   => 'M12 7V3H2v18h20V7H12zM6 19H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V9h2v2zm0-4H4V5h2v2zm4 12H8v-2h2v2zm0-4H8v-2h2v2zm0-4H8V9h2v2zm0-4H8V5h2v2zm10 12h-8v-2h8v2zm0-4h-8v-2h8v2zm0-4h-8V9h8v2z',
        'building-3'   => 'M21 19h2v2h-2v-2h-2zM11 6h6v2h-6V6zm0 4h6v2h-6v-2zm0 4h6v2h-6v-2zm0 4h6v2h-6v-2zM3 22h18v-2H3v2zM7 6h2v2H7V6zm0 4h2v2H7v-2zm0 4h2v2H7v-2zm0 4h2v2H7v-2zM5 6V2h14v4',
        'customer-service' => 'M21 14v-3.95c0-3.97-3.41-7.05-7.41-7.05H10C6 3 3 6.08 3 10.05V14H1v6h6v-8H5v-1.95C5 7.18 7.36 5 10 5h4c2.64 0 5 2.18 5 5.05V12h-2v8h6v-6h-2z',
        'paint-brush'  => 'M7 21h10v-2H7v2zm9.61-3.59l-4.24-4.24c-.78.26-1.6.43-2.43.43-2.48 0-4.5-2.02-4.5-4.5s2.02-4.5 4.5-4.5 4.5 2.02 4.5 4.5c0 .83-.17 1.65-.43 2.43l4.24 4.24-1.41 1.42z',
        'compass'      => 'M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5.5 5.5L13 13l-5.5 4.5L11 13l5.5-4.5z',
        'dashboard'    => 'M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z',
        'refresh'      => 'M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z',
        'links'        => 'M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z',
        'award'        => 'M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6 9-4.91V17h2V9L12 3z',
        'git-merge'    => 'M22 12l-4-4v3H3v2h15v3l4-4zM7 9V3H5v6H1v2h4v6h2v-6h4V9H7z',
        'star'         => 'M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z',
        'play'         => 'M8 5v14l11-7z',
        'home'         => 'M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z',
        'building-4'   => 'M19 2H5C3.9 2 3 2.9 3 4v18h18V4c0-1.1-.9-2-2-2zM7 20H5v-2h2v2zm0-4H5v-2h2v2zm0-4H5v-2h2v2zm0-4H5V6h2v2zm6 12h-2v-2h2v2zm0-4h-2v-2h2v2zm0-4h-2v-2h2v2zm0-4h-2V6h2v2zm6 12h-2v-2h2v2zm0-4h-2v-2h2v2zm0-4h-2v-2h2v2zm0-4h-2V6h2v2z',
        'community'    => 'M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-7 0c1.66 0 3-1.34 3-3S6.66 6 5 6 2 7.34 2 9s1.34 3 3 3zm14 0c1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3 1.34 3 3 3zM5 14c-2.33 0-7 1.17-7 3.5V20h7v-2.5c0-.85.33-2.34 2.37-3.47-.87-.02-1.74-.03-2.37-.03zm14 0c-.63 0-1.5.01-2.37.03 2.04 1.13 2.37 2.62 2.37 3.47V20h7v-2.5c0-2.33-4.67-3.5-7-3.5zm-7 0c-3.33 0-9 1.67-9 5v3h18v-3c0-3.33-5.67-5-9-5z',
        'money-dollar-circle' => 'M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-1.5c-1.66 0-3-1.34-3-3h2c0 .55.45 1 1 1h2c.55 0 1-.45 1-1s-.45-1-1-1h-2c-1.66 0-3-1.34-3-3s1.34-3 3-3V5h2v1.5c1.66 0 3 1.34 3 3h-2c0-.55-.45-1-1-1h-2c-.55 0-1 .45-1 1s.45 1 1 1h2c1.66 0 3 1.34 3 3s-1.34 3-3 3V19z',
        'shield-cross' => 'M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm5 13h-4v4h-2v-4H7v-2h4V8h2v4h4v2z',
        'graduation-cap' => 'M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6 9-4.91V17h2V9L12 3z',
        'roadster'     => 'M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z',
    ];
    $path = $svgPaths[$name] ?? null;
@endphp
@if ($path)
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="{{ $size }}" height="{{ $size }}" fill="currentColor" aria-hidden="true" focusable="false" {{ $attributes }}><path d="{{ $path }}"/></svg>
@else
{{-- Fallback : nom inconnu, ne rien afficher (ou logger en dev) --}}
@endif
