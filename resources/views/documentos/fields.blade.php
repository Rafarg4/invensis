  <div class="form-group col-sm-12">
                {!! Form::label('id_inscripcion', 'Inscripto:') !!}
                {!! Form::select('id_inscripcion', $inscripcions, null, ['class' => 'form-control custom-select','placeholder'=>'Selecione una opcion','required']) !!}
            </div>
<div class="form-group col-sm-6">
              {!! Form::label('archivo_pago', 'Comprobante de pago:') !!}
            <div class="input-group">
            <div class="custom-file">
            {!! Form::file('archivo_pago', null, ['class' => 'form-control', 'id' => 'archivo_pago','required']) !!}
            <label class="custom-file-label" for="archivo_pago">Seleccionar Archivo</label>
            </div>

            </div>
            </div>
<!-- Archivo Inscripcion Field -->
<div class="form-group col-sm-6">
              {!! Form::label('archivo_inscripcion', 'Comprobante de firma de documento:') !!}
            <div class="input-group">
            <div class="custom-file">
            {!! Form::file('archivo_inscripcion', null, ['class' => 'form-control', 'id' => 'archivo_inscripcion','required']) !!}
            <label class="custom-file-label" for="archivo_inscripcion">Seleccionar Archivo</label>
            </div>

            </div>
            </div>

            