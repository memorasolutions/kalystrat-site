{{-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca --}}
@props([
    'title' => null,
    'placeholder' => __('Votre courriel'),
    'buttonText' => __('S\'inscrire'),
])

@php
    if (!Route::has('newsletter.subscribe')) {
        return;
    }
    $inputId = 'newsletter-email-' . Str::random(4);
@endphp

<section {{ $attributes->merge(['class' => 'newsletter-subscribe']) }}>
    @if ($title)
        <h5 class="mb-3">{{ $title }}</h5>
    @endif

    @if (session('newsletter_success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('newsletter_success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('Fermer') }}"></button>
        </div>
    @endif

    <form action="{{ route('newsletter.subscribe') }}" method="POST">
        @csrf
        <div class="input-group">
            <label for="{{ $inputId }}" class="visually-hidden">{{ __('Adresse courriel') }}</label>
            <input
                type="email"
                id="{{ $inputId }}"
                name="email"
                value="{{ old('email') }}"
                placeholder="{{ $placeholder }}"
                class="form-control @if(isset($errors) && $errors->has('email')) is-invalid @endif"
                aria-describedby="{{ $inputId }}-error"
                required
            >
            <button class="btn btn-primary" type="submit">{{ $buttonText }}</button>
        </div>
        @if(isset($errors) && $errors->has('email'))
            <div id="{{ $inputId }}-error" class="invalid-feedback d-block mt-1">{{ $errors->first('email') }}</div>
        @endif
    </form>
</section>
