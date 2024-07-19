@extends('layout.main')
@section('content')
@section('banner')
<!-- start banner Area -->
<section class="banner-area " style="position: relative;background: url({{asset($headerBanner->CollectionImage)}}) center no-repeat ;
                                    background-size: cover; margin-top:80px">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start ">
            <div class="col-lg-5 col-md-6">
                <div class="banner-content">
                    <h1>{{$headerBanner->CollectionTitle}}</h1>
                    <p>{{$headerBanner->CollectionSummary}}</p>
                    <div class="add-bag d-flex align-items-center">
                        <a href="{{route('shop.collection',['collection'=>$headerBanner->CollectionName])}}"
                            class="genric-btn primary circle arrow">TO THE
                            COLLECTION<span class="lnr lnr-arrow-right"></span></a>
                    </div>
                </div>

            </div>
        </div>
</section>
<!-- End banner Area -->
@stop

<!-- start features Area -->
<section class="features-area section_gap">
    <div class="container">
        <div class="row features-inner">
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="{{ asset('assets/img/features/f-icon1.png') }}" alt="">
                    </div>
                    <h6>Free Delivery</h6>
                    <p>Free Shipping on all order</p>
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="{{ asset('assets/img/features/f-icon2.png') }}" alt="">
                    </div>
                    <h6>Return Policy</h6>
                    <p>Free Shipping on all order</p>
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="{{ asset('assets/img/features/f-icon3.png') }}" alt="">
                    </div>
                    <h6>24/7 Support</h6>
                    <p>Free Shipping on all order</p>
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="{{ asset('assets/img/features/f-icon4.png') }}" alt="">
                    </div>
                    <h6>Secure Payment</h6>
                    <p>Free Shipping on all order</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end features Area -->

<!-- start product Area -->
<section class="owl-carousel active-product-area section_gap">
    <!-- single product slide -->
    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Latest Products</h1>
                        <a href="{{route('shop.all')}}?sort=newest">Watch More</a>

                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($newProducts as $product)
                <!-- single product -->
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                        <a href="{{ route('product.details',$product->ProductSlug)}}">
                            <img class="img-fluid" src="{{$product->ProductThumb}}" alt="{{$product->ProductName}}">
                        </a>
                        <div class="product-details">
                            <a href="{{route('product.details',$product->ProductSlug)}}">
                                {{$product->ProductName}}
                            </a>
                            <div class="price">
                                <h6>${{$product->ProductPrice}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- single product slide -->
    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>New Collection</h1>
                        <a href="{{route('shop.collection',['collection'=>$newCollectName])}}">Watch More</a>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($newCollect as $product)
                <!-- single product -->
                <div class="col-lg-3 col-md-6">

                    <div class="single-product">
                        <a href="{{route('product.details',$product->ProductSlug)}}">
                            <img class="img-fluid" src="{{$product->ProductThumb}}" alt="{{$product->ProductName}}">
                        </a>
                        <div class="product-details">
                            <a href="{{route('product.details',$product->ProductSlug)}}">{{$product->ProductName}}</a>
                            <div class="price">
                                <h6>${{$product->ProductPrice}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- end product Area -->

<!-- start banner Area -->
<section class="banner-area" style="background: url({{asset($otherBanner->CollectionImage)}}) center no-repeat;background-size: cover;
    ">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-5 col-md-6">
                <div class="banner-content">
                    <h1>{{$otherBanner->CollectionTitle}}</h1>
                    <p>{{$otherBanner->CollectionSummary}}</p>
                    <div class="add-bag d-flex align-items-center">
                        <a href="{{route('shop.collection',['collection'=>$otherBanner->CollectionName])}}"
                            class="genric-btn primary circle arrow">TO THE COLLECTION<span
                                class="lnr lnr-arrow-right"></span></a>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- End banner Area -->
<section class="collection-list album py-5 bg-light">
    @foreach($collectList as $collect)
    <div class="px-5">
        <img class="card-img-top" src="{{asset($collect->CollectionImage)}}" alt="collection">
        <div class="pt-3">
            <h3>{{$collect->CollectionTitle}}</h1>
                <p class="card-text">{{$collect->CollectionSummary}}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="{{route('shop.collection',['collection'=>$collect->CollectionName])}}"
                            class="genric-btn primary-border medium">SHOP NOW</a>
                    </div>
                </div>
        </div>
    </div>
    @endforeach

</section>




<!-- Start related-product Area -->
<section class="related-product-area section_gap_bottom mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h1>Top-Selling</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @foreach($topSeller as $product)
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                        <div class="single-related-product d-flex">
                            <a href="{{$product->ProductSlug}}"><img src="{{$product->ProductThumb}}"
                                    alt="{{$product->ProductName}}" width="100px" height="100px"></a>
                            <div class="desc">
                                <a href="{{route('product.details',$product->ProductSlug)}}"
                                    class="title">{{$product->ProductName}}</a>
                                <div class="price">
                                    <h6>${{$product->ProductPrice}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- <div class="col-lg-3">
                <div class="ctg-right">
                    <a href="#" target="_blank">
                        <img class="img-fluid d-block mx-auto" src="{{ asset('assets/img/categories/c5.jpg') }}" alt="">
                    </a>
                </div>
            </div> -->
        </div>
    </div>
</section>
<!-- End related-product Area -->
@stop

@section('script')
<script>
$(document).ready(function() {
    $('.collection-list').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [{
                breakpoint: 960,
                settings: {
                    slidesToShow: 2.5,
                    slidesToScroll: 2.5,

                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1.5,
                    slidesToScroll: 1.5
                }
            },
            // {
            //     breakpoint: 480,
            //     settings: {
            //         slidesToShow: 1,
            //         slidesToScroll: 1
            //     }
            // }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    })

})
</script>
@stop