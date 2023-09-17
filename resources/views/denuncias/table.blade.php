<div class="table-responsive">
    <table class="table" id="denuncias-table">
        <thead>
        <tr>
            <th>Descripcion</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($denuncias as $denuncia)
            <tr>
                <td>{{ $denuncia->descripcion }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['denuncias.destroy', $denuncia->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('denuncias.show', [$denuncia->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('denuncias.edit', [$denuncia->id]) }}"
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
