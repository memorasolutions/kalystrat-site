@extends('frontend::layout.layout')

@php
    $title='Our Blogs';
    $subTitle='Our Blogs';
@endphp

@section('content')

    <!--==============================
    Blog Area  
    ==============================-->
    <section class="blog-area space-top space-extra-bottom">
        <div class="container">
            <div class="row gy-40 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="blog-card">
                        <div class="blog-img">
                            <img src="{{ asset('themes/construz/assets/img/blog/blog_1_1.png') }}" alt="blog image">
                            <div class="blog-date">
                                <a href="{{ route('blog') }}"><span>17</span>JUN</a>
                                <div class="year">2024</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="{{ route('blog') }}">By Rebecca</a>
                                <a href="{{ route('blog') }}">Construction</a>
                            </div>
                            <h3 class="blog-title"><a href="{{ route('blogDetails') }}">How to hire a contractor home renovation service</a></h3>
                            <p class="blog-text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam. Odio ut sem nulla phar.</p>
                            <a href="{{ route('blogDetails') }}" class="btn">More Details <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="blog-card">
                        <div class="blog-img">
                            <img src="{{ asset('themes/construz/assets/img/blog/blog_1_2.png') }}" alt="blog image">
                            <div class="blog-date">
                                <a href="{{ route('blog') }}"><span>06</span>JUN</a>
                                <div class="year">2024</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="{{ route('blog') }}">By Rebecca</a>
                                <a href="{{ route('blog') }}">Construction</a>
                            </div>
                            <h3 class="blog-title"><a href="{{ route('blogDetails') }}">Started to develop a specific testing programs</a></h3>
                            <p class="blog-text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam. Odio ut sem nulla phar.</p>
                            <a href="{{ route('blogDetails') }}" class="btn">More Details <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="blog-card">
                        <div class="blog-img">
                            <img src="{{ asset('themes/construz/assets/img/blog/blog_1_3.png') }}" alt="blog image">
                            <div class="blog-date">
                                <a href="{{ route('blog') }}"><span>12</span>JUN</a>
                                <div class="year">2024</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="{{ route('blog') }}">By Rebecca</a>
                                <a href="{{ route('blog') }}">Construction</a>
                            </div>
                            <h3 class="blog-title"><a href="{{ route('blogDetails') }}">How to stay motivated until a project is finished</a></h3>
                            <p class="blog-text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam. Odio ut sem nulla phar.</p>
                            <a href="{{ route('blogDetails') }}" class="btn">More Details <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="blog-card">
                        <div class="blog-img">
                            <img src="{{ asset('themes/construz/assets/img/blog/blog_1_4.png') }}" alt="blog image">
                            <div class="blog-date">
                                <a href="{{ route('blog') }}"><span>05</span>JUN</a>
                                <div class="year">2024</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="{{ route('blog') }}">By Rebecca</a>
                                <a href="{{ route('blog') }}">Construction</a>
                            </div>
                            <h3 class="blog-title"><a href="{{ route('blogDetails') }}">Home improvements that will save you money this winter</a></h3>
                            <p class="blog-text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam. Odio ut sem nulla phar.</p>
                            <a href="{{ route('blogDetails') }}" class="btn">More Details <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="blog-card">
                        <div class="blog-img">
                            <img src="{{ asset('themes/construz/assets/img/blog/blog_1_5.png') }}" alt="blog image">
                            <div class="blog-date">
                                <a href="{{ route('blog') }}"><span>15</span>JUN</a>
                                <div class="year">2024</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="{{ route('blog') }}">By Rebecca</a>
                                <a href="{{ route('blog') }}">Construction</a>
                            </div>
                            <h3 class="blog-title"><a href="{{ route('blogDetails') }}">Panelized construction streamline process</a></h3>
                            <p class="blog-text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam. Odio ut sem nulla phar.</p>
                            <a href="{{ route('blogDetails') }}" class="btn">More Details <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="blog-card">
                        <div class="blog-img">
                            <img src="{{ asset('themes/construz/assets/img/blog/blog_1_6.png') }}" alt="blog image">
                            <div class="blog-date">
                                <a href="{{ route('blog') }}"><span>24</span>JUN</a>
                                <div class="year">2024</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="{{ route('blog') }}">By Rebecca</a>
                                <a href="{{ route('blog') }}">Construction</a>
                            </div>
                            <h3 class="blog-title"><a href="{{ route('blogDetails') }}">Renovations that add the most resale value to your home</a></h3>
                            <p class="blog-text">Tortor posuere ac ut consequat. Tellusi elem isis etum sag ittis vitae et leo duis ut diam. Odio ut sem nulla phar.</p>
                            <a href="{{ route('blogDetails') }}" class="btn">More Details <i class="ri-arrow-right-up-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pagination justify-content-center">
                <ul>
                    <li><a class="active" href="{{ route('blog') }}">01</a></li>
                    <li><a href="{{ route('blog') }}">02</a></li>
                    <li><a href="{{ route('blog') }}">03</a></li>
                    <li><a href="{{ route('blog') }}"><i class="ri-arrow-right-line"></i></a></li>
                </ul>
            </div>
        </div>
    </section>   

@endsection