<!-- Tipo Plan Field -->
<div class="form-group col-sm-6">
   {!! Form::label('tipo_plan', 'Tipo de plan:') !!}
   {!! Form::select('tipo_plan',array('Plan sin deducible' => 'Plan sin deducible', 'Plan con deducible' => 'Plan con deducible','Pago de seguro' => 'Pago de seguro','Pago de inscripcion' => 'Pago de inscripcion','Pago de Evento' => 'Pago de Evento'),null, ['class' => 'form-control','placeholder'=>'Seleccione','required'])!!}
</div>

<!-- Tarifa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tarifa', 'Precio de tarifa:') !!}
    {!! Form::text('tarifa', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>