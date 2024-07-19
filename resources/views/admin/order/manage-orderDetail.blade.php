@extends('admin.layouts.main')
@section('content')
<div style="padding-left: 10px;">
    <a href="{{route('manageOrder')}}" class="btn btn-primary">Back to list order</a>
</div>
<div class="container-fluid row mt-2">
    <div class="col-md-6 card">
        <h3 class="text-center mt-3">Information</h3>
        <table class="table border">
            <thead>
                <tr class="text-center">
                    <th scope="col">Name</th>
                    <th scope="col">Phone number</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>{{$dataOrder->order->shipping_name}}</td>
                    <td>{{$dataOrder->order->shipping_phone}}</td>
                    <td>{{$dataOrder->order->shipping_email}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-6 card">
    <h3 class="text-center mt-3">Shipping Address</h3>
        <table class="table border">
            <thead>
                <tr class="text-center">
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">Note</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>{{$dataOrder->order->shipping_address}}</td>
                    <td>{{$dataOrder->order->shipping_city}}</td>
                    <td>{{$dataOrder->order->shipping_note}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="container card mt-5 mb-5">
    <h3 class="text-center m-3">Order Detail</h3>
    <table class="table border">
        <thead>
            <tr class="text-center">
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Size</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataDetail as $val)
            <tr class="text-center">
                <th scope="row">{{$val->DetailID}}</th>
                <td>{{$val->DetailProductName}}</td>
                <td>{{$val->detailSize->SizeName}}</td>
                <td>{{$val->DetailPrice}}</td>
                <td>{{$val->DetailQuantity}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop