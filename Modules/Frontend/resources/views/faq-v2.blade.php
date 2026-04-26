@extends('frontend::layout-v2')

@section('title', 'FAQ — Questions fréquentes | Kalystrat construction Québec')
@section('meta_description', 'Réponses aux questions fréquentes sur Kalystrat : holding construction québécois 6 filiales, services, RBQ, soumissions, méthodologie. Guide complet.')

@push('styles')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "FAQPage",
  "mainEntity": [
    @foreach($faqs as $i => $faq)
    {
      "@@type": "Question",
      "name": @json($faq['question']),
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": @json($faq['answer'])
      }
    }@if(!$loop->last),@endif
    @endforeach
  ]
}
</script>
@endpush

@section('content')

@include('frontend::partials-v2.page-hero', [
    'heroTitle' => 'Questions fréquentes',
    'heroSubtitle' => 'FAQ Kalystrat',
    'heroBg' => 'assets/img/kalystrat/about-bg.jpg',
    'heroBreadcrumb' => [
        ['label' => 'Accueil', 'url' => route('frontend.home')],
        ['label' => 'FAQ'],
    ],
])

<section class="space">
    <div class="container">
        <div class="col-lg-9 mx-auto">
            <div class="title-area text-center mb-5">
                <h6 class="text-gold">RÉPONSES RAPIDES</h6>
                <h2>Questions fréquentes</h2>
                <p>Tout ce que vous devez savoir sur Kalystrat, holding québécois construction 6 filiales spécialisées.</p>
            </div>
            <div class="accordion" id="faqAccordion">
                @foreach($faqs as $i => $faq)
                <div class="accordion-item mb-2 border-0" style="background: #f8f9fa;">
                    <h3 class="accordion-header" id="heading{{ $i }}">
                        <button class="accordion-button @if($i > 0) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded="@if($i === 0)true@else false@endif" aria-controls="collapse{{ $i }}" style="background: #fff; color: #0A1628; font-weight: 700; font-family: 'Archivo', sans-serif;">
                            {{ $faq['question'] }}
                        </button>
                    </h3>
                    <div id="collapse{{ $i }}" class="accordion-collapse collapse @if($i === 0) show @endif" aria-labelledby="heading{{ $i }}" data-bs-parent="#faqAccordion">
                        <div class="accordion-body" style="background: #fff;">
                            {!! nl2br(e($faq['answer'])) !!}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@include('frontend::partials-v2.section-cta', [
    'ctaTitle' => 'Une autre question ?',
    'ctaText' => 'Contactez notre équipe — réponse sous 24 h.',
    'ctaButtonText' => 'NOUS CONTACTER',
])

@endsection
