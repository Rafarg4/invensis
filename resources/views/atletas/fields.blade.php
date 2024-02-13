<div class="form-group col-sm-12">
<input type="hidden" name="id_user" class="form-control" value="{{ Auth::user()->id }}" readonly>
</div>
@if(Auth::user()->hasRole('super_admin'))
  <div class="form-group col-sm-12">
                {!! Form::label('id_evento', 'Evento:') !!}
                {!! Form::select('id_evento', $evento, null, ['class' => 'form-control custom-select','placeholder'=>'Selecione una opcion','required']) !!}
            </div>
 @else
             <div class="form-group col-sm-12">
                 {!! Form::label('id_evento', 'Evento:') !!}
                {!! Form::select('id_evento', $evento, null, ['class' => 'form-control custom-select','required']) !!}
                </div>
@endif
<!-- Ci Field -->
<div class="form-group col-sm-3">
    {!! Form::label('ci', 'Ci:') !!}
    {!! Form::text('ci', null, ['class' => 'form-control', 'id' => 'ciInput']) !!}
</div>
<!-- Nombres Field -->
<div class="form-group col-sm-3">
    {!! Form::label('nombres', 'Nombres:') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control','required','id' => 'nombresInput']) !!}
</div>

<!-- Apellidos Field -->
<div class="form-group col-sm-3">
    {!! Form::label('apellidos', 'Apellidos:') !!}
    {!! Form::text('apellidos', null, ['class' => 'form-control','id' => 'apellidosInput']) !!}
</div>
<!-- Sexo Field -->
<div class="form-group col-sm-3">
    {!! Form::label('sexo', 'Sexo:') !!}
    {!! Form::select('sexo',array('Masculino' => 'Masculino', 'Femenino' => 'Femenino','Otro' => 'Otro'),null, ['class' => 'form-control','placeholder'=>'Seleccione una opcion','required','required'])!!}
</div>

<!-- Celular Field -->
<div class="form-group col-sm-3">
    {!! Form::label('celular', 'Celular:') !!}
    {!! Form::text('celular', null, ['class' => 'form-control']) !!}
</div>

<!-- Ciudad Field -->
<div class="form-group col-sm-3">
    {!! Form::label('ciudad', 'Ciudad:') !!}
    {!! Form::text('ciudad', null, ['class' => 'form-control']) !!}
</div>

<!-- Departamento Field -->
<div class="form-group col-sm-3">
     {!! Form::label('departamento', 'Departamento:') !!}
     {!! Form::select('departamento',array('Asunción' => 'Asunción', 'Concepción ' => 'Concepción ','San Pedro' => 'San Pedro','Guairá' => 'Guairá','Caaguazú' => 'Caaguazú','Itapúa' => 'Itapúa','Misiones' => 'Misiones','Paraguarí' => 'Paraguarí','Alto Paraná' => 'Alto Paraná','Central' => 'Central','Ñeembucú' => 'Ñeembucú','Amambay' => 'Amambay','Canindeyú' => 'Canindeyú','Presidente Hayes ' => 'Presidente Hayes  ','Boquerón' => 'Boquerón','Alto Paraguay   ' => 'Alto Paraguay    '),null, ['class' => 'form-control','placeholder'=>'Seleccione una opcion','required'])!!}
</div>

<!-- Categoria Field -->
<div class="form-group col-sm-3">
    {!! Form::label('categoria', 'Categoria:') !!}
    {!! Form::text('categoria', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Categoria Field -->
<div class="form-group col-sm-3">
    {!! Form::label('tipo_categoria', 'Tipo Categoria:') !!}
    {!! Form::text('tipo_categoria', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Equipo Field -->
<div class="form-group col-sm-3">
    {!! Form::label('nombre_equipo', 'Nombre Equipo:') !!}
    {!! Form::text('nombre_equipo', null, ['class' => 'form-control']) !!}
</div>

<!-- Federacion Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('federacion_id', 'Federacion Id:') !!}
    {!! Form::text('federacion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Uci Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('uci_id', 'Uci Id:') !!}
    {!! Form::text('uci_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Modo Field -->
<div class="form-group col-sm-3">
     {!! Form::label('modo', 'Modo:') !!}
    {!! Form::select('modo',array('Inscripto' => 'Inscripto', 'Visitante' => 'Visitante'),null, ['class' => 'form-control','placeholder'=>'Seleccione','required'])!!}
</div>