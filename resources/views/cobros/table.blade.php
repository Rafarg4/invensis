<div class="table-responsive">
    <table class="table" id="cobros-table">
        <thead>
        <tr>
            <th>Id Cliente</th>
        <th>Monto Cobro</th>
        <th>Fecha Cobro</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cobros as $cobro)
            <tr>
                <td>{{ $cobro->id_cliente }}</td>
            <td>{{ $cobro->monto_cobro }}</td>
            <td>{{ $cobro->fecha_cobro }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['cobros.destroy', $cobro->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cobros.show', [$cobro->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('cobros.edit', [$cobro->id]) }}"
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
