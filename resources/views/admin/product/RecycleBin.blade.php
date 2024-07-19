@extends('admin.layouts.main')
@section('content')
<div class="container-fluid">
    <h1 class="text-center">Recycle Bin</h1>
        <div class="row">
            <div class="col-md-4">
                @if(Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success')}}
                    </div>
                @endif
            </div>
        </div>
    <table class="table border">
        <thead>
            <tr class="text-center">
                <th scope="col">Select</th>
                <th scope="col">Product Id</th>
                <th scope="col">Product Code</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col">Product Thumb</th>
                <th scope="col">Product Collection</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <form id="form1" action="{{route('deleteAll')}}" method="POST">
                @csrf
                
                @foreach($trasheds as $products)
                    <tr class="text-center">
                        <th><input type="checkbox" name="ids[{{$products->ProductID}}]" value="{{$products->ProductID}}"></th>
                        <th scope="row">{{$products->ProductID}}</th>
                        <td>{{$products->ProductCode}}</td>
                        <td>{{$products->ProductName}}</td>
                        <td>{{$products->ProductPrice}}</td>
                        <td><img src="../{{$products->ProductThumb}}" width="50" height="50" alt=""></td>
                        <td>{{$products->collections->CollectionName}}</td>
                        <td class="text-center">
                            <a href="{{route('restore',$products->ProductID)}}" class="btn btn-success">Restore</i></a>
                        </td>
                    </tr>
                @endforeach
                <h2>
                    <a href="{{route('listPro')}}" class="btn btn-success">Back to list Product</a>
                    <input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger" value="Delete Seleted">
                </h2>
            </form>
        </tbody>
    </table>
   
</div>
@stop