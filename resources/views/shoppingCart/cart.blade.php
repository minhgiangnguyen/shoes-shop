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
                    <a href="#">Cart</a>
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
    @if(Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success')}}
        </div>
    @endif
    @if(Cart::count() == 0)
        <h3>YOUR CART IS EMPTY</h3>
    @else
        <div class="cart_inner">
            <div>
                <?php
                    $content = Cart::content();
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($content as $val)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="{{url('')}}/{{$val->options->image}}" alt="" width="50px" height="50px">
                                    </div>
                                    <div class="media-body">
                                        <h5>{{$val->name}}</h5>
                                        <div class="d-flex">
                                            <span class="mt-2"> Size :</span>
                                            <form id="updateCartSize-{{$val->rowId}}" action="{{route('updateCartSize')}}" method="POST">
                                                @csrf
                                                @method('put')
                                                <select class="customSelect" onchange="updateSize(this)" data-rowid="{{$val->rowId}}" name="size">
                                                    @foreach($proSize as $key )
                                                        @if($val->id == $key->ProductID)
                                                            <option  value="{{$key->SizeID}}" {{($val->options->size == $key->SizeID)?'selected':''}}>{{$key->size_name->SizeName}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <input type="hidden" name="proId" value="{{$val->id}}">
                                                <input type="hidden" value="{{$val->rowId}}" class="btn btn-default btn-sm" name="rowId" id="rowId">
                                            </form>
                                            <span class="mt-2"> Quantity :</span>
                                            <form id="updateCartQty-{{$val->rowId}}" action="{{route('updateCartQty')}}" method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="product_count">
                                                    <select class="customSelect" onchange="updateQuantity(this)" data-rowid="{{$val->rowId}}" name="qty">
                                                        @for($i=1;$i<=5;$i++)
                                                            <option  value="{{$i}}" {{($i == $val->qty)?'selected':''}}>{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                    <input type="hidden" value="{{$val->rowId}}" class="btn btn-default btn-sm" name="rowId" id="rowId" >
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>${{number_format($val->price * $val->qty)}}</h5>
                            </td>
                            <td>
                                <a onclick="return confirm('Are you sure?')"
                                href="{{URL::to('/delete-to-cart/'.$val->rowId)}}" class="btn btn-secondary"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>
                                <a class="gray_btn" href="{{route('home.index')}}">Continue Shopping</a>
                            </td>
                            <td>
                                <h5>Total</h5>
                            </td>
                            <td>
                                <h5>${{Cart::subtotal(1)}}</h5>
                            </td>
                        </tr>
                        <tr class="out_button_area">
                            <td>
                                
                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <?php 
                                        $shipping_id = session::get('shipping_id');
                                    ?>
                                    @if(Auth::check()==NULL)
                                        <a class="primary-btn" href="{{route('show-form-login')}}">Member Checkout</a>
                                    @else(Auth::check())
                                        <a class="primary-btn" href="{{route('checkout')}}">Checkout</a>
                                    @endif
                                    <a class="gray_btn" href="{{route('checkout')}}">Guest Checkout</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
    
</section>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!--================End Cart Area =================-->

<script>
    function updateQuantity(qty)
    {
        let id = $(qty).data('rowid');
        // alert(id);
        $('#updateCartQty-' + id).submit();
    }
    function updateSize(size)
    {
        let id = $(size).data('rowid');
        $('#updateCartSize-' + id).submit();
    }
</script>
@stop

