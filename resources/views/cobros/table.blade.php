<div class="table-responsive" style="padding:15px;font-size: 12px;">
    <table class="table" id="table">
        <thead>
        <tr>
            <th>Cliente</th>
        <th>Venta</th>
        <th>Fecha Cobro</th>
        <th>Cajero</th>
        <th>Observacion</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cobros as $cobro)
            <tr>
                <td>{{ $cobro->ci }} - {{ $cobro->nombre }} {{ $cobro->apellido }}</td>
            <td>Nro comprobante: {{ $cobro->numero_comprobante }} - Total: {{ number_format($cobro->total) }}</td>
            <td>{{ $cobro->fecha_cobro }}</td>
            <td>{{ $cobro->name }}</td>
            <td>{{ $cobro->observacion }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['cobros.destroy', $cobro->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cobro_recibo', $cobro->id) }}" class="btn btn-primary btn-sm" target="_blank">
                        <i class="fas fa-file-pdf"></i>
                    </a>
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
