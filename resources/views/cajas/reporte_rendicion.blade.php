<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rendición de Caja</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Rendición de Caja</h2>

    <table>
        <thead>
            <tr>
                 <th>Cliente</th>
                <th>Comprobante N°</th>
                <th>Nro Cuota</th>
                <th>Monto</th>
                <th>Saldo</th>
                <th>Estado</th>
                <th>Fecha Cobro</th>
                <th>Cajero</th>
            </tr>
        </thead>
        <tbody>
           @php
    $totalGeneral = 0;
@endphp

<tbody>
    @php $totalGeneral = 0; @endphp

    @foreach($datos as $item)
        @php $totalGeneral += $item->monto; @endphp
        <tr>
            <td>{{ $item->ci }} - {{ $item->nombre }} {{ $item->apellido }}</td>
            <td>{{ $item->comprobante_cobro }}</td>
            <td>{{ $item->nro_cuota }}</td>
            <td>{{ number_format($item->monto, 0, ',', '.') }}</td>
            <td>{{ number_format($item->saldo, 0, ',', '.') }}</td>
            <td>{{ $item->estado }}</td>
            <td>{{ $item->fecha_cobro }}</td>
            <td>{{ $item->name }}</td>
        </tr>
    @endforeach
</tbody>
<tfoot>
    <tr>
        <td colspan="3"><strong>Total General</strong></td>
        <td><strong>{{ number_format($totalGeneral, 0, ',', '.') }}</strong></td>
        <td colspan="4"></td>
    </tr>
</tfoot>
</body>
</html>
