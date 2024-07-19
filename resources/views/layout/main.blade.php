<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <base href="/" />
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('assets/images/fav.png') }}">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Karma Shop</title>
    <!--
		CSS
		============================================= -->
    <link rel="stylesheet" href="{{ asset('assets/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ion.rangeSlider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ion.rangeSlider.skinFlat.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/slick/slick-theme.css') }}">


</head>

<body>
    <!-- Start Header Area -->
    @include('layout.header')
    <!-- End Header Area -->

    @yield('banner')

    @yield('content')

    @yield('profile')

    <!-- start footer Area -->
    <footer class="footer-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-6 col-sm-6">

                    <div class="single-footer-widget">
                        <h6>Contact Us</h6>
                        <p>Address: Tòa Nhà HTC, 250 Hoàng Quốc Việt, Cổ Nhuế, Cầu Giấy, Hà Nội, Việt Nam</p>
                        <p>Phone: 0123456789</p>
                        <p>Email: shoeshop@gmail.com</p>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Infomation</h6>
                        <a href="#">About Us</a>
                        <br>
                        <a href="#">Returns & Exchanges</a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Follow Us</h6>
                        <div class="footer-social d-flex align-items-center">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4  col-md-6 col-sm-6">
                    <div class="single-footer-widget mail-chimp">
                        <!-- <h6 class="mb-20">Instragram Feed</h6> -->
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.657774963816!2d105.78167039078785!3d21.046375022146574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab3b4220c2bd%3A0x1c9e359e2a4f618c!2sB%C3%A1ch%20Khoa%20Aptech!5e0!3m2!1svi!2s!4v1698589491922!5m2!1svi!2s"
                            height="380" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade" id="iframeMap"></iframe>
                    </div>
                </div>

            </div>
            <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
                <p class="footer-text m-0">
                    Copyright &copy;
                    <script>
                    document.write(new Date().getFullYear());
                    </script>
                    <a href="{{route('home.index')}}" target="_blank">Shoes</a> shop
                </p>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->

    <script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/js/countdown.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!--gmaps Js-->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script> -->
    <script src="{{ asset('assets/js/gmaps.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.pjax.js') }}"></script>
    <script src="{{ asset('assets/slick/slick.min.js') }}" type="text/javascript" charset="utf-8"></script>
    <script>
    $(document).ready(function() {
        if ($(window).width() < 300) {
            $('#iframeMap').attr("width", "270");

        } else if ($(window).width() < 400) {
            $('#iframeMap').attr("width", "350");

        } else if ($(window).width() < 500) {
            $('#iframeMap').attr("width", "390");

        } else if ($(window).width() < 800) {
            $('#iframeMap').attr("width", "360");
        } else if ($(window).width() < 900) {
            $('#iframeMap').attr("width", "380");

        } else if ($(window).width() < 1050) {
            $('#iframeMap').attr("width", "320");
        } else {
            $('#iframeMap').attr("width", "450");
        }
    });
    </script>


    @yield('script')
</body>

</html>