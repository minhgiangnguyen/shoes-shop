@extends('admin.layouts.main')
@section('content')
<div class="container-fluid">
    <h2 class="text-center">{{$data->name}} - Id: {{$data->UserID}}</h2>
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
            <h2>
                <a href="{{route('adminManagement')}}" class="btn btn-success">Back to list</a>
            </h2>
            <tr class="text-center">
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">City</th>
                <th scope="col">State</th>
                <th scope="col">Zip</th>
                <th scope="col">Birthday</th>
                <th scope="col">Country</th>
                <th scope="col">Address</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->UserPhone}}</td>
                <td>{{$data->UserCity}}</td>
                <td>{{$data->UserState}}</td>
                <td>{{$data->UserZip}}</td>
                <td>{{$data->UserBirthday}}</td>
                <td>{{$data->UserCountry}}</td>
                <td>{{$data->UserAddress}}</td>
            </tr>
        </tbody>
    </table>
    
    <div class="container row mb-3">
        <div class="col-md-8 card">
            <h3 class="text-center m-4">Update information</h3>
            <form class="row" action="{{route('adminInformation',$data->UserID)}}" method="POST">
                @csrf
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">User Name</label>
                        <input type="text" class="form-control" name="name" value="{{$data->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">User Email</label>
                        <input type="text" class="form-control" name="email" value="{{$data->email}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">User Phone</label>
                        <input type="text" class="form-control" name="UserPhone" value="{{$data->UserPhone}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">User City</label>
                        <input type="text" class="form-control" name="UserCity" value="{{$data->UserCity}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">User State</label>
                        <input type="text" class="form-control" name="UserState" value="{{$data->UserState}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">User Zip</label>
                        <input type="text" class="form-control" name="UserZip" value="{{$data->UserZip}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">User Birthday</label>
                        <input type="date" class="form-control" name="UserBirthday" value="{{$data->UserBirthday}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">User Country</label>
                        <input type="text" class="form-control" name="UserCountry" value="{{$data->UserCountry}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">User Address</label>
                        <textarea class="form-control" name="UserAddress" style="height: 100px">{{$data->UserAddress}}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary form-control">Update</button>
                
            </form>
        </div>
        
    </div>
</div>
@stop