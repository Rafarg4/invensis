<div class="table-responsive">
    <table class="table" id="prestamos-table">
        <thead>
            <tr>
                <th>Id Cliente</th>
                <th>Monto</th>
                <th>Fecha Inicio</th>
                <th>Fecha Pago</th>
                <th>Fecha Vencimiento</th> <!-- Añadir esta línea -->
                <th>Cantidad Cuota</th>
                <th>Tipo Prestamo</th>
                <th>Dias Mora</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($prestamos as $prestamo)
            <tr>
                <td>{{ $prestamo->id_cliente }}</td>
                <td>{{ $prestamo->monto }}</td>
                <td>{{ $prestamo->fecha_inicio }}</td>
                <td>{{ $prestamo->fecha_pago }}</td>
                <td>{{ $prestamo->fecha_vencimiento }}</td> <!-- Añadir esta línea -->
                <td>{{ $prestamo->cantidad_cuota }}</td>
                <td>{{ $prestamo->tipo_prestamo }}</td>
                <td>{{ $prestamo->dias_mora }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['prestamos.destroy', $prestamo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('prestamos.show', [$prestamo->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('prestamos.edit', [$prestamo->id]) }}" class='btn btn-default btn-xs'>
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

