<!-- Start Header Area -->
<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{route('home.index')}}"><img
                        src="{{ asset('assets/img/logo.png') }}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">

                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item "><a class="nav-link" href="{{route('home.index')}}">Home</a></li>
                        @foreach($genders as $gender)
                        @if (strtolower($gender->GenderName)=='unisex' )
                        @break
                        @endif
                        <li class="nav-item active"><a class="nav-link"
                                href="{{route('shop.gender',['gender'=> strtolower($gender->GenderName)])}}">{{$gender->GenderName}}</a>
                        </li>
                        @endforeach
                        @if(Auth::check('UserID'))
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{Route('show-profile')}}">Profile</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="{{Route('logout')}}">Logout</a></li>
                            </ul>
                        </li>
                        @else
                        <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login</a></li>
                        @endif
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item"><a href="{{route('cart')}}" class="cart"><span
                                    class="fa fa-cart-arrow-down">({{Cart::count()}})</span></a>
                        </li>
                        <!-- <li class="nav-item">
                            <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- <div class="search_input" id="search_input_box">
        <div class="container">
            <form class="d-flex justify-content-between">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div> -->
</header>
<!-- End Header Area -->