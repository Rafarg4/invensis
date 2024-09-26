<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $electrodomestico->nombre }}</p>
</div>

<!-- Marca Field -->
<div class="col-sm-12">
    {!! Form::label('marca', 'Marca:') !!}
    <p>{{ $electrodomestico->marca }}</p>
</div>

<!-- Precio Field -->
<div class="col-sm-12">
    {!! Form::label('precio', 'Precio:') !!}
    <p>{{ $electrodomestico->precio }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $electrodomestico->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $electrodomestico->updated_at }}</p>
</div>

