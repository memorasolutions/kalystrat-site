@extends('frontend::layout.layout')

@php
    $title='Construction process 
            streamlines';
    $subTitle='Construction process streamlines';
@endphp

@section('content')

    <!--==============================
    Blog Area  
    ==============================-->
    <section class="blog-area space-top space-extra-bottom">
        <div class="container">
            <div class="row gx-60">
                <div class="col-xxl-8 col-lg-7">
                    <div class="blog-single">
                        <div class="blog-img">
                            <img src="{{ asset('themes/construz/assets/img/blog/blog_details1_1.png') }}" alt="img">
                            <div class="blog-date">
                                <a href="{{ route('blog') }}"><span>22</span>MAR</a>
                                <div class="year">2024</div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="{{ route('blogDetails') }}">By Rebecca</a>
                                <a href="{{ route('blog') }}">506 Views</a>  
                                <a href="{{ route('blog') }}">Construction</a>  
                                <a href="{{ route('blog') }}">02 Comment</a>  
                            </div>
                            <h3 class="blog-title">Construction Process Streamlines</h3>
                            <p class="mb-20">Construction standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            </p>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga harum quidem rerum facilis est et expedita distinctio.</p>
                            <blockquote>
                                <p>“Tortor posuere ac ut consequat tellusi elem isis etum sag ittis vitae atleo duis ut diam odio ut sem nulla phar.”</p>
                                <cite>Aleesha brown</cite>
                                <span class="desig">Company, CEO</span>
                            </blockquote>
                            <h3 class="blog-inner-title">Growth and meaning of mechanical technology</h3>
                            <p class="mb-30">Construction standard dummy text ever since the when an unknown printer took a galley vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident expedita distinctio.</p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="blog-img">
                                        <img src="{{ asset('themes/construz/assets/img/blog/blog_details1_2.png') }}" alt="img">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="blog-img">
                                        <img src="{{ asset('themes/construz/assets/img/blog/blog_details1_3.png') }}" alt="img">
                                    </div>
                                </div>
                            </div>
                            <h3 class="blog-inner-title">Engineering and mechanics money for a better future.</h3>
                            <p class="mb-30">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecation.</p>
                            <div class="checklist style2 mb-35">
                                <ul>
                                    <li>Powerful Product Strategy
                                    </li>
                                    <li>Quality Control System
                                    </li>
                                    <li>Professional Team Works
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="blog-img" data-overlay="black" data-opacity="5">
                                <img src="{{ asset('themes/construz/assets/img/blog/blog_details1_4.png') }}" alt="Blog Image">
                                <a href="https://www.youtube.com/watch?v=Mp8IXI1kzvQ" class="play-btn style3 popup-video"><i class="ri-play-fill"></i></a>
                            </div>
                            <p class="mt-35">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
                        </div>
                        <div class="share-links clearfix ">
                            <div class="row justify-content-between">
                                <div class="col-md-auto">
                                    <div class="tagcloud">
                                        <a href="{{ route('blog') }}">Factory</a>
                                        <a href="{{ route('blog') }}">Metallurgy</a>
                                        <a href="{{ route('blog') }}">Construction</a>
                                        <a href="{{ route('blog') }}">Industry</a>
                                    </div>
                                </div>
                                <div class="col-md-auto text-xl-end">
                                    <div class="social-btn style3">
                                        <a href="https://www.twitter.com/"><i class="ri-twitter-x-line"></i></a>
                                        <a href="https://instagram.com/"><i class="ri-instagram-line"></i></a>                           
                                        <a href="https://facebook.com/"><i class="ri-facebook-fill"></i></a>
                                        <a href="https://linkedin.com/"><i class="ri-linkedin-fill"></i></a>
                                    </div>
                                </div><!-- Share Links Area end -->
                            </div>
                        </div>
                        
                        <div class="blog-author bg-smoke">
                            <div class="auhtor-img">
                                <img src="{{ asset('themes/construz/assets/img/blog/blog-author.png') }}" alt="Blog Author Image">
                            </div>
                            <div class="media-body">
                                <h3 class="author-name"><a href="{{ route('teamDetails') }}">John Maxwell</a></h3>
                                <span class="author-desig">CEO of Construz</span>
                                <p class="author-text">Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores at vero eos accusamus iusto odio dignissimos ducimus blanditiis praesentium.</p>
                                <div class="social-btn style4">
                                    <a href="https://www.twitter.com/"><i class="ri-twitter-x-line"></i></a>
                                    <a href="https://instagram.com/"><i class="ri-instagram-line"></i></a>                           
                                    <a href="https://facebook.com/"><i class="ri-facebook-fill"></i></a>
                                    <a href="https://linkedin.com/"><i class="ri-linkedin-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comments-wrap">
                        <h3 class="blog-inner-title mt-n2">03 Comments</h3>
                        <ul class="comment-list">
                            <li class="comment-item">
                                <div class="post-comment">
                                    <div class="comment-avater">
                                        <img src="{{ asset('themes/construz/assets/img/blog/blog_comment1.png') }}" alt="Comment Author">
                                    </div>
                                    <div class="comment-content">
                                        <h3 class="name">Abraham John</h3>
                                        <span class="commented-on">Feb 03, 2024</span>
                                        <p class="text">Construction praesentium voluptatum deleniti atque corrupti quos dolores at vero eos accusamus iusto odio dignissimos.</p>
                                        <div class="reply_and_edit">
                                            <a href="{{ route('blogDetails') }}" class="reply-btn">Reply <i class="ri-arrow-right-up-line"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <ul class="children">
                                    <li class="comment-item">
                                        <div class="post-comment">
                                            <div class="comment-avater">
                                                <img src="{{ asset('themes/construz/assets/img/blog/blog_comment2.png') }}" alt="Comment Author">
                                            </div>
                                            <div class="comment-content">
                                                <h3 class="name">John Smith</h3>
                                                <span class="commented-on">Feb 04, 2024</span>
                                                <p class="text">Accusamus iusto odio dignissimos ducimus blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
                                                <div class="reply_and_edit">
                                                    <a href="{{ route('blogDetails') }}" class="reply-btn">Reply <i class="ri-arrow-right-up-line"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="comment-item">
                                <div class="post-comment">
                                    <div class="comment-avater">
                                        <img src="{{ asset('themes/construz/assets/img/blog/blog_comment3.png') }}" alt="Comment Author">
                                    </div>
                                    <div class="comment-content">
                                        <h3 class="name">Zenelia Lozhe</h3>
                                        <span class="commented-on">Jun 04, 2024</span>
                                        <p class="text">Collaboratively empower multifunctional e-commerce for prospective applications. Seamlessly productivate plug-and-play markets whereas synergistic scenarios.</p>
                                        <div class="reply_and_edit">
                                            <a href="{{ route('blogDetails') }}" class="reply-btn">Reply <i class="ri-arrow-right-up-line"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!-- Comment Form -->
                        <h3 class="blog-inner-title mt-n2 mb-15"> Leave a Reply</h3>
                        <p>Your email address will not be published. Required fields are marked *</p>
                        <div class="comment-form mb-30 mt-30">
                            <div class="row">
                                <div class="col-xl-4 form-group">
                                    <input type="text" placeholder="Full Name" class="form-control style-white">
                                </div>
                                <div class="col-xl-4 form-group">
                                    <input type="email" placeholder="Email Address" class="form-control style-white">
                                </div>
                                <div class="col-xl-4 form-group">
                                    <input type="text" placeholder="Website" class="form-control style-white">
                                </div>
                                <div class="col-12 form-group">
                                    <textarea placeholder="Your Comment..." class="form-control style-white"></textarea>
                                </div>                          
                                <div class="col-12 form-group mb-0">
                                    <button class="btn">Submit Now <i class="ri-arrow-right-up-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Comment end -->
                    
                </div>

                <div class="col-xxl-4 col-lg-5">
                    <aside class="sidebar-area">
                        <div class="widget widget_search">
                            <h3 class="widget_title">Search Here</h3>
                            <form class="search-form">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><i class="ri-search-line"></i></button>
                            </form>
                        </div>

                        <div class="widget widget_categories">
                            <h3 class="widget_title">Categories</h3>
                            <ul>
                                <li>
                                    <a href="{{ route('blog') }}">Construction <span>12</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('blog') }}">Architecture <span>7</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('blog') }}">Business <span>5</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('blog') }}">Engineering <span>3</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('blog') }}">Building <span>2</span></a>
                                </li>                                
                            </ul>
                        </div>

                        <div class="widget">
                            <h3 class="widget_title">Recent Posts</h3>
                            <div class="recent-post-wrap">
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="{{ route('blogDetails') }}"><img src="{{ asset('themes/construz/assets/img/blog/recent-post1.png') }}" alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title"><a class="text-inherit" href="{{ route('blogDetails') }}">Best features of Building construction work</a></h4>
                                        <div class="recent-post-meta">
                                            <a href="{{ route('blog') }}">By Nicholes</a>
                                            <a href="{{ route('blog') }}">30 min ago</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="{{ route('blogDetails') }}"><img src="{{ asset('themes/construz/assets/img/blog/recent-post2.png') }}" alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title"><a class="text-inherit" href="{{ route('blogDetails') }}">The beast team is a around and how we make it</a></h4>
                                        <div class="recent-post-meta">
                                            <a href="{{ route('blog') }}">By Nicholes</a>
                                            <a href="{{ route('blog') }}">2 days ago</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="{{ route('blogDetails') }}"><img src="{{ asset('themes/construz/assets/img/blog/recent-post3.png') }}" alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title"><a class="text-inherit" href="{{ route('blogDetails') }}">Construction site security guideline</a></h4>
                                        <div class="recent-post-meta">
                                            <a href="{{ route('blog') }}">By Nicholes</a>
                                            <a href="{{ route('blog') }}">5 days ago</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="{{ route('blogDetails') }}"><img src="{{ asset('themes/construz/assets/img/blog/recent-post4.png') }}" alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title"><a class="text-inherit" href="{{ route('blogDetails') }}">A well designed construction website is user accessible</a></h4>
                                        <div class="recent-post-meta">
                                            <a href="{{ route('blog') }}">By Nicholes</a>
                                            <a href="{{ route('blog') }}">3 week ago</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="widget widget_categories">
                            <h3 class="widget_title">Archives</h3>
                            <ul>
                                <li>
                                    <a href="{{ route('blog') }}">January 26, 2025 <span>1</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('blog') }}">December 17, 2023 <span>2</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('blog') }}">November 02, 2023 <span>1</span></a>
                                </li>                               
                            </ul>
                        </div>

                        <div class="widget widget_tag_cloud">
                            <h3 class="widget_title">Popular Tags</h3>
                            <div class="tagcloud">
                                <a href="{{ route('blog') }}">Architecture</a>
                                <a href="{{ route('blog') }}">Building</a>
                                <a href="{{ route('blog') }}">Home</a>
                                <a href="{{ route('blog') }}">Factory</a>
                                <a href="{{ route('blog') }}">Construction</a>
                                <a href="{{ route('blog') }}">Business</a>
                                <a href="{{ route('blog') }}">Design</a>
                                <a href="{{ route('blog') }}">Industry</a>
                            </div>
                        </div>   

                        <div class="widget widget_banner">
                            <a href="#"><img src="{{ asset('themes/construz/assets/img/widget/widget-add.png') }}" alt="img"></a>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>   

@endsection