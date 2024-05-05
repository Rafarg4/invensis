@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Reporte de pagos</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')
         <div id="mensaje" class="alert alert-success" style="display: none;"></div>

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive" style="padding:15px;">
    <table class="table" id="Table">
        <thead>
        <tr>
        <th>Ci</th>
        <th>Nombre y apellido</th>
        <th>Tipo Pago</th>
        <th>Monto</th>
        <th>Forma de pago</th>
        <th>Estado</th>
        <th>Observacion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pagos as $pago)
            <tr>
            <td>{{ $pago->inscripcion->ci ?? 'Sin datos'}}</td>
            <td>{{ $pago->inscripcion->primer_y_segundo_nombre ?? 'Sin datos' }} {{ $pago->inscripcion->primer_y_segundo_apellido ?? 'Sin datos'}}</td>
            <td>{{ $pago->tarifas->tipo_plan ?? 'Sin datos' }} {{number_format ($pago->tarifas->tarifa)?? 'Sin datos'}} Gs.</td>
            <td>{{number_format($pago->monto)}} Gs.</td>
            <td>{{ $pago->forma_pago }}</td>
             <td>{{ $pago->estado }}</td> 
            <td>{{ $pago->observacion }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

                
                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

