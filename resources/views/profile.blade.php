@extends('layout.main')
@section('banner')
<!-- start banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Shopping Cart</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{route('home.index')}}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <!-- <a href="#">Shop<span class="lnr lnr-arrow-right"></span></a> -->
                    <a href="#">Profile</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
@stop
@section('content')
<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="wrapper">
            <div class="container">
                <div class="row justify-content-around">
                    <form class="col-md-4" method="POST" action="" class="col-md-6 bg-light p-3 my-3">
                        <h3 class="text-center py-3">User Information</h3>
                        @csrf
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">UserCity</label>
                            <input type="text" class="form-control" name="userCity"
                                value="{{auth()->user()->UserCity}}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">UserPhone</label>
                            <input type="text" class="form-control" name="userPhone"
                                value="{{auth()->user()->UserPhone}}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">UserBirthday</label>
                            <input type="date" class="form-control" name="userBirthday"
                                value="{{auth()->user()->UserBirthday}}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">UserCountry</label>
                            <input type="text" class="form-control" name="userCountry"
                                value="{{auth()->user()->UserCountry}}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">UserAddress</label>
                            <input type="text" class="form-control" name="userAddress"
                                value="{{auth()->user()->UserAddress}}">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!--================End Cart Area =================-->

@stop