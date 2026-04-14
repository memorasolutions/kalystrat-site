{{-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca --}}
<div class="card h-100 shadow-sm">
    <div class="card-body">
        <div class="d-flex align-items-center mb-3">
            @if ($testimonial->author_avatar)
                <img src="{{ $testimonial->author_avatar }}" class="rounded-circle me-3" alt="{{ $testimonial->author_name }}" width="50" height="50" style="object-fit: cover;">
            @else
                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;" aria-hidden="true">
                    <span class="fs-5 fw-bold">{{ mb_substr($testimonial->author_name, 0, 1) }}</span>
                </div>
            @endif
            <div>
                <h3 class="card-title h6 mb-0">{{ $testimonial->author_name }}</h3>
                @if ($testimonial->author_title)
                    <small class="text-body-secondary">{{ $testimonial->author_title }}</small>
                @endif
            </div>
        </div>
        <p class="card-text">{!! $testimonial->safeContent() !!}</p>
        <div class="text-warning" role="img" aria-label="{{ __(':rating sur 5 etoiles', ['rating' => $testimonial->rating]) }}">
            @for ($i = 1; $i <= 5; $i++)
                <span aria-hidden="true">{{ $i <= $testimonial->rating ? "\u{2605}" : "\u{2606}" }}</span>
            @endfor
        </div>
    </div>
</div>
