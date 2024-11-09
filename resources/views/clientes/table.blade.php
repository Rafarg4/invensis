 <div class="table-responsive" style="padding:15px;font-size: 12px;">
    <table class="table" id="table">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Ci Numero</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Ciudad</th>
            <th>Pais</th>
            <th>Mapa</th> <!-- Aquí se mantendrá la columna "Mapa" -->
            <th>Acciones</th> <!-- Este encabezado se mantiene para otras acciones -->
        </tr>
        </thead>
        <tbody>
        @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->apellido }}</td>
                <td>{{ $cliente->ci_numero }}</td>
                <td>{{ $cliente->direccion }}</td>
                <td>{{ $cliente->telefono }}</td>
                <td>{{ $cliente->ciudad }}</td>
                <td>{{ $cliente->pais }}</td>
                <!-- Modificar la columna "Mapa" para que muestre el botón "Ver Mapa" -->
                <td>
                    @if($cliente->mapa)
                        <a href="{{ $cliente->mapa }}" target="_blank" class="btn btn-primary btn-xs">
                           <i class="fa fa-map" aria-hidden="true"></i>
                        </a>
                    @endif
                </td>
        
                <td width="120"> <!-- Botones de acciones existentes -->
                    <div class='btn-group'>
                        <a href="{{ route('clientes.show', [$cliente->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('clientes.edit', [$cliente->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::open(['route' => ['clientes.destroy', $cliente->id], 'method' => 'delete']) !!}
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        {!! Form::close() !!}
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
