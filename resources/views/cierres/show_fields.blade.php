<!-- Id Cobrador Field -->
<div class="col-sm-12">
    {!! Form::label('id_cobrador', 'Id Cobrador:') !!}
    <p>{{ $cierre->id_cobrador }}</p>
</div>

<!-- Monto Cierre Field -->
<div class="col-sm-12">
    {!! Form::label('monto_cierre', 'Monto Cierre:') !!}
    <p>{{ $cierre->monto_cierre }}</p>
</div>

<!-- Fecha Cierre Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_cierre', 'Fecha Cierre:') !!}
    <p>{{ $cierre->fecha_cierre }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $cierre->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $cierre->updated_at }}</p>
</div>

