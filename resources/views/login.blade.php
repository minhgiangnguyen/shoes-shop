@extends('layout.main')
@section('banner')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Login/Register</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{route('home.index')}}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#">Login/Register</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
@stop
@section('content')
<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="{{asset('assets/img/login.jpg')}}" alt="">
                    <div class="hover">
                        <h4>New to our website?</h4>
                        <p>There are advances being made in science and technology everyday, and a good example of this
                            is the</p>
                        <a class="primary-btn" href="{{route('show-form-register')}}">Create an Account</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Log in to enter</h3>
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success text-center">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <form class="row login_form" action="" method="post" id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="name" name="email" placeholder="Email"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                            @error('email')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" id="myInput" name="password"
                                placeholder="Password" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Password'">
                            @error('password')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <input type="checkbox" id="f-option2" name="selector" onclick="myFunction()">
                                <label for="f-option2">Show Password</label>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="primary-btn">Log In</button>
                            <!-- <a href="#">Forgot Password?</a> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->
@stop

@section('script')
<script>
function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
@stop