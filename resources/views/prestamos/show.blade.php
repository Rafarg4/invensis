@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detalles del Préstamo</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right" href="{{ route('prestamos.index') }}">
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </section>

                <div class="content px-3">
                    <div class="card">
                        <div class="card-body">
                            <!-- Información Principal del Préstamo -->
            <div class="row border p-3 mb-3" style="border: 1px solid black; border-radius: 5px;">
                <!-- Número de Préstamo -->
                <div class="col-sm-4">
                    {!! Form::label('numero_prestamo', 'Número de Préstamo:') !!}
                    <p>{{ $prestamo->numero_prestamo }}</p>
                </div>

                <!-- Tipo de Préstamo -->
                <div class="col-sm-4">
                    {!! Form::label('tipo_prestamo', 'Tipo de Préstamo:') !!}
                    <p>{{ $prestamo->tipo_prestamo }}</p>
                </div>

                <!-- Monto -->
                <div class="col-sm-4">
                    {!! Form::label('monto', 'Monto:') !!}
                    <p>{{ number_format($prestamo->monto, 0, ',', '.') }}</p>
                </div>

                <!-- Zona -->
                <div class="col-sm-4">
                    {!! Form::label('zona', 'Zona:') !!}
                    <p>{{ $prestamo->zona }}</p>
                </div>

                <!-- Cliente -->
                <div class="col-sm-4">
                    {!! Form::label('cliente', 'Cliente:') !!}
                    <p>{{ $prestamo->cliente ? $prestamo->cliente->nombre : 'Cliente no asignado' }}
                     {{ $prestamo->cliente ? $prestamo->cliente->apellido : 'Cliente no asignado' }}</p>
                </div>

                <!-- Cantidad de Cuotas -->
                <div class="col-sm-4">
                    {!! Form::label('cantidad_cuota', 'Cantidad de Cuotas:') !!}
                    <p>{{ $prestamo->cantidad_cuota }}</p>
                </div>

                <!-- Frecuencia de Pago -->
                <div class="col-sm-4">
                    {!! Form::label('frecuencia_pago', 'Frecuencia de Pago:') !!}
                    <p>{{ $prestamo->frecuencia_pago }}</p>
                </div>

                <!-- Monto de la Cuota -->
                <div class="col-sm-4">
                    {!! Form::label('monto_cuota', 'Monto de la Cuota:') !!}
                    <p>{{ number_format($prestamo->monto_cuota, 0, ',', '.') }}</p>
                </div>
               @if(!empty($prestamo->id_electrodomestico))
                    <div class="col-sm-4">
                        {!! Form::label('electrodomestico', 'Electrodoméstico:') !!}
                        <p>{{ $prestamo->electrodomestico ? $prestamo->electrodomestico->nombre : 'Cliente no asignado' }}</p>
                    </div>
                @endif
                </div>

   <div class="row border p-3 mb-3" style="border: 1px solid black; border-radius: 5px;">
                <!-- Listado de Cuotas Generadas -->
                <div class="col-sm-12">
                   <center><h4>Detalles de cuotas</h4></center>
                    <table class="table table-bordered mt-2">
                        <thead>
                            <tr>
                                <th>Número de Cuota</th>
                                <th>Fecha de Vencimiento</th>
                                <th>Monto</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prestamo->saldos as $cuota)
                                <tr>
                                    <td>{{ $cuota->nro_cuota }}</td>
                                    <td>{{ $cuota->fecha_cuota }}</td>
                                    <td>{{ number_format($cuota->monto_cuota, 0, ',', '.') }}</td>
                                    <td>{{ $cuota->estado == 'pendiente' ? 'Pendiente' : 'Pagada' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



