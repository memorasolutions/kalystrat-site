{{--
    CTA pré-footer réutilisable – Kalystrat
    Pattern Awwwards 2026 : titre centré, hiérarchie claire, 2 boutons côte-à-côte.

    Usage :
    @include('frontend::partials.cta-discutons', [
        'ctaEyebrow' => 'Prêt à démarrer ?',
        'ctaTitle' => 'Discutons de votre projet de construction',
        'ctaDescription' => 'Téléphone, courriel ou formulaire ...',  // optionnel
        'ctaPrimary' => ['label' => 'Demander une soumission', 'url' => route('contact')],   // optionnel (défaut)
        'ctaSecondary' => ['label' => '418-476-0987', 'url' => 'tel:+14184760987'],       // optionnel (défaut)
    ])

    Préfixe ctaXxx pour éviter collision avec $title/$description du layout.
--}}
@php
    $_ctaEyebrow = $ctaEyebrow ?? 'Prêt à démarrer ?';
    $_ctaTitle = $ctaTitle ?? 'Discutons de votre projet de construction';
    $_ctaDescription = $ctaDescription ?? 'Téléphone, courriel ou formulaire&nbsp;: choisissez le canal qui vous convient. Réponse sous 48&nbsp;h ouvrables, sans engagement.';
    $_ctaPrimary = $ctaPrimary ?? ['label' => 'Demander une soumission', 'url' => route('contact')];
    $_ctaSecondary = $ctaSecondary ?? ['label' => '418-476-0987', 'url' => 'tel:+14184760987', 'icon' => 'ri-phone-line'];
@endphp

<section class="ks-cta-discutons" aria-label="Appel à l'action – Discutons de votre projet">
    <div class="container">
        <div class="ks-cta-discutons__wrap">
            <span class="ks-cta-discutons__eyebrow">{{ $_ctaEyebrow }}</span>
            <h2 class="ks-cta-discutons__title">{!! $_ctaTitle !!}</h2>
            @if(!empty($_ctaDescription))
                <p class="ks-cta-discutons__desc">{!! $_ctaDescription !!}</p>
            @endif
            <div class="ks-cta-discutons__actions">
                <a href="{{ $_ctaPrimary['url'] }}" class="ks-cta-discutons__btn ks-cta-discutons__btn--primary">
                    {{ $_ctaPrimary['label'] }}
                    <i class="ri-arrow-right-up-line" aria-hidden="true"></i>
                </a>
                <a href="{{ $_ctaSecondary['url'] }}" class="ks-cta-discutons__btn ks-cta-discutons__btn--secondary">
                    @if(!empty($_ctaSecondary['icon']))<i class="{{ $_ctaSecondary['icon'] }}" aria-hidden="true"></i>@endif
                    {{ $_ctaSecondary['label'] }}
                </a>
            </div>
        </div>
    </div>
</section>
