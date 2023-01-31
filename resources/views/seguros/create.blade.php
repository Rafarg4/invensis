@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Crear seguro</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
  <div class="card-header">
   ATENCIÓN, CUANDO COMPLETE TODO EL FORMULARIO DEL ASEGURADO, EL SIGUIENTE PASO ES:
  </div>
  <div class="card-body">
    
      <footer class="blockquote-footer">1 DESCARGARLO</footer>
    </blockquote>
    <footer class="blockquote-footer">2 IMPRIMIRLO Y FIRMARLO</footer>
    </blockquote>
    <footer class="blockquote-footer">3 ESCANEAR EL DOCUMENTO DEL ASEGURADO FIRMADO Y CARGALOS EN EL APARTADO DE DOCUMENTOS</footer>
    
  </div>
</div>
        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'seguros.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('seguros.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('seguros.index') }}" class="btn btn-default">Cancelar</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
