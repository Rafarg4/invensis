<br>
 @if(!empty($inscripcions) && $inscripcions->count() > 0)
@canany(['create_inscripcion','edit_inscripcion','delete_inscripcion'])
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-8 offset-md-2">
<form class=" float-center">
<div class="input-group">
<input name="buscarpor" type="search" class="form-control form-control-lg" placeholder="Ingresar clave para buscar">
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
<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
<div class="card">
  <div class="card-header">
   Carnet de inscripcion   
  </div>
<div class="card-body pt-0">
<div class="row">
<div class="col-7">
<ul class="ml-4 mb-0 fa-ul text-muted">
<br>
<li class="small"><span class="fa-li"><i class="fas fa-solid fa-user"></i></span> Nombres: {{ $inscripcion->primer_y_segundo_nombre}}</li><br>
<li class="small"><span class="fa-li"><i class="fas fa-solid fa-bars"></i></span> Categoria:{{ $inscripcion->categoria->nombre}}</li><br>	
<li class="small"><span class="fa-li"><i class="fas fa-solid fa-id-badge"></i></span> Cedula:{{ $inscripcion->ci }}</li><br>
<li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Domiciolio:{{ $inscripcion->domiciolio }}</li><br>
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
<li class="small"><span class="fa-li"><i class="fas fa-regular fa-city"></i></span> Ciudad:{{ $inscripcion->ciudad }}</li><br>
<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Telefono: {{ $inscripcion->celular }}</li>
</ul>
</div>
<div class="col-5 text-center">
	<br>
<img src="{{ asset('storage').'/'.$inscripcion->foto}}" width="150" height="150" class="img-circle">
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
@if($inscripcion->estado =='Verificado')         
<a href="{{ route('licencias.show',$inscripcion->id)}}" class="btn btn-sm btn-success">
<i class="fa fas-solid fa-id-card"></i> </a>
@else
<a style="display: none;" href="{{ route('licencias.show',$inscripcion->id)}}" class="btn btn-sm btn-success">
<i class="fa fas-solid fa-id-card"></i> </a>            
@endif

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

    
