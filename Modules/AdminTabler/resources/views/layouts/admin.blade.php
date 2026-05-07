{{-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca --}}
{{-- AdminTabler — layout "navbar-overlap" basé sur Tabler 1.4 officiel --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? __('Administration') }} - {{ $adminBranding['site_name'] ?? config('app.name') }}</title>

    {{-- Détection thème dark/light AVANT render (anti-flash) --}}
    <script>
        (function () {
            const stored = localStorage.getItem('admintabler-theme');
            const prefers = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            document.documentElement.setAttribute('data-bs-theme', stored || prefers);
        })();
    </script>

    {{-- Branding dynamique CSS vars (DB settings → CSS) --}}
    <style>
        :root {
            --admintabler-primary: {{ $adminBranding['primary'] ?? '#066fd1' }};
            --admintabler-secondary: {{ $adminBranding['secondary'] ?? '#5eba00' }};
            --admintabler-font: {{ $adminBranding['font_family'] ?? 'Inter, system-ui, sans-serif' }};
            --tblr-primary: {{ $adminBranding['primary'] ?? '#066fd1' }};
            --tblr-primary-rgb: {{ implode(', ', sscanf($adminBranding['primary'] ?? '#066fd1', '#%02x%02x%02x')) }};
        }
    </style>

    {{-- Assets Tabler (CSS+JS) compilés via Vite --}}
    @vite([
        'Modules/AdminTabler/resources/assets/sass/app.scss',
        'Modules/AdminTabler/resources/assets/js/app.js',
    ])

    {{-- Lucide reste actif pour vues NavigationService legacy --}}
    @if($adminThemeConfig['icons']['lucide_enabled'] ?? true)
        <script src="{{ asset('build/nobleui/plugins/lucide/lucide.min.js') }}" defer></script>
    @endif

    @livewireStyles
    @stack('styles')
</head>
<body>

{{-- ========================================================== --}}
{{-- Layout overlap-navbar : sidebar vertical + navbar top + page-header bg-primary qui chevauche --}}
{{-- ========================================================== --}}
<div class="page">

    {{-- Sidebar verticale --}}
    <x-admintabler::sidebar :branding="$adminBranding" />

    {{-- Page wrapper --}}
    <div class="page-wrapper">

        {{-- Navbar top (recherche, theme, notifications, profil) --}}
        <x-admintabler::navbar :user="auth()->user()" />

        {{-- Page header (overlap zone primary) --}}
        @adminFeature('page_header')
            <x-admintabler::page-header
                :title="$title ?? __('Administration')"
                :subtitle="$subtitle ?? null"
                :breadcrumbs="$breadcrumbs ?? []"
            />
        @endadminFeature

        {{-- Page body avec effet "overlap" : margin-top négatif pour que les cards remontent sur le bg-primary du page-header --}}
        <div class="page-body" style="margin-top: -2.5rem; position: relative; z-index: 2;">
            <div class="container-xl">

                {{-- Flash messages --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <div class="d-flex">
                            <div><i class="ti ti-circle-check icon alert-icon"></i></div>
                            <div>{{ session('success') }}</div>
                        </div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('Fermer') }}"></a>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <div class="d-flex">
                            <div><i class="ti ti-alert-circle icon alert-icon"></i></div>
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

{{-- Command palette (Ctrl+K) --}}
@adminFeature('command_palette')
    <x-admintabler::command-palette />
@endadminFeature

{{-- Toasts notifications (compatibilité legacy) --}}
@includeIf('backoffice::partials.toast-notifications')

@livewireScripts
@stack('scripts')

{{-- Init Lucide icons après chargement --}}
@if($adminThemeConfig['icons']['lucide_enabled'] ?? true)
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.lucide) window.lucide.createIcons();
        });
        document.addEventListener('livewire:navigated', () => {
            if (window.lucide) window.lucide.createIcons();
        });
    </script>
@endif

</body>
</html>
