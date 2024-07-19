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
                    <a href="#">Payment</a>
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
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <div class="order_box">
                        <h2>Your Order</h2>
                        <?php
                            $content = Cart::content();
                        ?>
                        <ul class="list">
                            <li><a href="#">Product<span>Total</span></a></li>
                            @foreach($content as $val)
                            <div class="d-flex">
                                <img src="{{url('')}}/{{$val->options->image}}" alt="" width="50px" height="50px">
                            </div>
                            <li><a href="#">{{$val->name}} <span class="middle">x {{$val->qty}}</span> <span
                                        class="last">${{$val->price}}</span></a></li>
                            @endforeach
                        </ul>
                        <ul class="list list_2">
                            <li><a href="#">Subtotal <span>${{Cart::subtotal(1)}}</span></a></li>
                            <li><a href="#">Tax <span>${{Cart::tax(1)}}</span></a></li>
                            <li><a href="#">Shipping <span>Free</span></a></li>
                            <li><a href="#">Total <span>${{Cart::total(1)}}</span></a></li>
                        </ul><br>
                        <h2>Payment methods</h2>
                        <form action="{{route('order_place')}}" method="POST">
                            @csrf
                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" name="payment" value="1" checked>
                                    <label for="f-option5">Check payments</label>
                                    <div class="check"></div>
                                </div>
                                <p>Please send a check to Store Name, Store Street, Store Town, Store State / County,
                                    Store Postcode.</p>
                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="payment" value="2">
                                    <label for="f-option6">VN-PAY</label>
                                    <div class="check"></div>
                                </div>
                            </div>
                            <input type="submit" class="primary-btn" value="Next step" name="send_order_place">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Checkout Area =================-->
@stop