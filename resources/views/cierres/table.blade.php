<div class="table-responsive">
    <table class="table" id="cierres-table">
        <thead>
        <tr>
            <th>Id Cobrador</th>
        <th>Monto Cierre</th>
        <th>Fecha Cierre</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cierres as $cierre)
            <tr>
                <td>{{ $cierre->id_cobrador }}</td>
            <td>{{ $cierre->monto_cierre }}</td>
            <td>{{ $cierre->fecha_cierre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['cierres.destroy', $cierre->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cierres.show', [$cierre->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('cierres.edit', [$cierre->id]) }}"
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
