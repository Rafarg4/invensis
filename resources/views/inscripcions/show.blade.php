@extends('layouts.app')

@section('content')
<style type="text/css">
    @media print {
     header {display: none !important;}
     footer {display: none !important;}
      nav {display: none !important;}
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
<div class="card">
<nav class="card card-primary card-outline card-outline-tabs">
<div class="card-header p-0 border-bottom-0">
<ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true"><i class="fa fas-solid fa-bicycle"></i> Inscripcion</a>
</li>
<li class="nav-item">
<a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false"><i class="fa fas-light fa-book"></i> Documento</a>
</li>
<li class="nav-item">
<a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false"> <i class="fa fas-regular fa-laptop-medical"></i> Seguro</a>
</li>
<li class="nav-item">
<a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false"><i class="fas fa-id-card"></i> Licencia</a>
</li>
</ul>
</div>
</nav>
<div class="card-body">
    @include('inscripcions.show_fields')
            <div class="card-body">
                </div>

            </div>
            {!! Form::close() !!}
  </div>
</div>
@endsection
