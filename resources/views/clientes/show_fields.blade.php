<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $cliente->nombre }}</p>
</div>

<!-- Apellido Field -->
<div class="col-sm-12">
    {!! Form::label('apellido', 'Apellido:') !!}
    <p>{{ $cliente->apellido }}</p>
</div>

<!-- Ci Numero Field -->
<div class="col-sm-12">
    {!! Form::label('ci_numero', 'Ci Numero:') !!}
    <p>{{ $cliente->ci_numero }}</p>
</div>

<!-- Direccion Field -->
<div class="col-sm-12">
    {!! Form::label('direccion', 'Direccion:') !!}
    <p>{{ $cliente->direccion }}</p>
</div>

<!-- Telefono Field -->
<div class="col-sm-12">
    {!! Form::label('telefono', 'Telefono:') !!}
    <p>{{ $cliente->telefono }}</p>
</div>

<!-- Ciudad Field -->
<div class="col-sm-12">
    {!! Form::label('ciudad', 'Ciudad:') !!}
    <p>{{ $cliente->ciudad }}</p>
</div>

<!-- Pais Field -->
<div class="col-sm-12">
    {!! Form::label('pais', 'Pais:') !!}
    <p>{{ $cliente->pais }}</p>
</div>

<!-- Mapa Field -->
<div class="col-sm-12">
    {!! Form::label('mapa', 'Mapa:') !!}
    @if($cliente->mapa)
        <a href="{{ $cliente->mapa }}" target="_blank" class="btn btn-primary">Ver Mapa</a>
    @endif
</div>

<!-- Lat Field -->
<div class="col-sm-12">
    {!! Form::label('lat', 'Lat:') !!}
    <p>{{ $cliente->lat }}</p>
</div>

<!-- Lang Field -->
<div class="col-sm-12">
    {!! Form::label('lang', 'Lang:') !!}
    <p>{{ $cliente->lang }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $cliente->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $cliente->updated_at }}</p>
</div>


