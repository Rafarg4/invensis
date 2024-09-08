    <div class="table-responsive" style="padding:15px;font-size: 12px;">
    <table class="table" id="table">
        <thead>
        <tr>
        <th>Nombre</th>
         <th>Edad desde</th>
          <th>Edad hasta</th>
          <th>Modalidad</th>
            <th >Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->nombre }}</td>
            <td>{{ $categoria->edad_ini }}</td>
            <td>{{ $categoria->edad_fin }}</td>
            <td>{{ $categoria->modalidad->nombre ?? 'Sin asignar'}}</td>
                <td width="120">
                    {!! Form::open(['route' => ['categorias.destroy', $categoria->id], 'method' => 'delete']) !!}
                   <!-- <div class='btn-group'>
                        @canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
                        
                        <button type="button" class='btn btn-info btn-sm' onclick="window.location='{{ route('categorias.show', [$categoria->id]) }}'">
                            <i class="far fa-eye"></i>
                        </button>
                    </div>-->
                    <div class='btn-group'>
                        <button type="button" class='btn btn-warning btn-sm' onclick="window.location='{{ route('categorias.edit', [$categoria->id]) }}'">
                            <i class="far fa-edit"></i>
                        </button>
                    </div>
                     <div class='btn-group'>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                        @endcan
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
