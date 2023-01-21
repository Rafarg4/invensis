<div class="table-responsive" style="padding:15px;">
    <table class="table" id="Table">
        <thead>
        <tr>
            <th>Inscripto</th>
            <th>Archivo Pago</th>
        <th>Archivo Inscripcion</th>
        <th>Archivo Seguro medico</th>
        <th>Estado</th>
            <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($documentos as $documento)
            <tr>
                <td>{{ $documento->inscripto->primer_nombre }}</td>
                <td><a href="{{route('documento.download',$documento->id)}}"><img src="{{ asset('storage').'/'.$documento->archivo_pago}}" width="50" height="50"></a></td>
            <td><img src="{{ asset('storage').'/'.$documento->archivo_inscripcion}}" width="50" height="50"></td>
            <td><img src="{{ asset('storage').'/'.$documento->archivo_seguro_medico}}" width="50" height="50"></td>
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
                        <a href="{{ route('documentos.edit', [$documento->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
