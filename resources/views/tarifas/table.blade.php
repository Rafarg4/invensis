<div class="table-responsive" style="padding:15px;">
    <table class="table" id="table">
        <thead>
        <tr>
        <th>Tipo Plan</th>
        <th>Precio de tarifa</th>
        <th>Descripcion</th>
            <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tarifas as $tarifa)
            <tr>
                <td>{{ $tarifa->tipo_plan }}</td>
            <td>{{ number_format($tarifa->tarifa) }}.Gs</td>
            <td>{{ $tarifa->descripcion }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['tarifas.destroy', $tarifa->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tarifas.show', [$tarifa->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('tarifas.edit', [$tarifa->id]) }}"
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
