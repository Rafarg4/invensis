  <div class="table-responsive" style="padding:15px;font-size: 12px;">
    <table class="table" id="tables">
        <thead>
        <tr>
        <th>Evento</th>
        <th>Ci</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Ciudad</th>
        <th>Categoria</th>
        <th>Tipo Categoria</th>
        <th>Modo</th>
        <th>Estado</th>
            <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($atletas as $atleta)
            <tr>
            <td>{{ $atleta->nombre_evento ?? 'Sin datos' }}</td>
            <td>{{ $atleta->ci ?? 'Sin datos'}}</td>
            <td>{{ $atleta->nombres ?? 'Sin datos'}}</td>
            <td>{{ $atleta->apellidos ?? 'Sin datos'}}</td>
            <td>{{ $atleta->ciudad ?? 'Sin datos'}}</td>
            <td>{{ $atleta->nombre_categoria ?? 'Sin datos'}}</td>
            <td>{{ $atleta->tipo_categoria ?? 'Sin datos'}}</td>
            <td>{{ $atleta->modo ?? 'Sin datos'}}</td>
            @if(Auth::user()->hasRole('super_admin'))
             <td>
            <div class="btn-group btn-group-sm" role="group">
            <button id="btnGroupDrop{{$atleta->id}}" type="button" class="btn btn-sm {{$atleta->estado == 'En espera' ? 'btn-warning' : ($atleta->estado == 'Verificado' ? 'btn-success' : ($atleta->estado == 'Rechazado' ? 'btn-danger' : 'btn-danger'))}} dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-id="{{$atleta->id}}" style="font-size: .575rem;">
                {{$atleta->estado}}
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop{{$atleta->id}}">
                @if ($atleta->estado != 'En espera')
                <a class="dropdown-item cambiar-estado" href="#" data-estado="En espera">En espera</a>
                @endif
                @if ($atleta->estado != 'Verificado')
                <a class="dropdown-item cambiar-estado" href="#" data-estado="Verificado">Verificado</a>
                @endif
                @if ($atleta->estado != 'Rechazado')
                <a class="dropdown-item cambiar-estado" href="#" data-estado="Rechazado">Rechazado</a>
                @endif
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('.cambiar-estado').on('click', function (e) {
                    e.preventDefault();
                    const nuevoEstado = $(this).data('estado');
                    const atletaId = $(this).closest('.btn-group').find('.btn').data('id'); // Obtener el ID de la inscripción del botón actual

                    // Realiza la solicitud AJAX para actualizar el estado solo para el registro correspondiente
                    $.ajax({
                        type: 'POST',
                        url: '{{ url("cambiar_estado_atleta", ["id" => ""]) }}/' + atletaId, // Utiliza una ruta sin ID aquí
                        data: {
                            estado: nuevoEstado,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (data) {
                            // Actualiza el botón desplegable con el nuevo estado
                            const boton = $('#btnGroupDrop' + atletaId);
                            boton.text(nuevoEstado);

                            // Cambia el color del botón en tiempo real
                            boton.removeClass().addClass('btn btn-sm dropdown-toggle');
                            if (nuevoEstado === 'En espera') {
                                boton.addClass('btn-warning');
                            } else if (nuevoEstado === 'Verificado') {
                                boton.addClass('btn-success');
                            } else if (nuevoEstado === 'Rechazado') {
                                boton.addClass('btn-danger');
                            } else if (nuevoEstado === 'Vencido') {
                                boton.addClass('btn-danger');
                            }

                            // Muestra un mensaje de éxito
                            $('#mensaje').text('Estado actualizado a ' + nuevoEstado).removeClass().addClass('alert alert-success').show();
                             // Cambia el ícono y el color del botón de acuerdo con el nuevo estado
                            const icono = boton.find('i');
                            icono.removeClass();
                            if (nuevoEstado === 'En espera') {
                                icono.addClass('fa fa-clock');
                            } else if (nuevoEstado === 'Verificado') {
                                icono.addClass('fa fa-check');
                            } else if (nuevoEstado === 'Rechazado') {
                                icono.addClass('fa fa-times');
                            } else if (nuevoEstado === 'Vencido') {
                                icono.addClass('fa fa-exclamation');
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                            alert('Ha ocurrido un error al cambiar el estado.');
                        }
                    });
                });
            });
        </script>
             </td>
             @else
             <td>@switch(true)
            @case($atleta->estado == 'En espera')
            <span class="badge badge-warning"> {{ $atleta->estado }} </span>
            @break
            @case($atleta->estado == 'Rechazado')
            <span class="badge badge-danger"> {{ $atleta->estado }} </span>
            @break
            @case($atleta->estado == 'Verificado' )
            <span class="badge badge-success"> {{ $atleta->estado }} </span>
            @break
            @endswitch</td>
            @endif
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
