<div class="table-responsive" style="padding:15px;">
    <table class="table" id="table">
        <thead>
        <tr>
        <th>Ci Inscripto</th>
        <th>Nombre y Apellido</th>
        <th>Pago</th>
        <th>Inscripcion</th>
        <th> Seguro medico</th>
        <th>Certificado medico</th>
        <th> Copia de cedula</th>
        <th>Estado</th>
            <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($documentos as $documento)
            <tr>
                <td>{{ $documento->inscripto->ci  ?? 'Inscripto no asignada' }}</td>
                <td>{{ $documento->inscripto->primer_y_segundo_nombre  ?? 'Inscripto no asignada' }} {{ $documento->inscripto->primer_y_segundo_apellido  ?? 'Inscripto no asignada' }}</td>
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
                            <td width="120">
                    {!! Form::open(['route' => ['documentos.destroy', $documento->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('documentos.show', [$documento->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        @canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
                        <a href="{{ route('documentos.edit', [$documento->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>@endcan
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
