@php $breadcumbItems = $breadcumbItems ?? []; @endphp

{{-- Schema.org BreadcrumbList JSON-LD (SEO/AEO) --}}
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@@type": "ListItem",
            "position": 1,
            "name": "Accueil",
            "item": "{{ route('index') }}"
        }
        @foreach($breadcumbItems as $item)
            ,
            {
                "@@type": "ListItem",
                "position": {{ $loop->iteration + 1 }},
                "name": @json($item['label']),
                "item": "{{ $item['url'] ?? url()->current() }}"
            }
        @endforeach
    ]
}
</script>

<div class="breadcumb-wrapper" style="background-image: url('{{ asset('assets/construz-new/img/bg/breadcrumb-bg.png') }}')">
    <div class="section-animation-shape1-1 shape-mockup animation-infinite" data-top="0" style="background-image: url('{{ asset('assets/construz-new/img/shape/global-line-shape1.png') }}')"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcumb-content">
                    <h1 class="breadcumb-title">{{ $pageTitle ?? 'Kalystrat' }}</h1>
                    <ul class="breadcumb-menu">
                        <li><a href="{{ route('index') }}"><i class="ri-home-4-fill"></i> ACCUEIL</a></li>
                        @foreach($breadcumbItems as $item)
                            @if($loop->last)
                                <li class="active">{{ $item['label'] }}</li>
                            @else
                                <li><a href="{{ $item['url'] }}">{{ $item['label'] }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
