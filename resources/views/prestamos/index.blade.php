@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Préstamos</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right" href="{{ route('prestamos.create') }}">
                        Nuevo
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
           <div class="table-responsive" style="padding:15px;font-size: 12px;">
    <table class="table" id="table">
        <thead>
            <tr>
                            <th>Número de Préstamo</th>
                            <th>Cliente</th>
                            <th>Monto</th>
                            <th>Fecha de Inicio</th>
                            <th>Cantidad Cuotas</th>
                            <th>Monto Cuota</th>
                            <th>Frecuencia de Pago</th>
                            <th>Zona</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prestamos as $prestamo)
                            <tr>
                                <td>{{ $prestamo->numero_prestamo }}</td>
                                <td>{{ $prestamo->cliente->nombre ?? 'Sin asignar' }} {{ $prestamo->cliente->apellido ?? 'Sin asignar' }}</td>
                                <td>{{ number_format($prestamo->monto, 0, ',', '.') }}</td>
                                <td>{{ $prestamo->fecha_inicio }}</td>
                                <td>{{ $prestamo->cantidad_cuota }}</td>
                                <td>{{ number_format($prestamo->monto_cuota, 0, ',', '.') }}</td>
                                <td>{{ $prestamo->frecuencia_pago }}</td>
                                <td>{{ $prestamo->zona }}</td>
                                <td width="120">
                                    {!! Form::open(['route' => ['prestamos.destroy', $prestamo->id], 'method' => 'delete']) !!}
                                    <div class='btn-group'>
                                        <a href="{{ route('prestamos.show', [$prestamo->id]) }}" class='btn btn-default btn-xs'>
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="{{ route('prestamos.downloadPdf', [$prestamo->id]) }}" class='btn btn-default btn-xs'>
                                            <i class="fas fa-file-pdf"></i>
                                        </a>
                                        <a href="{{ route('prestamos.edit', [$prestamo->id]) }}" class='btn btn-default btn-xs'>
                                            <i class="far fa-edit"></i>
                                        </a>
                                        {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-xs',
                                            'onclick' => "return confirm('¿Está seguro?')"
                                        ]) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="card-footer clearfix">
                    <div class="float-right">
                        {{-- Agregar paginación si es necesario --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




