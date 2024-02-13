@if(Auth::user()->hasRole('super_admin'))
  <div class="form-group col-sm-6">
                {!! Form::label('id_inscripcion', 'Inscripto:') !!}
                {!! Form::select('id_inscripcion', $inscripcions, null, ['class' => 'form-control custom-select','placeholder'=>'Selecione una opcion','required']) !!}
            </div>
 @else
             <div class="form-group col-sm-6">
                 {!! Form::label('id_inscripcion', 'Inscripto:') !!}
                {!! Form::select('id_inscripcion', $inscripcions, null, ['class' => 'form-control custom-select','required']) !!}
                </div>
@endif
<div class="form-group col-sm-6">
      {!! Form::label('id_tarifa', 'Tipo de pago:') !!}
      {!! Form::select('id_tarifa', $tarifas, null, ['class' => 'form-control custom-select','placeholder'=>'Selecione una opcion','required']) !!}
</div>
<!-- Comprobante Field -->
<div class="form-group col-sm-6">
            {!! Form::label('comprobante', 'Comprobante de pago:') !!}
            <div class="input-group">
            <div class="custom-file">
            <input type="file" id="comprobante" name="comprobante" required >
            <label class="custom-file-label" for="comprobante">Seleccionar Archivo</label>
            </div>
            </div>
             @if(isset($pago->comprobante))
            <img src="/pdf.jpg" width="40" height="40"></a>
            @endif
            </div>
<!-- Forma pago Field -->
<div class="form-group col-sm-6">
    {!! Form::label('forma_pago', 'Forma de pago:') !!}
    {!! Form::select('forma_pago',array('Transferencia' => 'Transferencia', 'Giro' => 'Giro','Deposito' => 'Deposito','Deposito' => 'Deposito'),null, ['class' => 'form-control','placeholder'=>'Seleccione','required'])!!}
</div>
@if(Auth::user()->hasRole('super_admin'))
<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::select('estado',array('En espera' => 'En espera', 'Rechazado' => 'Rechazado','Verificado' => 'Verificado'),null, ['class' => 'form-control','placeholder'=>'Seleccione','required'])!!}
</div>
@else
<div class="form-group col-sm-6">
    <label for="estado">Estado:</label>
    <input type="text" name="estado" class="form-control" value="En espera" readonly>
</div>
@endif
<!-- Observacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observacion', 'Observacion:') !!}
    {!! Form::text('observacion', null, ['class' => 'form-control']) !!}
</div>
<!-- Tipo Pago Field -->
<div class="form-group col-sm-6">
    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
</div>