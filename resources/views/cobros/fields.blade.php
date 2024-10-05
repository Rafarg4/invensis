<!-- Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_cliente', 'Cliente:') !!}
    {!! Form::select('id_cliente', $clientes, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un cliente']) !!}
</div>

<!-- Monto Cobro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monto_cobro', 'Monto Cobrado:') !!}
    {!! Form::number('monto_cobro', null, ['class' => 'form-control', 'step' => '0.01', 'placeholder' => 'Ingrese el monto cobrado']) !!}
</div>

<!-- Fecha Cobro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_cobro', 'Fecha de Cobro:') !!}
    {!! Form::date('fecha_cobro', \Carbon\Carbon::now()->format('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<!-- Usuario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usuario', 'Usuario que realizó el cobro:') !!}
    {!! Form::text('usuario', Auth::user()->name, ['class' => 'form-control', 'readonly' => true]) !!}
</div>
