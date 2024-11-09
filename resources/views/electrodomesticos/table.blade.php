 <div class="table-responsive" style="padding:15px;font-size: 12px;">
    <table class="table" id="table">
        <thead>
        <tr>
            <th>Nombre</th>
        <th>Marca</th>
        <th>Precio de compra</th>
        <th>Precio de venta</th>
            <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($electrodomesticos as $electrodomestico)
            <tr>
                <td>{{ $electrodomestico->nombre }}</td>
            <td>{{ $electrodomestico->marca }}</td>
            <td>{{ $electrodomestico->precio_compra }}</td>
             <td>{{ $electrodomestico->precio_venta }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['electrodomesticos.destroy', $electrodomestico->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('electrodomesticos.show', [$electrodomestico->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('electrodomesticos.edit', [$electrodomestico->id]) }}"
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
