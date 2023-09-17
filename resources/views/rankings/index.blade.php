@extends('layouts.app')
@section('content')
@if(Auth::user()->hasRole('super_admin'))
 @canany(['create_inscripcion','edit_inscripcion','delete_inscripcion','admin'])
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Rankings</h1>
                </div>
                 <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('rankings.create') }}">
                        Nuevo
                    </a>
                </div>
                
            </div>
        </div>
    </section>
    @include('flash::message')
<div class="card">
<div class="card-body">        
<div class="table-responsive" style="padding:15px;">
    <table class="table" id="tablas">
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
        <th>Accion</th>
        </tr>
        </thead>
        <tbody> 
        <?php $i = 0; ?>
        @foreach($rankings as $ranking)
            <tr>
            <td>{{ $ranking->posicion ?? 'S/D'}}</th>
             @if(!empty($inscripcion) && $inscripcion->count() > 0)    
            <td> @if($ranking->ci == $inscripcion[$i])
                {{ $ranking->ci }}
            @else
           Ci {{ $ranking->ci }} no registrado 
            @endif   
            </td>
            @else
            <td>   
           Ci {{ $ranking->ci }} no registrado 
            </td>@endif    
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
                <td width="120">
                    {!! Form::open(['route' => ['rankings.destroy', $ranking->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                         
                        <a href="{{ route('rankings.show', [$ranking->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('rankings.edit', [$ranking->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th></th> 
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th> 
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                
            </tr>
        </tfoot>
    </table>
</div>
@endcan
<!-- Vista para usuarios -->
 @else
 <style type="text/css">
     .dataTables_filter, .dataTables_info { display: none; }
 </style>
 <script type="text/javascript">
     $(document).ready( function () {
    $('#tables').DataTable({
            "pageLength":6,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            
        });
} );
</script>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
        </div>
    </section>
    <div class="card">
  <div class="card-body">
  <form method="GET"> 
    <div class="col-sm-6">
                    <h1><i class="fa fas-solid fa-road"></i> Ranking de Ruta</h1>
                </div>
 <div class="input-group">
    <div class="input-group-append">
        <span class="input-group-text"><i class="fas fa-search fa-fw"></i></span>
  </div>
  <input type="text" name="buscar" class="form-control" placeholder=" Buscar al participante por su nombre " aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-primary" type="submit">Buscar</button>
  </div>
</div>
</form>
  </div>
</div>
<div class="card">
  <div class="card-body">
<div class="table-responsive" style="padding:15px;">
    <table class="table" id="tables">
        <thead>
        <tr>
        <th>#</th>
        <th>Nombre y Apellido</th>
        <th>Categoria</th>
        <th>Total</th>
        </thead>
        <tbody> 
            @foreach($rankings as $ranking)
            <tr>
            <td>{{ $ranking->posicion ?? 'S/D'}}</th>   
            <td>{{ $ranking->nombre_apellido ?? 'S/D'}}</td>
            <td>{{ $ranking->categoria ?? 'S/D'}}</td>
            <td>{{ $ranking->totales ?? 'A definir'}}</td>
    
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>
</div>
<style type="text/css">
    tfoot {
    display: table-header-group;
}
</style>
@endif
@endsection

