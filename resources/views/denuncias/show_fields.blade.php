<!-- Descripcion Field -->
<div class="col-sm-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{{ $denuncia->descripcion }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $denuncia->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $denuncia->updated_at }}</p>
</div>

