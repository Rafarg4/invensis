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
    <a href="{{ route('categorias.index') }}"
       class="nav-link {{ Request::is('categorias*') ? 'active' : '' }}">
       <i class="fa fas-solid fa-bars"></i>
        <p>Categorias</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('inscripcions.index') }}"
       class="nav-link {{ Request::is('inscripcions*') ? 'active' : '' }}">
    <i class="fa fas-solid fa-motorcycle"></i>
        <p>Inscripcions</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('documentos.index') }}"
       class="nav-link {{ Request::is('documentos*') ? 'active' : '' }}">
       <i class="fa fas-light fa-book"></i>
        <p>Documentos</p>
    </a>
</li>




<li class="nav-item">
    <a href="{{ route('rankings.index') }}"
       class="nav-link {{ Request::is('rankings*') ? 'active' : '' }}">
       <i class="fas fa-trophy"></i>
        <p>Rankings</p>
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
    <a href="{{ route('reportes') }}"
       class="nav-link {{ Request::is('reportes*') ? 'active' : '' }}">
       <i class="fas fa-solid fa-chart-area"></i>
        <p>Reportes</p>
    </a>
</li>

