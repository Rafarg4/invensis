<div class="table-responsive" style="padding:15px;">
    <table class="table" id="Table">
        <thead>
        <tr>
            <th>Inscripto</th>
            <th>Archivo Pago</th>
        <th>Archivo Inscripcion</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($documentos as $documento)
            <tr>
                <td>{{ $documento->inscripto->primer_nombre }}</td>
                <td><img src="{{ asset('storage').'/'.$documento->archivo_pago}}" width="50" height="50"></td>
            <td><img src="{{ asset('storage').'/'.$documento->archivo_inscripcion}}" width="50" height="50"></td>                <td width="120">
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
