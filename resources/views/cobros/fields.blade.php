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
                            <th>Nro de Cuota</th>
                            <th>Fecha de Cuota</th>
                            <th>Monto</th>
                             <th>Saldo cuota</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody id="saldosTableBody">
                        <!-- Aquí se llenará con JavaScript -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" id="confirmarSeleccion" class="btn btn-primary">Confirmar Selección</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Tabla de Saldos Seleccionados -->
<table class="table table-bordered" id="selectedSaldosTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nro de Cuota</th>
            <th>Fecha de Cuota</th>
            <th>Monto</th>
            <th>Estado</th>
            <th>Monto Pagado</th>
            <th>Fecha de Pago</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody id="selectedSaldosTableBody">
    </tbody>
</table>


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

                // Agregar opción deshabilitada "Seleccione una opción"
                var defaultOption = document.createElement('option');
                defaultOption.textContent = 'Seleccione una opción';
                defaultOption.value = '';
                defaultOption.disabled = true;
                defaultOption.selected = true;
                prestamoSelect.appendChild(defaultOption);

                // Agregar opciones dinámicas para cada préstamo
                for (var id in data) {
                    var option = document.createElement('option');
                    option.value = data[id].numero_prestamo; // Establecer el valor como numero_prestamo
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
                    saldosTable.innerHTML = '<tr><td colspan="5">No hay saldos disponibles para este préstamo.</td></tr>';
                } else {
                    data.forEach(saldo => {
                        var row = saldosTable.insertRow();
                        
                        // Crear una celda para la casilla de verificación
                        var selectCell = row.insertCell(0);
                        var checkbox = document.createElement('input');
                        checkbox.type = 'checkbox';
                        checkbox.value = saldo.id; // Asumiendo que 'id' es el identificador de la cuota
                        selectCell.appendChild(checkbox);
                        
                        // Agregar las celdas para cada dato
                        row.insertCell(1).textContent = saldo.nro_cuota; // Número de cuota
                        row.insertCell(2).textContent = saldo.fecha_cuota; // Fecha de la cuota
                        row.insertCell(3).textContent = saldo.monto_cuota; // Monto de la cuota
                        row.insertCell(4).textContent = saldo.saldo_cuota; // Monto de la cuota
                        row.insertCell(5).textContent = saldo.estado; // Estado de la cuota
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

  document.getElementById('confirmarSeleccion').addEventListener('click', function () {
    var selectedSaldosTableBody = document.getElementById('selectedSaldosTableBody');
    selectedSaldosTableBody.innerHTML = '';

    document.querySelectorAll('#saldosTableBody input[type="checkbox"]:checked').forEach((checkbox, index) => {
        var row = checkbox.closest('tr');
        var saldoId = checkbox.value; // ID
        var nroCuota = row.cells[1].textContent.trim(); // Número de cuota
        var fechaCuota = row.cells[2].textContent.trim(); // Fecha de cuota
        var saldoCuota = parseFloat(row.cells[4].textContent.trim()); // Saldo de cuota (columna reemplazada)
        var estado = row.cells[5].textContent.trim(); // Estado

        var newRow = selectedSaldosTableBody.insertRow();

        // Columna para ID
        newRow.insertCell(0).innerHTML = `<input type="text" class="form-control" name="detalles[${index}][id]" value="${saldoId}" readonly />`;

        // Columna para Número de Cuota
        newRow.insertCell(1).innerHTML = `<input type="text" class="form-control" name="detalles[${index}][nroCuota]" value="${nroCuota}" readonly />`;

        // Columna para Fecha de Cuota
        newRow.insertCell(2).innerHTML = `<input type="text" class="form-control" name="detalles[${index}][fechaCuota]" value="${fechaCuota}" readonly />`;

        // Columna para Saldo de Cuota
        newRow.insertCell(3).innerHTML = `<input type="text" class="form-control" name="detalles[${index}][saldoCuota]" value="${saldoCuota}" readonly />`;

        // Columna para Estado
        newRow.insertCell(4).innerHTML = `<input type="text" class="form-control" name="detalles[${index}][estado]" value="${estado}" readonly />`;

        // Columna para Monto Pagado
        newRow.insertCell(5).innerHTML = `<input type="number" class="form-control" name="detalles[${index}][montoPagado]" min="0" placeholder="Monto Pagado" required />`;

        // Columna para Fecha de Pago (editable para ingresar nueva fecha, día, mes, año)
        newRow.insertCell(6).innerHTML = `<input type="date" class="form-control" name="detalles[${index}][fechaPago]" required />`;

        // Columna para botón Eliminar
        newRow.insertCell(7).innerHTML = `<button type="button" class="btn btn-danger btn-sm eliminarFila">Eliminar</button>`;

        // Validación para Monto Pagado
        newRow.querySelector(`input[name="detalles[${index}][montoPagado]"]`).addEventListener('input', function () {
            var montoPagado = parseFloat(this.value);
            if (montoPagado > saldoCuota) {
                this.setCustomValidity("El monto pagado no puede ser mayor al saldo de la cuota.");
            } else {
                this.setCustomValidity("");
            }
        });

        // Validación para Fecha de Pago
        newRow.querySelector(`input[name="detalles[${index}][fechaPago]"]`).addEventListener('change', function () {
            var fechaPago = new Date(this.value);
            if (fechaPago < new Date()) {
                this.setCustomValidity("La fecha de pago no puede ser anterior a hoy.");
            } else {
                this.setCustomValidity("");
            }
        });
    });

    $('#cuotasModal').modal('hide');
});

    // Manejar acción de eliminar fila
    document.getElementById('selectedSaldosTableBody').addEventListener('click', function(e) {
        if (e.target && e.target.matches('.eliminarFila')) {
            var row = e.target.closest('tr');
            row.parentNode.removeChild(row);
        }
    });
</script>




</script>
