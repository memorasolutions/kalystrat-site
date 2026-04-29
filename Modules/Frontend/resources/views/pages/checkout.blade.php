@extends('frontend::layout.layout')

@php
    $title='Checkout Page';
    $subTitle='Checkout Page';
    $lightbox='true';
@endphp

@section('content')

    <!--==============================
    Checkout Area
    ==============================-->
    <div class="space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="shipping-area">
                        <h3 class="fw-semibold">Payment Details</h3>
                        <form class="checkout-form">
                            <div class="form-group mb-4">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    <img src="{{ asset('themes/construz/assets/img/payment-method/03.png') }}" alt="#">
                                </label>
                            </div>
                            <div class="form-group mb-4">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Credit Card
                                </label>
                            </div>
                            <ul class="footer-currency currency-area">
                                <li><a href="#"><img src="{{ asset('themes/construz/assets/img/payment-method/01.png') }}" alt="img"></a></li>
                                <li><a href="#"><img src="{{ asset('themes/construz/assets/img/payment-method/02.png') }}" alt="img"></a></li>
                                <li><a href="#"><img src="{{ asset('themes/construz/assets/img/payment-method/04.png') }}" alt="img"></a></li>
                                <li><a href="#"><img src="{{ asset('themes/construz/assets/img/payment-method/05.png') }}" alt="img"></a></li>
                            </ul>
                            <div class="row gy-4">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Full name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Card Number</label>
                                        <input type="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Expire Date</label>
                                        <select class="form-control">
                                            <option>April</option>
                                            <option>March</option>
                                            <option>February</option>
                                            <option selected="selected">January</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Year</label>
                                        <select class="form-control">
                                            <option>2023</option>
                                            <option>2022</option>
                                            <option>2020</option>
                                            <option selected="selected">2021</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>CCV</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>                                
                            </div>
                            <div class="form-group mb-30 mt-30">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" checked>
                                <label class="form-check-label" for="flexRadioDefault3">
                                    Cash on Delivery
                                </label>
                            </div>
                            <button type="submit" class="btn">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection