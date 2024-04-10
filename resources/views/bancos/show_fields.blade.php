<!-- Nombre Cuenta Field -->
<div class="col-sm-12">
    {!! Form::label('nombre_cuenta', 'Nombre Cuenta:') !!}
    <p>{{ $banco->nombre_cuenta }}</p>
</div>

<!-- Ci Ruc Field -->
<div class="col-sm-12">
    {!! Form::label('ci_ruc', 'Ci Ruc:') !!}
    <p>{{ $banco->ci_ruc }}</p>
</div>

<!-- Banco Field -->
<div class="col-sm-12">
    {!! Form::label('banco', 'Banco:') !!}
    <p>{{ $banco->banco }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $banco->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $banco->updated_at }}</p>
</div>

