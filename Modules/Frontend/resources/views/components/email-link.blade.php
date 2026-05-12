{{-- T169 — Composant email anti-harvesting (JS reveal au chargement + clic)
     Le HTML statique ne contient JAMAIS user@domain en clair.
     Le JS assemble le mailto: au DOMContentLoaded + click.
     WCAG : <a> standard + aria-label explicite + clavier-accessible.
--}}
@props([
    'user' => 'info',
    'domain' => 'kalystrat.ca',
    'class' => '',
    'aria' => null,
    'showText' => true,    {{-- true = JS affiche user@domain, false = garde le slot --}}
])
@php
  $ariaLabel = $aria ?? ('Envoyer un courriel à ' . $user . ' chez ' . str_replace('.', ' point ', $domain));
@endphp
<a href="#"
   class="ks-email-protect {{ $class }}"
   data-u="{{ $user }}"
   data-d="{{ $domain }}"
   @if(!$showText) data-keep-slot="1" @endif
   aria-label="{{ $ariaLabel }}"
   rel="nofollow noopener">{!! $slot->isEmpty() ? '…' : $slot !!}</a>
