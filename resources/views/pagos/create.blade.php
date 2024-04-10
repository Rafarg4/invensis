@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Crear Pago</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')
<div class="card">
  <div class="card-header">
   <strong>Datos bancarios</strong>
  </div>
  <div class="card-body">
                 @foreach($bancos as $b)
                        <p>Para realizar el pago de la inscripción al evento de ciclismo, puedes optar por transferencia bancaria a la siguiente cuenta:
                        <li>Nombre de la cuenta:<strong> {{$b->nombre_cuenta}}</strong></li> 
                        <li> CI/RUC:<strong> {{$b->ci_ruc}}</strong></li> 
                        <li> Banco:<strong> {{$b->banco}}</strong></li> </p>
                        @endforeach
                </div>
</div>
        <div class="card">

            {!! Form::open(['route' => 'pagos.store','enctype' => 'multipart/form-data']) !!}

            <div class="card-body">

                <div class="row">
                    @include('pagos.fields')
                    
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('pagos.index') }}" class="btn btn-default">Cancelar</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
