@extends('admin.layouts.main')
@section('content')

<div class="container-fluid">
    <h1 class="text-center">List Product</h1>
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
    <h2>
        <a href="{{route('products')}}" class="btn btn-success">Add new product</a>
        <a href="{{route('listPro')}}" class="btn btn-primary">All product</a>
    </h2>
        <thead>
            <tr class="text-center">
                <th scope="col">Product Id</th>
                <th scope="col">Product Code</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Gender</th>
                <th scope="col">Product Color</th>
                <th scope="col">Product Price</th>
                <th scope="col">Product Desc</th>
                <th scope="col">Product Detail</th>
                <th scope="col">Product Thumb</th>
                <th scope="col">Product Collection</th>
                <th scope="col">Product Material</th>
                <th scope="col">Product Image</th>
                <th scope="col">Product size</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $products)
            <tr class="text-center">
                <th scope="row">{{$products->ProductID}}</th>
                <td>{{$products->ProductCode}}</td>
                <td>{{$products->ProductName}}</td>
                <td>{{$products->genders->GenderName}}</td>
                <td>{{$products->colors->ColorName}}</td>
                <td>{{$products->ProductPrice}}</td>
                <td>{!! Str::limit($products->ProductDesc, 150) !!}</td>
                <td>{!! Str::limit($products->ProductDetail, 300) !!}</td>
                <td><img src="{{url('')}}/{{$products->ProductThumb}}" width="250" height="250" alt=""></td>
                <td>{{$products->collections->CollectionName}}</td>
                <td>{{$products->ProductMaterial}}</td>
                <td><a href="{{route('img_list',$products->ProductID)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a></td>
                <td><a href="{{route('productSize',$products->ProductID)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a></td>
                <td>
                    <a href="{{route('edit',$products->ProductID)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                    <a href="{{route('delete',$products->ProductID)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody> 
    </table>
    {{ $data->links('pagination::bootstrap-5') }}
</div>

@stop