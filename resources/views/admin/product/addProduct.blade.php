@extends('admin.layouts.main')
@section('content')
<div class="container card">
    <h1 class="text-center mt-3">Add new product</h1>
    @if(Session::get('success'))
    <div class="alert alert-success">
        {{ Session::get('success')}}
    </div>
    @endif
    <form method="post" action="{{route('addProduct')}}" class="row font-weight-bold mt-3"
        enctype="multipart/form-data">
        @csrf
        <div class="col-md-8">
            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" class="form-control" id="ProductName" name="ProductName"
                    value="{{old('ProductName')}}">
                <span style="color:red">@error('ProductName'){{ $message }}@enderror</span>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Collection</label>
                        <select class="form-control" id="ProductCollectionID" name="ProductCollectionID"
                            aria-label="Floating label select example">
                            <option selected disabled>---Choose---</option>
                            @foreach($data as $catlist)
                            <option value="{{$catlist->CollectionID}}"
                                {{(old('ProductCollectionID') == $catlist->CollectionID)?'selected':''}}>
                                {{$catlist->CollectionName}}</option>
                            @endforeach
                        </select>
                        <span style="color:red">@error('ProductCollectionID'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">ProductGender</label>
                        <select class="form-control" id="ProductGenderID" name="ProductGenderID"
                            aria-label="Floating label select example">
                            <option selected disabled>---Choose---</option>
                            @foreach($gender as $key)
                            <option value="{{$key->GenderID}}" {{(old('ProductGenderID') == $key->GenderID)?'selected':''}}>
                                {{$key->GenderName}}</option>
                            @endforeach
                        </select>
                        <span style="color:red">@error('ProductGenderID'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">ProductPrice</label>
                        <input type="text" class="form-control" id="ProductPrice" name="ProductPrice"
                            value="{{old('ProductPrice')}}">
                        <span style="color:red">@error('ProductPrice'){{ $message }}@enderror</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">ProductCode</label>
                        <input type="text" class="form-control" id="ProductCode" name="ProductCode"
                            value="{{old('ProductCode')}}">
                        <span style="color:red">@error('ProductCode'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">ProductMaterial</label>
                        <input type="text" class="form-control" id="ProductMaterial" name="ProductMaterial"
                            value="{{old('ProductMaterial')}}">
                        <span style="color:red">@error('ProductMaterial'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">ProductColorDetail</label>
                        <input type="text" class="form-control" id="ProductColorDetail" name="ProductColorDetail"
                            value="{{old('ProductColorDetail')}}">
                        <span style="color:red">@error('ProductColorDetail'){{ $message }}@enderror</span>
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="formFile" class="form-label">ProductThumb</label>
                <div class="input-group">
                    <input class="form-control" type="file" id="ProductThumb" name="ProductThumb"
                        onchange="ImagesFileAsURL()">
                </div>
                <div class="mb-3" id="displayImg">
                    <span style="color:red">@error('ProductThumb'){{ $message }}@enderror</span>
                </div>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">ProductImage<a href="#modal-files" data-toggle="modal"
                        class="btn btn-default">Select</a></label>
                <input class="form-control" type="text" name="ProductImage" id="ProductImage"
                    value="{{old('ProductImage')}}">
                <span style="color:red">@error('ProductImage'){{ $message }}@enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">ProductColor</label>
                <select class="form-control" id="ProductColorID" name="ProductColorID"
                    aria-label="Floating label select example">
                    <option selected disabled>---Choose---</option>
                    @foreach($color as $key)
                    <option value="{{$key->ColorID}}"
                        {{(old('ProductColorID') == $key->ColorID)?'selected':''}}>{{$key->ColorName}}
                    </option>
                    @endforeach
                </select>
                <span style="color:red">@error('ProductColorID'){{ $message }}@enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">ProductDetail</label>
                <textarea class="form-control" placeholder="Leave a comment here" id="ProductDetail"
                    name="ProductDetail" style="height: 600px">{{old('ProductDetail')}}</textarea>
                <span style="color:red">@error('ProductDetail'){{ $message }}@enderror</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <div class="row">
                    <label class="form-label">ProductSize</label>
                    <div class="mb-3 row">
                        @foreach($size as $key)
                        <div class="col-sm-3">
                            <input type="checkbox" name="size[]" value="{{$key->SizeID}}"
                                {{ (is_array(old('size')) && in_array($key->SizeID, old('size'))) ? ' checked' : '' }}>
                            <label for="vehicle1">{{$key->SizeName}}</label><br>
                        </div>
                        @endforeach
                        <span style="color:red">@error('size'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">ProductDesc</label>
                    <textarea class="form-control" placeholder="Leave a comment here" id="ProductDesc"
                        name="ProductDesc" style="height: 500px">{{old('ProductDesc')}}</textarea>
                    <span style="color:red">@error('ProductDesc'){{ $message }}@enderror</span>
                </div>
                
            </div>
            <div class="mb-3"><button type="submit" class="btn btn-primary">Lưu</button></div>
        </div>
    </form>
</div>

<div class="modal fade" id="modal-files">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Chọn nhiều ảnh</h4>
            </div>
            <div class="modal-body">
                <iframe style="width: 1000px;height: 1000px; border:0; overflow-y:auto"
                    src="{{url('filemanager')}}/dialog.php?akey=wC4WSG6mXLAE0ZcD58pIAV1UvDDqxMvg&type=0&type=0&field_id=ProductImage"
                    frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>
@stop