<br> 
@if(Auth::user()->hasRole('super_admin'))
<div class="table-responsive" style="padding:15px;font-size: 12px;">
    <table class="table" id="table">
        <thead>
        <tr>
            <th>Foto</th>
        <th>Nombres y apellido</th>
        <th>Ci</th>
        <th>Sexo</th>
        <th>Celular</th>
        <th>Estado</th>
        <th>Ciudad</th>
        <th>Categoria</th>
         <th>Email</th>
         <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($inscripcions as $inscripcion)
            <tr>
            <td><img src="{{ asset('storage').'/'.$inscripcion->foto}}" width="50" height="50" class="img-circle"></td>
            <td>{{ $inscripcion->primer_y_segundo_nombre }} {{ $inscripcion->primer_y_segundo_apellido }}</td>
            <td>{{ $inscripcion->ci }}</td>
            <td>{{ $inscripcion->sexo }}</td>
            <td>{{ $inscripcion->celular }}</td>
            <td>
            <div class="btn-group btn-group-sm" role="group">
    <button id="btnGroupDrop{{$inscripcion->id}}" type="button" class="btn btn-sm {{$inscripcion->estado == 'En espera' ? 'btn-primary' : ($inscripcion->estado == 'Verificado' ? 'btn-success' : ($inscripcion->estado == 'Paralizado' ? 'btn-warning' : 'btn-danger'))}} dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-id="{{$inscripcion->id}}" style="font-size: .575rem;">
        {{$inscripcion->estado}}
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop{{$inscripcion->id}}">
        @if ($inscripcion->estado != 'En espera')
        <a class="dropdown-item cambiar-estado" href="#" data-estado="En espera">En espera</a>
        @endif
        @if ($inscripcion->estado != 'Verificado')
        <a class="dropdown-item cambiar-estado" href="#" data-estado="Verificado">Verificado</a>
        @endif
        @if ($inscripcion->estado != 'Vencido')
        <a class="dropdown-item cambiar-estado" href="#" data-estado="Vencido">Vencido</a>
        @endif
        @if ($inscripcion->estado != 'Paralizado')
        <a class="dropdown-item cambiar-estado" href="#" data-estado="Paralizado">Paralizado</a>
        @endif
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.cambiar-estado').on('click', function (e) {
            e.preventDefault();
            const nuevoEstado = $(this).data('estado');
            const inscripcionId = $(this).closest('.btn-group').find('.btn').data('id'); // Obtener el ID de la inscripción del botón actual

            // Realiza la solicitud AJAX para actualizar el estado solo para el registro correspondiente
            $.ajax({
                type: 'POST',
                url: '{{ url("cambiar_estado", ["id" => ""]) }}/' + inscripcionId, // Utiliza una ruta sin ID aquí
                data: {
                    estado: nuevoEstado,
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    // Actualiza el botón desplegable con el nuevo estado
                    const boton = $('#btnGroupDrop' + inscripcionId);
                    boton.text(nuevoEstado);

                    // Cambia el color del botón en tiempo real
                    boton.removeClass().addClass('btn btn-sm dropdown-toggle');
                    if (nuevoEstado === 'En espera') {
                        boton.addClass('btn-primary');
                    } else if (nuevoEstado === 'Verificado') {
                        boton.addClass('btn-success');
                    } else if (nuevoEstado === 'Paralizado') {
                        boton.addClass('btn-warning');
                    } else if (nuevoEstado === 'Vencido') {
                        boton.addClass('btn-danger');
                    }

                    // Muestra un mensaje de éxito
                    $('#mensaje').text('Estado actualizado a ' + nuevoEstado).removeClass().addClass('alert alert-success').show();
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Ha ocurrido un error al cambiar el estado.');
                }
            });
        });
    });
</script>

            </td>
            <td>{{ $inscripcion->ciudad }}</td>
            <td>{{ $inscripcion->categoria->nombre  ?? 'Categoria no asignada' }}</td>
             <td>{{$inscripcion->email}}</td>
            <td >
                     {!! Form::open(['route' => ['inscripcions.destroy', $inscripcion->id], 'method' => 'delete']) !!}
@canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
<a class="class='btn btn-default btn-xs">
<button type="submit"  class="btn btn-sm btn-danger" onclick="return confirm('Estas seguro?')"><i class="fa fas-solid fa-trash"></i></button>
</a>@endcan
@canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
<a href="{{ route('inscripcions.edit', [$inscripcion->id]) }}" class="btn btn-sm btn-warning">
<i class="fas fa-edit"></i>
</a>@endcan
</a>
<a href="{{ route('inscripcions.show', [$inscripcion->id]) }}" class="btn btn-sm btn-primary">
<i class="fas fa-eye"></i>
</a>
<a href="{{route('pdf.show', $inscripcion->id)}}" class="btn btn-sm btn-danger">
<i class="fas fa-file-pdf"></i> 
</a>
<a href="{{route('seguro',$inscripcion->id)}}" class="btn btn-sm btn-info">
<i class="fa fas-regular fa-laptop-medical"></i></a>

{!! Form::close() !!}
</td>
        @endforeach
        </tbody>
    </table>
</div>

@else
<br>
 @if(!empty($inscripcions) && $inscripcions->count() > 0)
@canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-8 offset-md-2">
<form class=" float-center">
<div class="input-group">
<input name="buscarpor" type="search" class="form-control form-control-lg" placeholder="Ingresar Ci para buscar">
<div class="input-group-append">
<button type="submit" class="btn btn-lg btn-default">
<i class="fa fa-search"></i>
</button>
</div>
</div>
</form>
</div>
</div>
</div>
</section>
@endcan
<div class="card-body pb-0">
  
<div class="row">
      @foreach($inscripcions as $inscripcion)
 <div class="col d-flex justify-content-center">
<div class="card" style="width: 23rem;">
<div class="card-body pt-0">
<div class="row">
<div class="col-7">
<ul class="ml-3 mb-0 fa-ul text-muted">
<br>     
<li class="small"><span class="fa-li"><i class="fas fa-solid fa-user"></i></span> Nombres: {{ $inscripcion->primer_y_segundo_nombre}}</li><br>
<li class="small"><span class="fa-li"><i class="fas fa-solid fa-bars"></i></span> Categoria:{{ $inscripcion->categoria->nombre ?? 'Categoria no asignada'}}</li><br>    
<li class="small"><span class="fa-li"><i class="fas fa-solid fa-id-badge"></i></span> Cedula:{{ $inscripcion->ci }}</li><br>
<li class="small"><span class="fa-li"><i class="fas fa-solid fa-address-book"></i></span>Estado: @switch(true)
            @case($inscripcion->estado == 'En espera')
            <span class="badge badge-primary"> {{ $inscripcion->estado }} </span>
            @break
            @case($inscripcion->estado == 'Paralizado')
            <span class="badge badge-warning"> {{ $inscripcion->estado }} </span>
            @break
            @case($inscripcion->estado == 'Verificado' )
            <span class="badge badge-success"> {{ $inscripcion->estado }} </span>
            @break
            @endswitch</li><br>
<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Telefono: {{ $inscripcion->celular }}</li>
</ul>
</div>
<div class="col-5 text-center">
    <br>
<img src="{{ asset('storage').'/'.$inscripcion->foto}}" width="110" height="110" class="img-circle">
</div>
</div>
</div>
{!! Form::open(['route' => ['inscripcions.destroy', $inscripcion->id], 'method' => 'delete']) !!}
<div class="card-footer">
<div class="text-right">
@canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
<a class="class='btn btn-default btn-xs">
<button type="submit"  class="btn btn-sm btn-danger" onclick="return confirm('Estas seguro?')"><i class="fa fas-solid fa-trash"></i></button>
</a>@endcan
@canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
<a href="{{ route('inscripcions.edit', [$inscripcion->id]) }}" class="btn btn-sm btn-warning">
<i class="fas fa-edit"></i>
</a>@endcan
</a>

<a href="{{ route('inscripcions.show', [$inscripcion->id]) }}" class="btn btn-sm btn-primary">
<i class="fas fa-eye"></i>
</a>
<a href="{{route('pdf.show', $inscripcion->id)}}" class="btn btn-sm btn-danger">
<i class="fas fa-file-pdf"></i> 
</a>               
<a href="{{route('seguro',$inscripcion->id)}}" class="btn btn-sm btn-info">
<i class="fa fas-regular fa-laptop-medical"></i></a>
</div>
</div>{!! Form::close() !!}
</div>
</div>
@endforeach
@else
<div class="container"> 

   <div class="alert alert-light" role="alert">
  <b><h4><center>Aun no se ha registrado ninguna inscripcion!</center></h4></b>   
</div>                               
@endif
</div>
{{ $inscripcions->links() }}


 @endif

