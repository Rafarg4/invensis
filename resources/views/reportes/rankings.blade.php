@extends('layouts.app')

@section('content')
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Reporte de rankings</h1>
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
            <th>Posicion</th>
            <th>Ci</th>
        <th>Nombre Apellido</th>
        <th>Categoria</th>
        <th>Club</th>
        <th>Sexo</th>
        <th>1 Fecha</th>
        <th>2 Fecha</th>
        <th>3 Fecha</th>
        <th>4 Fecha</th>
        <th>Total</th>
            
        </tr>
        </thead>
        <tbody>
        @foreach($rankings as $ranking)
            <tr>
                <td>{{ $ranking->posicion }}</td>
                 <td>{{ $ranking->inscripcion->ci  ?? 'Usuario no asignado' }}</td>
            <td>{{ $ranking->nombre_apellido }}</td>
            <td>{{ $ranking->categoria->nombre }}</td>
            <td>{{ $ranking->club }}</td>
            <td>{{ $ranking->sexo }}</td>
            <td>{{ $ranking->primer_fecha}}</td>
            <td>{{ $ranking->segundo_fecha }}</td>
            <td>{{ $ranking->tercero_fecha }}</td>
            <td>{{ $ranking->cuarto_fecha }}</td>
            <td>{{ $ranking->total }}</td>
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
