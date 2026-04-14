{{-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca --}}
@props(['limit' => 5, 'featured' => false])

@php
    if (!class_exists(\Modules\Blog\Models\Article::class)) {
        return;
    }

    $query = \Modules\Blog\Models\Article::published()->latest('published_at');

    if ($featured) {
        $query->featured();
    }

    $articles = $query->limit($limit)->get();

    if ($articles->isEmpty()) {
        return;
    }
@endphp

<section {{ $attributes->merge(['class' => 'recent-posts']) }} aria-label="{{ __('Articles recents') }}">
    <ul class="list-group list-group-flush">
        @foreach ($articles as $article)
            <li class="list-group-item px-0 py-3">
                <h6 class="fw-semibold mb-1">{{ $article->title }}</h6>
                <div class="text-body-secondary small mb-1">
                    {{ $article->published_at->diffForHumans() }}
                </div>
                @if ($article->excerpt)
                    <p class="text-body-secondary small mb-1">{{ Str::limit(strip_tags($article->excerpt), 100) }}</p>
                @endif
                @if ($article->blogCategory)
                    <span class="badge bg-secondary bg-opacity-10 text-secondary">{{ $article->blogCategory->name }}</span>
                @endif
            </li>
        @endforeach
    </ul>
</section>
