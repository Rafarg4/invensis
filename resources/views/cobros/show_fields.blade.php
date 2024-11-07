@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detalles del Cobros</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right" href="{{ route('cobros.index') }}">
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
                <!-- Cliente -->
                <div class="col-sm-4">
                    {!! Form::label('cliente', 'Cliente:') !!}
                    <p>{{ $cobro->cliente ? $cobro->cliente->nombre : 'Cliente no asignado' }}
                     {{ $cobro->cliente ? $cobro->cliente->apellido : 'Cliente no asignado' }}</p>
                </div>

                <!-- Cantidad de Cuotas -->
                <div class="col-sm-4">
                    {!! Form::label('usuario', 'Cobrador por:') !!}
                    <p>{{ $cobro->usuario }}</p>
                </div>

                <!-- Frecuencia de Pago -->
                <div class="col-sm-4">
                    {!! Form::label('frecuencia_pago', 'Fecha de cobro:') !!}
                    <p>{{ $cobro->fecha_cobro }}</p>
                </div>
                </div>

   <div class="row border p-3 mb-3" style="border: 1px solid black; border-radius: 5px;">
                <!-- Listado de Cuotas Generadas -->
                <div class="col-sm-12">
                   <center><h4>Detalles de cobro</h4></center>
                    <table class="table table-bordered mt-2">
                        <thead>
                            <tr>
                                <th>Número de Cuota</th>
                                <th>Monto cuota</th>
                                <th>Fecha de pago</th>
                                 <th>Monto de pago</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cobro_detalles as $detalle)
                                <tr>
                                    <td>{{ $detalle->nro_cuota }}</td>
                                    <td>{{ $detalle->monto_cuota }}</td>
                                    <td>{{ $detalle->fecha_pago }}</td>
                                    <td>{{ $detalle->monto_pagado }}</td>
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




