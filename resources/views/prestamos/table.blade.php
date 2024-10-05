<div class="table-responsive">
    <table class="table" id="prestamos-table">
        <thead>
            <tr>
                <th>Id Cliente</th>
                <th>Monto</th>
                <th>Zona</th>
                <th>Fecha Inicio</th>
                <th>Fecha Pago</th>
                <th>Fechas de Vencimiento</th>
                <th>Cantidad Cuota</th>
                <th>Tipo Prestamo</th>
                <th>Días de Mora</th>
                <th>Interés por Mora (%)</th>
                <th>Monto Mora Acumulado</th> <!-- Nueva columna -->
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($prestamos as $prestamo)
            <tr>
                <td>{{ $prestamo->id_cliente }}</td>
                <td>{{ number_format((float) $prestamo->monto, 0, ',', '.') }}</td> <!-- Formato numérico -->
                <td>{{ $prestamo->zona }}</td>
                <td>{{ $prestamo->fecha_inicio }}</td>
                <td>{{ $prestamo->fecha_pago }}</td>
                <td>
                    @php
                        $fechas = is_array($prestamo->fechas_vencimiento) ? $prestamo->fechas_vencimiento : json_decode($prestamo->fechas_vencimiento, true);
                    @endphp
                    @if(is_array($fechas))
                        @foreach($fechas as $fecha)
                            <p>{{ $fecha }}</p>
                        @endforeach
                    @else
                        <p>No definido</p>
                    @endif
                </td>
                <td>{{ $prestamo->cantidad_cuota }}</td>
                <td>{{ $prestamo->tipo_prestamo }}</td>
                <td>{{ $prestamo->dias_mora }}</td>
                <td>{{ number_format((float) $prestamo->interes, 2, ',', '.') }}</td> <!-- Formatear el interés -->
                <!-- Mostrar el monto de mora acumulado correctamente -->
                <td>{{ number_format((float) $prestamo->monto_mora_acumulado, 2, ',', '.') }}</td> <!-- Mostrar monto mora acumulado -->
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

