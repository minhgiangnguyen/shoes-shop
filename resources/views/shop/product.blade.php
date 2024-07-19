@extends('layout.main')

<section>
    <ul>
        <li></li>
    </ul>
</section>

@section('content')
<!--================Single Product Area =================-->
<div class="product_image_area" style="padding-top: 130px;">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="s_Product_carousel">
                    <div class="single-prd-item">
                        <img class="img-fluid" src="{{asset($rowProduct->ProductThumb)}}" alt="">
                    </div>
                    @foreach($images as $image)
                    <div class="single-prd-item">
                        <img class="img-fluid" src="{{asset($image->ProductImage)}}" alt="image product">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3>{{$rowProduct->ProductName}}</h3>
                    <h2>${{$rowProduct->ProductPrice}}</h2>
                    <ul class="list">
                        <li><span style="margin-right:5px">Category: </span><a class="active"
                                href="{{route('shop.collection',['collection'=>$rowProduct->collections->CollectionName])}}">
                                {{$rowProduct->collections->CollectionName}}</a></li>
                        <li><span style="margin-right:5px">Color:</span>{{$rowProduct->ProductColorDetail}}</li>
                        <li><span style="margin-right:5px">Material:</span>{{$rowProduct->ProductMaterial}}</li>
                        <!-- <li><a href="#"><span>Availibility</span> : In Stock</a></li> -->
                    </ul>

                    <div class="size-guide">
                        <a class="genric-btn link" href="#" data-toggle="modal" data-target="#sizeGuide">
                            <span style="font-size:14px">Size guide</span>
                        </a>
                    </div>
                    <!-- Start modal size guide -->
                    <div class="modal fade" id="sizeGuide" tabindex="-1" role="dialog" aria-labelledby="sizeGuide"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLongTitle">SIZE GUIDE</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <section class="text-center">
                                        <img class="img-fluid" src="{{asset('assets/img/sizeguide/HowToMeasure.png')}}"
                                            alt="How to measure">
                                    </section>
                                    <section class="mt-3" style="padding-left:80px">
                                        <h3>IN BETWEEN SIZES?</h3>
                                        <p style="font-size:16px">For tight fit, go one size down.
                                            <br>For loose fit, go one size up.
                                        </p>
                                    </section>
                                    <section class="text-center">
                                        <h3>Adidas Shoe Size Chart for Men/Women</h3>
                                        <img class="img-fluid"
                                            src="{{asset('assets/img/sizeguide/size-chart-conversion-unisex-men-women.png')}}"
                                            alt="Size chart conversion unisex men women">
                                    </section>
                                    <section class="text-center mt-3">
                                        <img class="img-fluid"
                                            src="{{asset('assets/img/sizeguide/Size-Kids-Babies-and-Toddlers.png')}}"
                                            alt="Size chart conversion unisex men women">
                                    </section>
                                    <section class="text-center mt-3">
                                        <img class="img-fluid"
                                            src="{{asset('assets/img/sizeguide/Size-Kids-Children.png')}}"
                                            alt="Size chart conversion unisex men women">
                                    </section>
                                    <section class="text-center mt-3">
                                        <img class="img-fluid"
                                            src="{{asset('assets/img/sizeguide/Size-Kids-Youth-and-Teens.png')}}"
                                            alt="Size chart conversion unisex men women">
                                    </section>

                                </div>
                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End modal size guide -->
                    <form action="{{route('save-cart')}}" method="post">
                        @csrf
                        <input type="hidden" name="productid_hidden" value="{{$rowProduct->ProductID}}"></li>
                        <div class="form-check form-check-inline mt-1">
                            <ul class="list">
                                <li><span style="margin-right:20px">Size :</span>
                                        @foreach($proSize as $val )
                                        @if($rowProduct->ProductID == $val->ProductID)
                                        <input class="form-check-input" type="radio" id="size" value="{{$val->SizeID}}"
                                            name="size">
                                        <label class="form-check-label" style="margin-right:20px" for="size">{{$val->size_name->SizeName}}</label>
                                        @endif
                                        @endforeach</li>
                                <span style="color:red">@error('size'){{ $message }}@enderror</span>
                            </ul>
                        </div>
                        <br>
                        <div class="product_count qtyHidden">
                            <ul class="list">
                                <li><a class="active" href="#"><span>Quantity</span></a> :
                                    <input type="number" name="qty" id="sst" min="1" max="1" value="1" title="Quantity:"
                                        class="input-text qty">
                                    <input type="hidden" name="productid_hidden" value="{{$rowProduct->ProductID}}">
                                </li>
                            </ul>
                        </div>
                        <!-- <div class="text-left">
                            <button type="submit" value="submit" class="btn primary-btn">Add to Cart</button>
                        </div> -->
                        <div class="card_area d-flex align-items-center">
                            <button type="submit" value="submit" class="btn primary-btn">Add to Cart</button>
                        </div>
                        @if(Session::get('success'))
                        <div class="alert alert-success mt-2">
                            {{ Session::get('success')}}
                        </div>
                        @endif
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">

            <li class="nav-item">
                <a class="nav-link active" id="desc-tab" data-toggle="tab" href="#desc" role="tab" aria-controls="desc"
                    aria-selected="false">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail"
                    aria-selected="false">Detail</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="desc" role="tabpanel" aria-labelledby="desc-tab">
                {!! $rowProduct->ProductDesc !!}

            </div>
            <div class="tab-pane fade" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                {!! $rowProduct->ProductDetail !!}
            </div>

        </div>
    </div>
</section>
<!--================End Product Description Area =================-->

@stop
@section('script')
<script>
// console.log(document.querySelector(".genric-btn.link"))
document.querySelector(".genric-btn").style.setProperty('padding', '0');
</script>
@stop