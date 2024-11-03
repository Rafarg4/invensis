<!-- Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_cliente', 'Cliente:') !!}
    {!! Form::select('id_cliente', $clientes, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un cliente', 'id' => 'clienteSelect']) !!}
</div>

<!-- Préstamo Field -->  
<div class="form-group col-sm-6">
    {!! Form::label('prestamoSelect', 'Seleccionar Préstamo:') !!}
    {!! Form::select('id_prestamo', [], null, ['id' => 'prestamoSelect', 'class' => 'form-control', 'placeholder' => 'Seleccione un préstamo']) !!}
</div>

<!-- Monto Cobro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monto_cobro', 'Monto Cobrado:') !!}
    {!! Form::number('monto_cobro', null, ['class' => 'form-control', 'step' => '0.01', 'placeholder' => 'Ingrese el monto cobrado']) !!}
</div>

<!-- Fecha Cobro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_cobro', 'Fecha de Cobro:') !!}
    {!! Form::date('fecha_cobro', \Carbon\Carbon::now()->format('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<!-- Usuario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usuario', 'Usuario que realizó el cobro:') !!}
    {!! Form::text('usuario', Auth::user()->name, ['class' => 'form-control', 'readonly' => true]) !!}
</div>

<!-- Botón para abrir el modal de seleccionar cuotas -->
<div class="form-group col-sm-12">
    <button type="button" id="selectCuotas" class="btn btn-primary" data-toggle="modal" data-target="#cuotasModal">Seleccionar Cuotas</button>
</div>

<!-- Modal para seleccionar cuotas -->
<div class="modal fade" id="cuotasModal" tabindex="-1" role="dialog" aria-labelledby="cuotasModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cuotasModalLabel">Seleccionar Cuotas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Seleccionar</th>
                            <th>Fecha de Cuota</th>
                            <th>Monto</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody id="saldosTableBody">
                        <!-- Aquí se llenará con JavaScript -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" id="cancelarCuotas" class="btn btn-danger">Cancelar Cuotas Seleccionadas</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // Manejar selección de cliente
document.getElementById('clienteSelect').addEventListener('change', function() {
    var clienteId = this.value;
    if (clienteId) {
        fetch(`/cobros/prestamos/${clienteId}`)
            .then(response => response.json())
            .then(data => {
                var prestamoSelect = document.getElementById('prestamoSelect');
                prestamoSelect.innerHTML = ''; // Limpiar el select previo
                for (var id in data) {
                    var option = document.createElement('option');
                    option.value = data[id].numero_prestamo; // Aquí estableces el valor como numero_prestamo
                    option.textContent = `Número de Préstamo: ${data[id].numero_prestamo}`; // Mostrar el número de préstamo
                    prestamoSelect.appendChild(option);
                }
            })
            .catch(error => {
                console.error('Error al cargar los préstamos:', error);
            });
    } else {
        document.getElementById('prestamoSelect').innerHTML = '';
        document.getElementById('saldosTableBody').innerHTML = ''; // Limpiar la tabla si no hay cliente
    }
});


// Manejar selección de préstamo
document.getElementById('prestamoSelect').addEventListener('change', function() {
    var prestamoId = this.value; // Obtener el ID del préstamo
    var saldosTable = document.getElementById('saldosTableBody');
    saldosTable.innerHTML = ''; // Limpiar la tabla

    if (prestamoId) {
        fetch(`/cobros/saldos/${prestamoId}`) // Asegúrate de que la URL esté correcta
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la respuesta: ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                console.log(data); // Verificar la estructura de los saldos
                if (data.length === 0) {
                    saldosTable.innerHTML = '<tr><td colspan="4">No hay saldos disponibles para este préstamo.</td></tr>';
                } else {
                    data.forEach(saldo => {
                        var row = saldosTable.insertRow();
                        
                        // Crear una celda para la casilla de verificación
                        var selectCell = row.insertCell(0);
                        var checkbox = document.createElement('input');
                        checkbox.type = 'checkbox';
                        checkbox.value = saldo.id; // Asumiendo que 'id' es el identificador de la cuota
                        selectCell.appendChild(checkbox);

                        row.insertCell(1).textContent = saldo.fecha_cuota; // Fecha de la cuota
                        row.insertCell(2).textContent = saldo.monto_cuota; // Monto de la cuota
                        row.insertCell(3).textContent = saldo.estado; // Estado de la cuota
                    });
                }
            })
            .catch(error => {
                console.error('Error al cargar los saldos:', error);
            });
    } else {
        saldosTable.innerHTML = ''; // Limpiar la tabla si no hay préstamo seleccionado
    }
});


    // Manejar la cancelación de cuotas seleccionadas
    document.getElementById('cancelarCuotas').addEventListener('click', function() {
        var selectedIds = [];
        var checkboxes = document.querySelectorAll('#saldosTableBody input[type="checkbox"]:checked');

        checkboxes.forEach(checkbox => {
            selectedIds.push(checkbox.value); // Agregar el ID de cada cuota seleccionada
        });

        if (selectedIds.length > 0) {
            fetch('/cobros/cancelar-cuotas', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Asegúrate de incluir el token CSRF
                },
                body: JSON.stringify({ cuota_ids: selectedIds }) // Envía los IDs seleccionados al backend
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                alert('Cuotas canceladas con éxito');
                $('#cuotasModal').modal('hide'); // Cerrar el modal
                document.getElementById('prestamoSelect').dispatchEvent(new Event('change'));
            })
            .catch(error => {
                console.error('Error al cancelar las cuotas:', error);
            });
        } else {
            alert('Por favor, seleccione al menos una cuota para cancelar.');
        }
    });
</script>
