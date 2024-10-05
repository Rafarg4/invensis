@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Prestamos</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('prestamos.create') }}">
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
                @include('prestamos.table', ['prestamos' => $prestamos->map(function($prestamo) {
                    // Convertimos el monto y total_interes a tipo float antes de formatearlos
                    $prestamo->monto = number_format((float) $prestamo->monto, 0, ',', '.');
                    $prestamo->total_interes = number_format((float) $prestamo->total_interes, 2, ',', '.');
                    return $prestamo;
                })])

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



