{{-- Navbar — réplique 100% du HTML officiel preview.tabler.io/layout-navbar-overlap.html --}}
{{-- SVG inline (theme toggle, bell, profil) identiques à l'officiel + branding/menu Kalystrat --}}
@props(['user' => null, 'branding' => []])
@inject('navService', 'Modules\Backoffice\Services\NavigationService')
@php
    $sections = $navService->getNavigation(auth()->user());
    $badges = $navService->getBadges();
    $user = $user ?? auth()->user();
@endphp

<header class="navbar navbar-expand-md navbar-overlap d-print-none" data-bs-theme="dark">
    <div class="container-xl">
        {{-- TOGGLER --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="{{ __('Basculer la navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- LOGO --}}
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="{{ route('admin.dashboard') }}" aria-label="{{ $branding['site_name'] ?? config('app.name') }}">
                @if(!empty($branding['logo_light']))
                    <img src="{{ asset('storage/' . $branding['logo_light']) }}" alt="{{ $branding['site_name'] ?? '' }}" width="110" height="32" class="navbar-brand-image">
                @else
                    <span class="text-white fw-bold fs-3">{{ $branding['site_name'] ?? config('app.name') }}</span>
                @endif
            </a>
        </h1>

        {{-- ACTIONS RIGHT (theme + notifications + profile) --}}
        <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex">
                {{-- Theme toggle SVG officiel Tabler --}}
                <div class="nav-item">
                    <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="{{ __('Activer mode sombre') }}" data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                        </svg>
                    </a>
                    <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="{{ __('Activer mode clair') }}" data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                            <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                            <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                        </svg>
                    </a>
                </div>

                {{-- Notifications dropdown SVG officiel Tabler --}}
                <div class="nav-item dropdown d-none d-md-flex">
                    <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="{{ __('Notifications') }}" data-bs-auto-close="outside" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                            <path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                            <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                        </svg>
                        <span class="badge bg-red"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                        <div class="card">
                            <div class="card-header d-flex">
                                <h3 class="card-title">{{ __('Notifications') }}</h3>
                                <div class="btn-close ms-auto" data-bs-dismiss="dropdown"></div>
                            </div>
                            <div class="card-body">
                                <p class="text-secondary small mb-0">{{ __('Aucune nouvelle notification.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Profile dropdown --}}
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="{{ __('Menu utilisateur') }}" data-bs-auto-close="outside" aria-expanded="false">
                    <span class="avatar avatar-sm bg-primary text-white" style="display:inline-flex;align-items:center;justify-content:center;font-weight:600;">
                        {{ mb_strtoupper(mb_substr($user->name, 0, 2)) }}
                    </span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ $user->name }}</div>
                        <div class="mt-1 small text-secondary">{{ $user->roles->first()?->name ?? __('Utilisateur') }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="{{ route('admin.profile') }}" class="dropdown-item">{{ __('Profil') }}</a>
                    <a href="{{ route('admin.dashboard') }}" class="dropdown-item">{{ __('Tableau de bord') }}</a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">{{ __('Déconnexion') }}</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- NAV MENU (collapse mobile) — 8 dropdowns NavigationService --}}
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                <ul class="navbar-nav">
                    @foreach($sections as $sIdx => $section)
                        @php
                            $items = $section['items'];
                            $sectionActive = false;
                            foreach ($items as $item) {
                                if (isset($item['route'])) {
                                    $wild = str_replace('.index', '.*', $item['route']);
                                    if (request()->routeIs($item['route']) || request()->routeIs($wild)) { $sectionActive = true; break; }
                                }
                                if (!empty($item['children'])) {
                                    foreach ($item['children'] as $child) {
                                        if (isset($child['route'])) {
                                            $wild = str_replace('.index', '.*', $child['route']);
                                            if (request()->routeIs($child['route']) || request()->routeIs($wild)) { $sectionActive = true; break 2; }
                                        }
                                    }
                                }
                            }
                            $hasMultiple = count($items) > 1 || (count($items) === 1 && !empty($items[0]['children']));
                        @endphp

                        @if($hasMultiple)
                            <li class="nav-item dropdown {{ $sectionActive ? 'active' : '' }}">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <i data-lucide="{{ $section['icon'] ?? 'circle' }}" style="width:18px;height:18px;"></i>
                                    </span>
                                    <span class="nav-link-title">{{ __($section['label']) }}</span>
                                </a>
                                <div class="dropdown-menu">
                                    @foreach($items as $item)
                                        @if(!empty($item['children']))
                                            <div class="dropdown-header">{{ __($item['label']) }}</div>
                                            @foreach($item['children'] as $child)
                                                @php
                                                    $wild = isset($child['route']) ? str_replace('.index', '.*', $child['route']) : '';
                                                    $isActive = isset($child['route']) && (request()->routeIs($child['route']) || request()->routeIs($wild));
                                                @endphp
                                                <a class="dropdown-item {{ $isActive ? 'active' : '' }}" href="{{ isset($child['route']) ? route($child['route']) : '#' }}">{{ __($child['label']) }}</a>
                                            @endforeach
                                        @else
                                            @php
                                                $wild = isset($item['route']) ? str_replace('.index', '.*', $item['route']) : '';
                                                $isActive = isset($item['route']) && (request()->routeIs($item['route']) || request()->routeIs($wild));
                                            @endphp
                                            <a class="dropdown-item {{ $isActive ? 'active' : '' }}" href="{{ isset($item['route']) ? route($item['route']) : '#' }}">
                                                @if(isset($item['route'], $badges[$item['route']]))
                                                    <span class="badge bg-red float-end">{{ $badges[$item['route']] }}</span>
                                                @endif
                                                {{ __($item['label']) }}
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </li>
                        @else
                            @php
                                $item = $items[0];
                                $wild = isset($item['route']) ? str_replace('.index', '.*', $item['route']) : '';
                                $isActive = isset($item['route']) && (request()->routeIs($item['route']) || request()->routeIs($wild));
                            @endphp
                            <li class="nav-item {{ $isActive ? 'active' : '' }}">
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
    </div>
</header>
