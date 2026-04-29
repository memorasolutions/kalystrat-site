@extends('frontend::layout.layout')

@php
    $title='Shop Details';
    $subTitle='Shop Details';
    $lightbox='true';
@endphp

@section('content')

    <!--==============================
    Product Details Area
    ==============================-->
    <section class="product-details space">
        <div class="container">
            <div class="row gx-60">
                <div class="col-xl-6">
                    <div class="product-big-img">
                        <div class="img"><img src="{{ asset('themes/construz/assets/img/product/product_details_1_1.jpg') }}" alt="Product Image"></div>
                    </div>
                </div>
                <div class="col-xl-6 align-self-center">
                    <div class="product-about">
                        <p class="price">$180.85<del>$350.99</del></p>
                        <h2 class="product-title">Drill Machine</h2>
                        <div class="product-rating">
                            <span class="star-rating">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                            </span>
                            (5 Reviews)
                        </div>
                        <p class="text">Syndicate customized growth strategies prospective human capital leverage other's optimal e-markets without transparent catalysts for change. Credibly coordinate highly efficient methods of empowerment cross unit solutions.</p>
                        <div class="checklist">
                            <ul>
                                <li><i class="ri-checkbox-circle-line"></i> Lifetime structural, one year finish warranty</li>
                                <li><i class="ri-checkbox-circle-line"></i> Mapped from “Center Caps” under ” tment” tab</li>
                                <li><i class="ri-checkbox-circle-line"></i> Fully copatible with OEM equimpent</li>
                            </ul>
                        </div>
                        <div class="actions">
                            <div class="quantity">
                                <button class="quantity-minus qty-btn"><i class="ri-subtract-line"></i></button>
                                <input type="number" class="qty-input" step="1" min="1" max="100" name="quantity" value="1" title="Qty">
                                <button class="quantity-plus qty-btn"><i class="ri-add-line"></i></button>
                            </div>
                            <button class="btn">Add to Cart</button>
                        </div>
                        <div class="product_meta">
                            <span class="sku_wrapper">SKU: <span class="sku">wheel-fits-chevy-camaro</span></span>
                            <span class="posted_in">Category: <a href="{{ route('shop') }}" rel="tag">Tires & Wheels</a></span>
                            <span>Tags: <a href="{{ route('shop') }}">automotive parts</a><a href="{{ route('shop') }}">wheels</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-tab-area">
                <ul class="nav product-tab-style1" id="productTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="false">Description</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="info-tab" data-bs-toggle="tab" href="#add_info" role="tab" aria-controls="add_info" aria-selected="false">Additional Information</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="true">Reviews (03)</a>
                    </li>
                </ul>
                <div class="tab-content" id="productTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                        <p>Credibly negotiate emerging materials whereas clicks-and-mortar intellectual capital. Compellingly whiteboard client-centric sources before cross-platform schemas. Distinctively develop future-proof outsourcing without multimedia based portals. Progressively coordinate next-generation architectures for collaborative solutions. Professionally restore backward-compatible quality vectors before customer directed metrics. Holisticly restore technically sound internal or "organic" sources before client-centered human capital underwhelm holistic mindshare for prospective innovation.</p>
                        <p class="mb-n1">Seamlessly target fully tested infrastructures whereas just in time process improvements. Dynamically exploit team driven functionalities vis a vis global total linkage redibly synthesize just in time technology rather than open-source strategic theme areas.</p>
                    </div>
                    <div class="tab-pane fade" id="add_info" role="tabpanel" aria-labelledby="add_info">
                        <table class="woocommerce-table">
                            <tbody>
                                <tr>
                                    <th>Brand</th>
                                    <td>Jakuna</td>
                                </tr>
                                <tr>
                                    <th>Color</th>
                                    <td>Yellow</td>
                                </tr>
                                <tr>
                                    <th>Weight</th>
                                    <td>400 gm</td>
                                </tr>
                                <tr>
                                    <th>Battery</th>
                                    <td>Lithium</td>
                                </tr>
                                <tr>
                                    <th>Material</th>
                                    <td>Wood</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
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
                                            <p class="text">Construction praesentium voluptatum deleniti atque corrupti quos dolores at vero eos accusamus iusto odio dignissimos. Saepe corporis beatae a eaque non? Repudiandae veritatis recusandae perspiciatis, sint maxime dolor quam doloribus!</p>
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
                                                    <p class="text">Accusamus iusto odio dignissimos ducimus blanditiis praesentium voluptatum deleniti atque corrupti quos dolores simos temporibus at similique vitae placeat veritatis nobis dolore. Cumque sint molestias repudiandae quaerat eligendi?</p>
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
                        </div>
                    </div>
                </div>
            </div>
            <!--==============================
            Related Product  
            ==============================-->
            <div class="space-extra-top">
                <div class="row justify-content-between">
                    <div class="col-md-6">
                        <div class="title-area text-md-start text-center">
                            <h2 class="sec-title">Related Products.</h2>
                        </div>
                    </div>
                    <div class="col-md-auto">
                        <div class="sec-btn mb-40">
                            <a href="{{ route('shop') }}" class="btn">VIEW ALL PRODUCTS</a>
                        </div>
                    </div>
                </div>
                <div class="row global-carousel" id="productCarousel" data-slide-show="4" data-lg-slide-show="4" data-md-slide-show="3" data-sm-slide-show="2" data-xs-slide-show="1">

                    <div class="col-lg-3 col-md-6">
                        <div class="product-card">
                            <div class="product-img">
                                <img src="{{ asset('themes/construz/assets/img/product/product_1_1.jpg') }}" alt="Product Image">
                                <div class="actions">
                                    <a href="#QuickView" class="icon-btn popup-content"><i class="ri-eye-line"></i></a>
                                    <a href="{{ route('cart') }}" class="icon-btn"><i class="ri-shopping-cart-line"></i></a>
                                    <a href="{{ route('wishlist') }}" class="icon-btn"><i class="ri-heart-line"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <span class="star-rating">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </span>
                                <h3 class="product-title"><a href="{{ route('shopDetails') }}">Hardware Toolbox</a></h3>
                                <span class="price"><del>$30</del> $25</span>
                            </div>
                        </div>
                    </div>  
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card">
                            <div class="product-img">
                                <img src="{{ asset('themes/construz/assets/img/product/product_1_2.jpg') }}" alt="Product Image">
                                <div class="actions">
                                    <a href="#QuickView" class="icon-btn popup-content"><i class="ri-eye-line"></i></a>
                                    <a href="{{ route('cart') }}" class="icon-btn"><i class="ri-shopping-cart-line"></i></a>
                                    <a href="{{ route('wishlist') }}" class="icon-btn"><i class="ri-heart-line"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <span class="star-rating">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </span>
                                <h3 class="product-title"><a href="{{ route('shopDetails') }}">Drill Machine</a></h3>
                                <span class="price"><del>$300</del> $250</span>
                            </div>
                        </div>
                    </div>  
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card">
                            <div class="product-img">
                                <img src="{{ asset('themes/construz/assets/img/product/product_1_3.jpg') }}" alt="Product Image">
                                <div class="actions">
                                    <a href="#QuickView" class="icon-btn popup-content"><i class="ri-eye-line"></i></a>
                                    <a href="{{ route('cart') }}" class="icon-btn"><i class="ri-shopping-cart-line"></i></a>
                                    <a href="{{ route('wishlist') }}" class="icon-btn"><i class="ri-heart-line"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <span class="star-rating">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </span>
                                <h3 class="product-title"><a href="{{ route('shopDetails') }}">Claw Hammer</a></h3>
                                <span class="price"><del>$130</del> $125</span>
                            </div>
                        </div>
                    </div>                
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card">
                            <div class="product-img">
                                <img src="{{ asset('themes/construz/assets/img/product/product_1_4.jpg') }}" alt="Product Image">
                                <div class="actions">
                                    <a href="#QuickView" class="icon-btn popup-content"><i class="ri-eye-line"></i></a>
                                    <a href="{{ route('cart') }}" class="icon-btn"><i class="ri-shopping-cart-line"></i></a>
                                    <a href="{{ route('wishlist') }}" class="icon-btn"><i class="ri-heart-line"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <span class="star-rating">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </span>
                                <h3 class="product-title"><a href="{{ route('shopDetails') }}">Chainsaw Machine</a></h3>
                                <span class="price"><del>$130</del> $125</span>
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card">
                            <div class="product-img">
                                <img src="{{ asset('themes/construz/assets/img/product/product_1_5.jpg') }}" alt="Product Image">
                                <div class="actions">
                                    <a href="#QuickView" class="icon-btn popup-content"><i class="ri-eye-line"></i></a>
                                    <a href="{{ route('cart') }}" class="icon-btn"><i class="ri-shopping-cart-line"></i></a>
                                    <a href="{{ route('wishlist') }}" class="icon-btn"><i class="ri-heart-line"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <span class="star-rating">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </span>
                                <h3 class="product-title"><a href="{{ route('shopDetails') }}">Construction Hat</a></h3>
                                <span class="price"><del>$150</del> $125</span>
                            </div>
                        </div>
                    </div>  

                </div>
            </div>
        </div>
    </section>   

@endsection