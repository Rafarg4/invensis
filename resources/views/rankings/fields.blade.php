<!-- Posicion Field -->
<div class="form-group col-sm-12">
    {!! Form::label('posicion', 'Posicion:') !!}
    {!! Form::text('posicion', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Nombre Apellido Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nombre_apellido', 'Nombre y Apellido:') !!}
    {!! Form::text('nombre_apellido', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Categoria Field -->
  <div class="form-group col-sm-12">
                {!! Form::label('categoria', 'Categoria:') !!}
                 {!! Form::text('categoria', null, ['class' => 'form-control','required']) !!}
            </div>

<!-- Club Field -->
<div class="form-group col-sm-12">
    {!! Form::label('team', 'team:') !!}
    {!! Form::text('team', null, ['class' => 'form-control','required']) !!}
</div>
<!-- 1 Fecha Field -->
<div class="form-group col-sm-12">
    {!! Form::label('fecha_uno', '1 Fecha:') !!}
    {!! Form::text('fecha_uno', null, ['class' => 'form-control','onchange'=>"sumar(this.value);" ,'required','required']) !!}
</div>
<!-- 1 Fecha Field -->
<div class="form-group col-sm-12">
    {!! Form::label('fecha_dos', '2 Fecha:') !!}
    {!! Form::text('fecha_dos', null, ['class' => 'form-control','onchange'=>"sumar(this.value);" ,'required','required']) !!}
</div>
<!-- 1 Fecha Field -->
<div class="form-group col-sm-12">
    {!! Form::label('fecha_tres', '3 Fecha:') !!}
    {!! Form::text('fecha_tres', null, ['class' => 'form-control','onchange'=>"sumar(this.value);" ,'required','required']) !!}
</div>
<!-- 1 Fecha Field -->
<div class="form-group col-sm-12">
    {!! Form::label('fecha_cuatro', '4 Fecha:') !!}
    {!! Form::text('fecha_cuatro', null, ['class' => 'form-control','onchange'=>"sumar(this.value);" ,'required','required']) !!}
</div>
<!-- 1 Fecha Field -->
<div class="form-group col-sm-12">
    {!! Form::label('fecha_cinco', '5 Fecha:') !!}
    {!! Form::text('fecha_cinco', null, ['class' => 'form-control','onchange'=>"sumar(this.value);" ,'required','required']) !!}
</div>
<!-- 1 Fecha Field -->
<div class="form-group col-sm-12">
    {!! Form::label('fecha_seis', '6 Fecha:') !!}
    {!! Form::text('fecha_seis', null, ['class' => 'form-control','onchange'=>"sumar(this.value);" ,'required','required']) !!}
</div>
<!-- 1 Fecha Field -->
<div class="form-group col-sm-12">
    {!! Form::label('fecha_siete', '7 Fecha:') !!}
    {!! Form::text('fecha_siete', null, ['class' => 'form-control','onchange'=>"sumar(this.value);" ,'required','required']) !!}
</div>
<!-- 1 Fecha Field -->
<div class="form-group col-sm-12">
    {!! Form::label('fecha_ocho', '8 Fecha:') !!}
    {!! Form::text('fecha_ocho', null, ['class' => 'form-control','onchange'=>"sumar(this.value);" ,'required','required']) !!}
</div>
<!-- 1 Fecha Field -->
<div class="form-group col-sm-12">
    {!! Form::label('fecha_nueve', '9 Fecha:') !!}
    {!! Form::text('fecha_nueve', null, ['class' => 'form-control','onchange'=>"sumar(this.value);" ,'required','required']) !!}
</div>
<!-- 1 Fecha Field -->
<div class="form-group col-sm-12">
    {!! Form::label('fecha_dies', '10 Fecha:') !!}
    {!! Form::text('fecha_dies', null, ['class' => 'form-control','onchange'=>"sumar(this.value);" ,'required','required']) !!}
</div>
