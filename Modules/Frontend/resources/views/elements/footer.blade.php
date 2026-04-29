    <footer class="footer-wrapper footer-layout1" data-bg-src="{{ asset('themes/construz/assets/img/bg/footer-bg1-1.png') }}">    
        <div class="container">
            <div class="footer-top-1">
                <div class="footer-logo">
                    <a href="{{ route('index') }}"><img src="{{ asset('themes/construz/assets/img/logo-white.svg') }}" alt="Construz"></a>
                </div>
                <div class="subscribe-box">
                    <p class="subscribe-box_text">Subscribe for the latest news. Stay updated on the latest trends.</p>
                    <form class="newsletter-form">
                        <input class="form-control" type="email" placeholder="Enter your email..." required="">
                        <button type="submit" class="btn style2">SUBCRIBE<i class="ri-arrow-right-up-line"></i></button>
                    </form>
                </div>
            </div>
            <div class="widget-area">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-3">
                        <div class="widget widget-about footer-widget">
                            <h3 class="widget_title">About Company</h3>
                            <p class="about-text">A small business can be better than a big business because of agility and adaptability due to their size and scale.</p>
                            <h4 class="about-year">Since 2000</h4>
                            <h5 class="about-subtitle">WE ARE AVAILABLE</h5>
                            <p class="about-text"><span class="text-theme">Mon-Sat:</span> 10:00am to 07:30pm</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Useful Links</h3>
                            <div class="menu-all-pages-container grid-style">
                                <ul class="menu">
                                    <li><a href="{{ route('about') }}">About Us</a></li>
                                    <li><a href="{{ route('service') }}">What We Do</a></li>
                                    <li><a href="{{ route('service') }}">News & Article</a></li>
                                    <li><a href="{{ route('service') }}">Success Story</a></li>
                                    <li><a href="{{ route('service') }}">FAQ’s</a></li>
                                </ul>
                                <ul class="menu">
                                    <li><a href="{{ route('team') }}">Our Team</a></li>
                                    <li><a href="{{ route('service') }}">Careers</a></li>
                                    <li><a href="{{ route('service') }}">Testimonials</a></li>
                                    <li><a href="{{ route('contact') }}">Privacy Policy</a></li>
                                    <li><a href="{{ route('contact') }}">Terms of use</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget widget-contact">
                            <h3 class="widget_title">Office Address</h3>
                            <p class="contact-text">Losangle, Street Road 24, New York, USA - 67452</p>
                            <h3 class="widget_title">Email Address</h3> 
                            <p class="text-white footer-text">Get in Touch !</p>   
                            <p class="footer-text"><a href="mailto:info@construz.example">info@construz.example</a></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">Phone Number</h3>
                            <p class="footer-text">
                                <a href="tel:121551579266">+121 551 579 266</a>
                            </p>
                            <p class="footer-text">
                                <a href="tel:851555961658">+85 155 596 1658</a>
                            </p>
                            <h3 class="widget_title">Follow Us</h3>
                            <div class="social-btn style2">
                                <a href="https://www.twitter.com/"><i class="ri-twitter-x-line"></i></a>
                                <a href="https://instagram.com/"><i class="ri-instagram-line"></i></a>                           
                                <a href="https://facebook.com/"><i class="ri-facebook-fill"></i></a>
                                <a href="https://linkedin.com/"><i class="ri-linkedin-fill"></i></a>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright-wrap">
                <div class="row gy-3 justify-content-md-between justify-content-center">
                    <div class="col-auto align-self-center"><p class="copyright-text text-center">© 2025 <a href="#">Construz</a>  |  All rights reserved</p></div>
                    <div class="col-auto">
                        <div class="footer-links">
                            <a href="{{ route('contact') }}">Terms & Condition</a>
                            <a href="{{ route('contact') }}">Privacy Policy</a>
                            <a href="{{ route('contact') }}">Contact Us</a>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </footer>