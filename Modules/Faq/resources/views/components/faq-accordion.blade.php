{{-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca --}}
@props(['limit' => 10, 'category' => null])

@php
    if (!class_exists(\Modules\Faq\Models\Faq::class)) {
        return;
    }

    $query = \Modules\Faq\Models\Faq::published()->ordered();

    if ($category) {
        $query->byCategory($category);
    }

    $faqs = $query->limit($limit)->get();

    if ($faqs->isEmpty()) {
        return;
    }

    $accordionId = 'faqAccordion-' . Str::random(6);
@endphp

<section {{ $attributes->merge(['class' => 'faq-section']) }} aria-label="{{ __('Questions frequentes') }}">
    <div class="accordion" id="{{ $accordionId }}">
        @foreach ($faqs as $index => $faq)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading-{{ $accordionId }}-{{ $index }}">
                    <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $accordionId }}-{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse-{{ $accordionId }}-{{ $index }}">
                        {{ $faq->question }}
                    </button>
                </h2>
                <div id="collapse-{{ $accordionId }}-{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading-{{ $accordionId }}-{{ $index }}" data-bs-parent="#{{ $accordionId }}">
                    <div class="accordion-body text-body-secondary">
                        {!! $faq->safeAnswer() !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
