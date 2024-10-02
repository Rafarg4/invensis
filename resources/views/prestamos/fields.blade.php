<!-- Id Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_cliente', 'Cliente:') !!}
    {!! Form::select('id_cliente', $clientes, $prestamos->id_cliente ?? null, ['class' => 'form-control', 'placeholder' => 'Seleccione un cliente']) !!}
</div>

<!-- Monto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monto', 'Monto:') !!}
    {!! Form::number('monto', $prestamos->monto ?? null, ['class' => 'form-control', 'step' => '0.01', 'placeholder' => 'Ingrese el monto del préstamo']) !!}
</div>

<!-- Fecha de Inicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_inicio', 'Fecha de Inicio:') !!}
    {!! Form::date('fecha_inicio', $prestamos->fecha_inicio ?? \Carbon\Carbon::now()->format('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<!-- Fecha Pago Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_pago', 'Fecha de Pago:') !!}
    {!! Form::date('fecha_pago', $prestamos->fecha_pago ?? null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Vencimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_vencimiento', 'Fecha de Vencimiento:') !!}
    {!! Form::date('fecha_vencimiento', $prestamos->fecha_vencimiento ?? null, ['class' => 'form-control']) !!}
</div>

<!-- Cantidad Cuota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad_cuota', 'Cantidad de Cuotas:') !!}
    {!! Form::number('cantidad_cuota', $prestamos->cantidad_cuota ?? null, ['class' => 'form-control', 'placeholder' => 'Ingrese la cantidad de cuotas']) !!}
</div>

<!-- Tipo Prestamo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_prestamo', 'Tipo de Préstamo:') !!}
    {!! Form::select('tipo_prestamo', ['Efectivo' => 'Efectivo', 'Electrodoméstico' => 'Electrodoméstico'], $prestamos->tipo_prestamo ?? null, ['class' => 'form-control', 'placeholder' => 'Seleccione el tipo de préstamo']) !!}
</div>

<!-- Dias Mora Field (Auto-calculated) -->
<div class="form-group col-sm-6">
    {!! Form::label('dias_mora', 'Días de Mora:') !!}
    {!! Form::number('dias_mora', $prestamos->dias_mora ?? 0, ['class' => 'form-control', 'readonly' => true, 'id' => 'dias_mora']) !!}
</div>

<!-- Script para calcular días de mora -->
<script>
    document.getElementById('fecha_vencimiento').addEventListener('change', calcularDiasMora);
    document.getElementById('fecha_pago').addEventListener('change', calcularDiasMora);

    function calcularDiasMora() {
        var fechaVencimiento = document.getElementById('fecha_vencimiento').value;
        var fechaPago = document.getElementById('fecha_pago').value;

        if (fechaVencimiento && fechaPago) {
            var fechaVencimientoDate = new Date(fechaVencimiento);
            var fechaPagoDate = new Date(fechaPago);

            var diferencia = (fechaPagoDate - fechaVencimientoDate) / (1000 * 60 * 60 * 24);

            if (diferencia > 0) {
                document.getElementById('dias_mora').value = Math.ceil(diferencia);
            } else {
                document.getElementById('dias_mora').value = 0;
            }
        } else {
            document.getElementById('dias_mora').value = 0;
        }
    }
</script>


