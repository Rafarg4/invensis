<!-- Tipo Pago Field -->
<div class="col-sm-12">
    {!! Form::label('tipo_pago', 'Tipo Pago:') !!}
    <p>{{ $pago->tipo_pago }}</p>
</div>

<!-- Comprobante Field -->
<div class="col-sm-12">
    {!! Form::label('comprobante', 'Comprobante:') !!}
    <p>{{ $pago->comprobante }}</p>
</div>

<!-- Fecha Pago Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_pago', 'Fecha Pago:') !!}
    <p>{{ $pago->fecha_pago }}</p>
</div>

<!-- Estado Field -->
<div class="col-sm-12">
    {!! Form::label('estado', 'Estado:') !!}
    <p>{{ $pago->estado }}</p>
</div>

<!-- Observacion Field -->
<div class="col-sm-12">
    {!! Form::label('observacion', 'Observacion:') !!}
    <p>{{ $pago->observacion }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $pago->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $pago->updated_at }}</p>
</div>

