<div class="tab-content">
<div class="tab-pane active" id="tab_1">
<div class="row">    
    <div class="form-group col-md-3">
    <label for="nombre">Nombre:</label>
    <input type="text" class="form-control" id="nombre" value="{{ $evento->nombre }}">
</div>     
    <div class="form-group col-md-3">
    <label for="fecha">Fecha:</label>
    <input type="text" class="form-control" id="fecha" value="{{ $evento->fecha}}">
</div>       
    <div class="form-group col-md-3">
    <label for="lugar">Lugar:</label>
    <input type="text" class="form-control" id="lugar" value="{{ $evento->lugar }}">
</div>    
    <div class="form-group col-md-3">
    <label for="modalidad">Modalidad:</label>
    <input type="text" class="form-control" id="modalidad" value="{{ $evento->modalidad }}">
</div>    
    <div class="form-group col-md-3">
    <label for="distancia">Distancia:</label>
    <input type="text" class="form-control" id="distancia" value="{{ $evento->distancia }}">
</div>    
    <div class="form-group col-md-3">
    <label for="organiza">Organiza:</label>
    <input type="text" class="form-control" id="organiza" value="{{ $evento->organiza }}">
</div>    
    <div class="form-group col-md-3">
    <label for="cupos">Cupos:</label>
    <input type="text" class="form-control" id="cupo" value="{{ $evento->cupos }}">
</div> 
    <div class="form-group col-md-3">
    <label for="cupos">Monto:</label>
    <input type="text" class="form-control" id="cupo" value="{{ number_format($evento->monto) }}">
</div>
 <div class="form-group col-md-3">
    <label for="estado">Recorrido CRI:</label>
    <input type="text" class="form-control" id="estado" value="{{ $evento->recorrido1 }}">
</div>
 <div class="form-group col-md-3">
    <label for="estado">Url recorrido CRI:</label>
    <input type="text" class="form-control" id="estado" value="{{ $evento->url_cri }}">
</div>
 <div class="form-group col-md-3">
    <label for="estado">Recorrido de Ruta:</label>
    <input type="text" class="form-control" id="estado" value="{{ $evento->recorrido2 }}">
</div>
 <div class="form-group col-md-3">
    <label for="estado">Url de Ruta:</label>
    <input type="text" class="form-control" id="estado" value="{{ $evento->url_ruta }}">
</div>    
    <div class="form-group col-md-3">
    <label for="estado">Estado:</label>
    <input type="text" class="form-control" id="estado" value="{{ $evento->estado }}">
</div>    
    <div class="form-group col-md-3">
    <label for="creado">Creado:</label>
    <input type="text" class="form-control" id="creado" value="{{ $evento->created_at }}">
</div>
</div>
</div>
<div class="tab-pane" id="tab_2">
<div class="content px-3">
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
                         <td>{{ $atleta->evento->nombre ?? 'Sin datos'}}</td>
                        <td>{{ $atleta->ci }}</td>
                        <td>{{ $atleta->nombres }}</td>
                        <td>{{ $atleta->apellidos }}</td>
                        <td>{{ $atleta->sexo }}</td>
                        <td>{{ $atleta->celular }}</td>
                        <td>{{ $atleta->ciudad }}</td>
                        <td>{{ $atleta->departamento }}</td>
                        <td>{{ $atleta->nombre_categoria ?? 'Sin datos'}}</td>
                        <td>{{ $atleta->tipo_categoria }}</td>
                        <td>{{ $atleta->modo }}</td>
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
        </div>
    </div>
</div>