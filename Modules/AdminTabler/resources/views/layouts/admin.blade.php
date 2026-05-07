{{-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca --}}
{{-- Layout 100% fidèle à preview.tabler.io/layout-navbar-overlap.html --}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? __('Administration') }} &middot; {{ $adminBranding['site_name'] ?? config('app.name') }}</title>

    {{-- Détection thème dark/light AVANT render (anti-flash) --}}
    <script>
        (function () {
            const stored = localStorage.getItem('admintabler-theme');
            const prefers = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            document.documentElement.setAttribute('data-bs-theme', stored || prefers);
        })();
    </script>

    {{-- Branding dynamique CSS vars --}}
    <style>
        :root {
            --admintabler-primary: {{ $adminBranding['primary'] ?? '#066fd1' }};
            --admintabler-secondary: {{ $adminBranding['secondary'] ?? '#5eba00' }};
            --admintabler-font: {{ $adminBranding['font_family'] ?? 'Inter, system-ui, sans-serif' }};
            --tblr-primary: {{ $adminBranding['primary'] ?? '#066fd1' }};
            --tblr-primary-rgb: {{ implode(', ', sscanf($adminBranding['primary'] ?? '#066fd1', '#%02x%02x%02x')) }};
        }
    </style>

    {{-- Assets Tabler (Vite) --}}
    @vite([
        'Modules/AdminTabler/resources/assets/sass/app.scss',
        'Modules/AdminTabler/resources/assets/js/app.js',
    ])

    @livewireStyles
    @stack('styles')
</head>
<body>

{{-- Page wrapper Tabler officiel --}}
<div class="page">

    {{-- ========================================== --}}
    {{-- NAVBAR TOP HORIZONTALE (data-bs-theme="dark" + class navbar-overlap) --}}
    {{-- ========================================== --}}
    <header class="navbar navbar-expand-md navbar-overlap d-print-none" data-bs-theme="dark">
        <div class="container-xl">
            {{-- Toggler mobile --}}
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbar-menu"
                aria-controls="navbar-menu"
                aria-expanded="false"
                aria-label="{{ __('Basculer la navigation') }}"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- Logo brand --}}
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                <a href="{{ route('admin.dashboard') }}" aria-label="{{ $adminBranding['site_name'] ?? 'Admin' }}">
                    @if(!empty($adminBranding['logo_light']))
                        <img
                            src="{{ asset('storage/' . $adminBranding['logo_light']) }}"
                            alt="{{ $adminBranding['site_name'] ?? 'Admin' }}"
                            width="110"
                            height="32"
                            class="navbar-brand-image"
                        >
                    @else
                        <span class="text-white fw-bold fs-3">{{ $adminBranding['site_name'] ?? config('app.name') }}</span>
                    @endif
                </a>
            </h1>

            {{-- Actions à droite (theme toggle, notifications, profil) --}}
            <x-admintabler::navbar-actions :user="auth()->user()" />

            {{-- Nav menu horizontal (collapse mobile) --}}
            <x-admintabler::navbar-menu />
        </div>
    </header>

    {{-- ========================================== --}}
    {{-- PAGE WRAPPER --}}
    {{-- ========================================== --}}
    <div class="page-wrapper">

        {{-- Page header dark (text-white sur navbar-overlap) --}}
        <div class="page-header d-print-none text-white" aria-label="{{ __('En-tête de page') }}">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        @if(!empty($subtitle))
                            <div class="page-pretitle">{{ $subtitle }}</div>
                        @endif
                        <h2 class="page-title">{{ $title ?? __('Administration') }}</h2>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        @yield('page-actions')
                    </div>
                </div>

                {{-- Breadcrumbs (optionnel) --}}
                @if(!empty($breadcrumbs))
                    <ol class="breadcrumb breadcrumb-arrows mt-3 text-white-50" aria-label="breadcrumbs">
                        @foreach($breadcrumbs as $crumb)
                            @if($loop->last)
                                <li class="breadcrumb-item active text-white" aria-current="page">{{ $crumb['label'] }}</li>
                            @elseif(!empty($crumb['url']))
                                <li class="breadcrumb-item"><a href="{{ $crumb['url'] }}" class="text-white">{{ $crumb['label'] }}</a></li>
                            @else
                                <li class="breadcrumb-item">{{ $crumb['label'] }}</li>
                            @endif
                        @endforeach
                    </ol>
                @endif
            </div>
        </div>

        {{-- Page body --}}
        <div class="page-body">
            <div class="container-xl">

                {{-- Flash success --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible mb-3" role="alert">
                        <div class="d-flex">
                            <div>{{ session('success') }}</div>
                        </div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('Fermer') }}"></a>
                    </div>
                @endif

                {{-- Flash error --}}
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible mb-3" role="alert">
                        <div class="d-flex">
                            <div>{{ session('error') }}</div>
                        </div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('Fermer') }}"></a>
                    </div>
                @endif

                {{-- Contenu de la page --}}
                @yield('content')

            </div>
        </div>

        {{-- Footer --}}
        <x-admintabler::footer />
    </div>
</div>

{{-- Toasts notifications (compatibilité legacy) --}}
@includeIf('backoffice::partials.toast-notifications')

@livewireScripts
@stack('scripts')

</body>
</html>
