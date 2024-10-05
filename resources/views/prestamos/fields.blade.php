<!-- Zona Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zona', 'Zona:') !!}
    {!! Form::select('zona', ['Zona 1' => 'Zona 1', 'Zona 2' => 'Zona 2'], $prestamos->zona ?? null, ['class' => 'form-control', 'placeholder' => 'Seleccione una zona']) !!}
</div>

<!-- Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_cliente', 'Cliente:') !!}
    {!! Form::select('id_cliente', $clientes, $prestamos->id_cliente ?? null, ['class' => 'form-control', 'placeholder' => 'Seleccione un cliente']) !!}
</div>

<!-- Monto Field -->
<div class="form-group col-sm-6" id="monto-field">
    {!! Form::label('monto', 'Monto:') !!}
    {!! Form::text('monto', $prestamos->monto ?? null, ['class' => 'form-control', 'placeholder' => 'Ingrese el monto del préstamo', 'id' => 'monto']) !!}
</div>

<!-- Fecha de Inicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_inicio', 'Fecha de Inicio:') !!}
    {!! Form::date('fecha_inicio', $prestamos->fecha_inicio ?? \Carbon\Carbon::now()->format('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<!-- Fecha Pago Field (Fecha del último cobro) -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_pago', 'Fecha de Pago:') !!}
    {!! Form::date('fecha_pago', $prestamos->fecha_pago ?? \Carbon\Carbon::now()->format('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<!-- Cantidad Cuota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad_cuota', 'Cantidad de Cuotas:') !!}
    {!! Form::number('cantidad_cuota', $prestamos->cantidad_cuota ?? null, ['class' => 'form-control', 'placeholder' => 'Ingrese la cantidad de cuotas', 'id' => 'cantidad_cuota']) !!}
</div>

<!-- Fechas de Vencimiento (Generadas dinámicamente) -->
<div class="form-group col-sm-12" id="fechas-vencimiento">
    <label for="fechas_vencimiento">Fechas de Vencimiento:</label>
    <div id="fechas-container">
        @if(isset($prestamos->fechas_vencimiento))
            @foreach(json_decode($prestamos->fechas_vencimiento, true) as $fecha)
                <input type="date" name="fechas_vencimiento[]" class="form-control mb-2" value="{{ $fecha }}">
            @endforeach
        @endif
    </div>
</div>

<!-- Tipo Prestamo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_prestamo', 'Tipo de Préstamo:') !!}
    {!! Form::select('tipo_prestamo', ['Efectivo' => 'Efectivo', 'Electrodoméstico' => 'Electrodoméstico'], $prestamos->tipo_prestamo ?? null, ['class' => 'form-control', 'id' => 'tipo_prestamo', 'placeholder' => 'Seleccione el tipo de préstamo']) !!}
</div>

<!-- Dias Mora Field (Auto-calculated) -->
<div class="form-group col-sm-6">
    {!! Form::label('dias_mora', 'Días de Mora:') !!}
    {!! Form::number('dias_mora', $prestamos->dias_mora ?? 0, ['class' => 'form-control', 'readonly' => true, 'id' => 'dias_mora']) !!}
</div>

<!-- Interés por Mora (%) -->
<div class="form-group col-sm-6">
    {!! Form::label('interes', 'Interés por Mora (%):') !!}
    {!! Form::number('interes', $prestamos->interes ?? 0, ['class' => 'form-control', 'id' => 'interes']) !!}
</div>

<!-- Total Interés Acumulado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_interes', 'Total Interés Acumulado:') !!}
    {!! Form::text('total_interes', null, ['class' => 'form-control', 'readonly' => true, 'id' => 'total_interes']) !!}
</div>

<!-- Script para calcular fechas de vencimiento, monto y el interés acumulado -->
<script>
    document.getElementById('cantidad_cuota').addEventListener('input', function() {
        var cuotas = this.value;
        var container = document.getElementById('fechas-container');
        container.innerHTML = ''; // Limpiar fechas anteriores

        for (var i = 0; i < cuotas; i++) {
            var input = document.createElement('input');
            input.type = 'date';
            input.name = 'fechas_vencimiento[]';
            input.className = 'form-control mb-2';
            container.appendChild(input);
        }
    });

    document.getElementById('tipo_prestamo').addEventListener('change', function() {
        var tipoPrestamo = this.value;
        var montoField = document.getElementById('monto-field');
        var montoInput = document.getElementById('monto');

        if (tipoPrestamo === 'Efectivo') {
            montoField.style.display = 'block';
            montoInput.readOnly = false;
            montoInput.value = ''; 
        } else if (tipoPrestamo === 'Electrodoméstico') {
            montoField.style.display = 'block';
            montoInput.readOnly = true; 
            montoInput.value = ''; 
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

    // Calcular el total del interés acumulado
    document.getElementById('interes').addEventListener('input', calcularTotalInteres);
    document.getElementById('dias_mora').addEventListener('input', calcularTotalInteres);

    function calcularTotalInteres() {
        var interes = parseFloat(document.getElementById('interes').value) || 0;
        var diasMora = parseInt(document.getElementById('dias_mora').value) || 0;
        var monto = parseFloat(document.getElementById('monto').value.replace(/\./g, '')) || 0;

        // Calcular las semanas de mora
        var semanasMora = Math.floor(diasMora / 7);

        // Calcular el interés acumulado
        var totalInteres = (monto * (interes / 100) * semanasMora).toFixed(2);

        // Formatear el totalInteres con notación numérica
        document.getElementById('total_interes').value = parseFloat(totalInteres).toLocaleString('de-DE');
    }

    // Ejecutar la función de interés acumulado al cargar la página
    window.addEventListener('load', calcularTotalInteres);
</script>









