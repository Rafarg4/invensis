<!-- Nombre Cuenta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_cuenta', 'Nombre Cuenta:') !!}
    {!! Form::text('nombre_cuenta', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Ci Ruc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ci_ruc', 'CI/Ruc:') !!}
    {!! Form::text('ci_ruc', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Banco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('banco', 'Banco:') !!}
    {!! Form::text('banco', null, ['class' => 'form-control', 'required']) !!}
</div>