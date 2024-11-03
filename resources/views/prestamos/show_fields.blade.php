<div class="row">
    <!-- Zona Field -->
    <div class="col-md-4 col-sm-12">
        {!! Form::label('zona', 'Zona:') !!}
        <p>{{ $prestamo->zona }}</p>
    </div>

    <!-- Id Cliente Field -->
    <div class="col-md-4 col-sm-12">
        {!! Form::label('id_cliente', 'Id Cliente:') !!}
        <p>{{ $prestamo->id_cliente }}</p>
    </div>

    <!-- Monto Field -->
    <div class="col-md-4 col-sm-12">
        {!! Form::label('monto', 'Monto:') !!}
        <p>
            @if(is_numeric($prestamo->monto))
                {{ number_format((float) $prestamo->monto, 0, ',', '.') }}
            @else
                {{ $prestamo->monto }}
            @endif
        </p>
    </div>

    <!-- Fecha Inicio Field -->
    <div class="col-md-4 col-sm-12">
        {!! Form::label('fecha_inicio', 'Fecha Inicio:') !!}
        <p>{{ $prestamo->fecha_inicio }}</p>
    </div>

    <!-- Fecha Pago Field -->
    <div class="col-md-4 col-sm-12">
        {!! Form::label('fecha_pago', 'Fecha Pago:') !!}
        <p>{{ $prestamo->fecha_pago }}</p>
    </div>

    <!-- Cantidad Cuota Field -->
    <div class="col-md-4 col-sm-12">
        {!! Form::label('cantidad_cuota', 'Cantidad de Cuotas:') !!}
        <p>{{ $prestamo->cantidad_cuota }}</p>
    </div>

    <!-- Fechas de Vencimiento Field -->
    <div class="col-md-4 col-sm-12">
        {!! Form::label('fechas_vencimiento', 'Fechas de Vencimiento:') !!}
        <p>
            @if($prestamo->fechas_vencimiento && is_array(json_decode($prestamo->fechas_vencimiento, true)))
                @foreach(json_decode($prestamo->fechas_vencimiento, true) as $fecha)
                    {{ $fecha }}<br>
                @endforeach
            @else
                No hay fechas de vencimiento definidas.
            @endif
        </p>
    </div>

    <!-- Tipo Prestamo Field -->
    <div class="col-md-4 col-sm-12">
        {!! Form::label('tipo_prestamo', 'Tipo de Préstamo:') !!}
        <p>{{ $prestamo->tipo_prestamo }}</p>
    </div>

    <!-- Dias Mora Field -->
    <div class="col-md-4 col-sm-12">
        {!! Form::label('dias_mora', 'Días de Mora:') !!}
        <p>{{ $prestamo->dias_mora }}</p>
    </div>

    <!-- Interés Field -->
    <div class="col-md-4 col-sm-12">
        {!! Form::label('interes', 'Interés por Mora (%):') !!}
        <p>{{ $prestamo->interes }}</p>
    </div>
</div>


<!-- Listado de Cuotas (Saldos) -->
<div class="col-sm-12">
    {!! Form::label('cuotas', 'Cuotas del Préstamo:') !!}
    <table class="table table-bordered mt-2">
        <thead>
            <tr>
                <th>Número de Cuota</th>
                <th>Fecha de Vencimiento</th>
                <th>Monto</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prestamo->saldos as $cuota)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $cuota->fecha_cuota }}</td>
                    <td>{{ number_format($cuota->monto_cuota, 0, ',', '.') }}</td>
                    <td>{{ $cuota->estado == 'pendiente' ? 'Pendiente' : 'Pagada' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Creado el:') !!}
    <p>{{ $prestamo->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Actualizado el:') !!}
    <p>{{ $prestamo->updated_at }}</p>
</div>
