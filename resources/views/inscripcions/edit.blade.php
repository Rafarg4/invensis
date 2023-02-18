@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Editar Inscripcion</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($inscripcion, ['route' => ['inscripcions.update', $inscripcion->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

            <div class="card-body">
                <div class="row">
                    <link href="//netdna.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style type="text/css">
 
.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
</style>

<div class="container">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Paso 1</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>Paso 2</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p>Paso 3</p>
        </div>
    </div>
</div>
<form role="form">
    <div class="row setup-content" id="step-1">
            <div class="col-md-12">
                <h3> Datos personales</h3>
                <!-- Grupo Sanguineo Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('primer_y_segundo_nombre', 'Primer y segundo nombre:') !!}
                    {!! Form::text('primer_y_segundo_nombre', null, ['class' => 'form-control']) !!}
                </div><!-- Grupo Sanguineo Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('primer_y_segundo_apellido', 'Primer y segundo apellido:') !!}
                    {!! Form::text('primer_y_segundo_apellido', null, ['class' => 'form-control']) !!}
                </div><!-- Grupo Sanguineo Field -->
                <!-- Grupo Sanguineo Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('fechanac', 'Fecha de nacimiento n:') !!}
                    {!! Form::date('fechanac', null, ['class' => 'form-control']) !!}
                </div><!-- Grupo Sanguineo Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('ci', 'CI:') !!}
                    {!! Form::text('ci', null, ['class' => 'form-control']) !!}
                </div>
                <!-- Grupo Sanguineo Field -->
                <div class=" form-group col-sm-12">
                {!! Form::label('sexo', 'Sexo:') !!}
                {!! Form::select('sexo',array('Masculino' => 'Masculino', 'Femenino' => 'Femenino','Otro' => 'Otro'),null, ['class' => 'form-control','placeholder'=>'Seleccione','required'])!!}
                </div>
                <!-- Grupo Sanguineo Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('grupo_sanguineo', 'Grupo Sanguineo:') !!}
                    {!! Form::text('grupo_sanguineo', null, ['class' => 'form-control']) !!}
                </div>
                <!-- Nacionalidad Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('nacionalidad', 'Nacionalidad:') !!}
                    {!! Form::text('nacionalidad', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Celular Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('celular', 'Celular:') !!}
                    {!! Form::number('celular', null, ['class' => 'form-control']) !!}
                </div>
                <!-- Email Field -->
               <div class="form-group col-sm-12">
                    {!! Form::label('email', 'email:') !!}
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                </div>
                <!-- Domiciolio Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('domiciolio', 'Domiciolio:') !!}
                    {!! Form::text('domiciolio', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Ciudad Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('ciudad', 'Ciudad:') !!}
                    {!! Form::text('ciudad', null, ['class' => 'form-control']) !!}
                </div>
                 <div class="form-group col-sm-12">
                    {!! Form::label('departamento', 'Departamento:') !!}
                    {!! Form::text('departamento', null, ['class' => 'form-control']) !!}
                </div>

                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Siguiente</button>
            </div>
        </div>
    <div class="row setup-content" id="step-2">
            <div class="col-md-12">
                <h3>Datos de cliclista</h3>
                            <!-- Id Categoria Field -->
           <div class="form-group col-sm-12">
                {!! Form::label('id_categoria', 'Categoria:') !!}
                {!! Form::select('id_categoria', $categoria, null, ['class' => 'form-control custom-select','placeholder'=>'Selecione una opcion','required']) !!}
            </div>
            <div class="form-group col-sm-12">
                    {!! Form::label('region', 'Elegir a que región pertenece:') !!}
                     {!! Form::select('region',array('Asosiacion metropolitana de ciclismo' => 'Asosiacion metropolitana de ciclismo', 'Federacion paranaense de ciclismo' => 'Federacion paranaense de ciclismo','Union Regional de ciclistas (URCI)' => 'Union Regional de ciclistas (URCI)','Federacion de ciclismo Itapuense' => 'Federacion de ciclismo Itapuense'),null, ['class' => 'form-control','placeholder'=>'Seleccione','required'])!!}
                </div>
            <!-- Nombre Equipo Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('nombre_equipo', 'Nombre Equipo:') !!}
                {!! Form::text('nombre_equipo', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Contacto Emergencia Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('contacto_emergencia', 'Contacto Emergencia:') !!}
                {!! Form::number('contacto_emergencia', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Nombre Apellido Contacto Emergencia Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('nombre_apellido_contacto_emergencia', 'Nombre Apellido Contacto Emergencia:') !!}
                {!! Form::text('nombre_apellido_contacto_emergencia', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Foto Field -->
            <!-- Imagen Field -->


            <div class="form-group col-sm-12">
            <label for="foto">Selecione un archivo:</label>
             @if(isset($inscripcion->foto))
            <img src="{{ asset('storage').'/'.$inscripcion->foto}}" width="100" height="100" class="img-circle">
            @endif 
            <input type="file" id="foto" name="foto">
            
            </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Siguiente</button>
        </div>
    </div>
    <div class="row setup-content" id="step-3">
            <div class="col-md-12">
                <h3> Ultimo paso, confirmar datos ingresados</h3>
                @canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
               
            <div class="form-group col-sm-12">
                {!! Form::label('monto', 'Monto:') !!}
                {!! Form::text('monto', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-sm-12">
                {!! Form::label('federacion_id', 'Federacion id:') !!}
                {!! Form::number('federacion_id', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-sm-12">
                {!! Form::label('uciid', ' Uciid:') !!}
                {!! Form::number('uciid', null, ['class' => 'form-control']) !!}
            </div>
            @endcan
            @if(Auth::user()->hasRole('super_admin'))
             <div class=" form-group col-sm-12">
             {!! Form::label('estado', 'Estado:') !!}
            {!! Form::select('estado',array('En espera' => 'En espera', 'Paralizado' => 'Paralizado','Verificado' => 'Verificado'),null, ['class' => 'form-control','placeholder'=>'Seleccione','required'])!!}
            </div>
            @else
             <div class="form-group col-sm-12">
                <label for="estado">Estado:</label>
                <input type="text" name="estado" class="form-control" value="En espera" readonly>
                </div>
            @endif
                <button class="btn btn-success btn-lg pull-right" type="submit">Confirmar!</button>
                
            </div>

        </div>
    
</form>
</div>
<script type="text/javascript">
 $(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>
                </div>
            </div>

            <div class="card-footer">
                
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
