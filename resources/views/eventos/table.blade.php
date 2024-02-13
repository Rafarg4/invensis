<div class="table-responsive" style="padding:15px;">
    <table class="table" id="tables">
        <thead>
        <tr>
            <th>Nombre</th>
        <th>Fecha</th>
        <th>Lugar</th>
        <th>Modalidad</th>
        <th>Distancia</th>
        <th>Organiza</th>
        <th>Cupos</th>
        <th>Estado</th>
        <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($eventos as $evento)
            <tr>
                <td>{{ $evento->nombre }}</td>
            <td>{{ $evento->fecha }}</td>
            <td>{{ $evento->lugar }}</td>
            <td>{{ $evento->modalidad }}</td>
            <td>{{ $evento->distancia }}</td>
            <td>{{ $evento->organiza }}</td>
            <td>{{ $evento->cupos }}</td>
            <td>{{ $evento->estado }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['eventos.destroy', $evento->id], 'method' => 'delete']) !!}
                    @if(Auth::user()->hasRole('super_admin'))
                    <div class='btn-group'>
                        <a href="{{ route('eventos.show', [$evento->id]) }}"
                           class='btn btn-primary btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                    </div>
                        @canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
                    <div class='btn-group'>
                        <a href="{{ route('eventos.edit', [$evento->id]) }}"
                           class='btn btn-warning btn-sm'>
                            <i class="far fa-edit"></i>
                        </a>
                    </div>
                       <div class='btn-group'>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                        @endcan
                    @else
                    </div>
                    <div class='btn-group'>
                        <button type="button" class='btn btn-primary btn-sm' onclick="window.location='{{ route('eventos.show', [$evento->id]) }}'">
                             <i class="far fa-eye"></i>
                        </button>
                    </div>
                    @endif
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
