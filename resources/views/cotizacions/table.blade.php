 <div class="table-responsive" style="padding:15px;font-size: 12px;">
    <table class="table" id="table">
        <thead>
        <tr>
            <th>Tipo Moneda</th>
        <th>Compra</th>
        <th>Venta</th>
            <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cotizacions as $cotizacion)
            <tr>
                <td>{{ $cotizacion->tipo_moneda }}</td>
            <td>{{ $cotizacion->compra }}</td>
            <td>{{ $cotizacion->venta }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['cotizacions.destroy', $cotizacion->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cotizacions.show', [$cotizacion->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('cotizacions.edit', [$cotizacion->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
