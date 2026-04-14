<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
@inject('nav', 'Modules\Backoffice\Services\NavigationService')

<nav class="sidebar" aria-label="{{ __('Menu administration') }}" style="background:var(--sidebar-bg, #0c1427);">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand" style="font-family:var(--topbar-font-family);font-size:var(--topbar-font-size);font-weight:var(--topbar-font-weight);letter-spacing:var(--topbar-letter-spacing);word-spacing:var(--topbar-word-spacing);text-transform:var(--topbar-text-transform);overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
            {{ $branding['site_name'] ?? config('app.name') }}
        </a>
        <button type="button" class="sidebar-toggler not-active" aria-label="{{ __('Basculer le menu') }}" aria-expanded="true" aria-controls="sidebarNav">
            <span></span><span></span><span></span>
        </button>
    </div>
    <button type="button" class="btn-close d-lg-none position-absolute top-0 end-0 m-3 sidebar-close" aria-label="{{ __('Fermer le menu') }}"></button>

    <div class="sidebar-body">
        <ul class="nav" id="sidebarNav">
            @php
                $navigation = $nav->getNavigation(auth()->user());
                $badges = $nav->getBadges();
            @endphp

            @foreach ($navigation as $sIdx => $section)
                <li class="nav-item nav-category">{{ __($section['label']) }}</li>

                @foreach ($section['items'] as $iIdx => $item)
                    @php
                        $hasChildren = ! empty($item['children']);
                        $isActive = false;
                        $isParentActive = false;
                        $routeWild = isset($item['route']) ? str_replace('.index', '.*', $item['route']) : '';

                        if (isset($item['route'])) {
                            $isActive = request()->routeIs($item['route']) || request()->routeIs($routeWild);
                        }

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

                    <li class="nav-item {{ $isActive ? 'active' : '' }}">
                        @if ($hasChildren)
                            <a class="nav-link" data-bs-toggle="collapse" href="#{{ $collapseId }}" role="button"
                               aria-expanded="{{ $isParentActive ? 'true' : 'false' }}" aria-controls="{{ $collapseId }}">
                                @if (! empty($item['icon']))
                                    <i class="link-icon" data-lucide="{{ $item['icon'] }}"></i>
                                @endif
                                <span class="link-title">{{ __($item['label']) }}</span>
                                <i class="link-arrow" data-lucide="chevron-down"></i>
                            </a>
                            <div class="collapse {{ $isParentActive ? 'show' : '' }}" id="{{ $collapseId }}">
                                <ul class="nav sub-menu">
                                    @foreach ($item['children'] as $child)
                                        @php
                                            $childWild = isset($child['route']) ? str_replace('.index', '.*', $child['route']) : '';
                                            $childActive = isset($child['route']) && (request()->routeIs($child['route']) || request()->routeIs($childWild));
                                        @endphp
                                        <li class="nav-item">
                                            <a class="nav-link {{ $childActive ? 'active' : '' }}"
                                               href="{{ isset($child['route']) ? route($child['route']) : '#' }}"
                                               @if ($childActive) aria-current="page" @endif>
                                                {{ __($child['label']) }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <a class="nav-link {{ $isActive ? 'active' : '' }}"
                               href="{{ isset($item['route']) ? route($item['route']) : '#' }}"
                               @if ($isActive) aria-current="page" @endif>
                                @if (! empty($item['icon']))
                                    <i class="link-icon" data-lucide="{{ $item['icon'] }}"></i>
                                @endif
                                <span class="link-title">{{ __($item['label']) }}</span>
                                @if (isset($item['route'], $badges[$item['route']]))
                                    <span class="badge bg-danger bg-opacity-75 rounded-pill ms-auto" style="font-size:0.65rem">{{ $badges[$item['route']] }}</span>
                                @endif
                            </a>
                        @endif
                    </li>
                @endforeach
            @endforeach
        </ul>
    </div>
</nav>
