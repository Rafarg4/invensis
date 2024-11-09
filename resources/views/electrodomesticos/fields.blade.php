<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Marca Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marca', 'Marca:') !!}
    {!! Form::text('marca', null, ['class' => 'form-control']) !!}
</div>

<!-- Precio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precio_compra', 'Precio de compra:') !!}
    {!! Form::text('precio_compra', null, ['class' => 'form-control']) !!}
</div>
<!-- Precio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precio_venta', 'Precio de venta:') !!}
    {!! Form::text('precio_venta', null, ['class' => 'form-control']) !!}
</div>