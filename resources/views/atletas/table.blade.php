  <div class="table-responsive" style="padding:15px;font-size: 12px;">
    <table class="table" id="tables">
        <thead>
        <tr>
        <th>Evento</th>
        <th>Ci</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Sexo</th>
        <th>Celular</th>
        <th>Ciudad</th>
        <th>Departamento</th>
        <th>Categoria</th>
        <th>Tipo Categoria</th>
        <th>Modo</th>
            <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($atletas as $atleta)
            <tr>
             <td>{{ $atleta->evento->nombre ?? 'Sin datos' }}</td>
            <td>{{ $atleta->ci ?? 'Sin datos'}}</td>
            <td>{{ $atleta->nombres ?? 'Sin datos'}}</td>
            <td>{{ $atleta->apellidos ?? 'Sin datos'}}</td>
            <td>{{ $atleta->sexo ?? 'Sin datos'}}</td>
            <td>{{ $atleta->celular ?? 'Sin datos'}}</td>
            <td>{{ $atleta->ciudad ?? 'Sin datos'}}</td>
            <td>{{ $atleta->departamento ?? 'Sin datos'}}</td>
            <td>{{ $atleta->categoria ?? 'Sin datos'}}</td>
            <td>{{ $atleta->tipo_categoria ?? 'Sin datos'}}</td>
            <td>{{ $atleta->modo ?? 'Sin datos'}}</td>
                <td width="120">
                    {!! Form::open(['route' => ['atletas.destroy', $atleta->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('atletas.show', [$atleta->id]) }}"
                           class='btn btn-primary btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                    </div>
                        @canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
                    <div class='btn-group'>
                        <a href="{{ route('atletas.edit', [$atleta->id]) }}"
                           class='btn btn-warning btn-sm'>
                            <i class="far fa-edit"></i>
                        </a>
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
