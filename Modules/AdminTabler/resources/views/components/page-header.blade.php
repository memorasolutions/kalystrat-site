{{-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca --}}
{{-- Page header Tabler avec effet "overlap" bg-primary --}}
@props([
    'title' => null,
    'subtitle' => null,
    'breadcrumbs' => [],
])

<div class="page-header d-print-none">
    <div class="container-xl">

        {{-- Breadcrumb --}}
        @adminFeature('breadcrumbs')
            @if(!empty($breadcrumbs))
                <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                    @foreach($breadcrumbs as $crumb)
                        @if($loop->last)
                            <li class="breadcrumb-item active" aria-current="page">{{ $crumb['label'] }}</li>
                        @elseif(!empty($crumb['url']))
                            <li class="breadcrumb-item"><a href="{{ $crumb['url'] }}">{{ $crumb['label'] }}</a></li>
                        @else
                            <li class="breadcrumb-item">{{ $crumb['label'] }}</li>
                        @endif
                    @endforeach
                </ol>
            @endif
        @endadminFeature

        <div class="row g-2 align-items-center">
            <div class="col">
                @if($subtitle)
                    <div class="page-pretitle">{{ $subtitle }}</div>
                @endif
                <h2 class="page-title">{{ $title }}</h2>
            </div>

            {{-- Actions area : permet @yield('page-actions') --}}
            <div class="col-auto ms-auto d-print-none">
                @yield('page-actions')
            </div>
        </div>
    </div>
</div>
