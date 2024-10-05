<!-- Zona Field -->
<div class="col-sm-12">
    {!! Form::label('zona', 'Zona:') !!}
    <p>{{ $prestamos->zona }}</p>
</div>

<!-- Id Cliente Field -->
<div class="col-sm-12">
    {!! Form::label('id_cliente', 'Id Cliente:') !!}
    <p>{{ $prestamos->id_cliente }}</p>
</div>

<!-- Monto Field -->
<div class="col-sm-12">
    {!! Form::label('monto', 'Monto:') !!}
    <p>{{ $prestamos->monto }}</p>
</div>

<!-- Fecha Inicio Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_inicio', 'Fecha Inicio:') !!}
    <p>{{ $prestamos->fecha_inicio }}</p>
</div>

<!-- Fecha Pago Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_pago', 'Fecha Pago:') !!}
    <p>{{ $prestamos->fecha_pago }}</p>
</div>

<!-- Fechas de Vencimiento Field -->
<div class="col-sm-12">
    {!! Form::label('fechas_vencimiento', 'Fechas de Vencimiento:') !!}
    <p>
        @foreach(json_decode($prestamos->fechas_vencimiento, true) as $fecha)
            {{ $fecha }}<br>
        @endforeach
    </p>
</div>

<!-- Cantidad Cuota Field -->
<div class="col-sm-12">
    {!! Form::label('cantidad_cuota', 'Cantidad Cuota:') !!}
    <p>{{ $prestamos->cantidad_cuota }}</p>
</div>

<!-- Tipo Prestamo Field -->
<div class="col-sm-12">
    {!! Form::label('tipo_prestamo', 'Tipo Prestamo:') !!}
    <p>{{ $prestamos->tipo_prestamo }}</p>
</div>

<!-- Dias Mora Field -->
<div class="col-sm-12">
    {!! Form::label('dias_mora', 'Dias Mora:') !!}
    <p>{{ $prestamos->dias_mora }}</p>
</div>

<!-- Interés Field -->
<div class="col-sm-12">
    {!! Form::label('interes', 'Interés por Mora (%):') !!}
    <p>{{ $prestamos->interes }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $prestamos->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $prestamos->updated_at }}</p>
</div>


