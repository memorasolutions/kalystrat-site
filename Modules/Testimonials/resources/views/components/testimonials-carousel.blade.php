{{-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca --}}
@props([
    'limit' => 6,
    'layout' => 'grid',
    'columns' => 3,
])

@php
    $testimonials = collect();
    if (class_exists(\Modules\Testimonials\Models\Testimonial::class)) {
        $testimonials = \Modules\Testimonials\Models\Testimonial::approved()->ordered()->limit($limit)->get();
    }

    if ($testimonials->isEmpty()) {
        return;
    }

    $carouselId = 'testimonialsCarousel-' . Str::random(6);
@endphp

<section {{ $attributes->merge(['class' => 'testimonials-section']) }} aria-label="{{ __('Temoignages clients') }}">
    @if ($layout === 'carousel')
        <div id="{{ $carouselId }}" class="carousel slide" data-bs-ride="carousel" role="group" aria-roledescription="{{ __('Carousel de temoignages') }}">
            <div class="carousel-inner">
                @foreach ($testimonials as $index => $testimonial)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" role="group" aria-roledescription="{{ __('Temoignage') }}" aria-label="{{ ($index + 1) . ' / ' . $testimonials->count() }}">
                        @include('testimonials::components._card', ['testimonial' => $testimonial])
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">{{ __('Precedent') }}</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">{{ __('Suivant') }}</span>
            </button>
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-{{ $columns }} g-4">
            @foreach ($testimonials as $testimonial)
                <div class="col">
                    @include('testimonials::components._card', ['testimonial' => $testimonial])
                </div>
            @endforeach
        </div>
    @endif
</section>
