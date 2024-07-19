@extends('admin.layouts.main')
@section('content')
<div class="container-fluid card">
    <h1 class="text-center mt-3">List User</h1>
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
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Order Count</th>
                <th scope="col">View more information</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $val)
                @if($val->role != 1)
                    <tr class="text-center">
                        <th scope="row">{{$val->UserID}}</th>
                        <td>{{$val->name}}</td>
                        <td>{{$val->email}}</td>
                        <td>{{$val->UserPhone}}</td>
                        <td>{{$val->orders->count()}}</td>
                        <td><a href="{{route('guestInformation',$val->UserID)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a></td>
                    </tr>
                @endif
            @endforeach
            <h2>
                <a href="{{route('guestManagement')}}" class="btn btn-primary">List all</a>
            </h2>
        </tbody>
    </table>
    {{$data->links('pagination::bootstrap-5')}}
</div>
@stop