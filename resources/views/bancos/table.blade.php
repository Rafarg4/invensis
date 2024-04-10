<div class="table-responsive" style="padding:15px;font-size: 12px;">
    <table class="table" id="table">
        <thead>
        <tr>
            <th>Nombre Cuenta</th>
        <th>CI/Ruc</th>
        <th>Banco</th>
            <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bancos as $banco)
            <tr>
                <td>{{ $banco->nombre_cuenta }}</td>
            <td>{{ $banco->ci_ruc }}</td>
            <td>{{ $banco->banco }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['bancos.destroy', $banco->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
                        <button type="button" class='btn btn-info btn-sm' onclick="window.location='{{ route('bancos.show', [$banco->id]) }}'">
                            <i class="far fa-eye"></i>
                        </button>
                    </div>
                    <div class='btn-group'>
                        <button type="button" class='btn btn-warning btn-sm' onclick="window.location='{{ route('bancos.edit', [$banco->id]) }}'">
                            <i class="far fa-edit"></i>
                        </button>
                    </div>
                     <div class='btn-group'>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                        @endcan
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
