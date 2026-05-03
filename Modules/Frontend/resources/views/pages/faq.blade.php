@extends('frontend::layout')

@push('head')
<meta name="dateModified" content="2026-05-01">
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'url' => 'https://kalystrat.ca/faq',
    'dateModified' => '2026-05-01',
    'speakable' => [
        '@type' => 'SpeakableSpecification',
        'cssSelector' => ['.faq-question', '.faq-answer'],
    ],
    'mainEntity' => array_map(fn($f) => [
        '@type' => 'Question',
        'name' => $f['question'],
        'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['answer']],
    ], $faqs),
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil', 'item' => 'https://kalystrat.ca/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'FAQ', 'item' => 'https://kalystrat.ca/faq'],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')

{{-- Bannière --}}
@include('frontend::partials.page-banner', [
    'title' => 'Questions fréquentes',
    'breadcrumbs' => [
        ['label' => 'Accueil', 'url' => route('index')],
        ['label' => 'FAQ', 'url' => null],
    ],
])

{{-- Section FAQ : intro + accordéon + image --}}
<div class="faq-area space-top space-bottom" style="padding: 5rem 0;">
    <div class="container">
        <div class="row g-5 align-items-start">
            <div class="col-lg-5">
                <div class="title-area">
                    <span class="sub-title text-theme">Foire aux questions</span>
                    <h2 class="sec-title" style="color: var(--ks-navy); font-size: 2rem; font-weight: 700;">Réponses claires sur Kalystrat</h2>
                    <p class="sec-text">Groupe, six filiales, services, soumission, garantie <abbr title="Garantie de construction résidentielle">GCR</abbr>, <abbr title="Régie du bâtiment du Québec">RBQ</abbr>, <abbr title="Commission de la construction du Québec">CCQ</abbr>, carrières&nbsp;: voici les questions que les propriétaires, entrepreneurs et investisseurs nous posent le plus.</p>
                </div>
                <div class="mt-4" style="background: var(--ks-navy); color: #FFFFFF; padding: 2rem; border-radius: 0.5rem;">
                    <h3 style="color: #FFFFFF; font-size: 1.25rem; font-weight: 700; margin-bottom: 0.75rem;">Une question hors liste&nbsp;?</h3>
                    <p style="color: #C2C5C9; font-size: 0.9375rem; margin-bottom: 1.25rem;">Notre équipe répond directement par téléphone ou par courriel.</p>
                    <a href="tel:+14184760987" style="display: inline-block; color: var(--ks-gold); font-size: 1.25rem; font-weight: 700; text-decoration: none; min-height: 44px; padding: 0.5rem 0;"><i class="ri-phone-line" aria-hidden="true"></i> 418-476-0987</a><br>
                    <a href="mailto:info@kalystrat.ca" style="color: #FFFFFF; text-decoration: underline; font-size: 0.9375rem; min-height: 44px; display: inline-block; padding: 0.5rem 0;">info@kalystrat.ca</a>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="accordion" id="ksFaqAccordion">
                    @foreach($faqs as $i => $faq)
                    <div class="accordion-item mb-3" style="border: 1px solid #E9E9E6; border-radius: 0.5rem; background: #FFFFFF; overflow: hidden;">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed faq-question" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $i }}" aria-expanded="false" aria-controls="faq{{ $i }}" style="font-weight: 600; color: var(--ks-navy); padding: 1.25rem 1.5rem; background: #FFFFFF; min-height: 60px;">
                                {{ $faq['question'] }}
                            </button>
                        </h2>
                        <div id="faq{{ $i }}" class="accordion-collapse collapse" data-bs-parent="#ksFaqAccordion">
                            <div class="accordion-body faq-answer" style="padding: 0 1.5rem 1.5rem; color: #2C3340; line-height: 1.7;">{!! nl2br(e($faq['answer'])) !!}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

{{-- CTA finale --}}
@include('frontend::partials.cta-discutons', [
    'ctaEyebrow' => 'Discutons',
    'ctaTitle' => 'Une autre question&nbsp;? Parlons-en',
    'ctaDescription' => '',
    'ctaPrimary' => ['label' => 'Nous écrire', 'url' => route('contact')],
])

@endsection
