<div class="input-group" data-widget="sidebar-search">
<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
<div class="input-group-append">
<button class="btn btn-sidebar">
<i class="fas fa-search fa-fw"></i>
</button>
</div>
</div>
<br>
<li class="nav-item">
    <a href="{{ route('home') }}"
       class="nav-link {{ Request::is('home*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('clientes.index') }}"
       class="nav-link {{ Request::is('clientes*') ? 'active' : '' }}">
       <i class="fa fa-users" aria-hidden="true"></i>
        <p>Clientes</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('cierres.index') }}"
       class="nav-link {{ Request::is('cierres*') ? 'active' : '' }}">
       <i class="fa fa-calculator" aria-hidden="true"></i>
        <p>Cierres</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('cobros.index') }}"
       class="nav-link {{ Request::is('cobros*') ? 'active' : '' }}">
       <i class="fa fa-credit-card" aria-hidden="true"></i>
        <p>Cobros</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('ver_reporte_cobro') }}"
       class="nav-link {{ Request::is('repore_cobros*') ? 'active' : '' }}">
       <i class="fa fa-bars" aria-hidden="true"></i>
        <p>Repore de cobros</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('electrodomesticos.index') }}"
       class="nav-link {{ Request::is('electrodomesticos*') ? 'active' : '' }}">
       <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
        <p>Electrodomesticos</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('prestamos.index') }}"
       class="nav-link {{ Request::is('prestamos*') ? 'active' : '' }}">
       <i class="fa fa-bars" aria-hidden="true"></i>
        <p>Prestamos</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('users.index') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
       <i class="fa fas-light fa-user"></i>
        <p>Usuarios</p>
    </a>
</li>
<li class="nav-item">
    <a href="" 
       class="nav-link " onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <i class="fas fa-sign-out-alt"></i>
        <p>Salir</p>

    </a>
</li>



