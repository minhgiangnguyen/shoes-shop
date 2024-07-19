@extends('layout.main')
@section('banner')
<!-- start banner Area -->

@if(Route::currentRouteName() == 'shop.all')

<x-category.banner title="ALL PRODUCT" />
@elseif(Route::currentRouteName() == 'shop.collection')
<x-category.banner title="SHOP {{strtoupper($collection)}}" :category="$collection" />
@else
<x-category.banner title="SHOP {{strtoupper($gender)}}" :category="$gender" />
@endif

<!-- End Banner Area -->
@stop
@section('content')
<div class="container">
    <div class="row">
        <!-- Start Sidebar Filter-->
        <div class="col-xl-3 col-lg-4 col-md-5">
            @include('shop.sidebar_filter')
        </div>
        <!-- End Sidebar Filter-->
        <!-- Start Pagination -->
        <div class="col-xl-9 col-lg-8 col-md-7">
            <div class="filter-bar d-flex justify-content-end">
                <div class="sorting btn-group dropdown show">
                    <!-- <a class="btn btn-light dropdown-toggle" href="" role="button" id="sortBy"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        SORT BY
                    </a> -->
                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">

                    </button>

                    <div class="dropdown-menu">
                        <a data-pjax class="dropdown-item" rel="desc" href="">
                            PRICE (HIGH - LOW)</a>
                        <a data-pjax class="dropdown-item" rel="asc" href="">
                            PRICE (LOW - HIGH)
                        </a>
                        <a data-pjax class="dropdown-item" rel="newest" href="">
                            NEWEST
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Pagination -->
            <!-- Start Product List -->
            <section id="product-list" data-pjax class="lattest-product-area pb-40 category-list">
                <div class="row">
                    @foreach($products as $product)
                    <!-- single product -->
                    <div class="col-lg-4 col-md-6">
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
                                    <!-- <h6 class="l-through">$</h6> -->
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            <!-- End Product List -->
            <!-- Start Pagination -->
            <div class="filter-bar d-flex justify-content-end">
                {{ $products->links() }}
            </div>
            <!-- End Pagination -->
        </div>
    </div>
</div>


@stop

@section('script')
<script>
$(document).ready(function() {
    $('.dropdown-toggle').html('SORT BY')
    $('a[rel="page-1"]').addClass('active');

    // console.log(window.location.href);

    $(document).pjax('a[data-pjax]', '#product-list');
    if ($.support.pjax) {
        $.pjax.defaults.timeout = 1000;
        $.pjax.defaults.scrollTo = false;
        // $.pjax.defaults.type = "GET";


    }

    var sortArr = ['desc', 'asc', 'newest']
    sortArr.forEach((s) =>
        $('a[rel=' + s + ']').on('click', function(e) {
            var text = $('a[rel=' + s + ']').text();
            $('.dropdown-toggle').html(text);
            if (window.location.href.search(/[?]/) > 0) {
                if (window.location.href.search('sort=') > 0) {
                    for (const s1 of sortArr) {
                        if (window.location.href.search('sort=' + s1) > 0) {
                            e.originalEvent.currentTarget.href = window.location.href.replace(s1, s);
                        }
                    }
                } else {
                    e.originalEvent.currentTarget.href = window.location.href + '&sort=' + s;
                }
            } else {
                e.originalEvent.currentTarget.href = window.location.href + '?sort=' + s;
            }

        })
    )

    var pageArr = Array.from({
        length: $('ul.pagination li a').length
    }, (_, i) => i + 1);

    pageArr.forEach((p) =>
        $("a[rel=" + "page-" + p + "]").on('click', function(e) {
            // alert
            $('ul.pagination li a').removeClass('active');
            $(this).addClass('active');
            if (window.location.href.search(/[?]/) > 0) {
                if (window.location.href.search('page=') > 0) {
                    for (const p1 of pageArr) {
                        if (window.location.href.search('page=' + p1) > 0) {
                            e.originalEvent.currentTarget.href = window.location.href.replace(p1, p);
                        }
                    }
                } else {
                    e.originalEvent.currentTarget.href = window.location.href + '&page=' + p;
                }
            } else {
                e.originalEvent.currentTarget.href = window.location.href + '?page=' + p;
            }

        })
    )
    var collectArr = Array.from({
        length: $('ul#collect-list li a').length
    }, (_, i) => i + 1);
    collectArr.forEach((i) =>
        $("a[rel=" + "collect-" + i + "]").on('click', function(e) {
            $('ul#collect-list li a').css("color", "");
            $(this).css("color", "#ffba00");
            if (window.location.href.search(/[?]/) > 0) {
                if (window.location.href.search('filter_collect=') > 0) {
                    for (const i1 of collectArr) {
                        if (window.location.href.search('filter_collect=' + i1) > 0) {
                            e.originalEvent.currentTarget.href = window.location.href.replace(i1, i);
                        }
                    }
                } else {
                    e.originalEvent.currentTarget.href = window.location.href + '&filter_collect=' + i;
                }
            } else {
                e.originalEvent.currentTarget.href = window.location.href + '?filter_collect=' + i;
            }

        })
    )

    var colorArr = Array.from({
        length: $('ul#color-list li a').length
    }, (_, i) => i + 1);
    colorArr.forEach((i) =>
        $("a[rel=" + "color-" + i + "]").on('click', function(e) {
            $('ul#collect-list li a').css("color", "");
            $(this).css("color", "#ffba00");
            if (window.location.href.search(/[?]/) > 0) {
                if (window.location.href.search('filter_color=') > 0) {
                    for (const i1 of colorArr) {
                        if (window.location.href.search('filter_color=' + i1) > 0) {
                            e.originalEvent.currentTarget.href = window.location.href.replace(i1, i);
                        }
                    }
                } else {
                    e.originalEvent.currentTarget.href = window.location.href + '&filter_color=' + i;
                }
            } else {
                e.originalEvent.currentTarget.href = window.location.href + '?filter_color=' + i;
            }

        })
    )


    var genderArr = Array.from({
        length: $('ul#gender-list li a').length
    }, (_, i) => i + 1);
    genderArr.forEach((i) =>
        $("a[rel=" + "gender-" + i + "]").on('click', function(e) {
            $('ul#gender-list li a').css("color", "");
            $(this).css("color", "#ffba00");
            if (window.location.href.search(/[?]/) > 0) {
                if (window.location.href.search('filter_gender=') > 0) {
                    for (const i1 of genderArr) {
                        if (window.location.href.search('filter_gender=' + i1) > 0) {
                            e.originalEvent.currentTarget.href = window.location.href.replace(i1, i);
                        }
                    }
                } else {
                    e.originalEvent.currentTarget.href = window.location.href + '&filter_gender=' + i;
                }
            } else {
                e.originalEvent.currentTarget.href = window.location.href + '?filter_gender=' + i;
            }

        })
    )

    var sizeArr = Array.from({
        length: $('ul#size-list li a').length
    }, (_, i) => i + 1);
    sizeArr.forEach((i) =>
        $("a[rel=" + "size-" + i + "]").on('click', function(e) {
            $('ul#size-list li a').css("color", "");
            $(this).css("color", "#ffba00");
            if (window.location.href.search(/[?]/) > 0) {
                if (window.location.href.search('filter_size=') > 0) {
                    for (const i1 of sizeArr) {
                        if (window.location.href.search('filter_size=' + i1) > 0) {
                            e.originalEvent.currentTarget.href = window.location.href.replace(i1, i);
                        }
                    }
                } else {
                    e.originalEvent.currentTarget.href = window.location.href + '&filter_size=' + i;
                }
            } else {
                e.originalEvent.currentTarget.href = window.location.href + '?filter_size=' + i;
            }

        })
    )



});
</script>
@stop