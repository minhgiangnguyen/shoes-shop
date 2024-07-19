@extends('admin.layouts.main')
@section('content')
<style>
    .customSelect{
        border: solid 0px #e8e8e8;
        }
</style>
<div class="container-fluid card">
    <h1 class="text-center mt-3">List Order</h1>
            @if(Session::get('success'))
                <div class="alert alert-success">
                    {{ Session::get('success')}}
                </div>
            @endif
    <table class="table border">
        <thead>
            <tr class="text-center">
                <th scope="col">Order Id</th>
                <th scope="col">Order Times</th>
                <th scope="col">Order Price</th>
                <th scope="col">Name</th>
                <th scope="col">Payment Method</th>
                <th scope="col">Status</th>
                <th scope="col">Order Deital</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $val)
                <tr class="text-center">
                    <th scope="row">{{$val->OrderID}}</th>
                    <td>{{$val->created_at}}</td>
                    <td>{{$val->OrderTotalPrice}}</td>
                    <td>{{$val->order->shipping_name}}</td>
                    <td>{{($val->payment->PaymentMethod)==1?"Receive payment":"VN Pay"}}</td>
                    <td >
                        <form id="updateStatus-{{$val->OrderID}}" action="{{route('updateStatus')}}" method="POST">
                            @csrf
                            @method('put')
                            <select class=" customSelect" onchange="updateStatus(this)" data-rowid="{{$val->OrderID}}" name="OrderStatus">
                                <option value="Processing !" {{($val->OrderStatus == "Processing !")?'selected':''}}>Processing !</option>
                                <option value="Comfirm !" {{($val->OrderStatus == "Comfirm !")?'selected':''}}>Comfirm !</option>
                            </select>
                            <input type="hidden" value="{{$val->OrderID}}" class="btn btn-default btn-sm" name="id" id="id" >
                        </form>
                    </td>
                    <td>
                        <a href="{{route('manageOrderDetail',$val->OrderID)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
            @endforeach
            <h2>
                <a href="{{route('manageOrder')}}" class="btn btn-primary">List all</a>
            </h2>
        </tbody>
    </table>
    {{$data->links('pagination::bootstrap-5')}}
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!--================End Cart Area =================-->

<script>
    function updateStatus(stt)
    {
        // alert(stt);
        let id = $(stt).data('rowid');
        // alert(id);
        $('#updateStatus-' + id).submit();
    }
</script>
@stop