<!doctype html>
<html class="no-js" lang="fr-CA">

    @include('frontend::elements.head')

<body>

    {{-- Skip link WCAG 2.4.1 --}}
    <a href="#main-content" class="skip-link visually-hidden-focusable">Aller au contenu principal</a>

    @include('frontend::elements.preloader')

    @include('frontend::elements.popupBox')

    @if(isset($lightbox) && $lightbox === true)
        @include('frontend::elements.lightbox')
    @endif

    @include('frontend::elements.sidemenu')

    @include('frontend::elements.mobileMenu')

    @if(!isset($header) || $header === true)
        @include('frontend::elements.header')
    @elseif($header === 'header2')
        @include('frontend::elements.header2')
    @endif

    @if(!isset($breadcrumb))
        @include('frontend::elements.breadcrumb')
    @endif

    <main id="main-content" role="main" tabindex="-1">
        @yield('content')
    </main>

    @if(!isset($footer))
        @include('frontend::elements.footer')
    @endif

    <!-- Scroll To Top -->
    @include('frontend::elements.scrollTop')

    <!-- Jquery -->
    @include('frontend::elements.script')

</body>

</html>