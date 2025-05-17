<div class="table-responsive" style="padding:15px;font-size: 12px;">
    <table class="table" id="table">
        <thead>
        <tr>
            <th>Proveedor</th>
        <th>Fecha</th>
        <th>Total</th>
        <th>Estado</th>
            <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->ci }} - {{ $pedido->nombre}} {{ $pedido->apellido }}</td>
            <td>{{ $pedido->fecha }}</td>
            <td>{{ number_format($pedido->total) }}</td>
           <td>
                @if($pedido->estado === 'Anulado')
                    <span style="background-color: #f8d7da; color: #721c24; padding: 3px 8px; border-radius: 5px;">
                        {{ $pedido->estado }}
                    </span>
               @elseif($pedido->estado === 'Pendiente')
                    <span style="background-color: #fff3cd; color: #856404; padding: 3px 8px; border-radius: 5px;">
                        {{ $pedido->estado }}
                    </span>
                @elseif($pedido->estado === 'Aplicado')
                    <span style="background-color: #d4edda; color: #155724; padding: 3px 8px; border-radius: 5px;">
                        {{ $pedido->estado }}
                    </span>
                @else
                    {{ $pedido->estado }}
                @endif
            </td>
                <td width="120">
                    {!! Form::open(['route' => ['pedidos.destroy', $pedido->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('pedidos.show', [$pedido->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        @if($pedido->estado === 'Anulado' && $pedido->estado=='Aplicado')
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endif
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
