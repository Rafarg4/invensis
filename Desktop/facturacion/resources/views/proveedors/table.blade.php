 <div class="table-responsive" style="padding:15px;font-size: 12px;">
    <table class="table" id="table">
        <thead>
        <tr>
            <th>Nombre</th>
        <th>Apellido</th>
        <th>Ci</th>
        <th>Correo</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Compania</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($proveedors as $proveedor)
            <tr>
                <td>{{ $proveedor->nombre }}</td>
            <td>{{ $proveedor->apellido }}</td>
            <td>{{ $proveedor->ci }}</td>
            <td>{{ $proveedor->correo }}</td>
            <td>{{ $proveedor->direccion }}</td>
            <td>{{ $proveedor->telefono }}</td>
            <td>{{ $proveedor->compania }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['proveedors.destroy', $proveedor->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('proveedors.show', [$proveedor->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('proveedors.edit', [$proveedor->id]) }}"
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
