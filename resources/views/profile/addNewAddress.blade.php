@extends('profile.main')
@section('function')
    @if ($message = Session::get('success_1'))
        <div class="alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger text-center">
            {{ $errorMessage }}
        </div>
    @endif
    <form action="{{route('updatefile')}}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-4">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" name="email" value="{{Auth::user()->email}}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Full Name</label>
            <div class="col-4">
                <input type="text" class="form-control" id="inputPassword" name="name" value="{{Auth::user()->name}}">
            </div>
        </div>
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Phone Number</label>
            <div class="col-4">
                <input type="number" class="form-control" name="UserPhone" value="{{Auth::user()->UserPhone}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-4">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="UserGender" class="custom-control-input" value="1" {{(Auth::user()->UserGender == "1")?"checked":""}}>
                    <label class="custom-control-label" for="customRadioInline1" name="UserGender" >Nam</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="UserGender" class="custom-control-input" value="0" {{(Auth::user()->UserGender == "0")?"checked":""}}>
                    <label class="custom-control-label" for="customRadioInline2" name="UserGender" >Nữ</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Birthday</label>
            <div class="col-4">
                <input type="date"  class="form-control-plaintext" id="staticEmail" name="UserBirthday" value="{{Auth::user()->UserBirthday}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="UserAddress" value="{{Auth::user()->UserAddress}}">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Country</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="UserCountry" value="{{Auth::user()->UserCountry}}">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity" name="UserCity" value="{{Auth::user()->UserCity}}">
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <input type="text" class="form-control" id="inputState" name="UserState" value="{{Auth::user()->UserState}}">
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip" name="UserZip" value="{{Auth::user()->UserZip}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label"></label>
            <div class="col-4">
                <button type="submit" class="btn btn-outline-success">Save</button>
            </div>
        </div>
    </form>
@stop