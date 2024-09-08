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
        <p>Importar Ranking Ruta</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('importar_mtb') }}"
       class="nav-link {{ Request::is('importar*') ? 'active' : '' }}">
       <i class="fa fas-solid fa-file-excel"></i> 
        <p>Importar Ranking MTB</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('rankings.index') }}"
       class="nav-link {{ Request::is('rankings*') ? 'active' : '' }}">
       <i class="fas fa-trophy"></i>
        <p>Rankings Ruta</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('rankingMTBs.index') }}"
       class="nav-link {{ Request::is('rankingMTBs*') ? 'active' : '' }}">
        <i class="fas fa-trophy"></i>
        <p>Ranking MTB</p>
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
<li class="nav-item">
    <a href="{{ route('modalidads.index') }}"
       class="nav-link {{ Request::is('modalidads*') ? 'active' : '' }}">
       <i class="fa fa-clone" aria-hidden="true"></i>
        <p>Modalidades</p>
    </a>
</li>
@endcan
<li class="nav-item">
    <a href="{{ route('inscripcions.index') }}"
       class="nav-link {{ Request::is('inscripcions*') ? 'active' : '' }}">
    <i class="fa fas-solid fa-bicycle"></i>
        <p>Licencias</p>
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
<li class="nav-item">
    <a href="{{ route('pagos.index') }}"
       class="nav-link {{ Request::is('pagos*') ? 'active' : '' }}">
       <i class="fa fas-solid fa-credit-card"></i>
        <p>Pagos</p>
    </a>
</li>

@canany(['create_inscripcion','edit_inscripcion','delete_inscripcion','admin_inscripcion'])
<li class="nav-item">
    <a href="{{ route('tarifas.index') }}"
       class="nav-link {{ Request::is('tarifas*') ? 'active' : '' }}">
       <i class="fas fa-solid fa-money-bill"></i>
        <p>Tarifas</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('eventos.index') }}"
       class="nav-link {{ Request::is('eventos*') ? 'active' : '' }}">
       <i class="fa fa-calendar" aria-hidden="true"></i>
        <p>Eventos</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('atletas.index') }}"
       class="nav-link {{ Request::is('atletas*') ? 'active' : '' }}">
       <i class="fa fa-users" aria-hidden="true"></i>
        <p>Atletas</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('bancos.index') }}"
       class="nav-link {{ Request::is('bancos*') ? 'active' : '' }}">
       <i class="fa fa-university" aria-hidden="true"></i>
        <p>Bancos</p>
    </a>
</li>
@endcan
@if(Auth::user()->hasRole('super_admin'))
 @else

<!--<li class="nav-item">
    <a href="{{ url('imprimir/licencias') }}"
       class="nav-link {{ Request::is('licencias*') ? 'active' : '' }}">
       <i class="fas fa-id-card"></i>
        <p>Mi Licencia</p>
    </a>
</li>-->
@endif
<li class="nav-item">
    <a href="{{ route('rankings.index') }}"
       class="nav-link {{ Request::is('rankings*') ? 'active' : '' }}">
       <i class="fas fa-trophy"></i>
        <p>Rankings Ruta</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('rankingMTBs.index') }}"
       class="nav-link {{ Request::is('rankingMTBs*') ? 'active' : '' }}">
        <i class="fas fa-trophy"></i>
        <p>Ranking MTB</p>
    </a>
</li>
@canany(['create_inscripcion','edit_inscripcion','delete_inscripcion','admin_inscripcion'])
<li class="nav-item">
    <a href=""
       class="nav-link ">
       <i class="fa fas-solid fa-file-excel"></i>
        <p>Importar</p>
        <i class="right fas fa-angle-left"></i>
    </a>
<ul class="nav nav-treeview">
<li class="nav-item">
    <a href="{{ route('importar.index') }}"
       class="nav-link {{ Request::is('importar*') }}">
       <i class="fa fas-solid fa-road"></i> 
        <p>Ranking Ruta </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url('importar_mtb') }}"
       class="nav-link {{ Request::is('importar_mtb*') }}">
       <i class="fa fas-solid fa-bicycle"></i>
        <p>Ranking MTB</p>
    </a>
</li>
</ul>
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
<p>Licencias</p>
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
<a href="{{ route('reporte_pago') }}" class="nav-link"
  class="nav-link {{ Request::is('reporte_pago*') ? 'active' : '' }}">
<i class="fa fas-solid fa-list"></i>
<p>Pagos</p>
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
    <a href="{{ url('backup') }}"
       class="nav-link {{ Request::is('bacukps*') ? 'active' : '' }}">
       <i class="fa fas-solid fa-database"></i>
        <p>Bacukps</p>
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



