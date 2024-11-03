<div class="table-responsive" style="padding:15px;font-size: 12px;">
    <table class="table" id="table">
        <thead>
            <tr>
                <th>Número de Préstamo</th>
                <th>Id Cliente</th>
                <th>Monto</th>
                <th>Zona</th>
                <th>Fecha Inicio</th>
                <th>Fecha Pago</th>
                <th>Cantidad Cuota</th>
                <th>Tipo Prestamo</th>
                <th>Frecuencia de Pago</th> <!-- Nueva columna para frecuencia de pago -->
                <th>Interés por Mora (%)</th>
                <th>Monto Mora Acumulado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($prestamos as $prestamo)
            <tr>
                <td>{{ $prestamo->numero_prestamo }}</td>
                <td>{{ $prestamo->cliente ? $prestamo->cliente->nombre : 'Cliente no asignado' }}</td> <!-- Verificación para evitar error -->
                <td>{{ number_format((float) $prestamo->monto, 0, ',', '.') }}</td>
                <td>{{ $prestamo->zona }}</td>
                <td>{{ $prestamo->fecha_inicio }}</td>
                <td>{{ $prestamo->fecha_pago }}</td>
                <td>{{ $prestamo->cantidad_cuota }}</td>
                <td>{{ $prestamo->tipo_prestamo }}</td>
                <td>{{ $prestamo->frecuencia_pago }}</td> <!-- Mostrar frecuencia de pago -->
                <td>{{ number_format((float) $prestamo->interes, 2, ',', '.') }}</td>
                <td>{{ number_format((float) $prestamo->monto_mora_acumulado, 2, ',', '.') }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['prestamos.destroy', $prestamo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('prestamos.show', [$prestamo->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('prestamos.edit', [$prestamo->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        <a href="{{ route('prestamos.downloadPdf', [$prestamo->id]) }}" class='btn btn-default btn-xs'>
                            <i class="fas fa-file-pdf"></i> Descargar PDF
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Está seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

