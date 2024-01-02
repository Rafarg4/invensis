<div class="table-responsive" style="padding:15px;">
    <table class="table" id="table">
        <thead>
        <tr>
        <th>Ci Inscripto</th>
        <th>Nombre y Apellido</th>
        <th>Pago</th>
        <th>Inscripcion</th>
        <th> Seguro medico</th>
        <th>Certificado medico</th>
        <th> Copia de cedula</th>
        <th>Estado</th>
            <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($documentos as $documento)
            <tr>
                <td>{{ $documento->inscripto->ci  ?? 'Inscripto no asignada' }}</td>
                <td>{{ $documento->inscripto->primer_y_segundo_nombre  ?? 'Inscripto no asignada' }} {{ $documento->inscripto->primer_y_segundo_apellido  ?? 'Inscripto no asignada' }}</td>
                <td><a href="{{route('documento.download_pago',$documento->id)}}"><img src="/pdf.jpg" width="40" height="40"></a></td>
            <td><a href="{{route('documento.download_inscripcion',$documento->id)}}"><img src="pdf.jpg" width="40" height="40"></a></td>
            <td><a href="{{route('documento.download_seguro',$documento->id)}}"><img src="/pdf.jpg" width="40" height="40"></a></td>
            <td><a href="{{route('documento.download_certificado',$documento->id)}}"><img src="/pdf.jpg" width="40" height="40"></a></td>
            <td><a href="{{route('documento.download_copia',$documento->id)}}"><img src="/pdf.jpg" width="40" height="40"></a></td>
             @if(Auth::user()->hasRole('super_admin'))
             <td>
                  <div class="btn-group btn-group-sm" role="group">
            <button id="btnGroupDrop{{$documento->id}}" type="button" class="btn btn-sm {{$documento->estado == 'En espera' ? 'btn-primary' : ($documento->estado == 'Verificado' ? 'btn-success' : ($documento->estado == 'Paralizado' ? 'btn-warning' : 'btn-danger'))}} dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-id="{{$documento->id}}" style="font-size: .575rem;">
                {{$documento->estado}}
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop{{$documento->id}}">
                @if ($documento->estado != 'En espera')
                <a class="dropdown-item cambiar-estado" href="#" data-estado="En espera">En espera</a>
                @endif
                @if ($documento->estado != 'Verificado')
                <a class="dropdown-item cambiar-estado" href="#" data-estado="Verificado">Verificado</a>
                @endif
                @if ($documento->estado != 'Paralizado')
                <a class="dropdown-item cambiar-estado" href="#" data-estado="Paralizado">Paralizado</a>
                @endif
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('.cambiar-estado').on('click', function (e) {
                    e.preventDefault();
                    const nuevoEstado = $(this).data('estado');
                    const documentoId = $(this).closest('.btn-group').find('.btn').data('id'); // Obtener el ID de la inscripción del botón actual

                    // Realiza la solicitud AJAX para actualizar el estado solo para el registro correspondiente
                    $.ajax({
                        type: 'POST',
                        url: '{{ url("cambiar_estado_documento", ["id" => ""]) }}/' + documentoId, // Utiliza una ruta sin ID aquí
                        data: {
                            estado: nuevoEstado,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (data) {
                            // Actualiza el botón desplegable con el nuevo estado
                            const boton = $('#btnGroupDrop' + documentoId);
                            boton.text(nuevoEstado);

                            // Cambia el color del botón en tiempo real
                            boton.removeClass().addClass('btn btn-sm dropdown-toggle');
                            if (nuevoEstado === 'En espera') {
                                boton.addClass('btn-primary');
                            } else if (nuevoEstado === 'Verificado') {
                                boton.addClass('btn-success');
                            } else if (nuevoEstado === 'Paralizado') {
                                boton.addClass('btn-warning');
                            } else if (nuevoEstado === 'Vencido') {
                                boton.addClass('btn-danger');
                            }

                            // Muestra un mensaje de éxito
                            $('#mensaje').text('Estado actualizado a ' + nuevoEstado).removeClass().addClass('alert alert-success').show();
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
            @case($documento->estado == 'En espera')
            <span class="badge badge-primary"> {{ $documento->estado }} </span>
            @break
            @case($documento->estado == 'Paralizado')
            <span class="badge badge-warning"> {{ $documento->estado }} </span>
            @break
            @case($documento->estado == 'Verificado' )
            <span class="badge badge-success"> {{ $documento->estado }} </span>
            @break
            @endswitch</td>
            @endif
                            <td width="120">
                    {!! Form::open(['route' => ['documentos.destroy', $documento->id], 'method' => 'delete']) !!}
                    <!--<div class='btn-group'>
                        <a href="{{ route('documentos.show', [$documento->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>-->
                        @canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
                        <a href="{{ route('documentos.edit', [$documento->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>@endcan
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
