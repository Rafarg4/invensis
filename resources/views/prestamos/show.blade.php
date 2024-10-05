@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detalles del Prestamo</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('prestamos.index') }}">
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @php
                        // Formatear el monto a notación numérica antes de mostrarlo
                        $prestamos->monto = number_format($prestamos->monto, 0, ',', '.');
                    @endphp
                    @include('prestamos.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection

