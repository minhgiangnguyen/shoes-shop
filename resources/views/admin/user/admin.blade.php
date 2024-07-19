@extends('admin.layouts.main')
@section('content')
<div class="container-fluid card">
    <h1 class="text-center mt-3">List Admin</h1>
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
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">View more information</th>
            </tr>
        </thead>
        <tbody>
            <form action="{{route('adminDelete')}}" method="POST">
                @csrf
                @foreach($data as $val)
                    @if($val->role == 1)
                        <tr class="text-center">
                            <th><input type="checkbox" name="ids[{{$val->UserID}}]" value="{{$val->UserID}}"></th>
                            <th scope="row">{{$val->UserID}}</th>
                            <td>{{$val->name}}</td>
                            <td>{{$val->email}}</td>
                            <td><a href="{{route('adminInformation',$val->UserID)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a></td>
                        </tr>
                    @endif
                @endforeach
                <h2>
                    <input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger" value="Delete Seleted">
                    <a href="{{route('adminManagement')}}" class="btn btn-primary">List all</a>
                    <a href="{{route('addNewAdmin')}}" class="btn btn-success">Add new admin</a>
                </h2>
            </form>
        </tbody>
    </table>
</div>
@stop