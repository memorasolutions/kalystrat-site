{{-- Header unifié Kalystrat 2026 (P22-S6).
     Si module Kalystrat actif : utilise le partial unifié sticky shrink.
     Sinon : fallback header Construz natif (legacy). --}}
@if(\Nwidart\Modules\Facades\Module::find('Kalystrat')?->isEnabled())
    @include('kalystrat::partials.header')
@else
    @include('frontend::elements.header-construz-legacy')
@endif
