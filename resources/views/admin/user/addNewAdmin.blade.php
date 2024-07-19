@extends('admin.layouts.main')
@section('content')
    <div class="wrapper ">
        <div class="container card">
            @if(Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success')}}
            </div>
            @endif
            <div class="row justify-content-around">
                <form action="{{ route('addNewAdmin') }}" method="post" class="col-md-6 bg-light p-3 my-3" >
                    @csrf
                    <h3 class="text-center py-3">ADD NEW ADMIN</h3>
                    <a href="{{route('adminManagement')}}" class="btn btn-success">Back to list</a>
                    <input type="hidden" name="role" value="1">
                    <div class="form-group my-3">
                        <label for="lastName">Full Name<span style="color:red">(*)</span></label>
                        <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}">
                        <span style="color:red">@error('name'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group my-3">
                        <label for="email">Email<span style="color:red">(*)</span></label>
                        <input class="form-control" type="email" name="email" id="email" value="{{old('email')}}">
                        <span style="color:red">@error('email'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group my-3">
                        <label for="password">Password<span style="color:red">(*)</span></label>
                        <input class="form-control" type="password" name="password" id="password" value="{{old('password')}}">
                        <span style="color:red">@error('password'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group my-3">
                        <label for="confirm-password">Enter the password<span style="color:red">(*)</span></label>
                        <input class="form-control" type="password" name="confirm-password" id="confirm-password" value="{{old('confirm-password')}}">
                        <span style="color:red">@error('confirm-password'){{ $message }}@enderror</span>
                    </div>
                    <div class="d-grid my-3">
                        <input class="btn-primary btn btn-block" type="submit" value="Addnew">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@stop