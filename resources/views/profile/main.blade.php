@extends('layout.main')
@section('banner')
<!-- start banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Profile</h1>
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
@section('profile')
<!--================Cart Area =================-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <!-- <div class="row">
        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active" id="v-pills-home-tab" data-toggle="pill" data-target="#v-pills-home" type="" role="tab" aria-controls="v-pills-home" aria-selected="true"><a href="{{route('show-updatefile')}}" style="color: black;">Add new address</a></button>
                <button class="nav-link" id="v-pills-profile-tab" data-toggle="pill" data-target="#v-pills-profile" type="" role="tab" aria-controls="v-pills-profile" aria-selected="false"><a href="" style="color: black;">Change Password</a></button>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
                @yield('function')
            </div>
        </div>
    </div> -->

    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('show-updatefile')}}">Add new address</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('show-changepassword')}}">Change Password</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10">
                @yield('function')
            </div>
        </div>    
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>
<!--================End Cart Area =================-->

@stop


