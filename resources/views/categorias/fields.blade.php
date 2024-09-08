<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','required']) !!}
</div>
<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('edad_ini', 'Desde:') !!}
    {!! Form::text('edad_ini', null, ['class' => 'form-control','required']) !!}
</div>
<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('edad_fin', 'Hasta:') !!}
    {!! Form::text('edad_fin', null, ['class' => 'form-control','required']) !!}
</div>
<!-- tipo categoria Field -->
<div class=" form-group col-sm-6">
{!! Form::label('id_modalidad', 'Modalidad:') !!}
 {!! Form::select('id_modalidad', $modalidades, null, ['class' => 'form-control custom-select','placeholder'=>'Selecione una opcion','required']) !!}
</div>