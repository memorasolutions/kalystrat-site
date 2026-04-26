@php
    $heroTitle = $heroTitle ?? 'Kalystrat';
    $heroSubtitle = $heroSubtitle ?? '';
    $heroBg = $heroBg ?? 'assets/img/kalystrat/hero-skyline.jpg';
    $heroBreadcrumb = $heroBreadcrumb ?? [];
@endphp
<section class="page-hero" style="background-image: url('{{ asset($heroBg) }}');">
    <div class="page-hero-overlay"></div>
    <div class="container">
        <div class="page-hero-content text-center">
            @if($heroSubtitle)
                <p class="hero-subtitle">{{ $heroSubtitle }}</p>
            @endif
            <h1 class="page-hero-title">{{ $heroTitle }}</h1>
            @if(!empty($heroBreadcrumb))
                <nav aria-label="Fil d'Ariane">
                    <ol class="breadcrumb">
                        @foreach($heroBreadcrumb as $i => $item)
                            @if(!empty($item['url']) && !$loop->last)
                                <li class="breadcrumb-item"><a href="{{ $item['url'] }}">{{ $item['label'] }}</a></li>
                            @else
                                <li class="breadcrumb-item active" aria-current="page">{{ $item['label'] }}</li>
                            @endif
                        @endforeach
                    </ol>
                </nav>
            @endif
        </div>
    </div>
</section>
