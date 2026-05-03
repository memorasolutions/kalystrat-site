{{-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="privacy-jurisdiction" content="{{ session('privacy_jurisdiction', 'pipeda') }}">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('auth/css/tailwind.css') }}">
    <style>
        /* WCAG 2.2 AAA overrides Privacy module */
        /* Skip link – pattern visuellement caché mais cliquable >24px (clip path au lieu de width:1px) */
        .ks-skip-link { position: absolute; left: 0; top: 0; min-width: 44px; min-height: 44px; padding: 0.75rem 1.5rem; background: #0A1628; color: #FFFFFF; display: inline-flex; align-items: center; z-index: 10000; clip-path: inset(50%); clip: rect(0 0 0 0); white-space: nowrap; }
        .ks-skip-link:focus { clip-path: none; clip: auto; outline: 3px solid #B8A472; outline-offset: 2px; }
        a[href$="login"] { color: #075985 !important; min-height: 44px; padding: 0.65rem 0.5rem; display: inline-flex; align-items: center; }
        nav.flex a { min-height: 44px; padding: 0.65rem 0.5rem; display: inline-flex; align-items: center; }
        /* AAA 2.5.5 – logo header 44x44 minimum */
        header a.text-xl { min-height: 44px; min-width: 44px; padding: 0.5rem 0.75rem; display: inline-flex; align-items: center; }
        /* AAA 2.5.5 – inputs/select/file 44x44 minimum */
        main input[type="text"], main input[type="email"], main input[type="file"], main select, main textarea {
            min-height: 44px !important; padding: 0.65rem 0.75rem !important; box-sizing: border-box;
        }
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { animation-duration: 0.01ms !important; transition-duration: 0.01ms !important; }
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">
    <a href="#main-content" class="ks-skip-link">Aller au contenu principal</a>
    <header class="bg-white border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="{{ url('/') }}" class="text-xl font-bold text-gray-900">
                <span class="first-letter:text-sky-500">{{ config('app.name') }}</span>
            </a>
            <nav class="flex items-center gap-4 text-sm">
                <a href="{{ url('/privacy-policy') }}" class="text-gray-600 hover:text-gray-900">{{ __('Confidentialite') }}</a>
                <a href="{{ url('/terms-of-use') }}" class="text-gray-600 hover:text-gray-900">{{ __('Conditions') }}</a>
                <a href="{{ route('login') }}" class="text-sky-600 hover:text-sky-800 font-medium">{{ __('Connexion') }}</a>
            </nav>
        </div>
    </header>

    <main id="main-content" class="max-w-4xl mx-auto px-4 py-8 sm:py-12">
        @hasSection('legal-content')
            @yield('legal-content')
        @else
            @yield('content')
        @endif
    </main>

    <footer class="border-t border-gray-200 mt-12">
        <div class="max-w-4xl mx-auto px-4 py-6 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} {{ config('privacy.company.name', config('app.name')) }}.
            {{ __('Tous droits reserves.') }}
        </div>
        <p class="max-w-3xl mx-auto px-4 pb-6 text-center text-xs text-gray-600 leading-relaxed">
            <span aria-hidden="true" style="display:inline-block; vertical-align: middle; margin-right: 0.5rem; padding: 0.2rem 0.55rem; border: 1px solid #B8A472; border-radius: 999px; font-size: 0.7rem; color: #8C6D2A; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase;">EU AI Act 2026</span>
            Site conforme au règlement européen sur l'IA et à la <a href="https://www.cai.gouv.qc.ca/" target="_blank" rel="noopener noreferrer" class="underline">Loi 25 du Québec</a> sur la protection des renseignements personnels. Certains contenus peuvent être partiellement assistés par intelligence artificielle. Pour toute information critique, vérifiez auprès de notre équipe au <a href="tel:+14184760987" class="font-medium text-sky-700 underline">418-476-0987</a> ou <a href="mailto:info@kalystrat.ca" class="font-medium text-sky-700 underline">info@kalystrat.ca</a>.
        </p>
    </footer>

    @include('privacy::partials.cookie-consent')
</body>
</html>
