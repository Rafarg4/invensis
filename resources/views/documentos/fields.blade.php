<div class="form-group col-sm-6">
                <label for="id_user">Identificador:</label>
                <input type="text" name="id_user" class="form-control" value="{{ Auth::user()->id }}" readonly>
                </div>
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
              {!! Form::label('archivo_pago', 'Comprobante de pago:') !!}
            <div class="input-group">
            <div class="custom-file">
            {!! Form::file('archivo_pago', null, ['class' => 'form-control', 'id' => 'archivo_pago','required']) !!}
            <label class="custom-file-label" for="archivo_pago">Seleccionar Archivo</label>
            </div>
            </div>
             @if(isset($documento->archivo_pago))
            <img src="/pdf.jpg" width="40" height="40"></a>
            @endif
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
            @if(isset($documento->archivo_inscripcion))
           <img src="/pdf.jpg" width="40" height="40"></a>
            @endif
            </div>
<!-- Archivo Inscripcion Field -->
<div class="form-group col-sm-6">
              {!! Form::label('archivo_seguro_medico', 'Firma de seguro medico:') !!}
            <div class="input-group">
            <div class="custom-file">
            {!! Form::file('archivo_seguro_medico', null, ['class' => 'form-control', 'id' => 'archivo_seguro_medico','required']) !!}
            <label class="custom-file-label" for="archivo_seguro_medico">Seleccionar Archivo</label>
            </div>
        </div>
        @if(isset($documento->archivo_seguro_medico))
            <img src="/pdf.jpg" width="40" height="40"></a>
            @endif
    </div>
        <!-- Archivo Inscripcion Field -->
<div class="form-group col-sm-6">
              {!! Form::label('archivo_copia_cedula', 'Copia de cedula:') !!}
            <div class="input-group">
            <div class="custom-file">
            {!! Form::file('archivo_copia_cedula', null, ['class' => 'form-control', 'id' => 'archivo_copia_cedula','required']) !!}
            <label class="custom-file-label" for="archivo_copia_cedula">Seleccionar Archivo</label>
            </div>
        </div>
        @if(isset($documento->archivo_copia_cedula))
            <img src="/pdf.jpg" width="40" height="40"></a>
            @endif
    </div>
    <!-- Archivo Inscripcion Field -->
<div class="form-group col-sm-6">
              {!! Form::label('archivo_certificado_medico', 'Certificado medico:') !!}
            <div class="input-group">
            <div class="custom-file">
            {!! Form::file('archivo_certificado_medico', null, ['class' => 'form-control', 'id' => 'archivo_certificado_medico','required']) !!}
            <label class="custom-file-label" for="archivo_certificado_medico">Seleccionar Archivo</label>
            </div>
        </div>
        @if(isset($documento->archivo_certificado_medico))
            <img src="/pdf.jpg" width="40" height="40"></a>
            @endif
    </div>
    
            @if(Auth::user()->hasRole('super_admin'))
             <div class=" form-group col-sm-6">
             {!! Form::label('estado', 'Estado:') !!}
            {!! Form::select('estado',array('En espera' => 'En espera', 'Paralizado' => 'Paralizado','Verificado' => 'Verificado'),null, ['class' => 'form-control','placeholder'=>'Seleccione','required'])!!}
            </div>
            @else
             <div class="form-group col-sm-6">
                <label for="estado">Estado:</label>
                <input type="text" name="estado" class="form-control" value="En espera" readonly>
                </div>
            @endif

            