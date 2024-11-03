<!-- Número de Préstamo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero_prestamo', 'Número de Préstamo:') !!}
    {!! Form::text('numero_prestamo', $siguienteNumeroPrestamo, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
</div>

<!-- Tipo Prestamo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_prestamo', 'Tipo de Préstamo:') !!}
    {!! Form::select('tipo_prestamo', ['Efectivo' => 'Efectivo', 'Electrodoméstico' => 'Electrodoméstico'], $prestamo->tipo_prestamo ?? null, ['class' => 'form-control', 'id' => 'tipo_prestamo', 'placeholder' => 'Seleccione el tipo de préstamo']) !!}
</div>

<!-- Monto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monto', 'Monto:') !!}
    {!! Form::text('monto', number_format($prestamo->monto ?? 0, 0, ',', '.'), ['class' => 'form-control', 'placeholder' => 'Ingrese el monto del préstamo', 'id' => 'monto']) !!}
</div>

<!-- Zona Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zona', 'Zona:') !!}
    {!! Form::select('zona', ['Zona 1' => 'Zona 1', 'Zona 2' => 'Zona 2'], $prestamo->zona ?? null, ['class' => 'form-control', 'placeholder' => 'Seleccione una zona']) !!}
</div>

<!-- Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_cliente', 'Cliente:') !!}
    {!! Form::select('id_cliente', $clientes, $prestamo->id_cliente ?? null, ['class' => 'form-control', 'placeholder' => 'Seleccione un cliente']) !!}
</div>

<!-- Cantidad Cuota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad_cuota', 'Cantidad de Cuotas:') !!}
    {!! Form::number('cantidad_cuota', $prestamo->cantidad_cuota ?? null, ['class' => 'form-control', 'placeholder' => 'Ingrese la cantidad de cuotas', 'id' => 'cantidad_cuota']) !!}
</div>

<!-- Fecha de Inicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_inicio', 'Fecha de Inicio:') !!}
    {!! Form::date('fecha_inicio', $prestamo->fecha_inicio ?? \Carbon\Carbon::now()->format('Y-m-d'), ['class' => 'form-control', 'id' => 'fecha_inicio']) !!}
</div>

<!-- Frecuencia de Pago Field -->
<div class="form-group col-sm-6">
    {!! Form::label('frecuencia_pago', 'Frecuencia de Pago:') !!}
    {!! Form::select('frecuencia_pago', ['Diario' => 'Diario', 'Semanal' => 'Semanal', 'Quincenal' => 'Quincenal', 'Mensual' => 'Mensual'], $prestamo->frecuencia_pago ?? null, ['class' => 'form-control', 'id' => 'frecuencia_pago', 'placeholder' => 'Seleccione la frecuencia de pago']) !!}
</div>

<!-- Monto Cuota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monto_cuota', 'Monto de la Cuota:') !!}
{!! Form::text('monto_cuota', number_format($prestamo->monto_cuota ?? 0, 0, ',', '.'), ['class' => 'form-control', 'placeholder' => 'Ingrese el monto de la cuota', 'id' => 'monto_cuota', 'name' => 'monto_cuota']) !!}
</div>
<!-- Botón para Generar Cuotas -->
<div class="form-group col-sm-6">
    <button type="button" class="btn btn-primary" id="generateInstallments">Generar Cuotas</button>
</div>

<!-- Tabla para Mostrar Cuotas Generadas -->
<div class="form-group col-sm-12" id="installmentsContainer" style="display: none;">
    <table class="table table-bordered" id="installmentsTable">
        <thead>
            <tr>
                <th>Cuota Nro</th>
                <th>Fecha de Cuota</th>
                <th>Monto de Cuota</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<!-- Campo oculto para almacenar las cuotas generadas en formato JSON -->
<input type="hidden" name="cuotas" id="cuotas">

<script>
document.getElementById('generateInstallments').addEventListener('click', function() {
    const cantidadCuota = parseInt(document.getElementById('cantidad_cuota').value);
    const montoCuota = parseFloat(document.getElementById('monto_cuota').value.replace(/\./g, '').replace(',', '.'));
    const fechaInicio = new Date(document.getElementById('fecha_inicio').value);
    const frecuenciaPago = document.getElementById('frecuencia_pago').value;

    // Validar que se haya ingresado una cantidad de cuotas
    if (isNaN(cantidadCuota) || cantidadCuota <= 0) {
        alert('Por favor, ingrese una cantidad de cuotas válida.');
        return;
    }

    // Validar que se haya ingresado un monto de cuota válido
    if (isNaN(montoCuota) || montoCuota <= 0) {
        alert('Por favor, ingrese un monto de cuota válido.');
        return;
    }

    // Limpiar la tabla antes de agregar nuevas cuotas
    const tbody = document.querySelector('#installmentsTable tbody');
    tbody.innerHTML = '';

    // Array para almacenar las cuotas generadas
    const cuotasArray = [];

    // Generar las cuotas
    for (let i = 0; i < cantidadCuota; i++) {
        const fechaCuota = new Date(fechaInicio);
        
        // Calcular la fecha de la cuota según la frecuencia de pago
        switch(frecuenciaPago) {
            case 'Diario':
                fechaCuota.setDate(fechaCuota.getDate() + i);
                break;
            case 'Semanal':
                fechaCuota.setDate(fechaCuota.getDate() + i * 7);
                break;
            case 'Quincenal':
                fechaCuota.setDate(fechaCuota.getDate() + i * 15);
                break;
            case 'Mensual':
                fechaCuota.setMonth(fechaCuota.getMonth() + i);
                break;
            default:
                alert('Por favor, seleccione una frecuencia de pago válida.');
                return;
        }

        // Formatear la fecha en formato "YYYY-MM-DD"
        const fechaCuotaFormatted = fechaCuota.toISOString().split('T')[0];

        // Determinar el formato del monto de cuota (sin decimales si es entero)
        const montoCuotaFormatted = Number.isInteger(montoCuota)
            ? montoCuota.toLocaleString('es-ES')
            : montoCuota.toLocaleString('es-ES', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

        // Agregar cuota al array, incluyendo `nro_cuota` que empieza en 1
        cuotasArray.push({
            nro_cuota: i + 1, // Comienza en 1
            fecha: fechaCuotaFormatted,
            monto: montoCuota
        });

        // Insertar la fila en la tabla
        const row = `<tr>
            <td>${i + 1}</td> <!-- Número de cuota que comienza en 1 -->
            <td>${fechaCuotaFormatted}</td>
            <td>${montoCuotaFormatted}</td>
            <td>Pendiente</td>
        </tr>`;
        tbody.insertAdjacentHTML('beforeend', row);
    }

    // Convertir cuotasArray a JSON y guardarlo en el input oculto
    document.getElementById('cuotas').value = JSON.stringify(cuotasArray);

    // Mostrar la tabla de cuotas generadas
    document.getElementById('installmentsContainer').style.display = 'block';

    // Imprimir en consola para verificar
    console.log("Cuotas generadas:", cuotasArray);
});
</script>










