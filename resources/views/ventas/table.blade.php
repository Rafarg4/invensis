 <div class="table-responsive" style="padding:15px;font-size: 12px;">
    <table class="table" id="table">
        <thead>
        <tr>
            <th>Cliente</th>
        <th>Fecha Venta</th>
        <th>Cajero</th>
        <th>Tipo Comprobante</th>
        <th>Numero Comprobante</th>
        <th>Total</th>
        <th>Iva</th>
        <th>Forma Pago</th>
        <th>Estado</th>
        <th>Observacion</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ventas as $venta)
            <tr>
            <td>{{ $venta->nombre }} {{ $venta->apellido }}</td>
            <td>{{ $venta->fecha_venta }}</td>
            <td>{{ $venta->id_usuario }}</td>
            <td>{{ $venta->tipo_comprobante }}</td>
            <td>{{ $venta->numero_comprobante }}</td>
            <td>{{ number_format($venta->total) }}</td>
            <td>{{ $venta->iva }}%</td>
            <td>{{ $venta->forma_pago }}</td>
            <td>{{ $venta->estado }}</td>
            <td>{{ $venta->observacion }}</td>
                <td width="120">
                    @if($venta->tipo_comprobante=='Recibo')
                    <a href="{{ route('comprobante.generar', $venta->id) }}" class="btn btn-primary btn-sm" target="_blank">
                        <i class="fas fa-file-pdf"></i>
                    </a>
                    @elseif($venta->tipo_comprobante=='Factura')
                    <a href="{{ route('generar_factura', $venta->id) }}" class="btn btn-primary btn-sm" target="_blank">
                        <i class="fas fa-file-pdf"></i>
                    </a>
                    @endif
                @if($venta->estado=='Activo')
                   <form action="{{ route('ventas.anular', $venta->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas anular esta venta?');" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-ban"></i> 
                        </button>
                    </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
