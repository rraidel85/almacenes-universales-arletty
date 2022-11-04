<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home*') ? 'active' : '' }}">
        <i class="fa fa-home" aria-hidden="true"></i>
        <p>Inicio</p>
    </a>
</li>

@can('ver-rol')
<li class="nav-item">
    <a href="{{ route('roles.index') }}" class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
        <i class="fa fa-unlock" aria-hidden="true"></i>
        <p>Roles</p>
    </a>
</li>
@endcan
@can('ver-usuario')
<li class="nav-item">
    <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <i class="fa fa-users" aria-hidden="true"></i>
        <p>Usuarios</p>
    </a>
</li>
@endcan






<li class="nav-item">
    <a href="{{ route('proveedors.index') }}"
       class="nav-link {{ Request::is('proveedors*') ? 'active' : '' }}">
       <i class="fa fa-truck" aria-hidden="true"></i>
        <p>Proveedores</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('recepcionCiegas.index') }}"
       class="nav-link {{ Request::is('recepcionCiegas*') ? 'active' : '' }}">
       <i class="fa fa-eye-slash" aria-hidden= "true">  </i>
        <p>Recepcion Ciega</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('unidadMedidas.index') }}"
       class="nav-link {{ Request::is('unidadMedidas*') ? 'active' : '' }}">
       <i class="fa fa-edit" aria-hidden="true"></i>
        <p>Unidad  Medidas</p>
    </a>
</li>



<li class="nav-item">
    <a href="{{ route('productos.index') }}"
       class="nav-link {{ Request::is('productos*') ? 'active' : '' }}">
       <i class="fa fa-cube" aria-hidden= "true">  </i>
        <p>Productos</p>
    </a>
</li>



<li class="nav-item">
    <a href="{{ route('almacens.index') }}"
       class="nav-link {{ Request::is('almacens*') ? 'active' : '' }}">
       <i class="fa fa-building" aria-hidden= "true">  </i>
        <p>Almacenes</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('areas.index') }}"
       class="nav-link {{ Request::is('areas*') ? 'active' : '' }}">
       <i class="fa fa-sitemap" aria-hidden= "true">  </i>
        <p>Areas</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('stockProductos.index') }}"
       class="nav-link {{ Request::is('stockProductos*') ? 'active' : '' }}">
       <i class="fa fa-cubes" aria-hidden= "true">  </i>
        <p>Stock Productos</p>
    </a>
</li>



<li class="nav-item">
    <a href="{{ route('clientes.index') }}"
       class="nav-link {{ Request::is('clientes*') ? 'active' : '' }}">
       <i class="fa fa-male" aria-hidden= "true">  </i>
        <p>Clientes</p>
    </a>
</li>





<li class="nav-item">
    <a href="{{ route('ofertas.index') }}"
       class="nav-link {{ Request::is('ofertas*') ? 'active' : '' }}">
       <i class="fa fa-tags" aria-hidden= "true">  </i>
        <p>Ofertas</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('facturas.index') }}"
       class="nav-link {{ Request::is('facturas*') ? 'active' : '' }}">
       <i class="fa fa-credit-card" aria-hidden= "true">  </i>
        <p>Facturas</p>
    </a>
</li>


