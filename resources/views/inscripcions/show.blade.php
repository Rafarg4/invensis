@extends('layouts.app')

@section('content')
<style type="text/css">
    @media print {
     header {display: none !important;}
     footer {display: none !important;}
      nav {display: none !important;}
      ul  {display: none !important;}
     .noimprimir {display: none !important;}
     body {background: #fff !important;}     
}
</style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detalles</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('inscripcions.index') }}">
                        Volver
                    </a>
                    @canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
                    <div class="col-sm-12">
                    <a class="btn btn-default float-right"
                      button type="button" class="btn btn-primary"  onclick="javascript:window.print()">  <i class="fas fa-file-pdf"></i> Descargar</button>
                    </a>
            </div>
            @endcan
        </div>
    </section>


<div class="content px-3">
  <div class="row">
<div class="col-12">
<div class="card">
<div class="card-header d-flex p-0">
<ul class="nav nav-pills justify-content-start p-2">
<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab"><i class="fa fas-solid fa-bicycle"></i> Incrcipciones</a></li>
<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab"><i class="fa fas-light fa-book"></i> Documento</a></li>
<li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab"><i class="fa fas-regular fa-laptop-medical"></i> Seguro</a></li>
<li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab"><i class="fas fa-id-card"></i>  Licencia</a></li>
</ul>
</div>

<div class="card-body">
    @include('inscripcions.show_fields')
            <div class="card-body">
                </div>

            </div>
            {!! Form::close() !!}
  </div>
</div>
@endsection
