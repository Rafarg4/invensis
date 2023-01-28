@extends('layouts.app')

@section('content')
<br>
<div class="container-fluid">
<div class="row">
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-info elevation-1"> <i class="fa fas-solid fa-motorcycle"></i></span>
<div class="info-box-content">
<span class="info-box-text">Crear Inscripcion</span>
<span class="info-box-number">
<a href="{{ route('inscripcions.create') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a>
</span>
</div>

</div>
</div>
<div class="clearfix hidden-md-up"></div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-primary elevation-1"><i class="fa fas-regular fa-laptop-medical"></i></span>
<div class="info-box-content">
<span class="info-box-text">Registro de seguro</span>
<span class="info-box-number"><a href="{{ route('seguros.create') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a></span>
</div>

</div>
</div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><i class="fa fas-light fa-book"></i></span>
<div class="info-box-content">
<span class="info-box-text">Subir documentos</span>
<span class="info-box-number"><a href="{{ route('documentos.create') }}" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a></span>
</div>

</div>

</div>
<div class="clearfix hidden-md-up"></div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fa fas-regular fa-clipboard"></i></span>
<div class="info-box-content">
<span class="info-box-text">Mi licencia</span>
<span class="info-box-number"><a href="" class="small-box-footer">Ir a <i class="fas fa-arrow-circle-right"></i></a></span>
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

</div>

</div>

@endsection
