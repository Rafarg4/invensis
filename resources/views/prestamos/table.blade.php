<div class="table-responsive">
    <table class="table" id="prestamos-table">
        <thead>
        <tr>
            <th>Id Cliente</th>
        <th>Monto</th>
        <th>Fecha Inicio</th>
        <th>Fecha Pago</th>
        <th>Fecha Vencimineto</th>
        <th>Cantidad Cuota</th>
        <th>Tipo Prestamo</th>
        <th>Dias Mora</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($prestamos as $prestamos)
            <tr>
                <td>{{ $prestamos->id_cliente }}</td>
            <td>{{ $prestamos->monto }}</td>
            <td>{{ $prestamos->fecha_inicio }}</td>
            <td>{{ $prestamos->fecha_pago }}</td>
            <td>{{ $prestamos->fecha_vencimineto }}</td>
            <td>{{ $prestamos->cantidad_cuota }}</td>
            <td>{{ $prestamos->tipo_prestamo }}</td>
            <td>{{ $prestamos->dias_mora }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['prestamos.destroy', $prestamos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('prestamos.show', [$prestamos->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('prestamos.edit', [$prestamos->id]) }}"
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
