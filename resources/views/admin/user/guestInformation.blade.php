@extends('admin.layouts.main')
@section('content')
<div class="container-fluid">
    <h2 class="text-center">{{$data->name}} - User Id: {{$data->UserID}}</h2>
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
                <a href="{{route('guestManagement')}}" class="btn btn-success">Back to list</a>
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
</div>
@stop