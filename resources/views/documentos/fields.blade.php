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
            {!! Form::label('copia_cedula_fpc', 'Copia de cedula:') !!}
            <div class="input-group">
            <div class="custom-file">
            <input type="file" id="copia_cedula_fpc" name="copia_cedula_fpc" required >
            <label class="custom-file-label" for="copia_cedula_fpc">Seleccionar Archivo</label>
            </div>
            </div>
             @if(isset($documento->copia_cedula_fpc))
            <img src="/pdf.jpg" width="40" height="40"></a>
            @endif
            </div>
            <div class="form-group col-sm-6">
            {!! Form::label('firma_registro_fpc', 'Firma de registro FPC:') !!}
            <div class="input-group">
            <div class="custom-file">
            <input type="file" id="firma_registro_fpc" name="firma_registro_fpc" required >
            <label class="custom-file-label" for="firma_registro_fpc">Seleccionar Archivo</label>
            </div>
            </div>
             @if(isset($documento->firma_registro_fpc))
            <img src="/pdf.jpg" width="40" height="40"></a>
            @endif
            </div>
<!-- Archivo Inscripcion Field -->
<div class="form-group col-sm-6">
              {!! Form::label('archivo_inscripcion', 'Firma de inscripcion:') !!}
            <div class="input-group">
            <div class="custom-file">
            <input type="file" id="archivo_inscripcion" name="archivo_inscripcion" required >
            <label class="custom-file-label" for="archivo_inscripcion">Seleccionar Archivo</label>
            </div>
            </div>
            @if(isset($documento->archivo_inscripcion))
           <img src="/pdf.jpg" width="40" height="40"></a>
            @endif
            </div>
<!-- Para que no le muestre el seguro si es solo de un dia-->
@if($tipo_licencia[0]=="Anual")
<!-- Archivo Inscripcion Field -->
<div class="form-group col-sm-6">
              {!! Form::label('archivo_seguro_medico', 'Firma de seguro medico o deslinde de seguro privado:') !!}
            <div class="input-group">
            <div class="custom-file">
            <input type="file" id="archivo_seguro_medico" name="archivo_seguro_medico" >
            <label class="custom-file-label" for="archivo_seguro_medico">Seleccionar Archivo</label>
            </div>
        </div>
        @if(isset($documento->archivo_seguro_medico))
            <img src="/pdf.jpg" width="40" height="40"></a>
            @endif
    </div>
@endif
   
        <!-- Archivo Inscripcion Field -->
<div class="form-group col-sm-6">
              {!! Form::label('archivo_copia_cedula', 'Copia de cedula de beneficairio:') !!}
            <div class="input-group">
            <div class="custom-file">
            <input type="file" id="archivo_copia_cedula" name="archivo_copia_cedula" required >
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
           <input type="file" id="archivo_certificado_medico" name="archivo_certificado_medico" required >
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

            