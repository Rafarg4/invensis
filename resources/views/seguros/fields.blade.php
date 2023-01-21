<!-- Estado Civil Field -->
<div class=" form-group col-sm-12">
{!! Form::label('estado_civil', 'Estado Civil del Asegurado:') !!}
{!! Form::select('estado_civil',array('Casado' => 'Casado', 'Soltero' => 'Soltero','Divorciado' => 'Divorciado','Viudo' => 'Viudo'),null, ['class' => 'form-control','placeholder'=>'Seleccione','required'])!!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('padece_enfermedad', '¿Padece o está siendo tratado por alguna enfermedad?:') !!}
    {!! Form::select('padece_enfermedad',array('Si' => 'Si', 'No' => 'No'),null, ['class' => 'form-control','placeholder'=>'Seleccione','required','onchange'=>''])!!}
</div>
<!-- Especificar Enfermedad Field -->
<div class="form-group col-sm-12">
   {!! Form::text('especificar_enfermedad', null, ['class' => 'form-control','placeholder'=>'Si es que padece de una enfermedad o esta siendo tratado favor especificar aquí','style'=>'display:none']) !!}

</div>
<!-- Presenta Defecto Fisico Field -->
<div class="form-group col-sm-12">
    {!! Form::label('presenta_defecto_fisico', '¿Presenta algún defecto físico, mutilación o deformación? :') !!}
    {!! Form::select('presenta_defecto_fisico',array('si' => 'si', 'No' => 'No'),null, ['class' => 'form-control','placeholder'=>'Seleccione','required'])!!}
</div>
<!-- Edad Field -->
<div class="form-group col-sm-12">
    {!! Form::label('edad', 'Edad:') !!}
    {!! Form::text('edad', null, ['class' => 'form-control']) !!}
</div>

<!-- Usted Es Field -->
<div class="form-group col-sm-12">
    {!! Form::label('usted_es', 'Usted Es:') !!}
    {!! Form::select('usted_es',array('Zurdo' => 'Zurdo', 'Diestro' => 'Diestro','Ambidiestro' => 'Ambidiestro'),null, ['class' => 'form-control','placeholder'=>'Seleccione','required'])!!}

</div>
<!-- Especifique Defecto Fisico Field -->
<div class="form-group col-sm-12">
    {!! Form::label('especifique_defecto_fisico', 'Si es que presenta algún defecto físico, mutilación o deformación favor especifique aquí:') !!}
    {!! Form::text('especifique_defecto_fisico', null, ['class' => 'form-control']) !!}
</div>

<!-- Estatura Field -->
<div class="form-group col-sm-12">
    {!! Form::label('estatura', 'Estatura:') !!}
    {!! Form::text('estatura', null, ['class' => 'form-control']) !!}
</div>

<!-- Peso Field -->
<div class="form-group col-sm-12">
    {!! Form::label('peso', 'Peso:') !!}
    {!! Form::text('peso', null, ['class' => 'form-control']) !!}
</div>

<!-- Plan Field -->
<div class="form-group col-sm-12">
    {!! Form::label('plan', '¿Que plan desea elegir?:') !!}
     {!! Form::select('plan',array('Plan con deducible' => 'Plan con deducible', 'Plan sin deducible' => 'Plan sin deducible'),null, ['class' => 'form-control','placeholder'=>'Seleccione','required'])!!}
</div>

<!-- Nombre Apellido Fallecimiento Titular Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nombre_apellido_fallecimiento_titular', 'Nombre Apellido Fallecimiento Titular:') !!}
    {!! Form::text('nombre_apellido_fallecimiento_titular', null, ['class' => 'form-control']) !!}
</div>

<!-- Parentesco Titular Beneficiario Field -->
<div class="form-group col-sm-12">
    {!! Form::label('parentesco_titular_beneficiario', 'Parentesco Titular Beneficiario:') !!}
    {!! Form::text('parentesco_titular_beneficiario', null, ['class' => 'form-control']) !!}
</div>
<!-- Ci Beneficiario Field -->
<div class="form-group col-sm-12">
    {!! Form::label('ci_beneficiario', 'Ci Beneficiario:') !!}
    {!! Form::text('ci_beneficiario', null, ['class' => 'form-control']) !!}
</div>
<!-- Porcentaje Cesion Field -->
<div class="form-group col-sm-12">
    {!! Form::label('porcentaje_cesion', 'Porcentaje Cesion:') !!}
   {!! Form::select('porcentaje_cesion',array('100%' => '100%'),null, ['class' => 'form-control','placeholder'=>'Seleccione','required'])!!}
</div>

<!-- Fechanac Beneficiario Field -->
<div class="form-group col-sm-12">
    {!! Form::label('fechanac_beneficiario', 'Fechanac Beneficiario:') !!}
    {!! Form::date('fechanac_beneficiario', null, ['class' => 'form-control']) !!}
</div>
<script type="text/javascript">
    const padece_enfermedad = document.querySelector("#padece_enfermedad");
const input = document.querySelector("[name=especificar_enfermedad]");

padece_enfermedad.addEventListener("change", () => {
  if (padece_enfermedad.value === "Si") {
    input.style.display = 'initial';
  } else {
    input.style.display = 'none';
  }
});
</script>
