@extends('admin.layouts.main')
@section('content')
<h1 class="text-center">Product Image</h1>
<h2 class="text-center">ProductID : {{$data->ProductID}} - Product name : {{$data->ProductName}}</h2>
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
        <form method="post" action="{{route('img_list',$data->ProductID)}}" class="row font-weight-bold mt-3" enctype="multipart/form-data">
            @csrf
            <label for="formFile" class="form-label">Add new Image</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="form-control" name="image_list">
                    <!-- <label class="custom-file-label" for="inputGroupFile04">Choose file</label> -->
                </div>
            </div>
            <div class="mt-4"><button type="submit" class="btn btn-primary">Add new</button></div>
            <span style="color:red">@error('image_list'){{ $message }}@enderror</span>
        </form>
    </div>
    <div class="d-flex p-2 row">
        @foreach($img as $key)
            @if($data->ProductID == $key->ProductID)
            <div class="col-md-3">
                <div class="card mb-3" style="max-width: 15rem;">
                    <div class="card-body text-center">
                        <img src="{{url('')}}/{{$key->ProductImage}}" class="card-img-top mb-3" height="200">
                        <a onclick="return confirm('Bạn có chắc chắn xóa không?')" href="{{route('deleteImg',$key->ImageID)}}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>
</div>
@stop