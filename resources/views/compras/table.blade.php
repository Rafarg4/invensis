 <div class="table-responsive" style="padding:15px;font-size: 12px;">
    <table class="table" id="table">
        <thead>
        <tr>
            <th>Proveedor</th>
        <th>Fecha Compra</th>
        <th>Tipo Comprobante</th>
        <th>Numero Comprobante</th>
        <th>Total</th>
        <th>Iva</th>
        <th>Forma Pago</th>
        <th>Condicion Compra</th>
        <th>Estado</th>
        <th>Id Caja</th>
        <th>Observacion</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($compras as $compra)
            <tr>
                <td>{{ $compra->id_proveedor }}</td>
            <td>{{ $compra->fecha_compra }}</td>
            <td>{{ $compra->tipo_comprobante }}</td>
            <td>{{ $compra->numero_comprobante }}</td>
            <td>{{ $compra->total }}</td>
            <td>{{ $compra->iva }}</td>
            <td>{{ $compra->forma_pago }}</td>
            <td>{{ $compra->condicion_compra }}</td>
            <td>{{ $compra->estado }}</td>
            <td>{{ $compra->id_caja }}</td>
            <td>{{ $compra->observacion }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['compras.destroy', $compra->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('compras.show', [$compra->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('compras.edit', [$compra->id]) }}"
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
