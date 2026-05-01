@extends('frontend::layout-v2')

@section('title', 'FAQ - Kalystrat')
@section('meta_description', '15 réponses fréquentes sur Kalystrat, holding québécois de construction. Six filiales spécialisées, certifications RBQ et CCQ, méthodologie et soumissions.')

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

@include('frontend::partials-v2.breadcumb-v2', [
    'pageTitle' => 'Questions fréquentes',
    'breadcumbItems' => [
        ['label' => 'Accueil', 'url' => route('index')],
        ['label' => 'FAQ', 'url' => null]
    ]
])

<section class="faq-area space">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="title-area text-center mb-50">
                    <span class="sub-title text-theme">RÉPONSES RAPIDES</span>
                    <h2 class="sec-title">Questions fréquentes</h2>
                    <p>15 réponses sur Kalystrat — holding québécois construction.</p>
                </div>
                <div class="accordion" id="faqAccordion">
                    @foreach($faqs as $i => $faq)
                    <div class="accordion-item mb-3">
                        <h3 class="accordion-header" id="heading{{ $i }}">
                            <button class="accordion-button {{ $i > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded="{{ $i === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $i }}">
                                {{ $faq['question'] }}
                            </button>
                        </h3>
                        <div id="collapse{{ $i }}" class="accordion-collapse collapse {{ $i === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $i }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">{!! nl2br(e($faq['answer'])) !!}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<div class="cta-area-5 space-bottom">
    <div class="container">
        <div class="cta-wrap5" data-bg-src="{{ asset('assets/img/kalystrat/cta-quebec-1280w.jpg') }}" style="background-image: url('{{ asset('assets/img/kalystrat/cta-quebec-1280w.jpg') }}');">
            <h4 class="cta-title text-white">Une autre question ?</h4>
            <a class="btn style4" href="{{ route('contact') }}">NOUS CONTACTER <i class="ri-arrow-right-up-line"></i></a>
        </div>
    </div>
</div>

@endsection
