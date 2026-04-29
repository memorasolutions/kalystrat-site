@extends('frontend::layout.layout')

@php
    $title='Wishlist';
    $subTitle='Wishlist';
    $lightbox='true';
@endphp

@section('content')

    <!--==============================
    Wishlist Area
    ==============================-->
    <div class="space-top space-extra-bottom ">
        <div class="container">
            <div class="tinv-wishlist woocommerce tinv-wishlist-clear">
                <form action="#" method="post" autocomplete="off">
                    <div class="table-responsive">
                        <table class="tinvwl-table-manage-list">
                            <thead>
                                <tr>
                                    <th class="product-remove"></th>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">
                                        <span class="tinvwl-full">Product Name</span><span class="tinvwl-mobile">Product</span>
                                    </th>
                                    <th class="product-price">Unit Price</th>
                                    <th class="product-stock">Stock Status</th>
                                    <th class="product-action">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="wishlist_item">
                                    <td class="product-remove">
                                        <button type="submit" name="tinvwl-remove" value="58" title="Remove"><i class="ri-close-line"></i>
                                        </button>
                                    </td>
                                    <td class="product-thumbnail">
                                        <a href="{{ route('shopDetails') }}"><img src="{{ asset('themes/construz/assets/img/product/product_1_4.jpg') }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="image"></a>
                                    </td>
                                    <td class="product-name">
                                        <a href="{{ route('shopDetails') }}">Chainsaw Machine</a>
                                    </td>
                                    <td class="product-price">
                                        <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>45.00</bdi></span>
                                    </td>
                                    <td class="product-stock">
                                        <p class="stock in-stock">
                                            <i class="ri-check-line"></i>
                                            <span class="tinvwl-txt">In stock</span>
                                        </p>
                                    </td>
                                    <td class="product-action">
                                        <button class="button btn" name="tinvwl-add-to-cart" value="58" title="Add to Cart">
                                            <i class="ri-shopping-cart-2-line"></i>
                                            <span class="tinvwl-txt">Add to Cart</span>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="wishlist_item">
                                    <td class="product-remove">
                                        <button type="submit" name="tinvwl-remove" value="60" title="Remove"><i class="ri-close-line"></i>
                                        </button>
                                    </td>
                                    <td class="product-thumbnail">
                                        <a href="{{ route('shopDetails') }}"><img src="{{ asset('themes/construz/assets/img/product/product_1_5.jpg') }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="image"></a>
                                    </td>
                                    <td class="product-name">
                                        <a href="{{ route('shopDetails') }}">Construction Hat</a>
                                    </td>
                                    <td class="product-price">
                                        <ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>18.00</bdi></span></ins>
                                        <del><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>20.00</bdi></span></del>
                                    </td>
                                    <td class="product-stock">
                                        <p class="stock in-stock"><i class="ri-check-line"></i><span class="tinvwl-txt">In stock</span></p>
                                    </td>
                                    <td class="product-action">
                                        <button class="button btn" name="tinvwl-add-to-cart" value="60" title="Add to Cart">
                                            <i class="ri-shopping-cart-2-line"></i>
                                            <span class="tinvwl-txt">Add to Cart</span>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="wishlist_item">
                                    <td class="product-remove">
                                        <button type="submit" name="tinvwl-remove" value="60" title="Remove"><i class="ri-close-line"></i>
                                        </button>
                                    </td>
                                    <td class="product-thumbnail">
                                        <a href="{{ route('shopDetails') }}"><img src="{{ asset('themes/construz/assets/img/product/product_1_6.jpg') }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="image"></a>
                                    </td>
                                    <td class="product-name">
                                        <a href="{{ route('shopDetails') }}">Sparta Demolition Hamme</a>
                                    </td>
                                    <td class="product-price">
                                        <ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>18.00</bdi></span></ins>
                                        <del><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>20.00</bdi></span></del>
                                    </td>
                                    <td class="product-stock">
                                        <p class="stock in-stock"><i class="ri-check-line"></i><span class="tinvwl-txt">In stock</span></p>
                                    </td>
                                    <td class="product-action">
                                        <button class="button btn" name="tinvwl-add-to-cart" value="60" title="Add to Cart">
                                            <i class="ri-shopping-cart-2-line"></i>
                                            <span class="tinvwl-txt">Add to Cart</span>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection