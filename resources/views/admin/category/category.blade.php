@extends('admin.layouts.main')
@section('content')
<div class="container-fluid row">
    <!-- Category -->

    <div class="col-md-3">
        @if(Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success')}}
        </div>
        @elseif(Session::get('danger'))
        <div class="alert alert-danger">
            {{ Session::get('danger')}}
        </div>
        @endif
        <div class="container-fluid">
            <h1 class="text-center">Collection</h1>

            <form action="{{route('addCat')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" id="CollectionName" name="CollectionName"
                        placeholder="Name">
                    <span style="color:red">@error('CollectionName'){{ $message }}@enderror</span>
                    <!-- <label for="CollectionImage" class="form-label">ProductThumb</label> -->
                    <div class="input-group">
                        <input class="form-control" type="file" id="CollectionImage" name="CollectionImage">
                    </div>
                    <div class="mb-3" id="displayImg">
                        <span style="color:red">@error('CollectionImage'){{ $message }}@enderror</span>
                    </div>

                    <input type="text" class="form-control" id="CollectionTitle" name="CollectionTitle"
                        placeholder="Title">
                    <span style="color:red">@error('CollectionTitle'){{ $message }}@enderror</span>

                    <input type="text" class="form-control" id="CollectionSummary" name="CollectionSummary"
                        placeholder="Summary">
                    <span style="color:red">@error('CollectionSummary'){{ $message }}@enderror</span>

                    <p>Image Type</p>
                    <input type="radio" name="ImageType" value="1">
                    <label for="age1">Header Banner</label><br>
                    <input type="radio" name="ImageType" value="2">
                    <label for="age2">Other Banner</label><br>
                    <input type="radio" name="ImageType" value="0">
                    <label for="age3">Normal image</label><br><br>
                </div>
                <div class="mb-3"><button type="submit" class="btn btn-primary">Add new</button></div>
            </form>
        </div>
        <div class="container-fluid">
            <h1 class="text-center">List</h1>
            <table class="table border">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Collectionc</th>
                        <th scope="col">Total products</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataColec as $key)
                    <tr class="text-center">
                        <th scope="row">{{$loop->index + 1 }}</th>
                        <td>{{$key->CollectionName}}</td>
                        <td>{{$key->products->count()}}</td>
                        <td><a onclick="return confirm('Are you sure?')"
                                href="{{route('deleteCat',$key->CollectionID)}}" class="btn btn-danger"><i
                                    class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Gender -->
    <div class="col-md-3">
        <div class="container-fluid">
            <h1 class="text-center">Gender</h1>
            <form action="{{route('addGender')}}" method="post">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" id="GenderName" name="GenderName">
                    <span style="color:red">@error('GenderName'){{ $message }}@enderror</span>
                </div>
                <div class="mb-3"><button type="submit" class="btn btn-primary">Add new</button></div>
            </form>
        </div>
        <div class="container-fluid">
            <h1 class="text-center">List</h1>
            <table class="table border">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Gender Name</th>
                        <th scope="col">Total products</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataGender as $key)
                    <tr class="text-center">
                        <th scope="row">{{$loop->index + 1 }}</th>
                        <td>{{$key->GenderName}}</td>
                        <td>{{$key->productGender->count()}}</td>
                        <td><a href="{{route('delGender',$key->GenderID)}}" class="btn btn-danger"
                                onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Size -->
    <div class="col-md-3">
        <div class="container-fluid">
            <h1 class="text-center">Sizes</h1>
            <form action="{{route('addSize')}}" method="post">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" id="SizeName" name="SizeName">
                    <span style="color:red">@error('SizeName'){{ $message }}@enderror</span>
                </div>
                <div class="mb-3"><button type="submit" class="btn btn-primary">Add new</button></div>
            </form>
        </div>
        <div class="container-fluid">
            <h1 class="text-center">List</h1>
            <table class="table border">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Size</th>
                        <th scope="col">Total products</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataSize as $val)
                    <tr class="text-center">
                        <th scope="row">{{$loop->index + 1 }}</th>
                        <td>{{$val->SizeName}}</td>
                        <td>{{$val->productSize->count()}}</td>
                        <td><a onclick="return confirm('Are you sure?')" href="{{route('delSize',$val->SizeID)}}"
                                class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Color -->
    <div class="col-md-3">
        <div class="container-fluid">
            <h1 class="text-center">Color</h1>
            <form action="{{route('addColor')}}" method="post">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" id="ColorName" name="ColorName">
                    <span style="color:red">@error('ColorName'){{ $message }}@enderror</span>
                </div>
                <div class="mb-3"><button type="submit" class="btn btn-primary">Add new</button></div>
            </form>
        </div>
        <div class="container-fluid">
            <h1 class="text-center">List</h1>
            <table class="table border">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Color</th>
                        <th scope="col">Total products</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataColor as $val)
                    <tr class="text-center">
                        <th scope="row">{{$loop->index + 1 }}</th>
                        <td>{{$val->ColorName}}</td>
                        <td>{{$val->productColor->count()}}</td>
                        <td><a onclick="return confirm('Are you sure?')" href="{{route('delColor',$val->ColorID)}}"
                                class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop