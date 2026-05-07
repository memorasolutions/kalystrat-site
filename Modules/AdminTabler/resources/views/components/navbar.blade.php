{{-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca --}}
{{-- Navbar top Tabler — recherche, theme toggle, notifications, profil --}}
@props(['user'])

<header class="navbar navbar-expand-md d-print-none">
    <div class="container-xl">

        <div class="navbar-nav flex-row order-md-last">

            {{-- Command Palette trigger --}}
            @adminFeature('command_palette')
                <div class="nav-item d-none d-md-flex me-3">
                    <button
                        type="button"
                        class="btn btn-light btn-sm"
                        onclick="document.querySelector('.admintabler-command-palette').dataset.open = 'true'; document.querySelector('.admintabler-command-palette__input')?.focus();"
                        aria-label="{{ __('Ouvrir la palette de commandes') }}"
                        title="Ctrl+K"
                    >
                        <i class="ti ti-search me-1"></i>
                        <span>{{ __('Rechercher') }}</span>
                        <kbd class="ms-2">⌘K</kbd>
                    </button>
                </div>
            @endadminFeature

            {{-- Dark mode toggle --}}
            @adminFeature('dark_mode')
                <div class="nav-item">
                    <button
                        type="button"
                        class="nav-link px-0"
                        onclick="window.AdminTablerToggleDarkMode()"
                        aria-label="{{ __('Basculer mode sombre/clair') }}"
                        title="{{ __('Mode sombre') }}"
                    >
                        <i class="ti ti-moon-stars" data-bs-theme-target="dark"></i>
                        <i class="ti ti-sun" data-bs-theme-target="light" style="display:none;"></i>
                    </button>
                </div>
            @endadminFeature

            {{-- Notifications --}}
            <div class="nav-item dropdown d-none d-md-flex me-3">
                <a
                    href="#"
                    class="nav-link px-0"
                    data-bs-toggle="dropdown"
                    tabindex="-1"
                    aria-label="{{ __('Notifications') }}"
                >
                    <i class="ti ti-bell"></i>
                    <span class="badge bg-red"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-card">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ __('Notifications') }}</h3>
                            <p class="text-muted small mb-0">{{ __('Aucune nouvelle notification.') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Profil --}}
            <div class="nav-item dropdown">
                <a
                    href="#"
                    class="nav-link d-flex lh-1 text-reset p-0"
                    data-bs-toggle="dropdown"
                    aria-label="{{ __('Menu utilisateur') }}"
                >
                    <span
                        class="avatar avatar-sm bg-primary text-white"
                        style="display:inline-flex;align-items:center;justify-content:center;font-weight:600;"
                    >
                        {{ mb_strtoupper(mb_substr($user->name, 0, 2)) }}
                    </span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ $user->name }}</div>
                        <div class="mt-1 small text-muted">{{ $user->roles->first()?->name ?? __('Utilisateur') }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="{{ route('admin.profile') }}" class="dropdown-item">
                        <i class="ti ti-user me-2"></i>{{ __('Profil') }}
                    </a>
                    <a href="{{ route('admin.dashboard') }}" class="dropdown-item">
                        <i class="ti ti-dashboard me-2"></i>{{ __('Tableau de bord') }}
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="ti ti-logout me-2"></i>{{ __('Déconnexion') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#sidebar-menu"
            aria-controls="sidebar-menu"
            aria-expanded="false"
            aria-label="{{ __('Basculer le menu mobile') }}"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</header>
