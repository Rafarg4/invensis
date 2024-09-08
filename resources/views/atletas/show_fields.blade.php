<div class="tab-content">
<div class="tab-pane active" id="tab_1">
 <div class="row">    
    <div class="form-group col-md-3">
    <label for="nombre">Nombres:</label>
    <input type="text" class="form-control" id="nombre" value="{{ $atleta->nombres }}">
</div>
<div class="form-group col-md-3">
    <label for="apellido">Apellidos:</label>
    <input type="text" class="form-control" id="apellido" value="{{ $atleta->apellidos  }}">
</div>
<div class="form-group col-md-3">
    <label for="ci">Ci:</label>
    <input type="text" class="form-control" id="ci" value="{{ $atleta->ci }}">
</div>
<div class="form-group col-md-3">
    <label for="sexo">Sexo:</label>
    <input type="text" class="form-control" id="sexo" value="{{ $atleta->sexo }}">
</div>
<div class="form-group col-md-3">
    <label for="celular">Celular:</label>
    <input type="text" class="form-control" id="celular" value="{{ $atleta->celular }}">
</div>
<div class="form-group col-md-3">
    <label for="departamento">Departamento:</label>
    <input type="text" class="form-control" id="departamento" value="{{ $atleta->departamento }}">
</div>
<div class="form-group col-md-3">
    <label for="ciudad">Ciudad:</label>
    <input type="text" class="form-control" id="ciudad" value="{{ $atleta->ciudad }}">
</div>
<div class="form-group col-md-3">
    <label for="categoria">Categoría:</label>
    <input type="text" class="form-control" id="categoria" value="{{ $atleta->nombre_categoria ??'Sin datos'}}">
</div>
<div class="form-group col-md-3">
    <label for="tipo_categoria">Modalidad:</label>
    <input type="text" class="form-control" id="tipo_categoria" value="{{ $atleta->id_modalidad ?? 'Sin asignar' }}">
</div>
<div class="form-group col-md-3">
    <label for="tipo_categoria">Estado:</label>
    <input type="text" class="form-control" id="tipo_categoria" value="{{ $atleta->estado ?? 'Sin asignar' }}">
</div>
<div class="form-group col-md-3">
    <label for="federacion_id">Federación Id:</label>
    <input type="text" class="form-control" id="federacion_id" value="{{ $atleta->federacion_id ?? 'Sin asignar' }}">
</div>
<div class="form-group col-md-3">
    <label for="uciid">Uciid:</label>
    <input type="text" class="form-control" id="uciid" value="{{ $atleta->uci_id ?? 'Sin asignar' }}">
</div>
<div class="form-group col-md-3">
    <label for="modo">Modo:</label>
    <input type="text" class="form-control" id="modo" value="{{ $atleta->uci_id ?? 'Sin asignar' }}">
</div>
<div class="form-group col-md-3">
    <label for="nombre_equipo">Nombre de equipo:</label>
    <input type="text" class="form-control" id="nombre_equipo" value="{{ $atleta->nombre_equipo }}">
</div>
<div class="form-group col-md-3">
    <label for="created_at">Fecha de Registro:</label>
    <input type="text" class="form-control" id="created_at" value="{{ $atleta->created_at }}">
</div>
</div>
</div>
<div class="tab-pane" id="tab_2">
    <table class="table" id="table">
        <thead>
        <tr>
        <th>Inscripto</th>
        <th>Tipo Pago</th>
        <th>Comprobante</th>
        <th>Forma de pago</th>
        <th>Estado</th>
        <th>Observacion</th>
        <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pagos as $pago)
            <tr>
             <td>{{auth()->user()->name}}</td>
            <td>{{ $pago->tarifa->tipo_plan ?? 'Sin datos' }}</td>
            <td><a href="{{route('comprobante.download_comprobante',$pago->id)}}"><img src="/pdf.jpg" width="35" height="35"></a></td>
            <td>{{ $pago->forma_pago }}</td>
            @if(Auth::user()->hasRole('super_admin'))
             <td>
                  <div class="btn-group btn-group-sm" role="group">
            <button id="btnGroupDrop{{$pago->id}}" type="button" class="btn btn-sm {{$pago->estado == 'En espera' ? 'btn-warning' : ($pago->estado == 'Verificado' ? 'btn-success' : ($pago->estado == 'Rechazado' ? 'btn-danger' : 'btn-danger'))}} dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-id="{{$pago->id}}" style="font-size: .575rem;">
                {{$pago->estado}}
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop{{$pago->id}}">
                @if ($pago->estado != 'En espera')
                <a class="dropdown-item cambiar-estado" href="#" data-estado="En espera">En espera</a>
                @endif
                @if ($pago->estado != 'Verificado')
                <a class="dropdown-item cambiar-estado" href="#" data-estado="Verificado">Verificado</a>
                @endif
                @if ($pago->estado != 'Rechazado')
                <a class="dropdown-item cambiar-estado" href="#" data-estado="Rechazado">Rechazado</a>
                @endif
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('.cambiar-estado').on('click', function (e) {
                    e.preventDefault();
                    const nuevoEstado = $(this).data('estado');
                    const pagoId = $(this).closest('.btn-group').find('.btn').data('id'); // Obtener el ID de la inscripción del botón actual

                    // Realiza la solicitud AJAX para actualizar el estado solo para el registro correspondiente
                    $.ajax({
                        type: 'POST',
                        url: '{{ url("cambiar_estado_pago", ["id" => ""]) }}/' + pagoId, // Utiliza una ruta sin ID aquí
                        data: {
                            estado: nuevoEstado,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (data) {
                            // Actualiza el botón desplegable con el nuevo estado
                            const boton = $('#btnGroupDrop' + pagoId);
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
            @case($pago->estado == 'En espera')
            <span class="badge badge-warning"> {{ $pago->estado }} </span>
            @break
            @case($pago->estado == 'Rechazado')
            <span class="badge badge-danger"> {{ $pago->estado }} </span>
            @break
            @case($pago->estado == 'Verificado' )
            <span class="badge badge-success"> {{ $pago->estado }} </span>
            @break
            @endswitch</td>
            @endif
            <td>{{ $pago->observacion }}</td>
                <td width="120">
                {!! Form::open(['route' => ['pagos.destroy', $pago->id], 'method' => 'delete']) !!}
                    <!-- Para que solo los usuarios normales puedan ver los botones, porque no cambia al mismo tiempo que el select -->
                     @if(Auth::user()->hasRole('super_admin'))
                     @else
                    @if($pago->estado=='En espera')
                    <div class='btn-group'>
                        <button type="button" class='btn btn-warning btn-sm'>
                            <i class="fa fa-history" aria-hidden="true"></i>
                        </button>
                    </div>
                    @elseif($pago->estado=='Verificado')
                    <div class='btn-group'>
                        <button type="button" class='btn btn-success btn-sm'>
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </button>
                    </div>
                    @elseif($pago->estado=='Rechazado')
                    <div class='btn-group'>
                        <button type="button" class='btn btn-danger btn-sm'>
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                    </div>
                    @endif
                    @endif
                     <div class='btn-group'>
                        @canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
                        <button type="button" class='btn btn-info btn-sm' onclick="window.location='{{ route('pagos.edit', [$pago->id]) }}'">
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

</div>

       