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
                        <h2>Thank you for your order</h2>
                        <div>
                            <a class="gray_btn" href="{{route('home.index')}}">Continue Shopping</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Checkout Area =================-->
@stop