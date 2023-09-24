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
         <th>#</th>
         <th>Ci</th>
        <th>Nombre y Apellido</th>
        <th>Categoria</th>
        <th>Team</th>
        <th>1 Fecha</th>
        <th>2 Fecha</th>
        <th>3 Fecha</th>
        <th>4 Fecha</th>
        <th>5 Fecha</th>
        <th>6 Fecha</th>
        <th>7 Fecha</th>
        <th>8 Fecha</th>
        <th>9 Fecha</th>
        <th>10 Fecha</th>
        <th>Total</th>
        </tr>
        </thead>
        <tbody> 
        @foreach($rankings as $ranking)
            <tr>
            <td>{{ $ranking->posicion ?? 'S/D'}}</th>
            <td> {{ $ranking->ci }} </td>    
            <td>{{ $ranking->nombre_apellido ?? 'S/D'}}</td>
            <td>{{ $ranking->categoria ?? 'S/D'}}</td>
            <td>{{ $ranking->team ?? 'S/D'}}</td>
            <td>{{ $ranking->fecha_uno ?? 'A competir'}}</td>
            <td>{{ $ranking->fecha_dos ?? 'A competir'}}</td>
            <td>{{ $ranking->fecha_tres ?? 'S/D'}}</td>
            <td>{{ $ranking->fecha_cuatro ?? 'A competir'}}</td>
            <td>{{ $ranking->fecha_cinco ??  'A competir'}}</td>
            <td>{{ $ranking->fecha_seis ?? 'A competir'}}</td>
            <td>{{ $ranking->fecha_siete ?? 'A competir'}}</td>
            <td>{{ $ranking->fecha_ocho ?? 'A competir'}}</td>
            <td>{{ $ranking->fecha_nueve ?? 'A competir'}}</td>
            <td>{{ $ranking->fecha_dies ?? 'A competir'}}</td>
            <td>{{ $ranking->totales ?? 'A definir'}}</td>
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
