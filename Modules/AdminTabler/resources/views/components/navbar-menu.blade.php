{{-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca --}}
{{-- Nav menu horizontal Tabler avec dropdowns par section (NavigationService) --}}
@inject('navService', 'Modules\Backoffice\Services\NavigationService')

@php
    $sections = $navService->getNavigation(auth()->user());
    $badges = $navService->getBadges();
@endphp

<div class="collapse navbar-collapse" id="navbar-menu">
    <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
        <ul class="navbar-nav">
            @foreach($sections as $sIdx => $section)
                @php
                    $items = $section['items'];
                    $hasMultipleItems = count($items) > 1;

                    // Section active si une de ses items/children est active
                    $sectionActive = false;
                    foreach ($items as $item) {
                        if (isset($item['route'])) {
                            $wild = str_replace('.index', '.*', $item['route']);
                            if (request()->routeIs($item['route']) || request()->routeIs($wild)) {
                                $sectionActive = true;
                                break;
                            }
                        }
                        if (!empty($item['children'])) {
                            foreach ($item['children'] as $child) {
                                $wild = str_replace('.index', '.*', $child['route']);
                                if (isset($child['route']) && (request()->routeIs($child['route']) || request()->routeIs($wild))) {
                                    $sectionActive = true;
                                    break 2;
                                }
                            }
                        }
                    }
                @endphp

                @if($hasMultipleItems || count($items) === 1 && !empty($items[0]['children']))
                    {{-- Section avec dropdown --}}
                    <li class="nav-item dropdown {{ $sectionActive ? 'active' : '' }}">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            data-bs-toggle="dropdown"
                            data-bs-auto-close="outside"
                            role="button"
                            aria-expanded="false"
                        >
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i data-lucide="{{ $section['icon'] ?? 'circle' }}" style="width:18px;height:18px;"></i>
                            </span>
                            <span class="nav-link-title">{{ __($section['label']) }}</span>
                        </a>
                        <div class="dropdown-menu">
                            @foreach($items as $item)
                                @if(!empty($item['children']))
                                    {{-- Sub-dropdown : on aplatit pour cette session --}}
                                    <div class="dropdown-header">{{ __($item['label']) }}</div>
                                    @foreach($item['children'] as $child)
                                        @php
                                            $childWild = isset($child['route']) ? str_replace('.index', '.*', $child['route']) : '';
                                            $childActive = isset($child['route']) && (request()->routeIs($child['route']) || request()->routeIs($childWild));
                                        @endphp
                                        <a
                                            class="dropdown-item {{ $childActive ? 'active' : '' }}"
                                            href="{{ isset($child['route']) ? route($child['route']) : '#' }}"
                                        >
                                            {{ __($child['label']) }}
                                        </a>
                                    @endforeach
                                @else
                                    @php
                                        $itemWild = isset($item['route']) ? str_replace('.index', '.*', $item['route']) : '';
                                        $itemActive = isset($item['route']) && (request()->routeIs($item['route']) || request()->routeIs($itemWild));
                                    @endphp
                                    <a
                                        class="dropdown-item {{ $itemActive ? 'active' : '' }}"
                                        href="{{ isset($item['route']) ? route($item['route']) : '#' }}"
                                    >
                                        @if(isset($item['route'], $badges[$item['route']]))
                                            <span class="badge bg-red ms-auto">{{ $badges[$item['route']] }}</span>
                                        @endif
                                        {{ __($item['label']) }}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </li>
                @else
                    {{-- Section avec un seul item simple --}}
                    @php
                        $item = $items[0];
                        $itemWild = isset($item['route']) ? str_replace('.index', '.*', $item['route']) : '';
                        $itemActive = isset($item['route']) && (request()->routeIs($item['route']) || request()->routeIs($itemWild));
                    @endphp
                    <li class="nav-item {{ $itemActive ? 'active' : '' }}">
                        <a class="nav-link" href="{{ isset($item['route']) ? route($item['route']) : '#' }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i data-lucide="{{ $section['icon'] ?? $item['icon'] ?? 'circle' }}" style="width:18px;height:18px;"></i>
                            </span>
                            <span class="nav-link-title">{{ __($section['label']) }}</span>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>
