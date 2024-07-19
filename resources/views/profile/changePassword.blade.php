@extends('profile.main')
@section('function')
    @if ($message = Session::get('success_2'))
        <div class="alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger text-center">
            {{ $error_message }}
        </div>
    @endif
    <form action="{{route('changepassword')}}" method="post">
        @csrf
        <div class="form-group row" style="position: relative">
            <label for="inputPassword" class="col-sm-2 col-form-label">Old password</label>
            <div class="col-4">
                <input type="password" class="form-control" placeholder="******" name="password_old">
                <a style="position: absolute; top: 20%; right: 25px; color: #333" href="javascript:;void(0)"><i class="fa fa-eye"></i></a>
            </div>
            @error('password_old')
                <span style="color: red; width: 400px;">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group row" style="position: relative">
            <label for="inputPassword" class="col-sm-2 col-form-label">A new password</label>
            <div class="col-4">
                <input type="password" class="form-control" placeholder="******" name="password">
                <a style="position: absolute; top: 20%; right: 25px; color: #333" href="javascript:;void(0)"><i class="fa fa-eye"></i></a>
            </div>
            @error('password')
                <span style="color: red; width: 400px;">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group row" style="position: relative">
            <label for="inputPassword" class="col-sm-2 col-form-label">Enter a new password</label>
            <div class="col-4">
                <input type="password" class="form-control" placeholder="******" name="password_comfirm">
                <a style="position: absolute; top: 20%; right: 25px; color: #333" href="javascript:;void(0)"><i class="fa fa-eye"></i></a> 
            </div>
            @error('password_comfirm')
                <span style="color: red; width: 400px;">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label"></label>
            <div class="col-4">
                <button type="submit" class="btn btn-outline-success">Save</button>
            </div>
        </div>
    </form>
@stop