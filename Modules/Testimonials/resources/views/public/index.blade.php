{{-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca --}}
@extends('privacy::layouts.legal')

@section('title', __('Temoignages'))

@section('content')
<div class="max-w-5xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-900 mb-6">{{ __('Temoignages clients') }}</h1>

    @if ($testimonials->isEmpty())
        <p class="text-gray-500 text-center py-8">{{ __('Aucun temoignage pour le moment.') }}</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($testimonials as $testimonial)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center mb-4">
                        @if ($testimonial->author_avatar)
                            <img src="{{ $testimonial->author_avatar }}" class="w-12 h-12 rounded-full object-cover mr-3" alt="{{ $testimonial->author_name }}">
                        @else
                            <div class="w-12 h-12 rounded-full bg-sky-500 text-white flex items-center justify-center mr-3 font-bold text-lg" aria-hidden="true">
                                {{ mb_substr($testimonial->author_name, 0, 1) }}
                            </div>
                        @endif
                        <div>
                            <h2 class="font-semibold text-gray-900">{{ $testimonial->author_name }}</h2>
                            @if ($testimonial->author_title)
                                <p class="text-sm text-gray-500">{{ $testimonial->author_title }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="text-gray-700 mb-3">{!! $testimonial->safeContent() !!}</div>
                    <div class="text-amber-400" role="img" aria-label="{{ __(':rating sur 5 etoiles', ['rating' => $testimonial->rating]) }}">
                        @for ($i = 1; $i <= 5; $i++)
                            <span aria-hidden="true">{{ $i <= $testimonial->rating ? "\u{2605}" : "\u{2606}" }}</span>
                        @endfor
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
