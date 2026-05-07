{{-- Layout admin Tabler navbar-overlap — réplique structure officielle preview.tabler.io --}}
{{-- = Pur assemblage de composants Blade DRY (head + navbar + page-header + body + footer) --}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? __('Administration') }} &middot; {{ $adminBranding['site_name'] ?? config('app.name') }}</title>
    <meta name="msapplication-TileColor" content="{{ $adminBranding['primary'] ?? '#066fd1' }}"/>
    <meta name="theme-color" content="{{ $adminBranding['primary'] ?? '#066fd1' }}"/>

    {{-- Branding dynamique CSS vars --}}
    <style>
        :root {
            --admintabler-primary: {{ $adminBranding['primary'] ?? '#066fd1' }};
            --tblr-primary: {{ $adminBranding['primary'] ?? '#066fd1' }};
            --tblr-primary-rgb: {{ implode(', ', sscanf($adminBranding['primary'] ?? '#066fd1', '#%02x%02x%02x')) }};
        }
    </style>

    {{-- CSS Tabler complet (tabler + flags + socials + payments + vendors + marketing + themes + icons + Inter font) --}}
    @vite(['Modules/AdminTabler/resources/assets/sass/app.scss'])

    @livewireStyles
    @stack('styles')
</head>
<body>
{{-- Tabler theme global — DOIT être en haut du <body> (anti-flash dark mode) --}}
<script src="{{ asset('build/admintabler/tabler-theme.min.js') }}"></script>

<div class="page">

    {{-- NAVBAR (organisme — assemble brand + actions + menu, consomme NavigationService) --}}
    <x-admintabler::navbar :branding="$adminBranding" />

    <div class="page-wrapper">

        {{-- PAGE HEADER (text-white sur extension navbar-overlap) --}}
        <x-admintabler::page-header
            :title="$title ?? __('Administration')"
            :subtitle="$subtitle ?? null"
            :breadcrumbs="$breadcrumbs ?? []"
        >
            @yield('page-actions')
        </x-admintabler::page-header>

        {{-- PAGE BODY --}}
        <div class="page-body">
            <div class="container-xl">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible mb-3" role="alert">
                        <div>{{ session('success') }}</div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('Fermer') }}"></a>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible mb-3" role="alert">
                        <div>{{ session('error') }}</div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('Fermer') }}"></a>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>

        {{-- FOOTER --}}
        <x-admintabler::footer />
    </div>
</div>

{{-- Toasts notifications (compatibilité legacy Backoffice) --}}
@includeIf('backoffice::partials.toast-notifications')

{{-- Tabler core JS + Lucide ESM dynamique --}}
@vite(['Modules/AdminTabler/resources/assets/js/app.js'])

@livewireScripts
@stack('scripts')
</body>
</html>
