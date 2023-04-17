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
@if(Auth::user()->hasRole('admin'))
@canany(['admin'])
<li class="nav-item">
    <a href="{{ route('importar.index') }}"
       class="nav-link {{ Request::is('importar*') ? 'active' : '' }}">
       <i class="fa fas-solid fa-file-excel"></i> 
        <p>Importar Ranking</p>
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
    <a href="" 
       class="nav-link " onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <i class="fas fa-sign-out-alt"></i>
        <p>Salir</p>

    </a>
</li>
@endcan
@else
@canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
<li class="nav-item">
    <a href="{{ route('categorias.index') }}"
       class="nav-link {{ Request::is('categorias*') ? 'active' : '' }}">
       <i class="fa fas-solid fa-bars"></i>
        <p>Categorias</p>
    </a>
</li>
@endcan
<li class="nav-item">
    <a href="{{ route('inscripcions.index') }}"
       class="nav-link {{ Request::is('inscripcions*') ? 'active' : '' }}">
    <i class="fa fas-solid fa-bicycle"></i>
        <p>Inscripciones</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('seguros.index') }}"
       class="nav-link {{ Request::is('seguros*') ? 'active' : '' }}">
       <i class="fa fas-regular fa-laptop-medical"></i>
        <p>Seguros</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('documentos.index') }}"
       class="nav-link {{ Request::is('documentos*') ? 'active' : '' }}">
       <i class="fa fas-light fa-book"></i>
        <p>Documentos</p>
    </a>
</li>
@if(Auth::user()->hasRole('super_admin'))
 @else
            <li class="nav-item">
    <a href="{{ url('imprimir/licencias') }}"
       class="nav-link {{ Request::is('licencias*') ? 'active' : '' }}">
       <i class="fas fa-id-card"></i>
        <p>Mi Licencia</p>
    </a>
</li>
@endif
<li class="nav-item">
    <a href="{{ route('rankings.index') }}"
       class="nav-link {{ Request::is('rankings*') ? 'active' : '' }}">
       <i class="fas fa-trophy"></i>
        <p>Rankings</p>
    </a>
</li>
@canany(['create_inscripcion','edit_inscripcion','delete_inscripcion','admin_inscripcion'])
<li class="nav-item">
    <a href="{{ route('importar.index') }}"
       class="nav-link {{ Request::is('importar*') ? 'active' : '' }}">
       <i class="fa fas-solid fa-file-excel"></i> 
        <p>Importar Ranking</p>
    </a>
</li>
<li class="nav-item">
    <a href=""
       class="nav-link ">
       <i class="fas fa-solid fa-chart-area"></i>
        <p>Reportes</p>
        <i class="right fas fa-angle-left"></i>
    </a>
<ul class="nav nav-treeview">
<li class="nav-item">
<a href="{{ route('reporte_inscripcion') }}" class="nav-link"
  class="nav-link {{ Request::is('reporte_inscripcion*') ? 'active' : '' }}">
<i class="fa fas-solid fa-list"></i>
<p>Inscripciones</p>
</a>
</li>
<li class="nav-item">
<a href="{{ route('reporte_seguro') }}" class="nav-link"
  class="nav-link {{ Request::is('reporte_seguro*') ? 'active' : '' }}">
<i class="fa fas-solid fa-list"></i>
<p>Seguros</p>
</a>
</li>
<li class="nav-item">
<a href="{{ route('reporte_ranking') }}" class="nav-link"
class="nav-link {{ Request::is('reporte_ranking*') ? 'active' : '' }}">
<i class="fa fas-solid fa-list"></i>
<p>Rankings</p>
</a>
</li>
</ul>
</li>
<li class="nav-item">
    <a href="{{ route('graficos') }}"
       class="nav-link {{ Request::is('graficos*') ? 'active' : '' }}">
       <i class="fa fas-solid fa fa-chart-bar"></i>
        <p>Graficos</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('users.index') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
       <i class="fa fas-light fa-user"></i>
        <p>Usuarios</p>
    </a>
</li>
@endcan
<li class="nav-item">
    <a href="" 
       class="nav-link " onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <i class="fas fa-sign-out-alt"></i>
        <p>Salir</p>

    </a>
</li>
@endif