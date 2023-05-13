@extends('layouts.app')

@section('content')
<br>
@if(Auth::user()->hasRole('super_admin'))
@canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
<div class="container-fluid">
<div class="row">
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-info elevation-1"><i class="fa fas-solid fa-bicycle"></i></span>
<div class="info-box-content">
<span class="info-box-text">Inscripciones</span>
<span class="info-box-number">
<a href="{{ route('inscripcions.index') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a>
</span>
</div>

</div>
</div>
<div class="clearfix hidden-md-up"></div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-primary elevation-1"><i class="fa fas-regular fa-laptop-medical"></i></span>
<div class="info-box-content">
<span class="info-box-text">Seguros</span>
<span class="info-box-number"><a href="{{ route('seguros.index') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a></span>
</div>

</div>
</div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><i class="fa fas-light fa-book"></i></span>
<div class="info-box-content">
<span class="info-box-text">Documentos</span>
<span class="info-box-number"><a href="{{ route('documentos.index') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a></span>
</div>

</div>

</div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-trophy"></i></span>
<div class="info-box-content">
<span class="info-box-text">Ranking</span>
<span class="info-box-number"><a href="{{ route('rankings.index') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a></span>
</div>
</div>
</div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-warning elevation-1"><i class="fa fas-solid fa-bars"></i></span>
<div class="info-box-content">
<span class="info-box-text">Categorias</span>
<span class="info-box-number"><a href="{{ route('categorias.index') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a></span>
</div>
</div>
</div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-solid fa-chart-area"></i></span>
<div class="info-box-content">
<span class="info-box-text">Reportes</span>
<span class="info-box-number"><a href="{{ route('reporte_inscripcion') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a></span>
</div>
</div>
</div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-light elevation-1"><i class="fa fas-solid fa fa-chart-bar"></i></span>
<div class="info-box-content">
<span class="info-box-text">Grafico</span>
<span class="info-box-number"><a href="{{ route('graficos') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a></span>
</div>
</div>
</div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-black elevation-1"><i class="fa fas-light fa-user"></i></span>
<div class="info-box-content">
<span class="info-box-text">Usuarios</span>
<span class="info-box-number"><a href="{{ route('users.index') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a></span>
</div>
</div>
</div>
@endcan
@else
<!-- Home de usuarios -->


<div class="container-fluid">
<div class="row">
@if($inscripcions->isempty())	
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-danger elevation-1"><a href="{{ route('inscripcions.create') }}"  class="fa fas-solid fa-plus"></i></a></span>
<div class="info-box-content">
<span class="info-box-text">Paso 1 registrar inscripcion </span>
<span class="info-box-number">
<a href="{{ route('inscripcions.create') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a>
</span>
</div>
</div>
</div>
@else
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-success elevation-1"><i class="fa fas-solid fa-check"></i></span>
<div class="info-box-content">
<span class="info-box-text">Inscripcion creada!</span>
<span class="info-box-number">
<a href="{{ route('inscripcions.index') }}" class="small-box-footer">Mi inscripcion<i class="fas fa-arrow-circle-right"></i></a>
</span>
</div>
</div>
</div>
@endif
 @if($seguros->isempty())
<div class="clearfix hidden-md-up"></div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><a href="{{ route('seguros.create') }}" class="fa fas-solid fa-plus"></i></a></span>
<div class="info-box-content">
<span class="info-box-text">Paso 2 Registro de seguro</span>
<span class="info-box-number"><a href="{{ route('seguros.create') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a></span>
</div>
</div>
</div>
@else
<div class="clearfix hidden-md-up"></div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fa fas-solid fa-check"></i></span>
<div class="info-box-content">
<span class="info-box-text">Seguro creado!</span>
<span class="info-box-number"><a href="{{ route('seguros.index') }}" class="small-box-footer">Mi seguro <i class="fas fa-arrow-circle-right"></i></a></span>
</div>
</div>
</div>
@endif
@if($documentos->isempty())
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><a href="{{ route('documentos.create') }}" class="fa fas-solid fa-plus"></i></a></span>
<div class="info-box-content">
<span class="info-box-text">Paso 3 Subir documentos</span>
<span class="info-box-number"><a href="{{ route('documentos.create') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a></span>
</div>

</div>

</div>
@else
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fa fas-solid fa-check"></i></span>
<div class="info-box-content">
<span class="info-box-text">Documentos registrado!</span>
<span class="info-box-number"><a href="{{ route('documentos.index') }}" class="small-box-footer">Mis documentos <i class="fas fa-arrow-circle-right"></i></a></span>
</div>
</div>
</div>
@endif
@foreach($inscripcions as $inscripcions)
@if($inscripcions->estado=='Verificado')
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-id-card"></i></span>
<div class="info-box-content">
<span class="info-box-text">Licencia verificada</span>
<span class="info-box-number"><a href="{{ url('imprimir/licencias') }}" class="small-box-footer">Mi licencia <i class="fas fa-arrow-circle-right"></i></a></span>
</div>
</div>
</div>
@else
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-id-card"></i></span>
<div class="info-box-content">
<span class="info-box-text">En espera de aprobacion</span>
<span class="info-box-number"><a href="{{ url('imprimir/licencias') }}" class="small-box-footer">Mi licencia<i class="fas fa-arrow-circle-right"></i></a></span>
</div>
</div>
</div>
@endif
@endforeach
@endif
</div>
</div>
@endsection
