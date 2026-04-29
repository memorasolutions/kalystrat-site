<!doctype html>
<html class="no-js" lang="zxx">

    @include('frontend::elements.head')

<body>

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

        @yield('content')

    @if(!isset($footer))
        @include('frontend::elements.footer')
    @endif

    <!-- Scroll To Top -->
    @include('frontend::elements.scrollTop')

    <!-- Jquery -->
    @include('frontend::elements.script')

</body>

</html>