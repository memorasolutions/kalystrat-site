<div class="mobile-menu-wrapper">
    <div class="mobile-menu-area">
        <div class="mobile-logo">
            <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/logo.svg') }}" alt="Construz"></a>
            <button class="menu-toggle"><i class="ri-close-line"></i></button>
        </div>
        <div class="mobile-menu">
            <ul>
                <li class="menu-item-has-children">
                    <a href="#">Home</a>
                    <ul class="sub-menu">
                        <li class="menu-item-has-children">
                            <a href="#">Multipage</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ route('index') }}">Home 01</a>
                                </li>
                                <li>
                                    <a href="{{ route('home2') }}">Home 02</a>
                                </li>
                                <li>
                                    <a href="{{ route('home3') }}">Home 03</a>
                                </li>
                                <li>
                                    <a href="{{ route('home4') }}">Home 04</a>
                                </li>
                                <li>
                                    <a href="{{ route('home5') }}">Home 05</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Onepage</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ route('home1Op') }}">Home 01 Onepage</a>
                                </li>
                                <li>
                                    <a href="{{ route('home2Op') }}">Home 02 Onepage</a>
                                </li>
                                <li>
                                    <a href="{{ route('home3Op') }}">Home 03 Onepage</a>
                                </li>
                                <li>
                                    <a href="{{ route('home4Op') }}">Home 04 Onepage</a>
                                </li>
                                <li>
                                    <a href="{{ route('home5Op') }}">Home 05 Onepage</a>
                                </li>
                            </ul>
                        </li>                            
                    </ul>
                </li>
                <li>
                    <a href="{{ route('about') }}">About</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Pages</a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('team') }}">Team Page</a></li>
                        <li><a href="{{ route('teamDetails') }}">Team Details</a></li>
                        <li><a href="{{ route('shop') }}">Shop Page</a></li>
                        <li><a href="{{ route('shopDetails') }}">Shop Details</a></li>
                        <li><a href="{{ route('cart') }}">Cart</a></li>
                        <li><a href="{{ route('checkout') }}">Checkout</a></li>
                        <li><a href="{{ route('wishlist') }}">Wishlist</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Project</a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('project') }}">Projects</a></li>
                        <li><a href="{{ route('projectDetails') }}">Project Details</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Service</a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('service') }}">Service</a></li>
                        <li><a href="{{ route('serviceDetails') }}">Service Details</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Shop</a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('shop') }}">Shop</a></li>
                        <li><a href="{{ route('shopDetails') }}">Shop Details</a></li>
                        <li><a href="{{ route('cart') }}">Cart</a></li>
                        <li><a href="{{ route('checkout') }}">Checkout</a></li>
                        <li><a href="{{ route('wishlist') }}">Wishlist</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Blog</a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('blog') }}">Blog</a></li>
                        <li><a href="{{ route('blogDetails') }}">Blog Details</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</div>