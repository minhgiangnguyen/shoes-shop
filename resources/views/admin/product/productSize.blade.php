@extends('admin.layouts.main')
@section('content')   
    <h1 class="text-center">Product Size</h1>
    <h2 class="text-center">ProductID : {{$data->ProductID}} - Product name : {{$data->ProductName}} </h2>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @if(Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success')}}
                    </div>
                @endif
            </div>
        </div>
        <div class="card mt-2 p-4">
            <h2><a href="{{route('listPro')}}" class="btn btn-success">Back to list product</a></h2>
            <h3 class="text-center">Add more size</h3>
            <form method="post" action="{{route('productSize',$data->ProductID)}}" class="row font-weight-bold mt-3">
            @csrf
                @foreach($size as $key)
                    <div class="col-md-3">
                        <input type="checkbox" name="size[]" value="{{$key->SizeID}}">
                        <label for="vehicle1">{{$key->SizeName}}</label><br>
                    </div>
                @endforeach
                <span style="color:red">@error('size'){{ $message }}@enderror</span>
                <div class="mt-4"><button type="submit" class="btn btn-primary">Add more size</button></div>
            </form>
        </div>
    </div>
    <div class="container">
    <table class="table border">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Size</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
            <tbody>
                @foreach($productSize as $val)
                    @if($val->ProductID == $data->ProductID)
                    <tr class="text-center">
                        <th scope="row">{{$val->ProductSizeID}}</th>
                        <td>{{$val->size_name->SizeName}}</td>
                        <td class="text-center">
                            <a href="{{route('deleteSize',$val->ProductSizeID)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@stop