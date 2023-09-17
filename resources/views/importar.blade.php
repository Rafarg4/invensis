@extends('layouts.app')

@section('content')
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
     <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Importar Ranking de ruta</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
    	 @include('flash::message')
        @include('adminlte-templates::common.errors')
 <div class="card">
  <div class="card-header">
    Selecione un archivo para importar
  </div>
  <div class="card-body">
    {!! Form::open(['route' => 'importar.store','enctype' => 'multipart/form-data']) !!}
            <input type="file" name="file" required>
            <button class="btn btn-primary" type="submit" >Importar</button>
            <div class="card-body">
                </div>

            </div>
            {!! Form::close() !!}
  </div>
</div>
@endsection