@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Editar seguro</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($seguro, ['route' => ['seguros.update', $seguro->id], 'method' => 'patch']) !!}

            <div class="card-body">

  @if(Auth::user()->hasRole('super_admin'))
  <div class="form-group col-sm-12">
                {!! Form::label('id_inscripcion', 'Inscripto:') !!}
                {!! Form::select('id_inscripcion', $inscripcions, null, ['class' => 'form-control custom-select','placeholder'=>'Selecione una opcion']) !!}
            </div>
 @else
             <div class="form-group col-sm-12">
                 {!! Form::label('id_inscripcion', 'Inscripto:') !!}
                {!! Form::select('id_inscripcion', $inscripcions, null, ['class' => 'form-control custom-select','required']) !!}
                </div>
@endif
<div class="form-group col-sm-12">
    {!! Form::label('padece_enfermedad', '¿Padece o está siendo tratado por alguna enfermedad?:') !!}
    {!! Form::select('padece_enfermedad',array('Si' => 'Si', 'No' => 'No'),null, ['class' => 'form-control','placeholder'=>'Seleccione una opcion','required','onchange'=>'','required'])!!}
</div>
<!-- Especificar Enfermedad Field -->
<div class="form-group col-sm-12" id="especificar_enfermedad" style="display: none;">
   {!! Form::text('especificar_enfermedad', null, ['class' => 'form-control','placeholder'=>'Si es que padece de una enfermedad o esta siendo tratado favor especificar aquí', 'id'=>'especificar_enfermedad']) !!}
</div>
<!-- Presenta Defecto Fisico Field -->
<div class="form-group col-sm-12">
    {!! Form::label('presenta_defecto_fisico', '¿Presenta algún defecto físico, mutilación o deformación? :') !!}
    {!! Form::select('presenta_defecto_fisico',array('Si' => 'Si', 'No' => 'No'),null, ['class' => 'form-control','placeholder'=>'Seleccione una opcion','required','onchange'=>'','required'])!!}
</div>
<!-- Especifique Defecto Fisico Field -->
<div class="form-group col-sm-12" id="especifique_defecto_fisico" style="display: none;">
    {!! Form::text('especifique_defecto_fisico', null, ['class' => 'form-control','placeholder'=>'Si es que presenta algún defecto físico, mutilación o deformación favor especifique aquí','id'=>'especifique_defecto_fisico']) !!}
</div>
<!-- Estado Civil Field -->
<div class=" form-group col-sm-12">
{!! Form::label('estado_civil', 'Estado civil del asegurado:') !!}
{!! Form::select('estado_civil',array('Casado' => 'Casado', 'Soltero' => 'Soltero','Divorciado' => 'Divorciado','Viudo' => 'Viudo'),null, ['class' => 'form-control','placeholder'=>'Seleccione','required','required'])!!}
</div>
<!-- Edad Field -->
<div class="form-group col-sm-12">
    {!! Form::label('edad', 'Edad:') !!}
    {!! Form::text('edad', null, ['class' => 'form-control','required']) !!}
</div>
<!-- Usted Es Field -->
<div class="form-group col-sm-12">
    {!! Form::label('usted_es', 'Usted es:') !!}
    {!! Form::select('usted_es',array('Zurdo' => 'Zurdo', 'Diestro' => 'Diestro','Ambidiestro' => 'Ambidiestro'),null, ['class' => 'form-control','placeholder'=>'Seleccione','required'])!!}

</div>
<!-- Estatura Field -->
<div class="form-group col-sm-12">
    {!! Form::label('estatura', 'Estatura:') !!}
    {!! Form::text('estatura', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Peso Field -->
<div class="form-group col-sm-12">
    {!! Form::label('peso', 'Peso:') !!}
    {!! Form::text('peso', null, ['class' => 'form-control','required']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('tipo_plan', 'Tipo de plan:') !!}
      {!! Form::select('tipo_plan',array('Plan sin deducible' => 'Plan sin deducible', 'Plan con deducible' => 'Plan con deducible'),null, ['class' => 'form-control','placeholder'=>'Seleccione una opcion','required'])!!}
</div>  
<div class="form-group col-sm-12" id="plan_sin_deducible" style="display: none;">
  
</div>
<div class="form-group col-sm-12" id="plan_con_deducible" style="display: none;">
  
</div>

<script type="text/javascript">
const tipo_plans = document.querySelector("#tipo_plane");
const input1 = document.querySelector("[id=plan_sin_deducible]");
const input2 = document.querySelector("[id=plan_con_deducible]");

tipo_plan.addEventListener("change", changeTipo);

function changeTipo(){

    if (tipo_plan.value === "Plan sin deducible") {
        input1.innerHTML = '{!! Form::select("id_tarifa", $tarifa_sin, null, ["class" => "form-control custom-select","placeholder"=>"Selecione una opcion","id"=>"plan_sin_deducible"]) !!}';
        input1.style.display = 'initial'
        /*input1.style.display = 'initial';
        input2.style.display = 'none';
        input3.style.display = 'none';*/
    } else if(tipo_plan.value === "Plan con deducible") {
        input1.innerHTML = '    {!! Form::select("id_tarifa", $tarifa_con, null, ["class" => "form-control custom-select","placeholder"=>"Selecione una opcion","id"=>"plan_con_deducible"]) !!}';
        input1.style.display = 'initial'
        /*input1.style.display = 'none';
        input3.style.display = 'none';
        input2.style.display = 'initial';*/
    } 
    
}
</script>





<!-- Nombre Apellido Fallecimiento Titular Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nombre_apellido_fallecimiento_titular', 'Nombre y Apellido en caso de fallecimiento de titular:') !!}
    {!! Form::text('nombre_apellido_fallecimiento_titular', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Parentesco Titular Beneficiario Field -->
<div class="form-group col-sm-12">
    {!! Form::label('parentesco_titular_beneficiario', 'Parentesco de titular con beneficiario:') !!}
    {!! Form::text('parentesco_titular_beneficiario', null, ['class' => 'form-control','required']) !!}
</div>
<!-- Ci Beneficiario Field -->
<div class="form-group col-sm-12">
    {!! Form::label('ci_beneficiario', 'Ci de beneficiario:') !!}
    {!! Form::text('ci_beneficiario', null, ['class' => 'form-control','required']) !!}
</div>
<!-- Porcentaje Cesion Field -->
<div class="form-group col-sm-12">
    {!! Form::label('porcentaje_cesion', 'Porcentaje Cesion:') !!}
   {!! Form::select('porcentaje_cesion',array('100%' => '100%'),null, ['class' => 'form-control','placeholder'=>'Seleccione una opcion','required','required'])!!}
</div>

<!-- Fechanac Beneficiario Field -->
<div class="form-group col-sm-12">
    {!! Form::label('fechanac_beneficiario', 'Fecha de nacimiento de beneficiario:') !!}
    {!! Form::date('fechanac_beneficiario', null, ['class' => 'form-control','required']) !!}
</div>
<script type="text/javascript">
    const padece_enfermedad = document.querySelector("#padece_enfermedad");
const input = document.querySelector("[id=especificar_enfermedad]");

padece_enfermedad.addEventListener("change", () => {
  if (padece_enfermedad.value === "Si") {
    input.style.display = 'initial';
  } else {
    input.style.display = 'none';
  }
});
</script>
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('seguros.index') }}" class="btn btn-default">Cancelar</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
