{{-- Page header Tabler navbar-overlap — text-white sur extension dark de la navbar --}}
@props(['title' => null, 'subtitle' => null, 'breadcrumbs' => []])

<div class="page-header d-print-none text-white" aria-label="{{ __('En-tête de page') }}">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                @if($subtitle)
                    <div class="page-pretitle">{{ $subtitle }}</div>
                @endif
                <h2 class="page-title">{{ $title }}</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">{{ $slot }}</div>
            </div>
        </div>

        @if(!empty($breadcrumbs))
            <ol class="breadcrumb breadcrumb-arrows mt-3" aria-label="breadcrumbs">
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
    </div>
</div>
