@php
    $ctaTitle = $ctaTitle ?? 'Prêt à concevoir votre projet ?';
    $ctaText = $ctaText ?? 'Une question, un terrain, un projet — parlons-en.';
    $ctaButtonText = $ctaButtonText ?? 'DEMANDER UNE SOUMISSION';
    $ctaButtonUrl = $ctaButtonUrl ?? route('frontend.contact');
@endphp
<section class="cta-area" style="background-color: #B8A472;">
    <div class="container">
        <div class="text-center">
            <h2 style="color: #0A1628;">{{ $ctaTitle }}</h2>
            <p style="color: #0A1628; font-size: 18px; margin-bottom: 25px;">{{ $ctaText }}</p>
            <a href="{{ $ctaButtonUrl }}" class="btn style1" style="background-color: #0A1628; color: #B8A472; border-color: #0A1628;" aria-label="{{ $ctaButtonText }}">{{ $ctaButtonText }}</a>
        </div>
    </div>
</section>
