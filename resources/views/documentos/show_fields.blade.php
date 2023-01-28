<!-- Archivo Pago Field -->
<div class="col-sm-12">
    {!! Form::label('archivo_pago', 'Archivo Pago:') !!}
    <p>{{ $documento->archivo_pago }}</p>
</div>

<!-- Archivo Inscripcion Field -->
<div class="col-sm-12">
    {!! Form::label('archivo_inscripcion', 'Archivo Inscripcion:') !!}
    <p>{{ $documento->archivo_inscripcion }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Creado:') !!}
    <p>{{ $documento->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Actualizado:') !!}
    <p>{{ $documento->updated_at }}</p>
</div>

