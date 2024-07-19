@extends('layout.main')
@section('banner')
<!-- start banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Register</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{route('home.index')}}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <!-- <a href="#">Shop<span class="lnr lnr-arrow-right"></span></a> -->
                    <a href="#">Register</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
@stop
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="{{ asset('public/bootstrap5/css/bootstrap.min.css') }}"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="row justify-content-around">
                <form action="{{ route('register') }}" method="post" class="col-md-6 bg-light p-3 my-3">
                    @csrf
                    <h3 class="text-center py-3">REGISTER FOR AN ACCOUNT</h3>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success text-center">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger text-center">
                        {{ $errormessage }}
                    </div>
                    @endif
                    <div class="form-group my-3">
                        <label for="lastName">Full Name<span style="color:red">(*)</span></label>
                        <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}">
                        @error('name')
                        <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="email">Email<span style="color:red">(*)</span></label>
                        <input class="form-control" type="email" name="email" id="email" value="{{old('email')}}">
                        @error('email')
                        <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="password">Password<span style="color:red">(*)</span></label>
                        <input class="form-control" type="password" name="password" id="password"
                            value="{{old('password')}}">
                        @error('password')
                        <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="confirm-password">Enter the password<span style="color:red">(*)</span></label>
                        <input class="form-control" type="password" name="confirm-password" id="confirm-password"
                            value="{{old('confirm-password')}}">
                        @error('confirm-password')
                        <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="d-grid my-3">
                        <input class="btn-primary btn btn-block" type="submit" value="Register">
                    </div>
                    <div class="text-center">
                        <a class="small" href="{{route('show-form-login')}}">Already have an account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</html>
@stop