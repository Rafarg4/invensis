<div class="table-responsive" style="padding:15px;">
    <table class="table" id="tabla">
        <thead>
        <tr>
            <th>Ci Inscripto</th>
            <th>Pago</th>
        <th>Inscripcion</th>
        <th> Seguro medico</th>
        <th>Certificado medico</th>
        <th> Copia de cedula</th>
        <th>Estado</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $documento->inscripto->ci }}</td>
                <td><a href="{{route('documento.download_pago',$documento->id)}}"><img src="/pdf.jpg" width="40" height="40"></a></td>
            <td><a href="{{route('documento.download_inscripcion',$documento->id)}}"><img src="pdf.jpg" width="40" height="40"></a></td>
            <td><a href="{{route('documento.download_seguro',$documento->id)}}"><img src="/pdf.jpg" width="40" height="40"></a></td>
            <td><a href="{{route('documento.download_certificado',$documento->id)}}"><img src="/pdf.jpg" width="40" height="40"></a></td>
            <td><a href="{{route('documento.download_copia',$documento->id)}}"><img src="/pdf.jpg" width="40" height="40"></a></td>
             <td>@switch(true)
            @case($documento->estado == 'En espera')
            <span class="badge badge-primary"> {{ $documento->estado }} </span>
            @break
            @case($documento->estado == 'Paralizado')
            <span class="badge badge-warning"> {{ $documento->estado }} </span>
            @break
            @case($documento->estado == 'Verificado' )
            <span class="badge badge-success"> {{ $documento->estado }} </span>
            @break
            @endswitch</td>
                          
            </tr>
        </tbody>
    </table>
</div>
