<br> 
@if(Auth::user()->hasRole('super_admin'))
 
<div class="table-responsive" style="padding:15px;font-size: 12px;">
    <table class="table" id="table">
        <thead>
        <tr>
            <th>Foto</th>
        <th>Nombres y apellido</th>
        <th>Ci</th>
        <th>Sexo</th>
        <th>Celular</th>
        <th>Estado</th>
        <th>Ciudad</th>
        <th>Categoria</th>
         <th>Tipo licencia</th>
         <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($inscripcions as $inscripcion)
            <tr>
            <td><img src="{{ asset('storage/uploads/' . $inscripcion->foto) }}" width="50" height="50" class="img-circle"></td>
            <td>{{ $inscripcion->primer_y_segundo_nombre }} {{ $inscripcion->primer_y_segundo_apellido }}</td>
            <td>{{ $inscripcion->ci }}</td>
            <td>{{ $inscripcion->sexo }}</td>
            <td>{{ $inscripcion->celular }}</td>
            <td>
            <div class="btn-group btn-group-sm" role="group">
    <button id="btnGroupDrop{{$inscripcion->id}}" type="button" class="btn btn-sm {{$inscripcion->estado == 'En espera' ? 'btn-primary' : ($inscripcion->estado == 'Verificado' ? 'btn-success' : ($inscripcion->estado == 'Paralizado' ? 'btn-warning' : 'btn-danger'))}} dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-id="{{$inscripcion->id}}" style="font-size: .575rem;">
        {{$inscripcion->estado}} 
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop{{$inscripcion->id}}">
        @if ($inscripcion->estado != 'En espera')
        <a class="dropdown-item cambiar-estado" href="#" data-estado="En espera"> En espera</a>
        @endif
        @if ($inscripcion->estado != 'Verificado')
        <a class="dropdown-item cambiar-estado" href="#" data-estado="Verificado">Verificado</a>
        @endif
        @if ($inscripcion->estado != 'Vencido')
        <a class="dropdown-item cambiar-estado" href="#" data-estado="Vencido">Vencido</a>
        @endif
        @if ($inscripcion->estado != 'Paralizado')
        <a class="dropdown-item cambiar-estado" href="#" data-estado="Paralizado">Paralizado</a>
        @endif
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.cambiar-estado').on('click', function (e) {
            e.preventDefault();
            const nuevoEstado = $(this).data('estado');
            const inscripcionId = $(this).closest('.btn-group').find('.btn').data('id'); // Obtener el ID de la inscripción del botón actual

            // Realiza la solicitud AJAX para actualizar el estado solo para el registro correspondiente
            $.ajax({
                type: 'POST',
                url: '{{ url("cambiar_estado", ["id" => ""]) }}/' + inscripcionId, // Utiliza una ruta sin ID aquí
                data: {
                    estado: nuevoEstado,
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    // Actualiza el botón desplegable con el nuevo estado
                    const boton = $('#btnGroupDrop' + inscripcionId);
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
            <td>{{ $inscripcion->ciudad }}</td>
            <td>{{ $inscripcion->categoria->nombre  ?? 'Categoria no asignada' }}</td>
             <td>{{$inscripcion->tipo_licencia}}</td>
            <td>
<a href="{{ route('inscripcions.show', [$inscripcion->id]) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Ver inscripcion">
<i class="fas fa-eye"></i>
</a>
@if($inscripcion->tipo_licencia =='Por dia')
<a href="{{route('ver_licencia', $inscripcion->id)}}" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Descargar inscripcion">
<i class="fas fa-file-pdf"></i> 
</a>
@else
<a href="{{route('pdf.show', $inscripcion->id)}}" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Descargar inscripcion">
<i class="fas fa-file-pdf"></i> 
</a>
@endif
@if($inscripcion->tipo_licencia =='Por dia' && $inscripcion->fecha_fin == null)
<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#example{{ $inscripcion->id }}">
        <i class="fa fa-history" aria-hidden="true"></i>
    </button>
<!-- Modal -->
 <div class="modal fade" id="example{{ $inscripcion->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Asignacion de vigencia de licencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>        
      <div class="modal-body">
       <form action="{{ route('por_dia', $inscripcion->id) }}" method="POST" id="por_dia{{ $inscripcion->id }}">
          @csrf
          @method('POST')
           <div class="form-group col-sm-12">
                <label for="fecha_inicio">Fecha y hora de inicio:</label>
                <input type="datetime-local" id="fecha_inicio" name="fecha_inicio" class="form-control">
            </div>

            <div class="form-group col-sm-12">
                <label for="fecha_fin">Fecha y hora de finalización:</label>
                <input type="datetime-local" id="fecha_fin" name="fecha_fin" class="form-control">
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" name="aplicado" value="aplicado" class="btn btn-primary">Aplicar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@else
@if($inscripcion->fecha_fin !== null)
<a href="#" class="btn btn-sm btn-info"data-toggle="tooltip" title="Aplicado">
<i class="fa fa-check-circle" aria-hidden="true"></i></a>
@endif
@endif

<!--
<a href="{{route('seguro',$inscripcion->id)}}" class="btn btn-sm btn-info"data-toggle="tooltip" title="Descargar seguro">
<i class="fa fas-regular fa-laptop-medical"></i></a>-->
@if($inscripcion->uci_id ==null && $inscripcion->uci_id  ==null)
<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal2{{ $inscripcion->id }}">
        <i class="fa fa-id-badge" aria-hidden="true"></i>
    </button>
<!-- Modal -->
 <div class="modal fade" id="exampleModal2{{ $inscripcion->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Asignar federacion ID y UCI ID</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>        
      <div class="modal-body">
       <form action="{{ route('pago', $inscripcion->id) }}" method="POST" id="formularioPago{{ $inscripcion->id }}">
          @csrf
          @method('POST')
          <div class="form-group col-sm-12">
            {!! Form::label('federacion_id', 'ID de Federación:') !!}
            {!! Form::number('federacion_id', null, ['class' => 'form-control']) !!}
          </div>

          <div class="form-group col-sm-12">
            {!! Form::label('uciid', 'ID de UCI:') !!}
            {!! Form::number('uciid', null, ['class' => 'form-control']) !!}
          </div>

          <div class="form-group col-sm-12">
            {!! Form::label('estado', 'Estado:') !!}
            {!! Form::select('estado', array('En espera' => 'En espera', 'Paralizado' => 'Paralizado', 'Verificado' => 'Verificado', 'Vencido' => 'Vencido'), null, ['class' => 'form-control', 'placeholder' => 'Seleccione', 'required']) !!}
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" name="Verificado" value="Verificado" class="btn btn-primary">Aplicar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@else
<a href="#" class="btn btn-sm btn-success"data-toggle="tooltip" title="Verificado">
<i class="fa fa-check-circle" aria-hidden="true"></i></a>
@endif
@canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
<a href="{{ route('inscripcions.edit', [$inscripcion->id]) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Editar">
<i class="fas fa-edit"></i>
</a>@endcan
@canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
<form action="{{ route('inscripcions.destroy', $inscripcion->id) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Eliminar" onclick="return confirm('¿Estás seguro?')">
        <i class="fa fas-solid fa-trash"></i>
    </button>
</form>
</a>@endcan
</td>
        @endforeach
        </tbody>
    </table>
</div>
<script>
  $(document).on('click', '.btn-success', function () {
    var id = $(this).data('id');
    var form = $('#formularioPago' + id);
    var action = form.attr('action');
    // Modifica la URL de acción con el ID recogido
    form.attr('action', action + '/' + id);
  });
</script>
<script>
  $(document).on('click', '.btn-success', function () {
    var id = $(this).data('id');
    var form = $('#por_dia' + id);
    var action = form.attr('action');
    // Modifica la URL de acción con el ID recogido
    form.attr('action', action + '/' + id);
  });
</script>

@else
<br>
 @if (!empty($inscripcions) && $inscripcions->count() > 0)
    @canany(['create_inscripcion', 'edit_inscripcion', 'delete_inscripcion'])
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form class="float-center">
                        <div class="input-group">
                            <input name="buscarpor" type="search" class="form-control form-control-lg"
                                placeholder="Ingresar Ci para buscar">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @endcan
   <!-- Agrega la referencia a la biblioteca de Bootstrap (asegúrate de usar la versión adecuada) -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!-- Agrega la referencia a la biblioteca de Popper.js (necesaria para Bootstrap) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<!-- Agrega la referencia a la biblioteca de Bootstrap (necesaria para Bootstrap) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <div class="card-body pb-0">
        <div class="row">
            @foreach($inscripcions as $inscripcion)
 @if($inscripcion->licencia === null) 
    <script>
        $(document).ready(function(){
            $('#miModal').modal('show');
            
            // Manejar el clic en el botón de Descargar
            $('#btnDescargar').on('click', function() {
                // Hacer la descarga del PDF
                window.location.href = "{{ route('pdf.show', $inscripcion->id) }}";
                
                // Actualizar la columna descarga
                $.post("{{ route('guardarDescarga', ['id' => $inscripcion->id]) }}", { _token: "{{ csrf_token() }}" }, function(data) {
                    console.log(data);
                    
                });
            });
        });
    </script>
        @endif

        <!-- Modal para descargar licencia -->
        <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="miModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="miModalLabel">Paso 1: Descarga de Licencia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Se ha creado la licencia correctamente. Por favor, descargue su licencia en el apartado de licencias.</p>
                    </div>
                    <div class="modal-footer">
                        @if($inscripcion->tipo_licencia =='Por dia')
                        <a href="{{route('ver_licencia', $inscripcion->id)}}" id="btnDescargar" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Descargar inscripcion">
                        <i class="fas fa-file-pdf"></i> Descargar
                        </a>
                        @else
                        <a href="{{route('pdf.show', $inscripcion->id)}}" id="btnDescargar" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Descargar inscripcion">
                        <i class="fas fa-file-pdf"></i> Descargar
                        </a>
                        @endif
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal para registrar seguro -->
    <div class="col d-flex justify-content-center">
    <div class="card mb-3" style="max-width: 28rem;">
        <div class="card-body pt-0">
            <h5 class="card-header"><i class="fa fas-solid fa-bicycle"></i> Informacion de Licencia </h5>
            <div class="row">
                <div class="col-md-7">
                    <ul class="ml-3 mb-0 fa-ul text-muted">
                        <br>
                        <li><span class="fa-li"><i class="fas fa-solid fa-user"></i></span>
                            Nombres: {{ $inscripcion->primer_y_segundo_nombre}}</li><br>
                        <li><span class="fa-li"><i class="fas fa-solid fa-user"></i></span>
                            Apellidos: {{ $inscripcion->primer_y_segundo_apellido}}</li><br>
                        <li><span class="fa-li"><i class="fas fa-solid fa-bars"></i></span>
                            Tipo Categoria: {{ $inscripcion->tipo_categoria ?? 'Categoria no asignada'}}</li><br>
                        <li><span class="fa-li"><i class="fas fa-solid fa-id-badge"></i></span>
                            Cedula de identidad: {{ $inscripcion->ci }}</li><br>
                        <li><span class="fa-li"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                            Ciudad: {{ $inscripcion->ciudad }}</li><br>
                        <li><span class="fa-li"><i class="fas fa-solid fa-address-book"></i></span>
                            Estado:
                            @switch(true)
                                @case($inscripcion->estado == 'En espera')
                                <span class="badge badge-primary"> {{ $inscripcion->estado }} </span>
                                @break
                                @case($inscripcion->estado == 'Paralizado')
                                <span class="badge badge-warning"> {{ $inscripcion->estado }} </span>
                                @break
                                @case($inscripcion->estado == 'Verificado' )
                                <span class="badge badge-success"> {{ $inscripcion->estado }} </span>
                                @break
                            @endswitch</li><br>
                        <li><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Telefono:
                            {{ $inscripcion->celular }}</li>
                    </ul>
                </div>
                <div class="col-md-5 text-center">
                    <br>
                    <img src="{{asset('storage/uploads/' . $inscripcion->foto) }}" width="120" height="120" class="img-circle">
                </div>
            </div>
        </div>
        {!! Form::open(['route' => ['inscripcions.destroy', $inscripcion->id], 'method' => 'delete']) !!}
        <div class="card-footer">
            <div class="text-md-right">
                @canany(['create_inscripcion', 'edit_inscripcion', 'delete_inscripcion'])
                <a class="class='btn btn-default btn-xs'>
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Estas seguro?')"><i class="fa fas-solid fa-trash"></i></button>
                </a>
                @endcan
                @canany(['create_inscripcion', 'edit_inscripcion', 'delete_inscripcion'])
                <a href="{{ route('inscripcions.edit', [$inscripcion->id]) }}" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i>
                </a>
                @endcan
                <a href="{{ route('inscripcions.show', [$inscripcion->id]) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Ver inscripcion">
                    <i class="fas fa-eye"></i>
                </a>
                @if($inscripcion->tipo_licencia =='Por dia')
                <a href="{{route('ver_licencia', $inscripcion->id)}}" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Descargar inscripcion">
                    <i class="fas fa-file-pdf"></i>
                </a>
                @else
                <a href="{{route('pdf.show', $inscripcion->id)}}" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Descargar inscripcion">
                    <i class="fas fa-file-pdf"></i>
                </a>
                @endif
                <!--<a href="{{route('seguro',$inscripcion->id)}}" class="btn btn-sm btn-info" data-toggle="tooltip" title="Descargar seguro">
                    <i class="fa fas-regular fa-laptop-medical"></i></a>-->
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

               <div class="col d-flex justify-content-center">
    <div class="card mb-3" style="max-width: 28rem;">
        <div class="card-body pt-0">
            <h5 class="card-header"><i class="fas fa-id-card"></i> Detalles de Licencia </h5>
            <div class="row">
                <div class="col-md-7">
                    <ul class="ml-3 mb-0 fa-ul text-muted">
                                    <br>
                                   @foreach($pagos_licencia as $pl)
                                   @if($pl->estado=='En espera')
                                   <li ><span class="fa-li"><i class="fas fa-solid fa-money-bill"></i></span>
                                    Saldo por licencia: <strong><span class="badge badge-danger">{{number_format($pl->tarifa) ?? 'NN' }} Gs.</strong></li><br>
                                     @else   
                                      <li ><span class="fa-li"><i class="fas fa-solid fa-money-bill"></i></span>
                                      Pago de licencia: <span class="badge badge-success">Realizado</span></li><br>
                                    @endif
                                    @endforeach
                                    @foreach($pagos_seguro as $ps)
                                    @if($ps->estado=='En espera')
                                   <li ><span class="fa-li"><i class="fas fa-solid fa-money-bill"></i></span>
                                    <strong>Saldo por seguro: <span class="badge badge-danger">{{number_format($ps->tarifa)}} Gs.</strong></li><br>
                                     @else   
                                      <li ><span class="fa-li"><i class="fas fa-solid fa-money-bill"></i></span>
                                      Pago de seguro: <span class="badge badge-success">Realizado</span></li><br>
                                    @endif
                                    @endforeach
                                    @foreach($pagos_evento as $pe)
                                    @if($pe->estado=='En espera')
                                   <li ><span class="fa-li"><i class="fas fa-solid fa-money-bill"></i></span>
                                    <strong>Saldo por evento: <span class="badge badge-danger">{{number_format($ps->tarifa)}} Gs.</strong></li><br>
                                     @else   
                                      <li ><span class="fa-li"><i class="fas fa-solid fa-money-bill"></i></span>
                                      Pago de evento: <span class="badge badge-success">Realizado</span></li><br>
                                    @endif
                                    @endforeach
                                    <li ><span class="fa-li"><i class="fas fa-solid fa-bars"></i></span>
                                        Uciid:{{ $inscripcion->categoria->uciid ?? 'Sin datos'}}</li><br>
                                    <li ><span class="fa-li"><i class="fa fa-address-card" aria-hidden="true"></i></span>
                                        Federacion id:{{ $inscripcion->federacion_id ?? 'Sin datos' }}</li><br>
                                        
                                        @if($inscripcion->licencia=="S")
                                        <li ><span class="fa-li"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                        Licencia descargada.
                                        </li><br>
                                        @else
                                        <li ><span class="fa-li"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                        Licencia no descargada.
                                        </li><br>
                                        @endif
                                        @if($inscripcion->seguro=="S")
                                        <li ><span class="fa-li"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                        Seguro descargada.
                                        </li><br>
                                        @else
                                        <li ><span class="fa-li"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                        Seguro no descargado.
                                        </li><br>
                                        @endif

                                      @if($inscripcion->tipo_licencia =='Por dia')  
                                    <li>
                                        <span class="fa-li"><i class="fas fa-solid fa-address-book"></i></span>
                                        Validez: <span class="badge badge-primary"><i class="fa fa-history" aria-hidden="true"></i> <span id="tiempo_validez"></span></span>
                                    </li>
                                    <br>

                                    <script>
                                        // Obtener la fecha y hora de creación desde PHP
                                        var fecha_inicio = new Date("{{$inscripcion->fecha_inicio}}");

                                        // Calcular la fecha y hora de caducidad sumando un día al tiempo de creación
                                        var expiration_time = new Date(fecha_inicio);
                                        expiration_time.setDate(expiration_time.getDate() + 1);

                                        // Función para actualizar el cronómetro
                                        function updateTimer() {
                                            // Obtener la fecha y hora actual
                                            var now = new Date();

                                            // Calcular la diferencia entre la fecha y hora actual y la fecha y hora de caducidad
                                            var difference = expiration_time - now;

                                            // Si la diferencia es menor a 0, significa que ha pasado un día completo, por lo tanto, el registro ya no es válido
                                            if (difference < 0) {
                                                document.getElementById("tiempo_validez").innerHTML = "No válido";
                                            } else {
                                                // Convertir la diferencia a horas, minutos y segundos
                                                var hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                                var minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
                                                var seconds = Math.floor((difference % (1000 * 60)) / 1000);

                                                // Actualizar el cronómetro en la interfaz de usuario
                                                document.getElementById("tiempo_validez").innerHTML = hours + " horas " + minutes + " minutos " + seconds + " segundos ";
                                            }
                                        }

                                        // Actualizar el cronómetro cada segundo
                                        setInterval(updateTimer, 1000);

                                        // Actualizar el cronómetro al cargar la página
                                        updateTimer();
                                    </script>
                                @else
                                <li ><span class="fa-li"><i class="fas fa-solid fa-address-book"></i></span>
                                        Tipo de licencia:  <span class="badge badge-success"> <i class="fa fa-history" aria-hidden="true"></i> {{$inscripcion->tipo_licencia}}</span>
                                        </li><br>
                            @endif
                            </div>
                            <div class="col-5 text-center">
                                <br>
                                <img src="logof.png" width="120" height="120"
                                    class="img-circle">
                            </div>
                            </div>
                        </div>
                        <div class="card-footer">
                        <div class="text-right">
                            @if($tieneDocumento)
                            <a href="#" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Documento creado">
                                <i class="fa fa-check-circle" aria-hidden="true"></i> Documento
                            </a>
                            @else
                            <a href="{{ route('documentos.create') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Cargar documentos">
                               <i class="fa fas-light fa-book"></i> Crear
                            </a>
                            @endif
                            @if ($pagosUsuario)
                           <a href="{{ route('pagos.create') }}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Cargar pago"> 
                              <i class="fa fas-solid fa-credit-card"></i> Subir 
                            </a>
                            @else
                            <a href="#" class="btn btn-sm btn-success" data-toggle="tooltip" title="Pago Verificado">
                                <i class="fa fa-check-circle" aria-hidden="true"></i> Pago 
                            </a>
                             @endif
                            @if($tieneSeguro)
                            <a href="#" class="btn btn-sm btn-info" data-toggle="tooltip" title="Seguro creado">
                                <i class="fa fa-check-circle" aria-hidden="true"></i> Seguro 
                            </a>
                            @else
                            <a href="{{ route('seguros.create') }}" class="btn btn-sm btn-info" data-toggle="tooltip" title="Cargar seguro"> 
                               <i class="fa fas-regular fa-laptop-medical"></i> Crear
                            </a>
                            @endif
                        </div>
                    </div>
                    </div>
            </div>
        </div>

        @endforeach
    @else
        <div class="container">
            
        <strong><h5><center>Aun no has registrado tu incrpcion? <a class="btn btn-primary" href="{{ route('inscripcions.create') }}"><i class="fa fa-user-plus" aria-hidden="true"></i></a></center></h5></strong> 
      
    </div>
    @endif
</div>
@endif


