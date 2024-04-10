  <!-- Agrega la referencia a la biblioteca de Bootstrap (asegúrate de usar la versión adecuada) -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!-- Agrega la referencia a la biblioteca de Popper.js (necesaria para Bootstrap) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<!-- Agrega la referencia a la biblioteca de Bootstrap (necesaria para Bootstrap) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <div class="table-responsive" style="padding:15px;">
    <table class="table" id="table">
        <thead>
        <tr>
        <th>Cedula de identidad</th>
        <th>Nombre y Apellido</th>
        <th>Estado Civil</th>
        <th>Usted Es</th>
        <th>Tipo de Plan</th>
        <th>Plan</th>
            <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($seguros as $seguro)
            <tr>
            <td>{{ $seguro->inscripto->ci  ?? 'Incripto no asignada' }}</td>
            <td>{{ $seguro->inscripto->primer_y_segundo_nombre  ?? 'Incripto no asignada' }} {{ $seguro->inscripto->primer_y_segundo_apellido  ?? 'Incripto no asignada' }}</td>
            <td>{{ $seguro->estado_civil }}</td>
            <td>{{ $seguro->usted_es }}</td>
            <td>{{ $seguro->tipo_plan }}</td>
            <td>{{ number_format($seguro->tipo_tarifa->tarifa ?? 'Tarifa no asignada')}}.Gs</td>
                <td width="120">
                    {!! Form::open(['route' => ['seguros.destroy', $seguro->id], 'method' => 'delete']) !!}
                     <div class='btn-group'>
                        <button type="button" class='btn btn-info btn-sm' onclick="window.location='{{ route('seguros.show', [$seguro->id]) }}'">
                        <i class="fas fa-eye"></i> 
                        </button>
                    </div>
                     <div class='btn-group'>
                        <a href="{{route('descargarseguro',$seguro->id)}}" class="btn btn-sm btn-danger"data-toggle="tooltip" title="Descargar seguro">
                        <i class="fa fas-regular fa-file-pdf"></i></a>
                    </div>
                        @canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
                        <!--<a href="{{ route('seguros.edit', [$seguro->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    </div>-->@endcan
                    {!! Form::close() !!}
                </td>
            </tr>
             <div class="card-body pb-0">
        <div class="row">
    @if(Auth::user()->hasRole('super_admin'))
    @else
    <!-- Modal para descargar licencia -->
    <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="miModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="miModalLabel">Paso 3: Descarga de Seguro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Se ha creado el seguro correctamente. Por favor, descargue su seguro.</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('descargarseguro', $seguro->id) }}" id="btnDescargar" class="btn btn-danger" data-toggle="tooltip" title="Descargar">
                        <i class="fas fa-file-pdf"></i> Descargar
                    </a>
                   <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.href='{{ route('seguros.index') }}'">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal para subir archivos -->
    <div class="modal fade" id="miModalSegundo" tabindex="-1" role="dialog" aria-labelledby="miModalSegundoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="miModalSegundoLabel">Subir Archivos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Paso 4: Sube tus datos aquí en el apartado de documentos.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <a href="{{ route('documentos.create') }}" class="btn btn-primary">Subir Documentos</a>
                </div>
            </div>
        </div>
    </div>

<script>
$(document).ready(function() {
    // Función para mostrar el segundo modal después de cerrar el primero
    function mostrarSegundoModal() {
        $('#miModalSegundo').modal('show');
    }

    // Verificar si el seguro ha sido descargado y mostrar el modal correspondiente
    @if($seguro->descargado == null)
        $('#miModal').modal('show');
    @elseif($seguro->documento == null)
        mostrarSegundoModal();
    @endif

    // Manejar clic en el botón "Descargar"
    $('#btnDescargar').click(function() {
        // Descargar el seguro
        window.location.href = "{{ route('descargarseguro', $seguro->id) }}";
        
        // Realizar solicitud al servidor para marcar el seguro como descargado y recargar la página
        $.ajax({
            url: "{{ route('marcarSeguroDescargado', $seguro->id) }}",
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                // Recargar la página después de marcar el seguro como descargado
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error('Error al marcar el seguro como descargado');
            }
        });
    });

    // Manejar clic en el enlace "Subir Documentos"
    $('a.btn.btn-primary').click(function() {
        // Realizar solicitud al servidor para marcar el seguro con documentos
        $.ajax({
            url: "{{ route('marcarSeguroDocumento', $seguro->id) }}",
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log('Documentos marcados como subidos');
            },
            error: function(xhr, status, error) {
                console.error('Error al marcar los documentos como subidos');
            }
        });
    });
});
</script>
        @endif
        @endforeach
        </tbody>
    </table>
</div>
