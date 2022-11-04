@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="d-flex justify-content-center align-items-center w-100" style="background-image: url('{{{ asset('img/home.jpeg') }}}'); height: 100vh; background-repeat: no-repeat; background-position: center; background-size: cover; color: #fff; opacity: .7;">
            <h1>Bienvenido {{{ Auth::user()->name }}}</h1>
        </div>
    </div>
</div>
@endsection
