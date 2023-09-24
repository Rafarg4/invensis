@extends('layouts.app')

@section('content')
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Reporte de inscripciones</h1>
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
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Fechanac</th>
        <th>Ci</th>
        <th>Sexo</th>
        <th>Grupo Sanguineo</th>
        <th>Nacionalidad</th>
        <th>Celular</th>
        <th>Domiciolio</th>
        <th>Departamento</th>
        <th>Ciudad</th>
        <th>Region</th>
        <th>Estado</th>
        <th>Monto</th>
        <th>Federacion Id</th>
        <th>Uciid</th>
        <th>Categoria</th>
        <th>Nombre Equipo</th>
        <th>Nro Contacto Emergencia</th>
        <th>Contacto de Emergencia</th>

        </tr>
        </thead>
        <tbody>
        @foreach($inscripcions as $inscripcion)
            <tr>
                <td>{{ $inscripcion->primer_y_segundo_nombre }}</td>
            <td>{{ $inscripcion->primer_y_segundo_apellido }}</td>
            <td>{{ $inscripcion->fechanac }}</td>
            <td>{{ $inscripcion->ci }}</td>
            <td>{{ $inscripcion->sexo }}</td>
            <td>{{ $inscripcion->grupo_sanguineo }}</td>
            <td>{{ $inscripcion->nacionalidad }}</td>
            <td>{{ $inscripcion->celular }}</td>
            <td>{{ $inscripcion->domiciolio }}</td>
            <td>{{ $inscripcion->departamento }}</td>
            <td>{{ $inscripcion->ciudad }}</td>
            <td>{{ $inscripcion->region }}</td>
            <td>@switch(true)
            @case($inscripcion->estado == 'En espera')
            <span class="badge badge-primary"> {{ $inscripcion->estado }} </span>
            @break
            @case($inscripcion->estado == 'Paralizado')
            <span class="badge badge-warning"> {{ $inscripcion->estado }} </span>
            @break
            @case($inscripcion->estado == 'Verificado' )
            <span class="badge badge-success"> {{ $inscripcion->estado }} </span>
            @break
            @case($inscripcion->estado == 'Vencido' )
            <span class="badge badge-danger"> {{ $inscripcion->estado }} </span>
            @break
            @endswitch</td>
            <td>{{number_format ($inscripcion->monto) }}</td>
             <td>{{ $inscripcion->federacion_id ?? 'Sin asignar'}}</td>
              <td>{{ $inscripcion->uciid ?? 'Sin asignar'}}</td>
            <td>{{ $inscripcion->categoria->nombre  ?? 'Categoria no asignada' }}</td>
            <td>{{ $inscripcion->nombre_equipo }}</td>
            <td>{{ $inscripcion->contacto_emergencia }}</td>
            <td>{{ $inscripcion->nombre_apellido_contacto_emergencia }}</td>
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