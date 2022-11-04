<aside class="main-sidebar sidebar-blue-light elevation-4">
    <a href="{{ url('/home') }}" class="brand-link text-center">
        <div>
            <img src="{{ asset('img/logo_gi.png') }}" alt="{{ config('app.name') }} Logo"
                class="brand-image img-circle elevation-3">
            <span class="brand-text font-weight-bold">{{ config('app.name') }}</span>
        </div>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>
</aside>
