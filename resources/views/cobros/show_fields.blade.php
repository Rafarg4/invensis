<!-- Id Cliente Field -->
<div class="col-sm-12">
    {!! Form::label('id_cliente', 'Id Cliente:') !!}
    <p>{{ $cobro->id_cliente }}</p>
</div>

<!-- Monto Cobro Field -->
<div class="col-sm-12">
    {!! Form::label('monto_cobro', 'Monto Cobro:') !!}
    <p>{{ $cobro->monto_cobro }}</p>
</div>

<!-- Fecha Cobro Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_cobro', 'Fecha Cobro:') !!}
    <p>{{ $cobro->fecha_cobro }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $cobro->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $cobro->updated_at }}</p>
</div>

