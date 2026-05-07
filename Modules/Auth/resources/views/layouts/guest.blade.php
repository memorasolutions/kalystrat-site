<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    @if(config('pwa.enabled'))
    <link rel="manifest" href="{{ route('pwa.manifest') }}">
    <meta name="theme-color" content="{{ config('pwa.theme_color') }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="{{ config('pwa.short_name') }}">
    <link rel="apple-touch-icon" href="/icons/apple-touch-icon-180x180.png">
    @endif
    @vite('resources/css/auth.css')
    <link rel="stylesheet" href="{{ asset('auth/css/tabler-icons/tabler-icons.min.css') }}">
    <style>
        /* WCAG skip link: hidden until focused */
        .skip-link { position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0 }
        .skip-link:focus { position:fixed;top:0.5rem;left:0.5rem;width:auto;height:auto;min-width:44px;min-height:44px;padding:0.75rem 1.25rem;margin:0;overflow:visible;clip:auto;white-space:normal;z-index:9999;background:#075985;color:#fff;border-radius:0.375rem;font-size:0.875rem;font-weight:500;text-decoration:none;outline:2px solid #0284c7;outline-offset:2px }
        /* a11y: prefers-reduced-motion (WCAG 2.3.3) */
        @media (prefers-reduced-motion: reduce) {
            *,*::before,*::after { animation-duration:0.01ms !important; animation-iteration-count:1 !important; transition-duration:0.01ms !important; scroll-behavior:auto !important }
        }
        /* Hide browser credential manager icons inside password inputs */
        input[type="password"]::-webkit-credentials-auto-fill-button,
        input[type="password"]::-webkit-textfield-decoration-container { display: none !important; }
        input[type="password"]::-ms-reveal { display: none !important; }
    </style>
    @livewireStyles
</head>
<body>
    {{-- WCAG 2.4.1: Skip navigation link --}}
    <a href="#main-content" class="skip-link">
        {{ __('Aller au contenu principal') }}
    </a>

    <div class="grid grid-cols-1 lg:grid-cols-2 min-h-screen bg-white">
        {{-- Left: Form column --}}
        <main id="main-content" class="flex items-center justify-center px-4 py-7 bg-white sm:px-6 lg:px-8 sm:py-16 lg:py-24" role="main">
            <div class="xl:w-full xl:max-w-sm 2xl:max-w-md xl:mx-auto">
                <header>
                    <a href="{{ url('/') }}" class="inline-block mb-6">
                        <span class="text-2xl font-bold text-gray-900">
                            <span class="first-letter:text-sky-500">{{ config('app.name') }}</span>
                        </span>
                    </a>
                </header>
                {{ $slot ?? '' }}
                @yield('content')
            </div>
        </main>

        {{-- Right: Hero image column --}}
        <aside class="relative flex items-end px-4 pb-10 pt-60 sm:pb-16 md:justify-center lg:pb-24 bg-cover bg-center lg:h-screen sm:px-6 lg:px-8" aria-label="{{ __('Présentation') }}"
               style="background-color:#0c1427;background-image: url('{{ asset('auth/images/bg.png') }}')">
            <div class="absolute inset-0" style="background:linear-gradient(to top,rgba(0,0,0,0.85),rgba(0,0,0,0.3))"></div>
            <div class="relative">
                <div class="w-full max-w-xl xl:w-full xl:mx-auto xl:pe-24 xl:max-w-xl">
                    <h2 class="text-4xl font-bold text-white">
                        {{ __('Bienvenue sur') }} {{ config('app.name') }}
                    </h2>
                    <ul class="grid grid-cols-1 mt-10 sm:grid-cols-2 gap-x-8 gap-y-4 text-white">
                        <li class="flex items-center space-x-3">
                            <i class="ti ti-circle-check-filled text-2xl text-sky-500" aria-hidden="true"></i>
                            <span class="text-lg font-medium text-white">{{ __('Authentification sécurisée') }}</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="ti ti-circle-check-filled text-2xl text-sky-500" aria-hidden="true"></i>
                            <span class="text-lg font-medium text-white">{{ __('Gestion simplifiée') }}</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="ti ti-circle-check-filled text-2xl text-sky-500" aria-hidden="true"></i>
                            <span class="text-lg font-medium text-white">{{ __('Mises à jour en temps réel') }}</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="ti ti-circle-check-filled text-2xl text-sky-500" aria-hidden="true"></i>
                            <span class="text-lg font-medium text-white">{{ __('Support 24/7') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
    </div>

    {{-- a11y: <footer> landmark WCAG 1.3.1 (page guest minimale) --}}
    <footer role="contentinfo" aria-label="{{ __('Pied de page') }}" class="text-center text-xs text-gray-600 py-4 border-t border-gray-200 bg-white">
        <nav aria-label="{{ __('Liens légaux') }}">
            <ul class="list-none flex flex-wrap justify-center gap-4 m-0 p-0">
                <li><a href="{{ url('/politique-confidentialite') }}" class="text-gray-700 hover:text-sky-800 underline">{{ __('Confidentialité') }}</a></li>
                <li><a href="{{ url('/conditions-utilisation') }}" class="text-gray-700 hover:text-sky-800 underline">{{ __('Conditions') }}</a></li>
                <li>&copy; {{ date('Y') }} {{ config('app.name') }}</li>
            </ul>
        </nav>
    </footer>

    @livewireScripts
    @stack('scripts')
    <script src="{{ asset('auth/plugins/preline/preline.js') }}"></script>
</body>
</html>
