<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/5.15.3/css/all.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap4-toggle/3.6.1/bootstrap4-toggle.min.css') }}"/>

    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ asset('vendor/admin-lte/3.1.0/css/adminlte.min.css') }}"/>

    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css') }}"/>

    <link rel="stylesheet" href="{{ asset('vendor/select2/4.0.13/css/select2.min.css') }}"/>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css') }}"/>

    @stack('third_party_stylesheets')

    @stack('page_css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Main Header -->
    <nav class="main-header navbar navbar-expand navbar-white">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    {{-- <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
                         class="user-image img-circle elevation-2" alt="User Image"> --}}
                    <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header bg-primary">
                        {{-- <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
                             class="img-circle elevation-2"
                             alt="User Image"> --}}
                        <p>
                            {{ Auth::user()->name }}
                            <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                        <a href="#" class="btn btn-default btn-flat float-right"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sign out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Left side column. contains the logo and sidebar -->
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            @yield('content')
        </section>
    </div>

    <!-- Main Footer -->
{{--    <footer class="main-footer">--}}
{{--        <div class="float-right d-none d-sm-block">--}}
{{--            <b>Version</b> 3.1.0--}}
{{--        </div>--}}
{{--        <strong>--}}
{{--           Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.--}}
{{--        </strong>--}}
{{--        All rights reserved.--}}
{{--    </footer>--}}
</div>

<script src="{{ asset('vendor/jquery/3.5.1/jquery.min.js') }}"></script>

<script src="{{ asset('vendor/popper/1.16.1/dist/umd/popper.min.js') }}"></script>

<script src="{{ asset('vendor/bootstrap@4.5.3/dist/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('vendor/bs-custom-file-input/dist/bs-custom-file-input.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('vendor/admin-lte/3.1.0/js/adminlte.min.js') }}"></script>

<script src="{{ asset('vendor/moment.js/2.29.1/moment.min.js') }}"></script>

<script src="{{ asset('vendor/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js') }}"></script>

<script src="{{ asset('vendor/bootstrap4-toggle/3.6.1/bootstrap4-toggle.min.js') }}"></script>

<script src="{{ asset('vendor/select2/4.0.13/js/select2.min.js') }}"></script>

<script src="{{ asset('vendor/bootstrap-switch/1.3/bootstrapSwitch.min.js') }}"></script>

<script>
    $(function () {
        bsCustomFileInput.init();
    });

    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
</script>

@stack('third_party_scripts')

@stack('page_scripts')
</body>
</html>
