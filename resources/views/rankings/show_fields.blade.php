<!-- Posicion Field -->
<div class="col-sm-3">
    {!! Form::label('posicion', 'Posicion:') !!}
    <p>{{ $ranking->posicion }}</p>
</div>

<!-- Nombre Apellido Field -->
<div class="col-sm-3">
    {!! Form::label('nombre_apellido', 'Nombre Apellido:') !!}
    <p>{{ $ranking->nombre_apellido }}</p>
</div>

<!-- Categoria Field -->
<div class="col-sm-3">
    {!! Form::label('categoria', 'Categoria:') !!}
    <p>{{ $ranking->categoria }}</p>
</div>

<!-- Club Field -->
<div class="col-sm-3">
    {!! Form::label('club', 'Club:') !!}
    <p>{{ $ranking->club }}</p>
</div>

<!-- Sexo Field -->
<div class="col-sm-3">
    {!! Form::label('sexo', 'Sexo:') !!}
    <p>{{ $ranking->sexo }}</p>
</div>

<!-- 1 Fecha Field -->
<div class="col-sm-3">
    {!! Form::label('primer_fecha', '1 Fecha:') !!}
    <p>{{ $ranking->primer_fecha }}</p>
</div>

<!-- 2 Fecha Field -->
<div class="col-sm-3">
    {!! Form::label('segundo_fecha', '2 Fecha:') !!}
    <p>{{ $ranking->segundo_fecha }}</p>
</div>

<!-- 3 Fecha Field -->
<div class="col-sm-3">
    {!! Form::label('tercero_fecha', '3 Fecha:') !!}
    <p>{{ $ranking->tercero_fecha }}</p>
</div>

<!-- 4 Fecha Field -->
<div class="col-sm-3">
    {!! Form::label('cuarto_fecha', '4 Fecha:') !!}
    <p>{{ $ranking->cuarto_fecha }}</p>
</div>

<!-- Total Field -->
<div class="col-sm-3">
    {!! Form::label('total', 'Total:') !!}
    <p>{{ $ranking->total }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-3">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $ranking->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-3">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $ranking->updated_at }}</p>
</div>

