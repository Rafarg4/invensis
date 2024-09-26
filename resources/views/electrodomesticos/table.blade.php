<div class="table-responsive">
    <table class="table" id="electrodomesticos-table">
        <thead>
        <tr>
            <th>Nombre</th>
        <th>Marca</th>
        <th>Precio</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($electrodomesticos as $electrodomestico)
            <tr>
                <td>{{ $electrodomestico->nombre }}</td>
            <td>{{ $electrodomestico->marca }}</td>
            <td>{{ $electrodomestico->precio }}</td>
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
