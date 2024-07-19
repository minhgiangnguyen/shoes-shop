@extends('layout.main')
@section('banner')
<!-- start banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Checkout</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{route('home.index')}}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <!-- <a href="#">Shop<span class="lnr lnr-arrow-right"></span></a> -->
                    <a href="#">Checkout</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
@stop
@section('content')
<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
    <div class="container">
        <!-- <div class="returning_customer">
            <div class="check_title">
                <h2>Returning Customer? <a href="#">Click here to login</a></h2>
            </div>
            <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new
                customer, please proceed to the Billing & Shipping section.</p>
            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                <div class="col-md-6 form-group p_star">
                    <input type="text" class="form-control" id="name" name="name">
                    <span class="placeholder" data-placeholder="Username or Email"></span>
                </div>
                <div class="col-md-6 form-group p_star">
                    <input type="password" class="form-control" id="password" name="password">
                    <span class="placeholder" data-placeholder="Password"></span>
                </div>
                <div class="col-md-12 form-group">
                    <button type="submit" value="submit" class="primary-btn">login</button>
                    <div class="creat_account">
                        <input type="checkbox" id="f-option" name="selector">
                        <label for="f-option">Remember me</label>
                    </div>
                    <a class="lost_pass" href="#">Lost your password?</a>
                </div>
            </form>
        </div> -->
        <!-- <div class="cupon_area">
            <div class="check_title">
                <h2>Have a coupon? <a href="#">Click here to enter your code</a></h2>
            </div>
            <input type="text" placeholder="Enter coupon code">
            <a class="tp_btn" href="#">Apply Coupon</a>
        </div> -->

        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="mb-5">Check the information</h2>
                    <h3>Billing Details</h3>
                    <form class="row contact_form" action="{{route('save_checkout')}}" method="post"
                        novalidate="novalidate">
                        @csrf
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" name="shipping_name" placeholder="Full Name" value="{{old('shipping_name')}}">
                            <span style="color:red">@error('shipping_name'){{ $message }}@enderror</span>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" name="shipping_phone" placeholder="Phone number" value="{{old('shipping_phone')}}">
                            <span style="color:red">@error('shipping_phone'){{ $message }}@enderror</span>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" name="shipping_email" placeholder="Email Address" value="{{old('shipping_email')}}">
                            <span style="color:red">@error('shipping_email'){{ $message }}@enderror</span>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" name="shipping_address" placeholder="Address" value="{{old('shipping_address')}}">
                            <span style="color:red">@error('shipping_address'){{ $message }}@enderror</span>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" name="shipping_city" placeholder="Town/City" value="{{old('shipping_city')}}">
                            <span style="color:red">@error('shipping_city'){{ $message }}@enderror</span>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <h3>Shipping Details</h3>
                                <label for="f-option3">Ship to a different address?</label>
                            </div>
                            <textarea class="form-control" name="shipping_note" id="shipping_note" rows="1"
                                placeholder="Order Notes"></textarea>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="btn primary-btn">Next step</button>
                        </div>
                    </form>
                </div>
                <!-- <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Your Order</h2>
                        <ul class="list">
                            <li><a href="#">Product <span>Total</span></a></li>
                            <li><a href="#">Fresh Blackberry <span class="middle">x 02</span> <span
                                        class="last">$720.00</span></a></li>
                            <li><a href="#">Fresh Tomatoes <span class="middle">x 02</span> <span
                                        class="last">$720.00</span></a></li>
                            <li><a href="#">Fresh Brocoli <span class="middle">x 02</span> <span
                                        class="last">$720.00</span></a></li>
                        </ul>
                        <ul class="list list_2">
                            <li><a href="#">Subtotal <span>$2160.00</span></a></li>
                            <li><a href="#">Shipping <span>Flat rate: $50.00</span></a></li>
                            <li><a href="#">Total <span>$2210.00</span></a></li>
                        </ul>
                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" id="f-option5" name="selector">
                                <label for="f-option5">Check payments</label>
                                <div class="check"></div>
                            </div>
                            <p>Please send a check to Store Name, Store Street, Store Town, Store State / County,
                                Store Postcode.</p>
                        </div>
                        <div class="payment_item active">
                            <div class="radion_btn">
                                <input type="radio" id="f-option6" name="selector">
                                <label for="f-option6">Paypal </label>
                                <img src="img/product/card.jpg" alt="">
                                <div class="check"></div>
                            </div>
                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                account.</p>
                        </div>
                        <div class="creat_account">
                            <input type="checkbox" id="f-option4" name="selector">
                            <label for="f-option4">I’ve read and accept the </label>
                            <a href="#">terms & conditions*</a>
                        </div>
                        <a class="primary-btn" href="#">Proceed to Paypal</a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>
<!--================End Checkout Area =================-->
@stop