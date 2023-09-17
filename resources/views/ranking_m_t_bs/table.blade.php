@if(Auth::user()->hasRole('super_admin'))
 @canany(['create_inscripcion','edit_inscripcion','delete_inscripcion','admin'])
<div class="card">
<div class="card-body">
<div class="table-responsive" style="padding:15px;">
    <table class="table" id="tablas">
        <thead>
        <tr>
        <th>#</th>
        <th>Nombre y Apellido</th>
        <th>Categoria</th>
        <th>Team</th>
        <th>1 Fecha</th>
        <th>2 Fecha</th>
        <th>3 Fecha</th>
        <th>4 Fecha</th>
        <th>5 Fecha</th>
        <th>6 Fecha</th>
        <th>Total</th>
        <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rankingMTBs as $rankingMTB)
            <tr>
            <td>{{ $rankingMTB->posicion ?? 'S/D'}}</th>   
            <td>{{ $rankingMTB->nombre_apellido ?? 'S/D'}}</td>
            <td>{{ $rankingMTB->categoria ?? 'S/D'}}</td>
            <td>{{ $rankingMTB->team ?? 'S/D'}}</td>
            <td>{{ $rankingMTB->fecha_uno ?? 'S/D'}}</td>
            <td>{{ $rankingMTB->fecha_dos ?? 'S/D'}}</td>
            <td>{{ $rankingMTB->fecha_tres ?? 'S/D'}}</td>
            <td>{{ $rankingMTB->fecha_cuatro ?? 'S/D'}}</td>
            <td>{{ $rankingMTB->fecha_cinco ?? 'S/D'}}</td>
            <td>{{ $rankingMTB->fecha_seis ?? 'S/D'}}</td>
            <td>{{ $rankingMTB->totales ?? 'S/D'}}</td>
                <td width="120">
                    {!! Form::open(['route' => ['rankingMTBs.destroy', $rankingMTB->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('rankingMTBs.show', [$rankingMTB->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('rankingMTBs.edit', [$rankingMTB->id]) }}"
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
                
            </tr>
        </tfoot>
    </table>
</div>
@endcan
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
    <div class="card">
  <div class="card-body">
  <form method="GET"> 
    <div class="col-sm-6">
                    <h1><i class="fa fas-solid fa-bicycle"></i> Ranking de MBT</h1>
                </div>
 <div class="input-group">
    <div class="input-group-append">
        <span class="input-group-text"><i class="fas fa-search fa-fw"></i></span>
  </div>
  <input type="text" name="buscar" class="form-control" placeholder=" Buscar al participante por su numero de cedula " aria-label="Recipient's username" aria-describedby="basic-addon2">
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
        </tr>
        </thead>
        <tbody> 
        @foreach($rankingMTBs as $rankingMTB)
            <tr>
            <td>{{ $rankingMTB->posicion ?? 'S/D'}}</th>   
            <td>{{ $rankingMTB->nombre_apellido ?? 'S/D'}}</td>
            <td>{{ $rankingMTB->categoria ?? 'S/D'}}</td>
            <td>{{ $rankingMTB->totales ?? 'A definir'}}</td>
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
@endif


