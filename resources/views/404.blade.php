@extends('layout.main')

@section('content')
<section class="text-center " style="margin-top:100px">
    <img src="{{asset('assets/img/errors/404.jpg')}}" alt="">
    <h1>PAGE NOT FOUND</h1>
    <p>return to the <a href="{{route('home.index')}}">Homepage</a> and start again.</p>

</section>
@stop