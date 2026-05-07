{{-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca --}}
{{-- Actions navbar Tabler officiel : theme toggle + notifications + profil --}}
@props(['user'])

<div class="navbar-nav flex-row order-md-last">

    {{-- Theme toggle (light/dark) --}}
    <div class="d-none d-md-flex">
        <button
            type="button"
            class="nav-link px-0"
            onclick="window.AdminTablerToggleDarkMode()"
            aria-label="{{ __('Basculer mode sombre/clair') }}"
            title="{{ __('Mode sombre') }}"
        >
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
            </svg>
        </button>

        {{-- Notifications --}}
        <div class="nav-item dropdown d-none d-md-flex">
            <a
                href="#"
                class="nav-link px-0"
                data-bs-toggle="dropdown"
                tabindex="-1"
                aria-label="{{ __('Notifications') }}"
                data-bs-auto-close="outside"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                    <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                    <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                </svg>
                <span class="badge bg-red"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ __('Notifications') }}</h3>
                        <p class="text-secondary small mb-0">{{ __('Aucune nouvelle notification.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Profil utilisateur --}}
    <div class="nav-item dropdown">
        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="{{ __('Menu utilisateur') }}">
            <span
                class="avatar avatar-sm bg-primary text-white"
                style="display:inline-flex;align-items:center;justify-content:center;font-weight:600;"
            >
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
