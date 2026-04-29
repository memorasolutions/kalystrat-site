@extends('frontend::layout.layout')

@php
    $title='Cart Page';
    $subTitle='Cart Page';
    $lightbox='true';
@endphp

@section('content')

    <!--==============================
    Cart Area
    ==============================-->
    <div class="space-top space-extra-bottom">
        <div class="container">
            <form action="#" class="woocommerce-cart-form">
                <table class="cart_table">
                    <thead>
                        <tr>
                            <th class="cart-col-image">Image</th>
                            <th class="cart-col-productname">Product Name</th>
                            <th class="cart-col-price">Price</th>
                            <th class="cart-col-quantity">Quantity</th>
                            <th class="cart-col-total">Total</th>
                            <th class="cart-col-remove">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="cart_item">
                            <td data-title="Product">
                                <a class="cart-productimage" href="{{ route('shopDetails') }}"><img width="91" height="91" src="{{ asset('themes/construz/assets/img/product/product_1_1.jpg') }}" alt="Image"></a>
                            </td>
                            <td data-title="Name">
                                <a class="cart-productname" href="{{ route('shopDetails') }}">Hardware Toolbox</a>
                            </td>
                            <td data-title="Price">
                                <span class="amount"><bdi><span>$</span>18</bdi></span>
                            </td>
                            <td data-title="Quantity">
                                <div class="quantity">
                                    <button class="quantity-minus qty-btn"><i class="ri-subtract-line"></i></button>
                                    <input type="number" class="qty-input" value="1" min="1" max="99">
                                    <button class="quantity-plus qty-btn"><i class="ri-add-line"></i></button>
                                </div>
                            </td>
                            <td data-title="Total">
                                <span class="amount"><bdi><span>$</span>18</bdi></span>
                            </td>
                            <td data-title="Remove">
                                <a href="#" class="remove"><i class="ri-delete-bin-6-line"></i></a>
                            </td>
                        </tr>
                        <tr class="cart_item">
                            <td data-title="Product">
                                <a class="cart-productimage" href="{{ route('shopDetails') }}"><img width="91" height="91" src="{{ asset('themes/construz/assets/img/product/product_1_2.jpg') }}" alt="Image"></a>
                            </td>
                            <td data-title="Name">
                                <a class="cart-productname" href="{{ route('shopDetails') }}">Drill Machine</a>
                            </td>
                            <td data-title="Price">
                                <span class="amount"><bdi><span>$</span>18</bdi></span>
                            </td>
                            <td data-title="Quantity">
                                <div class="quantity">
                                    <button class="quantity-minus qty-btn"><i class="ri-subtract-line"></i></button>
                                    <input type="number" class="qty-input" value="1" min="1" max="99">
                                    <button class="quantity-plus qty-btn"><i class="ri-add-line"></i></button>
                                </div>
                            </td>
                            <td data-title="Total">
                                <span class="amount"><bdi><span>$</span>18</bdi></span>
                            </td>
                            <td data-title="Remove">
                                <a href="#" class="remove"><i class="ri-delete-bin-6-line"></i></a>
                            </td>
                        </tr>
                        <tr class="cart_item">
                            <td data-title="Product">
                                <a class="cart-productimage" href="{{ route('shopDetails') }}"><img width="91" height="91" src="{{ asset('themes/construz/assets/img/product/product_1_3.jpg') }}" alt="Image"></a>
                            </td>
                            <td data-title="Name">
                                <a class="cart-productname" href="{{ route('shopDetails') }}">Claw Hammer</a>
                            </td>
                            <td data-title="Price">
                                <span class="amount"><bdi><span>$</span>18</bdi></span>
                            </td>
                            <td data-title="Quantity">
                                <div class="quantity">
                                    <button class="quantity-minus qty-btn"><i class="ri-subtract-line"></i></button>
                                    <input type="number" class="qty-input" value="1" min="1" max="99">
                                    <button class="quantity-plus qty-btn"><i class="ri-add-line"></i></button>
                                </div>
                            </td>
                            <td data-title="Total">
                                <span class="amount"><bdi><span>$</span>18</bdi></span>
                            </td>
                            <td data-title="Remove">
                                <a href="#" class="remove"><i class="ri-delete-bin-6-line"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" class="actions">
                                <button type="submit" class="btn">Update cart</button>
                                <a href="{{ route('shop') }}" class="btn style-border3">Continue Shopping</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <div class="row justify-content-end">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <h2 class="h4 summary-title fw-semibold">Cart Totals</h2>
                    <table class="cart_totals">
                        <tbody>
                            <tr>
                                <td>Cart Subtotal</td>
                                <td data-title="Cart Subtotal">
                                    <span class="amount"><bdi><span>$</span>47</bdi></span>
                                </td>
                            </tr>
                            
                        </tbody>
                        <tfoot>
                            <tr class="order-total">
                                <td>Order Total</td>
                                <td data-title="Total">
                                    <strong><span class="amount"><bdi><span>$</span>47</bdi></span></strong>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="wc-proceed-to-checkout mb-30">
                        <a href="{{ route('checkout') }}" class="btn btn-fw">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
