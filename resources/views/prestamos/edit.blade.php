@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Editar Préstamo</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('adminlte-templates::common.errors')

        <div class="card">
            {!! Form::model($prestamo, ['route' => ['prestamos.update', $prestamo->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('prestamos.fields') <!-- Aquí se incluyen los campos existentes y las cuotas -->
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('prestamos.index') }}" class="btn btn-default">Cancelar</a>
            </div>

            {!! Form::close() !!}
        </div>
    </div>

    <!-- Script para formatear "Monto" y "Monto de la Cuota" automáticamente -->
    <script>
        const montoInput = document.getElementById('monto');
        const montoCuotaInput = document.getElementById('monto_cuota');

        function formatNumber(value) {
            value = value.replace(/\D/g, '');  // Remover cualquier carácter que no sea número
            if (value) {
                value = parseInt(value).toLocaleString('de-DE');  // Formatear el número con notación alemana
            }
            return value;
        }

        function applyNumberFormat(input) {
            input.addEventListener('input', function (e) {
                let value = e.target.value;
                e.target.value = formatNumber(value);
            });
            // Formatear cuando se cargan los datos en el campo
            input.value = formatNumber(input.value);
        }

        applyNumberFormat(montoInput);          // Aplicar formato al campo "Monto"
        applyNumberFormat(montoCuotaInput);     // Aplicar formato al campo "Monto de la Cuota"
    </script>
@endsection

