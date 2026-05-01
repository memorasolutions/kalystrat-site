@props([
    'src' => '',
    'alt' => '',
    'width' => null,
    'height' => null,
    'sizes' => '(max-width: 768px) 100vw, 1280px',
    'priority' => false,
    'class' => '',
    'responsive' => false,
    'breakpoints' => [768, 1280],
])

@php
    $loading = $priority ? 'eager' : 'lazy';
    $fetchpriority = $priority ? 'high' : null;
    $imgAttributes = array_filter([
        'alt' => $alt,
        'width' => $width,
        'height' => $height,
        'loading' => $loading,
        'decoding' => 'async',
        'fetchpriority' => $fetchpriority,
        'class' => $class,
    ]);
@endphp

<picture>
    @if ($responsive)
        @php
            $generateSrcset = function($ext) use ($src, $breakpoints) {
                return implode(', ', array_map(fn($w) => asset("{$src}-{$w}w.{$ext}") . " {$w}w", $breakpoints));
            };
        @endphp
        <source type="image/avif" srcset="{{ $generateSrcset('avif') }}" sizes="{{ $sizes }}">
        <source type="image/webp" srcset="{{ $generateSrcset('webp') }}" sizes="{{ $sizes }}">
        <img {{ $attributes->merge($imgAttributes)->except(['src']) }} src="{{ asset($src . '-' . max($breakpoints) . 'w.jpg') }}">
    @else
        <source type="image/avif" srcset="{{ asset($src . '.avif') }}">
        <source type="image/webp" srcset="{{ asset($src . '.webp') }}">
        <img {{ $attributes->merge($imgAttributes)->except(['src']) }} src="{{ asset($src . '.jpg') }}">
    @endif
</picture>
