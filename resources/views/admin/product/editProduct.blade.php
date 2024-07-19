@extends('admin.layouts.main')
@section('content')
<div class="container-fluid card">
    <h1 class="text-center mt-3">Edit Product</h1>
    <h2 class="text-center">ProductID : {{$dataPro->ProductID}}</h2>
    <h2><a href="{{route('listPro')}}" class="btn btn-success">Back to list product</a></h2>
    @if(Session::get('success'))
    <div class="alert alert-success">
        {{ Session::get('success')}}
    </div>
    @endif
    <form method="post" action="{{route('editPro',$dataPro->ProductID)}}" class="row font-weight-bold mt-3" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="col-md-8">
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" class="form-control" id="ProductName" name="ProductName" value="{{$dataPro->ProductName}}">
            <span style="color:red">@error('ProductName'){{ $message }}@enderror</span>
        </div>
        <div class="mb-3">
            <label class="form-label">Product Collection</label>
            <select class="form-control" name="ProductCollectionID" aria-label="Floating label select example">
                <option selected>---Chosse---</option>
                @foreach($data as $catlist)
                    <option value="{{$catlist->CollectionID}}" {{($dataPro->ProductCollectionID == $catlist->CollectionID)?'selected':''}} >{{$catlist->CollectionName}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Product Gender</label>
            <select class="form-control" name="ProductGenderID" aria-label="Floating label select example">
                <option selected>---Chosse---</option>
                @foreach($gender as $val)
                    <option value="{{$val->GenderID}}" {{($dataPro->ProductGenderID == $val->GenderID)?'selected':''}} >{{$val->GenderName}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Product Material</label>
            <input type="text" class="form-control" id="ProductMaterial" name="ProductMaterial" value="{{$dataPro->ProductMaterial}}">
            <span style="color:red">@error('ProductMaterial'){{ $message }}@enderror</span>
        </div>
        <div class="mb-3">
            <label class="form-label">Product Detail</label>
            <textarea class="form-control" placeholder="Leave a comment here" id="ProductDetail" name="ProductDetail" style="height: 600px">{{$dataPro->ProductDetail}}</textarea>
            <span style="color:red">@error('ProductDetail'){{ $message }}@enderror</span>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label class="form-label">Product Price</label>
            <input type="text" class="form-control" id="ProductPrice" name="ProductPrice" value="{{$dataPro->ProductPrice}}">
            <span style="color:red">@error('ProductPrice'){{ $message }}@enderror</span>
        </div>
        <div class="mb-3">
            <label class="form-label">Product Code</label>
            <input type="text" class="form-control" id="ProductCode" name="ProductCode" value="{{$dataPro->ProductCode}}">
            <span style="color:red">@error('ProductCode'){{ $message }}@enderror</span>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Product Thumb</label>
                <div class="input-group">
                    <input class="form-control" type="file" id="ProductThumb" name="ProductThumb" value="{{$dataPro->ProductThumb}}" onchange="ImagesFileAsURL()">
                </div>
                <div id="displayImg">
                    <img class="mt-2" src="{{url('')}}/{{$dataPro->ProductThumb}}" width="100" height="100" alt="">
                </div>
            <span style="color:red">@error('ProductThumb'){{ $message }}@enderror</span>
        </div>
        <div class="mb-3">
            <label class="form-label">Product Color</label>
            <select class="form-control" id="ProductColorID" name="ProductColorID" aria-label="Floating label select example">
            <option selected>---Chosse---</option>
            @foreach($color as $key)
                <option value="{{$key->ColorID}}" {{($dataPro->ProductColorID == $key->ColorID)?'selected':''}} >{{$key->ColorName}}</option>
            @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Product Desc</label>
            <textarea class="form-control" placeholder="Leave a comment here" id="ProductDesc" name="ProductDesc" style="height: 500px">{{$dataPro->ProductDesc}}</textarea>
            <span style="color:red">@error('ProductDesc'){{ $message }}@enderror</span>
        </div>
        <div class="mb-3"><button type="submit" class="btn btn-primary">Update</button></div>
    </div>  
    </form>
</div>
@stop
