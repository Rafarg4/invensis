<div class="form-group col-sm-6">
            {!! Form::label('imagen', 'Imagen:') !!}
            <div class="input-group">
            <div class="custom-file">
            <input type="file" id="imagen" name="imagen" required >
            <label class="custom-file-label" for="imagen">Seleccionar Archivo</label>
            </div>
            </div>
             @if(isset($evento->imagen))
            <img src="/pdf.jpg" width="40" height="40"></a>
            @endif
            </div>
<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
</div>

<!-- Modalidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lugar', 'Lugar:') !!}
    {!! Form::text('lugar', null, ['class' => 'form-control']) !!}
</div>

<!-- Modalidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modalidad', 'Modalidad:') !!}
    {!! Form::text('modalidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Distancia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('distancia', 'Distancia:') !!}
    {!! Form::text('distancia', null, ['class' => 'form-control']) !!}
</div>

<!-- Organiza Field -->
<div class="form-group col-sm-6">
    {!! Form::label('organiza', 'Organiza:') !!}
    {!! Form::text('organiza', null, ['class' => 'form-control']) !!}
</div>

<!-- Cupos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cupos', 'Cupos:') !!}
    {!! Form::text('cupos', null, ['class' => 'form-control']) !!}
</div>

<!-- Cupos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monto', 'Monto:') !!}
    {!! Form::text('monto', null, ['class' => 'form-control']) !!}
</div>

<!-- Recrrorrido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('recorrido1', 'Recorrido CRI:') !!}
    {!! Form::text('recorrido1', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('url_cri', 'Url Recorrido CRI:') !!}
    {!! Form::text('url_cri', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('recorrido2', 'Recorrido Ruta:') !!}
    {!! Form::text('recorrido2', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('url_ruta', 'Url Recorrido Ruta:') !!}
    {!! Form::text('url_ruta', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class=" form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::select('estado',array('Disponible' => 'Disponible', 'Lleno' => 'Lleno'),null, ['class' => 'form-control','placeholder'=>'Seleccione','required'])!!}
    </div>