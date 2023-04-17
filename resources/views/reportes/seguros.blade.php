@extends('layouts.app')

@section('content')
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Reporte de seguros</h1>
                </div>
            </div>
        </div>
    </section>
<div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
<div class="table-responsive" style="padding:15px;">
    <table class="table" id="Table">
        <thead>
        <tr>
        <th>Ci</th>
        <th>Nombre y Apellido</th>
        <th>Estado Civil</th>
        <th>Edad</th>
        <th>Usted Es</th>
        <th>Padece Enfermedad</th>
        <th>Especificar Enfermedad</th>
        <th>Presenta Defecto Fisico</th>
        <th>Especifique Defecto Fisico</th>
        <th>Estatura</th>
        <th>Peso</th>
        <th>Tipo de Plan</th>
        <th>Nombre Apellido Fallecimiento Titular</th>
        <th>Parentesco Titular Beneficiario</th>
        <th>Ci Beneficiario</th>
        <th>Porcentaje Cesion</th>
        <th>Fechade nacimiento de Beneficiario</th>

        </tr>
        </thead>
        <tbody>
        @foreach($seguros as $seguro)
            <tr>
            <td>{{ $seguro->inscripto->ci  ?? 'Incripto no asignada' }}</td>
            <td>{{ $seguro->inscripto->primer_y_segundo_nombre  ?? 'Incripto no asignada' }} {{ $seguro->inscripto->primer_y_segundo_apellido  ?? 'Incripto no asignada' }}</td>
            <td>{{ $seguro->estado_civil }}</td>
            <td>{{ $seguro->edad }}</td>
            <td>{{ $seguro->usted_es }}</td>
            <td>{{ $seguro->padece_enfermedad }}</td>
            <td>{{ $seguro->especificar_enfermedad ??'Sin asignar'}}</td>
            <td>{{ $seguro->presenta_defecto_fisico }}</td>
            <td>{{ $seguro->especifique_defecto_fisico ??'Sin asignar'}}</td>
            <td>{{ $seguro->estatura }}</td>
            <td>{{ $seguro->peso }}</td>
            <td>{{ $seguro->tipo_plan }}</td>
            <td>{{ $seguro->nombre_apellido_fallecimiento_titular }}</td>
            <td>{{ $seguro->parentesco_titular_beneficiario }}</td>
            <td>{{ $seguro->ci_beneficiario }}</td>
            <td>{{ $seguro->porcentaje_cesion }}</td>
            <td>{{ $seguro->fechanac_beneficiario }}</td>
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