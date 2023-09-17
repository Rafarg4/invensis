<div class="row">
<div class="form-group col-md-3">
    <label for="documento_pago">Documento de pago:</label>
    <a href="{{ route('documento.download_pago', $documento->id) }}" target="_blank">
        <img src="/pdf.jpg" width="25" height="25">
    </a>
</div>

<div class="form-group col-md-3">
    <label for="documento_inscripcion">Documento de Inscripción:</label>
    <a href="{{ route('documento.download_inscripcion', $documento->id) }}" target="_blank">
        <img src="/pdf.jpg" width="25" height="25">
    </a>
</div>

<div class="form-group col-md-3">
    <label for="documento_seguro_medico">Documento de seguro médico:</label>
    <a href="{{ route('documento.download_seguro', $documento->id) }}" target="_blank">
        <img src="/pdf.jpg" width="25" height="25">
    </a>
</div>

<div class="form-group col-md-3">
    <label for="documento_certificado_medico">Documento de certificado médico:</label>
    <a href="{{ route('documento.download_certificado', $documento->id) }}" target="_blank">
        <img src="/pdf.jpg" width="25" height="25">
    </a>
</div>

<div class="form-group col-md-3">
    <label for="documento_copia_cedula">Documento de copia de cédula:</label>
    <a href="{{ route('documento.download_copia', $documento->id) }}" target="_blank">
        <img src="/pdf.jpg" width="25" height="25">
    </a>
</div>

<div class="form-group col-md-3">
    <label for="estado">Estado:</label>
    @switch(true)
            @case($documento->estado == 'En espera')
            <span class="badge badge-primary"> {{ $documento->estado }} </span>
            @break
            @case($documento->estado == 'Paralizado')
            <span class="badge badge-warning"> {{ $documento->estado }} </span>
            @break
            @case($documento->estado == 'Verificado' )
            <span class="badge badge-success"> {{ $documento->estado }} </span>
            @break
            @endswitch
</div>
</div>