<!-- Tipo Prestamo Field (Columna 1) -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_prestamo', 'Tipo de Préstamo:') !!}
    {!! Form::select('tipo_prestamo', ['Efectivo' => 'Efectivo', 'Electrodoméstico' => 'Electrodoméstico'], $prestamos->tipo_prestamo ?? null, ['class' => 'form-control', 'id' => 'tipo_prestamo', 'placeholder' => 'Seleccione el tipo de préstamo']) !!}
</div>

<!-- Monto Field (Columna 1) -->
<div class="form-group col-sm-6" id="monto-field">
    {!! Form::label('monto', 'Monto:') !!}
    {!! Form::text('monto', $prestamos->monto ?? null, ['class' => 'form-control', 'placeholder' => 'Ingrese el monto del préstamo', 'id' => 'monto']) !!}
</div>

<!-- Zona Field (Columna 1) -->
<div class="form-group col-sm-6">
    {!! Form::label('zona', 'Zona:') !!}
    {!! Form::select('zona', ['Zona 1' => 'Zona 1', 'Zona 2' => 'Zona 2'], $prestamos->zona ?? null, ['class' => 'form-control', 'placeholder' => 'Seleccione una zona']) !!}
</div>

<!-- Cliente Field (Columna 1) -->
<div class="form-group col-sm-6">
    {!! Form::label('id_cliente', 'Cliente:') !!}
    {!! Form::select('id_cliente', $clientes, $prestamos->id_cliente ?? null, ['class' => 'form-control', 'placeholder' => 'Seleccione un cliente']) !!}
</div>

<!-- Cantidad Cuota Field (Columna 1) -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad_cuota', 'Cantidad de Cuotas:') !!}
    {!! Form::number('cantidad_cuota', $prestamos->cantidad_cuota ?? null, ['class' => 'form-control', 'placeholder' => 'Ingrese la cantidad de cuotas', 'id' => 'cantidad_cuota']) !!}
</div>

<!-- Fecha de Inicio Field (Columna 2) -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_inicio', 'Fecha de Inicio:') !!}
    {!! Form::date('fecha_inicio', $prestamos->fecha_inicio ?? \Carbon\Carbon::now()->format('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<!-- Fecha Pago Field (Columna 2) -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_pago', 'Fecha de Pago:') !!}
    {!! Form::date('fecha_pago', $prestamos->fecha_pago ?? \Carbon\Carbon::now()->format('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<!-- Fecha de Vencimiento (Columna 2) -->
<div class="form-group col-sm-6" id="fecha-vencimiento">
    <label for="fecha_vencimiento">Fecha de Vencimiento:</label>
    <div id="fecha-container">
        @if(isset($prestamos->fecha_vencimiento))
            <input type="date" name="fecha_vencimiento" class="form-control mb-2" value="{{ $prestamos->fecha_vencimiento }}">
        @endif
    </div>
</div>

<!-- Dias Mora Field (Columna 2) -->
<div class="form-group col-sm-6">
    {!! Form::label('dias_mora', 'Días de Mora:') !!}
    {!! Form::number('dias_mora', $prestamos->dias_mora ?? 0, ['class' => 'form-control', 'readonly' => true, 'id' => 'dias_mora']) !!}
</div>

<!-- Interés Field (Columna 2) -->
<div class="form-group col-sm-6">
    {!! Form::label('interes', 'Interés por Mora (%):') !!}
    {!! Form::number('interes', $prestamos->interes ?? 0, ['class' => 'form-control', 'id' => 'interes']) !!}
</div>

<!-- Total Interés Acumulado (Columna 2) -->
<div class="form-group col-sm-6">
    {!! Form::label('monto_mora_acumulado', 'Total Interés Acumulado:') !!}
    {!! Form::text('monto_mora_acumulado', $prestamos->monto_mora_acumulado ?? 0, ['class' => 'form-control', 'readonly' => true, 'id' => 'monto_mora_acumulado']) !!}
</div>

<!-- Electrodoméstico Field (Solo se muestra si el tipo de préstamo es "Electrodoméstico") -->
<div class="form-group col-sm-6" id="electrodomestico-field" style="display: none;">
    {!! Form::label('electrodomestico', 'Electrodoméstico:') !!}
    {!! Form::select('electrodomestico', $electrodomesticos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un electrodoméstico']) !!}
</div>

<!-- Script para calcular fecha de vencimiento y controlar el campo "Monto" -->
<script>
    document.getElementById('cantidad_cuota').addEventListener('input', function() {
        var cuotas = this.value;
        var container = document.getElementById('fecha-container');
        container.innerHTML = ''; // Limpiar fechas anteriores

        for (var i = 0; i < cuotas; i++) {
            var input = document.createElement('input');
            input.type = 'date';
            input.name = 'fecha_vencimiento';
            input.className = 'form-control mb-2';
            container.appendChild(input);
        }
    });

    document.getElementById('tipo_prestamo').addEventListener('change', function() {
        var tipoPrestamo = this.value;
        var montoField = document.getElementById('monto-field');
        var electrodomesticoField = document.getElementById('electrodomestico-field');
        var montoInput = document.getElementById('monto');

        if (tipoPrestamo === 'Efectivo') {
            montoField.style.display = 'block';
            electrodomesticoField.style.display = 'none';
            montoInput.readOnly = false;
            montoInput.value = ''; 
        } else if (tipoPrestamo === 'Electrodoméstico') {
            montoField.style.display = 'block';
            electrodomesticoField.style.display = 'block';
            montoInput.readOnly = true; 
            montoInput.value = ''; 
        } else {
            electrodomesticoField.style.display = 'none';
        }
    });

    // Actualizar el monto cuando se selecciona un electrodoméstico
    document.getElementById('electrodomestico').addEventListener('change', function() {
        var electrodomesticoId = this.value;
        var electrodomesticoPrecios = {
            1: 1000,
            2: 2000,
            // Agregar más electrodomésticos según sea necesario
        };

        if (electrodomesticoPrecios[electrodomesticoId]) {
            document.getElementById('monto').value = electrodomesticoPrecios[electrodomesticoId].toLocaleString('de-DE');
        } else {
            document.getElementById('monto').value = '';
        }
    });

    // Formatear monto automáticamente con notación numérica
    document.getElementById('monto').addEventListener('input', function (e) {
        let value = e.target.value;
        
        // Remover cualquier caracter que no sea un número
        value = value.replace(/\D/g, '');

        // Formatear el valor con la notación de miles
        if (value) {
            value = parseInt(value).toLocaleString('de-DE');
        }

        // Establecer el valor formateado en el campo de entrada
        e.target.value = value;
    });
</script>










