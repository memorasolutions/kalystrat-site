{{-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca --}}
{{-- Sidebar verticale Tabler — consomme NavigationService existant (zéro régression) --}}
@inject('navService', 'Modules\Backoffice\Services\NavigationService')

@php
    $sections = $navService->getNavigation(auth()->user());
    $badges = $navService->getBadges();
    $siteName = $branding['site_name'] ?? config('app.name');
    $logoLight = $branding['logo_light'] ?? null;
    $logoDark = $branding['logo_dark'] ?? null;
@endphp

<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark" aria-label="{{ __('Menu administration') }}">
    <div class="container-fluid">
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#sidebar-menu"
            aria-controls="sidebar-menu"
            aria-expanded="false"
            aria-label="{{ __('Basculer le menu') }}"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <h1 class="navbar-brand navbar-brand-autodark">
            <a href="{{ route('admin.dashboard') }}" aria-label="{{ __('Retour au tableau de bord') }}">
                @if($logoLight)
                    <img
                        src="{{ asset('storage/' . $logoLight) }}"
                        alt="{{ $siteName }}"
                        width="auto"
                        height="32"
                        class="navbar-brand-image"
                    >
                @else
                    <span class="text-white fw-bold">{{ $siteName }}</span>
                @endif
            </a>
        </h1>

        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3 navbar-nav-scroll" data-simplebar>
                @foreach($sections as $sIdx => $section)
                    <li class="nav-item nav-category">
                        <span class="nav-link-title text-uppercase">
                            <i data-lucide="{{ $section['icon'] ?? 'circle' }}" class="me-2"></i>
                            {{ __($section['label']) }}
                        </span>
                    </li>

                    @foreach($section['items'] as $iIdx => $item)
                        @php
                            $hasChildren = !empty($item['children']);
                            $routeWild = isset($item['route']) ? str_replace('.index', '.*', $item['route']) : '';
                            $isActive = isset($item['route']) && (request()->routeIs($item['route']) || request()->routeIs($routeWild));
                            $isParentActive = false;

                            if ($hasChildren) {
                                foreach ($item['children'] as $child) {
                                    $childWild = isset($child['route']) ? str_replace('.index', '.*', $child['route']) : '';
                                    if (isset($child['route']) && (request()->routeIs($child['route']) || request()->routeIs($childWild))) {
                                        $isParentActive = true;
                                        $isActive = true;
                                        break;
                                    }
                                }
                            }

                            $collapseId = "nav-{$sIdx}-{$iIdx}";
                        @endphp

                        <li class="nav-item @if($isActive) active @endif">
                            @if($hasChildren)
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#{{ $collapseId }}"
                                    data-bs-toggle="collapse"
                                    role="button"
                                    aria-expanded="{{ $isParentActive ? 'true' : 'false' }}"
                                    aria-controls="{{ $collapseId }}"
                                >
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <i data-lucide="{{ $item['icon'] ?? 'circle' }}"></i>
                                    </span>
                                    <span class="nav-link-title">{{ __($item['label']) }}</span>
                                </a>
                                <div class="collapse @if($isParentActive) show @endif" id="{{ $collapseId }}">
                                    <ul class="nav nav-pills nav-fill nav-vertical">
                                        @foreach($item['children'] as $child)
                                            @php
                                                $childWild = isset($child['route']) ? str_replace('.index', '.*', $child['route']) : '';
                                                $childActive = isset($child['route']) && (request()->routeIs($child['route']) || request()->routeIs($childWild));
                                            @endphp
                                            <li class="nav-item @if($childActive) active @endif">
                                                <a
                                                    class="nav-link"
                                                    href="{{ isset($child['route']) ? route($child['route']) : '#' }}"
                                                    @if($childActive) aria-current="page" @endif
                                                >
                                                    @if(!empty($child['icon']))
                                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                            <i data-lucide="{{ $child['icon'] }}"></i>
                                                        </span>
                                                    @endif
                                                    <span class="nav-link-title">{{ __($child['label']) }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @else
                                <a
                                    class="nav-link"
                                    href="{{ isset($item['route']) ? route($item['route']) : '#' }}"
                                    @if($isActive) aria-current="page" @endif
                                >
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <i data-lucide="{{ $item['icon'] ?? 'circle' }}"></i>
                                    </span>
                                    <span class="nav-link-title">{{ __($item['label']) }}</span>
                                    @if(isset($item['route'], $badges[$item['route']]))
                                        <span class="badge bg-red ms-auto">{{ $badges[$item['route']] }}</span>
                                    @endif
                                </a>
                            @endif
                        </li>
                    @endforeach
                @endforeach
            </ul>
        </div>
    </div>
</aside>
